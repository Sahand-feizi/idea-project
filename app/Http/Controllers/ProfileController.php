<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteAccountRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Notifications\UpdateAccount;
use Auth;
use Notification;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('dashboard.settings', ['user' => Auth::user()]);
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = Auth::user();

        $orginalEmail = $user->email;

        $user->update([
            'name' => $request->name,
            'email' => $request->new_email ?? $user->email,
            'password' => $request->new_password ?? $user->password,
        ]);

        $user->refresh();

        if ($user->email !== $orginalEmail) {
            Notification::route('mail', $orginalEmail)
                ->notify(new UpdateAccount($user, $orginalEmail));
        }

        return back()->with('success', 'profile updated successfuly');
    }

    public function destroy(DeleteAccountRequest $request)
    {
        $user = Auth::user();

        Auth::logout();

        $user->delete();

        return to_route('login')->with('success', 'account deleted successfuly');
    }
}
