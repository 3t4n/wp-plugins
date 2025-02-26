<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package Apoyl_So
 * @subpackage Apoyl_So/admin/partials
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
if (! empty($_POST['submit']) && check_admin_referer('apoyl-so-settings', '_wpnonce')) {
    
    $arr_options = array(
    	'open' => isset ( $_POST ['open'] ) ? ( int ) sanitize_key ( $_POST ['open'] ) :  0,
        'domain' => sanitize_text_field(trim($_POST['domain'])),
    	'openbaidu' => isset ( $_POST ['openbaidu'] ) ? ( int ) sanitize_key ( $_POST ['openbaidu'] ) :  0
    )
    ;
    $updateflag = update_option($options_name, $arr_options);
}
$arr = get_option($options_name);

?>
    <?php if( !empty( $updateflag ) ) { echo '<div id="message" class="updated fade"><p>' . __('updatesuccess','apoyl-so') . '</p></div>'; } ?>

<div class="wrap">
	<h2><?php _e('settings','apoyl-so'); ?></h2>
	<p>
    <?php _e('settings_desc','apoyl-so'); ?>
    </p>
	<form
		action="<?php echo admin_url('options-general.php?page=apoyl-so-settings');?>"
		name="settings-apoyl-so" method="post">
		<table class="form-table">
			<tbody>
				<tr>
					<th><label><?php _e('domain','apoyl-so'); ?></label></th>
					<td><input type="text" class="regular-text"
						value="<?php echo esc_attr($arr['domain']); ?>" id="domain"
						name="domain">
						<p class="description"><?php _e('domain_desc','apoyl-so'); ?></p>
					</td>
				</tr>
				<tr>
					<th><label><?php _e('open','apoyl-so'); ?></label></th>
					<td><input type="checkbox" class="regular-text" value="1" id="open"
						name="open" <?php checked( '1', $arr['open'] ); ?>>
    					<?php _e('open_desc','apoyl-so'); ?>
    					</td>
				</tr>


				<tr>
					<th><label><?php _e('openbaidu','apoyl-so'); ?></label></th>
					<td><input type="checkbox" class="regular-text" value="1"
						id="openbaidu" name="openbaidu"
						<?php checked( '1', $arr['openbaidu'] ); ?>>
    					<?php _e('openbaidu_desc','apoyl-so'); ?>-<strong><?php _e('calldev_desc','apoyl-so'); ?></strong>
					</td>
				</tr>
			</tbody>
		</table>
                <?php
                wp_nonce_field("apoyl-so-settings");
                submit_button();
                ?>
               
    </form>
</div>