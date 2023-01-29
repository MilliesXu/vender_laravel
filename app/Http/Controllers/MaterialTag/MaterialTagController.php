<?php

namespace App\Http\Controllers\MaterialTag;

use App\Http\Controllers\Controller;
use App\Services\MaterialTagService;

class MaterialTagController extends Controller
{
    protected MaterialTagService $material_tag_service;

    /**
     * To Construct A Controller And Immediately Assign MaterialTagService
     * @param MaterialTagService $material_tag_service
     */
    public function __construct(MaterialTagService $material_tag_service)
    {
        $this->material_tag_service = $material_tag_service;
    }
}
