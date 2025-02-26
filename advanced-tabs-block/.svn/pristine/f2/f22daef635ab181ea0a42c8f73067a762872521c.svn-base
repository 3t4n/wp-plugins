<?php 
/**
 * Google Fonts Loader
 * @package AdvancedTabBlocks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( ! class_exists( 'ATBS_Fonts_Loader' ) ) {

    class ATBS_Fonts_Loader {

        private static $all_fonts = [];
	
        /**
         * Constructor
         * @return void
         */
        public function __construct() {
            add_action( 'wp_enqueue_scripts', [ $this, 'fonts_loader' ] );
            add_action( 'admin_enqueue_scripts', [ $this, 'fonts_loader' ] );
            add_action('atbs_render_block', [ $this, 'font_generator' ]);
        }

        /**
         * Font generator.
         * @param array $block
         * @return void
         */
        public function font_generator($block) {
            if (isset($block['attrs']) && is_array($block['attrs'])) {
                $attributes = $block['attrs'];
                foreach ($attributes as $key => $value) {
                    if (!empty($value) && strpos($key, 'atbs_') === 0 && strpos($key, 'FontFamily') !== false) {
                        self::$all_fonts[] = $value;
                    }
                }
            }
        }

        /**
         * Load fonts
         * @return void
         * @access public
         */
        public function fonts_loader() {
            if (is_array(self::$all_fonts) && count(self::$all_fonts) > 0) {

                $fonts = array_filter(array_unique(self::$all_fonts));

                if (!empty($fonts)) {
                    $system = array(
                        'Arial',
                        'Tahoma',
                        'Verdana',
                        'Helvetica',
                        'Times New Roman',
                        'Trebuchet MS',
                        'Georgia',
                    );
                    $gfonts = '';
                    $gfonts_attr = ':100,200,300,400,500,600,700,800,900';
                    foreach ($fonts as $font) {
                        if (!in_array($font, $system, true) && !empty($font)) {
                            $gfonts .= str_replace(' ', '+', trim($font)) . $gfonts_attr . '|';
                        }
                    }
                    if (!empty($gfonts)) {
                        $query_args = array(
                            'family' => $gfonts,
                        );
                        wp_register_style(
                            'atbs-fonts',
                            add_query_arg($query_args, '//fonts.googleapis.com/css'),
                            array()
                        );
                        wp_enqueue_style('atbs-fonts');
                    }
                    // Reset.
                    $gfonts = '';
                }
            }
        }

    }

}

new ATBS_Fonts_Loader(); // initialize the class 