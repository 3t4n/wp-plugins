<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.wpmaniax.com
 * @since      1.0.0
 *
 * @package    Jumbo_Share
 * @subpackage Jumbo_Share/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Jumbo_Share
 * @subpackage Jumbo_Share/public
 * @author     WP Maniax <plugins@wpmaniax.com>
 */
class Jumbo_Share_Public
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string $plugin_name The name of the plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $default_settings = 'a:12:{s:26:"settings_networks_facebook";s:8:"facebook";s:25:"settings_networks_twitter";s:7:"twitter";s:24:"settings_networks_google";s:6:"google";s:26:"settings_networks_linkedin";s:8:"linkedin";s:24:"settings_networks_reddit";s:6:"reddit";s:24:"settings_position_before";s:1:"0";s:23:"settings_position_after";s:5:"after";s:21:"settings_show_on_home";s:1:"0";s:22:"settings_show_on_pages";s:1:"0";s:22:"settings_show_on_posts";s:5:"posts";s:25:"settings_show_on_archives";s:1:"0";s:19:"settings_cache_time";s:2:"60";}';
        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->settings = wpsf_get_settings('jumboshare');
        if($this->settings == '') $this->settings = unserialize($default_settings);
        add_shortcode('jumbo-share', array($this, 'jumbo_share_shortcut'));

    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Jumbo_Share_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Jumbo_Share_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/jumbo-share-public.css', array(), $this->version, 'all');
        wp_enqueue_style('font-awesome', plugin_dir_url(__FILE__) . 'css/font-awesome.min.css');

    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Jumbo_Share_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Jumbo_Share_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/jumbo-share-public.js', array('jquery'), $this->version, false);
        wp_localize_script($this->plugin_name, 'jumbo_share', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'post_id' => get_the_ID(),
            'loader_img' => plugin_dir_path(dirname(__FILE__)) . 'public/img/loader.gif'
        ));

    }

    public function render_jumboshare_html($content)
    {
        //echo "<pre>"; print_r($this->settings); echo "</pre>";
        $markup = $this->render_jumboshare_html_bar();

        if (is_home() && $this->settings['settings_show_on_home'] != 'home') $markup = '';
        if (is_page() && $this->settings['settings_show_on_pages'] != 'pages') $markup = '';
        if (is_single() && $this->settings['settings_show_on_posts'] != 'posts') $markup = '';
        if (is_archive() && $this->settings['settings_show_on_archives'] != 'archives') $markup = '';

        if ($this->settings['settings_position_before'] == 'before') {
            $content = $markup . $content;
        }
        if ($this->settings['settings_position_after'] == 'after') {
            $content .= $markup;
        }
        return $content;
    }

    public function render_jumboshare_html_bar()
    {
        global $post;
        $id = $post->ID;
        //echo "<pre>"; print_r($this->settings); echo "</pre>";
        $links = $this->helper->get_share_links();
        ob_start();
        ?>
        <div class="jumbo-share-count">
            <img class="jumbo-share-loader" id="jumbo_share_loader_<?php echo $id ?>"
                 style="display: none; margin: 30px"
                 src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'public/img/loader.gif' ?>">
            <em class="jumbo_share_counter" data-id="<?php echo $id ?>" data-url="<?php echo urlencode(get_permalink($id)) ?>"
                id="jumbo_share_counter_<?php echo $id ?>" style="color:<?php echo $this->settings['settings_counter_color']; ?>">0</em>

            <div class="caption">Shares</div>
        </div>
        <div class="js-buttons">
            <?php if ($this->settings['settings_networks_facebook'] == 'facebook'): ?>
                <a class='js-button facebook' rel="nofollow" href="<?php echo $links['facebook'] ?>" target="_blank">
                    <i class='fa fa-facebook'></i>

                    <div>Share <span class="extended-text">on Facebook</span></div>
                </a>
            <?php endif; ?>
            <?php if ($this->settings['settings_networks_twitter'] == 'twitter'): ?>
                <a class='js-button twitter' rel="nofollow" href="<?php echo $links['twitter'] ?>" target="_blank">
                    <i class='fa fa-twitter'></i>

                    <div>Share <span class="extended-text">on Twitter</span></div>
                </a>
                <?php
            endif;
            $networks = array('google', 'reddit', 'linkedin');
            foreach ($networks as $network):
                if ($this->settings['settings_networks_' . $network] != $network) continue;
                ?>
                <a class='js-button js-small <?php echo $network ?> js-additional' style="display: none"
                   href="<?php echo $links[$network] ?>" target="_blank">
                    <i class='fa fa-<?php echo $network ?>'></i>
                </a>
            <?php endforeach ?>
            <a class='js-button js-small jumbo-share-toggle'>
                <i class='fa fa-plus'></i>
            </a>
            <a class='js-button js-small jumbo-share-toggle' style="display: none">
                <i class='fa fa-minus'></i>
            </a>
        </div>
        <?php
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    public function jumbo_share_shortcut()
    {
        return $this->render_jumboshare_html_bar();
    }

    public function  jumbo_share_footer()
    {
        if (is_home() && $this->settings['settings_show_on_home'] != 'home') return;
        if (is_page() && $this->settings['settings_show_on_pages'] != 'pages') return;
        if (is_single() && $this->settings['settings_show_on_posts'] != 'posts') return;
        if (is_archive() && $this->settings['settings_show_on_archives'] != 'archives') return;
        echo $this->render_jumboshare_html_bar();
    }

    public function jumbo_share_stats()
    {
        $post_id = $_REQUEST['post_id'];
        $url = get_permalink($post_id);
        // FOR TEST ONLY
        if($post_id == 9) $url = urlencode('http://mashable.com/2015/11/20/red-dwarf-star-flares/');
              else        $url = urlencode('http://mashable.com/2015/11/20/cybersecurity-encryption-mashtalk/');
        $url = urlencode('http://www.windows10compatible.com/blog/how-to-troubleshoot-internet-connectivity-in-windows-10/');
        // END FOR TEST ONLY

        if ($this->settings['settings_cache_time'] > 1) {
            if (false === ($jumbo_share_data = get_transient('jumbo_share_' . $post_id))) {
                $jumbo_share_data = $this->get_share_count($url);
                set_transient('jumbo_share_' . $post_id, $jumbo_share_data, $this->settings['settings_cache_time']*60);
            }
        } else {
            delete_transient('jumbo_share_' . $post_id);
            $jumbo_share_data = $this->get_share_count($url);
        }
        echo $jumbo_share_data;
        wp_die();
    }

    private function get_share_count($url)
    {
        $json_string = @file_get_contents('http://graph.facebook.com/?id=' . $url);
        $json = json_decode($json_string, true);
        $fb_shares = intval($json['shares']);

        $tw_shares = 0;
        /*$json_string = @file_get_contents('http://cdn.api.twitter.com/1/urls/count.json?url=' . $url . '&callback=?');
        $json = json_decode($json_string, true);
        $tw_shares = intval($json['count']);*/

        $json_string = @file_get_contents('http://www.linkedin.com/countserv/count/share?url=' . $url . '&format=json');
        $json = json_decode($json_string, true);
        $ln_shares = intval($json['count']);

        // Google Plus
        $google_request = @file_get_contents('https://plusone.google.com/u/0/_/+1/fastbutton?count=true&url='.$url);
        $gcount = preg_replace('/(.*)<div id="aggregateCount" class="(.*)">(([0-9])*)<\/div>(.*)/is','$3',$google_request);

        $jumbo_share_data = $fb_shares + $tw_shares + $ln_shares + $gcount;
        //echo '**'.$this->get_plusones($url).'**';
        return $jumbo_share_data;
    }

    private function get_plusones($url) {
        $curl = curl_init();
         curl_setopt( $curl, CURLOPT_URL, "https://clients6.google.com/rpc?key=AIzaSyD-o-u-FPYkP2znl7vbpIRkQsIGK9A0z-I" );
         curl_setopt( $curl, CURLOPT_POST, 1 );
         curl_setopt( $curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]' );
         curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
         curl_setopt( $curl, CURLOPT_HTTPHEADER, array( 'Content-type: application/json' ) );
         $curl_results = curl_exec( $curl );
         curl_close( $curl );
         $json = json_decode( $curl_results, true );

         //return intval( $json[0]['result']['metadata']['globalCounts']['count'] );
        echo "<pre>"; print_r($json); echo "</pre>";
    }


}
