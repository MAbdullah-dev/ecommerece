<?php

class Database
{
    // Properties to hold database credentials
    public $servername = HOST;
    public $username = USER;
    public $db_name = DATABASE;
    public $password = PASSWORD;

    // Property to hold the PDO connection
    public $conn;
    public $result; 

    // Constructor method to establish the database connection
    public function __construct()
    {
        try {
            // Creating a new PDO connection
            $this->conn = new PDO(
                "mysql:host={$this->servername};dbname={$this->db_name}",
                $this->username,
                $this->password
            );
            // Set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch (PDOException $e) {
            // Handle connection failure
            // echo "Connection failed: " . $e->getMessage();
        }
    }
    public function Query($query,$params = []){
        $this->result = $this->conn->prepare($query);

        if (empty($params)) {
            return $this->result->execute();
        }else{
            return $this->result->execute($params);
        }

    }
    public function rowCount(){
        return $this->result->rowCount();
    }
    public function fetchAll(){
        return $this->result->fetchAll(PDO::FETCH_OBJ);
    }
    public function fetchAssoc(){
        return $this->result->fetch(PDO::FETCH_ASSOC);
    }
    
    public function fetch(){
        return $this->result->fetch(PDO::FETCH_OBJ);
    }
    // public function fetchAcco
}

// Define BASEURL constant

// Example usage
$db = new Database();
