<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    //
    public function login(Request $request, Redirector $redirector)
    {
        $remenber = $request->filled('remenber');

        $user = User::where('correo', $request->email)->first();

        if($user->clave === md5($request->password)){
            Auth::login($user);

            $user->update(['clave' => Hash::make($request->password)]);
            $request->session()->regenerate();
            return redirect('/dashboard')->with('status', 'You are logged!');
        };
        if (Hash::check($request->password, $user->clave)) {
            Auth::login($user);

            $request->session()->regenerate();

            return redirect('dashboard')
                // ->intended('dashboard')
                ->with('status', 'You are logged!');
        }
        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
            'password'  => 'la contraseña es invalida cara de chesse'
        ]);
    }

    public function logout(Request $request, Redirector $redirector){

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $redirector->to('/')->with('status', 'You are logged out');
        // return 'Handle logout';

    }
}
