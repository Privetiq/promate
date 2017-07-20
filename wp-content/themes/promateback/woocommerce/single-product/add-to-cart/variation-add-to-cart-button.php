<?php
/**
 * Single variation cart button
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

?>
<div class="addtocart-bar">
	<span class="quantity-box">
		<?php if ( ! $product->is_sold_individually() ) : ?>
			<?php woocommerce_quantity_input( array( 'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 ) ); ?>
		<?php endif; ?>
	</span>
    <?php if($product->backorders == "yes") {?>
<!--        --><?php //var_dump($product->backorders); ?>
<!--        --><?php //var_dump($product->is_in_stock()); ?>
        <span class="addtocart-button">
            <?php if($product->is_in_stock()):?>
            <input type="submit" name="addtocart" class="single_add_to_cart_button addtocart-button" value="<?php echo apply_filters('single_add_to_cart_text', __( 'Купить', 'woocommerce' ), $product->product_type); ?>" title="Купить">
            <?php else: ?>
    		<input type="submit" data-toggle="modal" data-target="#is_not_stock_popup" name="addtocart" style="background-color: #ebe9eb !important; color: #000; border: 1px solid #ebe9eb !important;" class="single_add_to_cart_button addtocart-button" value="<?php echo apply_filters('single_add_to_cart_text', __( 'Предзаказ', 'woocommerce' ), $product->product_type); ?>" title="Предзаказ">
            <?php endif;?>
        </span>
    <?php } else { ?>
        <span class="addtocart-button">
            <?php if($product->is_in_stock()):?>
                <input type="submit" name="addtocart" class="single_add_to_cart_button addtocart-button" value="<?php echo apply_filters('single_add_to_cart_text', __( 'Купить', 'woocommerce' ), $product->product_type); ?>" title="Купить">
            <?php endif;?>
        </span>
    <?php } ?>
</div>
<div>
	<input type="hidden" name="add-to-cart" value="<?php echo $product->id; ?>" />
	<input type="hidden" name="product_id" value="<?php echo esc_attr( $product->id ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />
</div>
