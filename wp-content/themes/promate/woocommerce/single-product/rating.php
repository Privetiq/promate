<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.3.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

if ( $rating_count > 0 ) : ?>

	
	<div class="vm-single-info-review clearfix">		    	
		<div title="<?php printf( __( 'Rated %s out of 5', 'woocommerce' ), $average ); ?>" class="ratingbox">
		  <div class="stars-orange" style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%"></div>
		</div>
		<?php echo '<span itemprop="ratingCount" class="countReview">' . __("Отзывов") . ': ' . $rating_count . '</span>' ; ?>		
		<a class="gotoreview" href="#tab-reviews"><?php echo __('Оставить отзыв');?></a>
	</div>
<?php endif; ?>
