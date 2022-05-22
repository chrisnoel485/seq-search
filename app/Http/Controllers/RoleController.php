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
    public function create()
    {
        //
        return view('role.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        //fungsi eloquent untuk menambah data
        Role::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('role.index')
            ->with('success', 'Merek Berhasil Ditambahkan');
    }
}
