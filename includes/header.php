<?php session_start(); ?>
<?php include "db.php";  ?>
<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <!--<META NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW">-->
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
  <!-- jQuery library -->
  <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
</head>

<!-- Smartsupp Live Chat script -->
<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '6a46b62029f71e2342c67303b3b31d38fff628e7';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>

<!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+1(314)403-09-40", // WhatsApp number
            call_to_action: "Message us", // Call to action
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol,
            host = "getbutton.io",
            url = proto + "//static." + host;
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () {
            WhWidgetSendButton.init(host, proto, options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    })();
    $(".dmopMx").css("display", "none");
</script>


<body>
  <div class="preloader">
    <div class="preloader-container">
      <span class="animated-preloader"></span>
    </div>
  </div>

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
  <div class="page-wrapper">
    <!-- header-section start  -->
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
                 <li><a href="contact.php">Contact</a></li>
                <li><a href="registration.php">Register</a></li>
                <li><a href="login.html">Login</a></li>

                </li>
                <!-- <li class="menu_has_children"><a href="#0">Page</a>
                  <ul class="sub-menu">
                    <li><a href="error-404.php">Error - 404</a></li>
                  </ul>
                </li> -->
               
              </ul>
              <div class="nav-right">
                <ul class="account-menu ml-3">
                  <li class="icon">
                    <a href="login.html"><i class="las la-user"></i></a>
                  </li>
                </ul>
                <!--<div style="padding-left: 10px; padding-top: 15px;" id="google_translate_element"></div>-->

                <!--<script type="text/javascript">-->
                <!--    function googleTranslateElementInit() {-->
                <!--        new google.translate.TranslateElement({-->
                <!--            pageLanguage: 'en'-->
                <!--        }, 'google_translate_element');-->
                <!--    }-->
                <!--</script>-->
                <!--<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>-->
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


      <!-- header__bottom end -->
    </header>