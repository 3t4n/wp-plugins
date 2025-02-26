<?php
/**
 * Plugin Name: WP Dynamic Keywords Injector
 * Plugin URI: https://wordpress.org/plugins/wp-dynamic-keywords-injector/
 * Description: WP Dynamic Keywords Injector inserts dynamic keywords, spintax, page title and meta title.
 * Version: 2.3.26
 * Author: Seerox
 * Author URI: https://www.seerox.com
 * Requires at least: 3.8
 * Tested up to: 6.7.1
 */

/**
 * Shortcode for Dynamic Keywords
 * @param   array   $atts
 * @return  string  $keyword
 */
add_action( 'admin_print_styles', 'srx_sidebar_popup_scripts' );
function srx_sidebar_popup_scripts() {
    $plugin_url = plugin_dir_url( __FILE__ );
    if (isset($_GET['page'])) {
        if ($_GET['page'] == 'seerox_wpdki_settings') {
            wp_enqueue_script('magnific-popup-js', $plugin_url.'js/jquery.magnific-popup.min.js');
            wp_enqueue_style('magnific-popup-css', $plugin_url.'css/magnific-popup.min.css');
            wp_enqueue_style('magnific-popup-font-css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'); 
        }
    }
}

add_action('wp_ajax_srx_add_popup_option', 'srx_add_popup_option_fun');
add_action('wp_ajax_nopriv_srx_add_popup_option', 'srx_add_popup_option_fun');
function srx_add_popup_option_fun(){
    if ( !isset( $_POST['_srx_close_btn__nonce'] ) || !wp_verify_nonce( $_POST['_srx_close_btn__nonce'], 'srx_close_btn_ajax_nonce' ) ) {
        return 'failed';
    }else{
        add_option( 'srx_popup_open', true );
        return 'success';
    }
    exit();
}
     
function seerox_wpdki_insert_dynamic_keywords( $atts = array() ) {
    // Variables initialization
    $default         = '';
    $dyn_keyword     = '';
    $spintax_keyword = '';

    $atts = shortcode_atts( array(
        'spintax' => false,
        'default' => false,
    ), $atts, 'seerox_wpdki_dyn_keywords' );

    $search_keyword = isset( $_GET["search_keyword"] ) && strip_tags($_GET["search_keyword"]) == $_GET["search_keyword"] ? $_GET["search_keyword"] : false;
    $dyn_keyword = isset( $_GET["dyn_keyword"] ) && strip_tags($_GET["dyn_keyword"]) == $_GET["dyn_keyword"] ? $_GET["dyn_keyword"] : false;
    if ( ! $dyn_keyword ) {
        $default         = esc_html( $atts['default'] );
        $spintax         = esc_html( $atts['spintax'] );
        $spintax_keyword = seerox_wpdki_spintax_tool( $spintax );
    }
    $rplc_dflt_txt = str_replace('SEARCH_KEYWORD',  $search_keyword , $default);

    if ( $dyn_keyword ) {
        $dyn_keyword = str_replace('-', ' ', $dyn_keyword);
        $keyword = stripslashes_deep( $dyn_keyword );
    } elseif ( '' != $spintax_keyword ) {
        $keyword = $spintax_keyword;
    } else {
        $keyword = $rplc_dflt_txt;
    }

    return $keyword;
}
add_shortcode( 'seerox_wpdki_dyn_keywords', 'seerox_wpdki_insert_dynamic_keywords' );

/**
 * creates as many unique versions of a piece of text as you want
 *
 * @param string $content
 * @return string $content
 */
function seerox_wpdki_spintax_tool( $content ) {
    if( ! $content ) return;

    $content = str_replace( "'", "`", $content );
    while ( seerox_wpdki_is_occurence_found( "}", $content ) ) {
        $rbracket       = strpos( $content, "}", 0 );
        $t_string       = substr( $content, 0, $rbracket );
        $t_string_token = explode( "{", $t_string );
        $t_string_count = count( $t_string_token ) - 1;
        $t_string       = $t_string_token[ $t_string_count ];
        $t_string_token = explode( "|", $t_string );
        $t_string_count = count( $t_string_token ) - 1;
        $i              = rand( 0, $t_string_count );
        $replace        = $t_string_token[ $i ];
        $t_string       = "{" . $t_string . "}";
        $content        = seerox_wpdki_string_replace( $t_string, $replace, $content );
    }

    return $content;
}

/**
 * Returns the index if the needle found in haystack else false
 * @param  string   $needle   string to find
 * @param  string   $haystack string in which we want to make search
 * @return int|bool
 */
function seerox_wpdki_is_occurence_found( $needle, $haystack ) {
    return false !== @strpos( $haystack, $needle );
}

/**
 * Replace first occurence
 * @param  string $needle       string to find
 * @param  string $middle_part  string to insert in the middle
 * @param  string $haystack     this is a string in which the search is made
 * @return string $temp         replaced string     
 */
function seerox_wpdki_string_replace( $needle, $middle_part, $haystack ) {
    $length = strlen( $haystack );
    $start  = strpos( $haystack, $needle );
    $end    = $start + strlen( $needle );
    $temp   = substr( $haystack, 0, $start ) . $middle_part . substr( $haystack, $end, ( $length - $end ) );

    return $temp;
}

/**
 * Change the Page/Post Title.
 * @param  string $current_page_title
 * @return string $page_title|$current_page_title
 */
function seerox_wpdki_dynamic_title( $current_page_title ) {
    
    global $post;
    $search_keyword = isset( $_GET["search_keyword"] ) && strip_tags($_GET["search_keyword"]) == $_GET["search_keyword"] ? $_GET["search_keyword"] : false;
    $page_title    = !empty( $_GET["page_title"] ) && strip_tags($_GET["page_title"]) == $_GET["page_title"] ? sanitize_text_field( $_GET["page_title"] ) : false;
    $get_whtkwd = get_option('srx-whitelist-kwd-box');
    $get_whtkwd_arr = explode( ",", $get_whtkwd ); 

    if ( $page_title && strtolower( $current_page_title ) == strtolower( $post->post_title ) ) {

        $rplc_page_title = str_replace('SEARCH_KEYWORD',  $search_keyword , $page_title);
        $str_replc_white_list = str_replace('SEARCH_KEYWORD',  $search_keyword , $get_whtkwd_arr);

        if( in_array($rplc_page_title, $str_replc_white_list) && get_option("srx-whitelist-kwd") == 1 ) {
            return $rplc_page_title;
        }else if( !in_array($rplc_page_title, $str_replc_white_list) && get_option("srx-whitelist-kwd") == 1 ) {
            return $current_page_title;
        } else {
            return $rplc_page_title;
        }

    }

    return $current_page_title;
}
add_filter( 'the_title', 'seerox_wpdki_dynamic_title', 1 );

/**
 * Change the Meta Title.
 * @return string $title|$current_title
 */
function seerox_wpdki_change_the_title() {
    $current_title = '';
    $search_keyword = isset( $_GET["search_keyword"] ) && strip_tags($_GET["search_keyword"]) == $_GET["search_keyword"] ? $_GET["search_keyword"] : false;
    $title    = !empty( $_GET["title"] ) && strip_tags($_GET["title"]) == $_GET["title"] ? sanitize_text_field( $_GET["title"] ) : false;
    $get_whtkwd = get_option('srx-whitelist-kwd-box');
    $str_whtkwd = str_replace(array("\r", "\n"), ',', $get_whtkwd);
    $get_whtkwd_arr = explode( ",", $str_whtkwd );


    if( $title ) {

        $rplc_title = str_replace('SEARCH_KEYWORD',  $search_keyword , $title);
        $str_replc_white_list = str_replace('SEARCH_KEYWORD',  $search_keyword , $get_whtkwd_arr);

        if ( in_array( $rplc_title, $str_replc_white_list ) && get_option("srx-whitelist-kwd") == 1 ) {
            return $rplc_title;
        }else if( !in_array( $rplc_title, $str_replc_white_list ) && get_option("srx-whitelist-kwd") == 1 ) {
            return $current_title;
        } else {
            return $rplc_title;
        }

    }
        
    return $current_title;
}
if(get_option( 'srx-metatitle-check' ) == 1)
{
    add_filter('pre_get_document_title', 'seerox_wpdki_change_the_title', 1);
}


/**
 * Update body content links.
 * @return string $current
 */
if(get_option( 'srx_internal_check' ) == 1)
{
    add_filter ('the_content', 'seerox_wpdki_update_body_link', 10, 1) ;
}
function seerox_wpdki_update_body_link($content)
{
    if(isset($_GET['dyn_keyword']) || isset($_GET['title']) || isset($_GET['page_title'])){

        if(isset($_GET['dyn_keyword']) && strip_tags($_GET["dyn_keyword"]) != $_GET["dyn_keyword"]){
            // Do Nothing
        }else if(isset($_GET['title']) && strip_tags($_GET["title"]) != $_GET["title"]){
            // Do Nothing 
        }else if(isset($_GET['page_title']) && strip_tags($_GET["page_title"]) != $_GET["page_title"]){
            // Do nothing
        }else if(isset($_GET['search_keyword']) && strip_tags($_GET["search_keyword"]) != $_GET["search_keyword"]){
            // Do nothing
        }else{
            global $post;
            if (!function_exists('is_plugin_active')) {
                include_once(ABSPATH . 'wp-admin/includes/plugin.php');
            }
            if (is_plugin_active( 'elementor/elementor.php' ) && \Elementor\Plugin::$instance->db->is_built_with_elementor($post->ID)) {
                    $content = apply_filters( 'elementor/frontend/the_content', $content );
            } else {
                $content = $post->post_content;
            }

            $regexhttp = '/http?\:\/\/[^\" ]+/i';
            preg_match_all($regexhttp, $content, $httpmatches);
            $regexhttps = '/https?\:\/\/[^\" ]+/i';
            preg_match_all($regexhttps, $content, $httpsmatches);
            $a = array_merge($httpmatches,$httpsmatches);
            $a_links = $a[1];
            $count = count($a_links);

            for ($row = 0; $row < $count ; $row++) {
                $link = $a_links[$row];

                if(strpos($link,home_url()) !== false || preg_match('/^(\/.*)$/', $link))
                {

                    //----- Already query found in URL
                    //---- Parsed and append on dynamic url
                    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    $qs = parse_url($actual_link,PHP_URL_QUERY);
                    $preq='';$oldq=array('/?');
                    parse_str($qs, $vars);
                    
                    foreach ($vars as $key => $value) {
                        if(strlen($key)>0)
                        {
                            $preq .= '&'.$key.'='.$value;
                            array_push($oldq, $key.'='.$value);
                        }
                    }

                    //-- change only home url
                    if($link == home_url('/'))
                    {
                        $content = str_replace('"'.$link.'"','"'.$link.'?'.$_SERVER['QUERY_STRING'].'"',$content);
                    }else{
                        
                        $content = str_replace('"'.$link.'"','"'.$link.'?'.$_SERVER['QUERY_STRING'].'"',$content);
                    }
                }
            }
        }
    }
    
    return $content;
}

/**
 * Updates canonical url's & Permalinks.
 * @return $permalink
 */
$filters = array (
    'post_link',       // when post_type == 'post'
    'page_link',       // when post_type == 'page'
    'attachment_link', // when post_type == 'attachment'
    'post_type_link',  // when post_type is not one of the above
    ) ;

if(get_option( 'srx_internal_check' ) == 1)
{
    if(isset($_GET['dyn_keyword']) || isset($_GET['title']) || isset($_GET['page_title'])){
        if(isset($_GET['dyn_keyword']) && strip_tags($_GET["dyn_keyword"]) != $_GET["dyn_keyword"]){
            // Do Nothing
        }else if(isset($_GET['title']) && strip_tags($_GET["title"]) != $_GET["title"]){
            // Do Nothing 
        }else if(isset($_GET['page_title']) && strip_tags($_GET["page_title"]) != $_GET["page_title"]){
            // Do nothing
        }else if(isset($_GET['search_keyword']) && strip_tags($_GET["search_keyword"]) != $_GET["search_keyword"]){
            // Do nothing
        }else{
            foreach ($filters as $filter) {
                add_filter ($filter, 'seerox_wpdki_add_query_args') ;
            }
        }
    }
}


function seerox_wpdki_add_query_args($permalink)
{
    if(is_singular())
    {
        if(isset($_GET['dyn_keyword']) || isset($_GET['title']) || isset($_GET['page_title'])){
            if(isset($_GET['dyn_keyword']) && strip_tags($_GET["dyn_keyword"]) != $_GET["dyn_keyword"]){
                // Do Nothing
            }else if(isset($_GET['title']) && strip_tags($_GET["title"]) != $_GET["title"]){
                // Do Nothing 
            }else if(isset($_GET['page_title']) && strip_tags($_GET["page_title"]) != $_GET["page_title"]){
                // Do nothing
            }else if(isset($_GET['search_keyword']) && strip_tags($_GET["search_keyword"]) != $_GET["search_keyword"]){
                // Do nothing
            }else{
                return (esc_url (add_query_arg($_GET, $permalink))) ;
            }
        }
    }else{
        return $permalink;
    }
    
}



/**
 * Fireup Shortcode for Dynamic Keywords in SEO Meta
 * @return  string  $keyword
 */
$seerox_wpdki_Meta = array (
    'wpseo_metadesc',
    'wpseo_opengraph_title',
    'wpseo_opengraph_description',
    'wpseo_twitter_title',
    'wpseo_twitter_description',
) ;

if(get_option( 'srx_metaval_check' ) == 1)
{
    foreach ( $seerox_wpdki_Meta as $seoMeta ) {
        add_filter ( $seoMeta, 'do_shortcode' );
    }  
}

/**
 * Enable WPDKI Shortcode in Yoast Title, All in one SEO Title and Rank Math SEO Title
 * @return $title
 */
add_filter( 'aioseop_title', 'seerox_wpdki_enable_title_shortcode', 1 );
add_filter('wpseo_title', 'seerox_wpdki_enable_title_shortcode');
add_filter('rank_math/frontend/title', 'seerox_wpdki_enable_title_shortcode');
function seerox_wpdki_enable_title_shortcode($title) {
    $title = do_shortcode($title); 
    $wpdki_ptitle = !empty( $_GET["title"] ) && strip_tags($_GET["title"]) == $_GET["title"] ? sanitize_text_field( $_GET["title"] ) : false;
    $search_keyword = isset( $_GET["search_keyword"] ) && strip_tags($_GET["search_keyword"]) == $_GET["search_keyword"] ? $_GET["search_keyword"] : false;
    if ($wpdki_ptitle && get_option( 'srx-metatitle-check' ) == 1) {
        $rplc_title = str_replace('SEARCH_KEYWORD',  $search_keyword , $wpdki_ptitle);
        $title = $rplc_title;
    } 
  return $title;
}

/**
 * Enable WPDKI Shortcode in All in One SEO Description
 * @return $description
 */
add_filter( 'aioseo_description', 'srx_aioseo_filter_description');
function srx_aioseo_filter_description( $description ) {

    $description = do_shortcode($description);
    return $description;
}

/**
 * Enable WPDKI Shortcode in Math Rank SEO Description
 * @return $description
 */
add_filter(
    'rank_math/frontend/description',
    function ( $description ) {

        $description = do_shortcode($description);
        return $description;

    }, 10, 2);

/**
 * register Canonical Url
 * @return  string  $keyword
 */

add_action ( 'wp_head' , 'seerox_wpdki_rel_canonical' ) ;

function seerox_wpdki_rel_canonical () {

    
    if(get_option( 'srx_canonical_check' ) == 1)
    {
        remove_action ( 'wp_head' , 'rel_canonical' , 48) ;
        add_filter( 'wpseo_canonical', '__return_false' );
        $appn = '';
        ob_start () ;
        rel_canonical () ;
        $rel_content = ob_get_contents () ;
        ob_end_clean () ;
        if(isset($_SERVER['QUERY_STRING']))
        {
            if (isset($_GET['dyn_keyword']) || isset($_GET['title']) || isset($_GET['page_title'])) {
                if(isset($_GET['dyn_keyword']) && strip_tags($_GET["dyn_keyword"]) != $_GET["dyn_keyword"]){
                    // Do Nothing
                }else if(isset($_GET['title']) && strip_tags($_GET["title"]) != $_GET["title"]){
                    // Do Nothing 
                }else if(isset($_GET['page_title']) && strip_tags($_GET["page_title"]) != $_GET["page_title"]){
                    // Do nothing
                }else if(isset($_GET['search_keyword']) && strip_tags($_GET["search_keyword"]) != $_GET["search_keyword"]){
                    // Do nothing
                }else{
                    $appn = '?'.$_SERVER['QUERY_STRING'];
                }
            }
        }

        $url_parts = explode('?', get_page_link(),2);
        echo str_replace ( get_page_link() , $url_parts[0].$appn, $rel_content ) ;
    }
    
}



/**
 * Setting Menu
 * @return  Add Menu in Admin Panel
 */

add_action( 'admin_menu', 'seerox_wpdki_settings_menu' );

function seerox_wpdki_settings_menu ()
{
    add_menu_page( 
        'Wordpress Dynamic Keyword Injector Settings',
        'WP Dynamic Keyword Injector', 
        'manage_options',
        'seerox_wpdki_settings',
        'seerox_wpdki_settings_content'
    );
}

function seerox_wpdki_settings_content () 
{
    if( isset( $_POST['srx_wpdki_upsettings'] ) && wp_verify_nonce($_REQUEST['wpdki_free_setting_nonce_field'], 'wpdki_free_setting_submit'))
    {
        //-- Update Settings for canonical url
        if( isset( $_POST['srx_canonical_check'] ) )
        {
            update_option( 'srx_canonical_check', 1 );
        }else{
            update_option( 'srx_canonical_check', 0 );
        }
        //-- Update Settings for internal urls
        if( isset( $_POST['srx_internal_check'] ) )
        {
            update_option( 'srx_internal_check', 1 );
        }else{
            update_option( 'srx_internal_check', 0 );
        }
        // -- update settings for meta tags short code trigger
        if( isset( $_POST['srx_metaval_check'] ) )
        {
            update_option( 'srx_metaval_check', 1 );
        }else{
            update_option( 'srx_metaval_check', 0 );
        }
        //-- Update Settings for Meta Title
        if( isset( $_POST['srx-metatitle-check'] ) )
        {
            update_option( 'srx-metatitle-check', 1 );
        }else{
            update_option( 'srx-metatitle-check', 0 );
        }
        //-- Update Settings for Whitelist Keyword
        if( isset( $_POST['srx-whitelist-kwd'] ) )
        {
            update_option( 'srx-whitelist-kwd', 1 );
        }else{
            update_option( 'srx-whitelist-kwd', 0 );
        }
        if( isset( $_POST['srx-whitelist-kwd-box'] ) )
        {
            $srx_whitelist_kwd_box = $_POST['srx-whitelist-kwd-box'];
            update_option( 'srx-whitelist-kwd-box', sanitize_text_field($srx_whitelist_kwd_box) );
        }
    }
    include_once( "settings.php" );
}

function srx_wpdki_curl_function($data,$url){
    $send_data = $data;
    $string = http_build_query($send_data);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $response = curl_exec($ch);
    curl_close($ch);
    return  $response;
}

add_action('admin_footer', 'srx_wpdki_ft_areq_js');
function srx_wpdki_ft_areq_js(){
    $srx_wpdki_trial_form_ajax_nonce = wp_create_nonce( "srx_wpdki_trial_form_nonce" );
    ?>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                jQuery("#srx_wpdki_trial_form").submit(function(e){
                    e.preventDefault();
                    var ajaxurl = "<?php echo admin_url('admin-ajax.php');?>";
                    jQuery(".srx-wpdki-trial-form").css('opacity','0.5');

                    var wpdki_trial_f_name = jQuery(".wpdki_trial_f_name").val();
                    var wpdki_trial_l_name = jQuery(".wpdki_trial_l_name").val();
                    var wpdki_trial_email = jQuery(".wpdki_trial_email").val();
                    var wpdki_trial_website = jQuery(".wpdki_trial_website").val();

                    var data = {
                        'action' : 'srx_wpdki_ft_req',
                        '_srx_trial__nonce': <?php echo wp_json_encode( $srx_wpdki_trial_form_ajax_nonce ); ?>,
                        'wpdki_trial_f_name' : wpdki_trial_f_name,
                        'wpdki_trial_l_name' : wpdki_trial_l_name,
                        'wpdki_trial_email' : wpdki_trial_email,
                        'wpdki_trial_website' : wpdki_trial_website,
                    };

                    jQuery.post(ajaxurl, data, function(response){
                        jQuery(".srx-wpdki-trial-form").css('opacity','1');
                        jQuery("#srx_wpdki_tf_m").html(response);
                    });

                });
            });
        </script>
    <?php 
}

add_action('wp_ajax_srx_wpdki_ft_req', 'srx_wpdki_ft_req_ws');
function srx_wpdki_ft_req_ws(){

    if ( !isset( $_POST['_srx_trial__nonce'] ) || !wp_verify_nonce( $_POST['_srx_trial__nonce'], 'srx_wpdki_trial_form_nonce' ) ) {
        echo 'Invalid nonce';
    }else{
        $wpdki_req_url = "https://wpdki.com/?wpdki_basic_trial_handler=true";
        $data = array(
            "wpdki_trial_f_name" => sanitize_text_field($_POST['wpdki_trial_f_name']),
            "wpdki_trial_l_name" => sanitize_text_field($_POST['wpdki_trial_l_name']),
            "wpdki_trial_email" => sanitize_text_field($_POST['wpdki_trial_email']),
            "wpdki_trial_website" => sanitize_text_field($_POST['wpdki_trial_website'])
        );

        $result = srx_wpdki_curl_function($data,$wpdki_req_url);
        $result = json_decode($result,true);
        echo $result['response_msg'];
    }

    wp_die();
}