<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles_has_permission', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_role')
                ->constrained('roles')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('id_permission')
                ->constrained('permissions')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique(
                ['id_role', 'id_permission'],
                'roles_permissions_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('roles_has_permission');
    }
};