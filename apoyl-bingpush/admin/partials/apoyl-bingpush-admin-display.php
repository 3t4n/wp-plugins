<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package Apoyl_Bingpush
 * @subpackage Apoyl_Bingpush/admin/partials
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
$options_name = 'apoyl-bingpush-settings';
if (! empty($_POST['submit']) && check_admin_referer('apoyl-bingpush-settings', '_wpnonce')) {
    
    $arr_options = array(
        'site' => sanitize_text_field($_POST['site']),
        'secret' => sanitize_text_field($_POST['secret']),
    	'https' => isset( $_POST['https'] ) ? (int) sanitize_key($_POST['https']) : 0,
    	'autopush' => isset( $_POST['autopush'] ) ? (int) sanitize_key($_POST['autopush']) : 0,
        'indexnow' => isset( $_POST['indexnow'] ) ? (int) sanitize_key($_POST['indexnow']) : 0
    );

    
    $updateflag = update_option($options_name, $arr_options);
    $updateflag = true;
}
$arr = get_option($options_name);

?>
<?php if( !empty( $updateflag ) ) { echo '<div id="message" class="updated fade"><p>' . __('updatesuccess','apoyl-bingpush') . '</p></div>'; } ?>

<div class="wrap">
	<h2><?php _e('settings','apoyl-bingpush'); ?></h2>
	<p>
<?php _e('settings_desc','apoyl-bingpush'); ?>
</p>
	<form
		action="<?php echo admin_url('options-general.php?page=apoyl-bingpush-settings');?>"
		name="settings-apoyl-bingpush" method="post">
		<table class="form-table">
			<tbody>
				<tr>
					<th><label><?php _e('site','apoyl-bingpush'); ?></label></th>
					<td><input type="text" class="regular-text"
						value="<?php echo esc_attr($arr['site']); ?>" id="site" name="site">
						<p class="description"><?php _e('site_desc','apoyl-bingpush'); ?></p>
					</td>
				</tr>
				<tr>
					<th><label><?php _e('secret','apoyl-bingpush'); ?></label></th>
					<td><input type="text" class="regular-text"
						value="<?php echo esc_attr($arr['secret']); ?>" id="secret" name="secret">
						<p class="description"><?php _e('secret_desc','apoyl-bingpush'); ?></p>
					</td>
				</tr>
				<tr>
					<th><label><?php _e('https','apoyl-bingpush'); ?></label></th>
					<td><input type="checkbox" class="regular-text"
						value="1" id="https" name="https" <?php if($arr['https']) _e('checked="checked"'); ?>>
					<?php _e('https_desc','apoyl-bingpush'); ?>
					</td>
				</tr>
				<tr>
					<th><label><?php _e('autopush','apoyl-bingpush'); ?></label></th>
					<td><input type="checkbox" class="regular-text"
						value="1" id="autopush" name="autopush" <?php if($arr['autopush']) _e('checked="checked"'); ?>>
					<?php _e('autopush_desc','apoyl-bingpush'); ?>--<strong><?php _e('calldev_desc','apoyl-bingpush'); ?></strong>
					</td>
				</tr>
                <tr>
                    <th><label><?php _e('indexnow','apoyl-bingpush'); ?></label></th>
                    <td><input type="checkbox" class="regular-text"
                               value="1" id="indexnow" name="indexnow" <?php if(isset($arr['indexnow'])&&!empty($arr['indexnow'])) _e('checked="checked"'); ?>>
                        <?php _e('indexnow_desc','apoyl-bingpush'); ?>--<strong><?php _e('calldev_desc','apoyl-bingpush'); ?></strong>
                    </td>
                </tr>
            </tbody>
		</table>
            <?php
            wp_nonce_field("apoyl-bingpush-settings");
            submit_button();
            ?>
           
</form>
</div>