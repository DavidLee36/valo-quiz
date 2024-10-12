<?php
//For this project, we are using a very simple user system
//therefore, we are using just username/password and not storing any
//potentional sensitive info such as a user's email

class UserModel extends MySQLDataProviderModel {

    public function getUsername($id) {
        $result = $this->query(
            'SELECT username FROM users WHERE id = :id',
            [':id' => $id]
        );

        if(!empty($result)) {
            return $result[0]['username'];
        }
        return null;
    }
    
    public function addUser($username, $password) {
        $users = $this->query(
            'SELECT * FROM users WHERE username = :username',
            [':username' => $username],
            'User'
        );
        if(!empty($users)) { //Username is already taken
            return false;
        }

        //Hash password using PASSWORD_DEFAULT (bcrypt)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->execute(
            'INSERT INTO users (username, password) VALUES (:username, :password)',
            [
                ':username' => $username,
                ':password' => $hashedPassword
            ]
        );
        return true;
    }

    public function deleteUser($id) {
        $this->execute(
            'DELETE FROM users WHERE id = :id',
            [':id' => $id]
        );
    }

    public function verifyUser($username, $password) {
        $user = $this->query(
            'SELECT * FROM users WHERE username = :username',
            [':username' => $username],
            'User'
        );
        if ($user) {
            $user = $user[0];
            if (password_verify($password, $user->password)) {
                return $user->id;
            }
        }
        // Incorrect credentials
        return -1;
    }

    public function verifyAdmin($id) {
        $user = $this->query(
            'SELECT * FROM users WHERE id = :id',
            [':id' => $id]
        );

        if ($user && $user[0]->admin) {
            return true;
        }

        return false;
    }

    public function addQuestionAttempt($userID, $questionID, $categoryID, $correct) {
        $this->execute(
            'INSERT INTO user_progress (user_id, question_id, category_id, correct) VALUES (:user_id, :question, :category, :correct)',
            [
                ':user_id' => $userID,
                ':question' => $questionID,
                ':category' => $categoryID,
                ':correct' => $correct
            ]
        );
    }

    public function questionAnsweredCorrectly($userID, $questionID) {
        $result = $this->query(
            'SELECT COUNT(*) AS count FROM user_progress WHERE user_id = :user_id AND question_id = :question_id AND correct = 1',
            [
                ':user_id' => $userID,
                ':question_id' => $questionID
            ]
        );
        return $result[0]['count'] > 0;
    }

    public function numWrongAttemptsInCategory($userID, $categoryID) {
        $result = $this->query(
            'SELECT COUNT(*) AS count FROM user_progress WHERE user_id = :user_id AND category_id = :category_id AND correct = 0',
            [
                ':user_id' => $userID,
                ':category_id' => $categoryID
            ]
        );
        return $result[0]['count'];
    }

    public function numCorrectAttemptsInCategory($userID, $categoryID) {
        $result = $this->query(
            'SELECT COUNT(*) AS count FROM user_progress WHERE user_id = :user_id AND category_id = :category_id AND correct = 1',
            [
                ':user_id' => $userID,
                ':category_id' => $categoryID
            ]
        );
        return $result[0]['count'];
    }
}