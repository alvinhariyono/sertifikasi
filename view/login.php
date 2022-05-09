<?php

session_start();

if (isset($_SESSION['userlogin'])) {

    header("Location: index.php");
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>Programming Knowledge Login</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"> </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome To tayoyo laundry!</h1>
                                    </div>

                                    <form>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" name="username" id="username" placeholder="masukkan username" class="form-control input_user" required>
                                        </div>
                                        <div class="input-group mb-2">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                            </div>
                                            <input type="password" name="password" id="password" placeholder="masukkan password" class="form-control input_pass" required>
                                        </div>


                                </div>
                                <div class="btn btn-primary btn-user btn-block	">
                                    <button type="button" name="button" id="login" class="btn btn-primary btn-user btn-block">Login</button>
                                </div>
                                <br>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script>
            $(function() {
                $('#login').click(function(e) {

                    var valid = this.form.checkValidity();

                    if (valid) {
                        var username = $('#username').val();
                        var password = $('#password').val();
                    }


                    e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: '../model/jslogin.php',
                        data: {
                            username: username,
                            password: password
                        },
                        success: function(data) {
                            alert(data);
                            if ($.trim(data) === "login sukses") {
                                setTimeout(' window.location.href =  "../view/mainpage.php"', 1000);
                            }
                        },
                        error: function(data) {
                            alert('there were erros while doing the operation.');
                        }
                    });

                });
            });
        </script>
</body>

</html>