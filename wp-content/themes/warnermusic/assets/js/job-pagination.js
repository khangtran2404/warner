$(document).ready(function () {
  var itemsPerPage = 5;
  var $postList = $(".job-list-section");
  var $postItems = $postList.children(".jobs-item");
  var totalItems = $postItems.length;
  var totalPages = Math.ceil(totalItems / itemsPerPage);
  var currentPage = 1;

  function showPage(page) {
    var startIndex = (page - 1) * itemsPerPage;
    var endIndex = startIndex + itemsPerPage;
    $postItems.hide().slice(startIndex, endIndex).show();
  }

  function updatePagination() {
    var paginationHtml = '<a href="#" class="page-link disabled">Prev</a>';
    for (var i = 1; i <= totalPages; i++) {
      paginationHtml +=
        '<a href="#" class="page-link ' +
        (i == 1 ? "active" : "") +
        '">' +
        i +
        "</a>";
    }
    paginationHtml += '<a href="#" class="page-link">Next</a>';
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
