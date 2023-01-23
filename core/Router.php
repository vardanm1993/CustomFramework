<?php

namespace Core;

use Closure;

class Router
{

    public Request $request;
    public Response $response;
    protected array $routes = [];


    /**
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @param string $path
     * @param string|array|Closure $callback
     * @return void
     */
    public function get(string $path, string|array|Closure $callback): void
    {
        $this->routes['get'][$path] = $callback;

    }

    /**
     * @param string $path
     * @param string|array|Closure $callback
     * @return void
     */
    public function post(string $path, string|array|Closure $callback): void
    {
        $this->routes['post'][$path] = $callback;

    }

    /**
     * @return false|array|string
     */
    public function resolve(): false|array|string
    {
        $path = $this->request->getPath();
        $method = $this->request->method();

        $callback = $this->routes[$method][$path] ?? false;


        if (!$callback) {
            $this->response->setStatusCode(404);
            return Application::$app->view->renderView("errors/_404");
        }

        if (is_string($callback)) {
            return Application::$app->view->renderView($callback);
        }

        if (is_array($callback)) {
            Application::$app->controller = new $callback[0];
            $callback[0] = Application::$app->controller;
        }

        return call_user_func($callback, $this->request);
    }

}