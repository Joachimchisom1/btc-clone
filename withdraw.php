<?php include "includes/login_header.php" ?>

<!-- header-section end  -->
<!-- inner hero start -->
<!-- inner hero start -->
<section class="inner-hero bg_img" data-background="assets/images/bg/bg-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="page-title">Profile</h2>
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">Dashboard</a>
                    </li>
                    <li>Profile</li>
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

        <div class="col-lg-4 col-md-4 mb-4">
            <div class="card card-bg">
                <h5 class="card-header text-center">ALL COIN</h5>
                <div class="card-body card-body-deposit">
                    <img src="img/60adb2de0633d1621996254.jpeg" class="card-img-top" alt="BITCOIN" style="width: 100%">
                    <ul class="text-center package-card__features mt-4">
                        <li>Limit : 100 - 10000000000 USD</li>
                        <li> Charge : 0 $</li>
                        <li>Processing time - 1 day

                        </li>
                    </ul>

                </div>
                <div class="card-footer">
                    <a class="btn btc btn-block  btn-primary w-100 withdraw" data-toggle="modal" data-target="#exampleModal">
                        Withdraw now</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 mb-4">
            <div class="card card-bg">
                <h5 class="card-header text-center">Bank Wire</h5>
                <div class="card-body card-body-deposit">
                    <img src="img/60adb3ad45c661621996461.jpg" class="card-img-top" alt="Bank Wire" style="width: 100%">

                    <ul class="text-center package-card__features mt-4">
                        <li>Limit : 100 - 10000000000 USD</li>
                        <li> Charge : 0 $</li>
                        <li>Processing time - 1 day</li>
                    </ul>

                </div>
                <div class="card-footer">
                    <a class="btn btc btn-block  btn-primary w-100 bank_withdraw" data-toggle="modal" data-target="#exampleModal">
                        Withdraw now</a>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- row end -->
<div class="row mt-50 ">
    <div class="col-lg-12 ">
        <div style="text-align: center;" class="table-responsive--md p-0 ">
            <h3>Withdrawal Request Logs</h3>
            <table class="table style--two white-space-nowrap ">
                <thead>
                    <tr>
                        <th>Transaction ID</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM withdraw_tbl WHERE (user_id = '$usename') ORDER BY id DESC";
                    $details = mysqli_query($connection, $query);
                    $count = mysqli_num_rows($details);
                    while ($row = mysqli_fetch_assoc($details)) {
                    ?>
                        <tr>
                            <td data-label="Transaction ID "><span class="base--color"><?php echo $row['transaction_id']; ?></span></td>
                            <td data-label="Date"><?php echo date('F jS, Y h:i:s A', strtotime($row['date'])); ?> </td>
                            <td data-label="Amount">$<?php echo number_format($row['amount']); ?></td>





                            <td data-label="Status "><span class="<?php
                                                                    if ($row['status'] == "Pending") {
                                                                        echo "text-warning";
                                                                    } else {
                                                                        echo "text-success";
                                                                    } ?>"><?php
                                                                            if ($row['status'] == "Pending") {
                                                                                echo $row['status'];
                                                                            } else {
                                                                                echo "Withdraw Successful";
                                                                            }
                                                                            ?></span>
                        </tr>
                    <?php }
                    if ($count == 0) {
                        echo '<td colspan="5">No Data Avialiable</td>';
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- row end -->
<br>
<script>
    $(document).on('click', '.btc', function(e) {
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

    $(document).on('click', '.bank_withdraw', function(e) {
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
                        check_bank_details();

                    }
                }
            })
        })
    });

    function check_bank_details() {
        var chhk_bk = 5;
        $.ajax({
            type: 'POST',
            url: 'includes/server.php',
            dataType: 'text',
            data: {
                chhk_bk: chhk_bk,
            },
            success: function(resp) {
                if (resp.trim() == "err") {
                    var gen = $("#gen").val();

                    Swal.fire({
                        title: 'Note',
                        text: 'Hello ' + gen +
                            'Please Update Your Bank Details to Continue This Process.',
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Update'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "bk.php";
                        }
                    })
                } else {
                    withdraw_code();
                }
            }
        });

    }
</script>






<!-- dashboard section end -->
<!-- footer section start -->
<?php include "includes/login_footer.php" ?>