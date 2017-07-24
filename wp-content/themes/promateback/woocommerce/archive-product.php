<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
<section id="block-breadcrumb">
	<div class="position position-breadcrumb">
		<div class="jv-module  module jv-breadcrumb">
			<div class="container">                    
				<div class="contentmod clearfix">
					<div class="col-md-3 col-md-jvoffset-12"></div>					
					<div class="breadcrumb-wrapper col-md-9 col-md-offset-3">						
						<?php woocommerce_breadcrumb(array(
													'delimiter'   => '&nbsp;&nbsp;>&nbsp;&nbsp;',
													'wrap_before' => '<nav class="woocommerce-breadcrumb" ' . ( is_single() ? 'itemprop="breadcrumb"' : '' ) . '>',
													'wrap_after'  => '</nav>',
													'before'      => '',
													'after'       => '',
													'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' )
												)); ?>
					</div>            
				</div> 
			</div>  
		</div>
    </div>
</section>
<section id="block-main">
	<div class="container">
		<div class="row">
			<div id="main-content" class="col-md-9 col-md-offset-3 woocommerce">
				<div id="content">
					<div class="vm-view">
						<div class="vm-listing">
							<div class="vm-tools top clearfix">
								<div class="pull-left">									
									<div class="vm-tools-order pull-left">									
										<form class="woocommerce-ordering orderlistcontainer" method="get">
											<span class="title">Сортировать:</span> 
											<select name="orderby" class="orderby" style="display: none;">
													<option value="popularity">По популярности</option>
													<option value="rating">По рейтингу</option>
													<option value="date">По новизне</option>
													<option value="price">Цены: по возрастанию</option>
													<option value="price-desc">Цены: по убыванию</option>
													<option value="stock_list_asc">По остатку</option>
											</select>
											<input type="hidden" name="show" onchange="this.form.submit()" value="<?php echo (isset($_GET['show'])) ? $_GET['show'] : 12;?>"/>						
											<div class="chzn-container chzn-container-single chzn-container-single-nosearch" style="width: 150px;" title="">
												<a class="chzn-single" tabindex="-1">
													<span><?php

														if(isset($_GET['orderby'])){
															switch($_GET['orderby']){
																case 'popularity':
																	echo 'По популярности';
																break;
																case 'rating':
																	echo 'По рейтингу';
																break;
																case 'date':
																	echo 'По новизне';
																break;
																case 'price':
																	echo 'Цены: по возрастанию';
																break;
																case 'price-desc':
																	echo 'Цены: по убыванию';
																break;
																case 'stock_list_asc':
																	echo 'По остатку';
																break;
															}
														}else{
															echo 'По новизне';
														}?>
														</span>
													<div><b></b></div>
												</a>
												<div class="chzn-drop">													
													<ul class="chzn-results">
														<li class="active-result" data-option-array-index="0">По популярности</li>
<!--														<li class="active-result" data-option-array-index="1">По рейтингу</li>-->
<!--														<li class="active-result" data-option-array-index="2">По новизне</li>-->
														<li class="active-result" data-option-array-index="3">Цены: по возрастанию</li>
														<li class="active-result" data-option-array-index="4">Цены: по убыванию</li>
<!--														<li class="active-result" data-option-array-index="5">По остатку</li>-->
													</ul>
												</div>
											</div>
										</form>
									</div>
									<!--
									<div class="vm-tools-layout pull-left">
										<a href="javascript:void(0)" title="Gird" class="view-grid active"></a>
										<a href="javascript:void(0)" title="List" class="view-list "></a>
									</div>-->
								</div>
								<div class="pull-right">
	
									<?php
										/**
										 * woocommerce_after_shop_loop hook.
										 *
										 * @hooked woocommerce_pagination - 10
										 */
										do_action( 'woocommerce_after_shop_loop' );
									?>
					
								</div>
							</div>
							<?php if ( have_posts() ) : ?>
							<ul class="products row vm-product-grid">
								<?php woocommerce_product_subcategories(); ?>
								
								<?php while ( have_posts() ) : the_post(); ?>
									
									<?php wc_get_template_part( 'content', 'product' ); ?>

								<?php endwhile; // end of the loop. ?>
								
								
							</ul>
							<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

							<?php wc_get_template( 'loop/no-products-found.php' ); ?>

							<?php endif; ?>
							<div class="vm-tools  bottom clearfix">								
								<div class="pull-right">
	
									<?php
										/**
										 * woocommerce_after_shop_loop hook.
										 *
										 * @hooked woocommerce_pagination - 10
										 */
										do_action( 'woocommerce_after_shop_loop' );
									?>
					
								</div>
							</div>
						</div>						
					</div>
				</div>
			</div>
			<aside id="sidebar-a" class="sidebar   col-md-3 col-md-jvoffset-12">
				<div class="sidebar-inner">
					<div class="jv-module module vm-filter">
						<div class="contentmod clearfix">
							<div class="custom">
								<div>
								<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
									<?php dynamic_sidebar( 'sidebar' ); ?>
								<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
					<?php if ( is_active_sidebar( 'top-sales' ) ) : ?>
						<?php dynamic_sidebar( 'top-sales' ); ?>
					<?php endif; ?>
				</div>
			</aside>
		</div>
	</div>
</section>
	

	

<?php get_footer( 'shop' ); ?>
