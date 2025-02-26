<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package Apoyl_Badurl
 * @subpackage Apoyl_Badurl/admin/partials
 * @author 凹凸曼 <jar-c@163.com>
 *
 */


if (! empty($_POST['submit']) && check_admin_referer('apoyl-badurl-settings', '_wpnonce')) {
    
    $arr_options = array(
    	'open' => isset ( $_POST ['open'] ) ? ( int ) sanitize_key ( $_POST ['open'] ) :  0,
        'urls' => wp_kses_post(wp_unslash($_POST['urls']))
    );
    
    $updateflag = update_option($options_name, $arr_options);
}
$arr = get_option($options_name);

$badfile = 'badurl.txt';
$deadurl = APOYL_BADURL_URL . 'cache/' . $badfile;

$isbadurl = file_exists(APOYL_BADURL_DIR . 'cache/' . $badfile);

if (isset($updateflag) && $arr['open']) {
    $this->write_file($arr['urls'], $badfile, 'w');
    $updateflag=true;
}
$scanbadfile = 'badurl-1.txt';
$scandeadurl = APOYL_BADURL_URL . 'cache/' . $scanbadfile;
$scanisbadurl = file_exists(APOYL_BADURL_DIR . 'cache/' . $scanbadfile);
?>
    <?php if( !empty( $updateflag ) ) { echo '<div id="message" class="updated fade"><p>' . __('makesuccess','apoyl-badurl') . '</p></div>'; } ?>
    
    <div class="wrap">
    	<h2><?php _e('settings','apoyl-badurl'); ?></h2>
    	<p>
    <?php _e('settings_desc','apoyl-badurl'); ?>
    </p>
    	<form
    		action="<?php echo admin_url('options-general.php?page=apoyl-badurl-settings');?>"
    		name="settings-apoyl-badurl" method="post">
    		<table class="form-table">
    			<tbody>
    				<tr>
    					<th><label><?php _e('open','apoyl-badurl'); ?></label></th>
    					<td><input type="checkbox" class="regular-text"
    						value="1" id="open" name="open" <?php checked( '1', $arr['open'] ); ?> >
    					<?php _e('open_desc','apoyl-badurl'); ?>
    					</td>
    				</tr>
    				<tr>
    					<th><label><?php _e('urls','apoyl-badurl'); ?></label></th>
    					<td><textarea rows="10" style="max-width:800px;" class="large-text code"
    						id="urls" name="urls"><?php esc_html_e($arr['urls']); ?></textarea>
    						<p class="description"><?php _e('urls_desc','apoyl-badurl'); ?></p>
    					</td>
    				</tr>
    			      <tr>
    					<th><label><?php _e('badurl','apoyl-badurl'); ?></label></th>
    					<td><font color="red"><?php if($isbadurl){echo '<a href="'.esc_url($deadurl).'" target="_blank">'.esc_url($deadurl).'</a>';}else{_e('badurl_empty','apoyl-badurl');}?></font>
 
    					</td>
    				</tr>
    		  			<tr>
    					<th><label><?php _e('scan','apoyl-badurl'); ?></label></th>
    					<td><strong><?php if($scanisbadurl){echo '<a href="'.esc_url($scandeadurl).'" target="_blank">'.esc_url($scandeadurl).'</a>';}else{_e('scan_empty','apoyl-badurl'); echo '--';_e('paymsg','apoyl-badurl');}?><strong>
 
    					</td>
    				</tr>
    	
    			</tbody>
    		</table>
                <?php
                wp_nonce_field("apoyl-badurl-settings");
                submit_button(__('makesubmit','apoyl-badurl'), 'primary');
                ?>
               
    </form>
    </div>
