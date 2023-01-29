<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CreateRegisterController extends Controller
{
    /**
     * Show Register Page
     *
     * @param Request $request
     * @return View
     */
    public function __invoke(Request $request): View
    {
        return view('user.register');
    }
}
