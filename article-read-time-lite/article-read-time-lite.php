<?php

defined('ABSPATH') or die('No script kiddies please!!');
/**
 * Plugin Name:       Article Read Time Lite
 * Plugin URI:        https://wpshuffle.com/article-read-time-lite
 * Description:       This plugin will calculate the time to read the article or news.
 * Version:           1.0.3
 * Requires at least: 5.5
 * Requires PHP:      7.2
 * Author:            WP Shuffle
 * Author URI:        https://wpshuffle.com/       
 * Text Domain:       article-read-time-lite
 * Domain Path:       /languages
 */

if (!class_exists('Article_Read_Time_Lite')) {

    class Article_Read_Time_Lite {

        function __construct() {
            $this->define_constants();
            add_action('plugins_loaded', array($this, 'load_artl_textdomain'));
            add_action('admin_menu', array($this, 'artl_admin_menu'));
            add_action('admin_enqueue_scripts', array($this, 'artl_admin_assets'));
            add_action('wp_enqueue_scripts', array($this, 'artl_frontend_assets'));
            add_action('admin_post_artl_settings_save_action', array($this, 'save_settings_action'));
            add_action('admin_post_artl_progress_bar_settings_save_action', array($this, 'save_progress_bar_settings_action'));
            add_filter('the_content', array($this, 'ifArtlPost'));
            add_action('wp_footer', array($this, 'ifArtlProgressBar'));
        }

        function load_artl_textdomain() {
            load_plugin_textdomain('article-read-time-lite', false, dirname(plugin_basename(__FILE__)) . '/languages');
        }
        function define_constants() {
            defined('ARTL_PATH') or define('ARTL_PATH', plugin_dir_path(__FILE__));
            defined('ARTL_CSS_DIR') or define('ARTL_CSS_DIR', untrailingslashit(plugin_dir_url(__FILE__)) . '/assets/css'); // plugin's CSS directory URL
            defined('ARTL_IMG_DIR') or define('ARTL_IMG_DIR', plugin_dir_url(__FILE__) . 'images');
            defined('ARTL_URL') or define('ARTL_URL', plugin_dir_url(__FILE__));
            defined('ARTL_VERSION') or define('ARTL_VERSION', '1.0.3');
        }

        function ifArtlProgressBar() {
            wp_enqueue_style('artl-frontend-progressbar', ARTL_CSS_DIR . '/artl-progressbar.css', array(), ARTL_VERSION);
            if (is_single() or is_page()) {
                global $post;

                $progress_bar_check_post_type = $post->post_type;

                $artl_progress_bar_settings = get_option('artl_progress_bar_settings');
                /**
                 * Filters settings before rendering Article Read Time Block
                 * 
                 * @param array $artl_progress_bar_settings
                 * @since 1.0.0
                 */
                $artl_progress_bar_settings = apply_filters('art_frontend_settings', $artl_progress_bar_settings);
                $progress_bar_post_type = (!empty($artl_progress_bar_settings['progress-bar']['display_post_types_progress_bar'])) ? $artl_progress_bar_settings['progress-bar']['display_post_types_progress_bar'] : [];
                $status = (!empty($artl_progress_bar_settings['progress-bar']['status'])) ? $artl_progress_bar_settings['progress-bar']['status'] : '0';

                if ($status == 1 && in_array($progress_bar_check_post_type, $progress_bar_post_type)) {
                    $position = esc_attr($artl_progress_bar_settings['progress-bar']['bar_display_position']);

                    $background = esc_attr($artl_progress_bar_settings['progress-bar']['background_color']);
                    $primary_color = esc_attr($artl_progress_bar_settings['progress-bar']['primary_color']);

                    $bar_thickness = esc_attr($artl_progress_bar_settings['progress-bar']['bar_thickness']);

                    echo '<div class="artl-progressbar-header"><div class="artl-progress-container">
                    <div class="artl-progress-bar" id="artProgressBar">
                    </div>
                    </div></div>';
                    $alias_class_1 = 'artl-progressbar-header';
                    $alias_class_2 = 'artl-progress-container';
                    $alias_class_3 = 'artl-progress-bar';

                    include(ARTL_PATH . '/includes/cores/progress-bar-customize.php');
                }
            }
        }
        function ifArtlPost($content) {

            global $post;
            $check_post_type = $post->post_type;
            $artl_settings = get_option('artl_settings');
            $art_post_type = $artl_settings['basic']['display_post_types'];
            if (!empty($artl_settings['basic']['status']) && !empty($art_post_type)) {
                if (in_array($check_post_type, $art_post_type)  && $artl_settings['basic']['status'] == 1) {
                    if (
                        is_single() or is_page()
                    ) {

                        return $this->createHTMLPost($content);
                    }
                }
            }
            return $content;
        }
        function createHTMLPost($content) {
            ob_start();
            include(ARTL_PATH . 'includes/views/frontend/posthtml.php');
            $html = ob_get_contents();
            ob_end_clean();
            if ($artl_settings['layout']['display_section'] == 'beginning') {
                return $html . $content;
            }
            return $content . $html;
        }




        function artl_admin_assets() {
            if (
                isset($_GET['page']) && isset($_GET['page']) == 'article-read-time-lite' ||
                isset($_GET['page']) == 'artl-progress-bar'
            ) {
                wp_enqueue_style('artl-backend-style', ARTL_URL . 'assets/css/artl-backend.css', array(), ARTL_VERSION);


                wp_enqueue_script('artl-backend-script', ARTL_URL . 'assets/js/artl-backend.js', array('jquery', 'wp-color-picker'), ARTL_VERSION);
            }
        }

        function artl_frontend_assets() {

            wp_enqueue_style('artl-frontend-style', ARTL_URL . 'assets/css/artl-frontend.css', array(), ARTL_VERSION);
            wp_enqueue_script('artl-frontend-script', ARTL_URL . 'assets/js/artl-frontend.js', array('jquery'), ARTL_VERSION);
        }


        function artl_admin_menu() {
            add_menu_page(esc_html__('Article Read Time Lite', 'article-read-time-lite'), esc_html__('Article Read Time Lite', 'article-read-time-lite'), 'manage_options', 'article-read-time-lite', array($this, 'art_settings_page'), 'dashicons-clock');

            add_submenu_page('article-read-time-lite', esc_html__('Article Read Time Lite Settings', 'article-read-time-lite'), esc_html__('Article Read Time Lite Settings', 'article-read-time-lite'), 'manage_options', 'article-read-time-lite', array($this, 'art_settings_page'));
            add_submenu_page('article-read-time-lite', esc_html__('Progress Bar', 'article-read-time-lite'), esc_html__('Progress Bar', 'article-read-time-lite'), 'manage_options', 'artl-progress-bar', array($this, 'art_progress_bar_page'));
            add_submenu_page('article-read-time-lite', esc_html__('About', 'article-read-time-lite'), esc_html__('About', 'article-read-time-lite'), 'manage_options', 'artl-about', array($this, 'art_about'));
            add_submenu_page('article-read-time-lite', esc_html__('Help', 'article-read-time-lite'), esc_html__('Help', 'article-read-time-lite'), 'manage_options', 'artl-help', array($this, 'art_help'));
        }

        function art_progress_bar_page() {
            include(ARTL_PATH . 'includes/views/backend/progress-bar-settings.php');
        }

        function art_settings_page() {
            include(ARTL_PATH . 'includes/views/backend/settings.php');
        }

        function art_help() {
            include(ARTL_PATH . 'includes/views/backend/help.php');
        }

        function art_about() {
            include(ARTL_PATH . 'includes/views/backend/about.php');
        }



        function save_settings_action() {

            if (
                !empty($_POST['artl_settings_nonce_field']) &&
                wp_verify_nonce($_POST['artl_settings_nonce_field'], 'artl_settings_nonce')
            ) {
                // echo "<pre>";
                // print_r($_POST['article_read_lite_settings']);
                // echo "</pre>";
                // die();

                $heading_text = (isset($_POST['article_read_lite_settings']['layout']['heading_text'])) ? sanitize_text_field($_POST['article_read_lite_settings']['layout']['heading_text']) : '';
                $display_section = (isset($_POST['article_read_lite_settings']['layout']['display_section'])) ? sanitize_text_field($_POST['article_read_lite_settings']['layout']['display_section']) : '';
                $display_type = (isset($_POST['article_read_lite_settings']['layout']['display_type'])) ? sanitize_text_field($_POST['article_read_lite_settings']['layout']['display_type']) : '';


                $status = (isset($_POST['article_read_lite_settings']['basic']['status'])) ? sanitize_text_field($_POST['article_read_lite_settings']['basic']['status']) : '';
                $comment_include = (isset($_POST['article_read_lite_settings']['basic']['comment_include'])) ? sanitize_text_field($_POST['article_read_lite_settings']['basic']['comment_include']) : '';
                $image_include = (isset($_POST['article_read_lite_settings']['basic']['image_include'])) ? sanitize_text_field($_POST['article_read_lite_settings']['basic']['image_include']) : '';
                $word_per_minute = (isset($_POST['article_read_lite_settings']['basic']['word_per_minute'])) ? sanitize_text_field($_POST['article_read_lite_settings']['basic']['word_per_minute']) : '';
                $image_per_minute = (isset($_POST['article_read_lite_settings']['basic']['image_per_minute'])) ? sanitize_text_field($_POST['article_read_lite_settings']['basic']['image_per_minute']) : '';
                $paragraph_template = (isset($_POST['article_read_lite_settings']['layout']['paragraph_template'])) ? sanitize_text_field($_POST['article_read_lite_settings']['layout']['paragraph_template']) : '';
                $block_template = (isset($_POST['article_read_lite_settings']['layout']['block_template'])) ? sanitize_text_field($_POST['article_read_lite_settings']['layout']['block_template']) : '';

                $block_template = (isset($_POST['article_read_lite_settings']['layout']['block_template'])) ? sanitize_text_field($_POST['article_read_lite_settings']['layout']['block_template']) : '';
                $word_message = (isset($_POST['article_read_lite_settings']['layout']['word_message'])) ? wp_kses_post(stripslashes_deep(($_POST['article_read_lite_settings']['layout']['word_message']))) : '';
                $word_enable = (isset($_POST['article_read_lite_settings']['layout']['word_enable'])) ? sanitize_text_field($_POST['article_read_lite_settings']['layout']['word_enable']) : '';
                $word_field_label = (isset($_POST['article_read_lite_settings']['layout']['word_field_label'])) ? sanitize_text_field($_POST['article_read_lite_settings']['layout']['word_field_label']) : '';
                $character_enable = (isset($_POST['article_read_lite_settings']['layout']['character_enable'])) ? sanitize_text_field($_POST['article_read_lite_settings']['layout']['character_enable']) : '';
                $character_field_label = (isset($_POST['article_read_lite_settings']['layout']['character_field_label'])) ? sanitize_text_field($_POST['article_read_lite_settings']['layout']['character_field_label']) : '';
                $read_enable = (isset($_POST['article_read_lite_settings']['layout']['read_enable'])) ? sanitize_text_field($_POST['article_read_lite_settings']['layout']['read_enable']) : '';
                $read_field_label = (isset($_POST['article_read_lite_settings']['layout']['read_field_label'])) ? sanitize_text_field($_POST['article_read_lite_settings']['layout']['read_field_label']) : '';
                if (isset($_POST['article_read_lite_settings']['basic']['display_post_types'])) {
                    $post_type_array = array_map('sanitize_text_field', $_POST['article_read_lite_settings']['basic']['display_post_types']);
                } else {
                    $post_type_array  = '';
                }



                $artl_settings = array(
                    'basic' => array(
                        'status' => $status,
                        'display_post_types' => $post_type_array,
                        'word_per_minute' => $word_per_minute,
                        'image_per_minute' => $image_per_minute,
                        'comment_include' => $comment_include,
                        'image_include' => $image_include,
                    ),

                    'layout' => array(
                        'heading_text' => $heading_text,
                        'display_type' => $display_type,
                        'display_section' => $display_section,
                        'word_message' => $word_message,
                        'paragraph_template' => $paragraph_template,
                        'block_template' => $block_template,
                        'word_enable' => $word_enable,
                        'word_field_label' => $word_field_label,
                        'character_enable' => $character_enable,
                        'character_field_label' => $character_field_label,
                        'read_enable' => $read_enable,
                        'read_field_label' => $read_field_label
                    )

                );

                update_option('artl_settings', $artl_settings);
                wp_redirect(admin_url('admin.php?page=article-read-time-lite&message=1'));
                exit;
            }
        }
        function save_progress_bar_settings_action() {

            if (
                !empty($_POST['artl_progress_bar_settings_nonce_field']) &&
                wp_verify_nonce($_POST['artl_progress_bar_settings_nonce_field'], 'artl_progress_bar_settings_nonce')
            ) {
                $progress_status = (isset($_POST['artl_progress_bar_settings']['progress-bar']['status'])) ? sanitize_text_field($_POST['artl_progress_bar_settings']['progress-bar']['status']) : '';

                $bar_display_position = (isset($_POST['artl_progress_bar_settings']['progress-bar']['bar_display_position'])) ? sanitize_text_field($_POST['artl_progress_bar_settings']['progress-bar']['bar_display_position']) : '';

                $background_color = (isset($_POST['artl_progress_bar_settings']['progress-bar']['background_color'])) ? sanitize_text_field($_POST['artl_progress_bar_settings']['progress-bar']['background_color']) : '';
                $primary_color = (isset($_POST['artl_progress_bar_settings']['progress-bar']['primary_color'])) ? sanitize_text_field($_POST['artl_progress_bar_settings']['progress-bar']['primary_color']) : '';

                $bar_thickness = (isset($_POST['artl_progress_bar_settings']['progress-bar']['bar_thickness'])) ? sanitize_text_field($_POST['artl_progress_bar_settings']['progress-bar']['bar_thickness']) : '';

                $progressbar_post_type_array = (isset($_POST['artl_progress_bar_settings']['progress-bar']['display_post_types_progress_bar'])) ? array_map('sanitize_text_field', $_POST['artl_progress_bar_settings']['progress-bar']['display_post_types_progress_bar']) : '';

                $artl_progress_bar_settings = array(

                    'progress-bar' => array(
                        'status' => $progress_status,
                        'bar_display_position' => $bar_display_position,

                        'background_color' => $background_color,
                        'primary_color' => $primary_color,

                        'bar_thickness' => $bar_thickness,

                        'display_post_types_progress_bar' => $progressbar_post_type_array

                    )
                );

                update_option('artl_progress_bar_settings', $artl_progress_bar_settings);
                wp_redirect(admin_url('admin.php?page=artl-progress-bar&message=1'));
                exit;
            }
        }
    }

    new Article_Read_Time_Lite();
}
