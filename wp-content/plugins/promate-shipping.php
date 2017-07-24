<?php
/*
Plugin Name: Promate Gateway
Plugin URI: http://woothemes.com/woocommerce
Version: 1.0.0
Author: Glonal Wides
Author URI: http://woothemes.com
*/

/**
 * Check if WooCommerce is active
 */
 
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	add_action( 'plugins_loaded', 'init_your_gateway_class' );
	function init_your_gateway_class() {
		class WC_Gateway_Your_Gateway extends WC_Payment_Gateway {
			
			public function __construct(){
				$this->id = 'WC_Gateway_Your_Gateway';
				$this->has_fields = true;
				$this->method_title = __('Безналичный расчет');				
				
				
				
				add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
				
				$this->init_form_fields();
				$this->init_settings();
				
				$this->title = $this->get_option( 'title' );
				$this->description = $this->get_option( 'description' );
			}
			
			
			
			public function init_form_fields(){
				$this->form_fields = array(
					'enabled' => array(
						'title' => __( 'Enable/Disable', 'woocommerce' ),
						'type' => 'checkbox',
						'label' => __( 'Enable Cheque Payment', 'woocommerce' ),
						'default' => 'yes'
					),
					'title' => array(
						'title' => __( 'Title', 'woocommerce' ),
						'type' => 'text',
						'description' => __( 'This controls the title which the user sees during checkout.', 'woocommerce' ),
						'default' => __( 'Cheque Payment', 'woocommerce' ),
						'desc_tip'      => true,
					),
					'description' => array(
						'title' => __( 'Customer Message', 'woocommerce' ),
						'type' => 'textarea',
						'default' => ''
					)
				);
			}
			
			function process_payment( $order_id ) {
				global $woocommerce;
				$order = new WC_Order( $order_id );

				// Mark as on-hold (we're awaiting the cheque)
				$order->update_status('pending', __( 'Awaiting cheque payment', 'woocommerce' ));

				// Reduce stock levels
				$order->reduce_order_stock();

				// Remove cart
				$woocommerce->cart->empty_cart();
				echo 1;
				// Return thankyou redirect
				return array(
					'result' => 'success',
					'redirect' => $this->get_return_url( $order )
				);
			}
			
		}
	}

	add_action( 'plugins_loaded', 'init_your_gateway_class_2' );
	function init_your_gateway_class_2() {
		class WC_Gateway_Your_Gateway_Second extends WC_Payment_Gateway {
			
			public function __construct(){
				$this->id = 'WC_Gateway_Your_Gateway_Second';
				$this->has_fields = true;
				$this->method_title = __('Безналичный расчет с НДС');				
				add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
				
				$this->init_form_fields();
				$this->init_settings();
				
				$this->title = $this->get_option( 'title' );
				$this->description = $this->get_option( 'description' );
			}
			
			
			
			public function init_form_fields(){
				$this->form_fields = array(
					'enabled' => array(
						'title' => __( 'Enable/Disable', 'woocommerce' ),
						'type' => 'checkbox',
						'label' => __( 'Enable Cheque Payment', 'woocommerce' ),
						'default' => 'yes'
					),
					'title' => array(
						'title' => __( 'Title', 'woocommerce' ),
						'type' => 'text',
						'description' => __( 'This controls the title which the user sees during checkout.', 'woocommerce' ),
						'default' => __( 'Cheque Payment', 'woocommerce' ),
						'desc_tip'      => true,
					),
					'description' => array(
						'title' => __( 'Customer Message', 'woocommerce' ),
						'type' => 'textarea',
						'default' => ''
					)
				);
			}
			
			function process_payment( $order_id ) {
				global $woocommerce;
				$order = new WC_Order( $order_id );

				// Mark as on-hold (we're awaiting the cheque)
				$order->update_status('pending', __( 'Awaiting cheque payment', 'woocommerce' ));

				// Reduce stock levels
				$order->reduce_order_stock();

				// Remove cart
				$woocommerce->cart->empty_cart();

				// Return thankyou redirect
				return array(
					'result' => 'success',
					'redirect' => $this->get_return_url( $order )
				);
			}
			
		}
	}
	function add_your_gateway_class( $methods ) {
		$methods[] = 'WC_Gateway_Your_Gateway'; 
		$methods[] = 'WC_Gateway_Your_Gateway_Second'; 
		return $methods;
	}

	add_filter( 'woocommerce_payment_gateways', 'add_your_gateway_class' );
}