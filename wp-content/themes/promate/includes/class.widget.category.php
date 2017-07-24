<?php 

class Foo_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'foo_widget', // Base ID
			__( 'Category description', 'promate' ), // Name
			array( 'description' => __( 'A promate Widget', 'promate' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {		
			$category = get_queried_object();
			
			$taxonomy_name = 'product_cat';
			
			if(isset($category->term_id)):			
				 $thumbnail_id = get_woocommerce_term_meta($category->term_id, 'thumbnail_id', true);
				 $image = wp_get_attachment_url($thumbnail_id);
				 
				 $children = get_term_children($category->term_id, $taxonomy_name);
				 
				 if(!$image){
					 return;
				 }
		?>
		
		<div class="position position-slideshow-category">
			<div style="background: url(<?php echo $image; ?>) no-repeat 50% 50% transparent;" class="jv-module  module current-category">
				<div class="container">
					<div class="contentmod clearfix">
						<div class="VMmenu VMmenu-category-current " id="VMmenu29_53333">
							<ul class="menu">								
								<li class="VMmenu-category-current-list">
									<div class="row text-center">										
										<h2 class="current-child-category-title"><?php single_cat_title(); ?></h2>
										<?php 
											if(count($children) > 0):
										?>
										<ul class="current-child-category-children">											
											<?php	
												$parents = array();
												
												foreach ( $children as $child ) {
													
													
													$term = get_term_by( 'id', $child, $taxonomy_name );
													
													if(!in_array($term->parent, $parents)){
														$parents[$term->term_id] = $term->term_id;
													}
													
												}

												foreach($parents as $term){
													
													$term = get_term_by( 'id', $term, $taxonomy_name );
													
													
													
														echo '<li><a href="' . get_term_link( $term, $taxonomy_name ) . '">' . $term->name . '</a></li>';														
													
												}
											?>
										</ul>	
										<?php endif;?>
									</div>
								</li>								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php 
			endif;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

}

function register_foo_widget() {
    register_widget( 'Foo_Widget' );
}
add_action( 'widgets_init', 'register_foo_widget' );