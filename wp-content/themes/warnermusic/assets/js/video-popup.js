$(document).ready(function () {
    //run function
    embedPopupLink();
    closePopup();
});

function embedPopupLink(){
    let embedLink = '';
    $('.list-videos .video-item').click(function () {
        embedLink = $(this).children().attr('data-id');
        $('.song-video-popup').children('iframe').attr('src',embedLink);
        $('.song-video-popup').removeClass('hidden');
    })
}

function closePopup(){
    $('.close-popup-btn').click(function () {
        $('.song-video-popup').addClass('hidden');
    })
}