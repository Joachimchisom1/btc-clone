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
                                <h2 class="text-center">Reset Password?</h2>
                                <p>You can reset your password here.</p>
                                <div class="panel-body">
                                    <?php
                                    if (isset($_GET['mail']) & isset($_GET['token'])) {
                                        $token = mysqli_real_escape_string($connection, $_GET["token"]);
                                        $result = mysqli_query($connection, "SELECT * FROM user_table WHERE token ='{$token}'");
                                        $count = mysqli_num_rows($result);
                                        if ($count == 0) {
                                            echo "token not seen in database";
                                            //header("Location: index.php");
                                        } else {
                                             echo "token Found";
                                            if (isset($_POST['resetPassword'])) {
                                                if ($_POST['password'] === $_POST['confirmPassword']) {
                                                    // echo "yess there are the same";
                                                    $password = $_POST['password'];
                                                    $hashpass = password_hash($password, PASSWORD_BCRYPT, array('cost'=>12));
                                                    $mailcheack = mysqli_real_escape_string($connection, $_GET['mail']);
                                                    $stmt = mysqli_prepare($connection, "UPDATE user_table SET password ='{$hashpass}', token='' WHERE user_mail=?");
                                                    mysqli_stmt_bind_param($stmt, "s", $mailcheack);
                                                    mysqli_stmt_execute($stmt);
                                                    mysqli_stmt_close($stmt);
                                                    echo "Reset sucessful <span><a href='index.php'>click</a></span> to login   ";
                                                } else {
                                                   echo  "Password and confirm password are not the same";
                                                }
                                                
                                            }
                                        }
                                        
                                    } else {
                                        header("Location: index.php");
                                    }
                                    ?>



                                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
                                                <input id="password" name="password" placeholder="Enter password" class="form-control" type="password">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-ok color-blue"></i></span>
                                                <input id="confirmPassword" name="confirmPassword" placeholder="Confirm password" class="form-control" type="password">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input name="resetPassword" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                        </div>

                                        <input type="hidden" class="hide" name="token" id="token" value="">
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