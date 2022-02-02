<?php
/*
 * Что я должен сделать?
 * Создать класс вопросов (Содержит: вопрос, варианты ответов, вариант правильного ответа)
 * Создать класс ответов (Содержит: вопрос, ответ пользователя)
 */
$questionsjson = file_get_contents( __DIR__ . DIRECTORY_SEPARATOR . 'questions.json' );
var_dump($questionsjson);
