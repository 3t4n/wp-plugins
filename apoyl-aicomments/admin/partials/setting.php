<?php
/*
 * @link 
 * @since 1.0.0
 * @package APOYL_AICOMMENTS
 * @subpackage APOYL_AICOMMENTS/admin/partials
 * @author 凹凸曼 <3201361925@qq.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if (isset($_POST['apoyl-aicomments-wpnonce']) && check_admin_referer($options_name, 'apoyl-aicomments-wpnonce')) {

        $arr_options = array(
        	'open'=>isset ( $_POST ['open'] ) ? ( int ) sanitize_key ( $_POST ['open'] ) :  0,
            'apikey' => sanitize_text_field($_POST['apikey']),
            'secretkey' => sanitize_text_field($_POST['secretkey']),
            'author' => sanitize_text_field($_POST['author']),
            'debug'=>isset ( $_POST ['debug'] ) ? ( int ) sanitize_key ( $_POST ['debug'] ) :  0,
            'limit'=>isset ( $_POST ['limit'] ) ? ( int ) sanitize_key ( $_POST ['limit'] ) :  0,

            'authors'=>sanitize_text_field($_POST['authors']),

            'openaiapikey' => sanitize_text_field($_POST['openaiapikey']),
            'deepseekapikey' => sanitize_text_field($_POST['deepseekapikey']),
            'deepseeksecretkey' => sanitize_text_field($_POST['deepseeksecretkey']),

        );
   
        $updateflag = update_option($options_name, $arr_options);
        $updateflag = true;
    }
    $arr = get_option($options_name);

    
    ?>
    <?php if( !empty( $updateflag ) ) { echo '<div id="message" class="updated fade"><p>' . esc_html__('updatesuccess','apoyl-aicomments') . '</p></div>'; } ?>
    
    <div class="wrap">
    
<?php   require_once APOYL_AICOMMENTS_DIR . 'admin/partials/nav.php';?>
    </p>
    	<form
    		action="<?php echo esc_url(admin_url('options-general.php?page=apoyl-aicomments-settings'));?>"
    		name="settings-apoyl-aicomments" method="post">
    		<table class="form-table">
    			<tbody>
    				<tr>
    					<th><label><?php esc_html_e('open','apoyl-aicomments'); ?></label></th>
    					<td><input type="checkbox" class="regular-text"
    						value="1" id="open" name="open" <?php checked( '1', $arr['open'] ); ?> >
    					<?php esc_html_e('open_desc','apoyl-aicomments'); ?>
    					</td>
    				</tr>
                    <tr>
                        <th><label><?php esc_html_e('deepseekapikey','apoyl-aiarticle'); ?></label></th>
                        <td><input type="text" class="regular-text" value="<?php echo esc_attr($arr['deepseekapikey']); ?>" id="deepseekapikey" name="deepseekapikey">
                            <p class="description"><?php esc_html_e('deepseekapikey_desc','apoyl-aiarticle'); ?>--<strong><?php _e('calldev_desc','apoyl-aicomments'); ?></strong></p>
                        </td>
                    </tr>

                    <tr>
                        <th><label><?php esc_html_e('deepseeksecretkey','apoyl-aiarticle'); ?></label></th>
                        <td><input type="text" class="regular-text" value="<?php echo esc_attr($arr['deepseeksecretkey']); ?>" id="deepseeksecretkey" name="deepseeksecretkey">
                            <p class="description"><?php esc_html_e('deepseeksecretkey_desc','apoyl-aiarticle'); ?>--<strong><?php _e('calldev_desc','apoyl-aicomments'); ?></strong></p>
                        </td>
                    </tr>
  					<tr>
                    <th><label><?php esc_html_e('apikey','apoyl-aicomments'); ?></label></th>
                    <td><input type="text" class="regular-text" value="<?php echo esc_attr($arr['apikey']); ?>" id="apikey" name="apikey">
                    <p class="description"><?php esc_html_e('apikey_desc','apoyl-aicomments'); ?></p>
                    </td>
                	</tr>
                	
                	<tr>
                    <th><label><?php esc_html_e('secretkey','apoyl-aicomments'); ?></label></th>
                    <td><input type="text" class="regular-text" value="<?php echo esc_attr($arr['secretkey']); ?>" id="secretkey" name="secretkey">
                    <p class="description"><?php esc_html_e('secretkey_desc','apoyl-aicomments'); ?></p>
                    </td>
                	</tr>
                    <tr>
                        <th><label><?php esc_html_e('author','apoyl-aicomments'); ?></label></th>
                        <td><input type="text" class="regular-text" value="<?php echo esc_attr($arr['author']); ?>" id="author" name="author">
                            <p class="description"><?php esc_html_e('author_desc','apoyl-aicomments'); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th><label><?php esc_html_e('debug','apoyl-aicomments'); ?></label></th>
                        <td><input type="checkbox" class="regular-text"
                                   value="1" id="debug" name="debug" <?php checked( '1', $arr['debug'] ); ?> >
                            <?php esc_html_e('debug_desc','apoyl-aicomments'); ?>
                        </td>
                    </tr>

                    <tr>
                        <th><label><?php _e('limit','apoyl-aicomments'); ?></label></th>
                        <td><input type="radio" class="regular-text"
                                   value="0" id="limit" name="limit" <?php if(isset($arr['limit'])) checked( '0', $arr['limit'] ); ?> ><?php _e('limit0','apoyl-aicomments'); ?>
                            <input type="radio" class="regular-text" value="1" id="limit" name="limit" <?php if(isset($arr['limit'])&&!empty($arr['limit'])) checked( '1', $arr['limit'] ); ?> ><?php _e('limit1','apoyl-aicomments'); ?>
                            <input type="radio" class="regular-text" value="2" id="limit" name="limit" <?php if(isset($arr['limit'])&&!empty($arr['limit'])) checked( '2', $arr['limit'] ); ?> ><?php _e('limit2','apoyl-aicomments'); ?>
                            <input type="radio" class="regular-text" value="3" id="limit" name="limit" <?php if(isset($arr['limit'])&&!empty($arr['limit'])) checked( '3', $arr['limit'] ); ?> ><?php _e('limit3','apoyl-aicomments'); ?>

                            <p class="description"><strong><?php _e('calldev_desc','apoyl-aicomments'); ?></strong></p>
                        </td>
                    </tr>

                    <tr>
                        <th><label><?php _e('authors','apoyl-aicomments'); ?></label></th>
                        <td><textarea rows="5" style="max-width:800px;" class="large-text code"
                                      id="authors" name="authors"><?php if(isset($arr['authors'])&&!empty($arr['authors']))  esc_html_e($arr['authors']); ?></textarea>
                            <p class="description"><?php _e('authors_desc','apoyl-aicomments'); ?>--<strong><?php _e('calldev_desc','apoyl-aicomments'); ?></strong></p>
                        </td>
                    </tr>

    			</tbody>
    		</table>
                <?php
                wp_nonce_field("apoyl-aicomments-settings","apoyl-aicomments-wpnonce");
                submit_button();
                ?>
               
    </form>
    </div>