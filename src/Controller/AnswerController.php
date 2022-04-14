<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\AnswerService;

class AnswerController
{
    private $postData;
    private $jsonBody;
    private $arrayUri;

    public function __construct(string $postData, array $jsonBody, array $arrayUri)
    {
        $this->postData = $postData;
        $this->jsonBody = $jsonBody;
        $this->arrayUri = $arrayUri;
    }

    public function main(array $jsonBody, array $arrayUri) :bool
    {
        if ($_SERVER["REQUEST_METHOD"] === "PUT" && $arrayUri[2] === 'createAnswer') {
            $answerService = new AnswerService($jsonBody);
            $result = $answerService->create($jsonBody);
            return true;
        }
        if ($_SERVER["REQUEST_METHOD"] === "GET" && $arrayUri[2] === 'readAnswer') {
            $answerService = new AnswerService($jsonBody);
            $result = $answerService->read($jsonBody);
            return true;
        }
        if ($_SERVER["REQUEST_METHOD"] === "PATCH" && $arrayUri[2] === 'updateAnswer') {
            $answerService = new AnswerService($jsonBody);
            $result = $answerService->update($jsonBody);
            return true;
        }
        if ($_SERVER["REQUEST_METHOD"] === "DELETE" && $arrayUri[2] === 'deleteAnswer') {
            // вызвать метод deleteAnswer
            $answerService = new AnswerService($jsonBody);
            $result = $answerService->delete($jsonBody);
            return true;
        }
        return false;
    }

}