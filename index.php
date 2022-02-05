<?php

declare(strict_types=1);

use App\Answer;
use App\Question;

require_once __DIR__ . "/vendor/autoload.php";

/*
 * Что я должен сделать?
 * Создать класс вопросов (Содержит: вопрос, варианты ответов, вариант правильного ответа)
 * Создать класс ответов (Содержит: вопрос, ответ пользователя)
 */
//$questionsjson = file_get_contents( __DIR__ . DIRECTORY_SEPARATOR . 'questions.json' );
//var_dump($questionsjson);

//$answer = new Answer(0, 'yes', 2);
//var_dump($answer);

//$answerJsonstring = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'answers.json');
//$answerJson = json_decode($answerJsonstring);
//foreach ($answerJson as $numberAswer => $aswerObject) {
//    $answer = new Answer($aswerObject->id, $aswerObject->answerText, $aswerObject->point);
//    var_dump($answer);
//}
$questionsJsonstring = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'questions.json');
$questionsJson = json_decode($questionsJsonstring);
foreach ($questionsJson as $elementJson => $questionObject) {
    var_dump($questionObject->id);
    $questions = new Question($questionObject->id, $questionObject->questionText, $questionObject->answers);
}