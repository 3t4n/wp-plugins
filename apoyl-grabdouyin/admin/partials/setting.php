<?php
/*
 * @link   
 * @since 1.0.0
 * @package APOYL_GRABDOUYIN
 * @subpackage APOYL_GRABDOUYIN/admin/partials
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if (isset($_POST['apoyl-grabdouyin-wpnonce']) && check_admin_referer($options_name, 'apoyl-grabdouyin-wpnonce')) {

        $arr_options = array(
        	'open'=>isset ( $_POST ['open'] ) ? ( int ) sanitize_key ( $_POST ['open'] ) :  0,


        );
   
        $updateflag = update_option($options_name, $arr_options);
        $updateflag = true;
    }
    $arr = get_option($options_name);

    
    ?>
    <?php if( !empty( $updateflag ) ) { echo '<div id="message" class="updated fade"><p>' . esc_html__('updatesuccess','apoyl-grabdouyin') . '</p></div>'; } ?>
    
    <div class="wrap">
    
<?php   require_once APOYL_GRABDOUYIN_DIR . 'admin/partials/nav.php';?>
    </p>
    	<form
    		action="<?php echo esc_url(admin_url('options-general.php?page=apoyl-grabdouyin-settings'));?>"
    		name="settings-apoyl-grabdouyin" method="post">
    		<table class="form-table">
    			<tbody>
    				<tr>
    					<th><label><?php esc_html_e('open','apoyl-grabdouyin'); ?></label></th>
    					<td><input type="checkbox" class="regular-text"
    						value="1" id="open" name="open" <?php checked( '1', $arr['open'] ); ?> >
    					<?php esc_html_e('open_desc','apoyl-grabdouyin'); ?>
    					</td>
    				</tr>


              
    			</tbody>
    		</table>
                <?php
                wp_nonce_field("apoyl-grabdouyin-settings","apoyl-grabdouyin-wpnonce");
                submit_button();
                ?>
               
    </form>
    </div>