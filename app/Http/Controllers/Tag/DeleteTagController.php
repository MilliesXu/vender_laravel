<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Services\TagService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DeleteTagController extends Controller
{
    private $tag_service;

    /**
     * Construct Delete Controller With TagService
     *
     * @param TagService $tag_service
     */
    public function __construct(TagService $tag_service)
    {
        $this->tag_service = $tag_service;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Tag $tag): RedirectResponse
    {
        try {
            if (!$this->tag_service->delete($tag))
            {
                return back()->with('error', 'Failed to delete a tag');
            }

            return redirect('/tag')->with('success', 'Successfully delete a tag');
        } catch (\Throwable $th) {
            return back()->with('error', 'Something Wrong');
        }
    }
}
