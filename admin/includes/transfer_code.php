<form id="transfer_codes">

    <div class="form-group">
        <label for="password" class="col-form-label">User Id:</label>
        <input name="userid" placeholder="Enter User id To Generate Transfer Codes" type="text" class="form-control" id="password">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Generate Code">
    </div>
</form>
</div>
<!-- <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div> -->
<div class="table-responsive">
    <table id="sample_data" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>USER ID</th>
                <th>TRANSFER AC</th>
                <th>ACTIVATION AC</th>
                <th>SECURITY AC</th>
                <th>WIRE AUTH AC</th>
                <th>TAX CLEARNCE AC</th>
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
                url: "fetch.php",
                type: "POST"
            }
        });

        $('#sample_data').on('draw.dt', function() {
            $('#sample_data').Tabledit({
                url: 'action.php',
                dataType: 'json',
                columns: {
                    identifier: [0, 'user_id'],
                    editable: [
                        [1, 'transfer_acess_code'],
                        [2, 'activation_access_code'],
                        [3, 'security_acess_code'],
                        [4, 'wire_authorization_acess_code'],
                        [5, 'tax_clearance_acess_code']
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