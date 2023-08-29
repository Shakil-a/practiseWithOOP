<?php 
 
if($_SERVER["REQUEST_METHOD"] === "POST") {
    // we are retrieving the user inputs from the form 
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    //we need to connect to the database so we are now going to use our database class, we need to connect to the database before we signup a user and thats why its required before
    require_once('../databaseConnection.php');
    require_once('../signup.php');

    $signup = new signUp($username, $password);
    $signup->signUpUser();
}