<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\InvalidAuthenticationException;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * @param Request $request
     * @return UserResource
     * @throws InvalidAuthenticationException
     * @throws ValidationException
     */
    public function __invoke(UserRequest $request): UserResource
    {
        if (!auth()->attempt($request->validated())) {
            throw new InvalidAuthenticationException();
        }

        request()->session()->regenerate();

        return new UserResource(auth()->user());
    }
}
