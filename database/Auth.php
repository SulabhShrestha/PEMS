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
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;

        // Create connection
        $this->conn = new mysqli("localhost", "root", "");

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    //magic functions
    public function _set($property, $value) {
        if (property_exists($this, $property)) {
            $this->property = $value;
        }
    }

    public function _get($property) {
        if (property_exists($this, $property)) {
            return $this->property;
        }
        return null;
    }


    private function checkIfPreviouslySignUp($email) {

        $statement = "SELECT * FROM PEMS.User 
        WHERE email='$email'";

        $result = $this->conn->query($statement);

        // this means users is previously logged in
        if ($result->num_rows > 0) {
            return true;
        }
        return false;
    }



    public function signIn() {
    }

    public function signUp() {
        $ifHasAccount = $this->checkIfPreviouslySignUp($this->email);

        if (!$ifHasAccount) {
            $sqlStatement = "INSERT INTO PEMS.User(email, username, password) VALUES(?, ?, ?)";

            // This is to prevent SQLi
            $sqlQuery = $this->conn->prepare($sqlStatement);

            $result = $sqlQuery->execute([$this->email, $this->username, $this->password]);

            print_r($sqlQuery);

            if ($result) {
                $this->conn->close();
                header("Location: ../index.php");
            }
        } else {
            header("Location: signin.php");
            echo "You already have an account. Please log In.";
            $this->conn->close();
        }
    }

    public function signOut() {
    }
}
