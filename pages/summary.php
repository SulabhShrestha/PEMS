<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summary</title>

    <!-- chart.js link -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <style>
        .height-css {
            height: 12vh;
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
    </style>
</head>

<body class="pl-2 pt-2">
    <button type="button" class="btn btn-outline-primary">Weekly</button><button type="button" class="btn btn-outline-primary">Monthly</button><button type="button" class="btn btn-outline-primary">Yearly</button>

    <div class="container-fluid p-0">
        <div class="row d-flex align-items-center">
            <div class="bar-graph col-8">
                <canvas id="barGraph"></canvas>
            </div>
            <div class="circular-graph col-3">

                <canvas id="doughnutGraph"></canvas>
            </div>
        </div>
    </div>



    <script>
        const barGraph = document.getElementById('barGraph').getContext('2d');
        const doughnutGraph = document.getElementById('doughnutGraph').getContext('2d');

        const myChart = new Chart(barGraph, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', "Nov", "Dec"],
                datasets: [{

                    data: [12, 19, 3, 5, 2, 3, 120, 12, 2, 1, 12, 11],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        const doughnut = new Chart(doughnutGraph, {
            type: 'doughnut',
            data: {
                labels: [
                    'Remaining',
                    'Total Spent'
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [50, 100],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            },
            options: {

                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>

    <p class="fs-1">Categories with biggest expenses</p>

    <?php for ($a = 1; $a < 10; $a++) : ?>
        <div class="container width-css float-left border m-1 border-primary">
            <div class="row">
                <div class="col height-css d-flex align-items-center justify-content-center">
                    <div class="text-center">
                        <span class="material-icons">
                            car_rental
                        </span>
                        <h1>hello</h1>
                    </div>
                </div>
            </div>
        </div>
    <?php endfor; ?>


</body>

</html>