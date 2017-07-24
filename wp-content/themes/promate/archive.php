<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<section id="block-main">
    
		<div class="container">
			<div class="row">
				<div id="articles-content" class="col-md-9">
					<div id="content">	
						<div class="blog-page" itemscope itemtype="http://schema.org/Blog">
							<?php the_archive_title( '<h1 class="titlePage"><span>', '</span></h1>' ); ?>
						</div>
						<div class="category-desc clearfix">
							<div class="row">
								<?php the_archive_description( '<div class="category-desc-content">', '</div>' );?>								
							</div>
						</div>
						<?php if ( have_posts() ) : ?>
							<?php
							$index = 0;
							
							while ( have_posts() ) : the_post();
								echo '<div class="items-row cols-1 row-'.$index.' row ">';
								
									echo '<div class="col-md-12">';
									
									get_template_part( 'content', get_post_format() );
									
									echo '</div>';
									
								echo '</div>';
								
								$index++;
							// End the loop.
							endwhile;

							// Previous/next page navigation.
							the_posts_pagination( array(
								'prev_text'          => __( '&lt;', 'twentyfifteen' ),
								'next_text'          => __( '&gt;', 'twentyfifteen' ),
								'before_page_number' => ''
							) );?>

						<?php else :
									get_template_part( 'content', 'none' );
							endif;
						?>
					</div>
				</div>
				<aside id="sidebar-b" class="sidebar-right col-md-3">
					<?php get_sidebar(); ?>
				</aside>
			</div>
		</div>
</section><!-- .content-area -->

<?php get_footer(); ?>