<?php

namespace DavidWenner\ATestimonialBuilder;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Description of layout-mapper
 *
 * @author dareks
 */
class ATBS_LayoutMapper {

    const LAYOUT_HORIZON = 1;
    const LAYOUT_MATRIX = 2;
    const LAYOUT_MASONRY = 3;
    const LAYOUT_BAND = 4;
    const LAYOUT_SQUARE = 5;

    private $_settings = [];
    private static $_map = [
        self::LAYOUT_HORIZON => [
            'id' => self::LAYOUT_HORIZON,
            'title' => 'Horizon',
            'image' => ATBS_URL . 'assets/images/layouts/layout-horizon.png',
            'fields' => [
                'horizon_app_background_color' => 'app_background_color',
                'horizon_app_background_is_transparent' => 'app_background_is_transparent',
                'horizon_fonts' => 'fonts',
                'horizon_font_size' => 'font_size',
                'horizon_widget_text_color' => 'widget_text_color',
                'horizon_is_italic' => 'is_italic',
                'horizon_is_bold' => 'is_bold',
                'horizon_widget_background_color' => 'widget_background_color',
                'horizon_widget_background_color_is_transparent' => 'widget_background_color_is_transparent',
                'horizon_widget_border_color' => 'widget_border_color',
                //
                'horizon_header_footer_color' => 'header_footer_color',
                'horizon_header_footer_text_color' => 'header_footer_text_color',
                'horizon_social_btn_show' => 'social_btn_show',
                'horizon_show_star_rating' => 'show_star_rating',
                'horizon_display_date' => 'display_date',
                'horizon_display_name' => 'display_name',
                'horizon_display_citystate' => 'display_citystate',
                //common
                'show_source' => 'show_source',
                'show_add_btn' => 'show_add_btn',
                'wp_layout' => 'wp_layout',
            ],
        ],
        self::LAYOUT_MATRIX => [
            'id' => self::LAYOUT_MATRIX,
            'title' => 'Matrix',
            'image' => ATBS_URL . 'assets/images/layouts/layout-matrix.png',
            'fields' => [
                'matrix_app_background_color' => 'app_background_color',
                'matrix_app_background_is_transparent' => 'app_background_is_transparent',
                'matrix_fonts' => 'fonts',
                'matrix_font_size' => 'font_size',
                'matrix_widget_text_color' => 'widget_text_color',
                'matrix_is_italic' => 'is_italic',
                'matrix_is_bold' => 'is_bold',
                'matrix_widget_background_color' => 'widget_background_color',
                'matrix_widget_background_color_is_transparent' => 'widget_background_color_is_transparent',
                'matrix_widget_border_color' => 'widget_border_color',
                //
                'matrix_header_footer_color' => 'header_footer_color',
                'matrix_header_footer_text_color' => 'header_footer_text_color',
                'matrix_social_btn_show' => 'social_btn_show',
                'matrix_show_star_rating' => 'show_star_rating',
                'matrix_display_date' => 'display_date',
                'matrix_display_name' => 'display_name',
                'matrix_display_citystate' => 'display_citystate',
                //common
                'show_source' => 'show_source',
                'show_add_btn' => 'show_add_btn',
                'wp_layout' => 'wp_layout',
            ],
        ],
        self::LAYOUT_MASONRY => [
            'id' => self::LAYOUT_MASONRY,
            'title' => 'Masonry',
            'image' => ATBS_URL . 'assets/images/layouts/layout-masonry.png',
            'fields' => [
                'masonry_app_background_color' => 'app_background_color',
                'masonry_app_background_is_transparent' => 'app_background_is_transparent',
                'masonry_fonts' => 'fonts',
                'masonry_font_size' => 'font_size',
                'masonry_widget_text_color' => 'widget_text_color',
                'masonry_is_italic' => 'is_italic',
                'masonry_is_bold' => 'is_bold',
                'masonry_widget_background_color' => 'widget_background_color',
                'masonry_widget_background_color_is_transparent' => 'widget_background_color_is_transparent',
                'masonry_widget_border_color' => 'widget_border_color',
                //
                'masonry_header_footer_color' => 'header_footer_color',
                'masonry_header_footer_text_color' => 'header_footer_text_color',
                'masonry_social_btn_show' => 'social_btn_show',
                'masonry_show_star_rating' => 'show_star_rating',
                'masonry_display_date' => 'display_date',
                'masonry_display_name' => 'display_name',
                'masonry_display_citystate' => 'display_citystate',
                //common
                'show_source' => 'show_source',
                'show_add_btn' => 'show_add_btn',
                'wp_layout' => 'wp_layout',
            ],
        ],
        self::LAYOUT_BAND => [
            'id' => self::LAYOUT_BAND,
            'title' => 'Band',
            'image' => ATBS_URL . 'assets/images/layouts/layout-band.png',
            'fields' => [
                'band_background_color' => 'app_background_color',
                'band_background_is_transparent' => 'app_background_is_transparent',
                'band_testimonial_font_face' => 'fonts',
                'band_testimonial_font_size' => 'font_size',
                'band_testimonial_font_color' => 'widget_text_color',
                'band_headerfooter_text_is_italic' => 'is_italic',
                'band_headerfooter_text_is_bold' => 'is_bold',
                'band_widget_background_color' => 'widget_background_color',
                'band_widget_background_is_transparent' => 'widget_background_color_is_transparent',
                'band_border_background_color' => 'widget_border_color',
                //
                'band_testimonial_font_color' => 'header_footer_color',
                'band_display_social' => 'social_btn_show',
                'band_display_rating' => 'show_star_rating',
                'band_display_date' => 'display_date',
                'band_display_name' => 'display_name',
                //common
                'show_source' => 'show_source',
                'show_add_btn' => 'show_add_btn',
                'wp_layout' => 'wp_layout',
            ],
        ],
        self::LAYOUT_SQUARE => [
            'id' => self::LAYOUT_SQUARE,
            'title' => 'Square',
            'image' => ATBS_URL . 'assets/images/layouts/layout-square.png',
            'fields' => [
                'square_app_background_color' => 'app_background_color',
                'square_app_background_is_transparent' => 'app_background_is_transparent',
                'square_headerfooter_font_face' => 'fonts',
                'square_headerfooter_font_size' => 'font_size',
                'square_headerfooter_font_color' => 'widget_text_color',
                'square_testimonial_text_is_italic' => 'is_italic',
                'square_testimonial_text_is_bold' => 'is_bold',
                'square_testimonial_background_color' => 'widget_background_color',
                'square_testimonial_background_color_is_transparent' => 'widget_background_color_is_transparent',
                'square_testimonial_border_color' => 'widget_border_color',
                //
                'square_testimonial_font_color' => 'header_footer_color',
                'square_social_btn_show' => 'social_btn_show',
                'square_show_star_rating' => 'show_star_rating',
                'square_testimonial_is_show_date' => 'display_date',
                //common
                'show_source' => 'show_source',
                'show_add_btn' => 'show_add_btn',
                'wp_layout' => 'wp_layout',
            ],
        ],
    ];
    public static $fonts = array(
        'Poppins' => 'Poppins',
        'Georgia, serif' => 'Georgia',
        '"Palatino Linotype", "Book Antiqua", Palatino, serif' => 'Palatino Linotype',
        '"Times New Roman", Times, serif' => 'Times New Roman',
        'Arial, Helvetica, sans-serif' => 'Arial',
        '"Arial Black", Gadget, sans-serif' => 'Arial Black',
        '"Comic Sans MS", cursive, sans-serif' => 'Comic Sans MS',
        'Impact, Charcoal, sans-serif' => 'Impact, Charcoal',
        '"Lucida Sans Unicode", "Lucida Grande", sans-serif' => 'Lucida Sans Unicode',
        'Tahoma, Geneva, sans-serif' => 'Tahoma',
        '"Trebuchet MS", Helvetica, sans-serif' => 'Trebuchet MS',
        'Verdana, Geneva, sans-serif' => 'Verdana',
        '"Courier New", Courier, monospace' => 'Courier New',
        '"Lucida Console", Monaco, monospace' => 'Lucida Console',
    );
    public static $font_sizes = array(
        '12' => '12px',
        '13' => '13px',
        '14' => '14px',
        '15' => '15px',
        '16' => '16px',
        '17' => '17px',
        '18' => '18px',
        '19' => '19px',
        '20' => '20px',
        '21' => '21px',
        '22' => '22px',
        '23' => '23px',
        '24' => '24px',
        '25' => '25px',
        '26' => '26px',
    );

    /**
     * __construct
     * @param array $settings
     */
    public function __construct($settings = [])
    {
        $this->_settings = $settings;
    }

    /**
     * getLayout
     * @return int
     */
    protected function atbs_getLayout()
    {
        return $this->_settings['wp_layout'] ?? self::LAYOUT_HORIZON;
    }

    /**
     * map
     * @return array
     */
    public function map()
    {
        $_layout = static::$_map[$this->atbs_getLayout()] ?? [];
        $_result = [
            'layout_id' => $this->atbs_getLayout(),
            'layouts' => static::$_map,
            'fields' => [],
        ];

        foreach ($_layout['fields'] ?? [] as $field => $resolvedName) {
            if (isset($this->_settings[$field])) {
                $_result['fields'][$resolvedName] = $this->_settings[$field];
            }
        }
        return $_result;
    }

    /**
     * unmap
     * @param array $post
     * @return array
     */
    public function unmap($post = [])
    {
        $_result = [];
        $_layout = $post['wp_layout'] ?? self::LAYOUT_HORIZON;
        $_fields = static::$_map[$_layout]['fields'] ?? [];
        $_flippedFields = array_flip($_fields);

        foreach ($post as $field => $value) {
            if (isset($_flippedFields[$field])) {
                $_result[$_flippedFields[$field]] = $value;
            }
        }

        return $_result;
    }
}
