<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use App\Services\MaterialService;
use App\Services\TagService;

class MaterialController extends Controller
{
    protected MaterialService $material_service;
    protected TagService $tag_service;


    /**
     * Constructing Controller Immediately Assigned MaterialService And TagService
     * @param MaterialService $material_service
     * @param TagService $tag_service
     */
    public function __construct(MaterialService $material_service, TagService $tag_service)
    {
        $this->material_service = $material_service;
        $this->tag_service = $tag_service;
    }
}
