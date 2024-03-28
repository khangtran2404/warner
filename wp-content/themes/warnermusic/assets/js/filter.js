$(document).ready(function () {
  //run function
  filterInitiation();
  filterTermOnClick();
  dropdownCheckbox();
  $('.clear-checkbox-tags').click(function () {
    filterJob();
  })

  let filterElement = $(".filter-job input");
  filterElement.on("change", function () {
    filterJob();
  });

  // searchJob();
});

function filterInitiation() {
  let filterElement = $(".list-filter-group");
  let activeFilterData =
    "term-" + filterElement.find(".active").attr("data-id");
  $(".filter-item").hide();
  $("." + activeFilterData).show();
}

function filterJob() {
  var checkedTeamValues = $(".filter-job input:checked")
      .map(function () {
        return $(this).attr("team-id");
      })
      .get();

  var checkedTypeValues = $(".filter-job input:checked")
      .map(function () {
        return $(this).attr("type-id");
      })
      .get();

  $.ajax({
    url: $("#ajax-url").val(),
    type: "POST",
    data: {
      action: "filter_jobs",
      team_filter: checkedTeamValues,
      type_filter: checkedTypeValues,
    },
    success: function (response) {
      $(".job-list-section").html(response);
      apply_job_pagination();
    },
  });
}

function searchJob() {
  $("#search-job-opening").on("input", function () {
    $("#search-results").html();
    var searchText = $(this).val().toLowerCase();
    $(".job-list-section .job-item").each(function () {
      var title = $(this).find(".job-title").text().toLowerCase();
      if (title.includes(searchText)) {
      }
    });
  });
}

function filterTermOnClick() {
  let filterElement = $(".filter-section .list-filter-group li");
  filterElement.click(function () {
    let filterData = "term-" + $(this).attr("data-id");
    $(".filter-item").hide();
    $("." + filterData).show();
  });
}

function dropdownCheckbox() {
  toggleClearButton();
  $(".dropdown-toggle").click(function () {
    $(this).toggleClass("active");
    $(this).parent().find(".dropdown-menu").toggleClass("show");
    toggleClearButton();
  });

  $('.dropdown-multi-checkbox .dropdown-form input[type="checkbox"]').change(
    function () {
      var label = $(this).next("label").text();
      if ($(this).is(":checked")) {
        if ($(".checkbox-tags").children().length === 0) {
          $(".checkbox-tags").append(
            `<span class="checkbox-tag">
                  ${label}
                  <button class="remove-checkbox-tag" title="Remove" data-label="${label}"><i class="fa fa-times"></i></button>
              </span>`
          );
        } else {
          $(".checkbox-tags .checkbox-tag:first").before(
            `<span class="checkbox-tag">
                  ${label}
                  <button class="remove-checkbox-tag" title="Remove" data-label="${label}"><i class="fa fa-times"></i></button>
              </span>`
          );
        }
      } else {
        $(".checkbox-tags .checkbox-tag:contains(" + label + ")").remove();
      }
      toggleClearButton();
    }
  );

  $("body").on("click", ".remove-checkbox-tag", function () {
    var label = $(this).data("label");
    $(
      '.dropdown-multi-checkbox .dropdown-form input[type="checkbox"]:checked'
    ).each(function () {
      if ($(this).next("label").text() === label) {
        $(this).prop("checked", false);
      }
    });
    $(this).parent(".checkbox-tag").remove();
    filterJob();
    toggleClearButton();
  });

  $(".clear-checkbox-tags").click(function () {
    $('.dropdown-form input[type="checkbox"]').prop("checked", false);
    $(".checkbox-tags").empty();
    toggleClearButton();
  });

  function toggleClearButton() {
    if ($(".checkbox-tags").children(".checkbox-tag").length > 0) {
      $(".clear-checkbox-tags").show();
    } else {
      $(".clear-checkbox-tags").hide();
    }
  }
}

function renderPagination(totalPages, currentPage) {
  var paginationHtml = '';
  for (var i = 1; i <= totalPages; i++) {
    var activeClass = i === currentPage ? 'active' : '';
    paginationHtml += '<a href="#" class="page-link ' + activeClass + '" data-page="' + i + '">' + i + '</a>';
  }
  $('#job-pagination').html(paginationHtml);
}

function apply_job_pagination() {
  var itemsPerPage = 5;
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
    console.log(totalPages)
    if (totalPages == 1 || totalPages == 0 ){
      paginationHtml = '';
    } else {
      $('#job-pagination').show();
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
}
