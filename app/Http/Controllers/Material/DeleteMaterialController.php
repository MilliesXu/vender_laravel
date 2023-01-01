<?php

namespace App\Http\Controllers\Material;

use App\Models\Material;
use Illuminate\Http\RedirectResponse;

class DeleteMaterialController extends MaterialController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Material $material): RedirectResponse
    {
        try {
            $this->material_service->destroy($material);

            return redirect('/material')->with('success', 'Successfully delete material');
        } catch (\Throwable $th) {
            return back()->with('error', 'Something wrong');
        }
    }
}
