<?php

class QuestionMapper extends Mapper
{
    public function getQuestions($user_id_param) {
        $sql = "SELECT * from question where $user_id_param=:$user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(["user_id_param" => $user_id]);

        return new UserEntity($stmt->fetch());


        $results = [];
        while($row = $stmt->fetch()) {
            $results[] = new TicketEntity($row);
        }
        return $results;
    }

    public function getQuestionById($question_id_param) {
        $sql = "SELECT * from question where question_id_param = :id";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(["question_id_param" => $id]);

        if($result) {
            return new QuestionEntity($stmt->fetch());
        }

    }

    public function save(QuestionEntity $question) {
        $sql = "insert into question
            (title, question_text, user_id) values
            (:title, :question_text,:user_id)";

        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([
            "title" => $ticket->getTitle(),
            "question_text" => $ticket->getQuestion_Text(),
        ]);

        if(!$result) {
            throw new Exception("could not save record");
        }
    }
}
