<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package APOYL_TENCENTVIDEO
 * @subpackage APOYL_TENCENTVIDEO/admin/partials
 * @author 凹凸曼 <3201361925@qq.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
if (! empty($_POST['submit']) && check_admin_referer('apoyl-tencentvideo-settings', '_wpnonce')) {
    
    $arr_options = array(
    	'open' => isset ( $_POST ['open'] ) ? ( int ) sanitize_key ( $_POST ['open'] ) :  0,
        'accessid' => sanitize_text_field($_POST['accessid']),
        'secretkey' => sanitize_text_field($_POST['secretkey']),
        'region' => sanitize_text_field($_POST['region']),
    	'openauto' => isset ( $_POST ['openauto'] ) ? ( int ) sanitize_key ( $_POST ['openauto'] ) :  0,
        'width' => sanitize_text_field($_POST['width']),
        'height' => sanitize_text_field($_POST['height']),
        'openmd5' => isset ( $_POST ['openmd5'] ) ? ( int ) sanitize_key ( $_POST ['openmd5'] ) :  0,
        'opensign' =>sanitize_text_field($_POST['opensign']),
    );
    
    $updateflag = update_option($options_name, $arr_options);
    $updateflag = true;
}
$arr = get_option($options_name);

?>
<?php if( !empty( $updateflag ) ) { ?>
    <div id="message" class="updated fade">
        <p><?php esc_html_e('updatesuccess', 'apoyl-tencentvideo'); ?></p>
    </div>
<?php } ?>

<div class="wrap">
<?php   require_once APOYL_TENCENTVIDEO_DIR . 'admin/partials/nav.php';?>
	<form
		action="<?php echo admin_url('options-general.php?page=apoyl-tencentvideo-settings');?>"
		name="settings-apoyl-tencentvideo" method="post">
		<table class="form-table">
			<tbody>
				<tr>
					<th><label><?php esc_html_e('open','apoyl-tencentvideo'); ?></label></th>
					<td><input type="checkbox" class="regular-text" value="1" id="open"
						name="open" <?php checked( '1', $arr['open'] ); ?>>
    					<?php esc_html_e('open_desc','apoyl-tencentvideo'); ?>
    					</td>
				</tr>
				<tr>
					<th><label><?php esc_html_e('accessid','apoyl-tencentvideo'); ?></label></th>
					<td><input type="text" class="regular-text"
						value="<?php echo esc_attr($arr['accessid'])?>" id="accessid"
						name="accessid">
    					<?php _e('accessid_desc','apoyl-tencentvideo'); ?>
    					</td>
				</tr>
				<tr>
					<th><label><?php esc_html_e('secretkey','apoyl-tencentvideo'); ?></label></th>
					<td><input type="text" class="regular-text"
						value="<?php echo esc_attr($arr['secretkey'])?>" id="secretkey"
						name="secretkey">
    					<?php _e('secretkey_desc','apoyl-tencentvideo'); ?>
    					</td>
				</tr>
				<tr>
					<th><label><?php esc_html_e('region','apoyl-tencentvideo'); ?></label></th>
					<td><select name="region" id="region">
						<?php $this->region_select($arr['region']);?>
						</select>
    					<?php esc_html_e('region_desc','apoyl-tencentvideo'); ?>
    					</td>
				</tr>

				<tr>
					<th><label><?php esc_html_e('openauto','apoyl-tencentvideo'); ?></label></th>
					<td><input type="checkbox" class="regular-text" value="1"
						id="openauto" name="openauto"
						<?php checked( '1', $arr['openauto'] ); ?>>
    					<?php esc_html_e('openauto_desc','apoyl-tencentvideo'); ?>--<strong><?php _e('calldev_desc','apoyl-tencentvideo'); ?></strong>
					</td>
				</tr>
                <tr>
                    <th><label><?php esc_html_e('width','apoyl-tencentvideo'); ?></label></th>
                    <td><input type="text" class="regular-text"
                               value="<?php echo esc_attr($arr['width'])?>" id="width"
                               name="width">
                        <?php _e('width_desc','apoyl-tencentvideo'); ?>--<strong><?php _e('calldev_desc','apoyl-tencentvideo'); ?></strong>
                    </td>
                </tr>
                <tr>
                    <th><label><?php esc_html_e('height','apoyl-tencentvideo'); ?></label></th>
                    <td><input type="text" class="regular-text"
                               value="<?php echo esc_attr($arr['height'])?>" id="height"
                               name="height">
                        <?php _e('height_desc','apoyl-tencentvideo'); ?>--<strong><?php _e('calldev_desc','apoyl-tencentvideo'); ?></strong>
                    </td>
                </tr>
                <tr>
                    <th><label><?php esc_html_e('openmd5','apoyl-tencentvideo'); ?></label></th>
                    <td><input type="checkbox" class="regular-text" value="1"
                               id="openmd5" name="openmd5"
                            <?php checked( '1', $arr['openmd5'] ); ?>>
                        <?php esc_html_e('openmd5_desc','apoyl-tencentvideo'); ?>--<strong><?php _e('calldev_desc','apoyl-tencentvideo'); ?></strong>
                    </td>
                </tr>
                <tr>
                    <th><label><?php esc_html_e('opensign','apoyl-tencentvideo'); ?></label></th>
                    <td><input type="text" class="regular-text"
                               value="<?php echo esc_attr($arr['opensign'])?>" id="opensign"
                               name="opensign">
                        <?php _e('opensign_desc','apoyl-tencentvideo'); ?>
                    </td>
                </tr>
			</tbody>
		</table>
                <?php
                wp_nonce_field("apoyl-tencentvideo-settings");
                submit_button();
                ?>
               
    </form>
</div>