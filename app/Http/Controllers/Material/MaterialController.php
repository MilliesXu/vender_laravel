<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use App\Services\MaterialService;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    protected MaterialService $material_service;

    /**
     * Constructing Material Controller To Assign Material Service
     *
     * @param MaterialService $material_service
     */
    public function __construct(MaterialService $material_service)
    {
        $this->material_service = $material_service;
    }
}
