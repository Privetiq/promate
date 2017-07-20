<?php 

function promate_init(){
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'promate' ),		
		'main'  => __( 'Main Menu', 'promate' ),
		'mobile'  => __( 'Mobile Menu', 'promate' ),
		'footer_01'  => __( 'Footer 1 Menu', 'promate' ),
		'footer_02'  => __( 'Footer 2 Menu', 'promate' ),
		'mobile1'  => __( 'mobile1', 'promate' ),
	) );
	
	add_theme_support( 'custom-logo', array(
		'height'      => 65,
		'width'       => 247,
		'flex-height' => true,
	) );
	
	register_sidebar( array(
		'name'          => __( 'Slider bar', 'promate' ),
		'id'            => 'block-slide',		
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Subscribe', 'promate' ),
		'id'            => 'subscribe',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Left sidebar', 'promate' ),
		'id'            => 'sidebar',		
		'before_widget' => '<div id="%1$s" class="jv-module %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="title-module"><span>',
		'after_title'   => '</span></h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Top product', 'promate' ),
		'id'            => 'top-sales',		
		'before_widget' => '<div id="%1$s" class="jv-module-homepage2 jv-module module active-owl vertical-owl %2$s">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3 class="title-module"><span>',
		'after_title'   => '</span></h3><div class="contentmod clearfix">',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Cart', 'promate' ),
		'id'            => 'cart-block',		
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Blog sidebar', 'promate' ),
		'id'            => 'sidebar-right',		
		'before_widget' => '<div id="%1$s" class="jv-module module %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="title-module"><span>',
		'after_title'   => '</span></h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Hidden', 'promate' ),
		'id'            => 'hidden',		
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
	
	add_theme_support('post-thumbnails');
	
	add_image_size( 'mobile-thumb', 110, 110 );
	add_image_size( 'full-thumb', 1920, 450, true);
	add_image_size( 'shop', 300, 300, true);
	
}

add_action('init', 'promate_init');

add_action('customize_register', function($customizer) {
	
	$customizer->add_section(
		'contact', array(
			'title' => __('Contact information', 'promate'),			
			'priority' => 11,
		)
	);
	$customizer->add_setting('_time', 
		array('default' => '')
	);
	
	$customizer->add_control('_time', array(
			'label' => __('Время работы'),
			'section' => 'contact',
			'type' => 'text',
		)
	);
	
	$customizer->add_setting('_days', 
		array('default' => '')
	);
	
	$customizer->add_control('_days', array(
			'label' => __('Дни работы'),
			'section' => 'contact',
			'type' => 'text',
		)
	);
	
	$customizer->add_setting('_address', 
		array('default' => '')
	);
	
	$customizer->add_control('_address', array(
			'label' => __('Address'),
			'section' => 'contact',
			'type' => 'text',
		)
	);
	
	$customizer->add_setting('_contact_form', 
		array('default' => '')
	);
	
	$customizer->add_control('_contact_form', array(
			'label' => __('Contact form shortcode'),
			'section' => 'contact',
			'type' => 'text',
		)
	);
	
	$customizer->add_setting('_phone', 
		array('default' => '')
	);
	
	$customizer->add_control('_phone', array(
			'label' => __('Телефон #1'),
			'section' => 'contact',
			'type' => 'text',
		)
	);
	
	$customizer->add_setting('_phone_second', 
		array('default' => '')
	);
	
	$customizer->add_control('_phone_second', array(
			'label' => __('Телефон #2'),
			'section' => 'contact',
			'type' => 'text',
		)
	);
	
	$customizer->add_setting('_skype', 
		array('default' => '')
	);
	
	$customizer->add_control('_skype', array(
			'label' => __('Skype'),
			'section' => 'contact',
			'type' => 'text',
		)
	);
	
	$customizer->add_setting('_email', 
		array('default' => '')
	);
	
	$customizer->add_control('_email', array(
			'label' => __('E-mail'),
			'section' => 'contact',
			'type' => 'text',
		)
	);
	
	$customizer->add_setting('_facebook', 
		array('default' => '')
	);
	
	$customizer->add_control('_facebook', array(
			'label' => __('Facebook'),
			'section' => 'contact',
			'type' => 'text',
		)
	);
	
	$customizer->add_setting('_instagram', 
		array('default' => '')
	);
	
	$customizer->add_control('_instagram', array(
			'label' => __('Instagram'),
			'section' => 'contact',
			'type' => 'text',
		)
	);
	
	$customizer->add_setting('_youtube', 
		array('default' => '')
	);
	
	$customizer->add_control('_youtube', array(
			'label' => __('Youtube'),
			'section' => 'contact',
			'type' => 'text',
		)
	);
	
	$customizer->add_setting('_x', 
		array('default' => '')
	);
	
	$customizer->add_control('_x', array(
			'label' => __('Coordinates X'),
			'section' => 'contact',
			'type' => 'text',
		)
	);
	
	$customizer->add_setting('_y', 
		array('default' => '')
	);
	
	$customizer->add_control('_y', array(
			'label' => __('Coordinates Y'),
			'section' => 'contact',
			'type' => 'text',
		)
	);
});

function change_wc_variation_image_size( $child_id, $instance, $variation ) {
  $attachment_id = get_post_thumbnail_id( $variation->get_variation_id() );
  $attachment    = wp_get_attachment_image_src( $attachment_id, 'shop_catalog' );
  $image_src     = $attachment ? current( $attachment ) : '';
  $child_id['image_src'] = $image_src;
	
  return $child_id;
}

add_filter( 'woocommerce_available_variation', 'change_wc_variation_image_size', 10, 3 );

function pippin_get_image_id($image_url) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
	
	if(isset($attachment[0])){
		return $attachment[0]; 
	}
	
	return false;
}

if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {

	function woocommerce_template_loop_product_thumbnail() {
		global $post, $product;
		
		$variations = new WC_Product_Variable( $product->id );
		$available_variations = $variations->get_available_variations();
		
		$taxonomy = 'pa_color';
		
		$default = false;
		
		foreach($available_variations as $variation){
			
			$get = true;
			if(isset($_GET['filter_color'])){
				$array = explode(',', $_GET['filter_color']);
				
				end($array);
				
				$get = key($array);
				
			}
			
			if($variation['attributes']['attribute_'. $taxonomy] == $default && !isset($array[$get])){				
				$image_id = pippin_get_image_id($variation['image_link']);
				echo '<a href="' . esc_url( get_permalink($post) ).'" class="vm-product-media-image" data-src="'. get_the_post_thumbnail_url($post->ID, 'shop_catalog').'">';
						
						echo woocommerce_get_product_thumbnail();		
						echo wp_get_attachment_image( $image_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_catalog' ));
				echo '</a>';				
			}else if(isset($array[$get]) && $array[$get] == $variation['attributes']['attribute_'. $taxonomy]){
				$image_id = pippin_get_image_id($variation['image_link']);
				echo '<a href="' . esc_url( get_permalink($post) ).'" class="vm-product-media-image" data-src="'.get_the_post_thumbnail_url($post->ID, 'shop_catalog').'">';
					
					echo woocommerce_get_product_thumbnail();		
					echo wp_get_attachment_image( $image_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_catalog' ));
				echo '</a>';	
			}
		}
	}
}



if (  ! function_exists( 'woocommerce_template_loop_product_title' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H3.
	 */
	function woocommerce_template_loop_product_title() {
		global $post, $product;
		
		echo '<h3 class="vm-product-name"><a href="' . esc_url( get_permalink($post) ) . '">'. get_the_title() .'</a></h3>';
	}
}
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

//vc_map( array(
//   "name" => __("Product tabs"),
//   "base" => "bartag",
//   "category" => __('Content'),
//   "params" => array(
//      array(
//         "type" => "textfield",
//         "holder" => "div",
//         "class" => "",
//         "heading" => __("Title"),
//         "param_name" => "title"
//      ),
//	  array(
//         "type" => "textfield",
//         "holder" => "div",
//         "class" => "",
//         "heading" => __("Description"),
//         "param_name" => "description"
//      ),
//	   array(
//         "type" => "textfield",
//         "holder" => "div",
//         "class" => "",
//         "heading" => __("Categories ID"),
//         "param_name" => "cat",
//		"description" => __("This input for categories ID. Example: 12,22,56")
//      )
//   )
//) );

add_shortcode( 'bartag', 'bartag_func' );

function bartag_func( $atts ) {
   
   extract( shortcode_atts( array(
      'title' => 'Header product tabs',
      'description' => 'Description product tabs',
      'cat' => false,
     
   ), $atts ) );
  
   $output  = '<div class="jv-module module our-product woocommerce">';
  
   if(!empty($title)){
		$output .= '<h3 class="title-module"><span>'.$title.'</span></h3>';
   }
	
	   		
   $output .= '<div class="contentmod clearfix">';
   $output .= '<div class="custom">';
   
   if(!empty($description)){
		$output .= '<p class="module-description">'.$description.'</p>';
   }
	
   $output .= '<div role="tabpanel">';

    $categ = wc_get_product_category_list();
   
   if($categ){
	 
	   $output .= '<ul class="nav nav-tabs">';
	   
		$cats = explode(',', $categ);
			
			foreach($cats as $key => $term_slug){
				$term = get_term_by('slug', $term_slug, 'product_cat');				
				
				$li = '<li role="presentation">';
				
				if($key == 0){
					$li = '<li role="presentation" class="active">';
				}
				
				$output .= $li;
				
				$output .= '<a href="#'.esc_attr( $term->slug ) .'" aria-controls="'.esc_attr( $term->slug ) .'" role="tab" data-toggle="tab">'.esc_attr( $term->name ).'</a>';
				$output .= '</li>';
			}
			
		$output .= '</ul>';
		$output .= '<div class="tab-content">';
		
		foreach($cats as $key => $slug){			
			$term = get_term_by('slug', $slug, 'product_cat');
			
			$li = '<div role="tabpanel" class="tab-pane fade" id="'.esc_attr( $term->slug ).'"';
				
			if($key == 0){
				$li = '<div role="tabpanel" class="tab-pane fade in active" id="'.esc_attr( $term->slug ).'"';
			}
			$style = ' style="position: relative; height: 878px;"';
			$output .= $li . $style .'>';
			
			$output .= '<div class="row">';
			$output .= '<ul class="clearfix vm-product-grid vmproduct productdetails products">';
			
			$query = new WP_Query(array(
				'post_type' => 'product',
				'posts_per_page' => 8,
				'tax_query' => array(
					'relation' => 'AND',
					array(
						'taxonomy' => 'product_cat',
						'field'    => 'term_id',
						'terms'    => array( $term->term_id ),
					),
					array(
						'taxonomy' => 'product_tag',
						'field'    => 'slug',
						'terms'    => array('top-prodazh')
					)
				)
			));
			$vc = 'col-md-3';
			while ( $query->have_posts() ) : $query->the_post();
				ob_start();
				
				include(locate_template('woocommerce/content-product.php'));
				
				$output .= ob_get_clean();   
				
			endwhile;
			wp_reset_postdata();
			
			$output .= '</ul>';
			$output .= '</div>';
			$output .= '</div>';
			
		}		
		$output .= '</div>';
		
   }
   $output .= '</div>';
   $output .= '</div>';
   $output .= '</div>';
   $output .= '</div>';
   
   return $output;
}

//vc_map( array(
//   "name" => __("Product Slider"),
//   "base" => "vc_slider_product",
//   "category" => __('Product Recent Slider'),
//   "params" => array(
//      array(
//         "type" => "textfield",
//         "holder" => "div",
//         "class" => "",
//         "heading" => __("Title"),
//         "param_name" => "title"
//      ),
//	  array(
//         "type" => "textfield",
//         "holder" => "div",
//         "class" => "",
//         "heading" => __("Description"),
//         "param_name" => "description"
//      )
//   )
//) );

add_shortcode( 'vc_slider_product', 'vc_slider_product_func' );
function vc_slider_product_func( $atts ) {
   
   extract( shortcode_atts( array(
      'title' => 'Header product tabs',
      'description' => 'Description product tabs'     
     
   ), $atts ) );
   
   $output  = '<div class="jv-module module jv-module-center-title active-owl on-sale woocommerce">';
  
   if(!empty($title)){
		$output .= '<h3 class="title-module"><span>'.$title.'</span></h3>';
   }
	
	   		
   $output .= '<div class="contentmod clearfix">';
   $output .= '<div class="vmgroup jv-module-center-title active-owl on-sale">';
   
   if(!empty($description)){
		$output .= '<div class="vmheader module-description">'.$description.'</div>';
   }
	
   $output .= '<div role="row">';
   
   
   $query = new WP_Query(array(
		'post_type' => 'product',
		'orderby' => 'date',
		'order'   => 'DESC',
		'posts_per_page' => 6,
		'tax_query' => array(			
			array(
				'taxonomy' => 'product_tag',
				'field'    => 'slug',
				'terms'    => array( 'akcii' ),
			)
		)
	));
   
   if($query->have_posts()){
		$output .= '<ul class="clearfix  products vmproduct jv-module-center-title active-owl on-sale productdetails  owl-carousel owl-theme">';
		
	    while ( $query->have_posts() ) : $query->the_post();
			ob_start();
				wc_get_template_part( 'content', 'product' );
			$output .= ob_get_clean(); 
			
		endwhile;
		wp_reset_postdata();
		
		$output .= '</ul>';
   }
   
   $output .= '</div>';
   $output .= '</div>';
   $output .= '</div>';
   $output .= '</div>';
   
   return $output;
}

add_action( 'init', 'promate_partners' );

add_shortcode( 'vc_slider_top', 'vc_slider_product_top' );
function vc_slider_product_top( $atts ) {
   
   extract( shortcode_atts( array(
      'title' => 'Header product tabs'      
     
   ), $atts ) );
   
   $output  = '<div class="jv-module related-products">';
  
   if(!empty($title)){
		$output .= '<h3 class="title-module"><span>'.$title.'</span></h3>';
   }
					
   
   $output .= '<div class="product-related-contente">';
      
   
   $query = new WP_Query(array(
		'post_type' => 'product',
		'orderby' => 'date',
		'order'   => 'DESC'
	));
   
   if($query->have_posts()){
		$output .= '<ul class="clearfix  woocommerce products vmproduct jv-module-center-title active-owl on-sale productdetails  owl-carousel owl-theme">';
		
	    while ( $query->have_posts() ) : $query->the_post();
			ob_start();
				wc_get_template_part( 'content', 'product' );
			$output .= ob_get_clean(); 
			
		endwhile;
		wp_reset_postdata();
		
		$output .= '</ul>';
   }   
 
  
   $output .= '</div>';
   $output .= '</div>';
   
   return $output;
}

add_action( 'init', 'promate_partners' );

function promate_partners() {
	$labels = array(
		'name'               => _x( 'Partners', 'post type general name', 'promate' ),
		'singular_name'      => _x( 'Partner', 'post type singular name', 'promate' ),
		'menu_name'          => _x( 'Partners', 'admin menu', 'promate' ),
		'name_admin_bar'     => _x( 'Partner', 'add new on admin bar', 'promate' ),
		'add_new'            => _x( 'Add New', 'partner', 'promate' ),
		'add_new_item'       => __( 'Add New Partner', 'promate' ),
		'new_item'           => __( 'New Partner', 'promate' ),
		'edit_item'          => __( 'Edit Partner', 'promate' ),
		'view_item'          => __( 'View Partner', 'promate' ),
		'all_items'          => __( 'All Partners', 'promate' ),
		'search_items'       => __( 'Search Partners', 'promate' ),
		'parent_item_colon'  => __( 'Parent Partners:', 'promate' ),
		'not_found'          => __( 'No partners found.', 'promate' ),
		'not_found_in_trash' => __( 'No partners found in Trash.', 'promate' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'promate' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'partner' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'thumbnail', 'excerpt')
	);

	register_post_type( 'book', $args );
}

add_action( 'init', 'create_mobile_taxonomies', 0 );

function create_mobile_taxonomies() {
	$labels = array(
		'name'              => _x( 'Мобильные устройства', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Устройство', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search устройство', 'textdomain' ),
		'all_items'         => __( 'Все мобильные устройства', 'textdomain' ),
		'parent_item'       => __( 'Родительское устройство', 'textdomain' ),
		'parent_item_colon' => __( 'Родительское устройство:', 'textdomain' ),
		'edit_item'         => __( 'Редактировать устройтво', 'textdomain' ),
		'update_item'       => __( 'Обновить утройство', 'textdomain' ),
		'add_new_item'      => __( 'Добавить новое устройство', 'textdomain' ),
		'new_item_name'     => __( 'Новое мобильное устройство', 'textdomain' ),
		'menu_name'         => __( 'Мобильное устройство', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'mobile' ),
	);

	register_taxonomy( 'mobile', array( 'product' ), $args );

}

//vc_map( array(
//   "name" => __("Partners Slider"),
//   "base" => "vc_slider_partners",
//   "category" => __('Partners Recent Slider'),
//   "params" => array(
//      array(
//         "type" => "textfield",
//         "holder" => "div",
//         "class" => "",
//         "heading" => __("Title"),
//         "param_name" => "title"
//      ),
//	  array(
//         "type" => "textfield",
//         "holder" => "div",
//         "class" => "",
//         "heading" => __("Description"),
//         "param_name" => "description"
//      )
//   )
//) );

add_shortcode( 'vc_slider_partners', 'vc_slider_partners_func' );
function vc_slider_partners_func( $atts ) {
   
   extract( shortcode_atts( array(
      'title' => 'Header product tabs',
      'description' => ''     
     
   ), $atts ) );
   
   $output  = '<div class="jv-module module jv-module-center-title active-owl">';
  
   if(!empty($title)){
		$output .= '<h3 class="title-module"><span>'.$title.'</span></h3>';
   }
	
	   		
   $output .= '<div class="contentmod clearfix">';
   $output .= '<div class="vmgroup jv-module-center-title active-owl">';
   
   if(!empty($description)){
		$output .= '<div class="vmheader module-description">'.$description.'</div>';
   }
	
   $output .= '<div role="row">';
   
   
   $query = new WP_Query(array(
		'post_type' => 'book',
		'orderby' => 'date',
		'order'   => 'DESC'
	));
   
   if($query->have_posts()){
		$output .= '<ul class="owl-carousel owl-theme on-partner">';
		
	    while ( $query->have_posts() ) : $query->the_post();
			$output .= '<li class="item col-md-2">';
			$output .= get_the_post_thumbnail( get_the_ID(), array(165, 95));
			$output .= '</li>';		
			
		endwhile;
		wp_reset_postdata();
		
		$output .= '</ul>';
   }
   
   $output .= '</div>';
   $output .= '</div>';
   $output .= '</div>';
   $output .= '</div>';
   
   return $output;
}

function promate_social(){
	
}

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 ); 
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 ); 
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 ); 
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 ); 
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 ); 
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 ); 
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 ); 
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 ); 
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20); 


add_action('woocommerce_single_product_summary','woocommerce_template_single_rating', 10);
add_action('woocommerce_single_product_summary','woocommerce_template_single_meta', 12);
add_action('woocommerce_single_product_summary','woocommerce_template_single_add_to_cart', 14);

function promate_par_page($cols){
	
	 return isset( $_GET['show'] ) ? wc_clean( $_GET['show'] ) : $cols;
}

add_filter( 'loop_shop_per_page', 'promate_par_page', 20 );

function promate_product_before(){
	echo '<div class="clearfix vm-single-info-bottom"><div class="vm-product-addcart-tool pull-left"><div class="jvvm-custom">';	
}
function promate_product_compare(){?>
	<div class="jvcompare" title="Сравните товар">
		<?php echo do_shortcode('[yith_compare_button]'); ?>
	</div>
<?php }

function promate_product_after(){
	echo '</div></div>';
	echo '<div class="share-button-group pull-right"><span class="pull-left">Поделиться:</span>';
	echo '<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57fa1087f6dfb7c4"></script><div class="addthis_inline_share_toolbox_zvwo"></div>';
	echo '</div></div>';
}

add_action('woocommerce_single_product_summary','promate_product_before', 30);
add_action('woocommerce_single_product_summary','promate_product_compare', 32);
add_action('woocommerce_single_product_summary','promate_product_after', 33);


add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {
  
    //unset( $tabs['additional_information'] );

    return $tabs;
}

add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {
	$tabs['video'] = array(
		'title' 	=> __( 'Видео-обзор', 'woocommerce' ),
		'priority' 	=> 50,
		'callback' 	=> 'woo_new_product_tab_content'
	);

	return $tabs;

}
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {
	$tabs['additional_information']['title'] = __( 'Характеристики' );
	
	return $tabs;
}
function woo_new_product_tab_content() {
	global $product;

	$html = get_post_meta(get_the_ID(), 'video', true);
	if($html){
		echo $html;
	}else{
		printf('К сожалению видео пока нет!');
	}	
}

require_once(get_template_directory() . '/includes/class.widget.category.php');
require_once(get_template_directory() . '/includes/class-wc-widget-product-categories.php');
require_once(get_template_directory() . '/includes/class-wc-widget-top-rated-products.php');
require_once(get_template_directory() . '/includes/class-wp-widget-recent-comments.php');
require_once(get_template_directory() . '/includes/class-wp-widget-recent-posts.php');


function add_walker_promate(){
	require_once(get_template_directory() . '/includes/class-product-cat-list-walker.php');
	
	return new Promate_Product_Cat_List_Walker();
}
add_action('add_walker_promate', 'add_walker_promate');

function promate_woocommerce_per_page(){?>
	<div class="vm-tools-limit pull-left">
		<form class="woocommerce-ordering orderlistcontainer" method="get">
			<span class="title">Выводить по:</span> 
			<select name="show" class="inputbox chzn-done" size="1" onchange="this.form.submit()" style="display: none;">				
				<option value="24">24</option> 
				<option value="30">30</option>
				<option value="60">60</option>				
			</select>
			<input type="hidden" name="orderby" value="<?php echo (isset($_GET['orderby'])) ? $_GET['orderby'] : 'date';?>"/>
			<div class="chzn-container chzn-container-single chzn-container-single-nosearch" style="width: 70px;" title="">
				<a class="chzn-single" tabindex="-1">
					<span><?php echo (isset($_GET['show']) && $_GET['show']) ? $_GET['show'] : 24;?></span>
					<div><b></b></div>
				</a>  
				<div class="chzn-drop">
					<div class="chzn-search"><input type="text" autocomplete="off" readonly=""></div>
					<ul class="chzn-results">						
						<li class="active-result" style="" data-option-array-index="1">24</li>
						<li class="active-result" style="" data-option-array-index="2">30</li>
						<li class="active-result" style="" data-option-array-index="3">60</li>						
					</ul>
				</div>
			</div>
		</form>
	</div>
<?php }

add_action('woocommerce_after_shop_loop','promate_woocommerce_per_page', 5);

function dimox_breadcrumbs() {

  /* === ОПЦИИ === */
  $text['home'] = 'Главная'; // текст ссылки "Главная"
  $text['category'] = 'Архив рубрики "%s"'; // текст для страницы рубрики
  $text['search'] = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
  $text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
  $text['author'] = 'Статьи автора %s'; // текст для страницы автора
  $text['404'] = 'Ошибка 404'; // текст для страницы 404
  $text['page'] = 'Страница %s'; // текст 'Страница N'
  $text['cpage'] = 'Страница комментариев %s'; // текст 'Страница комментариев N'

  $wrap_before = '<div class="breadcrumbs">'; // открывающий тег обертки
  $wrap_after = '</div><!-- .breadcrumbs -->'; // закрывающий тег обертки
  $sep = '›'; // разделитель между "крошками"
  $sep_before = '<span class="sep">'; // тег перед разделителем
  $sep_after = '</span>'; // тег после разделителя
  $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
  $show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
  $show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
  $before = '<span class="current">'; // тег перед текущей "крошкой"
  $after = '</span>'; // тег после текущей "крошки"
  /* === КОНЕЦ ОПЦИЙ === */

  global $post;
  $home_link = home_url('/');
  $link_before = '<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">';
  $link_after = '</span>';
  $link_attr = ' itemprop="url"';
  $link_in_before = '<span itemprop="title">';
  $link_in_after = '</span>';
  $link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
  $frontpage_id = get_option('page_on_front');
  $parent_id = $post->post_parent;
  $sep = ' ' . $sep_before . $sep . $sep_after . ' ';

  if (is_home() || is_front_page()) {

    if ($show_on_home) echo $wrap_before . '<a href="' . $home_link . '">' . $text['home'] . '</a>' . $wrap_after;

  } else {

    echo $wrap_before;
    if ($show_home_link) echo sprintf($link, $home_link, $text['home']);

    if ( is_category() ) {
      $cat = get_category(get_query_var('cat'), false);
      if ($cat->parent != 0) {
        $cats = get_category_parents($cat->parent, TRUE, $sep);
        $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        if ($show_home_link) echo $sep;
        echo $cats;
      }
      if ( get_query_var('paged') ) {
        $cat = $cat->cat_ID;
        echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
      }

    } elseif ( is_search() ) {
      if (have_posts()) {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;
      } else {
        if ($show_home_link) echo $sep;
        echo $before . sprintf($text['search'], get_search_query()) . $after;
      }

    } elseif ( is_day() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
      echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
      if ($show_current) echo $sep . $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
      if ($show_current) echo $sep . $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ($show_home_link) echo $sep;
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
        if ($show_current) echo $sep . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, $sep);
        if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
        if ( get_query_var('cpage') ) {
          echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
        } else {
          if ($show_current) echo $before . get_the_title() . $after;
        }
      }

    // custom post type
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      if ( get_query_var('paged') ) {
        echo $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . $post_type->label . $after;
      }

    } elseif ( is_attachment() ) {
      if ($show_home_link) echo $sep;
      $parent = get_post($parent_id);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      if ($cat) {
        $cats = get_category_parents($cat, TRUE, $sep);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
      }
      printf($link, get_permalink($parent), $parent->post_title);
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_page() && !$parent_id ) {
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_page() && $parent_id ) {
      if ($show_home_link) echo $sep;
      if ($parent_id != $frontpage_id) {
        $breadcrumbs = array();
        while ($parent_id) {
          $page = get_page($parent_id);
          if ($parent_id != $frontpage_id) {
            $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
          }
          $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        for ($i = 0; $i < count($breadcrumbs); $i++) {
          echo $breadcrumbs[$i];
          if ($i != count($breadcrumbs)-1) echo $sep;
        }
      }
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_tag() ) {
      if ( get_query_var('paged') ) {
        $tag_id = get_queried_object_id();
        $tag = get_tag($tag_id);
        echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
      }

    } elseif ( is_author() ) {
      global $author;
      $author = get_userdata($author);
      if ( get_query_var('paged') ) {
        if ($show_home_link) echo $sep;
        echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
      }

    } elseif ( is_404() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . $text['404'] . $after;

    } elseif ( has_post_format() && !is_singular() ) {
      if ($show_home_link) echo $sep;
      echo get_post_format_string( get_post_format() );
    }

    echo $wrap_after;

  }
}

function promate_get_month($month){
	$array = array(
		'Янв', 'Фев', 'Март', 'Апр', 'Май', 'Июнь', 'Июль', 'Авг', 'Сент', 'Окт', 'Ноя', 'Дек'
	);
	
	return $array[($month - 1)];
	
}

function wpdocs_excerpt_more( $more ) {
    return '';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

/**
 * загружаемые скрипты и стили
 */
function load_style_script(){
    wp_enqueue_style('last', get_template_directory_uri() . '/css/last.css');
	wp_enqueue_script('velocity-js', get_template_directory_uri() . '/js/jquery.velocity.js');
	wp_enqueue_script('last-js', get_template_directory_uri() . '/js/last.js', $in_footer = true);
}

/**
 * загружаем скрипты и стили
 */
add_action('wp_enqueue_scripts', 'load_style_script');

require get_template_directory() . '/includes/class-wc-widget-price-filter.php';

add_filter( 'woocommerce_currencies', 'moo_add_my_currency' );

function moo_add_my_currency( $currencies ) {
    $currencies['UAH'] = 'Ukrainian Hryvnia';
    asort($currencies);
    return $currencies;
}

add_filter('woocommerce_currency_symbol', 'moo_add_my_currency_symbol', 10, 2);

function moo_add_my_currency_symbol( $currency_symbol, $currency ) {
    switch( $currency ) {
        case 'UAH': $currency_symbol = ' грн.'; break;
    }
    return $currency_symbol;
}

//vc_map( array(
//   "name" => __("Mobiles Slider"),
//   "base" => "vc_slider_mobiles",
//   "category" => __('Mobiles Slider'),
//   "params" => array(
//      array(
//         "type" => "textfield",
//         "holder" => "div",
//         "class" => "",
//         "heading" => __("Title"),
//         "param_name" => "title"
//      ),
//	  array(
//         "type" => "textfield",
//         "holder" => "div",
//         "class" => "",
//         "heading" => __("Description"),
//         "param_name" => "description"
//      )
//   )
//) );

add_shortcode( 'vc_slider_mobiles', 'vc_slider_mobiles_func' );
function vc_slider_mobiles_func( $atts ) {
   
   extract( shortcode_atts( array(
      'title' => 'Header product tabs',
      'description' => 'Description product tabs'     
     
   ), $atts ) );
   
   $output  = '<div class="jv-module module jv-module-center-title active-owl" style="margin-bottom: 30px;">';
   
    if(!empty($title)){
		$output .= '<h3 class="title-module"><span>'.$title.'</span></h3>';
    }
	
	$output .= '<div class="contentmod clearfix">';
	$output .= '<div class="vmgroup jv-module-center-title active-owl">';
	
	if(!empty($description)){
		$output .= '<div class="vmheader module-description">'.$description.'</div>';
    }
	
	$output .= '<div role="row">';
	
	$terms = get_terms( array(
		'taxonomy' => 'mobile',
		'hide_empty' => false,
	) );
	
	$output .= '<ul class="owl-carousel owl-theme on-mobile">';
	
	foreach($terms as $term){
		
		$output .= '<li class="col-md-2">';
		$images = get_field('images', $term, false);
				
		$output .= '<a href="'.get_term_link($term).'">';
		
		$image_attributes = wp_get_attachment_image_src($images, 'mobile-thumb');
		
		if ( $image_attributes ) {
			$output .= '<img src="' . $image_attributes[0] . '" width="'. $image_attributes[1]. '" height="' . $image_attributes[2] .'" />';
		}
	
		$output .= '<p class="title">'.$term->name.'</p>';
		$output .= '</a>';
		$output .= '</li>';		
	}
	
   $output .= '</ul>';  
	
	$output .= '</div>';
	
	
	$output .= '</div>';	
	$output .= '</div>';
	
	$output .= '</div>';	
	
	return $output;
   
}

add_action( 'woocommerce_short_description', 'output_product_excerpt', 35 );

function output_product_excerpt() {
	global $post;
	
	the_excerpt();
	//var_dump($post);
	//echo $post->post_excerpt;
}
add_filter( 'woocommerce_get_availability', 'wcs_custom_get_availability', 1, 2);
function wcs_custom_get_availability( $availability, $_product ) {
    
    // Change In Stock Text
    if ( $_product->is_in_stock() ) {
        $availability['availability'] = __('В наличии', 'woocommerce');
    }
    // Change Out of Stock Text
    if ( ! $_product->is_in_stock() ) {
        $availability['availability'] = __('Нет в наличии', 'woocommerce');
    }
    return $availability;
}
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

function custom_override_checkout_fields( $fields ) {
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_city']);
	
    $fields['billing']['billing_address_1']['required'] = false;

    $fields['billing']['billing_last_name']['required'] = false;

	$fields['billing']['billing_phone']['input_class'] = array('billing_phone');
	$fields['billing']['billing_phone']['placeholder'] = '(___) ___ __ __';
	
	$fields['billing']['department']['type'] = 'text';
	$fields['billing']['department']['clear'] = true;
	$fields['billing']['department']['placeholder'] = __('Укажите номер отделения');
	$fields['billing']['department']['label'] = __('Отделение "Новая Почта"');

    
    return $fields;
}

/**
 * Update the order meta with field value
 */
add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta' );

function my_custom_checkout_field_update_order_meta( $order_id ) {
    if ( ! empty( $_POST['department'] ) ) {
        update_post_meta( $order_id, __('Отделение "Новая Почта"'), sanitize_text_field( $_POST['department'] ) );
    }
}

add_filter( 'woocommerce_get_catalog_ordering_args', 'custom_woocommerce_get_catalog_ordering_args' );

function custom_woocommerce_get_catalog_ordering_args( $args ) {
	 global $wpdb;
	$orderby_value = isset( $_GET['orderby'] ) ? woocommerce_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );

	if ( 'stock_list_asc' == $orderby_value ) {
		$args['orderby'] = 'meta_value wp_posts.ID';
		$args['order'] = 'ASC';
		$args['meta_key'] = '_stock_status';	
	}
	elseif ( 'stock_list_desc' == $orderby_value ) {
		$args['orderby'] = 'meta_value wp_posts.ID';
		$args['order'] = 'DESC';
		$args['meta_key'] = '_stock_status';
	}

	return $args;
}

add_filter( 'woocommerce_default_catalog_orderby_options', 'custom_woocommerce_catalog_orderby' );
add_filter( 'woocommerce_catalog_orderby', 'custom_woocommerce_catalog_orderby' );

function custom_woocommerce_catalog_orderby( $sortby ) {
	$sortby['stock_list_asc'] = 'Остаток: по убыванию';
	$sortby['stock_list_desc'] = 'Остаток: по возрастанию';
    unset($sortby["popularity"]);
    unset($sortby["rating"]);
    unset($sortby["date"]);
	return $sortby;
}

add_filter('woocommerce_checkout_required_field_notice', 'handler_function_name', 10, 2);

function handler_function_name($message, $product_id) {
	$return = substr($message, 25);
	$return = 'Поле ' . $return;
    return $return ;
}

function promate_logo () {
    $html = sprintf( '<a href="%1$s" class="style-svg custom-logo-link_promate">Promate</a>',
        esc_url( home_url( '/' ) )
    );
    return $html;
}

add_theme_support( 'custom-header', array(
    'flex-width'    => true,
    'width'           => 247,
    'flex-height'    => true,
    'height'          => 59,
    'header-selector' => '.site-title a',
    'header-text'     => false

) );

// Отключаем jQuery WordPress
//add_filter('wp_default_scripts', 'dequeue_jquery_migrate');
//
//function dequeue_jquery_migrate( & $scripts) {
//    if (!(is_admin_bar_showing())) {
//        $scripts->remove('jquery');
//  }
//}