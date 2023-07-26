<?php

namespace App\Http\Controllers;

use App\Http\Resources\UsersResource;
use App\Models\User;
use App\Traits\HttpResponses;

class UsersController extends Controller
{
    use HttpResponses;
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UsersResource($user);
    }
}
