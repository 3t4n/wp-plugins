<?php
use Elementor\Plugin;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;

    class Newselement_Global_Settings extends \Elementor\Core\Kits\Documents\Tabs\Tab_Base {

        public function get_id() {
            return 'newselement-settings';
        }

        public function get_title() {
            return 'Newselement Extra';
        }
 
        public function get_icon() {
            return 'eicon-logo';
        }

        protected function register_tab_controls() {

            $this->start_controls_section(
                'nwse_general',
                [
                    'label' => 'General',
                    'tab' => $this->get_id(),
                ]
            );

            $this->add_control(
                'title_style', [
                    'label' => __('Title style', 'news-element'),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        '' => [
                            'title' => __('No effect', 'news-element'),
                            'icon' => ' eicon-document-file',
                        ],
                        'uline_title' => [
                            'title' => __('Underline title', 'news-element'),
                            'icon' => 'eicon-image-rollover',
                        ],
                        'bg_title' => [
                            'title' => __('Background title', 'news-element'),
                            'icon' => 'eicon-image-rollover',
                        ],                    
                    ],
                    'default' => ''
                ]
            );

            $this->add_control(
                'tt_background',
                [
                    'label' => __( 'Title Background', 'news-element' ),
                    'type' => Controls_Manager::COLOR,
                    'condition' => [
                        'title_style' => 'bg_title',
                    ],                                       
                    'selectors' => [
                        '.background-title .entry_title a' => 'background:{{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'tt_has_filter',
                [
                    'label' => __( 'Title background filter', 'news-element' ),
                    'type' => Controls_Manager::SWITCHER,
                    'condition' => [
                        'title_style' => 'bg_title',
                    ],
                    'selectors' => [
                        '.background-title .entry_title a' => 'filter: url(#title-highlight);',
                    ],
                ]
            );

            $this->add_control(
                'tt_has_border',
                [
                    'label' => __( 'Title border', 'news-element' ),
                    'type' => Controls_Manager::COLOR,
                    'condition' => [
                        'tt_has_filter!' => 'yes',
                        'title_style' => 'bg_title',
                    ],                    
                    'selectors' => [
                        '.background-title .entry_title a' => 'border:1px solid {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'tt_has_shdw',
                [
                    'label' => __( 'Title box shadow color', 'news-element' ),
                    'type' => Controls_Manager::COLOR,
                    'condition' => [
                        'tt_has_filter!' => 'yes',
                        'title_style' => 'bg_title',
                    ],                    
                    'selectors' => [
                        '.background-title .entry_title a' => 'box-shadow: 0 3px 0 {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();


        }
    }

        
    class Newselement_Global_Settings_Init
    {
        public static function init()
        {
            add_action( 'elementor/kit/register_tabs', [__CLASS__, 'register_controls']);
            add_action( 'body_class', [__CLASS__, 'body_cls']);
            add_action( 'wp_footer', [__CLASS__, 'footer_html']);
            add_action( 'wp_enqueue_scripts', [__CLASS__, 'add_script_style']);
        } 

        public static function register_controls( \Elementor\Core\Kits\Documents\Kit $kit ){
            
            $kit->register_tab( 'newselement-settings', Newselement_Global_Settings::class );
        }

        public static function footer_html(){
            echo '<div class="ne-click-capture"></div><div class="ne-pop-content ne-offsidebar left"></div></div><div class="ne-pop-content ne-offsidebar right"></div>';
        }

        public static function add_script_style(){

        
        }

        public static function body_cls(){
            $option = self::elementor_get_setting( 'title_style' );
            switch ($option) {
                case "uline_title":
                    $cls =  "underline-title";
                    break;
                  case "bg_title":
                    $cls =  "background-title";
                    break;
                  case "green":
                    echo "Your favorite color is green!";
                    break;
                  default:
                  $cls =  "";             
            }
            $classes[] = $cls;
			return $classes;
        }

        public static function elementor_get_setting( $setting_id ) {

            $return = '';
    
            if ( ! isset( $the_pack_settings['kit_settings'] ) ) {
                if ( Plugin::instance()->preview->is_preview_mode() ) {
                    // get auto save data
                    $kit = \Elementor\Plugin::$instance->documents->get_doc_for_frontend( \Elementor\Plugin::$instance->kits_manager->get_active_id() );
                } else {
                    $kit = \Elementor\Plugin::$instance->documents->get( \Elementor\Plugin::$instance->kits_manager->get_active_id(), true );
                }
                $the_pack_settings['kit_settings'] = $kit->get_settings();
            }
    
            if ( isset( $the_pack_settings['kit_settings'][ $setting_id ] ) ) {
                $return = $the_pack_settings['kit_settings'][ $setting_id ];
            }
    
            return $return;
        }

    }
    Newselement_Global_Settings_Init::init();
?>