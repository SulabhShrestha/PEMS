<?php

session_start();


require_once("../database/Expense.class.php");
$expense = new Expense($_SESSION["uid"]);

if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {

        case 'fetchWeek':
            $exp = $expense->sumOfDailyExpensesOfThisWeek();
            $cat = $expense->fetchCategoriesOfExpensesOfThisWeek();

            $json = json_encode([$exp, $cat]);
            print_r($json);
            break;

        case 'fetchMonth':
            $exp = $expense->sumOfDailyExpensesOfThisMonthOfThisYear();
            $cat = $expense->fetchCategoriesOfExpensesOfThisMonth();

            $json = json_encode([$exp, $cat]);
            print_r($json);
            break;

        case 'fetchYear':
            $exp = $expense->sumOfMonthlyExpensesOfThisYear();
            $cat = $expense->fetchCategoriesOfExpensesOfThisYear();

            $json = json_encode([$exp, $cat]);
            print_r($json);
            break;

        default:
            $exp = $expense->sumOfYearlyExpenses();
            $cat = $expense->fetchCategoriesOfExpensesOfAllTime();
            $json = json_encode([$exp, $cat]);
            print_r($json);
            break;
    }
}
