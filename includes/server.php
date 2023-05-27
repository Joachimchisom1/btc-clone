<?php session_start();  ?>
<?php include "db.php";  ?>
<?php include "function.php" ?>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

///cheack intrest acct balance for withdrawal -------------------------
if (isset($_POST['with_check'])) {
    $username =  $_SESSION['username'];

    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    while ($row = mysqli_fetch_assoc($result)) {
        $interest_w = $row['interest_w'];
    }
    if ($interest_w == 0) {
        echo "err";
    } else {
        echo "ok";
    }
}

///fetch wallet address for swap -------------------------
if (isset($_POST['address_key'])) {
      $address =  $_POST['address'];
      
   $result = mysqli_query($connection, "SELECT * FROM wallet__addreses WHERE key_name = '$address'");
    while ($row = mysqli_fetch_assoc($result)) {
        echo  $deposite_w = $row['address_hash'];
    }

  
}

///insert users proof to database---------------------
if (isset($_POST['triggerid'])) {
    $userid =  $_POST['userid'];

    $result = mysqli_query($connection, "SELECT * FROM proof WHERE userid = '$userid'");
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        echo "err";
    } else {
        echo "ok";
    }
}
///delete users proof from database-------------------
if (isset($_POST['dtriger'])) {
    $userid =  $_POST['userid'];
    $query = "DELETE FROM proof WHERE userid = '{$userid}'";
    $delete_proof_query = mysqli_query($connection, $query);
    ConfirmQuery($delete_proof_query);
    echo "Delete Sucessful";
}

///api cheack for btc -------------------
if (isset($_POST['api'])) {
    // echo $_POST['amount1'];
    $url = 'https://bitpay.com/api/rates';
    $json = json_decode(file_get_contents($url));
    $dollar = $btc = 0;
    foreach ($json as $obj) {
        if ($obj->code == 'ZAR') $btc = $obj->rate;
    }
    //echo "1 bitcoin=\$" . $btc . " ZAR<br />";
    $zar = 1 / $btc;
    echo "" . round($zar * $_POST['amount1'], 8) . "";
}

///cheack acct balance for basic plans -------------------------
if (isset($_POST['basic_plan'])) {
    $username =  $_SESSION['username'];

    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    while ($row = mysqli_fetch_assoc($result)) {
        $deposite_w = $row['deposit_w'];
    }
    if ($deposite_w == 0) {
        echo "err";
    } else {
        echo "ok";
    }
}

///submit request to invest for basic plans -------------------------
if (isset($_POST['basic_plan_submit'])) {

    $username =  $_SESSION['username'];
    $amount =  $_POST['amount'];
    $date = date("F jS, Y h:i:s A");

    // //calculates the percentage......
    // $percentage = 80;
    // $percentage = ($percentage / 100) * $amount;
    // //$intrest = $new_value + $amount;

    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    //echo $count = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        $balance = $row['deposit_w'];
        $interest_w = $row['interest_w'];
    }

    if ($amount > $balance) {
        echo "Insufficient Balance";
    } else {

        $query = "UPDATE investors SET total_invest = total_invest + $amount, deposit_w = deposit_w - '$amount'";
        $query .= " WHERE username = '$username' ";
        $update_investor_table =  mysqli_query($connection, $query);
        ConfirmQuery($update_investor_table);

        // $query = "UPDATE investors SET deposit_w = $balance - '$amount'";
        // $query .= " WHERE username = '$username' ";
        // $update_investor_table =  mysqli_query($connection, $query);
        // ConfirmQuery($update_investor_table);

        $t_balance = $balance - $amount;

        $interest_w = $interest_w + $amount;

        //add details to transaction table
        $trascid = $transfer_  = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
        // $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
        // $query .= "VALUES('{$date}','{$trascid}','{$amount}','interest_w','Invested On Basic Plan','{$interest_w}', 'pluse','{$username}')";
        // $insert_proof = mysqli_query($connection, $query);
        // ConfirmQuery($insert_proof);

        $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
        $query .= "VALUES('{$date}','{$trascid}','{$amount}','deposit_w','Invested On Starter Plan','{$t_balance}', 'minus','{$username}')";
        $insert_proof = mysqli_query($connection, $query);
        ConfirmQuery($insert_proof);

        $added_num_of_days = 4320; //minute days to add
        $current_date = date('Y-m-d H:i:s'); //current date 
        $newtimestamp = strtotime('' . $current_date . ' + ' . $added_num_of_days . ' minute');
        $date_to_stop =  date('Y-m-d H:i:s', $newtimestamp); //date to stop

        // adding investement details to investemrnt table
        $query = "INSERT INTO tbl_investement (invt_start_date, invt_end_date, user_id, status, plan, amount_invested) ";
        $query .= "VALUES('{$current_date}','{$date_to_stop}','{$username}','Active','Starter Plan', '{$amount}')";
        $insert_proof = mysqli_query($connection, $query);
        ConfirmQuery($insert_proof);
    }
}


///cheack acct balance for compounding_mode1 plans -------------------------
if (isset($_POST['compounding_mode1'])) {
    $username =  $_SESSION['username'];

    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    while ($row = mysqli_fetch_assoc($result)) {
        $deposite_w = $row['deposit_w'];
    }
    if ($deposite_w == 0) {
        echo "err";
    } else {
        echo "ok";
    }
}

///submit request to invest for compounding_mode plans -------------------------
if (isset($_POST['compounding_mode_submit'])) {

    $username =  $_SESSION['username'];
    $amount =  $_POST['amount'];
    $date = date("F jS, Y h:i:s A");

    // //calculates the percentage......
    // $percentage = 80;
    // $percentage = ($percentage / 100) * $amount;
    // //$intrest = $new_value + $amount;

    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    //echo $count = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        $balance = $row['deposit_w'];
        $interest_w = $row['interest_w'];
    }

    if ($amount > $balance) {
        echo "Insufficient Balance";
    } else {

        $query = "UPDATE investors SET total_invest = total_invest + $amount, deposit_w = deposit_w - '$amount'";
        $query .= " WHERE username = '$username' ";
        $update_investor_table =  mysqli_query($connection, $query);
        ConfirmQuery($update_investor_table);

        // $query = "UPDATE investors SET deposit_w = $balance - '$amount'";
        // $query .= " WHERE username = '$username' ";
        // $update_investor_table =  mysqli_query($connection, $query);
        // ConfirmQuery($update_investor_table);

        $t_balance = $balance - $amount;

        $interest_w = $interest_w + $amount;

        $trascid = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
        // //add details to transaction table
        // $trascid = $transfer_  = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
        // $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
        // $query .= "VALUES('{$date}','{$trascid}','{$amount}','interest_w','Invested On Compounding Mode','{$interest_w}', 'pluse','{$username}')";
        // $insert_proof = mysqli_query($connection, $query);
        // ConfirmQuery($insert_proof);

        //remove amount details in transaction table....
        $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
        $query .= "VALUES('{$date}','{$trascid}','{$amount}','deposit_w','Invested On Compounding Mode','{$t_balance}', 'minus','{$username}')";
        $insert_proof = mysqli_query($connection, $query);
        ConfirmQuery($insert_proof);

        $added_num_of_days = 43200; //minute days to add
        $current_date = date('Y-m-d H:i:s'); //current date 
        $newtimestamp = strtotime('' . $current_date . ' + ' . $added_num_of_days . ' minute');
        $date_to_stop =  date('Y-m-d H:i:s', $newtimestamp); //date to stop

        // adding investement details to investemrnt table
        $query = "INSERT INTO tbl_investement (invt_start_date, invt_end_date, user_id, status, plan, amount_invested) ";
        $query .= "VALUES('{$current_date}','{$date_to_stop}','{$username}','Active','Compounding Mode', '{$amount}')";
        $insert_proof = mysqli_query($connection, $query);
        ConfirmQuery($insert_proof);
    }
}


///cheack balance and submit withdrawal request-------------------------
if (isset($_POST['chk_amount'])) {

    $username =  $_SESSION['username'];
    $amount =  $_POST['amount'];


    // //calculates the percentage......
    // $percentage = 80;
    // $percentage = ($percentage / 100) * $amount;
    // //$intrest = $new_value + $amount;

    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    //echo $count = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        // $balance = $row['deposit_w'];
        $interest_w = $row['interest_w'];
    }

    if ($amount > $interest_w) {
        echo "Insufficient Balance";
    } else {

        $query = "UPDATE investors SET interest_w = interest_w - $amount";
        $query .= " WHERE username = '$username' ";
        $update_investor_table =  mysqli_query($connection, $query);
        ConfirmQuery($update_investor_table);

        // $query = "UPDATE investors SET deposit_w = $balance - '$amount'";
        // $query .= " WHERE username = '$username' ";
        // $update_investor_table =  mysqli_query($connection, $query);
        // ConfirmQuery($update_investor_table);


        //add details to transaction table
        $date = date('F jS, Y h:i:s A', strtotime(date('Y-m-d H:i:s')));
        $date1 = date('Y-m-d H:i:s');
        $post_balance = $interest_w - $amount;
        $trascid = substr(str_shuffle("01234567890123456789abcdefghijklmnopqrstuvwxyz"), 0, 65);
        $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
        $query .= "VALUES('{$date}','{$trascid}','{$amount}','interest_w','Withdrawal','{$post_balance}', 'minus','{$username}')";
        $insert_proof = mysqli_query($connection, $query);
        ConfirmQuery($insert_proof);

        // $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
        // $query .= "VALUES('{$date}','{$trascid}','{$amount}','deposit_w','Invested On Basic Plan','{$t_balance}', 'minus','{$username}')";
        // $insert_proof = mysqli_query($connection, $query);
        //ConfirmQuery($insert_proof);

        // //active investement...
        // $added_num_of_days = 7200; //minute days to add
        // $current_date = date('Y-m-d H:i:s'); //current date 
        // $newtimestamp = strtotime(''.$current_date.' + '.$added_num_of_days.' minute');
        // $date_to_stop =  date('Y-m-d H:i:s', $newtimestamp); //date to stop

        // adding investement details to investemrnt table
        $query = "INSERT INTO withdraw_tbl (user_id, transaction_id, date, amount, status) ";
        $query .= "VALUES('{$username}','{$trascid}','{$date1}','{$amount}','Pending')";
        $insert_w_request = mysqli_query($connection, $query);
        ConfirmQuery($insert_w_request);


        ////send mail -----------------------------
        $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $username = $row['username'];
            $email = $row['email'];
            $fullname = $row['fullname'];
            $wallet_address = $row['wallet_address'];
            $address_type = $row['address_type'];
        }
        $date = date('F jS, Y h:i:s A', strtotime(date('Y-m-d H:i:s')));
        require '../vendor/autoload.php';
        $mail = new PHPMailer(true);
        $message = "test";


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
            $mail->addAddress($email, $username);               //Name is optional
            $mail->addReplyTo('SUPPORT@GOLDENPROFIT.ORG', 'GOLDENPROFIT');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Withdrawal';
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
                                                                        <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:"Rubik",sans-serif;">HELLO ' . strtoupper($fullname) . '</h1>
                                                                        <br>
                                                                        <a href="https://GOLDENPROFIT.ORG" title="logo" target="_blank">
                                                                        <img width="50%" src="https://GOLDENPROFIT.ORG/assets/images/mssg.jpeg" title="logo" alt="logo">
                                                                                  </a>
                                                                                  <br>
                                                                        <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                                                           <P>Your withdrawal request has been submitted Successfully, Please hold while we process  your transaction.</P>
                                                                           <br>
                                                                           <p>Date: ' . $date . '</P>
                                                                           <br>
                                                                           <P>Amount: $' . number_format($amount) . '.</P>
                                                                           <br>
                                                                           <P>Payment method: ' . $address_type . '.</P>
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

            ////// send mail to admin
            //Recipients
            $mail->setFrom('support@GOLDENPROFIT.ORG', 'GOLDENPROFIT');
            //$mail->addAddress($mailcheack, 'Joe User');     //Add a recipient
            $mail->addAddress('report@GOLDENPROFIT.ORG');               //Name is optional
            //$mail->addReplyTo('ufoeze72@gmail.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'WITHDRAWAL REQUEST';

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
                                                                                               Hello Admin Someone Just REQUESTED FOR A WITHDRAW on Your Site With The Details Below</p>
                                                                                               <br>
                                                                                               <P>USERNAME: ' . $username . '</P>
                                                                                               <P>NAME: ' . $fullname . '</P>
                                                                                               <P>EMAIL: ' . $email . '</P>
                                                                                               <P>DATE/TIME: ' . $date . '</P>
                                                                                               <P>AMOUNT: '  . number_format($amount) . '</P>
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
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}


///send deposit mail to admin -------------------------
if (isset($_POST['coin'])) {

    $date = date('F jS, Y h:i:s A', strtotime(date('Y-m-d H:i:s')));
    $username = $_POST['username'];
    $coin = $_POST['coin'];
    $plan = $_POST['plan'];
    $amount = $_POST['amount'];
    $userid = $_POST['userid'];
    require '../vendor/autoload.php';
    $mail = new PHPMailer(true);
    $message = "test";


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
        $mail->addAddress('report@GOLDENPROFIT.ORG', 'GOLDENPROFIT');               //Name is optional
        $mail->addReplyTo('SUPPORT@GOLDENPROFIT.ORG', 'GOLDENPROFIT');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Deposit Request';
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
                                                                <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:"Rubik",sans-serif;">HELLO Admin</h1>
                                                                <br>
                                                                <a href="https://GOLDENPROFIT.ORG" title="logo" target="_blank">
                                                                
                                                                          </a>
                                                                          <br>
                                                                <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                                                   <P>a user just deposited and is requesting for confirmation, with the following details</P>
                                                                   <br>
                                                                   <p>Date: ' . $date . '</P>
                                                                   <br>
                                                                   <P>Amount: $' . number_format($amount) . '.</P>
                                                                   <br>
                                                                   <P>Plan: ' . $plan . '.</P>
                                                                   <br>
                                                                   <P>Username: ' . $username . '.</P>
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
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


///cheack acct balance for silver_plan -------------------------
if (isset($_POST['silver_plan'])) {
    $username =  $_SESSION['username'];
    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    while ($row = mysqli_fetch_assoc($result)) {
        $deposite_w = $row['deposit_w'];
    }
    if ($deposite_w == 0) {
        echo "err";
    } else {
        echo "ok";
    }
}


///cheack acct balance for instant display -------------------------
if (isset($_POST['int_acctbal_display'])) {
    $username =  $_SESSION['username'];
    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    while ($row = mysqli_fetch_assoc($result)) {
        $deposite_w = $row['deposit_w'];
    }
    echo number_format($deposite_w);
}

///submit request to invest for silver_plan -------------------------
if (isset($_POST['silver_plan_submit'])) {
    $username =  $_SESSION['username'];
    $amount =  $_POST['amount'];
    $date = date("F jS, Y h:i:s A");

    // $percentage = 100;
    // $percentage = ($percentage / 100) * $amount;
    // //$intrest = $new_value + $amount;

    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    //echo $count = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        $balance = $row['deposit_w'];
        $interest_w = $row['interest_w'];
    }

    if ($amount > $balance) {
        echo "Insufficient Balance";
    } else {

        $query = "UPDATE investors SET total_invest = total_invest + $amount, deposit_w = deposit_w - '$amount'";
        $query .= " WHERE username = '$username' ";
        $update_investor_table =  mysqli_query($connection, $query);
        ConfirmQuery($update_investor_table);

        // $query = "UPDATE investors SET deposit_w = $balance - '$amount'";
        // $query .= " WHERE username = '$username' ";
        // $update_investor_table =  mysqli_query($connection, $query);
        // ConfirmQuery($update_investor_table);

        $t_balance = $balance - $amount;
        $interest_w = $interest_w + $amount;


        $trascid = $transfer_  = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
        // $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
        // $query .= "VALUES('{$date}','{$trascid}','{$amount}','interest_w','Invested On Silver Plan','{$interest_w}', 'pluse','{$username}')";
        // $insert_proof = mysqli_query($connection, $query);
        // ConfirmQuery($insert_proof);

        $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
        $query .= "VALUES('{$date}','{$trascid}','{$amount}','deposit_w','Invested On Professional Plan','{$t_balance}', 'minus','{$username}')";
        $insert_proof = mysqli_query($connection, $query);
        ConfirmQuery($insert_proof);

        //active investement...
        $added_num_of_days = 10080; //minute days to add
        $current_date = date('Y-m-d H:i:s'); //current date 
        $newtimestamp = strtotime('' . $current_date . ' + ' . $added_num_of_days . ' minute');
        $date_to_stop =  date('Y-m-d H:i:s', $newtimestamp); //date to stop

        //adding investement details to investemrnt table
        $query = "INSERT INTO tbl_investement (invt_start_date, invt_end_date, user_id, status, plan, amount_invested) ";
        $query .= "VALUES('{$current_date}','{$date_to_stop}','{$username}','Active','Professional Plan', '{$amount}')";
        $insert_proof = mysqli_query($connection, $query);
        ConfirmQuery($insert_proof);
    }
}

///cheack acct balance for gold plan -------------------------
if (isset($_POST['gold_plan'])) {
    $username =  $_SESSION['username'];

    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    while ($row = mysqli_fetch_assoc($result)) {
        $deposite_w = $row['deposit_w'];
    }
    if ($deposite_w == 0) {
        echo "err";
    } else {
        echo "ok";
    }
}

///submit request to invest for gold plan -------------------------
if (isset($_POST['gold_plan_submit'])) {
    $username =  $_SESSION['username'];
    $amount =  $_POST['amount'];
    $date = date("F jS, Y h:i:s A");

    // $percentage = 105;
    // $percentage = ($percentage / 100) * $amount;
    //$intrest = $new_value + $amount;

    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    //echo $count = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        $balance = $row['deposit_w'];
        $interest_w = $row['interest_w'];
    }

    if ($amount > $balance) {
        echo "Insufficient Balance";
    } else {

        $query = "UPDATE investors SET total_invest = total_invest + $amount, deposit_w = deposit_w - '$amount'";
        $query .= " WHERE username = '$username' ";
        $update_investor_table =  mysqli_query($connection, $query);
        ConfirmQuery($update_investor_table);

        // $query = "UPDATE investors SET deposit_w = $balance - '$amount'";
        // $query .= " WHERE username = '$username' ";
        // $update_investor_table =  mysqli_query($connection, $query);
        // ConfirmQuery($update_investor_table);

        $t_balance = $balance - $amount;
        $interest_w = $interest_ + $amount;


        $trascid = $transfer_  = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
        // $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
        // $query .= "VALUES('{$date}','{$trascid}','{$amount}','interest_w','Invested On Gold Plan','{$interest_w}', 'pluse','{$username}')";
        // $insert_proof = mysqli_query($connection, $query);
        // ConfirmQuery($insert_proof);

        $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
        $query .= "VALUES('{$date}','{$trascid}','{$amount}','deposit_w','Invested On Enterprise Plan','{$t_balance}', 'minus','{$username}')";
        $insert_proof = mysqli_query($connection, $query);
        ConfirmQuery($insert_proof);

        //active investement...
        $added_num_of_days = 14400; //minute days to add
        $current_date = date('Y-m-d H:i:s'); //current date 
        $newtimestamp = strtotime('' . $current_date . ' + ' . $added_num_of_days . ' minute');
        $date_to_stop =  date('Y-m-d H:i:s', $newtimestamp); //date to stop

        //adding investement details to investemrnt table
        $query = "INSERT INTO tbl_investement (invt_start_date, invt_end_date, user_id, status, plan, amount_invested) ";
        $query .= "VALUES('{$current_date}','{$date_to_stop}','{$username}','Active','Enterprise Plan', '{$amount}')";
        $insert_proof = mysqli_query($connection, $query);
        ConfirmQuery($insert_proof);
    }
}

///cheack acct balance for platinum plan -------------------------
if (isset($_POST['platinum_plan'])) {
    $username =  $_SESSION['username'];

    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    while ($row = mysqli_fetch_assoc($result)) {
        $deposite_w = $row['deposit_w'];
    }
    if ($deposite_w == 0) {
        echo "err";
    } else {
        echo "ok";
    }
}

///submit request to invest for platinum plan -------------------------
if (isset($_POST['platinum_plan_submit'])) {
    $username =  $_SESSION['username'];
    $amount =  $_POST['amount'];
    $date = date("F jS, Y h:i:s A");

    // $percentage = 205;
    // $percentage = ($percentage / 100) * $amount;
    //$intrest = $new_value + $amount;

    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    //echo $count = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        $balance = $row['deposit_w'];
        $interest_w = $row['interest_w'];
    }

    if ($amount > $balance) {
        echo "Insufficient Balance";
    } else {

        $query = "UPDATE investors SET total_invest = total_invest + $amount, deposit_w = deposit_w - '$amount'";
        $query .= " WHERE username = '$username' ";
        $update_investor_table =  mysqli_query($connection, $query);
        ConfirmQuery($update_investor_table);

        // $query = "UPDATE investors SET deposit_w = $balance - '$amount'";
        // $query .= " WHERE username = '$username' ";
        // $update_investor_table =  mysqli_query($connection, $query);
        // ConfirmQuery($update_investor_table);

        $t_balance = $balance - $amount;
        $interest_w = $interest_w + $amount;


        $trascid = $transfer_  = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
        // $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
        // $query .= "VALUES('{$date}','{$trascid}','{$amount}','interest_w','Invested On Platinum Plan','{$interest_w}', 'pluse','{$username}')";
        // $insert_proof = mysqli_query($connection, $query);
        // ConfirmQuery($insert_proof);

        $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
        $query .= "VALUES('{$date}','{$trascid}','{$amount}','deposit_w','Invested On Compounding Mode 1','{$t_balance}', 'minus','{$username}')";
        $insert_proof = mysqli_query($connection, $query);
        ConfirmQuery($insert_proof);

        //active investement...
        $added_num_of_days = 20160; //minute days to add
        $current_date = date('Y-m-d H:i:s'); //current date 
        $newtimestamp = strtotime('' . $current_date . ' + ' . $added_num_of_days . ' minute');
        $date_to_stop =  date('Y-m-d H:i:s', $newtimestamp); //date to stop

        //adding investement details to investemrnt table
        $query = "INSERT INTO tbl_investement (invt_start_date, invt_end_date, user_id, status, plan, amount_invested) ";
        $query .= "VALUES('{$current_date}','{$date_to_stop}','{$username}','Active','Compounding Mode 1', '{$amount}')";
        $insert_proof = mysqli_query($connection, $query);
        ConfirmQuery($insert_proof);
    }
}

///cheack acct Withdraw edibility -------------------------
if (isset($_POST['chhk_wit'])) {
    $username =  $_SESSION['username'];

    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    while ($row = mysqli_fetch_assoc($result)) {
        $kyc_status = $row['kyc_status'];
        $interest_w = $row['interest_w'];
    }
    // if ($kyc_status == "" || $kyc_status == "notconfirmed") {
    //     echo "err";
    // } else {
    echo number_format($interest_w);
    //  }
}

///cheack bank  Withdraw edibility -------------------------
if (isset($_POST['chhk_bk'])) {
    $username =  $_SESSION['username'];

    $result = mysqli_query($connection, "SELECT * FROM mank WHERE userid = '$username'");
    while ($row = mysqli_fetch_assoc($result)) {
        $bank_name = $row['bank_name'];
        $beneficiary_name = $row['beneficiary_name'];
        $account_number = $row['account_number'];
    }
    if ($bank_name == "" || $beneficiary_name == "" || $account_number == "") {
        echo "err";
    } 
    //else {
    // echo number_format($interest_w);
    // //  }
}

///request cheack if google 2fa is active or not--------------------
if (isset($_POST['google_2fa'])) {
    $google_2fa =  $_POST['google_2fa'];
    $userid =  $_SESSION['username'];
    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$userid'");
    while ($row = mysqli_fetch_assoc($result)) {
        $switch = $row['2fa_switch'];
    }
    if ($switch == 1) {
        echo "ok";
    } else {
        echo "err";
    }
}

///request to deactivate google 2fa Authenticator--------------------
if (isset($_POST['dactivate'])) {
    $userid =  $_SESSION['username'];
    $query = "UPDATE investors SET 2fa_switch = 0";
    $query .= " WHERE username = '$userid' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    echo "ok";
}

///check for Withdraw access code avaliability-------------------------
if (isset($_POST['w_code'])) {
    $username =  $_SESSION['username'];

    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    while ($row = mysqli_fetch_assoc($result)) {
        $w_code = $row['w_code'];
        $fullname = $row['fullname'];
    }
    if ($w_code == "") {
        echo "err";
    } else {
        echo "Hello, " . $fullname . " we are unable to process your withdrawal, please kindly purchase withdrawal code of $" . $w_code . " to complete the withdrawal process";
    }
}
?>