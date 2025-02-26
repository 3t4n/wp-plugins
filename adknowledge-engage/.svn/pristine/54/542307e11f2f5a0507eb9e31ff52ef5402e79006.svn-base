<?php

/*
 * Plugin Name: Adknowledge Engage&trade; Related Content
 * Plugin URI: http://www.adknowledge.com/engage
 * Description: Adknowledge Engage recommends relevant articles and targeted ads to your users based upon the content on your website. With this widget you can <strong>improve engagement and increase revenue</strong>. To get started: 1) Click the "Activate" link to the left of this description, 2) <a href="http://www.adknowledge.com/engage">Sign up to get your Adknowledge Engage&trade; API key</a>, and 3) Go to your <a href="options-general.php?page=AdknowledgeEngage.php">Adknowledge Engage configuration</a> to save your API key and set up this plugin.
 * Author: Adknowledge
 * Author URI: http://www.adknowledge.com
 * Version: 1.2
 * Text Domain: related content
 */
 
define('ADENG_PLUGIN_NAME', plugin_basename(__FILE__));
define('ADENG_DOMAIN', 'adkengage.com');
define('ADENG_CHECK_DOMAIN', 'api.engage.bidsystem.com'); 
define('ADENG_SIDEBAR_URL', 'http://api.engage.bidsystem.com/engage_plugin_sidebar.html');

/**
 * Method that is available to the users to insert into their themes.
 * @usage <?php if (function_exists('adk_engage')) adk_engage(); ?>
 */
function adk_engage() {
    global $post;
    
    $apiKey     = get_option('adeng_api_key');
    $aId        = get_option('adeng_affiliate_id');
    $verified   = get_option('adeng_api_key_verified');
    $display    = (array)get_option('adeng_display');
    $inject     = false;
    $script     = '';
    
    if (! $apiKey) {
        // no API key has been set, do nothing
        return;
    }
    
    $script = '
    <div id="cre_container"></div>
    <script type=\'text/javascript\'>
    //<![CDATA[
    var ru="' . get_permalink( $post->ID ) . '";
    var aid = "'. $aId .'";
    var v ="'. $apiKey .'";
    var credomain = "'. ADENG_DOMAIN .'";
    var rt = "wp";
    document.write(unescape("%3Cscript src=\'http://"+ credomain +"/Scripts/CREReqScript.js\' type=\'text/javascript\'%3E%3C/script%3E"));
    //]]>
    </script>
    ';
    echo $script;
}

function adeng_display($content) {
    global $post;
    
    $apiKey     = get_option('adeng_api_key');
    $aId        = get_option('adeng_affiliate_id');
    $verified   = get_option('adeng_api_key_verified');
    $display    = (array)get_option('adeng_display');
    $excludes   = (array)get_option('adeng_exclude');
    $inject     = false;
    $script     = '';
    
    if (! $apiKey) {
        // no API key has been set, simply return the content untouched
        return $content;
    }
    
    if (is_front_page() && in_array('front', $display)) {
        $inject = true;
    } elseif (is_home() && in_array('home', $display)) {
        $inject = true;
    } elseif (is_single() && in_array('single', $display)) {
        $inject = true;
        
        $cats = wp_get_post_categories($post->ID);
        if (isset($excludes['categories'])) {
            foreach ($cats as $id) {
                if (in_array($id, $excludes['categories'])) {
                    $inject = false;
                    break;
                }
            }
        }
        
        $tags = wp_get_post_tags($post->ID);
        if (isset($excludes['tags'])) {
            foreach ($tags as $tag) {
                if (in_array($tag->term_id, $excludes['tags'])) {
                    $inject = false;
                    break;
                }
            }
        }
    } elseif (is_page() && in_array('page', $display)) {
        $inject = true;
        
        $cats = wp_get_post_categories($post->ID);
        if (isset($excludes['categories'])) {
            foreach ($cats as $id) {
                if (in_array($id, $excludes['categories'])) {
                    $inject = false;
                    break;
                }
            }
        }
        
        $tags = wp_get_post_tags($post->ID);
        if (isset($excludes['tags'])) {
            foreach ($tags as $tag) {
                if (in_array($tag->term_id, $excludes['tags'])) {
                    $inject = false;
                    break;
                }
            }
        }
    } elseif (is_category() && in_array('category', $display)) {
        $inject = true;
        
        $cats = wp_get_post_categories($post->ID);
        if (isset($excludes['categories'])) {
            foreach ($cats as $id) {
                if (in_array($id, $excludes['categories'])) {
                    $inject = false;
                    break;
                }
            }
        }
    } elseif (is_tag() && in_array('tag', $display)) {
        $inject = true;
        
        $tags = wp_get_post_tags($post->ID);
        if (isset($excludes['tags'])) {
            foreach ($tags as $tag) {
                if (in_array($tag->term_id, $excludes['tags'])) {
                    $inject = false;
                    break;
                }
            }
        }
    } elseif (is_author() && in_array('author', $display)) {
        $inject = true;
    } elseif (is_date() && in_array('date', $display)) {
        $inject = true;
    } elseif (is_search() && in_array('search', $display)) {
        $inject = true;
    } elseif (is_attachment() && in_array('attachments', $display)) {
        $inject = true;
    }
    
    if ($inject) {
        $script = '
        <div id="cre_container"></div>
        <script type=\'text/javascript\'>
        //<![CDATA[
        var ru="' . get_permalink( $post->ID ) . '";
        var aid = "'. $aId .'";
        var v ="'. $apiKey .'";
        var credomain = "'. ADENG_DOMAIN .'";
        var rt = "wp";
        document.write(unescape("%3Cscript src=\'http://"+ credomain +"/Scripts/CREReqScript.js\' type=\'text/javascript\'%3E%3C/script%3E"));
        //]]>
        </script>
        ';
        
        $top    = (bool)get_option('adeng_display_top', 0);
        $bottom = (bool)get_option('adeng_display_bottom', 0);
        
        if ($top) {
            $content = $script . $content;
        }
        
        if ($bottom) {
            $content = $content . $script;
        }
    }
    
    return $content;
}

// add admin options page
function adeng_add_submenu_page(){
    add_menu_page(__('Settings','adeng'), __('Adknowledge Engage','adeng'), 'manage_options', 'adeng-main', 'adeng_basic_form');
    $page1 = add_submenu_page('adeng-main', __('Basic Settings','adeng'), __('Basic Settings','adeng'), 'manage_options', 'adeng-main', 'adeng_basic_form');
    $page2 = add_submenu_page('adeng-main', __('Appearance','adeng'), __('Appearance','adeng'), 'manage_options', 'adeng-appearance', 'adeng_advanced_form');
    
    /* Using registered $page handle to hook stylesheet loading */
    add_action( 'admin_print_styles-' . $page1, 'adeng_admin_scripts' );
    add_action( 'admin_print_styles-' . $page2, 'adeng_admin_scripts' );
}

// Add settings link on plugin page
function adeng_settings_link($links) {
    $settings_link = '<a href="admin.php?page=adeng-main">Settings</a>';
    array_unshift($links, $settings_link);
    return $links;
}

function adeng_rewrite_rules($incoming) {
    global $wp_rewrite;
    $apiKey     = get_option('adeng_api_key');
    $adengRules = array();
    
    if ($apiKey) {
        $adengRules = array(
            $apiKey.'.txt(/)?'  => 'index.php?adeng_robots=1',
        );

    }
    
    $wp_rewrite->rules = $adengRules + $wp_rewrite->rules;
}

function adeng_query_vars($vars) {
    $vars[] = 'adeng_robots';
    
    return $vars;
}

function adeng_robots_page() {
    global $wp_query, $wpdb;
    
    if (isset($wp_query->query_vars['adeng_robots']) && $wp_query->query_vars['adeng_robots'] == 1) {
        $base = get_site_url();
        // categories
        $cat = get_categories('number=1');
        $txt = '';
        $catTxt = '';
        if (count($cat) > 0) {
            $cat = $cat[0];
            $url = get_category_link($cat->term_id);
            $parts = explode('/', $url);
            unset($parts[count($parts)-1], $parts[count($parts)-1]);
            $url = implode('/', $parts) .'/';
            $url = str_replace($base, '', $url);
            $catTxt = $url;
        }
        
        // users
        $tagTxt  = '/tag/';
        $userTxt = '/author/';
        $archives= '/archives/';
        
        // date-based archives
        $permaTxt = '';
        
        // get the starting year
        $rows   = $wpdb->get_results("SELECT DISTINCT YEAR( post_date ) AS year, MONTH (post_date) AS month
                                    FROM $wpdb->posts
                                    WHERE post_status = 'publish' and post_date <= now( )
                                    and post_type = 'post'
                                    ORDER BY post_date DESC"
                                );
        $now    = date("Y");
        
        foreach ($rows as $row) {
            $permaTxt .= 'Disallow: /'. $row->year .'/'. $row->month .'/$'. "\n";
            $permaTxt .= 'Disallow: /'. $row->year .'/'. $row->month .'/page/'. "\n";
        }
        
        $txt = "Disallow: /wp-\nDisallow: /page/\nDisallow: $catTxt\nDisallow: $userTxt\nDisallow: $tagTxt\nDisallow: $archives\n$permaTxt";
        header("Content-Type: text/plain");
        
        die($txt);
    }
}

function adeng_basic_form() {
    global $wpdb;
    include dirname(__FILE__) .'/adeng_settings.php';
}

function adeng_update_settings() {
    global $wpdb;
    
    $css        = $_POST['css'];
    $display    = (array)$_POST['display'];
    $top        = isset($_POST['top']) ? 1 : 0;
    $bottom     = isset($_POST['bottom']) ? 1 : 0;
    $show       = array();
    
    foreach ($display as $key => $val) {
        $show[] = $key;
    }
    
    // exlusion list
    $excluded = array(
        'categories'    => array(),
        'tags'          => array(),
        'users'         => array()
    );
    if (isset($_POST['exclude']) && !empty($_POST['exclude'])) {
        // categories
        if (isset($_POST['exclude']['category']) && !empty($_POST['exclude']['category'])) {
            $excluded['categories'] = $_POST['exclude']['category'];
        }
        
        if (isset($_POST['exclude']['tags']) && !empty($_POST['exclude']['tags'])) {
            $excluded['tags'] = $_POST['exclude']['tags'];
        }
        
        if (isset($_POST['exclude']['users']) && !empty($_POST['exclude']['users'])) {
            $excluded['users'] = $_POST['exclude']['users'];
        }
    }
    
    update_option('adeng_exclude', $excluded);
    
    update_option('adeng_inline_css', $css);
    update_option('adeng_display', $show);
    update_option('adeng_display_top', $top);
    update_option('adeng_display_bottom', $bottom);
    
    header("Location: admin.php?page=adeng-main&saved=1");
    exit;
}

function adeng_advanced_form() {
    global $wpdb;
    
    // get ads type
    $apiKey     = get_option('adeng_api_key');
    $affiliateId= get_option('adeng_affiliate_id');
    $domain     = str_replace( 'https://', '', str_replace( 'http://', '', get_bloginfo('wpurl') ) );
    $response   = wp_remote_get( 'http://'. ADENG_CHECK_DOMAIN .'/?aid='. $affiliateId .'&apikey='. $apiKey .'&domain='. $domain );
    $type       = 'text';
    
    if ($response['response']['code'] == 200) {
        $body   = $response['body'];
        $xml    = new SimpleXMLElement($body);
        $cols   = 'one_column';
        
        if ($xml->result) {
            $type = (string)$xml->displaytype;
            
            if ($type == 'text') {
                $cols = (string)$xml->layoutstyle;
            }
        }
    }
    
    // save the type
    update_option( 'adeng_ad_type', $type );
    
    include dirname(__FILE__) .'/adeng_appearance.php';
}

function adeng_update_advanced_settings() {
    global $wpdb;
    
    if ( get_magic_quotes_gpc() ) {
        $_POST = array_map( 'stripslashes_deep', $_POST );
    }
    
    if ( $_POST['type'] == 'text' ) {
        if ( $_POST['cols'] == 'one_column' ) {
            $css = array(
                'related_width'         => $_POST['rec_width'],
                'related_header_font'   => $_POST['rec_header']['font'],
                'related_header_color'  => $_POST['rec_header']['color'],
                'related_header_size'   => $_POST['rec_header']['size'],
                'related_link_font'     => $_POST['rec_link']['font'],
                'related_link_color'    => $_POST['rec_link']['color'],
                'related_link_size'     => $_POST['rec_link']['size'],
                'paid_header_font'      => $_POST['paid_header']['font'],
                'paid_header_color'     => $_POST['paid_header']['color'],
                'paid_header_size'      => $_POST['paid_header']['size'],
                'paid_link_font'        => $_POST['paid_link']['font'],
                'paid_link_color'       => $_POST['paid_link']['color'],
                'paid_link_size'        => $_POST['paid_link']['size'],
                'paid_url_color'        => $_POST['paid_url']['color'],
                'paid_url_size'         => $_POST['paid_url']['size'],
                'list_style'            => $_POST['list_style'],
                'list_style_image'      => $_POST['list_style_image']
            );
            
            if (isset($_POST['paid_width'])) {
                $css['paid_width'] = $_POST['paid_width'];
            }
            
            update_option('adeng_text_css', $css);
        } else {
            $css = array(
                'related_width'         => $_POST['rec_width'],
                'related_header_font'   => $_POST['rec_header']['font'],
                'related_header_color'  => $_POST['rec_header']['color'],
                'related_header_size'   => $_POST['rec_header']['size'],
                'related_link_font'     => $_POST['rec_link']['font'],
                'related_link_color'    => $_POST['rec_link']['color'],
                'related_link_size'     => $_POST['rec_link']['size'],
                'paid_header_font'      => $_POST['paid_header']['font'],
                'paid_header_color'     => $_POST['paid_header']['color'],
                'paid_header_size'      => $_POST['paid_header']['size'],
                'paid_link_font'        => $_POST['paid_link']['font'],
                'paid_link_color'       => $_POST['paid_link']['color'],
                'paid_link_size'        => $_POST['paid_link']['size'],
                'paid_url_color'        => $_POST['paid_url']['color'],
                'paid_url_size'         => $_POST['paid_url']['size'],
                'list_style'            => $_POST['list_style'],
                'list_style_image'      => $_POST['list_style_image']
            );
            
            if (isset($_POST['paid_width'])) {
                $css['paid_width'] = $_POST['paid_width'];
            }
            
            update_option('adeng_text_css', $css);
        }
    } else {
        $css = array(
            'related_width'         => $_POST['rec_width'],
            'related_header_font'   => $_POST['rec_header']['font'],
            'related_header_color'  => $_POST['rec_header']['color'],
            'related_header_size'   => $_POST['rec_header']['size'],
            'related_link_font'     => $_POST['rec_link']['font'],
            'related_link_color'    => $_POST['rec_link']['color'],
            'related_link_size'     => $_POST['rec_link']['size'],
            'list_style'            => $_POST['list_style'],
            'border_style'          => $_POST['border_style'],
            'border_color'          => $_POST['border_color']
        );
        
        update_option('adeng_image_css', $css);
    }
    
    header("Location: admin.php?page=adeng-appearance&saved=1");
    exit;
}

function adeng_verify_api() {
    global $wp_rewrite;
    $old    = get_option('adeng_api_key');
    $apiKey = $_POST['api_key'];
    $affId  = $_POST['affiliate_id'];
    
    // verify the keys
    $fp     = @fsockopen(ADENG_CHECK_DOMAIN, 80, $errno, $errstr, 30);
    $xml    = '';
    $resp   = '';
    if (!$fp) {
        die(json_encode(array('ack' => 'ERR', 'msg' => $errstr)));
    } else {
        $out = "GET /?aid=$affId&apikey=$apiKey HTTP/1.1\r\n";
        $out .= "Host: ". ADENG_CHECK_DOMAIN ."\r\n";
        $out .= "Connection: Close\r\n\r\n";
        fwrite($fp, $out);
        while (!feof($fp)) {
            $resp .= fgets($fp, 128);
        }
        fclose($fp);
        
        $parts  = explode("\r\n\r\n", $resp);
        $xml    = $parts[1];
        $parser = xml_parser_create();
        xml_parse_into_struct($parser, $xml, $tags);
        
        $valid = false;
        foreach ((array)$tags as $tag) {
            if ($tag['tag'] == 'RESULT' && $tag['value'] == 'true') {
                $valid  = true;
                break;
            }
        }
    }
    
    if ($valid) {
        update_option('adeng_api_key_verified', true);
        update_option('adeng_api_key', $apiKey);
        update_option('adeng_affiliate_id', $affId);
        
        // flush rewrite rules
        $wp_rewrite->flush_rules();
        
        die(json_encode(array('ack' => 'OK')));
    } else {
        update_option('adeng_api_key_verified', false);
        update_option('adeng_api_key', $apiKey);
        update_option('adeng_affiliate_id', $affId);
    
        die(json_encode(array('ack' => 'ERR', 'msg' => 'Invalid API Key/Affiliate ID')));
    }
}

function adeng_print_css() {
    $type = get_option( 'adeng_ad_type' );
    
    if ($type == 'text') {
        $css    = get_option('adeng_text_css');
        $html   = '<style type="text/css">';
        $html   .= '
            #div_adkengage_recommendations .adkengage_recommendations {width: '. $css['related_width'] .'px !important;}
            .adkengage_rec_header {color: '. $css['related_header_color'] .' !important; font-size: '. $css['related_header_size'] .' !important}
            li.adkengage_recom_display a {color: '. $css['related_link_color'] .' !important; font-size: '. $css['related_link_size'] .' !important}
            .adkengage_ad_header {color: '. $css['paid_header_color'] .' !important; font-size: '. $css['paid_header_size'] .' !important}
            li.adkengage_ad_display a {color:'. $css['paid_link_color'] .' !important; font-size:'. $css['paid_link_size'] .' !important}
            .adkengage_ad_url_display {color: '. $css['paid_url_color'] .' !important; font-size: '. $css['paid_url_size'] .' !important}
        ';
        
        if ( !empty($css['paid_width']) ) {
            $html .= '#div_adkengage_recommendations .adkengage_paidlistings {width: '. $css['paid_width'] .'px !important;}';
        }
        
        if ( !empty($css['list_style_image']) ) {
            $html .= '
            .adkengage_recom_display,.adkengage_ad_display {margin-left: 20px; list-style-image: url('. $css['list_style_image'] .');}
            ';
        } else {
            $html .= '
            .adkengage_recom_display,.adkengage_ad_display {list-style: '. $css['list_style'] .';}
            ';
        }
        
        $html   .= '</style>';
        
        echo $html;
    } else {
        $css    = get_option('adeng_image_css');
        $html   = '<style type="text/css">';
        $html   .= '
            .adkengage_rec_header {color: '. $css['related_header_color'] .' !important; font-size: '. $css['related_header_size'] .' !important}
            .adkengage_imgcontwrapper {color: '. $css['related_link_color'] .' !important; font-size: '. $css['related_link_size'] .' !important}
        ';
        
        if ($settings['list_style'] != 'none') {
            $html .= '
                .adkengage_imgwrapper{ border:none;}
                .adkengage_image {'. $css['border_style'] .'; border-color: '. $css['border_color'] .'}
            ';
        }
        
        $html   .= '</style>';
        
        echo $html;
    }
}

function adeng_admin_scripts() {
    wp_enqueue_script('jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js', array('jquery'));
    wp_enqueue_style('jquery-colorpicker', plugins_url('colorpicker/jquery.miniColors.css', __FILE__));
    wp_enqueue_script('jquery-colorpicker', plugins_url('colorpicker/jquery.miniColors.min.js', __FILE__));
    wp_enqueue_style('adeng-results-style', plugins_url('resultsstyle.css', __FILE__));
    wp_enqueue_style('adeng-style-120', plugins_url('style120.css', __FILE__));
    ?>
    <style type="text/css">
    .ui-tabs ul.adeng_tabs{background:#eaeaea;padding:3px 9px 0;margin:0;overflow:hidden;zoom:1;line-height:1em;-webkit-box-shadow:inset 0 -1px 0 0 #d5d5d5;-moz-box-shadow:inset 0 -1px 0 0 x #d5d5d5;box-shadow:inset 0 -1px 0 0 #d5d5d5;}
    .ui-tabs ul.adeng_tabs li{float:left;padding:0;margin:0 5px 0 0;}
    .ui-tabs ul.adeng_tabs li a{padding:0;margin:0;border:0;border:1px solid #d5d5d5;border-bottom:0;float:left;padding:9px 9px;background:#ececec;text-decoration:none;color:#555;-moz-border-radius-topleft:3px;-moz-border-radius-topright:3px;-webkit-border-top-left-radius:3px;-webkit-border-top-right-radius:3px;border-top-left-radius:3px;border-top-right-radius:3px;-webkit-box-shadow:inset 0 1px 0 1px rgba(255, 255, 255, 0.5);-moz-box-shadow:inset 0 1px 0 1px rgba(255, 255, 255, 0.5);box-shadow:inset 0 1px 0 1px rgba(255, 255, 255, 0.5);}
    .ui-tabs ul.adeng_tabs li.ui-state-active a{background:#f8f8f8;color:#555;background-image:linear-gradient(bottom, #ffffff 0%, #f8f8f8 100%);background-image:-o-linear-gradient(bottom, #ffffff 0%, #f8f8f8 100%);background-image:-moz-linear-gradient(bottom, #ffffff 0%, #f8f8f8 100%);background-image:-webkit-linear-gradient(bottom, #ffffff 0%, #f8f8f8 100%);background-image:-ms-linear-gradient(bottom, #ffffff 0%, #f8f8f8 100%);background-image:-webkit-gradient(linear, left bottom, left top, color-stop(0, #ffffff), color-stop(1, #f8f8f8));}
    .ui-tabs ul.adeng_tabs li.ui-state-active a{background-color:#f8f8f8;border-bottom:1px solid #f8f8f8;}
    .ui-tabs .adeng_body{padding:10px;margin:0;}
    fieldset.preview {border: 1px solid #ccc; border-radius: 5px; margin: 10px;padding:10px;}
    fieldset.preview legend {color: #ccc; text-transform: lowercase; font-variant:small-caps;}
    </style>
    <?php
}

function adeng_activate() {
    if (! get_option('adeng_inline_css')):
        // insert default css
        $css = '.adkengage_recommendations {}
.adkengage_rec_header {}
.adkengage_recommendations ul li.adkengage_recom_display {}
.adkengage_paidlistings {}
.adkengage_ad_header {}
.adkengage_paidlistings ul li.adkengage_ad_display {}
.adkengage_imgcontwrapper {}';
        update_option('adeng_inline_css', $css);
    endif;
    
    if (! get_option('adeng_text_css')) {
        $css = array(
            'related_width'         => 200,
            'related_header_color'  => '#000',
            'related_header_size'   => '14px',
            'related_link_color'    => '#199CF7',
            'related_link_size'     => '12px',
            'paid_width'            => 200,
            'paid_header_color'     => '#000',
            'paid_header_size'      => '14px',
            'paid_link_color'       => '#199CF7',
            'paid_link_size'        => '12px',
            'paid_url_color'        => '#ccc',
            'paid_url_size'         => '10px',
            'list_style'            => 'none',
            'list_style_image'      => ''
        );
        update_option('adeng_text_css', $css);
    }
    
    if (! get_option('adeng_image_css')) {
        $css = array(
            
        );
        update_option('adeng_image_css', $css);
    }
}

/* Widget */
class AdEngWidget extends WP_Widget {
    function AdEngWidget() {
        parent::__construct( false, _('Adknowledge Engage&trade; Related Content'), array('description' => 'Display related content') );
    }
    
    function widget($args, $instance) {
        extract( $args );
        echo $before_widget;
        adk_engage();
        echo $after_widget;
    }
    
    function update($new, $old) {
    
    }
    
    function form($instance) {
    
    }
}

function adeng_register_widget() {
    register_widget('AdEngWidget');
}

add_filter("plugin_action_links_". ADENG_PLUGIN_NAME, 'adeng_settings_link' );
add_filter("generate_rewrite_rules", "adeng_rewrite_rules");
add_filter("query_vars", "adeng_query_vars");
add_action('template_redirect', 'adeng_robots_page');
add_filter('the_content', 'adeng_display', -10000);
add_filter('the_excerpt', 'adeng_display', -10000);
add_action('wp_print_styles', 'adeng_print_css');
add_action('admin_enqueue_scripts', 'adeng_admin_scripts');
add_action('admin_menu', 'adeng_add_submenu_page');
add_action('admin_post_adeng_update_settings', 'adeng_update_settings');
add_action('admin_post_adeng_update_advanced_settings', 'adeng_update_advanced_settings');
add_action('admin_post_adeng_update_advanced', 'adeng_update_advanced');
add_action('wp_ajax_adeng_verify_api', 'adeng_verify_api');
add_action('widgets_init', 'adeng_register_widget');
register_activation_hook(__FILE__, 'adeng_activate');