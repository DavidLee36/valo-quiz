<?php

require('sql-data-provider.class.php');

class QuestionModel extends MySQLDataProviderModel {

    public function getAllQuestions() {
        return $this->query('SELECT * FROM questions ORDER BY category_id', [], 'Question');
    }

    public function getAllQuestionsInCategory($category) {
        return $this->query('SELECT * FROM questions WHERE category_id = :id', [':id' => $category], 'Question');
    }

    public function getQuestion($id) {
        $questionsList = $this->query('SELECT * FROM questions WHERE id = :id', [':id' => $id], 'Question');
        return $questionsList[0];
    }

    public function addQuestion($question) {
        $this->execute(
            'INSERT INTO questions (question, category_id, possible_answers, correct_answer, image_url) VALUES (:question, :category, :possible_answers, :correct_answer, :image_url)',
            [
                ':question' => $question['question'],
                ':category' => $question['category'],
                ':possible_answers' => json_encode($question['possibleAnswers']),
                ':correct_answer' => $question['correctAnswer'],
                ':image_url' => $question['imageURL']
            ]
        );
    }

    public function editQuestion($question) {
        $this->execute(
            'UPDATE questions SET question = :question, category_id = :category, possible_answers = :possible_answers, correct_answer = :correct_answer, image_url = :image_url WHERE id = :id',
            [
                ':question' => $question['question'],
                ':category' => $question['category'],
                ':possible_answers' => json_encode($question['possibleAnswers']),
                ':correct_answer' => $question['correctAnswer'],
                ':image_url' => $question['imageURL'],
                ':id' => $question['id']
            ]
        );
    }

    public function deleteQuestion($id) {
        $this->execute(
            'DELETE FROM questions WHERE id = :id',
            [':id' => $id]
        );
    }
}