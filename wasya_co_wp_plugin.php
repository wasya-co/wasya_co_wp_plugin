<?
/**
 * Plugin Name:       Wasya Co Wp Plugin
 * Version:           0.1.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 **/

if (!defined('ABSPATH')) {
  exit;
}

function wco_init() {
  if (!function_exists('get_plugin_data')) {
    require_once(ABSPATH . 'wp-admin/includes/plugin.php');
  }
  $plugin_data = get_plugin_data(__FILE__);

  wp_register_style('wasya_co_wp_plugin_style', plugins_url('style.css', __FILE__), false, $plugin_data['Version'], 'all');
  wp_enqueue_style('wasya_co_wp_plugin_style');
}
add_action( 'wp_enqueue_scripts', 'wco_init' );



function register_card_widget($widgets_manager) {
  require_once(__DIR__ . '/widgets/card_widget.php');
  $widgets_manager->register(new \CardWidget());
}
add_action('elementor/widgets/register', 'register_card_widget');



