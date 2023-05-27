<?php

$perPage = 5;
$sqlQuery = "SELECT * FROM events";
$result = mysqli_query($connection, $sqlQuery);
$totalRecords = mysqli_num_rows($result);
$totalPages = ceil($totalRecords / $perPage);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM events WHERE id = {$id}";
    $query = mysqli_query($connection, $query);
}
?>
<script src="plugin/plug.js"></script>
<script src="js/event.js"></script>

<div class="table-responsive">
    <div class="col-lg-3">
        <div class="form-group has-search">
            <input type="text" id="search" class="form-control" placeholder="Search">
        </div>
    </div>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>TITLE</th>
                <th>DATE</th>
                <th>TIME</th>
                <th>LOCATION</th>
                <th>DESCRIPTION</th>
                <th>IMAGE</th>
                <th><a onclick="eventinsert()" class="btn icon-btn btn-info"><span
                            class="glyphicon btn-glyphicon glyphicon-plus img-circle text-sucess"></span>ADD</a>
                </th>
            </tr>
        </thead>
        <tbody id="content1">
        </tbody>
    </table>
    <input type="hidden" id="totalPages" value="<?php echo $totalPages; ?>">
    <!-- end table -->

    <!-- paginator -->
    <div class="col-12">
        <div class="paginator-wrap">
            <div id="pagination">
                <ul class="paginator">
                </ul>
            </div>
        </div>
    </div>
    <!-- end paginator -->
</div>


<!--add Modal for events-->
<div class="modal fade" id="event_update_modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div id="update_event_modal_content" class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>



<!-------second  Modal for event insert--------------------------------->
<div class="modal fade" id="eventisertmodal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title">Add Event</h1>
            </div>

            <div class="modal-body">
            <form id="ievent_form" enctype="multipart/form-data">
                    <input hidden name="event_id" id="event_id">
                    <div class="form-group">
                        <label for="ievent_title" class="col-form-label">TITLE:</label>
                        <input required name="ievent_title" type="text" class="form-control" id="ievent_title">
                    </div>
                    <div class="form-group">
                        <label for="ievent_date" class="col-form-label">DATE:</label>
                        <input required name="ievent_date" type="text" class="form-control" id="ievent_date">
                    </div>
                    <div class="form-group">
                        <label for="ievent_time" class="col-form-label">TIME:</label>
                        <input required name="ievent_time" type="text" class="form-control" id="ievent_time">
                    </div>
                    <div class="form-group">
                        <label for="ievent_locaton" class="col-form-label">LOCATION:</label>
                        <input required name="ievent_location" type="text" class="form-control" id="ievent_location">
                    </div>
                    <div class="form-group">
                        <label for="ievent_description" class="col-form-label">DESCRIPTION:</label>
                        <input required type="text" name="ievent_description" class="form-control" id="ievent_description">
                    </div>
                    <div class="form-group">
                        <input required accept="image/*" id="imgup" type="file" name="ievtimages">
                    </div>
                    <!-- Progress bar -->
                    <div id="event_prog1" class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <div id="eventuploadStatus1"></div>

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
//evente update script==========================-------------------
$(document).on('click', '.edit', function() {
        ////gets data id on click---------------------------------------------
        var id = $(this).attr('id');
        $("#event_update_modal").modal();
        $.ajax({
            url: "update_events_data.php",
            method: "POST",
            dataType: "json",
            data: {
                id: id
            },
            success: function(responseData) {
                $('#update_event_modal_content').html(responseData.html);
                call_submit1()
            }
        });
    });

    function call_submit1() {
        $(document).ready(function() {
            $("#event_Form").on('submit', function(e) {
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
                        $(".status").html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
                    },
                    success: function(resp) {
                        //alert(resp);
                        if (resp.trim() == 'ok') {
                            
                            $(".status").css("display", "block");
                            $(".status").html('<p style="color:#28A74B;">UPDATE SUCESSFUL!</p>');
                            
                        } else if (resp, trim() == 'err') {
                            $(".status").css("display", "block");
                            $(".status").html('<p style="color:#EA4335;">Please select a valid file to upload.</p>');
                        }
                    }
                });
            });

            //     // File type validation
            $("#imgup").change(function() {
                var allowedTypes = ['application/pdf', 'application/msword',
                    'application/vnd.ms-office',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    'image/jpeg', 'image/png', 'image/jpg', 'image/gif'
                ];
                var file = this.files[0];
                var fileType = file.type;
                if (!allowedTypes.includes(fileType)) {
                    alert('Please select a valid file (PDF/DOC/DOCX/JPEG/JPG/PNG/GIF).');
                    $("#imgup").val('');
                    return false;
                }
            });
        });

    }


//open second modal for event insert script fuction-------------------------------------------------------------------
function eventinsert() {
    var prog = document.getElementById("event_prog1");
    prog.style.display = "none";
    $("#eventisertmodal").modal();
                $(document).ready(function() {
                    $("#ievent_form").on('submit', function(e) {
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
                                document.getElementById("eventuploadStatus1").style.display =
                                    "block";
                                $('#eventuploadStatus1').html(
                                    '<p style="color:#EA4335;">File upload failed, please try again.</p>'
                                );
                            },
                            success: function(resp) {
                                //alert(resp);
                                if (resp == 'ok') {
                                    $('#ievent_form')[0].reset();
                                    document.getElementById("eventuploadStatus1").style.display =
                                        "block";
                                    $('#eventuploadStatus1').html(
                                        '<p style="color:#28A74B;">ADDED SUCESSFULLY!</p>'
                                    );
                                } else if (resp == 'err') {
                                    document.getElementById("eventuploadStatus1").style.display =
                                        "block";
                                    $('#eventuploadStatus1').html(
                                        '<p style="color:#EA4335;">Please select a valid file to upload.</p>'
                                    );
                                }
                            }
                        });
                    });

                    // File type validation
                    $("#imgup1").change(function() {
                        var allowedTypes = ['application/pdf', 'application/msword',
                            'application/vnd.ms-office',
                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                            'image/jpeg', 'image/png', 'image/jpg', 'image/gif'
                        ];
                        var file = this.files[0];
                        var fileType = file.type;
                        if (!allowedTypes.includes(fileType)) {
                            alert('Please select a valid file (PDF/DOC/DOCX/JPEG/JPG/PNG/GIF).');
                            $("#imgup1").val('');
                            return false;
                        }
                    });
                });
            }
</script>