$(document).ready(function () {
    //run function
    embedPopupLink();
    closePopup();
});

function embedPopupLink() {
    $('.list-videos .video-item').click(function () {
        embedLink = $(this).find('.content-box').attr('data-id');
        $(this).parents().find('.song-video-popup iframe').attr('src',embedLink);
        $(this).parents().find('.song-video-popup').removeClass('hidden');
    })
}

function closePopup(){
    $('.close-popup-btn').click(function () {
        $('.song-video-popup').addClass('hidden');
        $(this).parent().find('iframe').attr('src','');
    })
    $('.song-video-popup').on('click', function(e) {
        if (e.target !== this)
          return;
        $(this).addClass('hidden');
        $(this).find('iframe').attr('src','');

    });
}