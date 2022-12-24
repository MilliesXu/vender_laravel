<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\View\View;

class ShowTagController extends Controller
{
    /**
     * Show Detail Tag Page
     *
     * @param Tag $tag
     * @return View
     */
    public function __invoke(Tag $tag): View
    {
        return view('tag.show', [
            'tag' => $tag
        ]);
    }
}
