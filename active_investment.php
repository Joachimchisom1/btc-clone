<?php include "includes/login_header.php" ?>
<script type="text/javascript">
    window.onload = function() {
        if (!window.location.hash) {
            window.location = window.location + '#loaded';
            window.location.reload();
        }
    }
</script>
<!-- header-section end  -->
<!-- inner hero start -->
<!-- inner hero start -->
<section class="inner-hero bg_img" data-background="assets/images/bg/bg-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="page-title">Active investements</h2>
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">Dashboard</a>
                    </li>
                    <li>Active investements / Log</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- inner hero end -->
<br>
<br>

<script>
    "use strict";

    function createCountDown(elementId, sec) {
        var tms = sec;
        var x = setInterval(function() {
            var distance = tms * 1000;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            document.getElementById(elementId).innerHTML = days + "d: " + hours + "h " + minutes + "m " + seconds +
                "s ";
            if (distance < 0) {
                clearInterval(x);
                document.getElementById(elementId).innerHTML = "COMPLETED";
            }
            tms--;
        }, 1000);
    }
</script>


<!-- row end -->
<div class="mt-50 ">
    <div class="col-lg-12 ">
        <div style="text-align: center;" class="table-responsive--md p-0 ">
            <h3>Investement Log</h3>
            <table class="table style--two white-space-nowrap ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>DATE</th>
                        <th>PLAN</th>
                        <th>AMOUNT INVESTED</th>
                        <th>GAINED INTEREST</th>
                        <th>TIME REMAINING</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM tbl_investement WHERE (user_id	 = '$usename' AND inv_type = 'investement') ORDER BY id DESC";
                    $details = mysqli_query($connection, $query);
                    $count = mysqli_num_rows($details);
                    while ($row = mysqli_fetch_assoc($details)) {
                    ?>
                        <tr>
                            <td data-label="ID"> <?php echo $row['id']; ?>
                            </td>
                            <td data-label="DATE">
                                <?php echo date('F jS, Y h:i:s A', strtotime($row['invt_start_date'])); ?>
                            </td>
                            <td data-label="PLAN"><?php echo $row['plan']; ?></td>
                            <td data-label="AMOUNT INVESTED">
                                <span class="text-success">$<?php echo number_format(round($row['amount_invested'])); ?></span>
                            </td>
                            <td data-label="GAINED INTEREST">
                                <span class="text-success">$<?php echo number_format($row['amount_with_percentage'], 2); ?></span>
                            </td>
                            <td data-label="TIME REMAINING">
                                <p id="<?php echo $row['id']; ?>"></p>
                                <?php

                                $datetime1 = strtotime(date('Y-m-d H:i:s')); //cirrent date
                                $datetime2 = strtotime($row['invt_end_date']); //end date
                                $secs = $datetime2 - $datetime1; // == <seconds between the two times to give to javascript live timer



                                ///STARTERPLAN_____________________________________________________________
                                if ($row['status'] == 'Active') {
                                    if ($row['plan'] == 'STARTER PLAN') {
                                        $amount_invested = $row['amount_invested'];
                                        $id = $row['id'];
                                        $user_id = $row['user_id'];
                                        $num_of_days_run_so_far = $row['num_of_days_run_so_far'];
                                        if (date('Y-m-d H:i:s') > $row['invt_end_date'] && $row['num_of_days_run_so_far'] == 0) {

                                            STARTERPLAN($connection, $amount_invested, $id, $user_id);
                                        } else {
                                            //echo "run with check";
                                            // basic1($row['amount_invested'], $row['id'],  $connection);
                                            // echo "run with check <br>";
                                            $current_date = new DateTime(date('Y-m-d H:i:s')); //new DateTime('now');
                                            $since_start =  $current_date->diff(new DateTime($row['invt_end_date']));
                                            $daydif = $since_start->d;

                                            //number of days expeced to run stored and brouth out from the database
                                            $days_to_run = 7;

                                            ///nuber of days it has run so far
                                            ///nuber of days it has to bestored in database too
                                            $num_of_days_run_so_far = $days_to_run - $daydif;

                                            if (date('Y-m-d H:i:s') > $row['invt_end_date'] && $num_of_days_run_so_far != 0) {
                                                STARTERPLAN($connection, $amount_invested, $id, $user_id);
                                            } elseif ($num_of_days_run_so_far <= 7) {
                                                STARTERPLAN1($connection, $amount_invested, $id, $num_of_days_run_so_far);
                                            }
                                        }
                                    }
                                }

                                ///GOLDPLAN_____________________________________________________________
                                if ($row['status'] == 'Active') {
                                    if ($row['plan'] == 'GOLD PLAN') {
                                        $amount_invested = $row['amount_invested'];
                                        $id = $row['id'];
                                        $user_id = $row['user_id'];
                                        $num_of_days_run_so_far = $row['num_of_days_run_so_far'];
                                        if (date('Y-m-d H:i:s') > $row['invt_end_date'] && $row['num_of_days_run_so_far'] == 0) {

                                            GOLDPLAN($connection, $amount_invested, $id, $user_id);
                                        } else {
                                            //echo "run with check";
                                            // basic1($row['amount_invested'], $row['id'],  $connection);
                                            // echo "run with check <br>";
                                            $current_date = new DateTime(date('Y-m-d H:i:s')); //new DateTime('now');
                                            $since_start =  $current_date->diff(new DateTime($row['invt_end_date']));
                                            $daydif = $since_start->d;

                                            //number of days expeced to run stored and brouth out from the database
                                            $days_to_run = 14;

                                            ///nuber of days it has run so far
                                            ///nuber of days it has to bestored in database too
                                            $num_of_days_run_so_far = $days_to_run - $daydif;

                                            if (date('Y-m-d H:i:s') > $row['invt_end_date'] && $num_of_days_run_so_far != 0) {
                                                GOLDPLAN($connection, $amount_invested, $id, $user_id);
                                            } elseif ($num_of_days_run_so_far <= 14) {
                                                GOLDPLAN1($connection, $amount_invested, $id, $num_of_days_run_so_far);
                                            }
                                        }
                                    }
                                }

                                ///PREMIUMPLAN_____________________________________________________________
                                if ($row['status'] == 'Active') {
                                    if ($row['plan'] == 'PREMIUM PLAN') {

                                        $amount_invested = $row['amount_invested'];
                                        $id = $row['id'];
                                        $user_id = $row['user_id'];
                                        $num_of_days_run_so_far = $row['num_of_days_run_so_far'];
                                        if (date('Y-m-d H:i:s') > $row['invt_end_date'] && $row['num_of_days_run_so_far'] == 0) {

                                            PREMIUMPLAN($connection, $amount_invested, $id, $user_id);
                                        } else {
                                            //echo "run with check";
                                            // basic1($row['amount_invested'], $row['id'],  $connection);
                                            // echo "run with check <br>";
                                            $current_date = new DateTime(date('Y-m-d H:i:s')); //new DateTime('now');
                                            $since_start =  $current_date->diff(new DateTime($row['invt_end_date']));
                                            $daydif = $since_start->d;

                                            //number of days expeced to run stored and brouth out from the database
                                            $days_to_run = 21;

                                            ///nuber of days it has run so far
                                            ///nuber of days it has to bestored in database too
                                            $num_of_days_run_so_far = $days_to_run - $daydif;

                                            if (date('Y-m-d H:i:s') > $row['invt_end_date'] && $num_of_days_run_so_far != 0) {
                                                PREMIUMPLAN($connection, $amount_invested, $id, $user_id);
                                            } elseif ($num_of_days_run_so_far <= 21) {
                                                PREMIUMPLAN1($connection, $amount_invested, $id, $num_of_days_run_so_far);
                                            }
                                        }
                                    }
                                }

                                 ///PLATINUM PLAN_____________________________________________________________
                                 if ($row['status'] == 'Active') {
                                    if ($row['plan'] == 'PLATINUM PLAN') {
                                        $amount_invested = $row['amount_invested'];
                                        $id = $row['id'];
                                        $user_id = $row['user_id'];
                                        $num_of_days_run_so_far = $row['num_of_days_run_so_far'];
                                        if (date('Y-m-d H:i:s') > $row['invt_end_date'] && $row['num_of_days_run_so_far'] == 0) {

                                            PLATINUMPLAN($connection, $amount_invested, $id, $user_id);
                                        } else {
                                            //echo "run with check";
                                            // basic1($row['amount_invested'], $row['id'],  $connection);
                                            // echo "run with check <br>";
                                            $current_date = new DateTime(date('Y-m-d H:i:s')); //new DateTime('now');
                                            $since_start =  $current_date->diff(new DateTime($row['invt_end_date']));
                                            $daydif = $since_start->d;

                                            //number of days expeced to run stored and brouth out from the database
                                            $days_to_run = 28;

                                            ///nuber of days it has run so far
                                            ///nuber of days it has to bestored in database too
                                            $num_of_days_run_so_far = $days_to_run - $daydif;

                                            if (date('Y-m-d H:i:s') > $row['invt_end_date'] && $num_of_days_run_so_far != 0) {
                                                PLATINUMPLAN($connection, $amount_invested, $id, $user_id);
                                            } elseif ($num_of_days_run_so_far <= 28) {
                                                PLATINUMPLAN1($connection, $amount_invested, $id, $num_of_days_run_so_far);
                                            }
                                        }
                                    }
                                }

                                  ///EXLUSIVEVIPPLAN PLAN_____________________________________________________________
                                  if ($row['status'] == 'Active') {
                                    if ($row['plan'] == 'EXLUSIVE VIP PLAN') {

                                        $amount_invested = $row['amount_invested'];
                                        $id = $row['id'];
                                        $user_id = $row['user_id'];
                                        $num_of_days_run_so_far = $row['num_of_days_run_so_far'];
                                        if (date('Y-m-d H:i:s') > $row['invt_end_date'] && $row['num_of_days_run_so_far'] == 0) {

                                            EXLUSIVEVIPPLAN($connection, $amount_invested, $id, $user_id);
                                        } else {
                                            //echo "run with check";
                                            // basic1($row['amount_invested'], $row['id'],  $connection);
                                            // echo "run with check <br>";
                                            $current_date = new DateTime(date('Y-m-d H:i:s')); //new DateTime('now');
                                            $since_start =  $current_date->diff(new DateTime($row['invt_end_date']));
                                            $daydif = $since_start->d;

                                            //number of days expeced to run stored and brouth out from the database
                                            $days_to_run = 31;

                                            ///nuber of days it has run so far
                                            ///nuber of days it has to bestored in database too
                                            $num_of_days_run_so_far = $days_to_run - $daydif;

                                            if (date('Y-m-d H:i:s') > $row['invt_end_date'] && $num_of_days_run_so_far != 0) {
                                                EXLUSIVEVIPPLAN($connection, $amount_invested, $id, $user_id);
                                            } elseif ($num_of_days_run_so_far <= 31) {
                                                EXLUSIVEVIPPLAN1($connection, $amount_invested, $id, $num_of_days_run_so_far);
                                            }
                                        }
                                    }
                                }

                                ?>
                                <script>
                                    createCountDown(<?php echo $row['id']; ?>, <?php echo $secs; ?>);
                                </script>
                            </td>

                        </tr>
                    <?php }
                    if ($count == 0) {
                        echo '<td colspan="5">No Active Investment Avialiable</td>';
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- row end -->
<br>

<?php
////EXLUSIVEVIPPLAN FUC----------------------
function EXLUSIVEVIPPLAN($connection, $amount_invested, $id, $user_id)
{
    // echo "run without check<br>";
    // $query = "UPDATE tbl_investement SET num_of_days_run_so_far = 3";
    // $query .= " WHERE id = '$id' ";
    // $update_investor_table =  mysqli_query($connection, $query);
    // ConfirmQuery($update_investor_table);

    ////update and add profits
    $percentage = 10;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = $percentage;
    $percentage = $percentage * 31;
    $money_invested_pluse_added_percentage = $amount_invested + $percentage;

    $query = "UPDATE tbl_investement SET amount_with_percentage = '$money_invested_pluse_added_percentage', status = 'Completed'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

       ///pull out totall intrest with percentage from investement table
   $result = mysqli_query($connection, "SELECT * FROM tbl_investement WHERE id = '$id'");
   while ($row = mysqli_fetch_array($result)) {
       $amount_with_percentage = $row['amount_with_percentage'];
   }

   //update/insert and add deatils to investors table
   $query = "UPDATE investors SET interest_w = interest_w  + '$amount_with_percentage'";
   $query .= " WHERE username = '$user_id' ";
   $update_investor_table =  mysqli_query($connection, $query);
   ConfirmQuery($update_investor_table);

   //add transfer details to details table--------------
   ///pull out total deposite wallet balance investors table.........
   $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$user_id'");
   while ($row = mysqli_fetch_array($result)) {
       $deposit_w = $row['deposit_w'];
   }

   //add transfer details to details table--------------
   //add details to transaction table
   $date = date("F jS, Y h:i:s A");
   $trascid = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
   $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
   $query .= "VALUES('{$date}','{$trascid}','{$amount_with_percentage}','interest_w','Profit from investement','{$deposit_w}', 'pluse','{$user_id}')";
   $insert_proof = mysqli_query($connection, $query);
   ConfirmQuery($insert_proof);
}
function EXLUSIVEVIPPLAN1($connection, $amount_invested, $id, $num_of_days_run_so_far)
{
        $query = "UPDATE tbl_investement SET num_of_days_run_so_far = '$num_of_days_run_so_far'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    ////update and add profits
    $percentage = 10;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = $percentage;
    $percentage = $percentage * $num_of_days_run_so_far;
    $money_invested_pluse_added_percentage = $amount_invested + $percentage;

    $money_invested = $amount_invested;
    $query = "UPDATE tbl_investement SET amount_with_percentage = '$money_invested_pluse_added_percentage'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
}

////PLATINUMPLAN FUC----------------------
function PLATINUMPLAN($connection, $amount_invested, $id, $user_id)
{
    // echo "run without check<br>";
    // $query = "UPDATE tbl_investement SET num_of_days_run_so_far = 3";
    // $query .= " WHERE id = '$id' ";
    // $update_investor_table =  mysqli_query($connection, $query);
    // ConfirmQuery($update_investor_table);

    ////update and add profits
    $percentage = 8;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = $percentage;
    $percentage = $percentage * 28;
    $money_invested_pluse_added_percentage = $amount_invested + $percentage;

    $query = "UPDATE tbl_investement SET amount_with_percentage = '$money_invested_pluse_added_percentage', status = 'Completed'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

       ///pull out totall intrest with percentage from investement table
   $result = mysqli_query($connection, "SELECT * FROM tbl_investement WHERE id = '$id'");
   while ($row = mysqli_fetch_array($result)) {
       $amount_with_percentage = $row['amount_with_percentage'];
   }

   //update/insert and add deatils to investors table
   $query = "UPDATE investors SET interest_w = interest_w  + '$amount_with_percentage'";
   $query .= " WHERE username = '$user_id' ";
   $update_investor_table =  mysqli_query($connection, $query);
   ConfirmQuery($update_investor_table);

   //add transfer details to details table--------------
   ///pull out total deposite wallet balance investors table.........
   $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$user_id'");
   while ($row = mysqli_fetch_array($result)) {
       $deposit_w = $row['deposit_w'];
   }

   //add transfer details to details table--------------
   //add details to transaction table
   $date = date("F jS, Y h:i:s A");
   $trascid = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
   $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
   $query .= "VALUES('{$date}','{$trascid}','{$amount_with_percentage}','interest_w','Profit from investement','{$deposit_w}', 'pluse','{$user_id}')";
   $insert_proof = mysqli_query($connection, $query);
   ConfirmQuery($insert_proof);
}
function PLATINUMPLAN1($connection, $amount_invested, $id, $num_of_days_run_so_far)
{
 
    $query = "UPDATE tbl_investement SET num_of_days_run_so_far = '$num_of_days_run_so_far'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    ////update and add profits
    $percentage = 8;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = $percentage;
    $percentage = $percentage * $num_of_days_run_so_far;
    $money_invested_pluse_added_percentage = $amount_invested + $percentage;

    $money_invested = $amount_invested;
    $query = "UPDATE tbl_investement SET amount_with_percentage = '$money_invested_pluse_added_percentage'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
}

////PREMIUMPLAN FUC----------------------
function PREMIUMPLAN($connection, $amount_invested, $id, $user_id)
{
    // echo "run without check<br>";
    // $query = "UPDATE tbl_investement SET num_of_days_run_so_far = 3";
    // $query .= " WHERE id = '$id' ";
    // $update_investor_table =  mysqli_query($connection, $query);
    // ConfirmQuery($update_investor_table);

    ////update and add profits
    $percentage = 7;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = $percentage;
    $percentage = $percentage * 21;
    $money_invested_pluse_added_percentage = $amount_invested + $percentage;

    $query = "UPDATE tbl_investement SET amount_with_percentage = '$money_invested_pluse_added_percentage', status = 'Completed'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

       ///pull out totall intrest with percentage from investement table
   $result = mysqli_query($connection, "SELECT * FROM tbl_investement WHERE id = '$id'");
   while ($row = mysqli_fetch_array($result)) {
       $amount_with_percentage = $row['amount_with_percentage'];
   }

   //update/insert and add deatils to investors table
   $query = "UPDATE investors SET interest_w = interest_w  + '$amount_with_percentage'";
   $query .= " WHERE username = '$user_id' ";
   $update_investor_table =  mysqli_query($connection, $query);
   ConfirmQuery($update_investor_table);

   //add transfer details to details table--------------
   ///pull out total deposite wallet balance investors table.........
   $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$user_id'");
   while ($row = mysqli_fetch_array($result)) {
       $deposit_w = $row['deposit_w'];
   }

   //add transfer details to details table--------------
   //add details to transaction table
   $date = date("F jS, Y h:i:s A");
   $trascid = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
   $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
   $query .= "VALUES('{$date}','{$trascid}','{$amount_with_percentage}','interest_w','Profit from investement','{$deposit_w}', 'pluse','{$user_id}')";
   $insert_proof = mysqli_query($connection, $query);
   ConfirmQuery($insert_proof);
}
function PREMIUMPLAN1($connection, $amount_invested, $id, $num_of_days_run_so_far)
{
  
    $query = "UPDATE tbl_investement SET num_of_days_run_so_far = '$num_of_days_run_so_far'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    ////update and add profits
    $percentage = 7;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = $percentage;
    $percentage = $percentage * $num_of_days_run_so_far;
     $money_invested_pluse_added_percentage = $amount_invested + $percentage;

    $money_invested = $amount_invested;
    $query = "UPDATE tbl_investement SET amount_with_percentage = '$money_invested_pluse_added_percentage'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
}

////GOLDPLAN FUC----------------------
function GOLDPLAN($connection, $amount_invested, $id, $user_id)
{
    // echo "run without check<br>";
    // $query = "UPDATE tbl_investement SET num_of_days_run_so_far = 3";
    // $query .= " WHERE id = '$id' ";
    // $update_investor_table =  mysqli_query($connection, $query);
    // ConfirmQuery($update_investor_table);

    ////update and add profits
    $percentage = 5.5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = $percentage;
    $percentage = $percentage * 14;
    $money_invested_pluse_added_percentage = $amount_invested + $percentage;

    $query = "UPDATE tbl_investement SET amount_with_percentage = '$money_invested_pluse_added_percentage', status = 'Completed'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

       ///pull out totall intrest with percentage from investement table
   $result = mysqli_query($connection, "SELECT * FROM tbl_investement WHERE id = '$id'");
   while ($row = mysqli_fetch_array($result)) {
       $amount_with_percentage = $row['amount_with_percentage'];
   }

   //update/insert and add deatils to investors table
   $query = "UPDATE investors SET interest_w = interest_w  + '$amount_with_percentage'";
   $query .= " WHERE username = '$user_id' ";
   $update_investor_table =  mysqli_query($connection, $query);
   ConfirmQuery($update_investor_table);

   //add transfer details to details table--------------
   ///pull out total deposite wallet balance investors table.........
   $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$user_id'");
   while ($row = mysqli_fetch_array($result)) {
       $deposit_w = $row['deposit_w'];
   }

   //add transfer details to details table--------------
   //add details to transaction table
   $date = date("F jS, Y h:i:s A");
   $trascid = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
   $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
   $query .= "VALUES('{$date}','{$trascid}','{$amount_with_percentage}','interest_w','Profit from investement','{$deposit_w}', 'pluse','{$user_id}')";
   $insert_proof = mysqli_query($connection, $query);
   ConfirmQuery($insert_proof);
}
function GOLDPLAN1($connection, $amount_invested, $id, $num_of_days_run_so_far)
{
    // echo "first";
    // $query = "UPDATE tbl_investement SET num_of_days_run_so_far = '$num_of_days_run_so_far'";
    // $query .= " WHERE id = '$id' ";
    // $update_investor_table =  mysqli_query($connection, $query);
    // ConfirmQuery($update_investor_table);

    ////update and add profits
    $percentage = 5.5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = $percentage;
    $percentage = $percentage * $num_of_days_run_so_far;
    $money_invested_pluse_added_percentage = $amount_invested + $percentage;

    $money_invested = $amount_invested;
    $query = "UPDATE tbl_investement SET amount_with_percentage = '$money_invested_pluse_added_percentage'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
}

////STARTERPLAN FUC----------------------
function STARTERPLAN($connection, $amount_invested, $id, $user_id)
{
    // echo "run without check<br>";
    // $query = "UPDATE tbl_investement SET num_of_days_run_so_far = 3";
    // $query .= " WHERE id = '$id' ";
    // $update_investor_table =  mysqli_query($connection, $query);
    // ConfirmQuery($update_investor_table);

    ////update and add profits
    $percentage = 5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = $percentage;
    $percentage = $percentage * 7;
    $money_invested_pluse_added_percentage = $amount_invested + $percentage;

    $query = "UPDATE tbl_investement SET amount_with_percentage = '$money_invested_pluse_added_percentage', status = 'Completed'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

       ///pull out totall intrest with percentage from investement table
   $result = mysqli_query($connection, "SELECT * FROM tbl_investement WHERE id = '$id'");
   while ($row = mysqli_fetch_array($result)) {
       $amount_with_percentage = $row['amount_with_percentage'];
   }

   //update/insert and add deatils to investors table
   $query = "UPDATE investors SET interest_w = interest_w  + '$amount_with_percentage'";
   $query .= " WHERE username = '$user_id' ";
   $update_investor_table =  mysqli_query($connection, $query);
   ConfirmQuery($update_investor_table);

   //add transfer details to details table--------------
   ///pull out total deposite wallet balance investors table.........
   $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$user_id'");
   while ($row = mysqli_fetch_array($result)) {
       $deposit_w = $row['deposit_w'];
   }

   //add transfer details to details table--------------
   //add details to transaction table
   $date = date("F jS, Y h:i:s A");
   $trascid = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
   $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
   $query .= "VALUES('{$date}','{$trascid}','{$amount_with_percentage}','interest_w','Profit from investement','{$deposit_w}', 'pluse','{$user_id}')";
   $insert_proof = mysqli_query($connection, $query);
   ConfirmQuery($insert_proof);
}
function STARTERPLAN1($connection, $amount_invested, $id, $num_of_days_run_so_far)
{
    
    $query = "UPDATE tbl_investement SET num_of_days_run_so_far = '$num_of_days_run_so_far'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    ////update and add profits
    $percentage = 5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = $percentage;
    $percentage = $percentage * $num_of_days_run_so_far;
    $money_invested_pluse_added_percentage = $amount_invested + $percentage;

    $money_invested = $amount_invested;
    $query = "UPDATE tbl_investement SET amount_with_percentage = '$money_invested_pluse_added_percentage'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
}

////ANTMINER FUC----------------------
function ANTMINER($connection, $amount_invested, $id)
{
    echo "run without check<br>";
    $query = "UPDATE tbl_investement SET num_of_days_run_so_far = 3";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    ////update and add profits
    $percentage = 3.5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = $percentage;
    $percentage = $percentage * 3;
    $money_invested_pluse_added_percentage = $amount_invested + $percentage;

    $query = "UPDATE tbl_investement SET amount_with_percentage = '$money_invested_pluse_added_percentage', status = 'Completed'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
}
function ANTMINER1($connection, $amount_invested, $id, $num_of_days_run_so_far)
{
    echo "first";
    $query = "UPDATE tbl_investement SET num_of_days_run_so_far = '$num_of_days_run_so_far'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    ////update and add profits
    $percentage = 3.5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = $percentage;
    $percentage = $percentage * $num_of_days_run_so_far;
    echo $money_invested_pluse_added_percentage = $amount_invested + $percentage;

    $money_invested = $amount_invested;
    $query = "UPDATE tbl_investement SET amount_with_percentage = '$money_invested_pluse_added_percentage'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
}

////DRAGONMINTER FUC----------------------
function DRAGONMINTER($connection, $amount_invested, $id)
{
    echo "run without check<br>";
    $query = "UPDATE tbl_investement SET num_of_days_run_so_far = 3";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    ////update and add profits
    $percentage = 4.5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = $percentage;
    $percentage = $percentage * 14;
    $money_invested_pluse_added_percentage = $amount_invested + $percentage;

    $query = "UPDATE tbl_investement SET amount_with_percentage = '$money_invested_pluse_added_percentage', status = 'Completed'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
}
function DRAGONMINTER1($connection, $amount_invested, $id, $num_of_days_run_so_far)
{
    echo "first";
    $query = "UPDATE tbl_investement SET num_of_days_run_so_far = '$num_of_days_run_so_far'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    ////update and add profits
    $percentage = 4.5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = $percentage;
    $percentage = $percentage * $num_of_days_run_so_far;
    echo $money_invested_pluse_added_percentage = $amount_invested + $percentage;

    $money_invested = $amount_invested;
    $query = "UPDATE tbl_investement SET amount_with_percentage = '$money_invested_pluse_added_percentage'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
}

////PAGOLINMINER FUC----------------------
function PAGOLINMINER($connection, $amount_invested, $id)
{
    // $query = "UPDATE tbl_investement SET num_of_days_run_so_far = 3";
    // $query .= " WHERE id = '$id' ";
    // $update_investor_table =  mysqli_query($connection, $query);
    // ConfirmQuery($update_investor_table);

    ////update and add profits
    $percentage = 5.5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = $percentage;
    $percentage = $percentage * 21;
    $money_invested_pluse_added_percentage = $amount_invested + $percentage;

    $query = "UPDATE tbl_investement SET amount_with_percentage = '$money_invested_pluse_added_percentage', status = 'Completed'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
}
function PAGOLINMINER1($connection, $amount_invested, $id, $num_of_days_run_so_far)
{
    echo "first";
    $query = "UPDATE tbl_investement SET num_of_days_run_so_far = '$num_of_days_run_so_far'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    ////update and add profits
    $percentage = 5.5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = $percentage;
    $percentage = $percentage * $num_of_days_run_so_far;
    echo $money_invested_pluse_added_percentage = $amount_invested + $percentage;

    $money_invested = $amount_invested;
    $query = "UPDATE tbl_investement SET amount_with_percentage = '$money_invested_pluse_added_percentage'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
}

////AVALONMINER FUC----------------------
function AVALONMINER($connection, $amount_invested, $id)
{
    echo "run without check<br>";
    $query = "UPDATE tbl_investement SET num_of_days_run_so_far = 3";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    ////update and add profits
    $percentage = 10;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = $percentage;
    $percentage = $percentage * 30;
    $money_invested_pluse_added_percentage = $amount_invested + $percentage;

    $query = "UPDATE tbl_investement SET amount_with_percentage = '$money_invested_pluse_added_percentage', status = 'Completed'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
}
function AVALONMINER1($connection, $amount_invested, $id, $num_of_days_run_so_far)
{
    echo "first";
    $query = "UPDATE tbl_investement SET num_of_days_run_so_far = '$num_of_days_run_so_far'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    ////update and add profits
    $percentage = 10;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = $percentage;
    $percentage = $percentage * $num_of_days_run_so_far;
    echo $money_invested_pluse_added_percentage = $amount_invested + $percentage;

    $money_invested = $amount_invested;
    $query = "UPDATE tbl_investement SET amount_with_percentage = '$money_invested_pluse_added_percentage'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
}


////compound_mode plan____________________
function compound_mode1($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............

    header("Location: active_investment.php");
}
function compound_mode2($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day2 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode3($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day3 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode4($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day4 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode5($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day5 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode6($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day6 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode7($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day7 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode8($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day8 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode9($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day9 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode10($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day10 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode11($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day11 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode12($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day12 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode13($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day13 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode14($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day14 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode15($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day15 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode16($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day16 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode17($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day17 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode18($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day18 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode19($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day19 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode20($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day20 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode21($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day21 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode22($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day22 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode23($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day23 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode24($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day24 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode25($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day25 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode26($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day26 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode27($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day27 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode28($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day28 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode29($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day29 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function compound_mode30($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 9;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage) + $amount_invested;
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day30 = 1, status = 'Completed'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    ///pull out totall intrest with percentage from investement table
    $result = mysqli_query($connection, "SELECT * FROM tbl_investement WHERE id = '$id'");
    while ($row = mysqli_fetch_array($result)) {
        $amount_with_percentage = $row['amount_with_percentage'];
    }

    ///pull out total deposite wallet balance investors table.........
    $username =  $_SESSION['username'];
    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    while ($row = mysqli_fetch_array($result)) {
        $deposit_w = $row['deposit_w'];
    }

    //update/insert and add deatils to investors table
    $query = "UPDATE investors SET interest_w = interest_w  + '$amount_with_percentage'";
    $query .= " WHERE username = '$username' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    //add transfer details to details table--------------
    //add details to transaction table
    $date = date("F jS, Y h:i:s A");
    $trascid = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
    $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
    $query .= "VALUES('{$date}','{$trascid}','{$amount_with_percentage}','interest_w','Invested On Compounding Mode','{$deposit_w}', 'pluse','{$username}')";
    $insert_proof = mysqli_query($connection, $query);
    ConfirmQuery($insert_proof);
    header("Location: active_investment.php");
}
////end of compound_mode plan____________________

////basic plan____________________
function basic($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day1 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function basic2($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day2 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function basic3($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage) + $amount_invested;
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day3 = 1, status = 'Completed'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    ///pull out totall intrest with percentage from investement table
    $result = mysqli_query($connection, "SELECT * FROM tbl_investement WHERE id = '$id'");
    //echo $count = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        $amount_with_percentage = $row['amount_with_percentage'];
    }

    //update/insert and add deatils to investors table
    $username =  $_SESSION['username'];
    $query = "UPDATE investors SET interest_w = interest_w  + '$amount_with_percentage'";
    $query .= " WHERE username = '$username' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    ///pull out total deposite wallet balance investors table.........
    $username =  $_SESSION['username'];
    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    while ($row = mysqli_fetch_array($result)) {
        $deposit_w = $row['deposit_w'];
    }

    //add transfer details to details table--------------
    //add details to transaction table
    $date = date("F jS, Y h:i:s A");
    $trascid = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
    $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
    $query .= "VALUES('{$date}','{$trascid}','{$amount_with_percentage}','interest_w','Invested on Starter Plan','{$deposit_w}', 'pluse','{$username}')";
    $insert_proof = mysqli_query($connection, $query);
    ConfirmQuery($insert_proof);
    header("Location: active_investment.php");
}
// function basic4($amount_invested, $id, $connection)
// {
//     //make an update in the investement table add the requied pecentage for the day and move over to the next function
//     //calculates the percentage and add them up............
//     $percentage = 2;
//     $percentage = ($percentage / 100) * $amount_invested;
//     $percentage = round($percentage);
//     ///add update the investement percentage .....
//     $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day4 = 1";
//     $query .= " WHERE id = '$id' ";
//     $update_investor_table =  mysqli_query($connection, $query);
//     ConfirmQuery($update_investor_table);
// }
// function basic5($amount_invested, $id, $connection)
// {
//     //make an update in the investement table add the requied pecentage for the day and move over to the next function
//     //calculates the percentage and add them up............
//     $percentage = 2;
//     $percentage = ($percentage / 100) * $amount_invested;
//     $percentage = round($percentage);
//     ///add update the investement percentage .....
//     $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day5 = 1";
//     $query .= " WHERE id = '$id' ";
//     $update_investor_table =  mysqli_query($connection, $query);
//     ConfirmQuery($update_investor_table);

//     ///pull out totall intrest with percentage from investement table
//     $result = mysqli_query($connection, "SELECT * FROM tbl_investement WHERE id = '$id'");
//     //echo $count = mysqli_num_rows($result);
//     while ($row = mysqli_fetch_array($result)) {
//         $amount_with_percentage = $row['amount_with_percentage'];
//     }

//     //update/insert and add deatils to investors table
//     $username =  $_SESSION['username'];
//     $query = "UPDATE investors SET interest_w = interest_w  + '$amount_with_percentage', total_invest = total_invest + $amount_with_percentage";
//     $query .= " WHERE username = '$username' ";
//     $update_investor_table =  mysqli_query($connection, $query);
//     ConfirmQuery($update_investor_table);

//     //add transfer details to details table--------------

// }
/////end of basic plan________________________

////sliver plan______________________________________
function Silver1($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day1 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Silver2($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day2 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Silver3($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day3 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Silver4($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day4 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Silver5($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day5 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Silver6($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day6 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Silver7($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage) + $amount_invested;
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day7 = 1, status = 'Completed'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    ///pull out totall intrest with percentage from investement table
    $result = mysqli_query($connection, "SELECT * FROM tbl_investement WHERE id = '$id'");
    //echo $count = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        $amount_with_percentage = $row['amount_with_percentage'];
    }

    //update/insert and add deatils to investors table
    $username =  $_SESSION['username'];
    $query = "UPDATE investors SET interest_w = interest_w  + '$amount_with_percentage'";
    $query .= " WHERE username = '$username' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    //add transfer details to details table--------------
    ///pull out total deposite wallet balance investors table.........
    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    while ($row = mysqli_fetch_array($result)) {
        $deposit_w = $row['deposit_w'];
    }

    //add transfer details to details table--------------
    //add details to transaction table
    $date = date("F jS, Y h:i:s A");
    $trascid = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
    $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
    $query .= "VALUES('{$date}','{$trascid}','{$amount_with_percentage}','interest_w','Invested On Professional Plan','{$deposit_w}', 'pluse','{$username}')";
    $insert_proof = mysqli_query($connection, $query);
    ConfirmQuery($insert_proof);
    header("Location: active_investment.php");
}
////end of basic plan_________________________________

////Enterprise Plan______________________________________
function Gold1($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day1 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Gold2($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day2 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Gold3($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day3 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Gold4($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day4 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Gold5($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day5 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Gold6($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day6 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Gold7($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day7 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Gold8($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day8 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Gold9($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day9 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Gold10($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage) + $amount_invested;
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day10 = 1, status = 'Completed'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);


    ///pull out totall intrest with percentage from investement table
    $result = mysqli_query($connection, "SELECT * FROM tbl_investement WHERE id = '$id'");
    //echo $count = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        $amount_with_percentage = $row['amount_with_percentage'];
    }

    //update/insert and add deatils to investors table
    $username =  $_SESSION['username'];
    $query = "UPDATE investors SET interest_w = interest_w  + '$amount_with_percentage'";
    $query .= " WHERE username = '$username' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    //add transfer details to details table--------------
    ///pull out total deposite wallet balance investors table.........
    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    while ($row = mysqli_fetch_array($result)) {
        $deposit_w = $row['deposit_w'];
    }

    //add transfer details to details table--------------
    //add details to transaction table
    $date = date("F jS, Y h:i:s A");
    $trascid = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
    $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
    $query .= "VALUES('{$date}','{$trascid}','{$amount_with_percentage}','interest_w','Invested On Enterprise Plan','{$deposit_w}', 'pluse','{$username}')";
    $insert_proof = mysqli_query($connection, $query);
    ConfirmQuery($insert_proof);
    header("Location: active_investment.php");
}
// function Gold11($amount_invested, $id, $connection)
// {
//     //make an update in the investement table add the requied pecentage for the day and move over to the next function
//     //calculates the percentage and add them up............
//     $percentage = 7.3;
//     $percentage = ($percentage / 100) * $amount_invested;
//     $percentage = round($percentage);
//     ///add update the investement percentage .....
//     $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day11 = 1";
//     $query .= " WHERE id = '$id' ";
//     $update_investor_table =  mysqli_query($connection, $query);
//     ConfirmQuery($update_investor_table);
// }
// function Gold12($amount_invested, $id, $connection)
// {
//     //make an update in the investement table add the requied pecentage for the day and move over to the next function
//     //calculates the percentage and add them up............
//     $percentage = 7.3;
//     $percentage = ($percentage / 100) * $amount_invested;
//     $percentage = round($percentage);
//     ///add update the investement percentage .....
//     $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day12 = 1";
//     $query .= " WHERE id = '$id' ";
//     $update_investor_table =  mysqli_query($connection, $query);
//     ConfirmQuery($update_investor_table);

//     ///pull out totall intrest with percentage from investement table
//     $result = mysqli_query($connection, "SELECT * FROM tbl_investement WHERE id = '$id'");
//     //echo $count = mysqli_num_rows($result);
//     while ($row = mysqli_fetch_array($result)) {
//         $amount_with_percentage = $row['amount_with_percentage'];
//     }

//     //update/insert and add deatils to investors table
//     $username =  $_SESSION['username'];
//     $query = "UPDATE investors SET interest_w = interest_w  + '$amount_with_percentage', total_invest = total_invest + $amount_with_percentage";
//     $query .= " WHERE username = '$username' ";
//     $update_investor_table =  mysqli_query($connection, $query);
//     ConfirmQuery($update_investor_table);

//     //add transfer details to details table--------------

// }
////end of gold plan__________________

////Gold plan______________________________________
function Platinum1($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 7;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day1 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Platinum2($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 7;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day2 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Platinum3($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 7;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day3 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Platinum4($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 7;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day4 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Platinum5($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 7;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day5 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Platinum6($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 7;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day6 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Platinum7($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 7;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day7 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Platinum8($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 7;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day8 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Platinum9($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 7;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day9 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Platinum10($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 7;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day10 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Platinum11($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 7;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day11 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Platinum12($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 7;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day12 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Platinum13($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 7;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage);
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day13 = 1";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);
    header("Location: active_investment.php");
}
function Platinum14($amount_invested, $id, $connection)
{
    //make an update in the investement table add the requied pecentage for the day and move over to the next function
    //calculates the percentage and add them up............
    $percentage = 5;
    $percentage = ($percentage / 100) * $amount_invested;
    $percentage = round($percentage) + $amount_invested;
    ///add update the investement percentage .....
    $query = "UPDATE tbl_investement SET amount_with_percentage = amount_with_percentage + '$percentage', day14 = 1, status = 'Completed'";
    $query .= " WHERE id = '$id' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);


    ///pull out totall intrest with percentage from investement table
    $result = mysqli_query($connection, "SELECT * FROM tbl_investement WHERE id = '$id'");
    //echo $count = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        $amount_with_percentage = $row['amount_with_percentage'];
    }

    //update/insert and add deatils to investors table
    $username =  $_SESSION['username'];
    $query = "UPDATE investors SET interest_w = interest_w  + '$amount_with_percentage'";
    $query .= " WHERE username = '$username' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    //add transfer details to details table--------------
    ///pull out total deposite wallet balance investors table.........
    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    while ($row = mysqli_fetch_array($result)) {
        $deposit_w = $row['deposit_w'];
    }

    //add transfer details to details table--------------
    //add details to transaction table
    $date = date("F jS, Y h:i:s A");
    $trascid = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
    $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
    $query .= "VALUES('{$date}','{$trascid}','{$amount_with_percentage}','interest_w','Invested On Compounding Mode 1','{$deposit_w}', 'pluse','{$username}')";
    $insert_proof = mysqli_query($connection, $query);
    ConfirmQuery($insert_proof);
    header("Location: active_investment.php");
}
////end of Platinum plan__________________

?>

<!-- dashboard section end -->
<!-- footer section start -->
<?php include "includes/login_footer.php" ?>