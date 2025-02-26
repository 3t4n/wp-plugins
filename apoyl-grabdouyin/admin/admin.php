<?php
/*
 * @link  
 * @since 1.0.0
 * @package APOYL_GRABDOUYIN
 * @subpackage APOYL_GRABDOUYIN/admin
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
class Apoyl_Grabdouyin_Admin
{

    private $plugin_name;

    private $version;

    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function enqueue_styles()
    {
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/admin.css', array(), $this->version, 'all');
    }

    public function enqueue_scripts()
    {
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/admin.js', array(
            'jquery'
        ), $this->version, false);
    }

    public function links($alinks)
    {
        $links[] = '<a href="' . esc_url(get_admin_url(null, 'options-general.php?page=apoyl-grabdouyin-settings')) . '">' . __('settingsname', 'apoyl-grabdouyin') . '</a>';
        $alinks = array_merge($links, $alinks);
        
        return $alinks;
    }

    public function menu()
    {
        add_options_page(__('settings', 'apoyl-grabdouyin'), __('settings', 'apoyl-grabdouyin'), 'manage_options', 'apoyl-grabdouyin-settings', array(
            $this,
            'settings_page'
        ));
    }

    public function settings_page()
    {
        global $wpdb;
        $options_name = 'apoyl-grabdouyin-settings';
        require_once plugin_dir_path(__FILE__) . 'partials/setting.php';
    }

    public function post_editor_meta_box()
    {
        $options_name = 'apoyl-grabdouyin-settings';
        $arr = get_option($options_name);
        if ($arr['open'])
            add_meta_box('apoyl-grabdouyin-editor-url', __('editor-url-title', 'apoyl-grabdouyin'), array(
                $this,
                'editor_url'
            ), 'post');
    }
    public function editor_url()
    {
        require_once plugin_dir_path(__FILE__) . 'partials/editorsetting.php';
    }
    public function apoyl_grabdouyin_ajax()
    {
        $options_name = 'apoyl-grabdouyin-settings';
        $arr = get_option($options_name);

        if (isset($_POST['apoyl-grabdouyin-wpnonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['apoyl-grabdouyin-wpnonce'])),'apoyl-grabdouyin-ajax')) {
            $url = sanitize_url($_POST['apoyl_grabdouyin_url']);
            $data = $this->httpGet($url);
            preg_match_all('/\<meta\s*name="lark:url:video_title"\s*content="(.*)".*\>/i', $data, $matchs);

            if (isset($matchs[1][0]))
                $title = trim($matchs[1][0]);

            preg_match_all('/\<article\s*class\=\"syl-article-base.*?\"\>(.*)\<\/article\>/i', $data, $gmatchs);
            if (isset($gmatchs[1][0])) {
                $content = trim($gmatchs[1][0]);

            }

            if ($title || $content) {
                echo wp_json_encode(array(
                    'post_title' => esc_attr($title),
                    'content' => wp_kses_post($content)
                ));
                exit();
            }
        }

     
    }

    private function httpGet($url, $param = array())
    {
        $res = wp_remote_retrieve_body(wp_remote_get($url, array(
            'timeout' => 120,
            'body' => $param,

        )));

        return $res;
    }

}
