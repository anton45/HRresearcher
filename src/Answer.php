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
    public function generateId() {
        $pdo = new PDO("pgsql:host=localhost;dbname = hrresearch","anton_galeusov", "1212");
        $stmt = $pdo->prepare("SELECT MAX(id) FROM answer");
        $stmt->execute();
        $arraymaxId = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $maxId = $arraymaxId[0]['max'];
        $resultId = $maxId + 1;
        return $resultId;
    }
    public function createAnswer(string $answerText, int $point) {
        $id = generateId();
        $createAnswer = new Answer($id, $answerText, $point);
        $pdo = new PDO("pgsql:host=localhost;dbname = hrresearch","anton_galeusov", "1212");
        $stmt = $pdo->prepare('INSERT INTO answer (id, answer_text, point) VALUES (:id, :answerText, :point)');
        $newId = $createAnswer->getId();
        $newanswerText = $createAnswer->getanswerText();
        $newPoint = $createAnswer->getPoint();
        $stmt->bindParam(':id', $newId);
        $stmt->bindParam(':answerText', $newanswerText);
        $stmt->bindParam(':point', $newPoint);
        $stmt->execute();
        $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r('true');
        return true;
    }
    public function readAnswer(int $id = NULL) {
        $pdo = new PDO("pgsql:host=localhost;dbname = hrresearch","anton_galeusov", "1212");
        if (!isset($id)) {
            $stmt = $pdo->prepare("SELECT * FROM answer");
            $stmt->execute();
            var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
            return $stmt->execute();
        }
        $stmt = $pdo->prepare("SELECT * FROM answer WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $idDb = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($idDb) < 1) {
            print_r('false');
            return false;
        }
        var_dump($idDb);
        return true;

    }


    public function updateAnswer(int $id, string $answerText, int $point)
    {
        if (strlen($answerText) <= 1) {
            print_r('Text answer not found');
            return false;
        }
        $updateAnswer = new Answer($id, $answerText, $point);
        $pdo = new PDO("pgsql:host=localhost;dbname = hrresearch","anton_galeusov", "1212");
        $stmt = $pdo->prepare('update answer set answer_text = :answerText, point = :point where id = :id');
        $newId = $updateAnswer->getId();
        $newanswerText = $updateAnswer->getanswerText();
        $newPoint = $updateAnswer->getPoint();
        $stmt->bindParam(':id', $newId, PDO::PARAM_INT);
        $stmt->bindParam(':answerText', $newanswerText,PDO::PARAM_STR);
        $stmt->bindParam(':point', $newPoint, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->fetchAll();
        print_r('true');
        return true;
    }


    public function deleteAnswer($id)
    {
        if (!isset($id)) {
            print_r('Id is Null');
            return false;
        }
        $pdo = new PDO("pgsql:host=localhost;dbname = hrresearch","anton_galeusov", "1212");
        $stmt = $pdo->prepare('DELETE FROM answer WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->fetchAll();
        print_r('true');
        return true;
    }

}