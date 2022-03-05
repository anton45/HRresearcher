<?php

declare(strict_types=1);

use App\Answer;

require_once __DIR__ . "/vendor/autoload.php";


$postData = file_get_contents('php://input');
$jsonBody = json_decode($postData, true);
$arrayUri = explode('/', $_SERVER["REQUEST_URI"]);


if ($_SERVER["REQUEST_METHOD"] === "PUT" && $arrayUri[1] = 'createAnswer') {
    $answer::createAnswer($jsonBody["answerText"], $jsonBody["point"]);
}
if ($_SERVER["REQUEST_METHOD"] === "GET" && $arrayUri[1] = 'readAnswer')  {
    $answer::readAnswer($jsonBody["id"]);
}
if ($_SERVER["REQUEST_METHOD"] === "PATCH" && $arrayUri[1] = 'updateAnswer') {
    $answer::updateAnswer($jsonBody["id"], $jsonBody["answerText"], $jsonBody["point"]);
}
if ($_SERVER["REQUEST_METHOD"] === "DELETE" && $arrayUri[1] = 'deleteAnswer') {
    $answer::deleteAnswer($jsonBody["id"]);
}



