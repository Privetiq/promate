<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */
mb_internal_encoding('UTF-8');

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $post;

$is_in_stock = 'not-stock';

$productVariation = new WC_Product_Variable( $product->id );
$available_variations = $productVariation->get_available_variations();


if ( empty( $product ) || ! $product->is_visible() || $product->is_type( 'simple' )) {
	return;
}

$max = $product->get_variation_price( 'max', true );
$min = $product->get_variation_price( 'min', true );

?>
<li class="col-xs-6 col-sm-4 <?php echo ($vc != NULL) ? $vc :  'col-md-4'; ?> vm-product-grid-item">
	<div class="vm-product">
	<div class="vm-product-media">
		<form class="variations-list" method="post" enctype='multipart/form-data' data-product_id="<?php echo $product->id; ?>" data-product_variations="<?php echo esc_attr( json_encode( $available_variations ) ) ?>">	
			<div class="images">
				<?php
				/**
				 * woocommerce_before_shop_loop_item_title hook.
				 *
				 * @hooked woocommerce_show_product_loop_sale_flash - 10
				 * @hooked woocommerce_template_loop_product_thumbnail - 10
				 */
				do_action( 'woocommerce_before_shop_loop_item_title' );
				
				
				?>	
				<?php 
					foreach($available_variations as $variation){
						
						if($variation['is_in_stock'] == true){
							$is_in_stock = 'in-stock';
						}
						
					}
				?>
					<?php if($max != $min):?>
					<div class="vm-product-media-price sale <?php echo $is_in_stock;?>"> 
						<div class="product-price product-price161 sale mini">
							<strike><?php echo $max . get_woocommerce_currency_symbol();?></strike>
							<?php echo $min . get_woocommerce_currency_symbol();?>
						</div>
					</div>
					<?php else:?>
					
					<div class="vm-product-media-price <?php echo $is_in_stock;?>">
						
						<div class="product-price product-price161 mini ">
							<?php echo $product->get_price() . get_woocommerce_currency_symbol();?>	
						</div>
					</div>
					<?php endif;?>
					<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>					
					
					<div class="variations">
						<ul id="color">
							<?php 
								
							?>
							<?php 
								if ( taxonomy_exists(  'pa_color' ) ) {
									
									$objects = get_option('widget_yith-woo-ajax-navigation');
									$colors = array();
									
									foreach($objects as $obj){
										if($obj['type'] == 'color'){
											$colors = $obj['colors'];
										}
									}
									
									$childrens = $productVariation->get_children( true );
									$attributes =  $productVariation->get_variation_attributes();									
									
									$taxonomy = 'pa_color';
									
									$default = $product->get_variation_default_attribute( $taxonomy );
									
									$is_in_stock = array();
							
									foreach($available_variations as $av){
										if(isset($av['attributes']['attribute_pa_color'])){
											$is_in_stock[$av['attributes']['attribute_pa_color']] = $av['is_in_stock'];
										}									
									}
									
									foreach($childrens as $children){										
										
										$meta = get_post_meta($children, 'attribute_'.$taxonomy, true);
										$term = get_term_by('slug', $meta, $taxonomy);
										
										$class = '';
										
										if(!isset($term->slug))
												continue;
										
										if(isset($term->slug) && $default == $term->slug && !isset($_GET['filter_color']) ){
											$class = 'active';
										}
										
										if(isset($_GET['filter_color']) && $_GET['filter_color'] == $term->slug){
											$class = 'active';
										}
										
										echo '<li class="'.$class.'">';
										
										echo '<a title="'.$term->name.'" variate_id="'. esc_attr( $children ) .'" name="'. esc_attr( $term->slug ) .'" class="cf4all_button" href="'.get_permalink($product->id).'?attribute_'.$taxonomy.'='.$term->slug.'" style="background-color:'. $colors[$term->term_id].';">'.apply_filters( 'woocommerce_variation_option_name', $term->name ).'</a>';
										echo '</li>';
									}
								}								
							?>
						</ul>
					</div>
				</div>			
			</form>
	</div>
	<div class="vm-product-container text-center">
		<div class="vm-product-rating">
			<?php do_action( 'woocommerce_after_shop_loop_item_title' );?>
		</div>
		
		<?php 
		/**
		 * woocommerce_shop_loop_item_title hook.
		 *
		 * @hooked woocommerce_template_loop_product_title - 10
		 */
		do_action( 'woocommerce_shop_loop_item_title' );

		/**
		 * woocommerce_after_shop_loop_item_title hook.
		 *
		 * @hooked woocommerce_template_loop_rating - 5
		 * @hooked woocommerce_template_loop_price - 10
		 */
		
		?>
		<div class="vm-product-rating">
			<?php do_action( 'woocommerce_after_shop_loop_item_title' );?>
		</div>
		<div class="vm-product-sdesc">
			<?php 
				$content = get_the_content();
				$content = strip_tags($content);
				echo mb_substr($content, 0, 300);
			?>
		</div>
		<div  class="vm-product-addcart">
			<div class="addtocart-area">
				<?php
				/**
				 * woocommerce_after_shop_loop_item hook.
				 *
				 * @hooked woocommerce_template_loop_product_link_close - 5
				 * @hooked woocommerce_template_loop_add_to_cart - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item' );
				?>
				<div class="jvvm-custom">					
					<div class="jvWishlist" title="Добавьте товар в избранное">						
						<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]');?>					
					</div>
					<div class="jvcompare"  title="Сравните товар">
						<?php echo do_shortcode('[yith_compare_button]'); ?>
					</div>
				</div>
			</div>		
		</div>	
	</div>
</li>
