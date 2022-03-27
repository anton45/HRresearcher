<?php

namespace App\Service;

use App\Answer;
use App\AnswerRepository;

class AnswerService
{
    private $jsonBody;

    public function __construct($jsonBody)
    {
        $this->jsonBody = $jsonBody;
    }

    public function create($jsonBody) {
        $answerRepository = new AnswerRepository();
        $id = $answerRepository->generateId();
        $answer = new Answer($id, $jsonBody["answerText"], $jsonBody["point"]);
        $answerRepository = new AnswerRepository();
        $result = $answerRepository->save($answer);
        echo 123;
    }

    public function read ($jsonBody) {
        $answerRepository = new AnswerRepository();
        $id = $jsonBody["id"];
        $result = $answerRepository->read($id);
        echo 123;
    }

    public function update($jsonBody) {
        $answerRepository = new AnswerRepository();
        $answer = new Answer($jsonBody["id"], $jsonBody["answerText"], $jsonBody["point"]);
        $result = $answerRepository->update($answer);
        echo 123;
    }

    public function delete($jsonBody) {
        $answerRepository = new AnswerRepository();
        $id = $jsonBody["id"];
        $result = $answerRepository->delete($id);
        echo 123;
    }
}