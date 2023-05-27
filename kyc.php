<?php include "includes/login_header.php" ?>

<!-- header-section end  -->

<section class="inner-hero bg_img" data-background="assets/images/bg/bg-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="page-title">KYC VERIFICATION</h2>
                <ul class="page-breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>KYC VERIFICATION</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php
///upload or update the users kyc
if (isset($_POST['upload'])) {

    $identification_type = mysqli_real_escape_string($connection, $_POST['identification_type']);

    $kyc_file = $_FILES['kyc_file']['name'];
    $temp_img = $_FILES['kyc_file']['tmp_name'];

    move_uploaded_file($temp_img, "img/$kyc_file");

    $query = "UPDATE investors SET ";
    $query .= "kyc_typ = '{$identification_type}', ";
    $query .= "kyc_file = '{$kyc_file}' ";
    $query .= "WHERE id = '{$id}'";
    $update = mysqli_query($connection, $query);
    ConfirmQuery($update);
    echo '<script>Swal.fire("File Upload Successful!","","success").then(function() {
    window.location = "kyc.php"})</script>';
}
//un on start to cheack if the user kc is under reviw or is confirmed
$result = mysqli_query($connection, "SELECT * FROM investors WHERE id = '{$id}'");
while ($row = mysqli_fetch_assoc($result)) {
    $kyc_file = $row['kyc_file'];
    $kyc_typ = $row['kyc_typ'];
    $kyc_status = $row['kyc_status'];
}
if ($kyc_file == "" || $kyc_typ == "") {
?>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-8">
            <div class="cta-wrapper bg_img border-radius--10 text-center"
                style="background-image: url(&quot;assets/images/bg/bg-8.jpg&quot;);">
                <h3> KYC VERIFICATION</h3>
                <small>Ensure document provided contains the same information as of registration</small>
                <form enctype="multipart/form-data" method="post" action="" class="contact-form mt-4">
                    <div class="form-row">
                        <div id="mssg" class="form-group col-lg-12">
                            <div class=" col-lg-12">
                                <label for="identification_type">Identification Type</label>
                            </div>
                            <select name="identification_type" required
                                class="select form-control d-inline-block w-auto ml-xl-3 ">
                                <option value="" selected disabled hidden>
                                    Please Select Identification Type
                                </option>
                                <option value="National ID">National ID</option>
                                <option value="Driver License">Driver License</option>
                                <option value="Voter`s Card">Voter`s Card</option>
                                <option value="IBTCertificate">IBTCertificate</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="kyc_file">KYC </label>
                            <input required type="file" name="kyc_file" class="form-control">
                        </div>
                        <div id="button2" class="col-lg-12 mb-30">
                            <button id="btn2" name="upload" type="submit" class="cmn-btn">Upload</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<?php
} else {
?>
<br>

<div style="padding-bottom: 25px;" class="container">
    <div class="row justify-content-center">
        <div class="col-xl-8">
            <div class="cta-wrapper bg_img border-radius--10 text-center"
                style="background-image: url(&quot;assets/images/bg/bg-8.jpg&quot;);">
                <h3> KYC VERIFICATION</h3>
                <div class="form-row">
                    <div id="mssg" class="form-group col-lg-12">
                        <div class=" col-lg-12">
                            <label for="identification_type">National ID</label>
                        </div>
                    </div>
                    <div class="form-group col-lg-12">
                        <label style="padding-right: 15px;" for="img">STATUS </label>
                        <?php 
                        if ($kyc_status == "Confirmed") {
                           echo '<span class="badge  badge-success">Confirmed</span>';
                        } else {
                            echo '<span class="badge  badge-primary">Under Review</span>';
                        }
                        
                        ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<!-- dashboard section end -->
<!-- footer section start -->
<?php include "includes/login_footer.php" ?>