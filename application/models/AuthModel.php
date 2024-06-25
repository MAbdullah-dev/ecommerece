<?php


class AuthModel extends Database
{
    public function register($data)
    {
        $role_id = $data['signup_type'];
        $email = $data['email'];
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $name = $data['name'];

        // Insert user record
        $sql = "INSERT INTO users (role_id, email, password, name) VALUES (:role_id, :email, :password, :name)";
        $this->Query($sql, [
            ':role_id' => $role_id,
            ':email' => $email,
            ':password' => $password,
            ':name' => $name
        ]);

        // Get the last inserted user ID
        $user_id = $this->lastInsertId();

        if ($role_id == 2 && isset($data['storeName'])) {
            // Insert store information for seller
            $store_name = $data['storeName'];
            $sql = "INSERT INTO stores (user_id, store_name) VALUES (:user_id, :store_name)";
            $this->Query($sql, [
                ':user_id' => $user_id,
                ':store_name' => $store_name
            ]);
        }

        return $this->rowCount() > 0; // Return true if at least one row was affected
    }

    public function findUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $this->Query($sql, [':email' => $email]);
        return $this->fetch();
    }
    public function getStoreByUserId($user_id)
    {
        $sql = "SELECT * FROM stores WHERE user_id = :user_id";
        $this->Query($sql, [':user_id' => $user_id]);
        return $this->fetch();
    }
}

?>
