<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
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

        $user = new User();

        if ($request->isPost()) {


            $user->loadData($request->getBody());


            if ($user->validate() && $user->register()){

                return 'Success';
            }

            echo "<pre>";
            var_dump($user->errors);
            echo "</pre>";
            exit;
            return $this->render('auth/register' , [
               'model' => $user
            ]);

        }

        return $this->render('auth/register');
    }


}