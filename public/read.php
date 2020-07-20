
<?php
require_once "../common.php";
require_once 'readMethod.php';

 if (isset($_POST['submit'])) 
{
    $locations = $_POST['locations'];
    $read = new readMethod;
    $readData =$read->readData($locations);
    print_r($readData);

}        

?>

<?php include_once 'templates/header.html'; ?>
<?php
    if(isset($_POST['submit']))
    {
        foreach ($readData as $row)
        {
            $firstname = $row["firstname"];
            $lastname = $row["lastname"];
            $email = $row["email"];
            $person = "person:$firstname $lastname<br>email:$email<br><br>";
            
            $template = file_get_contents('templates/read.html');
            $tplfinal = str_replace("{{person}}",$person,$template);
            echo $tplfinal;
        }        
    }
?>
<?php include_once 'templates/searchEngine.html';?>
<?php include_once 'templates/footer.html'; ?>