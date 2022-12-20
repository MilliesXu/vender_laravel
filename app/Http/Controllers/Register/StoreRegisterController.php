<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class StoreRegisterController extends Controller
{
    /**
     * Register A User
     *
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function __invoke(RegisterRequest $request): RedirectResponse
    {
        $formfields = $request->validated();
        $formfields['password'] = bcrypt($formfields['password']);
        $user = User::Register($formfields);

        auth()->login($user);

        return redirect('/')->with('success', 'Successfully registered and login');
    }
}
