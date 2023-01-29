<?php

namespace App\Http\Controllers\Logout;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Throwable;

class StoreLogoutController extends Controller
{
    /**
     * To Logout User Out Of System
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function __invoke(Request $request): RedirectResponse
    {
        try {
            auth()->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/user/login')->with('success', 'Successfully logout');
        } catch (Throwable $th) {
            return back('')->with('error', 'Something wrong');
        }

    }
}
