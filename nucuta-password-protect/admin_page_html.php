
<?php if ( ! defined( 'ABSPATH' ) ) exit; // make sure index.php is called and ABSPATH is set ?>

<div class="wrap">
    <h2><?php esc_html_e(' Password Protect Wordpress Site '); ?></h2>
     
    <form name="nucuta_form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
	
	<?php wp_nonce_field('nucuta_admin_submit','nucuta_admin_hash'); ?>
	
	<input type='hidden' name='nucutaHidden' value='Clicked' />
	<br/>
		<fieldset>
			<legend><b>Protection</b></legend>
			
			<p><input type='checkbox' name='nucutaProtectSite' value='enabled' <?php if(get_option('nucutaProtectSite') === 'checked')esc_attr_e('checked=\'checked\''); ?> /> <?php esc_html_e('Enable Password Protection to Whole Site') ?></p>
			
			<table border='0'>
			<tr>
				<td class='passLabletd'>Password</td>
				<td><input class='passwordbox' type='password' name='nucutaCustomPassword' minlength='6' /></td>
			</tr>
			
			<tr>
				<td class='passLabletd'>Confirm</td>
				<td><input class='passwordbox' type='password' name='nucutaCustomPasswordConfirm'  minlength='6'  /></td>
			</tr>
			</table>

			
			<p><b><?php esc_html_e('Excluding User Groups') ?></b></p>
			<p>
				<input type='checkbox' name='nucutaEditor' value='enabled' <?php if(get_option('nucutaEditor') === 'checked')esc_attr_e('checked=\'checked\''); ?> /> <?php esc_html_e('Editor') ?>
				<input type='checkbox' name='nucutaAuthor' value='enabled' <?php if(get_option('nucutaAuthor') === 'checked')esc_attr_e('checked=\'checked\''); ?> /> <?php esc_html_e('Author') ?>
				<input type='checkbox' name='nucutaContributor' value='enabled' <?php if(get_option('nucutaContributor') === 'checked')esc_attr_e('checked=\'checked\''); ?> /> <?php esc_html_e('Contributor') ?>
				<input type='checkbox' name='nucutaSubscriber' value='enabled' <?php if(get_option('nucutaSubscriber') === 'checked')esc_attr_e('checked=\'checked\''); ?> /> <?php esc_html_e('Subscriber') ?>
			</p>
			<p><b>Custom Message</b></p>
			<textarea rows='10' name='nucutaCustomMessage'><?php _e(esc_textarea(get_option('nucutaCustomMessage'))) ?></textarea>
			<br/><br/>
			<div name='PasswordStateMessage'> <b> <?php esc_html_e($GLOBALS[pass]) ?> </b></div>
			<br/>
		</fieldset>		
        <p class="submit">
        <input class='button-primary' type="submit" name="Submit" value="<?php esc_attr_e('Apply Changes' ) ?>" id='submitbutton' />
		<input class='' type='button' value='Documentation and Help' name="Documentation" onclick="location.href='https://nucuta.com/how-to-password-protect-wordpress-site/';" /> 
        </p>
    </form>
	
	<a href='https://www.patreon.com/NUCUTA' target='_blank'><img id='nucuta_patreon_image' src='<?php esc_attr_e(esc_url(get_option('nucuta_pp_url'))); ?>' /></a>
</div>

<!--------------- CSS ------------------------------------------------------>
	<style type="text/css">
	.wrap fieldset 
	{
		font-size:16px;
		border: 1px;
		display: block;
		margin-left: 2px;
		margin-right: 2px;
		padding-top: 0.35em;
		padding-bottom: 0.625em;
		padding-left: 0.75em;
		padding-right: 0.75em;
		border-style: dotted;
	}
	
	.wrap textarea{
		max-width:25em;
		width:100%;
	}
	
	.wrap table {
		max-width:22em;
		width:100%;
	}
	
	.passLabletd{
		width:4.5em;
	}
	
	.wrap .passwordbox{
		width:100%;
		
	}
	
	.wrap p{
		font-size:16px;
	}
	
	.wrap #nucuta_patreon_image
	{
		max-width:25em;
		width:100%;
	}
	
	</style>