<?php include "includes/admin_header.php" ?>
<style>
    body {
        padding-top: 100px;
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
                            <h2 class="text-center">Admin Login</h2>
                            <p id="txt"></p>
                            <div class="panel-body">
                                <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                            <input required id="user" name="user" placeholder="Enter mail" class="form-control" type="text">
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
                                        <input name="login" class="btn btn-lg btn-primary btn-block" value="LOGIN" type="submit">
                                    </div>
                                </form>
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

                                    document.getElementById("register-form").addEventListener("submit", function(event) {
                                        event.preventDefault();
                                        var user = document.getElementById("user").value;
                                        var password = document.getElementById("password").value;
                                        var xmlhttp = new XMLHttpRequest();
                                        xmlhttp.onreadystatechange = function() {
                                            if (this.readyState == 4 && this.status == 200) {
                                                if (this.responseText.trim() === "ok") {
                                                    window.location = "admin.php";
                                                }  else {
                                                    document.getElementById("txt").innerHTML = this.responseText;
                                                }
                                            }
                                        };
                                        xmlhttp.open("GET", "includes/ajaxlogin.php?user=" + user + "&password=" + password, true);
                                        xmlhttp.send();
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