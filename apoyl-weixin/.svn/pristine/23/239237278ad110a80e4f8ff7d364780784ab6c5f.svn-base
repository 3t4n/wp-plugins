<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package APOYL_WEIXIN
 * @subpackage APOYL_WEIXIN/admin/partials
 * @author 凹凸曼 <3201361925@qq.com>
 *
 */
if (! empty($_POST['submit']) && check_admin_referer($options_name, '_wpnonce')) {
    
    $arr_options = array(
    	'open' => isset ( $_POST ['open'] ) ? ( int ) sanitize_key ( $_POST ['open'] ) :  0,
        'appid' => sanitize_text_field($_POST['appid']),
        'appkey' => sanitize_text_field($_POST['appkey']),
        'role' => sanitize_text_field($_POST['role']),
    	'bind' => isset ( $_POST ['bind'] ) ? ( int ) sanitize_key ( $_POST ['bind'] ) :  0,
        'openmb' => isset ( $_POST ['openmb'] ) ? ( int ) sanitize_key ( $_POST ['openmb'] ) :  0,
        'mbappid' => sanitize_text_field($_POST['mbappid']),
        'mbappkey' => sanitize_text_field($_POST['mbappkey']),
        'openavatar' => isset ( $_POST ['openavatar'] ) ? ( int ) sanitize_key ( $_POST ['openavatar'] ) :  0,
    );
    
    $updateflag = update_option($options_name, $arr_options);
    $updateflag = true;
}
$arr = get_option($options_name);

?>
    <?php if( !empty( $updateflag ) ) { echo '<div id="message" class="updated fade"><p>' . __('updatesuccess','apoyl-weixin') . '</p></div>'; } ?>

<div class="wrap">
    
<?php   require_once APOYL_WEIXIN_DIR . 'admin/partials/nav.php';?>
    </p>
	<form
		action="<?php echo admin_url('options-general.php?page=apoyl-weixin-settings');?>"
		name="settings-apoyl-weixin" method="post">
		<table class="form-table">
			<tbody>
				<tr>
					<th><label><?php _e('open','apoyl-weixin'); ?></label></th>
					<td><input type="checkbox" class="regular-text" value="1" id="open"
						name="open" <?php checked( '1', $arr['open'] ); ?>>
    					<?php _e('open_desc','apoyl-weixin'); ?>
    					</td>
				</tr>
				<tr>
					<th><label><?php _e('appid','apoyl-weixin'); ?></label></th>
					<td><input type="text" class="regular-text"
						value="<?php echo esc_attr($arr['appid']); ?>" id="appid"
						name="appid">
						<p class="description"><?php _e('appid_desc','apoyl-weixin'); ?></p>
					</td>

				</tr>
				<tr>
					<th><label><?php _e('appkey','apoyl-weixin'); ?></label></th>
					<td><input type="text" class="regular-text"
						value="<?php echo esc_attr($arr['appkey']); ?>" id="appkey"
						name="appkey">
						<p class="description"><?php _e('appkey_desc','apoyl-weixin'); ?></p>
					</td>

				</tr>

				<tr class="user-role-wrap">
					<th><label for="role"><?php _e( 'Role' ); ?></label></th>
					<td><select name="role" id="role">
									<?php
        // Compare user role against currently editable roles.
        
        $user_role = $arr['role'];
        // Print the full list of roles with the primary one selected.
        wp_dropdown_roles($user_role);
        
        // Print the 'no role' option. Make it selected if the user has no role yet.
        if ($user_role) {
            echo '<option value="">' . __('&mdash; No role for this site &mdash;') . '</option>';
        } else {
            echo '<option value="" selected="selected">' . __('&mdash; No role for this site &mdash;') . '</option>';
        }
        ?>
							</select></td>
				</tr>
                <tr>
                    <th><label><?php _e('openmb','apoyl-weixin'); ?></label></th>
                    <td><input type="checkbox" class="regular-text" value="1" id="openmb"
                               name="openmb" <?php checked( '1', $arr['openmb'] ); ?>>
                        <?php _e('openmb_desc','apoyl-weixin'); ?>--<strong><?php _e('calldev_desc','apoyl-weixin'); ?></strong>
                    </td>
                </tr>
                <tr>
                    <th><label><?php _e('mbappid','apoyl-weixin'); ?></label></th>
                    <td><input type="text" class="regular-text"
                               value="<?php echo esc_attr($arr['mbappid']); ?>" id="mbappid"
                               name="mbappid">
                        <p class="description"><?php _e('mbappid_desc','apoyl-weixin'); ?>--<strong><?php _e('calldev_desc','apoyl-weixin'); ?></strong></p>
                    </td>

                </tr>
                <tr>
                    <th><label><?php _e('mbappkey','apoyl-weixin'); ?></label></th>
                    <td><input type="text" class="regular-text"
                               value="<?php echo esc_attr($arr['mbappkey']); ?>" id="mbappkey"
                               name="mbappkey">
                        <p class="description"><?php _e('mbappkey_desc','apoyl-weixin'); ?>--<strong><?php _e('calldev_desc','apoyl-weixin'); ?></strong></p>
                    </td>

                </tr>
				<tr>
					<th><label><?php _e('bind','apoyl-weixin'); ?></label></th>
					<td><input type="checkbox" class="regular-text" value="1" id="bind"
						name="bind" <?php checked( '1', $arr['bind'] ); ?>>
						<?php _e('bind_desc','apoyl-weixin'); ?>--<strong><?php _e('calldev_desc','apoyl-weixin'); ?></strong>
					</td>

				</tr>
                <tr>
                    <th><label><?php _e('openavatar','apoyl-weixin'); ?></label></th>
                    <td><input type="checkbox" class="regular-text" value="1" id="openavatar"
                               name="openavatar" <?php checked( '1', $arr['openavatar'] ); ?>>
                        <?php _e('openavatar_desc','apoyl-weixin'); ?>--<strong><?php _e('calldev_desc','apoyl-weixin'); ?></strong>
                    </td>

                </tr>
			</tbody>
		</table>
                <?php
                wp_nonce_field("apoyl-weixin-settings");
                submit_button();
                ?>
               
    </form>
</div>