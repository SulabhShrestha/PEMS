<?php
require_once("../database/Auth.class.php");
session_start();

if (isset($_SESSION["login"])) {
    header("Location: /Project/index.php");
}

if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    // creating connection
    $auth = new Auth('', $email, $password);

    $auth->signIn();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <style>
        * {
            font-family: "Poppins", sans-serif;
        }

        .h-font {
            font-family: "Merienda", cursive;
        }
    </style>

    <title> Login</title>
</head>

<body>
    <section class="vh-100">
        <div class="container py-2 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-sm-8 col-md-7 col-lg-6 col-xl-5 m-auto">
                    <div class="card border-2 shadow ">
                        <div class="card-body bg-light">
                            <div class="text-center">
                                <P>
                                <h3 class="h-font">Welcome to PEMS</h3>
                                </P>
                                <img src="../assets/logo.png" style="width: 150px" alt="logo" class="mt-1">
                                <p>
                                <h5 class="h-font"> Manage Your Expenses<h5>
                                        </p>
                            </div>
                            <div>
                                <P class="mt-3"><em>Please enter your login details.</em></P>
                            </div>

                            <form action="" method="POST">
                                <input type="text" name="email" id="email" class="form-control my-4 py-2 border border-1 border-dark" placeholder="Email" />
                                <input type="text" name="password" id="password" class="form-control my-4 py-2 border border-1 border-dark" placeholder="Password" />
                                <div class="text-center">
                                    <!-- If it's a wrong information -->
                                    <?php
                                    if (isset($_GET["error"])) {
                                        echo '<p class="text-center alert alert-danger py-1">';
                                        echo $_GET["error"];
                                        echo '</p>';
                                    }

                                    ?>

                                    <input type="submit" class="btn btn-outline-dark border-2" value="Sign In" name="submit">
                                    <p class="mb-4 mt-4">Don't have an account?
                                        <a href="signup.php" class="link-primary">Sign Up
                                        </a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    </script>
</body>

</html>