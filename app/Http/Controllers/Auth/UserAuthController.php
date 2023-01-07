<?php

namespace App\Http\Controllers\Auth;

use Laravel\Fortify\Actions\AttemptToAuthenticate;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\User\LoginRequest;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Routing\Pipeline;
use Illuminate\Support\Facades\Log;

class UserAuthController extends Controller
{
    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    /**
     * Attempt to authenticate a new session.
     *
     * @param  \App\Http\Requests\User\LoginRequest  $request
     * @return mixed
     */
    public function store(LoginRequest $request)
    {
        return $this->loginPipeline($request)
            ->then(function ($request) {
                $user =
                    User::where('email', $request->email)->firstOrFail();
                Log::Debug($user);
                $user->tokens()->delete();
                $token = $user->createToken('auto_token')->plainTextToken;

                return response()->json([
                    'token' => $token,
                ], 200);
            });
    }

    /**
     * Get the authentication pipeline instance.
     *
     * @param  \App\Http\Requests\User\LoginRequest  $request
     * @return \Illuminate\Pipeline\Pipeline
     */
    protected function loginPipeline(LoginRequest $request)
    {
        return (new Pipeline(app()))->send($request)->through(array_filter([
            AttemptToAuthenticate::class
        ]));
    }

    /**
     * Destroy an authenticated session.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        auth('sanctum')->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out successfully'
        ], 200);
    }

    public function me(Request $request)
    {
        return response()->json([
            'data' => auth('sanctum')->user()
        ], 200);
    }
}
