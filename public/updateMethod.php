<?php
require_once '../connection.php';
class updateMethod
{
    public function showdata($id)
    {
        $sql = "SELECT * FROM users WHERE id=:id";
        $con = Connection::getConn();
        $statement = $con->prepare($sql);
        $statement->bindValue(":id",$id);
        $statement->execute();
        
        $result = $statement->fetchAll();
        return $result;
    }
}