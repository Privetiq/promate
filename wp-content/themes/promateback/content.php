<div class="item column-1" itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">	
	<div class="k2item">
		<div class="k2item-date text-center">
			<div class="k2item-date-inner">				
				<span><?php the_date('d')?></span>
				<?php echo promate_get_month(date('n'));?>				
			</div>
		</div>
		<div class="k2item-body">
			<div class="k2item-image">
				<?php the_post_thumbnail(array(848,450));?>
			</div>
			<h2 class="k2item-title">
				<a href="<?php echo esc_url( get_permalink()); ?>"><?php the_title(); ?></a>
			</h2>
			<div class="k2item-meta clearfix">
				<div class="k2item-meta-more">
					<div class="k2item-meta-item">
						<i class="fa fa-folder-o"></i>
						<?php 
							echo get_the_category_list( ', '); 
						?>
					</div>
				</div>				
			</div>
			<div class="item-intro-text">
				<?php the_content('Подробнее...'); ?>
			</div>
		</div>
	</div>
</div>