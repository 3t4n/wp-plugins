<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function click_n_chat_chatgpt() {
	global $wpdb;
	$nonce = 'setting-user';
	
 
    if (isset($_POST['action'])) {
		if (  ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_wpnonce'])), $nonce) ) {
			 die( 'Security check' ); 
		} 
		$click_n_chat_setting_chatgpt = new click_n_chat_setting_chatgpt();
		$click_n_chat_setting_chatgpt->api_key = sanitize_text_field($_POST['api_key']);
		$click_n_chat_setting_chatgpt->max_token = sanitize_text_field($_POST['max_token']);
		$click_n_chat_setting_chatgpt->temperature = sanitize_text_field($_POST['temperature']);
		$click_n_chat_setting_chatgpt->presence_penalty = sanitize_text_field($_POST['presence_penalty']);
		$click_n_chat_setting_chatgpt->frequency_penalty = sanitize_text_field($_POST['frequency_penalty']);
		$click_n_chat_setting_chatgpt->ai_models = sanitize_text_field($_POST['ai_models']);
		$click_n_chat_setting_chatgpt->ai_instructions =  ($_POST['ai_instructions']);
		
		update_option('click_n_chat_setting_chatgpt', $click_n_chat_setting_chatgpt);
			
	}
	
	$click_n_chat_setting_chatgpt = get_option('click_n_chat_setting_chatgpt');
?>
<div class="my-3">   
    <h1 class="wp-heading-inline">ChatGPT</h1>
</div>
<form id="userForm" method="post" enctype="multipart/form-data">
	<?php wp_nonce_field($nonce, '_wpnonce'); ?>
    <input type="hidden" name="action" value="setting">
    
    <div class="cnc-custom-gap-row">
        <div class="form-wrap cnc-custom-col-gap-6">
            <div class="cnc-container cnc-bg-white cnc-shadow">
            	<div class="tab-pane fade show active" id="chatgpt" role="tabpanel" aria-labelledby="chatgpt-tab">
                	<div class="form-field">
                        <label for="is_active">API Key: </label>
                        <input name="api_key" type="password" id="api_key" value="<?php echo esc_html($click_n_chat_setting_chatgpt->api_key);  ?>" class="regular-text">
                    </div>
                    <div class="form-field">
                        <label for="is_active">Max Tokens (0 - 4000): </label>
                        <input name="max_token" type="number" id="max_token" min="0" max="4000" value="<?php echo esc_html($click_n_chat_setting_chatgpt->max_token);  ?>" class="regular-text">
                        <p id="name-description">
                            <b>Max Tokens:</b> Limits the length of the generated response.
                        </p>
                    </div>
                    <div class="form-field">
                        <label for="is_active">Temperature: </label>
                        <input type="range" class="form-rangs customRange" value="<?php echo esc_html($click_n_chat_setting_chatgpt->temperature);  ?>" min="0" max="1" step="0.01" name="temperature" data-span="temperatureRangeValue">
                        <b><span id="temperatureRangeValue"><?php echo esc_html($click_n_chat_setting_chatgpt->temperature);  ?></span>%</b>
                        <p id="name-description">
                            <b>Temperature:</b> Controls the creativity of the response (0.0 is more deterministic, 1.0 is more creative).
                        </p>
                    </div>
                    <div class="form-field">
                        <label for="is_active">Presence Penalty: </label>
                        <input type="range" class="form-rangs customRange" value="<?php echo esc_html($click_n_chat_setting_chatgpt->presence_penalty);  ?>" min="-2" max="2" step="0.01" name="presence_penalty" data-span="presencePenaltyRangeValue">
                                <b><span id="presencePenaltyRangeValue"><?php echo esc_html($click_n_chat_setting_chatgpt->presence_penalty);  ?></span>%</b>
                        <p id="name-description">
                            <b>Presence Penalty:</b> Adjusts how much the model avoids using new topics or repeating previously mentioned ones. A value between -2.0 and 2.0 is typical, where positive values discourage repetition.
                        </p>
                    </div>
                    <div class="form-field">
                        <label for="is_active">Frequency Penalty: </label>
                        <input type="range" class="form-rangs customRange" value="<?php echo esc_html($click_n_chat_setting_chatgpt->frequency_penalty);  ?>" min="-2" max="2" step="0.01" name="frequency_penalty" data-span="frequencyPenaltyRangeValue">
                                <b><span id="frequencyPenaltyRangeValue"><?php echo esc_html($click_n_chat_setting_chatgpt->frequency_penalty);  ?></span>%</b>
                        <p id="name-description">
                            <b>Frequency Penalty:</b> Adjusts how much the model avoids using the same words or phrases repeatedly. A value between -2.0 and 2.0 is typical, where positive values discourage frequent repetition.
                        </p>
                    </div>
                    <div class="form-field">
                        <label for="is_active">ChatGPT AI Models: </label>
                        <select name="ai_models" class="form-select cnc-select">                
                            <option <?php echo esc_html($click_n_chat_setting_chatgpt->ai_models == "gpt-3.5-turbo" ? 'selected' : '');  ?> value="gpt-3.5-turbo">GPT-3 turbo</option>
                            <option <?php echo esc_html($click_n_chat_setting_chatgpt->ai_models == "gpt-4" ? 'selected' : '');  ?> value="gpt-4">GPT-4</option>
                        </select>
                    </div>
                    <div class="form-field">
                        <p id="name-description">
                            <b>Include Auto Reply:</b> Click and Chat Pro offers an amazing feature to include Auto Reply. It doesn't connect to ChatGPT AI if it detects an Auto Reply 
                        </p>
                    </div>  
                    <div class="form-field">
                        <label for="is_active">Include Auto Reply: </label>
                        <label class="cnc-switch cnc-pro-label">
                            <input name="include_auto_reply"   class="cnc-user-status" type="checkbox" disabled="disabled"	 >
                            <span class="cnc-switch-slider"></span>
                        </label>
                        <p id="name-description">
                            <b>Include Auto Reply:</b>It doesn't connect to ChatGPT AI if it detects an <a href="?page=wa-users&tab=autoreply"><b>Auto Reply</b></a> 
                        </p>
                    </div>  
                </div>
            </div>
            <p class="submit">
                <input type="submit" name="submit" id="submit" class="button button-primary" value="Update ChatGPT Setting">
            </p> 
        </div>
        <div class="form-wrap cnc-custom-col-gap-6">
            <div class="cnc-container cnc-bg-white cnc-shadow">
            	<div class="tab-pane fade" id="instructions" role="tabpanel" aria-labelledby="instructions-tab">
                     <div class="form-field">
                        <label for="is_active">Open AI Instructions (max 1000 character): </label>
                        <textarea maxlength="1000" name="ai_instructions" rows="10" style="width:100%"><?php echo esc_html($click_n_chat_setting_chatgpt->ai_instructions);  ?></textarea>
                        <p id="name-description">
                            <b>Open AI Instructions:</b> is a message you give to an AI assistant to tell it how to behave or what role it should play. Think of it like setting instructions for a helper who's about to assist you. For instance, if you want the AI to act like a friendly shopping assistant who helps with online orders, you would include that information in the system content.
							<br />
                            <b>Example:</b>
                            <br />
                            If you want the AI to help customers check out at an online clothing store, you would tell it:
                            <br />
                            <li><b>What to Do:</b></li> Help with checking out, including handling cart items, applying discounts, and guiding through payment.
                            <li><b>How to Act:</b></li> Be clear, friendly, and make sure the checkout process is easy for the customer.
                            This system content guides the AI's responses and behavior, making sure it provides the right kind of help according to your needs.
                            <br /><br />
                            <b>Instructions Exmaple:</b> You are a virtual assistant for a clothing store, specifically designed to help customers with the checkout process. Assist customers by guiding them through each step of the checkout process, including reviewing their cart, applying discount codes, selecting shipping options, and completing payment. Provide clear and accurate information, and ensure a smooth and user-friendly checkout experience. Address any questions or issues they may have related to the checkout process.
                            <br /><br />
                            # Style<br />
                            Respond to the user inquiry in HTML format. Format the text with appropriate HTML tags, including &#x3C;strong&#x3E; for bold text, &#x3C;ul&#x3E; and &#x3C;li&#x3E; for lists, and &#x3C;p&#x3E; for paragraphs.
                        </p>
                     </div>  
                      
                </div>
            </div>
        </div>
	</div>    
          
</form>

<?php 
}