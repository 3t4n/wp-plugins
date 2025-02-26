<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package Apoyl_Videoctrl
 * @subpackage Apoyl_Videoctrl/admin/partials
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
if (! empty($_POST['submit']) && check_admin_referer('apoyl-videoctrl-settings', '_wpnonce')) {
    
    $arr_options = array(
    	'open' => isset ( $_POST ['open'] ) ? ( int ) sanitize_key ( $_POST ['open'] ) :  0,
    	'openvideo' => isset ( $_POST ['openvideo'] ) ? ( int ) sanitize_key ( $_POST ['openvideo'] ) :  0,
    	'openbilibili' => isset ( $_POST ['openbilibili'] ) ? ( int ) sanitize_key ( $_POST ['openbilibili'] ) :  0,
        'width' => sanitize_text_field(trim($_POST['width'])),
        'height' => sanitize_text_field($_POST['height'])
    );
    $updateflag = update_option($options_name, $arr_options);
}
$arr = get_option($options_name);

?>
    <?php if( !empty( $updateflag ) ) { echo '<div id="message" class="updated fade"><p>' . __('updatesuccess','apoyl-videoctrl') . '</p></div>'; } ?>

<div class="wrap">
	<h2><?php _e('settings','apoyl-videoctrl'); ?></h2>
	<p>
    <?php _e('settings_desc','apoyl-videoctrl'); ?>
    </p>
	<form
		action="<?php echo admin_url('options-general.php?page=apoyl-videoctrl-settings');?>"
		name="settings-apoyl-videoctrl" method="post">
		<table class="form-table">
			<tbody>

				<tr>
					<th><label><?php _e('open','apoyl-videoctrl'); ?></label></th>
					<td><input type="checkbox" class="regular-text" value="1" id="open"
						name="open" <?php checked( '1', $arr['open'] ); ?>>
    					<?php _e('open_desc','apoyl-videoctrl'); ?>
    					</td>
				</tr>

				<tr>
					<th><label><?php _e('openvideo','apoyl-videoctrl'); ?></label></th>
					<td><input type="checkbox" class="regular-text" value="1" id="openvideo"
						name="openvideo" <?php checked( '1', $arr['openvideo'] ); ?>>
    					<?php _e('openvideo_desc','apoyl-videoctrl'); ?>
    					</td>
				</tr>
				
				<tr>
					<th><label><?php _e('width','apoyl-videoctrl'); ?></label></th>
					<td><input type="text" class="regular-text"
						value="<?php echo esc_attr($arr['width']); ?>" id="width"
						name="width">
						<p class="description"><?php _e('width_desc','apoyl-videoctrl'); ?></p>
					</td>
				</tr>

				<tr>
					<th><label><?php _e('height','apoyl-videoctrl'); ?></label></th>
					<td><input type="text" class="regular-text"
						value="<?php echo esc_attr($arr['height']); ?>" id="width"
						name="height">
						<p class="description"><?php _e('height_desc','apoyl-videoctrl'); ?></p>
					</td>
				</tr>
				<tr>
					<th><label><?php _e('openbilibili','apoyl-videoctrl'); ?></label></th>
					<td><input type="checkbox" class="regular-text" value="1"
						id="openbilibili" name="openbilibili"
						<?php checked( '1', $arr['openbilibili'] ); ?>>
    					<?php _e('openbilibili_desc','apoyl-videoctrl'); ?>-<strong><?php _e('calldev_desc','apoyl-videoctrl'); ?></strong>
					</td>
				</tr>
				<tr>
					<td colspan="2">
    					<strong><?php _e('more_desc','apoyl-videoctrl'); ?></strong>
					</td>
				</tr>
			</tbody>
		</table>
                <?php
                wp_nonce_field("apoyl-videoctrl-settings");
                submit_button();
                ?>
               
    </form>
</div>