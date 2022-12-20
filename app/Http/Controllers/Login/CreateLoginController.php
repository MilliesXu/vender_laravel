<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CreateLoginController extends Controller
{
    /**
     * Show Login Page
     *
     * @param Request $request
     * @return View
     */
    public function __invoke(Request $request): View
    {
        return view('user.login');
    }
}
