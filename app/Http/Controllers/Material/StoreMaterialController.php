<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use app\Http\Requests\MaterialRequest;
use App\Models\Material;
use Illuminate\Http\RedirectResponse;

class StoreMaterialController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(MaterialRequest $request): RedirectResponse
    {
        $formfields = $request->validate();

        Material::create($formfields);

        return redirect('material.index')->with('success', 'Successfully create a material');
    }
}
