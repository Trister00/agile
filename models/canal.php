<?php
class Canal
{
    private $conn;
    private $table_name = "canal";

    // object properties
    public $id;


    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        # code...
    }

    public function readAll()
    {
        # code...
    }
}