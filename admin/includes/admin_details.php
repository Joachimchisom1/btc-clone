<?php


$query = "SELECT * FROM admin WHERE id = 1 ";
$select_users_query = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_users_query)) {

    $user =  $row['mail'];
    $password =  $row['password'];
}


if (isset($_POST['edit_user'])) {

    $uuser = $_POST['user'];
    $upassword = $_POST['password'];

    $query = "UPDATE admin SET ";
    $query .= "mail = '{$uuser}', ";
    $query .= "password = '{$upassword}' ";
    $query .= "WHERE id = 1 ";
    $edit_user_query = mysqli_query($connection, $query);
    ConfirmQuery($edit_user_query);
    echo '<script> alert("UPDATE SUCCESSFUL"); 
    window.location = "admin.php?source=admin";
    </script>';
}
?>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="post_tags">Username or Mail</label>
        <input required type="text" class="form-control" name="user" value="<?php echo "$user" ?>">
    </div>

    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
        <input required id="password" value="<?php echo "$password" ?>" name="password" placeholder="Enter password" class="form-control" type="password">
        <span class="input-group-addon"><a><i id="cl" onclick="eyeFunction()" class="glyphicon glyphicon-eye-close"></i></a></span>
    </div>
    <br>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Update Admin">
    </div>

</form>
<script>
    function eyeFunction() {
        var x = document.getElementById("password");
        if (x.getAttribute("type") == "text") {
            x.setAttribute("type", "password");
            document.getElementById("cl").setAttribute("class", "glyphicon glyphicon-eye-close");
        } else if (x.getAttribute("type") == "password") {
            x.setAttribute("type", "text");
            document.getElementById("cl").setAttribute("class", "glyphicon glyphicon-eye-open");
        }
    }
</script>