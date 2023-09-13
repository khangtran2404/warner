$(document).ready(function () {
    //run function
    filterArtist();
});

function filterArtist() {
    let btnFilter = $('.filter-section .filter-list li');

    btnFilter.click(function() {
        let filterData = 'artist-parent-' + $(this).attr('data-id');
        let artistListSectionElement = $('.artist-list-section');
        artistListSectionElement.children('.artist-item').hide();
        $('.'+filterData).show();
        if ($(this).attr('data-id') === 'all'){
            artistListSectionElement.children('.artist-item').show();
        }
    });
}