<?php include "includes/login_header.php" ?>

<!-- header-section end  -->
<!-- inner hero start -->
<!-- inner hero start -->
<section class="inner-hero bg_img" data-background="assets/images/bg/bg-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="page-title">All Referral Log</h2>
                <ul class="page-breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>Referrals Log</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- inner hero end -->
<br>
<br>


<!-- row end -->
<div class="mt-50 ">
    <div class="col-lg-12 ">
        <div style="text-align: center;" class="table-responsive--md p-0 ">
            <table class="table style--two white-space-nowrap ">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Transaction ID</th>
                        <th>Amount</th>
                        <th>Wallet</th>
                        <th>Details</th>
                        <th>Post Balance</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query = "SELECT * FROM transactions WHERE (detail = 'Referred User Interest' AND username = '$usename') ORDER BY id DESC";
                    $details = mysqli_query($connection, $query);
                     $count = mysqli_num_rows($details);
                    while ($row = mysqli_fetch_assoc($details)) {
                    ?>
                    <tr>
                        <td data-label="Date "><?php echo $row['date']; ?></td>
                        <td data-label="Transaction ID ">
                            <span class="base--color "><?php echo $row['transaction_id']; ?></span>
                        </td>
                        <td data-label="Amount ">
                            <span class="<?php if ($row['type'] == "pluse") {
                                echo "text-success";
                            } else {
                                echo "text-danger";
                            } ?>
                            "><?php if ($row['type'] == "pluse") {
                                echo "+";
                            } else {
                                echo "-";
                            } ?> R<?php echo $row['amount']; ?></span>
                        </td>
                        <td data-label="Wallet ">
                            <span class="badge base--bg ">
                            <?php if ($row['wallet'] == "deposit_w") {
                                echo "Deposit Wallet Balance";
                            } else if ($row['wallet'] == "interest_w") {
                                echo "Interest Wallet Balance";
                            }
                            else if ($row['wallet'] == "total_deposit") {
                                echo "Total Deposit";
                            }
                            else if ($row['wallet'] == "total_w") {
                                echo "Total Withdraw";
                            }else if ($row['wallet'] == "referral_e") {
                                echo "Referral Earnings";
                            }else if ($row['wallet'] == "total_invest") {
                                echo "Total Invest";
                            } ?>
                            </span>
                        </td>
                        <td data-label="Details "><?php echo $row['detail']; ?></td>
                        <td data-label="Post Balance ">R<?php echo $row['post_balance']; ?></td>
                        </tr>
                    <?php } 
                    if ($count == 0) {
                        echo '<td colspan="5">No Log Avialiable</td>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- row end -->
<br>







<!-- dashboard section end -->
<!-- footer section start -->
<?php include "includes/login_footer.php" ?>