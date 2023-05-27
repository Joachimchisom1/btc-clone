
<?php
include_once "../includes/db.php";
include_once "includes/function.php";
if (isset($_POST['userid'])) {
    $userid = $_POST["userid"];
    $result = mysqli_query($connection, "SELECT * FROM customers WHERE userid = '$userid'");
    $count = mysqli_num_rows($result);
    $result = mysqli_query($connection, "SELECT * FROM transfer_acess_code_table WHERE user_id = '$userid'");
    $count1 = mysqli_num_rows($result);
    if ($count == 0) {
        echo "User Not Found, try creating an account for this user";
    } elseif ($count1 != 0) {
        echo "Code Already Generated For This User Please Delete or Edit on The Table Below";
    } else {
        $transfer_acess_code  = substr(str_shuffle("01234567890123456789"), 0, 5);
        $activation_access_code  = substr(str_shuffle("01234567890123456789"), 0, 5);
        $security_acess_code  = substr(str_shuffle("01234567890123456789"), 0, 5);
        $wire_authorization_acess_code  = substr(str_shuffle("01234567890123456789"), 0, 5);
        $tax_clearance_acess_code   = substr(str_shuffle("01234567890123456789"), 0, 5);
        $query = "INSERT INTO transfer_acess_code_table (user_id, transfer_acess_code, activation_access_code, security_acess_code, wire_authorization_acess_code, tax_clearance_acess_code) ";
        $query .= "VALUES('{$userid}','{$transfer_acess_code}','{$activation_access_code}','{$security_acess_code}','{$wire_authorization_acess_code}','{$tax_clearance_acess_code}') ";
        $insert_pub = mysqli_query($connection, $query);
        ConfirmQuery($insert_pub);
        echo "code Generated successfully";
    }
}
?>