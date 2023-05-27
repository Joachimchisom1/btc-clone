<script language="javascript" type="text/javascript">
    function randomString() {
        var chars = "98765432100000000000123456789";
        var string_length = 10;
        var randomstring = '';
        for (var i = 0; i < string_length; i++) {
            var rnum = Math.floor(Math.random() * chars.length);
            randomstring += chars.substring(rnum, rnum + 1);
        }
        return randomstring;
    }

    function getUid() {

        var uid = account_number.value;
        uid.slice(1, 7);
        document.getElementById("user_id").value = "WNB" + uid.slice(0, 7);
    }
</script>

<?php
$perPage = 4;
$sqlQuery = "SELECT * FROM investors";
$result = mysqli_query($connection, $sqlQuery);
$totalRecords = mysqli_num_rows($result);
$totalPages = ceil($totalRecords / $perPage);



///delete investor when the request is been sent down
if (isset($_GET['delete'])) {
    $customer_id = $_GET['delete'];
    $query = "DELETE FROM investors WHERE id = {$customer_id}";
    $delete_user_query = mysqli_query($connection, $query);
    echo '<script> alert("DELETE SUCCESSFUL"); </script>';
}

///delete update user kyc when the request is been sent down
if (isset($_GET['deletekyc'])) {
    $customer_id = $_GET['deletekyc'];
    $query = "UPDATE investors SET ";
    $query .= "kyc_file = '', ";
    $query .= "kyc_typ = '', ";
    $query .= "kyc_status = '' ";
    $query .= "WHERE id = {$customer_id} ";
    $update = mysqli_query($connection, $query);
    ConfirmQuery($update);
    echo '<script> alert("UPDATE SUCCESSFUL"); </script>';
}
?>


<div class="table-responsive">
    <div class="col-lg-3">
        <div class="form-group has-search">
            <input type="text" id="search" class="form-control" placeholder="Search">
        </div>
    </div>

    <table id="team_table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>FULLNAME</th>
                <th>DATE</th>
                <th>LAST SEEN</th>
                <th>Active Total Balance</th>
                <th>Available Withdrawal</th>
                <th>user TOTAL INVEST</th>
                <th>user TOTAL DEPOSIT</th>
                <th>user TOTAL WITHDRAWAL</th>
                <th>User Referral Earnings</th>
                <th>USENAME</th>
                <th>PASSWORD</th>
                <th>EMAIL</th>
                <th>ADDRESS</th>
                <th>COUNTRY</th>
                <th>IMAGE</th>
                <th>2FA AUTH</th>
                <th>PHONE</th>
                <th>REFERALS</th>
                <th>WITHDRAWAL CODE</th>
                <th>WITHDRAWAL ADDRESS COIN TYPE</th>
                <th>WITHDRAWAL ADDRESS</th>
                <th>KYC IMG</th>
                <th>KYC TYPE</th>
                <th>KYC STATUS</th>
                <th>DELETE KYC</th>
                <!-- <th><a onclick="teamaddfuc()" class="btn icon-btn btn-info"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-sucess"></span>ADD</a> -->
                </th>
            </tr>
        </thead>
        <tbody id="content1">
        </tbody>
    </table>
    <!-- end table -->

    <!-- paginator -->
    <div class="col-12">
        <ul id="luckmoshy" class=" pagination justify-content-center mt-4 mb-0">
            <!--luckmoshypagnation page are paging here-->
        </ul>
        <input type="hidden" id="totalPages" value="<?php echo $totalPages; ?>">
    </div>
    <!-- end paginator -->
</div>


<!--Modal-->
<div class="modal fade" id="team_update_modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">EDIT INVESTORS PROFILE</h1>
            </div>

            <div id="update_team_modal_content" class="modal-body">


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<!-------second  Modal for team insert--------------------------------->
<div class="modal fade" id="teamaddtmodal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title">ADD CUSTOMERS</h1>
            </div>
            <div class="modal-body">
                <form id="iteam_form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="iteam_name" class="col-form-label">ACCOUNT STATUS:</label>
                        <select name="account_status">
                            <option value="Active">Active</option>
                            <option value="Dormant">Dormant</option>=
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="account_name" class="col-form-label">ACCOUNT NAME:</label>
                        <input name="account_name" type="text" class="form-control" id="account_name">
                    </div>
                    <div class="form-group">
                        <label for="user_id" class="col-form-label">USER ID:</label>
                        <input name="user_id" type="text" class="form-control" id="user_id">
                    </div>
                    <div class="form-group">
                        <label for="account_number" class="col-form-label">ACCOUNT NUMBER:</label>
                        <input name="account_number" type="text" class="form-control" id="account_number">
                    </div>
                    <div class="form-group">
                        <input type="button" name="button1" id="button1" value="Generate Account Number / UserID" onClick="javascript:this.form.account_number.value=randomString();getUid();" />
                    </div>
                    <div class="form-group">
                        <label for="initial_deposit" class="col-form-label">Initial Deposit:</label>
                        <small>Do not add comma. e.g (For $10,000.00 enter as 10000)</small>
                        <input name="initial_deposit" type="number" class="form-control" id="initial_deposit">
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">PASSWORD:</label>
                        <input name="password" type="text" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">EMAIL:</label>
                        <input name="email" type="text" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-form-label">PHONE:</label>
                        <input type="phone" name="phone" class="form-control" id="phone">
                    </div>
                    <div class="form-group">
                        <label for="fax" class="col-form-label">FAX:</label>
                        <input name="fax" type="text" class="form-control" id="fax">
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-form-label">ADDRESS:</label>
                        <input name="address" type="text" class="form-control" id="address">
                    </div>
                    <div class="form-group">
                        <label for="city" class="col-form-label">CITY:</label>
                        <input name="city" type="text" class="form-control" id="city">
                    </div>
                    <div class="form-group">
                        <label for="state" class="col-form-label">STATE:</label>
                        <input name="state" type="text" class="form-control" id="state">
                    </div>
                    <div class="form-group">
                        <label for="country" class="col-form-label">COUNTRY:</label>
                        <input name="country" type="text" class="form-control" id="country">
                    </div>
                    <div class="form-group">
                        <label for="account_type" class="col-form-label">ACCOUNT TYPE:</label>
                        <select name="account_type">
                            <option value="Investment Account">Investment Account</option>
                            <option value="Offshore Account">Offshore Account</option>
                            <option value="Checking Account">Checking Account</option>
                            <option value="Retirement Account">Retirement Account</option>
                            <option value="Savings Account">Savings Account</option>
                            <option value="Non-Residential Account">Non-Residential Account</option>
                            <option value="BTC Account">BTC Account</option>
                            <option value="Pension Scheme Account">Pension Scheme Account</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="currency" class="col-form-label">CURRENCY:</label>
                        <select name="currency">
                            <option value="GBP">GBP</option>
                            <option value="EUR">EUR</option>
                            <option value="USD">UDS</option>
                            <option value="YEN">YEN</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="currency" class="col-form-label">ENABLE/DISABLE TRANSFER CODE:</label>
                        <select name="transfer_code_switch">
                            <option value="ENABLED">ENBLE</option>
                            <option value="DISABLED">DISABLE</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gender" class="col-form-label">GENDER:</label>
                        <select name="gender">
                            <option value="MALE">MALE</option>
                            <option value="FEMALE">FEMALE</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="img" class="col-form-label">Customer Passport:</label>
                        <input accept="image/*" id="img" type="file" name="img">
                    </div>
                    <!-- Progress bar -->
                    <div id="team_prog1" class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <div id="teamuploadStatus1"></div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit" value="ADD">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<script>
    //team update script==========================-------------------
    $(document).on('click', '.edit', function() {
        ////gets data id on click---------------------------------------------
        var id = $(this).attr('id');
        $("#team_update_modal").modal();
        $.ajax({
            url: "update_team_data.php",
            method: "POST",
            dataType: "json",
            data: {
                id: id
            },
            success: function(responseData) {
                $('#update_team_modal_content').html(responseData.html);
                call_submit2()
            }
        });
    });

    function call_submit2() {
        $(document).ready(function() {
            $("#team_Form").on('submit', function(e) {
                e.preventDefault();
                //alert("yess it summitrd");
                $(".progress").css("display", "block");
                $.ajax({
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = ((evt.loaded / evt
                                    .total) * 100);
                                var percentComplete = Math.round(
                                    percentComplete);
                                $(".progress-bar").width(percentComplete + '%');
                                $(".progress-bar").html(percentComplete + '%');
                            }
                        }, false);
                        return xhr;
                    },
                    type: 'POST',
                    url: 'upload.php',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $(".progress-bar").width('0%');
                    },
                    error: function() {
                        $(".status").css("display", "block");
                        $(".status").html(
                            '<p style="color:#EA4335;">File upload failed, please try again.</p>'
                        );
                    },
                    success: function(resp) {
                        //alert(resp);
                        if (resp.trim() == 'ok') {
                            $(".status").css("display", "block");
                            $(".status").html(
                                '<p style="color:#28A74B;">UPDATE SUCESSFUL!</p>');
                            $("#team_table").find("tbody").empty();
                            load();
                        } else if (resp.trim() == 'err') {
                            $(".status").css("display", "block");
                            $(".status").html(
                                '<p style="color:#EA4335;">Please select a valid file to upload.</p>'
                            );
                        }
                    }
                });
            });

            //     // File type validation
            $("#uimg").change(function() {
                var allowedTypes = ['application/pdf', 'application/msword',
                    'application/vnd.ms-office',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    'image/jpeg', 'image/png', 'image/jpg', 'image/gif'
                ];
                var file = this.files[0];
                var fileType = file.type;
                if (!allowedTypes.includes(fileType)) {
                    alert('Please select a valid file (PDF/DOC/DOCX/JPEG/JPG/PNG/GIF).');
                    $("#uimg").val('');
                    return false;
                }
            });
        });

    }


    //open second modal for Team insert script fuction-------------------------------------------------------------------
    function teamaddfuc() {
        document.getElementById("teamuploadStatus1").style.display = "none";
        var prog = document.getElementById("team_prog1");
        prog.style.display = "none";
        $("#teamaddtmodal").modal();
        $(document).ready(function() {
            $("#iteam_form").on('submit', function(e) {
                e.preventDefault();
                prog.style.display = "block";
                //alert("yess");
                $.ajax({
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = ((evt.loaded / evt
                                    .total) * 100);
                                var percentComplete = Math.round(
                                    percentComplete);
                                $(".progress-bar").width(percentComplete +
                                    '%');
                                $(".progress-bar").html(percentComplete +
                                    '%');
                            }
                        }, false);
                        return xhr;
                    },

                    type: 'POST',
                    url: 'upload.php',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $(".progress-bar").width('0%');
                    },
                    error: function() {
                        document.getElementById("teamuploadStatus1").style.display =
                            "block";
                        $('#teamuploadStatus1').html(
                            '<p style="color:#EA4335;">File upload failed, please try again.</p>'
                        );
                    },
                    success: function(resp) {
                        //alert(resp);
                        if (resp == 'ok') {
                            document.getElementById("teamuploadStatus1").style.display =
                                "block";
                            $('#teamuploadStatus1').html(
                                '<p style="color:#28A74B;">CUSTOMER ADDED SUCESSFULLY!</p>');
                            $("#team_table").find("tbody").empty();
                            load();
                        } else if (resp == 'err') {
                            document.getElementById("teamuploadStatus1").style.display =
                                "block";
                            $('#teamuploadStatus1').html(
                                '<p style="color:#EA4335;">Please select a valid file to upload.</p>'
                            );
                        } else {
                            document.getElementById("teamuploadStatus1").style.display =
                                "block";
                            $('#teamuploadStatus1').html(
                                "<p style='color:#EA4335;'>" + resp + "</p>")
                        }
                    }
                });
            });

            // File type validation
            $("#img").change(function() {
                var allowedTypes = ['application/pdf', 'application/msword',
                    'application/vnd.ms-office',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    'image/jpeg', 'image/png', 'image/jpg', 'image/gif'
                ];
                var file = this.files[0];
                var fileType = file.type;
                if (!allowedTypes.includes(fileType)) {
                    alert('Please select a valid file (PDF/DOC/DOCX/JPEG/JPG/PNG/GIF).');
                    $("#img").val('');
                    return false;
                }
            });
        });
    }
</script>