<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;

if ( !class_exists('News_Element_Document_Controll') ) {
    class News_Element_Document_Controll
    {
        public static function init()
        {

            add_action( 'elementor/documents/register_controls', [__CLASS__, 'add_control']);

            add_action( 'elementor/frontend/after_enqueue_scripts', [__CLASS__, 'enqueue_scripts'] );

            add_filter( 'body_class', [__CLASS__,'body_cls']);
        }

        public static function enqueue_scripts()
        {
            //wp_enqueue_script('thepack-sticky', NEWS_ELM_URL . 'assets/js/sticky-effect.js');
        }

        public static function add_control ( $document )
        {

			if ( ! $document instanceof \Elementor\Core\DocumentTypes\PageBase || ! $document::get_property( 'has_elements' ) ) {
				return;
			}

            $document->start_controls_section(
				'news_elem_xtra',
				[
					'label' => esc_html__( 'NewsElement Controlls', 'techco-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

            $document->add_control(
                'uline_title',
                [
                    'type' => Controls_Manager::SWITCHER,
                    'label' => esc_html__('Underline Post Title', 'the-pack-addon'),             
                ]
            );

            $document->end_controls_section();
        }

        public static function body_cls(){

			$current_doc = \Elementor\Plugin::instance()->documents->get( get_the_ID() );
            $classes[] = $current_doc->get_settings( 'uline_title' ) ? 'underline-title' : '';
			return $classes;
        }

    }

    News_Element_Document_Controll::init();
}

