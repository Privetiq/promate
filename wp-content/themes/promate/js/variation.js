(function ( $, window, document, undefined ) {
	var forms = $('form.variations-list');
	
	/**
	 * Matches inline variation objects to chosen attributes
	 * @type {Object}
	 */
	var wc_variation_form_matcher = {
		find_matching_variations: function( product_variations, settings ) {
			var matching = [];
			
			if(product_variations && product_variations.length > 1){
				for ( var i = 0; i < product_variations.length; i++ ) {
					var variation    = product_variations[i];

					if ( wc_variation_form_matcher.variations_match( variation.attributes, settings ) ) {
						matching.push( variation );
					}
				}
			}
			
			return matching;
		},
		variations_match: function( attrs1, attrs2 ) {
			var match = true;
			for ( var attr_name in attrs1 ) {
				if ( attrs1.hasOwnProperty( attr_name ) ) {
					var val1 = attrs1[ attr_name ];
					var val2 = attrs2[ attr_name ];
					if ( val1 !== undefined && val2 !== undefined && val1.length !== 0 && val2.length !== 0 && val1 !== val2 ) {
						match = false;
					}
				}
			}
			return match;
		}
	};
	wc_set_variation_attr = function( selector, attr, value ) {
		if ( undefined === selector.attr( 'data-o_' + attr ) ) {
			selector.attr( 'data-o_' + attr, ( ! selector.attr( attr ) ) ? '' : selector.attr( attr ) );
		}
		selector.attr( attr, value );
	};
	
	wc_variations_image_update = function( form, variation ) {
		var $form             = form,			
			$product_img      = $form.find( 'div.images img:eq(0)' );
			
			
		if ( variation && variation.image_src && variation.image_src.length > 1 ) {
						
			wc_set_variation_attr( $product_img, 'src', variation.image_src );
			wc_set_variation_attr( $product_img, 'title', variation.image_title );
			wc_set_variation_attr( $product_img, 'alt', variation.image_alt );
			wc_set_variation_attr( $product_img, 'srcset', variation.image_srcset );
			wc_set_variation_attr( $product_img, 'sizes', variation.image_sizes );
		}
	};
	
	$('.cf4all_button').hover(function(){
		var all_attributes_chosen  = true,
			some_attributes_chosen = false,
			current_settings       = {},
			$form                  = $( this ).parents('form.variations-list'),
			$product_variations    = $form.data( 'product_variations' );
			$variate_id    		   = $(this).attr( 'variate_id' );
			
			
		
		$form.find( '.variations a' ).each( function() {
			var attribute_name = $( this ).data( 'attribute_name' ) || $( this ).attr( 'name' );
			var value          = $( this ).text() || '';
			
			current_settings[ attribute_name ] = value;
			
		});
		
		var matching_variations = wc_variation_form_matcher.find_matching_variations( $product_variations, current_settings );
		
		$.each(matching_variations, function(id, object){
			
			if(object.variation_id == $variate_id){
				wc_variations_image_update($form, object);
			}
		});		
	},
	function(){
		$form  = $( this ).parents('form.variations-list'),
		$a 	   = $form.find('a.vm-product-media-image'),
		$img   = $form.find('img:first-child');
 		
		if($a && $a != undefined){
			var src = $a.attr('data-src');
			
			$img.attr('src', src);
			$img.removeAttr('srcset')
					.removeAttr('sizes')
						.removeAttr('data-o_src')
							.removeAttr('data-o_srcset')
								.removeAttr('data-o_sizes');
			
			
		}
		
	});
	
})(jQuery);

var headroom = new Headroom(elem, {
    "offset": 50,
    "tolerance": 3,
    "classes": {
        "initial": "animated",
        "pinned": "bounceInDown",
        "unpinned": "bounceOutUp"
    }
});
headroom.init();

$(".position-logo").headroom({
    "offset": 50,
    "tolerance": 3,
    "classes": {
        "initial": "animated",
        "pinned": "bounceInDown",
        "unpinned": "bounceOutUp"
    }
});

// to destroy
// $("#header").headroom("destroy");