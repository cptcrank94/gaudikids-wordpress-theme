$(document).ready(function() {

    $( window ).on("resize", function() {
        var windowW = $(window).width();
        var menu = $('nav');
        if ( windowW > 1400 ) {
            $(menu).addClass("navbar-elipse");
            $(menu).find(".container").addClass("navbar-elipse-container");
        } else if ( windowW < 1400 ) {
            $(menu).removeClass("navbar-elipse");
            $(menu).find(".container").removeClass("navbar-elipse-container");
        }
    });

    
    if( $(window).width() > 1400 ) {
        var menu = $('nav');
        $(menu).addClass("navbar-elipse");
        $(menu).find(".container").addClass("navbar-elipse-container");
    }

    $(window).on("scroll", function() {
        var windowW = $(window).width();
        var menu = $('nav');
        var scrollTop = $(window).scrollTop();
        if ( windowW > 1400 ) {
            if( scrollTop > 150 ) {
                $(menu).removeClass("navbar-elipse");
                $(menu).find(".container").removeClass("navbar-elipse-container");
                $(menu).addClass("fixed-top");
                $(menu).addClass("navbar-scroll");
            } else {
                $(menu).addClass("navbar-elipse");
                $(menu).find(".container").addClass("navbar-elipse-container");
                $(menu).removeClass("fixed-top");
                $(menu).removeClass("navbar-scroll");
            }
        } else {
            if( scrollTop > 150 ) {
                $(menu).addClass("fixed-top");
                $(menu).addClass("navbar-scroll");
            } else {
                $(menu).removeClass("fixed-top");
                $(menu).removeClass("navbar-scroll");
            }
        }
    });

    $( "li.menu-item").hover(function() {
        $(this).find(" > .sub-menu" ).show();
    }, function() {
        if ( !$(this).hasClass(".current_page_item") ) {
            $( this ).find(".sub-menu").hide();
        }
    })

    $('.menu-item-has-children').click(function() {
        $(this).children('.sub-menu').slideToggle(200, "linear");
    });

    $('.navbar-toggler').click(function() {
        $(this).parent('div').find('.navbar-collapse').toggle("medium");
    });
});