$(document).ready(function () {
  //run function
  filterInitiation();
  filterOnClick();
  dropdownCheckbox();
});

function filterInitiation() {
  let filterElement = $(".list-filter-group");
  let activeFilterData =
    "term-" + filterElement.find(".active").attr("data-id");
  $(".filter-item").hide();
  $("." + activeFilterData).show();
}

function filterOnClick() {
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
    var dropdownMenu = $(this).next(".dropdown-menu");
    if (dropdownMenu.hasClass("show")) {
      dropdownMenu.removeClass("show");
    } else {
      $(".dropdown-menu").removeClass("show");
      dropdownMenu.addClass("show");
    }
    toggleClearButton();
  });

  // click ousite close dropdown
  //   $("body").on("click", function (e) {
  //     if (!$(e.target).closest(".dropdown-multi-checkbox").length) {
  //       $(".dropdown-menu").removeClass("show");
  //     }
  //     toggleClearButton();
  //   });
  $('.dropdown-multi-checkbox .dropdown-form input[type="checkbox"]').change(
    function () {
      var label = $(this).next("label").text();
      if ($(this).is(":checked")) {
        $(".checkbox-tags").append(
          `<span class="checkbox-tag">
                ${label}
                <button class="remove-checkbox-tag" data-label="${label}">x</button>
            </span>
            `
        );
        toggleClearButton();
      } else {
        $(".checkbox-tags .checkbox-tag:contains(" + label + ")").remove();
        toggleClearButton();
      }
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
