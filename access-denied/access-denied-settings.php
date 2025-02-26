<?php	


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly








	if(empty($_POST['access_denied_hidden']))
		{
			$access_denied_ip_list = get_option( 'access_denied_ip_list' );
			$access_denied_ip_block = get_option( 'access_denied_ip_block' );			
			$access_denied_loginform_block = get_option( 'access_denied_loginform_block' );			
			

		}
	else
		{
					
				
		if($_POST['access_denied_hidden'] == 'Y') {
			//Form data sent

			$access_denied_ip_list = sanitize_text_field($_POST['access_denied_ip_list']);
			update_option('access_denied_ip_list', $access_denied_ip_list);
			
			if(!empty($_POST['access_denied_ip_block']))
				{
					$access_denied_ip_block = sanitize_text_field($_POST['access_denied_ip_block']);
				}
			else
				{
					$access_denied_ip_block = '';
				}
				
					update_option('access_denied_ip_block', $access_denied_ip_block);
				
				

			if(!empty($_POST['access_denied_loginform_block']))
				{
					$access_denied_loginform_block = sanitize_text_field($_POST['access_denied_loginform_block']);
				}
			else
				{
					$access_denied_loginform_block = '';
				}
				
					update_option('access_denied_loginform_block', $access_denied_loginform_block);	
					
				

			?>
			<div class="updated"><p><strong><?php _e('Changes Saved.' ); ?></strong></p></div>

			<?php
		} 
	}
?>





<div class="wrap">

	<div id="icon-tools" class="icon32"><br></div><?php echo "<h2>".__(access_denied_plugin_name.' Settings')."</h2>";?>
		<form   method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input  type="hidden" name="access_denied_hidden" value="Y">
        <?php settings_fields( 'access_denied_plugin_options' );
				do_settings_sections( 'access_denied_plugin_options' );
			
		?>
        
        
    
        
<table class="form-table">
	<tr valign="top">
        <td style="vertical-align:middle;">
        <strong>IP List</strong><br /><br /> 
    	<span style=" color:#22aa5d;font-size: 12px;">Separate by commas, no blank space, no new line, your current IP address <?php echo access_denied_get_client_ip(); ?><br /></span>
    	<span style=" color:#ff6630;font-size: 12px;">Atleast two IP address to get works this plugin.</span>        
        
        <br /><br />
		<textarea style="width:50%; min-height:100px;" placeholder="127.0.0.2,127.0.0.1" name="access_denied_ip_list" ><?php if(empty($access_denied_ip_list)) echo "";  else echo $access_denied_ip_list; ?></textarea>
        </td>

    </tr>
    
    
    
	<tr valign="top">
        <td style="vertical-align:middle;">
        <strong>Enable IP Block ?</strong><br /><br /> 
    	<span style=" color:#22aa5d;font-size: 12px;">Please confirm to enable ip blocking.</span>
        <br /><br />
        <input type="checkbox" name="access_denied_ip_block" id="access_denied_ip_block"  class="access_denied_ip_block" value="1" <?php if(!empty($access_denied_ip_block)) echo "checked"; ?>/>
        <label for="access_denied_ip_block">
        <?php if(!empty($access_denied_ip_block)) echo "Enabled"; else echo 'Disabled'; ?>
        
        </label>
       
        </td>

    </tr>    
    
    
    
    
	<tr valign="top">
        <td style="vertical-align:middle;">
        <strong>Enable Login Form Block ?</strong><br /><br /> 
    	<span style=" color:#22aa5d;font-size: 12px;">Please confirm to login form blocking, By enabling login form block will disabled login form submission. please try visit from another broswer <a href="<?php echo wp_login_url(); ?>" title="Login">Login</a> where you not logged-in.</span>
        <br /><br />
        <input type="checkbox" name="access_denied_loginform_block" id="access_denied_loginform_block"  class="access_denied_loginform_block" value="1" <?php if(!empty($access_denied_loginform_block)) echo "checked"; ?>/>
        <label for="access_denied_loginform_block">
        <?php if(!empty($access_denied_loginform_block)) echo "Enabled"; else echo 'Disabled'; ?>
        
        </label>
       
        </td>

    </tr>    
    
    
    
    
</table>






<p class="submit">
                    <input class="button button-primary" type="submit" name="Submit" value="<?php _e('Save Changes' ) ?>" />
                </p>
		</form>


</div>
