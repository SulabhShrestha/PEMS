<?php

class Expense {

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

    public function add($expName, $amount) {
        $sql = "INSERT INTO Expense(uid, name, amount) VALUES($this->uid, '$expName', $amount)";

        $this->conn->query($sql);
    }

    public function fetch() {
        $sql = "SELECT name, amount FROM Expense WHERE uid = $this->uid AND date = CURRENT_DATE";
        $result = $this->conn->query($sql);

        return $result->fetch_all();
    }

    // Total number of today's expenses is returned
    public function todayTotalActivity() {
        $sql = "SELECT name FROM Expense WHERE uid = $this->uid AND date = CURRENT_DATE";
        $result = $this->conn->query($sql);

        return count($result->fetch_all());
    }

    // Returns sum of today's total expenses
    public function todayTotalExpensesAmount() {
        $sql = "SELECT sum(amount) FROM Expense WHERE uid = $this->uid AND date = CURRENT_DATE";
        $result = $this->conn->query($sql);

        return $result->fetch_assoc()["sum(amount)"];
    }
}
