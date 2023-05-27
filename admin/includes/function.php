<?php
function ConfirmQuery($result)
{
    global $connection;
    if (!$result) {
        die('query failed ' . mysqli_error($connection));
    }
}

//starter plan fuc 
function ANTMINER_PLAN($user_name, $amount)
{
    global $connection;
    $username =  $user_name;
    $amount =  $amount;
    $date = date("F jS, Y h:i:s A");

    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    //echo $count = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        $balance = $row['deposit_w'];
        $interest_w = $row['interest_w'];
    }


    $query = "UPDATE investors SET total_invest = total_invest + $amount";
    $query .= " WHERE username = '$username' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    // $query = "UPDATE investors SET deposit_w = $balance - '$amount'";
    // $query .= " WHERE username = '$username' ";
    // $update_investor_table =  mysqli_query($connection, $query);
    // ConfirmQuery($update_investor_table);

    // $t_balance = $balance - $amount;

    //$interest_w = $interest_w + $amount;

    //add details to transaction table
    $trascid = $transfer_  = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
    // $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
    // $query .= "VALUES('{$date}','{$trascid}','{$amount}','interest_w','Invested On Basic Plan','{$interest_w}', 'pluse','{$username}')";
    // $insert_proof = mysqli_query($connection, $query);
    // ConfirmQuery($insert_proof);

    $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
    $query .= "VALUES('{$date}','{$trascid}','{$amount}','deposit_w','Invested On Starter Plan','{$balance}', 'minus','{$username}')";
    $insert_proof = mysqli_query($connection, $query);
    ConfirmQuery($insert_proof);

    $added_num_of_days = 4320; //minute days to add
    $current_date = date('Y-m-d H:i:s'); //current date 
    $newtimestamp = strtotime('' . $current_date . ' + ' . $added_num_of_days . ' minute');
    $date_to_stop =  date('Y-m-d H:i:s', $newtimestamp); //date to stop

    // adding investement details to investemrnt table
    $query = "INSERT INTO tbl_investement (invt_start_date, invt_end_date, user_id, status, plan, amount_invested, inv_type) ";
    $query .= "VALUES('{$current_date}','{$date_to_stop}','{$username}','Active','ANTMINER', '{$amount}','Mining')";
    $insert_proof = mysqli_query($connection, $query);
    ConfirmQuery($insert_proof);
}

//DRAGONMINTER_PLAN plan fuc 
function DRAGONMINTER_PLAN($user_name, $amount)
{
    global $connection;
    $username =  $user_name;
    $amount =  $amount;
    $date = date("F jS, Y h:i:s A");

    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    //echo $count = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        $balance = $row['deposit_w'];
        // $interest_w = $row['interest_w'];
    }


    $query = "UPDATE investors SET total_invest = total_invest + $amount";
    $query .= " WHERE username = '$username' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    // $query = "UPDATE investors SET deposit_w = $balance - '$amount'";
    // $query .= " WHERE username = '$username' ";
    // $update_investor_table =  mysqli_query($connection, $query);
    // ConfirmQuery($update_investor_table);

    // $t_balance = $balance - $amount;

    //$interest_w = $interest_w + $amount;

    //add details to transaction table
    $trascid = $transfer_  = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
    // $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
    // $query .= "VALUES('{$date}','{$trascid}','{$amount}','interest_w','Invested On Basic Plan','{$interest_w}', 'pluse','{$username}')";
    // $insert_proof = mysqli_query($connection, $query);
    // ConfirmQuery($insert_proof);

    $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
    $query .= "VALUES('{$date}','{$trascid}','{$amount}','deposit_w','Invested On Professional Plan','{$balance}', 'minus','{$username}')";
    $insert_proof = mysqli_query($connection, $query);
    ConfirmQuery($insert_proof);

    $added_num_of_days = 20160; //minute days to add 14 DAYS TOTAL
    $current_date = date('Y-m-d H:i:s'); //current date 
    $newtimestamp = strtotime('' . $current_date . ' + ' . $added_num_of_days . ' minute');
    $date_to_stop =  date('Y-m-d H:i:s', $newtimestamp); //date to stop

    // adding investement details to investemrnt table
    $query = "INSERT INTO tbl_investement (invt_start_date, invt_end_date, user_id, status, plan, amount_invested, inv_type) ";
    $query .= "VALUES('{$current_date}','{$date_to_stop}','{$username}','Active','DRAGONMINTER', '{$amount}', 'Mining')";
    $insert_proof = mysqli_query($connection, $query);
    ConfirmQuery($insert_proof);
}

//PAGOLINMINER_PLAN Plan plan fuc 
function PAGOLINMINER_PLAN($user_name, $amount)
{
    global $connection;
    $username =  $user_name;
    $amount =  $amount;
    $date = date("F jS, Y h:i:s A");

    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    //echo $count = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        $balance = $row['deposit_w'];
        // $interest_w = $row['interest_w'];
    }


    $query = "UPDATE investors SET total_invest = total_invest + $amount";
    $query .= " WHERE username = '$username' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    // $query = "UPDATE investors SET deposit_w = $balance - '$amount'";
    // $query .= " WHERE username = '$username' ";
    // $update_investor_table =  mysqli_query($connection, $query);
    // ConfirmQuery($update_investor_table);

    // $t_balance = $balance - $amount;

    //$interest_w = $interest_w + $amount;

    //add details to transaction table
    $trascid = $transfer_  = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
    // $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
    // $query .= "VALUES('{$date}','{$trascid}','{$amount}','interest_w','Invested On Basic Plan','{$interest_w}', 'pluse','{$username}')";
    // $insert_proof = mysqli_query($connection, $query);
    // ConfirmQuery($insert_proof);

    $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
    $query .= "VALUES('{$date}','{$trascid}','{$amount}','deposit_w','MINNING ON PAGOLINMINER','{$balance}', 'minus','{$username}')";
    $insert_proof = mysqli_query($connection, $query);
    ConfirmQuery($insert_proof);

    $added_num_of_days = 30240; //minute days to add
    $current_date = date('Y-m-d H:i:s'); //current date 
    $newtimestamp = strtotime('' . $current_date . ' + ' . $added_num_of_days . ' minute');
    $date_to_stop =  date('Y-m-d H:i:s', $newtimestamp); //date to stop

    // adding investement details to investemrnt table
    $query = "INSERT INTO tbl_investement (invt_start_date, invt_end_date, user_id, status, plan, amount_invested, inv_type) ";
    $query .= "VALUES('{$current_date}','{$date_to_stop}','{$username}','Active','PAGOLINMINER', '{$amount}', 'Mining')";
    $insert_proof = mysqli_query($connection, $query);
    ConfirmQuery($insert_proof);
}

//AVALONMINER_PLAN plan fuc 
function AVALONMINER_PLAN($user_name, $amount)
{
    global $connection;
    $username =  $user_name;
    $amount =  $amount;
    $date = date("F jS, Y h:i:s A");

    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    //echo $count = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        $balance = $row['deposit_w'];
        // $interest_w = $row['interest_w'];
    }


    $query = "UPDATE investors SET total_invest = total_invest + $amount";
    $query .= " WHERE username = '$username' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    // $query = "UPDATE investors SET deposit_w = $balance - '$amount'";
    // $query .= " WHERE username = '$username' ";
    // $update_investor_table =  mysqli_query($connection, $query);
    // ConfirmQuery($update_investor_table);

    // $t_balance = $balance - $amount;

    //$interest_w = $interest_w + $amount;

    //add details to transaction table
    $trascid = $transfer_  = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
    // $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
    // $query .= "VALUES('{$date}','{$trascid}','{$amount}','interest_w','Invested On Basic Plan','{$interest_w}', 'pluse','{$username}')";
    // $insert_proof = mysqli_query($connection, $query);
    // ConfirmQuery($insert_proof);

    $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
    $query .= "VALUES('{$date}','{$trascid}','{$amount}','deposit_w','Mining On AVALONMINER','{$balance}', 'minus','{$username}')";
    $insert_proof = mysqli_query($connection, $query);
    ConfirmQuery($insert_proof);

    $added_num_of_days = 40320; //minute days to add 28 DAYS TOTAL
    $current_date = date('Y-m-d H:i:s'); //current date 
    $newtimestamp = strtotime('' . $current_date . ' + ' . $added_num_of_days . ' minute');
    $date_to_stop =  date('Y-m-d H:i:s', $newtimestamp); //date to stop

    // adding investement details to investemrnt table
    $query = "INSERT INTO tbl_investement (invt_start_date, invt_end_date, user_id, status, plan, amount_invested, inv_type) ";
    $query .= "VALUES('{$current_date}','{$date_to_stop}','{$username}','Active','AVALONMINER', '{$amount}', 'Mining')";
    $insert_proof = mysqli_query($connection, $query);
    ConfirmQuery($insert_proof);
}

//STARTERPLAN_PLAN  plan fuc 
function STARTER_PLAN($user_name, $amount)
{
    global $connection;
    $username =  $user_name;
    $amount =  $amount;
    $date = date("F jS, Y h:i:s A");

    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    //echo $count = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        $balance = $row['deposit_w'];
        // $interest_w = $row['interest_w'];
    }


    $query = "UPDATE investors SET total_invest = total_invest + $amount";
    $query .= " WHERE username = '$username' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    // $query = "UPDATE investors SET deposit_w = $balance - '$amount'";
    // $query .= " WHERE username = '$username' ";
    // $update_investor_table =  mysqli_query($connection, $query);
    // ConfirmQuery($update_investor_table);

    // $t_balance = $balance - $amount;

    //$interest_w = $interest_w + $amount;

    //add details to transaction table
    $trascid = $transfer_  = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
    // $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
    // $query .= "VALUES('{$date}','{$trascid}','{$amount}','interest_w','Invested On Basic Plan','{$interest_w}', 'pluse','{$username}')";
    // $insert_proof = mysqli_query($connection, $query);
    // ConfirmQuery($insert_proof);

    $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
    $query .= "VALUES('{$date}','{$trascid}','{$amount}','deposit_w','INVESTED On STARTER PLAN','{$balance}', 'minus','{$username}')";
    $insert_proof = mysqli_query($connection, $query);
    ConfirmQuery($insert_proof);

    $added_num_of_days = 4320; //minute days to add
    $current_date = date('Y-m-d H:i:s'); //current date 
    $newtimestamp = strtotime('' . $current_date . ' + ' . $added_num_of_days . ' minute');
    $date_to_stop =  date('Y-m-d H:i:s', $newtimestamp); //date to stop

    // adding investement details to investemrnt table
    $query = "INSERT INTO tbl_investement (invt_start_date, invt_end_date, user_id, status, plan, amount_invested, inv_type) ";
    $query .= "VALUES('{$current_date}','{$date_to_stop}','{$username}','Active','STARTER PLAN', '{$amount}', 'investement')";
    $insert_proof = mysqli_query($connection, $query);
    ConfirmQuery($insert_proof);
}

//GOLDPLAN_PLAN  plan fuc 
function GOLD_PLAN($user_name, $amount)
{
    global $connection;
    $username =  $user_name;
    $amount =  $amount;
    $date = date("F jS, Y h:i:s A");

    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    //echo $count = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        $balance = $row['deposit_w'];
        // $interest_w = $row['interest_w'];
    }


    $query = "UPDATE investors SET total_invest = total_invest + $amount";
    $query .= " WHERE username = '$username' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    // $query = "UPDATE investors SET deposit_w = $balance - '$amount'";
    // $query .= " WHERE username = '$username' ";
    // $update_investor_table =  mysqli_query($connection, $query);
    // ConfirmQuery($update_investor_table);

    // $t_balance = $balance - $amount;

    //$interest_w = $interest_w + $amount;

    //add details to transaction table
    $trascid = $transfer_  = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
    // $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
    // $query .= "VALUES('{$date}','{$trascid}','{$amount}','interest_w','Invested On Basic Plan','{$interest_w}', 'pluse','{$username}')";
    // $insert_proof = mysqli_query($connection, $query);
    // ConfirmQuery($insert_proof);

    $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
    $query .= "VALUES('{$date}','{$trascid}','{$amount}','deposit_w','INVESTED On GOLD PLAN','{$balance}', 'minus','{$username}')";
    $insert_proof = mysqli_query($connection, $query);
    ConfirmQuery($insert_proof);

    $added_num_of_days = 10080; //minute days to add 3days
    $current_date = date('Y-m-d H:i:s'); //current date 
    $newtimestamp = strtotime('' . $current_date . ' + ' . $added_num_of_days . ' minute');
    $date_to_stop =  date('Y-m-d H:i:s', $newtimestamp); //date to stop

    // adding investement details to investemrnt table
    $query = "INSERT INTO tbl_investement (invt_start_date, invt_end_date, user_id, status, plan, amount_invested, inv_type) ";
    $query .= "VALUES('{$current_date}','{$date_to_stop}','{$username}','Active','GOLDP LAN', '{$amount}', 'investement')";
    $insert_proof = mysqli_query($connection, $query);
    ConfirmQuery($insert_proof);
}

//PREMIUMPLAN_PLAN  plan fuc 
function PREMIUM_PLAN($user_name, $amount)
{
    global $connection;
    $username =  $user_name;
    $amount =  $amount;
    $date = date("F jS, Y h:i:s A");

    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    //echo $count = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        $balance = $row['deposit_w'];
        // $interest_w = $row['interest_w'];
    }


    $query = "UPDATE investors SET total_invest = total_invest + $amount";
    $query .= " WHERE username = '$username' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    // $query = "UPDATE investors SET deposit_w = $balance - '$amount'";
    // $query .= " WHERE username = '$username' ";
    // $update_investor_table =  mysqli_query($connection, $query);
    // ConfirmQuery($update_investor_table);

    // $t_balance = $balance - $amount;

    //$interest_w = $interest_w + $amount;

    //add details to transaction table
    $trascid = $transfer_  = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
    // $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
    // $query .= "VALUES('{$date}','{$trascid}','{$amount}','interest_w','Invested On Basic Plan','{$interest_w}', 'pluse','{$username}')";
    // $insert_proof = mysqli_query($connection, $query);
    // ConfirmQuery($insert_proof);

    $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
    $query .= "VALUES('{$date}','{$trascid}','{$amount}','deposit_w','INVESTED On PREMIUM PLAN','{$balance}', 'minus','{$username}')";
    $insert_proof = mysqli_query($connection, $query);
    ConfirmQuery($insert_proof);

    $added_num_of_days = 20160; //minute days to add 14days
    $current_date = date('Y-m-d H:i:s'); //current date 
    $newtimestamp = strtotime('' . $current_date . ' + ' . $added_num_of_days . ' minute');
    $date_to_stop =  date('Y-m-d H:i:s', $newtimestamp); //date to stop

    // adding investement details to investemrnt table
    $query = "INSERT INTO tbl_investement (invt_start_date, invt_end_date, user_id, status, plan, amount_invested, inv_type) ";
    $query .= "VALUES('{$current_date}','{$date_to_stop}','{$username}','Active','PREMIUM PLAN', '{$amount}', 'investement')";
    $insert_proof = mysqli_query($connection, $query);
    ConfirmQuery($insert_proof);
}

//PLATINUMPLAN_PLAN  plan fuc 
function PLATINUM_PLAN($user_name, $amount)
{
    global $connection;
    $username =  $user_name;
    $amount =  $amount;
    $date = date("F jS, Y h:i:s A");

    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    //echo $count = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        $balance = $row['deposit_w'];
        // $interest_w = $row['interest_w'];
    }


    $query = "UPDATE investors SET total_invest = total_invest + $amount";
    $query .= " WHERE username = '$username' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    // $query = "UPDATE investors SET deposit_w = $balance - '$amount'";
    // $query .= " WHERE username = '$username' ";
    // $update_investor_table =  mysqli_query($connection, $query);
    // ConfirmQuery($update_investor_table);

    // $t_balance = $balance - $amount;

    //$interest_w = $interest_w + $amount;

    //add details to transaction table
    $trascid = $transfer_  = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
    // $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
    // $query .= "VALUES('{$date}','{$trascid}','{$amount}','interest_w','Invested On Basic Plan','{$interest_w}', 'pluse','{$username}')";
    // $insert_proof = mysqli_query($connection, $query);
    // ConfirmQuery($insert_proof);

    $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
    $query .= "VALUES('{$date}','{$trascid}','{$amount}','deposit_w','INVESTED On PLATINUM PLAN','{$balance}', 'minus','{$username}')";
    $insert_proof = mysqli_query($connection, $query);
    ConfirmQuery($insert_proof);

    $added_num_of_days = 30240; //minute days to add 21days
    $current_date = date('Y-m-d H:i:s'); //current date 
    $newtimestamp = strtotime('' . $current_date . ' + ' . $added_num_of_days . ' minute');
    $date_to_stop =  date('Y-m-d H:i:s', $newtimestamp); //date to stop

    // adding investement details to investemrnt table
    $query = "INSERT INTO tbl_investement (invt_start_date, invt_end_date, user_id, status, plan, amount_invested, inv_type) ";
    $query .= "VALUES('{$current_date}','{$date_to_stop}','{$username}','Active','PLATINUM PLAN', '{$amount}', 'investement')";
    $insert_proof = mysqli_query($connection, $query);
    ConfirmQuery($insert_proof);
}

//EXLUSIVEVIPPLAN_PLAN  plan fuc 
function EXLUSIVE_VIP_PLAN($user_name, $amount)
{
    global $connection;
    $username =  $user_name;
    $amount =  $amount;
    $date = date("F jS, Y h:i:s A");

    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$username'");
    //echo $count = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        $balance = $row['deposit_w'];
        // $interest_w = $row['interest_w'];
    }


    $query = "UPDATE investors SET total_invest = total_invest + $amount";
    $query .= " WHERE username = '$username' ";
    $update_investor_table =  mysqli_query($connection, $query);
    ConfirmQuery($update_investor_table);

    // $query = "UPDATE investors SET deposit_w = $balance - '$amount'";
    // $query .= " WHERE username = '$username' ";
    // $update_investor_table =  mysqli_query($connection, $query);
    // ConfirmQuery($update_investor_table);

    // $t_balance = $balance - $amount;

    //$interest_w = $interest_w + $amount;

    //add details to transaction table
    $trascid = $transfer_  = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
    // $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
    // $query .= "VALUES('{$date}','{$trascid}','{$amount}','interest_w','Invested On Basic Plan','{$interest_w}', 'pluse','{$username}')";
    // $insert_proof = mysqli_query($connection, $query);
    // ConfirmQuery($insert_proof);

    $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
    $query .= "VALUES('{$date}','{$trascid}','{$amount}','deposit_w','INVESTED On EXLUSIVE VIP PLAN','{$balance}', 'minus','{$username}')";
    $insert_proof = mysqli_query($connection, $query);
    ConfirmQuery($insert_proof);

    $added_num_of_days = 44640; //minute days to add 31days
    $current_date = date('Y-m-d H:i:s'); //current date 
    $newtimestamp = strtotime('' . $current_date . ' + ' . $added_num_of_days . ' minute');
    $date_to_stop =  date('Y-m-d H:i:s', $newtimestamp); //date to stop

    // adding investement details to investemrnt table
    $query = "INSERT INTO tbl_investement (invt_start_date, invt_end_date, user_id, status, plan, amount_invested, inv_type) ";
    $query .= "VALUES('{$current_date}','{$date_to_stop}','{$username}','Active','EXLUSIVE VIP PLAN', '{$amount}', 'investement')";
    $insert_proof = mysqli_query($connection, $query);
    ConfirmQuery($insert_proof);
}
