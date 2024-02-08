<?php

namespace App\Config;


class DBconfig implements \App\Config
{
    private array $config;
    public function __construct(array $env)
    {
        $this->config  = [
            'db' =>
            [
                "DB_HOST" => $env['DB_HOST'],
                "DB_USER" => $env['DB_USER'],
                "DB_PASS" => $env['DB_PASS'],
                "DB_NAME" => $env['DB_NAME']
            ]
        ];
    }
    public function __get($name): array
    {
        return $this->config[$name];
    }
}
