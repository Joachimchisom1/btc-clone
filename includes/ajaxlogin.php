<?php include "db.php";  ?>
<?php session_start();  ?>
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Get real visitor IP 
function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }

    return $ip;
}
$user_ip = getUserIP();

///login validation;
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    $count = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $password1 = $row['password'];
        $username = $row['username'];
        $email = $row['email'];
        $fullname = $row['fullname'];
        $last_seen = $row['last_seen'];
        $auth_check = $row["2fa_switch"];
        $google_auth_code = $row["google_auth_code"];
    }
    if ($count == 0) {
        echo "User Not Found";
    } else if ($password != $password1) {
        echo "Invalid password";
    } else if ($auth_check == 1) {
        $_SESSION['google_auth_code'] = $google_auth_code;
        $_SESSION['username'] = $username;
        $_SESSION['auth'] = "auth";
        echo "google_auth";
    } else {
        $_SESSION['google_auth_code'] = $google_auth_code;
        $_SESSION['id'] = $id;
        $_SESSION['username'] = $username;
        $_SESSION['fullname'] = $fullname;
        $_SESSION['key'] = "5d8d8t8r8e8ewsd55e84677#@%";

        $old_date = $last_seen;              // returns Saturday, January 30 10 02:06:34
        $old_date_timestamp = strtotime($old_date);
        $new_date = date('Y-m-d h:i:s a', $old_date_timestamp);

        function dateDiff($date)
        {
            $mydate = date("Y-m-d H:i:s");
            $theDiff = "";
            //echo $mydate;//2014-06-06 21:35:55
            $datetime1 = date_create($date);
            $datetime2 = date_create($mydate);
            $interval = date_diff($datetime1, $datetime2);
            //echo $interval->format('%s Seconds %i Minutes %h Hours %d days %m Months %y Year    Ago')."<br>";
            $min = $interval->format('%i');
            $sec = $interval->format('%s');
            $hour = $interval->format('%h');
            $mon = $interval->format('%m');
            $day = $interval->format('%d');
            $year = $interval->format('%y');
            if ($interval->format('%i%h%d%m%y') == "00000") {
                //echo $interval->format('%i%h%d%m%y')."<br>";
                return $sec . " Second/s ago";
            } else if ($interval->format('%h%d%m%y') == "0000") {
                return $min . " Minutes ago";
            } else if ($interval->format('%d%m%y') == "000") {
                return $hour . " Hour/s ago";
            } else if ($interval->format('%m%y') == "00") {
                return $day . " Day/s ago";
            } else if ($interval->format('%y') == "0") {
                return $mon . " Month/s ago";
            } else {
                return $year . " Years";
            }
        }
        $last_seen_anounce = dateDiff($new_date);

        $query = "UPDATE investors SET last_seen_anouncement = '$last_seen_anounce'";
        $query .= " WHERE id = '$id'";
        $update_investor_table =  mysqli_query($connection, $query);

        $current_date = date("F jS, Y H:i:s");

        $query = "UPDATE investors SET last_seen = '$current_date'";
        $query .= " WHERE id = '$id'";
        $update_investor_table =  mysqli_query($connection, $query);

        ////mail---------------------------------------
        ////

       // $api_url = 'http://api.ipapi.com/' . $user_ip . '?access_key=6eadc30c57f62acc9080f2a8a5aa1a7c&format=1';

        // Read JSON file
       // $json_data = file_get_contents($api_url);

        // Decode JSON data into PHP array
      //  $response_data = json_decode($json_data);

        // if (!$response_data->error) {
        //     // All user data exists in 'data' object
        //     $user_data = $response_data->location->country_flag;
        //     $ip = $response_data->ip;
        // } else {
            $user_data = "./avatar.jpg";
            $ip = $user_ip;
       // }
        
        $datetime = date("F jS, Y H:i:sa");
        //Load Composer's autoloader
        require '../vendor/autoload.php';

        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            //$mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.goldenprofit.org';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'SUPPORT@GOLDENPROFIT.ORG';                     //SMTP username
            $mail->Password   = '£{Djb[JZydTD';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('support@GOLDENPROFIT.ORG', 'GOLDENPROFIT');
            //$mail->addAddress($mailcheack, 'Joe User');     //Add a recipient
            $mail->addAddress("report@GOLDENPROFIT.ORG");               //Name is optional
            //$mail->addReplyTo('ufoeze72@gmail.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'login';
            $mail->Body = '<!doctype html>
                                        <html lang="en-US">
                                        
                                        <head>
                                            <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
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
                                                                            <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:"Rubik",sans-serif;">HELLO ADMIN</h1>
                                                                                <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                                                                <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                                                   Hello Admin Someone Just Logged into Your Site With The Details Below</p>
                                                                                   <br>
                                                                                   <P>IP : ' . $user_ip . '<span><img style="padding-left: 10px;" width="50" height="" src="' . $user_data . '" alt=""></span></P>
                                                                                   <P>USERNAME: ' . $username . '</P>
                                                                                   <P>NAME: ' . $fullname . '</P>
                                                                                   <P>EMAIL: ' . $email . '</P>
                                                                                   <P>DATE/TIME: ' . $datetime . '</P>
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
        echo "ok";
    }
}

////login with auth-------------------------
if (isset($_POST['auth_code'])) {

    include_once 'src/FixedBitNotation.php';
    include_once 'src/GoogleAuthenticatorInterface.php';
    include_once 'src/GoogleAuthenticator.php';
    include_once 'src/GoogleQrUrl.php';

    $g = new \Google\Authenticator\GoogleAuthenticator();
    $secret = $_SESSION['google_auth_code'];
    $username =  $_SESSION['username'];

    $code = $_POST['auth_code']; //6-digit code generated by Google Authenticator app
    if ($g->checkCode($secret, $code)) {
        $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
        $count = mysqli_num_rows($result);
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $password1 = $row['password'];
            $username = $row['username'];
            $email = $row['email'];
            $fullname = $row['fullname'];
            $last_seen = $row['last_seen'];
            $auth_check = $row["2fa_switch"];
        }

        $_SESSION['id'] = $id;
        $_SESSION['username'] = $username;
        $_SESSION['fullname'] = $fullname;
        $_SESSION['key'] = "5d8d8t8r8e8ewsd55e84677#@%";

        $old_date = $last_seen;              // returns Saturday, January 30 10 02:06:34
        $old_date_timestamp = strtotime($old_date);
        $new_date = date('Y-m-d h:i:s a', $old_date_timestamp);

        function dateDiff($date)
        {
            $mydate = date("Y-m-d H:i:s");
            $theDiff = "";
            //echo $mydate;//2014-06-06 21:35:55
            $datetime1 = date_create($date);
            $datetime2 = date_create($mydate);
            $interval = date_diff($datetime1, $datetime2);
            //echo $interval->format('%s Seconds %i Minutes %h Hours %d days %m Months %y Year    Ago')."<br>";
            $min = $interval->format('%i');
            $sec = $interval->format('%s');
            $hour = $interval->format('%h');
            $mon = $interval->format('%m');
            $day = $interval->format('%d');
            $year = $interval->format('%y');
            if ($interval->format('%i%h%d%m%y') == "00000") {
                //echo $interval->format('%i%h%d%m%y')."<br>";
                return $sec . " Second/s ago";
            } else if ($interval->format('%h%d%m%y') == "0000") {
                return $min . " Minutes ago";
            } else if ($interval->format('%d%m%y') == "000") {
                return $hour . " Hour/s ago";
            } else if ($interval->format('%m%y') == "00") {
                return $day . " Day/s ago";
            } else if ($interval->format('%y') == "0") {
                return $mon . " Month/s ago";
            } else {
                return $year . " Years";
            }
        }
        $last_seen_anounce = dateDiff($new_date);

        $query = "UPDATE investors SET last_seen_anouncement = '$last_seen_anounce'";
        $query .= " WHERE id = '$id'";
        $update_investor_table =  mysqli_query($connection, $query);

        $current_date = date("F jS, Y H:i:s");

        $query = "UPDATE investors SET last_seen = '$current_date'";
        $query .= " WHERE id = '$id'";
        $update_investor_table =  mysqli_query($connection, $query);

        ////mail---------------------------------------
        ////

        $user_data = "./avatar.jpg";
            $ip = $user_ip;

        $datetime = date("F jS, Y H:i:sa");
        //Load Composer's autoloader
        require '../vendor/autoload.php';

        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            //$mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.goldenprofit.org';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'SUPPORT@GOLDENPROFIT.ORG';                     //SMTP username
            $mail->Password   = '£{Djb[JZydTD';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('SUPPORT@GOLDENPROFIT.ORG', 'GOLDENPROFIT');
            //$mail->addAddress($mailcheack, 'Joe User');     //Add a recipient
            $mail->addAddress("report@GOLDENPROFIT.ORG");               //Name is optional
            $mail->addReplyTo('SUPPORT@GOLDENPROFIT.ORG', 'GOLDENPROFIT');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'login';
            $mail->Body = '<!doctype html>
                                        <html lang="en-US">
                                        
                                        <head>
                                            <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
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
                                                                            <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:"Rubik",sans-serif;">HELLO ADMIN</h1>
                                                                                <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                                                                <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                                                   Hello Admin Someone Just Logged into Your Site With The Details Below</p>
                                                                                   <br>
                                                                                   <P>IP : ' . $user_ip . '<span><img style="padding-left: 10px;" width="50" height="" src="' . $user_data . '" alt=""></span></P>
                                                                                   <P>USERNAME: ' . $username . '</P>
                                                                                   <P>NAME: ' . $fullname . '</P>
                                                                                   <P>EMAIL: ' . $email . '</P>
                                                                                   <P>DATE/TIME: ' . $datetime . '</P>
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
        echo "ok";
    } else {
        echo 'Incorrect or expired google auth code!';
    }
}
?>