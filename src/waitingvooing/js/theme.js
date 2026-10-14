/*
Template Name: Wendy
Version: 1.0
*/
(function($) {
    "use strict";

    //mobile menu
    $.fn.extend({
        mobilemenu: function() {
            return this.each(function() {

                var $ul = $(this);

                if ($ul.data('accordiated'))
                    return false;

                $.each($ul.find('ul, li>div'), function() {
                    $(this).data('accordiated', true);
                    $(this).hide();
                });

                $.each($ul.find('span.head'), function() {
                    $(this).on('click', function(e) {
                        activate(this);
                        return void(0);
                    });
                });

                var active = (location.hash) ? $(this).find('a[href=' + location.hash + ']')[0] : '';

                if (active) {
                    activate(active, 'toggle');
                    $(active).parents().show();
                }

                function activate(el, effect) {
                    $(el).parent('li').toggleClass('active').siblings().removeClass('active').children('ul, div').slideUp('fast');
                    $(el).siblings('ul, div')[(effect || 'slideToggle')]((!effect) ? 'fast' : null);
                }

            });
        }
    });
    $("ul.mobilemenu li.parent").each(function() {
        $(this).append('<span class="head"><a href="javascript:void(0)"></a></span>');
    });

    $('ul.mobilemenu').mobilemenu();

    $("ul.mobilemenu li.active").each(function() {
        $(this).children().next("ul").css('display', 'block');
    });

    //mobile
    $('.btn-navbar').on('click', function() {

        var chk = 0;
        if ($('#navbar-inner').hasClass('navbar-inactive') && (chk == 0)) {
            $('#navbar-inner').removeClass('navbar-inactive');
            $('#navbar-inner').addClass('navbar-active');
            $('#mobilemenu').css('display', 'block');
            chk = 1;
        }
        if ($('#navbar-inner').hasClass('navbar-active') && (chk == 0)) {
            $('#navbar-inner').removeClass('navbar-active');
            $('#navbar-inner').addClass('navbar-inactive');
            $('#mobilemenu').css('display', 'none');
            chk = 1;
        }
    });


    $('#language-currency').mouseenter(function() {
        $(this).find(".box-container").stop(true, true).slideDown();
    });

    //hide submenus on exit
    $('#language-currency').mouseleave(function() {
        $(this).find(".box-container").stop(true, true).slideUp();
    });

    $('#top-link').mouseenter(function() {
        $(this).find(".toplink-inner").stop(true, true).slideDown();
    });

    //hide submenus on exit
    $('#top-link').mouseleave(function() {
        $(this).find(".toplink-inner").stop(true, true).slideUp();
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 80) {
            $('.header').addClass("fix-header");
        } else {
            $('.header').removeClass("fix-header");
        }
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 80) {
            $('.nav-container,.fix-hb').addClass("fix-nav");
        } else {
            $('.nav-container,.fix-hb').removeClass("fix-nav");
        }
    });

    $('.top-cart-contain').mouseenter(function() {
        $(this).find(".top-cart-content").stop(true, true).slideDown();
    });
    //hide submenus on exit
    $('.top-cart-contain').mouseleave(function() {
        $(this).find(".top-cart-content").stop(true, true).slideUp();
    });


    var VMEGAMENU_POPUP_EFFECT = 1;
    $("#html_menu_link ul li").each(function() {
        var url = document.URL;
        $("#html_menu_link ul li a").removeClass("act");
        $('#html_menu_link ul li a[href="' + url + '"]').addClass('act');
    });

    $('.html_menu').hover(function() {
        if (VMEGAMENU_POPUP_EFFECT == 0) $(this).find('.popup').stop(true, true).slideDown('slow');
        if (VMEGAMENU_POPUP_EFFECT == 1) $(this).find('.popup').stop(true, true).fadeIn('slow');
        if (VMEGAMENU_POPUP_EFFECT == 2) $(this).find('.popup').stop(true, true).show('slow');
    }, function() {
        if (VMEGAMENU_POPUP_EFFECT == 0) $(this).find('.popup').stop(true, true).slideUp('fast');
        if (VMEGAMENU_POPUP_EFFECT == 1) $(this).find('.popup').stop(true, true).fadeOut('fast');
        if (VMEGAMENU_POPUP_EFFECT == 2) $(this).find('.popup').stop(true, true).hide('fast');
    })
    $(".title-vmega-menu").on('click', function() {
        $(".category-vmega_toggle").slideToggle();
        $(".category-vmega_toggle").css("overflow", "visible")
    })
    $('#html_megamenu .category-vmega_toggle .more-wrap').on('click', function() {
        $('#html_megamenu .category-vmega_toggle .extra_menu').slideToggle();
        if ($("#html_megamenu .category-vmega_toggle .more-view").hasClass('open')) {
            $("#html_megamenu .category-vmega_toggle .more-view").removeClass('open');
            $("#html_megamenu .category-vmega_toggle .more-view").text('More Categories');
        } else {
            $("#html_megamenu .category-vmega_toggle .more-view").addClass('open');
            $("#html_megamenu .category-vmega_toggle .more-view").text('Close Menu');
        }
    });

    $('.selectpicker').selectpicker({
        'selectedText': 'cat'
    });


    var body_class = $('body').attr('class');
    var home_class = "cms-index-index";
    if (body_class.indexOf(home_class) != -1) {
        $('#html_menu_home').addClass('act');
    }
    var body_class = $('body').attr('class');
    var home_class = "cms-index-index-3";
    if (body_class.indexOf(home_class) != -1) {
        $('#html_menu_home').addClass('act');
        $('#html_megamenu .category-vmega_toggle').css('display', 'block');
    }

    $('#custommenu a').each(function() {
        var url = document.URL;
        $('#custommenu a').removeClass('act');
        $('#custommenu a[href="' + url + '"]').addClass('act');
        $('#custommenu a[href="' + url + '"]').closest('div#html_menu_home').addClass('act');
    });



    $('.html_menu_no_child').hover(function() {
        $(this).addClass("active");
    }, function() {
        $(this).removeClass("active");
    })

    $('.html_menu').hover(function() {
        if ($(this).attr("id") != "html_menu_link") {
            $(this).addClass("active");
        }
    }, function() {
        $(this).removeClass("active");
    })

    $('.html_menu').hover(function() {
        /*show popup to calculate*/
        $(this).find('.popup').css('display', 'inline-block');

        /* get total padding + border + margin of the popup */
        var extraWidth = 0
        var wrapWidthPopup = $(this).find('.popup').outerWidth(true); /*include padding + margin + border*/
        var actualWidthPopup = $(this).find('.popup').width(); /*no padding, margin, border*/
        extraWidth = wrapWidthPopup - actualWidthPopup;

        /* calculate new width of the popup*/
        var widthblock1 = $(this).find('.popup .block1').outerWidth(true);
        var widthblock2 = $(this).find('.popup .block2').outerWidth(true);
        var new_width_popup = 0;
        if (widthblock1 && !widthblock2) {
            new_width_popup = widthblock1;
        }
        if (!widthblock1 && widthblock2) {
            new_width_popup = widthblock2;
        }
        if (widthblock1 && widthblock2) {
            if (widthblock1 >= widthblock2) {
                new_width_popup = widthblock1;
            }
            if (widthblock1 < widthblock2) {
                new_width_popup = widthblock2;
            }
        }
        var new_outer_width_popup = new_width_popup + extraWidth;

        /*define top and left of the popup*/
        var wraper = $('.custommenu');
        var wWraper = wraper.outerWidth();
        var posWraper = wraper.offset();
        var pos = $(this).offset();

        var xTop = pos.top - posWraper.top + CUSTOMMENU_POPUP_TOP_OFFSET;
        var xLeft = pos.left - posWraper.left;
        if ((xLeft + new_outer_width_popup) > wWraper) xLeft = wWraper - new_outer_width_popup;

        $(this).find('.popup').css('top', xTop);
        $(this).find('.popup').css('left', xLeft);

        /*set new width popup*/
        $(this).find('.popup').css('width', new_outer_width_popup);
        $(this).find('.popup .block1').css('width', new_width_popup);

        /*return popup display none*/
        $(this).find('.popup').css('display', 'none');

        /*show hide popup*/
        if (CUSTOMMENU_POPUP_EFFECT == 0) $(this).find('.popup').stop(true, true).slideDown('slow');
        if (CUSTOMMENU_POPUP_EFFECT == 1) $(this).find('.popup').stop(true, true).fadeIn('slow');
        if (CUSTOMMENU_POPUP_EFFECT == 2) $(this).find('.popup').stop(true, true).show('slow');
    }, function() {
        if (CUSTOMMENU_POPUP_EFFECT == 0) $(this).find('.popup').stop(true, true).slideUp();
        if (CUSTOMMENU_POPUP_EFFECT == 1) $(this).find('.popup').stop(true, true).fadeOut('slow');
        if (CUSTOMMENU_POPUP_EFFECT == 2) $(this).find('.popup').stop(true, true).hide('fast');
    })

    $(document).off('mouseenter').on('mouseenter', '.pos-slideshow', function(e) {
        $('.banner7-container .timethai').addClass('pos_hover');
    });

    $(document).off('mouseleave').on('mouseleave', '.pos-slideshow', function(e) {
        $('.banner7-container .timethai').removeClass('pos_hover');
    });
	
	// Home Slider
    $('#inivoslider-banner7').nivoSlider({
        effect: 'random',
        slices: 15,
        boxCols: 8,
        boxRows: 4,
        animSpeed: 1000,
        pauseTime: 6000,
        startSlide: 0,
        controlNavThumbs: false,
        pauseOnHover: true,
        manualAdvance: false,
        prevText: 'Prev',
        nextText: 'Next',
        afterLoad: function() {
            $('.loading').css("display", "none");
        }
    });

	// Products Slider (Timer)
    $(".timer-container .owl").owlCarousel({
        autoPlay: false,
        items: 1,
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [980, 1],
        itemsTablet: [768, 1],
        itemsMobile: [479, 1],
        slideSpeed: 3000,
        paginationSpeed: 3000,
        rewindSpeed: 3000,
        navigation: true,
        stopOnHover: true,
        pagination: false,
        scrollPerPage: true,
    });

    //Count down
    $('.countbox_1.timer-grid').each(function() {
        var countTime = $(this).attr('data-time');
        $(this).countdown(countTime, function(event) {
            $(this).html(
                '<div class="day box-time-date"><span class="time-num time-day">' + event.strftime('%D') + '</span>Days</div><div class="hour box-time-date"><span class="time-num">' + event.strftime('%H') + '</span>Hrs</div><div class="min box-time-date"><span class="time-num">' + event.strftime('%M') + '</span>Mins</div><div class="min box-time-date sec"><span class="time-num">' + event.strftime('%S') + '</span>Secs</div>'
            );
        });
    });

    // Product Tabs Slider
    $(".producttabs-products-owl").owlCarousel({
        autoPlay: false,
        items: 4,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [980, 3],
        itemsTablet: [768, 2],
        itemsMobile: [479, 1],
        slideSpeed: 3000,
        paginationSpeed: 3000,
        rewindSpeed: 3000,
        navigation: true,
        stopOnHover: true,
        pagination: false,
        scrollPerPage: true,
    });

	// Product Tabs Slider
    $("#tab4-category_tabs .owl, .tab_content_category_tabs_3 .owl, #tab5-category_tabs .owl, #tab6-category_tabs .owl").owlCarousel({
        autoPlay: false,
        items: 5,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [980, 3],
        itemsTablet: [768, 2],
        itemsMobile: [480, 1],
        slideSpeed: 1000,
        paginationSpeed: 1000,
        rewindSpeed: 1000,
        navigation: true,
        stopOnHover: true,
        pagination: false,
    });

	// From to Blog Slider
    $(".menu-recent .owl, .product-images .quick-thumbnails").owlCarousel({
        autoPlay: false,
        items: 2,
        itemsDesktop: [1199, 2],
        itemsDesktopSmall: [980, 2],
        itemsTablet: [768, 2],
        itemsMobile: [479, 1],
        slideSpeed: 1000,
        paginationSpeed: 1000,
        rewindSpeed: 1000,
        navigation: true,
        stopOnHover: true,
        pagination: false,
        scrollPerPage: true,
    });

	// Brand Slider
    $(".brand-slider-contain .owl, .menu-recent .layout-3").owlCarousel({
        autoPlay: true,
        items: 4,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [980, 3],
        itemsTablet: [768, 2],
        itemsMobile: [479, 2],
        slideSpeed: 1000,
        paginationSpeed: 1000,
        rewindSpeed: 1000,
        navigation: true,
        stopOnHover: true,
        pagination: false,
        scrollPerPage: true,
    });

    /*thumbnail click*/
    $('.quick-thumbnails a').each(function() {
        var quickThumb = $(this);
        var quickImgSrc = quickThumb.attr('href');
        quickThumb.on('click', function(event) {
            event.preventDefault();
            $('.main-image').find('img').attr('src', quickImgSrc);
        });
    });
	
	//Image zoom
	$('.zoom_in_marker').on('click', function(){
		$.fancybox({
			href: $('.woocommerce-main-image').attr('href'),
			openEffect: 'elastic',
			closeEffect: 'elastic'
		});
	});

    //Tab jQuary
    $('#producttabs li').on('click', function() {
        var pr_tab = $(this).find("h3").attr("class");
        $('#producttabs li').removeClass("active");
        $(this).addClass("active");
        $("#producttab_" + pr_tab).slideDown(400).siblings().slideUp(400);
    });
    $('.product-tabs li').each(function() {
        $(this).on('click', function() {
            var tabRel = $(this).attr('rel');

            $('.product-tabs .tab').removeClass('active');
            $(this).addClass('active');

            $('.panel').removeClass('active');
            $('#' + tabRel).addClass('active');
        });
    });
    $(".tab_content_category_tabs").hide();
    $(".tab_content_category_tabs:first").show();
    $("ul.tabs-category_tabs li").on('click', function() {
        $("ul.tabs-category_tabs li").removeClass("active");
        $(this).addClass("active");
        $(".tab_content_category_tabs").hide();
        var activeTab = $(this).find("p").attr('class');
        $("#" + activeTab).fadeIn();
    });

	// Show Newsletter
    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toGMTString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
    };

    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
        }
        return "";
    };

    if (getCookie("shownewsletter") != 1) {
        $('#newsletter_pop_up').bPopup({
            position: ['auto', 120],
            easing: 'easeOutBack', //uses jQuery easing plugin
            speed: 450,
            transition: 'slideDown',
            onClose: function() {
                setCookie("shownewsletter", '1', 1);
            }
        });
    };

    //Price Slider / UI jQuary Slider
    var currencies = "$";
    var toolbar_status = "1";
    var rate = "1";
    var min = "99"
    min = Number(min);
    var max = "999"
    max = Number(max);
    var currentMinPrice = "99"
    currentMinPrice = Number(currentMinPrice);
    var currentMaxPrice = "999"
    currentMaxPrice = Number(currentMaxPrice);
    var params = "";
    params = $.trim(params);
    //slider
    $("#slider-range").slider({
        range: true,
        min: min,
        max: max,
        values: [currentMinPrice, currentMaxPrice],
        slide: function(event, ui) {
            $("#amount").val(currencies + ui.values[0] + " - " + currencies + ui.values[1]);
            $('input[name="first_price"]').val(ui.values[0]);
            $('input[name="last_price"]').val(ui.values[1]);
        }
    });

    $("#amount").val(currencies + $("#slider-range").slider("values", 0) +
        " - " + currencies + $("#slider-range").slider("values", 1));
    $('input[name="first_price"]').val($("#slider-range").slider("values", 0));
    $('input[name="last_price"]').val($("#slider-range").slider("values", 1));


    $('#slider-range a:first').addClass('first_item');
    $('#slider-range a:last').addClass('last_item');


    //Login Popup Overlay
    $('.wendy_login').on('click', function() {
        $('#control_overlay').show();
        $('.wendy_top').show();
        $('#onepagecheckout_loginbox').show();
    });
    $('.cusomer_forgot_password_link').on('click', function() {
        $('#control_overlay').show();
        $('.wendy_top').show();
        $('#onepagecheckout_loginbox').hide();
        $('#onepagecheckout_forgotbox').show();
    });
    $('.onepagecheckout_loginlink').on('click', function() {
        $('#control_overlay').show();
        $('.wendy_top').show();
        $('#onepagecheckout_loginbox').show();
        $('#onepagecheckout_forgotbox').hide();
    });
    $('.close_login').on('click', function() {
        $('#control_overlay').hide();
        $('.wendy_top').hide();
        $('#onepagecheckout_loginbox').hide();
        $('#onepagecheckout_forgotbox').hide();
    });
    $('#customer_account_create').on('click', function() {
        var length = $("[id='customer_account_create']:checked").length;
        switch (length) {
            case 1:
                $('#register-customer-password').show();
                break;
            case 0:
                $('#register-customer-password').hide();
                break
        }
    });
    $('#billing_use_for_shipping_yes').on('click', function() {
        var length = $("[id='billing_use_for_shipping_yes']:checked").length;
        switch (length) {
            case 1:
                $('.wendy_ship_to_adress').hide();
                break;
            case 0:
                $('.wendy_ship_to_adress').show();
                break
        }
    });
    $('.terms-link').on('click', function() {
        $('#control_overlay').show();
        $('.term_conditions').show();
        e.preventDefault();
    });
    $('.close a').on('click', function() {
        $('#control_overlay').hide();
        $('.term_conditions').hide();
        e.preventDefault();
    });
    $('#control_overlay').on('click', function(e) {
        $('#control_overlay').hide();
        $('.term_conditions').hide();
        $('.wendy_top').hide();
        $('#onepagecheckout_loginbox').hide();
        $('#onepagecheckout_forgotbox').hide();
        e.preventDefault();
    });

    // hide #back-top first
    $("#back-top").hide();

    // fade in #back-top
    $(function() {
        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 100) {
                $('#back-top').fadeIn();
            } else {
                $('#back-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-top').on('click', function() {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });
})(jQuery);