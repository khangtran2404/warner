$(document).ready(function() {
    var itemsPerPage = 9;
    var currentPage = 1;

    var $postList = $('#news-list');
    var $divs = $postList.children('div');

    $divs.hide();
    $divs.slice(0, itemsPerPage).show();

    var totalItems = $divs.length;
    var totalPages = Math.ceil(totalItems / itemsPerPage);

    for (var i = 1; i <= totalPages; i++) {
        $('#pagination').append('<a href="#" class="page-link">' + i + '</a>');
    }

    $('.page-link').on('click', function(e) {
        e.preventDefault();
        var pageNumber = parseInt($(this).text());
        $divs.hide();
        var startIndex = (pageNumber - 1) * itemsPerPage;
        var endIndex = startIndex + itemsPerPage;
        $divs.slice(startIndex, endIndex).show();
    });
});