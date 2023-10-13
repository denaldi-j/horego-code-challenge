<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('organization')->get();
        return view('user.index', compact('users'));
    }

    public function create($id = null)
    {
        $roles          = User::ROLES;
        $organizations  = Organization::all();
        $user           = $id ? User::find($id) : null;
        return view('user.form', compact('roles', 'user', 'organizations'));
    }

    public function store(UserRequest $request)
    {
        $user = new User();
        $this->payload($user, $request);
        $user->save();

        $message = ['success' => 'User berhasil ditambahkan'];
        return redirect()->route('user.index')->with($message);
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        $this->payload($user, $request);
        $user->update();

        $message = ['success' => 'User berhasil diupdate'];
        return redirect()->route('user.index')->with($message);
    }

    public function payload($model, $request)
    {
        $model->username        = $request->username;
        $model->password        = Hash::make($request->password);
        $model->role            = $request->role;
        $model->organization_id = $request->organization;
    }

    public function destroy($id)
    {
        return User::find($id)->delete();
    }


}
