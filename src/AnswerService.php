<?php

namespace App;

class AnswerService
{
    private \PDO $pdo;

    public function  __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function generateId(): int {
        $stmt = $this->pdo->prepare("SELECT MAX(id) FROM answer");
        $stmt->execute();
        $arraymaxId = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $maxId = $arraymaxId[0]['max'];
        $resultId = $maxId + 1;

        return $resultId;
    }
}