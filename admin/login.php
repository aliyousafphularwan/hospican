<div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-4 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body bg-login-image -->
                        <div class="row mx-auto">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome</h1>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                name="username" 
                                                placeholder="Enter Username..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="password" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <a href="forgetpassword.php">forget password?</a>
                                        </div>
                                        <div class="form-group">
                                            <div class="">
                                                <?php 
                                                    if (isset($_POST["logmit"]) && !isset($_SESSION["admin"])) {
                                                        echo "<p style='font-size:10pt;background:#ff4646;color:#fff;padding:5px 10px;border-radius:10px;'>wrong username OR password</p>";
                                                    }
                                                ?>
                                                
                                            </div>
                                        </div>
                                        <input type="submit" name="logmit" class="btn btn-primary btn-user btn-block" value="Login">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>