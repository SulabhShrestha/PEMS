<!DOCTYPE html>
<html lang="en">

<?php
session_start();
require_once("../database/Expense.class.php");
$expense = new Expense($_SESSION['uid']);

$expensesDetails = $expense->fetchAll();
$sumOfTotalExpensesTillNow = $expense->fetchTotalSumTillNow();
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- chart.js link -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <style>
        html,
        body,
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        .h-font {
            font-family: "Merienda", cursive;
        }

        #icon1 {
            font-size: 45px;
            color: rgb(14, 8, 8);
        }

        #icon2 {
            font-size: 45px;
            color: rgb(12, 6, 6);
        }

        #search-input {
            border-color: black;
            border-width: 2px;
        }

        .fs-1 {
            font-size: 2rem;
            text-decoration: underline;
        }

        .width-css {
            width: 48vw;
        }

        @media screen and (min-width: 576px) {
            .width-css {
                width: 43vw;
            }

            .height-css {
                height: 16vh;
            }
        }

        @media screen and (min-width: 768px) {
            .width-css {
                width: 32vw;
            }

            .height-css {
                height: 16vh;
            }
        }

        @media screen and (min-width: 1024px) {
            .width-css {
                width: 28vw;
            }

            .height-css {
                height: 20vh;
            }
        }

        @media screen and (min-width: 1440px) {
            .width-css {
                width: 22vw;
            }

            .height-css {
                height: 22vh;
            }
        }

        .chart {
            margin: 10px;
            padding: 10px;
            border-style: solid;
            border-color: #ff8080;
            border-radius: 10px;
            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
            background: #fff;
        }
    </style>
    <title>Personal Expense Management System</title>
</head>

<body class="bg-white">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="../assets/logo.png" alt="logo" style="height: 50px; width: 70px" /></a>
            <div class="navbar-brand h-font fs-3 fw-bold">PEMS</div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <a class="btn btn-outline-dark me-lg-3 me-2 my-2 shadow-none border-2" href="../index.php" role="button">Dashboard</a>
                    <a class="btn btn-outline-dark active me-lg-3 me-2 my-2 shadow-none border-2" href="summary.php" role="button">Summary</a>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="material-icons" id="icon1"> notifications </span>
                    <span>
                        <form class="form-inline my-1 mx-2">
                            <input type="search" class="form-control ds-input" id="search-input" placeholder="Search" style="position: relative; vertical-align: top" dir="auto" />
                        </form>
                    </span>
                    <a href="/Project/database/logout.php"><span class="material-icons me-1" id="icon2">face</span></a>
                </div>
            </div>
        </div>
    </nav>

    <!-- summry begins -->
    <section>
        <div class="d-flex align-items-center justify-content-around my-3 mx-3 px-3 py-3 bg-info rounded">
            <span class="fs-3">Sort By</span>
            <button type="button" class="btn btn-outline-dark border-2 filter-btn">Week</button>
            <button type="button" class="btn btn-outline-dark border-2 filter-btn">Month</button>
            <button type="button" class="btn btn-outline-dark border-2 filter-btn">Year</button>
            <button type="button" class="btn btn-dark filter-btn">All Time</button>
        </div>
        <div class="ms-3 mt-4 fs-2">
            <u>Charts</u>
        </div>
        <div class="container-fluid">
            <div class="row align-item-center justify-content-center">
                <div class="col-md-7 chart">
                    <h2 class="mx-2 my-2"><u>Expenses</u></h2>
                    <canvas id="myChart"></canvas>
                </div>
                <div class="col-md-4 chart">
                    <h2 class="mx-2 my-2"><u>Expenses Limit</u></h2>
                    <canvas id="myChartDoughnut"></canvas>
                </div>
            </div>
        </div>

        </div>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // bar chart
            // setup
            const data = {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    data: [12, 19, 3, 5, 2, 3, 120, 12, 2, 1, 12, 11],
                    backgroundColor: [
                        "rgba(255, 26, 104, 0.2)",
                        "rgba(54, 162, 235, 0.2)",
                        "rgba(255, 206, 86, 0.2)",
                        "rgba(75, 192, 192, 0.2)",
                        "rgba(153, 102, 255, 0.2)",
                        "rgba(255, 159, 64, 0.2)",
                        "rgba(0, 0, 0, 0.2)",
                    ],
                    borderColor: [
                        "rgba(255, 26, 104, 1)",
                        "rgba(54, 162, 235, 1)",
                        "rgba(255, 206, 86, 1)",
                        "rgba(75, 192, 192, 1)",
                        "rgba(153, 102, 255, 1)",
                        "rgba(255, 159, 64, 1)",
                        "rgba(0, 0, 0, 1)",
                    ],
                    borderWidth: 1,
                }, ],
            };

            // config
            const config = {
                type: "bar",
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                },
            };

            // render init block
            const myChart = new Chart(document.getElementById("myChart"), config);

            // dougnut chart
            // setup
            const dataDoughnut = {
                labels: ["Remaining", "Total Spent"],
                datasets: [{
                    data: [50, 100],
                    backgroundColor: ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)"],
                    borderColor: ["rgba(255, 26, 104, 1)", "rgba(54, 162, 235, 1)", "rgba(255, 206, 86, 1)"],
                    borderWidth: 1,
                    hoverOffset: 4,
                }, ],
            };

            // config
            const configDoughnut = {
                type: "doughnut",
                data: dataDoughnut,
                options: {
                    responsive: true,
                },
            };

            // render init block
            const myChartDoughnut = new Chart(document.getElementById("myChartDoughnut"), configDoughnut);
        </script>

    </section>

    <p class="fs-2 mt-4 ms-3"><u>Categories of expenses</u></p>
    <p class="ms-3">Total expenses: Rs <?= $sumOfTotalExpensesTillNow ?></p>
    <div class="d-flex mx-3">
        <?php foreach ($expensesDetails as $exp) : ?>
            <div class="container width-css float-left border rounded border-2 m-1 border-dark">
                <div class="row">
                    <div class="col height-css d-flex align-items-center justify-content-center">
                        <div class="text-center">
                            <h1><?= $exp[1] ?></h1>
                            <p>Rs <?= $exp[2] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>



    <!--  bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

    <script>
        $(".filter-btn").on("click", function() {
            // removing previous effect on previous clicked btns
            $(".filter-btn").each(
                function(index, elem) {
                    $(elem).removeClass("btn-dark");
                    $(elem).addClass("btn-outline-dark");
                }
            );


            // add new class and removing old one
            $(this).addClass("btn-dark");
            $(this).removeClass("btn-outline-dark");

        });
    </script>
</body>

</html>