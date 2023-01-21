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


        if ($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView("errors/_404");
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)) {
            Application::$app->controller = new $callback[0];
            $callback[0] = Application::$app->controller;
        }

        return call_user_func($callback, $this->request);
    }

    /**
     * @param string $view
     * @param array $params
     * @return array|false|string
     */
    public function renderView(string $view, array $params = []): array|false|string
    {
        $viewContent = $this->renderOnlyView($view, $params);
        return $this->renderContent($viewContent);
    }

    /**
     * @param string $viewContent
     * @return array|false|string
     */
    public function renderContent(string $viewContent): array|false|string
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);

    }

    /**
     * @return false|string
     */
    protected function layoutContent(): false|string
    {
        $layout = Application::$app->controller->layout;
        ob_start();
        include_once Application::$ROOT_DIR . "/resources/views/layouts/$layout.php";
        return ob_get_clean();
    }

    /**
     * @param string $view
     * @param array $params
     * @return false|string
     */
    protected function renderOnlyView(string $view, array $params = []): false|string
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once Application::$ROOT_DIR . "/resources/views/$view.php";
        return ob_get_clean();
    }
}