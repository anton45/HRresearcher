<?php

declare(strict_types=1);

use App\Answer;
use App\Controller\ControllerAnswer;

require_once __DIR__ . "/vendor/autoload.php";


$postData = file_get_contents('php://input');
$jsonBody = json_decode($postData, true);
$arrayUri = explode('/', $_SERVER["REQUEST_URI"]);

if ($arrayUri[0] === 'answer') {
    $controller = new ControllerAnswer($postData, $jsonBody, $arrayUri);
    $result = $controller->main($jsonBody, $arrayUri);
}
echo 3423;
