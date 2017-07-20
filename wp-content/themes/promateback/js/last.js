jQuery(document).ready(function(){

  jQuery(function() {
        if (jQuery('a#scroll-top').length) {
            jQuery(window).scroll(function() {
                if (jQuery(this).scrollTop() > 250) {
                    jQuery('a#scroll-top').fadeIn();
                } else {
                    jQuery('a#scroll-top').fadeOut();
                }
            });
            jQuery('a#scroll-top').on('click', function(event) {
                event.preventDefault();
                jQuery('html, body').velocity("scroll", {
                    duration: 750,
                    easing: "swing"
                });
            });
        }
    });



});

