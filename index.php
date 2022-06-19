<?php
session_start();

if (!isset($_SESSION["login"])) {
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


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
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Add
                            </button>


                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


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

                                <a href="/PEMS/database/logout.php"><span class="material-icons">face</span></a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>


</body>

</html>