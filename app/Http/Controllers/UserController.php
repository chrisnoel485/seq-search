<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        //
        $user = User::latest()->paginate(5);
        return view('user.index', compact('user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        //
        $role = Role::all();
        return view('user.create', compact('role'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|string|exists:roles,name'
        ]);
        
        $user = User::firstOrCreate([
            'email' => $request->email
        ], [
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'status' => 1
        ]);
        
        $user->assignRole($request->role);
        return redirect(route('user.index'))->with(['success' => 'User:' . $user->name . ' Ditambahkan']);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|exists:users,email',
            'password' => 'nullable|min:6',
            'status' => 'required',
        ]);
        
        $user = User::findOrFail($id);
        $password = !empty($request->password) ? bcrypt($request->password):$user->password;
        $user->update([
            'name' => $request->name,
            'password' => $password,
            'status' => $request->status
        ]);
        return redirect(route('user.index'))->with(['success' => 'User:' . $user->name . ' Diperbaharui']);
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('letak.index')
            ->with(['success' => 'User:' . $user->name . ' Dihapus']);
    }
}
