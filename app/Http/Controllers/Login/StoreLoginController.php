<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;

class StoreLoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(LoginRequest $request): RedirectResponse
    {
        $formfields = $request->validated();

        if (auth()->attempt($formfields)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Successfully login');
        };

        return back()->withErrors([
            'email' => 'Invalid credentials'
        ])->onlyInput('email');
    }
}
