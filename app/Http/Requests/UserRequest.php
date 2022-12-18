<?php

namespace app\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterRequest extends Request {
    public function rules(): array {
        return [
            'name' => 'required',
            'email' => ['required', 'email', [Rule::unique('users', 'email')]],
            'password' => 'required|confirmed|min:6'
        ];
    }
}

class LoginRequest extends Request {
    public function rules(): array {
        return [
            'email' => ['required', 'email'],
            'password' => 'required'
        ];
    }
}
