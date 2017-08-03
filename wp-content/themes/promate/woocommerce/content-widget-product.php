<?php
/**
 * The template for displaying product widget entries
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product; 

if($product->is_type( 'simple' )){
	return;
}

?>
<li class="vm-product">
    <div class="vm-product-wrapper-content">
        <div class="row">
            <div class="col-md-6 col-sm-5">
                <div class="vm-product-media">
                    <?php echo woocommerce_template_loop_product_thumbnail(); ?>
                </div>
            </div>
            <div class="col-md-6 col-sm-7">
                <div class="vm-product-wrapper-desc">
                    <h3 class="vm-product-name">
                        <a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>"><?php echo $product->get_title(); ?></a>
                    </h3>					 
					<div class="vm-product-media-price-widget">
						<?php echo $product->get_price_html(); ?>
					</div>
                </div>
            </div>
        </div>
    </div>
</li>

