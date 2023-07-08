<?
/**
 * Plugin Name:       Wasya Co Wp Plugin
 *
 *                    Good for 2023-01-07:
 * Version:           0.1.7
 * Requires at least: 5.2
 * Requires PHP:      7.2
 **/

if (!defined('ABSPATH')) {
  exit;
}

function wco_assets() {
  if (!function_exists('get_plugin_data')) {
    require_once(ABSPATH . 'wp-admin/includes/plugin.php');
  }
  $plugin_data = get_plugin_data(__FILE__);

  wp_register_style('wasya_co_wp_plugin_style', plugins_url('style.css', __FILE__), false, $plugin_data['Version'], 'all');
  wp_enqueue_style('wasya_co_wp_plugin_style');

  wp_enqueue_script('wasya_co_wp_plugin_js',
    plugins_url('scripts.js', __FILE__),
    array('jquery'),
    wp_get_theme()->get( 'Version' ),
    true // in footer
  );
}
add_action( 'wp_enqueue_scripts', 'wco_assets' );


function wco_init() {
  // add_rewrite_tag( '%pagename%', '([^&]+)' );
  // add_rewrite_rule( '^book/book-author/([^/]*)/?', 'index.php?post_type=book&book-author=$matches[1]','top' );

  // $utm_campaign = $_GET['utm_campaign']; // eg spring_sale
  // $utm_content  = $_GET['utm_content'];  // What was clicked? eg logolink or textlink
  // $utm_medium   = $_GET['utm_medium'];   // eg cpc = cost per click
  // $utm_source   = $_GET['utm_source'];   // eg google
  // $utm_term     = $_GET['utm_term'];     // eg running+shoes

  // add_rewrite_rule( '^pages/([^/]*)/?', 'index.php?pagename=$matches[1]&'+$_SERVER['QUERY_STRING'], 'top' );
  // add_rewrite_rule( '^pages/([^/]*)/?', 'index.php?pagename=$matches[1]&', 'top' );

  // flush_rewrite_rules(true);
}
add_action('init', 'wco_init', 10, 0);

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
function card3d_uiux_20230107_shortcode() { ?>
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
<? }
add_shortcode('card3d_uiux_20230107', 'card3d_uiux_20230107_shortcode');





function under_construction_20230107_shortcode() {

  //   <div class="wco-logo-column">
  //   <img width="259" height="66" src="https://d15g8hc4183yn4.cloudfront.net/wp-content/uploads/2022/09/29185755/259x66-WasyaCo-Logo-YellowShadow.png" class="attachment-full size-full" alt="" loading="lazy" style="width:100%;height:25.48%;max-width:259px">
  //   <div class="wco-divider">
  //     <span class="wco-divider-separator">
  //     <div class="wco-icon">
  //       <i aria-hidden="true" class="fas fa-leaf"></i>
  //     </div>
  //     </span>
  //   </div>
  //   <div>
  //     Est. 2013
  //   </div>
  // </div>

  ?>
  <section class="UnderConstruction20230107">

    <div class="W0_20230107">
      <!-- <p>Wasya Co is a software development consultancy
        for small and medium Enterprises. We offer innovative technical solutions
        to complex and domain-specific business needs.</p> -->
      <div class="the-dude"></div>
    </div>

    <div class="the-floor"></div>
  </section>
  <?
}
add_shortcode('under_construction_20230107', 'under_construction_20230107_shortcode');


function issue_navigator_widget() {
  ?>
  <section class='issue-navigator' >
    <div class='max-width'>
      <div class='p1'>
        <a href='/2023q3-issue'>Issue 2023Q3</a>
      </div>
      <div class='p2 past-issues'>
        <? /* @TODO: This can be a dynamic menu. _vp_ 2023-05-05 */ ?>
        Past Issues: <a href='/issues/2023q3-issue-2'>Issue 2023Q3 (2)</a>, <a href='/issues'>All Issues</a>
      </div>
    </div>
  </section>
  <div class='divider'></div>
  <?
}
add_shortcode('issue_navigator', 'issue_navigator_widget');

/*
 * Card3d marketing
 * _vp_ 2023-01-07
**/
function card3d_marketing_20230107_shortcode($raw_attrs) {
  $attrs = shortcode_atts( array(
    'title' => 'Some Title',
    'icon' => 'lightbulb',
    'body' => '<p>Hello, <b>world</b>!</p>',
    'imgurl' => 'https://d15g8hc4183yn4.cloudfront.net/wp-content/uploads/2023/01/07182225/300x230_marketing.jpeg',
  ), $raw_attrs );
  ?>

  <div class="Card3d-Marketing-20230107">
    <div class="grid">
      <div class="text-component">
        <h1><?= $attrs['title']; ?></h1>
        <div class="W2">
          <span></span>
          <i aria-hidden="true" class="far fa-<?= $attrs['icon']; ?>"></i>
          <span></span>
        </div>
        <?= $attrs['body']; ?>
      </div>

      <div class="td-figure" >
        <img style="width: 300px" src="<?= $attrs['imgurl']; ?>" alt="" />
      </div>
    </div>
  </div>

  <?
}
add_shortcode('card3d_marketing_20230107', 'card3d_marketing_20230107_shortcode');


/**
 * [category_widget slug='interviewing' n_posts=5 ]
 * 2022-05-09 _vp_
 * 2023-02-24 _vp_ moved from piousbox_wp_plugin
**/
function wco_category_widget( $raw_attrs ) {
  $attrs = shortcode_atts( array(
    'slug'       => 'tools',
    'n_posts'    => 1,
    'show_title' => "yes"
  ), $raw_attrs );
  $cat = get_category_by_slug( $attrs['slug'] );
  $cat_link = get_category_link( $cat->term_id );

  $title = '';
  if ($attrs['show_title'] == "yes") {
    $title = <<<EOT
      <div class='header'>
        <h1>
          <a href='${cat_link}'>{$cat->name}</a>
        </h1>
      </div><!--header-->
EOT;
  }

  $args = array(
    # 'offset'           => $attrs['idx'],
    # 'category'         => $cat->term_id, # and sub-cats
    'category__in' => [ $cat->term_id ], # only the parent cat
    'orderby'          => 'post_date',
    'order'            => 'DESC',
    'post_type'        => 'post',
    'post_status'      => 'publish',
    'suppress_filters' => true
  );

  if ($attrs['n_posts'] != '0') {
    $args['numberposts'] = $attrs['n_posts'];
  }

  $recent_posts = wp_get_recent_posts( $args, ARRAY_A );

  $postsRendered = '';
  foreach ($recent_posts as &$post) {

    // $author   = get_the_author_meta('display_name', $post->author);
    // $date     = substr($post['post_date'], 0, 10);
    // $meta = "<div class='meta' >By $author on {$date}</div>";

    $subtitle = new WP_Subtitle( $post['ID'] );
    $subtitle = $subtitle->get_subtitle();
    $post_link = get_permalink( $post['ID'] );

    $tmp = <<<EOT
    <li >
      <h3><a href="$post_link">{$post['post_title']}</a></h3>
      <div class="description"><a href="$post_link">$subtitle</a></div>
    </li>
EOT;
    $postsRendered = "$postsRendered$tmp";
  }

  $out = "<div class='WcoCategoryWidget' >{$title}<ol>{$postsRendered}</ol></div>";

  return $out;
}
add_shortcode( 'category_widget', 'wco_category_widget' );

