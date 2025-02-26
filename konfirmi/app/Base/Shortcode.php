<?php

/**
 * Class for managing the shortcode of Konfirmi Plugin
 * 
 * @package Konfirmi Plugin
 */
namespace Konfirmi\Base;

use Konfirmi\Base\BaseController;
use \Konfirmi\Api\RestfulApi;

class Shortcode extends BaseController
{
    /*
     * Plugin Shortcode Registration
     */
    public function register()
    {
        add_shortcode( 'konfirmi', array( $this, 'handler' ) );
    }

    /**
     * Generate shortcode
     */
    public function handler( $atts )
    {
        $shortcodeAttrs = shortcode_atts( array(
            'id' => '0'
        ), $atts );
        $widgetID = $shortcodeAttrs['id'];

        if($widgetID == 0) {
            return $this->config['strings']['widgetEmptyID'];
        }

        $widget = $this->getWidgetSiteKey($widgetID);
        if (empty($widget['key'])) {
            return null;
        }
        if(!empty($widget['error'])){
            return $widget['error'];
        }
        $url = $this->config['api']['baseUrl'];
        $data = array(
            'id' => $widgetID,
            'site_key' => $widget['key'],
            'url' => $url
        );

        wp_enqueue_script('konfirmi_scripts', $url.'/static/konfirmi-script.min.js');

        $config = $this->plugin_url."assets/js/Config.js";
        wp_enqueue_script('config', $config, array('konfirmi_scripts'));
        $base = $this->plugin_url."assets/js/Base.js";
        wp_enqueue_script('base_class', $base, array('config'));
        wp_enqueue_style('mypluginstyle', $this->plugin_url . 'assets/css/konfirmi.min.css');
        return $this->twig->render('widget.twig', $data);
    }

    public function getWidgetSiteKey($widget_id){
        $restfulAPI = new RestfulApi();
        $url = $this->config['api']['baseUrl'];
        $widget = $restfulAPI->makeRequest($url . "/form/site-key/$widget_id", 'GET');
        if(array_key_exists('error', $widget)){
            $widgetError = $widget['error'];
        }
        if(!empty($widget) && empty($widgetError)) {
            return array('key' => $widget['data']['siteKey'], 'error' => null );
        }
        else {
            return array('key' => null, 'error' => $widgetError);
        }
        
        $CF7_scripts = $this->plugin_url."assets/js/contact-form-7.js";
        $NinjaScripts = $this->plugin_url."assets/js/ninja-form.js";
        $WooCommerce = $this->plugin_url."assets/js/wooCommerce.js";
        $CalderaScripts = $this->plugin_url."assets/js/caldera-form.js";
        $Gravity = $this->plugin_url."assets/js/gravity-form.js";
        wp_enqueue_script('konfirmi_scripts', $url.'/static/konfirmi-script.min.js');
        wp_enqueue_script('cf7_scripts', $CF7_scripts, 'konfirmi_scripts');
        wp_enqueue_script('nf_scripts', $NinjaScripts, 'konfirmi_scripts');
        wp_enqueue_script('wc_scripts', $WooCommerce, 'konfirmi_scripts');
        wp_enqueue_script('gravity_scripts', $Gravity, 'konfirmi_scripts');
        wp_enqueue_script('caldera_scripts', $CalderaScripts, 'konfirmi_scripts');
        
        $widget_frame = "<div id=\"konfirmi-container-$id\" class=\"konfirmi-container\"><h2>Sample confirmi container</h2>
                            <!--<script>!function(){var e=document.createElement('script');e.src=\"$url/static/konfirmi-script.min.js\";var t=document.getElementsByTagName('script')[0];t.parentNode.insertBefore(e,t);var n=document.createElement(\"iframe\");n.id=\"konfirmi-frame-$id\",n.src=\"$url/form/$siteKey\",document.getElementById(\"konfirmi-container-$id\").appendChild(n)}();
                            </script>-->
                            <style>
                            .konfirmi-container{
                                position: relative;
                            }
                            img{
                                margin: 0 auto;
                                cursor: pointer;
                                border: 1px solid lightgrey;
                            }
                            #konfirmi-frame{
                                position: absolute;
                                bottom: -100%;
                                z-index: 10000;
                                width: 500px;
                                box-shadow: 0 0 20px 5px;
                                background: white;
                                transition: all 0.5s;
                                height: 550px;
                                left: 75px;
                                display: none;
                                }
                            </style>

                            <script>
                            function openWidget(e){
                                event.stopPropagation();
                                const widget = document.getElementById('konfirmi-frame');
                                widget.style.display = 'block';
                            }
                            document.body.addEventListener('click', function (e){
                                const widget = document.getElementById('konfirmi-frame');
                                widget.style.display = 'none';
                            })
                        </script>
                        <img onclick=\"openWidget()\" id=\"openWidgetBtn\"/>
                            <iframe id=\"konfirmi-frame\" src=\"$url/form/$siteKey\">
                            </iframe>
                            <input type=\"hidden\" value=\"test_input\">
                            <!--<script src=\"$url/static/konfirmi-script.min.js\"></script>-->
                            <!--<script src=\"$CF7_scripts\"></script>-->
                            <!--<script src=\"$NinjaScripts\"></script>-->
                        </div>";

        return $widget_frame;
    }
}