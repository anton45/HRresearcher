<?php

namespace App;

use App\Controller\AnswerController;

require_once __DIR__ . '/../vendor/autoload.php';


$postData = file_get_contents('php://input');
$jsonBody = json_decode($postData, true);
$arrayUri = explode('/', $_SERVER["REQUEST_URI"]);

$controller = new AnswerController($postData, $jsonBody, $arrayUri);
$result = $controller->main($jsonBody, $arrayUri);
echo 1;
