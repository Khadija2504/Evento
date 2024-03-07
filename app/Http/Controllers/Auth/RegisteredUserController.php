<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string'],
            'avatar' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $file_extension = $file->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = 'imgs/images/';
            $file->move($path, $file_name);
            $validated['avatar'] = $path . '/' . $file_name;
        }

        $randomNumbers = mt_rand(1000, 9999);

        $username = $request->input('name');

        $uniqueIdentifier = $username . '#' . $randomNumbers;

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'avatar' => $validated['avatar'],
            'identifiant_unique' => $uniqueIdentifier,
            'password' => Hash::make($request->password),
        ]);

        if($user->role == 'utilisateur') {
            $user->assignRole('utilisateur');
        } elseif($user->role == 'organisateur'){
            $user->assignRole('organisateur');
        }

        // dd($user->hasRole('organisateur'));

        event(new Registered($user));

        // Auth::login($user);

        return redirect()->route('login');
    }
}
