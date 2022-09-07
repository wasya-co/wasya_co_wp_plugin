<?php

/**
 * Plugin Name:       Wasya Co Wp Plugin
 * Version:           0.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
**/

if (!defined('ABSPATH')){
    exit;
}

function register_card_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/card_widget.php' );

	$widgets_manager->register( new \CardWidget() );

}
add_action( 'elementor/widgets/register', 'register_card_widget' );