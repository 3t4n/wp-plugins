<?php 
/**
 * @version 1.0
 * @package Email Reminders
 * @subpackage Support Functions
 * @category Functions
 * 
 * @author wpdevelop
 * @link http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 29.09.2015
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly


 //                                                                              <editor-fold   defaultstate="collapsed"   desc=" V e r s i o n s " >    
////////////////////////////////////////////////////////////////////////////////
// V e r s i o n s
////////////////////////////////////////////////////////////////////////////////    

/** Get version
 * 
 * @return string
 */
function get_oper_version(){
	$version = 'free';
	return $version;
}
    
/** Check if user accidentially update Email Reminders Paid version to Free
 * 
 * @return bool
 */
function oper_is_updated_paid_to_free() {

	if ( ( oper_is_table_exists('oper_log') ) && ( ! class_exists('oper_personal') )  )
		return  true;
	else
		return false;                    
}
        
function oper_get_ver_sufix() {

	if ( ! defined( 'OPER_VERSION' ) )	define( 'OPER_VERSION',	'' );

	if ( strpos( strtolower( OPER_VERSION ), 'multisite' ) !== false ) {
		$v_type = '-multi';
	} else if ( strpos( strtolower( OPER_VERSION ), 'develop' ) !== false ) {
		$v_type = '-dev';
	} else {
		$v_type = '';
	}
	$v = '';
	if ( class_exists( 'oper_personal' ) )
		$v = 'ps' . $v_type;
	if ( class_exists( 'oper_pro' ) )
		$v = '';
	return $v;
}

function oper_up_link() {
	if ( ! oper_is_this_demo() )
		 $v = oper_get_ver_sufix();
	else $v = '';
	return 'http://oplugins.com/plugins/email-reminders/' . ( ( empty($v) ) ? '' : 'upgrade-' . $v  . '/' ) ;
}
    
/** Check if this demo website
 * 
 * @return bool
 */
function oper_is_this_demo() {
//return ! true;     //TODO: comment it. 2016-09-27    // Replaced!   
	if (
			( strpos( $_SERVER[ 'SCRIPT_FILENAME' ], 'oplugins.com' ) !== false ) 
	     || ( strpos( $_SERVER[ 'HTTP_HOST' ], 'oplugins.com' ) !== false )
	  ) 
		return true;
	else
		return false;
}

/** Get Warning Text  for Demo websites */
function oper_get_warning_text_in_demo_mode() {

	return '<div class="oper-settings-notice notice-warning"><strong>Warning!</strong> Demo test version does not allow changes to these items.</div>';
}

/** Show System Info (status) at item > Settings General page
 *  Link: http://server.com/wp-admin/admin.php?page=oper-settings&system_info=show#oper_general_settings_system_info_metabox
 */
function oper_system_info() {

   if ( oper_is_this_demo() ) return;

   if ( current_user_can( 'activate_plugins' ) ) {                                // Only for Administrator or Super admin. More here: https://codex.wordpress.org/Roles_and_Capabilities

	   global $wpdb, $wp_version;

	   $all_plugins = get_plugins();
	   $active_plugins = get_option( 'active_plugins' );

	   $mysql_info = $wpdb->get_results( "SHOW VARIABLES LIKE 'sql_mode'" );
	   if ( is_array( $mysql_info ) )  $sql_mode = $mysql_info[0]->Value;
	   if ( empty( $sql_mode ) )       $sql_mode = 'Not set';

	   $safe_mode          = ( ini_get( 'safe_mode' ) ) ? 'On' : 'Off';
	   $allow_url_fopen    = ( ini_get( 'allow_url_fopen' ) ) ?  'On' : 'Off';
	   $upload_max_filesize = ( ini_get( 'upload_max_filesize' ) ) ? ini_get( 'upload_max_filesize' ) : 'N/A';
	   $post_max_size      = ( ini_get( 'post_max_size' ) ) ? ini_get( 'post_max_size' ) : 'N/A';
	   $max_execution_time = ( ini_get( 'max_execution_time' ) ) ? ini_get( 'max_execution_time' ) : 'N/A';
	   $memory_limit       = ( ini_get( 'memory_limit' ) ) ? ini_get( 'memory_limit' ) : 'N/A';
	   $memory_usage       = ( function_exists( 'memory_get_usage' ) ) ? round( memory_get_usage() / 1024 / 1024, 2 ) . ' Mb' : 'N/A';
	   $exif_read_data     = ( is_callable( 'exif_read_data' ) ) ? 'Yes' . " ( V" . substr( phpversion( 'exif' ), 0, 4 ) . ")" : 'No';
	   $iptcparse          = ( is_callable( 'iptcparse' ) ) ? 'Yes' : 'No';
	   $xml_parser_create  = ( is_callable( 'xml_parser_create' ) ) ? 'Yes' : 'No';
	   $theme              = ( function_exists( 'wp_get_theme' ) ) ? wp_get_theme() : get_theme( get_current_theme() );

	   if ( function_exists( 'is_multisite' ) ) {
		   if ( is_multisite() )   $multisite = 'Yes';
		   else                    $multisite = 'No';
	   } else {                    $multisite = 'N/A';
	   }

	   $system_info = array(
		   'system_info' => '',
		   'php_info' => '',
		   'active_plugins' => array(),
		   'inactive_plugins' => array()
	   );

	   $ver_small_name = get_oper_version();
	   if ( class_exists( 'oper_multiuser' ) ) $ver_small_name = 'multiuser';

	   $system_info['system_info'] = array(
		   'Plugin Update'         => ( defined( 'OPER_VERSION' ) ) ? OPER_VERSION : 'N/A',
		   'Plugin Version'        => ucwords( $ver_small_name ),
		   'Plugin Update Date'   => date( "Y-m-d", filemtime( OPER_FILE ) ),

		   'WP Version' => $wp_version,
		   'WP DEBUG'   =>  ( ( defined('WP_DEBUG') ) && ( WP_DEBUG ) ) ? 'On' : 'Off',
		   'WP DB Version' => get_option( 'db_version' ),
		   'Operating System' => PHP_OS,
		   'Server' => $_SERVER["SERVER_SOFTWARE"],
		   'PHP Version' => PHP_VERSION,
		   'PHP Safe Mode' => $safe_mode,
		   'MYSQL Version' => $wpdb->get_var( "SELECT VERSION() AS version" ),
		   'SQL Mode' => $sql_mode,
		   'Memory usage' => $memory_usage,
		   'Site URL' => get_option( 'siteurl' ),
		   'Home URL' => home_url(),
		   'SERVER[HTTP_HOST]' => $_SERVER['HTTP_HOST'],
		   'SERVER[SERVER_NAME]' => $_SERVER['SERVER_NAME'],
		   'Multisite' => $multisite,
		   'Active Theme' => $theme['Name'] . ' ' . $theme['Version']
	   );

	   $system_info['php_info'] = array(
		   'PHP Version' => PHP_VERSION,
		   'PHP Safe Mode' => $safe_mode,
			   'PHP Memory Limit'              => '<strong>' . $memory_limit . '</strong>',
			   'PHP Max Script Execute Time'   => '<strong>' . $max_execution_time . '</strong>',

			   'PHP Max Post Size'  => '<strong>' . $post_max_size . '</strong>',
			   'PHP MAX Input Vars' => '<strong>' . ( ( ini_get( 'max_input_vars' ) ) ? ini_get( 'max_input_vars' ) : 'N/A' ) . '</strong>',           //How many input variables may be accepted (limit is applied to $_GET, $_POST and $_COOKIE superglobal separately).                 

		   'PHP Max Upload Size'   => $upload_max_filesize,
		   'PHP Allow URL fopen'   => $allow_url_fopen,
		   'PHP Exif support'      => $exif_read_data,
		   'PHP IPTC support'      => $iptcparse,
		   'PHP XML support'       => $xml_parser_create            
	   );

	   $system_info['php_info']['PHP cURL'] =  ( function_exists('curl_init') ) ? 'On' : 'Off';   
	   $system_info['php_info']['Max Nesting Level'] = ( ( ini_get( 'max_input_nesting_level' ) ) ? ini_get( 'max_input_nesting_level' ) : 'N/A' );   
	   $system_info['php_info']['Max Time 4 script'] = ( ( ini_get( 'max_input_time' ) ) ? ini_get( 'max_input_time' ) : 'N/A' );                     //Maximum amount of time each script may spend parsing request data
	   $system_info['php_info']['Log'] =      ( ( ini_get( 'error_log' ) ) ? ini_get( 'error_log' ) : 'N/A' );

	   if ( ini_get( "suhosin.get.max_value_length" ) ) { 

		   $system_info['suhosin_info'] = array();
		   $system_info['suhosin_info']['POST max_array_index_length']     = ( ( ini_get( 'suhosin.post.max_array_index_length' ) ) ? ini_get( 'suhosin.post.max_array_index_length' ) : 'N/A' );
		   $system_info['suhosin_info']['REQUEST max_array_index_length']  = ( ( ini_get( 'suhosin.request.max_array_index_length' ) ) ? ini_get( 'suhosin.request.max_array_index_length' ) : 'N/A' );

		   $system_info['suhosin_info']['POST max_totalname_length']    = ( ( ini_get( 'suhosin.post.max_totalname_length' ) ) ? ini_get( 'suhosin.post.max_totalname_length' ) : 'N/A' );
		   $system_info['suhosin_info']['REQUEST max_totalname_length'] = ( ( ini_get( 'suhosin.request.max_totalname_length' ) ) ? ini_get( 'suhosin.request.max_totalname_length' ) : 'N/A' );

		   $system_info['suhosin_info']['POST max_vars']               = ( ( ini_get( 'suhosin.post.max_vars' ) ) ? ini_get( 'suhosin.post.max_vars' ) : 'N/A' );
		   $system_info['suhosin_info']['REQUEST max_vars']            = ( ( ini_get( 'suhosin.request.max_vars' ) ) ? ini_get( 'suhosin.request.max_vars' ) : 'N/A' );

		   $system_info['suhosin_info']['POST max_value_length']       = ( ( ini_get( 'suhosin.post.max_value_length' ) ) ? ini_get( 'suhosin.post.max_value_length' ) : 'N/A' );
		   $system_info['suhosin_info']['REQUEST max_value_length']    = ( ( ini_get( 'suhosin.request.max_value_length' ) ) ? ini_get( 'suhosin.request.max_value_length' ) : 'N/A' );

		   $system_info['suhosin_info']['POST max_name_length']        = ( ( ini_get( 'suhosin.post.max_name_length' ) ) ? ini_get( 'suhosin.post.max_name_length' ) : 'N/A' );
		   $system_info['suhosin_info']['REQUEST max_varname_length']  = ( ( ini_get( 'suhosin.request.max_varname_length' ) ) ? ini_get( 'suhosin.request.max_varname_length' ) : 'N/A' );

		   $system_info['suhosin_info']['POST max_array_depth']        = ( ( ini_get( 'suhosin.post.max_array_depth' ) ) ? ini_get( 'suhosin.post.max_array_depth' ) : 'N/A' );            
		   $system_info['suhosin_info']['REQUEST max_array_depth']     = ( ( ini_get( 'suhosin.request.max_array_depth' ) ) ? ini_get( 'suhosin.request.max_array_depth' ) : 'N/A' );
	   }


	   if ( function_exists('gd_info') ) {
		   $gd_info = gd_info();
		   if ( isset( $gd_info['GD Version'] ) )
			   $gd_info = $gd_info['GD Version'];
		   else 
			   $gd_info = json_encode( $gd_info );
	   } else {
		   $gd_info = 'Off';
	   }
	   $system_info['php_info']['PHP GD'] = $gd_info;

	   // More here https://docs.woocommerce.com/document/problems-with-large-amounts-of-data-not-saving-variations-rates-etc/


	   foreach ( $all_plugins as $path => $plugin ) {
		   if ( is_plugin_active( $path ) ) {
			   $system_info['active_plugins'][ sanitize_key( $plugin['Name'] ) ] = $plugin['Version'];
		   } else {
			   $system_info['inactive_plugins'][ sanitize_key( $plugin['Name'] ) ] = $plugin['Version'];
		   }
	   }

	   // Showing
	   foreach ( $system_info as $section_name => $section_values ) {
		   ?>
		   <span class="wpdevelop">
		   <table class="table table-striped table-bordered">
			   <thead><tr><th colspan="2" style="border-bottom: 1px solid #eeeeee;padding: 10px;"><?php echo strtoupper( $section_name ); ?></th></tr></thead>
			   <tbody>
			   <?php 
			   if ( !empty( $section_values ) ) {
				   foreach ( $section_values as $key => $value ) {
					   ?>
					   <tr>
						   <td scope="row" style="width:18em;padding:4px 8px;"><?php echo $key; ?></td>
						   <td scope="row" style="padding:4px 8px;"><?php echo $value; ?></td>
					   </tr>
					   <?php                 
				   }
			   }
			   ?>
			   </tbody>
		   </table>
		   </span>
		   <div class="clear"></div>
		   <?php
	   }
?>
<hr>            
<div style="color:#777;">
<h4 style="font-size:1.1em;">Commonly required configuration vars in php.ini file:</h4>            
<h4>General section:</h4>            
<pre><code>memory_limit = 256M
max_execution_time = 120
post_max_size = 8M
upload_max_filesize = 8M
max_input_vars = 20480
post_max_size = 64M</code></pre>  
<h4>Suhosin section (if installed):</h4>
<pre><code>suhosin.post.max_array_index_length = 1024
suhosin.post.max_totalname_length = 65535
suhosin.post.max_vars = 2048
suhosin.post.max_value_length = 1000000
suhosin.post.max_name_length = 256
suhosin.post.max_array_depth = 1000
suhosin.request.max_array_index_length = 1024
suhosin.request.max_totalname_length = 65535
suhosin.request.max_vars = 2048
suhosin.request.max_value_length = 1000000
suhosin.request.max_varname_length = 256
suhosin.request.max_array_depth = 1000</code></pre> 
</div>
<?php 
	   // phpinfo();        
   }
}
//                                                                              </editor-fold>


//                                                                              <editor-fold   defaultstate="collapsed"   desc=" F o r m a t t i n g " >    
////////////////////////////////////////////////////////////////////////////////
// F o r m a t t i n g
////////////////////////////////////////////////////////////////////////////////    
/**
 * Sanitize term to Slug format (no spaces, lowercase).
 * urldecode - reverse munging of UTF8 characters.
 *
 * @param mixed $value
 * @return string
 */
function oper_get_slug_format( $value ) {
    return  urldecode( sanitize_title( $value ) );
}

/**
 * Get Slug Format Option Value for saving to  the options table.
 * Replacing - to _ and restrict length to 64 characters.
 * 
 * @param string $value
 * @return string
 */
function oper_get_slug_format_4_option_name( $value ) {
    
    $value = oper_get_slug_format( $value );
    $value = str_replace('-', '_', $value);
    $value = substr($value, 0, 64);
    return $value;
}

/** Insert New Line symbols after <br> tags. Usefull for the settings pages to  show in redable view
 * 
 * @param type $param
 * @return type
 */
function oper_nl_after_br($param) {

	$value = preg_replace( "@(&lt;|<)br\s*/?(&gt;|>)(\r\n)?@", "<br/>", $param );

	return $value;
}

/**
 * Replace ** to <strong> and * to  <em>
 * 
 * @param String $text
 * @return string
 */
if ( ! function_exists( 'oper_recheck_strong_symbols' ) ) {
function oper_recheck_strong_symbols( $text ){

	$patterns =  '/(\*\*)(\s*[^\*\*]*)(\*\*)/';    
	$replacement = '<strong>${2}</strong>';
	$value_return = preg_replace($patterns, $replacement, $text);

	$patterns =  '/(\*)(\s*[^\*]*)(\*)/';    
	$replacement = '<em>${2}</em>';
	$value_return = preg_replace($patterns, $replacement, $value_return);

	return $value_return;
}
}


/** Esacpe and replace any HTML entities
 * 
 * @param type $string
 * @return string
 */
function oper_esc_to_plain_text( $string ) {

//        //Replace <a href="http://server.com">Link</a> to Link( http://server.com )
//        $pattern = "/<a(.*)+href=[\"|']+([^\"']+)(?=(\"|'))[^>]*>(.*)<\/a>/" ;      //"/(?<=href=(\"|'))[^\"']+(?=(\"|'))/i";
//        $newurl = "$4 ($2)";
//        $string = preg_replace($pattern,$newurl,$string);


	// List of preg* regular expression patterns to search for replace in plain emails. More: https://raw.github.com/ushahidi/wp-silcc/master/class.html2text.inc
	$plain_search_array = array(
						   "/\r/",                                          // Non-legal carriage return
						   '/&(nbsp|#160);/i',                              // Non-breaking space
						   '/&(quot|rdquo|ldquo|#8220|#8221|#147|#148);/i', // Double quotes
						   '/&(apos|rsquo|lsquo|#8216|#8217);/i',           // Single quotes
						   '/&gt;/i',                                       // Greater-than
						   '/&lt;/i',                                       // Less-than
						   '/&#38;/i',                                      // Ampersand
						   '/&#038;/i',                                     // Ampersand
						   '/&amp;/i',                                      // Ampersand
						   '/&(copy|#169);/i',                              // Copyright
						   '/&(trade|#8482|#153);/i',                       // Trademark
						   '/&(reg|#174);/i',                               // Registered
						   '/&(mdash|#151|#8212);/i',                       // mdash
						   '/&(ndash|minus|#8211|#8722);/i',                // ndash
						   '/&(bull|#149|#8226);/i',                        // Bullet
						   '/&(pound|#163);/i',                             // Pound sign
						   '/&(euro|#8364);/i',                             // Euro sign
						   '/&#36;/',                                       // Dollar sign
						   '/&[^&;]+;/i',                                   // Unknown/unhandled entities
						   '/[ ]{2,}/'                                      // Runs of spaces, post-handling
					);

	// List of symbols for Replace
	$get_plain_replace_array = array(
							'',                                             // Non-legal carriage return
							' ',                                            // Non-breaking space
							'"',                                            // Double quotes
							"'",                                            // Single quotes
							'>',                                            // Greater-than
							'<',                                            // Less-than
							'&',                                            // Ampersand
							'&',                                            // Ampersand
							'&',                                            // Ampersand
							'(c)',                                          // Copyright
							'(tm)',                                         // Trademark
							'(R)',                                          // Registered
							'--',                                           // mdash
							'-',                                            // ndash
							'*',                                            // Bullet
							'£',                                            // Pound sign
							'EUR',                                          // Euro sign. € ?
							'$',                                            // Dollar sign
							'',                                             // Unknown/unhandled entities
							' '                                             // Runs of spaces, post-handling
				);		

	$newstring = preg_replace( $plain_search_array, $get_plain_replace_array, strip_tags( $string ) );

	return $newstring;
}
//                                                                              </editor-fold>


//                                                                              <editor-fold   defaultstate="collapsed"   desc=" S u p p o r t " >    
////////////////////////////////////////////////////////////////////////////////
//  S u p p o r t    Functions
////////////////////////////////////////////////////////////////////////////////

/** Replace shortcodes in string
 * 
 * @param string $subject - string to  manipulate
 * @param array $replace_array - array with  values to  replace                 // array( [oper_id] => 9, [id] => 9, [dates] => July 3, 2016 14:00 - July 4, 2016 16:00, .... )
 * @param mixed $replace_unknown_shortcodes - replace unknown params, if false, then  no replace unknown params
 * @return string
 */
function oper_replace_shortcodes( $subject, $replace_array , $replace_unknown_shortcodes = ' ' ) {

    $defaults = array(
        'ip'                => apply_oper_filter( 'oper_get_user_ip' )
        , 'blogname'        => wp_specialchars_decode( get_option( 'blogname' ), ENT_QUOTES )
        , 'siteurl'         => get_site_url()
    );

    $replace = wp_parse_args( $replace_array, $defaults );

    foreach ( $replace as $replace_shortcode => $replace_value ) {

        $subject = str_replace( array(   '[' . $replace_shortcode . ']'
                                       , '{' . $replace_shortcode . '}' )
                                , $replace_value
                                , $subject );
    }

    // Remove all shortcodes, which is not replaced early.
    if ( $replace_unknown_shortcodes !== false )    
        $subject = preg_replace( '/[\s]{0,}[\[\{]{1}[a-zA-Z][0-9a-zA-Z:._-]{0,}[\]\}]{1}[\s]{0,}/', $replace_unknown_shortcodes, $subject );  

    
    return $subject;        
}

/** Simple hack  to  make array strings lowercase
 * 
 * @param type $array
 * @return type
 */
function oper_arraytolower( $array ){
	return unserialize( strtolower( serialize( $array ) ) );
}

/** Support 'hash_equals' this function at older servers than PHP 5.6.0 */
if ( !function_exists( 'hash_equals' ) ) {
	function hash_equals( $known_string, $user_string ) {
		$ret = 0;

		if ( strlen( $known_string ) !== strlen( $user_string ) ) {
			$user_string = $known_string;
			$ret = 1;
		}

		$res = $known_string ^ $user_string;

		for ( $i = strlen( $res ) - 1; $i >= 0; --$i ) {
			$ret |= ord( $res[$i] );
		}

		return !$ret;
	}
}

/** Check if this valid timestamp
 * 
 * @param string|int $timestamp
 * @return bool
 */
function oper_is_valid_timestamp( $timestamp ) {
	return (   ( (string) (int) $timestamp === $timestamp) 
			&& ($timestamp <= PHP_INT_MAX)
			&& ($timestamp >= ~PHP_INT_MAX) 
		   );
}
//                                                                              </editor-fold>

	
//                                                                              <editor-fold   defaultstate="collapsed"   desc=" F i l e s    &&    U R L s " >    
////////////////////////////////////////////////////////////////////////////////
//  F i l e s    &&    U R L s
////////////////////////////////////////////////////////////////////////////////

/** Get absolute URL to  relative plugin path.
 *  Depend from the OPER_MIN contant can  be load minified version of file,  if its exist
 * @param string $path    - path
 * @return string
 */
function oper_plugin_url( $path ) {

	if ( ( defined( 'OPER_MIN' ) ) && ( OPER_MIN ) ){
		$path_min = $path;
		if ( substr( $path_min , -3 ) === '.js' ) {
			$path_min = substr( $path_min , 0, -3 ) . '.min.js';
		}
		if ( substr( $path_min , -4 ) === '.css' ) {
			$path_min = substr( $path_min , 0, -4 ) . '.min.css';
		}
		if (  file_exists( trailingslashit( OPER_PLUGIN_DIR ) . ltrim( $path_min, '/\\' ) )  )  // check if this file exist
			return trailingslashit( OPER_PLUGIN_URL ) . ltrim( $path_min, '/\\' );
	}
	return trailingslashit( OPER_PLUGIN_URL ) . ltrim( $path, '/\\' );
}

/** Check  if such file exist or not.
 * 
 * @param string $path - relative path to  file (relative to plugin folder).
 * @return boolean true | false
 */
function oper_is_file_exist( $path ) {

	if (  file_exists( trailingslashit( OPER_PLUGIN_DIR ) . ltrim( $path, '/\\' ) )  )  // check if this file exist
		return true;
	else 
		return false;
}
 
/** Set URL from absolute to relative (starting from /)
 * 
 * @param type $url
 * @return type
 */
function oper_set_relative_url( $url ){

	$url = esc_url_raw($url);

	$url_path = parse_url($url,  PHP_URL_PATH);
	$url_path =  ( empty($url_path) ? $url : $url_path );

	$url =  trim($url_path, '/');
	return  '/' . $url;
}

/** Get Correct Relative URL 
 * 
 * @param type $link
 * @return string
 */
function oper_make_link_relative( $link ){

	if ( $link  == get_option('siteurl') ) 
		$link = '/';
	$link = '/' . trim( wp_make_link_relative( $link ), '/' ); 

	return $link;        
}

/** Get Correct Absolute URL 
 * 
 * @param string $link
 * @return type
 */
function oper_make_link_absolute( $link ){

	if ( ( $link  != get_option('siteurl') ) && ( strpos($link, 'http') !== 0 ) )
		$link  = get_option('siteurl') . '/' . trim( wp_make_link_relative( $link ), '/' ); 
	return esc_js( $link ) ;
}


if (!function_exists ('get_file_data_wpdev')) {
    
	/** Get header info from this file, just for compatibility with WordPress 2.8 and older versions
	 * 
	 * @param type $file
	 * @param type $default_headers
	 * @param type $context
	 * @return type
	 */
	function get_file_data_wpdev( $file, $default_headers, $context = '' ) {
        // We don't need to write to the file, so just open for reading.
        $fp = fopen( $file, 'r' );

        // Pull only the first 8kiB of the file in.
        $file_data = fread( $fp, 8192 );

        // PHP will close file handle, but we are good citizens.
        fclose( $fp );

        if( $context != '' ) {
            $extra_headers = array();								//apply_filters( "extra_$context".'_headers', array() );

            $extra_headers = array_flip( $extra_headers );
            foreach( $extra_headers as $key=>$value ) {
                $extra_headers[$key] = $key;
            }
            $all_headers = array_merge($extra_headers, $default_headers);
        } else {
            $all_headers = $default_headers;
        }

        foreach ( $all_headers as $field => $regex ) {
            preg_match( '/' . preg_quote( $regex, '/' ) . ':(.*)$/mi', $file_data, ${$field});
            if ( !empty( ${$field} ) )
                ${$field} =  trim(preg_replace("/\s*(?:\*\/|\?>).*/", '',  ${$field}[1] ));
            else
                ${$field} = '';
        }

        $file_data = compact( array_keys( $all_headers ) );

        return $file_data;
    }
}


/** Get content from  specific URL
 * 
 * @param string $url
 * @return string|boolean (false on error)
 */
function oper_get_ssl_page_content( $url ) {

	$request = new WP_Http();

	$result = $request->request( $url
								 , array(							// Default Parameters
			'user-agent' => 'Mozilla/5.0 (iPad; U; CPU OS 3_2_1 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Mobile/7B405'
										//	'method' => 'GET',
										//	'timeout' => 5,																// timeout value for an HTTP request.
										//	'redirection' => 5,															// number of redirects allowed during an HTTP request.												
										//	'httpversion' => '1.0',												
										//	'user-agent' => 'WordPress/' . get_bloginfo( 'version' ) . '; ' . get_bloginfo( 'url' ),												
										//	'reject_unsafe_urls' => false,
										//	'blocking' => true,
										//	'headers' => array(),
										//	'cookies' => array(),
										//	'body' => null,
										//	'compress' => false,
										//	'decompress' => true,
										//	'sslverify' => true,
										//	'sslcertificates' => ABSPATH . WPINC . '/certificates/ca-bundle.crt',
										//	'stream' => false,
										//	'filename' => null,
										//	'limit_response_size' => null
									) 
						);

	if ( 
		   ( ! is_wp_error( $result ) ) 
		&& ( $result[ 'response' ][ 'code' ] == '200' ) 
	) {

		return $result[ 'body' ];

	} else {

						if ( is_wp_error( $result ) ) {
							$error_message = $result->get_error_message();
						} else {
							$error_message = __( 'Unknown error during downloading feed', 'email-reminders' );

							// Show more detail info of not ability to  download .ics feeds
							// $error_message .= $result[ 'body' ];
						}
						// do_action( 'oper_admin_show_top_notice', $error_message, 'error', 5000 );										// N_O_T_I_C_E  in  H_E_A_D_E_R
						?>
						<script type="text/javascript">
							oper_admin_show_message( '<strong>' + 'Error!' + '</strong> ' + '<?php
									echo esc_js( $error_message );
								?>', 'error', 3000 );
						</script>
						<?php

		return false;
	}
}

//                                                                              </editor-fold>


//                                                                              <editor-fold   defaultstate="collapsed"   desc=" A d m i n    M e n u    L i n k s " >    	
////////////////////////////////////////////////////////////////////////////
// A d m i n    M e n u    L i n k s
////////////////////////////////////////////////////////////////////////////

/** Get URL to specific Admin Menu page
 * 
 * @param string $menu_type         -   { item | add | resources | settings }
 * @param boolean $is_absolute_url  - Absolute or relative url { default: true }
 * @return string                   - URL  to  menu
 */
function oper_get_menu_url( $menu_type, $is_absolute_url = true ) {

	switch ( $menu_type) {

		case 'reminders':
		case 'master':														// Master
						$link = 'oper-reminders';
						break;
		case 'contacts':
						$link = 'oper-contacts';
						break;
		case 'rules':
						$link = 'oper-rules';
						break;
		case 'settings':                                                    // Settings
						$link = 'oper-settings';
						break;
		default:                                                            // Master
						$link = 'oper-reminders';
						break;
	}

	if ( $is_absolute_url ) {
		$link = admin_url( 'admin.php' ) . '?page=' . $link ;
	} 

	return $link;        
}

// // // // // // // // // // // // // // // // // // // // // // // // // /

/**
 * Get URL Reminders page
 *
 * @param boolean $is_absolute_url  - Absolute or relative url { default: true }
 * @param boolean $is_old           - { default: true } 
 *
 * @return string                   - URL  to  menu
 */
function oper_get_reminders_url( $is_absolute_url = true ) {
	return oper_get_menu_url( 'reminders', $is_absolute_url );
}

/**
 * Get URL Rules page
 *
 * @param boolean $is_absolute_url  - Absolute or relative url { default: true }
 * @param boolean $is_old           - { default: true }
 *
 * @return string                   - URL  to  menu
 */
function oper_get_rules_url( $is_absolute_url = true ) {
	return oper_get_menu_url( 'rules', $is_absolute_url );
}

/**
 * Get URL Contacts page
 *
 * @param boolean $is_absolute_url  - Absolute or relative url { default: true }
 * @param boolean $is_old           - { default: true }
 *
 * @return string                   - URL  to  menu
 */
function oper_get_contacts_url( $is_absolute_url = true ) {
	return oper_get_menu_url( 'contacts', $is_absolute_url );
}

/**
 * Get URL of Settings page
 *
 * @param boolean $is_absolute_url  - Absolute or relative url { default: true }
 * @param boolean $is_old           - { default: true } 
 *
 * @return string                   - URL  to  menu
 */
function oper_get_settings_url( $is_absolute_url = true ) {
	return oper_get_menu_url( 'settings', $is_absolute_url );
}
    
// // // // // // // // // // // // // // // // // // // // // // // // // /

/** Check if this item Listing or Calendar Overview page
 * @param string $server_param -  'REQUEST_URI' | 'HTTP_REFERER'  Default: 'REQUEST_URI'
 * @return boolean true | false
 */
function oper_is_master_page( $server_param = 'REQUEST_URI' ) {

	if (  ( is_admin() ) &&
		  ( strpos($_SERVER[ $server_param ],'page=oper') !== false ) &&
		  ( strpos($_SERVER[ $server_param ],'page=oper-') === false )
		) {
		return true;
	} 
	return false;
}

/** Check if this item > Add item page 
 * @param string $server_param -  'REQUEST_URI' | 'HTTP_REFERER'  Default: 'REQUEST_URI'
 * @return boolean true | false
 */
function oper_is_new_oper_page( $server_param = 'REQUEST_URI' ) {

	if (  ( is_admin() ) &&
		  ( strpos($_SERVER[ $server_param ],'page=oper-new') !== false )
		) {
		return true;
	} 
	return false;
}


/** Check if this item > Settings page 
 * @param string $server_param -  'REQUEST_URI' | 'HTTP_REFERER'  Default: 'REQUEST_URI'
 * @return boolean true | false
 */    
function oper_is_settings_page( $server_param = 'REQUEST_URI' ) {

	if (  ( is_admin() ) &&
		  ( strpos($_SERVER[ $server_param ],'page=oper-settings') !== false )
		) {
		return true;
	} 
	return false;
}

//                                                                              </editor-fold>
    

//                                                                              <editor-fold   defaultstate="collapsed"   desc=" A d m i n    U I    E l e m e n t s " >        
////////////////////////////////////////////////////////////////////////////
// A d m i n    U I    E l e m e n t s
////////////////////////////////////////////////////////////////////////////

/** Get Number of new items
 * 
 * @return int
 */
function oper_get_number_new_items(){
	return 0;
}


/** Show Admin    B A R    .
 * 
 * @global type $wp_admin_bar
 * @return type
 */
function oper_admin_bar_items_menu(){

	global $wp_admin_bar;

	$current_user = wp_get_current_user();

	$curr_user_role = get_oper_option( 'oper_user_role_master' );
	$level = 10;
	if ($curr_user_role == 'administrator')       $level = 10;
	else if ($curr_user_role == 'editor')         $level = 7;
	else if ($curr_user_role == 'author')         $level = 2;
	else if ($curr_user_role == 'contributor')    $level = 1;
	else if ($curr_user_role == 'subscriber')     $level = 0;

	if ( ( $current_user->user_level < $level ) || ! is_admin_bar_showing() )
		return;


	$update_count = oper_get_number_new_items();	// 0

	$title = 'Email Reminders';
	$update_title =  $title;


	if ( $update_count > 0 ) {
		$update_count_title = "&nbsp;<span style='background: #f0f0f1;color: #2c3338;display: inline;padding: 2px 5px;font-weight: 600;border-radius: 10px;' class='oper-count bk-update-count' >" . number_format_i18n($update_count) . "</span>" ; //id='oper-count'
		$update_title .= $update_count_title;
	}

	$wp_admin_bar->add_menu(
			array(
				'id' => 'bar_oper',
				'title' => $update_title ,
				'href' => oper_get_reminders_url()
				)
			);


	 $curr_user_role_settings = get_oper_option( 'oper_user_role_settings' );
	 $level = 10;
	 if ($curr_user_role_settings == 'administrator')       $level = 10;
	 else if ($curr_user_role_settings == 'editor')         $level = 7;
	 else if ($curr_user_role_settings == 'author')         $level = 2;
	 else if ($curr_user_role_settings == 'contributor')    $level = 1;
	 else if ($curr_user_role_settings == 'subscriber')     $level = 0;
	if ( ( ( $current_user->user_level < $level ) ) || ! is_admin_bar_showing() ) {
		return;
	}

	$wp_admin_bar->add_menu(
			array(
				'id' => 'bar_oper_contacts',
				'title' => __( 'Contacts', 'email-reminders'),
				'href' => oper_get_menu_url( 'contacts' ),
				'parent' => 'bar_oper',
			)
	);
	$wp_admin_bar->add_menu(
			array(
				'id' => 'bar_oper_rules',
				'title' => __( 'Rules', 'email-reminders'),
				'href' => oper_get_menu_url( 'rules' ),
				'parent' => 'bar_oper',
			)
	);
	$wp_admin_bar->add_menu(
			array(
				'id' => 'bar_oper_settings',
				'title' => __( 'Settings', 'email-reminders'),
				'href' => oper_get_menu_url( 'settings' ),
				'parent' => 'bar_oper',
			)
	);
	$wp_admin_bar->add_menu(
			array(
				'id' => 'bar_oper_settings_emails',
				'title' => __( 'Emails', 'email-reminders'),
				'href' => oper_get_menu_url( 'settings' ) . '&tab=email',
				'parent' => 'bar_oper_settings',
			)
	);
	$wp_admin_bar->add_menu(
			array(
				'id' => 'bar_oper_settings_contact_form',
				'title' => __( 'Contact Form', 'email-reminders'),
				'href' => oper_get_menu_url( 'settings' ) . '&tab=contact-form',
				'parent' => 'bar_oper_settings',
			)
	);

}
add_action( 'admin_bar_menu', 'oper_admin_bar_items_menu', 70 );		// Add Admin Bar


/** Show Rating link at footer */
function oper_show_oper_footer(){

	if ( ! oper_is_this_demo() ) {

		$message = sprintf( __( 'If you like %s please leave us a %s rating. A huge thank you in advance!', 'email-reminders')
							, '<strong>Email Reminders</strong>' . ' ' . OPER_VERSION_NUM
							, '<a href="https://wordpress.org/support/plugin/email-reminders/reviews/#new-post" target="_blank" title="' . esc_attr__( 'Thanks :)', 'email-reminders') . '">'
								. '&#9733;&#9733;&#9733;&#9733;&#9733;' 
								. '</a>' 
						);            

		echo '<div id="oper-footer" style="position:absolute;bottom:40px;text-align:left;width:95%;font-size:0.9em;text-shadow:0 1px 0 #fff;margin:0;color:#888;">' . $message . '</div>';
		?>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery('#wpfooter').append( jQuery('#oper-footer') );
			});
		</script>
		<?php
	}
}
//                                                                              </editor-fold>    
    
    
//                                                                              <editor-fold   defaultstate="collapsed"   desc=" DB - cheking if table, field or index exists " >        
////////////////////////////////////////////////////////////////////////////
// DB - cheking if table, field or index exists
////////////////////////////////////////////////////////////////////////////

/**
 * Check if table exist
 * 
 * @global type $wpdb
 * @param string $tablename
 * @return 0|1
 */
function oper_is_table_exists( $tablename ) {

	global $wpdb;

	if ( (! empty($wpdb->prefix) ) && ( strpos($tablename, $wpdb->prefix) === false ) ) 
		$tablename = $wpdb->prefix . $tablename ;

	$sql_check_table = $wpdb->prepare("SHOW TABLES LIKE %s" , $tablename ); //FixIn 5.4.3

	$res = $wpdb->get_results( $sql_check_table );

	return count($res);                                                     //FixIn 5.4.3
	/*
	$sql_check_table = $wpdb->prepare("
		SELECT COUNT(*) AS count
		FROM information_schema.tables
		WHERE table_schema = '". DB_NAME ."'
		AND table_name = %s " , $tablename );

	$res = $wpdb->get_results( $sql_check_table );
	return $res[0]->count;*/
}


/**
 * Check if table exist
 * 
 * @global type $wpdb
 * @param string $tablename
 * @param type $fieldname
 * @return 0|1
 */
function oper_is_field_in_table_exists( $tablename , $fieldname) {
	global $wpdb;
	if ( (! empty($wpdb->prefix) ) && ( strpos($tablename, $wpdb->prefix) === false ) ) $tablename = $wpdb->prefix . $tablename ;
	$sql_check_table = "SHOW COLUMNS FROM {$tablename}" ;

	$res = $wpdb->get_results( $sql_check_table );

	foreach ($res as $fld) {
		if ($fld->Field == $fieldname) return 1;
	}

	return 0;
}


/**
 * Check if index exist
 * 
 * @global type $wpdb
 * @param string $tablename
 * @param type $fieldindex
 * @return 0|1
 */
function oper_is_index_in_table_exists( $tablename , $fieldindex) {
	global $wpdb;
	if ( (! empty($wpdb->prefix) ) && ( strpos($tablename, $wpdb->prefix) === false ) ) $tablename = $wpdb->prefix . $tablename ;
	$sql_check_table = $wpdb->prepare("SHOW INDEX FROM {$tablename} WHERE Key_name = %s", $fieldindex );       
	$res = $wpdb->get_results( $sql_check_table );
	if (count($res)>0) return 1;
	else               return 0;
}

//                                                                              </editor-fold>
		
 
//                                                                              <editor-fold   defaultstate="collapsed"   desc=" E s c a p i n g " >    	
////////////////////////////////////////////////////////////////////////////
// E s c a p i n g
////////////////////////////////////////////////////////////////////////////




/**
 * Check specific parameters in ARRAY and return cleaned params or default values
 *
 * @param array $request_params_values_arr = / think like in $_REQUEST parameter /
 *                                      array(
												'page_num'         => 1,
												'page_items_count' => 10,
												'sort'             => 'rule_id',
												'sort_type'        => 'DESC',
												'status'           => '',
												'keyword'          => '',
												'create_date'	   => ''
										)
 * @param array $request_params_rules = array(
											  'page_num'          => array( 'validate' => 'd', 					'default' => 1 )
											, 'page_items_count'  => array( 'validate' => 'd', 					'default' => 10 )
											, 'sort'              => array( 'validate' => array( 'rule_id' ),	'default' => 'rule_id' )
											, 'sort_type'         => array( 'validate' => array( 'ASC', 'DESC'),'default' => 'DESC' )
											, 'status'            => array( 'validate' => 's', 					'default' => '' )
											, 'keyword'           => array( 'validate' => 's', 					'default' => '' )
											, 'create_date'       => array( 'validate' => 'date', 				'default' => '' )
										)
 *
 *
 * 'd';                             // '1' | ''
 * 's';                             // string   !!! Clean 'LIKE' string for DB !!!
 * 'digit_or_csd';                  // '0' | '1,2,3' | ''
 * 'digit_or_date';                 // number | date 2016-07-20
 *
 * 'checked_skip_it'                // Skip  checking
 *  array( '0', 'trash', 'any');    // Elements only listed in array
 *
 *@return array $clean_params = Array	(
											* [page_num] => 3
											* [page_items_count] => 20
											* [sort] => contact_id
											* [sort_type] => DESC
											* [keyword] =>
											* [source] =>
											* [create_date] =>
										* )
 */
function oper_get_clean_params_in_arr( $request_params_values_arr, $request_params_rules ){

	$clean_params = array();

	foreach ( $request_params_rules as $request_key => $clean_type ) {

		if ( isset( $request_params_values_arr[ $request_key ] ) ) {
			$request_value_check = $request_params_values_arr[ $request_key ];
		} else {
			$request_value_check = false;
		}

		// If not defined in VALUES (think like in $_REQUEST parameter),  then  get  default value
		if ( false === $request_value_check ) {

			// D E F A U L T
			$clean_params[ $request_key ] = $request_params_rules[ $request_key ]['default'];

		} else {

			// C L E A N I N G
			$clean_type = $request_params_rules[ $request_key ]['validate'];

			// Check only values from this Array
			if ( is_array( $clean_type ) ) {

				$clean_type = array_map( 'strtolower', $clean_type );

				if ( ( isset( $request_value_check ) ) && ( ! in_array( strtolower( $request_value_check ), $clean_type ) ) ) {
					$clean_type          = 'checked_skip_it';
					$request_value_check = $request_params_rules[ $request_key ]['default'];							//  Reset it, if value not in array And get default value
				} else {
					$clean_type = 'checked_skip_it';
				}
			}

			switch ( $clean_type ) {

				case 'checked_skip_it':
					$clean_params[ $request_key ] = $request_value_check;
					break;

				case 'date':													// Date
					$clean_params[ $request_key ] = oper_clean_date( $request_value_check );
					break;

				case 'digit_or_date':                                            // digit or Date
					$clean_params[ $request_key ] = oper_clean_digit_or_date( $request_value_check );
					break;

				case 'digit_or_csd':                                            // digit or comma separated digit
					$clean_params[ $request_key ] = oper_clean_digit_or_csd( $request_value_check );
					break;

				case 's':                                                       // string
					$clean_params[ $request_key ] = oper_clean_string_for_form( $request_value_check );
					break;

				case 'd':                                                       // digit
					$clean_params[ $request_key ] = intval( $request_value_check );
					break;

				default:
					$clean_params[ $request_key ] = intval( $request_value_check );
					break;
			}
		}
	}
	return $clean_params;
}

/**
 * Get indexed or direct  request  from  REQUEST
 *
 * @param       $request_key
 * @param false $request_key_prefix
 *
 * @return false|mixed
 */
function oper_get_index_or_direct_request_param( $request_key, $request_key_prefix = false ) {

	// Get request value from 'direct request' -  "$_REQUEST['page_num'] => 3"  or  from  'prefix request' - "$_REQUEST['request_params']['page_num'] => 3"
	if ( ! empty( $request_key_prefix ) ) {

		if ( ( isset( $_REQUEST[ $request_key_prefix ] ) )
		     && ( isset( $_REQUEST[ $request_key_prefix ][ $request_key ] ) )
		) {
			return $_REQUEST[ $request_key_prefix ][ $request_key ];
		}
	} else {
		if ( isset( $_REQUEST[ $request_key ] ) ) {
			return $_REQUEST[ $request_key ];
		}
	}

	return  false;
}

/**
 * Check specific parameters in $_REQUEST and return cleaned params or default values
 *
 * @param array $request_params_to_check = array(
											    *   'page_num'          => array( 'validate' => 'd', 					'default' => 1 )
												* , 'page_items_count'  => array( 'validate' => 'd', 					'default' => 100 )
												* , 'sort'              => array( 'validate' => 's', 					'default' => 'contact_id' )
												* , 'sort_type'         => array( 'validate' => array('ASC', 'DESC'), 'default' => 'DESC' )
												* , 'keyword'           => array( 'validate' => 's', 					'default' => '' )
												* , 'source'            => array( 'validate' => 's', 					'default' => '' )
												* , 'create_date'       => array( 'validate' => 'date', 				'default' => '' )
											* )
 *
 * @param string $request_key_prefix  			default FALSE
												parameter  is useful,  if request  like this:
					                                            $_REQUEST (
																	['request_params'][page_num] => 3
																	['request_params'][page_items_count] => 20
																	['request_params'][sort] => contact_id
																	['request_params'][sort_type] => DESC
																	['request_params'][keyword] =>
																	['request_params'][source] =>
																)
 *
 *
 *
 * 'd';                             // '1' | ''
 * 's';                             // string   !!! Clean 'LIKE' string for DB !!!
 * 'digit_or_csd';                  // '0' | '1,2,3' | ''
 * 'digit_or_date';                 // number | date 2016-07-20
 *
 * 'checked_skip_it'                // Skip  checking
 *  array( '0', 'trash', 'any');    // Elements only listed in array
 *

 *@return array $clean_params = Array	(
											* [page_num] => 3
											* [page_items_count] => 20
											* [sort] => contact_id
											* [sort_type] => DESC
											* [keyword] =>
											* [source] =>
											* [create_date] =>
										* )
 */
function oper_get_clean_or_default_request_params( $request_params_to_check, $request_key_prefix = false ){

	$request_params_values_arr = array();

	foreach ( $request_params_to_check as $request_key => $clean_type ) {

		// Get request value from 'direct request' -  "$_REQUEST['page_num'] => 3"  or  from  'prefix request' - "$_REQUEST['request_params']['page_num'] => 3"
		if ( false !== oper_get_index_or_direct_request_param( $request_key, $request_key_prefix) ) {
			$request_params_values_arr[ $request_key ] = oper_get_index_or_direct_request_param( $request_key, $request_key_prefix);
		}
	}
	return oper_get_clean_params_in_arr( $request_params_values_arr, $request_params_to_check );
}


/**
 * Clean and Update $_REQUEST specific parameters,  if such  parameters isset in $_REQUEST
 *
 * @param array $clean_params	= array(
										  'page_num'          => 'd'                // ( isset( $_REQUEST['page_num'] ) ) ? intval( $_REQUEST['page_num'] ) : '1'
										, 'page_items_count'  => 'd'
										, 'sort'              => 's'                // 'contact_id'										        // STRING
										...
									)
 *
 * 'd';                             // '1' | ''
 * 's';                             // string   !!! Clean 'LIKE' string for DB !!!
 * 'digit_or_csd';                  // '0' | '1,2,3' | ''
 * 'digit_or_date';                 // number | date 2016-07-20
 *
 * 'checked_skip_it'                // Skip  checking
 *  array( '0', 'trash', 'any');    // Elements only listed in array
 *
 */
function oper_check_request_paramters( $clean_params = array() ) {

	/**
	 * 'd';                             // '1' | ''
	 * 's';                             // string   !!! Clean 'LIKE' string for DB !!!
	 * 'digit_or_csd';                  // '0' | '1,2,3' | ''
	 * 'digit_or_date';                 // number | date 2016-07-20
	 *
	 * 'checked_skip_it'                // Skip  checking
	 *  array( '0', 'trash', 'any');    // Elements only listed in array
	 */

	$defaults = array(
					//'wh_oper_id' 				=> 'digit_or_csd',		// '0' | '1' | ''
					//'wh_oper_date' 			=> 'digit_or_date',		// number | date 2016-07-20
					//'wh_oper_datenext' 		=> 'd',					// '1' | '2' ....
					//'wh_pay_statuscustom' 	=> 's',					//string   !!! LIKE  !!!
					//'wh_pay_status' 			=> array( 'all', 'group_ok', 'group_unknown', 'group_pending', 'group_failed' ),

					  'page_num'          => 'd'                // ( isset( $_REQUEST['page_num'] ) ) ? intval( $_REQUEST['page_num'] ) : '1'
					, 'page_items_count'  => 'd'
					, 'sort'              => 's'                // 'contact_id'										        // STRING
					, 'sort_type'         => 's'        	    // => 'DESC'											    // 'ASC' | 'DESC'
					, 'keyword'           => 's' 			    // => '^OPL'											    // STRING
				);
	$clean_params   = wp_parse_args( $clean_params, $defaults );


	foreach ( $clean_params as $request_key => $clean_type ) {

		// elements only listed in array::
		if (  is_array( $clean_type ) ) {                                       // check  only values from  the list  in this array

			$clean_type = array_map( 'strtolower', $clean_type );
			if ( ( isset( $_REQUEST[ $request_key ] ) ) && ( ! in_array( strtolower( $_REQUEST[ $request_key ] ), $clean_type ) ) ) {
				$clean_type = 's';
				$_REQUEST[ $request_key ] = '';	//Reset  it,  if value not in array
			} else
				$clean_type = 'checked_skip_it';
		} 

		switch ( $clean_type ) {

			case 'checked_skip_it':

				break;

			case 'date':                                            // date
				if ( isset( $_REQUEST[ $request_key ] ) ) 
					$_REQUEST[ $request_key ] = oper_clean_date( $_REQUEST[ $request_key ] );

				break;

			case 'digit_or_date':                                            // digit or comma separated digit
				if ( isset( $_REQUEST[ $request_key ] ) )
					$_REQUEST[ $request_key ] = oper_clean_digit_or_date( $_REQUEST[ $request_key ] );        // nums

				break;

			case 'digit_or_csd':                                            // digit or comma separated digit
				if ( isset( $_REQUEST[ $request_key ] ) ) 
					$_REQUEST[ $request_key ] = oper_clean_digit_or_csd( $_REQUEST[ $request_key ] );        // nums

				break;

			case 's':                                                       // string
				if ( isset( $_REQUEST[ $request_key ] ) ) 
					$_REQUEST[ $request_key ] = oper_clean_like_string_for_db( $_REQUEST[ $request_key ] );

				break;

			case 'd':                                                       // digit
				if ( isset( $_REQUEST[ $request_key ] ) ) 
					if ( $_REQUEST[ $request_key ] !== '' )
						$_REQUEST[ $request_key ] = intval( $_REQUEST[ $request_key ] );

				break;

			default:
				if ( isset( $_REQUEST[ $request_key ] ) ) {
					$_REQUEST[ $request_key ] = intval( $_REQUEST[ $request_key ] );                    
				}
				break;
		}


	}

}

    
/** Check  paramter  if it number or comma separated list  of numbers
 * 
 * @global type $wpdb
 * @param string $value
 * @return string
 * 
 * Exmaple:
					oper_clean_digit_or_csd( '12,a,45,9' )                  => '12,0,45,9'
 * or
					oper_clean_digit_or_csd( '10a' )                        => '10
 * or
					oper_clean_digit_or_csd( array( '12,a,45,9', '10a' ) )  => array ( '12,0,45,9',  '10' )
 */
function oper_clean_digit_or_csd( $value ) {                                //FixIn:6.2.1.4

	if ( $value === '' ) return $value;


	if ( is_array( $value ) ) {
		foreach ( $value as $key => $check_value ) {
			$value[ $key ] = oper_clean_digit_or_csd( $check_value );
		}
		return $value;
	}


	global $wpdb;

	$value = str_replace( ';', ',', $value );

	$array_of_nums = explode(',', $value);

	$result = array();
	foreach ($array_of_nums as $check_element) {
		$result[] = $wpdb->prepare( "%d", $check_element );
	}
	$result = implode(',', $result );
	return $result;
}
    
    
/** Cehck  about Valid date,  like 2016-07-20 or digit
 * 
 * @param string $value
 * @return string or int
 */
function oper_clean_digit_or_date( $value ) {                               //FixIn:6.2.1.4

	if ( $value === '' ) return $value;

	if ( preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $value ) ) {

		return $value;                                                      // Date is valid in format: 2016-07-20
	} else {
		return intval( $value );
	}

}
    

/** Cehck  about Valid date,  like 2016-07-20 or digit
 *
 * @param string $value
 * @return string or int
 */
function oper_clean_date( $value ) {                               //FixIn:6.2.1.4

	if ( $value === '' ) return $value;

	if ( preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $value ) ) {

		return $value;                                                      // Date is valid in format: 2016-07-20
	} else {
		return '';
	}

}


/** Check $value for injection here
 * 
 * @param type $value
 * @return type
 */
function oper_clean_parameter( $value ) {

	$value = preg_replace( '/<[^>]*>/', '', $value );                       // clean any tags
	$value = str_replace( '<', ' ', $value ); 
	$value = str_replace( '>', ' ', $value ); 
	$value = strip_tags( $value );

	// Clean SQL injection    
	$value = esc_sql( $value );

	return $value; 
}


function oper_esc_like( $value_trimmed ) {

	global $wpdb;
	if ( method_exists( $wpdb ,'esc_like' ) )
		return $wpdb->esc_like( $value_trimmed );                           // Its require minimum WP 4.0.0
	else
		return addcslashes( $value_trimmed, '_%\\' );                       // Direct implementation  from $wpdb->esc_like(
}


/** Clean user string for using in SQL LIKE statement - append to  LIKE sql
 * 
 * @param string $value - to clean
 * @return string       - escaped
 *                                  Exmaple:    
 *                                              $search_escaped_like_title = oper_clean_like_string_for_append_in_sql_for_db( $input_var );
 * 
 *                                              $where_sql = " WHERE title LIKE ". $search_escaped_like_title ." ";
 */
function oper_clean_like_string_for_append_in_sql_for_db( $value ) {
	global $wpdb;

	$value_trimmed = trim( stripslashes( $value ) );
$wild = '%';	
$like = $wild . oper_esc_like( $value_trimmed ) . $wild;
$sql  = $wpdb->prepare( "'%s'", $like );

	return $sql;    


/* Help:
	 * First half of escaping for LIKE special characters % and _ before preparing for MySQL.
 * Use this only before wpdb::prepare() or esc_sql().  Reversing the order is very bad for security.
 *
 * Example Prepared Statement:
 *
 *     $wild = '%';
 *     $find = 'only 43% of planets';
 *     $like = $wild . oper_esc_like( $find ) . $wild;
 *     $sql  = $wpdb->prepare( "SELECT * FROM $wpdb->posts WHERE post_content LIKE '%s'", $like );
 *
 * Example Escape Chain:
 *
 *     $sql  = esc_sql( oper_esc_like( $input ) );
 */        

}


/** Clean string for using in SQL LIKE requests inside single quotes:    WHERE title LIKE '%". $escaped_search_title ."%' 
 *  Replaced _ to \_     % to \%      \   to   \\
 * @param string $value - to clean
 * @return string       - escaped
 *                                  Exmaple:    
 *                                              $search_escaped_like_title = oper_clean_like_string_for_db( $input_var );
 * 
 *                                              $where_sql = " WHERE title LIKE '%". $search_escaped_like_title ."%' ";
 * 
 *                                  Important! Use SINGLE quotes after in SQL query:  LIKE '%".$data."%'
 */
function oper_clean_like_string_for_db( $value ){

	global $wpdb;

	$value_trimmed = trim( stripslashes( $value ) );

	$value_trimmed =  oper_esc_like( $value_trimmed );

	$value = trim( $wpdb->prepare( "'%s'",  $value_trimmed ) , "'" );

	return $value;

/* Help:
	 * First half of escaping for LIKE special characters % and _ before preparing for MySQL.
 * Use this only before wpdb::prepare() or esc_sql().  Reversing the order is very bad for security.
 *
 * Example Prepared Statement:
 *
 *     $wild = '%';
 *     $find = 'only 43% of planets';
 *     $like = $wild . oper_esc_like( $find ) . $wild;
 *     $sql  = $wpdb->prepare( "SELECT * FROM $wpdb->posts WHERE post_content LIKE '%s'", $like );
 *
 * Example Escape Chain:
 *
 *     $sql  = esc_sql( oper_esc_like( $input ) );
 */        
}


/** Escape string from SQL for the HTML form field
 * 
 * @param string $value
 * @return string
 * 
 * Used: esc_sql function.
 * 
 * https://codex.wordpress.org/Function_Reference/esc_sql 
 * Note: Be careful to use this function correctly. It will only escape values to be used in strings in the query. 
 * That is, it only provides escaping for values that will be within quotes in the SQL (as in field = '{$escaped_value}'). 
 * If your value is not going to be within quotes, your code will still be vulnerable to SQL injection. 
 * For example, this is vulnerable, because the escaped value is not surrounded by quotes in the SQL query: 
 * ORDER BY {$escaped_value}. As such, this function does not escape unquoted numeric values, field names, or SQL keywords. 
 *         
 */
function oper_clean_string_for_form( $value ){

	global $wpdb;

	$value_trimmed = trim( stripslashes( $value ) );

	$esc_sql_value =  esc_textarea(  $value_trimmed );

	//$value = trim( $wpdb->prepare( "'%s'",  $esc_sql_value ) , "'" );

	//$esc_sql_value = trim( stripslashes( $esc_sql_value ) );

	return $esc_sql_value;

}
//                                                                              </editor-fold>

    
//                                                                              <editor-fold   defaultstate="collapsed"   desc=" U s e r s " >    
////////////////////////////////////////////////////////////////////////////////
//  U s e r s
////////////////////////////////////////////////////////////////////////////////

/** Get ID of active user
 * 
 * @return type
 */
function get_oper_current_user_id() {
	$user = wp_get_current_user();
	return ( isset( $user->ID ) ? (int) $user->ID : 0 );
}


/** Check  if Current User have specific Role
 * 
 * @return bool Whether the current user has the given capability. 
 */
function oper_is_current_user_have_this_role( $user_role ) {

   if ( $user_role == 'administrator' )  $user_role = 'activate_plugins';
   if ( $user_role == 'editor' )         $user_role = 'publish_pages';
   if ( $user_role == 'author' )         $user_role = 'publish_posts';
   if ( $user_role == 'contributor' )    $user_role = 'edit_posts';
   if ( $user_role == 'subscriber')      $user_role = 'read';

   return current_user_can( $user_role );
}


function oper_get_user_ip() {
//return '84.243.195.114'  ;                    // Test     //90.36.89.174
	if (isset($_SERVER['HTTP_CLIENT_IP'])) {
			$userIP = $_SERVER['HTTP_CLIENT_IP'] ;
	} elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$userIP = $_SERVER['HTTP_X_FORWARDED_FOR'] ;
	} elseif (isset($_SERVER['HTTP_X_FORWARDED'])) {
			$userIP = $_SERVER['HTTP_X_FORWARDED'] ;
	} elseif (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
			$userIP = $_SERVER['HTTP_FORWARDED_FOR'] ; 
	} elseif (isset($_SERVER['HTTP_FORWARDED'])) {
			$userIP = $_SERVER['HTTP_FORWARDED'] ;
	} elseif (isset($_SERVER['REMOTE_ADDR'])) {
			$userIP = $_SERVER['REMOTE_ADDR'] ;
	} else {
			$userIP = "" ;
	}

	$userIP = explode( ',', $userIP );
	$userIP = array_map( 'trim', $userIP );

	return $userIP[0] ;
}
add_oper_filter( 'oper_get_user_ip', 'oper_get_user_ip' );
//                                                                              </editor-fold>


//                                                                              <editor-fold   defaultstate="collapsed"   desc=" Mesages for Admin panel  " >    
////////////////////////////////////////////////////////////////////////////////    
// Mesages for Admin panel 
////////////////////////////////////////////////////////////////////////////////    

function oper_show_fixed_message( $message, $time_to_show , $message_type = 'updated' , $notice_id = 0, $is_dismissible = false ) {

		// Generate unique HTML ID  for the message
		if ( $notice_id == 0 )
			$notice_id =  intval( time() * rand(10, 100) );

		$notice_id = 'oper_system_notice_' . $notice_id;

		$is_dismissible = false;

		if ( 
			   ( ( $is_dismissible ) && ( ! oper_section_is_dismissed( $notice_id ) ) )
			|| ( ! $is_dismissible )
			 // || true 
		){

			?><div  id="<?php echo $notice_id; ?>" 
					class="oper_system_notice oper_is_dismissible oper_is_hideable <?php echo $message_type; ?>"
					data-nonce="<?php echo wp_create_nonce( $nonce_name = $notice_id . '_opernonce' ); ?>"
					data-user-id="<?php echo get_current_user_id(); ?>"
				><?php 

			oper_x_dismiss_button();

			echo $message;

			?></div><?php

			// Get the time of message showing
			$time_to_show = intval( $time_to_show ) * 1000;

			 if ( $time_to_show > 0 ) { 
				?> <script type="text/javascript">                              				
						jQuery('#<?php echo $notice_id; ?>').animate({opacity: 1},<?php echo $time_to_show; ?>).fadeOut( 2000 );								
				</script> <?php
			 }			
		}       	
}


/** Show Ajax message at the top of page
 * 
 * @param type $message
 * @param type $time_to_show
 * @param type $is_error
 */
function oper_show_ajax_message( $message, $time_to_show = 3000, $is_error = false ) {

	// Recheck  for any "lang" shortcodes for replacing to correct language
	$message =  apply_oper_filter('oper_check_for_active_language', $message );

	// Escape any JavaScript from  message
	$notice =   html_entity_decode( esc_js( $message ) ,ENT_QUOTES) ;

	?><script type="text/javascript">
		var my_message = '<?php echo $notice; ?>';
		oper_admin_show_message( my_message, '<?php echo ( $is_error ? 'error' : 'success' ); ?>', <?php echo $time_to_show; ?> );
	</script><?php
}


/** Show "Saved Changes" message at  the top  of settings page.
 * 
 */    
function oper_show_changes_saved_message() {
	oper_show_message ( __('Changes saved.', 'email-reminders'), 5 );
}


/**
 * Show Message at  Top  of Admin Pages
 * 
 * @param string $message         - mesage to  show
 * @param int $time_to_show    - number of seconds to  show, if 0 or skiped,  then unlimited time.
 * @param string $message_type    - Default: updated   { updated | error | notice }
 */
function oper_show_message ( $message, $time_to_show , $message_type = 'updated') {

	// Generate unique HTML ID  for the message
	$inner_message_id =  intval( time() * rand(10, 100) );

	// Get formated HTML message
	$notice = oper_get_formated_message( $message, $message_type, $inner_message_id );

	// Get the time of message showing
	$time_to_show = intval( $time_to_show ) * 1000;

	// Show this Message
	?> <script type="text/javascript">                              
		if ( jQuery('.oper_admin_message').length ) {
				jQuery('.oper_admin_message').append( '<?php echo $notice; ?>' );
			<?php if ( $time_to_show > 0 ) { ?>
				jQuery('#oper_inner_message_<?php echo $inner_message_id; ?>').animate({opacity: 1},<?php echo $time_to_show; ?>).fadeOut( 2000 );
			<?php } ?>
		}
	</script> <?php
}


/** Escape and prepare message to  show it
 * 
 * @param type $message                 - message
 * @param type $message_type            - Default: updated   { updated | error | notice }
 * @param string $inner_message_id      - ID of message DIV,  can  be skipped
 * @return string
 */
function oper_get_formated_message ( $message, $message_type = 'updated', $inner_message_id = '') {


	// Recheck  for any "lang" shortcodes for replacing to correct language
	$message =  apply_oper_filter('oper_check_for_active_language', $message );

	// Escape any JavaScript from  message
	$notice =   html_entity_decode( esc_js( $message ) ,ENT_QUOTES) ;

	$notice .= '<a class="close tooltip_left" rel="tooltip" title="'. esc_js(__("Hide", 'email-reminders')). '" data-dismiss="alert" href="javascript:void(0)" onclick="javascript:jQuery(this).parent().hide();">&times;</a>';

	if (! empty( $inner_message_id ))
		$inner_message_id = 'id="oper_inner_message_'. $inner_message_id .'"';

	$notice = '<div '.$inner_message_id.' class="oper_inner_message '. $message_type . '">' . $notice . '</div>';

	return  $notice;
}


/** Show system info  in settings page
 * 
 * @param string $message                     ...  
 * @param string $message_type                'info' | 'warning' | 'error'
 * @param string $title                       __('Important!' , 'email-reminders')  |  __('Note' , 'email-reminders')
 * 
 * Exmaple:     oper_show_message_in_settings( __( 'Nothing Found', 'email-reminders'), 'warning', __('Important!' , 'email-reminders') );
 */
function oper_show_message_in_settings( $message, $message_type = 'info', $title = '' , $is_echo = true ) {

	$message_content = '';

	$message_content .= '<div class="clear"></div>';

	$message_content .= '<div class="oper-settings-notice notice-' . $message_type . '" style="text-align:left;">';

	if ( ! empty( $title ) )
		$message_content .=  '<strong>' . esc_js( $title ) . '</strong> ';

	$message_content .= html_entity_decode( esc_js( $message ) ,ENT_QUOTES) ;

	$message_content .= '</div>';

	$message_content .= '<div class="clear"></div>';

	if ( $is_echo )
		echo $message_content;
	else
		return $message_content;

}
//                                                                              </editor-fold>


//                                                                              <editor-fold   defaultstate="collapsed"   desc=" Settings Meta Boxes " >    
////////////////////////////////////////////////////////////////////////////////    
// Settings Meta Boxes
////////////////////////////////////////////////////////////////////////////////    
function oper_open_meta_box_section( $metabox_id, $title ) {

	$my_close_open_win_id = $metabox_id . '_metabox';
	?>
    <div class='meta-box'>
        <div
                id="<?php echo $my_close_open_win_id; ?>"
                class="postbox <?php if ( '1' == get_user_option( 'oper_win_' . $my_close_open_win_id ) ) echo 'closed'; ?>"
            ><div class="postbox-header" style="display: flex;flex-flow: row nowrap;border-bottom: 1px solid #ccd0d4;"><?php //FixIn: 8.7.8.1 ?>
				<h3 class='hndle' style="flex: 1 1 auto;border: none;">
                  <span><?php  echo wp_kses_post( $title ); ?></span>
			  	</h3>
				<div  title="<?php _e('Click to toggle','email-reminders'); ?>"
                    class="handlediv"
                    onclick="javascript:oper_verify_window_opening(<?php echo get_oper_current_user_id(); ?>, '<?php echo $my_close_open_win_id; ?>');"
                ><br/></div>
			</div>
            <div class="inside">
	<?php
}

function oper_close_meta_box_section() {
	?>
			  </div> 
		</div> 
	</div>                        
	<?php
}
//                                                                              </editor-fold>


												// from Toolbar
//                                                                              <editor-fold   defaultstate="collapsed"   desc=" M o d a l s " >    
////////////////////////////////////////////////////////////////////////////////    
//  M o d a l s
////////////////////////////////////////////////////////////////////////////////

/** Start Loyouts - Modal Window structure */    
function oper_write_content_for_modals_start_here() {
    
    ?><span id="oper_content_for_modals"></span><?php
}
add_oper_action( 'oper_write_content_for_modals', 'oper_write_content_for_modals_start_here');
//                                                                              </editor-fold>


//                                                                              <editor-fold   defaultstate="collapsed"   desc=" Inline     JavaScript " >    
////////////////////////////////////////////////////////////////////////////////
// Inline    J a v a S c r i p t    to Footer page
////////////////////////////////////////////////////////////////////////////////
/**
 * Queue  JavaScript for later output at  footer
 *
 * @param string $code
 */
function oper_enqueue_js( $code ) {
	global $oper_queued_js;

	if ( empty( $oper_queued_js ) ) {
		$oper_queued_js = '';
	}

	$oper_queued_js .= "\n" . $code . "\n";
}


/**
 * Output any queued javascript code in the footer.
 */
function oper_print_js() {

	global $oper_queued_js;

	if ( ! empty( $oper_queued_js ) ) {

		echo "<!-- OPER JavaScript -->\n<script type=\"text/javascript\">\njQuery(function($) {";

		$oper_queued_js = wp_check_invalid_utf8( $oper_queued_js );

		$oper_queued_js = wp_specialchars_decode( $oper_queued_js , ENT_COMPAT);            // Converts double quotes  '&quot;' => '"'

		$oper_queued_js = preg_replace( '/&#(x)?0*(?(1)27|39);?/i', "'", $oper_queued_js );
		$oper_queued_js = str_replace( "\r", '', $oper_queued_js );

		echo $oper_queued_js . "});\n</script>\n<!-- End OPER JavaScript -->\n";

		$oper_queued_js = '';
		unset( $oper_queued_js );
	}
}

//                                                                              </editor-fold>

												// from Toolbar
//                                                                              <editor-fold   defaultstate="collapsed"   desc=" JS & CSS - Tooltips & Popover" >    
////////////////////////////////////////////////////////////////////////////////
// JS & CSS
////////////////////////////////////////////////////////////////////////////////

/** Load suport JavaScript for "Items" page*/
function oper_js_for_items_page() {

	if ( function_exists( 'oper_bs_javascript_tooltips' ) ) {
		$is_use_hints = get_oper_option( 'oper_is_use_hints_at_admin_panel' );
		if ( $is_use_hints == 'On' ) {
			oper_bs_javascript_tooltips();
		}                                            // JS Tooltips
	}

	if ( function_exists( 'oper_bs_javascript_popover' ) ) {
		oper_bs_javascript_popover();												// JS Popover
	}
    
    //oper_datepicker_js();                                                       // JS  Datepicker
    oper_datepicker_css();                                                      // CSS DatePicker
}


/** Datepicker activation JavaScript */
function oper_datepicker_js() {
    
    ?><script type="text/javascript">
        jQuery(document).ready( function(){

            function applyCSStoDays( date ){
                return [true, 'date_available']; 
            }
            jQuery('input.oper-filters-section-calendar').datepick(
                {   beforeShowDay: applyCSStoDays,
                    showOn: 'focus',
                    multiSelect: 0,
                    numberOfMonths: 1,
                    stepMonths: 1,
                    prevText: '&laquo;',
                    nextText: '&raquo;',
                    dateFormat: 'yy-mm-dd',
                    changeMonth: false,
                    changeYear: false,
                    minDate: null, 
                    maxDate: null, //'1Y',
                    showStatus: false,
                    multiSeparator: ', ',
                    closeAtTop: false,
                    // firstDay:<?php //echo get_oper_option( 'oper_start_day_weeek' ); ?>,
                    gotoCurrent: false,
                    hideIfNoPrevNext:true,
                    useThemeRoller :false,
                    mandatory: true
                }
            );
        });
        </script><?php 
}


/** Support CSS - datepick,  etc... */
function oper_datepicker_css(){
    ?>
    <style type="text/css">
        #datepick-div .datepick-header {
               width: 172px !important;
        }
        #datepick-div {
            -border-radius: 3px;
            -box-shadow: 0 0 2px #888888;
            -webkit-border-radius: 3px;
            -webkit-box-shadow: 0 0 2px #888888;
            -moz-border-radius: 3px;
            -moz-box-shadow: 0 0 2px #888888;
            width: 172px !important;
        }
        #datepick-div .datepick .datepick-days-cell a{
            font-size: 12px;
        }
        #datepick-div table.datepick tr td {
            border-top: 0 none !important;
            line-height: 24px;
            padding: 0 !important;
            width: 24px;
        }
        #datepick-div .datepick-control {
            font-size: 10px;
            text-align: center;
        }
        #datepick-div .datepick-one-month {
            height: auto;
        }
    </style>
    <?php
}            


/** Sortable Table JavaScript */
function oper_sortable_js() {
    ?>
    <script type="text/javascript">        
        // Activate Sortable Functionality    
        jQuery( document ).ready(function(){

            jQuery('.oper_input_table tbody th').css('cursor','move');

            jQuery('.oper_input_table tbody td.sort').css('cursor','move');

            jQuery('.oper_input_table.sortable tbody').sortable({
                    items:'tr',
                    cursor:'move',
                    axis:'y',
                    scrollSensitivity:40,
                    forcePlaceholderSize: true,
                    helper: 'clone',
                    opacity: 0.65,
                    placeholder: '.oper_sortable_table .sort',
                    start:function(event,ui){
                            ui.item.css('background-color','#f6f6f6');
                    },
                    stop:function(event,ui){
                            ui.item.removeAttr('style');
                    }
            });
        });
    </script>
    <?php
    
}
//                                                                              </editor-fold>


//                                                                              <editor-fold   defaultstate="collapsed"   desc=" R e l o a d    p a g e " >    
////////////////////////////////////////////////////////////////////////////////
// R e l o a d    p a g e
////////////////////////////////////////////////////////////////////////////////
/**
 * Reload page by using JavaScript
 * 
 * @param string $url - URL of page to  load
 */
function oper_reload_page_by_js( $url ) {

	$redir = html_entity_decode( esc_url( $url ) );

	if ( ! empty( $redir ) ) {
		?>
		<script type="text/javascript">                
			window.location.href = '<?php echo $redir ?>';                
		</script>
		<?php
	}
}


/** Redirect browser to a specific page
 * 
 * @param string $url - URL of page to redirect
 */
function oper_redirect( $url ) {

	$url = oper_make_link_absolute( $url );

	$url = html_entity_decode( esc_url( $url ) );

	echo '<script type="text/javascript">';
	echo 'window.location.href="'.$url.'";';
	echo '</script>';
	echo '<noscript>';
	echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
	echo '</noscript>';
}
//                                                                              </editor-fold>




/**
 * Add Log message to  Database
 *
 * @param string $log		- log text
 * @param string $subject	- subject message
 * @param string $type		- type of log  default: 'log'
 * @param int    $reference				   default: 0
 *
 * @return bool|int
 */
function oper_add_log( $log, $subject, $type = 'log', $reference = 0 ) {

	/**
	 * DB Fields:
	 *
		log_id			bigint(20)
		type 			varchar(255)
		reference 		bigint(20)
		message 		text
		log 			text
		date 			timestamp
	*/

	global $wpdb;

	$sql_fields = 'log, message, type, reference';
	$sql_values = array();
	$sql_args   = array();

	for( $i = 0; $i < 1; $i++) {        // Template for adding several rows to  the Database

		$sql_values[] = '( %s, %s, %s, %d )';
		$sql_args[]   = $log;
		$sql_args[]   = $subject;
		$sql_args[]   = $type;
		$sql_args[]   = $reference;

		//$sql_args[]   = date_i18n( 'Y-m-d H:i:s' );
	}

	$sql_values     = implode( ', ', $sql_values );

	////////////////////////////////////////////////////////////////////////////
	// Add to DB
	////////////////////////////////////////////////////////////////////////////
	$sql = "INSERT INTO {$wpdb->prefix}o_er_log ( {$sql_fields} )VALUES {$sql_values} " ;

	$sql_prepared = $wpdb->prepare( $sql, $sql_args );

	if ( false === $wpdb->query( $sql_prepared ) ){
		return false;                                   // debuge_error( 'Error. DB inserting ' . $sql ,__FILE__,__LINE__);
	} else {

		do_action( 'oper_added_log' , (int) $wpdb->insert_id );

		return (int) $wpdb->insert_id;                  // Get ID of last insert
	}
}

