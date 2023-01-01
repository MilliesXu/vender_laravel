<?php

namespace App\Http\Controllers\Material;

use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexMaterialController extends MaterialController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function __invoke(Request $request): View
    {
        try {
            $materials = $this->material_service->index(['search' => $request['search']]);
            return view('material.index', [
                'materials' => $materials,
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Something wrong');
        }
    }
}
