<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package APOYL_KEYWORDSEO
 * @subpackage APOYL_KEYWORDSEO/admin/partials
 * @author 凹凸曼 <jar-c@163.com>
 *
 */

if (! empty($_POST['submit']) && check_admin_referer($options_name, '_wpnonce')) {

	$arr_options = array (
			'open' => isset ( $_POST ['open'] ) ? ( int ) sanitize_key ( $_POST ['open'] ) :  0,
			'keywordone' => sanitize_text_field ( $_POST ['keywordone'] ),
			'keywordurlone' => sanitize_text_field ( $_POST ['keywordurlone'] ),
			'keywordtwo' => sanitize_text_field ( $_POST ['keywordtwo'] ),
			'keywordurltwo' => sanitize_text_field ( $_POST ['keywordurltwo'] ),
			'openbatch' => isset ( $_POST ['openbatch'] ) ? ( int ) sanitize_key ( $_POST ['openbatch'] ) :  0,
			'batchdata' => sanitize_textarea_field ( $_POST ['batchdata'] ) 
	);
	
	$updateflag = update_option ( $options_name, $arr_options );
	$updateflag = true;
}
$arr = get_option ( $options_name );
    
    ?>
    <?php if( !empty( $updateflag ) ) { echo '<div id="message" class="updated fade"><p>' . __('updatesuccess','apoyl-keywordseo') . '</p></div>'; } ?>
    
    <div class="wrap">
    
<?php   require_once APOYL_KEYWORDSEO_DIR . 'admin/partials/nav.php';?>
    </p>
    	<form
    		action="<?php echo admin_url('options-general.php?page=apoyl-keywordseo-settings');?>"
    		name="settings-apoyl-keywordseo" method="post">
    		<table class="form-table">
    			<tbody>
    				<tr>
    					<th><label><?php _e('open','apoyl-keywordseo'); ?></label></th>
    					<td><input type="checkbox" class="regular-text"
    						value="1" id="open" name="open" <?php checked( '1', $arr['open'] ); ?> >
    					<?php _e('open_desc','apoyl-keywordseo'); ?>
    					</td>
    				</tr>
  				<tr>
                    <th><label><?php _e('keywordone','apoyl-keywordseo'); ?></label></th>
                    <td><input type="text" class="regular-text" value="<?php echo esc_attr($arr['keywordone']); ?>" id="keywordone" name="keywordone">
                    <p class="description"><?php _e('keywordone_desc','apoyl-keywordseo'); ?></p>
                    </td>
                    
                </tr>
               <tr>
                    <th><label><?php _e('keywordurlone','apoyl-keywordseo'); ?></label></th>
                    <td><input type="text" class="regular-text" value="<?php echo esc_url($arr['keywordurlone']); ?>" id="keywordurlone" name="keywordurlone">
                    <p class="description"><?php _e('keywordurlone_desc','apoyl-keywordseo'); ?></p>
                    </td>
                    
                </tr>
  				<tr>
                    <th><label><?php _e('keywordtwo','apoyl-keywordseo'); ?></label></th>
                    <td><input type="text" class="regular-text" value="<?php echo esc_attr($arr['keywordtwo']); ?>" id="keywordtwo" name="keywordtwo">
                    <p class="description"><?php _e('keywordtwo_desc','apoyl-keywordseo'); ?></p>
                    </td>
                    
                </tr>
               <tr>
                    <th><label><?php _e('keywordurltwo','apoyl-keywordseo'); ?></label></th>
                    <td><input type="text" class="regular-text" value="<?php echo esc_url($arr['keywordurltwo']); ?>" id="keywordurltwo" name="keywordurltwo">
                    <p class="description"><?php _e('keywordurltwo_desc','apoyl-keywordseo'); ?></p>
                    </td>
                    
                </tr>
    				<tr>
    					<th><label><?php _e('openbatch','apoyl-keywordseo'); ?></label></th>
    					<td><input type="checkbox" class="regular-text"
    						value="1" id="openbatch" name="openbatch" <?php checked( '1', $arr['openbatch'] ); ?> >
    					<?php _e('openbatch_desc','apoyl-keywordseo'); ?>--<strong><?php _e('calldev_desc','apoyl-keywordseo'); ?></strong>
    					<p>
    					<textarea class="large-text" id="batchdata" name="batchdata" rows=10  cols="50" placeholder="<?php _e('batchdata_desc','apoyl-keywordseo'); ?>"><?php echo esc_attr($arr['batchdata']); ?></textarea>
    					</p>
    					</td>
    				</tr>
			
    			</tbody>
    		</table>
                <?php
                wp_nonce_field("apoyl-keywordseo-settings");
                submit_button();
                ?>
               
    </form>
    </div>