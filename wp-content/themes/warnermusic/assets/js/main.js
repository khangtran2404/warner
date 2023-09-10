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
    adapterWidthHeigth();
});

function adapterWidthHeigth() {
    let widthContainer = $('.header-main').innerWidth();
    let body = $('body').innerWidth();
    let itemNoSquare = $('.gird-item-no-square .image-feature img');
    let triangleNoSquare = $('.gird-item-no-square .triangle-right');
    let events = $('.events .event-artist');
    let triangleEvents = $('.event-artist .triangle-right');
    let itemSquare = $('.gird-item-square .image-feature img');

    distance = (body - widthContainer)/2;
    itemNoSquare.css('height', (itemNoSquare.innerWidth())*(3/2));
    itemSquare.css('height', itemSquare.innerWidth());
    triangleNoSquare.css('border-top-width', (itemNoSquare.innerWidth()/2 + 30));
    triangleEvents.css('border-top-width', (events.innerHeight()/4 + 40));
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
        let widthContainer = $('.group-row-footer').innerWidth();
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