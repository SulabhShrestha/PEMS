<?php
session_start();

if ($_SESSION["login"] != 1) {
    header("Location: /PEMS/pages/signin.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>


    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        html,
        body,
        body>div.row {
            height: 100% !important;
        }

        .content {
            height: 100%;
            border-right: 1px solid black;
        }

        .borderless tr {
            border: none !important;
        }

        div>.vr {
            position: absolute;

            background-color: black;
            width: 1px;

            height: 100%;
        }

        .dotted-border-3 {
            border-style: dotted;
            border-width: 3px;
            border-radius: 16px;
        }

        .dotted-border-2 {
            border-style: dotted;
            border-width: 2px;
            border-radius: 8px;
        }

        .remainder .left-side>p {
            font-size: small;
            opacity: 0.5;
        }

        .remainder .left-side>h3 {
            font-size: larger;
        }

        .remainder .right-side>p {
            font-size: medium;
        }
    </style>
</head>

<body>

    <div class="row m-0">

        <!-- Content part -->
        <div class="col-9 p-0 content">
            <table class="table">
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
                    </div>

                </thead>
                <tbody>
                    <tr>
                        <td class="d-flex justify-content-between align-items-center">

                            <div class="date">
                                <span class="label">Today's date:</span>
                                <span class="today">March 15, 2022</span>
                            </div>

                            <div class="today-exp-infos">
                                <div class="total-activity">
                                    <span class="desc">Total activity:</span>
                                    <span class="activity">2</span>
                                </div>

                                <div class="total-amount">
                                    <span class="desc">Total activity:</span>
                                    <span class="amount">Rs. 2000</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>

                            <button type="button" class="btn btn-outline-primary mb-4 dotted-border-3">Add</button>


                            <div class="card mb-4">
                                <div class="card-body d-flex justify-content-between">
                                    <div class="left-side d-flex align-items-center">

                                        <span class="material-icons">paid</span>
                                        <span class="title px-2">Restaurant & Lodge</span>
                                    </div>

                                    <div class="right-side d-flex align-items-center">
                                        <span class="amount">Rs 5000</span>
                                        <span class="material-icons px-2">edit</span>
                                        <span class="material-icons">delete</span>
                                    </div>
                                </div>
                            </div>

                        </td>

                    </tr>

                </tbody>
            </table>
        </div>


        <!-- Remainder part -->
        <div class="col-3 p-0">
            <div class="vr"></div>
            <table class="table">
                <tbody>
                    <tr>
                        <td class="p-1" colspan="2">
                            <div class="d-flex justify-content-between py-2">
                                <span class="material-icons">
                                    notifications
                                </span>

                                <span class="material-icons">face</span>
                            </div>
                        </td>

                    </tr>

                    <tr>
                        <td>

                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <span>Remainder</span>
                                <span><button type="button" class="btn btn-outline-primary dotted-border-2 px-2 py-1 fs-1">+</button></span>
                            </div>

                            <div class="card mb-4 remainder">
                                <div class="card-body d-flex justify-content-between align-items-center px-2 py-2">

                                    <div class="left-side">
                                        <h3>Home Loan</h3>
                                        <p class="m-0">5 days left</p>
                                    </div>

                                    <div class="right-side">
                                        <p>Rs 50000</p>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
            </table>
        </div>
    </div>


    <!-- Boostrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>