jQuery(function($) {
    // 'use strict';
    //variant
    //scroll menu

    jQuery('#product_tab').tabCollapse();

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


    mini_logo = $('#logo-2');
    mini_logo.headroom({
        offset: 44,
        tolerance: 5,
        classes: {
            initial: "logo-2room",
            pinned: "logo-2_pin",
            unpinned: "logo-2_unpin",
            top : "logo-2--top",
            notTop : "logo-2--not-top",
            bottom : "logo-2--bottom",
            notBottom : "logo-2--not-bottom"
        }
    });

    mobile_logotype = $('.custom-nekit');
    mobile_logotype.headroom({
        offset: 44,
        tolerance: 5,
        classes: {
            initial: "mob-logo",
            pinned: "mob-logo_pin",
            unpinned: "mob-logo_unpin",
            top : "mob-logo--top",
            notTop : "mob-logo--not-top",
            bottom : "mob-logo--bottom",
            notBottom : "mob-logo--not-bottom"
        }
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
    var vm_category = 'ul li';
	
	$('ul.vm-menu-category .cat-item i').click(function(){
		$(this).parent().toggleClass('active');
	});
    //$(vm_category).delegate('i', 'click', function() {		
    //    $(this).closest(vm_category).toggleClass('active');
    //});

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
            items: 4,
            itemsDesktop: [1034, 4],
            itemsDesktopSmall: [991, 3],
            itemsTablet: [768, 2],
            itemsMobile: [480, 1],
            navigation: true,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
    
        });
    }
	
	if ($(".vm-single-related-product, .product_list_widget").length > 0) {
        var owl_on_sale = $(".vm-single-related-product .owl-carousel.products, .product_list_widget");
        owl_on_sale.owlCarousel({
            singleItem: false,
            items: 1,
            itemsDesktop: [1034, 1],
            itemsDesktopSmall: [991, 1],
            itemsTablet: [768, 1],
            itemsMobile: [480, 1],
            navigation: true,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
    
        });
    }
	
	if ($(".on-mobile").length > 0) {
        var owl_on_partner = $(".on-mobile");
        owl_on_partner.owlCarousel({
            singleItem: false,
			loop:true,
            items: 6,
            itemsDesktop: [1034, 6],
            itemsDesktopSmall: [991, 4],
            itemsTablet: [768, 3],
            itemsMobile: [480, 1],
            navigation: true,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
    
        });
    }
	if ($(".on-partner").length > 0) {
        var owl_on_partner = $(".on-partner");
        owl_on_partner.owlCarousel({
            singleItem: false,
			loop:true,
			autoPlay: true,			
            items: 6,
			slideSpeed: 500,
            itemsDesktop: [1034, 6],
            itemsDesktopSmall: [991, 3],
            itemsTablet: [768, 3],
            itemsMobile: [480, 2],
            navigation: false,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
    
        });
    }
	
	if ($(".on-upsell").length > 0) {
        var owl_on_partner = $(".on-upsell");
        owl_on_partner.owlCarousel({
            singleItem: false,
			loop:true,
            items: 4,
            itemsDesktop: [1034, 4],
            itemsDesktopSmall: [991, 3],
            itemsTablet: [768, 2],
			//itemsCustom: [730, 2],
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

    if ($(".vm-single-related-product,.testimonials-list, .jvlastestnews-items").length > 0) {
        var owl_on_sale = $(".vm-single-related-product .product-related-content,.testimonials-list,  .jvlastestnews-items");
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
	
	
	$(document).ready(function($){
		$('.cf4all_button').click(function(){			
			var selInput = $(this).parent().children('input').attr('checked', 'checked').val();			
			
			var selected = $(this).parents('div.product-field').attr('data-ref');
			
			//$('#' + selected + ' select').children('option').attr('value', selInput);
			
			$.each($('#' + selected + ' select').children('option'), function(id, option){
				
				if(option.value == selInput){
					
					$(this).attr('selected', '');
					$(this).parent().change();
				}else{
					$(this).removeAttr('selected');
				}		
			});
		});
		//$('.cf4all_button').hover(function(){			
		//	
		//	var selInput = $(this).parent().children('input').attr('checked', 'checked').val();			
		//	
		//	var selected = $(this).parents('div.product-field').attr('data-ref');
		//	
		//	//$('#' + selected + ' select').children('option').attr('value', selInput);
		//	
		//	$.each($('#' + selected + ' select').children('option'), function(id, option){
		//		
		//		if(option.value == selInput){
		//			
		//			$(this).attr('selected', '');
		//			$(this).parent().change();
		//		}else{
		//			$(this).removeAttr('selected');
		//		}		
		//	});
		//});
		
		
		//relayout masonry
		
			$('.vm-tools-layout > a').click(function() {
				if($(this).hasClass('view-grid')){
					$(this).addClass('active');
					$(this).parent().find('.view-list').removeClass('active');
					$('.vm-listing').removeClass('vm-list');
				}else if($(this).hasClass('view-list')){
					$(this).addClass('active');
					$(this).parent().find('.view-grid').removeClass('active');
					
					$('.vm-listing').addClass('vm-list');
				}
				
			});
		
		$('a.chzn-single > div').click(function(){
			
			
			var parent = $(this).parents('.chzn-container');
			if(parent.hasClass('chzn-container-active')){
				parent.removeClass('chzn-container-active').removeClass('chzn-with-drop');
			}else{
				parent.addClass('chzn-container-active').addClass('chzn-with-drop');				
			}
			
			
		});
		
		
		$('ul.chzn-results li').click(function(){
			
			var data = $(this).attr('data-option-array-index');
			
			var select = $(this).parents('.woocommerce-ordering, .woocommerce-page').children('select').find('option');
			$.each(select, function(id){
				
				if(id == data){
				
					$(this).attr('selected', '');
					$(this).parents('.woocommerce-ordering, .woocommerce-page').children('select').change();
				}else{
					$(this).removeAttr('selected');
				}
			});
		});
		
	});
	
	if(window.location.search != '' && window.location.search != undefined){		
		var elementClick = $('#block-breadcrumb');
		
		if(elementClick.is(':visible')){
			var destination = elementClick.offset().top;
			
			jQuery("html:not(:animated),body:not(:animated)").animate({
				scrollTop: destination
			}, 800);
		}
		
	}
	
	
	$('.gotoreview').click(function(){
		var elementClick = $('#tabs-single-product');
		
		if(elementClick.is(':visible')){
			var destination = elementClick.offset().top;
			
			jQuery("html:not(:animated),body:not(:animated)").animate({
				scrollTop: destination
			}, 800);
		}
		$('ul.nav-tabs li').removeClass('active');
		$('ul.nav-tabs li.reviews_tab a').click();
	});
	
	$('.responsive-layout--menu').on('click', function(){
		if( $('#block-mainnav-mobile').is(':visible') ) {
			$('#block-mainnav-mobile').animate({ 'width': '0px' }, 'slow', function(){
				$('#block-mainnav-mobile').hide();
			});
			$('#main-content').animate({ 'margin-left': '0px' }, 'slow');
		}
		else {
			$('#block-mainnav-mobile').show();
			$('#block-mainnav-mobile').animate({ 'width': '210px' }, 'slow');
			// $('#main-content').animate({ 'margin-left': '210px' }, 'slow');
		}
	});
	$('body').on('added_to_cart',function(){
		$('.dropdown').addClass('open');
		$('.open>.dropdown-menu').prepend('<i class="fa fa-times" aria-hidden="true"></i>');
        if($('body').width() < 980)
		    $("html, body").animate({ scrollTop: 0 }, "slow");
	});

	
	// $( document.body ).on('updated_checkout', function(e){
	// 	var radio = $('input[type="radio"]:checked').val();
	//	
	// 	if(radio && radio != undefined && radio == 'free_shipping:4'){
	// 		$('#department_field').show('fast');
	// 	}else{
	// 		$('#department_field').hide('fast');
	// 	}
	// });
	
	
	
	
	var attachWrap = $('div.attach-event');
	var attachButton = attachWrap.find('.attach-open');
	var attachValue = attachWrap.find('.attach-value');
	var inputFile = attachWrap.find('input[type="file"]');
	
	inputFile.change(function(){
		$this = $(this);
		fullPath = $this.val();		
		fileName = fullPath.split(/(\\|\/)/g).pop();
		attachValue.text(fileName);
	});
	
	attachButton.click(function(event){
		
		inputFile.click();
		
		event.preventDefault();		
	});
	
	attachValue.click(function(event){
		
		inputFile.click();
		
		event.preventDefault();		
	});
	
	var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });
	
	overlay.click(function(){
		 hamburger_cross();   
		$('#wrapper').toggleClass('toggled');		 
	})
	
    function hamburger_cross() {

      if (isClosed == true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });
  
  $('ul#fxmenu1 li.menu-item-has-children > i').click(function(event){
	  
	  if (event.target !== this)
			return;
		
	  $(this).parent().children('ul').toggle();
	  
	  if(!$(this).parent().hasClass('active')){
		  $(this).parent().addClass('active');
	  }else{
		  $(this).parent().removeClass('active');
	  }
	  
  });
    $(document).ready(function(){

        var url=document.location.href;
        $.each($("#fxmenu1 a"),function(){

            if(this.href == url){$(this).addClass('active-menu-item');};

        });

    });

});

