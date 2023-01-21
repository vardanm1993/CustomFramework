<?php

namespace App\Http\Controllers;

use Core\Controller;
use Core\Request;


class SiteController extends Controller
{
    /**
     * @return string
     */
    public function contact(): string
    {
        return $this->render('contacts/contact');
    }

    /**
     * @return string
     */
    public function home(): string
    {
        $params = [
            'name' => "Home"
        ];
        return $this->render('home',$params);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function storeContact(Request $request): string
    {
        $params = $request->getBody();
        return "handling subbmited data";
    }
}