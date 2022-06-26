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

    // add new expense to the db
    public function add($expName, $amount) {
        $sql = "INSERT INTO Expense(uid, name, amount) VALUES($this->uid, '$expName', $amount)";

        $this->conn->query($sql);
    }

    // fetch all the expense of the specific user of today only
    public function fetch() {
        $sql = "SELECT eid, name, amount FROM Expense WHERE uid = $this->uid AND date = CURRENT_DATE";
        $result = $this->conn->query($sql);

        return $result->fetch_all();
    }

    /***
     * 
     * Catergories of Expenses
     */

    // fetch all the expense of specific user of all year
    public function fetchCategoriesOfExpensesOfAllTime() {
        $sql = "SELECT eid, name, sum(amount) FROM Expense WHERE uid = $this->uid GROUP BY name, year";
        $result = $this->conn->query($sql);

        return $result->fetch_all();
    }

    // fetch all the expense of specific user of this year
    public function fetchCategoriesOfExpensesOfThisYear() {
        $sql = "SELECT eid, name, sum(amount) FROM Expense WHERE uid = $this->uid AND year = YEAR(CURRENT_TIME) GROUP BY name, year";
        $result = $this->conn->query($sql);

        return $result->fetch_all();
    }

    // fetch all the expense of specific user of this month
    public function fetchCategoriesOfExpensesOfThisMonth() {
        $sql = "SELECT eid, name, sum(amount) FROM Expense WHERE uid = $this->uid AND year = YEAR(CURRENT_TIME) AND month = MONTH(CURRENT_TIME) GROUP BY name, year";
        $result = $this->conn->query($sql);

        return $result->fetch_all();
    }

    // fetch all the expense of specific user of this week
    public function fetchCategoriesOfExpensesOfThisWeek() {
        $sql = "SELECT eid, name, sum(amount) FROM Expense WHERE uid = $this->uid AND year = YEAR(CURRENT_TIME) AND month = MONTH(CURRENT_TIME) AND week = WEEK(CURRENT_TIME) GROUP BY name, year";
        $result = $this->conn->query($sql);

        return $result->fetch_all();
    }






    // fetch the sum of total expenses till now
    public function fetchTotalSumTillNow() {
        $sql = "SELECT sum(amount) FROM Expense WHERE uid = $this->uid";
        $result = $this->conn->query($sql);

        return $result->fetch_assoc()["sum(amount)"];
    }

    // Fetches sum of yearly expenses 
    public function sumOfYearlyExpenses() {
        $sql = "SELECT year, sum(amount) FROM Expense WHERE uid = $this->uid GROUP BY year";
        $result = $this->conn->query($sql);

        return $result->fetch_all();
    }

    // fetches sum of monthly expenses of current year
    public function sumOfMonthlyExpensesOfThisYear() {
        $sql = "SELECT month, sum(amount) FROM Expense WHERE uid = $this->uid AND year = YEAR(CURRENT_TIME) GROUP BY month";
        $result = $this->conn->query($sql);

        return $result->fetch_all();
    }

    // fetches sum of expenses of days of this month and current year
    public function sumOfDailyExpensesOfThisMonthOfThisYear() {
        $sql = "SELECT day, sum(amount) FROM Expense WHERE uid = $this->uid AND year = YEAR(CURRENT_TIME) AND month= MONTH(CURRENT_TIME) GROUP BY day";
        $result = $this->conn->query($sql);

        return $result->fetch_all();
    }

    // fetches weekly expenses of this month 
    public function sumOfDailyExpensesOfThisWeek() {
        $sql = "SELECT dayOfWeek, sum(amount) FROM Expense WHERE uid = $this->uid AND year = YEAR(CURRENT_TIME) AND month = MONTH(CURRENT_TIME) AND week = WEEK(CURRENT_TIME) GROUP BY dayOfWeek";
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

    // Delete the expense of the user of today's date
    public function deleteExpense($eid) {
        $sql = "DELETE FROM Expense WHERE uid = $this->uid AND eid = $eid AND date = CURRENT_DATE";

        $this->conn->query($sql);

        header("Location: /PEMS/index.php");
    }

    // Update the expense of the user of today's date
    public function update($eid, $expName, $expAmount) {

        $sql = "UPDATE Expense set name = '$expName', amount = $expAmount WHERE eid = $eid";
        $this->conn->query($sql);

        header("Location: /PEMS/index.php");
    }
}
