<?php
require_once 'deleteMethod.php';
 
if(isset($_POST['submit']))
{
    $id = $_GET['id'];
    $deleteperson = new deleteMethod;
    $deleteperson->delete($id);
}
include_once 'templates/delete.html';