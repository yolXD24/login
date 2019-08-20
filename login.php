<?php
session_start();
include_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"
        integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

</head>

<body class="signUp">
    <br><br>
    <div class="row signUp">
        <div class="col-md-4"></div>
        <div class="col-md-4 signUpForm container ">
            <div class="forms">
                <br>
                <br>
                <!-- login -->
                <div class="card container " id="loginForm">
                    <div class="card-header">
                        <p class="text-center h4">Login</p>
                    </div>
                    <div class="login">

                        <div class="form-group">
                            <label for="email" class="bmd-label-floating">Email</label>
                            <input type="email" class="form-control log" id="log-email" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="bmd-label-floating">Password</label>
                            <input type="password" class="form-control log" id="log-password" required>
                        </div>
                    </div>
                    <br>
                    <center>
                        <a href="signup.php"> <button type="submit" class="btn btn-outline-primary sup" value="Sign Up">Sign
                                Up</button></a>
                        <button type="button" class="btn btn-outline-primary btn-login" value="Log In">Log In</button>
                    </center>

                    <br>
                </div>
                <!-- login -->
            </div>

        </div>
        <div class="col-md-4"></div>
    </div>



    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9"
        crossorigin="anonymous"></script>

    <script>

        $(document).ready(function () {

            $('body').bootstrapMaterialDesign();

            $(document).keypress(function (event) {
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if (keycode == '13') {
                    $(".btn-login").click();
                }
            });

            var valid = true;

            $(".btn-login").click(function () {
                $('input').each(function () {
                    if ($(this).val() == '') {
                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'All inputs should be filled!'
                        })
                        valid = false;
                        return false
                    }
                });
            });

        });
    </script>
</body>

</html>