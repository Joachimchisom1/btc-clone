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
            $("#content5").html('<tr><td colspan="6"><strong>loading...</strong></td></tr>');
            if ($("#search:empty")) {
                $.ajax({
                    url: "load_gallery_data.php",
                    method: "POST",
                    dataType: "json",
                    data: { page: page },
                    success: function(responseData) {
                        $('#content5').html(responseData.html);
                    }
                });
            }

            $("#search").on("keyup", function() {
                var search = $("#search").val();
                //alert(search);
                $.ajax({
                    url: "load_gallery_data.php",
                    method: "POST",
                    dataType: "json",
                    data: { page: page, search: search },
                    success: function(responseData) {
                        $('#content5').html(responseData.html);
                    }
                });

            })
        }
    });
});