<?php

/**
 * This handles all authentication activities
 * including SignIn, SignUp only
 * 
 * Sign out is handled by logout.php
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

    public function __destruct() {
        $this->conn->close();
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


    // Handles signIn action
    public function signIn() {

        // setting email or password for user convience to session
        $_SESSION["email"] = $this->email;
        $_SESSION["password"] = $this->password;

        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $sqlStatement = "SELECT * FROM PEMS.User 
            WHERE email = '$this->email' AND password = '$this->password'";

            $result = $this->conn->query($sqlStatement);

            if ($result->num_rows > 0) {

                $resultArray = $result->fetch_assoc();

                $_SESSION["login"] = true; // user is logged in now

                $_SESSION["username"] = $resultArray["username"];
                $_SESSION["uid"] = $resultArray["id"];

                header("Location: ../index.php");
            }
            // Displaying wrong email or password 
            else {
                header("Location: signin.php?error=Wrong email or password");
            }
        } else {
            header("Location: signin.php?error=Invalid email.");
        }
    }


    // Handlies sign up action
    public function signUp() {
        $hasAccount = $this->checkIfPreviouslyEmailExist();
        $_SESSION["email"] = $this->email;
        $_SESSION["username"] = $this->username;
        $_SESSION["password"] = $this->password;

        if (!$hasAccount) {

            if (strlen($this->password) < 8)
                header("Location: signup.php?error=Password length must be greater or equal to 8");

            if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $sqlStatement = "INSERT INTO PEMS.User(email, username, password) VALUES(?, ?, ?)";

                // This is to prevent SQLi
                $sqlQuery = $this->conn->prepare($sqlStatement);

                $result = $sqlQuery->execute([$this->email, $this->username, $this->password]);

                // redirecting user to index.php
                if ($result) {
                    $_SESSION["login"] = true; // user is logged in now

                    header("Location: ../index.php");
                }
            } else {
                header("Location: signup.php?error=Invalid email.");
            }
        } else {
            header("Location: signup.php?error=You already have an account.");
        }
    }
}
