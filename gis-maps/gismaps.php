<?php
/*
  Plugin Name:  Gis maps
  Plugin URI: https://wordpress.org/plugins/gis-maps/
  Description:  Show qgis2web maps
  Version:      0.3.0
  Author:       Frank G.
  Author URI:
  Contributors:
  Text Domain:  gis-maps
  Domain Path: /languages
  License: GPLv2
 */

if (!defined('WPINC')) {
    die;
}

if(!class_exists('gismaps')){

    class gismaps {

        public $extracted = array();

        public function __construct() {
            add_action('init', array($this, 'gismaps_load_textdomain'));
            add_action('init', array( $this, 'gismaps_init'));
            add_filter('post_updated_messages', array($this, 'gismaps_updated_messages'));
            add_action('admin_head', array($this, 'gismaps_custom_help_tab'));
            add_action('add_meta_boxes_ptgismap', array($this, 'gismaps_custom_meta_boxes'));
            add_action('init', array($this, 'gismaps_add_shortcode'));
            add_action('wp_ajax_test_button', array($this, 'gismaps_test_map_dir'));
            add_action('admin_print_scripts-post-new.php', array($this, 'gismaps_admin_script'));
            add_action('admin_print_scripts-post.php', array($this, 'gismaps_admin_script'));
        }

        public static function activate_gismaps() {
            if (version_compare(PHP_VERSION, '5.3.6', '<')) {
                deactivate_plugins(basename(__FILE__));
                wp_die(__("Sorry, but you can't run this plugin, it requires PHP 5.3.6 or higher.", 'gis-maps'));
            }
            gismaps::gismaps_init();
            gismaps::gismaps_create_example_post();
            flush_rewrite_rules();
        }

        public static function deactivate_gismaps() {
           flush_rewrite_rules();
        }

        public static function gismaps_create_example_post() {
            $slug = 'openlayers-example';
            $title = 'Openlayers example';
            if ( 0 === post_exists($title)) {
                $post_id = wp_insert_post(
                        array(
                            'comment_status' => 'closed',
                            'ping_status' => 'closed',
                            'post_name' => $slug,
                            'post_title' => $title,
                            'post_status' => 'publish',
                            'post_type' => 'ptgismap',
                            'post_content' => '[gis-maps name="openlayers-example" width="100" min-height="400"]',
                            'post_excerpt' => __('Nice openlayers map.', 'gis-maps'),
                        )
                );
            }
        }

        public function gismaps_load_textdomain() {
            load_plugin_textdomain('gis-maps', false, '/' . dirname(plugin_basename(__FILE__)) . '/languages');
        }

        public static function gismaps_init() {
            $labels = array(
                'name' => _x('gis maps', 'post type general name', 'gis-maps'),
                'singular_name' => _x('gis map', 'post type singular name', 'gis-maps'),
                'menu_name' => _x('Gis map', 'admin menu', 'gis-maps'),
                'name_admin_bar' => _x('gis map', 'add new on admin bar', 'gis-maps'),
                'add_new' => _x('Add New', 'gis map', 'gis-maps'),
                'add_new_item' => __('Add New gis map', 'gis-maps'),
                'new_item' => __('New gis map', 'gis-maps'),
                'edit_item' => __('Edit gis map', 'gis-maps'),
                'view_item' => __('View gis map', 'gis-maps'),
                'all_items' => __('All gis maps', 'gis-maps'),
                'search_items' => __('Search gis maps', 'gis-maps'),
                'parent_item_colon' => __('Parent gis maps:', 'gis-maps'),
                'not_found' => __('No gis maps found.', 'gis-maps'),
                'not_found_in_trash' => __('No gis maps found in Trash.', 'gis-maps')
            );

            $args = array(
                'labels' => $labels,
                'description' => __('Description.', 'gis-maps'),
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'taxonomies' => array('category', 'post_tag'),
                'rewrite' => array('slug' => 'gismaps', 'with_front' => 'false'),
                'capability_type' => 'post',
                'has_archive' => true,
                'hierarchical' => false,
                'menu_position' => 20,
                'menu_icon' => 'dashicons-admin-site',
                'supports' => array('title','editor', 'author', 'excerpt', 'thumbnail')
            );
            register_post_type('ptgismap', $args);
        }

        public function gismaps_updated_messages($messages) {
            $post = get_post();
            $post_type = get_post_type($post);
            $post_type_object = get_post_type_object($post_type);

            if ('ptgismap' === $post_type) {
                $messages['ptgismap'] = array(
                    1 => __('Gis map updated.', 'gis-maps'),
                    2 => __('Custom field updated.', 'gis-maps'),
                    3 => __('Custom field deleted.', 'gis-maps'),
                    4 => __('Gis map updated.', 'gis-maps'),
                    5 => isset($_GET['revision']) ? sprintf(__('Gis map restored to revision from %s', 'gis-maps'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
                    6 => __('Gis map published.', 'gis-maps'),
                    7 => __('Gis map saved.', 'gis-maps'),
                    8 => __('Gis map submitted.', 'gis-maps'),
                    9 => sprintf(
                            __('Gis map scheduled for: <strong>%1$s</strong>.', 'gis-maps'),
                            date_i18n(__('M j, Y @ G:i', 'gis-maps'), strtotime($post->post_date))
                    ),
                    10 => __('Gis map draft updated.', 'gis-maps')
                );

                if ($post_type_object->publicly_queryable) {
                    $permalink = get_permalink($post->ID);

                    $view_link = sprintf(' <a href="%s">%s</a>', esc_url($permalink), __('View gis map', 'gis-maps'));
                    $messages[$post_type][1] .= $view_link;
                    $messages[$post_type][6] .= $view_link;
                    $messages[$post_type][9] .= $view_link;

                    $preview_permalink = add_query_arg('preview', 'true', $permalink);
                    $preview_link = sprintf(' <a target="_blank" href="%s">%s</a>', esc_url($preview_permalink), __('Preview gis map', 'gis-maps'));
                    $messages[$post_type][8] .= $preview_link;
                    $messages[$post_type][10] .= $preview_link;
                }
            }
            return $messages;
        }

        public function gismaps_custom_help_tab() {
            $screen = get_current_screen();
            if ('ptgismap' != $screen->post_type)
                return;
            $helptab2 = array(
                'id' => 'helptab2', 
                'title' => __('How it works?', 'gis-maps'),
                'content' => '<h3>' . __('How it works?', 'gis-maps') . '</h3>'
                . '<p>' . __('Upload all your qgis2web maps -each map in its own directory- through ftp or ssh to a directory named "gismaps_maps" within the wp-content directory.', 'gis-maps') . '</p>'
                . '<p>' . __('Use the Gis map tab to add your first map','gis-maps')
                . '<p>' . __('Write the DIRECTORY NAME, make a test and copy the shortcode', 'gis-maps') . '</p>'
                . '<p>' . __('Only alphanumeric characters plus "-" are allowed', 'gis-maps') . '</p>'
                . '<p>' . __('Now you have a shortcode, you can paste it into any page or post editor', 'gis-maps') . '</p>'
                . '<p>' . __('Save or publish the post.', 'gis-maps') . '</p>',
            );
            $helptab3 = array(
                'id' => 'helptab3',
                'title' => __('Help', 'gis-maps'),
                'content' => '<h3>' . __('Help', 'gis-maps') . '</h3>'
                . '<p>' . __('If you have any problem with this plugin, please, make a comment through wordpress.org support page.', 'gis-maps') . '</p>'
            );
            $screen->add_help_tab($helptab2);
            $screen->add_help_tab($helptab3);
        }

        public function gismaps_custom_meta_boxes($post) {
            add_meta_box(
                    'gismaps-meta-box', __('Gis map test', 'gis-maps'), array($this, 'gismaps_render_meta_box_dir'), 'ptgismap', 'normal', 'high'
            );
        }

        public function gismaps_render_meta_box_dir($post) {
            echo '<strong>'.__('DIRECTORY NAME:','gis-maps').' </strong>/gismaps_maps/<input name="gismapsdir" value=""/><br><hr>';
            echo ' <button id="test-button">'.__('test','gis-maps').'</button><div id="test-box" style="display:none;"> ;-)</div><hr>';
            echo '<div class="gismaps-short-div">Shortcode: You can change width(%) and min-height(px)<br><br><strong> <div id="gismaps-short">[gis-maps name="'.__('DIRECTORY NAME:','gis-maps').'" width="100" min-height="400"]</div></strong><br>'
                    . '</div>';
        }

        public function gismaps_add_shortcode(){
            add_shortcode( 'gis-maps', array($this, 'gismaps_code_shortcode') );
        }
        
        public function gismaps_code_shortcode($atts){
            $a = shortcode_atts( array(
                'name' => 'openlayers-example',
                'width' => '100',
                'height' => 'auto',
                'min-height' => '400',
            ), $atts );
            $name = preg_replace('/[^a-zA-Z0-9\-]/','',$a['name']);
            if (file_exists(WP_CONTENT_DIR . '/gismaps_maps/' . $name . '/index.html')){
                $map_url = WP_CONTENT_URL . '/gismaps_maps/' . $name . '/index.html';
                $b = '<div style="margin-bottom:50px;" class="gismaps-map">'
                        . '<iframe style="width:'.(int)$a['width'].'%;height:auto;min-height:'.(int)$a['min-height'].'px;" '
                        . 'src="'.$map_url.'"></iframe>'
                        .'<a target="_blank" href="'.$map_url.'">'.__('View map','gis-maps').'</a>'
                        .'</div>';
            } else {
                $b = '<div style="margin-bottom:50px;" class="gismaps-map">'
                        .__('You need a map to show. Have you copied or moved the gismaps_map directory?','gis-maps')
                        .'</div>';
            }
            return $b;
        }

        public function gismaps_admin_script() {
            global $post_type;
            if ($post_type == 'ptgismap') {
                $ajax_nonce = wp_create_nonce("test-box");
                wp_register_script('gismaps-admin-edit', plugins_url('/js/gismaps.js', __FILE__), array(), '1.0', true);
                $locate = array(
                    'nonce' => $ajax_nonce,
                    'titl' => __('Map directory?.','gis-maps'),
                    'test' => __('testing .....','gis-maps'),
                );
                wp_localize_script('gismaps-admin-edit', 'loc', $locate);
                wp_enqueue_script('gismaps-admin-edit');
            }
        }

        public function gismaps_test_map_dir() {
            $filter = filter_input(INPUT_POST, 'mapdir', FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '#[^a-zA-Z0-9\-]#')));
            if (check_ajax_referer("test-box", 'sec', FALSE) && empty($filter)) {
                $mapdir = preg_replace('/[^a-zA-Z0-9\-]/', '', $_POST['mapdir']);
                $path_dir = WP_CONTENT_DIR . '/gismaps_maps/' . $mapdir;
                if (!file_exists($path_dir. "/index.html")) {
                    echo '{"success":"0", "response" : "' . __("Error reading files", "gis-maps") . '"}';
                    wp_die();
                } else {
                    echo '{"success":"1", "response" : "' . __("All seems to be Ok", "gis-maps") . '"}';
                    wp_die();
                }
            } else {
                echo '{"success":"0","response" : "' . __("Error in test, reload this page.", 'gis-maps') . '"}';
                wp_die();
            }
        }

    }

}

if (class_exists('gismaps')) {

    register_activation_hook(__FILE__, array('gismaps', 'activate_gismaps'));
    register_deactivation_hook(__FILE__, array('gismaps', 'deactivate_gismaps'));

    $gismaps = new gismaps();
}
