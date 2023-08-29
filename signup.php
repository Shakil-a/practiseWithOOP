<?php 


class signUp extends databaseConnect{
    //declare the properties for the signUp class
private $username;
private $password;

// set the properties to the values of whatever we put in the instance once its created which will be the values of what the user has submitted from the form
function __construct($username, $password){
    $this->username = $username;
    $this->password = $password;
}

private function insertUser(){
    //we are creating an insert query to insert our user in the users table and have also prepared statement to prevent sql injection
    $query = "INSERT INTO users ('username', 'password') VALUES (:username, :password)";

    $stmt = parent::connect()->prepare($query);
    $stmt->bindParam(":username", $this->username);
    $stmt->bindParam(":password", $this->password);
    $stmt->execute();
}

//this function is to check if any of the inputs are empty when submitting
private function isEmptySubmit(){
  if(isset($this->username) && isset($this->password)){
    return false;
  }
  else{
    return true;
  }
}

public function signUpUser(){
  // error handling, if the user is submitting empty fields, send them back to the form
   if($this->isEmptySubmit()){
    header("Location: " . $_SERVER['DOCUMENT_ROOT'] . '/index.php');
    die();
   }

   else {
     // if there are no errors then we want to invoke the method and sign up the user
    $this->insertUser();
   }

}

    

}