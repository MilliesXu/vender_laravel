<?php

namespace App\Http\Controllers\MaterialTag;

use App\Http\Requests\MaterialTagRequest;
use App\Models\Material;
use Illuminate\Http\RedirectResponse;
use Throwable;

class StoreMaterialTagController extends MaterialTagController
{
    public function __invoke(MaterialTagRequest $request, Material $material): RedirectResponse
    {
        try {
            $tag_ids = explode(',', $request['tag_ids']);

            foreach ($tag_ids as $tag)
            {
                $this->material_tag_service->store((int)$tag, $material, $request->user());
            }

            return redirect("/material/$material->id")->with('success', 'Successfully add new tags');
        } catch (Throwable $exception) {
            return back()->with('error', 'Something wrong in the server');
        }
    }
}
