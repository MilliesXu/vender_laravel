<?php

namespace App\Http\Controllers\MaterialTag;

use App\Models\Material;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Throwable;

class DeleteMaterialTagController extends MaterialTagController
{

    /**
     * Delete Material
     * @param Request $request
     * @param Material $material
     * @param Tag $tag
     * @return RedirectResponse
     */
    public function __invoke(Request $request, Material $material, Tag $tag): RedirectResponse
    {
        try {
            $this->material_tag_service->delete($material, $tag);

            return redirect("/material/$material->id")->with('success', "Successfully delete tag from $material->name");
        } catch (Throwable $exception) {
            return back()->with('error', 'Something wrong');
        }
    }
}
