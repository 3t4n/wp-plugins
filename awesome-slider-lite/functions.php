<?php
/**
 * Plugin Name: Awesome Slider Lite
 * Plugin URI: http://www.webzotech.com/awesomelite
 * Description: A WordPress Slider Plugin. It's just awesome.
 * Version: 1.0
 * Author: Taraprasad Swain
 * Author URI: http://www.taraprasad.com
 */
/*  Copyright 2007-2014 Taraprasad Swain (email: swain.tara@gmail.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

include('awconfig.php');
include('includes/common-functions.php');

add_action('admin_menu', 'register_my_custom_menu_page');

add_action('init', 'aw_init');

add_action('admin_enqueue_scripts', 'awe_admin_script');

add_action('wp_enqueue_scripts', 'awe_frontend_script');

add_action('wp_ajax_awesomeajax', 'awesome_ajax');

add_action('wp_ajax_awesomeajaxnopriv', 'awesome_ajax');
add_action('wp_ajax_nopriv_awesomeajaxnopriv', 'awesome_ajax');

add_shortcode('awslider', 'awslider_func');

add_shortcode('awslide', 'awslide_func');

add_action('template_redirect', 'aw_change_preview_url_rewrite');

add_action('init', 'add_aw_preview_end_point');
add_filter('query_vars', 'add_aw_preview_query_vars');

function aw_change_preview_url_rewrite() {
    $post_type = get_post_type();
    if (get_query_var('awesome-preview')) {
        show_admin_bar(false);
        $id = (int)get_query_var('awesome-preview');
        wp_head();
        echo '<style>html {margin-top: 0px !important;}</style>';
        echo do_shortcode('[awslide id="preview:' . $id . '"]');
        wp_footer();
        exit();
    }
}

function add_aw_preview_end_point() {
    add_rewrite_endpoint('awesome-preview', EP_ALL | EP_PAGES);
    flush_rewrite_rules();
}

function add_aw_preview_query_vars($query_vars) {
    $query_vars[] = 'awesome-preview';
    flush_rewrite_rules();
    return $query_vars;
}

function awslide_func($at = array(), $content = '') {
    $sliderid = isset($at['id']) ? $at['id'] : '';
    include('views/awslider.php');
}

function awslider_func($at = array(), $content = '') {
    $sliderid = isset($at['id']) ? (int) $at['id'] : '';
    if ($sliderid == '' or $sliderid == '0') {
        echo 'Invalid Slider ID';
        return;
    }
    include('views/awslider.php');
}

function awesome_ajax() {
    $rtype = isset($_POST['request_type']) ? $_POST['request_type'] : '';

    if ($rtype != '') {
        if (file_exists(AW_INCLUDES_ROOT . "ajax-$rtype.php")) {
            include("includes/ajax-$rtype.php");
        } else {
            echo "Invalid Request Type";
        }
    } else {
        echo "Invalid Request";
    }
    die();
}

function aw_parse_css($custom_css = '') {
    $pattern_one = '/(?<=\{)(.*?)(?=\})/s';
    $pattern_two = '/[\.][\w]([:\w]+?)+/';
    $stripped = preg_replace($pattern_one, '', $custom_css);
    $selectors = array();
    preg_match_all($pattern_two, $stripped, $selectors);
    return str_replace('.', '', $selectors[0]);
}

function awe_admin_script() {
    $pluginurl = plugin_dir_url(__FILE__);

    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');

    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-slider');
    wp_enqueue_script('jquery-ui-resizable');
    wp_enqueue_script('jquery-ui-draggable');
    wp_enqueue_script('jquery-ui-sortable');
    wp_enqueue_script('jquery-ui-autocomplete');

    wp_enqueue_media();

    wp_enqueue_style('jquery-style', $pluginurl . 'css/jquery-ui.css');

    wp_enqueue_script('awadminscript', $pluginurl . 'js/awadminscript.min.js');

    wp_enqueue_script('jquery-textfill', $pluginurl . 'js/jquery.textfill.js');

    wp_enqueue_script('jquery-json', $pluginurl . 'js/jquery.json-2.4.min.js');

    wp_enqueue_script('ace-builds-lib', $pluginurl . 'src-min-noconflict/ace.js');

    wp_enqueue_script('jqueryserializeobj', $pluginurl . 'js/jquery.serializeObject.js', array('jquery'));
    wp_enqueue_style('admin-css', $pluginurl . 'css/admin.css');
    wp_enqueue_style('awe-custom-css', $pluginurl . 'css/awstyles.css');
    wp_enqueue_style('font-awesome', $pluginurl . 'css/font-awesome.css');
    ?>
    <script type="text/javascript">
        var AW_IMAGES = '<?php echo AW_IMAGES; ?>';
        var aw_css_arr = ["<?php echo join('", "', aw_parse_css(file_get_contents(AW_URL . 'css/awstyles.css'))); ?>"];
        var aw_slider_custom_css = '<?php echo plugins_url('/css/awstyles.css', __FILE__); ?>';
        var aw_admin_view = '<?php echo AW_URL; ?>admin-views/';
        var aw_preview_url = '<?php echo home_url(); ?>/?awesome-preview=';
    </script>
    <?php
}

function awe_frontend_script() {
    $pluginurl = plugin_dir_url(__FILE__);

    wp_enqueue_style('awesomestyles', $pluginurl . 'css/awesome.styles.css');
    wp_enqueue_style('awe-custom-front-css', $pluginurl . 'css/awstyles.css');
    wp_enqueue_style('font-awesome', $pluginurl . 'css/font-awesome.css');

    wp_enqueue_script('jquery');

    wp_enqueue_script('awyoutubeapi', 'http://www.youtube.com/iframe_api');

    wp_enqueue_script('awvimeoapi', 'http://a.vimeocdn.com/js/froogaloop2.min.js');

    wp_enqueue_script('jquery-effects-blind');
    wp_enqueue_script('jquery-effects-bounce');
    wp_enqueue_script('jquery-effects-clip');
    wp_enqueue_script('jquery-effects-explode');

    wp_enqueue_script('jqueryjson', $pluginurl . 'js/jquery.json-2.4.min.js', array('jquery'), false, true);

    //$rnd = rand(111111, 999999);

    wp_enqueue_script('jqueryawesomeslider', $pluginurl . 'js/jquery.awesomeslider.min.js', array('jquery'), '1.0', true);

    wp_enqueue_script('jqueryplax', $pluginurl . 'js/plax.min.js', array('jquery'), false, true);
    wp_enqueue_script('jquerypauseresume', $pluginurl . 'js/jquery.pause.min.js', array('jquery'), false, true);
    wp_enqueue_script('jqueryeasing', $pluginurl . 'js/jquery.easing.1.3.js', array('jquery'), false, true);
    wp_enqueue_script('imagesloadedgkgd', $pluginurl . 'js/imagesloaded.pkgd.min.js', array('jquery'), false, true);
    wp_enqueue_script('jquerytouchswipe', $pluginurl . 'js/jquery.touchSwipe.min.js', array('jquery'), false, true);
    ?>
    <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    </script>
    <?php
}

function register_my_custom_menu_page() {
    add_menu_page('Awe Slides', 'Awe Slides', 'manage_options', 'aweslides', 'aweslides_page');
    add_menu_page('Awe Sliders', 'Awe Sliders', 'manage_options', 'awesliders', 'awesliders_page');
}

function aw_init() {
    $args = array(
        'public' => false,
        'exclude_from_search' => true,
        'show_in_nav_menus' => false,
        'show_in_menu' => false,
        'show_in_admin_bar' => false,
        'can_export' => false,
        'label' => 'Books',
        'show_ui' => false
    );

    register_post_type('awesomeslide', $args);

    register_post_type('awesomeslider', $args);
}

function aweslides_page() {
    include('admin-views/slides.php');
}

function awesliders_page() {
    include('admin-views/sliders.php');
}

function aw_get_sliders() {
    $args = array(
        'post_type' => 'awesomeslider'
    );
    $loop = new WP_Query($args);
    return $loop->posts;
}

function aw_get_slides() {
    $args = array(
        'post_type' => 'awesomeslide'
    );
    $loop = new WP_Query($args);
    return $loop->posts;
}
