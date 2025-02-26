<?php if ( ! defined( 'ABSPATH' ) ) exit; // make sure index.php is called and ABSPATH is set ?>

	<form name="nucuta_passtyped_form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
	
	<?php wp_nonce_field('nucuta_login','nucuta_input_hash'); ?>
	
	<input type='hidden' name='loginHiddenPassword' value='clicked' />
	<br/>
		<fieldset>
			<legend><b>Restricted Area</b></legend>
			
			<p>Password <input type='password' name='nucutaCustomPassword' minlength='6' /></p>
		</fieldset>		
        <p class="submit">
        <input class='button-primary' type="submit" name="Submit" value="<?php esc_attr_e('Log in' ) ?>" id='submitbutton' />
        </p>
    </form>