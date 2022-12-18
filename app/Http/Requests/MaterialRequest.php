<?php

namespace app\Http\Requests;

use Illuminate\Http\Request;

class MaterialRequest extends Request {
    public function rules(): array {
        return [
            'name' => 'required',
            'description' => 'nullable|min:6',
            'uom' => 'required',
            'unit_price' => 'required'
        ];
    }
}