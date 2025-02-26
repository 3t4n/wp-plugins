<?php
/*
Plugin Name: Estimated Reading Time Content
Description: Adds a reading time block to posts and pages, with customizable settings and widget support.
Version: 1.0
Author: Anton Simonov
License: GPL2
Text Domain: estimated-reading-time-content
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class EstimatedReadingTimeContent {
    const VERSION = '1.0';
    private static $instance = null;
    private $options;

    private function __construct() {
        $this->options = get_option( 'ertc_settings' );

        add_action( 'admin_menu', array( $this, 'ertc_add_admin_menu' ) );
        add_action( 'admin_init', array( $this, 'ertc_settings_init' ) );
        add_action( 'the_content', array( $this, 'ertc_display_reading_time' ) );
        add_shortcode( 'ertc_reading_time', array( $this, 'ertc_reading_time_shortcode' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'ertc_enqueue_styles' ) );
        add_action( 'widgets_init', array( $this, 'ertc_register_widget' ) );
    }

    public static function get_instance() {
        if ( self::$instance == null ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function ertc_add_admin_menu() {
        add_options_page(
            'Estimated Reading Time',
            'Estimated Reading Time',
            'manage_options',
            'estimated-reading-time-content',
            array( $this, 'ertc_options_page' )
        );
    }

    public function ertc_settings_init() {
        register_setting( 'ertc_settings_group', 'ertc_settings', array( $this, 'ertc_sanitize' ) );

        add_settings_section(
            'ertc_settings_section',
            'Estimated Reading Time Settings',
            array( $this, 'ertc_settings_section_callback' ),
            'ertc_settings_group'
        );

        add_settings_field(
            'ertc_enable_posts',
            'Enable for Posts',
            array( $this, 'ertc_enable_posts_render' ),
            'ertc_settings_group',
            'ertc_settings_section'
        );

        add_settings_field(
            'ertc_enable_pages',
            'Enable for Pages',
            array( $this, 'ertc_enable_pages_render' ),
            'ertc_settings_group',
            'ertc_settings_section'
        );

        add_settings_field(
            'ertc_position',
            'Position of the Block',
            array( $this, 'ertc_position_render' ),
            'ertc_settings_group',
            'ertc_settings_section'
        );

        add_settings_field(
            'ertc_words_per_minute',
            'Words per Minute',
            array( $this, 'ertc_words_per_minute_render' ),
            'ertc_settings_group',
            'ertc_settings_section'
        );

        add_settings_field(
            'ertc_reading_text',
            'Reading Time Text',
            array( $this, 'ertc_reading_text_render' ),
            'ertc_settings_group',
            'ertc_settings_section'
        );

        add_settings_field(
            'ertc_font_size',
            'Font Size (e.g., 14px)',
            array( $this, 'ertc_font_size_render' ),
            'ertc_settings_group',
            'ertc_settings_section'
        );

        add_settings_field(
            'ertc_font_color',
            'Font Color',
            array( $this, 'ertc_font_color_render' ),
            'ertc_settings_group',
            'ertc_settings_section'
        );

        add_settings_field(
            'ertc_background_color',
            'Background Color',
            array( $this, 'ertc_background_color_render' ),
            'ertc_settings_group',
            'ertc_settings_section'
        );
    }

    public function ertc_sanitize( $input ) {
        $sanitized = array();
        $sanitized['ertc_enable_posts'] = isset( $input['ertc_enable_posts'] ) ? sanitize_text_field( $input['ertc_enable_posts'] ) : '';
        $sanitized['ertc_enable_pages'] = isset( $input['ertc_enable_pages'] ) ? sanitize_text_field( $input['ertc_enable_pages'] ) : '';
        $sanitized['ertc_position'] = isset( $input['ertc_position'] ) ? sanitize_text_field( $input['ertc_position'] ) : 'bottom';
        $sanitized['ertc_words_per_minute'] = isset( $input['ertc_words_per_minute'] ) ? intval( $input['ertc_words_per_minute'] ) : 300;
        $sanitized['ertc_reading_text'] = isset( $input['ertc_reading_text'] ) ? sanitize_text_field( $input['ertc_reading_text'] ) : 'Reading Time:';
        $sanitized['ertc_font_size'] = isset( $input['ertc_font_size'] ) ? sanitize_text_field( $input['ertc_font_size'] ) : '14px';
        $sanitized['ertc_font_color'] = isset( $input['ertc_font_color'] ) ? sanitize_hex_color( $input['ertc_font_color'] ) : '#000000';
        $sanitized['ertc_background_color'] = isset( $input['ertc_background_color'] ) ? sanitize_hex_color( $input['ertc_background_color'] ) : '#ffffff';
        return $sanitized;
    }

    public function ertc_enable_posts_render() {
        ?>
        <input type='checkbox' name='ertc_settings[ertc_enable_posts]' <?php checked( isset( $this->options['ertc_enable_posts'] ) && $this->options['ertc_enable_posts'] ); ?> value='1'>
        <p class="description">Check to enable reading time display on all posts.</p>
        <?php
    }

    public function ertc_enable_pages_render() {
        ?>
        <input type='checkbox' name='ertc_settings[ertc_enable_pages]' <?php checked( isset( $this->options['ertc_enable_pages'] ) && $this->options['ertc_enable_pages'] ); ?> value='1'>
        <p class="description">Check to enable reading time display on all pages.</p>
        <?php
    }

    public function ertc_position_render() {
        ?>
        <select name='ertc_settings[ertc_position]'>
            <option value='top' <?php selected( $this->options['ertc_position'], 'top' ); ?>>Top of the Content</option>
            <option value='bottom' <?php selected( $this->options['ertc_position'], 'bottom' ); ?>>Bottom of the Content</option>
        </select>
        <p class="description">Select the position where the reading time block should appear in the content.</p>
        <?php
    }

    public function ertc_words_per_minute_render() {
        ?>
        <input type='number' name='ertc_settings[ertc_words_per_minute]' value='<?php echo isset( $this->options['ertc_words_per_minute'] ) ? esc_attr( $this->options['ertc_words_per_minute'] ) : 300; ?>' min='1'>
        <p class="description">Set the number of words per minute to calculate reading time (default is 300).</p>
        <?php
    }

    public function ertc_reading_text_render() {
        ?>
        <input type='text' name='ertc_settings[ertc_reading_text]' value='<?php echo isset( $this->options['ertc_reading_text'] ) ? esc_attr( $this->options['ertc_reading_text'] ) : 'Reading Time:'; ?>'>
        <p class="description">Customize the text displayed before the reading time (e.g., "Reading Time:").</p>
        <?php
    }

    public function ertc_font_size_render() {
        ?>
        <input type='text' name='ertc_settings[ertc_font_size]' value='<?php echo isset( $this->options['ertc_font_size'] ) ? esc_attr( $this->options['ertc_font_size'] ) : '14px'; ?>'>
        <p class="description">Set the font size for the reading time text (e.g., "14px").</p>
        <?php
    }

    public function ertc_font_color_render() {
        ?>
        <input type='text' name='ertc_settings[ertc_font_color]' class='color-field' value='<?php echo isset( $this->options['ertc_font_color'] ) ? esc_attr( $this->options['ertc_font_color'] ) : '#000000'; ?>'>
        <p class="description">Choose the font color for the reading time text.</p>
        <?php
    }

    public function ertc_background_color_render() {
        ?>
        <input type='text' name='ertc_settings[ertc_background_color]' class='color-field' value='<?php echo isset( $this->options['ertc_background_color'] ) ? esc_attr( $this->options['ertc_background_color'] ) : '#ffffff'; ?>'>
        <p class="description">Choose the background color for the reading time block.</p>
        <?php
    }

    public function ertc_settings_section_callback() {
        echo '<p>Configure the settings for the Estimated Reading Time Content plugin below.</p>';
        echo '<h3>Shortcode Usage</h3>';
        echo '<p>You can use the shortcode <code>[ertc_reading_time]</code> within your posts or pages to display the reading time. For example:</p>';
        echo '<pre>[ertc_reading_time]</pre>';
        echo '<p>To display the reading time for a specific post or page by ID, use the <code>id</code> attribute:</p>';
        echo '<pre>[ertc_reading_time id="123"]</pre>';
    }

    public function ertc_options_page() {
        ?>
        <div class="wrap">
            <h1>Estimated Reading Time Content</h1>
            <form action='options.php' method='post'>
                <?php
                settings_fields( 'ertc_settings_group' );
                do_settings_sections( 'ertc_settings_group' );
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    public function ertc_display_reading_time( $content ) {
        if ( is_front_page() && is_page() ) {
            return $content;
        }

        if ( is_singular( 'post' ) && ! empty( $this->options['ertc_enable_posts'] ) ) {
            $position = isset( $this->options['ertc_position'] ) ? $this->options['ertc_position'] : 'bottom';
            $reading_time = $this->ertc_calculate_reading_time( get_the_content() );
            $reading_text = isset( $this->options['ertc_reading_text'] ) ? esc_html( $this->options['ertc_reading_text'] ) : 'Reading Time:';
            $block = "<div class='ertc-reading-time'>" . esc_html( $reading_text ) . " " . esc_html( $reading_time ) . " min.</div>";

            if ( $position === 'top' ) {
                return $block . $content;
            } else {
                return $content . $block;
            }
        }

        if ( is_page() && ! empty( $this->options['ertc_enable_pages'] ) ) {
            $position = isset( $this->options['ertc_position'] ) ? $this->options['ertc_position'] : 'bottom';
            $reading_time = $this->ertc_calculate_reading_time( get_the_content() );
            $reading_text = isset( $this->options['ertc_reading_text'] ) ? esc_html( $this->options['ertc_reading_text'] ) : 'Reading Time:';
            $block = "<div class='ertc-reading-time'>" . esc_html( $reading_text ) . " " . esc_html( $reading_time ) . " min.</div>";

            if ( $position === 'top' ) {
                return $block . $content;
            } else {
                return $content . $block;
            }
        }

        return $content;
    }

    private function ertc_calculate_reading_time( $content ) {
        $word_count = str_word_count( wp_strip_all_tags( $content ) );
        $words_per_minute = isset( $this->options['ertc_words_per_minute'] ) ? intval( $this->options['ertc_words_per_minute'] ) : 300;
        $reading_time = ceil( $word_count / $words_per_minute );
        return $reading_time;
    }

    public function ertc_reading_time_shortcode( $atts ) {
        $atts = shortcode_atts( array(
            'id' => '',
        ), $atts, 'ertc_reading_time' );

        if ( ! is_singular() ) {
            return '';
        }

        global $post;
        if ( ! empty( $atts['id'] ) && intval( $atts['id'] ) !== $post->ID ) {
            return '';
        }

        $reading_time = $this->ertc_calculate_reading_time( $post->post_content );
        $reading_text = isset( $this->options['ertc_reading_text'] ) ? esc_html( $this->options['ertc_reading_text'] ) : 'Reading Time:';
        return "<div class='ertc-reading-time'>" . esc_html( $reading_text ) . " " . esc_html( $reading_time ) . " min.</div>";
    }

    public function ertc_enqueue_styles() {
        $font_size = isset( $this->options['ertc_font_size'] ) ? esc_attr( $this->options['ertc_font_size'] ) : '14px';
        $font_color = isset( $this->options['ertc_font_color'] ) ? esc_attr( $this->options['ertc_font_color'] ) : '#000000';
        $background_color = isset( $this->options['ertc_background_color'] ) ? esc_attr( $this->options['ertc_background_color'] ) : '#ffffff';

        $custom_css = "
            .ertc-reading-time {
                font-size: {$font_size};
                color: {$font_color};
                background-color: {$background_color};
                padding: 10px;
                margin-bottom: 20px;
                border-radius: 5px;
            }
            .ertc-reading-time-widget {
                font-size: {$font_size};
                color: {$font_color};
                background-color: {$background_color};
                padding: 10px;
                border-radius: 5px;
            }
        ";

        wp_add_inline_style( 'wp-block-library', $custom_css );
    }

    public function ertc_register_widget() {
        register_widget( 'ERTC_Reading_Time_Widget' );
    }
}

EstimatedReadingTimeContent::get_instance();

function ertc_enqueue_color_picker( $hook_suffix ) {
    if ( 'settings_page_estimated-reading-time-content' !== $hook_suffix ) {
        return;
    }
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'ertc-admin-script', plugins_url( 'js/admin-script.js', __FILE__ ), array( 'wp-color-picker', 'jquery' ), EstimatedReadingTimeContent::VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'ertc_enqueue_color_picker' );

class ERTC_Reading_Time_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'ertc_reading_time_widget',
            'Estimated Reading Time',
            array( 'description' => 'Displays the reading time.' )
        );
    }

    public function widget( $args, $instance ) {
        if ( is_singular() ) {
            $plugin_instance = EstimatedReadingTimeContent::get_instance();
            $reading_time = $plugin_instance->ertc_calculate_reading_time( get_the_content() );
            $reading_text = isset( $plugin_instance->options['ertc_reading_text'] ) ? esc_html( $plugin_instance->options['ertc_reading_text'] ) : 'Reading Time:';

            $font_size = isset( $plugin_instance->options['ertc_font_size'] ) ? esc_attr( $plugin_instance->options['ertc_font_size'] ) : '14px';
            $font_color = isset( $plugin_instance->options['ertc_font_color'] ) ? esc_attr( $plugin_instance->options['ertc_font_color'] ) : '#000000';
            $background_color = isset( $plugin_instance->options['ertc_background_color'] ) ? esc_attr( $plugin_instance->options['ertc_background_color'] ) : '#ffffff';

            echo wp_kses_post( $args['before_widget'] );
            if ( ! empty( $args['before_title'] ) || ! empty( $args['after_title'] ) ) {
                echo wp_kses_post( $args['before_title'] ) . 'Reading Time' . wp_kses_post( $args['after_title'] );
            }
            echo "<div class='ertc-reading-time-widget' style='font-size: " . esc_attr( $font_size ) . "; color: " . esc_attr( $font_color ) . "; background-color: " . esc_attr( $background_color ) . "; padding: 10px; border-radius: 5px;'>
                    " . esc_html( $reading_text ) . " " . esc_html( $reading_time ) . " min.
                  </div>";
            echo wp_kses_post( $args['after_widget'] );
        }
    }

    public function form( $instance ) {
        echo '<p>This widget displays the reading time for the current post or page.</p>';
    }

    public function update( $new_instance, $old_instance ) {
        return $new_instance;
    }
}
?>
