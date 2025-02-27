<?php

/**
 * Plexx Text Widget.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Elementor_Plexx_Text extends \Elementor\Widget_Base {


    public function get_name() {
        return 'plexx_text';
    }

    public function get_title() {
        return __( 'Plexx Text', 'themeworm' );
    }

    public function get_icon() {
        return 'eicon-text';
    }

    public function get_categories() {
        return [ 'plexx-elementor-category' ];
    }

    public function get_keywords() {
        return ['layout', 'text', 'paragraph', 'plexx', 'formatting', 'column'];
    }

    public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);
   }

    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Plexx Text Editor', 'themeworm' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
			'plexx_text',
			[
				'label' => __( 'Description', 'themeworm' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '<p>' . __( 'Default description', 'themeworm' ) . '</p>',
				'placeholder' => __( 'Type your description here', 'themeworm' ),
			]
		);

    $this->add_control(
			'text_full_width',
			[
				'label' => __( 'Force Full Width', 'themeworm' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'themeworm' ),
				'label_off' => __( 'No', 'themeworm' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

    $this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Plexx Text Editor', 'themeworm' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

    $this->add_responsive_control(
			'text_align',
			[
				'label' => __( 'Alignment', 'themeworm' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'themeworm' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'themeworm' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'themeworm' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'themeworm' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .plexx-text-editor' => 'text-align: {{VALUE}};',
				],
			]
		);

    $this->add_control(
			'text_color',
			[
				'label' => __( 'Text Color', 'themeworm' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}' => 'color: {{VALUE}};',
				],
        'global'        => [
          'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY
        ],
			]
		);

    $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
        'global' => [
          'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
         ],
			]
		);

    $text_columns = range( 1, 5 );
		$text_columns = array_combine( $text_columns, $text_columns );
		$text_columns[''] = __( 'Default', 'themeworm' );

		$this->add_responsive_control(
			'text_columns',
			[
				'label' => __( 'Columns', 'themeworm' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'separator' => 'before',
				'options' => $text_columns,
				'selectors' => [
					'{{WRAPPER}} .plexx-text-editor' => 'columns: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'text_column_gap',
			[
				'label' => __( 'Columns Gap', 'themeworm' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'vw' ],
				'range' => [
					'px' => [
						'max' => 100,
					],
					'%' => [
						'max' => 10,
						'step' => 0.1,
					],
					'vw' => [
						'max' => 10,
						'step' => 0.1,
					],
					'em' => [
						'max' => 10,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .plexx-text-editor' => 'column-gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

      $this->end_controls_section();

    }


    protected function render() {
      $settings = $this->get_settings_for_display();
  		$editor_content = $this->get_settings_for_display( 'plexx_text' );

  		$editor_content = $this->parse_text_editor( $editor_content );

  		$this->add_render_attribute( 'plexx_text', 'class', [ 'plexx-text-editor', 'elementor-clearfix' ] );

      if ("yes" === $settings['text_full_width']) {
        $this->add_render_attribute( 'plexx_text', 'class', [ 'plexx-text-editor', 'force-full-width' ] );
      }

  		$this->add_inline_editing_attributes( 'plexx_text', 'advanced' );
  		?>
  		<div <?php echo $this->get_render_attribute_string( 'plexx_text' ); ?>><?php echo $editor_content; ?></div>
  		<?php
  	}

    public function render_plain_content() {
      echo $this->get_settings( 'plexx_text' );
    }

  protected function content_template() {
    ?>
    <#
    view.addRenderAttribute( 'plexx_text', 'class', [ 'plexx-text-editor', 'elementor-clearfix' ] );

    if ("yes" === settings.text_full_width) {
      view.addRenderAttribute( 'plexx_text', 'class', [ 'plexx-text-editor', 'force-full-width' ] );
    }

    view.addInlineEditingAttributes( 'plexx_text', 'advanced' );
    #>
    <div {{{ view.getRenderAttributeString( 'plexx_text' ) }}}>{{{ settings.plexx_text }}}</div>
    <?php
  }

}
