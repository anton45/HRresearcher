<?php

namespace App\Controller;

use PDO;
use App\AnswerRepository;
use App\Answer;
use App\AnswerService;

class ControllerAnswer
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
            $pdo = new PDO("pgsql:host=localhost;dbname = hrresearch", "anton_galeusov", "1212");
            $answerService = new AnswerService($pdo);
            $id = $answerService->generateId();
            $answer = new Answer($id, $jsonBody["answerText"], $jsonBody["point"]);

            $answerRepository = new AnswerRepository($pdo);
            $result = $answerRepository->save($answer);
            echo 123;
        }
        if ($_SERVER["REQUEST_METHOD"] === "GET" && $arrayUri[2] === 'readAnswer') {
            $pdo = new PDO("pgsql:host=localhost;dbname = hrresearch", "anton_galeusov", "1212");

            $answerRepository = new AnswerRepository($pdo);
            $id = $jsonBody["id"];
            $result = $answerRepository->read($id);
            echo 123;
        }
        if ($_SERVER["REQUEST_METHOD"] === "PATCH" && $arrayUri[2] === 'updateAnswer') {
            $pdo = new PDO("pgsql:host=localhost;dbname = hrresearch", "anton_galeusov", "1212");

            $answerRepository = new AnswerRepository($pdo);
            $answer = new Answer($jsonBody["id"], $jsonBody["answerText"], $jsonBody["point"]);
            $result = $answerRepository->update($answer);
            echo 123;
        }
        if ($_SERVER["REQUEST_METHOD"] === "DELETE" && $arrayUri[2] === 'deleteAnswer') {
            // вызвать метод deleteAnswer
            $pdo = new PDO("pgsql:host=localhost;dbname = hrresearch", "anton_galeusov", "1212");
            $answerRepository = new AnswerRepository($pdo);
            $id = $jsonBody["id"];
            $result = $answerRepository->delete($id);
            echo 123;
        }
    }

}