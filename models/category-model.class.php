<?php

//Class to handle communication with the question_categories table of the database
class CategoryModel extends MySQLDataProviderModel {
    public function getAllCategories() {
        return $this->query('SELECT * FROM question_categories', [], 'QuestionCategory');
    }

    public function getCategory($id) {
        $categoryList = $this->query('SELECT * FROM question_categories WHERE id = :id', [':id' => $id], 'QuestionCategory');
        return $categoryList[0];
    }

    public function getNumQuestionsInCategory($id) {
        $result = $this->query(
            'SELECT COUNT(*) as num_questions FROM questions WHERE category_id = :id',
            [':id' => $id]
        );
    
        return $result[0]['num_questions'] ?? 0; // Return the count or 0 if no questions are found
    }

    public function addCategory($category) {
        $this->execute(
            'INSERT INTO question_categories (name) VALUES (:name)',
            [
                ':name' => $category['name']
            ]
        );
    }

    public function editCategory($category) {
        $this->execute(
            'UPDATE question_categories SET name = :name WHERE id = :id',
            [
                ':id' => $category['id'],
                ':name' => $category['name']
            ]
        );
    }

    public function deleteCategory($id) {
        $this->execute(
            'DELETE FROM question_categories WHERE id = :id',
            [':id' => $id]
        );
    }
}