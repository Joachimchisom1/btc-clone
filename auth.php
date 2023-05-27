<?php session_start();  ?>
<?php
if (!isset($_SESSION['auth'])) {
    header("Location: login.html");
}
?>

<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <META NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REALCAPITALTRUST - Login </title>
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
</head>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/6104b2b5d6e7610a49add7be/1fbt5k6d3';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->

<!-- GetButton.io widget -->
<script type="text/javascript">
    (function() {
        var options = {
            whatsapp: "+1(347)906-78-05", // WhatsApp number
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
        s.onload = function() {
            WhWidgetSendButton.init(host, proto, options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    })();
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
        </div>
        <!-- / STAR ANIMATION -->
    </div>
    <div class="page-wrapper">

        <!-- account section start -->
        <div class="account-section bg_img" data-background="assets/images/bg/bg-5.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-7">
                        <div class="account-card">
                            <div class="account-card__header bg_img overlay--one" data-background="assets/images/bg/bg-6.jpg">
                                <h3 class="section-title">Google Authenticator</h3>
                            </div>
                            <div class="account-card__body">
                                <h3 class="text-center">2FA Verification</h3>
                                <P class="text-center">current time <?php echo date("Y-m-d H:i:s"); ?> </P>
                                <form id="authForm" class="mt-4">
                                    <div class="form-group">
                                        <input type="text" name="auth_code" required class="form-control" placeholder="Enter google 2fa auth code">
                                    </div>
                                    <div class="mt-3">
                                        <button class="cmn-btn">continue</button>
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
            $(document).ready(function() {
                $("#authForm").on('submit', function(e) {
                    e.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: 'includes/ajaxlogin.php',
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(response) {
                            if (response.trim() == "ok") {
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal
                                            .stopTimer)
                                        toast.addEventListener('mouseleave', Swal
                                            .resumeTimer)
                                    }
                                });
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Login Sucessful!'
                                })
                                //alert("Login Sucessful!");
                                setTimeout(function() {
                                    window.location = "dashboard.php";
                                }, 900); // 100 milliseconds

                            } else {
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter',
                                            Swal.stopTimer)
                                        toast.addEventListener('mouseleave',
                                            Swal.resumeTimer)
                                    }
                                });
                                Toast.fire({
                                    icon: 'error',
                                    title: '' + response + ''
                                })
                            }
                        }
                    });
                });
            });
        </script>
        <!-- Script -->

    </div>
    <!-- page-wrapper end -->

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