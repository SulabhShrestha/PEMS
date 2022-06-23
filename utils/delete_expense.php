<?php

require_once("../database/Expense.class.php");

session_start();

// Which expense to delete
$expName = $_GET["name"];

$expense = new Expense($_SESSION['uid']);
$expense->deleteExpense($expName);
