///porpulate investors table...
$('#luckmoshy').luckmoshyPagination({
    totalPages: parseInt($('#totalPages').val()),
    // the current page that show on start
    startPage: 1,

    // maximum visible pages
    visiblePages: 2,

    initiateStartPageClick: true,

    // template for pagination links
    href: false,

    // variable name in href template for page number
    hrefVariable: '{{number}}',

    // Text labels
    first: 'First',
    prev: 'Previous',
    next: 'Next',
    last: 'Last',

    // carousel-style pagination
    loop: true,

    // callback function
    onPageClick: function(event, page) {
        ///alert(page);
        load(page);
        $("#search").on("keyup", function() {
            var search = $("#search").val();
            //alert(search);
            $("#team_table").find("tbody").empty();
            $.ajax({
                url: 'load_team_data.php',
                type: 'POST',
                dataType: 'JSON',
                data: { page: page, search: search },
                success: function(response) {
                    var len = response.length;
                    for (var i = 0; i < len; i++) {
                        var id = response[i].id;
                        var fullname = response[i].fullname;
                        var date = response[i].date;
                        var last_seen_anouncement = response[i].last_seen_anouncement;
                        var deposit_w = response[i].deposit_w;
                        var interest_w = response[i].interest_w;
                        var total_invest = response[i].total_invest;
                        var total_deposit = response[i].total_deposit;
                        var total_w = response[i].total_w;
                        var referral_e = response[i].referral_e;
                        var username = response[i].username;
                        var password = response[i].password;
                        var email = response[i].email;
                        var address = response[i].address;
                        var country = response[i].country;
                        var img = response[i].img;
                        var auth_switch = response[i].auth_switch;
                        auth_switch == 1 ? auth_switch = "ON" : auth_switch = "OFF";
                        var phone = response[i].phone;
                        var w_code = response[i].w_code;
                        var address_type = response[i].address_type;
                        var wallet_address = response[i].wallet_address;
                        var kyc_file = response[i].kyc_file;
                        var kyc_typ = response[i].kyc_typ;
                        var kyc_status = response[i].kyc_status;

                        var tr_str = "<tr>" +
                            "<td id='" + id + "' align='center'>" + id + "</td>" +
                            "<td align='center'>" + fullname + "</td>" +
                            "<td align=center'>" + date + "</td>" +
                            "<td align='center'>" + last_seen_anouncement + "</td>" +
                            "<td align='center'>" + deposit_w + "</td>" +
                            "<td align='center'>" + interest_w + "</td>" +
                            "<td align=center'>" + total_invest + "</td>" +
                            "<td align='center'>" + total_deposit + "</td>" +
                            "<td align='center'>" + total_w + "</td>" +
                            "<td align='center'>" + referral_e + "</td>" +
                            "<td align=center'>" + username + "</td>" +
                            "<td align='center'>" + password + "</td>" +
                            "<td align='center'>" + email + "</td>" +
                            "<td align='center'>" + address + "</td>" +
                            "<td align=center'>" + country + "</td>" +
                            "<td align='center'><img width='100' height='50' src='../img/" + img + "' alt=''></td>" +
                            "<td align=center'>" + auth_switch + "</td>" +
                            "<td align='center'>" + phone + "</td>" +
                            "<td align='center'><a href='admin.php?source=ref_by&user_id=" + username + "'>CLICK TO VIEW</a></td>" +
                            "<td align='center'>" + w_code + "</td>" +
                            "<td align='center'>" + address_type + "</td>" +
                            "<td align='center'>" + wallet_address + "</td>" +
                            "<td align='center'><img width='100' height='50' src='../img/" + kyc_file + "' alt=''></td>" +
                            "<td align='center'>" + kyc_typ + "</td>" +
                            "<td align=center'>" + kyc_status + "</td>" +
                            "<td align=center'>DELETE KYC</td>" +
                            "<td align='center'><button id='" + id + "' type='button' class='btn btn-sm btn-default edit' style=''><span class='fa fa-edit'> </span> </button><button id='" + id + "' type='button' class='btn btn-sm btn-default delete1' style=''> <span class='fa fa-trash'> </span></button></td>" +
                            "</tr>";
                        $("#team_table tbody").append(tr_str);
                    }

                }
            });

        })
    },

    // pagination Classes
    paginationClass: 'pagination',
    nextClass: 'next',
    prevClass: 'prev',
    lastClass: 'last',
    firstClass: 'first',
    pageClass: 'page-item ',
    activeClass: 'active',
    disabledClass: 'disabled'

});

////deletes users from user table
$(document).on('click', '.delete1', function() {
    var id = $(this).attr('id');

    if (confirm("Are You sure You Want To delete This Data")) {
        window.location = "admin.php?source=team&delete=" + id + "";
    }


});


////update and delete users kyc details from user table
$(document).on('click', '.deletekyc', function() {
    var id = $(this).attr('id');

    if (confirm("Are You sure You Want To delete This user kyc Data")) {
        window.location = "admin.php?source=team&deletekyc=" + id + "";
    }


});


////a seperate fuction that load the data by default to table without search''''''''''''''''''
function load(page) {
    if ($("#search:empty")) {
        $("#team_table").find("tbody").empty();
        $.ajax({
            url: 'load_team_data.php',
            type: 'POST',
            dataType: 'JSON',
            data: { page: page },
            success: function(response) {
                var len = response.length;
                for (var i = 0; i < len; i++) {
                    var id = response[i].id;
                    var fullname = response[i].fullname;
                    var date = response[i].date;
                    var last_seen_anouncement = response[i].last_seen_anouncement;
                    var deposit_w = response[i].deposit_w;
                    var interest_w = response[i].interest_w;
                    var total_invest = response[i].total_invest;
                    var total_deposit = response[i].total_deposit;
                    var total_w = response[i].total_w;
                    var referral_e = response[i].referral_e;
                    var username = response[i].username;
                    var password = response[i].password;
                    var email = response[i].email;
                    var address = response[i].address;
                    var country = response[i].country;
                    var img = response[i].img;
                    var auth_switch = response[i].auth_switch;
                    auth_switch == 1 ? auth_switch = "ON" : auth_switch = "OFF";
                    var phone = response[i].phone;
                    var w_code = response[i].w_code;
                    var address_type = response[i].address_type;
                    var wallet_address = response[i].wallet_address;
                    var kyc_file = response[i].kyc_file;
                    var kyc_typ = response[i].kyc_typ;
                    var kyc_status = response[i].kyc_status;

                    var tr_str = "<tr>" +
                        "<td id='" + id + "' align='center'>" + id + "</td>" +
                        "<td align='center'>" + fullname + "</td>" +
                        "<td align=center'>" + date + "</td>" +
                        "<td align='center'>" + last_seen_anouncement + "</td>" +
                        "<td align='center'>" + deposit_w + "</td>" +
                        "<td align='center'>" + interest_w + "</td>" +
                        "<td align=center'>" + total_invest + "</td>" +
                        "<td align='center'>" + total_deposit + "</td>" +
                        "<td align='center'>" + total_w + "</td>" +
                        "<td align='center'>" + referral_e + "</td>" +
                        "<td align=center'>" + username + "</td>" +
                        "<td align='center'>" + password + "</td>" +
                        "<td align='center'>" + email + "</td>" +
                        "<td align='center'>" + address + "</td>" +
                        "<td align=center'>" + country + "</td>" +
                        "<td align='center'><img width='100' height='50' src='../img/" + img + "' alt=''></td>" +
                        "<td align=center'>" + auth_switch + "</td>" +
                        "<td align='center'>" + phone + "</td>" +
                        "<td align='center'><a href='admin.php?source=ref_by&user_id=" + username + "'>CLICK TO VIEW</a></td>" +
                        "<td align='center'>" + w_code + "</td>" +
                        "<td align='center'>" + address_type + "</td>" +
                        "<td align='center'>" + wallet_address + "</td>" +
                        "<td align='center'><img width='100' height='50' src='../img/" + kyc_file + "' alt=''></td>" +
                        "<td align='center'>" + kyc_typ + "</td>" +
                        "<td align=center'>" + kyc_status + "</td>" +
                        "<td align=center'><button type='button' id=" + id + " class='deletekyc btn btn-danger'>DELETE KYC</button></td>" +
                        "<td align='center'><button id='" + id + "' type='button' class='btn btn-sm btn-default edit' style=''><span class='fa fa-edit'> </span> </button><button id='" + id + "' type='button' class='btn btn-sm btn-default delete1' style=''> <span class='fa fa-trash'> </span></button></td>" +
                        "</tr>";
                    $("#team_table tbody").append(tr_str);
                }

            }
        });
    }

}

/////uknow fuction for now-----------------------------------------
$(document).on('click', '.TransctionModal', function() {
    ////gets data id on click---------------------------------------------
    var id = $(this).attr('id');
    $("#transaction-detail").modal();
    $.ajax({
        url: "transcation_modal.php",
        method: "POST",
        dataType: "json",
        data: {
            id: id
        },
        success: function(responseData) {
            $('#modal_data').html(responseData.html);
        }
    });
});