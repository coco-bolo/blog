<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;

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
            'mname' => 'required|between:4,16|alpha_dash',
            'pass' => 'required|between:6,18|alpha_dash',
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
            return redirect('admin/login')->withErrors($validator)->withInput();
        }

        $manager = Manager::where('name', $input['mname'])->first();

        if (!$manager) {
            return redirect('admin/login')->withErrors('用戶名不存在')->withInput();
        }

        if ($input['pass'] != Crypt::decrypt($manager->pass)) {
            return redirect('admin/login')->withErrors('密码不正确')->withInput();
        }

        Session::forget('loginCaptcha');
        Session::put('manager', $manager);

        return redirect('admin/index');
    }

    public function checkName(Request $request)
    {
        $name = $request->input('mname');
        $res = Manager::where('name', $name)->first();
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

    public function index()
    {
        return view('admin.index');
    }

    public function welcome()
    {
        return view('admin.welcome');
    }

    public function logout()
    {
        Session::forget('user');

        return redirect('admin/login');
    }

    public function noAccess()
    {
        return view('admin.errors.noAccess');
    }
}
