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
            'password' => $request->password,
        ]);

        return redirect('/login');
    }

    public function login(Request $request)
    {
        $user = User::where('name', $request->name)->first();

        if ($user && password_verify($request->password, $user->password)) {

            session([
                'user' => $user->name,
                'is_admin' => $user->is_admin,
            ]);

            if ($user->is_admin) {
                return redirect('/');
            }

            return redirect('/');
        }

        return back()->with('error', 'Name or Password is incorrect');
    }

    public function logout()
    {
        session()->forget(['user', 'is_admin']);

        return redirect('/');
    }
}
