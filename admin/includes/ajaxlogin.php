<?php include "../../includes/db.php"  ?>
<?php include "function.php"; ?>
<?php session_start()  ?>
<?php
if (isset($_GET['password'])) {
    $mail = $_GET['user'];
    $password = $_GET['password'];
    $mail = mysqli_real_escape_string($connection, $mail);
    $password = mysqli_real_escape_string($connection, $password);

    $result = mysqli_query($connection, "SELECT * FROM admin WHERE mail = '$mail'");
    $count = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $user = $row['mail'];
        $password1 = $row['password'];
    }
    if ($count == 0) {
        echo "User Not Found";
    } else {
        if ($password1 == $password) {
            $_SESSION['id'] = $id;
            $_SESSION['mail'] = $user;
            $_SESSION['key'] = "6sd5frgedwh87f6ed5YY89(*^%#@#$";
            echo "ok";
        } else {
            echo 'Invalid Password';
        }
    }
}
?>