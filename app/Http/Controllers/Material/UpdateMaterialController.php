<?php

namespace App\Http\Controllers\Material;

use App\Http\Requests\MaterialRequest;
use App\Models\Material;
use Illuminate\Http\RedirectResponse;
use Throwable;

class UpdateMaterialController extends MaterialController
{
    /**
     * Update A Material
     *
     * @param MaterialRequest $request
     * @param Material $material
     * @return RedirectResponse
     */
    public function __invoke(MaterialRequest $request, Material $material): RedirectResponse
    {
        try {
            $formfields = $request->validated();

            $this->material_service->update($material, $formfields);

            return redirect("/material/$material->id")->with('success', 'Successfully update material');
        } catch (Throwable $th) {
            return back()->with('error', 'Something wrong');
        }
    }
}
