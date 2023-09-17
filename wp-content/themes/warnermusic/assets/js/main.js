let $ = jQuery;

$(window).load(function() {
    $(".loader").delay(500).fadeOut("slow");
    $("#overlayer").delay(500).fadeOut("slow");
});

$(window).resize(function() {
    headerMobileDistance();
    adapterWidthHeigth();
});

$(window).scroll(function() {
    OnScroll();
});

$(document).ready(function(){
    //run function
    headerAction();
    dropdownMenu();
    menuHamburger();
    OnScroll();
    scrollTop('.scroll-top');
    headerMobileDistance();
    bannerSlider();
    sliderGrid();
    sliderSyncing();
    adapterWidthHeigth();
    animationWow();
});

function animationWow() {
    wow = new WOW(
        {
        boxClass:     'wow',      
        animateClass: 'animated',
        offset:       0,         
        mobile:       false,      
        live:         true    
        }
    )
    wow.init();
}

function adapterWidthHeigth() {
    let widthContainer = $('.header-main').innerWidth();
    let body = $('body').innerWidth();
    let itemNoSquareThree = $('.list-layout-warner-3 .gird-item-no-square .image-feature');
    let itemNoSquareFour = $('.list-layout-warner-4 .gird-item-no-square .image-feature');
    let itemNoSquareOne = $('.list-layout-warner-1 .gird-item-no-square .image-feature');
    let itemThreePertwo = $('.gird-item-three-per-two .image-feature');
    let imgSquare = $('.image-square');

    distance = (body - widthContainer)/2;
    itemNoSquareThree.css('height', (itemNoSquareThree.innerWidth())*(3/2));
    itemNoSquareFour.css('height', (itemNoSquareFour.innerWidth())*(3/2));
    itemThreePertwo.css('height', (itemThreePertwo.innerWidth())*(2/3));
    itemNoSquareOne.css('height', (itemNoSquareOne.innerWidth())*(2/3));
    imgSquare.css('height',imgSquare.innerWidth());

    //case no slider
    let groupItemNoSlider = $('.list-layout-warner-3-no-slider').innerWidth();
    let groupItemNoSliderFour = $('.list-layout-warner-4-no-slider').innerWidth();
    let itemNoSquareThreeNoSlide  = $('.list-layout-warner-3-no-slider .gird-item-no-square .image-feature');
    let itemNoSquareFourNoSlide  = $('.list-layout-warner-4-no-slider .gird-item-no-square .image-feature');
    let widthItemNoSlider = (groupItemNoSlider - 90)/3;
    let widthItemNoSliderFour = (groupItemNoSliderFour - 120)/4;

    itemNoSquareThreeNoSlide.css('width', widthItemNoSlider);
    itemNoSquareThreeNoSlide.css('height', (widthItemNoSlider)*(3/2));

    itemNoSquareFourNoSlide.css('width', widthItemNoSliderFour);
    itemNoSquareFourNoSlide.css('height', (widthItemNoSliderFour)*(3/2));

    if($(window).width() < 991) {
        let widthItemNoSlider = (groupItemNoSlider - 60)/3;
        let widthItemNoSliderFour = (groupItemNoSliderFour - 60)/3;
        itemNoSquareThreeNoSlide.css('width', widthItemNoSlider);
        itemNoSquareThreeNoSlide.css('height', (widthItemNoSlider)*(3/2));
        itemNoSquareFourNoSlide.css('width', widthItemNoSliderFour);
        itemNoSquareFourNoSlide.css('height', (widthItemNoSliderFour)*(3/2));
    }
     if($(window).width() < 768) {
        let widthItemNoSlider = (groupItemNoSlider - 60)/2;
        let widthItemNoSliderFour = (groupItemNoSliderFour - 60)/2;
        itemNoSquareThreeNoSlide.css('width', widthItemNoSlider);
        itemNoSquareThreeNoSlide.css('height', (widthItemNoSlider)*(3/2));
        itemNoSquareFourNoSlide.css('width', widthItemNoSliderFour);
        itemNoSquareFourNoSlide.css('height', (widthItemNoSliderFour)*(3/2));
    }
    if($(window).width() < 480) {
        let widthItemNoSlider = groupItemNoSlider - 20;
        let widthItemNoSliderFour = groupItemNoSliderFour - 20;
        itemNoSquareThreeNoSlide.css('width', widthItemNoSlider);
        itemNoSquareThreeNoSlide.css('height', (widthItemNoSlider)*(3/2));
        itemNoSquareFourNoSlide.css('width', widthItemNoSliderFour);
        itemNoSquareFourNoSlide.css('height', (widthItemNoSliderFour)*(3/2));
    }
}

function bannerSlider() {
    let listSlider = $('.banner-slider .list-banner-slider');

    listSlider.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        infinite: true,
        autoplay: true,
        fade: true,
        cssEase: 'linear',
        speed: 600,
        autoplaySpeed: 5000
    }).slickAnimation();

    // after slick event
    afterSlickEvent();
    $(window).resize(function() {
        afterSlickEvent();
    });
    function afterSlickEvent() {
        let widthContainer = $('.header-main').innerWidth();
        let body = $('body').innerWidth();
        let slickDots = $('.site-home-page .slick-dots');
        let btnLast = $('.banner-slider .latest-releases');
        let contInforMobile = $('.left-information-mobile');

        distance = (body - widthContainer)/2;
        slickDots.css('right',distance + (btnLast.innerWidth() + 40));
        btnLast.css('right',distance);
        contInforMobile.css({
            'padding-left': distance+'px',
            'padding-right': distance+'px'
        });
        if($(window).width() < 991) {
            slickDots.css('right','unset');
            slickDots.css('left', distance);
        } else {
            slickDots.css('left', 'unset');
            slickDots.css('right',distance + (btnLast.innerWidth() + 40));
        }
    }
}
function sliderGrid() {
    let listLayoutWarnerFour = $('.list-layout-warner-4');
    let listLayoutWarnerThree = $('.list-layout-warner-3');
    let listLayoutWarnerOne = $('.list-layout-warner-1');

    listLayoutWarnerFour.slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        infinite: false,
        autoplay: false,
        speed: 600,
        autoplaySpeed: 5000,
        responsive: [
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 3
              }
            },
            {
                breakpoint: 768,
                settings: {
                  slidesToShow: 2
                }
              },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1
              }
            }
        ]
    });

    listLayoutWarnerThree.slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        infinite: false,
        autoplay: false,
        speed: 600,
        autoplaySpeed: 5000,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                  slidesToShow: 2
                }
              },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1
              }
            }
        ]
    })

    listLayoutWarnerOne.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        infinite: false,
        autoplay: false,
        speed: 600,
        autoplaySpeed: 5000,
    });
}

function sliderSyncing() {
    let listnavItem = $('.list-nav-sliderSyncing');
    let listMainItem = $('.list-main-sliderSyncing');

    listMainItem.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    asNavFor: listnavItem
                }
            }
        ]
    });

    listnavItem.slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: listMainItem,
        dots: false,
        focusOnSelect: false,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    focusOnSelect: true,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    focusOnSelect: true,
                }
            }
        ]
    });
    disableScrollNavOnDesktop();
    $(window).resize(function() {
        disableScrollNavOnDesktop();
    });

    function disableScrollNavOnDesktop() {
        if($(window).width() > 768) {
            listMainItem.on('afterChange', function(event, slick, currentSlide) {
                let currrentNavSlideElem = '.list-nav-sliderSyncing .slick-slide[data-slick-index="' + currentSlide + '"]';
                $('.list-nav-sliderSyncing .slick-slide.slick-current').removeClass('slick-current');
                $(currrentNavSlideElem).addClass('slick-current');
            });
        
            listnavItem.find('.slick-slide').on('click', function (event) {
                $(this).parent().find('.slick-current').removeClass('slick-current');
                $(this).addClass('slick-current');
                listMainItem.slick('slickGoTo', $(this).data('slickIndex'));
            });
        } else {
            return;
        }
    }
}

function headerAction() {
    let closeSearch =  $('.button-search-action .close-search')
    let openSearch = $('.search-action .button-search-action .open-search');
    let groupNavDesktop = $('.navigation-desktop');
    let groupSearchHeader = $('.group-from-search-header');
    let iconTriangle = $('.group-navigation-desktop');
    let totalItemNav = $('.main-navigation-desktop li[data-depth="0"]').length;
    let header = $('#masthead');
    openSearch.click(function() {
        $(this).hide();
        closeSearch.show();
        groupNavDesktop.css('display','none');
        groupSearchHeader.addClass('active');
    });
    closeSearch.click(function() {
        $(this).hide()
        openSearch.show();
        groupNavDesktop.css('display','flex');
        groupSearchHeader.removeClass('active');
    });
}

function containerCustom() {
    let widthContainer = $('.group-row-footer').innerWidth();
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
}

function scrollTop($class) {
    let $object = $($class);
    $object.click(function(event) {
        $('html,body').animate({scrollTop: 0}, 700);
    });
}

function dropdownMenu() {
    let itemMenuSub = $('.main-navigation-desktop .menu-item-has-children .dropdown-menu-custom li');
    let itemMenuHeader= $('.navigation-desktop .main-navigation-desktop li');
    let closeSubmenu = $('.navigation-menu-action .menu-toggle-close');
    let openSubmenu = $('.navigation-menu-action .menu-toggle-open');

    itemMenuSub.each(function(i, e) {
        let itemHeight = $(e).innerHeight();
        let subMenu = $(e).find('.dropdown-menu-custom');
        let widthSubmenu = subMenu.innerWidth();
        subMenu.css({
            'margin-top': -(itemHeight)+'px',
            'right': -(widthSubmenu + 3)+'px'
        });
    });

    itemMenuHeader.each(function(i, e) {
        $('.menu-item-has-children[data-depth="'+i+'"]').hover(function() {
            $(this).find('.dropdown-menu-custom[data-depth="'+i+'"]').addClass('show-submenu');
            $(this).find('.menu-toggle[data-depth="'+i+'"]').addClass('show-action');
        }, function() {
            $(this).find('.dropdown-menu-custom[data-depth="'+i+'"]').removeClass('show-submenu');
            $(this).find('.menu-toggle[data-depth="'+i+'"]').removeClass('show-action');
        });
    });

    openSubmenu.click(function() {
        $(this).parents().find('.submenu-active').removeClass('submenu-active');
        $(this).parents().find('.menu-toggle-close').hide();
        $(this).parents().find('.menu-toggle-open').show();
        $(this).hide();
        $(this).parent().find('.menu-toggle-close').show();
        $(this).parent().find('.dropdown-menu-custom').addClass('submenu-active');
        let menuAc = $(this).parents().find('.navigation-menu-action');
        let height = $(this).parents().find('.navigation-menu-action .mobile-navigation').innerHeight();
        menuAc.css('height', height);
        menuAc.attr('data-height',height);
    });
    closeSubmenu.click(function() {
        $(this).hide();
        $(this).parent().find('.menu-toggle-open').show();
        $(this).parent().find('.dropdown-menu-custom').removeClass('submenu-active');
        let menuAc = $(this).parents().find('.navigation-menu-action');
        let height = $(this).parents().find('.navigation-menu-action .mobile-navigation').innerHeight();
        menuAc.css('height', height);
        menuAc.attr('data-height',height);
    });
}

function menuHamburger() {
    let menuHamburger = $('.btn-hamburger');
    let menuAction = $('.navigation-menu-action');
    let maxHeightMenu = menuAction.find('.mobile-navigation').innerHeight();

    menuHamburger.click(function() {
        if($(this).hasClass('hamburger-active')) {
            $(this).removeClass('hamburger-active');
            menuAction.css('height',0);
            $(this).parents().find('.submenu-active').removeClass('submenu-active');
            $(this).parents().find('.menu-toggle-close').hide();
            $(this).parents().find('.menu-toggle-open').show();
            menuAction.attr('data-height','0');
        } else {
            $(this).toggleClass('hamburger-active');
            menuAction.css('height',maxHeightMenu+'px');
            menuAction.attr('data-height', maxHeightMenu);
        }
    });
    $(window).resize(function() {
        if($(window).width() > 990) {
            menuHamburger.removeClass('hamburger-active');
            menuAction.removeClass('navigation-menu-action-active');
            menuAction.css('height',0);
        }
    });
}

function headerMobileDistance() {
    let masthead = $('#masthead');
    let toolBar = $('.admin-bar #wpadminbar');
    let actionMenu = $('.navigation-menu-action');
    let windowHeight = $(window).height();
    let btnMenu = $('.btn-hamburger');
    let btnSubMenuOpen = $('.menu-toggle-open');
    let btnSubMenuClose = $('.menu-toggle-close');
    if(toolBar.length !== 0) {
        masthead.css('top', toolBar.innerHeight());
        actionMenu.css('top', (masthead.innerHeight() + toolBar.innerHeight()));
        btnMenu.click(actionWithToolbar);
        btnSubMenuOpen.click(actionWithToolbar);
        btnSubMenuClose.click(actionWithToolbar);
        function actionWithToolbar() {
            let heightSubmenu = parseInt($(this).parents().find('.navigation-menu-action').attr('data-height'));
            if((masthead.innerHeight() + toolBar.innerHeight() + heightSubmenu) > windowHeight) {
                actionMenu.css('position', 'absolute');
                masthead.css('position','absolute');
            } else {
                actionMenu.css('position', 'fixed');
                masthead.css('position','fixed');
            }
        }
    } else {
        masthead.css('top', 0);
        actionMenu.css('top', masthead.innerHeight());
        btnMenu.click(actionNoToolbar);
        btnSubMenuOpen.click(actionNoToolbar);
        btnSubMenuClose.click(actionNoToolbar);
        function actionNoToolbar() {
            let heightSubmenu = parseInt($(this).parents().find('.navigation-menu-action').attr('data-height'));
            if((masthead.innerHeight() + heightSubmenu) > windowHeight) {
                actionMenu.css('position', 'absolute');
                masthead.css('position','absolute');
            } else {
                actionMenu.css('position', 'fixed');
                masthead.css('position','fixed');
            }
        }
    }
}