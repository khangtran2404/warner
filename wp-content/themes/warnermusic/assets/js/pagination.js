$(document).ready(function() {
    var itemsPerPage = 9;
    var currentPage = 1;

    var $postList = $('.post-list-pagination');
    var $divs = $postList.children('div');

    $divs.hide();
    $divs.slice(0, itemsPerPage).show();

    var totalItems = $divs.length;
    var totalPages = Math.ceil(totalItems / itemsPerPage);

    if (totalPages <= 1) {
        $('#pagination').hide();
    } else {
        $('#pagination').append('<span class="prev-page">Previous</span>');

        for (var i = 1; i <= totalPages; i++) {
            if (i == 1) {
                $class = "current-pagin";
            } else {
                $class = "";
            }
            $('#pagination').show();
            $('#pagination').append('<a href="#" class="page-link ' + $class + '">' + i + '</a>');
        }

        $('#pagination').append('<span class="next-page">Next</span>');
        updatePage();
    }

    $('.prev-page').on('click', function() {
        if (currentPage > 1) {
            currentPage--;
            updatePage();
        }
    });

    $('.next-page').on('click', function() {
        if (currentPage < totalPages) {
            currentPage++;
            updatePage();
        }
    });

    $('.page-link').on('click', function(e) {
        e.preventDefault();
        currentPage = parseInt($(this).text());
        updatePage();
    });

    function updatePage() {
        $divs.hide();
        var startIndex = (currentPage - 1) * itemsPerPage;
        var endIndex = startIndex + itemsPerPage;
        $divs.slice(startIndex, endIndex).show();
        $('.page-link').removeClass('current-pagin');
        $('.page-link').eq(currentPage - 1).addClass('current-pagin');

        if (currentPage === 1){
            $('.prev-page').hide();
        } else {
            $('.prev-page').show();
        }

        if (currentPage === totalPages){
            $('.next-page').hide();
        } else {
            $('.next-page').show();
        }
    }
});