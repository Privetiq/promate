<?php

// Porto Portfolios
add_shortcode('porto_portfolios', 'porto_shortcode_portfolios');
add_action('vc_after_init', 'porto_load_portfolios_shortcode');

function porto_shortcode_portfolios($atts, $content = null) {
    ob_start();
    if ($template = porto_shortcode_template('porto_portfolios'))
        include $template;
    return ob_get_clean();
}

function porto_load_portfolios_shortcode() {
    $animation_type = porto_vc_animation_type();
    $animation_duration = porto_vc_animation_duration();
    $animation_delay = porto_vc_animation_delay();
    $custom_class = porto_vc_custom_class();

    vc_map( array(
        'name' => "Porto " . __('Portfolios', 'porto-shortcodes'),
        'base' => 'porto_portfolios',
        'category' => __('Porto', 'porto-shortcodes'),
        'icon' => 'porto_vc_portfolios',
        'weight' => - 50,
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __("Title", 'porto-shortcodes'),
                "param_name" => "title",
                "admin_label" => true
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Portfolio Layout", 'porto-shortcodes'),
                "param_name" => "portfolio_layout",
                'std' => 'timeline',
                "value" => porto_vc_commons('portfolio_layout'),
                "admin_label" => true
            ),
            array(
                "type" => "dropdown",
                "heading" => __("View Type", 'porto-shortcodes'),
                "param_name" => "view",
                'dependency' => Array('element' => 'portfolio_layout', 'value' => array( 'grid' )),
                'std' => 'classic',
                "value" => porto_vc_commons('portfolio_grid_view')
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Columns", 'porto-shortcodes'),
                "param_name" => "columns",
                'dependency' => Array('element' => 'portfolio_layout', 'value' => array( 'grid' )),
                'std' => '3',
                "value" => porto_vc_commons('portfolio_grid_columns')
            ),
            array(
                "type" => "textfield",
                "heading" => __("Category IDs", 'porto-shortcodes'),
                "description" => __("comma separated list of category ids", 'porto-shortcodes'),
                "param_name" => "cats",
                "admin_label" => true
            ),
            array(
                "type" => "textfield",
                "heading" => __("Portfolio IDs", 'porto-shortcodes'),
                "description" => __("comma separated list of portfolio ids", 'porto-shortcodes'),
                "param_name" => "post_in"
            ),
            array(
                "type" => "textfield",
                "heading" => __("Portfolios Count", 'porto-shortcodes'),
                "param_name" => "number",
                "value" => '8'
            ),
            array(
                'type' => 'checkbox',
                'heading' => __("Show Archive Link", 'porto-shortcodes'),
                'param_name' => 'view_more',
                'value' => array( __( 'Yes', 'js_composer' ) => 'yes' )
            ),
            array(
                'type' => 'checkbox',
                'heading' => __("Show Filter", 'porto-shortcodes'),
                'param_name' => 'filter',
                'value' => array( __( 'Yes', 'js_composer' ) => 'yes' )
            ),
            array(
                'type' => 'checkbox',
                'heading' => __("Show Pagination", 'porto-shortcodes'),
                'param_name' => 'pagination',
                'value' => array( __( 'Yes', 'js_composer' ) => 'yes' )
            ),
            $animation_type,
            $animation_duration,
            $animation_delay,
            $custom_class
        )
    ) );

    if (!class_exists('WPBakeryShortCode_Porto_Portfolios')) {
        class WPBakeryShortCode_Porto_Portfolios extends WPBakeryShortCode {
        }
    }
}