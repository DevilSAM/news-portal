<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\VerificationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class VerificationController extends Controller
{
    public function showVerifyForm()
    {
        return Inertia::render('Auth/TelegramVerification');
    }

    public function verifyCode(VerificationRequest $request)
    {
        /**@var User $user */
        $user = Auth::user();

        if ($user->verification_code == $request->verification_code) {
            $user->is_verified = true;
            $user->save();

            event(new UserRegistered($user));

            return redirect()->intended(route('home', absolute: false));
        }

        return back()->withErrors(['verification_code' => 'Invalid verification code.']);
    }
}
