$(document).ready(function () {
  //run function
  const debouncedSearch = debounce(searchCustomPostType, 1000);
  let searchInput = $('.custom-search-input');
  searchInput.on('input',function () {
    $('.group-search-results').addClass('hidden');
    let postType = $(this).attr('data-id');
    debouncedSearch(postType);
  })
});

function searchCustomPostType() {
  let searchData = $('.custom-search-input').val();
  let searchPostType = $('.custom-search-input').attr('data-id');
  if (searchData === '' || searchPostType === ''){
    $('#search-results').empty();
  } else {
    $.ajax({
      url: $("#ajax-url").val(),
      type: "POST",
      data: {
        action: "custom_search",
        post_type: searchPostType,
        search_value: searchData,
      },
      success: function (response) {
        let results = JSON.parse(response);
        $('#search-results').empty();
        if (results.length > 0) {
          $.each(results, function(index, result) {
            $('#search-results').append('<div class="search-result"><a href="' + result.url + '">' + result.title + '</a></div>');
            $('.group-search-results').removeClass('hidden');
          });
        }
      },
    });
  }

}

function debounce(func, wait) {
  let timeout;
  return function() {
    const context = this;
    const args = arguments;
    const later = function() {
      timeout = null;
      func.apply(context, args);
    };
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
  };
}