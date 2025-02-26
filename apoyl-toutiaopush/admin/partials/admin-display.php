<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package Apoyl_Toutiaopush
 * @subpackage Apoyl_Toutiaopush/admin/partials
 * @author 凹凸曼 <jar-c@163.com>
 *
 */

if($scanningtips){
    echo '<div id="message" class="updated fade"><p><strong>'.$scanningtips.'</strong></p></div>';
}else{

    if (! empty($_POST['submit']) && check_admin_referer('apoyl-toutiaopush-settings', '_wpnonce')) {
        
        $arr_options = array(
            'opentoutiao'=>(int)sanitize_key($_POST['opentoutiao']),
            'codejs' => wp_kses_post(wp_unslash($_POST['codejs'])),
    
        );
    
        $updateflag = update_option($options_name, $arr_options);
        $updateflag = true;
    }
    $arr = get_option($options_name);
    
    ?>
    <?php if( !empty( $updateflag ) ) { echo '<div id="message" class="updated fade"><p>' . __('updatesuccess','apoyl-toutiaopush') . '</p></div>'; } ?>
    
    <div class="wrap">
    	<h2><?php _e('settings','apoyl-toutiaopush'); ?></h2>
    	<p>
    <?php _e('settings_desc','apoyl-toutiaopush'); ?>
    </p>
    	<form
    		action="<?php echo admin_url('options-general.php?page=apoyl-toutiaopush-settings');?>"
    		name="settings-apoyl-toutiaopush" method="post">
    		<table class="form-table">
    			<tbody>
    				<tr>
    					<th><label><?php _e('opentoutiao','apoyl-toutiaopush'); ?></label></th>
    					<td><input type="checkbox" class="regular-text"
    						value="1" id="opentoutiao" name="opentoutiao" <?php checked( '1', $arr['opentoutiao'] ); ?> >
    					<?php _e('opentoutiao_desc','apoyl-toutiaopush'); ?>
    					</td>
    				</tr>
    				<tr>
    					<th><label><?php _e('codejs','apoyl-toutiaopush'); ?></label></th>
    					<td><textarea rows="10" style="max-width:800px;" class="large-text code"
    						id="codejs" name="codejs"><?php esc_html_e($arr['codejs']); ?></textarea>
    						<p class="description"><?php _e('codejs_desc','apoyl-toutiaopush'); ?></p>
    					</td>
    				</tr>
    			
    		
    			</tbody>
    		</table>
                <?php
                wp_nonce_field("apoyl-toutiaopush-settings");
                submit_button();
                ?>
               
    </form>
    </div>
    <div class="wrap">
    <h2><?php _e('deadpush','apoyl-toutiaopush'); ?></h2>
    <br>
    <table class="widefat" style="max-width:1020px;">
    	<tbody id="the-list">
    		<tr class="alternate">
    			<td class="column-name">
    				<p><?php _e('deadpush_desc','apoyl-toutiaopush'); ?>:<font color="red"><?php $deadurl=WP_PLUGIN_URL.'/apoyl-toutiaopush/cache/sitemap_dead.txt';if(file_exists(WP_PLUGIN_DIR.'/apoyl-toutiaopush/cache/sitemap_dead.txt')){echo '<a href="'.$deadurl.'" target="_blank">'.$deadurl.'</a>';}else{_e('error_empty','apoyl-toutiaopush');}?></font></p>
    				<p><strong><?php _e('paymsg','apoyl-toutiaopush'); ?></strong></p>
    			</td>
    			<td class="column-name">
    				<form action="" method="post" >
    				<input type="hidden" name="page" value="1" />
    				<input type="hidden" name="maxid" value="0" />
    			<?php
                wp_nonce_field("apoyl-toutiaopush-settings");
                submit_button(translate('makedead','apoyl-toutiaopush'),'primary','deadsubmit');
                ?>
    				</form>
    			</td>
    		</tr>
    </tbody>
    </table>
<?php
 }?>