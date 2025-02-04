<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = Auth::user();

        // Task: fill in the code here to update name and email
        // Also, update the password if it is set
        $validated = $request->validated();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        if ($request->password) $user->password =bcrypt( $validated['password']);
        $user->save();         
        
        return redirect()->route('profile.show')->with('success', 'Profile updated.');
    }
}
