<?php
/*
Plugin Name: Proper Custom Avatars for 3.5
Plugin URI: http://rockdio.org/ayudatech/wordpress-3-4-and-higher-custom-avatars-the-proper-way/
Description: Proper way of displaying Custom avatars, remove calls to http://gravatar.com, Use local default Avatar, Add custom avatar for the blog users,Display Custom avatar for blog users, Display default avatar for unregistered commenter, Display custom avatar for comment replies.
Version: 1.0.2
License: GPL
Author: Nathaniel Narvaez (RockDio.org)
Author URI: http://rockdio.org
*/


/*===================================================================================
 * Better Add default Custom Avatar 
 * =================================================================================*/

// Register and define the settings
add_action('admin_init', 'pca_admin_init');
function pca_admin_init(){
	register_setting(
		'discussion',			// settings page
		'pca_link',			// option name
		'pca_validate_options'  	// validation callback
	);
	add_settings_field(
		'pcalinknathan',					// id
		'Proper Custom Avatars image URL',			// setting title
		'pca_setting_input',    				// display callback
		'discussion',              				// settings page
		'avatars'          					// settings section
	);
}


// Display and fill the form field
function pca_setting_input() {

	// get option 'pca_link' value from the database
	$options = get_option( 'pca_link' );
	$value = $options['pca_link'];
	$myavatar = get_option( 'pca_link' );
	?>
<strong>Change Custom Avatar to:</strong>
<input id='pca_link' name='pca_link[pca_link]'
 type='text' style="width: 400px;" value='<?php echo esc_attr( $value ); ?>' /> </br>
 Define an URL pointing to a image you want to use as avatar (if it is hosted in your site will be faster)</br>
 No image manipulation is done, we recomend using a square image no larger than 96Pixels.</br>
 Should you need help have comments or problems feel free to post on my site: 
<a href"http://rockdio.org/ayudatech/wordpress-3-4-and-higher-custom-avatars-the-proper-way/">Plugin post for support on Rockdio.org </a>

</br></br><strong>Current Custom Avatar:</strong>  <? echo $value;?></br>
This returns a sanitized string to avoid SQL Injections
<?
}

// Validate user input and return validated data
function pca_validate_options( $input ) {
	$valid = array();
	$valid['pca_link'] = strip_tags( $input['pca_link'] );
	return $valid ;


}


add_filter( 'avatar_defaults', 'newgravatar' );
function newgravatar ($avatar_defaults) {
$avatar_defaults = array();
$options = get_option( 'pca_link' );
$myavatar = $options['pca_link'];
if (empty($myavatar))
$myavatar =  plugins_url( 'img/default.jpg' , __FILE__ );
else
$myavatar = $options['pca_link'];
$avatar_defaults[$myavatar] = "Custom Default Avatar"; 	
return $avatar_defaults;
}



/*===================================================================================
 * Use Custom Avatar if Provided
 * If no Avatar is found the default from the function above is used
 * Nathaniel Narvaez (RockDio.org) @ http://rockdio.org
 * =================================================================================*/

function be_gravatar_filter($avatar, $id_or_email, $size, $default, $alt) {

	if ( empty($default) ) {
		$avatar_default = get_option('avatar_default');

		if ( empty($avatar_default) )
			$default = $myavatar;
		else
			$default = $avatar_default;
	}
	if ( 'Mystery' == $default )
		$default = $myavatar;

	if (!is_object($id_or_email)) {
												//Returns the Local Avatar for Posts and Pages
			$custom_avatar = get_the_author_meta('be_custom_avatar');
			if(!empty($custom_avatar))
			$avatarfound = $custom_avatar;

			elseif(empty($custom_avatar)){
												//Returns the Local Avatar for ADMIN AREA 
				$id = $id_or_email;
				$custom_avatar = get_user_meta($id,'be_custom_avatar',true);  
				if(!empty($custom_avatar)){
				$avatarfound = $custom_avatar;
				}
			}
		}
	elseif ( !empty($id_or_email->user_id) ) {
												//Returns the Local Avatar for Comments
			$id = (int) $id_or_email->user_id;
			$user = get_userdata($id);
			if ( $user){
												//Returns the Local Avatar for comments if User has one
				$email = $user->user_email;
				$custom_avatar = get_user_meta($user,'be_custom_avatar',true);
				$avatarfound = $custom_avatar;
			}
		}
	elseif ( !empty($id_or_email->comment_author_email) ) {
												//Returns the DEFAULT Local Avatar for comments
			$email = $id_or_email->comment_author_email;
			$avatarfound = $default;
		}

	if ($avatarfound =='') 
			$avatarfound = $default;



	$avatar = "<img alt='{$safe_alt}' src='{$avatarfound}' class='avatar avatar-{$size} photo' height='{$size}' width='{$size}' />";
	return $avatar;

}
add_filter('get_avatar', 'be_gravatar_filter', 1, 5);
//<pre>print_r($custom_avatar)</pre>

/*===================================================================================
 * Add Custom Avatar Field @param object $user
 * @link http://www.billerickson.net/wordpress-custom-avatar/
 * =================================================================================*/
function be_custom_avatar_field( $user ) { ?>

	<h3>Custom Avatar</h3>
	 
	<table>
	<tr>
	<th>
		<label for="be_custom_avatar">Custom Avatar URL:</label> 
		<img style="max-width: 50px;" src="<?php echo sanitize_text_field( get_the_author_meta( 'be_custom_avatar', $user->ID ) ); ?>"
	</th>
	<td>
	<input type="text" style="width: 400px;" name="be_custom_avatar" id="be_custom_avatar" 
		value="<?php echo sanitize_text_field( get_the_author_meta( 'be_custom_avatar', $user->ID ) ); ?>" /><br />
	<span> Type in the URL of the image you'd like to use as your avatar. This will override your default Gravatar, 
		or show up if you don't have a Gravatar. <br /><strong>Image should be ma: 96x96 pixels.</strong></span>
	</td>
	</tr>
	</table>
	<?php 
}
add_action( 'show_user_profile', 'be_custom_avatar_field' );
add_action( 'edit_user_profile', 'be_custom_avatar_field' );
 

/*===================================================================================
 * Save Custom Avatar Field @param int $user_id @author Bill Erickson
 * @link http://www.billerickson.net/wordpress-custom-avatar/
 * =================================================================================*/

function be_save_custom_avatar_field( $user_id ) {
	if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }
		update_usermeta( $user_id, 'be_custom_avatar', $_POST['be_custom_avatar'] );
}
add_action( 'personal_options_update', 'be_save_custom_avatar_field' );
add_action( 'edit_user_profile_update', 'be_save_custom_avatar_field' );

?>