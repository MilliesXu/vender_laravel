<?php

namespace App\Http\Controllers\Material;

use App\Models\Material;
use Illuminate\Http\RedirectResponse;
use Throwable;

class DeleteMaterialController extends MaterialController
{

    /**
     * Delete Material
     * @param Material $material
     * @return RedirectResponse
     */
    public function __invoke(Material $material): RedirectResponse
    {
        try {
            $this->material_service->destroy($material);

            return redirect('/material')->with('success', 'Successfully delete material');
        } catch (Throwable $th) {
            return back()->with('error', 'Something wrong');
        }
    }
}
