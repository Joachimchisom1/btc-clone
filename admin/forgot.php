<?php include "../includes/db.php"; ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<!-- Page Content -->

<body>
    <div class="container">

        <div class="form-gap"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="text-center">


                                <h3><i class="fa fa-lock fa-4x"></i></h3>
                                <h2 class="text-center">Forgot Password?</h2>
                                <p>Reset your password</p>
                                <div class="panel-body">


                                    <?php

                                    //Import PHPMailer classes into the global namespace
                                    //These must be at the top of your script, not inside a function
                                    use PHPMailer\PHPMailer\PHPMailer;
                                    use PHPMailer\PHPMailer\SMTP;
                                    use PHPMailer\PHPMailer\Exception;

                                    if (isset($_POST['recover-submit'])) {
                                        $mailcheack = mysqli_real_escape_string($connection, $_POST["email"]);
                                        $result = mysqli_query($connection, "SELECT * FROM user_table WHERE user_mail ='" . $mailcheack  . "'");
                                        $count = mysqli_num_rows($result);
                                        if ($count == 0) {
                                            echo "User Not Found";
                                        } else {
                                            $mailcheack = mysqli_real_escape_string($connection, $_POST["email"]);
                                            $lenght = 50;
                                            $token = bin2hex(openssl_random_pseudo_bytes($lenght));
                                            $stmt = mysqli_prepare($connection, "UPDATE user_table SET token='{$token}' WHERE user_mail=?");
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
                                                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                                                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                                                $mail->Username   = 'ufoeze72@gmail.com';                     //SMTP username
                                                $mail->Password   = 'ufoezeprince@11/10/1994';                               //SMTP password
                                                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                                                $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                                                //Recipients
                                                $mail->setFrom('ufoeze72@gmail.com', 'lovecare');
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
                                                $mail->Subject = 'Password reset';
                                                $mail->Body    = "<p><a href='http://lovecare.test/admin/reset.php?mail=$mailcheack&token=$token'>Please click to reset your mail </a></p>";
                                                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                                                $mail->send();
                                                //echo 'Message has been sent';
                                            } catch (Exception $e) {
                                                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                            }


                                            // $to = $mailcheack;
                                            // $subject = wordwrap("PASSWORD RECOVERY", 70);
                                            // $body = "<p><a href='http://fs.test/admin/reset.php?mail=$mailcheack&token=$token'>please click to reset your mail </a></p>";
                                            // $header = "From: " . "server";
                                            // //// use wordwrap() if lines are longer than 70 characters
                                            // //// send email
                                            // mail($to, $subject, $body, $header);
                                            echo "Reset link sent Please Follow the link Sent To  Your Mail to reset your Password";

                                            //header("Location: index.php");
                                        }
                                    }
                                    ?>



                                    <form  action="#" id="register-form" role="form" autocomplete="off" class="form" method="post">

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                                <input id="email" name="email" placeholder="email address" class="form-control" type="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                        </div>

                                        <!--<input type="hidden" class="hide" name="token" id="token" value="">-->
                                    </form>

                                </div><!-- Body-->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <hr>

    </div>
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html><!-- /.container -->