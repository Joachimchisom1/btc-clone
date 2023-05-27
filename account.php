<?php include "includes/login_header.php" ?>

<!-- header-section end  -->

<section class="inner-hero bg_img" data-background="assets/images/bg/bg-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="page-title">Profile</h2>
                <ul class="page-breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>Profile</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php
$id = $_SESSION['id'];
$query = "SELECT * FROM investors WHERE id = {$id}";
$details = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($details)) {
    $fullname = $row['fullname'];
    $date = $row['date'];
    $deposit_w = $row['deposit_w'];
    $interest_w = $row['interest_w'];
    $total_invest = $row['total_invest'];
    $total_deposit = $row['total_deposit'];
    $total_w = $row['total_w'];
    $referral_e = $row['referral_e'];
    $username = $row['username'];
    $img = $row['img'];
    $total_deposit = $row['total_deposit'];
    $email = $row['email'];
}

if (isset($_POST['update'])) {

   $email = $_POST['email'];
   $fname = $_POST['fname'];

   $img = $_FILES['img']['name'];
   $temp_img = $_FILES['img']['tmp_name'];

   move_uploaded_file($temp_img, "img/$img");

   if (empty($img)) {
       $query = "SELECT * FROM investors WHERE id = {$id}";
       $select_image = mysqli_query($connection, $query);

       while ($row = mysqli_fetch_array($select_image)) {
           $img = $row['img'];
       }
   }

   $query = "UPDATE investors SET ";
   $query .= "email = '{$email}', ";
   $query .= "img = '{$img}', ";
   $query .= "fullname = '{$fname}'";
   $query .= "WHERE id = '{$id}'";
   $update = mysqli_query($connection, $query);
   ConfirmQuery($update);
   echo '<script>Swal.fire("Update Successfully!","","success").then(function() {
    window.location = "profile.php"})</script>';
}
?>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-8">
            <div class="cta-wrapper bg_img border-radius--10 text-center" style="background-image: url(&quot;assets/images/bg/bg-8.jpg&quot;);">
                <form enctype="multipart/form-data" method="post" action="" class="contact-form mt-4">

                    <div style="padding-bottom: 10px;" class="col-12">
                        <div class="profile-header-img">
                            <div class="text-center">
                                <img style="width: 70%;" src="img/<?php echo $img; ?>" class="avatar img-circle img-thumbnail" alt="avatar">
                            </div>
                        </div><br>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label for="img">Image</label>
                            <input type="file" name="img" class="form-control">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="fname">Full Name</label>
                            <input type="text" name="fname" value="<?php echo $fullname; ?>" class="form-control">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="uname">UserName</label>
                            <input disabled type="text" value="<?php echo $username; ?>" name="uname" class="form-control">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="uname">Email</label>
                            <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Email Address" class="form-control">
                        </div>
                        <div id="button2" class="col-lg-12 mb-30">
                            <button id="btn2" name="update" type="submit" class="cmn-btn">Update</button>
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