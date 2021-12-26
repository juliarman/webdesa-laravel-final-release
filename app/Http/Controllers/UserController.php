<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class UserController extends Controller
{
    public function index()
    {

        $user = User::all();
        return view('pages.administrator.user_admin', compact('user'));
    }

    public function addUser(Request $request)
    {

        $newUser = new User;
        $newUser->name = $request->name;
        $newUser->username = $request->username;
        $newUser->email = $request->email;
        $newUser->no_hp = $request->no_hp;
        $newUser->foto = $request->foto;
        $newUser->password = bcrypt($request->password);
        $newUser->save();

        return redirect('user-admin')->with('message', 'USER ADMIN BERHASIL DIBUAT');
    }

    public function update(Request $request, User $id)
    {

        $updateUser = User::find($id->users_id);
        $updateUser->update([

            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'no_hp' => $request->no_hp,
            'foto' => $request->foto,

        ]);

        return redirect('user-admin')->with('message', 'DATA USER BERHASIL DIPERBARUI');
    }


    public function delete(User $id)
    {
        User::destroy($id->users_id);
        return redirect('user-admin')->with('status', 'USER ADMIN BERHASIL DI HAPUS');
    }
}
