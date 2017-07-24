(function(){
	jQuery(document).ready(function (){
		jQuery('select').chosen({"disable_search_threshold":10,"allow_single_deselect":true,"placeholder_text_multiple":"\u0412\u044b\u0431\u0435\u0440\u0438\u0442\u0435 \u043d\u0435\u0441\u043a\u043e\u043b\u044c\u043a\u043e \u0437\u043d\u0430\u0447\u0435\u043d\u0438\u0439","placeholder_text_single":"\u0412\u044b\u0431\u0435\u0440\u0438\u0442\u0435 \u0437\u043d\u0430\u0447\u0435\u043d\u0438\u0435","no_results_text":"\u0420\u0435\u0437\u0443\u043b\u044c\u0442\u0430\u0442\u044b \u043d\u0435 \u0441\u043e\u0432\u043f\u0430\u0434\u0430\u044e\u0442"});
	});
	
	jQuery(window).on('load',  function() {
	new JCaption('img.caption');
	});
	
	  jQuery(function($) {
		$( "[data-responsive-selector]" ).each( function() {
	
	var e = $( this );
	
	e.html( $( e.attr( "data-responsive-selector" ) ).clone().children() );
	
	} );
	
	var lastKeyUp, interval, lastVal;
	
	$( document ).on( "wcart-update", function( e, ncart ) {
	
	$( "[data-responsive-prev='.menu-jvajaxcart']" ).find( "#vmCartModule" ).html( ncart.clone() );
	
	} ).delegate( ".responsive-layout--search .jv-ajaxsearchpro--input", "keydown", function() {
	lastKeyUp = new Date().getTime();
	} ).delegate( ".responsive-layout--search .jv-ajaxsearchpro--input", "focusin", function() {
	clearInterval(interval);
	var e = $( this );
	interval = setInterval(function(){
	if(( new Date().getTime() - lastKeyUp) < 1000) return;
	var val = e.val();
	
	if(val && val != "") val = val.trim();
	else return;
	if(val === lastVal) return;
	lastVal = val;
	
	$( ".jv-ajaxsearchpro--input" ).not( e ).val( val ).focusin();
	
	},10);
	} ).delegate( ".responsive-layout--search .jv-ajaxsearchpro--input", "focusout", function() {
	clearInterval(interval);
	} );
	
	});
	
	
	jQuery(function($){ 
		var grid = $(".vm-product-grid");
		grid.imagesLoaded(function() {
			grid.masonry({
				itemSelector: ".vm-product-grid-item"
			});					
		});
	});
	
	
	  jQuery(function($) {
		var win = $(window);
	
		win.on( "rebind-block-slide", function() {
		  if ( JVMenu.getViewport("x") > 992) {
			$("#block-slide").css("padding-top", $(".block-panel-wrapper").outerHeight() +  $("#block-mainnav ul.fxmenu").outerHeight()  );
		  }
		  
		} )
		.on("resize", function () {
			if ( JVMenu.getViewport("x") > 992) {
			  $(".headroom").css("position", "fixed");
			  win.trigger("rebind-block-slide");
			  //fix content without fixed menu if not exist block slideshow
			  if (!$("#block-slide").length) {
				  $(".fix-notexist-slideshow").css("height", ($(".headroom").outerHeight() + $("#block-mainnav").outerHeight()));
			  }               
			}
			else{
			  $("#block-slide").css("padding-top", 0);
			  $(".headroom").css("position", "relative");
			  $(".fix-notexist-slideshow").css("height",0);
			  
			}
	
		}).trigger("resize");
	
	   $(window).on("load", function () {
		  $(window).trigger("resize");
		}).on( "scroll", function() {
			var w = $( this );
			  if( !w.scrollTop() ){
				w.trigger( "rebind-block-slide" );
			  }
		} );
	  });
	
	jQuery(function($){
	$(".testimonials-list364").owlCarousel({
	singleItem:true,
	 autoPlay : false,
	 stopOnHover : false,
	 pagination : true,
	 paginationNumbers: false,
	 autoHeight : true,
	 transitionStyle : false,
	 addClassActive : true,
	 navigation:true,
	navigationText	:["<i class=\"fa fa-angle-left\"></i>","<i class=\"fa fa-angle-right\"></i>"]	
	});
	});
	
	
	jQuery(function($){
		$("#jvlatestnews357 ul.jvlastestnews-items").owlCarousel({
			singleItem:true,
			autoPlay : false,
			stopOnHover : false,
			pagination : false,
			paginationNumbers: false,
			autoHeight : true,
			transitionStyle : false,
			addClassActive : true,
			navigation:true,
			navigationText  :["<i class=\"fa fa-angle-left\"></i>","<i class=\"fa fa-angle-right\"></i>"]          
		});
	});
	
	
	jQuery(function($){
		$(".vm_manufacture-custom433 ul.owl-carousel").owlCarousel({
			pagination : false,
			autoPlay : true ,
			items :   6 ,
			itemsDesktop : [1024,5],
			itemsDesktopSmall: [991, 4],
			itemsTablet: [768, 4],
			itemsMobile: [480, 3],
			paginationNumbers: false,
			autoHeight : true,
			transitionStyle : false,
			addClassActive : true,
			navigation:true,
			navigationText  :["<i class=\"fa fa-angle-left\"></i>","<i class=\"fa fa-angle-right\"></i>"]    
		});
	});
	
	 jQuery(function($){
		 $("#jvproduct--mod_vmp434").owlCarousel({
			 pagination : false,
			 autoPlay : false,
			 direction : jQuery("body").hasClass( "rtl" )?"rtl":"ltr",
			pagination: false,
				navigation: true,
			navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
			items: 3,
			itemsDesktop : [1024,3],
			 itemsDesktopSmall: [991, 2],
			 itemsTablet: [768, 2],
			 itemsMobile: [480, 1],
				afterInit: function( a ) {
					$( document ).trigger( "vertical-menu-product", [ this ] );
				}
	
		 });
	 });
	 
	jQuery(function($) {
	var c = (function(p){ 
	return p || {} ;
	})({"delay":9000,"shuffle":"off","touchenabled":"on","drag_block_vertical":0,"swipe_min_touches":1,"autoHeight":"off","dottedOverlay":"none","forceFullWidth":"off","fullScreenAlignForce":"off","fullScreenOffset":"","fullScreenOffsetContainer":"","hideAllCaptionAtLimit":0,"hideArrowsOnMobile":"off","hideBulletsOnMobile":"off","hideSliderAtLimit":0,"hideNavDelayOnMobile":1500,"hideThumbs":200,"hideThumbsOnMobile":"off","hideThumbsUnderResoluition":0,"hideTimerBar":"top","keyboardNavigation":"off","minFullScreenHeight":"","minHeight":0,"navigationArrows":"solo","navigationHAlign":"center","navigationHOffset":0,"navigationStyle":"preview1","navigationType":"bullet","navigationVAlign":"bottom","navigationVOffset":20,"nextSlideOnWindowFocus":"off","onHoverStop":"on","parallax":"off","parallaxBgFreeze":"off","parallaxDisableOnMobile":"off","shadow":0,"soloArrowLeftHOffset":20,"soloArrowLeftHalign":"left","soloArrowLeftVOffset":0,"soloArrowLeftValign":"center","soloArrowRightHOffset":20,"soloArrowRightHalign":"right","soloArrowRightVOffset":0,"soloArrowRightValign":"center","spinner":"spinner0","startDelay":0,"startwidth":1200,"startheight":600,"stopLoop":"off","stopAfterLoops":-1,"stopAtSlide":-1,"swipe_treshold":75,"thumbAmount":5,"thumbHeight":50,"thumbWidth":"100","startWithSlide":0,"fullWidth":"on","fullScreen":"off","isJoomla":1,"simplifyAll":"off","swipe_threshold":0.7,"hideThumbsUnderResolution":0,"hideCaptionAtLimit":0});
	$('#rev_slider82600491abdeb78944126f849bfd3b10').revolution(c);
	});	
	
	jQuery(function($){
		//assign to element
		var e = $(".jv-result-flag").appendTo("body")
			,win = $( window ).on( {
				"affix-rss": function() {
					var assign_element = $("#block-mainnav");     
		
		if( !assign_element.length ) { return; }
		
					e.css({
						"top": assign_element.offset().top + assign_element.outerHeight(),
						"position":"absolute",
						"width":"100%",
						"z-index":9999
					});
				},
				"scroll": function() {
					$( this ).trigger( "affix-rss" );   
				}
			} ).trigger( "affix-rss" )
		;
		$( "#mainsite > .headroom" ).on( "transitionend webkitTransitionEnd oTransitionEnd", function() {
			win.trigger( "affix-rss" );
		} )
	});
	
	jQuery( function( $ ) {
	$(".jv-login > .modal").each( function() { $( this ).appendTo("body"); } );
	});
	
	
			jQuery(function(){
				new JVMenu('#fxmenu1',{
					main: {
						delay: 300,
						duration: 300,
						effect: 'fade',
						easing: 'linear'
					},
					sub: {
						delay: 300,
						duration: 300,
						effect: 'slide',
						easing: 'linear'
					},
					responsive: 992
				});
			})
		
	jQuery(function($){ $.each([{"selector":".demofadeIn","duration":1000,"delay":0,"offset":100,"iteration":1,"effect":"fadeIn","mobile":false,"groupDelay":0,"groupPoint":"","groupDesc":false},{"selector":".demofadeInLeft","duration":1000,"delay":0,"offset":100,"iteration":1,"effect":"fadeInLeft","mobile":false,"groupDelay":0,"groupPoint":"","groupDesc":false},{"selector":".demofadeInRight","duration":1000,"delay":0,"offset":100,"iteration":1,"effect":"fadeInRight","mobile":false,"groupDelay":0,"groupPoint":"","groupDesc":false},{"selector":".demofadeInUp","duration":1000,"delay":0,"offset":100,"iteration":1,"effect":"fadeInUp","mobile":false,"groupDelay":0,"groupPoint":"","groupDesc":false},{"selector":".demoflip","duration":1000,"delay":0,"offset":100,"iteration":1,"effect":"flip","mobile":false,"groupDelay":0,"groupPoint":"","groupDesc":false},{"selector":".demoflipInY","duration":1000,"delay":0,"offset":100,"iteration":1,"effect":"flipInY","mobile":false,"groupDelay":0,"groupPoint":"","groupDesc":false},{"selector":".demoflipInX","duration":1000,"delay":0,"offset":100,"iteration":1,"effect":"flipInX","mobile":false,"groupDelay":0,"groupPoint":"","groupDesc":false},{"selector":".demorotateIn","duration":1000,"delay":0,"offset":100,"iteration":1,"effect":"rotateIn","mobile":false,"groupDelay":0,"groupPoint":"","groupDesc":false},{"selector":".demorotateInDownLeft","duration":1000,"delay":0,"offset":100,"iteration":1,"effect":"rotateInDownLeft","mobile":false,"groupDelay":0,"groupPoint":"","groupDesc":false},{"selector":".demorotateInDownRight","duration":1000,"delay":0,"offset":100,"iteration":1,"effect":"rotateInDownRight","mobile":false,"groupDelay":0,"groupPoint":"","groupDesc":false},{"selector":".demoswing","duration":1000,"delay":0,"offset":100,"iteration":1,"effect":"swing","mobile":false,"groupDelay":0,"groupPoint":"","groupDesc":false},{"selector":".demoflash","duration":1000,"delay":0,"offset":100,"iteration":1,"effect":"flash","mobile":false,"groupDelay":0,"groupPoint":"","groupDesc":false},{"selector":".demopulse","duration":1000,"delay":0,"offset":100,"iteration":1,"effect":"pulse","mobile":false,"groupDelay":0,"groupPoint":"","groupDesc":false},{"selector":".demorubberBand","duration":1000,"delay":0,"offset":100,"iteration":1,"effect":"rubberBand","mobile":false,"groupDelay":0,"groupPoint":"","groupDesc":false},{"selector":".demoshake","duration":1000,"delay":0,"offset":100,"iteration":1,"effect":"shake","mobile":false,"groupDelay":0,"groupPoint":"","groupDesc":false},{"selector":".demotada","duration":1000,"delay":0,"offset":100,"iteration":1,"effect":"tada","mobile":false,"groupDelay":0,"groupPoint":"","groupDesc":false},{"selector":".demowobble","duration":1000,"delay":0,"offset":100,"iteration":1,"effect":"wobble","mobile":false,"groupDelay":0,"groupPoint":"","groupDesc":false},{"selector":".demolightSpeedIn","duration":1000,"delay":0,"offset":100,"iteration":1,"effect":"lightSpeedIn","mobile":false,"groupDelay":0,"groupPoint":"","groupDesc":false}],function(){this.effect = this.effect.toString(); new JVScrolling(this);});});
	jQuery(function(){new JVTop();});
	jQuery(function($){    });
});