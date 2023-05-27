<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>
<h1>send proof</h1>
<form method="POST" action="#">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">UserName</label>
        <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Select coin</label>
        <select required name="coin" class="form-control" required="required">
            <option >Please Select a coin</option>
            <option value="Bitcoin">Bitcoin</option>
            <option value="Tron">Tron</option>
            <option value="Bitcoin Cash">Bitcoin Cash</option>
            <option value="USDT">USDT</option>
            <option value="Ethereum">Ethereum</option>
        </select>

    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Date</label>
        <input name="date" type="date" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter date">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">AMount</label>
        <input name="amount" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter amount">
    </div>
    <button type="submit" name="send" class="btn btn-primary">Submit</button>
</form>

<?php


require '../vendor/autoload.php';

if (isset($_POST['send'])) {
    $email = $_POST['email'];
    $coin = $_POST['coin'];
    $username = $_POST['username'];
    $amount = $_POST['amount'];
    $acct = $_POST['acct'];
    $date = date('F jS, Y ', strtotime($_POST['date']));

    // $message=nl2br($_POST['message']);
    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

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
                                                            <img width="50%" src="https://GOLDENPROFIT.ORG/assets/images/web.png" title="logo" alt="logo">
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
                                                                    <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:"Rubik",sans-serif;">HELLO ' . $username . '</h1>
                                                                    <br>
                                                                    <a href="https://GOLDENPROFIT.ORG" title="logo" target="_blank">
                                                                    <img width="50%" src="https://GOLDENPROFIT.ORG/assets/images/mssg.jpeg" title="logo" alt="logo">
                                                                              </a>
                                                                              <br>    
                                                                    <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                                                           
                                                                           <p>Your withdrawal has been deposited to your designated account Successfully.</P>
                                                                           <br>
                                                                           <p>Date: ' . $date . '</P>
                                                                           <br>
                                                                           <p>Amount: ' . $amount . '</P>
                                                                           <br>
                                                                           <p>Payment method: ' . $coin . '</p>
                                                                            <br>
                                                                            <p>Transaction batch: ' . $$trascid = substr(str_shuffle("01234567890123456789abcdefghijklmnopqrstuvwxyz"), 0, 65) . '</p>
                                                                            <br>
                                                                            <p>Enjoy your earnig and let our bounding grow stronger, have a great day.</p>
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
    echo '<script>alert("mail sent Successfully!");</script>';
}


?>