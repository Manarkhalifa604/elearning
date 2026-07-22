<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        User::create([
            'name' => $request->name,
            'password' => password_hash($request->password, PASSWORD_DEFAULT),
            'role' => 'user',
        ]);

        return redirect('/login');
    }

    public function login(Request $request)
{
    $user = User::where('name', $request->name)->first();

    if ($user && password_verify($request->password, $user->password)) {

        session([
            'user' => $user->name,
            'role' => $user->role,
            'user_id' => $user->id,
            ]);
            if ($user->role == 'admin') {
                return redirect('/admin/dashboard');
            } 

        return redirect('/user/dashboard');
    }

    return back()->with('error', 'Name or Password is incorrect');
    
}

public function logout()
{
    session()->forget('user');
    return redirect('/');
}
}
