<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Services\TagService;
use Illuminate\Http\RedirectResponse;

class StoreTagController extends TagController
{
    /**
     * Create Tag Controller
     *
     * @param TagRequest $request
     * @return RedirectResponse
     */
    public function __invoke(TagRequest $request): RedirectResponse
    {
        try {
            $formfields = $request->validated();
            $formfields['user_id'] = auth()->id();
    
            $this->tag_service->store($formfields);
    
            return redirect('/tag')->with('success', 'Successfully create a tag');
        } catch (\Throwable $th) {
            return back()->with('error', 'Something wrong');
        }
    }
}
