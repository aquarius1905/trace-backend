<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Auth\Events\Verified;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Log;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        $user = User::findOrFail($request->id);

        if (!hash_equals(
            (string) $request->hash,
            sha1($user->getEmailForVerification())
        )) {
            return redirect(config('app.url') . '/email/verify/failure');
        }

        if ($user->hasVerifiedEmail()) {
            return redirect(config('app.url') . '/email/already-verified');
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return redirect(config('app.url') . '/email/verified');
    }
}
