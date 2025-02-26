<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package APOYL_TENCENTCOS
 * @subpackage APOYL_TENCENTCOS/admin/partials
 * @author 凹凸曼 <3201361925@qq.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if (! empty($_POST['submit']) && check_admin_referer('apoyl-tencentcos-settings', '_wpnonce')) {
    
    $arr_options = array(
    	'open' => isset ( $_POST ['open'] ) ? ( int ) sanitize_key ( $_POST ['open'] ) :  0,
        'accessid' =>  sanitize_text_field($_POST['accessid']),
        'secretkey' =>  sanitize_text_field($_POST['secretkey']),
        'region' =>  sanitize_text_field($_POST['region']),
        'bucket' =>  sanitize_text_field($_POST['bucket']),
    	'openauto' => isset ( $_POST ['openauto'] ) ? ( int ) sanitize_key ( $_POST ['openauto'] ) :  0,
        
        'domain' =>  sanitize_text_field($_POST['domain']),
    	'openchgcos' => isset ( $_POST ['openchgcos'] ) ? ( int ) sanitize_key ( $_POST ['openchgcos'] ) :  0,
    	'opensmall' => isset ( $_POST ['opensmall'] ) ? ( int ) sanitize_key ( $_POST ['opensmall'] ) :  0,
    	'opendebug' => isset ( $_POST ['opendebug'] ) ? ( int ) sanitize_key ( $_POST ['opendebug'] ) :  0,

    );
    
    $updateflag = update_option($options_name, $arr_options);
    $updateflag = true;
}
$arr = get_option($options_name);

?>
    <?php if( !empty( $updateflag ) ) { echo '<div id="message" class="updated fade"><p>' . __('updatesuccess','apoyl-tencentcos') . '</p></div>'; } ?>

<div class="wrap">
<?php   require_once APOYL_TENCENTCOS_DIR . 'admin/partials/nav.php';?>
	<form
		action="<?php echo admin_url('options-general.php?page=apoyl-tencentcos-settings');?>"
		name="settings-apoyl-tencentcos" method="post">
		<table class="form-table">
			<tbody>
				<tr>
					<th><label><?php _e('open','apoyl-tencentcos'); ?></label></th>
					<td><input type="checkbox" class="regular-text" value="1" id="open"
						name="open" <?php checked( '1', $arr['open'] ); ?>>
    					<?php _e('open_desc','apoyl-tencentcos'); ?>
    					</td>
				</tr>
				<tr>
					<th><label><?php _e('accessid','apoyl-tencentcos'); ?></label></th>
					<td><input type="text" class="regular-text" value="<?php echo esc_attr($arr['accessid'])?>" id="accessid"
						name="accessid" >
    					<?php _e('accessid_desc','apoyl-tencentcos'); ?>
    					</td>
				</tr>
				<tr>
					<th><label><?php _e('secretkey','apoyl-tencentcos'); ?></label></th>
					<td><input type="text" class="regular-text" value="<?php echo esc_attr($arr['secretkey'])?>" id="secretkey"
						name="secretkey" >
    					<?php _e('secretkey_desc','apoyl-tencentcos'); ?>
    					</td>
				</tr>
				<tr>
					<th><label><?php _e('region','apoyl-tencentcos'); ?></label></th>
					<td><input type="text" class="regular-text" value="<?php echo esc_attr($arr['region'])?>" id="region"
						name="region" >
    					<?php _e('region_desc','apoyl-tencentcos'); ?>
    					</td>
				</tr>
				<tr>
					<th><label><?php _e('bucket','apoyl-tencentcos'); ?></label></th>
					<td><input type="text" class="regular-text" value="<?php echo esc_attr($arr['bucket'])?>" id="bucket"
						name="bucket" >
    					<?php _e('bucket_desc','apoyl-tencentcos'); ?>
    					</td>
				</tr>
				<tr>
					<th><label><?php _e('openauto','apoyl-tencentcos'); ?></label></th>
					<td><input type="checkbox" class="regular-text" value="1" id="openauto"
						name="openauto" <?php checked( '1', $arr['openauto'] ); ?>>
    					<?php _e('openauto_desc','apoyl-tencentcos'); ?>--<strong><?php _e('calldev_desc','apoyl-tencentcos'); ?></strong>
    					</td>
				</tr>
				<tr>
					<th><label><?php _e('domain','apoyl-tencentcos'); ?></label></th>
					<td><input type="text" class="regular-text" value="<?php echo esc_attr($arr['domain'])?>" id="domain"
						name="domain" >
    					<?php _e('domain_desc','apoyl-tencentcos'); ?>--<strong><?php _e('calldev_desc','apoyl-tencentcos'); ?></strong>
    					</td>
				</tr>
				<tr>
					<th><label><?php _e('openchgcos','apoyl-tencentcos'); ?></label></th>
					<td><input type="checkbox" class="regular-text" value="1" id="openchgcos"
						name="openchgcos" <?php checked( '1', $arr['openchgcos'] ); ?>>
    					<?php _e('openchgcos_desc','apoyl-tencentcos'); ?>--<strong><?php _e('calldev_desc','apoyl-tencentcos'); ?></strong>
    					</td>
				</tr>
				<tr>
					<th><label><?php _e('opensmall','apoyl-tencentcos'); ?></label></th>
					<td><input type="checkbox" class="regular-text" value="1"
						id="opensmall" name="opensmall"
						<?php if(isset($arr['opensmall'])) checked( '1', $arr['opensmall'] ); ?>>
    					<?php _e('opensmall_desc','apoyl-tencentcos'); ?>--<strong><?php _e('calldev_desc','apoyl-tencentcos'); ?></strong>
					</td>
				</tr>
				<tr>
					<th><label><?php _e('opendebug','apoyl-tencentcos'); ?></label></th>
					<td><input type="checkbox" class="regular-text" value="1" id="opendebug"
						name="opendebug" <?php checked( '1', $arr['opendebug'] ); ?>>
    					<?php _e('opendebug_desc','apoyl-tencentcos'); ?>
    					</td>
				</tr>														
			</tbody>
		</table>
                <?php
                wp_nonce_field("apoyl-tencentcos-settings");
                submit_button();
                ?>
               
    </form>
</div>