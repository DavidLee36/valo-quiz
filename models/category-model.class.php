<?php

require('sql-data-provider.class.php');


//Class to handle communication with the question_categories table of the database
class CategoryModel extends MySQLDataProviderModel {
    public function getAllCategories() {
        return $this->query('SELECT * FROM question_categories', [], 'QuestionCategory');
    }

    public function getCategory($id) {
        $categoryList = $this->query('SELECT * FROM questions WHERE id = :id', [':id' => $id], 'QuestionCategory');
        return $categoryList[0];
    }

    public function addCategory($category) {
        $this->execute(
            'INSERT INTO question_categories (id, name) VALUES (:id, :name)',
            [
                ':id' => $category['id'],
                ':name' => $category['name']
            ]
        );
    }

    public function editCategory($category) {
        $this->execute(
            'UPDATE question_categories SET name = :name WHERE id = :id',
            [
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