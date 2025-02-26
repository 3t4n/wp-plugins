<?php
/*
 * Copyright © 2023 Information Aesthetics. All rights reserved.
 * This work is licensed under the GPL2, V2 license.
 */

use IAMG\IAMG_Client;

if (!defined('WPINC')) {
    exit;
}
if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed

class IAMG_posttype
{

    private $include_clipboard_script = false;

    public static $allowed_html = [
        'div' => [
            'class' => [],
            'id' => [],
            'style' => [],
            'data-width' => [],
            'data-height' => [],
            'resize-time' => [],
            'behaviour' => [],
            'presentation' => [],
        ]
    ];

    public function __construct()
    {
        add_action('init', [$this, 'create_post_type_iamg']);
        add_filter('register_post_type_args', [$this, 'disable_autosave_for_iamg'], 10, 2);
        add_action('plugins_loaded', [$this, 'iamg_main_init']);

        if (is_admin()) {
            add_action('admin_init', [$this, 'iamg_redirect_overview']);

            add_action('admin_enqueue_scripts', [$this, "enque_admin_styles"]);
//            add_action('wp_enqueue_scripts', [$this, 'add_admin_styles']);

            add_filter('manage_edit-' . IAMG_POST_TYPE . '_columns', array($this, 'gallery_custom_columns'));
            add_action('manage_posts_custom_column', array($this, 'gallery_custom_column_content'));

            add_action('admin_footer', array($this, 'include_clipboard_script'));
            add_action('add_meta_boxes', [$this, 'remove_custom_fields_meta_box'], 20);
        }
    }

    private static function get_local_id(int $post_id)
    {
        return get_post_meta($post_id, 'id_local', true);
    }


    function create_post_type_iamg()
    {

//        require_once IAMG_INCLUDES_PATH . 'IAMG_GalleryUpdate.php';

        global $_wp_admin_css_colors;
//        print_r("Background " . $this->admin_color);

        $label = array(
            'name' => 'IA Magic Galleries',
            'singular_name' => 'IAMG',
            'all_items' => esc_html__('Manage Galleries', 'ia-magic-galleries'),
            'add_new' => esc_html__('Add Gallery', 'ia-magic-galleries'),
//		'add_new_item'  => esc_html__( 'Add Gallery', 			'IAMG' ),
            'edit_item' => esc_html__('Edit Gallery Post', 'ia-magic-galleries'),

            'add_new_item' => esc_html__('Add New IA Magic Gallery', 'ia-magic-galleries'),
            'view_item' => esc_html__('View IA Magic Gallery', 'ia-magic-galleries'),

            'search_items' => esc_html__('Search Magic Galleries', 'ia-magic-galleries'),
            'parent_item_colon' => esc_html__('Parent Magic Galleries:', 'ia-magic-galleries'),
            'not_found' => esc_html__('No galleries found.', 'ia-magic-galleries'),
            'not_found_in_trash' => esc_html__('No galleries found in Trash.', 'ia-magic-galleries'),

            'menu_name' => _x('IA Magic Galleries', 'admin menu', 'ia-magic-galleries'),
            'name_admin_bar' => _x('IAMG', 'add new on admin bar', 'ia-magic-galleries'),

        );


        $supportArray = array('title', 'thumbnail');
        if (get_option(IAMG_PREFIX . 'categoryShow', 0)) {
            $supportArray[] = 'page-attributes';
        }


        $args = array(
            'labels' => $label,

            'description' => esc_html__('IA Magic Galleries, dynamic galleries for you site', 'ia-magic-galleries'),

            'rewrite' => false, //array('slug' => 'gallery', 'with_front' => true),
            'public' => true,
            'has_archive' => false,
            'hierarchical' => false,
            'supports' => $supportArray,
            'menu_icon' => path_join(IAMG_URL, 'images/admin/IAMG_icon_16_dark.png'), //'dashicons-format-gallery',
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 100,

            'show_in_rest' => true,

//		'rest_base'          => 'iamg',

            /*'publicly_queryable' => true,
            'show_ui'            => true,

            'query_var'          => true,
            'capability_type'    => 'post',


            'rest_controller_class' => 'WP_REST_Posts_Controller',*/
        );


        register_post_type(IAMG_POST_TYPE, $args);

        if (
            is_admin() &&
            get_option('iamg_after_install', 0) == '1'
        ) {

            add_action('wp_loaded', [$this, 'iamgInstallRefresh']);
        }
    }

    function disable_autosave_for_iamg($args, $post_type)
    {
        if (IAMG_POST_TYPE === $post_type) {
            $args['autosave'] = false;
        }
        return $args;
    }

    function iamgInstallRefresh()
    {

        global $wp_rewrite;
        $wp_rewrite->flush_rules();

        if (delete_option('iamg_after_install')) {
            update_option('iamg_redirect_overview', true);
        }

    }


    function iamg_redirect_overview()
    {
        if (get_option('iamg_redirect_overview', false)) {
            delete_option('iamg_redirect_overview');
            wp_redirect(admin_url('edit.php?post_type=' . IAMG_POST_TYPE . '&page=iamg-overview-page'));
            exit();
        }
    }


    function iamg_include($filesForInclude, $path = '')
    {
        $filesArray = array();
        if (empty($filesForInclude)) {
            return;
        }

        if (!is_array($filesForInclude)) {
            $filesArray[] = $filesForInclude;
        } else {
            $filesArray = $filesForInclude;
        }

        for ($i = 0; $i < count($filesArray); $i++) {
            $item = $filesArray[$i];
            if (file_exists($path . $item)) {
                require_once $path . $item;
            }
        }
    }


//iamg_include('cache.php', IAMG_INCLUDES_PATH);


    function iamg_main_init()
    {
        return; //not used for now

//		if(
//			iamg_gallery_get_current_post_type() == IAMG_TYPE_POST &&
//			( iamg_gallery_is_edit_page('new') || iamg_gallery_is_edit_page('edit') ) &&
//			rbsGalleryUtils::getTypeGallery() != 'slider'
//		){
//
//			// Adding the Metabox class
////			iamg_include('init.php', IAMG_CMB_PATH);
//
//
//			iamg_include('iamg_gallery_edit.php', IAMG_INCLUDES_PATH);
//		}

        /* only backend */
        if (is_admin()) {
//			iamg_include( array(
//				'iamg_gallery_media.php',
//				'iamg_gallery_menu.php',
//				'iamg_gallery_settings.php'
//			), IAMG_INCLUDES_PATH);
        }

        /* Frontend*/
//		iamg_include(array( 'iamg_gallery_class.php', 'iamg_gallery_frontend.php' ), IAMG_FRONTEND_PATH);

        /* AJAX */
//		iamg_include('iamg_gallery_ajax.php', IAMG_INCLUDES_PATH);
//		iamg_include('iamg_create_post_ajax.php', IAMG_EXTENSIONS_PATH);

        /*  Init function */

        /* backup init */
//		if( get_option( IAMG_OPTIONS.'addon_backup', 0 )  ){
//			iamg_include('backup/backup.init.php', 		IAMG_EXTENSIONS_PATH);
//		}
        /* category init */
//		if(
//			!get_option(IAMG_PREFIX.'categoryShow', 0) &&
//			!( isset($_GET['page']) && $_GET['page'] != 'iamg-cat' )
//		){
//			iamg_include('category/category.init.php', 	IAMG_EXTENSIONS_PATH);
//		}

        // check for v3
        //iamg_include('categoryPage/category.init.php', 	IAMG_EXTENSIONS_PATH);


        /* stats init */
//		if( get_option( IAMG_OPTIONS.'addon_stats', 0 )  ){
//			iamg_include('stats/stats.init.php', 	IAMG_EXTENSIONS_PATH);
//		}
    }

    //Static functions

    public static function add_post(
        $title,
        $content,
        $pres_parameters,
        $id_local = null,
        $block_id = null,
        $page_id = null,
        $post_id = null,
        $is_gallery_post = false,
        $dependence = 0
    ) {
        $title = sanitize_title($title);
        $url = ($id_local) ? admin_url('admin-ajax.php') . '?action=iamg_pres&id=' . esc_url($id_local) : "";

        $post_def = [
            'post_title' => $title,
            'post_type' => IAMG_POST_TYPE,
            'post_content' => '<div class="IA_Presenter_Container" presentation="' . $url . '"><\div>',
        ];

        $existing_post = null;
        if ($is_gallery_post && $post_id) {
            $existing_post = get_post($post_id);
            if ($existing_post) {
                if ($title && $existing_post->post_title !== $title) {
                    $post_def['post_title'] = $title;
                } else {
                    $post_def['post_title'] = $existing_post->post_title;
                }

                if ($existing_post->post_status === 'auto-draft') {
                    $post_def['post_status'] = 'draft';
                }

                $id = $existing_post->ID;
                $post_def['id'] = $id;

                wp_update_post($post_def);
            }
        }

        if (!$existing_post) {
            $id = wp_insert_post($post_def);
            wp_update_post([
                'id' => $id,
            ]);
        }

        if ($id_local) {
            add_post_meta($id, "id_local", $id_local, true);
            wp_cache_set(IAMG_SLUG . "_post_id_" . $id_local, $id);
        }
        add_post_meta($id, "presentation", $content);
        add_post_meta($id, "presentation_parameters", $pres_parameters);
        add_post_meta($id, "presentation_dependence", $dependence);
        $pages = [];
        if ($page_id) {
            $pages[$page_id] = ($block_id) ? [$block_id] : [];
        }
        add_post_meta($id, "pages", $pages);

        self::get_gallery_count(true);

        return $id;
    }

    public
    static function get_gallery_count(
        $increment = false
    ) {
        $i = get_option(IAMG_SLUG . "_gallery_count");
        if ($i === null) {
            add_option(IAMG_SLUG . "_gallery_count", ($increment) ? 0 : 1, "", false);
            $i = 0;
        } else {
            if ($increment) {
                update_option(IAMG_SLUG . "_gallery_count", $i + 1);
            }
        }
        return $i;
    }

    public
    static function update_post(
        $local_id,
        $content,
        $pres_parameters,
        $title = null,
        $block_id = null,
        $page_id = null,
        $post_id = null,
        $is_gallery_post = false,
        $gallery_dependence = 0,
        $old_post_id = null
    ) {
        $in_page = !$is_gallery_post && $page_id && $block_id;

        if (!$local_id && $post_id) {
            $local_id = self::get_local_id($post_id);
            if (!$local_id) {
                $gallery_number = self::get_gallery_count();
                $local_id = "iamg_gallery_" . ($gallery_number + 1);
            }
        }

        $post = self::get_post($local_id);

        if (!$post) {
            if (!$title) {
                $gallery_number = ($gallery_number) ?? self::get_gallery_count();
                $title = "IAMG_Presentation_" . ((string)($gallery_number + 1));
            }

            $id = self::add_post($title, $content, $pres_parameters, $local_id, $block_id, $page_id, $post_id,
                $is_gallery_post, $gallery_dependence);
            $post = get_post($id);
        } else {
            $id = $post->ID;
        }


        $images = $pres_parameters['images'];
        if (isset($images[0])) {
            $attachment_id = $images[0]['id'];
            set_post_thumbnail($id, $attachment_id);
        }


        $old = get_post_meta($id, "presentation", true);
        $old_params = get_post_meta($id, "presentation_parameters", true);

        // set block_id in array of pages
        if ($page_id) {
            $pages = get_post_meta($id, "pages", true);

            if (!isset($pages[$page_id])) {
                $pages[$page_id] = [];
            }
            if (!in_array($block_id, $pages[$page_id])) {
                $pages[$page_id][] = $block_id;
            }
            delete_post_meta($id, "pages");
            update_post_meta($id, "pages", $pages);
        }

        //set post_id in array of posts
//        if ($post_id) {
//            $posts = get_post_meta($id, "posts", true);
//            if (!in_array($post_id, $posts)) {
//                $posts[] = $post_id;
//                update_post_meta($id, "posts", $posts);
//            }
//        }


        if ($old !== $content) {
            delete_post_meta($id, "presentation");
            $result = update_post_meta($id, "presentation", $content);
            wp_cache_set(IAMG_SLUG . "_presentation_" . $local_id, $content);
            if ($result) {
                delete_post_meta($id, "presentation_parameters");
                update_post_meta($id, "presentation_parameters", $pres_parameters);
                delete_post_meta($id, "presentation_dependence");
                update_post_meta($id, "presentation_dependence", $gallery_dependence);
            }
            if ($old && $result) {
                add_post_meta($id, "presentation_history", [$old, $old_params]);
            }
            if ($in_page && $old_post_id) {
                self::remove_pageinfo_from_post($old_post_id, $page_id, $block_id);
            }
            if (!$in_page) {
                self::update_containing_pages($id, $pres_parameters);
            }
            return $result ? $post : $result;
        }
        return $post;
    }

    private static function remove_pageinfo_from_post($postid, $page_id, $block_id = null)
    {
        $pages = get_post_meta($postid, "pages", true);
        if ($pages && isset($pages[$page_id])) {
            if ($block_id) {
                $index = array_search($block_id, $pages[$page_id]);
                if ($index !== false) {
                    unset($pages[$page_id][$index]);
                    if (count($pages[$page_id]) === 0) {
                        unset($pages[$page_id]);
                    }
                }
            } else {
                unset($pages[$page_id]);
            }

            delete_post_meta($postid, "pages");
            if ($pages) {
                update_post_meta($postid, "pages", $pages);
            }
        }
    }

    private static function update_containing_pages($postid, $parameters)
    {
        $pages = get_post_meta($postid, "pages", true);
        if ($pages) {
            foreach ($pages as $page_id => $blocks) {
                foreach ($blocks as $block_id) {
                    $page = get_post($page_id);
                    if ($page) {
                        $content = $page->post_content;
                        $blocks = parse_blocks($content);
                        $properties = json_encode($parameters);
                        //replace " with \u0022
                        $properties = str_replace('"', '\u0022', $properties);
                        $result = self::update_block_w_id($blocks, $block_id, $properties);
                        if ($result) {
                            $content = serialize_blocks($blocks);
                            wp_update_post([
                                'ID' => $page_id,
                                'post_content' => $content,
                            ]);
                        } else {
                            self::remove_pageinfo_from_post($postid, $page_id, $block_id);
                        }
                    } else {
                        //that page has been deleted, remove the reference
                        self::remove_pageinfo_from_post($postid, $page_id);
                    }
                }
            }
        }
    }

    private static function update_block_w_id(&$blocks, $block_id, $properties)
    {
        foreach ($blocks as &$block) {
            if (isset($block['attrs']['block_id']) && $block['attrs']['block_id'] === $block_id) {
                $block['attrs']['properties'] = $properties;
                return $block;
            }

            $innerBlocks = $block['innerBlocks'];
            if (isset($innerBlocks) && is_array($innerBlocks)) {
                $result = update_block_w_id($innerBlocks, $block_id, $properties);
                if ($result) {
                    return $result;
                }
            }
        }

        return null;
    }

    public static function get_post_params($id_local)
    {
        $post = self::get_post($id_local);
        if ($post) {
            return get_post_meta($post->ID, "presentation_parameters", true);
        }
        return null;
    }

    public static function get_post_info($post_id)
    {
        $params = self::get_post_params($post_id);
        $post = self::get_post($post_id);
        if (!$params) {
            return null;
        }
        $local_id = get_post_meta($post_id, 'id_local', true);
        return [
            'id' => $local_id ?: $post_id,
            'title' => $post->post_title,
            'params' => $params,
        ];
    }

    public static function get_post(
        $id_local
    ) {
        global $wpdb;

        $post_id = wp_cache_get(IAMG_SLUG . "_post_id_" . $id_local);

        if (!$post_id) {
            $post_id = $wpdb->get_var($wpdb->prepare("SELECT post_id FROM 
                       {$wpdb->postmeta}
                WHERE meta_key = 'id_local' AND meta_value = %s ;", $id_local));
            wp_cache_set(IAMG_SLUG . "_post_id_" . $id_local, $post_id);
        }

//        $query = [
//            'meta_query' =>
//                [
//                    'key' => 'id_local',
//                    'value' => (string)$id_local
//                ],
//            'post_type' => IAMG_POST_TYPE,
//
//        ];
//        $posts = new WP_Query($query);
//
//        $posts = $posts->get_posts();

//        wp_send_json($result[0]);
        if ($post_id) {
            $post = get_post($post_id);
            if ($post && $post->post_type === IAMG_POST_TYPE) {
                wp_cache_set(IAMG_SLUG . "_post_id_" . $id_local, $post_id);
            }
        } else {
            //if we don't find a post by local_id, assume that post id was passed, and return the post of IAMG type
            $post = get_post($id_local);
        }

//        wp_send_json($post);
        if ($post && $post->post_type === IAMG_POST_TYPE) {
            return $post;
        }

        return null;
    }

    public static function get_post_presentation(
        $local_id
//        ,$decode = false //we don't do direct decoding anymore, the client handles decoding
    )
    {
        $cache_id = IAMG_SLUG . "_presentation_" . $local_id;
        $content = wp_cache_get($cache_id);
        if ($content) {
            return $content;
        }

        global $wpdb;
        $sql = "SELECT meta_value FROM 
                       {$wpdb->postmeta} AS pm JOIN 
                           (SELECT post_id FROM {$wpdb->postmeta} 
                                WHERE meta_key='id_local' AND meta_value=%s) AS a 
                               ON pm.post_id = a.post_id 
                WHERE meta_key = 'presentation';";

        $result = $wpdb->get_results($wpdb->prepare($sql, $local_id));

        if (isset($result[0]) && isset($result[0])) {

            wp_cache_set($cache_id, $result[0]->meta_value);

            return
//                ($decode) ? base64_decode($result[0]->meta_value) :
                $result[0]->meta_value;
        } else {
            $post = self::get_post($local_id);
            $content = ($post) ? get_post_meta($post->ID, "presentation", true) : null;
            if ($content) {
                $encripted = get_post_meta($post->ID, "encrypted", true);
                if ($encripted) {
                    //we don't do direct decoding anymore, the client handles decoding
                    require_once(IAMG_CLASSES_PATH . "IAMG_Client.php");
                    $content = (new IAMG_Client())->process_secure_presentation($content, $encripted);
                }
                wp_cache_set($cache_id, $content);
                return
//                    ($decode) ? base64_decode($content) :
                    $content;
            }
        }
        return null;
    }

    public static function get_all_iamg_posts()
    {
        $args = array(
            'post_type' => IAMG_POST_TYPE,
            'posts_per_page' => -1, // Get all posts
//        'post_status' => 'publish',
        );

        $query = new WP_Query($args);
        $posts_data = array();

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $post_id = get_the_ID();
                $title = get_the_title();
                $params = get_post_meta($post_id, 'presentation_parameters', true);
                $num_images = isset($params['images']) ? count($params['images']) : 0;
                $thumbnail_url = self::get_post_thumbnail($post_id, false)[0];
                $type = $params['type'];

                $local_id = get_post_meta($post_id, 'id_local', true);

                $posts_data[] = array(
                    'id' => $local_id,
                    'post_id' => $post_id,
                    'type' => $type,
                    'title' => $title,
                    'num_images' => $num_images,
                    'thumbnail_url' => $thumbnail_url,
                );
            }
            wp_reset_postdata();
        }

        return $posts_data;
    }

    public static function clear_post_history(
        $id
    ) {
        delete_post_meta($id, "presentation_history");
    }

    public static function render_post(
        $pres = null,
        $behaviour = "fixed",
        $parameters = null,
        $style_str = '',
        $direct_output = true
    ) {
        $post_id = get_the_ID();
        if (!$pres) {
            $pres = get_post_meta($post_id, "presentation", true);
        }
        if ($pres) {
            $encrypted = get_post_meta($post_id, "encrypted", true);
            if ($encrypted) {
                //we don't do direct decoding anymore, the client handles decoding
                require_once(IAMG_CLASSES_PATH . "IAMG_Client.php");
                $pres = (new IAMG_Client())->process_secure_presentation($pres, $encrypted);
            }
        }
        if (!$pres) {
            return "";
        }

        $attr_str = "";
        if ($parameters) {
            if (isset($parameters['style'])) {
                $attr_str = 'style="' . esc_attr(self::to_style_string($parameters['style'])) . '" ';
            }
            if (isset($parameters['width'])) {
                $attr_str = 'data-width="' . esc_attr($parameters['width']) . '" ';
            }

            if (isset($parameters['height'])) {
                $attr_str = 'data-height="' . esc_attr($parameters['height']) . '" ';
            }
            if (isset($parameters['resize-time'])) {
                $attr_str = 'resize-time="' . esc_attr($parameters['resize-time']) . '" ';
            }
        }

        if ($style_str) {
            $attr_str .= ' style="' . esc_attr($style_str) . '" ';
        }

//        $attr_str .= ' style="height:80vh;width:400px;margin-left:calc(50% - 200px)"';
//        $attr_str .= ' data-parent-attributes="data-align:full"';


        if ($direct_output) {
            echo '<div class="IA_Presenter_Container "'
                . ' behaviour="' . esc_attr($behaviour) . '"'
                . ' presentation="' . 'base64:' . esc_attr($pres) . '" '
                . $attr_str . //already escaped above
                '></div>';
        } else {
            $div = '<div class="IA_Presenter_Container "'
                . ' behaviour="' . esc_attr($behaviour) . '"'
                . ' presentation="' . 'base64:' . esc_attr($pres) . '" '
                . $attr_str . //already escaped
                '></div>';

            return $div;
        }

    }

    private static function to_style_string(
        $style = null
    ) {
        if (!$style) {
            return "";
        }
        $ret = "";
        foreach ($style as $style_name => $val) {
            $ret .= $style_name . ":" . $val . ";";
        }
        return $ret;
    }

    public function gallery_custom_columns(
        $columns
    ) {
        $var = array_slice($columns, 0, 1, true) +
            [IAMG_POST_TYPE . '_icon' => esc_html__('Icon', 'ia-magic-galleries')] +
            array_slice($columns, 1, null, true) +
            [
                IAMG_POST_TYPE . '_media_count' => esc_html__('Media', 'ia-magic-galleries'),
                IAMG_POST_TYPE . '_shortcode' => esc_html__('Shortcode', 'ia-magic-galleries')
            ];
        return $var;
//        return array_slice( $columns, 0, 1, true ) +
//            array( 'icon' => '' ) +
//            array_slice( $columns, 1, null, true ) +
//            array(
//                IAMG_POST_TYPE . '_template' => __( 'Template', 'ia-magic-galleries' ),
//                IAMG_POST_TYPE . '_count' => __( 'Media', 'ia-magic-galleries' ),
//                IAMG_POST_TYPE . '_shortcode' => __( 'Shortcode', 'ia-magic-galleries' ),
//                IAMG_POST_TYPE . '_usage' => __( 'Usage', 'ia-magic-galleries' ),
//            );
    }

    public function gallery_custom_column_content(
        $column
    ) {
        global $post;

        switch ($column) {

            case IAMG_POST_TYPE . '_media_count':
                $params = get_post_meta($post->ID, "presentation_parameters", true);

                if (!isset($params['images'])) {
                    esc_html_e("Empty Gallery", 'ia-magic-galleries');
                    break;
                }

                $num_images = count($params['images']);

                //translators: %d is the number of images in the gallery
                esc_html_e(sprintf(_n('%d image', '%d images', $num_images, 'ia-magic-galleries'), $num_images));
                break;

            case IAMG_POST_TYPE . '_shortcode':
//                break;
                $local_id = get_post_meta($post->ID, 'id_local', true);

                if (!$local_id) {
                    esc_html_e("No shortcode: Gallery is not defined", 'ia-magic-galleries');
                    break;
                }

                $shortcode = '[ia_magic_gallery id="' . $local_id . '"]';

                echo '<input type="text" readonly="readonly" style="border:none;" size="' .
                    esc_attr(strlen($shortcode))
//                    "35%"
                    . '" value="' . esc_attr($shortcode) . '" class="iamg-shortcode" />';

                $this->include_clipboard_script = true;

                break;
            case IAMG_POST_TYPE . '_icon':
                list($thumbnail, $thumbnail_id) = self::get_post_thumbnail($post->ID);

                if ($thumbnail) {
                    echo $thumbnail;
                } else {
                    echo "No image";
                }
                break;
        }
    }

    public static function get_post_thumbnail($post_id, $html = true)
    {
        //get the thumbnail form post attachemnt and create an image tag
        $thumbnail_id = get_post_thumbnail_id($post_id);
        $thumbnail = null;

        if ($thumbnail_id) {
            if ($html) {
                $thumbnail = wp_get_attachment_image($thumbnail_id, [50, 50]);
            } else {
                $thumbnail = wp_get_attachment_image_src($thumbnail_id, 'thumbnail')[0];
            }
        } else {
            // add the first image from the gallery as a thumbnail
            $settings = self::get_post_params($post_id);
            if (isset($settings['images'][0])) {
                $attachment_id = $settings['images'][0]['id'];
                if (!$attachment_id) {
                    // backward compatibility
                    $attachment_id = self::get_attachment_by_title($settings['images'][0]['title']);
                }
                if ($attachment_id && set_post_thumbnail($post_id, $attachment_id)) {
                    if ($html) {
                        $thumbnail = wp_get_attachment_image($attachment_id, [50, 50]);
                    } else {
                        $thumbnail = wp_get_attachment_image_src($thumbnail_id, 'thumbnail')[0];
                    }
                }
            }
        }
        return [$thumbnail, $thumbnail_id];
    }

    private static function get_attachment_by_title($title)
    {
        global $wpdb;
        $attachment_id = $wpdb->get_col($wpdb->prepare(
            "SELECT ID FROM $wpdb->posts WHERE post_title = %s AND post_type = 'attachment';",
            $title
        ));
        return isset($attachment_id[0]) ? (int)$attachment_id[0] : 0;
    }

    private
    function add_admin_styles()
    {
        $screen = get_current_screen();
//        echo "Screen-id " . $screen->id;
        if ($screen->id === 'edit-iamg') {
            $custom_inline_styles = "
                #iamg_media_count{
                    width: 8%;
                }
                #iamg_shortcode{
                    width: 40%;
                }
                #iamg_icon{
                    width: 10%;
                }
              ";
            wp_add_inline_style(IAMG_POST_TYPE . '_base-styles', $custom_inline_styles);
        }
    }

    /**
     *
     */
    public
    function enque_admin_styles()
    {
        wp_enqueue_style(IAMG_POST_TYPE . '_base-styles', IAMG_URL . 'css/iamg-base.css', array(), IAMG_VERSION);
        $this->add_admin_styles();
    }

    public
    function include_clipboard_script()
    {
        if ($this->include_clipboard_script) {
            if (!function_exists('get_background_color')) {
                require_once(ABSPATH . 'wp-admin/includes/template.php');
            }
            $color = get_background_color();
            if (!$color) {
                $color = "white";
            }
            ?>
            <script>
                jQuery(function ($) {
                    $('.iamg-shortcode').on('click', function () {
                        try {
                            // Select the contents
                            const content = this.value;


                            // Replace ] with height = "100"]
                            let modifiedContent = content.replace(']', ' height="100" height-type="percent" background-opacity ="0" background-color="<?php echo $color; ?>"]');

                            // Create a temporary textarea to hold the content
                            var tempTextArea = document.createElement('textarea');
                            tempTextArea.value = modifiedContent;
                            document.body.appendChild(tempTextArea);

                            // Select the modified content
                            tempTextArea.select();

                            // Copy the selection
                            document.execCommand('copy');

                            // Remove the temporary textarea
                            document.body.removeChild(tempTextArea);

                            // Show the copied message
                            $('.iamg-shortcode-message').remove();
                            $(this).after('<p class="iamg-shortcode-message"><?php esc_html_e("Shortcode copied to clipboard!",
                                "ia-magic-galleries"); ?></p>');
                        } catch (err) {
                            console.log('Oops, unable to copy!');
                        }
                    });
                });
            </script>
            <?php
        }
    }

    public
    function remove_custom_fields_meta_box()
    {
        remove_meta_box('postcustom', IAMG_POST_TYPE, 'normal');
    }
}

new IAMG_posttype();





