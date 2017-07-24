<?php
/**
 * Variable product add to cart
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $product, $post;

$attribute_keys = array_keys( $attributes );

$is_stock = false;

foreach($available_variations as $variation){
	if($variation['is_in_stock'] == true){
		$is_stock = true;
	}
}
?>
<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>
<div class="vm-single-info-cart">
	<div class="addtocart-area">
		<form class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo $post->ID; ?>" data-product_variations="<?php echo esc_attr( json_encode( $available_variations ) ) ?>">					
			<?php if(count($attributes) > 0) : ?>
			<div class="product-fields">
				<table style="display: none;" class="variations" cellspacing="0">
					<tbody>						
						<?php foreach ( $attributes as $name => $options ) : ?>
							<tr>
								<td class="label"><label for="<?php echo sanitize_title( $name ); ?>"><?php echo wc_attribute_label( $name ); ?></label></td>
								<td id="select_<?php echo $name;?>" class="value">
									<?php										
										$selected = isset( $_REQUEST[ 'attribute_' . sanitize_title( $name ) ] ) ? wc_clean( urldecode( $_REQUEST[ 'attribute_' . sanitize_title( $name ) ] ) ) : $product->get_variation_default_attribute( $name );										
										wc_dropdown_variation_attribute_options( array( 'options' => $options, 'attribute' => $name, 'product' => $product, 'selected' => $selected ) );										
									?>
								</td>
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>
				<?php foreach ( $attributes as $name => $options ) :?>
					
					<div class="product-field product-field-type-E" data-ref="select_<?php echo $name;?>">
					<?php 
					if ( is_array( $options ) ){
						if ( isset( $_REQUEST[ 'attribute_' . sanitize_title( $name ) ] ) ) {
							$selected_value = $_REQUEST[ 'attribute_' . sanitize_title( $name ) ];
						} elseif ( isset( $selected_attributes[ sanitize_title( $name ) ] ) ) {
							$selected_value = $selected_attributes[ sanitize_title( $name ) ];
						} else {
							$selected_value = '';
						}

						if ( taxonomy_exists( $name ) ) {
							$orderby = wc_attribute_orderby( $name );
							$taxonomy = get_taxonomy( $name );?>
							
						<span class="product-fields-title-wrapper">				
							<span class="product-fields-title"><?php echo __('Выберите') . ' ' .esc_attr( $taxonomy->labels->name ) ;?></span>				
						</span>
						<span class="product-field-display">
							<div class="cf4all_wrapper cf4all_required" id="cf4all_wrapper_1151_">
						<?php 
							
							switch ( $orderby ) {
								case 'name' :
									$args = array( 'orderby' => 'name', 'hide_empty' => false, 'menu_order' => false );
									break;
								case 'id' :
									$args = array( 'orderby' => 'id', 'order' => 'ASC', 'menu_order' => false, 'hide_empty' => false );
									break;
								case 'menu_order' :
									$args = array( 'menu_order' => 'ASC', 'hide_empty' => false );
									break;
							}
							if(esc_attr( sanitize_title($name) )=='pa_size'){
								$args = array(
									'orderby' => 'term_order',
									'hide_empty' => false,
									'menu_order' => false,
									'order' => 'ASC'
								);
							}
							$terms = get_terms( $name, $args );
							
							if(esc_attr(sanitize_title($name) )=='pa_color'){
								$objects = get_option('widget_yith-woo-ajax-navigation');
								$colors = array();
								foreach($objects as $obj){
									if($obj['type'] == 'color'){
										$colors = $obj['colors'];
									}
								}
							}?>
							
							<?php 
							$variations = new WC_Product_Variable( $product->id );
							$available = $variations->get_available_variations();
							
							$is_in_stock = array();
							
							foreach($available as $av){
								if(isset($av['attributes']['attribute_pa_color'])){
									$is_in_stock[$av['attributes']['attribute_pa_color']] = $av['is_in_stock'];
								}									
							}
							foreach ( $terms as $term ) {
								if ( ! in_array( $term->slug, $options ))
									continue;				
								
								$classLabel = '';
								
								if($name == 'pa_color'){
									$class = 'cf4all_color_buttons';
									$classLabel = 'cf4all_color_btn_medium';
								}else{
									$class = 'cf4all_buttons';									
								}
								
								
								
								if($selected_value == $term->slug){
									$checked = 'checked="checked"';
								}else{
									$checked = '';
								}
								
								echo '<div class="inline-control-group '.$class.'">';	
								
								echo '<input type="radio" '. $checked .' name="' . 'attribute_buffer_' . sanitize_title( $name ).'" class="cf4all_radio" value="' . esc_attr( $term->slug ) . '"/>';                                
								
								
								if(esc_attr(sanitize_title($name) )=='pa_color'){
									echo '<label class="cf4all_button cf4all_color_btn '.$classLabel.'" for="cf4all_input_1151_4_">';
									echo '<div title="'.$term->name.'" class="cf4all_inner_value" style="background-color: '.$colors[$term->term_id].'; width:100%;"></div>';
									
								}else{
									echo '<label class="cf4all_button cf4all_no_color_btn" for="cf4all_input_1151_4_">';
									echo esc_attr( $term->name );
								}
								
								echo '</label>';
																
								echo '</div>';
							}
							echo '</div>';
						}
						?>
						
						
					<?php }
				?>
					</div>		
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
			<?php do_action( 'woocommerce_before_single_variation' ); ?>
			<?php do_action( 'woocommerce_single_variation' );?>			
			<?php do_action( 'woocommerce_after_single_variation' ); ?>
			
		</form>
	</div>
</div>
<?php do_action('woocommerce_after_add_to_cart_form'); ?>
