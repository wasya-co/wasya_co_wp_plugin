<?php

/**
 * Plugin Name:       Wasya Co Wp Plugin
 * Description:       Custom image card for services
 * Version:           0.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Ruwan Bandara
 * Author URI:        https://www.fiverr.com/imruwan
 */

if (!defined('ABSPATH')){
    exit;
}

/**
 * Register Wasyo_Image_Card Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_card_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/card_widget.php' );

	$widgets_manager->register( new \Image_Card() );

}
add_action( 'elementor/widgets/register', 'register_card_widget' );