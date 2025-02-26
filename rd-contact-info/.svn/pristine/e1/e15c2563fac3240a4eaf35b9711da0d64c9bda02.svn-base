<?php
/**
 * Saves the current entries if the for was previously submitted, then displays the form again with the current information displayed in the appropriate fields
 */
if ($_POST['rd_contact_hidden'] == 'Y') // Form was previously submitted.
	{
		if ( function_exists( 'check_admin_referer' ) )
			check_admin_referer( 'rdcontactinfo-editcontactinfo' );
			
		$rdContactOverride = ( isset( $_POST['rdContactOverride'] ) )? '1' : '0';
		update_option( 'rdContactOverride', $rdContactOverride );
		$rdContactOverride = ( isset( $_POST['rdContactOverride'] ) )? 'checked' : '';
		
		$rdContactName = $_POST['rdContactName'];
		update_option('rdContactName', $rdContactName);
		
		$rdContactPhone = $_POST['rdContactPhone'];
		update_option('rdContactPhone', $rdContactPhone);
		
		$rdContactMobile = $_POST['rdContactMobile'];
		update_option('rdContactMobile', $rdContactMobile);
		
		$rdContactFax = $_POST['rdContactFax'];
		update_option('rdContactFax', $rdContactFax);
		
		$rdContactEmail = $_POST['rdContactEmail'];
		update_option('rdContactEmail', $rdContactEmail);
		
		$rdContactStreet = $_POST['rdContactStreet'];
		update_option('rdContactStreet', $rdContactStreet);
		
		$rdContactCity = $_POST['rdContactCity'];
		update_option('rdContactCity', $rdContactCity);
		
		$rdContactState = $_POST['rdContactState'];
		update_option('rdContactState', $rdContactState);
		
		$rdContactZip = $_POST['rdContactZip'];
		update_option('rdContactZip', $rdContactZip);
		
		$rdShowContactName = (isset($_POST['rdShowContactName']))? '1' : '0';
		update_option('rdShowContactName', $rdShowContactName);
		$rdShowContactName = (isset($_POST['rdShowContactName']))? 'checked' : '';
		
		$rdShowContactPhone = (isset($_POST['rdShowContactPhone']))? '1' : '0';
		update_option('rdShowContactPhone', $rdShowContactPhone);
		$rdShowContactPhone = (isset($_POST['rdShowContactPhone']))? 'checked' : '';
		
		$rdShowContactMobile = (isset($_POST['rdShowContactMobile']))? '1' : '0';
		update_option('rdShowContactMobile', $rdShowContactMobile);
		$rdShowContactMobile = (isset($_POST['rdShowContactMobile']))? 'checked' : '';
		
		$rdShowContactFax = (isset($_POST['rdShowContactFax']))? '1' : '0';
		update_option('rdShowContactFax', $rdShowContactFax);
		$rdShowContactFax = (isset($_POST['rdShowContactFax']))? 'checked' : '';
		
		$rdShowContactEmail = (isset($_POST['rdShowContactEmail']))? '1' : '0';
		update_option('rdShowContactEmail', $rdShowContactEmail);
		$rdShowContactEmail = (isset($_POST['rdShowContactEmail']))? 'checked' : '';
		
		$rdShowContactAddress = (isset($_POST['rdShowContactAddress']))? '1' : '0';
		update_option('rdShowContactAddress', $rdShowContactAddress);
		$rdShowContactAddress = (isset($_POST['rdShowContactAddress']))? 'checked' : '';
		?>  
         <div class="updated"><p><strong><?php _e('Contact information saved.' ); ?></strong></p></div>  
         <?php 
	}
	else // First time the page is displayed.
	{
		$rdContactOverride	= ( get_option( 'rdContactOverride' ) == '1')? 'checked' : '';
		
		$rdContactName 	= get_option('rdContactName');
		$rdContactPhone	= get_option('rdContactPhone');
		$rdContactMobile	= get_option('rdContactMobile');
		$rdContactFax			= get_option('rdContactFax');
		$rdContactEmail		= get_option('rdContactEmail');
		$rdContactStreet	= get_option('rdContactStreet');
		$rdContactCity		= get_option('rdContactCity');
		$rdContactState		= get_option('rdContactState');
		$rdContactZip			= get_option('rdContactZip');
		
		$rdShowContactName		= (get_option('rdShowContactName') == '1')? 'checked' : '';
		$rdShowContactPhone		= (get_option('rdShowContactPhone') == '1')? 'checked' : '';
		$rdShowContactMobile		= (get_option('rdShowContactMobile') == '1')? 'checked' : '';
		$rdShowContactFax			= (get_option('rdShowContactFax') == '1')? 'checked' : '';
		$rdShowContactEmail			= (get_option('rdShowContactEmail') == '1')? 'checked' : '';
		$rdShowContactAddress		= (get_option('rdShowContactAddress') == '1')? 'checked' : '';
	}
?>

<div class="wrap">
	<?php echo '<h2>'.__('Edit Contact Information').'</h2>'; ?>
    <form name="rd_contact_form" method="post" action="<?php echo str_replace('%7E', '~', $_SERVER['REQUEST_URI']); ?>">
    	<?php
			if ( function_exists( 'wp_nonce_field' ) )
				wp_nonce_field( 'rdcontactinfo-editcontactinfo' );
		?>
    	<input type="hidden" name="rd_contact_hidden" value="Y" />
        
        <?php echo '<h4>'.__('Shortcode Settings').'</h4>'; ?>
		<table><!-- Allow Override -->
			<tr>
				<td>
					<?php echo _e( 'Allow shortcodes to override "Show" option' ); ?>
				</td>
				<td>
					<input type="checkbox" name="rdContactOverride" <?php echo $rdContactOverride; ?> />
				</td>
			</tr>
		</table>
		<hr />
		
        <?php echo '<h4>'.__('Contact Information').'</h4>'; ?>
        <table><!-- Contact Information Entries -->
        	<tr>
            	<td>
                	<?php echo _e('Contact Name: '); ?>
                </td>
                <td>
                	<input type="text" name="rdContactName" value="<?php echo $rdContactName; ?>" size="20" />
                </td>
                <td>
                	<input type="checkbox" name="rdShowContactName" <?php echo $rdShowContactName; ?>/> <?php echo _e('Show Contact Name'); ?>
                </td>
            </tr>
            <tr>
            	<td>
                	<?php echo _e('Phone: '); ?>
                </td>
                <td>
                	<input type="text" name="rdContactPhone" value="<?php echo $rdContactPhone; ?>" size="20" />
                </td>
                <td>
                	<input type="checkbox" name="rdShowContactPhone" <?php echo $rdShowContactPhone; ?>/><?php echo _e('Show Phone Number'); ?>
                </td>
            </tr>
            <tr>
            	<td>
                	<?php echo _e('Mobile: '); ?>
                </td>
                <td>
                	<input type="text" name="rdContactMobile" value="<?php echo $rdContactMobile; ?>" size="20" />
                </td>
                <td>
                	<input type="checkbox" name="rdShowContactMobile" <?php echo $rdShowContactMobile; ?>/><?php echo _e('Show Mobile Number'); ?>
                </td>
            </tr>
            <tr>
            	<td>
                	<?php echo _e('Fax: '); ?>
                </td>
                <td>
                	<input type="text" name="rdContactFax" value="<?php echo $rdContactFax; ?>" size="20" />
                </td>
                <td>
                	<input type="checkbox" name="rdShowContactFax" <?php echo $rdShowContactFax; ?>/><?php echo _e('Show Fax Number'); ?>
                </td>
            </tr>
            <tr>
            	<td>
                	<?php echo _e('Email: '); ?>
                </td>
                <td>
                	<input type="text" name="rdContactEmail" value="<?php echo $rdContactEmail; ?>" size="20" />
                </td>
                <td>
                	<input type="checkbox" name="rdShowContactEmail" <?php echo $rdShowContactEmail; ?>/><?php echo _e('Show Email Address'); ?>
                </td>
             </tr>
        </table>
        <hr />
        <?php echo '<h4>'.__('Street Address').'</h4>' ?>
        <input type="checkbox" name="rdShowContactAddress" <?php echo $rdShowContactAddress; ?>/><?php echo _e('Show Address'); ?>
        <table><!-- Address Infromation fields -->
        	<tr>
            	<td>
                	<?php echo _e('Street Address: '); ?>
                </td>
                <td>
                	<input type="text" name="rdContactStreet" value="<?php echo $rdContactStreet; ?>" size="50" />
                </td>
            </tr>
            <tr>
            	<td>
                	<?php echo _e('City: '); ?>
                </td>
                <td>
                	<input type="text" name="rdContactCity" value="<?php echo $rdContactCity; ?>" size="20" />
                </td>
            </tr>
            <tr>
            	<td>
                	<?php echo _e('State: '); ?>
                </td>
                <td>
                	<input type="text" name="rdContactState" value="<?php echo $rdContactState; ?>" size="5" />
                </td>
            </tr>
            <tr>
            	<td>
                	<?php echo _e('Zip: '); ?>
                </td>
                <td>
                	<input type="text" name="rdContactZip" value="<?php echo $rdContactZip; ?>" size="15" />
                </td>
            </tr>
        </table>
        <p class="submit">
        	<input type="submit" value="<?php _e('Save Contact Info'); ?>" />
        </p>
    </form>
</div>
<br /><br />
<hr />
If you find this plugin useful, please consider making a donation to its continued development. Thank you.<br />
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="PM99FQRRFCVXU">
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
