<?php 
if (!isset($_SESSION['key'])) {
   header("Location: index.php");
} elseif( $_SESSION['key'] != "6sd5frgedwh87f6ed5YY89(*^%#@#$" ){
    header("Location: index.php"); 
}
?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Admin Portal</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li><a href="../index.php">HOME SITE</a></li>


        <!-- drop down togle -->
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                <?php 
            // if(isset($_SESSION['username'])){
            //     echo $_SESSION['username'];
            // }
            
            ?>
                <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>

                <li class="divider"></li>
                <li>
                    <a href="includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>

    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="admin.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="admin.php?source=transfer_histories"><i class="fa  fa-fw  fa-file"></i>All Transactions</a>
            </li>
            <li>
                <a href="admin.php?source=team"><i class="fa  fa-fw  fa-users "></i>investors</a>
            </li>
            <li class="">
                <a href="admin.php?source=proof"><i class="fa fa-fw fa-file"></i>Proof</a>
            </li>
            <li class="">
                <a href="admin.php?source=bk"><i class="fa fa-fw fa-file"></i>Bank Details</a>
            </li>
            <li class="">
                <a href="admin.php?source=swap"><i class="fa fa-fw fa-file"></i>Swapped coin</a>
            </li>
            <li class="">
                <a href="admin.php?source=withdraw_request"><i class="fa fa-fw fa-file"></i>WITHDRAWAL REQUEST</a>
            </li>
            <li class="">
                <a href="admin.php?source=addmoney"><i class="fa fa-fw fa-file"></i>Add money</a>
            </li>
            <li class="">
                <a href="admin.php?source=send_proof"><i class="fa fa-fw fa-file"></i>Send Proof</a>
            </li>
            <li class="">
                <a href="admin.php?source=admin"><i class="fa fa-fw fa-file"></i>Update Amdin details</a>
            </li>
            <li class="">
                <a href="admin.php?source=wallet_address"><i class="fa fa-fw fa-file"></i>Edit wallet address</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>