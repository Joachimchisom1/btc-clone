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
                <th>SWAPPED FROM</th>
                <th>TO</th>
                <!-- <th>SUPPOSED AMOUNT IN BTC</th> -->
                <th>TOTAL SWAP COIN TO RECEIVE</th>
                <th>TOTAL SWAP COIN TO RECEIVE IN USD</th>
                <th>STATUS</th>
                <th>DATE</th>
                <th>CONFIRM SWAP</th>
                <th> DELETE</th>
            </tr>
        </thead>
        <tbody>

            <?php
            //include_once "ddb.php"; 
            $query = "SELECT * FROM swap_tbl ";
            $select_users = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_users)) {

                $id =  $row['id'];
                $user_id =  $row['user_id'];
                $coin_from =  $row['coin_from'];
                $to_coin =  $row['to_coin'];
                $total_swapped_coin =  $row['total_swapped_coin'];
                $swapped_coin_in__usd1 =  $row['swapped_coin_in__usd'];
               // $amount =  $row['amount'];
                $status =  $row['status'];
                $date =  $row['date'];
                //$plan =  $row['plan'];


                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$user_id</td>";
                echo "<td>$coin_from</td>";
                echo "<td>$to_coin</td>";
                echo "<td>$total_swapped_coin </td>";
                echo "<td>$" . number_format($swapped_coin_in__usd1) . "</td>";
                echo "<td>$status </td>";
                  echo "<td>$date</td>";
                /// echo "<td>$supposed_amount </td>";

                if ($status == "Accepted") {
                    echo "<td>THIS SWAP HAS ALREADY BEEN APPROVED</td>";
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
    $query = "DELETE FROM swap_tbl WHERE id = {$customer_id}";
    $delete_user_query = mysqli_query($connection, $query);
    echo '<script> alert("DELETE SUCCESSFUL");
        window.location = "admin.php?source=swap"; </script>';
}

if (isset($_GET['accept'])) {
    $swap_accept_id = $_GET['accept'];

    $result = mysqli_query($connection, "SELECT * FROM swap_tbl WHERE id = '$swap_accept_id'");
    while ($row = mysqli_fetch_array($result)) {
        $user_id = $row['user_id'];
        $swapped_coin_in__usd = $row['swapped_coin_in__usd'];
     //   $splan = $row['plan'];
    }


    ///update and set swap id to accepted
    $query = "UPDATE swap_tbl SET ";
    $query .= "status = 'Accepted'";
    $query .= "WHERE id = '{$swap_accept_id}'";
    $update = mysqli_query($connection, $query);
    ConfirmQuery($update);


    //update TOKEN and add investors table
   // $swapped_coin_in__usd = ltrim($swapped_coin_in__usd, '$');////remove the doller sign 
   // $swapped_coin_in__usd = number_format($swapped_coin_in__usd);
    $query = "UPDATE investors SET interest_w = interest_w + $swapped_coin_in__usd";
    $query .= " WHERE username = '$user_id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    ////pull out supposed user detail to add to transaction table -----------------------------
    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$user_id'");
    while ($row = mysqli_fetch_array($result)) {
        $deposit_w = $row['deposit_w'];
        $email = $row['email'];
        $fullname = $row['fullname'];
        $referred_by = $row['referred_by'];
        $ref_key = $row['ref_key'];
        $user_id1 = $row['id'];
        $user_img1 = $row['img'];
    }

    // ///add details to latest deposit table.....
    // $date1 = date('Y-m-d');
    // $query = "INSERT INTO latest_deposit (user_id, user_name, user_img, date, amount, type_of_user) ";
    // $query .= "VALUES('{$user_id1}','{$fullname}','{$user_img1}','{$date1}','{$amount}','Real')";
    // $insert_proof1 = mysqli_query($connection, $query);
    // ConfirmQuery($insert_proof1);

    //add details to transaction table
    $date = date("F jS, Y h:i:s A");
    $trascid = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
    $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
    $query .= "VALUES('{$date}','{$trascid}','{$swapped_coin_in__usd}','interest_w','Coin Swap','{$deposit_w}', 'pluse','{$user_id}')";
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
                                                   <P>Your Coin Swap Have Been Completed Successfully Plese See Details Below</P>
                                                   <br>
                                                   <P>Coin Swapped: ' . $coin_from . ',</P>
                                                   <br>
                                                   <P>Coin Received: ' . $to_coin . ',</P>
                                                   <br>
                                                   <P>Amount of ' . $to_coin . ' Coin Received in USD: $' . number_format($swapped_coin_in__usd) . ',</P>
                                                   <br>
                                                   <P>Now You Can Make Your Withdrawal In Any Currency/Crypto You Want.</P>
                                                   <br>
                                                   <P>Thank You for choosing us.</P>
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



    // ///submit request to invest for all plans -------------------------
    // if ($splan == "ANTMINER") {
    //     ANTMINER_PLAN($user_name, $amount);
    // } elseif ($splan == "DRAGONMINTER") {
    //     DRAGONMINTER_PLAN($user_name, $amount);
    // } elseif ($splan == "PAGOLINMINER") {
    //     PAGOLINMINER_plan($user_name, $amount);
    // } elseif ($splan == "AVALONMINER") {
    //     AVALONMINER_PLAN($user_name, $amount);
    // } elseif ($splan == "STARTER PLAN") {
    //     STARTER_PLAN($user_name, $amount);
    // } elseif ($splan == "GOLD PLAN") {
    //     GOLD_PLAN($user_name, $amount);
    // } elseif ($splan == "PREMIUM PLAN") {
    //     PREMIUM_PLAN($user_name, $amount);
    // } elseif ($splan == "PLATINUM PLAN") {
    //     PLATINUM_PLAN($user_name, $amount);
    // } elseif ($splan == "EXLUSIVE VIP PLAN") {
    //     EXLUSIVE_VIP_PLAN($user_name, $amount);
    // }



    // //send mail and add deatails to user who reffered him if on first deposite----------------------------------
    // if ($referred_by != "" && $ref_key == 0) {
    //     $result = mysqli_query($connection, "SELECT * FROM transactions WHERE username = '$user_name' AND type = 'pluse' AND wallet = 'deposit_w'");
    //     ConfirmQuery($result);
    //     while ($row = mysqli_fetch_array($result)) {
    //         $t_id = $row['id'];
    //         $first_deposite = $row['amount'];
    //     }
    //     $count = mysqli_num_rows($result);
    //     if ($count != 0) {
    //         //update set the ref key to 0
    //         $query = "UPDATE investors SET ref_key = 1";
    //         $query .= " WHERE username = '$user_name' ";
    //         $update_investor_table =  mysqli_query($connection, $query);
    //         ConfirmQuery($update_investor_table);

    //         $percentage = 5;
    //         $percentage = ($percentage / 100) * $first_deposite;
    //         // $percentage = $percentage + $first_deposite;

    //         //update/insert and percentage to the user that reffered thiz user
    //         $query = "UPDATE investors SET deposit_w = deposit_w  + '$percentage', referral_e = referral_e + $percentage";
    //         $query .= " WHERE username = '$referred_by' ";
    //         $update_investor_table =  mysqli_query($connection, $query);
    //         ConfirmQuery($update_investor_table);

    //         ///pull out total deposite wallet balance investors table.........
    //         $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$referred_by'");
    //         while ($row = mysqli_fetch_array($result)) {
    //             $rdeposit_w = $row['deposit_w'];
    //             $ref_fullname = $row['fullname'];
    //             $ref_email = $row['email'];
    //         }

    //         //add details to transaction table
    //         $date = date("F jS, Y h:i:s A");
    //         $trascid = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
    //         $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
    //         $query .= "VALUES('{$date}','{$trascid}','{$percentage}','deposit_w','Referred User Interest','{$rdeposit_w}', 'pluse','{$referred_by}')";
    //         $insert_proof = mysqli_query($connection, $query);
    //         ConfirmQuery($insert_proof);
    //         echo "things went fine";

    //         //send a mail to the user-----------------------------------
    //         try {
    //             //Server settings
    //             //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    //             //$mail->isSMTP();                                            //Send using SMTP
    //             $mail->Host       = 'smtp.goldenprofit.org';                     //Set the SMTP server to send through
    //             $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    //             $mail->Username   = 'SUPPORT@GOLDENPROFIT.ORG';                     //SMTP username
    //             $mail->Password   = '£{Djb[JZydTD';                               //SMTP password
    //             $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    //             $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //             //Recipients
    //             $mail->setFrom('SUPPORT@GOLDENPROFIT.ORG', 'GOLDENPROFIT');
    //             //$mail->addAddress($mailcheack, 'Joe User');     //Add a recipient
    //             $mail->addAddress($ref_email, $ref_fullname);               //Name is optional
    //             //$mail->addReplyTo('ufoeze72@gmail.com', 'Information');
    //             // $mail->addCC('cc@example.com');
    //             // $mail->addBCC('bcc@example.com');

    //             //Attachments
    //             // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //             // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //             //Content
    //             $mail->isHTML(true);                                  //Set email format to HTML
    //             $mail->Subject = 'Referral commission';
    //             $mail->Body = '<!doctype html>
    //             <html lang="en-US">
                
    //             <head>
    //                 <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    //                 <style type="text/css">
    //                     a:hover {text-decoration: underline !important;}
    //                 </style>
    //             </head>
                
    //             <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    //                 <!--100% body table-->
    //                 <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: "Open Sans", sans-serif;">
    //                     <tr>
    //                         <td>
    //                             <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
    //                                 align="center" cellpadding="0" cellspacing="0">
    //                                 <tr>
    //                                     <td style="height:80px;">&nbsp;</td>
    //                                 </tr>
    //                                 <tr>
    //                                     <td style="text-align:center;">
    //                                       <a href="https://GOLDENPROFIT.ORG" title="logo" target="_blank">
    //                                         <img width="70%" src="https://GOLDENPROFIT.ORG/assets/images/web.png" title="logo" alt="logo">
    //                                       </a>
    //                                     </td>
    //                                 </tr>
    //                                 <tr>
    //                                     <td style="height:20px;">&nbsp;</td>
    //                                 </tr>
    //                                 <tr>
    //                                     <td>
    //                                         <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
    //                                             style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
    //                                             <tr>
    //                                                 <td style="height:40px;">&nbsp;</td>
    //                                             </tr>
    //                                             <tr>
    //                                                 <td style="padding:0 35px;">
    //                                                  <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
        
    //                                                        <br>
    //                                                        <P>Dear ' . $ref_fullname . ' (' . $referred_by . ')</P>
    //                                                        <br>
    //                                                        <P>You have recived a referral commission of $' . number_format($percentage) . ' Bitcoin from ' . $fullname . ' (' . $user_name . ') deposit.</P>
    //                                                        <br>
    //                                                        <P>Thank you.</P>
    //                                                        <br>
    //                                                     </td>
    //                                             </tr>
    //                                             <tr>
    //                                                 <td style="height:40px;">&nbsp;</td>
    //                                             </tr>
    //                                         </table>
    //                                     </td>
    //                                 <tr>
    //                                     <td style="height:20px;">&nbsp;</td>
    //                                 </tr>
    //                                 <tr>
    //                                     <td style="text-align:center;">
    //                                         <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>WWW.GOLDENPROFIT.ORG</strong></p>
    //                                     </td>
    //                                 </tr>
    //                                 <tr>
    //                                     <td style="height:80px;">&nbsp;</td>
    //                                 </tr>
    //                             </table>
    //                         </td>
    //                     </tr>
    //                 </table>
    //                 <!--/100% body table-->
    //             </body>
                
    //             </html>';
    //             $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    //             $mail->send();
    //             //echo 'Message has been sent';
    //         } catch (Exception $e) {
    //             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //         }
    //     }
    // }
    echo '<script> alert("SWAP ACCEPTED SUCCESSFULLY");
        window.location = "admin.php?source=swap"; </script>';
}

?>

<script>
    $(document).on('click', '.delete', function() {
        var id = $(this).attr('id');

        if (confirm("Are You sure You Want To delete This Data")) {
            window.location = "admin.php?source=swap&delete=" + id + "";
        }


    });

    $(document).on('click', '.Accept', function() {
        var id = $(this).attr('id');

        if (confirm("Are You sure You Want To Accept This Swap?")) {
            window.location = "admin.php?source=swap&accept=" + id + "";
        }


    });
</script>