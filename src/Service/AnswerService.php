<?php

declare(strict_types=1);

namespace App\Service;

use App\Answer;
use App\AnswerRepository;

class AnswerService
{
    private array $jsonBody;

    public function __construct(array $jsonBody)
    {
        $this->jsonBody = $jsonBody;
    }

    public function create(array $jsonBody) {
        $answerRepository = new AnswerRepository();
        $id = $answerRepository->generateId();
        $answer = new Answer($id, $jsonBody["answerText"], $jsonBody["point"]);
        $answerRepository = new AnswerRepository();
        $result = $answerRepository->save($answer);
        return true;
    }

    public function read (array $jsonBody) :bool {
        $answerRepository = new AnswerRepository();
        $id = $jsonBody["id"];
        $result = $answerRepository->read($id);
        return true;
    }

    public function update(array $jsonBody) :bool {
        $answerRepository = new AnswerRepository();
        $answer = new Answer($jsonBody["id"], $jsonBody["answerText"], $jsonBody["point"]);
        $result = $answerRepository->update($answer);
        return true;
    }

    public function delete(array $jsonBody) :bool {
        $answerRepository = new AnswerRepository();
        $id = $jsonBody["id"];
        $result = $answerRepository->delete($id);
        return true;
    }
}