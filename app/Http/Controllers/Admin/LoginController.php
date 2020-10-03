<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function doLogin(Request $request)
    {
        $input = $request->except('_token');

        $rules = [
            'username' => 'required|between:4,18|alpha_dash',
            'password' => 'required|between:4,18|alpha_dash',
            'captcha' => 'required|captcha',
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect('admin/login')
                        ->withErrors($validator)
                        ->withInput();
        }

        dd($input);
    }
}
