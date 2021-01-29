<?php 

    session_start();
    include "incs/dbc.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-10 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body bg-login-image -->
                        <div class="row mx-auto">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Change Password</h1>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="verifcode" placeholder="Enter 4 digit Code..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="chpass1" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="chpass2" placeholder="Verify Password" required>
                                        </div>
                                        <div class="p-2">
                                            <input type="submit" name="chngpswrd" class="btn btn-primary btn-user float-right" value="Change Password">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div class="container">
        <?php

            if (isset($_POST['chngpswrd'])) {
                $pass1 = $_POST['chpass1'];
                $pass2 = $_POST['chpass2'];
                $code = $_POST['verifcode'];

                if ($pass1 == $pass2) {
                    
                    $update = mysqli_query($conn, "UPDATE users SET password = '$pass2' WHERE auth_code = '$code'");
                    if (!$update) {
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="rounded p-2 bg-danger" style="color: #fff;"> Error Changing Password. </p>
                                <a href="index.php" class="btn btn-success">Login</a>
                            </div>
                        </div>
                        <?php
                    }else{
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="rounded p-2 bg-success" style="color: #fff;"> Password Successfully Changed. </p>
                                <a href="index.php" class="btn btn-success">Login</a>
                            </div>
                        </div>
                        <?php
                    }

                }else{
                    echo "<script> alert('passwords must match.'); </script>";
                }
            }

        ?>
    </div>

        <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script type="js/main.js"></script>

</body>
</html>