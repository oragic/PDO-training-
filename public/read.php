
<?php
require_once "../common.php";
require_once 'readMethod.php';

 if (isset($_POST['submit'])) 
{
    $locations = $_POST['locations'];
    $read = new readMethod;
    $readData =$read->readData($locations);
}        

    if(isset($_POST['submit']))
    {
        foreach ($readData as $row)
        {
            $firstname = $row["firstname"];
            $lastname = $row["lastname"];
            $email = $row["email"];
            $id = $row["id"];
            $person = "person:$firstname $lastname<br>email:$email<br><br><a href='update.php?id=$id'>Edit</a> <a href='delete.php?id=$id'>Delete</a>";

            
            $template = file_get_contents('templates/read.html');
            $tplfinal = str_replace("{{person}}",$person,$template);
            echo $tplfinal;
        }        
    }
 include_once 'templates/searchEngine.html';
?>


