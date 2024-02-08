<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\NotFound;
use App\Database;

class App
{
    private static Database $instanceDB;
    public function __construct(
        protected Router $route,
        protected array $request,
        protected \App\Config\DBconfig $config
    ) {
        static::$instanceDB = new Database($this->config->db);
    }
    public static function getDB(): Database
    {
        return static::$instanceDB;
    }
    public function run()
    {
        try {
            $this->route->reslove($this->request['uri'], strtolower($this->request['method']));
        } catch (NotFound $e) {
            return View::make("Exceptions/NotFound.php");
        }
    }
}
