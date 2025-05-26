<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class DashboardAccess extends Model
{
    protected $fillable = ['role_id', 'can_access'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
