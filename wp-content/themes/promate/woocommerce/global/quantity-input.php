<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<?php if(!is_cart()):?>
<script type="text/javascript">		
		function plus(e){				
			var input = jQuery(e).parents('span.quantity-box').children('input');
				input.val(parseFloat(input.val()) + 1);				
		}
		function minus(e){
			var input = jQuery(e).parents('span.quantity-box').children('input');
				if(input.val() > 1){
					input.val(parseFloat(input.val()) - 1);
				}					
		}		
</script>
<span class="quantity-box">
	<input type="numeric" readonly class="quantity-input js-recalculate" min="<?php echo esc_attr( $min_value ); ?>" max="<?php echo esc_attr( $max_value ); ?>" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $input_value ); ?>" title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ) ?>" class="input-text qty text" size="4" pattern="<?php echo esc_attr( $pattern ); ?>" inputmode="<?php echo esc_attr( $inputmode ); ?>" />
	<span class="quantity-controls js-recalculate">
		<button type="button" onclick="plus(this);" class="quantity-controls quantity-plus"><i class="fa fa-angle-up"></i></button>
		<button type="button" onclick="minus(this);" class="quantity-controls quantity-minus"><i class="fa fa-angle-down"></i></button>
	</span>
</span>
<?php else: ?>
	<div class="quantity">
		<input type="number" step="<?php echo esc_attr( $step ); ?>" min="<?php echo esc_attr( $min_value ); ?>" max="<?php echo esc_attr( $max_value ); ?>" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $input_value ); ?>" title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ) ?>" class="input-text qty text" size="4" pattern="<?php echo esc_attr( $pattern ); ?>" inputmode="<?php echo esc_attr( $inputmode ); ?>" />
	</div>

<?php endif;?>
