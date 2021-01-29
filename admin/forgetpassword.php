<?php 

    session_start();
    include "incs/dbc.php";

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title> Change Password </title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Forget Password </title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>

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
                                            <input type="text" class="form-control form-control-user" name="email" placeholder="Enter Email..." required>
                                        </div>
                                        <div class="p-2">
                                            <input type="submit" name="frgtpswd" class="btn btn-primary btn-user float-right" value="Change Password">
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

            if (isset($_POST['frgtpswd'])) {
                $email = $_POST['email'];
                $getemail = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
                if (mysqli_num_rows($getemail) > 0) {
                    while ($row = mysqli_fetch_assoc($getemail)) {
                        $rand = rand(1000, 9999);
                        $update = mysqli_query($conn, "UPDATE users SET auth_code = '$rand' WHERE email = '$email'");
                        if ($update) {
                            ?>
                            <div class="row m-auto" style="border: solid 1px #000;">
                                <div class="col-md-12">
                                    <p class="mr-5 ml-5 bg-danger rounded text-center" style="color: #fff;"> Verification Code sent to <?php echo $email;?>. </p>

                                    <?php 
                                        $sent = mail("victamoflove@gmail.com", "Password Change Request", "Request Accepted.");

                                        if (!$sent) {
                                            echo "<script> alert('Request not Accepted.'); </script>";
                                        }
                                    ?>

                                </div>
                            </div>
                            <?php
                        }
                    }
                }else{
                    ?>
                    <div class="row m-auto" style="border: solid 1px #000;">
                        <div class="col-md-12">
                            <p class="mr-5 ml-5 bg-danger rounded text-center" style="color: #fff;"> <?php echo $email;?> is not registered yet. </p>
                        </div>
                    </div>
                    <?php
                }
            }

        ?>
    </div>

    <script type="text/javascript" src="vendor/fontawesome/js/fontawesome.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>