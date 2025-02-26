<?php
/*
   Plugin Name: Cryptocurrency Widgets From Coinlib
   Description: Full free cryptocurrency widget pack from Coinlib
   Author: coinlib
   Author URI: https://coinlib.io
   Version: 20181031
   License: GPL2
   License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

class CoinlibWidget {

    public function __construct() {
        add_action('admin_enqueue_scripts', array($this, 'enqueue_script'));
        add_action('admin_menu', array($this, 'create_plugin_settings_page'));
        add_action('init', array($this, 'register_shortcodes'));
        add_action('wp_ajax_coinlib_widget_ajax_parse', array($this, 'coinlib_widget_parse_shortcode'));
    }

    private static function get_single_coin_widget_html($from_coin_id, $to_coin_id, $width, $dark) {
        $width = max(220, intval($width));
        $height = 200;
        $bgcolor = $dark ? '1D2330' : 'FFFFFF';
        $bordercolor = $dark ? '282E3B' : '56667F';
        return '<div style="width: ' . $width . 'px; height:200px; background-color: #' . $bgcolor . '; overflow:hidden; box-sizing: border-box; border: 1px solid #' . $bordercolor .'; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; box-sizing:content-box; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #' . $bgcolor .';padding:1px;padding: 0px; margin: 0px;"><div style="height:200px;"><iframe src="https://widget.coinlib.io/widget?type=single_v2&theme=' . ($dark == 1 ? 'dark' : 'light') . '&coin_id=' . $from_coin_id .'&pref_coin_id=' . $to_coin_id .'" width="' . $width .'" height="196" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;box-sizing:content-box;" height="100%"></iframe></div></div>';
    }

    private static function get_chart_widget_html($from_coin_id, $to_coin_id, $dark) {
        $bgcolor = $dark ? '1D2330' : 'FFFFFF';
        $bordercolor = $dark ? '282E3B' : '56667F';
        return '<div style="height:536px; background-color: #FFFFFF; overflow:hidden; box-sizing: border-box; border: 1px solid #' . $bordercolor . '; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; box-sizing:content-box; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #' . $bgcolor . ';padding:1px;padding: 0px; margin: 0px;"><div style="height:540px;padding:0px;margin:0px;"><iframe src="https://widget.coinlib.io/widget?type=chart&theme=' . ($dark == 1 ? 'dark' : 'light') . '&coin_id=' . $from_coin_id .'&pref_coin_id=' . $to_coin_id .'" width="100%" height="536" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;box-sizing:content-box;"></iframe></div></div>';
    }

    private static function get_converter_widget_html($width, $dark) {
        $bgcolor = $dark ? '1D2330' : 'FFFFFF';
        $bordercolor = $dark ? '282E3B' : '56667F';
        return '<div style="width: ' . $width . 'px; height:310px; background-color: #' . $bgcolor . '; overflow:hidden; box-sizing: border-box; border: 1px solid #' . $bordercolor . '; border-radius: 4px; text-align: right; line-height:14px;  font-size: 12px; box-sizing:content-box; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #' . $bgcolor . ';margin: 0;width: ' . $width . 'px;padding:1px;padding: 0px; margin: 0px;"><div style="height:315px;"><iframe src="https://widget.coinlib.io/widget?type=converter&theme=' . ($dark == 1 ? 'dark' : 'light') . '" width="'. $width .'" height="310" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe></div></div>';
    }

    private static function get_horizontal_widget_html($to_coin_id, $dark) {
        $bgcolor = $dark ? '1D2330' : 'FFFFFF';
        $bordercolor = $dark ? '282E3B' : '56667F';
        return '<div style="width: 100%; height:40px; background-color: #' . $bgcolor . '; overflow:hidden; box-sizing: border-box; border: 1px solid #' . $bordercolor . '; border-radius: 4px; text-align: right; line-height:14px; block-size:40px; font-size: 12px; box-sizing:content-box; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #' . $bgcolor . ';padding:1px;padding: 0px; margin: 0px;"><div style="height:40px;"><iframe src="https://widget.coinlib.io/widget?type=horizontal_v2&theme=' . ($dark == 1 ? 'dark' : 'light') . '&pref_coin_id=' . $to_coin_id .'&invert_hover=" width="100%" height="36" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe></div></div>';
    }

    private static function get_top_list_widget_html($coincount, $to_coin_id, $graph, $dark, $height) {
        $bgcolor = $dark ? '1D2330' : 'FFFFFF';
        $bordercolor = $dark ? '282E3B' : '56667F';
        if ($height == 0) {
            $height =  55 + $coincount * 62;
        }
        return '<div style="height:'. $height .'px; background-color: #' . $bgcolor . '; overflow:hidden; box-sizing: border-box; border: 1px solid #' . $bordercolor . '; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; box-sizing:content-box; font-feature-settings: normal; text-size-adjust: 100%; padding: 0px; margin: 0px; width: 99%;"><div style="height:' . $height .'px;"><iframe src="https://widget.coinlib.io/widget?type=full_v2&theme=' . ($dark == 1 ? 'dark' : 'light') . '&pref_coin_id=' . $to_coin_id .'&cnt=' . $coincount .'&graph='. ($graph ? 'yes' : 'no') .'" width="100%" height="100%" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe></div></div>';
    }
    
    public static function coinlib_shortcode_handler($atts) {
        extract(shortcode_atts(array(
            'type' => 0,
            'coinid' => 859,
            'prefcoinid' => 1505,
            'width' => 250,
            'coincount' => 6,
            'graph' => 1,
            'height' => 0,
            'dark' => 0
        ), $atts));
        $type = intval($type);
        $coinid = intval($coinid);
        $prefcoinid = intval($prefcoinid);
        $width = intval($width);
        $coincount = intval($coincount);
        $graph = intval($graph);
        $height = intval($height);
        $dark = intval($dark);
        if ($type == 0) {
            return CoinlibWidget::get_single_coin_widget_html($coinid, $prefcoinid, $width, $dark);
        } else if ($type == 1) {
            return CoinlibWidget::get_chart_widget_html($coinid, $prefcoinid, $dark);
        } else if ($type == 2) {
            return CoinlibWidget::get_converter_widget_html($width, $dark);
        } else if ($type == 3) {
            return CoinlibWidget::get_horizontal_widget_html($prefcoinid, $dark);
        } else if ($type == 4) {
            return CoinlibWidget::get_top_list_widget_html($coincount, $prefcoinid, $graph, $dark, $height);
        }
        return '';
    }

    public function register_shortcodes(){
        add_shortcode('coinlib-widget', 'CoinlibWidget::coinlib_shortcode_handler');
    }

    public function create_plugin_settings_page() {
        $page_title = 'Coinlib Widget Settings Page';
        $menu_title = 'Coinlib Widget';
        $capability = 'manage_options';
        $slug = 'coinlib_widget_settings';
        $callback = array($this, 'plugin_settings_page_content');
        $icon = 'dashicons-chart-area';
        $position = 100;
        add_menu_page($page_title, $menu_title, $capability, $slug, $callback, $icon, $position);
    }
    
    public function plugin_settings_page_content() {
        print '<div class="wrap">
               <h2>Coinlib Widget Shortcode Generator</h2>
               <h3>Select widget type</h3>';
        printf('<select id="coinlib-widget-type" class="coinlib-widget-sel">%1$s</select>',
               '<option value="4">Top Crypto Currencies</option>
                <option value="1">Live Coin Chart</option>
                <option value="0" selected>Single Coin Live</option>
                <option value="2">Crypto Currency Converter</option>
                <option value="3">Horizontal Live Ticker</option>
               ');
        print '<h3>Select theme</h3>';
        printf('<select class="coinlib-widget-sel" id="coinlib-widget-theme">%1$s</select>',
               '<option value="light" selected>Light</option>
                <option value="dark">Dark</option>
               ');
        $COIN_LIST_URL = 'https://coinlib.io/coin_items_json';
        $coinlist_json = wp_remote_fopen($COIN_LIST_URL);
        $coinlist_parsed = json_decode($coinlist_json);
        $coinlist = [];
        foreach ($coinlist_parsed as $coin) {
            $coinlist[] = ["label" => sanitize_text_field($coin->symbol . ': ' . $coin->name),
                           "value" => intval($coin->id)];
        }
        print '<input id="coinlib-widget-coinlist" type="hidden" value="' . base64_encode(json_encode($coinlist)) .'">';
        print '<div class="coinlib-widget-selector coinlib-widget-coinid-selector"><h3>Select coin</h3>';
        print '<input class="coinlib-widget-sel" id="coinlib-widget-coinid" type="text" name="autocomplete" value="" placeholder="Search coin..." data-coinid="145"/></div>';
        print '<div class="coinlib-widget-selector coinlib-widget-prefcoinid-selector"><h3>Select currency</h3>';
        print '<input class="coinlib-widget-sel" id="coinlib-widget-prefcoinid" type="text" name="autocomplete" value="" placeholder="Search currency..." data-prefcoinid="1505"/></div>';
        print '<div class="coinlib-widget-selector coinlib-widget-coincount-selector" style="display:none;"><h3>Coin count</h3>';
        print '<select class="coinlib-widget-sel" id="coinlib-widget-coincount">';
        foreach ([3, 5, 6, 7, 8, 9, 10, 11, 12, 15, 20, 30, 40, 50, 75, 100] as $c) {
            print '<option value="'. $c .'" '. ($c == 6 ? ' selected' : '') .'>'. $c .'</option>';
        }
        print '</select></div>';
        print '<div class="coinlib-widget-selector coinlib-widget-graph-selector" style="display:none;"><h3>Include chart</h3>';
        print '<select class="coinlib-widget-sel" id="coinlib-widget-graph">';
        print '<option value="0">No</option>';
        print '<option value="1" selected>Yes</option>';
        print '</select></div>';
        print '<div class="coinlib-widget-selector coinlib-widget-width-selector"><h3>Select width</h3>';
        print '<select class="coinlib-widget-sel" id="coinlib-widget-width">';
        for ($width = 220; $width <= 400; $width += 10) {
            print '<option value="'. $width .'" '. ($width == 250 ? ' selected' : '') .'>'. $width .'</option>';
        }
        print '</select></div>';
        print '<div class="coinlib-widget-selector coinlib-widget-height-selector" style="display:none;"><h3>Select height (optional)</h3>';
        print '<input class="coinlib-widget-sel" id="coinlib-widget-height" type="text" value="0" placeholder="Fixed height..."/></div>';

        $shortcode = '[coinlib-widget type=0 coinid=145 prefcoinid=1505 width=250 dark=0]';
        print '<h3>Preview</h3>';
        print '<div id="coinlib-preview">' . do_shortcode($shortcode) .'</div>';
        print '<h3>Short code</h3>';
        print '<textarea onclick="this.focus();this.select()" readonly="readonly" style="width:250px; height:100px;" id="coinlib-shortcode">' . $shortcode .'</textarea>';
        print '<br><i>Copy/Paste the above shortcode anywhere inside your website to display the selected widget (eg. From Appearance->Widgets, drag and drop a Text widget with the given shortcode on the sidebar of your website)</i>';
        print '</div>';
    }

    function enqueue_script($hook) {
        if ('toplevel_page_coinlib_widget_settings' !== $hook) {
            return;
        }
        wp_enqueue_script('coinlib_admin_script', plugin_dir_url(__FILE__) . '/assets/js/adminscript.js', array('jquery', 'jquery-ui-autocomplete'), '1.0.0', true);
    }
    
    public function coinlib_widget_parse_shortcode() {
        $reponse = array();
        $shortcode = sanitize_text_field($_POST['shortcode']);
        if($shortcode != '') {
            $response['html'] = do_shortcode($shortcode);
        }
        header("Content-Type: application/json");
        echo json_encode($response);
        wp_die();
    }
}

new CoinlibWidget();
