<?php

namespace App\Http\Middleware;

use Closure;
use App\Contracts\Auth\MustVerifyEmail;
use App\Models\User;

class EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $redirectToRoute
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse|null
     */
    public function handle($request, Closure $next, $redirectToRoute = null)
    {
        $user = User::where('email', $request->email)->firstOrFail();
        if (
            !$user ||
            ($user instanceof MustVerifyEmail &&
                !$user->hasVerifiedEmail())
        ) {
            return abort(403, 'Your email address is not verified.');
        }

        return $next($request);
    }
}
