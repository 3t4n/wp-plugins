<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function click_n_chat_setting() {
	global $wpdb;
	
	
	$nonce = 'setting-user';
	$gradient_colors = array(
		'linear-gradient(180deg, rgb(119, 136, 153) 0%, rgb(100, 110, 130) 35%, rgb(80, 90, 100) 100%)',
		'linear-gradient(180deg, rgb(70, 130, 180) 0%, rgb(60, 120, 160) 35%, rgb(40, 100, 140) 100%)',
		'linear-gradient(180deg, rgb(255, 127, 80) 0%, rgb(240, 100, 60) 35%, rgb(220, 70, 40) 100%)',
		'linear-gradient(180deg, rgb(255, 182, 193) 0%, rgb(255, 150, 180) 35%, rgb(255, 105, 180) 100%)',
		'linear-gradient(180deg, rgb(84,207,96) 0%, rgb(68,197,84) 35%, rgb(45,184,66) 100%)'
	);
	$background_colors = array(
		'#FF5733','#6699FF','#70aca9','#1E1E1E','#FFC300'
	);
	$text_colors = array(
		'#FFFFFF', '#000000'
	);
	$chat_skin_colors = array(
		'#CCF7FF', '#F0F0F0', '#FFFFFF', '#cae7fc', '#F7E2A0'
	);
     if (isset($_POST['action'])) {
		if (  ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_wpnonce'])), $nonce) ) {
			 die( 'Security check' ); 
		} 

		$click_n_chat_setting_popup_old = get_option('click_n_chat_setting_popup');
		
		$click_n_chat_setting_popup = new click_n_chat_setting_popup();
 
		$click_n_chat_setting_popup->show_header = sanitize_text_field($_POST['show_header']) == "on" ? 1 : 0;
		$click_n_chat_setting_popup->title = sanitize_text_field($_POST['popup_title']);
		$click_n_chat_setting_popup->header_padding = sanitize_text_field($_POST['header_padding']);
		$click_n_chat_setting_popup->bg_color = sanitize_text_field($_POST['bg_color']);
		$click_n_chat_setting_popup->txt_color = sanitize_text_field($_POST['txt_color']);
		$click_n_chat_setting_popup->border_style = sanitize_text_field($_POST['border_style']);
		$click_n_chat_setting_popup->pop_type = sanitize_text_field($_POST['pop_type']);
		$click_n_chat_setting_popup->socialwidgets_no_availability = sanitize_text_field($_POST['socialwidgets_no_availability']);
		//$click_n_chat_setting_popup->popup_width = sanitize_text_field($_POST['popup_width']);
		$click_n_chat_setting_popup->popup_position = sanitize_text_field($_POST['popup_position']);
		$click_n_chat_setting_popup->pop_up_style = sanitize_text_field($_POST['pop_up_style']);
		$click_n_chat_setting_popup->pop_up_icon = sanitize_text_field($_POST['pop_up_icon']);
		
		$click_n_chat_setting_popup->mypopup_icon = $click_n_chat_setting_popup_old->mypopup_icon;
 
		$click_n_chat_setting_popup->widget_style = sanitize_text_field($_POST['widget_style']);
		$click_n_chat_setting_popup->widget_icon_size = sanitize_text_field($_POST['widget_icon_size']);
		
		$click_n_chat_setting_popup->chat_name_start = sanitize_text_field($_POST['chat_name_start']) == "on" ? 1 : 0;
		$click_n_chat_setting_popup->chat_bg_color = sanitize_text_field($_POST['chat_bg_color']);
		
		$click_n_chat_time_zone = sanitize_text_field($_POST['click_n_chat_time_zone']);
		update_option('click_n_chat_time_zone', $click_n_chat_time_zone);
		
		update_option('click_n_chat_setting_popup', $click_n_chat_setting_popup);
		
		update_option('click_n_chat_greetings_message', sanitize_text_field(htmlentities($_POST['click_n_chat_greetings_message'])));
		
		update_option('click_n_chat_is_enable', sanitize_text_field($_POST['click_n_chat_is_enable']) == "on" ? 1 : 0);
			
	}
    $table_name = $wpdb->prefix . 'cnc_social_users';
	
	$click_n_chat_setting_popup = get_option('click_n_chat_setting_popup');
	$click_n_chat_greetings_message = get_option('click_n_chat_greetings_message');
	$click_n_chat_is_enable = get_option('click_n_chat_is_enable');
 
	
	$pop_up_style = $click_n_chat_setting_popup->pop_up_style;
?>
<form id="userForm" method="post" enctype="multipart/form-data">
<?php wp_nonce_field($nonce, '_wpnonce'); ?>
<input type="hidden" name="action" value="setting">    
<div class="my-3">   
    <h1 class="wp-heading-inline">Setting</h1>
    <div style="display: inline-flex;">
        <label for="welcome_message">Enable Plugin?</label>&nbsp;&nbsp;
        <label class="cnc-switch">
            <input name="click_n_chat_is_enable" id="click_n_chat_is_enable" class="click_n_chat_is_enable" type="checkbox" <?php echo esc_html(($click_n_chat_is_enable == "1" ? "checked" : ""));  ?> <?php  echo esc_html((get_option('click_n_chat_is_active') == "0") ? "disabled" : ""); ?>>
            <span class="cnc-switch-slider"></span>
        </label>
    </div>
</div>


<div class="wrap">
    <h2 class="nav-tab-wrapper">
        <a href="#" class="nav-tab nav-tab-active" data-tab="popup-tab">Popup</a>
        <a href="#" class="nav-tab" data-tab="pop-widget-tab">Popup Widget</a>
        <a href="#" class="nav-tab" data-tab="loading-control-tab">Loading Control</a>
        <a href="#" class="nav-tab" data-tab="page-widget-tab">Page Widget</a>
        <a href="#" class="nav-tab" data-tab="chat-tab">Chat</a>
        <a href="#" class="nav-tab" data-tab="timezone-tab">Timezone</a>
    </h2>

    <div class="tab-content form-wrap">
        <div id="popup-tab" class="tab-content-item">
        	
            <div class="cnc-custom-gap-row mt-3">
                <div class="form-wrap cnc-custom-col-gap-6">
                	<div class="cnc-container cnc-bg-white cnc-shadow">
                    	<div class="form-field">
                            <label for="name">Show Popup Header:</label>
                            <label class="cnc-switch">
                                <input name="show_header" id="show_header" class="cnc-user-status" type="checkbox" <?php echo esc_html(($click_n_chat_setting_popup->show_header == "1" ? "checked" : ""));  ?> >
                                <span class="cnc-switch-slider"></span>
                            </label>
                        </div>
                        <div class="form-field">
                            <label for="name">Header Text:</label>
                            <textarea name="popup_title" type="text" id="popup_title" class="form-control cnc-header-info" placeholder="Flag92" row="1"><?php echo esc_html(stripslashes(html_entity_decode($click_n_chat_setting_popup->title)));  ?></textarea>
                            <p class="cnc-pro-label">
                                    <b>Title: </b> You can add HTML code here. <a id="show-header-code-view" href="javascript:void(0)">Example of HTML code</a>	
                                
                                <div id="cnc-header-code-view" style="display:none">How can we help you today? &lt;img src=&quot;https://s.w.org/images/core/emoji/15.0.3/svg/1f44b.svg&quot; style=&quot;width:20px&quot;&gt;
&lt;br /&gt;
&lt;p style=&quot;color:#3d3d3d; font-size:11px; color:#FFFFFF&quot;&gt;
    &lt;b&gt;Click n Chat&lt;/b&gt; Social Solution with AI-driven ChatGPT Chatbot.
&lt;/p&gt;
</div>
							</p>
                        </div>
                        <div class="form-field">
                            <label for="designation">Header Padding:</label>
                            <input type="range" class="form-rangs customRange" value="<?php echo esc_html($click_n_chat_setting_popup->header_padding);  ?>" min="1" max="20" step="1" name="header_padding" id="header_padding" data-span="headerPaddingRangeValue">
							<b><span id="headerPaddingRangeValue"><?php echo esc_html($click_n_chat_setting_popup->header_padding);  ?></span>%</b>
                        </div>
                        <div class="form-field">
                            <label for="designation">Background Color:</label>
                            <div class="cnc-color-picker-container">
                              <input type="hidden" id="bg_color" name="bg_color" value="<?php echo esc_attr($click_n_chat_setting_popup->bg_color); ?>">
                              <a id="btn_bg_color" style="background:<?php echo esc_attr($click_n_chat_setting_popup->bg_color); ?>" class="cnc-color-btn cncColorPickerBtn" data-option = "cncChatColorOptions"><span class="dashicons dashicons-color-picker" style="color:#F1F1F1"></span></a>
                              <div class="cnc-color-options cncChatColorOptions">
                                <?php
                                foreach ($background_colors as $color) {
                                ?>
                                    <div data-id="bg_color" data-option = "cncChatColorOptions" class="cnc-color-option" style="background:<?php echo esc_attr($color) ?>;" data-color="<?php echo esc_attr($color) ?>"></div>
                                <?php
                                }
                                foreach ($gradient_colors as $color) {
                                ?>
                                    <div data-id="bg_color" data-option = "cncChatColorOptions" class="cnc-color-option" style="background:<?php echo esc_attr($color) ?>;" data-color="<?php echo esc_attr($color) ?>"></div>
                                <?php
                                }
                                ?>
                                <div class="cnc-pro-label">
                                	<label>Custom color:</label>
                                	<input type="text" placeholder="Custom Color #FFFFFF" style="width:100%" disabled="disabled">
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="form-field">
                            <label for="designation">Text Color:</label>
                            <div class="cnc-color-picker-container">
                              <input type="hidden" id="txt_color" name="txt_color" value="<?php echo esc_attr($click_n_chat_setting_popup->txt_color); ?>">
                              <a id="btn_txt_color" style="background:<?php echo esc_attr($click_n_chat_setting_popup->txt_color); ?>" class="cnc-color-btn cncColorPickerBtn" data-option = "cncTxtColorOptions"><span class="dashicons dashicons-color-picker" style="color:#F1F1F1"></span></a>
                              <div class="cnc-color-options cncTxtColorOptions">
                              	<div class="cnc-color-option" data-id="txt_color" data-option = "cncTxtColorOptions" style="background-color: #86CD91;" data-color="#86CD91"></div>
                                <div class="cnc-color-option" data-id="txt_color" data-option = "cncTxtColorOptions" style="background-color: #FF6060;" data-color="#FF6060"></div>
                                <div class="cnc-color-option" data-id="txt_color" data-option = "cncTxtColorOptions" style="background-color: #000000;" data-color="#000000"></div>
                                <div class="cnc-color-option" data-id="txt_color" data-option = "cncTxtColorOptions" style="background-color: #FFFFFF; border:1px solid #F1F1F1" data-color="#FFFFFF"></div>
                                <div class="cnc-color-option" data-id="txt_color" data-option = "cncTxtColorOptions" style="background-color: #EEF075;" data-color="#EEF075"></div>
                                <br />
                                <div class="cnc-pro-label">
                                	<label>Custom color:</label>
                                	<input type="text" placeholder="Custom Color #FFFFFF" style="width:100%" disabled="disabled">
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="form-field">
                            <label for="designation">Border Style:</label>
                            <div class="cnc-border-options cnc-radio-group">
                                <label>
                                    <input type="radio" class="cnc-header-info" id="no-border" name="border_style" <?php echo esc_html($click_n_chat_setting_popup->border_style == "0px 0px 0px 0px" ? "checked" : "");  ?> value="0px 0px 0px 0px">
                                    <span class="cnc-border-view no-border cnc-checkpoint"></span>
                                    <span class="cnc-checkmark">&#10003;</span>
                                </label>
                                
                                <label>
                                    <input type="radio" class="cnc-header-info" id="border-left-top" name="border_style" <?php echo esc_html($click_n_chat_setting_popup->border_style == "20px 0px 0px 0px" ? "checked" : "");  ?> value="20px 0px 0px 0px">
                                    <span class="cnc-border-view border-left-top cnc-checkpoint"></span>
                                    <span class="cnc-checkmark">&#10003;</span>
                                </label>
                                
                                <label>
                                    <input type="radio" class="cnc-header-info" id="border-left-top" name="border_style" <?php echo esc_html($click_n_chat_setting_popup->border_style == "0px 0px 0px 20px" ? "checked" : "");  ?> value="0px 0px 0px 20px">
                                    <span class="cnc-border-view border-left-bottom cnc-checkpoint"></span>
                                    <span class="cnc-checkmark">&#10003;</span>
                                </label>
                                <label>
                                    <input type="radio" class="cnc-header-info" id="border-left-top" name="border_style" <?php echo esc_html($click_n_chat_setting_popup->border_style == "0px 20px 0px 0px" ? "checked" : "");  ?> value="0px 20px 0px 0px">
                                    <span class="cnc-border-view border-right-top cnc-checkpoint"></span>
                                    <span class="cnc-checkmark">&#10003;</span>
                                </label>
                                <label>
                                    <input type="radio" class="cnc-header-info" id="border-left-top" name="border_style" <?php echo esc_html($click_n_chat_setting_popup->border_style == "0px 0px 20px 0px" ? "checked" : "");  ?> value="0px 0px 20px 0px">
                                    <span class="cnc-border-view border-right-bottom cnc-checkpoint"></span>
                                    <span class="cnc-checkmark">&#10003;</span>
                                </label>
                                <label>
                                    <input type="radio" class="cnc-header-info" id="border-left-right-top" name="border_style" <?php echo esc_html($click_n_chat_setting_popup->border_style == "20px 20px 0px 0px" ? "checked" : "");  ?> value="20px 20px 0px 0px">
                                    <span class="cnc-border-view border-left-right-top cnc-checkpoint"></span>
                                    <span class="cnc-checkmark">&#10003;</span>
                                </label>
                                <label>
                                    <input type="radio" class="cnc-header-info" id="border-all" name="border_style" <?php echo esc_html($click_n_chat_setting_popup->border_style == "20px 20px 20px 20px" ? "checked" : "");  ?> value="20px 20px 20px 20px">
                                    <span class="cnc-border-view border-all cnc-checkpoint"></span>
                                    <span class="cnc-checkmark">&#10003;</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-field">
                        	<label for="welcome_message">Popup Position:</label>
                            <div class="pb-2">
                                <span>
                                    <input type="radio" name="popup_position" value="left" <?php echo esc_html($click_n_chat_setting_popup->popup_position == "left" ? 'checked="checked"' : '');  ?>>
                                	Left
                                </span>
                                
                                <span>
                                    <input type="radio" name="popup_position" value="right" <?php echo esc_html($click_n_chat_setting_popup->popup_position == "right" ? 'checked="checked"' : '');  ?>>
                                	Right
                                </span>
                                 
                            </div>
                        </div>
                        <div class="form-field">
                            <label for="designation">Popup Icon:</label>
                            <div class="cnc-radio-group cnc-link-option">
                                <label>
                                    <input type="radio" name="pop_up_icon" value="<?php echo esc_html(CLICK_N_CHAT_DIR_URL . 'assets/images/cnccalliconw.png');  ?>" <?php echo esc_html($click_n_chat_setting_popup->pop_up_icon == CLICK_N_CHAT_DIR_URL . 'assets/images/cnccalliconw.png' ? 'checked="checked"' : '');  ?>>
                                        <img id="cnccalliconw" style="background:<?php echo esc_html($click_n_chat_setting_popup->bg_color);?>; width:40px; height:40px; border-radius:50%" class="cnc-checkpoint" src="<?php echo esc_html(CLICK_N_CHAT_DIR_URL .'assets/images/cnccalliconw.png');  ?>">
                                    <span class="cnc-checkmark">&#10003;</span>
                                    <br />Chat n Click
                                </label>
                                
                                <label>
                                    <input type="radio" name="pop_up_icon" value="<?php echo esc_html(CLICK_N_CHAT_DIR_URL . 'assets/images/chatlefticonlw.png');  ?>" <?php echo esc_html($click_n_chat_setting_popup->pop_up_icon == CLICK_N_CHAT_DIR_URL . 'assets/images/chatlefticonlw.png' ? 'checked="checked"' : '');  ?>>
                                        <img id="chatlefticonlw" style="background:<?php echo esc_html($click_n_chat_setting_popup->bg_color);?>; width:40px; height:40px; border-radius:50%" class="cnc-checkpoint" src="<?php echo esc_html(CLICK_N_CHAT_DIR_URL .'assets/images/chatlefticonlw.png');  ?>">
                                    <span class="cnc-checkmark">&#10003;</span>
                                    <br />Bot
                                </label>
                                
                                <label>
                                    <input type="radio" name="pop_up_icon" value="<?php echo esc_html(CLICK_N_CHAT_DIR_URL . 'assets/images/whatsapp.png');  ?>" <?php echo esc_html($click_n_chat_setting_popup->pop_up_icon == CLICK_N_CHAT_DIR_URL . 'assets/images/whatsapp.png' ? 'checked="checked"' : '');  ?>>
                                    <img class="cnc-checkpoint" src="<?php echo esc_html(CLICK_N_CHAT_DIR_URL .'assets/images/whatsapp.png');  ?>" alt="WhatsApp" style="width:40px; height:40px; border-radius:50%">
                                    <span class="cnc-checkmark">&#10003;</span>
                                    <br />WhatsApp
                                </label>
                            
                                <label>
                                    <input type="radio" name="pop_up_icon" value="<?php echo esc_html(CLICK_N_CHAT_DIR_URL . 'assets/images/telegram.png');  ?>" <?php echo esc_html($click_n_chat_setting_popup->pop_up_icon == CLICK_N_CHAT_DIR_URL . 'assets/images/telegram.png' ? 'checked="checked"' : '');  ?>>
                                    <img class="cnc-checkpoint" width="20px" height="20px" src="<?php echo esc_html(CLICK_N_CHAT_DIR_URL .'assets/images/telegram.png');  ?>" alt="Telegram" style="width:40px; height:40px; border-radius:50%">
                                    <span class="cnc-checkmark">&#10003;</span>
                                    <br />Telegram
                                </label>
                                <?php if($click_n_chat_setting_popup->mypopup_icon != "") { ?>
                                <label>
                                    <input type="radio" name="pop_up_icon" value="<?php echo esc_html($click_n_chat_setting_popup->mypopup_icon);  ?>" <?php echo esc_html($click_n_chat_setting_popup->pop_up_icon == $click_n_chat_setting_popup->mypopup_icon ? 'checked="checked"' : '');  ?>>
                                    <img class="cnc-checkpoint" width="20px" height="20px" src="<?php echo esc_html(esc_url($click_n_chat_setting_popup->mypopup_icon));  ?>" alt="mypopup icon" style="width:40px; height:40px; border-radius:50%">
                                    <span class="cnc-checkmark">&#10003;</span>
                                    <br />Custom Icon
                                </label>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-field">
                            <label for="icon">Upload Custom Icon:</label>
                            <input type="file" class="cnc-pro-label" disabled="disabled">
                        </div>
                   	</div>
                </div>
                <div class="form-wrap cnc-custom-col-gap-6">
                    <div class="cnc-right-fixed">  
                    	<div id="cnc-chatbot-popup">
                            <div>
                                <div class="cnc-chatbot-popup-header" style="background:<?php echo esc_html($click_n_chat_setting_popup->bg_color);  ?>; border-radius:<?php echo esc_html($click_n_chat_setting_popup->border_style);  ?>;padding:<?php echo esc_html($click_n_chat_setting_popup->header_padding);  ?>px; width:350px">
                                    <h1 class="cnc-text-header" style="font-size:20px; color:<?php echo esc_html($click_n_chat_setting_popup->txt_color);  ?>;"><?php echo wp_kses_post(stripslashes(html_entity_decode($click_n_chat_setting_popup->title)));  ?></h1>
                                </div>
                            </div>
                            <div id="<?php echo esc_html($pop_up_style);  ?>-cnc-widget" style="height: auto; overflow-y: auto;">
                               <!-- <a class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-link" href="#">
                                <div class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-container">
                                    <div class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-item">
                                        <div class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-icon-div">
                                            <img src="<?php echo esc_html((CLICK_N_CHAT_DIR_URL . 'assets/images/call-icon1.png'));  ?>" class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-icon">
                                        </div>
                                        <div class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-details">
                                            <p class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-designation">Support</p>
                                            <h3 class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-name">John Doe</h3>
                                            <p class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-description">Available</p>
                                        </div>
                                    </div>
                                </div>
                                </a>-->
                            </div>
                            <br />
                        </div> 
                    </div>
               	</div>
           	</div>
        </div>
        
        <!-- Popup Wodget -->
        <div id="pop-widget-tab" class="tab-content-item" style="display: none;">
        	<div class="cnc-custom-gap-row mt-5">
                <div class="form-wrap cnc-custom-col-gap-6">
                    <div class="cnc-container cnc-bg-white cnc-shadow">
                        <div class="form-field">
                            <label for="pop_up_style">Widgets:</label>
                            <select id="pop_up_style" name="pop_up_style" class="form-select cnc-select">
                               <option <?php echo esc_html($click_n_chat_setting_popup->pop_up_style == "wgs1" ? 'selected' : '');  ?> value="wgs1">Widget 1</option>
                               <option <?php echo esc_html($click_n_chat_setting_popup->pop_up_style == "wgs2" ? 'selected' : '');  ?> value="wgs2">Widget 2</option>
                               <option <?php echo esc_html($click_n_chat_setting_popup->pop_up_style == "wgs3" ? 'selected' : '');  ?> value="wgs3">Widget 3</option>
                               <option <?php echo esc_html($click_n_chat_setting_popup->pop_up_style == "wgs4" ? 'selected' : '');  ?> value="wgs4">Widget 4</option>
                               <option <?php echo esc_html($click_n_chat_setting_popup->pop_up_style == "wgs5" ? 'selected' : '');  ?> value="wgs5">Widget 5</option>
                               <option <?php echo esc_html($click_n_chat_setting_popup->pop_up_style == "wgs6" ? 'selected' : '');  ?> value="wgs6">Widget 6</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-wrap cnc-custom-col-gap-4">
                    <div class="cnc-containers">	
                         <?php
                            $items = ['1', '2', '3', '4', '5', '6'];
                            $rows = 2;
                            $columns = ceil(count($items) / $rows);
                            
                            $table = array_fill(0, $rows, array());
                            
                            for ($i = 0; $i < count($items); $i++) {
                                $rowIndex = $i % $rows;
                                $table[$rowIndex][] = $items[$i];
                            }
                                     
                            foreach ($table as $row) {
                            ?><?php
                            foreach ($row as $item) {
                                $pop_up_style = "wgs".$item;
                            ?>
                            <div id="pop-widget-<?php echo esc_html($pop_up_style);  ?>" style="display:<?php echo esc_html($click_n_chat_setting_popup->pop_up_style == $pop_up_style ? 'block' : 'none');  ?>">
                                <div id="cnc-chatbot-popup" style="box-shadow:none; border-radius:0px;height: 100px; width:310px">
                                    <div id="<?php echo esc_html($pop_up_style);  ?>-cnc-widget" style="height: auto; overflow-y: auto; margin:0px">
                                        
                                        <div class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-container">
                                            <div class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-item">
                                                
                                                <div class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-icon-div">
                                                    <img src="<?php echo esc_html((CLICK_N_CHAT_DIR_URL . 'assets/images/call-icon11.png'));  ?>" class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-icon">
                                                </div>
                                                <div class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-details">
                                                    <span class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-designation">Support</span>
                                                    <span class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-name">John Doe</span>
                                                    <span class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-description">Need Help? Just Click</span>
                                                </div>
                                            </div>
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                            
                            <?php
                        } 
                        ?>
                    </div>
                </div>
           	</div>
        </div>
        
        <!-- Loadidng Control -->
        <div id="loading-control-tab" class="tab-content-item" style="display: none;">
            <p class="mt-3">Popup Loading Control Options</p>
            <div class="cnc-custom-gap-row mt-3">
                <div class="form-wrap cnc-custom-col-gap-6">
                    <div class="cnc-container cnc-bg-white cnc-shadow">      
                    	<div class="form-field">
                        	<label for="welcome_message">Default Type:</label>
                            <div class="pb-2">
                                <span class="pop_type_hover" data-img="socialwidgets">
                                    <input type="radio" name="pop_type" value="socialwidgets" <?php echo esc_html($click_n_chat_setting_popup->pop_type == "socialwidgets" ? 'checked="checked"' : '');  ?> >
                                	Social Widgets
                                </span>
                                
                                <span class="pop_type_hover cnc-pro-label" data-img="socialicon">
                                    <input type="radio" name="pop_type" value="socialicon" <?php echo esc_html($click_n_chat_setting_popup->pop_type == "socialicon" ? 'checked="checked"' : '');  ?> disabled="disabled">
                                	Social Icon
                                </span>
                                
                                <span class="pop_type_hover" data-img="chatgpt">
                                    <input type="radio" name="pop_type" value="chatgpt" <?php echo esc_html($click_n_chat_setting_popup->pop_type == "chatgpt" ? 'checked="checked"' : '');  ?> >
                                	ChatGPT	
                                </span>
                                
                                <span class="pop_type_hover" data-img="autoreply">
                                    <input type="radio" name="pop_type" value="autoreply" <?php echo esc_html($click_n_chat_setting_popup->pop_type == "autoreply" ? 'checked="checked"' : '');  ?> >
                                	Auto Reply 
                                </span>
                            </div>
                        </div>  
                        
                        <div class="form-field" id="noAvailabilityOption" style="display:<?php echo esc_html($click_n_chat_setting_popup->pop_type == "socialwidgets" ? 'block' : 'none');  ?>">
                            <label for="welcome_message">If no social user is available, automatically move to:</label>
                            <input name="socialwidgets_no_availability" <?php echo esc_html($click_n_chat_setting_popup->socialwidgets_no_availability == "autoreply" ? 'checked="checked"' : '');  ?> type="radio" value="autoreply" /> Auto Reply
                            
                            <input name="socialwidgets_no_availability" <?php echo esc_html($click_n_chat_setting_popup->socialwidgets_no_availability == "chatgpt" ? 'checked="checked"' : '');  ?> type="radio" value="chatgpt" /> ChatGPT
                            
                        </div>   
                        <div class="form-field">
                            <label for="welcome_message">Display All Pages:</label>
                            <label class="cnc-switch">
                                <input name="display_all" id="display_all" type="checkbox" checked="checked" disabled="disabled">
                                <span class="cnc-switch-slider"></span>
                            </label>
                            <p id="name-description">
                                <b>Display All Pages:</b> option will ensure that <b>Default Type</b> is visible on all pages, regardless of whether any other options are selected
                            </p>
                        </div>
                        <hr />
                        <div class="cnc-pro-label">
                        	<p id="name-description">
                                <b>Show popup on pages:</b> Use this feature to display a specific popup widget for certain products, posts, or pages by including or excluding them as needed.

                            </p>
                            <div class="form-field">
                                <label for="display_front_page">Home Page:</label>
                                <div class="pb-2">
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        None
                                    </span>
                                    
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        Social Widgets
                                    </span>
                                    
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        Social Icon
                                    </span>
                                    
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        ChatGPT	
                                    </span>
                                    
                                    <span class="pop_type_hover" >
                                        <input type="radio" disabled="disabled"> 	
                                        Auto Reply 
                                    </span>
                                </div>
                            </div>
                            <div class="form-field">
                                <label for="display_front_page">Blog Page:</label>
                                <div class="pb-2">
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        None
                                    </span>
                                    
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        Social Widgets
                                    </span>
                                    
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        Social Icon
                                    </span>
                                    
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        ChatGPT	
                                    </span>
                                    
                                    <span class="pop_type_hover" >
                                        <input type="radio" disabled="disabled"> 	
                                        Auto Reply 
                                    </span>
                                </div>
                            </div>
                            <div class="form-field">
                                <label for="display_front_page">Contact-Us URL Page:</label>
                                <div class="pb-2">
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        None
                                    </span>
                                    
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        Social Widgets
                                    </span>
                                    
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        Social Icon
                                    </span>
                                    
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        ChatGPT	
                                    </span>
                                    
                                    <span class="pop_type_hover" >
                                        <input type="radio" disabled="disabled"> 	
                                        Auto Reply 
                                    </span>
                                </div>
                            </div>
                            <div class="form-field">
                                <label for="display_front_page">WooCommerce Cart Page:</label>
                                <div class="pb-2">
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        None
                                    </span>
                                    
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        Social Widgets
                                    </span>
                                    
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        Social Icon
                                    </span>
                                    
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        ChatGPT	
                                    </span>
                                    
                                    <span class="pop_type_hover" >
                                        <input type="radio" disabled="disabled"> 	
                                        Auto Reply 
                                    </span>
                                </div>
                            </div>
                            <div class="form-field">
                                <label for="display_front_page">WooCommerce Checkout Page:</label>
                                <div class="pb-2">
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        None
                                    </span>
                                    
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        Social Widgets
                                    </span>
                                    
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        Social Icon
                                    </span>
                                    
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        ChatGPT	
                                    </span>
                                    
                                    <span class="pop_type_hover" >
                                        <input type="radio" disabled="disabled"> 	
                                        Auto Reply 
                                    </span>
                                </div>
                            </div>
                            <div class="form-field">
                                <label for="display_front_page">WooCommerce Accounnt Page:</label>
                                <div class="pb-2">
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        None
                                    </span>
                                    
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        Social Widgets
                                    </span>
                                    
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        Social Icon
                                    </span>
                                    
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        ChatGPT	
                                    </span>
                                    
                                    <span class="pop_type_hover" >
                                        <input type="radio" disabled="disabled"> 	
                                        Auto Reply 
                                    </span>
                                </div>
                            </div>
                            <div class="form-field">
                                <label for="display_front_page">WooCommerce Shop Page:</label>
                                <div class="pb-2">
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        None
                                    </span>
                                    
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        Social Widgets
                                    </span>
                                    
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        Social Icon
                                    </span>
                                    
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        ChatGPT	
                                    </span>
                                    
                                    <span class="pop_type_hover" >
                                        <input type="radio" disabled="disabled"> 	
                                        Auto Reply 
                                    </span>
                                </div>
                            </div>
                            <div class="form-field">
                                <label for="display_front_page">WooCommerce Product Page:</label>
                                <div class="pb-2">
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        None
                                    </span>
                                    
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        Social Widgets
                                    </span>
                                    
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        Social Icon
                                    </span>
                                    
                                    <span class="pop_type_hover">
                                        <input type="radio" disabled="disabled">
                                        ChatGPT	
                                    </span>
                                    
                                    <span class="pop_type_hover" >
                                        <input type="radio" disabled="disabled"> 	
                                        Auto Reply 
                                    </span>
                                </div>
                           </div>
                       </div>
                        <p id="name-description">
                            <b>Default Type</b> will be visible on any other page</p>
                        </p>
                   	</div>
               	</div>
                <div class="form-wrap cnc-custom-col-gap-4">
                	<div style="width:200px; border:1px solid #f1f1f1; border-radius:5px">
                    	<img style="width:100%; border-radius:5px" id="pop_type_view_img" src="<?php echo esc_html(CLICK_N_CHAT_DIR_URL .'assets/images/'.$click_n_chat_setting_popup->pop_type.'view.png');  ?>" />
                    </div>
                    <br />
                    <p>
                        <b>Social Widgets: </b> Onclick chat popup opens social users widgets
                    </p>
                    <p>
                        <b>Social Icon: </b> Onclick chat popup opens social users social icons 
                    </p>
                    <p>
                        <b>ChatGPT: </b> Onclick chat popup opens chat using <a href="?page=wa-clicknchat&tab=chatgpt">ChatGPT</a>
                    </p>
                    <p>
                        <b>Auto Reply: </b> Onclick chat popup opens chat using <a href="?page=wa-clicknchat&tab=autoreply">Auto Reply</a>
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Page Widget -->
        <div id="page-widget-tab" class="tab-content-item" style="display: none;">
            <p class="mt-2">
            	* Add the <b>[cnc_chatbot_widget]</b> shortcode to any page or post where you want the chatbot widget to appear. 
            </p>
            <div class="cnc-custom-gap-row mt-3">
                <div class="form-wrap cnc-custom-col-gap-6">
                    <div class="cnc-container cnc-bg-white cnc-shadow">
                        <div class="form-field">
                            <label for="widget_style">Widgets:</label>
                            <select id="widget_style" name="widget_style" class="form-select cnc-select">
                               <option <?php echo esc_html($click_n_chat_setting_popup->widget_style == "justicons" ? 'selected' : '');  ?> value="justicons">Social Icons</option>
                               <option <?php echo esc_html($click_n_chat_setting_popup->widget_style == "wgs1" ? 'selected' : '');  ?> value="wgs1">Widget 1</option>
                               <option <?php echo esc_html($click_n_chat_setting_popup->widget_style == "wgs2" ? 'selected' : '');  ?> value="wgs2">Widget 2</option>
                               <option <?php echo esc_html($click_n_chat_setting_popup->widget_style == "wgs3" ? 'selected' : '');  ?> value="wgs3">Widget 3</option>
                               <option <?php echo esc_html($click_n_chat_setting_popup->widget_style == "wgs4" ? 'selected' : '');  ?> value="wgs4">Widget 4</option>
                               <option <?php echo esc_html($click_n_chat_setting_popup->widget_style == "wgs5" ? 'selected' : '');  ?> value="wgs5">Widget 5</option>
                               <option <?php echo esc_html($click_n_chat_setting_popup->widget_style == "wgs6" ? 'selected' : '');  ?> value="wgs6">Widget 6</option>
                            </select>
                        </div>
                        <div class="form-field" id="justIconsSize" style="display:<?php echo esc_html($click_n_chat_setting_popup->widget_style == 'justicons' ? 'block' : 'none');  ?>">
                            <label for="welcome_message">Icons Size:</label>
                            <input type="range" class="form-rangs customRange" value="<?php echo esc_html($click_n_chat_setting_popup->widget_icon_size);  ?>" min="20" max="80" step="1" name="widget_icon_size" id="widget_icon_size" data-span="widgetIconSizeRangeValue">
                            <b><span id="widgetIconSizeRangeValue"><?php echo esc_html($click_n_chat_setting_popup->widget_icon_size);  ?></span>px</b>
widget_icon_size
						</div>
                    </div>
                </div>
                <div class="form-wrap cnc-custom-col-gap-4">
                    <div class="cnc-containers">	
                         <div id="justIconsView" style="display:<?php echo esc_html($click_n_chat_setting_popup->widget_style == 'justicons' ? 'block' : 'none');  ?>" style="text-align:center">
                             <img class="cnc-wooicons" src="<?php echo esc_html(CLICK_N_CHAT_DIR_URL . 'assets/images/svgs/whatsapp.svg'); ?>" width="<?php echo esc_html($click_n_chat_setting_popup->widget_icon_size);  ?>" />
                             <img class="cnc-wooicons" src="<?php echo esc_html(CLICK_N_CHAT_DIR_URL . 'assets/images/svgs/telegram.svg'); ?>" width="<?php echo esc_html($click_n_chat_setting_popup->widget_icon_size);  ?>" />
                             <img class="cnc-wooicons" src="<?php echo esc_html(CLICK_N_CHAT_DIR_URL . 'assets/images/svgs/youtube.svg'); ?>" width="<?php echo esc_html($click_n_chat_setting_popup->widget_icon_size);  ?>" />
                             <img class="cnc-wooicons" src="<?php echo esc_html(CLICK_N_CHAT_DIR_URL . 'assets/images/svgs/instagram.svg'); ?>" width="<?php echo esc_html($click_n_chat_setting_popup->widget_icon_size);  ?>" />
                         </div>
                         
                         <?php
                            $items = ['1', '2', '3', '4', '5', '6'];
                            $rows = 2;
                            $columns = ceil(count($items) / $rows);
                            
                            $table = array_fill(0, $rows, array());
                            
                            for ($i = 0; $i < count($items); $i++) {
                                $rowIndex = $i % $rows;
                                $table[$rowIndex][] = $items[$i];
                            }
                                     
                            foreach ($table as $row) {
                            ?><?php
                            foreach ($row as $item) {
                                $pop_up_style = "wgs".$item;
                            ?>
                            <div id="widget-<?php echo esc_html($pop_up_style);  ?>" style="display:<?php echo esc_html($click_n_chat_setting_popup->widget_style == $pop_up_style ? 'block' : 'none');  ?>">
                                <div id="cnc-chatbot-popup" style="box-shadow:none; border-radius:0px;height: 100px; width:310px">
                                    <div id="<?php echo esc_html($pop_up_style);  ?>-cnc-widget" style="height: auto; overflow-y: auto; margin:0px">
                                        
                                        <div class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-container">
                                            <div class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-item">
                                                
                                                <div class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-icon-div">
                                                    <img src="<?php echo esc_html((CLICK_N_CHAT_DIR_URL . 'assets/images/call-icon11.png'));  ?>" class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-icon">
                                                </div>
                                                <div class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-details">
                                                    <span class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-designation">Support</span>
                                                    <span class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-name">John Doe</span>
                                                    <span class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-description">Need Help? Just Click</span>
                                                </div>
                                            </div>
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                            
                            <?php
                        } 
                        ?>
                    </div>
                </div>
           	</div>
        </div>
        
        <!-- Chat -->
        <div id="chat-tab" class="tab-content-item" style="display: none;">
            <div class="cnc-custom-gap-row mt-5">
                <div class="form-wrap cnc-custom-col-gap-6">
                    <div class="cnc-container cnc-bg-white cnc-shadow">
                        <div class="form-field">
                            <label for="availability">Greetings Message:</label>
                            <?php 
								$content = stripslashes(html_entity_decode($click_n_chat_greetings_message));
								$editor_id = 'click_n_chat_greetings_message';  
								$settings = array(
									'textarea_name' => 'click_n_chat_greetings_message',  
									'media_buttons' => true,  
									'textarea_rows' => 5,  
									'teeny'         => false,  
									'quicktags'     => true,
									'class'			=> 'cnc-chat-info'
								);
								
								wp_editor($content, $editor_id, $settings);
							?>
                        </div>
                        <div class="form-field">
                            <label for="availability">Chat Receive Skin:</label>
                            <div class="cnc-color-picker-container">
                              <input type="hidden" id="chat_bg_color" name="chat_bg_color" value="<?php echo esc_attr($click_n_chat_setting_popup->chat_bg_color); ?>">
                              <a id="btn_chat_bg_color" style="background:<?php echo esc_attr($click_n_chat_setting_popup->chat_bg_color); ?>" class="cnc-color-btn cncColorPickerBtn" data-option = "cncSkinColorOptions"><span class="dashicons dashicons-color-picker"></span></a>
                              <div class="cnc-color-options cncSkinColorOptions">
                                <?php
                                foreach ($chat_skin_colors as $color) {
                                ?>
                                    <div data-id="chat_bg_color" data-option = "cncSkinColorOptions" class="cnc-color-option" style="background:<?php echo esc_attr($color) ?>;" data-color="<?php echo esc_attr($color) ?>"></div>
                                <?php
                                }
                                ?>
                                <div class="cnc-pro-label">
                                	<label>Custom color:</label>
                                	<input type="text" placeholder="Custom Color #FFFFFF" style="width:100%" disabled="disabled">
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="form-field">
                            <label for="availability">Ask for Lead Name, Email, and Phone on Chat Start?</label>
                            <label class="cnc-switch">
                                <input name="chat_name_start" id="chat_name_start" class="cnc-user-status" type="checkbox" <?php echo esc_html(($click_n_chat_setting_popup->chat_name_start == "1" ? "checked" : ""));  ?> >
                                <span class="cnc-switch-slider"></span>
                            </label>
                        </div>
                        <div class="form-field">
                            <label for="availability">Enable Lead Logs:</label>
                            <label class="cnc-switch cnc-pro-label">
                                <input  type="checkbox" disabled="disabled">
                                <span class="cnc-switch-slider"></span>
                            </label>
                        </div>
                	</div>
              	</div>
                <div class="form-wrap cnc-custom-col-gap-6">
                	<div class="cnc-right-fixed">
                    	<div class="cnc-message received tri-right left-top">
                        	<div id="cnc-received-content" class="cnc-received-content" style="background:<?php echo esc_attr($click_n_chat_setting_popup->chat_bg_color); ?>"><?php echo stripslashes(html_entity_decode($click_n_chat_greetings_message)) ?></div>
						</div>
                    </div>
                </div>
           	</div>
        </div>
        <!-- Timezone -->
        <div id="timezone-tab" class="tab-content-item" style="display: none;">
            <div class="cnc-custom-gap-row mt-5">
                <div class="form-wrap cnc-custom-col-gap-6">
                    <div class="cnc-container cnc-bg-white cnc-shadow">
                        <div class="form-field">
                            <label for="name">Timezone:</label>
                            <?php
								$time_zones = DateTimeZone::listIdentifiers();
							?> 	
							<select name="click_n_chat_time_zone" class="form-select">
							<?php
								foreach ($time_zones as $zone) {
									echo '<option '.esc_attr($zone == $click_n_chat_time_zone ? 'selected' : '').' value="' . esc_attr($zone) . '">' . esc_html($zone) . '</option>';
								}
							?>
							</select>
                            <p id="name-description">
                                 <b>Timezone: </b> Which timezone social users will be available?
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<p class="submit">
    <input type="submit" name="submit" id="submit" class="button button-primary" value="Update Setting">
</p>    
</form>
<?php
}