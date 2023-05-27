<div class="table-responsive">
    <table id="sample_data" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>DATE</th>
                <th>TRANSACTION ID</th>
                <th>AMOUNT</th>
                <th>WALLET</th>
                <th>DETAIL</th>
                <th>USERNAME</th>
                <th>POST BALANCE</th>
                <th>TYPE</th>
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
                url: "transfer_data_fetch.php",
                type: "POST"
            }
        });
        $('#sample_data').on('draw.dt', function() {
            $('#sample_data').Tabledit({
                url: 't_history_action.php',
                dataType: 'json',
                columns: {
                    identifier: [0, 'id'],
                    editable: [
                        //[1, 'date'],
                        [2, 'transaction_id'],
                        [3, 'amount'],
                        [4, 'wallet'],
                        [5, 'detail'],
                        [6, 'username'],
                        [7, 'post_balance'],
                        [8, 'type'],
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
            $("input[name='date']").attr("type", "date");
        });

    });
</script>