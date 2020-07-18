<?php 
//call database and submit the dates to function createPerson 
require_once 'createMethod.php';
$createp = new create; 
if (isset($_POST['submit']))
{
            $new_user = array(
                "firstname" => $_POST['firstname'],
                "lastname" => $_POST['lastname'],
                "email" => $_POST['email'],
                "age" => $_POST['age'],
                "locations" => $_POST['locations']
            );
            if(!empty($new_user["firstname"]) & !empty($new_user["lastname"]) & !empty($new_user["email"]) & !empty($new_user['age']) & !empty($new_user["locations"]))
            {   
                $email = $_POST['email'];
                if(!$createp->createPerson($new_user,$email))
                {
                    echo "this email already exists";
                }
            }  
            else
            {
                echo "DATA CANNOT BE EMPTY";
            }   
}

include_once 'templates/create.html';