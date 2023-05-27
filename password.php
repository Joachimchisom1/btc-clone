<?php include "includes/login_header.php" ?>

<!-- header-section end  -->

<section class="inner-hero bg_img" data-background="assets/images/bg/bg-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="page-title">Change Password</h2>
                <ul class="page-breadcrumb">
                    <li>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    </li>
                    <li>Change Password</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<br>

<?php
$query = "SELECT * FROM investors WHERE id = '{$id}'";
$details = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($details)) {
    $password = $row['password'];
} ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-8">
            <div class="cta-wrapper bg_img border-radius--10 text-center"
                style="background-image: url(&quot;assets/images/bg/bg-8.jpg&quot;);">
                <form method="post" action="" class="contact-form mt-4">
                    <div style="text-align: center;" class="form-row">
                        <p>Changr Your Password</p>
                        <div class="form-group col-lg-12">
                            <input type="password" value="<?php echo $password; ?>" name="" placeholder="Password"
                                class="form-control">
                        </div>
                        <div class="form-group col-lg-12">
                            <input type="password" name="password" value="<?php echo $password; ?>"
                                placeholder="Confirm Password" class="form-control">
                        </div>
                        <hr>
                        <div id="button2" class="col-lg-12 mb-30">
                            <button name="update" id="btn2" type="submit" class="cmn-btn">Submit</button>
                        </div>
                    </div>
                </form>
                <hr>
                <div id="button2" class="col-lg-12 mb-30">
                    <button id="g2fa" class="cmn-btn">Activate / Deactivate Google 2fa Authenticator</button>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<?php
$id = $_SESSION['id'];
if (isset($_POST['update'])) {

    $password = $_POST['password'];

    $query = "UPDATE investors SET ";
    $query .= "password = '{$password}' ";
    $query .= "WHERE id = '{$id}'";
    $update = mysqli_query($connection, $query);
    ConfirmQuery($update);
    echo '<script>Swal.fire("Password Change Successful!","","success").then(function() {
        window.location = "password.php";
    })</script>';
}

?>
<script>
$(document).on('click', '#g2fa', function(e) {
    let timerInterval
    Swal.fire({
        title: 'Please Wait!',
        html: 'Processing...',
        timer: 5000,
        // timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
            timerInterval = setInterval(() => {
                const content = Swal.getHtmlContainer()
                if (content) {
                    const b = content.querySelector('b')
                    if (b) {
                        b.textContent = Swal.getTimerLeft()
                    }
                }
            }, 50)
        },
        willClose: () => {
            clearInterval(timerInterval)
        }
    }).then((result) => {
        ///cheack if the google 2fa is active or not
        var google_2fa = "google_2fa";
        $.ajax({
            type: 'POST',
            url: 'includes/server.php',
            dataType: 'text',
            data: {
                google_2fa: google_2fa
            },
            success: function(response) {
                // alert(response);
                if (response.trim() == "ok") {
                    Swal.fire({
                        title: 'Deactivate?',
                        text: "Google 2fa Authenticator is already Active on This Account will you like to Deactivate?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Deactivate it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            let dactivate = "dactivate";
                            $.ajax({
                                type: 'POST',
                                url: 'includes/server.php',
                                dataType: 'text',
                                data: {
                                    dactivate: dactivate
                                },
                                success: function(response) {
                                    // alert(response);
                                    if (response.trim() == "ok") {
                                        Swal.fire(
                                            'Google Authenticator',
                                            'Google 2fa Authenticator Deactivated Successfully.',
                                            'success'
                                        )
                                    } else {
                                        alert(
                                            "there was an error please report this to the admin"
                                        );
                                    }
                                }
                            });

                        }
                    })
                } else {
                    $.ajax({
                        type: 'POST',
                        url: 'includes/googlecheck.php',
                        dataType: 'json',
                        success: function(resp) {
                            console.log(resp);
                            Swal.fire({
                                //icon: 'error',
                                title: 'Setup key : ' + resp[0] +
                                    ' <br> or <br> SCAN THE CODE BELOW TO ACTIVATE 2FA Authenticator',
                                html: '<img src="' + resp[1] + '" />',
                                footer: '<a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en&gl=US">Download google 2fa Authenticator</a>'
                            })
                        }
                    });
                }
            }
        });
    })
});
</script>

<?php include "includes/login_footer.php" ?>