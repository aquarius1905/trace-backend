<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\User\StoreRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\User\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $inputs = $request->all();
        $inputs['password'] = Hash::make($inputs['password']);
        $user = User::create($inputs);
        event(new Registered($user));

        return response()->json([
            'message' => 'Store Successfully!'
        ], 201);
    }
}
