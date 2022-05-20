<?php

/**
 * This handles all authentication activities
 * including SignIn, SignUp, SignOut
 */

class Auth {

    private $username = "";
    private $email = "";
    private $password = "";
    private $conn;

    public function __construct($username, $email, $password) {

        // Assigning value to private variable so that it can be later use
        $this->username = $username;
        $this->email = $email;
        $this->password = $password; //TODO: Need to hash password before 

        // Create connection
        $this->conn = new mysqli("localhost", "root", "");

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    //magic functions: used to set value to any class variable
    public function _set($property, $value) {
        if (property_exists($this, $property)) {
            $this->property = $value;
        }
    }

    // magic functions: used to get value from defined class variable
    public function _get($property) {
        if (property_exists($this, $property)) {
            return $this->property;
        }
        return null;
    }


    // checking if the user had previously logged in with the provided email
    private function checkIfPreviouslyEmailExist() {

        $statement = "SELECT * FROM PEMS.User 
        WHERE email='$this->email'";

        $result = $this->conn->query($statement);

        // this means users is previously logged in
        if ($result->num_rows > 0) {
            return true;
        }
        return false;
    }

    // checking if the provided email and password matches 
    public function checkForValidCredentail() {
        $email = $this->email;
        $password = $this->password;

        $sqlStatement = "SELECT * FROM PEMS.User 
        WHERE email = '$email' AND password = '$password'";

        $result = $this->conn->query($sqlStatement);



        print_r($result);
        if ($result->num_rows > 0) {
            $this->conn->close();
            header("Location: ../index.php");
        }
    }

    // Handles signIn action
    public function signIn() {
        $this->checkForValidCredentail();
    }


    // Handlies sign up action
    public function signUp() {
        $ifHasAccount = $this->checkIfPreviouslyEmailExist();

        if (!$ifHasAccount) {
            $sqlStatement = "INSERT INTO PEMS.User(email, username, password) VALUES(?, ?, ?)";

            // This is to prevent SQLi
            $sqlQuery = $this->conn->prepare($sqlStatement);

            $result = $sqlQuery->execute([$this->email, $this->username, $this->password]);

            if ($result) {
                $this->conn->close();
                header("Location: ../index.php");
            }
        } else {
            $this->conn->close();
            header("Location: signin.php");
        }
    }

    public function signOut() {
    }
}
