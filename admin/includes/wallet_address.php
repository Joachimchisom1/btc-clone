<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">coin</th>
            <th scope="col">address</th>
            <th scope="col">edit</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM wallet__addreses";
        $details = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($details)) {
            $id = $row['id'];
            $address_name = $row['address_name'];
            $address_hash = $row['address_hash'];
        ?>
            <tr>
                <th scope="row"><?php echo $id; ?></th>
                <th scope="row"><?php echo $address_name; ?></th>
                <th scope="row"><?php echo $address_hash; ?></th>
                <th scope="row"><a href="admin.php?source=edit_wallet_address&id=<?php echo $id; ?>">Edit</a></th>
            </tr>
        <?php } ?>
    </tbody>
</table>