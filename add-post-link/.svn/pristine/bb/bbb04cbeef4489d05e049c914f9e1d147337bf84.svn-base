<?php
/*
  Plugin Name: Add Post Link
  Plugin URI: http://beek.jp/plugins/add-post-link/
  Description: Add shortcode any post link to content.
  Version: 1.2.0
  Author: Satoshi Yoshida
  Author URI: http://beek.jp
  License: GPLv2 or later
 */
/*  Copyright 2015 Satoshi Yoshida (email : yos.3104@gmail.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

class AddPostLink {

    function __construct() {
        add_action('admin_menu', array($this, 'add_pages'));
    }

    function add_pages() {
        add_submenu_page('plugins.php', __('Add Post Link', 'add-post-link'), __('Add Post Link', 'add-post-link'), 'level_8', __FILE__, array($this, 'setting_view'));
    }

    function setting_view() {
        $post_settings = filter_input(INPUT_POST, "add_post_link_settings", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        if (!is_null($post_settings)) {
            check_admin_referer('add_post_link_settings');
            update_option('add_post_link_settings', $post_settings);
            ?><div class="updated fade"><p><strong><?php _e('Settings saved.', 'add-post-link'); ?></strong></p></div><?php
        }
        ?>
        <form class="apl-admin-content" action="" method="post">
            <?php
            wp_nonce_field('add_post_link_settings');
            $settings = get_option('add_post_link_settings');
            $apl_grid_element = isset($settings['grid_element']) ? esc_html($settings['grid_element']) : $this->get_apl_grid_element();
            $apl_grid_border_color = isset($settings['grid_border_color']) ? esc_html($settings['grid_border_color']) : $this->get_apl_grid_border_color();
            $apl_grid_bg_color = isset($settings['grid_bg_color']) ? esc_html($settings['grid_bg_color']) : $this->get_apl_grid_bg_color();
            $apl_title_element = isset($settings['title_element']) ? esc_html($settings['title_element']) : $this->get_apl_title_element();
            $apl_title_color = isset($settings['title_color']) ? esc_html($settings['title_color']) : $this->get_apl_title_color();
            $apl_title_border_light_color = isset($settings['title_border_light_color']) ? esc_html($settings['title_border_light_color']) : $this->get_apl_title_border_light_color();
            $apl_title_border_dark_color = isset($settings['title_border_dark_color']) ? esc_html($settings['title_border_dark_color']) : $this->get_apl_title_border_dark_color();
            $apl_text_color = isset($settings['text_color']) ? esc_html($settings['text_color']) : $this->get_apl_text_color();
            $apl_text_length = isset($settings['text_length']) ? esc_html($settings['text_length']) : $this->get_apl_text_length();
            $apl_btn_border_color = isset($settings['btn_border_color']) ? esc_html($settings['btn_border_color']) : $this->get_apl_btn_border_color();
            $apl_btn_bg_color = isset($settings['btn_bg_color']) ? esc_html($settings['btn_bg_color']) : $this->get_apl_btn_bg_color();
            $apl_btn_text = isset($settings['btn_text']) ? esc_html($settings['btn_text']) : $this->get_apl_btn_text();
            $apl_btn_text_color = isset($settings['btn_text_color']) ? esc_html($settings['btn_text_color']) : $this->get_apl_btn_text_color();
            ?>
            <h2 class=""><?php _e('Add Post Link Settings', 'add-post-link'); ?></h2>
            <section class="">
                <table>
                    <tr><th><h3 class=""><?php _e('Shortcode Example', 'add-post-link'); ?></h3></th><td><input class="" type="text" value="[add_post_link post_id='1,23,456']" onclick="this.select(0, this.value.length);" readonly="readonly"></td></tr>
                    <tr><th><h3 class=""><?php _e('Grid Element Type', 'add-post-link'); ?></h3></th><td><select name="add_post_link_settings[grid_element]" type="text"><option<?php ($apl_grid_element == 'section') ? print ' selected ' : print ''; ?> value="section"><?php _e('Section', 'add-post-link'); ?></option><option<?php ($apl_grid_element == 'div') ? print ' selected ' : print ''; ?> value="div"><?php _e('Div', 'add-post-link'); ?></option><option<?php ($apl_grid_element == 'article') ? print ' selected ' : print ''; ?> value="article"><?php _e('Article', 'add-post-link'); ?></option></select></td></tr>
                    <tr><th><h3 class=""><?php _e('Grid Border Color', 'add-post-link'); ?></h3></th><td><input class="" name="add_post_link_settings[grid_border_color]" type="color" value="<?php echo $apl_grid_border_color; ?>" placeholder="#999999"></td></tr>
                    <tr><th><h3 class=""><?php _e('Grid Background Color', 'add-post-link'); ?></h3></th><td><input class="" name="add_post_link_settings[grid_bg_color]" type="color" value="<?php echo $apl_grid_bg_color; ?>" placeholder="#FFFFFF"></td></tr>
                    <tr><th><h3 class=""><?php _e('Title Element Type', 'add-post-link'); ?></h3></th><td><select name="add_post_link_settings[title_element]" type="text"><option<?php ($apl_title_element == 'h2') ? print ' selected ' : print ''; ?> value="h2"><?php _e('h2', 'add-post-link'); ?></option><option<?php ($apl_title_element == 'h3') ? print ' selected ' : print ''; ?> value="h3"><?php _e('h3', 'add-post-link'); ?></option><option<?php ($apl_title_element == 'h4') ? print ' selected ' : print ''; ?> value="h4"><?php _e('h4', 'add-post-link'); ?></option></select></td></tr>
                    <tr><th><h3 class=""><?php _e('Title Color', 'add-post-link'); ?></h3></th><td><input class="" name="add_post_link_settings[title_color]" type="color" value="<?php echo $apl_title_color; ?>" placeholder="#222222"></td></tr>
                    <tr><th><h3 class=""><?php _e('Title Border Light Color', 'add-post-link'); ?></h3></th><td><input class="" name="add_post_link_settings[title_border_light_color]" type="color" value="<?php echo $apl_title_border_light_color; ?>" placeholder="#DDDDDD"></td></tr>
                    <tr><th><h3 class=""><?php _e('Title Border Dark Color', 'add-post-link'); ?></h3></th><td><input class="" name="add_post_link_settings[title_border_dark_color]" type="color" value="<?php echo $apl_title_border_dark_color; ?>" placeholder="#222222"></td></tr>
                    <tr><th><h3 class=""><?php _e('Text Color', 'add-post-link'); ?></h3></th><td><input class="" name="add_post_link_settings[text_color]" type="color" value="<?php echo $apl_text_color; ?>" placeholder="#222222"></td></tr>
                    <tr><th><h3 class=""><?php _e('Text Length', 'add-post-link'); ?></h3></th><td><input class="" name="add_post_link_settings[text_length]" type="number" min="50" max="999" value="<?php echo $apl_text_length; ?>" placeholder="100"></td></tr>
                    <tr><th><h3 class=""><?php _e('More Button Border Color', 'add-post-link'); ?></h3></th><td><input class="" name="add_post_link_settings[btn_border_color]" type="color" value="<?php echo $apl_btn_border_color; ?>" placeholder="#222222"></td></tr>
                    <tr><th><h3 class=""><?php _e('More Button Background Color', 'add-post-link'); ?></h3></th><td><input class="" name="add_post_link_settings[btn_bg_color]" type="color" value="<?php echo $apl_btn_bg_color; ?>" placeholder="#222222"></td></tr>
                    <tr><th><h3 class=""><?php _e('More Button Text', 'add-post-link'); ?></h3></th><td><input class="" name="add_post_link_settings[btn_text]" type="text" value="<?php echo $apl_btn_text; ?>" placeholder="Read more"></td></tr>
                    <tr><th><h3 class=""><?php _e('More Button Text Color', 'add-post-link'); ?></h3></th><td><input class="" name="add_post_link_settings[btn_text_color]" type="color" value="<?php echo $apl_btn_text_color; ?>" placeholder="#222222"></td></tr>
                </table>
            </section>
            <p class="submit"><input type="submit" name="Submit" class="button-primary" value="<?php _e('Save', 'add-post-link'); ?>"></p>
        </form>
        <?php
    }

    function get_apl_grid_element() {
        $option = get_option('add_post_link_settings');
        return isset($option['grid_element']) ? $option['grid_element'] : 'div';
    }

    function get_apl_grid_bg_color() {
        $option = get_option('add_post_link_settings');
        return isset($option['grid_bg_color']) ? $option['grid_bg_color'] : '#FFFFFF';
    }

    function get_apl_grid_border_color() {
        $option = get_option('add_post_link_settings');
        return isset($option['grid_border_color']) ? $option['grid_border_color'] : '#999999';
    }

    function get_apl_title_element() {
        $option = get_option('add_post_link_settings');
        return isset($option['title_element']) ? $option['title_element'] : 'h3';
    }

    function get_apl_title_color() {
        $option = get_option('add_post_link_settings');
        return isset($option['title_color']) ? $option['title_color'] : '#222222';
    }

    function get_apl_title_border_light_color() {
        $option = get_option('add_post_link_settings');
        return isset($option['title_border_light_color']) ? $option['title_border_light_color'] : '#DDDDDD';
    }

    function get_apl_title_border_dark_color() {
        $option = get_option('add_post_link_settings');
        return isset($option['title_border_dark_color']) ? $option['title_border_dark_color'] : '#222222';
    }

    function get_apl_text_color() {
        $option = get_option('add_post_link_settings');
        return isset($option['text_color']) ? $option['text_color'] : '#222222';
    }

    function get_apl_text_length() {
        $option = get_option('add_post_link_settings');
        return isset($option['text_length']) ? $option['text_length'] : '100';
    }

    function get_apl_btn_border_color() {
        $option = get_option('add_post_link_settings');
        return isset($option['btn_border_color']) ? $option['btn_border_color'] : '#222222';
    }

    function get_apl_btn_bg_color() {
        $option = get_option('add_post_link_settings');
        return isset($option['btn_bg_color']) ? $option['btn_bg_color'] : '#FFFFFF';
    }

    function get_apl_btn_text() {
        $option = get_option('add_post_link_settings');
        return isset($option['btn_text']) ? $option['btn_text'] : 'Read more';
    }

    function get_apl_btn_text_color() {
        $option = get_option('add_post_link_settings');
        return isset($option['btn_text_color']) ? $option['btn_text_color'] : '#222222';
    }

    function create_links($args) {
        extract($args);
        $ids = array_map('trim', explode(',', $post_ids));
        $cat_ids = array_map('trim', explode(',', $cat_ids));
        $cpts = array_map('trim', explode(',', $cpt));
        $res = $this->create_link($ids, $cat_ids, $cat_name, $search, $cnt, $cpts);
        return $res;
    }

    function create_link($ids, $cat_ids, $cat_name, $search, $cnt, $cpts) {
        $args = array();
		$args['post_type'] = array_merge(array('post', 'page'),$cpts);
        if (count(array_filter($ids)) > 0) {
            $args['post__in'] = $ids;
        }
        if (count(array_filter($cat_ids)) > 0) {
            $args['category__in'] = $cat_ids;
        }
        if ($cat_name != '') {
            $args['category_name'] = trim($cat_name);
        }
        if ($search != '') {
            $args['s'] = trim($search);
        }
        if (is_numeric($cnt) && $cnt > 0) {
            $args['posts_per_page'] = trim($cnt);
        } else {
            $args['posts_per_page'] = 99;
        }
        $q = new WP_Query($args);
        if ($q->have_posts()) {
            while ($q->have_posts()) {
				$q->the_post();
                if (has_post_thumbnail()) {
                    $res .= '<' . $this->get_apl_grid_element() . ' class="add-post-link has-thumbnail">';
                    $res .= '<div class="add-post-link-thumbnail">';
                    $image_id = get_post_thumbnail_id();
                    $image_url = wp_get_attachment_image_src($image_id, true);
                    $res .= '<a href="' . get_the_permalink() . '" title="' . get_the_title() . '">';
                    $res .= '<img src="' . $image_url[0] . '" alt="">';
                    $res .= '</a>';
                    $res .= '</div>';
                    $res .= '<div class="add-post-link-description">';
                    $res .= '<a href="' . get_the_permalink() . '" title="' . get_the_title() . '">';
                    $res .= '<' . $this->get_apl_title_element() . ' class="add-post-link-title">' . get_the_title() . '</' . $this->get_apl_title_element() . '>';
                    $res .= '</a>';
                    $res .= '<a href="' . get_the_permalink() . '" title="' . get_the_title() . '">';
                    $res .= '<p class="add-post-link-excerpt">' . wp_html_excerpt(strip_shortcodes(get_the_content()), $this->get_apl_text_length(), '...') . '</p>';
                    $res .= '</a>';
                    $res .= '<p class="add-post-link-more"><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . $this->get_apl_btn_text() . '</a></p>';
                    $res .= '</div>';
                } else {
                    $res .= '<' . $this->get_apl_grid_element() . ' class="add-post-link">';
                    $res .= '<div class="add-post-link-description">';
                    $res .= '<a href="' . get_the_permalink() . '" title="' . get_the_title() . '">';
                    $res .= '<' . $this->get_apl_title_element() . ' class="add-post-link-title">' . get_the_title() . '</' . $this->get_apl_title_element() . '>';
                    $res .= '</a>';
                    $res .= '<a href="' . get_the_permalink() . '" title="' . get_the_title() . '">';
                    $res .= '<p class="add-post-link-excerpt">' . wp_html_excerpt(strip_shortcodes(get_the_content()), $this->get_apl_text_length(), '...') . '</p>';
                    $res .= '</a>';
                    $res .= '<p class="add-post-link-more"><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . $this->get_apl_btn_text() . '</a></p>';
                    $res .= '</div>';
                }
                $res .= '</' . $this->get_apl_grid_element() . '>';
            }
        }
		wp_reset_postdata();
        return $res;
    }

}

$apl_obj = new AddPostLink();

function load_add_post_link_textdomain() {
    load_plugin_textdomain('add-post-link', FALSE, basename(dirname(__FILE__)) . '/languages');
}

add_action('plugins_loaded', 'load_add_post_link_textdomain');

function add_post_link($atts) {
    $args = shortcode_atts(
            array('post_ids' => '', 'cat_ids' => '', 'cat_name' => '', 'search' => '', 'cnt' => '5', 'cpt' => ''), $atts, 'add_post_link'
    );
    $obj = new AddPostLink();
    return $obj->create_links($args);
}

add_shortcode('add_post_link', 'add_post_link');

function add_post_link_enqueue_files() {
    wp_register_style('add-post-link', plugins_url('', __FILE__) . '/css/style.css', array(), '1.0.0');
    wp_enqueue_style('add-post-link');
}

add_action('wp_enqueue_scripts', 'add_post_link_enqueue_files');
add_action('admin_enqueue_scripts', 'add_post_link_enqueue_files');

function add_post_link_output_style() {
    $obj = new AddPostLink();
    echo '<style>';
    echo '.add-post-link { border-color: ' . $obj->get_apl_grid_border_color() . '; background-color: ' . $obj->get_apl_grid_bg_color() . '}';
    echo '.add-post-link .add-post-link-description .add-post-link-title { color: ' . $obj->get_apl_title_color() . '; border-color: ' . $obj->get_apl_title_border_light_color() . ';}';
    echo '.add-post-link .add-post-link-description .add-post-link-title:after { background-color: ' . $obj->get_apl_title_border_dark_color() . '; }';
    echo '.add-post-link .add-post-link-description p { color: ' . $obj->get_apl_text_color() . '; }';
    echo '.add-post-link .add-post-link-description .add-post-link-more a { border-color: ' . $obj->get_apl_btn_border_color() . '; background-color: ' . $obj->get_apl_btn_bg_color() . '; color: ' . $obj->get_apl_btn_text_color() . ';}';
    echo '</style>';
}

add_action('wp_head', 'add_post_link_output_style');

