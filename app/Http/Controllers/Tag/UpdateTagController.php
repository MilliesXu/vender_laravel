<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UpdateTagController extends Controller
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
        $formfields = $request->validated();

        $tag->update($formfields);

        return redirect("/tag/$tag->id")->with('success', 'Successfully updated tag');
    }
}
