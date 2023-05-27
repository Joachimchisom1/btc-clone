<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
?>
<?php include "includes/login_header.php" ?>
<?php if (isset($_SESSION['sec'])) {
    $_SESSION['sec'] = null;
}
// else {
//     header("Location: deposit.php");
// } 
?>
<!-- header-section end  -->
<!-- btc calculator payment start -->
<br>
<br>
<section class="pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title"><span class="font-weight-normal">COIN</span> <b class="base--color">SWAP</b></h2>
                    <!--<p>please make sure you pay</p>-->
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div style="text-align: center;" class="profit-calculator-wrapper">

                    <?php
                    ///proof insert fuction-------------------------------------------------
                    if (isset($_POST['swap_button'])) {
                        //echo $_POST['coin_amount'];
                        // echo $_POST['coin_to_swap'];
                        // echo $_POST['coin_to_receive'];
                        // echo $_POST['display_dollar_rate'];
                        // if ($_POST['well_address'] != "") {
                        //     # code...
                        // } else {
                        //     # code...
                        // }

                        
                       // $coin_to_receive = $_POST['coin_to_receive'];
                        if ($_POST['coin_to_receive'] == "AAVE") {
                            $coin_to_receive = "TRX";
                        } elseif ($_POST['coin_to_receive'] == "ZEC") {
                            $coin_to_receive = "XRP";
                        }else{
                            $coin_to_receive = $_POST['coin_to_receive'];
                        }

                        if ($_POST['coin_to_swap'] == "AAVE") {
                            $coin_to_swap = "TRX";
                        } elseif ($_POST['coin_to_swap'] == "ZEC") {
                            $coin_to_swap = "XRP";
                        }else{
                            $coin_to_swap = $_POST['coin_to_swap'];
                        }
                        
                        
                        
                        $display_dollar_rate_of_already_swapped = $_POST['display_dollar_rate'];
                        $userid =  $_SESSION['username'];
                        $total_swapped_coin = $_POST['total_swapped_coin'];
                        $date = date("F jS, Y H:i:sa");

                        $query = "INSERT INTO swap_tbl (user_id, coin_from, to_coin, total_swapped_coin, swapped_coin_in__usd, date) ";
                        $query .= "VALUES('{$userid}','{$coin_to_swap}','{$coin_to_receive}','{$total_swapped_coin}','{$display_dollar_rate_of_already_swapped}','{$date}')";
                        $insert_proof = mysqli_query($connection, $query);
                        ConfirmQuery($insert_proof);

                        /////send mail to notify the admin-----------------------------
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
                            $mail->addAddress('support@GOLDENPROFIT.ORG');               //Name is optional
                            //$mail->addReplyTo('ufoeze72@gmail.com', 'Information');
                            // $mail->addCC('cc@example.com');
                            // $mail->addBCC('bcc@example.com');

                            //Attachments
                            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                            //Content
                            $mail->isHTML(true);                                  //Set email format to HTML
                            $mail->Subject = 'COIN SWAP NOTIFICATION';
                            //    $mail->Body    = "<p><a href='http://lovecare.test/admin/reset.php?mail=$mailcheack&token=$token'>Please click to reset your mail </a></p>";
                            
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
                                                                       Hello Admin Someone Just Swapped a Coin on Your Site  amd is Demanding Your Urgent Attention WIth The Details Below</p>
                                                                       <br>
                                                                       <P>USERNAME: ' . $userid . '</P>
                                                                       <P>COIN SWAPPED: ' . $coin_to_swap . '</P>
                                                                       <P>COIN TO RECEIVED: ' . $coin_to_receive . '</P>
                                                                       <P>COIN TO RECEIVED IN USD: $' . $display_dollar_rate_of_already_swapped . '</P>
                                                                       <P>DATE/TIME: ' . $date . '</P>
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
                            //echo 'Message has been sent';
                        } catch (Exception $e) {
                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        }
                        echo '<script>Swal.fire("Your Coin Swap Was Successful Please Wait while We Confirm This Transaction!","","success").then(function() {
                            window.location = "btc.php";
                        })</script>';
                    }



                    // $url = 'https://bitpay.com/api/rates';
                    // $json = json_decode(file_get_contents($url));
                    // //$dollar = $btc = 0;
                    // foreach ($json as $obj) {
                    //     if ($obj->code == 'BCH') $btc = $obj->rate;
                    // }

                    // $url_bch = 'https://api.coinbase.com/v2/prices/ETH-CAD/buy';
                    // $json_bch = json_decode(file_get_contents($url_bch));
                    // //$bch_dollar = $bch = 0;
                    // var_dump($json_bch->data->base);
                    // echo $json_bch->data->base;

                    // $url = 'https://bitpay.com/api/rates';
                    // $json = json_decode(file_get_contents($url), true);
                    // $dollar = $btc = 0;
                    // foreach ($json as $obj) {
                    //     if ($obj->code == 'USD') $btc = $obj->rate;
                    // }



                    // $ar = unserialize($json_bch[0]);
                    // $result = json_decode($json_bch, true);


                    //echo "1 bitcoin=\$" . $btc . " ZAR<br />";
                    ?>


                    <script>
                        fetch('https://api.coinbase.com/v2/prices/BTC-USD/buy').then(response => {
                            return response.json();
                        }).then(users => {
                            let rate = 1 / users.data.amount;

                            //  console.log(0.025053777934336052 / rate);


                        })
                    </script>

                    <!-- <h3>1 BTC = $<?php echo number_format(round($btc, 2), 2); ?></h3>

                    <h3>1 BCH = $<?php echo number_format(round($btc, 2), 2); ?></h3> -->
                    <img style="padding-bottom: 20px;" width="10%" src="img/swap.png">

                    <form method="POST" action="#" id="form_data" class="profit-calculator">
                        <div class="row mb-none-30">
                            <div id="mssg" class="col-lg-12 mb-30">
                                <br>
                                <div id="pay_pic">
                                    <p id="display_now"></P>
                                    <div id="loading_img">
                                        <img style="width: 30px;" src="img/loading.gif" alt="">
                                        <P> Loading...</p>
                                    </div>
                                </div>

                                <div style="display: none;" id="wallet_address" class="col-lg-12 mb-30">
                                    <input name="well_address" type="text" value="" id="myInput">
                                    <input id="display_dollar_rate" name="display_dollar_rate" type="text" value="">
                                    <input hidden id="total_swapped_coin" name="total_swapped_coin" type="text" value="">
                                    <input id="copy" class="btn btn-dark" type="reset" value="Copy Address">
                                </div>

                                <div class="col-lg-12 mb-30">
                                    <label>Amount of Coin to Swap</label>
                                    <div class="form-group">
                                        <input name="coin_amount" id="coin_amount" type="text" class="form-control" placeholder="AMOUNT OF COIN">
                                    </div>
                                </div>
                                <label>Coin to Swap</label>
                                <select name="coin_to_swap" id="coint_to_swap" class="coin col-lg-12 mb-30 form-control form-control-sm">
                                    <option value="">SELECT COIN TO SWAP</option>
                                    <option value="BTC">BITCOIN</option>
                                    <option value="ETH">Ethereum</option>
                                    <option value="BCH">Bitcoin Cash SV</option>
                                    <option value="AAVE">Tron</option>
                                    <option value="BUSD">BNB</option>
                                    <option value="DOGE">Dogecoin</option>
                                    <option value="LTC">Litecoin</option>
                                    <option value="ZEC">Ripple</option>
                                    <option value="PRO">Propy</option>
                                    <option value="USDT">USDT</option>
                                </select>
                                <label>Coin to Receive</label>
                                <select name="coin_to_receive" id="coint_to_receive" class="coin col-lg-12 mb-30 form-control form-control-sm">
                                    <option value="">SELECT COIN TO RECEIVE</option>
                                    <option value="BTC">BITCOIN</option>
                                    <option value="ETH">Ethereum</option>
                                    <option value="BCH">Bitcoin Cash SV</option>
                                    <option value="AAVE">Tron</option>
                                    <option value="BUSD">BNB</option>
                                    <option value="DOGE">Dogecoin</option>
                                    <option value="LTC">Litecoin</option>
                                    <option value="ZEC">Ripple</option>
                                    <option value="PRO">Propy</option>
                                    <option value="USDT">USDT</option>
                                </select>
                                <div id="button" class="col-lg-12 mb-30">
                                    <button id="btn" type="button" class="cmn-btn">Swap</button>
                                </div>
                                <div style="display: none;" id="button1" class="col-lg-12 mb-30">
                                    <button name="swap_button" id="btn" type="submit" class="cmn-btn">Confirm</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact section end -->

<script>
    $("#loading_img").css("display", "none");
    ////// fuction to  get coin address
    function get_address() {
        let address_key = "anything";
        let address = $("#coint_to_swap").val();
        $.ajax({
            type: 'POST',
            url: 'includes/server.php',
            dataType: 'text',
            data: {
                address_key: address_key,
                address: address
            },
            success: function(resp) {
                // alert(resp)
                $("#myInput").val(resp);
                // $("#mssg1").html("You are to deposit " + resp + " Worth of btc to the following address below, Please make sure You have made the transaction of the exact BTC amount before you proceed to upload your transaction proof for Confirmation.");
            }
        });
    }

    ///api fuctions
    function api_call() {
        fetch(`https://api.coinbase.com/v2/prices/${$("#coint_to_swap").val()}-USD/buy`).then(response => {
            return response.json();
        }).then(users => {
            //console.log(users);
            let coin = users.data.amount * $("#coin_amount").val();
            //$("#display_now").html(coin);
            $("#loading_img").css("display", "block");

            api_call1(coin);

        })
    }

    function api_call1(coin) {
        fetch(`https://api.coinbase.com/v2/prices/${$("#coint_to_receive").val()}-USD/buy`).then(response => {
            return response.json();
        }).then(coin_to_receive => {
            //console.log(users);
            let rate = 1 / coin_to_receive.data.amount;
            let rate1 = (coin / coin_to_receive.data.amount)/ rate;

            let dorllar_rate = `$${rate1.toLocaleString()}`;
            $("#loading_img").css("display", "none");
            $("#button").css("display", "none");
            $("#display_now").html(`You Will Receive ${parseFloat(coin / coin_to_receive.data.amount).toFixed(4)} (${dorllar_rate}) of ${$("#coint_to_receive").find('option:selected').text()}, PLease Send Your ${$("#coint_to_swap").find('option:selected').text()} to This Wallet Address And Click on The Confirm Button Below to Confirm Your Transaction Thank You`);
            $("#button1").css("display", "block");
            $("#wallet_address").css("display", "block");
            get_address();
            $("#total_swapped_coin").val(parseFloat(coin / coin_to_receive.data.amount).toFixed(4));

            $("#display_dollar_rate").val(rate1);
        })
    }

    /////this fuction cheack and validate inputs
    function check() {
        if ($("#coint_to_receive").val() == "") { ///if rev coin select input is empty 
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter',
                        Swal
                        .stopTimer)
                    toast.addEventListener('mouseleave',
                        Swal
                        .resumeTimer)
                }
            });
            Toast.fire({
                icon: 'info',
                title: 'Please Select Coin to Receive'
            })

            return false;

        } else if ($("#coint_to_swap").val() == "") {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter',
                        Swal
                        .stopTimer)
                    toast.addEventListener('mouseleave',
                        Swal
                        .resumeTimer)
                }
            });
            Toast.fire({
                icon: 'info',
                title: 'Please Select Coin to Swap'
            })
            return false;
        } else if ($("#coint_to_swap").val() == $("#coint_to_receive").val()) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter',
                        Swal
                        .stopTimer)
                    toast.addEventListener('mouseleave',
                        Swal
                        .resumeTimer)
                }
            });
            Toast.fire({
                icon: 'info',
                title: 'Please Select a Differnt Coin to Swap or Receive'
            })
            return false;
        } else if ($("#coin_amount").val() == "") {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter',
                        Swal
                        .stopTimer)
                    toast.addEventListener('mouseleave',
                        Swal
                        .resumeTimer)
                }
            });
            Toast.fire({
                icon: 'info',
                title: `Please Specify The Amount of  ${$("#coint_to_swap").find('option:selected').text()} You Want to Swap`
            })
            $("#coin_amount").focus();
            $("#coin_amount").attr("placeholder", `AMOUNT OF ${$("#coint_to_swap").find('option:selected').text()} COIN TO SWAP`);
            return false;
        } else {
            return true;
        }
    }

    /////trigger 
    $(".coin").change(function() {
        check();
    });




    $("#button").click(function() {
        if (check() == true) {
            api_call();
        }
    });

    //script to copy btc address-----------------------------
    $("#myInput").prop("disabled", true);
    $(document).on('click', '#copy', function(e) {
        e.preventDefault();
        $("#myInput").prop("disabled", false);
        /* Get the text field */
        var copyText = document.getElementById("myInput");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */



        /* Copy the text inside the text field */
        document.execCommand("copy");
        $("#myInput").prop("disabled", true);

        /* Alert the copied text */
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        Toast.fire({
            icon: 'success',
            title: 'Address Copied Successfully'
        })
    });
</script>
<br>







<!-- dashboard section end -->
<!-- footer section start -->
<?php include "includes/login_footer.php" ?>