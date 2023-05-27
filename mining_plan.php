<?php include "includes/login_header.php" ?>
<!-- header-section end  -->

<!-- inner hero start -->
<section class="inner-hero bg_img" data-background="assets/images/bg/bg-1.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h2 class="page-title">All Mining Plans</h2>
        <ul class="page-breadcrumb">
          <li><a href="dashboard.php">Dashboard</a></li>
          <li>Plan</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- inner hero end -->


<!-- package section start -->
<section class="pt-120 pb-120">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 text-center">
        <div class="section-header">
          <h2 class="section-title"><span class="font-weight-normal">Mining</span> <b class="base--color">Plans</b></h2>
          <p>To Start a Good Mining Project, you have to Chose a Good Mining Software to start Mining.</p>
        </div>
      </div>
    </div><!-- row end -->

    <div class="row justify-content-center mb-none-30">
      <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
        <div class="package-card text-center bg_img" data-background="assets/images/bg/bg-4.png">
          <h4 class="package-card__title base--color mb-2">5% DAILY FOR 7 DAYS</h4>
          <div class="package-card__range mt-5 base--color">ANTMINER D3</div>
          <ul class="package-card__features mt-4">
            <li>Wallet - Bitcoin</li>
            <li> Encryption - SHA-256</li>
            <li>Maintenance Fees - $0.00</li>
            <li> Payouts Every - day</li>
            <li>Minimum Contract - $100</li>
            <li> Maximum Contract - $999</li>
            <li><i class="fa fa-comments" aria-hidden="true"></i> 24/7 Customer Support</li>
          </ul>
          <a href="deposit.php?mining=ANTMINER" class="cmn-btn btn-md mt-4">Start Mining Now</a>
        </div><!-- package-card end -->
      </div>
      <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
      <div class="package-card text-center bg_img" data-background="assets/images/bg/bg-4.png">
          <h4 class="package-card__title base--color mb-2">5.5% DAILY FOR 14 DAYS</h4>
          <div class="package-card__range mt-5 base--color">DRAGONMINTER T16</div>
          <ul class="package-card__features mt-4">
            <li>Wallet - Bitcoin</li>
            <li> Encryption - SHA-256</li>
            <li>Maintenance Fees - $0.00</li>
            <li> Payouts Every - day</li>
            <li>Minimum Contract - $1,000</li>
            <li> Maximum Contract - $19,999</li>
            <li><i class="fa fa-comments" aria-hidden="true"></i> 24/7 Customer Support</li>
          </ul>
          <a href="deposit.php?mining=DRAGONMINTER" class="cmn-btn btn-md mt-4">Start Mining Now</a>
        </div><!-- package-card end -->
      </div>
      <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
      <div class="package-card text-center bg_img" data-background="assets/images/bg/bg-4.png">
          <h4 class="package-card__title base--color mb-2">7% DAILY FOR 21 DAYS</h4>
          <div class="package-card__range mt-5 base--color">PAGOLIN MINER M3X</div>
          <ul class="package-card__features mt-4">
            <li>Wallet - Bitcoin</li>
            <li> Encryption - SHA-256</li>
            <li>Maintenance Fees - $0.00</li>
            <li> Payouts Every - day</li>
            <li>Minimum Contract - $20,000</li>
            <li> Maximum Contract - $49,999</li>
            <li><i class="fa fa-comments" aria-hidden="true"></i> 24/7 Customer Support</li>
          </ul>
          <a href="deposit.php?mining=PAGOLINMINER" class="cmn-btn btn-md mt-4">Start Mining Now</a>
        </div><!-- package-card end -->
      </div>
      <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
      <div class="package-card text-center bg_img" data-background="assets/images/bg/bg-4.png">
          <h4 class="package-card__title base--color mb-2">10% DAILY FOR 28 DAYS</h4>
          <div class="package-card__range mt-5 base--color">AVALONMINER 741</div>
          <ul class="package-card__features mt-4">
            <li>Wallet - Bitcoin</li>
            <li> Encryption - SHA-256</li>
            <li>Maintenance Fees - $0.00</li>
            <li> Payouts Every - day</li>
            <li>Minimum Contract - $50,000</li>
            <li> Maximum Contract - Unlimited</li>
            <li><i class="fa fa-comments" aria-hidden="true"></i> 24/7 Customer Support</li>
          </ul>
          <a href="deposit.php?mining=AVALONMINER" class="cmn-btn btn-md mt-4">Start Mining Now</a>
        </div><!-- package-card end -->
      </div>
    </div>
    <!-- row end -->
  </div>
</section>
<!-- package section end  -->


<script>
  ///check balance for compounding_mode plan fuction----------------------------------------
  $(document).ready(function() {
    $(document).on('click', '#compounding_mode', function() {
      var compounding_mode1 = "compounding_mode1";
      $.ajax({
        type: 'POST',
        url: 'includes/server.php',
        dataType: 'text',
        data: {
          compounding_mode1: compounding_mode1
        },
        success: function(response) {
          //  alert(response);
          if (response.trim() == "err") {
            Swal.fire(
              'Insufficient Deposite Balance!',
              '',
              'error'
            )
          } else {
            compounding_mode();
          }
        }
      });
    });
  });

  //fuctions that submits compounding_mode plan to the database for invest-------------------------------
  function compounding_mode(res1) {
    let int_acctbal_display = "int_acctbal_display";
    $.ajax({
      type: 'POST',
      url: 'includes/server.php',
      dataType: 'text',
      data: {
        int_acctbal_display: int_acctbal_display
      },
      success: function(res1) {
        (async () => {
          const {
            value: amount,
          } = await Swal.fire({
            title: 'Enter Amount',
            input: 'number',
            inputLabel: `Enter The Amount You Will Like to Invest`,
            html: `Deposite Balance ${res1}`,
            showCancelButton: true,
            inputValidator: (value) => {
              if (!value) {
                return 'You need to Specify a Value!'
              }
            }
          })
          if (amount) {
            if (amount < 15000) {
              Swal.fire(
                'The Minimum Amount to Invest For Compounding Mode is $15,000!',
                '',
                'error'
              ).then(function() {
                compounding_mode();
              })
            } else {
              var compounding_mode_submit = "compounding_mode_submit";
              $.ajax({
                type: 'POST',
                url: 'includes/server.php',
                dataType: 'text',
                data: {
                  compounding_mode_submit: compounding_mode_submit,
                  amount: amount
                },
                success: function(resp) {
                  if (resp.trim() == "Insufficient Balance") {
                    Swal.fire(
                      'Insufficient Balance!',
                      '',
                      'error'
                    ).then(function() {
                      submitplan();
                    })
                  } else {
                    Swal.fire({
                      icon: 'success',
                      title: 'Success',
                      text: 'Invested Successfully!',
                      footer: '<a href="active_investment.php">View Active investments</a>'
                    })
                  }
                }
              });
            }
          }
        })()
      }
    });
  }

  ///basic plan fuction----------------------------------------
  $(document).ready(function() {
    $(document).on('click', '#basic_plan', function() {
      var basic_plan = "basic_plan";
      $.ajax({
        type: 'POST',
        url: 'includes/server.php',
        dataType: 'text',
        data: {
          basic_plan: basic_plan
        },
        success: function(response) {
          //  alert(response);
          if (response.trim() == "err") {
            Swal.fire(
              'Insufficient Deposite Balance!',
              '',
              'error'
            )
          } else {
            submitplan();
          }
        }
      });
    });
  });

  //fuctions that submits basic plan to the database for invest-------------------------------
  function submitplan(res1) {
    let int_acctbal_display = "int_acctbal_display";
    $.ajax({
      type: 'POST',
      url: 'includes/server.php',
      dataType: 'text',
      data: {
        int_acctbal_display: int_acctbal_display
      },
      success: function(res1) {
        (async () => {
          const {
            value: amount,
          } = await Swal.fire({
            title: 'Enter Amount',
            input: 'number',
            inputLabel: `Enter The Amount You Will Like to Invest`,
            html: `Deposit Balance $${res1}`,
            showCancelButton: true,
            inputValidator: (value) => {
              if (!value) {
                return 'You need to Specify a Value!'
              }
            }
          })
          if (amount) {
            if (amount < 100) {
              Swal.fire(
                'The Minimum Amount to Invest For This Plan is $100!',
                '',
                'error'
              ).then(function() {
                submitplan();
              })
            } else {
              var basic_plan_submit = "basic_plan_submit";
              $.ajax({
                type: 'POST',
                url: 'includes/server.php',
                dataType: 'text',
                data: {
                  basic_plan_submit: basic_plan_submit,
                  amount: amount
                },
                success: function(resp) {
                  if (resp.trim() == "Insufficient Balance") {
                    Swal.fire(
                      'Insufficient Balance!',
                      '',
                      'error'
                    ).then(function() {
                      submitplan();
                    })
                  } else {
                    Swal.fire({
                      icon: 'success',
                      title: 'Success',
                      text: 'Invested Successfully!',
                      footer: '<a href="active_investment.php">View Active investments</a>'
                    })
                  }
                }
              });
            }
          }
        })()
      }
    });
  }

  ///Silver plan fuction----------------------------------------------------------------
  $(document).ready(function() {
    $(document).on('click', '#silver_plan_button', function() {
      var silver_plan = "silver_plan";
      $.ajax({
        type: 'POST',
        url: 'includes/server.php',
        dataType: 'text',
        data: {
          silver_plan: silver_plan
        },
        success: function(response) {
          //  alert(response);
          if (response.trim() == "err") {
            Swal.fire(
              'Insufficient Deposite Balance!',
              '',
              'error'
            )
          } else {
            submitsilverplan();
          }
        }
      });
    });
  });

  ///fuctions that submits silver plan to the database for invest-------------------------------
  function submitsilverplan() {
    let int_acctbal_display = "int_acctbal_display";
    $.ajax({
      type: 'POST',
      url: 'includes/server.php',
      dataType: 'text',
      data: {
        int_acctbal_display: int_acctbal_display
      },
      success: function(res1) {

        (async () => {
          const {
            value: amount
          } = await Swal.fire({
            title: 'Enter Amount',
            input: 'number',
            inputLabel: 'Enter The Amount You Will Like to Invest',
            html: `Deposit Balance $${res1}`,
            showCancelButton: true,
            inputValidator: (value) => {
              if (!value) {
                return 'You need to Specify a Value!'
              }
            }
          })
          if (amount) {
            if (amount < 10000) {
              Swal.fire(
                'The Minimum Amount to Invest For This is $10,000!',
                '',
                'error'
              ).then(function() {
                submitsilverplan();
              })
            } else {
              var silver_plan_submit = "silver_plan_submit";
              $.ajax({
                type: 'POST',
                url: 'includes/server.php',
                dataType: 'text',
                data: {
                  silver_plan_submit: silver_plan_submit,
                  amount: amount
                },
                success: function(resp) {
                  if (resp.trim() == "Insufficient Balance") {
                    Swal.fire(
                      'Insufficient Balance!',
                      '',
                      'error'
                    ).then(function() {
                      submitsilverplan();
                    })
                  } else {
                    Swal.fire({
                      icon: 'success',
                      title: 'Success',
                      text: 'Invested Successfully!',
                      footer: '<a href="active_investment.php">View Active investments</a>'
                    })
                  }
                }
              });
            }
          }
        })()
      }
    });
  }

  ///Gold plan fuction----------------------------------------------------------------------
  $(document).ready(function() {
    $(document).on('click', '#gold_plan', function() {
      var gold_plan = "gold_plan";
      $.ajax({
        type: 'POST',
        url: 'includes/server.php',
        dataType: 'text',
        data: {
          gold_plan: gold_plan
        },
        success: function(response) {
          // alert(response);
          if (response.trim() == "err") {
            Swal.fire(
              'Insufficient Deposite Balance!',
              '',
              'error'
            )
          } else {
            submitgoldplan();
          }
        }
      });
    });
  });

  ///fuctions that submits gold_plan to the database for invest-------------------------------
  function submitgoldplan() {
    let int_acctbal_display = "int_acctbal_display";
    $.ajax({
      type: 'POST',
      url: 'includes/server.php',
      dataType: 'text',
      data: {
        int_acctbal_display: int_acctbal_display
      },
      success: function(res1) {

        (async () => {
          const {
            value: amount
          } = await Swal.fire({
            title: 'Enter Amount',
            input: 'number',
            inputLabel: 'Enter The Amount You Will Like to Invest',
            html: `Deposit Balance $${res1}`,
            showCancelButton: true,
            inputValidator: (value) => {
              if (!value) {
                return 'You need to Specify a Value!'
              }
            }
          })
          if (amount) {
            if (amount < 50000) {
              Swal.fire(
                'The Minimum Amount to Invest For This Plan is $50,000!',
                '',
                'error'
              ).then(function() {
                submitgoldplan();
              })
            } else {
              var gold_plan_submit = "gold_plan_submit";
              $.ajax({
                type: 'POST',
                url: 'includes/server.php',
                dataType: 'text',
                data: {
                  gold_plan_submit: gold_plan_submit,
                  amount: amount
                },
                success: function(resp) {
                  if (resp.trim() == "Insufficient Balance") {
                    Swal.fire(
                      'Insufficient Balance!',
                      '',
                      'error'
                    ).then(function() {
                      submitgoldplan();
                    })
                  } else {
                    Swal.fire({
                      icon: 'success',
                      title: 'Success',
                      text: 'Invested Successfully!',
                      footer: '<a href="active_investment.php">View Active investments</a>'
                    })
                  }
                }
              });
            }
          }
        })()
      }
    });
  }

  ///Platinum plan fuction----------------------------------------------------------------------
  $(document).ready(function() {
    $(document).on('click', '#platinum_plan_button', function() {
      var platinum_plan = "platinum_plan";
      $.ajax({
        type: 'POST',
        url: 'includes/server.php',
        dataType: 'text',
        data: {
          platinum_plan: platinum_plan
        },
        success: function(response) {
          //   alert(response);
          if (response.trim() == "err") {
            Swal.fire(
              'Insufficient Deposite Balance!',
              '',
              'error'
            )
          } else {
            submitplatinumplan();
          }
        }
      });
    });
  });

  ///fuctions that submits platinum_plan to the database for invest-------------------------------
  function submitplatinumplan() {
    let int_acctbal_display = "int_acctbal_display";
    $.ajax({
      type: 'POST',
      url: 'includes/server.php',
      dataType: 'text',
      data: {
        int_acctbal_display: int_acctbal_display
      },
      success: function(res1) {

        (async () => {
          const {
            value: amount
          } = await Swal.fire({
            title: 'Enter Amount',
            input: 'number',
            inputLabel: 'Enter The Amount You Will Like to Invest',
            html: `Deposit Balance $${res1}`,
            showCancelButton: true,
            inputValidator: (value) => {
              if (!value) {
                return 'You need to Specify a Value!'
              }
            }
          })
          if (amount) {
            if (amount < 5000) {
              Swal.fire(
                'The Minimum Amount to Invest For This Plan is $5,000!',
                '',
                'error'
              ).then(function() {
                submitplatinumplan();
              })
            } else {
              var platinum_plan_submit = "platinum_plan_submit";
              $.ajax({
                type: 'POST',
                url: 'includes/server.php',
                dataType: 'text',
                data: {
                  platinum_plan_submit: platinum_plan_submit,
                  amount: amount
                },
                success: function(resp) {
                  if (resp.trim() == "Insufficient Balance") {
                    Swal.fire(
                      'Insufficient Balance!',
                      '',
                      'error'
                    ).then(function() {
                      submitplatinumplan();
                    })
                  } else {
                    Swal.fire({
                      icon: 'success',
                      title: 'Success',
                      text: 'Invested Successfully!',
                      footer: '<a href="active_investment.php">View Active investments</a>'
                    })
                  }
                }
              });
            }
          }
        })()
      }
    });
  }
</script>



<!-- footer section start -->
<?php include "includes/login_footer.php" ?>