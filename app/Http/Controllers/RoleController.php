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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //


        Role::find($id)->delete();
        return redirect()->route('role.index')
            ->with('success', 'Role Berhasil Dihapus');
    }
}
