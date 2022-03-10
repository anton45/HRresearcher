<?php

namespace App;


use PDO;

class AnswerRepository
{
    private \PDO $pdo;

    public function  __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function save(Answer $answer): bool {
        $stmt = $this->pdo->prepare('INSERT INTO answer (id, answer_text, point) VALUES (:id, :answerText, :point)');
        $newId = $answer->getId();
        $newAnswerText = $answer->getanswerText();
        $newPoint = $answer->getPoint();
        $stmt->bindParam(':id', $newId);
        $stmt->bindParam(':answerText', $newAnswerText);
        $stmt->bindParam(':point', $newPoint);
        $stmt->execute();
        $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return true;
    }
        public function read(int $id = NULL) {
        if (!isset($id)) {
            $stmt = $this->pdo->prepare("SELECT * FROM answer");
            $stmt->execute();
            var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
            return true;
        }
        $stmt = $this->pdo->prepare("SELECT * FROM answer WHERE id = :id");
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
        public function update(Answer $answer)
    {
//        if (strlen($answer->$answerText) <= 1) {
//            print_r('Text answer not found');
//            return false;
//        }
        $stmt = $this->pdo->prepare('update answer set answer_text = :answerText, point = :point where id = :id');
        $newId = $answer->getId();
        $newanswerText = $answer->getanswerText();
        $newPoint = $answer->getPoint();
        $stmt->bindParam(':id', $newId, PDO::PARAM_INT);
        $stmt->bindParam(':answerText', $newanswerText,PDO::PARAM_STR);
        $stmt->bindParam(':point', $newPoint, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->fetchAll();
        print_r('true');
        return true;
    }

        public function delete($id) {
        if (!isset($id)) {
            print_r('Id is Null');
            return false;
        }
        $stmt = $this->pdo->prepare('DELETE FROM answer WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->fetchAll();
        print_r('true');
        return true;
    }
}