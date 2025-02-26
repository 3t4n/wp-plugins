<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package APOYL_GRABWEIXIN
 * @subpackage APOYL_GRABWEIXIN/admin/partials
 * @author 凹凸曼 <3201361925@qq.com>
 *
 */
if (! empty($_POST['submit']) && check_admin_referer('apoyl-grabweixin-settings', '_wpnonce')) {
    
    $arr_options = array(
    		'open' => isset ( $_POST ['open'] ) ? ( int ) sanitize_key ( $_POST ['open'] ) :  0,
    		'openpic' => isset ( $_POST ['openpic'] ) ? ( int ) sanitize_key ( $_POST ['openpic'] ) :  0,
    );
    
    $updateflag = update_option($options_name, $arr_options);
    $updateflag = true;
}
$arr = get_option($options_name);

?>
    <?php if( !empty( $updateflag ) ) { echo '<div id="message" class="updated fade"><p>' . __('updatesuccess','apoyl-grabweixin') . '</p></div>'; } ?>

<div class="wrap">
	<h2><?php _e('settings','apoyl-grabweixin'); ?></h2>
	<p>
    <?php _e('settings_desc','apoyl-grabweixin'); ?>
    </p>
	<form
		action="<?php echo admin_url('options-general.php?page=apoyl-grabweixin-settings');?>"
		name="settings-apoyl-grabweixin" method="post">
		<table class="form-table">
			<tbody>
				<tr>
					<th><label><?php _e('open','apoyl-grabweixin'); ?></label></th>
					<td><input type="checkbox" class="regular-text" value="1" id="open"
						name="open" <?php checked( '1', $arr['open'] ); ?>>
    					<?php _e('open_desc','apoyl-grabweixin'); ?>
    					</td>
				</tr>
				<tr>
					<th><label><?php _e('openpic','apoyl-grabweixin'); ?></label></th>
					<td><input type="checkbox" class="regular-text"
						value="1" id="openpic" name="openpic" <?php if($arr['openpic']) _e('checked="checked"'); ?>>
					<?php _e('openpic_desc','apoyl-grabweixin'); ?>--<strong><?php _e('calldev_desc','apoyl-grabweixin'); ?></strong>
					</td>
				</tr>
			</tbody>
		</table>
                <?php
                wp_nonce_field("apoyl-grabweixin-settings");
                submit_button();
                ?>
               
    </form>
</div>