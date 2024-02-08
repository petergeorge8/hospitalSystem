<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
// use App\Model\Database;

class HomeController
{
    public function index(): string
    {
        // echo var_dump($_ENV['DB_HOST']);
        // exit;
        return View::make("home", ['title' => "Home", "userName" => "John Doe"]);
    }
}
