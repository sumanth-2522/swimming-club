<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Relative;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'age' => 'required|numeric|max:255',
            'address1' => 'required|string|max:255',
            'address2' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postcode' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::min(8)],
        ]);

        $user = User::create([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'gender' => $request->gender,
            'age' => $request->age,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'city' => $request->city,
            'post_code' => $request->postcode,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->attachRole($request->input('role'));

        if($user->hasRole('parent')){
            $relative = new Relative([
                'first_name'=>$request->input('firstname'),
                'last_name'=>$request->input('lastname'),
                'relation' =>'Parent',
                'email'=>$request->input('email'),
                'password'=>Hash::make($request->input('password')),

            ]);

            $relative->save();

        }

        event(new Registered($user));

        Auth::login($user);



        return redirect(RouteServiceProvider::HOME);
    }
}
