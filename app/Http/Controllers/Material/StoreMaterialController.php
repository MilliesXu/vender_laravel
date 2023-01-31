<?php

namespace App\Http\Controllers\Material;

use App\Http\Requests\MaterialRequest;
use App\Services\MaterialTagService;
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

            $material = $this->material_service->store($formfields);

            if ($formfields['tag_ids'] != '') {
                $tag_ids = explode(',', $formfields['tag_ids']);
                $material_tag_service = new MaterialTagService();

                foreach ($tag_ids as $tag) {
                    $material_tag_service->store((int)$tag, $material, $request->user());
                }
            }

            return redirect('/material')->with('success', 'Successfully create a material');
        } catch (Throwable $th) {
            return back()->with('error', 'Something wrong');
        }

    }
}
