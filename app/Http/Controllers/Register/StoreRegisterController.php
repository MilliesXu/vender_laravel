<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Throwable;

class StoreRegisterController extends Controller
{
    private UserService $user_service;

    /**
     * Controller Initiate To Use UserService
     *
     * @param UserService $user_service
     */
    public function __construct(UserService $user_service)
    {
        $this->user_service = $user_service;
    }

    /**
     * Register A User
     *
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function __invoke(RegisterRequest $request): RedirectResponse
    {
        $formfields = $request->validated();

        try {
            $this->user_service->register($formfields);

            return redirect('/')->with('success', 'Successfully registered and login');
        } catch (Throwable $th) {
            return back()->with('error', 'Something wrong');
        }
    }
}
