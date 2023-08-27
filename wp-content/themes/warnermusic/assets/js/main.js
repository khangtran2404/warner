let $ = jQuery;

$(window).load(function() {
    $(".loader").delay(500).fadeOut("slow");
    $("#overlayer").delay(500).fadeOut("slow");
});

$(window).resize(function() {
    
});

$(window).scroll(function() {
    
});

$(document).ready(function(){
    //run function
  });

function containerCustom() {
    let widthContainer = $('.header-main').innerWidth();
    let body = $('body').innerWidth();
    let paddingLeft = $('.padding-left-container');
    let paddingRight = $('.padding-right-container');
    let marginLeft = $('.margin-left-container');
    let marginRight = $('.margin-right-container');

    ContainerDistance = (body - widthContainer)/2;
    paddingLeft.css('padding-left',(ContainerDistance)+'px');
    paddingRight.css('padding-right',(ContainerDistance)+'px');
    marginLeft.css('margin-left',ContainerDistance+'px');
    marginRight.css('margin-right',ContainerDistance+'px');
}

function OnScroll() {
    let top = $(window).scrollTop();
    let masthead = $('#masthead');
    let btnScrollTop = $('.scroll-top');
    let heightOfHeader = $('#masthead').innerHeight();

    if(top > heightOfHeader*5) {
        btnScrollTop.addClass('active-scroll-top');
        masthead.addClass('active-box-shadow');
    } else {
        btnScrollTop.removeClass('active-scroll-top');
        masthead.removeClass('active-box-shadow');
    }
    if(top > heightOfHeader) {
        masthead.addClass('active-box-shadow');
    } else {
        masthead.removeClass('active-box-shadow');
    }
}

function scrollTop($class) {
    let $object = $($class);
    $object.click(function(event) {
        $('html,body').animate({scrollTop: 0}, 700);
    });
}