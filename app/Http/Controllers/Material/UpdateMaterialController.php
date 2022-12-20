<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use App\Http\Requests\MaterialRequest;
use App\Models\Material;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UpdateMaterialController extends Controller
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
        $formfields = $request->validated();

        $material->update($formfields);

        return redirect("/material/$material->id")->with('success', 'Successfully update material');
    }
}
