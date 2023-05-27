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
                case 'bk':
                    include "includes/bk_details.php";
                    break;
                case 'swap':
                    include "includes/swap_coin.php";
                    break;
                case 'wallet_address':
                    include "includes/wallet_address.php";
                    break;
                case 'edit_wallet_address':
                    include "includes/edit_wallet_address.php";
                    break;
                case 'send_proof':
                    include "includes/send_proof.php";
                    break;
                case 'withdraw_request':
                    include "includes/withdrawal_request.php";
                    break;
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
                case 'ref_by';
                    include "includes/ref_by.php";
                    break;
                case 'transfer_histories';
                    include "includes/transfer_histories.php";
                    break;
                case 'transfer_code';
                    include "includes/transfer_code.php";
                    break;
                case 'proof';
                    include "includes/proof.php";
                    break;
                default:
                    include "includes/team.php";
                    break;
            }
            ?>
        </div>
        <!-- /#page-wrapper -->

        <?php include "includes/admin_footer.php" ?>