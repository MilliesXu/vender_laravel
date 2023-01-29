<?php

namespace App\Http\Controllers\Material;

use App\Http\Requests\MaterialRequest;
use Illuminate\Http\RedirectResponse;
use Throwable;

class StoreMaterialController extends MaterialController
{
    /**
     * Get A Material
     * @param MaterialRequest $request
     * @return RedirectResponse
     */
    public function __invoke(MaterialRequest $request): RedirectResponse
    {
        try {
            $formfields = $request->validated();
            $formfields['user_id'] = auth()->id();

            $this->material_service->store($formfields);

            return redirect('/material')->with('success', 'Successfully create a material');
        } catch (Throwable $th) {
            return back()->with('error', 'Something wrong');
        }

    }
}
