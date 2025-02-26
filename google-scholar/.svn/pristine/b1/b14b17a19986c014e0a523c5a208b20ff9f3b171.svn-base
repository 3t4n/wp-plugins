<?php
   /*
   Plugin Name: Wordpress Google Scholar
   Plugin URI: http://www.sociology.org/gs
   Description: A plugin to output Google Scholar Metadata
   Version: .01
   Author: Dr. Mike Sosteric / Athabasca University (http://www.athabascau.ca)
   Author URI: http://www.sociology.org/
   License: GPL2
   */
 
$debug=0;
define( 'GS_VERSION', '0.02' );

register_activation_hook( __FILE__, "gs_set_default_options");
if (is_admin()) require_once(ABSPATH . 'wp-includes/pluggable.php');
function gs_set_default_options() {
//    add default options
     $new_options = get_option('gs_settings');
     
    if (!$new_options['version']) {
         $new_options['version']        = GS_VERSION;
         $new_options['ISSN']           = "xxxx xxxx";
         $new_options['abstract_title'] =   'Abstract';
         //print_r($new_options);exit;
         add_option('gs_settings', $new_options);
    } elseif ($new_options['version']== "0.01") {
         $new_options['abstract_title']     =   'Abstract';
         $new_options['version']            =   GS_VERSION;
         update_option('gs_settings', $new_options);

    }
}
if($_REQUEST['act'] == 'generate_ris'){
    gs_get_ris($_REQUEST['post_id']);
}

add_action('wp_enqueue_scripts', 'gs_loadstyles');
function gs_loadstyles() {
  wp_enqueue_style('styles', plugins_url('stylesheet.css', __FILE__));   
    
}    
////////////////////////////////////////////////////////////////////////////////////
//             PROFILE ///////////
function add_contact_fields($profile_fields) {
	// Adding fields
       $options = (array) get_option('gs_settings');
        unset($profile_fields['aim']);
        unset($profile_fields['yim']);
        unset($profile_fields['jabber']);   
        $profile_fields['attribution']      = 'Attribution (Dr., Mr. Miss., Professor, etc.)';
        $profile_fields['affiliation']      = 'Institutional Affiliation';
        $profile_fields['department']       = 'Department';
        $profile_fields['address']      = 'Address';
if ($options['social']) {
        $profile_fields['gplus']        = 'Google+';
	$profile_fields['twitter']      = 'Twitter Username';
	$profile_fields['facebook']     = 'Facebook';
}
  
	return $profile_fields;
}
add_filter('user_contactmethods', 'add_contact_fields');

add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );
 



// insert head meta data
add_action('wp_head', 'head_meta_data');  
function head_meta_data() { 
echo "<!-- GOOGLE SCHOLAR DATA -->\n";
	echo gs_display_content();
}
///////////////////////RIS OUTPUT////////////////

add_action( 'save_post', 'gs_save_bibliographic_files' );
function gs_save_bibliographic_files() {
 	global $post;
	global $options;
	
	
}


add_filter( 'the_content', 'gs_output_rislink');
function gs_output_rislink($content) {
	if(is_single() && !is_home()) {

	global $post;
	$abstract               =       $post->post_excerpt; 
        $postauthor		=	$post->post_author;
        $author                 =       get_userdata($postauthor);
        $options                =       (array) get_option('gs_settings');
                //print_r($author);
                $author         = get_the_author_meta('attribution') . ' ' . get_the_author_meta('first_name' ,$postauthor) . ' ' . get_the_author_meta('last_name',$postauthor);
                $affiliation    = get_the_author_meta('department') . ' ' . get_the_author_meta('affiliation'); 

                $authorout = '<p class="author">' . $author . '</p><p class="affiliation">' . $affiliation . '</p>'; 
                if ($abstract) {
                    $abstract_output = sprintf("<h2 class=\"gs-abstract-title\">%s</h2><div class=\"gs-abstract\">%s</div>", 
                            $options['abstract_title'], 
                            $abstract); 
                                       
                    }
	  $content = "<p class=\"gs_citelink\">" . gs_citelink($post) . "</p>" . $abstract_output . $authorout . $content;
			
	}
                return $content;
	
}

//called from the post-edit screen, after clicking the post or update button
function gs_get_ris($post_id) {
    global $post;
    $post = get_post($post_id);
   
		$posttitle		=	$post->post_title;
		$postexcerpt            =   	$post->post_excerpt;
		$postauthor		=	$post->post_author;
		$posturl		=	$post->guid;
		$posturl		=	get_permalink();

                $author=get_userdata($postauthor);
                //print_r($author);
                $author = get_the_author_meta('last_name' ,$postauthor) . ', ' . get_the_author_meta('first_name',$postauthor);
                $options = (array) get_option('gs_settings');
	
    $ris = sprintf("TY  - JOUR
PY  - %s
J2  - %s
SN  - %s
T2  - %s
TI  - %s
UR  - %s
PB  - %s
DA  - %s
AU  - %s
LA  - %s
AB  - %s
Y2  - %s
", get_the_date('Y'),get_bloginfo('name'),$options['ISSN'],get_bloginfo('name'),$posttitle, $posturl, $options['publisher'],get_the_date('F/Y'),$author, $options['language'], $postexcerpt, date('F/Y'));
	if ($post_id) {
		header('Content-Type: text/ris');
		header('Content-Disposition: attachment; filename="ejs.ris"');
	    echo $ris;	
		exit;
	} else {
		return $ris;
	}

}
// * Output citation data in header on single pages // 
function gs_display_content() {
	global $hmd_options;
   	global $post;

	$hmd_output = '';
	$hmd_enable = $hmd_options['hmd_enable']; 
	$hmd_format = $hmd_options['hmd_format'];
	
	$options = (array) get_option('gs_settings');  
	$issn =  $options['issn'];
	
	if ($hmd_format == false) {
		$close_tag = '" />' . "\n";
	} else {
		$close_tag = '">' . "\n";
	}
	if (is_single()) {
				$author_id = get_queried_object()->post_author;
				$author = get_the_author_meta( 'last_name' ,$author_id) . ',' . get_the_author_meta( 'first_name',$author_id);;
				$post_title = get_queried_object()->post_title;
				 //echo $author;

		$hmd_output .= '		<meta name="citation_title" content="' 				. $post_title   		. $close_tag;
		$hmd_output .= '		<meta name="citation_author" content="'				. $author      			. $close_tag;
		$hmd_output .= '		<meta name="citation_publication_date" content="'  	. get_the_date('Y')		. $close_tag;
		$hmd_output .= '		<meta name="citation_journal_title" content="'  	. get_bloginfo('name')	. $close_tag;
		$hmd_output .= '		<meta name="citation_issn" content="'  				. $issn 				. $close_tag;
	
	}
	return $hmd_output;
}
add_action('admin_menu', 'gs_admin_menu');

function gs_admin_menu() {
    $page_title = 'Google Scholar Settings';
    $menu_title = 'Google Scholar';
    $capability = 'manage_options';
    $menu_slug  = 'gs-settings';
    $function   = 'gs_settings';
     add_options_page($page_title, $menu_title, $capability, $menu_slug, $function);
}

function gs_settings() {
        global $debug;
       $options    =   get_option('gs_settings'); 
       //print_r($options);exit;
    if (!current_user_can('manage_options')) {
        wp_die('You do not have sufficient permissions to access this page.');
    }
 printf ("<div id=\"icon-options-general\" class=\"icon32\"><br/></div><h2>General Information</h2><p>The Google Scholar (ver %s) plugin takes author and title 
     information from each post or page and outputs it in the document head so that Google Scholar can find it and index it. In order for it to function 
     correctly you must that your authors have a FIRSTNAME and LASTNAME entered into the user profile.<p><ul>
 <li>Add a link to the *.ris file using the shortcode [gs-citelink].
 <li>Change the name of the abstract header to \"Excerpt\", \"Summary\" or whatever you like. Though keep in mind that Google Scholar looks for the Abstract heading, so if you are publishing an academic paper, don't change that.
 </ul> ", $options['version']) ;
 ?>
    <div class="wrap">
              <form method="post" action="options.php" enctype="multipart/form-data">  
			  <?php settings_fields('gs_settings'); ?>  
			  <?php do_settings_sections(__FILE__); ?>  <p class="submit">
              <input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />  </p>
              </form>
              <div>
              
<?php
   if ($debug) print_r($options);
 }

// PLUGIN ACTION LINKS ///////////////////////////////////////////////
add_filter('plugin_action_links', 'gs_plugin_action_links', 10, 2);

function gs_plugin_action_links($links, $file) {
    static $this_plugin;

    if (!$this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }

    if ($file == $this_plugin) {
        // The "page" query string value must be equal to the slug
        // of the Settings admin page we defined earlier, which in
        // this case equals "myplugin-settings".
        $settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=gs-settings">Settings</a>';
        array_unshift($links, $settings_link);
    }	

    return $links;
}
// PLUGIN OPTIONS
add_action('admin_init', 'gs_options_init' );

function gs_options_init(){

    register_setting( 'gs_settings', 'gs_settings' );
   
    add_settings_section('main_section', 'Main Settings', 'section_cb', __FILE__);
    add_settings_field('issn', 'ISSN:', 'issn_setting', __FILE__, 'main_section');
    add_settings_field('publisher', 'Publisher:', 'publisher_setting', __FILE__, 'main_section');
    add_settings_field('language', 'Language:', 'language_setting', __FILE__, 'main_section');
    add_settings_field('abstract_title', 'Abstract Headline:', 'abstract_setting', __FILE__, 'main_section');

    add_settings_section('options_section', 'Option Settings', 'section_cb', __FILE__);
    add_settings_field('download_link', 'Download Link:', 'download_link_setting', __FILE__, 'options_section');
    add_settings_field('Social', 'Enable Social Links:', 'social_setting', __FILE__, 'options_section');

}
function section_cb () {}

function abstract_setting() {  
	$options    =   (array) get_option('gs_settings');  
	$abstract   =   $options['abstract_title'];
	echo "<input name='gs_settings[abstract_title]' type='text' size=9 maxlength=9 value='{$abstract}' />";
	
}
function issn_setting() {  
	$options = (array) get_option('gs_settings');  
	$ISSN =  $options['ISSN'];
	echo "<input name='gs_settings[ISSN]' type='text' size=9 maxlength=9 value='{$ISSN}' />";
	
}
function publisher_setting() {  
	$options   = (array) get_option('gs_settings');  
	$publisher =  $options['publisher'];
	echo "<input name='gs_settings[publisher]' type='text' size=25 value='{$publisher}' />";
	
}
function language_setting() {  
	$options  = (array) get_option('gs_settings');  
	$language =  $options['language'];
	echo "<input name='gs_settings[language]' size=2 maxlength=2 type='text' value='{$language}' />";
	
}

function download_link_setting() {  
	$options  = (array) get_option('gs_settings');  
	$download_link =  $options['download_link'];
        
        if ($download_link==1) $check="checked";
	
        echo "<input name='gs_settings[download_link]' type='checkbox' $check value='1' /> Citation Link </a>";
	
}

function social_setting() {  
	$options = (array) get_option('gs_settings');  
	$social =  $options['social'];
    if ($social==1) $check="checked";
	
        echo "<input name='gs_settings[social]' type='checkbox' $check value='1' /> Enable Social </a>";
} 
function gs_get_output_dir() {
	$upload_dir = wp_upload_dir();
	$fname = sprintf("%s%s/",$upload_dir['basedir'], $upload_dir['subdir']); 
	return $fname;
}
function gs_get_ris_filename($postid) {
   global $post;
	$ris_filename = $post->ID . '.ris';
	return $ris_filename;
}
// SHORTCODES //

add_shortcode("gs-citelink", "gs_citelink");

function gs_citelink() {	
   global $post;
   //print_r($post);
    $citelink =  sprintf("<A href=\"http://www.sociology.org/wp-admin/options-general.php?page=gs-settings&act=generate_ris&post_id=%s\">Download Citation</a>",$post->ID);       
    return $citelink;
}

function generate_ris_files () {
	 global $wpdb;
	 $args = array(
	 	'post_type'        => 'post'
		);

		$sql="SELECT id, post_author, post_excerpt,post_title,post_date,guid FROM $wpdb->posts where post_type='post' and post_status='publish'";
        $posts = $wpdb->get_results($sql);
	foreach ( $posts as $post ) {
		$ris = gs_get_ris($post);
		echo $ris;exit;
	//	$filename 	= sprintf("%s%s",gs_get_output_dir() , gs_get_ris_filename());
	//	file_put_contents($filename, $ris);
		
	}
   
 
}

/**
 * Adds a meta box to the post editing screen
 */
 function gs_scholar_post_meta_function($post) {
	  wp_nonce_field( basename( __FILE__ ), 'example_nonce' );
	  $meta 	= 	get_post_meta( $post->ID );
	echo "post meta"; 
 }
function gs_scholar_post_meta() {
    add_meta_box( 'Scholar', 'Scholar', 'gs_scholar_post_meta_function', 'post','side','high' );
} // end example_custom_meta()
add_action( 'add_meta_boxes', 'gs_scholar_post_meta' );


//////////////////////////////////////////////////////////////////////////////////
//
//          ADMINISTRATION FUNCTIONS
//
///////////////////////////////////////////////////

function activate() {

    // Activation code here...
	//generate_ris_files();
}
register_activation_hook( __FILE__, 'myplugin_activate' );

?> 
