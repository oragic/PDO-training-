<?php 
//call database and submit the dates to function createPerson 
require_once '../connection.php';
$create = new users("testt","localhost","root","");
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
                if(!$create->createPerson($new_user,$email))
                {
                    echo "email ja existe";
                }
            }  
            else
            {
                echo "DATA CANNOT BE EMPTY";
            }   
}
?>
<?php 
include_once 'templates/header.php';
?>
        <form method="post">
            <label for="firstname">First name</label>
            <input type="text" name="firstname" id="firstname">
            <label for="lastname">Last name</label>
            <input type="text" name="lastname" id="lastname">
            <label for="email">Email Address</label>
            <input type="text" name="email" id="email">
            <label for="age">Age</label>
            <input type="text" name="age" id="age">
            <label for="locations">Location</label>
            <input type="text" name="locations" id="locations">
            <input type="submit" name="submit" id="submit" value="submit">
        </form>
        <a href="index.php">Back to Home</a>
<?php
include_once 'templates/footer.php';
?>