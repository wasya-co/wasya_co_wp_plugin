<?php
if (!defined('ABSPATH')) {
  exit;
}

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

    $this->add_control('hr', [ 'type' => \Elementor\Controls_Manager::DIVIDER, ] );

    $this->add_control('divider_icon', [
      'label' => esc_html__('Icon'),
      'type' => \Elementor\Controls_Manager::ICONS,
      'default' => [
        'value' => 'fas fa-circle',
        'library' => 'fa-solid',
      ],
    ] );

    $this->add_control('divider_width', [
      'label' => esc_html__('Divider Width'),
      'type' => \Elementor\Controls_Manager::NUMBER,
      'placeholder' => '50',
      'default' => 50,
    ] );

    $this->add_control('description', [
      'label' => esc_html__('Description'),
      'type' => \Elementor\Controls_Manager::WYSIWYG,
      'label_block' => true,
    ] );

    $this->end_controls_section();
    $this->start_controls_section('section_style', [
      'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    ] );

    $this->add_control('hr', [ 'type' => \Elementor\Controls_Manager::DIVIDER, ] );

    $this->add_control('title_options', [
      'label' => esc_html__('Title Options'),
      'type' => \Elementor\Controls_Manager::HEADING,
      'separator' => 'before',
    ] );

    $this->add_control('title_alignment', [
      'type' => \Elementor\Controls_Manager::CHOOSE,
      'label' => esc_html__('Title Alignment'),
      'options' => [
        'left' => [
          'title' => esc_html__('Left'),
          'icon' => 'eicon-text-align-left',
        ],
        'center' => [
          'title' => esc_html__('Center'),
          'icon' => 'eicon-text-align-center',
        ],
        'right' => [
          'title' => esc_html__('Right'),
          'icon' => 'eicon-text-align-right',
        ],
        'justify' => [
          'title' => esc_html__('Justify'),
          'icon' => 'eicon-text-align-justify',
        ],
      ],
      'default' => 'left',
    ] );

    $this->add_control('title_color', [
      'label' => esc_html__('Title Color'),
      'type' => \Elementor\Controls_Manager::COLOR,
      'default' => '#515151',
      'selectors' => [
        '{{WRAPPER}} h3' => 'color: {{VALUE}}',
      ],
    ] );

    $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
      'name' => 'title_typography',
      'selector' => '{{WRAPPER}} h3',
    ] );

    $this->add_control('description_options', [
      'label' => esc_html__('Description Options'),
      'type' => \Elementor\Controls_Manager::HEADING,
      'separator' => 'before',
    ] );

    $this->add_control('description_alignment', [
      'type' => \Elementor\Controls_Manager::CHOOSE,
      'label' => esc_html__('Description Alignment'),
      'options' => [
        'left' => [
          'title' => esc_html__('Left'),
          'icon' => 'eicon-text-align-left',
        ],
        'center' => [
          'title' => esc_html__('Center'),
          'icon' => 'eicon-text-align-center',
        ],
        'right' => [
          'title' => esc_html__('Right'),
          'icon' => 'eicon-text-align-right',
        ],
        'justify' => [
          'title' => esc_html__('Justify'),
          'icon' => 'eicon-text-align-justify',
        ],
      ],
      'default' => 'left',
    ] );

    $this->add_control('description_color', [
      'label' => esc_html__('Description Color'),
      'type' => \Elementor\Controls_Manager::COLOR,
      'default' => '#515151',
      'selectors' => [
        '{{WRAPPER}} p' => 'color: {{VALUE}}',
      ],
    ] );

    $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
      'name' => 'description_typography',
      'selector' => '{{WRAPPER}} p',
    ] );

    $this->end_controls_section();
  }

  protected function render() {
    $s = $this->get_settings_for_display();
?>
    <style>
      section.align-items-stretch .elementor-widget-CardWidget {
        height: 100%;
      }
      section.align-items-stretch .elementor-widget-container {
        height: 100%;
      }
      .CardWidget {
        box-shadow: 0 0 8px #888888;
        padding: 10px;
        height: 100%;
      }
      .CardWidget h3 {
        font-size: 1.5em;
      }
      .CardWidget .description {
        text-align: <?= $s['description_alignment'] ?>;
      }
    </style>
    <div class="CardWidget" >
      <div style="text-align: center;">
        <img src="<?= $s['image']['url'] ?>" alt="" />
      </div>
      <div style="margin-top: 10px;"></div>
      <h3 style="text-align: <?= $s['title_alignment'] ?>;"><?= $s['title'] ?></h3>
      <div style="margin-top: 10px;"></div>
      <div style="text-align: center; align-items: center;">
        <span style="display: inline-block; width: <?= $s['divider_width'] ?>px; border-bottom: 2px solid #CDCDCD; margin: 5px"></span>
        <?php \Elementor\Icons_Manager::render_icon($s['divider_icon'], ['aria-hidden' => 'true']); ?>
        <span style="display: inline-block; width: <?= $s['divider_width'] ?>px; border-bottom: 2px solid #CDCDCD; margin: 5px"></span>
      </div>
      <div style="margin-top: 10px;"></div>
      <div class='description'><?= $s['description'] ?></div>
    </div>
<?php
  }

}
