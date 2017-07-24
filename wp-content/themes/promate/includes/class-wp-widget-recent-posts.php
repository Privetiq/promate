<?php


class Promate_Widget_Recent_Posts extends WP_Widget_Recent_Posts {
	public static function register(){
		register_widget( __CLASS__ );
	}
	
	public static function init(){
		add_action( 'widgets_init', array(__CLASS__, 'register') );
	}
	
	public function widget( $args, $instance ) {

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );
		
		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number )
			$number = 5;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
		/**
		 * Filters the arguments for the Recent Posts widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the recent posts.
		 */
		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );
		if ($r->have_posts()) :
		?>
		<?php echo $args['before_widget']; ?>
		<?php if ( $title ) {
			echo '<h3 class="title-module"><span>'. $title . '</span></h3>';
		} ?>
		<div class="contentmod clearfix sidebar">
			<div class="jvlatestnews vertical">
				<div class="jvlatestnews-container vertical active-owl box-lastest-news">
					<div class="jvlatestnews-content">
						<div class="jvlastestnews-intro">
							<ul class="jvlastestnews-items">
								<li class="jvlastestnews-items-item">
									<ul>
									<?php 
										$index = 1;
									while ( $r->have_posts() ) : $r->the_post(); ?>
										
											<div class="itemchild">
												<div class="clearfix">
													<a href="<?php the_permalink(); ?>" class="jvlastestnews-items-item-thumbnail-link">
														<?php the_post_thumbnail(array(265,198));?>														
													</a>
													<div class="jvlastestnews-items-item-box">
														<?php the_title(sprintf('<h3 class="jvlastestnews-items-item-title"><a href="%s" class="intro-title">', esc_url( get_permalink() )), '</a></h3>');?>														
													</div>
													<div class="jvlastestnews-items-item-readmore">
														<?php the_excerpt();?>
														<div class="jvlastestnews-items-item-information">
															<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><span><?php echo __('Читать'); ?></span></a>
															<span class="jvlastestnews-items-item-information-date"><?php the_date('d.m.Y', '<i>', '</i>', true);?></span>
														</div>
													</div>
												</div>
											</div>									
										<?php 
											if(($index % 1) == 0 && $r->post_count != $index){
												echo '</ul></li><li class="jvlastestnews-items-item"><ul>';
											}
										?>
										
										<?php $index++; ?>
									<?php endwhile; ?>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php echo $args['after_widget']; ?>
		<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();
		endif;
	}
}

Promate_Widget_Recent_Posts::init();