<?php 
namespace Info_Boxes_For_Elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// Infobox
class IBFE_Widget_Infobox2 extends Widget_Base {
 
   public function get_name() {
      return 'infobox2';
   }
 
   public function get_title() {
      return esc_html__( 'Infobox Two', 'info-boxes-for-elementor' );
   }
 
   public function get_icon() { 
        return 'eicon-facebook-comments';
   }
 
   public function get_categories() {
      return [ 'info-boxes' ];
   }
   protected function _register_controls() {

      $this->start_controls_section(
         'infobox_section',
         [
            'label' => esc_html__( 'Infobox', 'info-boxes-for-elementor' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
        'text_align',
        [
          'label' => __( 'Alignment', 'info-boxes-for-elementor' ),
          'type' => \Elementor\Controls_Manager::CHOOSE,
          'options' => [
            'left' => [
              'title' => __( 'Left', 'info-boxes-for-elementor' ),
              'icon' => 'fa fa-align-left',
            ],
            'center' => [
              'title' => __( 'Center', 'info-boxes-for-elementor' ),
              'icon' => 'fa fa-align-center',
            ],
            'right' => [
              'title' => __( 'Right', 'info-boxes-for-elementor' ),
              'icon' => 'fa fa-align-right',
            ],
          ],
          'default' => 'left',
          'toggle' => true,
        ]
      );

      $this->add_control(
        'icon_style',
        [
          'label' => __( 'Icon style', 'info-boxes-for-elementor' ),
          'type' => \Elementor\Controls_Manager::CHOOSE,
          'options' => [
            'fonticon' => [
              'title' => __( 'Font icon', 'info-boxes-for-elementor' ),
              'icon' => 'fa fa-icons',
            ],
            'imageicon' => [
              'title' => __( 'Image icon', 'info-boxes-for-elementor' ),
              'icon' => 'fa fa-images',
            ]
          ],
          'default' => 'fonticon',
          'toggle' => true
        ]
      );

      $this->add_control(
         'icon',
         [
            'label' => __( 'Icon', 'info-boxes-for-elementor' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
            'condition' => ['icon_style' => 'imageicon']
         ]     
      );

      $this->add_control(
         'font_icon',
         [
            'label' => __( 'Font Icon', 'info-boxes-for-elementor' ),
            'type' => \Elementor\Controls_Manager::ICON,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
            'condition' => ['icon_style' => 'fonticon'],
            'default' => 'fa fa-address-card-o'
         ]     
      );

      $this->add_control(
        'font_color',
        [
          'label' => __( 'Font Color', 'info-boxes-for-elementor' ),
          'type' => \Elementor\Controls_Manager::COLOR,
          'scheme' => [
            'type' => \Elementor\Scheme_Color::get_type(),
            'value' => \Elementor\Scheme_Color::COLOR_1,
          ],
          'selectors' => [
            '{{WRAPPER}} .infobox-icon i' => 'color: {{VALUE}}',
          ],
          'default' => '#878787',
          'condition' => ['icon_style' => 'fonticon']
        ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'info-boxes-for-elementor' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Awesome Design','info-boxes-for-elementor'),
         ]
      );

      $this->add_control(
        'title_color',
        [
          'label' => __( 'Title Color', 'info-boxes-for-elementor' ),
          'type' => \Elementor\Controls_Manager::COLOR,
          'scheme' => [
            'type' => \Elementor\Scheme_Color::get_type(),
            'value' => \Elementor\Scheme_Color::COLOR_1,
          ],
          'selectors' => [
            '{{WRAPPER}} .infobox-content h4' => 'color: {{VALUE}}',
          ],
          'default' => '#878787'
        ]
      );

      $this->add_control(
         'text',
         [
            'label' => __( 'Text', 'info-boxes-for-elementor' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Lorem ipsum dummy text are used here so replace your app data, ipsum dummy text are used here so','info-boxes-for-elementor'),
         ]
      );


      $this->add_control(
        'text_color',
        [
          'label' => __( 'Text Color', 'info-boxes-for-elementor' ),
          'type' => \Elementor\Controls_Manager::COLOR,
          'scheme' => [
            'type' => \Elementor\Scheme_Color::get_type(),
            'value' => \Elementor\Scheme_Color::COLOR_1,
          ],
          'selectors' => [
            '{{WRAPPER}} .infobox-content p' => 'color: {{VALUE}}',
          ],
          'default' => '#878787'
        ]
      );

      $this->add_control(
        'button',
        [
           'label' => __( 'Button', 'info-boxes-for-elementor' ),
           'type' => \Elementor\Controls_Manager::TEXT,
           'default' => __('Readmore','info-boxes-for-elementor'),
        ]
      );

      $this->add_control(
        'button_color',
        [
          'label' => __( 'Button Color', 'info-boxes-for-elementor' ),
          'type' => \Elementor\Controls_Manager::COLOR,
          'scheme' => [
            'type' => \Elementor\Scheme_Color::get_type(),
            'value' => \Elementor\Scheme_Color::COLOR_1,
          ],
          'selectors' => [
            '{{WRAPPER}} .infobox-content a' => 'color: {{VALUE}}',
          ],
          'default' => '#878787'
        ]
      );

      $this->add_control(
        'website_link',
        [
          'label' => __( 'Link', 'info-boxes-for-elementor' ),
          'type' => \Elementor\Controls_Manager::URL,
          'placeholder' => __( 'https://your-link.com', 'info-boxes-for-elementor' ),
          'show_external' => true,
          'default' => [
            'url' => '',
            'is_external' => true,
            'nofollow' => true,
          ],
        ]
      );

      $this->end_controls_section();
   }
   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
      $settings = $this->get_settings_for_display(); 
      $target = $settings['website_link']['is_external'] ? ' target="_blank"' : '';
      $nofollow = $settings['website_link']['nofollow'] ? ' rel="nofollow"' : '';
      ?>
      <div class="infobox style2 <?php echo esc_attr( $settings['text_align'] ); ?>" align="<?php echo esc_attr( $settings['text_align'] ); ?>">
        <div class="infobox-icon">
        <?php
          if ( 'fonticon' == $settings['icon_style'] ){ ?>
            <i class="<?php echo esc_attr($settings['font_icon']) ?>"></i>
        <?php } elseif( 'imageicon' == $settings['icon_style'] ){
            echo wp_get_attachment_image( $settings['icon']['id'],'full');
          } 
        ?>
        </div>
        <div class="infobox-content">
          <h4><?php echo esc_html($settings['title']); ?></h4>
          <p><?php echo esc_html($settings['text']); ?></p>
          <a href="<?php echo esc_url( $settings['website_link']['url'] ) ?>" <?php esc_attr( $target . $nofollow ) ?>><?php echo esc_html($settings['button']); ?><i class="fa fa-plus"></i></a>
        </div>
      </div>

      <?php
   }
 
}