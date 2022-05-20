<?php
require_once("../database/Auth.class.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />

    <title> Login</title>
</head>

<body>
    <section>
        <div class="container  mt-2 pt-2">
            <div class="row">
                <div class="col-12 col-sm-7 col-md-6 m-auto">
                    <div class="card border-0 shadow ">
                        <div class="card-body bg-light">
                            <div class="text-center">
                                <P>
                                <h4 class="text-success mt-2 pt-3">Welcome to PEMS</h4>
                                </P>
                                <img src="../assets/logo.png" style="width: 150px" alt="logo" class="mt-2 mb-2 border border-3 border-primary rounded-circle">
                            </div>
                            <div>
                                <P class="mt-3"><em>Please enter your login details.</em></P>
                            </div>

                            <form action="" method="POST">
                                <input type="text" name="email" id="email" class="form-control my-4 py-2" placeholder="Email" />
                                <input type="text" name="password" id="oassword" class="form-control my-4 py-2" placeholder="Password" />
                                <div class="text-center">
                                    <input type="submit" class="btn btn-primary" value="submit" name="submit">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
</body>

</html>