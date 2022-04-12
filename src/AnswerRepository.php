<?php

namespace App;


use PDO;

class AnswerRepository
{

    public function save(Answer $answer): bool {
        $pdo = new PDO("pgsql:host=localhost;dbname = hrresearch", "anton_galeusov", "1212");
        $stmt = $pdo->prepare('INSERT INTO answer (id, answer_text, point) VALUES (:id, :answerText, :point)');
        $newId = $answer->getId();
        $newAnswerText = $answer->getanswerText();
        $newPoint = $answer->getPoint();
        $stmt->bindParam(':id', $newId);
        $stmt->bindParam(':answerText', $newAnswerText);
        $stmt->bindParam(':point', $newPoint);
        $stmt->execute();
        $stmt->fetchAll(\PDO::FETCH_ASSOC);
        echo 3;
        return true;
    }
        public function read(int $id = NULL) {
        $pdo = new PDO("pgsql:host=localhost;dbname = hrresearch", "anton_galeusov", "1212");
        if (!isset($id)) {
            $stmt = $pdo->prepare("SELECT * FROM answer");
            $stmt->execute();
            var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
            echo 3;
            return true;
        }
        $stmt = $pdo->prepare("SELECT * FROM answer WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $idDb = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($idDb) < 1) {
            echo 3;
            return false;
        }
        print_r($idDb);
        return true;

    }
        public function update(Answer $answer)
    {
//        if (strlen($answer->$answerText) <= 1) {
//            print_r('Text answer not found');
//            return false;
//        }

            $pdo = new PDO("pgsql:host=localhost;dbname = hrresearch", "anton_galeusov", "1212");
        $stmt = $pdo->prepare('update answer set answer_text = :answerText, point = :point where id = :id');
        $newId = $answer->getId();
        $newanswerText = $answer->getanswerText();
        $newPoint = $answer->getPoint();
        $stmt->bindParam(':id', $newId, PDO::PARAM_INT);
        $stmt->bindParam(':answerText', $newanswerText,PDO::PARAM_STR);
        $stmt->bindParam(':point', $newPoint, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->fetchAll();
        echo 3;
        return true;
    }

        public function delete($id) {
        $pdo = new PDO("pgsql:host=localhost;dbname = hrresearch", "anton_galeusov", "1212");
        if (!isset($id)) {
            echo 3;
            return false;
        }
        $stmt = $pdo->prepare('DELETE FROM answer WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->fetchAll();
        echo 3;
        return true;
    }
    public function generateId(): int {
        $pdo = new PDO("pgsql:host=localhost;dbname = hrresearch", "anton_galeusov", "1212");
        $stmt = $pdo->prepare("SELECT MAX(id) FROM answer");
        $stmt->execute();
        $arraymaxId = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $maxId = $arraymaxId[0]['max'];
        $resultId = $maxId + 1;

        return $resultId;
    }
}