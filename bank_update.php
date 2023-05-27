<?php include "includes/login_header.php" ?>
<?php if (isset($_SESSION['sec'])) {
    $_SESSION['sec'] = null;
}
// else {
//     header("Location: deposit.php");
// } 
?>

<!-- header-section end  -->
<br>
<br>
<!-- btc calculator payment start -->
<br>
<br>
<section class="pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title"><span class="font-weight-normal">Update</span> <b class="base--color">Proof</b></h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div style="text-align: center;" class="profit-calculator-wrapper">
                    <?php
                    $query = "SELECT * FROM proof WHERE userid = 2";
                    $select_posts = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_posts)) {

                        $amount =  $row['amount'];
                        $img =  $row['proof_img'];
                    }
                    ?>
                    <form enctype="multipart/form-data" method="post" action="" class="profit-calculator">
                        <div class="row mb-none-30">
                            <div class="col-lg-12 mb-30">
                                <label>Amount</label>
                                <input name="amount" required id="amount" type="text" value="<?php echo $amount; ?>" class="form-control base--bg">
                            </div>
                            <div class="col-lg-12 mb-30">
                                <img src="img/<?php echo $img; ?>" alt="image">
                            </div>
                            <div id="proof_input" class="col-lg-12 mb-30">
                                <label>Select New Proof of Payment</label>
                                <input name="img" placeholder="Upload Proof of Payment" type="file" class="form-control base--bg">
                            </div>
                            <div id="button2" class="col-lg-12 mb-30">
                                <button name="update" type="submit" class="cmn-btn">Submit</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact section end -->

<?php

// echo"lknknk";
if (isset($_POST['update'])) {

    $amount = $_POST['amount'];

    $img = $_FILES['img']['name'];
    $temp_img = $_FILES['img']['tmp_name'];

    move_uploaded_file($temp_img, "img/$img");

    if(empty($img)){
        $query = "SELECT * FROM proof WHERE userid = 2";
        $select_image = mysqli_query($connection,$query);
 
        while($row = mysqli_fetch_array( $select_image)){
            $img = $row['proof_img'];
        }
    }
    echo $img;

    $query = "UPDATE proof SET ";
    $query .= "amount = '{$amount}', ";
    $query .= "proof_img = '{$img}' ";
    $query .= "WHERE userid = '2'";
    $update = mysqli_query($connection, $query);
    ConfirmQuery($update);
    echo '<script>Swal.fire("Update Successful!","","success").then(function() {
        window.location = "btc_update.php";
    })</script>';
    
}

?>

<br>







<!-- dashboard section end -->
<!-- footer section start -->
<?php include "includes/login_footer.php" ?>