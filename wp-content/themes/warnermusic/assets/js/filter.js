$(document).ready(function () {
    //run function
    filterInitiation();
    filterOnClick();
});

function filterInitiation(){
    let filterElement = $('.list-filter-group');
    let activeFilterData = 'term-' + filterElement.find('.active').attr('data-id');
    $('.filter-item').removeClass('active-item');
    $('.'+activeFilterData).addClass('active-item');
}

function filterOnClick(){
    let filterElement = $('.filter-section .list-filter-group li');
    filterElement.click(function () {
        let filterData = 'term-' + $(this).attr('data-id');
        $('.filter-item').removeClass('active-item');
        $('.'+filterData).addClass('active-item');
    })
}