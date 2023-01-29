<?php

namespace App\Http\Controllers\Tag;

use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Throwable;

class DeleteTagController extends TagController
{
    /**
     * Delete Tag
     * @param Tag $tag
     * @return RedirectResponse
     */
    public function __invoke(Tag $tag): RedirectResponse
    {
        try {
            if (!$this->tag_service->delete($tag))
            {
                return back()->with('error', 'Failed to delete a tag');
            }

            return redirect('/tag')->with('success', 'Successfully delete a tag');
        } catch (Throwable $th) {
            return back()->with('error', 'Something Wrong');
        }
    }
}
