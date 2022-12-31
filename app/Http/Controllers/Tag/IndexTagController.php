<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Services\TagService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexTagController extends Controller
{
    private $tag_service;

    /**
     * IndexTagController To Assign Tag Service
     *
     * @param TagService $tag_service
     */
    public function __construct(TagService $tag_service)
    {
        $this->tag_service = $tag_service;
    }

    /**
     * Show List Of Tags Page
     *
     * @param Request $request
     * @return View
     */
    public function __invoke(Request $request): View
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
