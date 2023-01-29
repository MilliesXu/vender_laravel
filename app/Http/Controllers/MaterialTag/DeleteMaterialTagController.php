<?php

namespace App\Http\Controllers\MaterialTag;

use App\Models\Material;
use App\Models\MaterialTag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Throwable;

class DeleteMaterialTagController extends MaterialTagController
{
    /**
     * Delete MaterialTag Controller
     * @param Request $request
     * @param Material $material
     * @param MaterialTag $material_tag
     * @return RedirectResponse
     */
    public function __invoke(Request $request, Material $material, MaterialTag $material_tag): RedirectResponse
    {
        try {
            $this->material_tag_service->delete($material_tag);

            return redirect("/material/$material->id")->with('success', "Successfully delete tag from $material->name");
        } catch (Throwable $exception) {
            return back()->with('error', 'Something wrong');
        }
    }
}
