<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Services\TagService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class UpdateTagController extends Controller
{
    private $tag_service;

    /**
     * Construct Update Controller With TagService
     *
     * @param TagService $tag_service
     */
    public function __construct(TagService $tag_service)
    {
        $this->tag_service = $tag_service;
    }

    /**
     * Update A Tag
     *
     * @param TagRequest $request
     * @param Tag $tag
     * @return RedirectResponse
     */
    public function __invoke(TagRequest $request, Tag $tag): RedirectResponse
    {
        try {
            $formfields = $request->validated();

            if (!$this->tag_service->update($tag, $formfields))
            {
                return back()->with('error', 'Failed to update tag');
            }

            return redirect("/tag/$tag->id")->with('success', 'Successfully updated tag');
        } catch (\Throwable $th) {
            return back()->with('error', 'Something Wrong');
        }
    }
}
