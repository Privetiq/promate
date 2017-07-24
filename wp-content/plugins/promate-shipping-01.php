<?php
/*
Plugin Name: Koni Shipping
Plugin URI: http://woothemes.com/woocommerce
Version: 1.0.0
Author: Glonal Wides
Author URI: http://woothemes.com
*/

/**
 * Check if WooCommerce is active
 */
 
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	function your_shipping_method_init() {
		if ( ! class_exists( 'Koni_Shipping_Method' ) ) {
			
			
			
			class Koni_Shipping_Method extends WC_Shipping_Method {
				/**
				 * Constructor for your shipping class
				 *
				 * @access public
				 * @return void
				 */
				public function __construct() {
					$this->id                 = 'koni_shipping_method'; // Id for your shipping method. Should be uunique.
					$this->method_title       = __( 'Доставка по Киеву(более 1500 грн БЕСПЛАТНА)' );  // Title shown in admin
					

					$this->enabled            = "yes"; // This can be added as an setting but for this example its forced enabled
					$this->title              = "По Киеву(более 1500 грн бесплатно)"; // This can be added as an setting but for this example its forced.

					$this->init();
				}

				/**
				 * Init your settings
				 *
				 * @access public
				 * @return void
				 */
				function init() {
					// Load the settings API
					$this->init_form_fields(); // This is part of the settings API. Override the method to add your own settings
					$this->init_settings(); // This is part of the settings API. Loads settings you previously init.

					// Save settings in admin if you have any defined
					add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );
				}

				/**
				 * calculate_shipping function.
				 *
				 * @access public
				 * @param mixed $package
				 * @return void
				 */
				public function calculate_shipping( $package ) {
					global $woocommerce;
					
					$avarage = floatval( preg_replace( '#[^\d.]#', '', $woocommerce->cart->get_cart_total() ) );
					
					if($avarage <= 1000){
						$rate = array(
							'id' => $this->id,
							'label' => $this->title,
							'cost' => '50',
							'calc_tax' => 'per_item'
						);
						
						// Register the rate
						$this->add_rate( $rate );
					}					
				}
			}
		}
	}

	add_action( 'woocommerce_shipping_init', 'your_shipping_method_init' );

	function add_your_shipping_method( $methods ) {
		$methods['koni_shipping_method'] = 'Koni_Shipping_Method';
		return $methods;
	}

	add_filter( 'woocommerce_shipping_methods', 'add_your_shipping_method' );
}