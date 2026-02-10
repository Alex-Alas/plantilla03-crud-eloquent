<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'username' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|max:255',
            'trashed' => 'sometimes|boolean',
        ]);

        $query = User::query();

        if ($request->boolean('trashed')) {
            $query->onlyTrashed();
        }

        if ($request->has('username')) {
            $query->where('username', 'like', '%' . $request->input('username') . '%');
        }

        if ($request->has('email')) {
            $query->where('email', 'like', '%' . $request->input('email') . '%');
        }

        $users = $query->get();

        return response()->json(UserResource::collection($users));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Str::random(8); // Le colocamos una contraseña por defecto

        // Asignar fecha de contratación actual si no viene en la petición
        if (!isset($data['hiring_date'])) {
            $data['hiring_date'] = now();
        }

        $user = User::create($data);

        return response()->json(UserResource::make($user), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json(UserResource::make($user));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
        return response()->json(UserResource::make($user));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return response()->json(['message' => 'El usuario ha sido eliminado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar el usuario'], 500);
        }
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(string $id)
    {
        $user = User::onlyTrashed()->find($id);

        if (!$user) {
            return response()->json(['message' => 'El usuario no existe o no ha sido eliminado.'], 404);
        }

        $user->restore();

        return response()->json(['message' => 'Usuario restaurado correctamente.']);
    }
}
