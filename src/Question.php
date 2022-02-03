<?php

declare(strict_types=1);

namespace App;

class Question
{
    private int $id;
    private string $questionText;
    private array $answers;

    public function __construct(int $id, string $questionText, array $answers)
    {
        $this->id = $id;
        $this->questionText = $questionText;
        $this->answers = $answers;
    }

}