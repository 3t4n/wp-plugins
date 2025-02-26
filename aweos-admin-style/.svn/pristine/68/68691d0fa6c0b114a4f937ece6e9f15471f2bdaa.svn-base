<?php

if (!defined('ABSPATH')) exit;

add_action('admin_menu', 'awas_create_menu');

function awas_create_menu() {
	
	add_menu_page(
		'AWEOS Admin Style', 
		'Admin Style',
		'administrator', 
		"awas_main", 
		'awas_email_login_setting'
	);

	add_action( 'admin_init', 'awas_register_setting' );
}

function awas_register_setting() {
	register_setting( 'awas-group', 'awas-agreement' );
}

function awas_email_login_setting() {
?>
<div class="wrap">
	<h1>AWEOS E-Mail Login</h1>
	<p><?php _e("Welcome to the admin area from 'AWEOS Admin Style'"); ?></p>
	<p><?php _e("By checking the checkbox below, you agree to insert our 'Powered By attribution' on your /wp-admin area, with includes a logo and a button linking to our homepage 'aweos.de'"); ?></p>

	<form method="post" action="options.php">

	    <?php settings_fields( 'awas-group' ); ?>
	    <?php do_settings_sections( 'awas-group' ); ?>

	    <table class="form-table">
	    	<tr>
		        <td>
		        	<label>
		        		<input type="checkbox" name="awas-agreement" 
		        			   value="agreed" <?php echo get_option("awas-agreement") === "agreed" ? "checked" : "" ?>>
		        		<?php _e("I agree") ?>
		        	</label>
		        </td>
	    	</tr>
	    </table>
	    <?php submit_button(); ?>
	</form>
</div>
<?php } 