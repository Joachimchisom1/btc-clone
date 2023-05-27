<?php include "includes/login_header.php" ?>

<!-- header-section end  -->

<section class="inner-hero bg_img" data-background="assets/images/bg/bg-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="page-title">Details</h2>
                <ul class="page-breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>Details</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php
$username = $_SESSION['username'];
$query = "SELECT * FROM mank WHERE userid = '$username'";
$details = mysqli_query($connection, $query);
ConfirmQuery($details);

while ($row = mysqli_fetch_assoc($details)) {
    $bank_name = $row['bank_name'];
    $beneficiary_name = $row['beneficiary_name'];
    $account_number = $row['account_number'];
}

if (isset($_POST['update'])) {

    $bank_name = $_POST['bank_name'];
    $account_number = $_POST['account_number'];
    $beneficiary_name = $_POST['beneficiary_name'];
    $beneficiary_name = mysqli_real_escape_string($connection, $beneficiary_name);
    $account_number = mysqli_real_escape_string($connection, $account_number);
    $bank_name = mysqli_real_escape_string($connection, $bank_name);

    $query = "UPDATE mank SET ";
    $query .= "bank_name = '{$bank_name}', ";
    $query .= "beneficiary_name = '{$beneficiary_name}', ";
    $query .= "account_number = '{$account_number}'";
    $query .= "WHERE userid = '$username'";
    $update = mysqli_query($connection, $query);
    ConfirmQuery($update);
    echo '<script>Swal.fire("Update Successfull Now You Can Now Make Withdraws Via Bank Wire !","","success").then(function() {
    window.location = "bk.php"})</script>';
}
?>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-8">
            <div class="cta-wrapper bg_img border-radius--10 text-center" style="background-image: url(&quot;assets/images/bg/bg-8.jpg&quot;);">
                <form enctype="multipart/form-data" method="post" action="" class="contact-form mt-4">
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <label for="uname">Bank Name</label>
                            <input type="text" value="<?php echo $bank_name; ?>" name="bank_name" class="form-control">
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="uname">Beneficiary Name:</label>
                            <input type="text" value="<?php echo $beneficiary_name; ?>" name="beneficiary_name" class="form-control">
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="uname">Account Number:</label>
                            <input type="text" value="<?php echo $account_number; ?>" name="account_number" class="form-control">
                        </div>
                        <div id="button2" class="col-lg-12 mb-30">
                            <button id="btn2" name="update" type="submit" class="cmn-btn">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>








<!-- dashboard section end -->
<!-- footer section start -->
<?php include "includes/login_footer.php" ?>