<?php

declare(strict_types=1);

use App\Answer;

require_once __DIR__ . "/vendor/autoload.php";


$postData = file_get_contents('php://input');
$jsonBody = json_decode($postData, true);
$arrayUri = explode('/', $_SERVER["REQUEST_URI"]);


if ($_SERVER["REQUEST_METHOD"] === "PUT" && $arrayUri[1] = 'createAnswer') {
    $pdo = new PDO("pgsql:host=localhost;dbname = hrresearch","anton_galeusov", "1212");


    $answerService = new \App\AnswerService($pdo);
    $id = $answerService->generateId();
    $answer = new Answer($id, $jsonBody["answerText"], $jsonBody["point"]);

    $answerRepository = new \App\AnswerRepository($pdo);
    $result = $answerRepository->save($answer);
    echo 123;
//    $answer::createAnswer($jsonBody["answerText"], $jsonBody["point"]);
}
if ($_SERVER["REQUEST_METHOD"] === "GET" && $arrayUri[1] = 'readAnswer')  {
    $pdo = new PDO("pgsql:host=localhost;dbname = hrresearch","anton_galeusov", "1212");


    $answerRepository = new \App\AnswerRepository($pdo);
    $id = $jsonBody["id"];
    $result = $answerRepository->read($id);
    echo 123;
//    $answer::readAnswer($jsonBody["id"]);
}
if ($_SERVER["REQUEST_METHOD"] === "PATCH" && $arrayUri[1] = 'updateAnswer') {
    $pdo = new PDO("pgsql:host=localhost;dbname = hrresearch","anton_galeusov", "1212");

    $answerRepository = new \App\AnswerRepository($pdo);
    $answer = new Answer($jsonBody["id"], $jsonBody["answerText"], $jsonBody["point"]);
    $result = $answerRepository->update($answer);
    echo 123;
}
if ($_SERVER["REQUEST_METHOD"] === "DELETE" && $arrayUri[1] = 'deleteAnswer') {
    $pdo = new PDO("pgsql:host=localhost;dbname = hrresearch","anton_galeusov", "1212");
    $answerRepository = new \App\AnswerRepository($pdo);
    $id = $jsonBody["id"];
    $result = $answerRepository->delete($id);
    echo 123;
}



