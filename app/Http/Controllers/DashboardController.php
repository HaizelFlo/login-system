<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index',[
            'users' => User::count(),
            'roles' => Role::count(),
            'permissions' => Permission::count()
        ]);
    }
}