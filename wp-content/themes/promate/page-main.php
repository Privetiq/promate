<?php
/* Template Name: Main */
get_header(); ?>
<div id="main-content">
    <section id="block-main">

        <div class="container">

            <h2 class="title-module"><span>Топ продаж</span></h2>
            <div class="best_sell_prod"><?php echo do_shortcode('[best_selling_products per_page="8"]'); ?></div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-12"><h2 class="title-module">Promate - инновации мира гаджетов</h2>
                    <p>Мы инновационная компания по созданию высокотехнологичных, стильных и динамичных аксессуаров для телефонов и гаджетов. Имея такие аксессуары можно с легкостью выделяться среди других и быть всегда в тренде. В ассортименте оригинальные аксессуары для телефонов, гаджетов, планшетов, автомобилей и даже мотоциклов разработанных с учетом последних достижений науки и техники. Такие новаторские решения на рынке периферийных устройств будут всегда актуальны, так как с ними непросто удобно и комфортно, но еще и «модно»</p>
                    <p class="tar"><a href="<?php get_home_url()?>o-kompanii">Подробнее</a></p></div>
                    <div class="col-lg-3 col-md-3 hidden-sm"><img src="http://promate.ua/wp-content/uploads/2016/10/icons-promate.jpg" class="attachment_img_main" alt="icons-promate"></div>
                </div>
                <div class="row">

                </div>
            </div>

            <div class="best_sell_prod"><?php echo do_shortcode('[vc_slider_top]'); ?></div>
            <div class="best_sell_prod"><?php echo do_shortcode('[vc_slider_partners]'); ?></div>

            <?php //echo do_shortcode('[bartag]'); ?>

        </div><!-- .site-main -->
    </section><!-- .content-area -->
</div>
<?php get_footer(); ?>
