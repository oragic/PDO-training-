<?php



require_once '../connection.php';
require_once '../common.php';

class readMethod
{
    public function readData($locations)
    {
             if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();
             {
                 try  
                 {
                         $sql = "SELECT * 
                         FROM users
                         WHERE locations = :locations";

                         $con = Connection::getConn();

                         $statement = $con->prepare($sql);
                         $statement->bindParam(':locations', $locations, PDO::PARAM_STR);
                         $statement->execute();

                         $result = $statement->fetchAll();
                         return $result;
                 } 
                 catch(PDOException $error) 
                 {
                 echo $sql . "<br>" . $error->getMessage();
                 }
             }        
    }

}
