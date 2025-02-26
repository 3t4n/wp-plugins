<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package APOYL_CHATGPT
 * @subpackage APOYL_CHATGPT/admin/partials
 * @author 凹凸曼 <jar-c@163.com>
 *
 */

if (! empty($_POST['submit']) && check_admin_referer($options_name, '_wpnonce')) {

        $arr_options = array(
        	'open'=>isset ( $_POST ['open'] ) ? ( int ) sanitize_key ( $_POST ['open'] ) :  0,
        	'openpage'=>sanitize_text_field($_POST['openpage']),
            'apikey' => sanitize_text_field($_POST['apikey']),
            'title' => sanitize_text_field($_POST['title']),
            'answer' => sanitize_text_field($_POST['answer']),
            'reply' => sanitize_text_field($_POST['reply']),
        	'openllm'=>isset ( $_POST ['openllm'] ) ? ( int ) sanitize_key ( $_POST ['openllm'] ) :  0,
        	'baiduapikey' => sanitize_text_field($_POST['baiduapikey']),
        	'baidusecretkey' => sanitize_text_field($_POST['baidusecretkey']),
            'debug'=>isset ( $_POST ['debug'] ) ? ( int ) sanitize_key ( $_POST ['debug'] ) :  0,
        );
   
        $updateflag = update_option($options_name, $arr_options);
        $updateflag = true;
    }
    $arr = get_option($options_name);

    
    ?>
    <?php if( !empty( $updateflag ) ) { echo '<div id="message" class="updated fade"><p>' . __('updatesuccess','apoyl-chatgpt') . '</p></div>'; } ?>
    
    <div class="wrap">
    
<?php   require_once APOYL_CHATGPT_DIR . 'admin/partials/nav.php';?>
    </p>
    	<form
    		action="<?php echo admin_url('options-general.php?page=apoyl-chatgpt-settings');?>"
    		name="settings-apoyl-chatgpt" method="post">
    		<table class="form-table">
    			<tbody>
    				<tr>
    					<th><label><?php _e('open','apoyl-chatgpt'); ?></label></th>
    					<td><input type="checkbox" class="regular-text"
    						value="1" id="open" name="open" <?php checked( '1', $arr['open'] ); ?> >
    					<?php _e('open_desc','apoyl-chatgpt'); ?>
    					</td>
    				</tr>  				
    				  <tr>
    					<th><label><?php _e('openpage','apoyl-chatgpt'); ?></label></th>
    					<td><input type="text" class="regular-text"
    						value="<?php echo esc_attr($arr['openpage']); ?>" id="openpage" name="openpage"  >
    					<?php _e('openpage_desc','apoyl-chatgpt'); ?>
    					</td>
    				</tr>
    				<tr>
    					<th><label><?php _e('openllm','apoyl-chatgpt'); ?></label></th>
    					<td><input type="radio" class="regular-text"
    						value="1" id="openllm" name="openllm" <?php checked( '1', $arr['openllm'] ); ?> ><?php _e('baidullm','apoyl-chatgpt'); ?>
							<input type="radio" class="regular-text" value="2" id="openllm" name="openllm" <?php checked( '2', $arr['openllm'] ); ?> ><?php _e('gpt3llm','apoyl-chatgpt'); ?>
							<input type="radio" class="regular-text" value="3" id="openllm" name="openllm" <?php checked( '3', $arr['openllm'] ); ?> ><?php _e('gpt4llm','apoyl-chatgpt'); ?>

    		
    					</td>
    				</tr>
  				<tr>
                    <th><label><?php _e('baiduapikey','apoyl-chatgpt'); ?></label></th>
                    <td><input type="text" class="regular-text" value="<?php echo esc_attr($arr['baiduapikey']); ?>" id="baiduapikey" name="baiduapikey">
                    <p class="description"><?php _e('baiduapikey_desc','apoyl-chatgpt'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th><label><?php _e('baidusecretkey','apoyl-chatgpt'); ?></label></th>
                    <td><input type="text" class="regular-text" value="<?php echo esc_attr($arr['baidusecretkey']); ?>" id="baidusecretkey" name="baidusecretkey">
                    <p class="description"><?php _e('baidusecretkey_desc','apoyl-chatgpt'); ?></p>
                    </td>
                </tr>      				
  				<tr>
                    <th><label><?php _e('apikey','apoyl-chatgpt'); ?></label></th>
                    <td><input type="text" class="regular-text" value="<?php echo esc_attr($arr['apikey']); ?>" id="apikey" name="apikey">
                    <p class="description"><?php _e('apikey_desc','apoyl-chatgpt'); ?></p>
                    </td>
                </tr>
               <tr>
                    <th><label><?php _e('title','apoyl-chatgpt'); ?></label></th>
                    <td><input type="text" class="regular-text" value="<?php echo esc_attr($arr['title']); ?>" id="title" name="title">
                    <p class="description"><?php _e('title_desc','apoyl-chatgpt'); ?></p>
                    </td>
                    
                </tr>

  				 <tr>
                    <th><label><?php _e('answer','apoyl-chatgpt'); ?></label></th>
                    <td><input type="text" class="regular-text" value="<?php echo esc_attr($arr['answer']); ?>" id="answer" name="answer">
                    <p class="description"><?php _e('answer_desc','apoyl-chatgpt'); ?></p>
                    </td>
                    
                </tr>
				 <tr>
                    <th><label><?php _e('reply','apoyl-chatgpt'); ?></label></th>
                    <td><input type="text" class="regular-text" value="<?php echo esc_attr($arr['reply']); ?>" id="reply" name="reply">
                    <p class="description"><?php _e('reply_desc','apoyl-chatgpt'); ?></p>
                    </td>
                    
                </tr>
				 <tr>
                    <th><label><?php _e('aiurl','apoyl-chatgpt'); ?></label></th>
                    <td><?php echo '<a href="'.esc_url(APOYL_CHATGPT_URL.'public/my-chatgpt.php').'" target="_blank">'.esc_url(APOYL_CHATGPT_URL.'public/my-chatgpt.php').'</a>';?>
                    <p class="description"><strong><?php _e('calldev_desc','apoyl-chatgpt'); ?></strong></p>
                    </td>
                    
                </tr>
                    <tr>
                        <th><label><?php esc_html_e('debug','apoyl-chatgpt'); ?></label></th>
                        <td><input type="checkbox" class="regular-text"
                                   value="1" id="debug" name="debug" <?php checked( '1', $arr['debug'] ); ?> >
                            <?php esc_html_e('debug_desc','apoyl-chatgpt'); ?>
                        </td>
                    </tr>
    			</tbody>
    		</table>
                <?php
                wp_nonce_field("apoyl-chatgpt-settings");
                submit_button();
                ?>
               
    </form>
    </div>