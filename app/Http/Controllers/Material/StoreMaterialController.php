<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use App\Http\Requests\MaterialRequest;
use App\Models\Material;
use Illuminate\Http\RedirectResponse;

class StoreMaterialController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Http\Requests\MaterialRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(MaterialRequest $request): RedirectResponse
    {
        $formfields = $request->validated();
        $formfields['user_id'] = auth()->id();

        Material::store($formfields);

        return redirect('/material')->with('success', 'Successfully create a material');
    }
}
