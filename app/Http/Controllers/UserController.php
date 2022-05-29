<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use DB;
use Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    //
    public function index(Request $request)
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
            'email' => 'required|email|unique:user',
            'password' => 'required|min:6',
            'role' => 'required|string|exists:roles,name'
        ]);
        
        $user = User::firstOrCreate([
            'email' => $request->email
        ], [
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'status' => 0
        ]);
        
        $user->assignRole($request->role);
        return redirect(route('user.index'))->with(['success' => 'User:' . $user->name . ' Ditambahkan']);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all()->pluck('name');
        return view('user.edit', compact('user', 'roles'));

        //$role = Role::all();
        //$user = User::findOrFail($id);
        //$userRole = $user->role->pluck('name','name')->all();
        //return view('user.edit', compact('user','role','userRole'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|exists:user,email',
            'password' => 'nullable|min:6',
            'status' => 'required',
            'role' => 'required',
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
        return redirect()->route('user.index')
            ->with(['success' => 'User Berhasil Dihapus']);
    }

    public function role(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $role = Role::all()->pluck('name');
        return view('user.role', compact('user', 'role'));
    }
    public function setrole(Request $request, $id)
    {
        $this->validate($request, [
            'role' => 'required'
        ]);
        
        $user = User::findOrFail($id);
        //menggunakan syncRoles agar terlebih dahulu menghapus semua role yang dimiliki
        //kemudian di-set kembali agar tidak terjadi duplicate
        $user->syncRoles($request->role);
        Session::flash('message','Succes Add  Role to User');
 
        return redirect('/user');
    }
    public function show($id)
    {
        //
        //$letak = Letak::findOrFail($id);
        //return view('letak.detail', compact('letak'));
    }
}
