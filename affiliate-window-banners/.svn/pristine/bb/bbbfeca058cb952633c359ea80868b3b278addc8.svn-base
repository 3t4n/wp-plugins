<?php
 /*
Plugin Name: Affiliate Window Banners
Plugin URI: http://wp.ypraise.com
Description: The Affiliate Window Banners plugin uses the V3 api to load related products into your sidebar widget. You will need to have signed up as an affiliate with Affiliate Window and have a password for the V3 api which you can get from the api crendentials of your account settings.
Version: 2.3
Author: Kevin Heath
Author URI: http://wp.ypraise.com
License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/


	if ( ! defined( 'WP_CONTENT_URL' ) )define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
	
	if ( ! defined( 'WP_CONTENT_DIR' ) )define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
	
	if ( ! defined( 'WP_PLUGIN_URL' ) )define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
	
	if ( ! defined( 'WP_PLUGIN_DIR' ) )define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );

	add_action('admin_menu', 'awin_widget_menu');


	function awin_widget_menu() {
		add_options_page('Affwin Banners', 'Affwin Banners', 8, __FILE__, 'awin_widget_options');
	}

function awin_widget_options() {
?>


<div class="wrap">
			<h2>Affwin Banners Widget</h2>
		<div id="donate_container">
     Support for this plugin id offered at wp.ypraise.com where a better featured of this plugin is available. The more functional plugin offers shortcode use including individual shortcode attributes.
	  <p></p>
	  This version is currently under development. Currently if you opt to use tags then it will only take the first post tag it finds to use as a keyword or phrase. I'm having a few issues with passing multi-dimensional arrays to the api. But the tags option does allow for a little more relevency of products for posts.<br />
	  If there is no tag set for the post - or if its a page etc - then the sidebar will use the default keyword.<br />
	  You can find your V3 api password by going clicking on settings and the api credentials in your Affiliate Window account.
    </div>		
			
				<form method="post" action="options.php">
						<?php  wp_nonce_field('update-options'); ?>
<table width="90%" class="form-table">
     <tr valign="top">
     	<th colspan="3" scope="row"><h3>Affwin Banners Widget Parameters</h3></th>
	</tr>
	<tr valign="top">
		<th width="25%" scope="row"><div align="left">Affiliate Window ID</div></th>
			<td width="24%"><div align="left">
			  <input type="text" name="sidebar_awin_id" value="<?php  echo get_option('sidebar_awin_id'); ?>" />
	    </div></td>
	        <td width="51%" rowspan="2"><p>&nbsp;</p></td>
	</tr>
	<tr valign="top">
		<th width="25%" scope="row"><div align="left">Affiliate Window API Password</div></th>
			<td width="24%"><div align="left">
			  <input type="text" name="sidebar_api_password" value="<?php  echo get_option('sidebar_api_password'); ?>" />
	    </div></td>
      </tr>
	<tr valign="top">
	  <th scope="row"><div align="left">Default Banner Keywords</div></th>
	  <td><div align="left">
	    <input type="text" name="sidebar_default_keywords" value="<?php  echo get_option('sidebar_default_keywords'); ?>" />
	    </div></td>
	  <td>&nbsp;</td>
	  </tr>
	  	<tr valign="top">
		<th width="25%" scope="row"><div align="left">Default number of ads to display in sidebar</div></th>
			<td width="24%"><div align="left">
			  <input type="text" name="affbanner_number" value="<?php  echo get_option('affbanner_number'); ?>" />
	    </div></td>
      </tr>
	  	<tr valign="top">
		<th width="25%" scope="row"><div align="left">Number of characters for sidebar banner description</div></th>
			<td width="24%"><div align="left">
			  <input type="text" name="affbancont_number" value="<?php  echo get_option('affbancont_number'); ?>" />
	    </div></td>
      </tr>
	  <tr valign="top">
					<th scope="row">Use Tags for keyword (beta - currently only using first tag.</th>
					<td>
					<p>Use tags:  <select name='affbanner_tags'>
							<option value='No' <?php selected('No',get_option('affbanner_tags')); ?>>No</option>
							<option value='Yes' <?php selected('Yes', get_option('affbanner_tags')); ?>>Yes</option>
						
						</select></p>
					</td>
				</tr>
	<tr valign="top">
	  <th colspan="3" scope="row">&nbsp;</th>
	  </tr>
</table>
			<input type="hidden" name="action" value="update" />
			<input type="hidden" name="page_options" value="sidebar_awin_id,sidebar_api_password,sidebar_default_keywords,affbanner_number,affbancont_number,affbanner_tags" />
			<p class="submit">
			<input type="submit" class="button-primary" value="<?php  _e('Save Changes')     ?>" />
			</p>
	</form>
		</div>

<? }



function affwin_sidebar_widget($args) {
ini_set("soap.wsdl_cache_enabled", 1);
ini_set("soap.wsdl_cache_dir", "/tmp");
ini_set("soap.wsdl_cache_ttl", 86400);

define('API', 'PS');

define('API_VERSION', 3);
define('API_USER_TYPE', 'affiliate'); 

define('PS_WSDL', 'http://v3.core.com.productserve.com/ProductServeService.wsdl');
define('PS_NAMESPACE', 'http://v3.core.com.productserve.com/');
define('PS_SOAP_TRACE', false);	
define('API_WSDL', PS_WSDL);
define('API_NAMESPACE', PS_NAMESPACE);
define('API_SOAP_TRACE', PS_SOAP_TRACE);
$sidebar_default_keywords = get_option( "sidebar_default_keywords" );
	$afftags = get_option( "affbanner_tags" );
global $wp_query;
$thePostID = $wp_query->post->ID;
global $wpdb;
	$querystr = "SELECT post_id, meta_value FROM $wpdb->postmeta WHERE meta_key = 'sidebarquery1' and post_id = $thePostID";
	$pageposts = $wpdb->get_results($querystr, ARRAY_N);
	if ($pageposts<>''){
	foreach ($pageposts as $post){
	$thissidebarquery1 = $post{1};
	
	
	$posttags = get_the_tags();
foreach($posttags as $tag) { $keywords[] = $tag->name; }
$page_keywords1 = $keywords;
$page_keywords = $page_keywords1[0]	;
	
}
}
if ($thissidebarquery1=='')$thissidebarquery1 = $sidebar_default_keywords;
 if ($thissidebarquery1<>'' ) {
$awuser = get_option( "sidebar_awin_id" );

if ($afftags == "Yes" AND $posttags<>'') {

    $thissidebarquery1 = $page_keywords1[0]	;

}

$returnedcolumns = array(sAwImageUrl,sDescription,sBrand,iMerchantId);

		
		require_once(WP_PLUGIN_DIR.'/affiliate-window-banners/classes/class.ClientFactory.php');
		$awpassword = get_option( "sidebar_api_password" );
		$affnumber = get_option( "affbanner_number" );
		$affdesc = get_option( "affbancont_number" );
	
		
		define('API_KEY',   $awpassword);
		$oClient = ClientFactory::getClient();
		
		
		
				$aParams7 = array( "iLimit"=> $affnumber, "sQuery" => $thissidebarquery1, "iOffset" => 0,  "sSort" => 'relevancy', "bIncludeTree" => true, "sColumnToReturn" => $returnedcolumns, "sMode" =>boolean);
				$oResponse= $oClient->call('getProductList', $aParams7);
				
		extract($args);
		
		
echo $before_widget;	
			
	foreach($oResponse->oProduct as $details){
	
	
						$image = $details->sAwThumbUrl;
						$bigimage = $details->sAwImageUrl;
						$price = $details->fPrice;
						$description = $details->sDescription;
						$merchant = $details->iMerchantId;
						$awmerchantlink = $details->sAwDeepLink;
						$name = $details->sName;

				
$awinsidebarcontent .= '<ul>';

						$awinsidebarcontent .= "<li><a href=\"".$awmerchantlink."\" title=\"".$name."\" target=\"_blank\" rel=\"nofollow\"><img src=\"".$bigimage."\" width=\"100\" height=\"100\" alt=\"".$name."\"  /></a><br/><div id='aftext'><a href=\"".$awmerchantlink."\" title=\"".$name."\" target=\"_blank\"rel=\"nofollow\">".$name."</a><br/>".substr($description,0,$affdesc)."... <a href=\"".$awmerchantlink."\" title=\"".$name."\" target=\"_blank\" rel=\"nofollow\"><font color=\"red\">&pound;".number_format($price,2,'.',',')."</font></a></div></li>";
						$awinsidebarcontent .='</ul>';
						

}

	?> 

	<div class="abwidget"> <?php	
		
	echo $awinsidebarcontent;
						
	?> </div> <?php
	
	echo $after_widget;
}
	
}


function init_affwin_sidebar_widget(){
	register_sidebar_widget("Affiliate Window Banner", "affwin_sidebar_widget");
}


add_action("plugins_loaded", "init_affwin_sidebar_widget");




// metabox

/* Define the custom box */

// WP 3.0+
// add_action( 'add_meta_boxes', 'affban_add_custom_box' );

// backwards compatible
add_action( 'admin_init', 'affban_add_custom_box', 1 );

/* Do something with the data entered */
add_action( 'save_post', 'affban_save_postdata' );

/* Adds a box to the main column on the Post and Page edit screens */
function affban_add_custom_box() {
    add_meta_box( 
        'affban_sectionid',
        __( 'Affiliate Window Banners', 'affban_textdomain' ),
        'affban_inner_custom_box',
        'post' 
    );
    add_meta_box(
        'affban_sectionid',
        __( 'Affiliate Window Banners', 'affban_textdomain' ), 
        'affban_inner_custom_box',
        'page'
    );
}

/* Prints the box content */
function affban_inner_custom_box() {

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'affban_noncename' );

  // The actual fields for data entry
  echo '<label for="affban_new_field">';
       _e("Sidebar banners keywords", 'affban_textdomain' );
  echo '</label> ';

  global $post;
  $postid=$post->ID;
  $value = get_post_meta($postid,'sidebarquery1',true);

  echo "<input type='text' id='affban_new_field' name='affban_new_field' value='$value' size='25' />";
}

/* When the post is saved, saves our custom data */
function affban_save_postdata( $post_id ) {
  // verify if this is an auto save routine. 
  // If it is our form has not been submitted, so we dont want to do anything
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;

  // verify this came from the our screen and with proper authorization,
  // because save_post can be triggered at other times

  if ( !wp_verify_nonce( $_POST['affban_noncename'], plugin_basename( __FILE__ ) ) )
      return;

  
  // Check permissions
  if ( 'page' == $_POST['post_type'] ) 
  {
    if ( !current_user_can( 'edit_page', $post_id ) )
        return;
  }
  else
  {
    if ( !current_user_can( 'edit_post', $post_id ) )
        return;
  }

  // OK, we're authenticated: we need to find and save the data

  $mydata = $_POST['affban_new_field'];

  global $post;
  $post_id = $post->ID;

  update_post_meta($post_id,'sidebarquery1',$mydata);
}

?>