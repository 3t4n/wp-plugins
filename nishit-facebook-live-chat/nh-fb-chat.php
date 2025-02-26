<?php

/*

   Plugin Name: NH Facebook Live Chat

   Plugin URI: https://nishit-manjarawala.tk

   description: For instant setup facebook live chat

   Version: 1

   Author: Nishit Manjarawala

   Author URI: https://profiles.wordpress.org/nishitmanjarawala

   */

function facebook_live_chat_div_insert() {

    echo '<div class="fb-customerchat" page_id="'.get_option( 'facebook_live_chat_page_id' ).'" minimized="true"></div>';

}

add_action('wp_footer', 'facebook_live_chat_div_insert');



add_action( 'wp_enqueue_scripts', 'facebook_live_chat_script_insert' );

function facebook_live_chat_script_insert(){

	wp_register_script( 'facebook_live_chat_script', plugin_dir_url( __FILE__ ) . 'js/facebook-messanger.js', array( 'jquery' ) );

	wp_enqueue_script( 'facebook_live_chat_script' );

	wp_localize_script( 'facebook_live_chat_script', 'facebook_live_var', array(

		'facebook_live_chat_appId'=>get_option('facebook_live_chat_appId')

	));

}



add_action( 'admin_menu', 'facebook_live_chat_admin_page' );

function facebook_live_chat_admin_page() {

	$page_title='NH FB Live Chat';

	$menu_title='NH FB Live Chat';

	$capability='manage_options';

	$menu_slug='nishit-facebook-live-chat';

	$function='facebook_live_chat_callback';

	$icon_url='';

	$position='10';

	add_menu_page(

		$page_title,

		$menu_title,

		$capability,

		$menu_slug,

		$function,

		$icon_url,

		$position

	);

}



function facebook_live_chat_callback(){

	if ( !current_user_can( 'manage_options' ))  {

		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );

	}

	

	if(wp_verify_nonce($_POST['facebook_live_chat_post'], 'facebook_live_chat_post_setings') && isset($_POST['facebook_live_chat_page_id'])){

		update_option('facebook_live_chat_page_id',sanitize_text_field($_POST['facebook_live_chat_page_id']));

	}

	if(wp_verify_nonce($_POST['facebook_live_chat_post'], 'facebook_live_chat_post_setings') && isset($_POST['facebook_live_chat_appId'])){

		update_option('facebook_live_chat_appId',sanitize_text_field($_POST['facebook_live_chat_appId']));

	}

	?>

	<div class="wrap">	

		<h1>Settings</h1>

		<form method="post">

		<?php wp_nonce_field('facebook_live_chat_post_setings', 'facebook_live_chat_post'); ?>

			<table>

				<tr>

					<th>Page ID</th>

					<td><input type="text" name="facebook_live_chat_page_id" value="<?php echo get_option( 'facebook_live_chat_page_id' ); ?>" required /></td>

				</tr>

				<tr>

					<th>App ID</th>

					<td><input type="text" name="facebook_live_chat_appId" value="<?php echo get_option( 'facebook_live_chat_appId' ); ?>"/></td>

				</tr>

			</table>

			<?php submit_button(); ?>

		</form>

	</div>

	<?php

}

?>