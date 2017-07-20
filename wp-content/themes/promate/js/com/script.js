jQuery(function($) {
    // 'use strict';
    //variant
    //scroll menu
    scroll_menu = $('.headroom');

    //parallax
    parallax = $('.parallax');
    parallax_ratio = 0.5;
    parallax_data = 'data-stellar-background-ratio';
    parallax_horizon = false;
    parallax_scroll = 'scroll';
    parallax_position = 'position';
    parallax_verticalOffset = 40;

    //scroll menu
    scroll_menu.headroom({
        offset: 44
    });
    //parallax
    parallax.attr(parallax_data, parallax_ratio);
    $.stellar({
        horizontalScrolling: parallax_horizon,
        scrollProperty: parallax_scroll,
        positionProperty: parallax_position,
        verticalOffset: parallax_verticalOffset
    });

    //
    if ($(".adversiting ul.menu").length > 0) {
        $('.adversiting ul.menu').owlCarousel({
            singleItem: true
        });
    }

    if ($(".vertical-menu").length > 0) {
        $(document).on('vertical-menu-product', function(e, d) {

            if (d && d['$elem'].is(".vertical-menu ul.on-sale.owl-carousel")) {
                d.reinit({
                    singleItem: false,
                    items: 3,
                    itemsDesktop: [1000, 3],
                    itemsDesktopSmall: [900, 1],
                    itemsTablet: [600, 1],
                    itemsMobile: false,
                    afterInit: false
                });

            }

        });

    }


    if ($(".adversiting-homepage2").length > 0) {
        var owl_adversiting_2 = $(".adversiting-homepage2 ul.menu").data('owlCarousel');
        owl_adversiting_2.reinit({
            singleItem: false,
            items: 2,
            itemsDesktop: [2, 5],
            itemsDesktopSmall: [900, 2],
            itemsTablet: [600, 1],
            itemsMobile: false
        });
    }


    if ($(".our-services .owl-carousel").length > 0) {
        $(".our-services .owl-carousel").owlCarousel({
            singleItem: false,
            pagination: false,
            autoPlay: true,
            direction: jQuery("body").hasClass("rtl") ? "rtl" : "ltr",
            pagination: false,
            navigation: true,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            autoHeight: true,
            items: 3, //items above 1000px browser width
            itemsDesktop: [1000, 3], //5 items between 1000px and 901px
            itemsDesktopSmall: [991, 2], // betweem 900px and 601px
            itemsTablet: [600, 2], //2 items between 600 and 0
            itemsMobile: [480, 1] // itemsMobile disabled - inherit from itemsTablet option

        });
    }




    // search
    var spoint = '.jv-ajaxsearchpro',
        cpoint = '.jv-ajax-cart--dropdown [data-toggle="dropdown"]';
    $(document).delegate('.jv-ajaxsearchpro--icon', 'click.tosearch', function() {

        $(this).closest(spoint).toggleClass('active');
        $(cpoint).parent().removeClass('open');
        return false;

    }).on('click.rsearch', function(e) {
        var target = $(e.target);
        if (target.is(spoint) || target.closest(spoint).length) {
            return;
        }
        $(spoint).removeClass('active');
    }).delegate(cpoint, 'click', function() {
        $(spoint).removeClass('active');
    });

    /* .jv-module.module.vertical-menu.all-department */

    var mitem = $('.vertical-menu .hasChild');

    $(window).on({
        'zmenu-resiz': function() {
            var wc = $('#block-footer > .container > .position-footer').outerWidth(true),
                wsb = $('#sidebar-a > .sidebar-inner').outerWidth(true);
            wc -= wsb;

            mitem.each(function() {

                var e = $(this).delegate('.level1', 'click', function() {

                    var ep = $(this).parent(),
                        a = ep.hasClass('active');

                    mitem.each(function() {
                        $(this).trigger('dactive');
                    });

                    a || ep.addClass('active');

                    return false;

                }).on('dactive', function() {

                    $(this).removeClass('active');

                });


                e.find(' > div ').css({
                    left: wsb
                });

                !e.children('.level1').hasClass('megamenu') || e.find(' > div, > ul').css({
                    width: wc
                });

            });
        },
        'resize': function() {

            $(this).trigger('zmenu-resiz');

        }
    }).trigger('zmenu-resiz');

    $(document).on('click', function(e) {

        var target = $(e.target);

        if (target.is('.insubitem > ul,.group-content > ul') || target.closest('.insubitem > ul,.group-content > ul').length) {
            return;
        }

        mitem.each(function() {
            $(this).trigger('dactive');
        });

    });

    //circle load
    if ($('.circliful').length > 0) {
        $('.circliful').circliful();
    }



    // search
    var vm_category = '.vm-menu-category li';
    $(vm_category).delegate('i', 'click', function() {
        $(this).closest(vm_category).toggleClass('active');
    });

    //vmfilter
    var vm_filter = '.sidebar .jv-module.vm-filter .jv-module';
    $(".sidebar .jv-module.vm-filter h3").click(function() {
        $(this).parent().children(".contentmod,.jv-customfields_vm ul").slideToggle("slow");
        $(this).parent().toggleClass('active');
    });

    /* Responsive style 2 */


});



/**
 * Block our product
 * TODO: 
 **/
jQuery(function($) {

    var e = $('.jv-module.our-product.our-product-2');

    if (!e.length) {
        return false;
    }

    var tabs = e.find('[data-tab="our-product"] > li');

    function g(d) {
        return this.filter('.active')[d]().children('[data-toggle="tab"]');
    }

    e.delegate('[data-controls="our-product"] .owl-prev', 'click', function() {

        g.call(tabs, 'prev').tab('show');

        return false;

    });

    e.delegate('[data-controls="our-product"] .owl-next', 'click', function() {

        g.call(tabs, 'next').tab('show');

        return false;

    });

});

/**
 * TODO: setup color default for page
 */
jQuery(function($) {

    $('.position-menu a[class*="color-"]').each(function() {

        var e = $(this),
            h = e.attr('href'),
            color = e.attr('class').match(/color-[a-zA-Z0-9]+/);

        if (color) {
            color = color.shift().replace('-', '=');
            h += (h.match(/\?/) ? '&' : '?');
            h += color;

            e.attr('href', h);
        }
    });

});


!window.Virtuemart || (function() {
    Virtuemart.decrQuantity = (function(event) {
        var rParent = jQuery(this).parent().parent();
        quantity = rParent.find('input[name="quantity[]"]');
        virtuemart_product_id = rParent.find('input[name="virtuemart_product_id[]"]').val();
        Ste = parseInt(quantity.attr("data-step"));
        if (isNaN(Ste))
            Ste = 1;
        minQtt = parseInt(quantity.attr("data-init"));
        if (isNaN(minQtt))
            minQtt = 1;
        Qtt = parseInt(quantity.val());
        if (!isNaN(Qtt) && Qtt > Ste) {
            quantity.val(Qtt - Ste);
            if (!isNaN(minQtt) && quantity.val() < minQtt) {
                quantity.val(minQtt);
            }
        } else
            quantity.val(minQtt);
        Virtuemart.setproducttype(event.data.cart, virtuemart_product_id);
    });
})(jQuery);


/* Filter page shop */
jQuery(function($) {
    var e = $('.jv-customfields_vm_23');
    if (!e.length) {
        return;
    }
    e.find('[data-field]').each(function() {
        var a = $(this);
        a.css({
            backgroundColor: $.trim(a.text()).toLowerCase()
        });
    });
});

jQuery(function($) {


    //update
    if ($(".jv-module.on-sale").length > 0) {
        var owl_on_sale = $(".jv-module.on-sale .owl-carousel");
        owl_on_sale.owlCarousel({
            singleItem: false,
            items: 3,
            itemsDesktop: [1034, 3],
            itemsDesktopSmall: [991, 2],
            itemsTablet: [768, 2],
            itemsMobile: [480, 1],
            navigation: true,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]

        });
    }

    if ($(".jv-module-homepage2.vm-recommended").length > 0) {
        var owl_on_sale = $(".jv-module-homepage2.vm-recommended .owl-carousel");
        owl_on_sale.owlCarousel({
            singleItem: false,
            items: 1,
            itemsDesktop: [1034, 1],
            itemsDesktopSmall: [991, 1],
            itemsTablet: [767, 2],
            itemsMobile: [480, 1],
            navigation: true,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]

        });
    }

    if ($(".vm-single-related-product").length > 0) {
        var owl_on_sale = $(".vm-single-related-product .product-related-content");
        owl_on_sale.owlCarousel({
            singleItem: false,
            items: 1,
            itemsDesktop: [1034, 1],
            itemsDesktopSmall: [991, 2],
            itemsTablet: [768, 2],
            itemsMobile: [480, 1],
            navigation: true,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]

        });
    }

});
