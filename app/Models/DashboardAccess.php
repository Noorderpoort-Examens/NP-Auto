<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DashboardAccess extends Model
{
    protected $fillable = [
        'role_name',
        'can_access',
    ];
}
