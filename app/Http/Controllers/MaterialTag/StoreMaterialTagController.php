<?php

namespace App\Http\Controllers\MaterialTag;

use App\Http\Requests\MaterialTagRequest;
use App\Models\Material;
use Illuminate\Http\RedirectResponse;

class StoreMaterialTagController extends MaterialTagController
{
    public function __invoke(MaterialTagRequest $request, Material $material): RedirectResponse
    {
        return redirect("material/$material->id");
    }
}
