<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly   

/* Parameters used by Buying Buddy */
function buyingbuddy_add_queryvars( $query_vars )
{
    $query_vars[] = 'property_id';
    $query_vars[] = 'address';
    $query_vars[] = 'showrewrites';
    $query_vars[] = 'filter';
    return $query_vars;
}
/* Change Permalink/Canonical Url for Property Details page */
function buyingbuddy_change_permalink( $url, $post )
{
    if( ! is_admin() ){
        if ( is_numeric( $post ) ) {
            $post = get_post( $post );
        }
        $post_slug = $post->post_name;
        $url_parameters = parse_url(sanitize_url($_SERVER['REQUEST_URI']),PHP_URL_PATH);
        if( preg_match("/".$post_slug."/",$url_parameters)) {
            $url_parameters = preg_replace("/^.*\/".$post_slug."\/?/","",$url_parameters);
            $url .= $url_parameters;
        }
    }
    return $url;
}
/* Change Permalink/Canonical Url for Property Details page */
function buyingbuddy_wpseo_permalink( $canonical ) 
{
    $canonical = esc_url(home_url( add_query_arg( NULL, NULL ) ));
    return $canonical;
}
/* Set Priority for Page Title for SEO Press */
function buyingbuddy_seopress_title_priority($priority)
{
    $priority = 1; 
    return $priority;
}
/* Check cache for when to flush rewrite rules */
function buyingbuddy_check_rewrite_cache() 
{
    global $buyingbuddy_options, $wp_rewrite;
    if (!empty($buyingbuddy_options["last_modified"])) $cacheTime = sanitize_text_field($buyingbuddy_options["last_modified"]);
    else $cacheTime = 0;
    $age = 0;
    $cacheAge = 21600; // 2 hours
    $age = time() - $cacheTime;
    if ($age == 0 || $age > $cacheAge) {
        flush_rewrite_rules();
        $wp_rewrite->flush_rules();
        $buyingbuddy_options["last_modified"] = time();
        $buyingbuddy_arr = array();
        foreach ($buyingbuddy_options as $key => $val) {
            $buyingbuddy_arr[sanitize_text_field($key)] = sanitize_text_field($val); 
        }        
        if (!empty($buyingbuddy_arr["acid"])) update_option("buyingbuddy_options",serialize($buyingbuddy_arr));
    }  
}
/* Check cache for when to set plugin version in Buying Buddy */
function buyingbuddy_check_account_cache() 
{
    global $buyingbuddy_options, $buyingbuddyObj, $buyingbuddy_version, $wp_rewrite;
    if (isset($buyingbuddy_options["google_map_key"])){
    } else $buyingbuddy_options["google_map_key"] = "";
    $urlarr = array (
        "acid"      =>  esc_html($buyingbuddy_options["acid"]),
        "domain"    =>  sanitize_url($_SERVER['HTTP_HOST']),
        "wp"        =>  esc_html(get_bloginfo("version")),
        "wp_google_maps_key"        =>  sanitize_text_field($buyingbuddy_options["google_map_key"]),
        "plugin"    =>  sanitize_text_field($buyingbuddy_version)
    );    
    if (!empty($buyingbuddy_options["last_modified"])) $cacheTime = sanitize_text_field($buyingbuddy_options["last_modified"]);
    else $cacheTime = 0;
    $age = 0;
    $cacheAge = 21600; // 6 hours
    $age = time() - $cacheTime;

    if ($age == 0 || $age > $cacheAge) {
        $url      = "/api/account-info/set-plugin-version/?".http_build_query($urlarr);
        $acctData = $buyingbuddyObj->getApiData($url, array());
                
        $buyingbuddy_options["last_modified"] = esc_html(time());
        
        $buyingbuddy_arr = array();
        foreach ($buyingbuddy_options as $key => $val) {
            $buyingbuddy_arr[sanitize_text_field($key)] = sanitize_text_field($val); 
        }        
        if (!empty($buyingbuddy_arr["acid"])) update_option("buyingbuddy_options",serialize($buyingbuddy_arr));

        // check if google map key has not been set
        
        $url = "/api/account-info/get-domain-info/?".http_build_query($urlarr);
        $vars = $buyingbuddyObj->getApiData($url, array());
        if (!empty($vars)) {
            $arr = explode("~",$vars);
            $theme_id = sanitize_text_field($arr[0]);
            $google_map_key = sanitize_text_field($arr[1]);
        } else {
            $theme_id = "";
            $google_map_key = "";
        }
        if (!empty($theme_id) && !empty($theme_id) && !empty($buyingbuddy_options["acid"])) {
            update_option('buyingbuddy_theme_id', $theme_id);
        }
        if (empty($buyingbuddy_options["google_map_key"]) || $buyingbuddy_options["google_map_key"] == "error") {
            if (!empty($google_map_key) && !empty($buyingbuddy_options["acid"])) {
                $buyingbuddy_options["google_map_key"] = $google_map_key;
                update_option('buyingbuddy_options', serialize($buyingbuddy_options));
            }
        }        

    }  
}
function buyingbuddy_load_admin_scripts($hook) 
{
    // Load only on Buying Buddy settings page
    if($hook != 'settings_page_buying-buddy') {
           // return;
    }
    
    wp_enqueue_style('bb-admin-styles', plugin_dir_url(__FILE__).'../css/custom.css');
    wp_enqueue_script('buyingbuddy_admin', esc_url(plugins_url('../js/scripts.js', __FILE__) ));
    wp_enqueue_script('buyingbuddy_bootstrap', esc_url(plugins_url('../js/bootstrap.min.js', __FILE__) ));
}
/* Load MBB Library, Javascript and CSS Files */
function buyingbuddy_load_scripts() 
{
    global $buyingbuddy_version, $buyingbuddy_options;
    $load_library = true;
    $buyingbuddy_theme_id = sanitize_text_field(get_option("buyingbuddy_theme_id"));
    $buyingbuddy_allowedids = array();
    $buyingbuddy_allowedids_option = sanitize_text_field(get_option("buyingbuddy_allowedids"));
    if ($buyingbuddy_allowedids_option) {
        $buyingbuddy_allowedids = unserialize($buyingbuddy_allowedids_option);
        $buyingbuddy_allowedids = array_filter($buyingbuddy_allowedids);
    } 
            
   // $buyingbuddy_version = sanitize_text_field(get_option('buyingbuddy_version'));
    if (sizeof($buyingbuddy_allowedids) > 0) {
        $buyingbuddy_allowedids = implode(",",$buyingbuddy_allowedids);
        $buyingbuddy_allowedids_arr = explode(",",$buyingbuddy_allowedids);
        $load_library = false;
        if (is_page($buyingbuddy_allowedids_arr)) $load_library = true;
    }
    if (empty($buyingbuddy_options['disable'])) $buyingbuddy_options['disable'] = "no";
    if (empty($buyingbuddy_options['google_map'])) $buyingbuddy_options['google_map'] = "no";
    if (empty($buyingbuddy_options['express'])) $buyingbuddy_options['express'] = "no";
    
    if (sanitize_text_field($buyingbuddy_options['disable']) == "yes" || empty($buyingbuddy_options["acid"])){
        $load_library = false;
    }
    if ($load_library) {
        $urlarr = array();
        $urlarr['acid'] = sanitize_text_field($buyingbuddy_options["acid"]);
        if (sanitize_text_field($buyingbuddy_options['express']) == "yes")  $urlarr['subdomain'] = 'active';
        
       // $urlarr["mbbdomain"] = sanitize_url($_SERVER['HTTP_HOST']);
        $urlstr = "";
        foreach($urlarr as $key => $value) {
            $urlstr .= ''.$key.' : "'.$value.'",';
        }
        $urlstr = preg_replace("/,$/","",$urlstr);
        $buyingbuddy_array = "
            /* 
            * Buying Buddy plugin v".sanitize_text_field($buyingbuddy_version)." for WordPress 
            * ** DO NOT DEFER ** This must load at the top of the page, e.g. in the page head. 
            * End Buying Buddy Plugin. Copyright 2003-".date("Y")." 
            */        
            var MBB  = { seo : \"true\", data : {".$urlstr."} };
            function mbbMapLoaded(){ MBB.googleMaps = true;  } 
        ";
        //wp_enqueue_style('buyingbuddy_styles', esc_url(plugin_dir_url( __FILE__ ) . '../css/style.css' ));
        if ($buyingbuddy_options["google_map"] !=  "yes") wp_enqueue_script('buyingbuddy_maps', "https://maps.googleapis.com/maps/api/js?libraries=places".(!empty($buyingbuddy_options["google_map_key"]) && sanitize_text_field($buyingbuddy_options["google_map_key"]) != "error" ? "&key=".sanitize_text_field($buyingbuddy_options["google_map_key"]) : ""), array('jquery'), $buyingbuddy_version, "" );
        if (empty($buyingbuddy_theme_id)) $buyingbuddy_theme_id = "4t9zc3uwmqs-4t9zc3uwmul";
        wp_enqueue_style('buyingbuddy-theme', "https://d2olf7uq5h0r9a.cloudfront.net/widget-themes/".$buyingbuddy_theme_id."-5.css.gz" );
        wp_enqueue_script('buyingbuddy-library', "https://d2w6u17ngtanmy.cloudfront.net/scripts/my-buying-buddy.5.0.js.gz", array('jquery'), "", "" ); 
        wp_add_inline_script('buyingbuddy-library', $buyingbuddy_array, "before");
    }
}
/* Activate Buying Buddy Plugin */
function buyingbuddy_plugin_activation() 
{
     
    $buyingbuddy_options = array();      
    $buyingbuddy_options = unserialize(sanitize_text_field(get_option("buyingbuddy_options")));
    $buyingbuddy_acid = sanitize_text_field($buyingbuddy_options["acid"]);
    if (empty($buyingbuddy_acid))  $buyingbuddy_acid = sanitize_text_field(get_option("buyingbuddy_acid"));
    
    // check if acid exists from old Buying Buddy plugin.
    if (empty($buyingbuddy_acid)) {
        $old_mbb_options = unserialize(get_option("mbb_options"));
        if (!empty($old_mbb_options)) {
            $buyingbuddy_options["acid"] = sanitize_text_field($old_mbb_options["acid"]);
            $buyingbuddy_acid = $buyingbuddy_options["acid"];
            $buyingbuddy_options["google_map"] = sanitize_text_field($old_mbb_options["google_map"]);
            if (empty($buyingbuddy_options["google_map_key"])) $buyingbuddy_options["google_map_key"] = sanitize_text_field($old_mbb_options["google_map_key"]);
            $buyingbuddy_options["footer"] = sanitize_text_field($old_mbb_options["footer"]);
            $buyingbuddy_options["disable"] = sanitize_text_field($old_mbb_options["disable"]);
            $buyingbuddy_options["express"] = sanitize_text_field($old_mbb_options["express"]);
            $buyingbuddy_options["mbb_allowedids"] = sanitize_text_field($old_mbb_options["mbb_allowedids"]);
            if (!empty($buyingbuddy_options["acid"])) update_option('buyingbuddy_options', serialize($buyingbuddy_options));
        }   
    } 
    
    if (isset($buyingbuddy_acid) && !empty($buyingbuddy_acid)) {
        $buyingbuddy_options["installed"] = "true";
        $buyingbuddy_options["acid"] = $buyingbuddy_acid;
        update_option('buyingbuddy_options', serialize($buyingbuddy_options));
    } else {
        $buyingbuddy_options["installed"] = "false";
        update_option('buyingbuddy_options', serialize($buyingbuddy_options));
    }
    
    if (empty($buyingbuddy_acid)) add_option('buyingbuddy_plugin_do_activation_redirect', 1);
    add_option('buyingbuddy_plugin_do_activation_redirect', 1);
    
    if ( ! function_exists( 'is_plugin_active' ) ) require_once( ABSPATH . '/wp-admin/includes/plugin.php' );       
    
    // deactivate old Buying Buddy plugins before activating new plugin          
    if ( is_plugin_active( "my-buying-buddy/my-buying-buddy.php" ) ) deactivate_plugins( "my-buying-buddy/my-buying-buddy.php", false, false );
            
    // Flush all rewrite rules
    flush_rewrite_rules();
}
/* Deactivate Buying Buddy Plugin */
function buyingbuddy_plugin_deactivation() 
{
    flush_rewrite_rules();    
    $buyingbuddy_options = array();
   // update_option('buyingbuddy_options', serialize($buyingbuddy_options));
    update_option('buyingbuddy_caching_conflict_message', "");
}
/* Redirect to Settings page after Plugin Activation */
function buyingbuddy_plugin_settings_redirect() 
{
    if (get_option('buyingbuddy_plugin_do_activation_redirect') == 1) {
        delete_option('buyingbuddy_plugin_do_activation_redirect');
        if(empty($_GET['activate-multi'])) {
            wp_redirect( admin_url( 'options-general.php?page=buying-buddy' ) );
        }
     }
}
/* Load Buying Buddy Rewrite Rules */
function buyingbuddy_plugin_init()
{
    global $buyingbuddy_options, $wp_rewrite;
    /* Check cache for when to flush rewrite rules */
    buyingbuddy_check_rewrite_cache();
    add_filter('query_vars','buyingbuddy_add_queryvars' );
      
    add_rewrite_rule('(.*)/([^-]*)--.*','index.php?pagename=$matches[1]&property_id=$matches[2]','top');
    add_rewrite_tag('%property_id%','([^&]+)');   
    add_rewrite_tag('%address%','([^&]+)');   

    $roster_slug = "team";  
    add_rewrite_rule('^'.$roster_slug.'/?$','index.php?pagename='.$roster_slug.'&team_office=list','top');
    add_rewrite_rule('^'.$roster_slug.'/office/?(.*)$','index.php?pagename='.$roster_slug.'&team_office=$matches[1]','top');
    add_rewrite_rule('^'.$roster_slug.'/([A-Za-z0-9-_]*)/?$','index.php?pagename='.$roster_slug.'&team_agent=$matches[1]','top');
    
    add_rewrite_tag('%team_agent%','([^&]+)');   
    add_rewrite_tag('%team_office%','([^&]+)');      
    
    //show Admin panels and features
    if (is_admin()) {
        
        add_action('admin_menu', 'buyingbuddy_options_page');
        add_filter('plugin_action_links_' . esc_url(plugin_basename(__FILE__)), 'buyingbuddy_plugin_page_links' );
        /* Display WordPress Notice/Pointer for Buying Buddy */
        if(get_option('buyingbuddy_caching_conflict_message') != 1 && !empty($buyingbuddy_options["acid"]) ) {
            
            $caching_plugins = array(
                "w3-total-cache/w3-total-cache.php",
                "wp-super-cache/wp-cache.php",
                "wp-fastest-cache/wpFastestCache.php",
                "wp-rocket/wp-rocket.php",
                "nitropack/main.php",
                "wp-optimize/wp-optimize.php"
            );
            $show_caching_message = "";
            if ( ! function_exists( 'is_plugin_active' ) ) require_once( ABSPATH . '/wp-admin/includes/plugin.php' );       
            
            foreach($caching_plugins as $plugin) {
                if ( is_plugin_active( $plugin ) ) {
                    $show_caching_message = 1;
                } 
            }  
            if ($show_caching_message == 1) add_action( 'admin_notices', 'buyingbuddy_caching_conflict_notice' );
        } 
        
        /* Display WordPress Notice/Pointer for Buying Buddy */
        $oldmbburl = ABSPATH . 'wp-content/plugins/my-buying-buddy/my-buying-buddy.php';
        
        if(get_option('buyingbuddy_oldplugin_message') != 1 ) {            
            
            if (file_exists($oldmbburl)) {
                add_action( 'admin_notices', 'buyingbuddy_oldplugin_notice' );
            }    
        } 
        
        /* Show message on Plugins page if old Buying Buddy plugin is installed */
        if (file_exists($oldmbburl)) {
            add_action( 'after_plugin_row_my-buying-buddy/my-buying-buddy.php', 'buyingbuddy_oldplugin_message', 10, 2 );
        }              
    }  
}
function buyingbuddy_oldplugin_message() 
{ 
    echo '
        <tr class="plugin-update-tr"><td colspan=4" class="plugin-update colspanchange"><div class="update-message notice inline notice-warning notice-alt"><strong>Imporant Notice</strong><br />
       This plugin can be safely deleted as you are using the new version of our Buying Buddy plugin.</div></td></tr>
    ';
}
function buyingbuddy_caching_conflict_notice() 
{ ?>
    <div class="notice error buyingbuddy-caching-notice is-dismissible" >
        <h3>Buying Buddy Warning</h3>
        <p>You have a caching plugin enabled. This can cause unexpected results with the Buying buddy plugin. You should avoid aggregating or deferring the loading of the Buying Buddy library JavaScript files.</p>
    </div>


<?php
}

function buyingbuddy_oldplugin_notice() 
{ ?>
    <div class="notice error buyingbuddy-oldplugin-notice is-dismissible" >
        <h3>Buying Buddy Warning</h3>
        <p>You are using the latest version of our plugin. However, you still have the old version of our plugin installed (v5.0). This can be safely deleted from the <a href="<?php echo admin_url("plugins.php");?>">Plugins</a> page on your website.</p>
    </div>


<?php
}
add_action( 'wp_ajax_buyingbuddy_dismiss_caching_notice', 'buyingbuddy_dismiss_caching_notice' );

function buyingbuddy_dismiss_caching_notice() 
{
    update_option( 'buyingbuddy_caching_conflict_message', 1 );
}
add_action( 'wp_ajax_buyingbuddy_dismiss_oldplugin_notice', 'buyingbuddy_dismiss_oldplugin_notice' );

function buyingbuddy_dismiss_oldplugin_notice() 
{
    update_option( 'buyingbuddy_oldplugin_message', 1 );
} 
/* Enable auto updates for Buying Buddy plugin */
function buyingbuddy_enable_plugin_auto_updates( $update, $plugin ) {
    global $buyingbuddy_options; 
      
    if ($buyingbuddy_options["auto_updates"] == "yes") {
        $allowed = array('buying-buddy-idx-crm');
    } else $allowed = array();
    return in_array($plugin->slug, $allowed) ? true : $update;
}


add_filter( 'auto_update_plugin', 'buyingbuddy_enable_plugin_auto_updates', 10, 2 );

/* Set SEO Content for Property Details page */
function buyingbuddy_property_details() 
{
    global $widgetHTML, $detailsHTML, $post, $buyingbuddyObj, $buyingbuddy_options, $mbbdetails;    
        
    $property_id = sanitize_text_field(get_query_var('property_id'));
    if ($property_id && sanitize_text_field($mbbdetails) != "true") {
        $mbbdetails = "true";
        
        //Change Permalink for Property Details page for Social Sharing purposes         
        
        $widgetParams = array(
            'property_id'   => $property_id       
        );

        $detailsHTML = $buyingbuddyObj->getWidget("MBBv3_SearchDetails",$widgetParams,"index"); 
                
        if (sanitize_text_field($detailsHTML->listing_status) != "deleted") { 
            add_filter( 'page_link', 'buyingbuddy_change_permalink', 10, 3 );    
            add_filter( 'wpseo_canonical', 'buyingbuddy_wpseo_permalink'); // remove Canonical for Wordpress SEO Plugin  
                 
            add_filter('wp_head', 'buyingbuddy_property_set_meta_tags');
            add_filter('pre_get_document_title', 'buyingbuddy_property_set_title_tag' );
            add_filter('jetpack_enable_open_graph', '__return_false' ); //disable Jetpack social sharing        
            add_filter('wp_title', 'buyingbuddy_property_set_title_tag',20);
            add_filter('wpseo_title', 'buyingbuddy_property_set_title_tag',20); //override title for Wordpress SEO Plugin
            add_filter('wpseo_metadesc', '__return_false' ); // remove OG description for Wordpress SEO Plugin
            add_filter('wpseo_og_title', '__return_false' );//override OG title for Wordpress SEO Plugin
            add_filter('wpseo_frontend_presenter_classes', function($classes) { //override OG tags for Wordpress SEO Plugin
                    $classes = array_filter($classes, function($class) {
                        return strpos($class, 'Open_Graph') === false;
                    });
                    return $classes;
                } );  
            add_filter('seopress_titles_the_title_priority', 'buyingbuddy_seopress_title_priority'); // set priority for page title for SEO Press 
                
        }        
     }
}


function buyingbuddy_remove_yoast_og() 
{
  
  $property_id = sanitize_text_field(get_query_var('property_id'));
  if ($property_id) {
      if (empty($GLOBALS['wpseo_og']))$GLOBALS['wpseo_og'] = "";
      remove_action( 'wpseo_head', array( esc_html($GLOBALS['wpseo_og']), 'opengraph' ), 30 );
      remove_action('wp_head','jetpack_og_tags'); // JetPack
      if (defined('AIOSEOP_VERSION')) { // All-In-One SEO
        global $aiosp;
        remove_action('wp_head',array($aiosp,'wp_head'));
      }
  }
}
/* Set Meta tags on Property page */
function buyingbuddy_property_set_meta_tags() 
{
    global $post, $detailsHTML, $widgetHTML, $buyingbuddy_options;
    echo '
    <meta name="description" content="'.esc_html($detailsHTML->meta_description).'" />
    <meta name="keywords" content="'.esc_html($detailsHTML->meta_keywords).'" />
    ';
    
    // Output Facebook and Twitter OG tags
    echo wp_kses($detailsHTML->og_tags, array("meta" => array(
        "name" => array(),
        "content" => array(),
        "property" => array(),
        )));
    
    // Set H1 for Product Details page
    $post->post_title = esc_html($detailsHTML->h1);
        
}
/* Set Title tags on Property page */
function buyingbuddy_property_set_title_tag() 
{
    global $detailsHTML;
    return esc_html($detailsHTML->title);
}

?>