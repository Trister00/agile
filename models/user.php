<?php
class User
{
    private $conn;
    private $table_name = "user";

    // object properties
    public $id;
    public $pseudo;
    public $password;


    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        $sql = 'INSERT INTO ' . $this->table_name . '(pseudo,password) VALUES(:pseudo,:password)';
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':pseudo', $this->pseudo);
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $stmt->bindParam(':password', $this->password);


        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function read()
    {
        $sql = 'SELECT pseudo,password FROM ' . $this->table_name . ' WHERE pseudo=:pseudo';
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':pseudo', $this->pseudo);
        $stmt->execute();

        $tmp = $stmt->fetch();

        if (isset($tmp['pseudo'])) {

            // echo $tmp['password'];
            // echo '<br/>';
            // echo $this->password;
            if (password_verify($this->password, $tmp['password'])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}