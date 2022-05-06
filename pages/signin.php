<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <title>Sign In</title>
</head>

<body>
    <!-- creating container -->
    <div class="container-fluid bg-light">
        <div class="row">
            <!-- creating two columns -->
            <!-- 1st column out of two / left part of row  -->
            <div class="col-md-6 bg-light d-flex justify-content-center align-items-center">
                <!-- creating card to keep form inside it  -->
                <div class="card bg-light border-0" style="width: 30rem">
                    <!-- logo and welcome text -->
                    <div class="text-center">
                        <img src="logo.png" style="width: 185px" alt="logo" />
                        <h4 class="mt-1 mb-1 pb-1">Welcome To PEMS</h4>
                        <h5 class="mb-5 pb-1">Track Your Personal Expenses</h5>
                    </div>
                    <!-- Actual form starts here -->
                    <form action="index.php" method="POST">
                        <div class="mb-3">
                            <label for="Email1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="Email1" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="Password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="Password" required />
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary text-center">Sign in</button>
                        </div>
                    </form>
                    <!-- Form ends here -->
                    <div class="text-center">
                        <p><a href="#" class="link-primary">Forgot password?</a></p>
                        <h5 class="mb-2 mt-4">Don't have an account? <a href="#" class="link-primary">Sign up for
                                free</a></h5>
                    </div>
                </div>
            </div>

            <!-- 2nd column out of two / right part of row -->
            <div class="col-md-6 bg-light">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/first.jpg" class="d-block w-100" style="height: 100vh" alt="image" />
                        </div>
                        <div class="carousel-item">
                            <img src="assets/sec.jpg" class="d-block w-100" style="height: 100vh" alt="image" />
                        </div>
                        <div class="carousel-item">
                            <img src="assets/third.jpg" class="d-block w-100" style="height: 100vh" alt="image" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>