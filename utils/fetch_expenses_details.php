<?php

session_start();


require_once("../database/Expense.class.php");
$expense = new Expense($_SESSION["uid"]);

if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {

        case 'fetchWeek':
            print_r(json_encode($expense->sumOfDailyExpensesOfThisWeek()));
            break;

        case 'fetchMonth':
            print_r(json_encode($expense->sumOfDailyExpensesOfThisMonthOfThisYear()));
            break;

        case 'fetchYear':
            print_r(json_encode($expense->sumOfMonthlyExpensesOfThisYear()));
            break;

        default:
            print_r(json_encode($expense->sumOfYearlyExpenses()));
            break;
    }
}
