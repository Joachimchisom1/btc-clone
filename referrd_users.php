<?php include "includes/login_header.php" ?>

<!-- header-section end  -->
<!-- inner hero start -->
<!-- inner hero start -->
<section class="inner-hero bg_img" data-background="assets/images/bg/bg-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="page-title">Referred Users</h2>
                <ul class="page-breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>Referred Users</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- inner hero end -->
<br>
<br>


<!-- row end -->
<div style="padding-left: 20px;" class="section-header">
    <h2 class="section-title"><span class="font-weight-normal">Total Referred User</span> <b class="base--color"></b></h2>
    </div>
<!-- content hero start -->
<div class="tab-content mt-4" id="transactionTabContent">
    <div class="tab-pane fade show active" id="deposit" role="tabpanel" aria-labelledby="deposit-tab">
        <div class="table-responsive--sm table-responsive">
            <table class="table style--two">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Date Registerd</th>
                        <th>Username</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $username =  $_SESSION['username'];
                    $query = "SELECT * FROM investors WHERE referred_by = '{$username}' ORDER BY id DESC";
                    $details = mysqli_query($connection, $query);
                    $count = mysqli_num_rows($details);
                    while ($row = mysqli_fetch_assoc($details)) {
                    ?>
                        <tr>
                            <td data-label="Full Name">
                                <div class="user">
                                    <div class="thumb"><img src="../img/<?php echo $row['img']; ?>" alt="image"></div>
                                    <span><?php echo $row['fullname']; ?></span>
                                </div>
                            </td>
                            <td data-label="Date Registerd"><?php echo $row['date']; ?></td>
                            <td data-label="Username"><?php echo $row['username']; ?></td>
                            <td data-label="Email"><?php echo $row['email']; ?></td>
                             </tr>
                    <?php } 
                    if ($count == 0) {
                        echo '<td colspan="2">You Dont Have Any Referrals Yet</td>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- content section end -->
<!-- row end -->
<br>







<!-- dashboard section end -->
<!-- footer section start -->
<?php include "includes/login_footer.php" ?>