<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Hello, world!</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- this is left part  -->
            <div class="col-md-4 bg-light " style="height: 100vh;">
                <div class="text-center mt-4 mb-1">
                    <img src="logo.png" style="width: 185px" alt="logo" />
                    <P>
                    <h2 class=" text-start mx-3 my-2 px-3 py-2">Track your Personal Expenses</h2>
                    </P>
                    <p>
                    <h5 class="text-success text-start mx-3 my-1 px-3 py-1">PEMS is a digitally automated diary that
                        manages all the expenses allowing users to track their expenses eliminating mannual effort.</h5>
                    </p>
                </div>
                <div class="mx-3 my-1 px-3 py-1">
                    <ul class="nav flex-column">
                        <li class="nav-item fs-5">
                            <i class="bi bi-calculator"></i> Realtime Calculation
                        </li>
                        <li class="nav-item fs-5">
                            <i class="bi bi-person-plus"></i> Custom Expense Categories
                        </li>
                        <li class="nav-item fs-5">
                            <i class="bi bi-alarm"></i> Liability Remainder
                        </li>
                        <li class="nav-item fs-5">
                            <i class="bi bi-stop-circle"></i> Expense Limitation
                        </li>
                        <li class="nav-item fs-5">
                            <i class="bi bi-file-bar-graph"></i> Reports
                        </li>
                    </ul>
                </div>

            </div>
            <!-- this is right part  -->
            <div class="col-md-8 bg-light" style="height: 100vh;">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                            <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-5">Sign up</p>

                            <form class="mx-1 mx-md-4">

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" for="form3Example1c">Full Name</label>
                                        <input type="text" id="form3Example1c" class="form-control" />

                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" for="form3Example3c">Email</label>
                                        <input type="email" id="form3Example3c" class="form-control" />

                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" for="form3Example4c">Password</label>
                                        <input type="password" id="form3Example4c" class="form-control" />

                                    </div>
                                </div>

                                <div class="form-check d-flex justify-content-center mb-3">
                                    <b>
                                        <p class="mb-2 mt-4">Already have an account? <a href="#"
                                                class="link-primary">Sign In
                                            </a></p>
                                    </b>
                                </div>

                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                    <button type="button" class="btn btn-primary btn-lg">Register</button>
                                </div>

                            </form>

                        </div>
                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                            <img src="draw.jpg" class="img-fluid" alt="Sample image">

                        </div>
                    </div>
                </div>

                <!-- section -->
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>