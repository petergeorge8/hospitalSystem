<?php

namespace App;

interface Config
{
    public function __get($name): array;
}
