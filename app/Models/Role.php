<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    /** @use HasFactory<\Database\Factories\RoleFactory> */
    use HasFactory;
    use SoftDeletes;

    const MANAGER_ID = 2;

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function scopeManager($query){
        $query->where('id', self::MANAGER_ID);
    }

    public function scopeRole($query, $roleId){
        $query->where('id', $roleId);
    }
}
