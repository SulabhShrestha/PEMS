<!DOCTYPE html>

<?php
session_start();

require_once("./components/add_expenses.php");
require_once("database/Expense.class.php");
require_once("components/expense_items.php");
require_once("components/update_expense.php");

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

    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet" />

    <style>
        * {
            font-family: "Poppins", sans-serif;
        }

        .delete-logo {
            color: red;
        }

        .editBtn {
            cursor: pointer;
            color: green;
        }

        .h-font {
            font-family: "Merienda", cursive;
        }
    </style>
</head>

<body class="bg-white">

    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="assets/logo.png" alt="logo" style="height: 50px; width: 70px" /></a>
            <div class="navbar-brand h-font fs-3 fw-bold">PEMS</div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <a class="btn btn-outline-dark active me-lg-3 me-2 my-2 shadow-none border-2" href="index.php" role="button">Dashboard</a>
                    <a class="btn btn-outline-dark me-lg-3 me-2 my-2 shadow-none border-2" href="./pages/summary.php" role="button">Summary</a>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="/PEMS/utils/logout.php"><span class="material-icons me-1" id="icon2">face</span></a>
                </div>
            </div>
        </div>
    </nav>


    <!-- Content part -->
    <div class="p-0 container-fluid">
        <table class="table">
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
                        <div class="d-flex align-items-center justify-content-between mb-3 mt-2">
                            <span class="fs-3">Expenses</span>
                            <button type="button" class="btn btn-outline-dark border-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add</button>
                        </div>

                        <?php
                        $expCard = new ExpenseCard();

                        foreach ($expenses as $exp) {
                            $expCard->get($exp[0], $exp[1], $exp[2]);
                        }

                        ?>

                    </td>

                </tr>

            </tbody>
        </table>
    </div>


    </div>




    <!-- Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

    <script>
        // Adding data to modal while updating
        $(document).ready(function() {

            $(".editBtn").on("click", function() {

                // Showing update modal on click of edit btn
                $("#updateModal").modal('show');

                // getting eid only in array
                let eid = $(this).closest(".expense-data-holder").find(".eid").map(function() {
                    return this.value;
                }).get();

                // gets array of [expname, amnt]
                let values = $(this).closest(".expense-data-holder").find(".data").map(
                    function() {
                        return this.textContent;
                    }
                ).get();

                // setting value
                $("#eid").val(eid[0]);
                $(".expName").val(values[0]);

                // don't want Rs to be inserted
                $(".expAmount").val(values[1].split(" ")[1]);
            });
        });
    </script>

</body>

</html>