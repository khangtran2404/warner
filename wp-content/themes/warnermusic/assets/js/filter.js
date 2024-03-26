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
