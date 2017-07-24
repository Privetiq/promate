<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article rel="contact-page" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<div class="row">
		<div class="col-md-6">
			<ul>
				<li><i class="fa fa-phone" aria-hidden="true"></i><span><?php echo get_theme_mod( "_phone_second");?></span></li>
				<li><i class="fa fa-mobile" aria-hidden="true"></i><span><?php echo get_theme_mod( "_phone");?></span></li>
				<li><i class="fa fa-envelope" aria-hidden="true"></i><span><?php echo get_theme_mod( "_email");?></span></li>
				<li><i class="skype" aria-hidden="true"></i><span><?php echo get_theme_mod( "_skype");?></span></li>
			</ul>
			<p class="contact-information">
				<span class="title"><?php echo __('Режим роботы');?>:</span>
				<span class="value"><?php echo get_theme_mod( "_days");?>&nbsp;<?php echo get_theme_mod( "_time");?></span> 
			</p>
			<p class="contact-information">
				<span class="title"><?php echo __('Адрес');?>:</span>
				<span class="value"><?php echo get_theme_mod( "_address");?></span>
			</p>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-5">
					<span class="title-form"><?php echo __('Оставьте нам сообщение');?>:</span>
				</div>
				<div class="col-md-7"><?php echo do_shortcode(get_theme_mod( "_contact_form"));?></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div id="map" class="col-md-12"></div>
		<script>
			var map;
			function initMap() {
			  var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 18,
				center: {lat: <?php echo get_theme_mod( "_x");?>, lng: <?php echo get_theme_mod( "_y");?>}
			  });

			  var image = '<?php echo esc_url( get_template_directory_uri() ); ?>/images/markers.png';
			  var beachMarker = new google.maps.Marker({
				position: {lat: <?php echo get_theme_mod( "_x");?>, lng: <?php echo get_theme_mod( "_y");?>},
				map: map,
				icon: image
			  });
			}
		</script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxIVQ4ELrQxNmFjJZ8JaVchpms6SXGqfk&callback=initMap"
			async defer></script>
	</div>
</article><!-- #post-## -->