<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package APOYL_VIEWS
 * @subpackage APOYL_VIEWS/admin/partials
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if (isset($_POST['apoyl-views-wpnonce']) && check_admin_referer($options_name, 'apoyl-views-wpnonce')) {

        $arr_options = array(
        	'open'=>isset ( $_POST ['open'] ) ? ( int ) sanitize_key ( $_POST ['open'] ) :  0,
            'openviewcount'=>isset ( $_POST ['openviewcount'] ) ? ( int ) sanitize_key ( $_POST ['openviewcount'] ) :  0,
            'openinitcount'=>isset ( $_POST ['openinitcount'] ) ? ( int ) sanitize_key ( $_POST ['openinitcount'] ) :  0,
            'randcount'=>sanitize_text_field($_POST['randcount']),
            'openeditcount'=>isset ( $_POST ['openeditcount'] ) ? ( int ) sanitize_key ( $_POST ['openeditcount'] ) :  0,
        );

        $updateflag = update_option($options_name, $arr_options);
        $updateflag = true;
    }
    $arr = get_option($options_name);

    
    ?>
    <?php if( !empty( $updateflag ) ) { echo '<div id="message" class="updated fade"><p>' . esc_html__('updatesuccess','apoyl-views') . '</p></div>'; } ?>
    
    <div class="wrap">
    
<?php   require_once APOYL_VIEWS_DIR . 'admin/partials/nav.php';?>
    </p>
    	<form
    		action="<?php echo esc_url(admin_url('options-general.php?page=apoyl-views-settings'));?>"
    		name="settings-apoyl-views" method="post">
    		<table class="form-table">
    			<tbody>
    				<tr>
    					<th><label><?php esc_html_e('open','apoyl-views'); ?></label></th>
    					<td><input type="checkbox" class="regular-text"
    						value="1" id="open" name="open" <?php checked( '1', $arr['open'] ); ?> >
    					<?php esc_html_e('open_desc','apoyl-views'); ?>
    					</td>
    				</tr>

                    <tr>
                        <th><label><?php esc_html_e('openviewcount','apoyl-views'); ?></label></th>
                        <td><input type="checkbox" class="regular-text"
                                   value="1" id="openviewcount" name="openviewcount" <?php checked( '1', $arr['openviewcount'] ); ?> >
                            <?php esc_html_e('openviewcount_desc','apoyl-views'); ?>
                        </td>
                    </tr>

                    <tr>
                        <th><label><?php esc_html_e('openinitcount','apoyl-views'); ?></label></th>
                        <td><input type="checkbox" class="regular-text"
                                   value="1" id="openinitcount" name="openinitcount" <?php checked( '1', $arr['openinitcount'] ); ?> >
                            <?php esc_html_e('openinitcount_desc','apoyl-views'); ?>--<strong><?php _e('calldev_desc','apoyl-tencentcos'); ?></strong>
                        </td>
                    </tr>

                    <tr>
                        <th><label><?php esc_html_e('randcount','apoyl-views'); ?></label></th>
                        <td><input type="text" class="regular-text" value="<?php echo esc_attr($arr['randcount'])?>" id="randcount"
                                   name="randcount" >
                            <?php esc_html_e('randcount_desc','apoyl-views'); ?>--<strong><?php _e('calldev_desc','apoyl-tencentcos'); ?></strong>
                        </td>
                    </tr>

                    <tr>
                        <th><label><?php esc_html_e('openeditcount','apoyl-views'); ?></label></th>
                        <td><input type="checkbox" class="regular-text"
                                   value="1" id="openeditcount" name="openeditcount" <?php checked( '1', $arr['openeditcount'] ); ?> >
                            <?php esc_html_e('openeditcount_desc','apoyl-views'); ?>--<strong><?php _e('calldev_desc','apoyl-tencentcos'); ?></strong>
                        </td>
                    </tr>
    			</tbody>
    		</table>
                <?php
                wp_nonce_field("apoyl-views-settings","apoyl-views-wpnonce");
                submit_button();
                ?>
               
    </form>
    </div>