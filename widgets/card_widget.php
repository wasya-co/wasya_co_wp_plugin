<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Wasyo_Image_Card extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve wasyo card widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'wasyo_card';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Wasyo-Card widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Wasyo Card', 'elementor-Wasyo-Card-widget');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-footer';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url()
	{
		return 'https://www.fiverr.com/imruwan/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories()
	{
		return ['general'];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords()
	{
		return ['wasyo', 'image', 'card', 'custom'];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls()
	{

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__('Content', 'wasyo-image-card'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'card_image',
			[
				'label' => esc_html__('Choose Image', 'wasyo-image-card'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'space_one',
			[
				'label' => esc_html__('Devider space', 'wasyo-image-card'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'placeholder' => '10',
				'default' => 10,
			]
		);

		$this->add_control(
			'card_title',
			[
				'label' => esc_html__('Card Title', 'wasyo-image-card'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__('Add your title here', 'wasyo-image-card'),
			]
		);

		$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'space_two',
			[
				'label' => esc_html__('Devider space', 'wasyo-image-card'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'placeholder' => '10',
				'default' => 10,
			]
		);

		$this->add_control(
			'divider_icon',
			[
				'label' => esc_html__('Icon', 'wasyo-image-card'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'circle',
						'dot-circle',
						'square-full',
					],
					'fa-regular' => [
						'circle',
						'dot-circle',
						'square-full',
					],
				],
			]
		);

		$this->add_control(
			'divider_line_width',
			[
				'label' => esc_html__('Devider Line Width', 'wasyo-image-card'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'placeholder' => '50',
				'default' => 50,
			]
		);


		$this->add_control(
			'space_three',
			[
				'label' => esc_html__('Devider space', 'wasyo-image-card'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'placeholder' => '10',
				'default' => 10,
			]
		);

		$this->add_control(
			'card_description',
			[
				'label' => esc_html__('Card Description', 'wasyo-image-card'),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'label_block' => true,
				'placeholder' => esc_html__('Add your description here', 'wasyo-image-card'),
			]
		);

		$this->end_controls_section();



		// Style controls
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__('Style', 'wasyo-image-card'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Code for style options goes here
		// Title Opetions

		$this->add_control(
			'card_height',
			[
				'label' => esc_html__('Card Height', 'wasyo-image-card'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'placeholder' => '300',
				'default' => 300,
			]
		);

		$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'image_max_height',
			[
				'label' => esc_html__('Image Max Height', 'wasyo-image-card'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'placeholder' => '300',
				'default' => 300,
			]
		);

		$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'title_options',
			[
				'label' => esc_html__('Title Options', 'wasyo-image-card'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'title_alignment',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__('Alignment', 'wasyo-image-card'),
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'wasyo-image-card'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'wasyo-image-card'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'wasyo-image-card'),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__('Justify', 'wasyo-image-card'),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => 'left',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Color', 'wasyo-image-card'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#515151',
				'selectors' => [
					'{{WRAPPER}} h3' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} h3',
			]
		);


		// Description Opetions
		$this->add_control(
			'description_options',
			[
				'label' => esc_html__('Description Options', 'wasyo-image-card'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'description_alignment',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__('Alignment', 'wasyo-image-card'),
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'wasyo-image-card'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'wasyo-image-card'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'wasyo-image-card'),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__('Justify', 'wasyo-image-card'),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => 'left',
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => esc_html__('Color', 'wasyo-image-card'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#515151',
				'selectors' => [
					'{{WRAPPER}} p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} p',
			]
		);


		$this->end_controls_section();
	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render()
	{

		// Get input from the widget settings
		$settings = $this->get_settings_for_display();

		// Get individual values from the input
		$card_height = ($settings['card_height']);
		$card_image = ($settings['card_image']['url']);
		$card_image_max_height = ($settings['image_max_height']);
		$divider_line_width = ($settings['divider_line_width']);
		$card_title = ($settings['card_title']);
		$title_alignment =  ($settings['title_alignment']);
		$card_description = ($settings['card_description']);
		$description_alignment =  ($settings['description_alignment']);

		$space_one =  ($settings['space_one']);
		$space_two =  ($settings['space_two']);
		$space_three =  ($settings['space_three']);

?>

		<!-- BEGIN: Rendering the output -->
		<div class="card" style="height: <?php echo $card_height ?>px;">
			<div style="text-align: center;">
				<img style="max-height: <?php echo $card_image_max_height ?>px;" src="<?php echo $card_image ?>" alt="Card Image">
			</div>
			<div style="margin-top: <?php echo $space_one ?>px;"></div>
			<h3 class="card_title" style="text-align: <?php echo $title_alignment ?>;"><?php echo $card_title ?></h3>
			<div style="margin-top: <?php echo $space_two ?>px;"></div>
			<div class="my-icon-wrapper" style="text-align: center; align-items:center;">
				<span style="display:inline-block; width: <?php echo $divider_line_width ?>px;  border-bottom: 2px solid #CDCDCD; margin: 5px"></span>
				<?php \Elementor\Icons_Manager::render_icon($settings['divider_icon'], ['aria-hidden' => 'true']); ?>
				<span style="display:inline-block; width: <?php echo $divider_line_width ?>px;  border-bottom: 2px solid #CDCDCD; margin: 5px"></span>
			</div>
			<div style="margin-top: <?php echo $space_three ?>px;"></div>
			<h3 class="card_description" style="text-align: <?php echo $description_alignment ?>;"><?php echo $card_description ?></h3>
		</div>

<?php

	}
}
