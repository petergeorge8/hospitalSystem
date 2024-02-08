<?php

namespace App\Model;

use App\Database;

abstract class Model
{

    protected Database $db;

    public function __construct()
    {
        $this->db = \App\App::getDB();
    }
}
