<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('hiring_date')->nullable()->after('email_verified_at');
            $table->string('dui', 10)->nullable()->unique()->after('hiring_date');
            $table->string('phone_number')->nullable()->after('dui');
            $table->date('birth_date')->nullable()->after('phone_number');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['hiring_date', 'dui', 'phone_number', 'birth_date']);
            $table->dropSoftDeletes();
        });
    }
};
