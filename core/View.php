<?php

namespace Core;

class View
{
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