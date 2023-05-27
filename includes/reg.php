<?php ob_start(); ?>
<?php session_start();  ?>
<?php include "db.php";  ?>
<?php include "function.php"; ?>
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require '../vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

if (isset($_POST['uname'])) {
    $fname = mysqli_real_escape_string($connection, $_POST['fname']);
    $uname = mysqli_real_escape_string($connection, $_POST['uname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $country = mysqli_real_escape_string($connection, $_POST['country']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $address_type = mysqli_real_escape_string($connection, $_POST['address_type']);
    $wallet_address = mysqli_real_escape_string($connection, $_POST['wallet_address']);
    $referrall_url = "https://GOLDENPROFIT.ORG/?ref=$uname";
    $date = date("F jS, Y");
    $current_date = date("F jS, Y H:i:s");

    $query = "SELECT * FROM investors WHERE username = '$uname'";
    $details = mysqli_query($connection, $query);
    $count = mysqli_num_rows($details);
    $query = "SELECT * FROM investors WHERE email = '$email'";
    $details = mysqli_query($connection, $query);
    $count1 = mysqli_num_rows($details);
    if ($count != 0) {
        echo 'User With The Same UserName Already Exist';
    } elseif ($count1 != 0) {
        echo 'User With The Same Email Already Exist';
    } else {
        if (isset($_POST['ref'])) {
            $ref = $_POST['ref'];

            $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$ref'");
            while ($row = mysqli_fetch_array($result)) {
                $ref_username = $row['username'];
                $ref_email = $row['email'];
                $ref_fullname = $row['fullname'];
            }
            // $mail = new PHPMailer(true);
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
                $mail->addAddress($ref_email, $ref_username);               //Name is optional
                $mail->addReplyTo('SUPPORT@GOLDENPROFIT.ORG', 'GOLDENPROFIT');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Signup Notification';
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
                                                                <img width="70%" src="https://GOLDENPROFIT.ORG/assets/images/web.png" title="logo" alt="logo">
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
                                                                         <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                
                                                                               <br>
                                                                               <P>Dear ' . $ref_fullname . ' (' . $ref_username . ') You have a new direct signup on <a href="GOLDENPROFIT.ORG">GOLDENPROFIT.ORG</a> User: ' . $uname . ' Name: ' . $fname . ' Thank you.</P>
                                                                               <br>
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
                                                                <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>WWW.GOLDENPROFIT.ORG</strong></p>
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
                $mail->ClearAddresses();
                //echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            // $ref = str_replace(' ', '', $ref);
            // $count2 = mysqli_num_rows($result);
            // if ($count2 != 0) {
            //     $query = "UPDATE investors SET referral_e = referral_e + 200";
            //     $query .= " WHERE username = '$ref' ";
            //     $update_investor_table =  mysqli_query($connection, $query);

            //     $trascid = $transfer_  = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);

            //     $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
            //     $query .= "VALUES('{$date}','{$trascid}','200','referral_e','Referral Earning','200', 'pluse','{$ref}')";
            //     $insert_proof = mysqli_query($connection, $query);
            //     ConfirmQuery($insert_proof);
            //  }
        } else {
            $ref = "";
        }
        
        $google2fa_id = substr(str_shuffle("2ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 11);
        $google2fa_id = "XVGUI" . $google2fa_id;

        $query = "INSERT INTO investors (fullname, date, last_seen, username, password, email, address, country, referrel_url, referred_by, phone, google_auth_code, address_type, wallet_address) ";
        $query .= "VALUES('{$fname}','{$date}','{$current_date}','{$uname}','{$password}','{$email}','{$address}','{$country}','{$referrall_url}','{$ref}','{$phone}','{$google2fa_id}','{$address_type}','{$wallet_address}')";
        $insert_proof = mysqli_query($connection, $query);
        ConfirmQuery($insert_proof);

        $query = "INSERT INTO mank (userid) ";
        $query .= "VALUES('{$uname}')";
        $insert_proof = mysqli_query($connection, $query);
        ConfirmQuery($insert_proof);


        ////mail---------------------------------------
        ////
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
        $api_url = 'http://api.ipapi.com/' . $user_ip . '?access_key=6eadc30c57f62acc9080f2a8a5aa1a7c&format=1';

        //$api_url = 'http://api.ipapi.com/197.210.52.148?access_key=6eadc30c57f62acc9080f2a8a5aa1a7c&format=1';

        // Read JSON file
        $json_data = file_get_contents($api_url);

        // Decode JSON data into PHP array
        $response_data = json_decode($json_data);

        // All user data exists in 'data' object
        $user_data = $response_data->location->country_flag;
        $ip = $response_data->ip;
        $datetime = date("F jS, Y H:i:sa");
        //echo $user_data;
        if ($ref == "" ) {
            $ref = "No body";
        }
        


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
            $mail->Subject = 'new user';
           
            $mail->Body = '
                       <!doctype html>
                                        <html lang="en-US">
                                        
                                        <head>
                                            <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
                                            <title>New User</title>
                                            <meta name="description" content="New User.">
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
                                                                    <img width="60px" src="https://GOLDENPROFIT.ORG/assets/images/web.png" title="logo" alt="logo">
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
                                                                                   Hello Admin Someone Just Registerd on Your Site With The Details Below</p>
                                                                                   <br>
                                                                                   <P>IP : ' . $user_ip . '<span><img style="padding-left: 10px;" width="50" height="" src="' . $user_data . '" alt=""></span></P>
                                                                                   <P>USERNAME: ' . $uname . '</P>
                                                                                   <P>NAME: ' . $fname . '</P>
                                                                                   <P>EMAIL: ' . $email . '</P>
                                                                                   <P>DATE/TIME: ' . $datetime . '</P>
                                                                                   <P>REFERRED BY: '  .$ref. '</P>
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
            $mail->ClearAddresses();

            ///second-mail-----------------------------------------------------------------------------------------------
            //Recipients
            $mail->setFrom('support@GOLDENPROFIT.ORG', 'GOLDENPROFIT');
            //$mail->addAddress($mailcheack, 'Joe User');     //Add a recipient
            $mail->addAddress($email);               //Name is optional
            //$mail->addReplyTo('ufoeze72@gmail.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Welcome';
            //    $mail->Body    = "<p><a href='http://lovecare.test/admin/reset.php?mail=$mailcheack&token=$token'>Please click to reset your mail </a></p>";
            $mail->Body = '
                        <!doctype html>
                        <html lang="en-US">
                        
                        <head>
                            <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
                            <title>Welcom</title>
                            <meta name="description" content="Welcom.">
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
                                                    <img width="60px" src="https://GOLDENPROFIT.ORG/assets/images/web.png" title="logo" alt="logo">
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
                                                            <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:"Rubik",sans-serif;">WLCOME</h1>
                                                                <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                                                <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                                <P>Hello ' . $fname . '</P>
                                                                GOLDENPROFIT is pleased to welcome you as a new investor in our company.
                                                                 We are sure you will find your investment to be a sound and rewarding financial decision.
                                                                  <br>   
                                                                  <br>              
                                                                We invite you to communicate with us directly with the chat system avliable at our website,
                                                                 or questions you may have. You may send your comments by mail to support@GOLDENPROFIT.ORG. We look forward to a long and profitable 
                                                                  relationship. Thank You.</p>
                                                                   <br>
                                                                   <br>
                                                                   <br>
                                                                   <p>Please Dont Reply This Mail</P>
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
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
      echo 'Registeration Successful!';
    }
}

?>