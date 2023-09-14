$(document).ready(function () {
    //run function
    filterInitiation();
    // filterArtistAfterClick();
    filterOnClick();
});

// function filterArtistAfterClick() {
//     let btnFilter = $('.filter-section .filter-list li');
//
//     btnFilter.click(function() {
//         let filterData = 'artist-parent-' + $(this).attr('data-id');
//         let artistListSectionElement = $('.artist-list-section');
//         artistListSectionElement.children('.artist-item').hide();
//         $('.'+filterData).show();
        if ($(this).attr('data-id') === 'all'){
            artistListSectionElement.children('.artist-item').show();
        }
//     });
// }

function filterInitiation(){
    let filterElement = $('.list-filter-group');
    let activeFilterData = 'term-' + filterElement.find('.active').attr('data-id');
    $('.filter-item').hide();
    $('.'+activeFilterData).show();
}

function filterOnClick(){
    let filterElement = $('.filter-section .list-filter-group li');
    filterElement.click(function () {
        let filterData = 'term-' + $(this).attr('data-id');
        $('.filter-item').hide();
        $('.'+filterData).show();
    })
}