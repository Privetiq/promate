<?php
/**
 * Widget API: WP_Widget_Recent_Comments class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement a Recent Comments widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class Promate_Widget_Recent_Comments extends WP_Widget_Recent_Comments {
	public static function register(){
		register_widget( __CLASS__ );
	}
	
	public static function init(){
		add_action( 'widgets_init', array(__CLASS__, 'register') );
	}
	
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		$output = '';

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Comments' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number )
			$number = 5;

		/**
		 * Filters the arguments for the Recent Comments widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Comment_Query::query() for information on accepted arguments.
		 *
		 * @param array $comment_args An array of arguments used to retrieve the recent comments.
		 */
		$comments = get_comments( apply_filters( 'widget_comments_args', array(
			'number'      => $number,
			'status'      => 'approve',
			'post_status' => 'publish'
		) ) );

		$output .= $args['before_widget'];
		if ( $title ) {
			$output .= '<h3 class="title-module"><span>'.$title.'</span></h3>';
		}
		$output .= '<div class="contentmod clearfix sidebar">';
		$output .= '<div class="testimonials-list testimonials-list364">';
		if ( is_array( $comments ) && $comments ) {
			// Prime cache for associated posts. (Prime post term cache if we need it for permalinks.)
			$post_ids = array_unique( wp_list_pluck( $comments, 'comment_post_ID' ) );
			_prime_post_caches( $post_ids, strpos( get_option( 'permalink_structure' ), '%category%' ), false );

			foreach ( (array) $comments as $comment ) {
				
				$output .= '<div class="owl-item">';
				$output .= '<div class="testimonials-list-item">';
				$output .= '<blockquote class="testimonials-list-item-text">';
				$output .= '<h4><a href="'. esc_url( get_permalink( $comment->comment_post_ID ) ) .'">' . get_the_title( $comment->comment_post_ID ) . '</a></h4>';
				
				$output .= '<p>'.get_comment_excerpt($comment->comment_ID).'</p>';
				
				$output .= '</blockquote>';
				$output .= '<div class="testimonials-list-item-info">';
					$output .= '<div class="testimonials-list-item-author">';
						$output .= '<span class="testimonials-list-item-author-name">';
						$output .= get_comment_author_link( $comment );
						$output .= '</span>';
						$output .= '<span class="testimonials-list-item-author-title">';
						$output .= get_comment_date( 'Y-m-d', $comment->comment_ID );
						$output .= '</span>';
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';
			}
		}
		$output .= '</div>';
		$output .= '</div>';
		$output .= $args['after_widget'];

		echo $output;
	}
}
Promate_Widget_Recent_Comments::init();