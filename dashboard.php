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

<!-- header-section end  -->
<!-- inner hero start -->
<section class="inner-hero bg_img" data-background="assets/images/bg/bg-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="page-title">Dashboard</h2>
                <ul class="page-breadcrumb">
                    <li>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    </li>
                    <li>Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
</section>



<!-- inner hero end -->




<?php

// Get real visitor IP behind CloudFlare network
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

// Output IP address [Ex: 177.87.193.134]

//echo $realIP = file_get_contents("http://ipecho.net/plain");

$api_url = 'http://api.ipapi.com/' . $user_ip . '?access_key=6eadc30c57f62acc9080f2a8a5aa1a7c&format=1';

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data);

// if (!$response_data->error) {
//     // All user data exists in 'data' object
//     $user_data = $response_data->location->country_flag;
//     $ip = $response_data->ip;
// } else {
//     $user_data = "./avatar.jpg";
//     $ip = $user_ip;
// }

?>


<br>
<?Php
$sqlQuery = "SELECT * FROM investors WHERE id = $id";
$result = mysqli_query($connection, $sqlQuery);
while ($row = mysqli_fetch_assoc($result)) {
    $fullname = $row['fullname'];
    $date = $row['date'];
    $deposit_w = $row['deposit_w'];
    $interest_w = $row['interest_w'];
    $total_invest = $row['total_invest'];
    $total_deposit = $row['total_deposit'];
    $total_w = $row['total_w'];
    $referral_e = $row['referral_e'];
    $username = $row['username'];
    $referred_by = $row['referred_by'];
    $img = $row['img'];
    $total_deposit = $row['total_deposit'];
    $referrel_url = $row['referrel_url'];
    $last_seen = $row['last_seen'];
    $last_seen_anouncement = $row['last_seen_anouncement'];
    $ref_key = $row['ref_key'];
}



?>
<div class="col-xl-12 col-sm-12 mb-30">
    <div class="d-widget d-flex flex-wrap">
        <div class="col-6">
            <h2>welcome <?php echo $fullname; ?></h2>
        </div>
        <!-- <div class="col-6">
            <span class="caption">Your Ip Address
                <?php echo '<img style="padding-left: 10px;" width="50" height="" src="' . $user_data . '" alt="">'; ?></span>
            <h4 class="currency-amount "><?php echo $user_ip; ?></h4>
        </div> -->
    </div>
</div>
<div class="col-xl-12 col-sm-12 mb-30">
    <div class="d-widget d-flex flex-wrap">
        <div class="col-4">
            <div class="profile-header-img">
                <div class="text-center">
                    <img style="width: 100%; border-radius: 400px;" src="img/<?php
                                                                                if ($img != "") {
                                                                                    echo $img;
                                                                                } else {
                                                                                    echo "avatar.jpg";
                                                                                } ?>" class="avatar img-circle img-thumbnail" alt="avatar">
                </div>
            </div>
        </div>
        <!-- <div class="col-4 ">
            <span class="caption ">Registration Date:</span>
            <h4 class="currency-amount "><?php echo $date; ?></h4>
        </div> -->
        <div class="col-4 ">
            <span class="caption ">Last Seen:</span>
            <h4 class="currency-amount "><?php echo $last_seen_anouncement; ?></h4>
        </div>
        <a href="" id="copy" style="background-color:  #007bff; height: 45px;" class="cmn-btn btn-md mt-4">Click to Copy Your Referral link</a>
        <input type="text" value="<?php echo $referrel_url; ?>" id="myInput">
    </div>
    <!-- d-widget-two end -->
</div>

<div class="col-xl-12 col-sm-12 mb-30">
    <div class="d-widget d-flex flex-wrap">
        <div class="col-4 ">
            <span class="caption ">Money Invested</span>
            <h4 class="currency-amount ">$<?php echo number_format($total_invest); ?></h4>
        </div>
        <div class="col-4 ">
            <span class="caption ">Available Withdrawal</span>
            <h4 class="currency-amount ">$<?php echo number_format($interest_w); ?></h4>
        </div>
        <div class="col-4 ">
            <?php
            $result = mysqli_query($connection, "SELECT * FROM tbl_investement WHERE user_id = '$username' AND 	status = 'Active'");
            ConfirmQuery($result);
            $count = mysqli_num_rows($result);
            if ($count == 0) {
                echo '<a href="deposit.php"><button type="button" class="btn btn-primary"><i class="las la-money-bill-wave"></i>Reinvest</button></a>';
            } else {
                echo '<a href="active_investment.php"><button type="button" class="btn btn-primary"></i>Active Investement</button></a>';
            }


            if ($interest_w != 0) {
                echo '<button type="button" id="chk" class="btn btn-success"><i class="las la-money-bill-wave"></i>Withdraw Now</button>';
            }
            ?>
        </div>

    </div>
</div>
<script>
    $(document).on('click', '#chk', function(e) {
        let timerInterval
        Swal.fire({
            title: 'Please Wait!',
            html: 'Calculating Your Avaliable Withdraw Balance...',
            timer: 5000,
            // timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                //alert("yess")

            },
        }).then((result) => {
            var with_check = "with_check";
            $.ajax({
                type: 'POST',
                url: 'includes/server.php',
                dataType: 'text',
                data: {
                    with_check: with_check
                },
                success: function(response) {
                    // alert(response);
                    var response = response;
                    if (response.trim() == "err") {
                        Swal.fire(
                            'Insufficient Interest Wallet Balance!',
                            '',
                            'error'
                        )
                    } else {
                        withdraw_code();

                    }
                }
            })
        })
    });


    ///fuction tht cheacks for withdrawal code.......
    function withdraw_code() {
        var w_code = "w_code";
        $.ajax({
            type: 'POST',
            url: 'includes/server.php',
            dataType: 'text',
            data: {
                w_code: w_code
            },
            success: function(response) {
                // alert(response);
                var response = response;
                if (response.trim() == "err") {
                    account_bal();
                } else {
                    Swal.fire(
                        'Note',
                        `${response}`,
                        'info'
                    )
                }
            }
        })
    }
    ////fuction that check and pull out acount balace
    function account_bal() {
        var chhk_wit = 5;
        $.ajax({
            type: 'POST',
            url: 'includes/server.php',
            dataType: 'text',
            data: {
                chhk_wit: chhk_wit,
            },
            success: function(resp) {
                // if (resp.trim() == "err") {
                //     var gen = $("#gen").val();

                //     Swal.fire({
                //         title: 'Note',
                //         text: 'Hello ' + gen +
                //             ' Your Request has been Granted and Your Profit is Ready But we need to Confirm Your KYC Please Complete Your KYC to Continue This Process.',
                //         icon: 'info',
                //         showCancelButton: true,
                //         confirmButtonColor: '#3085d6',
                //         cancelButtonColor: '#d33',
                //         confirmButtonText: 'Yes, Confirm'
                //     }).then((result) => {
                //         if (result.isConfirmed) {
                //             window.location = "kyc.php";
                //         }
                //     })
                // } else {
                secondcall($balance = resp.trim());
                // }
            }
        });

    }

    ///fuction to enter input for withdrawal
    function secondcall($balance) {

        (async () => {
            const {
                value: amount
            } = await Swal.fire({
                title: `Avaliable Balance $${$balance}`,
                input: 'number',
                inputLabel: 'Enter The Amount You Will Like to Withdraw',
                showCancelButton: true,
                inputValidator: (value) => {
                    if (!value) {
                        return 'You need to Specify a Value!'
                    }
                }
            })
            if (amount) {

                var chk_amount = "chk_amount";
                $.ajax({
                    type: 'POST',
                    url: 'includes/server.php',
                    dataType: 'text',
                    data: {
                        chk_amount: chk_amount,
                        amount: amount
                    },
                    success: function(resp) {
                        if (resp.trim() == "Insufficient Balance") {
                            Swal.fire(
                                'Insufficient Balance!',
                                '',
                                'error'
                            ).then(function() {
                                secondcall($balance);
                            });
                        } else {

                            Swal.fire(
                                'Note',
                                'Withdraw request submmited succesfully',
                                'success'
                            )
                        }
                    }
                });



                // if (amount < 5000) {
                //     Swal.fire(
                //         'The Minimum Amount to Invest For Silver Plan is $5000!',
                //         '',
                //         'error'
                //     ).then(function() {
                //         submitsilverplan();
                //     })
                // } else {
                //     var silver_plan_submit = "silver_plan_submit";
                //     $.ajax({
                //         type: 'POST',
                //         url: 'includes/server.php',
                //         dataType: 'text',
                //         data: {
                //             silver_plan_submit: silver_plan_submit,
                //             amount: amount
                //         },
                //         success: function(resp) {
                //             if (resp.trim() == "Insufficient Balance") {
                //                 Swal.fire(
                //                     'Insufficient Balance!',
                //                     '',
                //                     'error'
                //                 ).then(function() {
                //                     submitsilverplan();
                //                 })
                //             } else {
                //                 Swal.fire(
                //                     'Invested Successfully!',
                //                     '',
                //                     'success'
                //                 )
                //             }
                //         }
                //     });
                // }
            }
        })()
        // (async () => {

        //     const {
        //         value: formValues
        //     } = await Swal.fire({
        //         title: 'Enter The Amount You Wish To Withdraw',
        //         text: 'Something went wrong!',
        //         html: '<input id="swal-input1" require placeholder="Amount" class="swal2-input">',
        //         confirmButtonText: 'Proceeed',
        //         confirmButtonColor: "green",
        //         focusConfirm: false,
        //         preConfirm: () => {
        //             return [
        //                 document.getElementById('swal-input1').value
        //             ]
        //         }
        //     })
        //     if (formValues) {
        //         Swal.fire(
        //             'Note',
        //             'Withdraw request submmited succesfully',
        //             'success'
        //         )
        //     }

        // })()
    }

    ///third fuction that cheacks for kyc 
    // function third() {
    //     let timerInterval
    //     Swal.fire({
    //         title: 'Please Hold!',
    //         html: 'Processing...',
    //         timer: 5000,
    //         // timerProgressBar: true,
    //         didOpen: () => {
    //             Swal.showLoading()
    //             timerInterval = setInterval(() => {
    //                 const content = Swal.getHtmlContainer()
    //                 if (content) {
    //                     const b = content.querySelector('b')
    //                     if (b) {
    //                         b.textContent = Swal.getTimerLeft()
    //                     }
    //                 }
    //             }, 100)
    //         },
    //         willClose: () => {
    //             clearInterval(timerInterval)
    //         }
    //     }).then((result) => {
    //         var chhk_wit = 5;
    //         $.ajax({
    //             type: 'POST',
    //             url: 'includes/server.php',
    //             dataType: 'text',
    //             data: {
    //                 chhk_wit: chhk_wit,
    //             },
    //             success: function(resp) {
    //                 if (resp.trim() == "err") {
    //                     var gen = $("#gen").val();

    //                     Swal.fire({
    //                         title: 'Note',
    //                         text: 'Hello ' + gen +
    //                             ' Your Request has been Granted and Your Profit is Ready But we need to Confirm Your KYC Please Complete Your KYC to Continue This Process.',
    //                         icon: 'info',
    //                         showCancelButton: true,
    //                         confirmButtonColor: '#3085d6',
    //                         cancelButtonColor: '#d33',
    //                         confirmButtonText: 'Yes, Confirm'
    //                     }).then((result) => {
    //                         if (result.isConfirmed) {
    //                             window.location = "kyc.php";
    //                         }
    //                     })
    //                 } else {
    //                     secondcall($balance = resp.trim());
    //                 }
    //             }
    //         });
    //     })
    // }



    //script to copy btc address-----------------------------
    $("#myInput").hide();
    $(document).on('click', '#copy', function(e) {
        e.preventDefault();
        $("#myInput").prop("disabled", false);
        //$("#myInput").css("", );
        $("#myInput").show();
        /* Get the text field */
        var copyText = document.getElementById("myInput");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */



        /* Copy the text inside the text field */
        document.execCommand("copy");

        $("#myInput").hide();
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
            title: 'Link Copied Successfully'
        })
    });
</script>

<!-- dashboard section start -->
<div class=" pb-120 ">
    <div class="container ">
        <div class="row justify-content-center ">
            <div class="col-lg-12 ">
                <div class="row mb-none-30 ">
                    <div class="col-xl-4 col-sm-6 mb-30 ">
                        <div class="d-widget d-flex flex-wrap ">
                            <div class="col-8 ">
                                <span class="caption ">Active Total Balance</span>
                                <h4 class="currency-amount ">$<?php echo number_format($deposit_w); ?></h4>
                            </div>
                            <div class="col-4 ">
                                <div class="icon ml-auto ">
                                    <i class="las la-dollar-sign "></i>
                                </div>
                            </div>
                            <div class="col-8 ">
                                <a href="deposit_logs.php"><button type="button" class="btn rounded-pill btn-dark">veiw
                                        Log</button></a>
                            </div>
                        </div>
                        <!-- d-widget-two end -->
                    </div>
                    <div class="col-xl-4 col-sm-6 mb-30 ">
                        <div class="d-widget d-flex flex-wrap ">
                            <div class="col-8 ">
                                <span class="caption ">Available Withdrawal</span>
                                <h4 class="currency-amount ">$<?php echo number_format($interest_w); ?></h4>
                            </div>
                            <div class="col-4 ">
                                <div class="icon ml-auto ">
                                    <i class="las la-wallet "></i>
                                </div>
                            </div>
                            <div class="col-8 ">
                                <a href="Interest_logs.php"><button type="button" class="btn rounded-pill btn-dark">veiw
                                        Log</button></a>
                            </div>
                        </div>
                        <!-- d-widget-two end -->
                    </div>
                    <div class="col-xl-4 col-sm-6 mb-30 ">
                        <div class="d-widget d-flex flex-wrap ">
                            <div class="col-8 ">
                                <span class="caption ">User Referral Earnings</span>
                                <h4 class="currency-amount ">$<?php echo number_format($referral_e); ?></h4>
                            </div>
                            <div class="col-4 ">
                                <div class="icon ml-auto ">
                                    <i class="las la-user-friends "></i>
                                </div>
                            </div>
                            <div class="col-8 ">
                                <a href="referral_earnings_log.php"><button type="button" class="btn rounded-pill btn-dark">veiw Log</button></a>
                            </div>
                        </div>
                        <!-- d-widget-two end -->
                    </div>
                    <div class="col-xl-4 col-sm-6 mb-30 ">
                        <div class="d-widget d-flex flex-wrap ">
                            <div class="col-8 ">
                                <span class="caption ">User Total Deposit</span>
                                <h4 class="currency-amount ">$<?php echo number_format($total_deposit); ?></h4>
                            </div>
                            <div class="col-4 ">
                                <div class="icon ml-auto ">
                                    <i class="las la-credit-card "></i>
                                </div>
                            </div>
                        </div>
                        <!-- d-widget-two end -->
                    </div>
                    <div class="col-xl-4 col-sm-6 mb-30 ">
                        <div class="d-widget d-flex flex-wrap ">
                            <div class="col-8 ">
                                <span class="caption ">User Total Withdraw</span>
                                <h4 class="currency-amount ">$<?php echo number_format($total_w); ?></h4>
                            </div>
                            <div class="col-4 ">
                                <div class="icon ml-auto ">
                                    <i class="las la-cloud-download-alt "></i>
                                </div>
                            </div>
                        </div>
                        <!-- d-widget-two end -->
                    </div>
                    <div class="col-xl-4 col-sm-6 mb-30 ">
                        <div class="d-widget d-flex flex-wrap ">
                            <div class="col-8 ">
                                <span class="caption ">Total Money Invested</span>
                                <h4 class="currency-amount ">$<?php echo number_format($total_invest); ?></h4>
                            </div>
                            <div class="col-4 ">
                                <div class="icon ml-auto ">
                                    <i class="las la-cubes "></i>
                                </div>
                            </div>
                        </div>
                        <!-- d-widget-two end -->
                    </div>
                </div>
                <br>
                <br>

                <div class="account_ctn_Right_Part1 ">
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
                        {
                            "colorTheme": "dark",
                            "dateRange": "12M",
                            "showChart": true,
                            "locale": "en",
                            "largeChartUrl": "",
                            "isTransparent": false,
                            "showSymbolLogo": true,
                            "width": "100%",
                            "height": "700",
                            "plotLineColorGrowing": "rgba(25, 118, 210, 1)",
                            "plotLineColorFalling": "rgba(25, 118, 210, 1)",
                            "gridLineColor": "rgba(42, 46, 57, 1)",
                            "scaleFontColor": "rgba(120, 123, 134, 1)",
                            "belowLineFillColorGrowing": "rgba(33, 150, 243, 0.12)",
                            "belowLineFillColorFalling": "rgba(33, 150, 243, 0.12)",
                            "symbolActiveColor": "rgba(33, 150, 243, 0.12)",
                            "tabs": [{
                                    "title": "Indices",
                                    "symbols": [{
                                            "s": "FOREXCOM:SPXUSD",
                                            "d": "S&P 500"
                                        },
                                        {
                                            "s": "FOREXCOM:NSXUSD",
                                            "d": "Nasdaq 100"
                                        },
                                        {
                                            "s": "FOREXCOM:DJI",
                                            "d": "Dow 30"
                                        },
                                        {
                                            "s": "INDEX:NKY",
                                            "d": "Nikkei 225"
                                        },
                                        {
                                            "s": "INDEX:DEU30",
                                            "d": "DAX Index"
                                        },
                                        {
                                            "s": "FOREXCOM:UKXGBP",
                                            "d": "FTSE 100"
                                        }
                                    ],
                                    "originalTitle": "Indices"
                                },
                                {
                                    "title": "Commodities",
                                    "symbols": [{
                                            "s": "CME_MINI:ES1!",
                                            "d": "S&P 500"
                                        },
                                        {
                                            "s": "CME:6E1!",
                                            "d": "Euro"
                                        },
                                        {
                                            "s": "COMEX:GC1!",
                                            "d": "Gold"
                                        },
                                        {
                                            "s": "NYMEX:CL1!",
                                            "d": "Crude Oil"
                                        },
                                        {
                                            "s": "NYMEX:NG1!",
                                            "d": "Natural Gas"
                                        },
                                        {
                                            "s": "CBOT:ZC1!",
                                            "d": "Corn"
                                        }
                                    ],
                                    "originalTitle": "Commodities"
                                },
                                {
                                    "title": "Bonds",
                                    "symbols": [{
                                            "s": "CME:GE1!",
                                            "d": "Eurodollar"
                                        },
                                        {
                                            "s": "CBOT:ZB1!",
                                            "d": "T-Bond"
                                        },
                                        {
                                            "s": "CBOT:UB1!",
                                            "d": "Ultra T-Bond"
                                        },
                                        {
                                            "s": "EUREX:FGBL1!",
                                            "d": "Euro Bund"
                                        },
                                        {
                                            "s": "EUREX:FBTP1!",
                                            "d": "Euro BTP"
                                        },
                                        {
                                            "s": "EUREX:FGBM1!",
                                            "d": "Euro BOBL"
                                        }
                                    ],
                                    "originalTitle": "Bonds"
                                },
                                {
                                    "title": "Forex",
                                    "symbols": [{
                                            "s": "FX:EURUSD"
                                        },
                                        {
                                            "s": "FX:GBPUSD"
                                        },
                                        {
                                            "s": "FX:USDJPY"
                                        },
                                        {
                                            "s": "FX:USDCHF"
                                        },
                                        {
                                            "s": "FX:AUDUSD"
                                        },
                                        {
                                            "s": "FX:USDCAD"
                                        }
                                    ],
                                    "originalTitle": "Forex"
                                },
                                {
                                    "title": "Crypto",
                                    "symbols": [{
                                            "s": "BITBAY:BTCUSD"
                                        },
                                        {
                                            "s": "KRAKEN:ETHUSD"
                                        },
                                        {
                                            "s": "BITFINEX:BSVUSD"
                                        },
                                        {
                                            "s": "BITFINEX:TRXUSD"
                                        }
                                    ]
                                }
                            ]
                        }
                    </script>
                </div>
                <br>
                <!-- TradingView Widget END -->
                <div class="account_ctn_Right_Part1 ">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container ">
                        <iframe scrolling="no " allowtransparency="true " frameborder="0 " src="https://s.tradingview.com/embed-widget/forex-cross-rates/?locale=en#%7B%22width%22%3A620%2C%22height%22%3A400%2C%22currencies%22%3A%5B%22EUR%22%2C%22USD%22%2C%22JPY%22%2C%22GBP%22%2C%22CHF%22%2C%22AUD%22%2C%22CAD%22%2C%22NZD%22%2C%22CNY%22%5D%2C%22isTransparent%22%3Afalse%2C%22colorTheme%22%3A%22light%22%2C%22utm_source%22%3A%22elitetrustmarket.com%22%2C%22utm_medium%22%3A%22widget_new%22%2C%22utm_campaign%22%3A%22forex-cross-rates%22%7D " style="box-sizing: border-box; height: calc(368px); width: 100%; "></iframe>
                        <div class="tradingview-widget-copyright "></div>

                    </div>
                    <!-- TradingView Widget END -->
                    <br>
                </div>
                

<!-- profit calculator section start -->
<section class="pt-120 pb-120">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="section-header text-center">
          <h2 class="section-title"><span class="font-weight-normal">Profit</span> <b class="base--color">Calculator</b></h2>
          <p>You must know the calculation before investing in any plan, so you never make mistakes. Check the calculation and you will get as our calculator says.</p>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-xl-8">
        <div class="profit-calculator-wrapper">
          <form id="cal" class="profit-calculator">
            <div class="row mb-none-30">
              <div class="col-lg-6 mb-30">
                <label>Choose Plan</label>
                <select id="plans" class="base--bg">
                  <option>Starter Plan</option>
                  <option>GOLD PLAN</option>
                  <option>PREMIUM PLAN</option>
                  <option>PLATINUM PLAN</option>
                  <option>EXLUSIVE VIP PLAN</option>
                  <option>ANTMINER D3</option>
                  <option>DRAGONMINTER T16</option>
                  <option>PAGOLIN MINER M3X</option>
                  <option>AVALONMINER 741</option>
                </select>
              </div>
              <div class="col-lg-6 mb-30">
                <label>Invest Amount</label>
                <input type="number" id="madert" name="invest_amount" id="invest_amount" placeholder="0.00" class="total_amount form-control base--bg">
              </div>
              <div class="col-lg-12 mb-30">
                <label>Profit Amount</label>
                <input type="text" name="profit_amount" id="profit_amount" placeholder="0.00" class="form-control base--bg" disabled>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- profit calculator section end -->
<style>
  input[type=number]::-webkit-inner-spin-button,
  input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
  }
</style>

<script>
  $('.total_amount').val();
  $('#plans').val();
  $('#madert').keyup(function() {


    //for starter plan
    $('.total_amount').val() >= 1000 && $('#plans').val() == "Starter Plan" && Starter_Plan($('.total_amount').val());

    //for Professional Plan
    $('.total_amount').val() >= 10000 && $('#plans').val() == "GOLD PLAN" && Professional_Plan($('.total_amount').val());

    //for Enterprise Plan
    $('.total_amount').val() >= 50000 && $('#plans').val() == "PREMIUM PLAN" && Enterprise_Plan($('.total_amount').val());

    //for Compounding Mode
    $('.total_amount').val() >= 100000 && $('#plans').val() == "PLATINUM PLAN" && Compounding_Mode($('.total_amount').val());

    //for Compounding Mode 1
    $('.total_amount').val() >= 500000 && $('#plans').val() == "EXLUSIVE VIP PLAN" && Compounding_Mode_1($('.total_amount').val());


    $('.total_amount').val() <= 99 && $('#profit_amount').attr("placeholder", "0.00");;

    ///for mininfg plans
    //for starter plan
    $('.total_amount').val() >= 100 && $('#plans').val() == "ANTMINER D3" && ANTMINER($('.total_amount').val());

    //for Professional Plan
    $('.total_amount').val() >= 20000 && $('#plans').val() == "PAGOLIN MINER M3X" && PAGOLIN($('.total_amount').val());

    //for Enterprise Plan
    $('.total_amount').val() >= 1000 && $('#plans').val() == "DRAGONMINTER T16" && DRAGONMINTER($('.total_amount').val());

    //for Compounding Mode
    $('.total_amount').val() >= 50000 && $('#plans').val() == "AVALONMINER 741" && AVALONMINER($('.total_amount').val());


  });

  function Compounding_Mode_1(amount) {
    let percentage = 10;
    let amount_with_percentage = (percentage / 100) * amount;
    $('#profit_amount').attr("placeholder", amount_with_percentage * 14);
  }

  function Compounding_Mode(amount) {
    let percentage = 8;
    let amount_with_percentage = (percentage / 100) * amount;
    $('#profit_amount').attr("placeholder", amount_with_percentage * 30);
  }

  function Enterprise_Plan(amount) {
    let percentage = 7;
    let amount_with_percentage = (percentage / 100) * amount;
    $('#profit_amount').attr("placeholder", amount_with_percentage * 10);
  }

  function Professional_Plan(amount) {
    let percentage = 5.5;
    let amount_with_percentage = (percentage / 100) * amount;
    $('#profit_amount').attr("placeholder", amount_with_percentage * 7);
  }

  function Starter_Plan(amount) {
    let percentage = 5;
    let amount_with_percentage = (percentage / 100) * amount;
    $('#profit_amount').attr("placeholder", amount_with_percentage * 3);
  }

  function AVALONMINER(amount) {
    let percentage = 10;
    let amount_with_percentage = (percentage / 100) * amount;
    $('#profit_amount').attr("placeholder", amount_with_percentage * 28);
  }

  function PAGOLIN(amount) {
    let percentage = 7;
    let amount_with_percentage = (percentage / 100) * amount;
    $('#profit_amount').attr("placeholder", amount_with_percentage * 21);
  }

  function DRAGONMINTER(amount) {
    let percentage = 5.5;
    let amount_with_percentage = (percentage / 100) * amount;
    $('#profit_amount').attr("placeholder", amount_with_percentage * 14);
  }

  function ANTMINER(amount) {
    let percentage = 5;
    let amount_with_percentage = (percentage / 100) * amount;
    $('#profit_amount').attr("placeholder", amount_with_percentage * 7);
  }
</script>


            </div>
        </div>
    </div>
</div>
<!-- dashboard section end -->


<!-- converter -->



<!-- footer section start -->
<?php include "includes/login_footer.php" ?>