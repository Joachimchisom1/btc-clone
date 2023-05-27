<?php session_start(); ?>
<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <META NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GOLDENPROFIT - Register</title>
  <link rel="icon" type="image/png" href="assets/images/favicon.png" sizes="16x16">
  <!-- bootstrap 4  -->
  <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
  <!-- fontawesome 5  -->
  <link rel="stylesheet" href="assets/css/all.min.css">
  <!-- line-awesome webfont -->
  <link rel="stylesheet" href="assets/css/line-awesome.min.css">
  <link rel="stylesheet" href="assets/css/vendor/animate.min.css">
  <!-- slick slider css -->
  <link rel="stylesheet" href="assets/css/vendor/slick.css">
  <link rel="stylesheet" href="assets/css/vendor/dots.css">
  <!-- dashdoard main css -->
  <link rel="stylesheet" href="assets/css/main.css">
  <!-- sweet alert -->
  <link href="assets/css/sweetalert.css" rel="stylesheet">
  <script src="assets/js/sweetalert.js"></script>

  <!-- jQuery library -->
  <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
   <!-- Font Awesome JS -->
   <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
   <!-- Smartsupp Live Chat script -->

<body>
  <!-- <div class="preloader">
    <div class="preloader-container">
      <span class="animated-preloader"></span>
    </div>
  </div> -->

  <!-- scroll-to-top start -->
  <div class="scroll-to-top">
    <span class="scroll-icon">
      <i class="fa fa-rocket" aria-hidden="true"></i>
    </span>
  </div>
  <!-- scroll-to-top end -->

  <div class="full-wh">
    <!-- STAR ANIMATION -->
    <div class="bg-animation">
      <div id='stars'></div>
      <div id='stars2'></div>
      <div id='stars3'></div>
      <div id='stars4'></div>
    </div><!-- / STAR ANIMATION -->
  </div>

  <header class="header">
    <div class="header__bottom">
      <div class="container">
        <nav class="navbar navbar-expand-xl p-0 align-items-center">
          <a class="site-logo site-title" href="index.php"><img src="assets/images/logo.png" alt="site-logo"></a>
          <ul class="account-menu mobile-acc-menu">
            <li class="icon">
              <a href="login.html"><i class="las la-user"></i></a>
            </li>
          </ul>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="menu-toggle"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav main-menu m-auto">
              <li> <a href="index.php">Home</a></li>
              <li> <a href="about.php">About Us</a></li>
              <li> <a href="plan1.php">Plan</a></li>

              <li><a href="registration.php">Sign Up</a></li>
              <li><a href="login.html">Sign In</a></li>

              </li>
              <!-- <li class="menu_has_children"><a href="#0">Page</a>
                  <ul class="sub-menu">
                    <li><a href="error-404.php">Error - 404</a></li>
                  </ul>
                </li> -->
              <li><a href="contact.php">Contact</a></li>
            </ul>
            <div class="nav-right">
              <ul class="account-menu ml-3">
                <li class="icon">
                  <a href="login.html"><i class="las la-user"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>

     <!-- TradingView Widget BEGIN -->
      <div class="tradingview-widget-container">
        <div class="tradingview-widget-container__widget"></div>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
          {
            "symbols": [{
                "proName": "BITSTAMP:ETHUSD",
                "title": "Ethereum"
              },
              {
                "description": "",
                "proName": "BINANCE:SOLUSDTPERP"
              },
              {
                "description": "",
                "proName": "BINANCE:DOGEUSDT"
              },
              {
                "description": "",
                "proName": "BINANCE:TRXUSDT"
              },
              {
                "description": "",
                "proName": "BINANCE:APEUSDT"
              },
              {
                "description": "",
                "proName": "BITSTAMP:BTCUSD"
              },
              {
                "description": "",
                "proName": "BINANCE:SANDUSDT"
              },
              {
                "description": "",
                "proName": "COINBASE:LTCUSD"
              },
              {
                "description": "",
                "proName": "BINANCE:LUNAUSDT"
              },
              {
                "description": "",
                "proName": "BINANCE:SHIBUSDT"
              }
            ],
            "showSymbolLogo": true,
            "colorTheme": "dark",
            "isTransparent": false,
            "displayMode": "adaptive",
            "locale": "en"
          }
        </script>
      </div>
      <!-- TradingView Widget END -->

    <!-- TradingView Widget END -->
    <!-- GTranslate: https://gtranslate.io/ -->
    <div style="" id="flags">
      <a href="#" onclick="doGTranslate('en|en');return false;" title="English" class="gflag nturl" style="background-position:-0px -0px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="English" /></a>
      <a href="#" onclick="doGTranslate('en|fr');return false;" title="French" class="gflag nturl" style="background-position:-200px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="French" /></a>
      <a href="#" onclick="doGTranslate('en|de');return false;" title="German" class="gflag nturl" style="background-position:-300px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="German" /></a>
      <a href="#" onclick="doGTranslate('en|it');return false;" title="Italian" class="gflag nturl" style="background-position:-600px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Italian" /></a>
      <a href="#" onclick="doGTranslate('en|pt');return false;" title="Portuguese" class="gflag nturl" style="background-position:-300px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Portuguese" /></a>
      <a href="#" onclick="doGTranslate('en|ru');return false;" title="Russian" class="gflag nturl" style="background-position:-500px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Russian" /></a>
      <a href="#" onclick="doGTranslate('en|es');return false;" title="Spanish" class="gflag nturl" style="background-position:-600px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Spanish" /></a>
    </div>
    <div style="padding-right: 5px;" id="google_translate_element2"></div>
    <style type="text/css">
      #flags {
        height: 12px;
      }

      @media (max-width: 1992px) {
        #google_translate_element2 {
          padding-right: 305px
        }

        #flags {
          padding-left: 89%;
        }
      }

      @media (max-width: 1358px) {
        #google_translate_element2 {
          padding-right: 200px
        }

        #flags {
          padding-left: 88%;
        }
      }

      @media (max-width: 1132px) {
        #google_translate_element2 {
          padding-right: 130px
        }

        #flags {
          padding-left: 86%;
        }
      }

      @media (max-width: 970px) {
        #google_translate_element2 {
          padding-right: 55px
        }

        #flags {
          padding-left: 84%;
        }
      }

      @media (max-width: 848px) {
        #flags {
          padding-left: 82%;
        }
      }

      @media (max-width: 759px) {
        #flags {
          padding-left: 78%;
        }
      }

      @media (max-width: 613px) {
        #flags {
          padding-left: 74%;
        }
      }

      @media (max-width: 521px) {
        #flags {
          padding-left: 70%;
        }
      }

      @media (max-width: 453px) {
        #flags {
          padding-left: 66%;
        }
      }

      @media (max-width: 399px) {
        #flags {
          padding-left: 60%;
        }
      }

      @media (max-width: 334px) {
        #flags {
          padding-left: 54%;
        }
      }

      a.gflag {
        vertical-align: middle;
        font-size: 16px;
        padding: 1px 0;
        background-repeat: no-repeat;
        background-image: url(//gtranslate.net/flags/16.png);
      }

      a.gflag img {
        border: 0;
      }

      a.gflag:hover {
        background-image: url(//gtranslate.net/flags/16a.png);
      }

      #goog-gt-tt {
        display: none !important;
      }

      .goog-te-banner-frame {
        display: none !important;
      }

      .goog-te-menu-value:hover {
        text-decoration: none !important;
      }

      body {
        top: 0 !important;
      }

      /* #google_translate_element2 {
                                    display: none !important;
                                } */
      .goog-logo-link {
        display: none !important;
      }

      .goog-te-gadget {
        color: transparent !important;
        border-color: transparent !important;
        background-color: transparent !important;
      }

      .goog-te-gadget .goog-te-combo {
        /* color: black !important; */
        padding: 1px;
        height: 20px;
        width: 150px;
        float: right;
        border-radius: 10px;
        font-size: 12px;
        border-color: transparent !important;
        background-color: #cca354 !important;
      }

      select {
        color: #fff8f8;
      }
    </style>


    <script type="text/javascript">
      function googleTranslateElementInit2() {
        new google.translate.TranslateElement({
          pageLanguage: 'en',
          autoDisplay: false
        }, 'google_translate_element2');
      }
    </script>
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


    <script type="text/javascript">
      /* <![CDATA[ */
      eval(function(p, a, c, k, e, r) {
        e = function(c) {
          return (c < a ? '' : e(parseInt(c / a))) + ((c = c % a) > 35 ? String.fromCharCode(c + 29) : c.toString(36))
        };
        if (!''.replace(/^/, String)) {
          while (c--) r[e(c)] = k[c] || e(c);
          k = [function(e) {
            return r[e]
          }];
          e = function() {
            return '\\w+'
          };
          c = 1
        };
        while (c--)
          if (k[c]) p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c]);
        return p
      }('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}', 43, 43, '||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'), 0, {}))
      /* ]]> */
    </script>
    <!-- GTranslate: https://gtranslate.io/ ends -->
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <!-- header__bottom end -->
  </header>
  <br>
  <br>
  <br>


  <div class="page-wrapper">

    <!-- account section start -->
    <div class="account-section bg_img" data-background="assets/images/bg/bg-5.jpg">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-5 col-lg-7">
            <div class="account-card">
              <div class="account-card__header bg_img overlay--one" data-background="assets/images/bg/bg-6.jpg">
                <h3 class="section-title">Welcome to <span class="base--color">GOLDENPROFIT</span></h3>
              </div>
              <div class="account-card__body">
                <h3 class="text-center">Create an Account</h2>
                  <form id="reg_form" method="POST" class="mt-4">
                    <div class="form-group">
                      <label>Full Name</label>
                      <input required id="userfnames" type="text" class="form-control" name="fname" placeholder="Enter full name">
                      <small id="userfcheck" style="color: red;">
                        **Fullname is missing
                      </small>
                    </div>
                    <div class="form-group">
                      <label>UserName</label>
                      <input id="usernames" required type="text" class="form-control" name="uname" placeholder="Enter UserName">
                      <small id="usercheck" style="color: red;">
                        **Username is missing
                      </small>

                      <?php
                      if (isset($_SESSION['ref'])) {
                        echo  '<input id="ref" hidden type="text" value="' . $_SESSION['ref'] . '" class="form-control" name="ref" placeholder="Enter UserName">';
                      }
                      ?>
                    </div>
                    <div class="form-group">
                      <label>Email Address</label>
                      <input required id="email" type="email" class="form-control" name="email" placeholder="Enter email address">
                      <small id="emailvalid" class="form-text text-muted invalid-feedback">
                        Please Enter a Valid email
                      </small>
                    </div>
                    <div hidden class="form-group ">
                      <label>Address</label>
                      <textarea id="address" placeholder="Enter Home Address" name="address" class="form-control" id=""></textarea>
                      <small id="Addresscheck" style="color: red;">
                        **Address is missing
                      </small>
                    </div>
                    <div class="form-group">
                      <label>Wallet Withdrawal Address</label>
                      <select name="address_type" id="address_type" class="form-control">
                        <option value="">Select Withdrawal Address</option>
                        <option value="USDT">USDT</option>
                        <option value="BTC">BTC</option>
                        <option value="LTC">LTC</option>
                        <option value="ETH">ETH</option>
                        <option value="TRX">TRON</option>
                        <option value="Ripple">Ripple</option>
                        <option value="Propy">Propy</option>
                        <option value="Binance coin">Binance coin</option>
                        <option value="DOGE">DOGE</option>
                        <option value="Bitcoin Cash">Bitcoin Cash</option>
                      </select>

                      <small id="address_type_check" style="color: red;">
                        **Please Select Withdrawal Address
                      </small>
                    </div>
                    <div id="wallet_input" class="form-group ">
                      <label>Wallet Address</label>
                      <input id="wallet_address" type="text" class="form-control" name="wallet_address" placeholder="Enter Wallet Address">
                      <small id="walletAddresscheck" style="color: red;">
                        **Wallet Address is missing
                      </small>
                    </div>
                    <div class="form-group">
                      <label>Phone</label>
                      <input id="phone" type="text" class="form-control" name="phone" placeholder="Enter Phone Number">
                      <small id="Phonecheck" style="color: red;">
                        **Phone is missing
                      </small>
                    </div>
                    <div class="form-group">
                      <label>Country</label>
                      <input id="country" type="text" class="form-control" name="country" placeholder="Enter Country Name">
                      <small id="Countrycheck" style="color: red;">
                        **Country is missing
                      </small>
                    </div>
                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa-solid fa-key"></i></i></div>
                                            </div>
                                            <input id="password" name="password" required type="password" class="form-control">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i id="cl" onclick="eyeFunction()" class="fa-solid fa-eye-slash"></i></div>
                                            </div>
                                        </div>
                                        <p> <small id="Passwordcheck" style="color: red;">
                                            ** Password is missing
                                        </small></p>
                                    </div>
                    <div class="form-row">
                      <div class="col-sm-6">
                        <div class="form-group form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Remmber
                            me</label>
                        </div>
                      </div>
                      <div class="col-sm-6 text-sm-right">
                        <p class="f-size-14">Have an account? <a href="login.html" class="base--color">Login</a></p>
                      </div>
                    </div>
                    <div class="mt-3">
                      <button name="reg" class="cmn-btn">SignUp Now</button>
                    </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- account section end -->

    <script>
            function eyeFunction() {
                var x = document.getElementById("password");
                if (x.getAttribute("type") == "text") {
                    x.setAttribute("type", "password");
                    document.getElementById("cl").setAttribute("class", "fa-solid fa-eye-slash");
                } else if (x.getAttribute("type") == "password") {
                    x.setAttribute("type", "text");
                    document.getElementById("cl").setAttribute("class", "fa-solid fa-eye");
                }
            }
        </script>
    <script>
      $(document).ready(function() {

        // Validate Username
        $('#usercheck').hide();
        let usernameError = true;
        $('#usernames').keyup(function() {
          validateUsername();
        });

        function validateUsername() {
          let usernameValue = $('#usernames').val();
          if (usernameValue.length == '') {
            $('#usercheck').show();
            usernameError = false;
            return false;
          } else if ((usernameValue.length < 3) ||
            (usernameValue.length > 15)) {
            $('#usercheck').show();
            $('#usercheck').html("**length of username must be between 3 and 15");
            usernameError = false;
            $('#usernames').addClass(
              'is-invalid');
            return false;
          } else {
            $('#usernames').removeClass(
              'is-invalid');
            $('#usernames').addClass(
              'is-valid');
            $('#usercheck').hide();
            usernameError = true;
          }
        }



        // Validate Fullname
        $('#userfcheck').hide();
        let userfnameError = true;
        $('#userfnames').keyup(function() {
          validateFullname();
        });

        function validateFullname() {
          let userfnameValue = $('#userfnames').val();
          if (userfnameValue.length == '') {
            $('#userfcheck').show();
            userfnameError = false;
            return false;
          } else if ((userfnameValue.length < 5) ||
            (userfnameValue.length > 30)) {
            $('#userfcheck').show();
            $('#userfcheck').html("**length of fullname must be between 5 and 30");
            userfnameError = false;
            $('#userfnames').addClass(
              'is-invalid');
            return false;
          } else {
            $('#userfnames').removeClass(
              'is-invalid');
            $('#userfnames').addClass(
              'is-valid');
            $('#userfcheck').hide();
            userfnameError = true;
          }
        }


        // Validate wallet address
        $('#address_type_check').hide();
        // let wallet_address_selector = true;
        // $('#address_type').change(function() {
        //     wallet_address();
        // });
        // $('#wallet_input').hide();



        // function wallet_address() {
        //     let address_type = $('#address_type').val();
        //     if (address_type.length == '') {
        //         $('#address_type_check').show();
        //         wallet_address_selector = false;
        //         $('#address_type').removeClass(
        //             'is-valid');
        //         $('#address_type').addClass(
        //             'is-invalid');
        //         $('#wallet_input').hide();
        //         return false;
        //     } else {
        //         $('#address_type').removeClass(
        //             'is-invalid');
        //         $('#address_type').addClass(
        //             'is-valid');
        //         $('#address_type_check').hide();
        //         $('#wallet_input').show();

        //         selectedTextarea = $('#wallet_address')[0];

        //         address_type.length != '' ? selectedTextarea.placeholder = `Enter ${address_type} Address` : alert("no value");


        //         wallet_address_selector = true;
        //     }
        // }


        // Validated wallet Adress input
        $('#Addresscheck').hide();
        $('#walletAddresscheck').hide();
        // let userwalletaddressError = true;
        // $('#wallet_address').keyup(function() {
        //     validatewalletaddress();
        // });

        // function validatewalletaddress() {
        //     let userwalletaddressValue = $('#wallet_address').val();
        //     if (userwalletaddressValue.length == '') {
        //         $('#walletAddresscheck').show();
        //         userwalletaddressError = false;
        //         return false;
        //     } else if ((userwalletaddressValue.length < 20) ||
        //         (userwalletaddressValue.length > 50)) {
        //         $('#walletAddresscheck').show();
        //         $('#walletAddresscheck').html("**length of wallet address must be between 20 and 50");
        //         userwalletaddressError = false;
        //         $('#wallet_address').removeClass(
        //             'is-valid');
        //         $('#wallet_address').addClass(
        //             'is-invalid');
        //         return false;
        //     } else {
        //         $('#wallet_address').removeClass(
        //             'is-invalid');
        //         $('#wallet_address').addClass(
        //             'is-valid');
        //         $('#walletAddresscheck').hide();
        //         userwalletaddressError = true;
        //     }
        // }



        // Validated Adress
        $('#Addresscheck').hide();
        // let useraddressError = true;
        // $('#address').keyup(function() {
        //     validateaddress();
        // });

        // function validateaddress() {
        //     let useraddressValue = $('#address').val();
        //     if (useraddressValue.length == '') {
        //         $('#Addresscheck').show();
        //         useraddressError = false;
        //         return false;
        //     } else if ((useraddressValue.length < 15) ||
        //         (useraddressValue.length > 300)) {
        //         $('#Addresscheck').show();
        //         $('#Addresscheck').html("**length of address must be between 15 and 300");
        //         useraddressError = false;
        //         $('#address').addClass(
        //             'is-invalid');
        //         return false;
        //     } else {
        //         $('#address').removeClass(
        //             'is-invalid');
        //         $('#address').addClass(
        //             'is-valid');
        //         $('#Addresscheck').hide();
        //         useraddressError = true;
        //     }
        // }


        /// Validated Phone
        $('#Phonecheck').hide();
        // let userphoneError = true;
        // $('#phone').keyup(function() {
        //     validatephone();
        // });

        // function validatephone() {
        //     let userphoneValue = $('#phone').val();
        //     if (userphoneValue.length == '') {
        //         $('#Phonecheck').show();
        //         userphoneError = false;
        //         return false;
        //     } else if ((userphoneValue.length < 7) ||
        //         (userphoneValue.length > 15)) {
        //         $('#Phonecheck').show();
        //         $('#Phonecheck').html("**length of phone must be between 7 and 15");
        //         userphoneError = false;
        //         $('#phone').addClass(
        //             'is-invalid');
        //         return false;
        //     } else {
        //         $('#phone').removeClass(
        //             'is-invalid');
        //         $('#phone').addClass(
        //             'is-valid');
        //         $('#Phonecheck').hide();
        //         userphoneError = true;
        //     }
        // }



        /// Validated Country
        $('#Countrycheck').hide();
        // let usercountryError = true;
        // $('#country').keyup(function() {
        //     validatecountry();
        // });

        // function validatecountry() {
        //     let usercountryValue = $('#country').val();
        //     if (usercountryValue.length == '') {
        //         $('#Countrycheck').show();
        //         usercountryError = false;
        //         return false;
        //     } else if ((usercountryValue.length < 3) ||
        //         (usercountryValue.length > 25)) {
        //         $('#Countrycheck').show();
        //         $('#Countrycheck').html("**length of Country must be between 3 and 25");
        //         usercountryError = false;
        //         $('#country').addClass(
        //             'is-invalid');
        //         return false;
        //     } else {
        //         $('#country').removeClass(
        //             'is-invalid');
        //         $('#country').addClass(
        //             'is-valid');
        //         $('#Countrycheck').hide();
        //         usercountryError = true;
        //     }
        // }



        /// Validated Password
        $('#Passwordcheck').hide();
        let userpasswordError = true;
        $('#password').keyup(function() {
          validatepassword();
        });

        function validatepassword() {
          let userpasswordValue = $('#password').val();
          if (userpasswordValue.length == '') {
            $('#Passwordcheck').show();
            userpasswordError = false;
            return false;
          } else if ((userpasswordValue.length < 7) ||
            (userpasswordValue.length > 15)) {
            $('#Passwordcheck').show();
            $('#Passwordcheck').html("**length of password must be between 8 and 15");
            userpasswordError = false;
            $('#password').addClass(
              'is-invalid');
            return false;
          } else {
            $('#password').removeClass(
              'is-invalid');
            $('#password').addClass(
              'is-valid');
            $('#Passwordcheck').hide();
            userpasswordError = true;
          }
        }



        // Validate Email
        const email =
          document.getElementById('email');
        email.addEventListener('blur', () => {
          let regex =
            /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
          let s = email.value;
          if (regex.test(s)) {
            email.classList.remove(
              'is-invalid');
            emailError = true;
            email.classList.add(
              'is-valid');
          } else {
            email.classList.add(
              'is-invalid');
            emailError = false;
          }
        })



        $("#reg_form").on('submit', function(e) {
          e.preventDefault();
          var formdata = new FormData(this);
          // validateaddress();
          // validatecountry();
          validatepassword();
          //validatephone();
          validateFullname();
          validateUsername();
          // validatewalletaddress();
          // wallet_address();
          if (
            //(userphoneError == true) &&
            (userpasswordError == true) &&
            // (usercountryError == true) &&
            //  (useraddressError == true) &&
            (userfnameError == true) &&
            (usernameError == true)
            // (wallet_address_selector == true) &&
            //  (userwalletaddressError == true)
          ) {
            // alert("true");
            $.ajax({
              type: 'POST',
              url: 'includes/reg.php',
              data: formdata,
              contentType: false,
              cache: false,
              processData: false,
              success: function(response) {
                if (response.trim() == "Registeration Successful!") {
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
                    icon: 'success',
                    title: '' + response + ''
                  })
                  setTimeout(function() {
                    window.location = "login.html";
                  }, 900); // 100 milliseconds

                } else {
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
                    icon: 'error',
                    title: '' + response + ''
                  })
                }

              }
            });
          } else {
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
              icon: 'error',
              title: 'Please Fill up The Forms Properly'
            })
          }

        });
      });
    </script>








  </div> <!-- page-wrapper end -->
  <!-- bootstrap js -->
  <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
  <!-- slick slider js -->
  <script src="assets/js/vendor/slick.min.js"></script>
  <script src="assets/js/vendor/wow.min.js"></script>
  <script src="assets/js/contact.js"></script>
  <!-- dashboard custom js -->
  <script src="assets/js/app.js"></script>
</body>

</html>