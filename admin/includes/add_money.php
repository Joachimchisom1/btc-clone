
<form action="" method="POST">
    <h3>Add money with details</h3>
    <div class="form-row">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputCity">select User name</label>
                <select required name="username" id="username" class="form-control">
                    <!-- <option selected value="">Select user by username</option> -->
                    <?php
                    $query = "SELECT * FROM investors  ";
                    $select_categories = mysqli_query($connection, $query);
                    ConfirmQuery($select_categories);
                    while ($row = mysqli_fetch_assoc($select_categories)) {
                        $username =  $row['username'];
                        echo " <option value=''>slect user by username</option>";
                        echo " <option value='$username'>$username</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="amount">Amount </label><small>(For $10,000.00 enter as 10000)</small>
                <input required type="number" placeholder="Enter Amount" class="form-control" name="amount" id="amount">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="detail">Details</label>
                <input required type="text" placeholder="Enter detail" class="form-control" name="detail" id="detail">
            </div>
            <!-- <div class="form-group col-md-4">
                <label for="detail">Detail</label>
                <input required type="text" placeholder="Enter Detail" class="form-control" name="detail" id="detail">
            </div> -->
            <div class="form-group col-md-6">
                <label for="Cunrrency">Select Wallet</label>
                <select required name="wallet" id="wallet" class="form-control">
                    <option value="" selected disabled hidden>
                        Select Wallet
                    </option>
                    <option value="deposit_w">Deposit Wallet</option>
                    <option value="interest_w">Interest Wallet</option>
                    <option value="referral_e">Referral Earnings Wallet</option>
                </select>
            </div>
        </div>

        <button name="add_funds" type="submit" class="btn btn-primary">Add</button>
</form>
<?php
///fubds insert fuction-------------------------------------------------
if (isset($_POST['add_funds'])) {
    $amount = $_POST['amount'];
    $detail = $_POST['detail'];
    $user = $_POST['username'];
    $wallet = $_POST['wallet'];
    $date = date("F jS, Y h:i:s A");
    $trascid = $transfer_  = substr(str_shuffle("01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);


    $result = mysqli_query($connection, "SELECT * FROM investors WHERE username = '$user'");
    $count = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        if ($wallet == "deposit_w") {
            $balance = $row['deposit_w'];
        } else if ($wallet == "interest_w") {
            $balance = $row['interest_w'];
        } else if ($wallet == "referral_e") {
            $balance = $row['referral_e'];
        }
    }
    $main_balance = $balance + $amount;

    $query = "UPDATE investors SET $wallet = $wallet + '$amount', total_deposit = total_deposit + '$amount'";
    $query .= " WHERE username = '$user' ";
    $update_investor_table =  mysqli_query($connection, $query);

    ConfirmQuery($update_investor_table);

    $query = "INSERT INTO transactions (date, transaction_id, amount, wallet, detail, post_balance, type, username) ";
    $query .= "VALUES('{$date}','{$trascid}','{$amount}','{$wallet}','{$detail}','{$main_balance}', 'pluse','{$user}')";
    $insert_proof = mysqli_query($connection, $query);
    ConfirmQuery($insert_proof);
    echo '<script>alert("Money Added Successfully!")</script>';
}


if (isset($_POST['add2'])) {
    $user_id = $_POST['userid1'];
    $amount = $_POST['amount1'];
    $result = mysqli_query($connection, "SELECT * FROM customers WHERE userid = '$user_id'");
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        echo '<script> alert("USER NOT FOUND"); </script>';
    } else {
        $query = "UPDATE customers SET account_balance = account_balance + '$amount'";
        $query .= " WHERE userid = '$user_id' ";
        $update_customers_table =  mysqli_query($connection, $query);
        ConfirmQuery($update_customers_table);
        echo '<script> alert("MONEY ADDED SUCCESFULLY"); </script>';
    }
}


?>