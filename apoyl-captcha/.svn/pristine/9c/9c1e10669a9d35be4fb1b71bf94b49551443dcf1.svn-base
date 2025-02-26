<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package APOYL_CAPTCHA
 * @subpackage APOYL_CAPTCHA/admin/partials
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) exit; 

if (! empty($_POST['submit']) && check_admin_referer($options_name, '_wpnonce')) {
	
		isset($_POST['open'])?$open=(int)sanitize_key($_POST['open']):$open=0;
		isset($_POST['openreg'])?$openreg=(int)sanitize_key($_POST['openreg']):$openreg=0;
		isset($_POST['openlogin'])?$openlogin=(int)sanitize_key($_POST['openlogin']):$openlogin=0;
        $arr_options = array(
        		'open'=>$open,
        		'openreg' => $openreg,
        		'openlogin' => $openlogin
        );
   
        $updateflag = update_option($options_name, $arr_options);
        $updateflag = true;
    }
    $arr = get_option($options_name);
    
    ?>
    <?php if( !empty( $updateflag ) ) { echo '<div id="message" class="updated fade"><p>' . __('updatesuccess','apoyl-captcha') . '</p></div>'; } ?>
    
    <div class="wrap">
    
<?php   require_once APOYL_CAPTCHA_DIR . 'admin/partials/nav.php';?>
    </p>
    	<form
    		action="<?php echo admin_url('options-general.php?page=apoyl-captcha-settings');?>"
    		name="settings-apoyl-captcha" method="post">
    		<table class="form-table">
    			<tbody>
    				<tr>
    					<th><label><?php _e('open','apoyl-captcha'); ?></label></th>
    					<td><input type="checkbox" class="regular-text"
    						value="1" id="open" name="open" <?php checked( '1', $arr['open'] ); ?> >
    					<?php _e('open_desc','apoyl-captcha'); ?>
    					</td>
    				</tr>
     				<tr>
    					<th><label><?php _e('openreg','apoyl-captcha'); ?></label></th>
    					<td><input type="checkbox" class="regular-text"
    						value="1" id="openreg" name="openreg" <?php checked( '1', $arr['openreg'] ); ?> >
    					<?php _e('openreg_desc','apoyl-captcha'); ?>
    					</td>
    				</tr>
     				<tr>
    					<th><label><?php _e('openlogin','apoyl-captcha'); ?></label></th>
    					<td><input type="checkbox" class="regular-text"
    						value="1" id="openlogin" name="openlogin" <?php checked( '1', $arr['openlogin'] ); ?> >
    					<?php _e('openlogin_desc','apoyl-captcha'); ?>--<?php _e('calldev_desc','apoyl-captcha'); ?>
    					</td>
    				</tr>    				
    			</tbody>
    		</table>
                <?php
                wp_nonce_field("apoyl-captcha-settings");
                submit_button();
                ?>
               
    </form>
    </div>