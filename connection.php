<?php



class users
{
        //build an connection with database

    private $pdo;
    public function __CONSTRUCT($dbname,$host,$user,$password)
    {
       
       try 
       {
         $this->pdo = new PDO("mysql:dbname=$dbname;host=$host",$user,$password);
       } 
       catch (PDOException $erro) 
       {
        echo "Sorry, error ocorred with database".$erro->getMessage;
        exit();

       }
       catch(EXCEPTION $erro)
       {
            echo "Sorry, ocorred an error unexpected";       
       }
        
    }
    public function createPerson($new_user,$email)
    {
        //create an data in table 
        $comand = $this->pdo->prepare("SELECT id FROM users WHERE email =:e");
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

            $comand= $this->pdo->prepare($sql);
            $comand->execute($new_user);
            echo $sql;
            return true;
        }

    }


     

}