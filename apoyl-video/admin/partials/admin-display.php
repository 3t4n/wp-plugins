<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package Apoyl_Video
 * @subpackage Apoyl_Video/admin/partials
 * @author 凹凸曼 <3201361925@qq.com>
 *
 */
//error_reporting(0);
if (! empty($_POST['submit']) && check_admin_referer('apoyl-video-settings', '_wpnonce')) {
    
    $arr_options = array(
    	'open' =>isset( $_POST['open'] ) ? (int) sanitize_key($_POST['open']) : 0,
    	'openbilibili' => isset( $_POST['openbilibili'] ) ? (int) sanitize_key($_POST['openbilibili']) : 0,
    	'openyoutube' =>isset( $_POST['openyoutube'] ) ? (int) sanitize_key($_POST['openyoutube']) : 0,
    	'openyouku' =>isset( $_POST['openyouku'] ) ? (int) sanitize_key($_POST['openyouku']) : 0,
    	'openqq' =>isset( $_POST['openqq'] ) ? (int) sanitize_key($_POST['openqq']) : 0,
    	'openxigua' =>isset( $_POST['openxigua'] ) ? (int) sanitize_key($_POST['openxigua']) : 0,
        'width' => sanitize_text_field(trim($_POST['width'])),
        'height' => sanitize_text_field($_POST['height']),
        'stopurl' =>isset( $_POST['stopurl'] ) ? (int) sanitize_key($_POST['stopurl']) : 0,
    );
    $updateflag = update_option($options_name, $arr_options);
}
$arr = get_option($options_name);

?>
    <?php if( !empty( $updateflag ) ) { echo '<div id="message" class="updated fade"><p>' . __('updatesuccess','apoyl-video') . '</p></div>'; } ?>

<div class="wrap">
	<h2><?php _e('settings','apoyl-video'); ?></h2>
	<p>
    <?php _e('settings_desc','apoyl-video'); ?>
    </p>
	<form
		action="<?php echo admin_url('options-general.php?page=apoyl-video-settings');?>"
		name="settings-apoyl-video" method="post">
		<table class="form-table">
			<tbody>

				<tr>
					<th><label><?php _e('open','apoyl-video'); ?></label></th>
					<td><input type="checkbox" class="regular-text" value="1" id="open"
						name="open" <?php checked( '1', $arr['open'] ); ?>>
    					<?php _e('open_desc','apoyl-video'); ?>
    					</td>
				</tr>


				
				<tr>
					<th><label><?php _e('width','apoyl-video'); ?></label></th>
					<td><input type="text" class="regular-text"
						value="<?php echo esc_attr($arr['width']); ?>" id="width"
						name="width">
						<p class="description"><?php _e('width_desc','apoyl-video'); ?></p>
					</td>
				</tr>

				<tr>
					<th><label><?php _e('height','apoyl-video'); ?></label></th>
					<td><input type="text" class="regular-text"
						value="<?php echo esc_attr($arr['height']); ?>" id="width"
						name="height">
						<p class="description"><?php _e('height_desc','apoyl-video'); ?></p>
					</td>
				</tr>
				<tr>
					<th><label><?php _e('openbilibili','apoyl-video'); ?></label></th>
					<td><input type="checkbox" class="regular-text" value="1"
						id="openbilibili" name="openbilibili"
						<?php checked( '1', $arr['openbilibili'] ); ?>>
    					<?php _e('openbilibili_desc','apoyl-video'); ?>
					</td>
				</tr>
				<tr>
					<th><label><?php _e('stopurl','apoyl-video'); ?></label></th>
					<td><input type="checkbox" class="regular-text" value="1"
						id="stopurl" name="stopurl"
						<?php if(isset($arr['stopurl'])) checked( '1', $arr['stopurl'] ); ?>>
    					<?php _e('stopurl_desc','apoyl-video'); ?>--<strong><?php _e('calldev_desc','apoyl-video'); ?></strong>
					</td>
				</tr>
				<tr>
					<th><label><?php _e('openyouku','apoyl-video'); ?></label></th>
					<td><input type="checkbox" class="regular-text" value="1"
						id="openyouku" name="openyouku"
						<?php checked( '1', $arr['openyouku'] ); ?>>
    					<?php _e('openyouku_desc','apoyl-video'); ?>--<strong><?php _e('calldev_desc','apoyl-video'); ?></strong>
					</td>
				</tr>
				<tr>
					<th><label><?php _e('openyoutube','apoyl-video'); ?></label></th>
					<td><input type="checkbox" class="regular-text" value="1"
						id="openyoutube" name="openyoutube"
						<?php checked( '1', $arr['openyoutube'] ); ?>>
    					<?php _e('openyoutube_desc','apoyl-video'); ?>--<strong><?php _e('calldev_desc','apoyl-video'); ?></strong>
					</td>
				</tr>
				<tr>
					<th><label><?php _e('openqq','apoyl-video'); ?></label></th>
					<td><input type="checkbox" class="regular-text" value="1"
						id="openqq" name="openqq"
						<?php checked( '1', $arr['openqq'] ); ?>>
    					<?php _e('openqq_desc','apoyl-video'); ?>--<strong><?php _e('calldev_desc','apoyl-video'); ?></strong>
					</td>
				</tr>
				<tr>
					<th><label><?php _e('openxigua','apoyl-video'); ?></label></th>
					<td><input type="checkbox" class="regular-text" value="1"
						id="openxigua" name="openxigua"
						<?php checked( '1', $arr['openxigua'] ); ?>>
    					<?php _e('openxigua_desc','apoyl-video'); ?>--<strong><?php _e('calldev_desc','apoyl-video'); ?></strong>
					</td>
				</tr>
			</tbody>
		</table>
                <?php
                wp_nonce_field("apoyl-video-settings");
                submit_button();
                ?>
               
    </form>
</div>