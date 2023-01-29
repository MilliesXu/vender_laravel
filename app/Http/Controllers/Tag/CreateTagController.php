<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CreateTagController extends Controller
{
    /**
     * Show Create Tag View
     *
     * @param Request $request
     * @return View
     */
    public function __invoke(Request $request): View
    {
        return view('tag.create');
    }
}
