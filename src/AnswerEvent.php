<?php

declare(strict_types=1);

namespace App;

class AnswerEvent
{
    private int $id;
    private int $userId;
    private int $questionId;
    private array $answerId;

    public function __construct(int $id, int $userId, int $questionId, array $answerId)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->questionId = $questionId;
        $this->answerId = $answerId;
    }
}