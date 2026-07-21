<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

public function register(Request $request)
{
    User::create([
        'name' => $request->name,
        'password' => Hash::make($request->password),
    ]);

    return redirect('/login');
}
}

