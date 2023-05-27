<?php ob_start(); ?>
<?php session_start();  ?>
<?php include "db.php";  ?>
<?php include "function.php" ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <META NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GOLDENPROFIT - Investment</title>
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
    <script src="assets/js/vendor/jquery-3.5.1.min.js "></script>
    
    <!-- sweet alert -->
    <link href="assets/css/sweetalert.css" rel="stylesheet">
    <script src="assets/js/sweetalert.js"></script>
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>
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
    <!-- STAR ANIMATION -->
    <div class="bg-animation">
        <div id="stars"></div>
        <div id="stars2"></div>
        <div id="stars3"></div>
        <div id="stars4"></div>
    </div>
    <?php
    $id = $_SESSION['id'];
    $usename = $_SESSION['username'];
    if (!isset($_SESSION['key'])) {
        header("Location: login.html");
    }elseif($_SESSION['key'] != "5d8d8t8r8e8ewsd55e84677#@%"){
        header("Location: login.html");
    }
    ?>
    <!-- / STAR ANIMATION -->
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sticky-top">
                <div class="sidebar-header">
                    <h3>Menu</h3>
                </div>
                <ul class="list-unstyled components">
                    <li>
                        <a href="dashboard.php"><i class="la la-dashboard"></i> Dashboard</a>
                    </li>
                    <!-- <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li>
                                <a href="#">Page 1</a>
                            </li>
                            <li>
                                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                            </li>

                        </ul>
                    </li> -->
                    <li>
                        <a href="plan.php"><i class="la la-cubes"></i> Investment Plans</a>
                    </li>
                    <li>
                        <a href="mining_plan.php"><i class="la la-cubes"></i> Mining Plans</a>
                    </li>
                    <li>
                        <a href="active_investment.php"><i class="la la-cubes"></i>Active Investments</a>
                    </li>
                    <li>
                        <a href="active_mining.php"><i class="la la-cubes"></i>Active Mining</a>
                    </li>
                    <li>
                        <a href="deposit.php"><i class="la la-credit-card"></i> Deposit</a>
                    </li>
                    <li>
                        <a href="withdraw.php"><i class="la la-money"></i> Withdraw</a>
                    </li>
                    <li>
                        <a href="transaction.php"><i class="la la-exchange"></i> Transaction Logs</a>
                    </li>
                    <li>
                        <a href="referrd_users.php"><i class="la la-users"></i> Referred Users</a>
                    </li>
                    <li>
                        <a href="profile.php"><i class="la la-user"></i> Profile / Account</a>
                    </li>
                    <li>
                        <a href="password.php"><i class="la la-lock"></i>Security</a>
                    </li>
                    <li>
                        <a href="kyc.php"><i class="la la-file"></i>KYC</a>
                    </li>
                    <li>
                        <a href="includes/logout.php"><i class="la la-arrow-circle-o-right"></i> log Out</a>
                    </li>
                </ul>
            </div>
        </nav>
        <style>
            .bg-light {
                background-color: #0f1215 !important;
            }
        </style>
        <div style="width: 100%;" id="content">
            <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                    <div>
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
                                padding-left: 6px;
                            }

                            /* @media (max-width: 1992px) {
                                #google_translate_element2 {
                                    padding-right: 305px
                                }

                                #flags {
                                    padding-left: 90%;
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
                            } */

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
                    </div>
                    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                    <a class="site-logo site-title" href="index.php">
                        <img width="100px" height="100px" src="assets/images/logo.png" alt="site-logo">
                    </a>
                </div>
            </nav>

            <!-- ////style for the google transliterator_create -->
            <style type="text/css">
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
                    border-radius: 11px;
                    font-size: 11px;
                    border-color: transparent !important;
                    background-color: #cca354 !important;
                }
            </style>


            <input hidden class="form-control" id="gen" value="<?php echo $_SESSION['fullname']; ?>" type="text" name="">
    <!-- TradingView Widget BEGIN -->
      <div class="tradingview-widget-container">
        <div  class="sticky-top tradingview-widget-container__widget"></div>
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
            <!--- header-section end  -->