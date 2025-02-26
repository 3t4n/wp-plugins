<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function click_n_chat_autoreply() {
	global $wpdb;
    $table_name = $wpdb->prefix . 'cnc_auto_reply';
	$mode = sanitize_text_field($_GET['mode']);
	$nonce = wp_create_nonce( 'addedit-user' );
	
	if (isset($_POST['action'])) {
		if (  ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_wpnonce'])), $nonce) ) {
			 die( 'Security check' ); 
		}
		$action = sanitize_text_field($_POST['action']);
		$keyword = sanitize_text_field($_POST['keyword']);
		$matching_percenage = sanitize_text_field($_POST['matching_percenage']);
		$message = wp_kses_post($_POST['message']);
        exit;
	}

    
	$click_n_chat_setting_autoreply = get_option('click_n_chat_setting_autoreply');
    $rows = $wpdb->get_results("SELECT * FROM $table_name");
    ?>
    
    <div class="my-3">   
        <h1 class="wp-heading-inline">Auto Replies</h1>
        <a href="?page=wa-clicknchat&tab=add_edit_autoreply&mode=add" class="page-title-action">Add Auto Reply</a>
    </div>
    <div class="form-field form-wrap">
        <label for="welcome_message">Matching Percentage:</label>
        <input type="range" class="form-rangs customRange" value="<?php echo esc_html($click_n_chat_setting_autoreply->matching_percenage);  ?>" min="50" max="100" step="1" name="matching_percenage" data-span="matchingPercenageRangeValue">
        <b><span id="matchingPercenageRangeValue"><?php echo esc_html($click_n_chat_setting_autoreply->matching_percenage);  ?></span>%</b>
        <p id="name-description">
            Higher value means more exact matching of <b>Query</b> & <b>Keywords</b> with user message.
        </p>
    </div>
    <div class="cnc-custom-gap-row">
        <div class="form-wrap cnc-custom-col-gap-8">
            <div class="cnc-container-no-padding cnc-bg-white cnc-shadow">
            	<table class="wp-list-table cnc-list-table striped widefat fixed table-view-list pages">
                    <thead>
                        <tr>
                            <th>Query</th>
                            <th>Keyword</th>
                            <th>Reply</th>
                            <th>Chat<br />Suggestion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $row) { ?>
                            <tr>
                                <td>
									<?php echo esc_html($row->query); ?>
                               		<div class="row-actions">
                                        <span class="edit"><a href="?page=wa-clicknchat&tab=add_edit_autoreply&mode=edit&id=<?php echo esc_attr($row->id);  ?>">Edit</a> | </span><span class="trash">
                                        <form id="trashReplyForm<?php echo esc_attr($row->id); ?>" method="post" action="?page=wa-clicknchat&tab=add_edit_autoreply&mode=delete" style="display: inline;">
                                            <?php wp_nonce_field($nonce, '_wpnonce'); ?>
                                            <input type="hidden" name="id" value="<?php echo esc_attr($row->id); ?>">
                                            <input type="hidden" name="action" value="delete">
                                            <a href="#" data-form-id="<?php echo esc_attr($row->id); ?>" class="submitdelete trashReplyButton" style="border-radius:0px .375rem .375rem 0px" type="submit">Trash</a>
                                        </form> 
                                   </div>
                                </td>
                                <td><?php echo wp_kses_post($row->keyword); ?></td>
                                <td><?php echo wp_kses_post($row->reply); ?></td>
                                <td>
                                    <label class="cnc-switch">
                                        <input data-rid="<?php echo esc_html($row->id)  ?>" data-col="is_suggestion" class="cnc-auto-suggestion" type="checkbox" <?php echo esc_html(($row->is_suggestion == "1" ? "checked" : ""));  ?> >
                                        <span class="cnc-switch-slider"></span>
                                    </label>
                                </td>
                             </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div id="message" class="inline notice">
                <p class="help">
                    <b>Chat Suggestion:</b> Active Chat Suggestion <b>Query</b> displays chat popup suggestions for both Auto Reply and ChatGPT conversations.
                </p>
            </div>
       	</div>
  	</div>
    
<?php 
}