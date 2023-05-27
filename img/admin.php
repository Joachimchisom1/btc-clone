<?php include "includes/admin_header.php" ?>


<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        WELcome to Admin
                        <small></small>
                    </h1>

                </div>
            </div>
            <!-- /.row -->

            <?php
            if (isset($_GET['source'])) {
                $source = ($_GET['source']);
            } else {
                $source = '';
            }

            switch ($source) {
                case 'notification';
                    include "includes/notification.php";
                    break;
                case 'admin';
                    include "includes/admin_details.php";
                    break;
                case 'addmoney';
                    include "includes/add_money.php";
                    break;
                case 'team';
                    include "includes/team.php";
                    break;
                case 'transfer_histories';
                    include "includes/transfer_histories.php";
                    break;
                case 'stop_mssg';
                    include "includes/stops.php";
                    break;
                case 'enroll';
                    include "includes/enroll.php";
                    break;
                default:
                    include "includes/enroll.php";
                    break;
            }
            ?>
        </div>
        <!-- /#page-wrapper -->

        <?php include "includes/admin_footer.php" ?>