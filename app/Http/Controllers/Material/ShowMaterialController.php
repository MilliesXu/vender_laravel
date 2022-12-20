<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\View\View;

class ShowMaterialController extends Controller
{
    /**
     * Show Material Detail Page
     *
     * @param Material $material
     * @return View
     */
    public function __invoke(Material $material): View
    {
        return view('material.show', [
            'material' => $material,
        ]);
    }
}
