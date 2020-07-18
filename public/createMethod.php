<?php
require_once '../connection.php';
class create{
public function createPerson($new_user,$email)
{
        //create an data in table 
        $con = Connection::getConn();
        $comand = $con->prepare("SELECT id FROM users WHERE email =:e");
        $comand->bindValue(":e",$email);
        $comand->execute();
      

        if($comand->rowCount()>0)
        {
            return false;
            echo "false";
            exit();
        }
        else
        {
            
            $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "users",
                implode(", ", array_keys($new_user)),
                ":" . implode(", :", array_keys($new_user))
              );

            $comand= $con->prepare($sql);
            $comand->execute($new_user);
            echo $sql;
            return true;
        }
}
}