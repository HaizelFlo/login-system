<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserHasRole extends Model
{
    protected $table = 'user_has_roles';

    protected $fillable = [
        'id_user',
        'id_role',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'id_user'
        );
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(
            Role::class,
            'id_role'
        );
    }
}