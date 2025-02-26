<?php
/**
 * Amazing widget brands
 */
namespace Elementoramazing\Widgets;


if ( !defined( 'ABSPATH' ) ) {
    exit;
    // Exit if accessed directly.
}

/**
 * Elementor Amazing widget brands widget.
 *
 * Elementor widget that displays an Amazing widget brands icon, a headline and a text.
 *
 * @since 1.0.0
 */
use  Elementor\Controls_Manager ;
use  Elementor\Repeater ;
use  Elementor\Scheme_Color ;
use  Elementor\Scheme_Typography;
use  Elementor\Group_Control_Typography ;
use  Elementor\Group_Control_Border ;
use  Elementor\Group_Control_Box_Shadow ;
use  Elementor\Widget_Base ;
class An_Amazing_Widget_brands extends Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Amazing brands widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name()
    {
        return 'icon-box An_Amazing_Widget_brands';
    }
    
    /**
     * Get widget title.
     *
     * Retrieve Amazing widget brands title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title()
    {
        return __( 'Amazing Neo brands', 'amazing-neo-font-widget' );
    }
    
    /**
     * Get widget icon.
     *
     * Retrieve Amazing widget brands icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon()
    {
        return 'anb an-amazingneo';
    }
    
    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Amazing widget brands belongs to.
     *
     * @return array Widget categories.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_categories()
    {
        return [ 'amazing-neo-icon' ];
    }
    
    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the widget belongs to.
     *
     * @return array Widget keywords.
     * @since 2.1.0
     * @access public
     *
     */
    public function get_keywords()
    {
        return [
            'link',
            'icon',
            'box',
            'amazing'
        ];
    }
    
    /**
     * Register phone widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {

        $this->start_controls_section( 
            'section_icon', [
            'label' => __( 'Content', 'amazing-neo-font-widget' ),
            ] 
        );

        $this->add_control( 
            'icon', [
            'label'   => __( 'Icon', 'amazing-neo-font-widget' ),
            'type'    => Controls_Manager::ICON,
                'include' => [
                    'anb an-500px', 'anb an-acrobat-reader', 'anb an-adobe', 'anb an-airbnb', 'anb an-alarb', 'anb an-alipay', 'anb an-alnoor', 'anb an-amazingneo', 'anb an-amazon-pay-card', 'anb an-amazon-pay', 'anb an-amazon', 'anb an-american-express-card', 'anb an-android', 'anb an-angular', 'anb an-app-store-circle', 'anb an-app-store-square', 'anb an-app-store', 'anb an-apple-pay-card', 'anb an-apple-pay', 'anb an-apple', 'anb an-backbone', 'anb an-behance-circle', 'anb an-behance-square', 'anb an-behance', 'anb an-bitbucket', 'anb an-blackberry', 'anb an-blogger-circle', 'anb an-blogger-square', 'anb an-blogger', 'anb an-bootstrap', 'anb an-buffer-circle', 'anb an-buffer-square', 'anb an-buffer', 'anb an-buysellads-circle', 'anb an-buysellads-square', 'anb an-buysellads', 'anb an-cakephp', 'anb an-chrome', 'anb an-cisco', 'anb an-codeigniter', 'anb an-codepen-circle', 'anb an-codepen-square', 'anb an-codepen', 'anb an-coffeescript', 'anb an-css3', 'anb an-deviantart-circle', 'anb an-deviantart-square', 'anb an-deviantart', 'anb an-docker', 'anb an-dotnet', 'anb an-dribbble-circle', 'anb an-dribbble-square', 'anb an-dribbble', 'anb an-dropbox-circle', 'anb an-dropbox-square', 'anb an-dropbox', 'anb an-drupal', 'anb an-ebay', 'anb an-elementor', 'anb an-evernote-circle', 'anb an-evernote-square', 'anb an-evernote', 'anb an-facebook-circle', 'anb an-facebook-square', 'anb an-facebook', 'anb an-feedly-circle', 'anb an-feedly-square', 'anb an-feedly', 'anb an-firebase', 'anb an-firefox', 'anb an-flickr-circle', 'anb an-flickr-square', 'anb an-flickr', 'anb an-foursquare-circle', 'anb an-foursquare-square', 'anb an-foursquare', 'anb an-git', 'anb an-github-circle', 'anb an-github', 'anb an-gitlab', 'anb an-google-drive', 'anb an-google-play', 'anb an-google-plus-circle', 'anb an-google-plus', 'anb an-google-wallet', 'anb an-googleplus-square', 'anb an-grunt', 'anb an-html5-alt', 'anb an-html5', 'anb an-instagram-circle', 'anb an-instagram-square', 'anb an-instagram', 'anb an-invision', 'anb an-java', 'anb an-javascript', 'anb an-jcb-card', 'anb an-joomla', 'anb an-laravel', 'anb an-lastfm-circle', 'anb an-lastfm-square', 'anb an-lastfm', 'anb an-linkedin-circle', 'anb an-linkedin-square', 'anb an-linkedin', 'anb an-linux', 'anb an-magento', 'anb an-mailchimp', 'anb an-mastercard-card', 'anb an-microsoft', 'anb an-mix', 'anb an-mongodb', 'anb an-myspace-circle', 'anb an-myspace-square', 'anb an-myspace', 'anb an-mysql', 'anb an-node', 'anb an-nodejs', 'anb an-nop-commerce', 'anb an-oldemployer-circle', 'anb an-oldemployer-square', 'anb an-oldemployer', 'anb an-opencart', 'anb an-opera', 'anb an-paypal-card', 'anb an-paypal-circle', 'anb an-paypal-square', 'anb an-paypal', 'anb an-php', 'anb an-pinterest-circle', 'anb an-pinterest-square', 'anb an-pinterest', 'anb an-product-hunt-circle', 'anb an-product-hunt-square', 'anb an-product-hunt', 'anb an-python', 'anb an-react', 'anb an-reddit-circle', 'anb an-reddit-square', 'anb an-reddit', 'anb an-redhat', 'anb an-rss-circle', 'anb an-rss-square', 'anb an-rss', 'anb an-safari', 'anb an-sass', 'anb an-shopify-circle', 'anb an-shopify-square', 'anb an-shopify', 'anb an-shopware', 'anb an-sketch', 'anb an-skype-circle', 'anb an-skype-square', 'anb an-skype', 'anb an-slack-circle', 'anb an-slack-square', 'anb an-slack', 'anb an-snapchat-circle', 'anb an-snapchat-square', 'anb an-snapchat', 'anb an-spotify-circle', 'anb an-spotify-square', 'anb an-spotify', 'anb an-stackoverflow', 'anb an-stripe-card', 'anb an-swift', 'anb an-symfony', 'anb an-trello', 'anb an-tumblr-circle', 'anb an-tumblr-square', 'anb an-tumblr', 'anb an-twitter-circle', 'anb an-twitter-square', 'anb an-twitter', 'anb an-ubuntu', 'anb an-viber', 'anb an-vimeo-circle', 'anb an-vimeo-square', 'anb an-vimeo', 'anb an-vine-circle', 'anb an-vine-square', 'anb an-vine', 'anb an-visa-card', 'anb an-vk-circle', 'anb an-vk-square', 'anb an-vk', 'anb an-vmware', 'anb an-waze', 'anb an-wechat-circle', 'anb an-wechat-square', 'anb an-wechat', 'anb an-western-union-card', 'anb an-whatsapp-circle', 'anb an-whatsapp-square', 'anb an-whatsapp', 'anb an-wikipedia', 'anb an-windows', 'anb an-wordpress-alt', 'anb an-wordpress-circle', 'anb an-wordpress', 'anb an-xamarin', 'anb an-xing-circle', 'anb an-xing-square', 'anb an-xing', 'anb an-yahoo-circle', 'anb an-yahoo-square', 'anb an-yahoo', 'anb an-yelp-circle', 'anb an-yelp-square', 'anb an-yelp', 'anb an-youtube-alt', 'anb an-youtube-circle', 'anb an-youtube-square', 'anb an-youtube', 'anb an-github-square','anb an-gitkraken','anb an-gitlab-alt','anb an-google-pay','anb an-google','anb an-gulp','anb an-hashnode','anb an-hubspot','anb an-intercom','anb an-internet','anb an-itunes','anb an-java','anb an-jira','anb an-js','anb an-jsfiddle','anb an-laravel-alt','anb an-less','anb an-line','anb an-maxcdn','anb an-meetup','anb an-microblog','anb an-mixcloud','anb an-npm','anb an-odnoklassniki','anb an-odnoklassniki-square','anb an-periscope','anb an-phoenix','anb an-phoenix-squadron','anb an-pinterest','anb an-playstation','anb an-qq','anb an-salesforce','anb an-sass','anb an-stumbleupon','anb an-soundcloud','anb an-stack-exchange','anb an-steam-circle','anb an-steam-square','anb an-steam','anb an-swift-circle','anb an-swift-square','anb an-telegram','anb an-tiktok','anb an-umbraco','anb an-unity','anb an-ups','anb an-vuejs','anb an-weibo','anb an-wix','anb an-wpbeginner','anb an-xbox','anb an-yahoo-alt','anb an-yoast',
                ],
                'default' => 'anb an-amazingneo',
            ] 
        );

        $this->add_control( 
            'view', [
            'label'        => __( 'View', 'amazing-neo-font-widget' ),
            'type'         => Controls_Manager::SELECT,
            'options'      => [
            'default' => __( 'Default', 'amazing-neo-font-widget' ),
            'stacked' => __( 'Stacked', 'amazing-neo-font-widget' ),
            'framed'  => __( 'Framed', 'amazing-neo-font-widget' ),
        ],
            'default'      => 'default',
            'prefix_class' => 'elementor-view-',
            'condition'    => [
            'icon!' => '',
        ],
        ] );
        $this->add_control( 'shape', [
            'label'        => __( 'Shape', 'amazing-neo-font-widget' ),
            'type'         => Controls_Manager::SELECT,
            'options'      => [
            'circle' => __( 'Circle', 'amazing-neo-font-widget' ),
            'square' => __( 'Square', 'amazing-neo-font-widget' ),
        ],
            'default'      => 'circle',
            'condition'    => [
            'view!' => 'default',
            'icon!' => '',
        ],
            'prefix_class' => 'elementor-shape-',
        ] );
        $this->add_control( 'position', [
            'label'        => __( 'Icon Position', 'amazing-neo-font-widget' ),
            'type'         => Controls_Manager::CHOOSE,
            'default'      => 'top',
            'options'      => [
            'left'  => [
            'title' => __( 'Left', 'amazing-neo-font-widget' ),
            'icon'  => 'an an-align-left',
        ],
            'top'   => [
            'title' => __( 'Top', 'amazing-neo-font-widget' ),
            'icon'  => 'an an-align-center',
        ],
            'right' => [
            'title' => __( 'Right', 'amazing-neo-font-widgetr' ),
            'icon'  => 'an an-align-right',
        ],
        ],
            'prefix_class' => 'elementor-position-',
            'toggle'       => false,
            'condition'    => [
            'icon!' => '',
        ],
        ] );
        $this->add_control( 'show_title', [
            'label'        => __( 'Show Title', 'amazing-neo-font-widget' ),
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => __( 'Show', 'amazing-neo-font-widget' ),
            'label_off'    => __( 'Hide', 'amazing-neo-font-widget' ),
            'return_value' => 'yes',
            'default'      => 'yes',
            'separator'    => 'before',
        ] );
        $phone_title_text = [
            'label'       => __( 'Title', 'amazing-neo-font-widget' ),
            'type'        => Controls_Manager::TEXT,
            'condition'   => [
            'show_title' => 'yes',
        ],
            'default'     => __( 'This is the heading', 'amazing-neo-font-widget' ),
            'placeholder' => __( 'Enter your title', 'amazing-neo-font-widget' ),
            'label_block' => true,
        ];
        $this->add_control( 'title_text', $phone_title_text );
        $this->add_control( 'title_size', [
            'label'     => __( 'Title HTML Tag', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::SELECT,
            'condition' => [
            'show_title' => 'yes',
        ],
            'options'   => [
            'h1'   => 'H1',
            'h2'   => 'H2',
            'h3'   => 'H3',
            'h4'   => 'H4',
            'h5'   => 'H5',
            'h6'   => 'H6',
            'div'  => 'div',
            'span' => 'span',
            'p'    => 'p',
        ],
            'default'   => 'h3',
        ] );
        $this->add_control( 'show_description', [
            'label'        => __( 'Show Description', 'amazing-neo-font-widget' ),
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => __( 'Show', 'amazing-neo-font-widget' ),
            'label_off'    => __( 'Hide', 'amazing-neo-font-widget' ),
            'return_value' => 'yes',
            'default'      => 'yes',
            'separator'    => 'before',
        ] );

       $phone_description_text = [
            'label'       => '',
            'type'        => Controls_Manager::TEXTAREA,
            'condition'   => [
            'show_description' => 'yes',
        ],
            'default'     => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
            'placeholder' => __( 'Enter your description', 'elementor' ),
            'rows'        => 10,
            'separator'   => 'none',
            'show_label'  => false,
        ];
        $this->add_control( 'description_text', $phone_description_text );
        $this->end_controls_section();
        $this->start_controls_section( 'link_settings', [
            'label' => __( 'URL', 'amazing-neo-font-widget' ),
        ] );
        $this->add_control( 'amazing_widget_link', [
            'label'        => __( 'Widget Link', 'amazing-neo-font-widget' ),
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => __( 'Show', 'amazing-neo-font-widget' ),
            'label_off'    => __( 'Hide', 'amazing-neo-font-widget' ),
            'return_value' => 'yes',
            'default'      => 'yes',
            'separator'    => 'before',
        ] );
        $amazing_brands_link = [
            'label'       => __( 'URL', 'amazing-neo-font-widget' ),
            'type'        => Controls_Manager::TEXT,
            'placeholder' => __( 'http://amazingneo.com/', 'amazing-neo-font-widget' ),
            'separator'   => 'before',
        ];
        $this->add_control( 'amazing_widget_brands_link', $amazing_brands_link );
        $this->end_controls_section();
        $this->start_controls_section( 'section_style_icon', [
            'label'     => __( 'Icon', 'amazing-neo-font-widget' ),
            'tab'       => Controls_Manager::TAB_STYLE,
            'condition' => [
            'icon!' => '',
        ],
        ] );




        $this->start_controls_tabs( 'icon_colors' );
        $this->start_controls_tab( 'icon_colors_normal', [
            'label' => __( 'Normal', 'amazing-neo-font-widget' ),
        ] );
        $this->add_control( 'primary_color', [
            'label'     => __( 'Primary Color', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::COLOR,
            'scheme'    => [
            'type'  => \Elementor\Core\Schemes\Color::get_type(),
            'value' => \Elementor\Core\Schemes\Color::COLOR_1,
        ],
            'default'   => '#333',
            'selectors' => [
            '{{WRAPPER}}.elementor-view-stacked .elementor-icon'                                                    => 'background-color: {{VALUE}};',
            '{{WRAPPER}}.elementor-view-framed .elementor-icon, {{WRAPPER}}.elementor-view-default .elementor-icon' => 'color: {{VALUE}}; border-color: {{VALUE}};',
        ],
        ] );
        $this->add_control( 'secondary_color', [
            'label'     => __( 'Secondary Color', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'condition' => [
            'view!' => 'default',
        ],
            'selectors' => [
            '{{WRAPPER}}.elementor-view-framed .elementor-icon'  => 'background-color: {{VALUE}};',
            '{{WRAPPER}}.elementor-view-stacked .elementor-icon' => 'color: {{VALUE}};',
        ],
        ] );
        $this->end_controls_tab();
        $this->start_controls_tab( 'icon_colors_hover', [
            'label' => __( 'Hover', 'amazing-neo-font-widget' ),
        ] );
        $this->add_control( 'hover_primary_color', [
            'label'     => __( 'Primary Color', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
            '{{WRAPPER}}.elementor-view-stacked .elementor-icon:hover'                                                          => 'background-color: {{VALUE}};',
            '{{WRAPPER}}.elementor-view-framed .elementor-icon:hover, {{WRAPPER}}.elementor-view-default .elementor-icon:hover' => 'color: {{VALUE}}; border-color: {{VALUE}};',
        ],
        ] );
        $this->add_control( 'hover_secondary_color', [
            'label'     => __( 'Secondary Color', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'condition' => [
            'view!' => 'default',
        ],
            'selectors' => [
            '{{WRAPPER}}.elementor-view-framed .elementor-icon:hover'  => 'background-color: {{VALUE}};',
            '{{WRAPPER}}.elementor-view-stacked .elementor-icon:hover' => 'color: {{VALUE}};',
        ],
        ] );
        $this->add_control( 'hover_animation', [
            'label' => __( 'Hover Animation', 'amazing-neo-font-widget' ),
            'type'  => Controls_Manager::HOVER_ANIMATION,
        ] );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_responsive_control( 'icon_space', [
            'label'     => __( 'Spacing', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::SLIDER,
            'default'   => [
            'size' => 15,
        ],
            'range'     => [
            'px' => [
            'min' => 0,
            'max' => 100,
        ],
        ],
            'selectors' => [
            '{{WRAPPER}}.elementor-position-right .elementor-icon-box-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
            '{{WRAPPER}}.elementor-position-left .elementor-icon-box-icon'  => 'margin-right: {{SIZE}}{{UNIT}};',
            '{{WRAPPER}}.elementor-position-top .elementor-icon-box-icon'   => 'margin-bottom: {{SIZE}}{{UNIT}};',
            '(mobile){{WRAPPER}} .elementor-icon-box-icon'                  => 'margin-bottom: {{SIZE}}{{UNIT}};',
        ],
        ] );
        $this->add_responsive_control( 'icon_size', [
            'label'     => __( 'Size', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::SLIDER,
            'range'     => [
            'px' => [
            'min' => 6,
            'max' => 300,
        ],
        ],
            'selectors' => [
            '{{WRAPPER}} .elementor-icon' => 'font-size: {{SIZE}}{{UNIT}};',
        ],
        ] );
        $this->add_control( 'icon_padding', [
            'label'     => __( 'Padding', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::SLIDER,
            'selectors' => [
            '{{WRAPPER}} .elementor-icon' => 'padding: {{SIZE}}{{UNIT}};',
        ],
            'range'     => [
            'em' => [
            'min' => 0,
            'max' => 5,
        ],
        ],
            'condition' => [
            'view!' => 'default',
        ],
        ] );
        $this->add_control( 'rotate', [
            'label'     => __( 'Rotate', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::SLIDER,
            'default'   => [
            'size' => 0,
            'unit' => 'deg',
        ],
            'selectors' => [
            '{{WRAPPER}} .elementor-icon i' => 'transform: rotate({{SIZE}}{{UNIT}});',
        ],
        ] );
        $this->add_control( 'border_width', [
            'label'     => __( 'Border Width', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::DIMENSIONS,
            'selectors' => [
            '{{WRAPPER}} .elementor-icon' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
            'condition' => [
            'view' => 'framed',
        ],
        ] );
        $this->add_control( 'border_radius', [
            'label'      => __( 'Border Radius', 'amazing-neo-font-widget' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors'  => [
            '{{WRAPPER}} .elementor-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
            'condition'  => [
            'view!' => 'default',
        ],
        ] );
        $this->end_controls_section();
        $this->start_controls_section( 'section_style_content', [
            'label' => __( 'Content', 'elementor' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        ] );
        $this->add_responsive_control( 'text_align', [
            'label'     => __( 'Alignment', 'elementor' ),
            'type'      => Controls_Manager::CHOOSE,
            'options'   => [
            'left'    => [
            'title' => __( 'Left', 'elementor' ),
            'icon'  => 'an an-align-left',
        ],
            'center'  => [
            'title' => __( 'Center', 'elementor' ),
            'icon'  => 'an an-align-center',
        ],
            'right'   => [
            'title' => __( 'Right', 'elementor' ),
            'icon'  => 'an an-align-right',
        ],
            'justify' => [
            'title' => __( 'Justified', 'elementor' ),
            'icon'  => 'an an-align-justify',
        ],
        ],
            'selectors' => [
            '{{WRAPPER}} .elementor-icon-box-wrapper' => 'text-align: {{VALUE}};',
        ],
        ] );
        $this->add_control( 'content_vertical_alignment', [
            'label'        => __( 'Vertical Alignment', 'elementor' ),
            'type'         => Controls_Manager::SELECT,
            'options'      => [
            'top'    => __( 'Top', 'elementor' ),
            'middle' => __( 'Middle', 'elementor' ),
            'bottom' => __( 'Bottom', 'elementor' ),
        ],
            'default'      => 'top',
            'prefix_class' => 'elementor-vertical-align-',
        ] );
        $this->add_control( 'heading_title', [
            'label'     => __( 'Title', 'elementor' ),
            'type'      => Controls_Manager::HEADING,
            'separator' => 'before',
        ] );
        $this->add_responsive_control( 'title_bottom_space', [
            'label'     => __( 'Spacing', 'elementor' ),
            'type'      => Controls_Manager::SLIDER,
            'range'     => [
            'px' => [
            'min' => 0,
            'max' => 100,
        ],
        ],
            'selectors' => [
            '{{WRAPPER}} .elementor-icon-box-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
        ],
        ] );
        $this->add_control( 'title_color', [
            'label'     => __( 'Color', 'elementor' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
            '{{WRAPPER}} .elementor-icon-box-content .elementor-icon-box-title' => 'color: {{VALUE}};',
        ],
            'scheme'    => [
            'type'  => \Elementor\Core\Schemes\Color::get_type(),
            'value' => \Elementor\Core\Schemes\Color::COLOR_1,
        ],
        ] );
        $this->add_group_control( Group_Control_Typography::get_type(), [
            'name'     => 'title_typography',
            'selector' => '{{WRAPPER}} .elementor-icon-box-content .elementor-icon-box-title',
            'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
        ] );
        $this->add_control( 'heading_description', [
            'label'     => __( 'Description', 'elementor' ),
            'type'      => Controls_Manager::HEADING,
            'separator' => 'before',
        ] );
        $this->add_control( 'description_color', [
            'label'     => __( 'Color', 'elementor' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
            '{{WRAPPER}} .elementor-icon-box-content .elementor-icon-box-description' => 'color: {{VALUE}};',
        ],
            'scheme'    => [
            'type'  => \Elementor\Core\Schemes\Color::get_type(),
            'value' => \Elementor\Core\Schemes\Color::COLOR_3,
        ],
        ] );
        $this->add_group_control( Group_Control_Typography::get_type(), [
            'name'     => 'description_typography',
            'selector' => '{{WRAPPER}} .elementor-icon-box-content .elementor-icon-box-description',
            'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_3,
        ] );
        $this->end_controls_section();
    }
    
    /**
     *Build link
     *
     */
    private function build_phone_link( $settings )
    {
        if ( empty($settings['amazing_widget_brands_link']) ) {
            return '';
        }
        $value = '' . $settings['amazing_widget_brands_link'];
        return $value;
    }
    
    /**
     * Render phone widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        
        if ( !empty($settings['link']['url']) ) {
            $this->add_render_attribute( 'link', 'href', $settings['link']['url'] );
            $icon_tag = 'a';
            if ( $settings['link']['is_external'] ) {
                $this->add_render_attribute( 'link', 'target', '_blank' );
            }
            if ( $settings['link']['nofollow'] ) {
                $this->add_render_attribute( 'link', 'rel', 'nofollow' );
            }
        }
        
        $value = $this->build_phone_link( $settings );
        $this->add_render_attribute( 'icon', 'class', [ 'elementor-icon', 'elementor-animation-' . $settings['hover_animation'] ] );
        $icon_tag = 'span';
        $has_icon = !empty($settings['icon']);
        $has_title = !empty($settings['title_text']);
        $has_description = !empty($settings['description_text']);
        $has_full_link = !empty($settings['amazing_widget_link']);
        $has_link = !empty($value);
        
        if ( $has_icon ) {
            $this->add_render_attribute( 'i', 'class', $settings['icon'] );
            $this->add_render_attribute( 'i', 'aria-hidden', 'true' );
        }
        
        $icon_attributes = $this->get_render_attribute_string( 'icon' );
        $this->add_render_attribute( 'description_text', 'class', 'elementor-icon-box-description' );
        $this->add_inline_editing_attributes( 'title_text', 'none' );
        $this->add_inline_editing_attributes( 'description_text' );
        ?>
		<?php 
        
        if ( !empty($has_full_link) && !empty($has_link) ) {
            ?>
            <a href="<?php 
            echo  $value ;
            ?>"> <?php 
        }
        
        ?>
		<?php 
        
        if ( $has_icon ) {
            ?>
            <div class="elementor-icon-box-wrapper">
            <div class="elementor-icon-box-icon"><?php 
            
            if ( !$has_full_link && !empty($has_link) ) {
                ?>
            <a href="<?php 
                echo  $value ;
                ?>"> <?php 
            }
            
            ?>
            <<?php 
            echo  implode( ' ', [ $icon_tag, $icon_attributes ] ) ;
            ?>>
            <i <?php 
            echo  $this->get_render_attribute_string( 'i' ) ;
            ?>></i>
            </<?php 
            echo  $icon_tag ;
            ?>>
			<?php 
            if ( !$has_full_link && !empty($has_link) ) {
                ?></a> <?php 
            }
            ?>
            </div>
		<?php 
        }
        
        ?>


        <div class="elementor-icon-box-content">
		<?php 
        
        if ( $has_title ) {
            
            if ( !$has_full_link && !empty($has_link) ) {
                ?>
            <a href="<?php 
                echo  $value ;
                ?>"> <?php 
            }
            
            ?>
            <<?php 
            echo  $settings['title_size'] ;
            ?> class="elementor-icon-box-title">
            <<?php 
            echo  implode( ' ', [ $icon_tag ] ) ;
            echo  $this->get_render_attribute_string( 'title_text' ) ;
            ?>
            ><?php 
            echo  $settings['title_text'] ;
            ?></<?php 
            echo  $icon_tag ;
            ?>>
            </<?php 
            echo  $settings['title_size'] ;
            ?>><?php 
        }
        
        if ( !$has_full_link && !empty($has_link) ) {
            ?></a> <?php 
        }
        ?>
		<?php 
        
        if ( $has_description ) {
            ?>
            <p <?php 
            echo  $this->get_render_attribute_string( 'description_text' ) ;
            ?>><?php 
            echo  $settings['description_text'] ;
            ?></p>
		<?php 
        }
        
        ?>
        </div>

        </div>  <?php 
        if ( $has_full_link ) {
            ?></a> <?php 
        }
        ?>
		<?php 
    }
    
    /**
     * Render icon box widget output in the editor.
     *
     * Written as a Backbone JavaScript template and used to generate the live preview.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function _content_template()
    {
        ?>
        <#
        var link = settings.link.url ? 'href="sms:' + settings.link.url + '"' : '',
        iconTag = link ? 'a' : 'span';

        view.addRenderAttribute( 'description_text', 'class', 'elementor-icon-box-description' );

        view.addInlineEditingAttributes( 'title_text', 'none' );
        view.addInlineEditingAttributes( 'description_text' );
        #>
        <div class="elementor-icon-box-wrapper">
            <# if (settings.image ){
            if ( settings.image.url ) {
            var image = {
            id: settings.image.id,
            url: settings.image.url,
            size: settings.thumbnail_size,
            dimension: settings.thumbnail_custom_dimension,
            model: view.getEditModel()
            };

            var image_url = elementor.imagesManager.getImageUrl( image );

            var imageHtml = '<img src="' + image_url + '" class="elementor-animation-' + settings.hover_animation + '"/>';

            if ( settings.link.url ) {
            imageHtml = '<a href="' + settings.link.url + '">' + imageHtml + '</a>';
            }

            html += '
            <figure class="elementor-image-box-img">' + imageHtml + '</figure>
            ';
            }
            <# if ( settings.icon ) { #>
            <div class="elementor-icon-box-icon">

                <{{{ iconTag + ' ' + link }}} class="elementor-icon elementor-animation-{{ settings.hover_animation }}">
                <i class="{{ settings.icon }}" aria-hidden="true"></i>
            </
            {{{ iconTag }}}>
        </div>
        <# } #>
        <div class="elementor-icon-box-content">
            <{{{ settings.title_size }}} class="elementor-icon-box-title">
            <{{{ iconTag + ' ' + link }}} {{{ view.getRenderAttributeString( 'title_text' ) }}}>{{{ settings.title_text
            }}}
        </{{{ iconTag }}}>
        </{{{ settings.title_size }}}>
        <p {{{ view.getRenderAttributeString( 'description_text' ) }}}>{{{ settings.description_text }}}</p>
        </div>
        </div>
		<?php 
    }

}