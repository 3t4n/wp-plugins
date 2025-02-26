 

<div class="wrap">
<form method="post">
	
<h2>Aweber Options</h2>
<?php
		if ( $_REQUEST['save'] ) {

            // Antique code...?
			// check_admin_referer('forcefetch-campaign_'.$cid);
			
			$this->formid = $_REQUEST['formid'];
			$this->unit = $_REQUEST['unit'];
			$this->adtracking = $_REQUEST['adtracking'];
			
			$this->alreadysubscribed = $_REQUEST['alreadysubscribed'];		
			$this->subscribe = $_REQUEST['subscribe'];
			$this->registration_greeting = htmlspecialchars($_REQUEST['registration_greeting']);

			$actions = array();			
			foreach ( $this->post as $act => $enabled ) {				
				$this->post[$act] = ($_REQUEST['post'][$act] == '1');
				if ( $this->post[$act] ) {
					$actions[] = $act;
				}
			}
			
			$this->defaultterms = array();
			
			if ( $_REQUEST['defaultterms'] ) {
				foreach ( $_REQUEST['defaultterms'] as $k => $v ) {
					if ( $v == '1' ) {
						$this->defaultterms[$k] = true;
					}
				}
			}
			
			update_option('awss_formid', $this->formid);
			update_option('awss_adtracking', $this->adtracking);
			update_option('awss_unit', $this->unit);
			update_option('awss_actions', implode(',', $actions));
			update_option('awss_subscribe',$this->subscribe);
			update_option('awss_alreadysubscribed',$this->alreadysubscribed);
			update_option('awss_registration_greeting',$this->registration_greeting);
			update_option('awss_defaultterms', implode(',', array_keys($this->defaultterms)));

			if ( !empty($_POST ) ) : ?>
<div id="message" class="updated fade"><p><strong><?php _e('Options saved.') ?></strong></p></div>
<?php

			endif;
		}
		wp_nonce_field('awebersave');
?>


<fieldset style="margin-left: 3em; margin-right: 3em; background-color: white;">
<legend>AWeber List Information</legend>
<table>
<tr>
<td><b>AWeber Web Form Id:</b></td>
<td><input type="text" name="formid" value="<?php echo $this->formid ?>" /></td>
</tr>

<tr>
<td><b>AWeber List Name (unit):</b></td>
<td><input type="text" name="unit" value="<?php echo $this->unit ?>" /></td>
</tr>

<tr>
<td><b>AWeber Ad Tracking:</b></td>
<td><input type="text" name="adtracking" value="<?php echo $this->adtracking ?>" /></td>
</tr>

<tr>
<td><b>Already Subscribed URL:</b></td>
<td><input type="text" size="60" name="alreadysubscribed" value="<?php echo get_option('awss_alreadysubscribed'); ?>" /></td>
</tr>

</table>

</fieldset>

    <p>
	<input type="checkbox" name="subscribe" value="1"<?php if ($this->subscribe) { ?> checked="checked" <?php } ?> /> Subscribe on registration<br />
    <input type="checkbox" name="defaultterms[greeting]" value="1" <?php if ( $this->defaultterms['greeting'] ) { ?> checked="checked"<?php } ?> /> Checked initially</p>
    </p>

<p>Registration Greeting:<br />
<textarea name="registration_greeting" cols="60" rows="2"><?php echo $this->registration_greeting ?></textarea><br />

<p class="submit"><input type="submit" name="save" value="Save Options &raquo;" /></p>

</form>
</div>


