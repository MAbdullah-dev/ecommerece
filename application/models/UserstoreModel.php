<?php

class UserStoreModel extends Database
{

    public function getUsers()
    {
        $sql = "SELECT id, name, email FROM users WHERE role_id = 3";
        $this->Query($sql);
        return $this->fetchAll();
    }

    public function getStoreOwners()
    {
        $sql = "
            SELECT stores.id, stores.store_name, users.name as user_name, users.email 
            FROM stores 
            JOIN users ON stores.user_id = users.id
            WHERE users.role_id = 2
        ";
        $this->Query($sql);
        return $this->fetchAll();
    }
}
?>
