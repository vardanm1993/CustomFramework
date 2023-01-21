<?php

namespace Core;

class Controller
{
    public string $layout = 'main';

    /**
     * @param $layout
     * @return void
     */
    public function setLayout($layout): void
    {
        $this->layout = $layout;
    }


    /**
     * @param $view
     * @param array $params
     * @return array|false|string
     */
    public function render($view, array $params = []): false|array|string
    {
        return Application::$app->router->renderView($view,$params);
    }
}