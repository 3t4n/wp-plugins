<?php
/*
Plugin Name: Fast Link Shorten Plugin
Plugin URI: http://blog.gokhankara.net/wordpress-icin-bc-vc-hizli-link-kisaltma-eklentisi/
Description: http://bc.vc/ Api Fast Link Shorten Shortcode
Version: 1.0
Author: Gökhan KARA
Author URI: http://www.gokhankara.net
*/


// Plugin Language Add
load_plugin_textdomain('fast-link-shorten', false, dirname(plugin_basename(__FILE__)) . '/langs');
// Plugin Language Add

// Plugin Settings Page Add
add_action('admin_menu', 'fastlinkshorten_function');
function fastlinkshorten_function()
{
add_options_page('Fast Link Shorten','Fast Link Shorten', '8', 'fastlinkshorten', 'fastlinkshorten_settings_functions');
}
// Plugin Settings Page Add

// Plugin Settings Page Details
function fastlinkshorten_settings_functions() {
?>
	<div class="update-nag">
      <?php echo '<img src="' . plugins_url( 'fast-link-shorten-icon.png', __FILE__ ) . '" > '; ?>
	   <p><strong><?php echo _e('Bc.vc Fast Link Shorten Plugin','fast-link-shorten');?></strong> Version : 1.0  <?php echo '<a target="_blank" href="' . plugins_url( 'changelog.txt', __FILE__ ) . '">'; ?> <?php echo _e('Check for updates','fast-link-shorten');?>
	   </a></p>
    </div>
	
	<div class="card pressthis" style="max-width:100% !important">
	
	<h2><?php echo _e('Bc.vc welcome to the panel quick link shortening plugin.','fast-link-shorten');?></h2>
	<p><?php echo _e('This plugin is a waste of time for the sole purpose of quickly instantly a link of your choice, without having to bc.vc link to turn works. Activate the plugin and you can use in 3 stages in a way unlimited. After defining the system, your user ID and API key, you only need to use a short code of the process.','fast-link-shorten');?></p>
	<p><?php echo _e('After activating the plugin settings from the menu on the left in order to receive information about the use / fast, just click on shorten link','fast-link-shorten');?></p>
	<p><?php echo _e('For a successful usage, please complete all of the following stages carry out in a manner that when the transaction is complete and check again.','fast-link-shorten');?></p>
	</div>
	
	
	<div class="card pressthis" style="max-width:100% !important">
	<!-- Tutorial Modal Content -->
	<div id="my-content-id" style="display:none;">
    <?php add_thickbox(); ?>
	<center>
		<h1><?php echo _e('Bc.vc Fast Link Shorten Plugin','fast-link-shorten');?></h1>
        <iframe width="600" height="315" src="https://www.youtube.com/embed/DcPNfGDrFD4" frameborder="0" allowfullscreen></iframe>
		<p><?php echo _e('Installation, use, watch video or perform the following operations.','fast-link-shortenn');?></p>
   
	</center>
	</div>
	<!-- Tutorial Modal Content -->
	
	<h3><span class="dashicons dashicons-format-video"></span>
	<?php echo _e('Installation, use, watch video or perform the following operations.','fast-link-shorten');?>
	<a href="#TB_inline?width=600&height=450&inlineId=my-content-id" class="thickbox button button-secondary">
	<?php echo _e('CLİCK!','fast-link-shorten');?></a></h3>
	</div>
	
	<div class="card pressthis" style="max-width:100% !important">
	<h3><?php echo _e('1. Login to the site, take note of your user ID and API key','fast-link-shorten');?></h3>
		<h4><a class="button button-secondary" target="_blank" href="http://bc.vc/?r=117056"><?php echo _e('Unless you a member Click here for new membership','fast-link-shorten');?></a></h4>
		<p><?php echo _e('If you are a member, log in and visit the link below.','fast-link-shorten');?></p>
		<h4><a class="button button-secondary" target="_blank" href="http://bc.vc/tools.php?api"><?php echo _e('This visit, click on','fast-link-shorten');?></a></h4>
		<p><strong>http://bc.vc/tools.php?api</strong> <?php echo _e('examine the link address that is included in the sample.','fast-link-shorten');?>
		<hr/>
		<?php echo '<img src="' . plugins_url( 'img/Screenshot_1.png', __FILE__ ) . '" >'; ?>
		<p>key=<strong style="color:red;">74bc56b572a97d049fd772eadc081675</strong> <?php echo _e('this section of your API key code.This issue (the = sign to the next ) note.','fast-link-shorten');?></p>
		<p>uid=<strong style="color:red;">117056</strong> <?php echo _e('this section gives you the user ID code.This issue (the = sign to the next ) note.','fast-link-shorten');?> </p>
	
	</div>
	
	<div class="card pressthis" style="max-width:100% !important">
	<h3><?php echo _e('2. Enter this information and save your user profile in WordPress','fast-link-shorten');?></h3>
		<h4><a class="button button-secondary" target="_blank" href="<?php echo admin_url( '/profile.php', 'http' ); ?>"><?php echo _e('Go to your profile page','fast-link-shorten');?></a></h4>
		<?php echo '<img src="' . plugins_url( 'img/Screenshot_2.png', __FILE__ ) . '" > '; ?>
		<p><?php echo _e('Your user profile and enter the information you receive on this note at the top save the transaction.','fast-link-shorten');?></p>
		<h4><?php echo _e('Our site now with our system APIs, now the use learn about.','fast-link-shorten');?></h4>
	</div>
	
	<div class="card pressthis" style="max-width:100% !important">
	<h3><?php echo _e('3. Bc.vc short code use','fast-link-shorten');?></h3>
		<h4><a class="button button-secondary" target="_blank" href="<?php echo admin_url( '/post-new.php', 'http' ); ?>"><?php echo _e('Click to create a new post','fast-link-shorten');?></a></h4>
		<p><?php echo _e('Create a new post, type in part of the content of your articles, and bc.note the URL that you want with the abbreviation vc.Content the content section short code sample below, a list of words, copy and publish the article in a way that fits yourself.','fast-link-shorten');?></p>
		<pre>[bcvc url="https://www.sitename" text="<?php echo _e('Download the file now','fast-link-shorten');?>"] </pre>
		<?php echo '<img src="' . plugins_url( 'img/Screenshot_3.png', __FILE__ ) . '" > '; ?>
		<pre>[bcvc url="<?php echo _e('This field is the site address: http:// type in the form of','fast-link-shorten');?>" text="<?php echo _e('Type the word you want the link to appear in this field','fast-link-shorten');?>"] </pre>
		<h4><?php echo _e('In the summer we do share our short code looks like the following.','fast-link-shorten');?></h4>
		<?php echo '<img src="' . plugins_url( 'img/Screenshot_4.png', __FILE__ ) . '" > '; ?>
		<h4><?php echo _e('Check your link.Bc.make sure the VC link.All transactions are completed smoothly, if you have bc.vc panel, check your link.Acronym for your URL there if you have the API and plugin system is installed and activated seamlessly.','fast-link-shorten');?></h4>
		<?php echo '<img src="' . plugins_url( 'img/Screenshot_5.png', __FILE__ ) . '" > '; ?>
	</div>
	
	<div class="card pressthis" style="max-width:100% !important">	
	<h3><?php echo _e('4. The transaction is complete! Gains plenty :)','fast-link-shorten');?></h3>	
		<p><?php echo _e('The development of the plugin if you want to please write a post about the plugin in the web site in the taste of the article on social networks,you can share it.As the source link <strong>http://www.gokhankara.net</strong> share address note that.','fast-link-shorten');?>
		</p>
		
		
		<p><?php echo _e('The development version of the plugin with the update you can give feedback to my mail address if you want new features to be added.','fast-link-shorten');?>
		</p>
	
	</div>
	
	<div class="card pressthis" style="max-width:100% !important">
	<h3><span class="dashicons dashicons-heart"></span> <?php echo _e('Now you can donate to the developer!','fast-link-shorten');?></h3>
	<a class="button button-secondary" target="_blank" href="https://www.patreon.com/gokhankaraofficial"><span class="dashicons dashicons-smiley"></span> <?php echo _e('I could buy you a coffee?','fast-link-shorten');?></a>
	<p><?php echo _e('The next free plugin and you can make a donation to the free development of this plugin. Buy a coffee :) Thank you.','fast-link-shorten');?></p>
	</div>
	
	<div class="card pressthis" style="max-width:100% !important">
	<h3><?php echo _e('Professional WordPress theme and plugin to your web sites and you can purchase service for your projects','fast-link-shorten');?></h3>	
		<p><?php echo _e('Appropriate special needs or theme or a plugin if you want your ideas on this page <strong>live support in the right corner from the area</strong> or you can contact me quickly my email address.At the same time and you can encounter related to solve the plugin problem report.','fast-link-shorten');?></p>
	</div>
	
	<div class="card pressthis" style="max-width:100% !important">	
		<?php echo '<img src="' . plugins_url( 'img/author_logo.png', __FILE__ ) . '" > '; ?> <?php echo _e('Bc.vc Fast Link Shorten Plugin','fast-link-shorten');?> - Version: 1.0 - <a target="_blank" href="http://www.gokhankara.net">Gökhan KARA</a> - gkdesigned@gmail.com - <?php echo _e('Interactive Design Specialist','fast-link-shorten');?>
	</div>
	
	
<?php }
// Plugin Settings Page Details


// Plugin User Profile Box Add
function fastlinkshorten_key( $fastlinkshorten_key_meta_key ) {
    $fastlinkshorten_key_meta_key['bcvcapikey'] = 'Bc.vc Api Key'; // Key
	$fastlinkshorten_key_meta_key['bcvcuserid'] = 'Bc.vc User ID'; // ID
	
    return $fastlinkshorten_key_meta_key;
}
add_filter('user_contactmethods','fastlinkshorten_key',10,1); 
// Plugin User Profile Box Add


/* BC.VC Api Link Create Shorcode*/ 
function fastlinkshorten_shortcode($atts, $content = null) {
extract(shortcode_atts(
array(
"url" => '',
"text" => '',
), $atts));
$bcvc_url = file_get_contents('http://bc.vc/api.php?key='.get_the_author_meta('bcvcapikey').'&uid='.get_the_author_meta('bcvcuserid').'&url=' . $url);
return '<a href="'.$bcvc_url.'" alt="'.$text.'" title="'.$text.'">'.$text.'</a>';
}
add_shortcode( 'bcvc', 'fastlinkshorten_shortcode' );
/* BC.VC Api Link Create Shorcode*/ 

// Post & Page Notice //
function fastlinkshorten_sidebox($object)
{
	wp_nonce_field(basename(__FILE__), "fastlinkshorten_MetaBoxs");
?>
	<h4><?php echo _e('Shorten A Link Fast Bc.vc Use Short Code','fast-link-shorten');?></h4></label>
	<p><?php echo _e('Quick short code that you can use to shorten links : <strong>[bcvc url="https://www.sitename" text="Download the file now"]</strong>','fast-link-shorten');?>
	</br><?php echo _e('<a target="_blank" href="'.admin_url( '/options-general.php?page=fastlinkshorten', 'http' ).'">Click For more information</a>','fast-link-shorten');?></p>
<?php }
function fastlinkshorten_MetaBox()
{
    add_meta_box("fastlinkshorten_MetaBoxs", __('Bc.vc Fast Link Shorten Plugin','fast-link-shorten'), "fastlinkshorten_sidebox",array('post','page'), "side", "high", null);
}
add_action("add_meta_boxes", "fastlinkshorten_MetaBox");
// Post & Page Notice //


?>