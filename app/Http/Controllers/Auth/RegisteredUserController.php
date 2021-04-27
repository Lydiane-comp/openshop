<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
<<<<<<< HEAD
use App\Providers\RouteServiceProvider;
=======
>>>>>>> d56dbcd05c4c2f686c82c0b6d7d914fed84c6cd8
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
<<<<<<< HEAD
     * @param  \Illuminate\Http\Request  $request
=======
>>>>>>> d56dbcd05c4c2f686c82c0b6d7d914fed84c6cd8
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

<<<<<<< HEAD
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
=======
        // Auth::login($user);

        return redirect()->route('login');
>>>>>>> d56dbcd05c4c2f686c82c0b6d7d914fed84c6cd8
    }
}
