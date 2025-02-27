<?php

/**
 * Plexx Heading Widget.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Elementor_Plexx_Heading extends \Elementor\Widget_Base {


    public function get_name() {
        return 'plexx_heading';
    }

    public function get_title() {
        return __( 'Plexx Heading', 'themeworm' );
    }

    public function get_icon() {
        return 'eicon-editor-h1';
    }

    public function get_categories() {
        return [ 'plexx-elementor-category' ];
    }

    public function get_keywords() {
        return ['text', 'title', 'plexx', 'formatting', 'heading', 'color'];
    }

    public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);
    }

    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Heading Settings', 'themeworm' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


    $this->add_control(
			'heading_text',
      [
          'label'         => __('Title', 'themeworm'),
          'type'          => \Elementor\Controls_Manager::TEXT,
          'default'       => __('Title Here','themeworm'),
          'label_block'   => true,
          'dynamic'       => [ 'active' => true ]
      ]
		);


    $this->add_control(
			'heading_link',
			[
				'label' => __( 'Link', 'themeworm' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'Paste your link here if needed', 'themeworm' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
				],
			]
		);



		$this->add_control(
			'heading_size',
			[
				'label' => __( 'Size', 'themeworm' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'small'  => __( 'Small', 'themeworm' ),
					'default' => __( 'Default', 'themeworm' ),
					'large' => __( 'Large', 'themeworm' ),
					'xl' => __( 'Extra Large', 'themeworm' ),

				],
			]
		);

		$this->add_control(
			'heading_tag',
			[
				'label' => __( 'HTML Tag', 'themeworm' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'h2',
				'options' => [
					'h1'  => __( 'H1', 'themeworm' ),
					'h2' => __( 'H2', 'themeworm' ),
					'h3' => __( 'H3', 'themeworm' ),
					'h4' => __( 'H4', 'themeworm' ),
					'h5' => __( 'H5', 'themeworm' ),
					'h6' => __( 'H6', 'themeworm' ),
				],
			]
		);

    $this->add_control(
			'heading_align',
			[
				'label' => __( 'Alignment', 'themeworm' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'themeworm' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'themeworm' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'themeworm' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'left',
				'toggle' => false,
        'selectors'     => [
            '{{WRAPPER}} .plexx-title-header' => 'text-align: {{VALUE}};',
        ]
			]
		);

    $this->add_control(
      'heading_full_width',
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
      'section_title_style',
      [
        'label' => __( 'Title Style', 'themeworm' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control('plexx_title_color',
        [
            'label'         => __('Color', 'themeworm'),
            'type'          => \Elementor\Controls_Manager::COLOR,
            'global'        => [
              'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY
            ],
            'selectors'     => [
                '{{WRAPPER}} h1.plexx-title-header, {{WRAPPER}} h2.plexx-title-header, {{WRAPPER}} h3.plexx-title-header, {{WRAPPER}} h4.plexx-title-header, {{WRAPPER}} h5.plexx-title-header, {{WRAPPER}} h6.plexx-title-header' => 'color: {{VALUE}};',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name'          => 'title_typography',
            'global' => [
              'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
             ],
            'selector'      => '{{WRAPPER}} .plexx-title-header',
        ]
    );

      $this->end_controls_section();

    }




    protected function render() {

      $settings = $this->get_settings_for_display();

      $this->add_inline_editing_attributes('heading_text', 'none');

      $this->add_render_attribute('heading_text', 'class', 'plexx-title-text');

      $allowed_tags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
      $title_tag = in_array($settings['heading_tag'], $allowed_tags) ? $settings['heading_tag'] : 'h1';

      $selected_style = $settings['heading_size'];

      $this->add_render_attribute( 'title', 'class', [ 'plexx-title-header', 'plexx-title-' . $selected_style ] );

      if ("yes" === $settings['heading_full_width']) {

        $this->add_render_attribute( 'title', 'class', [ 'plexx-title-header', 'force-full-width' ] );

      }


      if( !empty( $settings['heading_link']['url'] )) {

          $link = $settings['heading_link']['url'];

          $this->add_render_attribute( 'link', 'href', esc_url($link) );

          if( ! empty( $settings['heading_link']['is_external'] ) ) {
              $this->add_render_attribute( 'link', 'target', "_blank" );
          }

          if( ! empty( $settings['heading_link']['nofollow'] ) ) {
              $this->add_render_attribute( 'link', 'rel',  "nofollow" );
          }
      }

  ?>

      <<?php echo $title_tag . ' ' . $this->get_render_attribute_string('title') ; ?>>

          <?php if( !empty( $settings['heading_link']['url'] ) ) { ?>
              <a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
          <?php } ?>

          <?php echo esc_html( $settings['heading_text'] ); ?>

          <?php if( !empty( $settings['heading_link']['url'] ) ) { ?>
            </a>
        <?php } ?>

      </<?php echo $title_tag; ?>>

<?php
  }


  protected function content_template() {
		?>

    <#

        view.addInlineEditingAttributes('heading_text', 'none');

        view.addRenderAttribute('heading_text', 'class', 'plexx-title-text');

        var titleTag = settings.heading_tag,

        selectedStyle = settings.heading_size,

        titleText = settings.heading_text;

        view.addRenderAttribute( 'plexx_heading', 'class', [ 'plexx-title-header', 'plexx-title-' + selectedStyle ] );

        if ("yes" === settings.heading_full_width) {

          view.addRenderAttribute( 'plexx_heading', 'class', [ 'plexx-title-header', 'force-full-width' ] );

        }

        var link = settings.heading_link.url ? settings.heading_link.url : false;

        view.addRenderAttribute( 'link', 'href', link );

    #>

        <{{{titleTag}}} {{{view.getRenderAttributeString('plexx_heading')}}}>

        <# if( settings.heading_link.url ) { #>
            <a {{{ view.getRenderAttributeString('link') }}}>
        <# } #>

            {{{ titleText }}}

            <# if( settings.heading_link.url ) { #>
                </a>
            <# } #>
        </{{{titleTag}}}>

		<?php
	}


}
