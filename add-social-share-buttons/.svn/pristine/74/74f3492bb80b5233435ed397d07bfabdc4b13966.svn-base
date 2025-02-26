<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.multidots.com/
 * @since      1.0.0
 *
 * @package    Add_Social_Share_Buttons_Plugin
 * @subpackage Add_Social_Share_Buttons_Plugin/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Add_Social_Share_Buttons_Plugin
 * @subpackage Add_Social_Share_Buttons_Plugin/public
 * @author     Multidots <inquiry@multidots.in>
 */
class Add_Social_Share_Buttons_Plugin_Public {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Add_Social_Share_Buttons_Plugin_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Add_Social_Share_Buttons_Plugin_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/add-social-share-buttons-plugin-public.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Add_Social_Share_Buttons_Plugin_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Add_Social_Share_Buttons_Plugin_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/add-social-share-buttons-plugin-public.js', array('jquery'), $this->version, false);
    }

    /**
     * function for display share button option in front view
     *
     * @param get page content $content
     * @return  return share button added html content
     */
    public function insert_share_option_in_front_view($content) {
        global $wpdb, $wp, $post;

        //get whatspp share settings option
        $get_share_settings = get_option(ADSSB_PLUGIN_GLOBAL_SETTING_KEY);
        //whatspp share settings option unserialize
        $get_share_settings = maybe_unserialize($get_share_settings);

        //get current page or post post type
        $getPostType = $post->post_type;

        $html = '';

        //share button icon array
        $sharebuttonArray = array();

        //check share button size small
        if ($get_share_settings['share_button_size'] == 'small') {
            //create buton small size image
            $sharebuttonArray['Whatsapp'] = ASSB_PATH . '/images/whatsapp_small.png';
            $sharebuttonArray['Viber'] = ASSB_PATH . '/images/viber_small.png';
            $sharebuttonArray['Facebook'] = ASSB_PATH . '/images/facebook_small.png';
            $sharebuttonArray['Twitter'] = ASSB_PATH . '/images/twitter_small.png';
            $sharebuttonArray['Google_plus'] = ASSB_PATH . '/images/googleplus_small.png';
            $sharebuttonArray['Linkedin'] = ASSB_PATH . '/images/linkedin_small.png';
            //check button medium size
        } elseif ($get_share_settings['share_button_size'] == 'medium') {
            //create buton medium medium image
            $sharebuttonArray['Whatsapp'] = ASSB_PATH . '/images/whatsapp_medium.png';
            $sharebuttonArray['Viber'] = ASSB_PATH . '/images/viber_medium.png';
            $sharebuttonArray['Facebook'] = ASSB_PATH . '/images/facebook_medium.png';
            $sharebuttonArray['Twitter'] = ASSB_PATH . '/images/twitter_medium.png';
            $sharebuttonArray['Google_plus'] = ASSB_PATH . '/images/googleplus_medium.png';
            $sharebuttonArray['Linkedin'] = ASSB_PATH . '/images/linkedin_medium.png';

            //check button large size
        } elseif ($get_share_settings['share_button_size'] == 'large') {

            //create buton large image
            $sharebuttonArray['Whatsapp'] = ASSB_PATH . '/images/whatsapp_large.png';
            $sharebuttonArray['Viber'] = ASSB_PATH . '/images/viber_large.png';
            $sharebuttonArray['Facebook'] = ASSB_PATH . '/images/facebook_large.png';
            $sharebuttonArray['Twitter'] = ASSB_PATH . '/images/twitter_large.png';
            $sharebuttonArray['Google_plus'] = ASSB_PATH . '/images/googleplus_large.png';
            $sharebuttonArray['Linkedin'] = ASSB_PATH . '/images/linkedin_large.png';
        }

        //creta arry for share social button url
        //check not empty or not null share settings

        if (!empty($get_share_settings) && $get_share_settings != '') {

            //check posttype availble
            if (!empty($get_share_settings['share_posttype']) && $get_share_settings['share_posttype'] != '') {

                if ($getPostType != 'product') {

                    if (in_array($getPostType, $get_share_settings['share_posttype'])) {

                        $html = '';

                        //get whatsapp share services option
                        $get_services = get_option(ADSSB_PLUGIN_ADD_SOCIAL_BUTTIN_KEY);
                        //whatspp share settings option unserialize
                        $get_services = maybe_unserialize($get_services);

                        //check share button not null or not empty
                        if ($get_services['share_button'] != '' && !empty($get_services['share_button'])) {

                            //create share buttom html
                            $html .='<div class="share_button_main">';
                            foreach ($get_services['share_button'] as $key => $values) {
                                if ($values == 'Facebook') {

                                    $html .='<a href=""><span class="social-facebook assbshareonfbbtn"><img src="' . esc_url($sharebuttonArray[$values]) . '" alt="' . esc_attr($values) . '"></span></a>';
                                } elseif ($values == 'Google_plus') {
                                    $html .='<a href="javascript:void(0);" onclick="return googleplus()" class="social-googleplus"><img src="' . esc_url($sharebuttonArray[$values]) . '" alt="' . esc_attr($values) . '"></a>';
                                } elseif ($values == 'Twitter') {
                                    $html .='<a href="https://twitter.com/intent/tweet?url=' . esc_url(get_permalink($post->ID)) . '&amp;count=none" class="social-twitter"><img src="' . esc_url($sharebuttonArray[$values]) . '" alt="' . esc_attr($values) . '"></a>';
                                } elseif ($values == 'Whatsapp') {
                                    $html .='<a class="woo_shre_whatsapp_btn" data-text="' . esc_attr($post->post_title) . '" data-link="' . esc_url(get_permalink($post->ID)) . '" href="javascript:void(0);"><img src="' . esc_url($sharebuttonArray[$values]) . '" alt="' . esc_attr($values) . '"></a>';
                                } elseif ($values == 'Viber') {
                                    $html .='<a class="woo_shre_viber_btn" data-text="' . esc_attr($post->post_title) . '" data-link="' . esc_url(get_permalink($post->ID)) . '" href="javascript:void(0);"><img src="' . esc_url($sharebuttonArray[$values]) . '" alt="' . esc_attr($values) . '"></a>';
                                } elseif ($values == 'Linkedin') {
                                    $html .='<a href="javascript:void(0);" onclick="return linkdin()"><img src="' . esc_url($sharebuttonArray[$values]) . '" alt="' . esc_attr($values) . '"></a>';
                                }
                            }
                            $html .='</div>';
                            $html .='<div id="fb-root"></div>';
                        }
                        //script for social share
                        ?>
                        <script type="text/javascript">
                            jQuery(document).on('click', '.assbshareonfbbtn', function($) {
                                var currentLocation = window.location;
                                window.open("https://www.facebook.com/sharer/sharer.php?u=" + currentLocation, "pop", "width=600, height=400, scrollbars=no");
                            });
                            function googleplus() {
                                var go = "https://plus.google.com/share?";
                                var url = "url=" + encodeURIComponent('<?php echo esc_url(get_permalink($post->ID)); ?>');
                                javascript:void
                                        window.open(go + "&" + url,
                                                '1446801293880', 'width=500,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
                                return false;
                            }

                            function linkdin() {
                                var go = "https://www.linkedin.com/shareArticle?mini=true";
                                var url = "url=" + encodeURIComponent('<?php echo esc_url(get_permalink($post->ID)); ?>');
                                var title = 'title=<?php echo esc_attr($post->post_title); ?>';
                                javascript:void
                                        window.open(go + "&" + url + '&' + title + '&source=',
                                                '1446801293880', 'width=500,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
                                return false;
                            }

                            window.twttr = (function(d, s, id) {
                                var t, js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id))
                                    return;
                                js = d.createElement(s);
                                js.id = id;
                                js.src = "https://platform.twitter.com/widgets.js";
                                fjs.parentNode.insertBefore(js, fjs);
                                return window.twttr || (t = {_e: [], ready: function(f) {
                                        t._e.push(f)
                                    }});
                            }(document, "script", "twitter-wjs"));
                            //                            function shareonfacebook(title, desc, url, image) {

                        </script>	
                        <?php
                        //set share button place in page or post
                        if ($get_share_settings['button_placement'] == 'bottom') {
                            return $content . '' . $html;
                        } elseif ($get_share_settings['button_placement'] == 'top') {
                            return $html . '' . $content;
                        } elseif ($get_share_settings['button_placement'] == 'topbottom') {
                            return $html . '' . $content . '' . $html;
                        }
                    } else {
                        return $content;
                    }
                } else {
                    return $content;
                }
            } else {
                return $content;
            }
        } else {
            return $content;
        }
    }

    /**
     * function for add share button in wocommerce listing or detail page
     *
     */
    function add_shre_button_on_woocommerce_details_page() {
        global $wpdb, $wp, $post;

        //get whatsapp share option
        $get_share_settings = get_option(ADSSB_PLUGIN_GLOBAL_SETTING_KEY);
        //unserialize whatsapp share option
        $get_share_settings = maybe_unserialize($get_share_settings);

        //get current page or post posttype
        $getPostType = $post->post_type;

        //get page requert url
        $requestPageUrl = site_url($_SERVER['REQUEST_URI']);
        //trim page requert url
        $pageTitletrim = rtrim($_SERVER['REQUEST_URI'], '/');
        $pageTitletrim = ltrim($pageTitletrim, '/');
        //explode page requert url
        $explodePageTitle = explode("/", $pageTitletrim);
        //get array last value
        $explodePageTitle = end($explodePageTitle);
        //string replace
        $explodePageTitle = str_replace("-", " ", $explodePageTitle);
        //string first character capital
        $pageTitle = ucwords($explodePageTitle);

        $html = '';

        //share button icon array
        //create share button array
        $sharebuttonArray = array();

        //check button small size
        if ($get_share_settings['share_button_size'] == 'small') {
            //create buton small size image
            $sharebuttonArray['Whatsapp'] = ASSB_PATH . '/images/whatsapp_small.png';
            $sharebuttonArray['Viber'] = ASSB_PATH . '/images/viber_small.png';
            $sharebuttonArray['Facebook'] = ASSB_PATH . '/images/facebook_small.png';
            $sharebuttonArray['Twitter'] = ASSB_PATH . '/images/twitter_small.png';
            $sharebuttonArray['Google_plus'] = ASSB_PATH . '/images/googleplus_small.png';
            $sharebuttonArray['Linkedin'] = ASSB_PATH . '/images/linkedin_small.png';
            //check button medium size
        } elseif ($get_share_settings['share_button_size'] == 'medium') {
            //create buton medium medium image
            $sharebuttonArray['Whatsapp'] = ASSB_PATH . '/images/whatsapp_medium.png';
            $sharebuttonArray['Viber'] = ASSB_PATH . '/images/viber_medium.png';
            $sharebuttonArray['Facebook'] = ASSB_PATH . '/images/facebook_medium.png';
            $sharebuttonArray['Twitter'] = ASSB_PATH . '/images/twitter_medium.png';
            $sharebuttonArray['Google_plus'] = ASSB_PATH . '/images/googleplus_medium.png';
            $sharebuttonArray['Linkedin'] = ASSB_PATH . '/images/linkedin_medium.png';

            //check button large size
        } elseif ($get_share_settings['share_button_size'] == 'large') {

            //create buton large image
            $sharebuttonArray['Whatsapp'] = ASSB_PATH . '/images/whatsapp_large.png';
            $sharebuttonArray['Viber'] = ASSB_PATH . '/images/viber_large.png';
            $sharebuttonArray['Facebook'] = ASSB_PATH . '/images/facebook_large.png';
            $sharebuttonArray['Twitter'] = ASSB_PATH . '/images/twitter_large.png';
            $sharebuttonArray['Google_plus'] = ASSB_PATH . '/images/googleplus_large.png';
            $sharebuttonArray['Linkedin'] = ASSB_PATH . '/images/linkedin_large.png';
        }

        //create share button redirect url array

        $html = '';

        //get whatsapp share option
        $get_services = get_option(ADSSB_PLUGIN_ADD_SOCIAL_BUTTIN_KEY);

        //unserialize whatsapp share option
        $get_services = maybe_unserialize($get_services);

        //check share button size
        if ($get_share_settings['share_button_size'] != '' && !empty($get_share_settings['share_button_size'])) {
            //check share button not null or not empty
            if ($get_services['share_button'] != '' && !empty($get_services['share_button'])) {

                //create share button html
                $html .='<div class="share_button_main">';
                foreach ($get_services['share_button'] as $key => $values) {
                    if ($values == 'Facebook') {

                        $html .='<a href=""><span class="social-facebook assbshareonfbbtn"><img src="' . esc_url($sharebuttonArray[$values]) . '" alt="' . esc_attr($values) . '"></span></a>';
                    } elseif ($values == 'Google_plus') {
                        $html .='<a href="javascript:void(0);" onclick="return googleplus()" class="social-googleplus"><img src="' . esc_url($sharebuttonArray[$values]) . '" alt="' . esc_attr($values) . '"></a>';
                    } elseif ($values == 'Twitter') {
                        $html .='<a href="https://twitter.com/intent/tweet?url=' . esc_url($requestPageUrl) . '&amp;count=none" class="social-twitter"><img src="' . esc_url($sharebuttonArray[$values]) . '" alt="' . esc_attr($values) . '"></a>';
                    } elseif ($values == 'Whatsapp') {
                        $html .='<a class="woo_shre_whatsapp_btn" data-text="' . esc_attr($pageTitle) . '" data-link="' . esc_url($requestPageUrl) . '" href="javascript:void(0);"><img src="' . esc_url($sharebuttonArray[$values]) . '" alt="' . esc_attr($values) . '"></a>';
                    } elseif ($values == 'Viber') {
                        $html .='<a class="woo_shre_viber_btn" data-text="' . esc_attr($pageTitle) . '" data-link="' . esc_url($requestPageUrl) . '" href="javascript:void(0);"><img src="' . esc_url($sharebuttonArray[$values]) . '" alt="' . esc_attr($values) . '"></a>';
                    } elseif ($values == 'Linkedin') {
                        $html .='<a href="javascript:void(0);" onclick="return linkdin()"><img src="' . esc_url($sharebuttonArray[$values]) . '" alt="' . esc_attr($values) . '"></a>';
                    }
                }
                $html .='</div>';
                $html .='<div id="fb-root"></div>';
                echo $html;
            }
        }
        //add social share button script
        ?>
        <script type="text/javascript">
            jQuery(document).on('click', '.assbshareonfbbtn', function($) {
                var currentLocation = window.location;
                window.open("https://www.facebook.com/sharer/sharer.php?u=" + currentLocation, "pop", "width=600, height=400, scrollbars=no");
            });
            function googleplus() {
                var go = "https://plus.google.com/share?";
                var url = "url=" + encodeURIComponent('<?php echo $requestPageUrl; ?>');
                javascript:void
                        window.open(go + "&" + url,
                                '1446801293880', 'width=500,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
                return false;
            }

            function linkdin() {
                var go = "https://www.linkedin.com/shareArticle?mini=true";
                var url = "url=" + encodeURIComponent('<?php echo esc_url(get_permalink($post->ID)); ?>');
                var title = 'title=<?php echo esc_attr($post->post_title); ?>';
                javascript:void
                        window.open(go + "&" + url + '&' + title + '&source=',
                                '1446801293880', 'width=500,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
                return false;
            }

            window.twttr = (function(d, s, id) {
                var t, js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "https://platform.twitter.com/widgets.js";
                fjs.parentNode.insertBefore(js, fjs);
                return window.twttr || (t = {_e: [], ready: function(f) {
                        t._e.push(f)
                    }});
            }(document, "script", "twitter-wjs"));
            function shareonfacebook(title, desc, url, image) {
                FB.init({
                    appId: '<?php echo $get_share_settings['facebook_apikey']; ?>',
                    xfbml: true,
                    version: 'v2.3'
                });
                var share_url = '<?php echo esc_url($requestPageUrl); ?>';
                var title = '<?php echo esc_attr($pageTitle); ?>';
                var desc = '';
                var image = '';
                FB.ui({
                    method: 'feed',
                    link: share_url,
                    name: title,
                    description: desc,
                    picture: image
                },
                function(response) {

                });
            }
        </script>	
        <?php
    }

    /**
     * function for add custom additional style in front view
     *
     */
    function add_custom_whatsapp_share_styles() {
//        global $wpdb, $post, $wp; unused variables

        //get additional style option
        $get_share_settings = get_option(ADSSB_PLUGIN_GLOBAL_SETTING_KEY);
        //unserialize additional style option
        $get_share_settings = maybe_unserialize($get_share_settings);
        //check additional style not null or empty
        if (isset($get_share_settings['include_custom_styles']) && !empty($get_share_settings['include_custom_styles'])) {
            //add additional style in fornt view
            echo '<style>' . wp_kses_post($get_share_settings['include_custom_styles']) . '</style>';
        }
    }

    /**
     * BN code added
     */
    function paypal_bn_code_filter_assb($paypal_args) {
        $paypal_args['bn'] = 'Multidots_SP';
        return $paypal_args;
    }

}
