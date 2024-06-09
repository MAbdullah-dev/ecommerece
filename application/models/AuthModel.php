<?php
class AuthModel extends Database {
    public function register($data) {
        $sql = "INSERT INTO users (role_id, email, password, name) VALUES (:role_id, :email, :password, :name)";
        $this->Query($sql, [
            ':role_id' => $data['signup_type'],
            ':email' => $data['email'],
            ':password' => $data['password'],
            ':name' => $data['name']
        ]);
        return $this->rowCount() > 0;
    }

    public function findUserByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $this->Query($sql, [':email' => $email]);
        return $this->fetch();
    }
}
