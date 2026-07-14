<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoleHasPermission extends Model
{
    protected $table = 'roles_has_permission';

    protected $fillable = [
        'id_role',
        'id_permission',
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(
            Role::class,
            'id_role'
        );
    }

    public function permission(): BelongsTo
    {
        return $this->belongsTo(
            Permission::class,
            'id_permission'
        );
    }
}