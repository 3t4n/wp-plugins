<?php
/*
Plugin Name: Pit Login Welcome
Plugin URI: http://www.webingnet.com
Description: This plugin helps change your Website's login page logo, background & to add a message option in your WP Admin page.
Version: 1.1.5
Author: Pantho Bihosh
Author URI: http://www.bihosh.com
*/





function ax_custom_login_settings() 

{

		

	register_setting( 'ax-custom-login-page', 'ax_custom_login_bg_color' );

	register_setting( 'ax-custom-login-page', 'ax_custom_login_image' );

	register_setting( 'ax-custom-login-page', 'ax_custom_background_image');

}

add_action('admin_init','ax_custom_login_settings');



function ax_custom_login_page() 

{

add_menu_page('Login Welcome', 'Login Welcome', 'read', 'customize_login_page', 'ax_customize_login_settings_page',plugins_url('/images/icon.png', __FILE__));

}

add_action('admin_menu', 'ax_custom_login_page');


function ax_customize_login_settings_page() 

{ 

  

?>

    <div id=wrap>
	<h2>Pit Login Welcome : Settings</h2>
	<div class="helpforum"><a href="http://www.webingnet.com/wordpress-login-welcome-pro-pricing/" target="_blank"><span class="button-primary">See Premium Version Pricing</span></a>  <span class="button-primary">Price $29 but Now SALE Price $17 only</span></div>
	<form method="post" action="options.php" id="main-login-setting-form">
	<?php settings_fields( 'ax-custom-login-page' ); ?>
			<table width="80%" id="main-login-settings">
			<tr class="setting-row">
			<td colspan="4"><h3 class="section-heading">Login Page Background Color</h3></td>
			</tr>
			<tr valign="top" class="setting-row">
	 		<td scope="row">Click here to select background color</td>
	   		<td colspan="3"> <input  type="text"  id="ax_custom_login_bg_color"  name="ax_custom_login_bg_color" value="<?php echo get_option('ax_custom_login_bg_color');?>"/></td>
			</tr>

			<tr class="setting-row">
			<td colspan="4"><h3 class="section-heading">Login Page Logo Change</h3></td>
			</tr>

			<tr class="setting-row">
			<td>
			<?php _e('Select Logo', 'login'); $ax_value_image=get_option('ax_custom_login_image',TRUE); ?>
			 <input type="button" data-src="custom-login-logo" data-id='ax_custom_login_image'  class='button rtp-media-uploader' name="ax_uss_image" value="<?php _e('Upload image','login') ?>" />
			<input type="hidden" name="ax_custom_login_image" id="ax_custom_login_image" value="<?php echo( $ax_value_image )  ?>" /> 
			</td>
			<td colspan="">
			Logo Preview			
			</td>
			<td>
			<?php 					
            if ( !empty ( $ax_value_image ) )

				   {	            

                      	$sb_logo_src = wp_get_attachment_image_src( $ax_value_image, 'thumbnail' ); }else

						{$sb_logo_src[0]="";

						} ?>

						

				        <img id="custom-login-logo" src="<?php echo $sb_logo_src[0]; ?>" class="sb-logo-thumb"  width="125" height="125" /><br /> <?php

						

                     ?>
					</td>
					<td>
					 <input type="button" id="remove_logo" class="remove_btn" value="Remove Logo"/></td>
			</tr>

			<tr class="setting-row">
			<td colspan="4"><h3 class="section-heading">Login Page Background Change</h3></td>
			</tr>

			<tr class="setting-row">
			<td>
			<?php _e('Select Background Image  ', 'login');?>
			<input type="button" data-id='ax_custom_background_image' data-src="custom-login-bg"  class='button rtp-media-uploader' name="ax_custom_bg_btn" value="<?php _e('Upload Image','login') ?>" />
			<input type="hidden" name="ax_custom_background_image" id="ax_custom_background_image" value="<?php $ax_value_background_image=get_option('ax_custom_background_image',TRUE); echo( $ax_value_background_image )  ?>" /> 
			</td>
			<td colspan="">
			Background Preview				
			</td>
			<td><?php 					
                   if ( !empty ( $ax_value_background_image ) )
				   {	       
				       
                      	$sb_background_src = wp_get_attachment_image_src( $ax_value_background_image, 'thumbnail' );  ?>
						
				        <img id="custom-login-bg" src="<?php echo $sb_background_src[0]; ?>" class="sb-logo-thumb" width="125" height="125"/><?php
					} ?>
					</td>
					<td>
					<input type="button" id="remove_bg" class="remove_btn" value="Remove Image"/></td>
			</tr>  
				   
			</table>

		
		
<table id="message_table" width="80%">
<tr class="setting-row">
			<td colspan="4"><h3 class="section-heading">Login Page Messages</h3></td>
			</tr>
<tr>
						<td>Add new message</td>
				   		<td colspan="3"><input  size="80"   type="text"  id="ax_custom_add_login_message"  name="ax_custom_add_login_message" value="<?php echo get_option('ax_custom_add_login_message');?>"/>
						 <input type="button" id='ax_add_new_message'  class='ax_add_new_message' name="ax_add_new_message" value="Add Message" />
						 </td>
						 </tr>
<?php 
						  $message=get_option('ax_custom_login_message');
						 foreach($message as $key=>$value){
						?>
				    	
					<tr valign="top" class="msg_row" id="<?php echo $key; ?>">
				 	<td ><input type="radio" id="<?php echo $key; ?>" name="message" value="ax_custom_login_message_<?php echo $key; ?>"> </td>
				 	<td >Message :</td>
				   	<td colspan="2"><input size="80"  type="text"  id="ax_custom_login_message_<?php echo $key; ?>"  name="ax_custom_login_message_<?php echo $key; ?>" value="<?php echo $value;?>"/></td>
				 	</tr> <?php  }
				  ?>

</table>
<input type="button" id='ax_update_message'  class='ax_message_action' name="ax_update_message" value="Update Message" />
<input type="button" id='ax_delete_message'  class='ax_message_action' name="ax_delete_message" value="Delete Message" />
</div>
<div class="saved"><?php submit_button();?></div>

</form>
<?php } 



function custom_login_scripts_method() {

    wp_enqueue_script( 'jquery' );
	wp_enqueue_media();
	wp_enqueue_script('ax_uss_custom',plugins_url( 'js/ax_custome_login.js', __FILE__ ), array('jquery','wp-color-picker'), false, true);
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_style('custom_style',plugins_url('css/custom.css',__FILE__));
	}

add_action( 'admin_enqueue_scripts', 'custom_login_scripts_method' ); 



function custom_login_page_default_values() {

update_option( 'ax_custom_login_bg_color', '#bfbfbf' ); 

update_option( 'ax_custom_login_image', ''); 

$message=array('Hello! Welcome to this website','Welcome to the login Page.');
update_option( 'ax_custom_login_message', $message, '', '' ); 



}

register_activation_hook( __FILE__, 'custom_login_page_default_values' );

function custom_login_message( $message ) { 
$message=get_option('ax_custom_login_message');

$key=array_rand($message,1);
if ( empty($message) ){
        return "<p>Welcome to this site. Please log in to continue</p>";
    } else {
       return "<div style='width: 298px;height: auto;border:1px solid #CCC;padding: 10px;margin-left:0px;border-radius:3px;margin-bottom: 5px;box-shadow: rgba(200,200,200,.7) 0 4px 10px -1px;-webkit-box-shadow: rgba(200,200,200,.7) 0 4px 10px -1px;background-color:#fff;color:#000; text-align:center;'> $message[$key] </div>";
			}
}

add_filter( 'login_message', 'custom_login_message' );



function custom_login_css() {	
	$ax_background_image=get_option('ax_custom_background_image',TRUE);
	$ax_value_image=get_option('ax_custom_login_image',TRUE);
    $custom_color=get_option('ax_custom_login_bg_color');
   	$sb_logo_src = wp_get_attachment_image_src( $ax_value_image, 'thumbnail' );
	$sb_background_src = wp_get_attachment_image_src( $ax_background_image, 'full' );
	
	echo '<style type="text/css">
	#login h1 a { background-image: url('.$sb_logo_src[0].') !important; }
	body.login,html,.wp-dialog   {background-color:'.$custom_color.' !important;}
	body.login,html,.wp-dialog  {background-image:url('.$sb_background_src[0].')!important;background-size:cover;background-repeat:no-repeat;}

	</style>';

}

add_action('login_head', 'custom_login_css');


function add_messages() {
    if(isset($_REQUEST['ax_add_message'])){
		$message=get_option('ax_custom_login_message'); 
		$message[]=$_REQUEST['ax_add_message'];
		update_option( 'ax_custom_login_message', $message );
		echo end(array_keys($message));
	    die();
   }
}
add_action( 'wp_ajax_add_messages', 'add_messages' );


function update_messages() {
    if(isset($_REQUEST['ax_array_index']))
	{
		$message=get_option('ax_custom_login_message'); 
			if($_REQUEST['operation']=='ax_update_message')
			{
			 $message[$_REQUEST['ax_array_index']]=$_REQUEST['ax_add_message'];
			}
			else
			{
				unset($message[$_REQUEST['ax_array_index']]);	
			}
			update_option( 'ax_custom_login_message', $message );
		 	echo($_REQUEST['operation']);
		   	die();
   }
}
add_action( 'wp_ajax_update_messages', 'update_messages' );

?>