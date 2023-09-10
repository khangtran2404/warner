$(document).ready(function () {
    //run function
    init_layout_artist();
    filter_artist();
});

function init_layout_artist() {
    let listArtistElement = $('.list-artist');
    listArtistElement.find('.artist-list').each(function () {
        console.log($(this).hasClass('active'))
        if ($(this).hasClass('active')) {
            $(this).show();
        } else {
            $(this).hide();
        }
    })
}

function filter_artist() {
    let listArtistElement = $('.list-artist');
    listArtistElement.find('button').click(function () {
        let clickedButton = $(this);
        let filterData = clickedButton.attr('data-id');
        $('.artist-list').each(function () {
            if ($(this).hasClass(filterData)) {
                if (!$(this).hasClass('active')) {
                    $(this).addClass('active')
                }
            } else {
                $(this).removeClass('active')
            }
        });
        init_layout_artist();
    })
}