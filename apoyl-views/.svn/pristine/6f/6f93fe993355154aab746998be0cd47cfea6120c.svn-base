<?php

/*
 * @link
 * @since 1.0.0
 * @package Apoyl_Views
 * @subpackage Apoyl_Views/public
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
class Apoyl_Views_Public
{

    private $plugin_name;

    private $version;

    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function enqueue_scripts()
    {
        wp_enqueue_script('jquery');
    }
    public function views_count()
    {

        if (is_singular()) {
            global $post;
            $arr = get_option('apoyl-views-settings');
            if (isset($post->ID)&&$post->ID>0&&$arr['open']) {
                $key='apoyl_views_count';
                $post_views = (int)get_post_meta($post->ID, $key, true);
                if (!update_post_meta($post->ID, $key, ($post_views + 1))) {
                    add_post_meta($post->ID, $key, 1, true);
                }
            }
        }
    }

    public function display_count($content)
    {
        $str= '' ;
        $arr = get_option('apoyl-views-settings');
        if (is_single()&&$arr['open']&&$arr['openviewcount']) {
            $count_key = 'apoyl_views_count';
            $aid = get_the_ID();
            $count = (int)get_post_meta($aid, $count_key, true);
            $str= '<div>' . esc_html__('viewscount','apoyl-views').':<span id="apoyl_views_mod"  data-post-id="'.$aid.'">' . $count . '</span></div>' ;
        }
        return $str. $content;
    }
    public function footer()
    {

        $arr = get_option('apoyl-views-settings');
        if ($arr['openeditcount']&&is_user_logged_in() && current_user_can('manage_options')) {

            $file=apoyl_views_file('modbefore');
            if($file){
                include $file;
            }
        }
    }

    public function apoyl_views_ajax()
    {
        $file=apoyl_views_file('mod');
        if($file){
            include $file;
        }
    }


}