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
				<div id="articles-content">
					<div id="content">	
						<div class="blog-page" itemscope itemtype="http://schema.org/Blog">
							<?php the_title( '<h1 class="titlePage"><span>', '</span></h1>' ); ?>
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

							?>

						<?php else :
									get_template_part( 'content', 'none' );
							endif;
						?>
					</div>
				</div>				
			</div>
		</div>
</section><!-- .content-area -->

<?php get_footer(); ?>