<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM wallet__addreses WHERE id = '$id'";
    $details = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($details)) {
        $address_name = $row['address_name'];
        $address_hash = $row['address_hash'];
    }
}


if (isset($_POST['update'])) {

    $address = $_POST['address'];
    $query = "UPDATE wallet__addreses SET ";
    $query .= "address_hash = '{$address}'";
    $query .= "WHERE id = '{$id}'";
    $update = mysqli_query($connection, $query);
    ConfirmQuery($update);
    echo '<script>alert("Update Successfully!");</script>';
    header("Location: admin.php?source=wallet_address");
}
?>
<h1>edit wallet address</h1>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <form method="POST" action="#">
                <div class="form-group">
                    <label for="exampleInputEmail1"><?php echo $address_name; ?> address</label>
                    <input type="text" class="form-control" value="<?php echo $address_hash; ?>" name="address">
                </div>
                <button name="update" type="submit" class="btn btn-primary">update</button>
            </form>
        </div>
    </div>
</div>