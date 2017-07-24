<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
 * @version     1.6.4
 */

global $product;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

?>

<?php
/**
 * woocommerce_before_single_product hook.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
    echo get_the_password_form();
    return;
}
?>

<div class="row product">
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 vm-single-viewer clearfix">
        <div class="row">
            <?php woocommerce_show_product_images(); ?>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 vm-single-info single_variation_wrap">

        <?php do_action( 'woocommerce_single_product_summary' ); ?>
    </div>
</div>
<div class="row">
    <div class="<?php echo (is_active_sidebar( 'top-sales' )) ? 'col-md-8' : 'col-md-12';?> col-sm-12 col-xs-12">
        <?php do_action( 'woocommerce_after_single_product_summary' ); ?>
    </div>
    <?php if ( is_active_sidebar( 'top-sales' ) ) : ?>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 sidebar vm-single-related-product">
            <?php dynamic_sidebar( 'top-sales' ); ?>
        </div>
    <?php endif; ?>
</div>
<div class="product-detail-feature">
    <?php woocommerce_upsell_display();?>
</div>
<script type="text/javascript">
    (function($){
        $(document).ready(function(){
            var n = $("#additionalCr li").length;

            if (n > 3) {
                $( "#additionalCr").elastislide( {
                    orientation : 'vertical',
                    minItems: 4
                });
            } else {
                $("#additionalCr").show();
            }
        });
    })(jQuery)
</script>