<?php

declare(strict_types=1);

namespace App;

class Answerevent
{
    public int $id;
    public int $questionId;
    private array $answers;
}