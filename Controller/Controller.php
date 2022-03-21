<?php

namespace App\Controller;

use PDO;
use App\AnswerRepository;
use App\Answer;

class Controller
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
        if ($_SERVER["REQUEST_METHOD"] === "PUT" && $arrayUri[1] = 'createAnswer') {
            $pdo = new PDO("pgsql:host=localhost;dbname = hrresearch", "anton_galeusov", "1212");
            $answerService = new \App\AnswerService($pdo);
            $id = $answerService->generateId();
            $answer = new \App\Answer($id, $jsonBody["answerText"], $jsonBody["point"]);

            $answerRepository = new \App\AnswerRepository($pdo);
            $result = $answerRepository->save($answer);
            echo 123;
        }
        if ($_SERVER["REQUEST_METHOD"] === "GET" && $arrayUri[1] = 'readAnswer') {
            $pdo = new PDO("pgsql:host=localhost;dbname = hrresearch", "anton_galeusov", "1212");


            $answerRepository = new \App\AnswerRepository($pdo);
            $id = $jsonBody["id"];
            $result = $answerRepository->read($id);
            echo 123;
        }
        if ($_SERVER["REQUEST_METHOD"] === "PATCH" && $arrayUri[1] = 'updateAnswer') {
            $pdo = new PDO("pgsql:host=localhost;dbname = hrresearch", "anton_galeusov", "1212");

            $answerRepository = new \App\AnswerRepository($pdo);
            $answer = new Answer($jsonBody["id"], $jsonBody["answerText"], $jsonBody["point"]);
            $result = $answerRepository->update($answer);
            echo 123;
        }
        if ($_SERVER["REQUEST_METHOD"] === "DELETE" && $arrayUri[1] = 'deleteAnswer') {
            // вызвать метод deleteAnswer
            $pdo = new PDO("pgsql:host=localhost;dbname = hrresearch", "anton_galeusov", "1212");
            $answerRepository = new AnswerRepository($pdo);
            $id = $jsonBody["id"];
            $result = $answerRepository->delete($id);
            echo 123;
        }
    }

}