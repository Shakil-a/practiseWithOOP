<?php 


class databaseConnect {

// these are the properties for the database connection
private $host = 'localhost';
private $dbname = 'signuppage';
private $username = 'root';
private $password = '';

// this mehtod now means we can connect our database with connect() and can use it in different instances such as creating queries for crud operations
protected function connect(){
 
    try{
        $pdo = new PDO("mysql:host =". $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //return the pdo
        return $pdo;

    } catch (PDOException $e) {
        die("Connection failed: ". $e->getMessage());
    }


}


}