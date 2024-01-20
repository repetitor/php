<?php

namespace app\Repositories;

use app\Contracts\Storage;
use Dotenv\Dotenv;
use PDO;
use PDOException;

class MySqlStorage implements Storage
{
    private ?PDO $connection = null;

    public function connect(): PDO
    {
        if ($this->connection === null) {
            $params = Dotenv::createImmutable(__DIR__.'/../..');
            $servername = $params['DB_HOST'];
            $dbname = $params['DB_DATABASE'];
            $username = $params['DB_USERNAME'];
            $password = $params['DB_PASSWORD'];

            try {
                $this->connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            } catch(PDOException $e) {
                // todo: log
            }
        }

        return $this->connection;
    }
}