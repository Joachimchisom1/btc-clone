<?php include "includes/db.php"; ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <META NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GOLDENPROFIT PASSWORD RESET</title>
    <link rel="icon" type="image/png" href="assets/images/favicon.png" sizes="16x16">
    <!-- bootstrap 4  -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- fontawesome 5  -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- line-awesome webfont -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">
    <link rel="stylesheet" href="assets/css/vendor/animate.min.css">
    <!-- slick slider css -->
    <link rel="stylesheet" href="assets/css/vendor/slick.css">
    <link rel="stylesheet" href="assets/css/vendor/dots.css">
    <!-- dashdoard main css -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- sweet alert -->
    <link href="assets/css/sweetalert.css" rel="stylesheet">
    <script src="assets/js/sweetalert.js"></script>
    <!-- jQuery library -->
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
</head>

<body>
   <!-- Smartsupp Live Chat script -->

    <div class="preloader">
        <div class="preloader-container">
            <span class="animated-preloader"></span>
        </div>
    </div>
    <!-- scroll-to-top start -->
    <div class="scroll-to-top">
        <span class="scroll-icon">
            <i class="fa fa-rocket" aria-hidden="true"></i>
        </span>
    </div>
    <!-- scroll-to-top end -->
    <div class="full-wh">
        <!-- STAR ANIMATION -->
        <div class="bg-animation">
            <div id="stars"></div>
            <div id="stars2"></div>
            <div id="stars3"></div>
            <div id="stars4"></div>
        </div>
        <!-- / STAR ANIMATION -->
    </div>
    <div class="page-wrapper">
        <!-- account section start -->
        <div class="account-section bg_img" data-background="assets/images/bg/bg-5.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-7">
                        <div class="account-card">

                            <?php
                            if (isset($_GET['mail']) & isset($_GET['token'])) {
                                $token = mysqli_real_escape_string($connection, $_GET["token"]);
                                $result = mysqli_query($connection, "SELECT * FROM investors WHERE token ='{$token}'");
                                $count = mysqli_num_rows($result);
                                if ($count == 0) {
                                    //echo "token not seen in database";
                                    header("Location: index.php");
                                } else {
                                    if (isset($_POST['submit1'])) {
                                        if (strlen($_POST['password']) >= 8) {
                                            if ($_POST['password'] === $_POST['confirmPassword']) {
                                                // echo "yess";
                                                $password = mysqli_real_escape_string($connection, $_POST['password']);
                                                //$hashpass = password_hash($password, PASSWORD_BCRYPT, array('cost'=>12));
                                                $mailcheack = mysqli_real_escape_string($connection, $_GET['mail']);
                                                $stmt = mysqli_prepare($connection, "UPDATE investors SET password ='{$password}', token='' WHERE email=?");
                                                mysqli_stmt_bind_param($stmt, "s", $mailcheack);
                                                mysqli_stmt_execute($stmt);
                                                mysqli_stmt_close($stmt);
                                                echo '<script>Swal.fire("Password Reset Successfully!","","success").then(function() {
                                                window.location = "login.html"})</script>';
                                            } else {
                                                echo  '<script>Swal.fire("Password and confirm password are not the same","","warning")</script>';
                                            }
                                        } else {
                                            echo  '<script>Swal.fire("Password length Must Be Equal Or Greater than 8","","warning")</script>';
                                        }
                                    }
                                }
                            } else {
                                header("Location: index.php");
                            }
                            ?>

                            <div class="account-card__body">
                                <h3 class="text-center">RESET PASSWORD</h3>
                                <form method="POST" id="register-form" role="form" autocomplete="off" class="mt-4">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" required class="form-control" placeholder="Enter Password">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="confirmPassword" required class="form-control" placeholder="Enter Confirm Password">
                                    </div>
                                    <div class="mt-3">
                                        <button name="submit1" class="cmn-btn">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- account section end -->
        <!-- Script -->
    </div>
    <!-- page-wrapper end -->
    <!-- bootstrap js -->
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <!-- slick slider js -->
    <script src="assets/js/vendor/slick.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <script src="assets/js/contact.js"></script>
    <!-- dashboard custom js -->
    <script src="assets/js/app.js"></script>
</body>

</html>