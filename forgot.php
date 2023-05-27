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
    <title>GOLDENPROFIT- Password Reset</title>
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

                            //Import PHPMailer classes into the global namespace
                            //These must be at the top of your script, not inside a function
                            use PHPMailer\PHPMailer\PHPMailer;
                            use PHPMailer\PHPMailer\SMTP;
                            use PHPMailer\PHPMailer\Exception;

                            if (isset($_POST['submit'])) {
                                $mailcheack = mysqli_real_escape_string($connection, $_POST["email"]);
                                $result = mysqli_query($connection, "SELECT * FROM 	investors WHERE email ='" . $mailcheack  . "'");
                                $count = mysqli_num_rows($result);
                                while ($row = mysqli_fetch_array($result)) {
                                    $username = $row['username'];
                                }
                                if ($count == 0) {
                                    echo '<script>Swal.fire("User With This Mail Not Found!","","erorr")</script>';
                                } else {
                                    $mailcheack = mysqli_real_escape_string($connection, $_POST["email"]);
                                    $lenght = 50;
                                    $token = bin2hex(openssl_random_pseudo_bytes($lenght));
                                    $stmt = mysqli_prepare($connection, "UPDATE investors SET token ='{$token}' WHERE email=?");
                                    mysqli_stmt_bind_param($stmt, "s", $mailcheack);
                                    mysqli_stmt_execute($stmt);
                                    mysqli_stmt_close($stmt);

                                    //Load Composer's autoloader
                                    require 'vendor/autoload.php';

                                    //Instantiation and passing `true` enables exceptions
                                    $mail = new PHPMailer(true);

                                    try {
                                        //Server settings
                                        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                                        //$mail->isSMTP();                                            //Send using SMTP
                                        $mail->Host       = 'GOLDENPROFIT.ORG';                     //Set the SMTP server to send through
                                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                                        $mail->Username   = 'SUPPORT@GOLDENPROFIT.ORG';                     //SMTP username
                                        $mail->Password   = 'K1l2985wc7';                               //SMTP password
                                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                                        $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                                        //Recipients
                                        $mail->setFrom('support@GOLDENPROFIT.ORG', 'GOLDENPROFIT');
                                        //$mail->addAddress($mailcheack, 'Joe User');     //Add a recipient
                                        $mail->addAddress($mailcheack);               //Name is optional
                                        //$mail->addReplyTo('ufoeze72@gmail.com', 'Information');
                                        // $mail->addCC('cc@example.com');
                                        // $mail->addBCC('bcc@example.com');

                                        //Attachments
                                        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                                        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                                        //Content
                                        $mail->isHTML(true);                                  //Set email format to HTML
                                        $mail->Subject = 'Password Reset';
                                        //    $mail->Body    = "<p><a href='http://lovecare.test/admin/reset.php?mail=$mailcheack&token=$token'>Please click to reset your mail </a></p>";
                                        $mail->Body = '
                                        <!doctype html>
                                        <html lang="en-US">
                                        
                                        <head>
                                            <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
                                            <title>Reset Password</title>
                                            <meta name="description" content="Reset Password.">
                                            <style type="text/css">
                                                a:hover {text-decoration: underline !important;}
                                            </style>
                                        </head>
                                        
                                        <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
                                            <!--100% body table-->
                                            <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: "Open Sans", sans-serif;">
                                                <tr>
                                                    <td>
                                                        <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
                                                            align="center" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                                <td style="height:80px;">&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="text-align:center;">
                                                              <a href="https://GOLDENPROFIT.ORG" title="logo" target="_blank">
                                                                    <img width="60" src="https://GOLDENPROFIT.ORG/assets/images/web.png" title="logo" alt="logo">
                                                                  </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="height:20px;">&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                                                        style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                                                        <tr>
                                                                            <td style="height:40px;">&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="padding:0 35px;">
                                                                            <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:"Rubik",sans-serif;">You have
                                                                                    requested to reset your password</h1>
                                                                                <span
                                                                                    style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                                                                <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                                                   Hello ' . $username . ' We cannot simply send you your old password. A unique link to reset your
                                                                                    password has been generated for you. To reset your password, click the
                                                                                    following link and follow the instructions.
                                                                                </p>
                                                                                <a href="https://GOLDENPROFIT.ORG/reset.php?mail=' . $mailcheack . '&token=' . $token . '"
                                                                                    style="background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Reset
                                                                                    Password</a>
                                                                                    <p>If you did not request this email, you may safely ignore it.</P>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="height:40px;">&nbsp;</td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            <tr>
                                                                <td style="height:20px;">&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="text-align:center;">
                                                                    <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>www.GOLDENPROFIT.ORG</strong></p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="height:80px;">&nbsp;</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                            <!--/100% body table-->
                                        </body>
                                        
                                        </html>';
                                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                                        $mail->send();
                                        //echo 'Message has been sent';
                                    } catch (Exception $e) {
                                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                    }
                                    echo '<script>Swal.fire("A Reset Password link Was Sent To Your Mail Please Be Sure You Cheack Your Spam Folder Too, And Follow The link Sent To Your Mail To Reset Your Password!","","success").then(function() {
                                        window.location = "login.html"})</script>';
                                }
                            }
                            ?>

                            <div class="account-card__body">
                                <h3 class="text-center">Enter Mail ssociated with your account</h3>
                                <form method="post" action="#" id="loginForm" class="mt-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" required class="form-control" placeholder="Enter user EMail">
                                    </div>
                                    <div class="form-row">
                                    </div>
                                    <div class="mt-3">
                                        <button name="submit" class="cmn-btn">Submit</button>
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