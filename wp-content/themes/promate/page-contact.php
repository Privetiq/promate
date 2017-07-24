<?php 
	/* Template Name: Contact */ 
get_header(); ?>
<div id="main-content">
	<section id="block-main">
		
		<div class="container">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'content', 'contact' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		// End the loop.
		endwhile;
		?>

		</div><!-- .site-main -->
	</section><!-- .content-area -->
</div>
<?php get_footer(); ?>