<?php

declare(strict_types=1);

use App\Answer;
use App\Question;
use App\AnswerEvent;

require_once __DIR__ . "/vendor/autoload.php";

/*
 * Что я должен сделать?
 * Создать класс вопросов (Содержит: вопрос, варианты ответов, вариант правильного ответа)
 * Создать класс ответов (Содержит: вопрос, ответ пользователя)
 */

function getJson(string $fileName) {
    $jsonString = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . $fileName);
    $json = json_decode($jsonString);
    return $json;
}


function testclassAnswer()
{
    $jsonAnswer = getJson('answers.json');
    foreach ($jsonAnswer as $answerObject) {
        $answer = new Answer($answerObject->id, $answerObject->answerText, $answerObject->point);
        var_dump($answer);
    }
}

function testclassQuestion()
{
    $jsonQuestion = getJson('questions.json');
    foreach ($jsonQuestion as $questionObject) {
        $questions = new Question ($questionObject->id, $questionObject->questionText, (array)$questionObject->answers);
        var_dump($questions);
    }
}

function testclassAnswerevent()
{
    $jsonAnswerevent = getJson('answerevent.json');
    foreach ($jsonAnswerevent as $answereventObject) {
        $answerEvent = new AnswerEvent($answereventObject->id, $answereventObject->userId, $answereventObject->questionId, (array)$answereventObject->answerId);
        var_dump($answerEvent);
    }
}

//Допилить для каждого класса 3 функционала:
//- удалить объект по id

//- добавить
//- изменить

function deleteidAnswer($id)
{
    $jsonAnswer = getJson('answers.json');
    foreach ($jsonAnswer as $answerObject) {
        if ($id === $answerObject->id) {
            unset($answerObject);
        }
        $newAnswer[] = $answerObject;
    }
    $newAnsweroffnull = array_filter($newAnswer);
    $newAnsweroffnulljson = json_encode($newAnsweroffnull);
    $safeAnswer = file_put_contents('answers.json', $newAnsweroffnulljson);
    return $safeAnswer;
}
deleteidAnswer(2);

