<?php

declare(strict_types=1);

use App\Answer;
use App\Question;
use App\AnswerEvent;

require_once __DIR__ . "/vendor/autoload.php";

/*
 * Основная схема хранения и хренения и изменения данных классов
 * Читаю файл
 * Данные файла прогоняю через класс
 * Получаю массив объектов с анонимными свойства класса
 * Сериализую
 * Записываю в Json
 */
$pdo = new PDO("pgsql:host=localhost;dbname = hrresearch","anton_galeusov", "1212");
$stmt = $pdo->prepare("SELECT * FROM answer");
$stmt->execute();

var_dump($stmt->fetchAll());
//$test = "INSERT INTO answer (id, answer_text, point) VALUES (10, 'sdfsfd', 34);";ext-pdo' is
//$connection->exec($test);
//echo 'sdfsdf';
//print_r(PDO::getAvailableDrivers());

//$postData = file_get_contents('php://input');
//$jsonBody = json_decode($postData, true);
//var_dump($_SERVER["REQUEST_URI"]);
//var_dump($GLOBALS["jsonBody"]);
//var_dump($jsonBody["id"]);
//if ($_SERVER["REQUEST_METHOD"] === "PUT") {
//    createAnswer($jsonBody["id"], $jsonBody["answerText"], $jsonBody["point"]);
//}
//if ($_SERVER["REQUEST_METHOD"] === "GET") {
//    readAnswer($jsonBody["id"]);
//}
//if ($_SERVER["REQUEST_METHOD"] === "PATCH") {
//    return updateAnswer($jsonBody["id"], $jsonBody["answerText"], $jsonBody["point"]);
//}
//if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
//    deleteAnswer($jsonBody["id"]);
//}
//
//
//function getJson(string $fileName) {
//    $jsonString = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . $fileName);
//    $json = json_decode($jsonString);
//    return $json;
//}

// Test class Answer
//function testclassAnswer()
//{
//    $jsonAnswer = getJson('answers.json');
//    foreach ($jsonAnswer as $answerObject) {
//        $answer = new Answer($answerObject->id, $answerObject->answerText, $answerObject->point);
//        var_dump($answer);
//    }
//}
//testclassAnswer();


// Test class Questions
//function testclassQuestion()
//{
//    $jsonQuestion = getJson('questions.json');
//    foreach ($jsonQuestion as $questionObject) {
//        $questions = new Question ($questionObject->id, $questionObject->questionText, (array)$questionObject->answers);
//        var_dump($questions);
//    }
//}
//testclassQuestion();


// Test class Answerevent
//function testclassAnswerevent()
//{
//    $jsonAnswerevent = getJson('answerevent.json');
//    foreach ($jsonAnswerevent as $answereventObject) {
//        $answerEvent = new AnswerEvent($answereventObject->id, $answereventObject->userId, $answereventObject->questionId, (array)$answereventObject->answerId);
//        var_dump($answerEvent);
//    }
//}
//testclassAnswerevent();

//function serializeAnswer($answers) {
//    foreach ($answers as $answer) {
//        $array = $array["id"=>($answer->id)]
//        var_dump($array);
//    }
//}
//
//serializeAnswer(testclassAnswer());
//
//


//
////Допилить для каждого класса 3 функционала:
////- удалить объект по id
//
////- добавить
////- изменить
//
//function deleteAnswer($id)
//{
//    $jsonAnswer = getJson('answers.json');
//    foreach ($jsonAnswer as $answerObject) {
//        $answer = new Answer($answerObject->id, $answerObject->answerText, $answerObject->point);
//        if ($id != $answer->getId()) {
//            $answerId = $answer->getId();
//            $answerText = $answer->getanswerText();
//            $point = $answer->getPoint();
//            $newAnswer[] = ["id" => $answerId, "answerText" => $answerText, "point" => $point];
//        }
//    }
//
//    $newAnsweroffnull = array_filter($newAnswer);
//    $newAnsweroffnulljson = json_encode($newAnsweroffnull);
//    $safeAnswer = file_put_contents('answers.json', $newAnsweroffnulljson);
//    return $safeAnswer;
//}
//deleteAnswer(2);
//
//function updateAnswer(int $id, string $answerText, int $point) {
//    $jsonAnswer = getJson('answers.json');
//    foreach ($jsonAnswer as $answerObject) {
//        if ($id === $answerObject->id) {
//            $answerObject->answerText = $answerText;
//            $answerObject->point = $point;
//        }
//        $newAnswer[] = $answerObject;
//    }
//    $newAnsweroffnulljson = json_encode($newAnswer);
//    $safeAnswer = file_put_contents('answers.json', $newAnsweroffnulljson);
//
//    var_dump($safeAnswer);
//    return $safeAnswer;
//}
//
// Добавление нового ответа
//function createAnswer(int $id, string $answerText, int $point) {
//    $jsonAnswer = getJson('answers.json');
//    $createAnswer = new Answer($id, $answerText, $point);
//    $jsonAnswer[] = ["id" => $createAnswer->getId(), "answerText" => $createAnswer->getanswerText(), "point" => $createAnswer->getPoint()];
//    $newAnsweroffnull = array_filter($jsonAnswer);;
//        $newAnsweroffnulljson = json_encode($newAnsweroffnull);
//        $safeAnswer = file_put_contents('answers.json', $newAnsweroffnulljson);
//
//        return true;
//}
//createAnswer(77, 'test', 16);

// Чтение ответов
//function readAnswer(array $arrayId) {
//    $jsonAnswer = getJson('answers.json');
//    foreach ($jsonAnswer as $answerObject) {
//        foreach ($arrayId as $id){
//            if ($answerObject->id === $id) {
//                $readAnswer[] = ["id" => $answerObject->id, "answerText"=> $answerObject->answerText, "point"=>$answerObject->point];
//            }
//        }
//    }
//    var_dump($readAnswer);
//    return $readAnswer;
//}
//readAnswer([1,3]);

// Редактирование ответа
//function updateAnswer(int $id, string $answerText, int $point)
//{
//    if (strlen($answerText) <= 1) {
//        print_r('Text answer not found');
//        return false;
//    }
//    $jsonAnswer = getJson('answers.json');
//    $updateAnswer = new Answer($id, $answerText, $point);
//    foreach ($jsonAnswer as $answerObject) {
//        if ($answerObject->id === $updateAnswer->getId()) {
//            $answerObject->answerText = $updateAnswer->getanswerText();
//            $answerObject->point = $updateAnswer->getPoint();
//        }
//    }
//    $readanswerJson = json_encode($jsonAnswer);
//    $safeAnswer = file_put_contents('answers.json', $readanswerJson);
//
//    return true;
//}

//updateAnswer(1, 'sdfsf', 54);

//function deleteAnswer(array $arrayId)
//{
//    if (count($arrayId) < 1) {
//        print_r('No elements found in the array');
//        return false;
//    }
//    $jsonAnswer = getJson('answers.json');
//    var_dump($jsonAnswer);
//    foreach ($jsonAnswer as $answerObject) {
//        if (!in_array($answerObject->id, $arrayId)) {
//            $validAnswer[] = ["id" => $answerObject->id, "answerText" => $answerObject->answerText, "point" => $answerObject->point];
//        }
//    }
//    $validanswerJson = json_encode($validAnswer);
//    var_dump($validanswerJson);
//    $safeAnswer = file_put_contents('answers.json', $validanswerJson);
//    print_r('true');
//    return true;
//}

//deleteAnswer([]);


//$answer1 = new Answer(10, 'TestTest', 20);
//$result = $answer1->getId();
//var_dump($result);

//echo $answer1->getId();
//echo $answer1->getanswerText();
//echo $answer1->getPoint();

