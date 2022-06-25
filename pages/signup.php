<?php
require_once("../database/Auth.class.php");
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];


    if (strlen($password) < 8)
        header("Location: signup.php?error=Password length must be greater or equal to 8");

    else {
        // creating connection
        session_start();
        $auth = new Auth($username, $email, $password);
        $auth->signUp();
    }
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

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <style>
        * {
            font-family: "Poppins", sans-serif;
        }

        .h-font {
            font-family: "Merienda", cursive;
        }
    </style>

    <title>Signup</title>
</head>

<body>
    <section class="vh-100">
        <div class="container py-2 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-sm-8 col-md-7 col-lg-6 col-xl-5 m-auto">
                    <div class="card border-2 shadow">
                        <div class="card-body bg-light">
                            <div class="text-center">

                                <h4 class="mt-1 pt-2 h-font">Create Account</h4>

                                <img src="../assets/logo.png" style="width: 150px" alt="logo" class="mt-2">
                            </div>
                            <div>
                                <P class="mt-1"><em>Please enter your details.</em></P>
                            </div>
                            <form action="" method="POST">
                                <input type="text" name="username" class="form-control my-4 py-2 border border-1 border-dark" placeholder="Username" />
                                <input type="text" name="email" class="form-control my-4 py-2 border border-1 border-dark" placeholder="Email" />
                                <input type="text" name="password" class="form-control my-4 py-2 border border-1 border-dark" placeholder="Password" />
                                <!-- If account already exists -->
                                <?php
                                if (isset($_GET["error"])) {
                                    echo '<p class="alert alert-danger py-1 text-center">';
                                    echo $_GET["error"];
                                    echo '</p>';
                                }

                                ?>

                                <div class="text-center mt-3">
                                    <input type="submit" class="btn btn-outline-dark border-2" value="Sign Up" name="submit">

                                    <p class="mb-3 mt-3">Already have an account? <a href="signin.php" class="link-primary">Sign In
                                        </a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </script>
</body>

</html>