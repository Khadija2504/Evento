<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function usersControllerList(){
        $users = User::where('role', 'utilisateur')->get();
        return view('profile.usersControllerList', compact('users'));
    }

    public function userActive($id){
        $users = User::where('id', $id);
        $users->update([
            'status' => 'active',
        ]);

        return redirect()->back();
    }
    public function userDisactive($id){
        $users = User::where('id', $id);
        $users->update([
          'status' => 'disactive',
        ]);
        return redirect()->back();
    }

    public function userReservationActive($id){
        $users = User::where('id', $id);
        $users->update([
            'reserve' => 'active',
        ]);
        return redirect()->back();
    }

    public function userReservationDisactive($id){
        $users = User::where('id', $id);
        $users->update([
            'reserve' => 'disactive',
        ]);
        return redirect()->back();
    }
}
