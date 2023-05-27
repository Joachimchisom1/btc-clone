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
                    <h2 class="section-title"><span class="font-weight-normal">Please confirm your </span> <b class="base--color">deposit</b></h2>
                    <!--<p>please make sure you pay</p>-->
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div style="text-align: center;" class="profit-calculator-wrapper">

                    <?php
                    if (isset($_GET['address'])) {
                        $name = $_GET['address'];
                        $result = mysqli_query($connection, "SELECT * FROM wallet__addreses WHERE address_name = '$name'");
                        while ($row = mysqli_fetch_assoc($result)) {
                            $address_name = $row['address_name'];
                            $address_hash = $row['address_hash'];
                        }
                        ConfirmQuery($result);
                    }


                    ///proof insert fuction-------------------------------------------------
                    if (isset($_FILES['image'])) {
                        $amount = $_POST['amount'];
                        $hash = $_POST['hash'];
                        $userid = $_SESSION['id'];
                        $username =  $_SESSION['username'];
                        $plan =  $_POST['plan'];
                        $btc =  $address_name;
                        $samount = "";

                        $img = $_FILES['image']['name'];
                        $temp_img = $_FILES['image']['tmp_name'];

                        move_uploaded_file($temp_img, "img/$img");

                        $query = "INSERT INTO proof (userid, user_name, proof_img, amount, supposed_amount, type_of_payment, tran_hash, plan) ";
                        $query .= "VALUES('{$userid}','{$username}','{$img}','{$amount}','{$samount}','{$btc}','{$hash}','{$plan}')";
                        $insert_proof = mysqli_query($connection, $query);
                        ConfirmQuery($insert_proof);
                        echo '<script>Swal.fire("Your Proof Have Been Uploaded Successfully Please Wait while We Confirm Your Payment!","","success").then(function() {
                           
                            sendmail();
                        })</script>';
                    }

                    ?>

                    <script>
                        function sendmail() {
                            $(document).ready(function() {
                                var amount = "<?php echo $amount; ?>";
                                var userid = "<?php echo $userid; ?>";
                                var username = "<?php echo $username; ?>";
                                var plan = "<?php echo $plan; ?>";
                                var coin = "<?php echo $name; ?>";
                                var key4 = "key1";
                                $.ajax({
                                    url: "includes/server.php",
                                    type: "POST",
                                    data: {
                                        coin: coin,
                                        amount: amount,
                                        plan: plan,
                                        username: username,
                                        key4: key4,
                                        userid: userid
                                    },
                                    success: function(response) {

                                    }
                                });
                            });

                        }
                    </script>


                    <form method="post" enctype="multipart/form-data" id="form_data" class="profit-calculator">
                        <div class="row mb-none-30">
                            <div id="mssg" class="col-lg-12 mb-30">
                                <br>
                                <div id="pay_pic">
                                    <p>Please send your <?php echo $address_name; ?> payments to this <?php echo $address_name; ?> Address:
                                    <P> <?php echo $address_hash; ?></p>
                                    </P>
                                </div>
                            </div>

                            <div id="address" class="col-lg-12 mb-30">
                                <input type="text" value="<?php echo $address_hash; ?>" id="myInput">
                                <input id="copy" class="btn btn-dark" type="reset" value="Copy Address">
                            </div>
                            <div class="col-lg-12 mb-30">
                                <label>Amount</label>
                                <!--<input name="amount" required id="amount" type="text" class="form-control base--bg">-->
                                <input value="" name="samount" hidden id="samount" type="text" class="form-control base--bg">
                                <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input value="<?php if (isset($_GET['reinvest'])) {
                                                        echo $_GET['reinvest'];
                                                    } ?>" name="amount" required id="amount" type="text" class="form-control base--bg">
                                </div>
                            </div>
                            <div id="mssg" class="col-lg-12 mb-30">
                                <p id="mssg1"></p>
                                <br>
                                <div id="pay_pic">
                                    <!-- <h3>Pay with:</h3>
                                    <p>Click a Payment processor to pay with or pay via your personal wallet</p>
                                    <br>
                                    <br> -->
                                    <!--<a style="background-color: #fff;" href="https://lumiwallet.com/" target="_blank" class="coin-pay-btn"><img src="assets/images/bg/lumi.png" alt=""></a><br>-->
                                    <!-- <br> -->
                                    <!--<br>-->
                                    <!--<a href="https://buy.moonpay.com/" target="_blank" class="coin-pay-btn"><img src="assets/images/bg/bitcoinpay.png" alt=""></a>-->
                                    <!--<br>-->
                                    <!-- <br>
                                    <a href="https://www.coinbase.com/" target="_blank" class="coin-pay-btn"><img width="500" height="600" src="assets/images/bg/coinbase.jpg" alt=""></a><br>
                                    <br>
                                    <br>
                                    <a href="https://localbitcoins.com/" target="_blank" class="coin-pay-btn"><img src="assets/images/bg/localbitcoin.png" alt=""></a> -->
                                </div>
                            </div>
                            <div hidden id="proof_input" class="proof_input col-lg-12 mb-30">
                                <label>Select Digital Proof of Payment (Optional)</label>
                                <input id="amount" name="image" placeholder="Upload Proof of Payment" type="file" class="form-control base--bg">
                            </div>
                            <select <?php
                                    if (isset($_GET['mining'])) {
                                        echo "style='pointer-events: none;'";
                                    } elseif (isset($_GET['investement'])) {
                                        echo "style='pointer-events: none;'";
                                    }
                                    ?>  required name="plan" id="">
                                <option value="">Please Select Investement / Miining Plan</option>
                                <option <?php
                                        if (isset($_GET['mining'])) {
                                            if ($_GET['mining'] == "ANTMINER") {
                                                echo "selected";
                                            }
                                        }
                                        ?> value="ANTMINER">ANTMINER</option>
                                <option <?php
                                        if (isset($_GET['mining'])) {
                                            if ($_GET['mining'] == "DRAGONMINTER") {
                                                echo "selected";
                                            }
                                        }
                                        ?> value="DRAGONMINTER">DRAGONMINTER</option>
                                <option <?php
                                        if (isset($_GET['mining'])) {
                                            if ($_GET['mining'] == "PAGOLINMINER") {
                                                echo "selected";
                                            }
                                        }
                                        ?> value="PAGOLINMINER">PAGOLINMINER</option>
                                <option <?php
                                        if (isset($_GET['mining'])) {
                                            if ($_GET['mining'] == "AVALONMINER") {
                                                echo "selected";
                                            }
                                        }
                                        ?> value="AVALONMINER">AVALONMINER</option>
                                <option <?php
                                        if (isset($_GET['investement'])) {
                                            if ($_GET['investement'] == "STARTER PLAN") {
                                                echo "selected";
                                            }
                                        }
                                        ?> value="STARTER PLAN">STARTERPLAN</option>
                                <option <?php
                                        if (isset($_GET['investement'])) {
                                            if ($_GET['investement'] == "GOLD PLAN") {
                                                echo "selected";
                                            }
                                        }
                                        ?> value="GOLD PLAN">GOLDPLAN</option>
                                <option <?php
                                        if (isset($_GET['investement'])) {
                                            if ($_GET['investement'] == "PREMIUM PLAN") {
                                                echo "selected";
                                            }
                                        }
                                        ?> value="PREMIUM PLAN">PREMIUMPLAN</option>
                                <option <?php
                                        if (isset($_GET['investement'])) {
                                            if ($_GET['investement'] == "PLATINUM PLAN") {
                                                echo "selected";
                                            }
                                        }
                                        ?> value="PLATINUM PLAN">PLATINUMPLAN</option>
                                <option <?php
                                        if (isset($_GET['investement'])) {
                                            if ($_GET['investement'] == "EXLUSIVE VIP PLAN") {
                                                echo "selected";
                                            }
                                        }
                                        ?> value="EXLUSIVE VIP PLAN">EXLUSIVE VIP PLAN</option>
                            </select>
                            <div hidden id="proof_input" class="proof_input col-lg-12 mb-30">
                                <label>Transaction Hash</label>
                                <input name="hash" placeholder="Enter Transaction Hash" type="text" class="form-control base--bg">
                            </div>
                            <div class="col-lg-12 mb-30">
                                <button type="submit" class="cmn-btn">Submit</button>
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

<!-- footer section start -->
<?php include "includes/login_footer.php" ?>