<?php

namespace app;


use app\Services\TransactionService;
use Exception;

class App
{
    public function run()
    {
        header("Content-Type: application/json");
        $service = new TransactionService();

        try {
            if ($transactions = $service->getTransactionsByUser($_REQUEST['user_id']) == 0) {
                echo json_encode(['message' => 'Bad request', 'status' => 403]);
                exit();
            }

            $balance = $service->getBalanceByUser($transactions, $_REQUEST['user_id']);
            echo json_encode(['balance' => $balance, 'status' => 200]);
            exit();
        } catch (Exception $e) {
            \app\Services\LogService::log(
                message: $e->getMessage(),
                level: \Monolog\Level::Alert,
            );
        }
    }
}