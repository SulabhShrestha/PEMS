<?php
session_start();

require_once("./components/add_expenses.php");
require_once("database/Expense.class.php");
require_once("components/expense_items.php");

if (!isset($_SESSION["login"])) {
    header("Location: /PEMS/pages/signin.php");
}

if (!isset($_SESSION["uid"])) {
    $email = $_SESSION['email'];
    $sql = "SELECT id FROM User WHERE email='$email'";

    $conn = new mysqli("localhost", "root", "", "PEMS");
    $result = $conn->query($sql);

    $_SESSION['uid'] = $result->fetch_assoc()["id"];
}

$expense = new Expense($_SESSION['uid']);
$expenses = $expense->fetch();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>


    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        .content {
            height: 100%;
            border-right: 1px solid black;
        }

        .delete-logo {
            color: red;
        }
    </style>
</head>

<body>

    <div class="row m-0">

        <!-- Content part -->
        <div class="p-0 ">
            <table class="table">

                <!-- nav part -->
                <thead>

                    <div class="d-flex justify-content-between align-items-center px-1 py-2">

                        <div class="app-related d-flex align-items-center">
                            <span class="material-icons mr-1">logo_dev</span>
                            <span class="app-name">PEMS</span>
                        </div>

                        <span>
                            <form class="form-inline">
                                <input type="search" class="form-control ds-input" id="search-input" placeholder="Search expense..." style="position: relative; vertical-align: top;" dir="auto">
                            </form>
                        </span>


                        <nav class="nav nav-pills nav-justified d-flex">
                            <a class="nav-link active" href="#">Dashboard</a>
                            <a class="nav-link" href="./pages/summary.php">Summary</a>
                        </nav>
                        <a href="/PEMS/utils/logout.php"><span class="material-icons">face</span></a>
                    </div>

                </thead>
                <tbody>

                    <!-- further other information -->
                    <tr>
                        <td class="d-flex justify-content-between align-items-center">

                            <div class="date">
                                <span class="label">Today's date:</span>
                                <?php
                                echo '<span class="today">' . date("Y-m-d") . '</span>';
                                ?>

                            </div>

                            <div class="today-exp-infos">
                                <div class="total-activity">
                                    <span class="desc">Total activity:</span>
                                    <?php

                                    // Total number of activity is returned
                                    $totalActivity = $expense->todayTotalActivity();
                                    echo '<span class="activity">' . $totalActivity . '</span>';
                                    ?>
                                </div>

                                <div class="total-amount">

                                    <span class="desc">Total amount:</span>
                                    <?php

                                    // Either 0 or total expenses amount
                                    $totalExpenses = $expense->todayTotalExpensesAmount() ?? 0;

                                    echo '<span class="amount"> Rs ' . $totalExpenses . '</span>';
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Add
                            </button>

                            <?php
                            $expCard = new ExpenseCard();

                            foreach ($expenses as $exp) {
                                $expCard->get($exp[0], $exp[1]);
                            }

                            ?>

                        </td>

                    </tr>

                </tbody>
            </table>
        </div>



        </table>
    </div>
    </div>




    <!-- Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>


</body>

</html>