<?php

require_once("../database/Expense.class.php");

session_start();

// Which expense to delete
$eid = $_GET["eid"];

$expense = new Expense($_SESSION['uid']);
$expense->deleteExpense($eid);
