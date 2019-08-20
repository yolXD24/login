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
    <title>Register</title>
    <link rel="stylesheet"
        href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"
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
                <div class="card container form">
                    <div class="card-header">
                        <p class="text-center h4">Sign Up</p>
                    </div>

                    <div class="form-group">
                        <label for="fname" class="bmd-label-floating">First Name</label>
                        <input type="text" class="form-control supF" id="fname" required>
                    </div>
                    <div class="form-group">
                        <label for="lname" class="bmd-label-floating">Last Name</label>
                        <input type="text" class="form-control supF" id="lname" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="bmd-label-floating">Email</label>
                        <input type="email" class="form-control supF" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="bmd-label-floating">Password</label>
                        <input type="password" class="form-control supF" id="password" required>
                    </div>

                    <br>
                    <center>
                        <input type="submit" class="btn btn-outline-primary " id="sup" value="Sign Up">
                        <input type="submit" class="btn btn-outline-primary" id="login" value="Log In">

                    </center>
                    <br>
                </div>
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
                    <center>
                        <button type="submit" class="btn btn-outline-primary sup" value="Sign Up">Sign Up</button>
                        <button type="button" class="btn btn-outline-primary btn-login" value="Log In">Log In</button>
                    </center>

                    <br>
                </div>
                <!-- login -->
            </div>
            <div class="dashboard card container">
                <br>
                <br>
                <p class="text-center db h1"></p>
                <br>
                <center>
                    <button type="button" class="btn btn-outline-primary btn-logout">Log Out</button>
                </center>
                <br>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>



    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
        integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"
        integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9"
        crossorigin="anonymous"></script>

    <script>

        $(document).ready(function () {
            $("#loginForm").hide();
            $(".dashboard").hide();
            var accts = [];
            var username = "";
            var login ;

            $('body').bootstrapMaterialDesign();

            $('#sup').click(function (e) {
                e.preventDefault();

                $('.supF').each(function () {
                    if ($(this).val() == '') {
                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'All inputs should be filled!'
                        })
                        return false
                    } else {
                        var email = "";
                        var password = "";
                        var fullname = "";
                        email = $("#email").val();
                        password = $("#password").val();
                        fullname = $("#fname").val() + " " + $("#lname").val()
                        accts.push({
                            'email': email,
                            'password': password,
                            'fullname': fullname
                        })

                        console.log(accts)
                        showHide();
                    }
                });
            });


            function showHide() {
                $("input").val();
                $(".form").hide();
                $("#loginForm").show();
            }

            $(".sup").click(function () {
                $(".form").show();
                $("#loginForm").hide();
            });

            $("#login").click(function () {
                showHide();
            });

            $(".btn-login").click(function () {
                $('.log').each(function () {
                    if ($(this).val() == '') {
                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'All inputs should be filled!'
                        })
                        return false
                    } else {
                        login =false;
                        for (let i = 0; i < accts.length; i++) {
                            if ($("#log-email").val() == accts[i].email && $("#log-password").val() == accts[i].password) {
                                $(".form").hide();
                                $("#loginForm").hide();
                                $(".db").text("HI " + accts[i].fullname);
                                $(".dashboard").show();
                                login = true;
                                username = accts[i].username;
                            }
                        }
                        if (!login) {
                            Swal.fire({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Account not Found!'
                            })
                        }

                    }
                });
            });

            $(".btn-logout").click(function () {
                $("input").val("");
                $(".dashboard").hide();
                $("#loginForm").show();
            })




        });
    </script>
</body>

</html>