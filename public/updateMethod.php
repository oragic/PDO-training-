<?php
require_once '../connection.php';
class updateMethod
{
    private $con;
    public function showdata($id)
    {
        $sql = "SELECT * FROM users WHERE id=:id";
        $this->con = Connection::getConn();
        $statement = $this->con->prepare($sql);
        $statement->bindValue(":id",$id);
        $statement->execute();
        
        $result = $statement->fetchAll();
        return $result;
    }

    public function senddata($firstname,$lastname,$email,$age,$locations)
    {   $sql = "INSERT INTO users(firstname,lastname,email,age,locations) VALUES (:firstname,:lastname,:email,:age,:locations)";
        $statement = $this->con->prepare($sql);
        $statement->bindValue(":firstname,$firstname");
        $statement->bindValue(":lastname",$lastname);
        $statement->bindValue(":email",$email);
        $statement->bindValue(":age",$age);
        $statement->bindValue(":locations",$locations);
        $statement->execute();
    }
}