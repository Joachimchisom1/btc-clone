<?php include "includes/login_header.php" ?>
<?php if (isset($_SESSION['sec'])) {
    $_SESSION['sec'] = null;
}
// else {
//     header("Location: deposit.php");
// } 
?>

<!-- header-section end  -->
<br>
<br>
<!-- btc calculator payment start -->
<br>
<br>
<section class="pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title"><span class="font-weight-normal">BTC</span> <b class="base--color">Calculator</b></h2>
                    <p>please make sure you pay</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div style="text-align: center;" class="profit-calculator-wrapper">

                    <?php
                    $url = 'https://bitpay.com/api/rates';
                    $json = json_decode(file_get_contents($url));
                    $dollar = $btc = 0;
                    foreach ($json as $obj) {
                        if ($obj->code == 'ZAR') $btc = $obj->rate;
                    }

                    //echo "1 bitcoin=\$" . $btc . " ZAR<br />";

                    ?>

                    <p>1 BTC = <?php echo $btc; ?> ZAR</p>

                    <form class="profit-calculator">
                        <div class="row mb-none-30">
                            <div class="col-lg-12 mb-30">
                                <label>Amount</label>
                                <input id="amount" type="text" class="form-control base--bg">
                            </div>
                            <div id="mssg" class="col-lg-12 mb-30">
                                <p>You are to Pay 0.012558 Worth of btc to the following address below, Please make sure You have paid the exact amount befor you proceed and upload your proof for futher Confirmation. </p>
                            </div>
                            <div id="address" class="col-lg-12 mb-30">
                                <input type="text" value="llmkfmlnfamfsdanfasdlfjas" id="myInput">
                                <span><button id="copy">Copy Address</button></span>
                            </div>

                            <div id="proof_input" class="col-lg-12 mb-30">
                                <label>Select Proof of Payment</label>
                                <input id="amount" placeholder="Upload Proof of Payment" type="file" class="form-control base--bg">
                            </div>
                            <div id="button" class="col-lg-12 mb-30">
                                <button type="submit" class="cmn-btn">Continue</button>
                            </div>
                            <div id="button1" class="col-lg-12 mb-30">
                                <button type="submit" class="cmn-btn">Continue</button>
                            </div>
                            <div id="button2" class="col-lg-12 mb-30">
                                <button type="submit" class="cmn-btn">Confirm Payment</button>
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
    $("#myInput").prop("disabled", true);
    $("#button1").css("display", "none");
    $("#button2").css("display", "none");
    $("#proof_input").css("display", "none");
    $("#address").css("display", "none");
    $("#mssg").css("display", "none");

    $(document).on('click', '#button', function(e) {
        e.preventDefault();
        $("#address").css("display", "block");
        $("#mssg").css("display", "block");
        $("#button").css("display", "none");
        $("#button1").css("display", "block");
    });


    $(document).on('click', '#button2', function(e) {
        e.preventDefault();
        Swal.fire('sent!', 'We Will Get Back To You as Soon as We Confirm Your Payment', 'success').then(function() {
            window.location = "btc.php";
        });
    });

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
        alert("Address Copied Sucessfully");
        Swal.fire('Any fool can use a computer');
    });
</script>
<br>







<!-- dashboard section end -->
<!-- footer section start -->
<?php include "includes/login_footer.php" ?>