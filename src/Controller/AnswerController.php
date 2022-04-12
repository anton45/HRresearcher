<?php

namespace App\Controller;

use App\Service\AnswerService;

class AnswerController
{
    private $postData;
    private $jsonBody;
    private $arrayUri;

    public function __construct($postData, $jsonBody, $arrayUri)
    {
        $this->postData = $postData;
        $this->jsonBody = $jsonBody;
        $this->arrayUri = $arrayUri;
    }

    public function main($jsonBody, $arrayUri)
    {
        if ($_SERVER["REQUEST_METHOD"] === "PUT" && $arrayUri[2] === 'createAnswer') {
            $answerService = new AnswerService($jsonBody);
            $result = $answerService->create($jsonBody);
            echo 2;
        }
        if ($_SERVER["REQUEST_METHOD"] === "GET" && $arrayUri[2] === 'readAnswer') {
            $answerService = new AnswerService($jsonBody);
            $result = $answerService->read($jsonBody);
            echo 2;
        }
        if ($_SERVER["REQUEST_METHOD"] === "PATCH" && $arrayUri[2] === 'updateAnswer') {
            $answerService = new AnswerService($jsonBody);
            $result = $answerService->update($jsonBody);
            echo 2;
        }
        if ($_SERVER["REQUEST_METHOD"] === "DELETE" && $arrayUri[2] === 'deleteAnswer') {
            // вызвать метод deleteAnswer
            $answerService = new AnswerService($jsonBody);
            $result = $answerService->delete($jsonBody);
            echo 2;
        }
    }

}