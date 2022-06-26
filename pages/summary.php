<!DOCTYPE html>
<html lang="en">

<?php
session_start();
require_once("../database/Expense.class.php");
$expense = new Expense($_SESSION['uid']);

$expensesDetails = $expense->fetchCategoriesOfExpensesOfAllTime();
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
                    <a href="/PEMS/database/logout.php"><span class="material-icons me-1" id="icon2">face</span></a>
                </div>
            </div>
        </div>
    </nav>

    <!-- summry begins -->
    <section>
        <div class="d-flex align-items-center justify-content-around my-3 mx-3 px-3 py-3 bg-info rounded">
            <span class="fs-3">Filter By:</span>
            <button type="button" class="btn btn-outline-dark border-2 filter-btn">Week</button>
            <button type="button" class="btn btn-outline-dark border-2 filter-btn">Month</button>
            <button type="button" class="btn btn-outline-dark border-2 filter-btn">Year</button>
            <button type="button" class="btn btn-dark filter-btn">All Time</button>
        </div>

        <div class="container-fluid">
            <div class="row align-item-center justify-content-center">
                <div class="col-md-7 chart">
                    <h2 class="mx-2 my-2"><u>Expenses</u></h2>
                    <canvas id="barGraphChart"></canvas>
                </div>

            </div>
        </div>

        </div>




        <p class="fs-2 mt-4 ms-3"><u>Categories of expenses</u></p>
        <p class="ms-3 total-expenses">Total expenses: Rs <?= $sumOfTotalExpensesTillNow ?? 0 ?></p>
        <div class="d-flex align-content-center flex-wrap justify-content-center mx-3 categories-section">
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            // Reference to bar graph
            let barGraphChartRef;

            function buildBarChart(labels, values) {

                let data = {
                    labels: labels,
                    datasets: [{
                        data: values,
                        backgroundColor: [
                            'rgb(54, 162, 235)',
                            'rgb(14, 162, 235)',
                            'rgb(54, 12, 35)',
                            'rgb(54, 62, 235)',

                        ],
                    }],
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

                // BarGrapgh chart ref
                let graphArea = document.getElementById("barGraphChart").getContext("2d");

                const barGraphChart = new Chart(graphArea, config);

                barGraphChartRef = barGraphChart;

                return barGraphChart;
            }

            function buildCategoryOfExpenseCard(heading, amount) {
                return `
                <div class="container width-css float-left border rounded border-2 m-1 border-dark">
                    <div class="row">
                        <div class="col height-css d-flex align-items-center justify-content-center">
                            <div class="text-center">
                                <h1>${heading}</h1>
                                <p>Rs ${amount}</p>
                            </div>
                        </div>
                    </div>
                </div>
                `;
            }

            // calling whole all the data on load
            $.ajax({
                url: "../utils/fetch_expenses_details.php",
                data: {
                    action: "fetchAllTime"
                }, // data send to above url
                dataType: "json",
                type: 'post',
                success: function(output) {

                    // labels and data at first are empty
                    let labels = [];
                    let data = [];

                    // pushing label to [labels]
                    for (let year of output[0]) {
                        labels.push(year[0]);
                        data.push(0); // adding default data
                    }

                    // pushing yearly amount to data
                    for (let elem of output[0]) {
                        let index = labels.indexOf(elem[0]); // finding the index of the year

                        // inserting data to [data]
                        data.splice(index, 1, elem[1]);
                    }


                    buildBarChart(labels, data);
                }
            });


            // adding click events to all filtering buttons
            $(".filter-btn").on("click", function() {
                // removing previous effect on previous clicked from all btns
                $(".filter-btn").each(
                    function(index, elem) {
                        $(elem).removeClass("btn-dark");
                        $(elem).addClass("btn-outline-dark");
                    }
                );


                // add new class and removing old one
                $(this).addClass("btn-dark");
                $(this).removeClass("btn-outline-dark");

                // removing all elemenents of categories-section and later adding new one
                $(".categories-section").empty();


                $.ajax({
                    context: $(this),
                    url: "../utils/fetch_expenses_details.php",
                    data: {
                        action: "fetch" + $(this).text()
                    }, // data send to above url
                    dataType: "json",
                    type: 'post',
                    success: function(output) {
                        // labels and data at first are empty
                        let labels = [];
                        let data = [];

                        // adding relevant data to [labels] and [data]
                        if ($(this).text() === "Week") {

                            labels = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

                            // adding default data
                            for (let label of labels) {
                                data.push(0);
                            }

                            // adding expenses to barchart
                            for (let elem of output[0]) {

                                data.splice(elem[0] - 1, 1, elem[1]);
                            }

                        } else if ($(this).text() === "Month") {

                            // adding to label
                            for (let a = 1; a <= 30; a++) {
                                labels.push(a);
                            }

                            // jan, mar, may, july, aug, oct, dec has 31 days

                            let date = new Date();
                            thisMonth = date.getMonth() + 1;

                            // Adding 31 to specific month
                            for (let month of [1, 3, 5, 7, 8, 10, 12]) {
                                if (thisMonth === month)
                                    labels.push(31);
                            }

                            // adding default data
                            for (let label of labels) {
                                data.push(0);
                            }

                            // adding expenses data to bar chart
                            for (let elem of output[0]) {
                                data.splice(elem[0] - 1, 1, elem[1]);
                            }


                        } else if ($(this).text() === "Year") {
                            labels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

                            // adding default data
                            for (let label of labels) {
                                data.push(0);
                            }

                            // adding expenses data to bar chart
                            for (let elem of output[0]) {
                                data.splice(elem[0] - 1, 1, elem[1]);
                            }

                        } else if ($(this).text() === "All Time") {
                            // pushing label to [labels]
                            for (let year of output[0]) {
                                labels.push(year[0]);
                                data.push(0); // adding default data
                            }

                            // pushing yearly amount to data
                            for (let elem of output[0]) {
                                let index = labels.indexOf(elem[0]); // finding the index of the year

                                // inserting data to [data]
                                data.splice(index, 1, elem[1]);
                            }
                        }

                        // adding expenses details to categories section
                        let sumOfTotalExpenses = 0;
                        for (let elem of output[1]) {
                            $(".categories-section").append(buildCategoryOfExpenseCard(elem[1], elem[2]));
                            sumOfTotalExpenses += parseInt(elem[2]);
                        }

                        $(".total-expenses").text(`
                        Total expenses: Rs ${sumOfTotalExpenses}
                        `);

                        barGraphChartRef.destroy();

                        buildBarChart(labels, data);
                    }
                });

            });
        </script>
</body>

</html>