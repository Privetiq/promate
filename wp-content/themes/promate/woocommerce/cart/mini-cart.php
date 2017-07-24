<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.1.0
 */
do_action( 'woocommerce_before_mini_cart' ); ?>
    <div class="menu-jvajaxcart">
    <div class="jv-module module module--cart-ajax">
        <div class="contentmod clearfix">
            <div class="jv-ajax-cart vmCartModule  module--cart-ajax" id="vmCartModule">
                <div class="jv-ajax-cart--dropdown dropdown">
					<span class="jv-ajax-cart--dropdown-toolbar" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
						<span class="jv-ajax-cart--toolbar-icon fa fa-shopping-cart fa-flip-horizontal"></span>
                        <?php if ( ! WC()->cart->is_empty() ) : ?>
                        <span class="jv-ajax-cart--toolbar-billwrapper">
							<span class="jv-ajax-cart--toolbar-totalproduct"><?php echo count(WC()->cart->get_cart());?>&nbsp;<?php echo __('шт.')?></span></span>

						</span>
                    <?php endif; ?>
                    </span>
                    <div class="jv-ajax-cart--dropdown-content dropdown-menu dropdown-menu-right"role="menu">
                        <ul class="jv-ajax-cart--items cart_list product_list_widget <?php echo $args['list_class']; ?>">
                            <?php if ( ! WC()->cart->is_empty() ) : ?>
                            <?php
                            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                    $product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
                                    $thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                                    $product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                    $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                    ?>
                                    <li class="jv-ajax-cart--item jv-ajax-cart--item_hashimg <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
                                        <div class="clearfix">
                                            <div class="jv-ajax-cart--item-thumbnail">
                                                <?php echo $thumbnail; ?>
                                            </div>
                                            <div class="jv-ajax-cart--item-extrainfo">
                                                <h3 class="jv-ajax-cart--item-title"><a href="<?php echo esc_url( $product_permalink ); ?>"><?php echo $product_name;?></a></h3>
                                                <div class="jv-ajax-cart--item-price">
                                                    <span class="jv-ajax-cart--item-quantity"><?php echo $cart_item['quantity'];?></span>
                                                    <span> x </span>
                                                    <span class="jv-ajax-cart--item-price_main"><?php echo $product_price;?></span>
                                                </div>
                                            </div>
                                            <div class="jv-ajax-cart--item-remove-all">
                                                <?php
                                                echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                                    '<a data-href="%s" class="remove" title="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                                    esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
                                                    __( 'Remove this item', 'woocommerce' ),
                                                    esc_attr( $product_id ),
                                                    esc_attr( $_product->get_sku() )
                                                ), $cart_item_key );
                                                ?>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                        <div class="jv-ajax-cart--footer">
                            <div class="text-left">
                                <div class="jv-ajax-cart--footer-bill">
                                    <div class="jv-ajax-cart--footer-total"><span><?php echo __('Всего');?>: </span><?php echo WC()->cart->get_cart_subtotal(); ?></div>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="jv-ajax-cart--footer-toolbar">
                                    <div class="jv-ajax-cart--footer-showcart">
                                        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="button wc-forward"><?php _e( 'View Cart', 'woocommerce' ); ?></a>
                                        <div class="jv-ajax-cart--footer-checkout">
                                            <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="button checkout wc-forward"><?php _e( 'Checkout', 'woocommerce' ); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php else : ?>
                            <ul class="jv-ajax-cart--items cart_list product_list_widget <?php echo $args['list_class']; ?>">
                                <li class="jv-ajax-cart--item jv-ajax-cart--item_hashimg"><?php _e( 'No products in the cart.', 'woocommerce' ); ?></li>
                                <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php do_action( 'woocommerce_after_mini_cart' ); ?>