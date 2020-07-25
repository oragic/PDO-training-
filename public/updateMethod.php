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

    public function senddata($id,$firstname,$lastname,$email,$age,$locations)
    {   $sql = "UPDATE users 
          SET id = :id, 
          firstname = :firstname, 
          lastname = :lastname, 
          email = :email, 
          age = :age, 
          locations = :locations 
          WHERE id = :id";

        $statement = $this->con->prepare($sql);
        $statement->bindValue(":id",$id);
        $statement->bindValue(":firstname",$firstname);
        $statement->bindValue(":lastname",$lastname);
        $statement->bindValue(":email",$email);
        $statement->bindValue(":age",$age);
        $statement->bindValue(":locations",$locations);
        $statement->execute();
    }
}