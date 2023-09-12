$(document).ready(function () {
    //run function
    filterArtist();
});

function filterArtist() {
    let btnFilter = $('.list-filter-artist li');

    btnFilter.click(function() {
        let domesList = $(this).parents().find('.domestic-artist-list');
        let interList = $(this).parents().find('.international-artist-list');
        let dataBtn = $(this).attr('data-id');
        let dataDomes = domesList.attr('data-id');
        let dataInter = interList.attr('data-id');
        $(this).parent().find('li.active').removeClass('active');
        $(this).addClass('active');
        if(dataBtn == dataDomes) {
            domesList.addClass('active');
            interList.removeClass('active');
        } else {
            domesList.removeClass('active');
            interList.addClass('active');
        }
    });
}