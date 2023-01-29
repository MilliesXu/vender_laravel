<?php

namespace App\Http\Controllers\Material;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Throwable;

class IndexMaterialController extends MaterialController
{
    /**
     * Get Materials
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function __invoke(Request $request): View | RedirectResponse
    {
        try {
            $materials = $this->material_service->index(['search' => $request['search']]);
            return view('material.index', [
                'materials' => $materials,
            ]);
        } catch (Throwable $th) {
            return back()->with('error', 'Something wrong');
        }
    }
}
