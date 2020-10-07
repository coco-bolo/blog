<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        // dd(session()->all());
        return view('admin.login');
    }

    public function doLogin(Request $request)
    {
        $input = $request->except(['_token']);

        $rules = [
            'username' => 'required|between:4,16|alpha_dash|unique:users',
            'password' => 'required|between:6,18|alpha_dash',
            'captcha' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (strtolower(Session::get('loginCaptcha')) != strtolower($value)) {
                        $fail('验证码 不正确');
                    }
                }
            ]
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Session::forget('name');
        dd($input);
    }

    public function checkUsername(Request $request)
    {
        $username = $request->input('username');
        $res = User::where('username', $username)->first();
        if ($res) {
            return response()->json(false);
        } else {
            return response()->json(true);
        }
    }

    public function checkCaptcha(Request $request)
    {
        $captcha = $request->input('captcha');
        if (strtolower(Session::get('loginCaptcha')) == strtolower($captcha)) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }

    public function captcha()
    {
        $phraseBuilder = new PhraseBuilder(4);
        $builder = new CaptchaBuilder(null, $phraseBuilder);
        $builder->build(140, 48);
        $phrase = $builder->getPhrase();
        Session::put('loginCaptcha', $phrase);
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-type: image/jpeg');
        $builder->output();
    }
}
