<?php

namespace app\Services;

use app\Repositories\MySqlStorage;
use PDO;

class TransactionService
{
    private static function connect(): PDO
    {
        return (new MySqlStorage())->connect();
    }
    public function getTransactionsByUser(int $userId): false|\PDOStatement
    {
        $sql = "SELECT * FROM transactions WHERE paid_to=$userId OR paid_by=$userId";

        return self::connect()->query($sql);
    }

    public function getBalanceByUser($transactionsByUser, int $userId): float
    {
        $balance = 0;

        while($row = $transactionsByUser->fetch_assoc()) {
             if ($row['paid_to'] == $userId) {
                $balance += $row['amount'];
            }
             if ($row['paid_by'] == $userId) {
                $balance -= $row['amount'];
            }
        }

        return $balance;
    }
}