<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function click_n_chat_autoreply_add_edit() {
	global $wpdb;
    $table_name = $wpdb->prefix . 'cnc_auto_reply';
	$mode = sanitize_text_field($_GET['mode']);
	$nonce = wp_create_nonce( 'addedit-user' );
	
	if (isset($_POST['action'])) {
		if (  ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_wpnonce'])), $nonce) ) {
			 die( 'Security check' ); 
		}
		 
		$action = sanitize_text_field($_POST['action']);
		$query = sanitize_text_field($_POST['query']);
		$keyword = sanitize_text_field($_POST['keyword']);
		$reply = wp_kses_post($_POST['reply']);
		if ($action === 'add') {
			$wpdb->insert(
				$table_name,
				[
					'query' => $query,
					'keyword' => $keyword,
					'reply' => $reply,
				]
			);
		}
	
		if ($action === 'update') {
			
			$wpdb->update(
				$table_name,
				[
					'query' => $query,
					'keyword' => $keyword,
					'reply' => $reply,
				],
				['id' => intval($_POST['id'])]
			);
		}
 
		if ($action === 'delete') {
			
			$wpdb->delete($table_name, ['id' => intval($_POST['id'])]);
		}
		wp_redirect(admin_url('admin.php?page=wa-clicknchat&tab=autoreply&message='.$alertMessage));
        exit;
	}

    

    $rows = $wpdb->get_results("SELECT * FROM $table_name");
    ?>
    <div class="my-3">   
        <h1 class="wp-heading-inline"><?php echo esc_html($mode == "edit" ? 'Update Auto Reply' : 'Add Auto Reply');  ?></h1>
    </div>
    <form method="post">
    <div class="cnc-custom-gap-row">
        <div class="form-wrap cnc-custom-col-gap-6">
            <div class="cnc-container cnc-bg-white cnc-shadow">
				<?php wp_nonce_field($nonce, '_wpnonce'); ?>
                <?php
                if ($mode == "edit") {
                    $id = intval($_GET['id']);
                    $auto_reply = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $id));
                ?>
                <input type="hidden" name="id" value="<?php echo esc_attr($auto_reply->id);  ?>">
                <input type="hidden" name="action" value="update">
                <?php
                }
                else{
                ?>
                <input type="hidden" name="action" value="add">
                <?php
                }
                ?>
                <div class="form-field">
                    <label for="welcome_message">User Query:</label>
                   	<input name="query" type="text" id="query" value="<?php echo esc_html(($mode == "edit" ? esc_attr($auto_reply->query) : ''));  ?>" required placeholder="What is chatbot?">
                </div>
                <div class="form-field">
                    <label for="welcome_message">Keyword:</label>
                   	<input name="keyword" type="text" id="keyword" value="<?php echo esc_html(($mode == "edit" ? esc_attr($auto_reply->keyword) : ''));  ?>" required placeholder="Chatbot">
                </div>
                <div class="form-field">
                    <label for="welcome_message">Auto Response:</label>
                   	<?php 
						$content = ($mode == "edit" ? stripslashes($auto_reply->reply) : '');
						$editor_id = 'message';  
						$settings = array(
							'textarea_name' => 'reply',  
							'media_buttons' => false,  
							'textarea_rows' => 5,  
							'teeny'         => false,  
							'quicktags'     => true  
						);
						
						wp_editor($content, $editor_id, $settings);
					?>
                </div>            
            </div>
       	</div>
    </div>
    <p class="submit">
        <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php echo esc_html($mode == "edit" ? 'Update Auto Reply' : 'Add Auto Reply');  ?>">	
    </p>
    </form>
<?php 
}