<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package APOYL_IP
 * @subpackage APOYL_IP/admin/partials
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
if (! empty($_POST['submit']) && check_admin_referer($options_name, '_wpnonce')) {
    
    $arr_options = array(
    	'open' => isset ( $_POST ['open'] ) ? ( int ) sanitize_key ( $_POST ['open'] ) :  0,
    	'openip' => isset ( $_POST ['openip'] ) ? ( int ) sanitize_key ( $_POST ['openip'] ) :  0,
    	'openiplocation' => isset ( $_POST ['openiplocation'] ) ? ( int ) sanitize_key ( $_POST ['openiplocation'] ) :  0,
    	'opencommentiplocation'=>isset ( $_POST ['opencommentiplocation'] ) ? ( int ) sanitize_key ( $_POST ['opencommentiplocation'] ) :  0,
        'ipname' => sanitize_text_field($_POST['ipname']),
        'accesskey' => sanitize_text_field($_POST['accesskey']),
        'secretkey' => sanitize_text_field($_POST['secretkey'])
    )
    ;
    
    $updateflag = update_option($options_name, $arr_options);
    $updateflag = true;
}
$arr = get_option($options_name);

?>
    <?php if( !empty( $updateflag ) ) { echo '<div id="message" class="updated fade"><p>' . __('updatesuccess','apoyl-ip') . '</p></div>'; } ?>

<div class="wrap">
    
<?php   require_once APOYL_IP_DIR . 'admin/partials/nav.php';?>
    </p>
	<form
		action="<?php echo admin_url('options-general.php?page=apoyl-ip-settings');?>"
		name="settings-apoyl-ip" method="post">
		<table class="form-table">
			<tbody>
				<tr>
					<th><label><?php _e('open','apoyl-ip'); ?></label></th>
					<td><input type="checkbox" class="regular-text" value="1" id="open"
						name="open" <?php checked( '1', $arr['open'] ); ?>>
    					<?php _e('open_desc','apoyl-ip'); ?>
    					</td>
				</tr>
				<tr>
					<th><label><?php _e('openip','apoyl-ip'); ?></label></th>
					<td><input type="checkbox" class="regular-text" value="1"
						id="openip" name="openip" <?php checked( '1', $arr['openip'] ); ?>>
    					<?php _e('openip_desc','apoyl-ip'); ?>
                    </td>

				</tr>

				<tr>
					<th><label><?php _e('ipname','apoyl-ip'); ?></label></th>
					<td><input type="text" class="regular-text"
						value="<?php echo esc_attr($arr['ipname']); ?>" id="ipname"
						name="ipname">
						<p class="description"><?php _e('ipname_desc','apoyl-ip'); ?></p>
					</td>
				</tr>
				<tr>
					<th><label><?php _e('accesskey','apoyl-ip'); ?></label></th>
					<td><input type="text" class="regular-text" value="<?php echo esc_attr($arr['accesskey']); ?>"
						id="accesskey" name="accesskey" >
    					<?php _e('accesskey_desc','apoyl-ip'); ?>
					</td>

				</tr>
				<tr>
					<th><label><?php _e('secretkey','apoyl-ip'); ?></label></th>
					<td><input type="text" class="regular-text" value="<?php echo esc_attr($arr['secretkey']); ?>"
						id="secretkey" name="secretkey" >
    					<?php _e('secretkey_desc','apoyl-ip'); ?>
					</td>

				</tr>
				<tr>
					<th><label><?php _e('openiplocation','apoyl-ip'); ?></label></th>
					<td><input type="checkbox" class="regular-text" value="1"
						id="openiplocation" name="openiplocation"
						<?php checked( '1', $arr['openiplocation'] ); ?>>
    					<?php _e('openiplocation_desc','apoyl-ip'); ?>--<strong><?php _e('calldev_desc','apoyl-ip'); ?></strong>
					</td>

				</tr>
				<tr>
					<th><label><?php _e('opencommentiplocation','apoyl-ip'); ?></label></th>
					<td><input type="checkbox" class="regular-text" value="1"
						id="opencommentiplocation" name="opencommentiplocation"
						<?php checked( '1', $arr['opencommentiplocation'] ); ?>>
    					<?php _e('opencommentiplocation_desc','apoyl-ip'); ?>--<strong><?php _e('calldev_desc','apoyl-ip'); ?></strong>
					</td>

				</tr>


			</tbody>
		</table>
                <?php
                wp_nonce_field("apoyl-ip-settings");
                submit_button();
                ?>
               
    </form>
</div>