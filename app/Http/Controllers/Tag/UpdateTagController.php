<?php

namespace App\Http\Controllers\Tag;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Throwable;


class UpdateTagController extends TagController
{
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
        } catch (Throwable $th) {
            return back()->with('error', 'Something Wrong');
        }
    }
}
