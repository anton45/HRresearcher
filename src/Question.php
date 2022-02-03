<?php

namespace HRresearcher;

class Questions
{
    public $idquestions;
    public $question;
    public $answer1;
    public $answer2;

    function __construct($idquestions, $question, $answer1, $answer2) {
        $this->idquestions = $idquestions;
        $this->question = $question;
        $this->answer1 = $answer1;
        $this->answer2 = $answer2;
    }

}