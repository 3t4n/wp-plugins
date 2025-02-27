<?php

/**
 * Plexx Button Widget.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Elementor_Plexx_Button extends \Elementor\Widget_Base {

    public function get_name() {
        return 'plexx_button';
    }

    public function get_title() {
        return __( 'Plexx Button', 'themeworm' );
    }

    public function get_icon() {
        return 'eicon-button';
    }

    public function get_categories() {
        return [ 'plexx-elementor-category' ];
    }

    public function get_keywords() {
        return ['text', 'plexx', 'button', 'action', 'link'];
    }

    public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);
    }


    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Plexx Button', 'themeworm' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
          'button_text',
          [
              'label'         => __('Button Title', 'themeworm'),
              'type'          => \Elementor\Controls_Manager::TEXT,
              'default'       => __('Click me','themeworm'),
              'label_block'   => true,
              'dynamic'       => [ 'active' => true ]
          ]
        );

        $this->add_control(
    			'button_link',
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
    			'button_position',
    			[
    				'label' => __( 'Position', 'themeworm' ),
    				'type' => \Elementor\Controls_Manager::SELECT,
    				'default' => 'left',
    				'options' => [
    					'left'  => __( 'Left', 'themeworm' ),
    					'center' => __( 'Center', 'themeworm' ),
    					'right' => __( 'Right', 'themeworm' ),

    				],
    			]
    		);

      $this->add_control(
  			'button_full_width',
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
          'label' => __( 'Button', 'themeworm' ),
          'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
      );

      $this->add_control('button_title_color',
          [
              'label'         => __('Text Color', 'themeworm'),
              'type'          => \Elementor\Controls_Manager::COLOR,
              'global'        => [
                'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY
              ],
              'selectors'     => [
                  '{{WRAPPER}} .plexx-button' => 'color: {{VALUE}};',
              ],
          ]
      );

      $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
              'name'          => 'button_typography',
              'global' => [
                'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
               ],
              'selector'      => '{{WRAPPER}} .plexx-button',
          ]
      );


      $this->add_control('button_border_color',
          [
              'label'         => __('Border Color', 'themeworm'),
              'type'          => \Elementor\Controls_Manager::COLOR,
              'global'        => [
                'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY
              ],
              'selectors'     => [
                  '{{WRAPPER}} .plexx-button' => 'border-color: {{VALUE}};',
              ],
          ]
      );

      $this->end_controls_section();

    }

    protected function render() {

      $settings = $this->get_settings_for_display();

      $this->add_inline_editing_attributes('button_text', 'none');

      $this->add_render_attribute('button_text', 'class', 'plexx-button');

      $selected_style = $settings['button_position'];

      $this->add_render_attribute( 'plexx_button', 'class', [ 'plexx-button' ] );

      $this->add_render_attribute( 'plexx_container', 'class', [ 'plexx-button-container', 'plexx-button-container-' . esc_attr($selected_style) ] );

      if ("yes" === $settings['button_full_width']) {

        $this->add_render_attribute( 'plexx_container', 'class', [ 'plexx-button-container', 'force-full-width' ] );

      }


      if ( !empty( $settings['button_link']['url'] )) {

          $link = $settings['button_link']['url'];

          $this->add_render_attribute( 'link', 'href', esc_url($link) );

          if ( ! empty( $settings['button_link']['is_external'] ) ) {
              $this->add_render_attribute( 'link', 'target', "_blank" );
          }

          if ( ! empty( $settings['button_link']['nofollow'] ) ) {
              $this->add_render_attribute( 'link', 'rel',  "nofollow" );
          }
      } ?>

      <div <?php echo $this->get_render_attribute_string('plexx_container') ; ?>>
          <div <?php echo $this->get_render_attribute_string('plexx_button') ; ?>>

            <?php if ( !empty( $settings['button_link']['url'] ) ) { ?>
                <a <?php echo $this->get_render_attribute_string( 'link' ); ?>></a>
            <?php } ?>
            <?php echo esc_html( $settings['button_text'] ); ?>

          </div>
        </div>
    <?php	}


    protected function content_template() { ?>
      <#

          view.addInlineEditingAttributes('button_text', 'none');

          view.addRenderAttribute('button_text', 'class', 'plexx-button');

          selectedStyle = settings.button_position,

          titleText = settings.button_text;

          view.addRenderAttribute( 'plexx_button', 'class', [ 'plexx-button' ] );

          view.addRenderAttribute( 'plexx_container', 'class', [ 'plexx-button-container', 'plexx-button-container-' + selectedStyle ] );

          if ("yes" === settings.button_full_width) {

            view.addRenderAttribute( 'plexx_button', 'class', [ 'plexx-button-container', 'force-full-width' ] );

          }

          var link = settings.button_link.url ? settings.button_link.url : false;

          view.addRenderAttribute( 'link', 'href', link );

      #>
      <div {{{view.getRenderAttributeString('plexx_container')}}}>
          <div {{{view.getRenderAttributeString('plexx_button')}}}>

          <# if( settings.button_link.url ) { #>
              <a {{{ view.getRenderAttributeString('link') }}}></a>
          <# } #>

              {{{ titleText }}}

          </div>
        </div>
    <?php }


}
