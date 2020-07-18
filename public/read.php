
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

?>
<?php include_once 'templates/searchEngine.html';?>
<?php include_once 'templates/footer.html'; ?>