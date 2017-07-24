<?php
/**
 * Single variation display
 *
 * This is a javascript-based template for single variations (see https://codex.wordpress.org/Javascript_Reference/wp.template).
 * The values will be dynamically replaced after selecting attributes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<script type="text/template" id="tmpl-variation-template">
	<div class="woocommerce-variation-description">
		{{{ data.variation.variation_description }}}
	</div>
	
	
	
	<script type="text/javascript">
		(function($){
			$(document).ready(function(){
				var html = '{{{ data.variation.price_html }}}';
				
				if(html != '' && html != undefined){
					$('.product .vm-price-value').html(html);
				}
			});
			
		})(jQuery);
	</script>	
	
</script>
<script type="text/template" id="tmpl-unavailable-variation-template">
	<p><?php _e( 'Sorry, this product is unavailable. Please choose a different combination.', 'woocommerce' ); ?></p>
</script>
