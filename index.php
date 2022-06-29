<!DOCTYPE html>
<?php
session_start();

require_once("./components/add_expenses.php");
require_once("database/Expense.class.php");
require_once("components/expense.card.php");
require_once("components/update_expense.php");
require_once("components/remainder.card.php");
require_once("components/add_remainder.modal.php");
require_once("database/Remainder.class.php");

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

$rem = new Remainder($_SESSION['uid']);
$remainders = $rem->fetchAll();


?>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        html,
        body,
        body>div.row {
            height: 100% !important;
        }

        * {
            font-family: "Poppins", sans-serif;
        }

        .h-font {
            font-family: "Merienda", cursive;
        }

        .profile {
            cursor: pointer;
        }

        .delete-logo {
            color: red;
        }

        .editBtn {
            cursor: pointer;
            color: green;
        }

        .rem {
            background-color: #C5B4E3;
            border-radius: 5px;
        }

        .exp {
            background-color: #D1EDF2;
            border-radius: 5px;
        }
    </style>
    <title>Personal Expense Management System</title>
</head>

<body class="bg-white">
    <nav class="navbar navbar-expand-sm navbar-light bg-light shadow-sm sticky-top px-lg-3 py-lg-2">
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

                    <!-- logout drop down -->
                    <div class="dropstart">
                        <span class="material-icons me-1 profile" id="icon2" id="dropdownMenu1" data-bs-toggle="dropdown" aria-expanded="false">face</span>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li class="text-center"><?= $_SESSION['username'] ?></li>
                            <li class="text-center mt-4"><a class="btn btn-danger border border-2 border-dark" href="/pems/utils/logout.php" role="button">Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main content  -->
    <div class="container-fluid">
        <div class="row m-0 justify-content-evenly">

            <!-- Expenses part -->
            <div class="col-md-8 p-0 exp mt-4">
                <table class="table table-borderless mt-3">
                    <tbody>
                        <!-- date total expenses -->
                        <tr>
                            <td class="d-flex justify-content-between align-items-center bg-light bg-gradient shadow-sm rounded mx-2">
                                <div class="date">
                                    <span class="label">Date:</span>
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
                                        $totalExpenses = $expense->todayTotalExpensesAmount() ?? 0;

                                        echo '<span class="amount"> Rs ' . $totalExpenses . '</span>';
                                        ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- expense limit -->
                        <tr>
                            <td class="d-flex justify-content-between align-items-center bg-light bg-gradient shadow-sm rounded mx-2 mt-2">
                                <div class="limit d-flex">
                                    <div>
                                        <span class="label"> Daily Expense Limit:</span>
                                    </div>
                                    <div>
                                        <span class="material-icons px-2">add</span>
                                    </div>
                                    <div>
                                        <span class="material-icons">edit</span>
                                    </div>

                                </div>


                                <div class="limit-infos">
                                    <div class="limit-left">
                                        <span class="desc">Remaining Limit:4000</span>
                                    </div>


                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <!-- Button trigger modal -->
                                <div class="d-flex align-items-center justify-content-between mb-3 mt-4">
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


            <!-- remainder part -->
            <div class="col-md-4 p-2 mt-4 rem">

                <div class="d-flex align-items-center justify-content-between my-4">
                    <span class="fs-3">Remainder</span>
                    <span>
                        <button type="button" class="btn btn-outline-dark border-2" data-bs-toggle="modal" data-bs-target="#remainderModal">Add</button>
                    </span>
                </div>

                <?php
                $rem = new RemainderCard();

                foreach ($remainders as $remainder)
                    $rem->get($remainder[0], $remainder[1], $remainder[3], $remainder[2]);

                ?>


            </div>
        </div>
    </div>

    <!--  JavaScript -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
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