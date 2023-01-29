<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\View\View;

class EditMaterialController extends Controller
{
    /**
     * Show Material Edit Page
     *
     * @param Material $material
     * @return View
     */
    public function __invoke(Material $material): View
    {
        return view('material.edit', [
            'material' => $material,
        ]);
    }
}
