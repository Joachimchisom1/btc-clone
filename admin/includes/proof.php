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
?>
<div class="table-responsive">
    <table id="myTable" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>USERID</th>
                <th>USERNAME</th>
                <th>AMOUNT</th>
                <!-- <th>SUPPOSED AMOUNT IN BTC</th> -->
                <!-- <th>PROOF IMG</th> -->
                <th>WALLET</th>
                <!-- <th>TRANSACTION HASH</th> -->
                <!-- <th>DOWNLOAD PROOF IMG</th> -->
                <th>PLAN</th>
                <th> confirm poof deposite </th>
                <th>DELETE PROOF </th>
            </tr>
        </thead>
        <tbody>

            <?php
            //include_once "ddb.php"; 
            $query = "SELECT * FROM proof ";
            $select_users = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_users)) {

                $id =  $row['id'];
                $userid =  $row['userid'];
                $user_name =  $row['user_name'];
                $proof_img =  $row['proof_img'];
                $type_of_payment =  $row['type_of_payment'];
                $tran_hash =  $row['tran_hash'];
                $amount =  $row['amount'];
                $supposed_amount =  $row['supposed_amount'];
                $status =  $row['status'];
                $plan =  $row['plan'];


                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$userid</td>";
                echo "<td>$user_name</td>";
                echo "<td>$amount</td>";
                /// echo "<td>$supposed_amount </td>";
                //echo "<td><img width='100' height='50' src='../img/$proof_img' alt='images display'></td>";
                echo "<td>$type_of_payment </td>";
                //echo "<td>$tran_hash </td>";
               // echo "<td><a href = 'includes/download.php?id=$id'>Download Picture</a></td>";
                echo "<td>$plan </td>";

                if ($status == "Accepted") {
                    echo "<td>this deposit has been approved already</td>";
                } else {
                    echo "<td><button id='$id' type='button' class='btn Accept btn-sm btn-default'>
            <span class='fa fa-check'> </span></button></td>";
                }


                echo "<td><button id='$id' type='button' class='btn delete btn-sm btn-default'>
                    <span class='fa fa-trash'> </span></button></td>";
            }
            ?>
        </tbody>
    </table>
</div>



<?php
if (isset($_GET['delete'])) {
    $customer_id = $_GET['delete'];
    $query = "DELETE FROM proof WHERE id = {$customer_id}";
    $delete_user_query = mysqli_query($connection, $query);
    echo '<script> alert("DELETE SUCCESSFUL");
        window.location = "admin.php?source=proof"; </script>';
}

if (isset($_GET['accept'])) {
    $proof_id = $_GET['accept'];

    $result = mysqli_query($connection, "SELECT * FROM proof WHERE id = '$proof_id'");
    while ($row = mysqli_fetch_array($result)) {
        $user_name = $row['user_name'];
        $amount = $row['amount'];
        $splan = $row['plan'];
    }

    $query = "UPDATE proof SET ";
    $query .= "status = 'Accepted'";
    $query .= "WHERE id = '{$proof_id}'";
    $update = mysqli_query($connection, $query);
    ConfirmQuery($update);


    //update TOKEN and add investors table
    $query = "UPDATE investors SET total_deposit = total_deposit + $amount";
    $query .= " WHERE username = '$user_name' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    ////pull out supposed user detail -----------------------------
    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$user_name'");
    while ($row = mysqli_fetch_array($result)) {
        $deposit_w = $row['deposit_w'];
        $email = $row['email'];
        $fullname = $row['fullname'];
        $referred_by = $row['referred_by'];
        $ref_key = $row['ref_key'];
        $user_id1 = $row['id'];
        $user_img1 = $row['img'];
    }

    ///add details to latest deposit table.....
    $date1 = date('Y-m-d');
    $query = "INSERT INTO latest_deposit (user_id, user_name, user_img, date, amount, type_of_user) ";
    $query .= "VALUES('{$user_id1}','{$fullname}','{$user_img1}','{$date1}','{$amount}','Real')";
    $insert_proof1 = mysqli_query($connection, $query);
    ConfirmQuery($insert_proof1);

    //add details to transaction table
    $date = date("F jS, Y h:i:s A");
    $trascid = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
    $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
    $query .= "VALUES('{$date}','{$trascid}','{$amount}','deposit_w','Deposit','{$deposit_w}', 'pluse','{$user_name}')";
    $insert_proof = mysqli_query($connection, $query);
    ConfirmQuery($insert_proof);


    //send a mail to the user-----------------------------------
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
        $mail->addAddress($email, $fullname);               //Name is optional
        $mail->addReplyTo('SUPPORT@GOLDENPROFIT.ORG', 'GOLDENPROFIT');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'DEPOSIT';
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
                                                   <P>Dear ' . $fullname . ',</P>
                                                   <br>
                                                   <P>Your Deposit of</P>
                                                   <br>
                                                   <P>Amount: $' . number_format($amount) . ',</P>
                                                   <br>
                                                   <P>has been approved by the admin.</P>
                                                   <br>
                                                   <P>Thanks for choosing us.</P>
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



    ///submit request to invest for all plans -------------------------
    if ($splan == "ANTMINER") {
        ANTMINER_PLAN($user_name, $amount);
    } elseif ($splan == "DRAGONMINTER") {
        DRAGONMINTER_PLAN($user_name, $amount);
    } elseif ($splan == "PAGOLINMINER") {
        PAGOLINMINER_plan($user_name, $amount);
    } elseif ($splan == "AVALONMINER") {
        AVALONMINER_PLAN($user_name, $amount);
    } elseif ($splan == "STARTER PLAN") {
        STARTER_PLAN($user_name, $amount);
    } elseif ($splan == "GOLD PLAN") {
        GOLD_PLAN($user_name, $amount);
    } elseif ($splan == "PREMIUM PLAN") {
        PREMIUM_PLAN($user_name, $amount);
    } elseif ($splan == "PLATINUM PLAN") {
        PLATINUM_PLAN($user_name, $amount);
    } elseif ($splan == "EXLUSIVE VIP PLAN") {
        EXLUSIVE_VIP_PLAN($user_name, $amount);
    }



    //send mail and add deatails to user who reffered him if on first deposite----------------------------------
    if ($referred_by != "" && $ref_key == 0) {
        $result = mysqli_query($connection, "SELECT * FROM transactions WHERE username = '$user_name' AND type = 'pluse' AND wallet = 'deposit_w'");
        ConfirmQuery($result);
        while ($row = mysqli_fetch_array($result)) {
            $t_id = $row['id'];
            $first_deposite = $row['amount'];
        }
        $count = mysqli_num_rows($result);
        if ($count != 0) {
            //update set the ref key to 0
            $query = "UPDATE investors SET ref_key = 1";
            $query .= " WHERE username = '$user_name' ";
            $update_investor_table =  mysqli_query($connection, $query);
            ConfirmQuery($update_investor_table);

            $percentage = 5;
            $percentage = ($percentage / 100) * $first_deposite;
            // $percentage = $percentage + $first_deposite;

            //update/insert and percentage to the user that reffered thiz user
            $query = "UPDATE investors SET deposit_w = deposit_w  + '$percentage', referral_e = referral_e + $percentage";
            $query .= " WHERE username = '$referred_by' ";
            $update_investor_table =  mysqli_query($connection, $query);
            ConfirmQuery($update_investor_table);

            ///pull out total deposite wallet balance investors table.........
            $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$referred_by'");
            while ($row = mysqli_fetch_array($result)) {
                $rdeposit_w = $row['deposit_w'];
                $ref_fullname = $row['fullname'];
                $ref_email = $row['email'];
            }

            //add details to transaction table
            $date = date("F jS, Y h:i:s A");
            $trascid = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
            $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
            $query .= "VALUES('{$date}','{$trascid}','{$percentage}','deposit_w','Referred User Interest','{$rdeposit_w}', 'pluse','{$referred_by}')";
            $insert_proof = mysqli_query($connection, $query);
            ConfirmQuery($insert_proof);
            echo "things went fine";

            //send a mail to the user-----------------------------------
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
                $mail->addAddress($ref_email, $ref_fullname);               //Name is optional
                //$mail->addReplyTo('ufoeze72@gmail.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Referral commission';
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
                                                           <P>Dear ' . $ref_fullname . ' (' . $referred_by . ')</P>
                                                           <br>
                                                           <P>You have recived a referral commission of $' . number_format($percentage) . ' Bitcoin from ' . $fullname . ' (' . $user_name . ') deposit.</P>
                                                           <br>
                                                           <P>Thank you.</P>
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
                //echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
    echo '<script> alert("DEPOSIT ACCEPTED SUCCESSFULLY");
        window.location = "admin.php?source=proof"; </script>';
}

?>

<script>
    $(document).on('click', '.delete', function() {
        var id = $(this).attr('id');

        if (confirm("Are You sure You Want To delete This Data")) {
            window.location = "admin.php?source=proof&delete=" + id + "";
        }


    });

    $(document).on('click', '.Accept', function() {
        var id = $(this).attr('id');

        if (confirm("Are You sure You Want To Accept This deposit")) {
            window.location = "admin.php?source=proof&accept=" + id + "";
        }


    });
</script>