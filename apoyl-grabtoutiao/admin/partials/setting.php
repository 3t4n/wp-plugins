<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package APOYL_GRABTOUTIAO
 * @subpackage APOYL_GRABTOUTIAO/admin/partials
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if (! empty($_POST['submit']) && check_admin_referer('apoyl-grabtoutiao-settings', '_wpnonce')) {
    
    $arr_options = array(
    		'open' => isset ( $_POST ['open'] ) ? ( int ) sanitize_key ( $_POST ['open'] ) :  0,
    		'openpic' => isset ( $_POST ['openpic'] ) ? ( int ) sanitize_key ( $_POST ['openpic'] ) :  0,
    );
    
    $updateflag = update_option($options_name, $arr_options);
    $updateflag = true;
}
$arr = get_option($options_name);

?>
    <?php if( !empty( $updateflag ) ) { echo '<div id="message" class="updated fade"><p>' . esc_html__('updatesuccess','apoyl-grabtoutiao') . '</p></div>'; } ?>

<div class="wrap">
	<h2><?php esc_html_e('settings','apoyl-grabtoutiao'); ?></h2>
	<p>
    <?php _e('settings_desc','apoyl-grabtoutiao'); ?>
    </p>
	<form
		action="<?php echo esc_url(admin_url('options-general.php?page=apoyl-grabtoutiao-settings'));?>"
		name="settings-apoyl-grabtoutiao" method="post">
		<table class="form-table">
			<tbody>
				<tr>
					<th><label><?php esc_html_e('open','apoyl-grabtoutiao'); ?></label></th>
					<td><input type="checkbox" class="regular-text" value="1" id="open"
						name="open" <?php checked( '1', $arr['open'] ); ?>>
    					<?php esc_html_e('open_desc','apoyl-grabtoutiao'); ?>
    					</td>
				</tr>
				<tr>
					<th><label><?php _e('openpic','apoyl-grabtoutiao'); ?></label></th>
					<td><input type="checkbox" class="regular-text"
						value="1" id="openpic" name="openpic" <?php if($arr['openpic']) _e('checked="checked"'); ?>>
					<?php _e('openpic_desc','apoyl-grabtoutiao'); ?>--<strong><?php _e('calldev_desc','apoyl-grabtoutiao'); ?></strong>
					</td>
				</tr>

			</tbody>
		</table>
                <?php
                wp_nonce_field("apoyl-grabtoutiao-settings");
                submit_button();
                ?>
               
    </form>
</div>