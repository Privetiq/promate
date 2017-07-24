			<?php if ( is_active_sidebar( 'subscribe' ) ) : ?>
								
			<div id="subscribe-wrapper">
				<div class="container">
					<?php dynamic_sidebar( 'subscribe' ); ?>
				</div>
			</div>
				
			<?php endif; ?>
			<div class="footer-group">
				<!--Block bottomb-->
					<section id="block-bottomb">
						<div class="container">
							<div class="block blockequalize equal-column  row">
								<div class="col-md-3 col-sm-4 col-xs-6">
									<div class="position position-bottomb-4">
										<div class="jv-module">
											<div class="contentmod clearfix">
												<div class="logo-footer"><?php echo( promate_logo() ); ?>

                                                </div>
												<div class="contact-block-footer">
													<p><i class="fa fa-phone" aria-hidden="true"></i><?php echo get_theme_mod( "_phone");?></p>
													<p><i class="fa fa-envelope"></i><?php echo get_theme_mod( "_email");?></p>
												</div>
												
												<div class="socials">
													<?php if(get_theme_mod( "_facebook")):?>
														<a href="<?php echo esc_attr(get_theme_mod( "_facebook"));?>" target="_blank"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></a>
													<?php endif;?>
													<?php if(get_theme_mod( "_instagram")):?>
														<a href="<?php echo esc_attr(get_theme_mod( "_instagram"));?>" target="_blank"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
													<?php endif;?>
													<?php if(get_theme_mod( "_youtube")):?>
														<a href="<?php echo esc_attr(get_theme_mod( "_youtube"));?>" target="_blank"><i class="fa fa-youtube-play fa-2x" aria-hidden="true"></i></a>
													<?php endif;?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 col-sm-4 col-xs-6">
									<div class="position position-bottomb-1">
										<div class="jv-module module footer-myaccount">	
											<h3 class="title-module">
											<span>МОЙ АККАУНТ</span>
														</h3>
											<div class="contentmod clearfix">
												<?php
													// Primary navigation menu.
													wp_nav_menu( array( 
														'menu_class'     => 'menu',
														'theme_location' => 'footer_01',
														'link_before'    => '<span>',
														'link_after'     => '</span>',
													) );
												?>
											 </div>   
										</div>
									</div>
								</div>
								<div class="col-md-3 col-sm-4 col-xs-6">
									<div class="position position-bottomb-2">
										<div class="jv-module module footer-information">
											<h3 class="title-module">
											<span>ИНФОРМАЦИЯ</span>
														</h3>
											<div class="contentmod clearfix">
												<?php
													// Primary navigation menu.
													wp_nav_menu( array( 
														'menu_class'     => 'menu',
														'theme_location' => 'footer_02',
														'link_before'    => '<span>',
														'link_after'     => '</span>',
													) );
												?>
											</div>   
										</div>
									</div>
								</div>
								<div class="col-md-3 hidden-sm col-xs-6 insta">
									<div class="position position-bottomb-3">
										<div class="jv-module">
											<div id="instagram" class="contentmod clearfix">
												<div class="inst-wrap">
                                                    <?php echo do_shortcode("[instagram-feed sortby=random]")?>
                                                    <?php if(get_theme_mod( "_instagram")):?>
                                                        <h3 class="title-module">
                                                            <!--<span>--><?php //echo __('INSTAGRAM')?><!--</span>-->
                                                            <a class="like" href="<?php echo esc_attr(get_theme_mod( "_instagram"));?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/like.png"/></a>
                                                        </h3>
                                                    <?php endif;?>
													<!-- SnapWidget -->
<!--													<script src="https://snapwidget.com/js/snapwidget.js"></script>-->
<!--													<iframe src="https://snapwidget.com/embed/296797" class="snapwidget-widget" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:100%; "></iframe>-->
												</div>
											</div>   
										</div>
									</div>
								</div>								
							</div>
						</div>
					</section>
				<!--/Block bottomb-->
				<!--Block Footer-->
					<footer id="block-footer">
						<div class="container">
							<div class="position position-footer">								
								<div class="jv-module module footer-copyright ">
									<div class="contentmod clearfix">									
										<div class="custom text-center">
											<p>© 2016 Powered by <?php echo get_bloginfo('name');?>, All Rights Reserved.</p>
										</div>
									 </div>   
								</div>
							</div>
						</div>
					</footer>
				<!--/Block Footer-->
				</div>
			
				<a href="#top" id="scroll-top"></a>
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Форма заказа обратного звонка</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  </div>
					  <div class="modal-body">
						<?php echo do_shortcode('[contact-form-7 id="666" title="Обратный звонок"]');?>
					  </div>					 
					</div>
				  </div>
				</div>
				<div class="modal fade" id="is_not_stock_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Формление предзаказа</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  </div>
					  <div class="modal-body">
						<?php echo do_shortcode('[contact-form-7 id="10364" title="Предзаказ"]');?>
					  </div>					 
					</div>
				  </div>
				</div>
				<div class="modal fade" id="thank-you-page" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">					  
					  <div class="modal-body">
						Спасибо что обратились к нам.
					  </div>					 
					</div>
				  </div>
				</div>


            <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/variation.js" type="text/javascript"></script>

			<?php wp_footer(); ?>			
            </div>
        </div><!-- end of wrapper -->
    </body>
</html>