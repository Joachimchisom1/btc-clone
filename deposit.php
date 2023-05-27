<?php include "includes/login_header.php" ?>
<!-- -------------------------main content start ------------------>
<!-- inner hero start -->
<section class="inner-hero bg_img" data-background="assets/images/bg/bg-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="page-title">Deposit</h2>
                <ul class="page-breadcrumb">
                    <li>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    </li>
                    <li>Deposit</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- inner hero end -->
<br>
<br>


<div class="container">
    <div class="row justify-content-center mt-2">

        <div class="col-lg-3 col-md-3 mb-3">
            <div class="card card-bg">
                <h5 class="card-header text-center">BITCOIN</h5>
                <div class="card-body card-body-deposit">
                    <img src="img/60adb2de0633d1621996254.jpeg" class="card-img-top" alt="BITCOIN" style="width: 100%">
                    <ul class="text-center package-card__features mt-4">
                        <li>Limit : 100 - 10000000000 $</li>
                    </ul>

                </div>
                <div class="card-footer">
                    <a href="btc1.php?address=Bitcoin<?php if (isset($_GET['mining'])) {
                                                            echo "&mining=" . $_GET['mining'] . "";
                                                        } elseif (isset($_GET['investement'])) {
                                                            echo "&investement=" . $_GET['investement'] . "";
                                                        } ?>" class="btn btn-block  btn-primary w-100">
                        DEPOSITE NOW</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 mb-3">
            <div class="card card-bg">
                <h5 class="card-header text-center">Ethereum</h5>
                <div class="card-body card-body-deposit">
                    <img src="img/unnamed.webp" class="card-img-top" alt="Bank Wire" style="width: 100%">

                    <ul class="text-center package-card__features mt-4">
                        <li>Limit : 100 - 10000000000 $</li>
                    </ul>

                </div>
                <div class="card-footer">
                    <a href="btc1.php?address=Ethereum<?php if (isset($_GET['mining'])) {
                                                            echo "&mining=" . $_GET['mining'] . "";
                                                        } elseif (isset($_GET['investement'])) {
                                                            echo "&investement=" . $_GET['investement'] . "";
                                                        } ?>" class="btn btn-block  btn-primary w-100 withdraw">
                        DEPOSITE NOW</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 mb-3">
            <div class="card card-bg">
                <h5 class="card-header text-center">Bitcoin Cash SV</h5>
                <div class="card-body card-body-deposit">
                    <img src="img/Bitcoin-Cash.png" class="card-img-top" alt="Bank Wire" style="width: 100%">

                    <ul class="text-center package-card__features mt-4">
                        <li>Limit : 100 - 10000000000 $</li>
                    </ul>

                </div>
                <div class="card-footer">
                    <a href="btc1.php?address=Bitcoin Cash<?php if (isset($_GET['mining'])) {
                                                                echo "&mining=" . $_GET['mining'] . "";
                                                            } elseif (isset($_GET['investement'])) {
                                                                echo "&investement=" . $_GET['investement'] . "";
                                                            } ?>" class="btn btn-block  btn-primary w-100 withdraw">
                        DEPOSITE NOW</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 mb-3">
            <div class="card card-bg">
                <h5 class="card-header text-center">Tron</h5>
                <div class="card-body card-body-deposit">
                    <img src="img/4f3f390369f12750aab8fd55f786372f.svg" class="card-img-top" style="width: 100%; background-color: white;">

                    <ul class="text-center package-card__features mt-4">
                        <li>Limit : 100 - 10000000000 $</li>
                    </ul>

                </div>
                <div class="card-footer">
                    <a href="btc1.php?address=Tron<?php if (isset($_GET['mining'])) {
                                                        echo "&mining=" . $_GET['mining'] . "";
                                                    } elseif (isset($_GET['investement'])) {
                                                        echo "&investement=" . $_GET['investement'] . "";
                                                    } ?>" class="btn btn-block  btn-primary w-100 withdraw"">
                        DEPOSITE NOW</a>
                </div>
            </div>
            
        </div>
        <div class="col-lg-3 col-md-3 mb-3">
            <div class="card card-bg">
                <h5 class="card-header text-center">BNB</h5>
                <div class="card-body card-body-deposit">
                    <img src="img/binance-logo-6219389_960_720.webp" class="card-img-top" style="width: 100%; background-color: white;">

                    <ul class="text-center package-card__features mt-4">
                        <li>Limit : 100 - 10000000000 $</li>
                    </ul>

                </div>
                <div class="card-footer">
                    <a href="btc1.php?address=Binance coin<?php if (isset($_GET['mining'])) {
                                                        echo "&mining=" . $_GET['mining'] . "";
                                                    } elseif (isset($_GET['investement'])) {
                                                        echo "&investement=" . $_GET['investement'] . "";
                                                    } ?>" class="btn btn-block  btn-primary w-100 withdraw"">
                        DEPOSITE NOW</a>
                </div>
            </div>
            
        </div>
        <div class="col-lg-3 col-md-3 mb-3">
            <div class="card card-bg">
                <h5 class="card-header text-center">Dogecoin</h5>
                <div class="card-body card-body-deposit">
                    <img src="img/images.png" class="card-img-top" style="width: 100%; background-color: white;">

                    <ul class="text-center package-card__features mt-4">
                        <li>Limit : 100 - 10000000000 $</li>
                    </ul>

                </div>
                <div class="card-footer">
                    <a href="btc1.php?address=Doge<?php if (isset($_GET['mining'])) {
                                                        echo "&mining=" . $_GET['mining'] . "";
                                                    } elseif (isset($_GET['investement'])) {
                                                        echo "&investement=" . $_GET['investement'] . "";
                                                    } ?>" class="btn btn-block  btn-primary w-100 withdraw"">
                        DEPOSITE NOW</a>
                </div>
            </div>
            
        </div>
        <div class="col-lg-3 col-md-3 mb-3">
            <div class="card card-bg">
                <h5 class="card-header text-center">Litecoin</h5>
                <div class="card-body card-body-deposit">
                    <img src="img/download (3).png" class="card-img-top" style="width: 100%; background-color: white;">

                    <ul class="text-center package-card__features mt-4">
                        <li>Limit : 100 - 10000000000 $</li>
                    </ul>

                </div>
                <div class="card-footer">
                    <a href="btc1.php?address=LiteCoin<?php if (isset($_GET['mining'])) {
                                                        echo "&mining=" . $_GET['mining'] . "";
                                                    } elseif (isset($_GET['investement'])) {
                                                        echo "&investement=" . $_GET['investement'] . "";
                                                    } ?>" class="btn btn-block  btn-primary w-100 withdraw"">
                        DEPOSITE NOW</a>
                </div>
            </div>
            
        </div>
        <div class="col-lg-3 col-md-3 mb-3">
            <div class="card card-bg">
                <h5 class="card-header text-center">Ripple</h5>
                <div class="card-body card-body-deposit">
                    <img src="img/xrp_icon-freelogovectors.net_.png" class="card-img-top" style="width: 100%; background-color: white; border-radius: 10px;">

                    <ul class="text-center package-card__features mt-4">
                        <li>Limit : 100 - 10000000000 $</li>
                    </ul>

                </div>
                <div class="card-footer">
                    <a href="btc1.php?address=Ripple<?php if (isset($_GET['mining'])) {
                                                        echo "&mining=" . $_GET['mining'] . "";
                                                    } elseif (isset($_GET['investement'])) {
                                                        echo "&investement=" . $_GET['investement'] . "";
                                                    } ?>" class="btn btn-block  btn-primary w-100 withdraw">
                        DEPOSITE NOW</a>
                </div>
            </div>
            
        </div>

        <div class="col-lg-3 col-md-3 mb-3">
            <div class="card card-bg">
                <h5 class="card-header text-center">Propy</h5>
                <div class="card-body card-body-deposit">
                    <img src="img/propy.png" class="card-img-top" style="width: 100%; background-color: white; border-radius: 10px;">

                    <ul class="text-center package-card__features mt-4">
                        <li>Limit : 100 - 10000000000 $</li>
                    </ul>

                </div>
                <div class="card-footer">
                    <a href="btc1.php?address=Propy<?php if (isset($_GET['mining'])) {
                                                        echo "&mining=" . $_GET['mining'] . "";
                                                    } elseif (isset($_GET['investement'])) {
                                                        echo "&investement=" . $_GET['investement'] . "";
                                                    } ?>" class="btn btn-block  btn-primary w-100 withdraw"">
                        DEPOSITE NOW</a>
                </div>
            </div>
            
        </div>

        <div class=" col-lg-3 col-md-3 mb-3">
                        <div class="card card-bg">
                            <h5 class="card-header text-center">USDT</h5>
                            <div class="card-body card-body-deposit">
                                <img src="img/unnamed (1).webp" class="card-img-top" alt="Bank Wire" style="width: 100%">

                                <ul class="text-center package-card__features mt-4">
                                    <li>Limit : 100 - 10000000000 $</li>
                                </ul>

                            </div>
                            <div class="card-footer">
                                <a href="btc1.php?address=Usdt<?php if (isset($_GET['mining'])) {
                                                                    echo "&mining=" . $_GET['mining'] . "";
                                                                } elseif (isset($_GET['investement'])) {
                                                                    echo "&investement=" . $_GET['investement'] . "";
                                                                }
                                                                ?>" class="btn btn-block  btn-primary w-100 withdraw">
                                    DEPOSITE NOW</a>
                            </div>
                        </div>

                </div>


            </div>
        </div>
        

        

        <?php $_SESSION['sec'] = ""; ?>

        <script>
            $("#clicknow").click(function() {
                (async () => {

                    const {
                        value: file
                    } = await Swal.fire({
                        title: 'Select image',
                        input: 'file',
                        inputAttributes: {
                            'accept': 'image/*',
                            'aria-label': 'Upload your profile picture'
                        }
                    })

                    if (file) {
                        const reader = new FileReader()
                        reader.onload = (e) => {
                            Swal.fire({
                                title: 'Your uploaded picture',
                                imageUrl: e.target.result,
                                imageAlt: 'The uploaded picture'
                            })
                        }
                        reader.readAsDataURL(file)
                    }

                })()
            });
            // var userid = 2;
            // $(document).ready(function() {
            //     $(document).on('click', '#btc', function() {
            //         //calculates and cheack the amount of btc 

            //         var triggerid = "yook";
            //         $.ajax({
            //             type: 'POST',
            //             url: 'includes/server.php',
            //             dataType: 'text',
            //             data: {
            //                 userid: userid,
            //                 triggerid: triggerid
            //             },
            //             success: function(response) {
            //                 //alert(response);
            //                 if (response.trim() == "err") {
            //                     window.location = "btc.php";
            //                 } else {
            //                     Swal.fire({
            //                         title: 'You have a Pending Proof Still Yet To Be Confirmed Would You Like To Update or Delete Proof?',
            //                         showDenyButton: true,
            //                         showCancelButton: true,
            //                         confirmButtonText: `Update`,
            //                         denyButtonText: `Delete`,
            //                     }).then((result) => {
            //                         /* Read more about isConfirmed, isDenied below */
            //                         if (result.isConfirmed) {
            //                             window.location = "btc_update.php";
            //                         } else if (result.isDenied) {

            //                             ajaxcall1();
            //                         }
            //                     })
            //                 }
            //             }
            //         });
            //     });
            // });

            // function ajaxcall1() {
            //     var dtriger = 5;
            //     $.ajax({
            //         type: 'POST',
            //         url: 'includes/server.php',
            //         dataType: 'text',
            //         data: {
            //             userid: userid,
            //             dtriger: dtriger
            //         },
            //         success: function(resp) {
            //             Swal.fire(
            //                 '' + resp + '!',
            //                 '',
            //                 'success'
            //             )

            //         }
            //     });
            // }
        </script>


        <!-- row end -->
        <div class="row mt-50 ">

            <div class="col-lg-12 ">

                <div style="text-align: center;" class="table-responsive--md p-0 ">
                    <h3>Deposit Log</h3>
                    <table class="table style--two white-space-nowrap ">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Transaction ID</th>
                                <th>Amount</th>
                                <th>Wallet</th>
                                <th>Details</th>
                                <th>Post Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM transactions WHERE (wallet = 'deposit_w' AND type = 'pluse' AND username = '$usename') ORDER BY id DESC";
                            $details = mysqli_query($connection, $query);
                            $count = mysqli_num_rows($details);
                            while ($row = mysqli_fetch_assoc($details)) {
                            ?>
                                <tr>
                                    <td data-label="Date "><?php echo $row['date']; ?></td>
                                    <td data-label="Transaction ID">
                                        <span class="base--color"><?php echo $row['transaction_id']; ?></span>
                                    </td>
                                    <td data-label="Amount ">
                                        <span class="<?php if ($row['type'] == "pluse") {
                                                            echo "text-success";
                                                        } else {
                                                            echo "text-danger";
                                                        } ?>
                            "><?php if ($row['type'] == "pluse") {
                                    echo "+";
                                } else {
                                    echo "-";
                                } ?> $<?php echo $row['amount']; ?></span>
                                    </td>
                                    <td data-label="Wallet ">
                                        <span class="badge base--bg ">
                                            <?php if ($row['wallet'] == "deposit_w") {
                                                echo "Deposit Wallet Balance";
                                            } else if ($row['wallet'] == "interest_w") {
                                                echo "Interest Wallet Balance";
                                            } else if ($row['wallet'] == "total_deposit") {
                                                echo "Total Deposit";
                                            } else if ($row['wallet'] == "total_w") {
                                                echo "Total Withdraw";
                                            } else if ($row['wallet'] == "referral_e") {
                                                echo "Referral Earnings";
                                            } else if ($row['wallet'] == "total_invest") {
                                                echo "Total Invest";
                                            } ?>
                                        </span>
                                    </td>
                                    <td data-label="Details "><?php echo $row['detail']; ?></td>
                                    <td data-label="Post Balance "> $<?php echo $row['post_balance']; ?></td>
                                </tr>
                            <?php }
                            if ($count == 0) {
                                echo '<td colspan="5">No Log Avialiable</td>';
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- row end -->
        <br>


        <!------------------------------------------------ main  content section end -->
        <?php include "includes/login_footer.php" ?>
        <script>
            // $(document).on('click', '.depo', function(e) {
            //         ///third

            //         let timerInterval
            //         Swal.fire({
            //             title: 'Please Hold!',
            //             html: 'Processing...',
            //             timer: 5000,
            //             // timerProgressBar: true,
            //             didOpen: () => {
            //                 Swal.showLoading()
            //                 timerInterval = setInterval(() => {
            //                     const content = Swal.getHtmlContainer()
            //                     if (content) {
            //                         const b = content.querySelector('b')
            //                         if (b) {
            //                             b.textContent = Swal.getTimerLeft()
            //                         }
            //                     }
            //                 }, 100)
            //             },
            //             willClose: () => {
            //                 clearInterval(timerInterval)
            //             }
            //         }).then((result) => {
            //             Swal.fire(
            //                 'Note',
            //                 ' Please make Your payment to this BTC address below and contact the admin for confirmation :  <BR> 36gi4fKaBskM5wETbsrjUJyhtP2R8kKqPQ',
            //                 'info'
            //             )
            //         })
            //     }
            // )
        </script>