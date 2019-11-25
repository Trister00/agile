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
        # code...
    }

    public function read()
    {
        # code...
    }
}