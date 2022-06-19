<?php

class Expense {
    private $uid;
    private $conn;

    public function __construct($uid) {
        $this->uid = $uid;

        // Create connection
        $this->conn = new mysqli("localhost", "root", "");

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function add($expName, $amount) {
        $sql = "INSERT INTO Expense(uid, name, amount) VALUES($this->uid, '$expName', $amount)";

        $result = $this->conn->query($sql);
    }
}
