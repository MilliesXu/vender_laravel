<?php

namespace App\Http\Controllers\Tag;

use App\Models\Tag;
use Illuminate\Http\RedirectResponse;

class DeleteTagController extends TagController
{
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
