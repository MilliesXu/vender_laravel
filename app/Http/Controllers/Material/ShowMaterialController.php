<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\View\View;

class ShowMaterialController extends MaterialController
{
    /**
     * Show Material Detail Page
     *
     * @param Material $material
     * @return View
     */
    public function __invoke(Material $material): View
    {

        $tags = $this->tag_service->index([
            'not_include' => $material->tags_id(),
        ]);
        return view('material.show', data: [
            'material' => $material,
            'tags' => $tags,
        ]);
    }
}
