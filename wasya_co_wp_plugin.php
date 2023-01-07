<?
/**
 * Plugin Name:       Wasya Co Wp Plugin
 * Version:           0.1.2
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


/*
 * Card3d
 * This will not be used - I should register it as an elementor widget, instead.
 * _vp_ 2023-01-07
 */
function card3d_uiux_20230107_shortcode() {
?>
  <div class="Card3d-20230107" id="Card3d_uiux_20230107" >
    <div class="cover">
      <h1>UI/UX</h1>
      <span class="price">&gt;&gt;&gt;</span>
      <div class="card-back">
        <!-- <a href="/w/services/uiux">Read More</a> -->
        <p>Modern software tools are expected to be highly usable, to the degree of not requiring documentation. The user interface should be self-explanatory, and the user experience intuitive.</p>
      </div>
    </div>
  </div>
<?
}
add_shortcode('card3d_uiux_20230107', 'card3d_uiux_20230107_shortcode');

