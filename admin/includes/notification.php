<h2>Notifications</h2>
<form method="POST" action="">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="note_title">Notification Title</label>
            <input required type="text" placeholder="Enter Notification Title Here" class="form-control" name="note_title" id="inputCity">
        </div>
        <div class="form-group col-md-6">
            <label for="userid">User id</label>
            <input required type="text" placeholder="Enter User Id Here" class="form-control" name="userid">
        </div>
    </div>
    <div class="form-group">
        <label for="note_mssg" class="col-form-label">Notification Mssg:</label>
        <textarea class="form-control" name="note_mssg" id="note_mssg" cols="30" rows="2"></textarea>
    </div>
    <div class="form-group">
        <input required name="send_Notification" placeholder="Enter Notification Mssg Here" class="btn btn-primary" type="submit" value="Send Notification">
    </div>
</form>
</div>

<div class="table-responsive">
    <table id="sample_data" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>USER ID</th>
                <th>NOTIFICATION TITLE</th>
                <th>NOTIFICATION MSSG</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<script type="text/javascript" language="javascript">
    $(document).ready(function() {

        var dataTable = $('#sample_data').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "notification_fetch.php",
                type: "POST"
            }
        });

        $('#sample_data').on('draw.dt', function() {
            $('#sample_data').Tabledit({
                url: 'notification_action.php',
                dataType: 'json',
                columns: {
                    identifier: [0, 'id'],
                    editable: [
                      //  [1, 'transfer_acess_code'],
                        [2, 'title'],
                        [3, 'mssg']
                    ]
                },
                restoreButton: false,
                onSuccess: function(data, textStatus, jqXHR) {
                    if (data.action == 'delete') {
                        $('#' + data.id).remove();
                        $('#sample_data').DataTable().ajax.reload();
                    }
                }
            });
        });

    });
</script>
<script>
    $(document).ready(function() {
        $("#transfer_codes").on('submit', function(e) {
            e.preventDefault();
            //alert("yess it summitrd");
            $.ajax({
                type: 'POST',
                url: 'transfer_code.php',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(responseData) {
                    alert(responseData);
                    if (responseData.trim() == "code Generated successfully") {
                        $('#sample_data').DataTable().ajax.reload();
                    }
                }
            });
        });
    });
</script>


<?php
// include_once "../includes/db.php";
// include_once "includes/function.php";
if (isset($_POST['send_Notification'])) {
    $user_id = $_POST["userid"];
    //echo "its set";
    $result = mysqli_query($connection, "SELECT * FROM customers WHERE userid = '{$user_id}'");
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        echo '<script> alert("User Not Found, try creating an account for this user"); </script>';
    } else {
        $note_mssg = $_POST["note_mssg"];
        $note_title = $_POST["note_title"];
        $query = "INSERT INTO notfications (user_id, title, mssg) ";
        $query .= "VALUES('{$user_id}','{$note_title}','{$note_mssg}') ";
        $insert_pub = mysqli_query($connection, $query);
        ConfirmQuery($insert_pub);
        echo '<script> alert("Sent Sucessfully"); </script>';
    }
}
?>