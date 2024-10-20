<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Desa;
use App\Models\Tps;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with('tps')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.users.index', compact('users'));
    }

    public function create()
    {
        $tps_list = Tps::all();
        $desa_list = Desa::all();
        return view('pages.users.create', compact('tps_list', 'desa_list'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:8',
            'roles' => 'required|string',
            'tps_id' => 'nullable|exists:tps,id',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->roles = $request->roles;

        if ($request->roles === 'kpps') {
            $user->tps_id = $request->tps_id;
        }
        if ($request->roles === 'pps') {
            $user->desa_id = $request->desa_id;
        }

        // Simpan user ke database
        $user->save();
        return redirect()->route('user.index')->with('success', 'Pengguna berhasil dibuat');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $tps_list = Tps::all();
        $desa_list = Desa::all();
        return view('pages.users.edit', compact('user', 'tps_list', 'desa_list'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'roles' => 'required|in:admin,pps,kpps,viewer',
            'tps_id' => 'nullable|exists:tps,id',
            'desa_id' => 'nullable|exists:desas,id',
        ]);

        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'roles' => $validatedData['roles'],
            'tps_id' => $validatedData['roles'] == 'kpps' ? $validatedData['tps_id'] : null,
            'desa_id' => $validatedData['roles'] == 'pps' ? $validatedData['desa_id'] : null,
        ]);
        return redirect()->route('user.index')->with('success', 'Pengguna sukses diupdate');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Pengguna berhasil dihapus');
    }
}
