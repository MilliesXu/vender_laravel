<?php

namespace App\Http\Controllers\Tag;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexTagController extends TagController
{
    /**
     * Show List Of Tags Pages
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function __invoke(Request $request): View | RedirectResponse
    {
        try {
            $tags = $this->tag_service->index([$request['search']]);
            return view('tag.index', [
                'tags' => $tags,
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Something wrong');
        }

    }
}
