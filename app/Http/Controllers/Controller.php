<?php

namespace App\Http\Controllers;

use App\Components\Config;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //
    public $user;
    public function __construct()
    {
//        $this->middleware('auth');
//        $this->middleware('permission');
    }
    /**
     * @ignore
     * Validate the given request with the given rules.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  array                    $rules
     * @param  array                    $messages
     * @param  array                    $customAttributes
     * @return bool|string
     */
    public function validate(Request $request, array $rules, array $messages = [], array $customAttributes = [])
    {
        $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages, $customAttributes);

        if ($validator->fails()) {
            return $validator->errors()->first();
        }
        return true;
    }

    /**
     * @param $data
     * @return mixed
     */
    protected function corsReturn($data)
    {
        return (new Response($data))
            ->header('Content-Type', 'application/json')
            ->header('Access-Control-Allow-Origin', Config::get('app.origin'))
            ->header('Access-Control-Allow-Credentials', 'true')
            ->header('Access-Control-Expose-Headers', 'Set-Cookie')
            ->header('Vary', 'Origin')
            ->header('Vary', 'Accept-Encoding');
    }
    /**
     * @param $code
     * @param null $msg
     * @return mixed
     */
    protected function errorCode($code, $msg = null)
    {
        $error = Config::get('error');
        if ($msg === null) {
            $msg = isset($error[$code]) ? $error[$code] : '';
        }

        return $this->corsReturn(
            [
                'res' => $code,
                'msg' => $msg,
                'obj' => null,
                'map' => null,
                'list' => null,
            ]
        );
    }
}
