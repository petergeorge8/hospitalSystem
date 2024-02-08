<?php

declare(strict_types=1);

namespace App;

class View
{
    /**
     * View constructor.
     *
     * @param string $view The path to the view file.
     * @param array $params The parameters to be passed to the view.
     */
    public function __construct(
        protected string $view,
        protected array $params = []
    ) {
    }

    /**
     * Create a new View instance and render the view.
     *
     * @param string $view The path to the view file.
     * @param array $params The parameters to be passed to the view.
     * @return string The rendered view.
     */
    public static function make(string $view, array $params = []): string
    {
        return (new static($view, $params))->render();
    }

    /**
     * Render the view.
     *
     * @return string The rendered view.
     */
    public function render(): string
    {
        if (!empty($this->params)) {
            extract($this->params);
        }

        $content_path = VIEWS_DIR . $this->view . ".php";
        if (!file_exists($content_path)) {
            return View::make("Exceptions/notfound");
        }

        ob_start();
        include($content_path);  // Include the content file
        $content = ob_get_flush();
        ob_get_clean();


        $layout_path = VIEWS_DIR . "Template/layout.php";
        if (!file_exists($layout_path)) {
            return View::make("Exceptions/notfound");
            // Exceptions\NotFound::notFoundPage();
            // throw new \App\Exceptions\NotFound;
        }

        ob_start();
        include($layout_path);  // Include the layout file
        $output = ob_get_flush();
        return $output;
    }
}
