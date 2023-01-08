<?
/**
 * Plugin Name:       Wasya Co Wp Plugin
 *
 *                    Good for 2023-01-07:
 * Version:           0.1.6
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

function under_construction_20230107_shortcode() {
?>
<section class="UnderConstruction20230107">
  <div class="W0_20230107">
    <p>Hello! We are very much under construction -<br />please be patient!</p>
    <div class="the-dude"></div>

  </div>
  <div class="the-floor"></div>
</section>
<?
}
add_shortcode('under_construction_20230107', 'under_construction_20230107_shortcode');

/*
 * Card3d marketing
 * _vp_ 2023-01-07
**/
function card3d_marketing_20230107_shortcode() {
  ?>

<div class="Card3d-Marketing-20230107">
  <div class="grid">
    <div class="text-component">
      <h1>Marketing</h1>
      <div class="W2">
        <span></span>
        <i aria-hidden="true" class="far fa-lightbulb"></i>        <span></span>
      </div>
      <p>Generating leads and business opportunities is as important as delivering a product or service.</p>
      <p>We offer the lightest solution to improve IRR and the bottom line.</p>
    </div>

    <div class="td-figure" id="this_id" >
      <img style="width: 300px"
        src="https://d15g8hc4183yn4.cloudfront.net/wp-content/uploads/2023/01/07182225/300x230_marketing.jpeg"
        alt="Image description" />
    </div>
  </div>
</div>

<script>
window.addEventListener('load', (event) => {
(function() {

$("#this_id").mousemove(function(e) {
  const w = 400
  const h = 320
  const maxDeg = 90
  const maxZDeg = 10

  var parentOffset = $(this).offset()
  //or $(this).offset() if you really just want the current element's offset
  var relX = e.pageX - parentOffset.left - w/2
  var relY = e.pageY - parentOffset.top - h/2
  let relYpc = relY/h/2 // rel Y Percent
  let relXpc = relX/w/2 // rel X Percent
  let relZpc = relX > 0 ? relXpc+relYpc : relXpc-relYpc

  // logg(relXpc, 'rel x pc')
  // logg(relYpc, 'rel y pc')
  // logg(relZpc, 'rel z pc')

  // $(".td-figure img").css('transform', 'rotate(0)')
  $(".td-figure img").css('transform', `rotateX(${maxDeg*relYpc}deg) rotateY(${-maxDeg*relXpc}deg) rotateZ(${maxZDeg*relZpc}deg)`)

})

$("#this_id").mouseout(function(e) {
  // $(".td-figure img").css('transform', 'rotateX(10deg) rotateY(-18deg) rotateZ(3deg)')
})

})() // anon exec
}) //load
</script>
  <?
}
add_shortcode('card3d_marketing_20230107', 'card3d_marketing_20230107_shortcode');


