<?php

namespace App\Services;

use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;

class UserService 
{
    /**
     * To Get User Login And Return Redirect Response
     *
     * @param array $formfields
     * @return Bool
     */
    public function login(array $formfields): Bool
    {
        return auth()->attempt($formfields);
    }

    /**
     * Create a new user via registration
     *
     * @param array $formfields
     * @return User
     */
    public function register(array $formfields): User
    {
        $formfields['password'] = bcrypt($formfields['password']);
        $user = User::create($formfields);

        auth()->login($user);

        return $user;
    }
}
