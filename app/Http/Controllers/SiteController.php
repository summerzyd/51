<?php

namespace App\Http\Controllers;

use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers;

/**
 * Created by PhpStorm.
 * User: angela
 * Date: 2016/10/9
 * Time: 9:43
 */
class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['login', 'captcha']]);
       // $this->middleware('permission');
    }
    public function captcha()
    {
        $charset = 'abdakdoejkajfkajfueiuyfa22ejwj';
        $phrase = '';
        $chars = str_split($charset);

        for($i = 0; $i <4; $i++) {
            $phrase .= $chars[array_rand($chars)];
        }

        $builder = new CaptchaBuilder($phrase);
        $builder->setMaxBehindLines(1);
        $builder->setMaxFrontLines(1);
        $builder->setInterpolation(false);
        $builder->setDistortion(true);
        $builder->build(100);
        $phrase = $builder->getPhrase();
        Session::set('__captcha', $phrase);
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        return $builder->output();
    }
    public function login(Request $request)
    {
        $username = $request->input('username');
        $captcha = Session::get('__captcha');
        if ($captcha != $request->input('captcha')) {
            return 'error';
        }
        return 'success'.$username;
    }
}