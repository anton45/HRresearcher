<?php

declare(strict_types=1);

namespace App;

class Answer
{
    private int $id;
    private string $answerText;
    private int $point;

    public function __construct(int $id, string $answerText, int $point)
    {
        $this->id = $id;
        $this->answerText = $answerText;
        $this->point = $point;
    }
    public function getId() {
        return $this->id;
    }
    public function getanswerText() {
        return $this->answerText;
    }
    public function getPoint() {
        return $this->point;
    }
//
//
//
//
//    public function deleteAnswer($id)
//    {
//        if (!isset($id)) {
//            print_r('Id is Null');
//            return false;
//        }
//        $pdo = new PDO("pgsql:host=localhost;dbname = hrresearch","anton_galeusov", "1212");
//        $stmt = $pdo->prepare('DELETE FROM answer WHERE id = :id');
//        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
//        $stmt->execute();
//        $stmt->fetchAll();
//        print_r('true');
//        return true;
//    }
//
}