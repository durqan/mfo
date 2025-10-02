<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(AuthFormRequest $request)
    {
        $request->validated();

        if (Auth::attempt(['phone' => $request->login, 'password' => $request->pass])) {
            $request->session()->regenerate();
            return redirect('/personal');
        }

        return response('Не верный логин или пароль', 401);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
