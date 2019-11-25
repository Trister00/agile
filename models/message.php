<?php
class Message
{
    private $conn;
    private $table_name = "message";

    // object properties
    public $id;
    public $contenu;
    public $id_user;
    public $id_canal;


    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        $query = 'INSERT INTO ' . $this->table_name . '(`contenu`, `id_user`, `id_canal`) VALUES(?,?,?)';
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute(array($this->contenu, $this->id_user, $this->id_canal))) {
            return true;
        } else {
            return false;
        }
    }

    public function readAll()
    {
        $query = 'SELECT * FROM ' . $this->table_name . ' WHERE id_canal=:id_canal';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id_canal', $this->id_canal);
        $stmt->execute();



        return $stmt->fetchAll();
    }
}