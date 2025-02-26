<?php
/**
 * Plugin Name: Google+ Author Plugin
 * Plugin URI: http://www.seowned.co.uk/wordpress-plugins/add-an-add-to-circles-button-to-your-wordpress-posts/
 * Description: Add your Google+ profile ID and it will be linked as an author of blog posts.
 * Version: 1.0
 * Author: Dan Taylor
 * Author URI: http://www.seowned.co.uk/
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

	


//New plugin idea

add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>

	<h3>Google+ Profile ID</h3>

	<table class="form-table">

		<tr>
			<th><label for="gplus">Google+ Profle ID</label></th>

			<td>
				<input type="text" name="gplus" id="twi gplus tter" value="<?php echo esc_attr( get_the_author_meta( 'gplus', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Google+ ID.</span>
			</td>
		</tr>

	</table>
<?php }

add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
	update_usermeta( $user_id, 'gplus', $_POST['gplus'] );
}

add_action('the_content', 'gplus_output', 5);

function gplus_output($out = '') {
	global $post;

	if ( get_the_author_meta( 'gplus' ) && !is_page() && is_single()) {

		$gplus = ' 
			<script type="text/javascript">
				window.___gcfg = {lang: \'en\'};
				(function() 
				{var po = document.createElement("script");
				po.type = "text/javascript"; po.async = true;po.src = "https://apis.google.com/js/plusone.js";
				var s = document.getElementsByTagName("script")[0];
				s.parentNode.insertBefore(po, s);
				})();
			</script>
		 ';
		$gplusimg = WP_PLUGIN_URL.'/google-author-button/gp_12.png';
		$gplus .= '<div style="overflow: hidden; height: 20px; position: relative; float: right; margin-right: 15px; margin-left: 15px; margin-bottom: 3px;">
				<a href="https://plus.google.com/'.get_the_author_meta( 'gplus' ).'?rel=author" title="Circle '.get_the_author().' on Google+" style="position: relative; display: inline-block; background-color: #F8F8F8; background-image: -webkit-gradient(linear,left top,left bottom,from(white),to(#DEDEDE)); background-image: -moz-linear-gradient(top,white,#DEDEDE); background-image: -o-linear-gradient(top,white,#DEDEDE); background-image: -ms-linear-gradient(top,white,#DEDEDE); background-image: linear-gradient(top,white,#DEDEDE); border: #CCC solid 1px; border-radius: 3px; color: #333; font-weight: bold; text-shadow: 0 1px 0 rgba(255, 255, 255, .5); cursor: pointer; white-space: nowrap; text-align: left; font-style:italic; font-size: 11px; font-family: \'Helvetica Neue\',Arial,sans-serif; text-decoration: none;height: 20px; max-width: 100%;-moz-border-radius: 3px; -webkit-border-radius: 3px; z-index: 999; pointer-events: none; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;"><i style="background-image: url('.$gplusimg.'); height: 12px; width: 12px; display: inline-block; position: absolute; top: 50%; left: 4px; margin-top: -6px;"> </i><span style="padding: 0 3px 0 19px; line-height: 18px;">Add '.get_the_author().' on Google +</span></a></p>
<div style="position:absolute; left: -50px; top: -16px;">
<div class="g-plus" data-href="https://plus.google.com/'.get_the_author_meta( 'gplus' ).'" data-width="170" data-height="69" ></div>
</div></div><div style="clear:both;"></div>';
		//$gplus = '<p><small>This post was written by <a href="https://plus.google.com/u/0/'.get_the_author_meta( 'gplus' ).'?rel=author">'.get_the_author($post->ID).' view their profile on Google+</a></small></p>';
		return $out.$gplus;
}else {
	return $out;
}
} 

?>