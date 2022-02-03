<?php

declare(strict_types=1);

namespace App;

class Answer
{
    private int $id;
    private string $answerText;
    private int $point;

    public function __construct(int $id, string $answerText, int $point)
    {
        $this->id = $id;
        $this->answerText = $answerText;
        $this->point = $point;
    }
}