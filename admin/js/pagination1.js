$(document).ready(function() {
    var totalPage = parseInt($('#totalPages').val());
    console.log("==totalPage==" + totalPage);
    var pag = $('#pagination').simplePaginator({
        totalPages: totalPage,
        maxButtonsVisible: 4,
        currentPage: 1,
        nextLabel: 'Next',
        prevLabel: 'Prev',
        firstLabel: 'First',
        lastLabel: 'Last',
        clickCurrentPage: true,
        pageChange: function(page) {
            $("#content").html('<tr><td colspan="6"><strong>loading...</strong></td></tr>');
            if ($("#search:empty")) {

                callajax();
            }

            function callajax() {
                $.ajax({
                    url: "load_data.php",
                    method: "POST",
                    dataType: "json",
                    data: { page: page },
                    success: function(responseData) {
                        $('#content').html(responseData.html);
                    }
                });
            }
            $("#search").on("keyup", function() {
                var search = $("#search").val();
                $.ajax({
                    url: "load_data.php",
                    method: "POST",
                    dataType: "json",
                    data: { page: page, search: search },
                    success: function(responseData) {
                        $('#content').html(responseData.html);
                    }
                });
            })
        }
    });
});