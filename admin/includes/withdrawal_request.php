<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>
<div class="table-responsive">
    <table id="myTable" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>USERID</th>
                <th>DATE</th>
                <th>AMOUNT</th>
                <th>STATUS</th>
            </tr>
        </thead>
        <tbody>

            <?php
            //include_once "ddb.php"; 
            $query = "SELECT * FROM withdraw_tbl ";
            $select_users = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_users)) {

                $id =  $row['id'];
                $user_id =  $row['user_id'];
                $date =  $row['date'];
                $amount =  $row['amount'];
                $status =  $row['status'];


                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$user_id</td>";
                echo "<td>" . date('F jS, Y h:i:s A', strtotime($date)) . "</td>";
                echo "<td>$amount</td>";
                echo "<td>$status</td>";
                if ($status == "Pending") {
                    echo "<td><a href = 'admin.php?source=withdraw_request&accpt=" . $id . "'>Accept</a></td>";
                } else {
                    echo "<td>this withdraw has already been ACCEPTED</td>";
                }


                echo "<td><button id='$id' type='button' class='btn delete btn-sm btn-default'>
            <span class='fa fa-trash'> </span></button></td>";
                echo "<tr>";
            }
            ?>
        </tbody>
    </table>
</div>



<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM withdraw_tbl WHERE id = {$id}";
    $delete_user_query = mysqli_query($connection, $query);
    echo '<script> alert("DELETE SUCCESSFUL");
        window.location = "admin.php?source=withdraw_request"; </script>';
}

if (isset($_GET['accpt'])) {
    $id = $_GET['accpt'];
    $query = "UPDATE withdraw_tbl SET ";
    $query .= "	status = 'Accepted' ";
    $query .= "WHERE id = {$id} ";
    $update = mysqli_query($connection, $query);
    ConfirmQuery($update);
    $date1 = date('Y-m-d');

    ///pull out info from withdrawal table user who wants to withdraw_request
    $result = mysqli_query($connection, "SELECT * FROM withdraw_tbl WHERE id = '$id'");
    while ($row = mysqli_fetch_array($result)) {
        $user_id = $row['user_id'];
        $famount = $row['amount'];
    }

    ///pull out info from user table user who wants to withdraw
    $result = mysqli_query($connection, "SELECT * FROM investors WHERE 	username = '$user_id'");
    while ($row = mysqli_fetch_array($result)) {
        $user_id = $row['id'];
        $email = $row['email'];
        $fullname = $row['fullname'];
        $userImg = $row['img'];
    }

    ///add details to latest withdrawal table.....
    $query = "INSERT INTO latest_withdrawal (user_id, user_name, user_img, date, amount, type_of_user) ";
    $query .= "VALUES('{$user_id}','{$fullname}','{$userImg}','{$date1}','{$famount}','Real')";
    $insert_proof = mysqli_query($connection, $query);
    ConfirmQuery($insert_proof);


    ///add details to user withdrawal table to calculate and keep records of  the total withdraw for the user
    $query = "UPDATE investors SET 	total_w = total_w + $famount";
    $query .= " WHERE username = '$user_id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);



    ///send mail to user 
    $trascid = substr(str_shuffle("01234567890123456789abcdefghijklmnopqrstuvwxyz"), 0, 65);
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
        $mail->Password   = 'K1l2985wc7';                               //SMTP password
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
                                                                       <P>Your withdrawal has been deposited to your designated account Successfully.</P>
                                                                       <br>
                                                                        <p>Date: ' . $date . '</P>
                                                                       <br>
                                                                       <P>Amount: $' . number_format($famount) . '.</P>
                                                                       <br>
                                                                       <P>Payment method: Bitcoin</P>
                                                                       <br>
                                                                       <P>Transaction Batch: ' . $trascid . '.</P>
                                                                       <br>
                                                                       <P>Enjoy your earning, and let our boundng grow stronger.</P>
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

    echo '<script> alert("SUCCESSFUL");
        window.location = "admin.php?source=withdraw_request"; </script>';
}

?>

<script>
    $(document).on('click', '.delete', function() {
        var id = $(this).attr('id');

        if (confirm("Are You sure You Want To delete This Data")) {
            window.location = "admin.php?source=withdraw_request&delete=" + id + "";
        }


    });
</script>