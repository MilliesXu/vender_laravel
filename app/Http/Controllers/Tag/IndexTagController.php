<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexTagController extends Controller
{
    /**
     * Show List Of Tags Page
     *
     * @param Request $request
     * @return View
     */
    public function __invoke(Request $request): View
    {
        $tags = Tag::index([$request['search']]);
        return view('tag.index', [
            'tags' => $tags,
        ]);
    }
}
