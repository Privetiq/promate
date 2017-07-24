function imagePrevFix() {
    jQuery('a.woocommerce-main-image').addClass('showStart');
}

jQuery(window).on('load', function () {
    imagePrevFix();
    if(jQuery('form[name="checkout"]').length > 0)
        checkoutFakeFields();
    jQuery('#block-search').on('click', '.jv-ajax-cart--item-remove-all a', function (e) {

        jQuery('.jv-ajax-cart--dropdown-content').addClass('miniCartUpdating');

        console.log(jQuery(this).data( 'href' ));
        jQuery.ajax( {
            type:     'GET',
            url:      jQuery(this).data( 'href' ),
            dataType: 'html',
            success: function(data){
                jQuery.ajax( {
                    type:     'GET',
                    url:      wc_cart_fragments_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'get_refreshed_fragments' ),
                    dataType: 'html',
                    success: function(data){

                        var fragments = JSON.parse(data).fragments;
                        console.log(fragments);

                        if ( fragments ) {
                            jQuery.each( fragments, function( key ) {
                                jQuery( key ).addClass( 'updating' );
                            });
                        }

                        if ( fragments ) {
                            jQuery.each( fragments, function( key, value ) {
                                jQuery( key ).replaceWith( value );
                            });
                        }
                        jQuery('.position.position-search').find(".jv-ajax-cart--dropdown-toolbar").click();

                    },
                    complete: function() {

                    }
                } );

            },
            complete: function() {

            }
        } );

        return false;
    });

    jQuery('#n_tab-description-collapse').css('height', 'auto');
});

(function( $ ) {

})();

function checkoutFakeFields(){
    // jQuery('#billing_address_1_field').hide(0);
    // jQuery('#department_field').hide(0);
    checkFakeFields();
    jQuery( document.body ).on('updated_checkout', function(e){
        checkFakeFields();
    });

}
function checkFakeFields(){

    department = jQuery('.fake_department_field');
    adress = jQuery('.fake_address_field');
    var shippingMethod = jQuery('input[name="shipping_method[0]"]:checked').val();
    department.hide(0);
    adress.hide(0);
    if(shippingMethod == 'free_shipping:4'){
        department.show();
        department.addClass('dd');
    }
    if(shippingMethod == 'free_shipping:8' || shippingMethod == 'koni_shipping_method'){
        adress.show();
        adress.find('input').val(jQuery('#billing_address_1').val());
    }
    console.log(shippingMethod);

    // var shippingMethod = jQuery('input[name="shipping_method[0]"]:checked').val();
    // return shippingMethod;
}





jQuery(window).on('load', function () {
    function newGalleryPeach() {
        /*var toster = jQuery('.pp_gallery a');

        if( jQuery('.pp_pic_holder').length ) {
            console.log('daaaaa');
        }

        console.log(toster);
        toster.each(function () {
            console.log('daaaaa');

            jQuery(this).on('mouseenter', function () {
                console.log('damn');
                toster.click();

                console.log('fck');
            });
        });

         jQuery(document).on('mousemove', function () {
         //console.log('fck');

         var tosterrrr = jQuery('.pp_pic_holder').length;
         if( tosterrrr ) {
         //console.log('daaaaa');

         var toster = jQuery('.pp_gallery a');

         toster.each(function (event) {

         console.log('daaaaa');

         jQuery(this).on('mouseenter', function (event) {
         event.preventDefault();
         console.log('damn');
         toster.click();

         console.log('fck');
         });
         });
         }
         });

        */


       /* jQuery(document).on('click', function (event) {
            event.preventDefault();
            var galleryHolder = jQuery('.pp_pic_holder').length;

            if( galleryHolder ) {
                console.log('good');
            }
        });*/

    }



    newGalleryPeach();

});





(function(win) {
    'use strict';

    var listeners = [],
        doc = win.document,
        MutationObserver = win.MutationObserver || win.WebKitMutationObserver,
        observer;

    function readyCustom(selector, fn) {
        // Store the selector and callback to be monitored
        listeners.push({
            selector: selector,
            fn: fn
        });
        if (!observer) {
            // Watch for changes in the document
            observer = new MutationObserver(check);
            observer.observe(doc.documentElement, {
                childList: true,
                subtree: true
            });
        }
        // Check if the element is currently in the DOM
        check();
    }

    function check() {
        // Check the DOM for elements matching a stored selector
        for (var i = 0, len = listeners.length, listener, elements; i < len; i++) {
            listener = listeners[i];
            // Query for elements matching the specified selector
            elements = doc.querySelectorAll(listener.selector);
            for (var j = 0, jLen = elements.length, element; j < jLen; j++) {
                element = elements[j];
                // Make sure the callback isn't invoked with the
                // same element more than once
                if (!element.ready) {
                    element.ready = true;
                    // Invoke the callback with the element
                    listener.fn.call(element, element);
                }
            }
        }
    }

    // Expose `readyCustom`
    win.readyCustom = readyCustom;

})(this);



readyCustom('.pp_pic_holder', function(element) {
    // do something
    jQuery('.galley_cover_new li a').on('mouseenter', function () {
        jQuery(this).click();

        /**/
    });


    var galleryItem = jQuery('.galley_cover_new li');
    var slideHeightGallery = galleryItem.height() + 11;

    var liCount = galleryItem.length;
    var liCounter = 7;

    var ulHeight = liCount * slideHeightGallery;
    var ulHeightInt = parseInt(ulHeight);
    var currentBottom = 0;

    jQuery('.gallery_go_top').on('click', function () {
        if (liCounter == 7) {
            return false;
        }

        liCounter--;

        galleryItem.animate({
            bottom: '-=' + slideHeightGallery + 'px'
        }, 600);
    });
    jQuery('.gallery_go_bot').on('click', function () {
        if (liCounter >= liCount) {
            return false;
        }

        liCounter++;

        galleryItem.animate({
            bottom: '+=' + slideHeightGallery + 'px'
        }, 600);
    });



    jQuery('.button-prev-click').on('click', function () {
        //console.log('prev');
        jQuery('.galley_cover_new li.selected').prev().find('a').click();
    });
    jQuery('.button-next-click').on('click', function () {
        //console.log('next');
        jQuery('.galley_cover_new li.selected').next().find('a').click();
    });
});




/********* 03.05.2017 **********/
jQuery(document).ready(function ()  {
    //jQuery('.vm-single .layout').remove();
    jQuery(document).on('click touchstart', 'a.woocommerce-main-image', function() {
        jQuery(this).click();
    });
});

$(document).ready(function() {
    $('[data-fancybox]').fancybox({

    }); // выбор всех ссылок с классом zoom
});


jQuery(window).on('load', function () {

    //.vm-single-viewer
    var productDetect = jQuery('.product');
    if(productDetect) {
        /*productDetect.on('mouseenter touchstart click', function (event) {
           event.preventDefault();

           ready('.additionalCrS', function(element) {
               var galleryItems = jQuery('#additionalCrS li');
               var slideHeightGallerys = galleryItems.height() + 15;

               var liCounts = galleryItems.length;
               var liCounters = 4;

               jQuery('.gallery_product_preview_top').on('click', function () {
                   if (liCounters == 4) {
                       console.log(liCounters);
                       return false;
                   }

                   liCounters--;

                   galleryItems.animate({
                       bottom: '-=' + slideHeightGallerys + 'px'
                   }, 600);
               });
               jQuery('.gallery_product_preview_bot').on('click', function () {
                   if (liCounters >= liCounts) {
                       return false;
                   }

                   liCounters++;

                   galleryItems.animate({
                       bottom: '+=' + slideHeightGallerys + 'px'
                   }, 600);
               });
           });
       });*/

        var onlyOne = 0;

        readyCustom('#additionalCr', function(element) {
            if(onlyOne++ > 0) return false;
            var galleryItems = jQuery('#additionalCr li');
            var slideHeightGallerys = galleryItems.height() + 15;

            var liCounts = galleryItems.length;
            var liCounters = 4;


            jQuery('.gallery_product_preview_top').on('click', function () {

                if (liCounters == 4) {
                    return false;
                }

                liCounters--;

                galleryItems.animate({
                    bottom: '-=' + slideHeightGallerys + 'px'
                }, 600);
            });
            jQuery('.gallery_product_preview_bot').on('click', function (e) {
                if (liCounters >= liCounts) {
                    return false;
                }

                liCounters++;

                galleryItems.animate({
                    bottom: '+=' + slideHeightGallerys + 'px'
                }, 600);
            });
        });
    }

});