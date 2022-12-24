<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;

class StoreTagController extends Controller
{
    /**
     * Create Tag Controller
     *
     * @param TagRequest $request
     * @return RedirectResponse
     */
    public function __invoke(TagRequest $request): RedirectResponse
    {
        $formfields = $request->validated();
        $formfields['user_id'] = auth()->id();
        Tag::store($formfields);
        return redirect('/tag')->with('success', 'Successfully create a tag');
    }
}
