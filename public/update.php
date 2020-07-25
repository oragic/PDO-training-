<?php 
require_once '../common.php';
require_once 'updateMethod.php';

$data = new updateMethod;

if(isset($_GET['id']))
{
   $id = $_GET['id']; 
   $showdata = $data->showData($id);
   foreach ($showdata as $row)
   {
     $firstname = $row['firstname'];
     $lastname = $row['lastname'];
     $email = $row['email'];
     $age = $row['age'];
     $locations = $row['locations'];
     
     $dataedit = " 
     <label for='firstname'>First name</label>
     <input type='text' name='firstname' id='firstname' value='$firstname'>
     <label for='lastname'>Last name</label>
     <input type='text' name='lastname' id='lastname' value='$lastname'>
     <label for='email'>Email Address</label>
     <input type='text' name='email' id='email' value='$email'>
     <label for='age'>Age</label>
     <input type='text' name='age' id='age' value='$age'>
     <label for='locations'>Location</label>
     <input type='text' name='locations' id='locations' value='$locations'>
     <input type='submit' name='submit' id='submit' value='submit'>
     ";

     $template = file_get_contents('templates/update.html');
     $tplupdate =str_replace("{{update}}",$dataedit,$template);
     echo $tplupdate;

   } 
   if(isset($_GET['submit']))
   {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $locations = $_POST['locations'];

    $data->senddata($firstname,$lastname,$email,$age,$locations);    
   }
}