<?php

namespace App\Http\Controllers\Auth;

use Core\Controller;
use Core\Request;

class AuthController extends Controller
{

    /**
     * @param Request $request
     * @return false|array|string
     */
    public function login(Request $request): false|array|string
    {
        $this->setLayout('auth');

        if ($request->isPost()) {
            return "handling";
        }

        return $this->render('auth/login');
    }

    /**
     * @param Request $request
     * @return false|array|string
     */
    public function register(Request $request): false|array|string
    {
        $this->setLayout('auth');

        if ($request->isPost()) {
            return "handling";
        }

        return $this->render('auth/register');
    }


}