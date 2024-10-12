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
}