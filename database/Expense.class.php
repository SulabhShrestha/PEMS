<?php

class Expense {

    private $conn;

    public function __construct() {

        // Create connection
        $this->conn = new mysqli("localhost", "root", "", "PEMS");

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function __destruct() {
        $this->conn->close();
    }

    public function add($uid, $expName, $amount) {
        $sql = "INSERT INTO Expense(uid, name, amount) VALUES($uid, '$expName', $amount)";

        $this->conn->query($sql);
    }

    public function fetch($uid) {
        $sql = "SELECT name, amount FROM Expense WHERE uid = $uid";
        $result = $this->conn->query($sql);

        return $result;
    }
}
