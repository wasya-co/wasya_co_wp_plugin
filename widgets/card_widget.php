<?php
if (!defined('ABSPATH')) {
  exit;
}

/**
 * 0.0.0 - 202211   - it worked fine
 * 0.0.1 - 20221205 - removed most styling, typography
**/
class CardWidget extends \Elementor\Widget_Base {

  public function get_name() {
    return 'CardWidget';
  }

  public function get_title() {
    return esc_html__('Card Widget');
  }

  public function get_icon() {
    return 'eicon-footer';
  }

  public function get_custom_help_url() {
    return 'https://wasya.co/contact-us';
  }

  public function get_categories() {
    return ['general'];
  }

  public function get_keywords() {
    return ['image', 'card'];
  }

  /**
   * Add input fields to allow the user to customize the widget settings.
  **/
  protected function register_controls() {

    $this->start_controls_section('content', [
      'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
    ] );

    $this->add_control('image', [
      'label' => esc_html__('Image'),
      'type' => \Elementor\Controls_Manager::MEDIA,
      'default' => [
        'url' => \Elementor\Utils::get_placeholder_image_src(),
      ],
    ] );

    $this->add_control('title', [
      'label' => esc_html__('Title'),
      'type' => \Elementor\Controls_Manager::TEXT,
      'label_block' => true,
    ] );

    $this->add_control('divider_icon', [
      'label' => esc_html__('Icon'),
      'type' => \Elementor\Controls_Manager::ICONS,
      'default' => [
        'value' => 'fas fa-circle',
        'library' => 'fa-solid',
      ],
    ] );

    $this->add_control('description', [
      'label' => esc_html__('Description'),
      'type' => \Elementor\Controls_Manager::WYSIWYG,
      'label_block' => true,
    ] );

    $this->add_control('button_link', [
      'label' => esc_html__('Button Link'),
      'type' => \Elementor\Controls_Manager::TEXT,
      'label_block' => true,
    ] );

    $this->add_control('button_text', [
      'label' => esc_html__('Button Text'),
      'type' => \Elementor\Controls_Manager::TEXT,
      'label_block' => true,
      'default' => 'Read More',
    ] );

    $this->end_controls_section();
  }

  protected function render() {
    $s = $this->get_settings_for_display();
    ?>

    <div class="CardWidget" >
      <div class='W1'>
        <img src="<?= $s['image']['url'] ?>" alt="" />
      </div>
      <h1><?= $s['title'] ?></h1>
      <div class='W2'>
        <span></span>
        <?php \Elementor\Icons_Manager::render_icon($s['divider_icon'], ['aria-hidden' => 'true']); ?>
        <span></span>
      </div>
      <div class='description'><?= $s['description'] ?></div>
      <div class="W3 <?= empty($s['button_link']) ? 'hide' : '' ?>" >
        <a href="<?= $s['button_link'] ?>" class="elementor-button-link elementor-button" role="button">
          <span class="elementor-button-text"><?= $s['button_text'] ?></span>
        </a>
      </div>
    </div>
    <?
  }

}
