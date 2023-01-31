<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Services\TagService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CreateMaterialController extends MaterialController
{
    /**
     * Handle the incoming request.
     *
     * @param  Request  $request
     * @return View
     */
    public function __invoke(Request $request): View
    {
        $tags = $this->tag_service->index([]);

        return view('material.create', ['tags' => $tags]);
    }
}
