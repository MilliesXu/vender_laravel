<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Services\TagService;
use Illuminate\Http\RedirectResponse;

class StoreTagController extends Controller
{
    private $tag_service;

    public function __construct(TagService $tag_service)
    {
        $this->tag_service = $tag_service;
    }

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
