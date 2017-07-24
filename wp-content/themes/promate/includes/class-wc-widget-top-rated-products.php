<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Top Rated Products Widget.
 *
 * Gets and displays top rated products in an unordered list.
 *
 * @author   WooThemes
 * @category Widgets
 * @package  WooCommerce/Widgets
 * @version  2.3.0
 * @extends  WC_Widget
 */
class Promate_Widget_Top_Rated_Products extends WC_Widget_Top_Rated_Products {
	
	public static function register(){
		register_widget( __CLASS__ );
	}
	
	public static function init(){
		add_action( 'widgets_init', array(__CLASS__, 'register') );
	}
	
	public function widget( $args, $instance ) {

		if ( $this->get_cached_widget( $args ) ) {
			return;
		}

		ob_start();

		$number = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : $this->settings['number']['std'];

		add_filter( 'posts_clauses',  array( WC()->query, 'order_by_rating_post_clauses' ) );

		$query_args = array( 'posts_per_page' => $number, 'no_found_rows' => 1, 'post_status' => 'publish', 'post_type' => 'product' );

		$query_args['meta_query'] = WC()->query->get_meta_query();

		$r = new WP_Query( $query_args );

		if ( $r->have_posts() ) {

			$this->widget_start( $args, $instance );

			echo '<ul class="product_list_widget">';
					
			$index = 1;
			echo '<li>';
			echo '<ul>';
			
			while ( $r->have_posts() ) {
				$r->the_post();
				wc_get_template( 'content-widget-product.php', array( 'show_rating' => true ) );
				if(($index % 3) == 0 && $r->post_count != $index){
					echo '</ul></li><li><ul>';
				}
				
				$index++;
			}
			echo '</ul>';
			echo '</li>';
			
			echo '</ul>';

			$this->widget_end( $args );
		}

		remove_filter( 'posts_clauses', array( WC()->query, 'order_by_rating_post_clauses' ) );

		wp_reset_postdata();

		$content = ob_get_clean();

		echo $content;

		$this->cache_widget( $args, $content );
	}
}

Promate_Widget_Top_Rated_Products::init();