<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
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
 * @version     2.6.3
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $post, $product;

$is_stock = 'not-stock';

$productVariation = new WC_Product_Variable( $product->id );
$available_variations = $productVariation->get_available_variations();

foreach($available_variations as $variation){
    if($variation['is_in_stock'] == true){
        $is_stock = 'in-stock';
    }
}
?>

<div class="col-xs-12">
    <div class="row">
        <div class="layout"></div>
        <div class="vm-single-viewer-images images col-md-12 col-sm-12 col-xs-12 col-lg-10">

            <?php
            if ( has_post_thumbnail() ) {

                $attachment_count = count( $product->get_gallery_attachment_ids() );
                $gallery          = $attachment_count > 0 ? '[product-gallery]' : '';
                $props            = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
                $image            = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
                    'title'	 => $props['title'],
                    'alt'    => $props['alt'],
                ) );
                echo apply_filters(
                    'woocommerce_single_product_image_html',
                    sprintf(
                        '<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto%s">%s</a>',
                        esc_url( $props['url'] ),
                        esc_attr( $props['caption'] ),
                        $gallery,
                        $image
                    ),
                    $post->ID
                );
                //echo '<a itemprop="image" class="woocommerce-main-image zoom" data-rel="prettyPhoto%s">%s</a>';

                //echo '<a href="'.esc_url( $props['url'] ).'" class="woocommerce-main-image zoom"><img  src="'.esc_url( $props['url'] ).'"/></a>';
            } else {
                echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'woocommerce' ) ), $post->ID );
            }


            ?>
        </div>
        <div id="additionalCr" class="images col-lg-2 hidden-xs hidden-sm hidden-md">
            <div class="gallery_product_preview_both gallery_product_preview_top"></div>
            <?php do_action( 'woocommerce_product_thumbnails' ); ?>
            <div class="gallery_product_preview_both gallery_product_preview_bot"></div>
        </div>
    </div>

    <div class="vm-product-media-price <?php echo $is_stock;?>">
        <div class="product-price product-price170 mini vm-price-value">
            <?php echo $product->get_price() . get_woocommerce_currency_symbol();?>
        </div>
    </div>


</div>


