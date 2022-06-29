<?php

class ExpenseLimit {
    private $conn;
    private $uid;

    public function __construct($uid) {

        $this->uid = $uid;

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

    public function add($amount) {
        $sql = "INSERT INTO ExpenseLimit(uid, amount) VALUES($this->uid, $amount)";

        $this->conn->query($sql);
    }
    public function update($amount) {
        $sql = "UPDATE ExpenseLimit SET amount = $amount WHERE uid = $this->uid";

        $this->conn->query($sql);
    }

    public function hasAlreadySet() {
        $sql = "SELECT amount FROM ExpenseLimit WHERE uid = $this->uid";

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            // var_dump($result->fetch_assoc());
            return $result->fetch_assoc();
        } else {
            return "Yes";
        }
    }
}
