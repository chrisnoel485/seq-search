<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function index()
    {
        $role = Role::latest()->paginate(10);
        return view('role.index', compact('role'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
}
