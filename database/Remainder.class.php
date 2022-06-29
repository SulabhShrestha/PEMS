<?php

class Remainder {
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

    public function add($name, $amount, $payingDate) {
        $sql = "INSERT INTO Remainder(uid, name, amount, payingDate) VALUES($this->uid, '$name', $amount, '$payingDate')";

        $this->conn->query($sql);
    }
    public function fetchAll() {
        $sql = "SELECT rid, name, amount, DATEDIFF(payingDate, CURRENT_TIME) as dateDiff FROM Remainder WHERE uid = $this->uid ORDER BY dateDiff";

        return $this->conn->query($sql)->fetch_all();
    }

    public function delete($rid) {
        $sql = "DELETE FROM Remainder WHERE uid = $this->uid AND rid = $rid";

        $this->conn->query($sql);

        header("Location: /PEMS/index.php");
    }

    // Update the expense of the user of today's date
    public function update($rid, $remName, $amount, $payingDate) {

        $sql = "UPDATE Remainder set name = '$remName', amount = $amount, payingDate = '$payingDate' WHERE rid = $rid AND uid = $this->uid";

        $this->conn->query($sql);
    }
}
