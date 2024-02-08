<?php

namespace App\Exceptions;

use App\View;

class NotFound extends \Exception
{
    // public static function notFoundPage(): string
    // {
    //     header('HTTP/1.0 404 Not Found');
    //     // header('Location: /view/notFound');
    //     return View::make("Exceptions/notfound");
    // }
    public function __construct()
    {
        $this->message = "error 404";
    }
}
