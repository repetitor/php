<?php

namespace app\Contracts;

use PDO;

interface Storage
{
    public function connect(): PDO;
}