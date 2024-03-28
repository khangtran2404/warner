$(document).ready(function (attributeName) {
  var itemsPerPage = 1;
  var $postList = $(".job-list-section");
  var $postItems = $postList.children(".jobs-item");
  var totalItems = $postItems.length;
  var totalPages = Math.ceil(totalItems / itemsPerPage);
  var currentPage = 1;

  function showPage(page) {
    var startIndex = (page - 1) * itemsPerPage;
    var endIndex = startIndex + itemsPerPage;
    $('#job-pagination .page-link').each(function (attributeName) {
      if ($(this).text().trim() == page) {
        $('#job-pagination .page-link').removeClass('active');
        $(this).addClass('active');
      }
      if ($(this).text().trim() == 'Prev'){
        if (page == 1){
          $(this).addClass('disabled');
        } else {
          $(this).removeClass('disabled');
        }
      }
      if ($(this).text().trim() == 'Next'){
        if (page == $('#job-pagination .page-link').length-2){
          $(this).addClass('disabled');
        } else {
          $(this).removeClass('disabled');
        }
      }
    });
    $postItems.hide().slice(startIndex, endIndex).show();
  }

  function updatePagination() {
    let paginationHtml = '';
    if (totalPages != 1){
      paginationHtml = '<a href="#" class="page-link">Prev</a>';
    }
    for (var i = 1; i <= totalPages; i++) {
      paginationHtml +=
        '<a href="#" class="page-link">' + i + "</a>";
    }
    if (totalPages != 1){
      paginationHtml += '<a href="#" class="page-link">Next</a>';
    }
    $("#job-pagination").html(paginationHtml);
  }

  updatePagination();

  showPage(currentPage);

  $("#job-pagination .page-link").click(function (e) {
    e.preventDefault();
    var $this = $(this);
    var page = $this.text();
    if ($this.hasClass("page-link")) {
      if (page === "Prev" && currentPage > 1) {
        currentPage--;
      } else if (page === "Next" && currentPage < totalPages) {
        currentPage++;
      } else {
        currentPage = parseInt(page);
      }
      showPage(currentPage);
    }
  });
});
