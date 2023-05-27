<?php include "includes/admin_header.php" ?>
<style>
    body {
        background-color: rgb(206, 206, 206);
    }
</style>
<div class="container">

    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">


                            <h3><i class="fa fa-user fa-4x"></i></h3>
                            <h2 class="text-center">Register An Admin</h2>
                            <p id="txt"></p>
                            <div class="panel-body">
                                <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input required id="username" name="username" placeholder="Enter Full Name" class="form-control" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                            <input required id="mail" name="user" placeholder="Enter Mail" class="form-control" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                                            <input required id="password" name="password" placeholder="Enter password" class="form-control" type="password">
                                            <span class="input-group-addon"><a><i id="cl" onclick="eyeFunction()" class="glyphicon glyphicon-eye-close"></i></a></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                                            <input required id="cpassword" name="password" placeholder="Confirm Password" class="form-control" type="password">
                                            <span class="input-group-addon"><a><i id="cl2" onclick="eyeFunction2()" class="glyphicon glyphicon-eye-close"></i></a></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input name="login" class="btn btn-lg btn-primary btn-block" value="LOGIN" type="submit">
                                    </div>
                                </form>
                                <p>Already have an account? <a href="index.php" class="text-danger">Sign In</a></p>
                                <script>
                                    function eyeFunction() {
                                        var x = document.getElementById("password");
                                        if (x.getAttribute("type") == "text") {
                                            x.setAttribute("type", "password");
                                            document.getElementById("cl").setAttribute("class", "glyphicon glyphicon-eye-close");
                                        } else if (x.getAttribute("type") == "password") {
                                            x.setAttribute("type", "text");
                                            document.getElementById("cl").setAttribute("class", "glyphicon glyphicon-eye-open");
                                        }
                                    }

                                    function eyeFunction2() {
                                        var x = document.getElementById("cpassword");
                                        if (x.getAttribute("type") == "text") {
                                            x.setAttribute("type", "password");
                                            document.getElementById("cl2").setAttribute("class", "glyphicon glyphicon-eye-close");
                                        } else if (x.getAttribute("type") == "password") {
                                            x.setAttribute("type", "text");
                                            document.getElementById("cl2").setAttribute("class", "glyphicon glyphicon-eye-open");
                                        }
                                    }

                                    document.getElementById("register-form").addEventListener("submit", function(event) {
                                        event.preventDefault();
                                        var mail = document.getElementById("mail").value;
                                        var username = document.getElementById("username").value;
                                        var password = document.getElementById("password").value;
                                        var cpassword = document.getElementById("cpassword").value;
                                        if (cpassword != password) {
                                            document.getElementById("txt").innerHTML = "the password and confirm password are not the same";
                                        } else {
                                            var xmlhttp = new XMLHttpRequest();
                                            xmlhttp.onreadystatechange = function() {
                                                if (this.readyState == 4 && this.status == 200) {
                                                    //alert(this.responseText);
                                                    if (this.responseText.trim() === "admin") {
                                                        window.location = "admin.php";
                                                    } else if (this.responseText.trim() === "subscriber") {
                                                        window.location = "./subscriber";
                                                    } else {
                                                        document.getElementById("txt").innerHTML = this.responseText;
                                                        //window.location = "./";
                                                    }
                                                }
                                            };
                                            xmlhttp.open("GET", "includes/reguser.php?mail=" + mail + "&password=" + password + "&username=" + username, true);
                                            xmlhttp.send();
                                        }
                                    });

                                </script>

                            </div><!-- Body-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <hr>

</div>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html><!-- /.container -->