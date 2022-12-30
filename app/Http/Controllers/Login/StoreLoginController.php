<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;

class StoreLoginController extends Controller
{
    protected $user_service;

    /**
     * Controller Initiate To Use UserService
     *
     * @param UserService $userService
     */
    public function __construct(UserService $user_service)
    {
        $this->user_service = $user_service;
    }

    /**
     * To Login A Credentials
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function __invoke(LoginRequest $request): RedirectResponse
    {
        $formfields = $request->validated();

        try {
            if ($this->user_service->login($formfields))
            {
                request()->session()->regenerate();
                return redirect('/')->with('success', 'Successfully login');
            }
            else
            {
                return back()->withErrors([
                    'email' => 'Invalid credentials'
                ])->onlyInput('email');
            } 
        } catch (\Throwable $th) {
            return redirect('/user/login')->with('error', 'Something wrong');
        }
    }
}
