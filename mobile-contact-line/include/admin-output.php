<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php

$success_message = '';
$error_message = '';

// ====================================================
// Include the file that contains all the info
// ====================================================
include('settings.php');

// ===============================================
// This will allow us to use the media uploader
// ===============================================
wp_enqueue_media();

// ========================================================================================================
// Update the data if it's changed
// ========================================================================================================
    

if( isset($_POST['yydev_mobile_line_nonce']) ) {

    if( wp_verify_nonce($_POST['yydev_mobile_line_nonce'], 'yydev_mobile_line_action') ) {

        // ----------------------------------------------
        // getting all the values and clear data
        // ----------------------------------------------        

        $phone_display_checkbox = yydev_mobile_line_checkbox_isset('phone_display_checkbox');
        $phone_button_href = sanitize_text_field( $_POST['phone_button_href'] );
        $phone_button_text = sanitize_text_field( $_POST['phone_button_text'] );
        $phone_background_color = sanitize_text_field( $_POST['phone_background_color'] );
        $phone_button_width = sanitize_text_field( $_POST['phone_button_width'] );
        $phone_button_position = sanitize_text_field( $_POST['phone_button_position'] );
        
        $email_display_checkbox = yydev_mobile_line_checkbox_isset('email_display_checkbox');
        $email_button_href = sanitize_text_field( $_POST['email_button_href'] );
        $custom_contact_page_link = yydev_mobile_line_checkbox_isset('custom_contact_page_link');
        $email_button_text = sanitize_text_field( $_POST['email_button_text'] );
        $email_background_color = sanitize_text_field( $_POST['email_background_color'] );
        $email_button_width = sanitize_text_field( $_POST['email_button_width'] );
        $email_button_position = sanitize_text_field( $_POST['email_button_position'] );

        $whatsapp_display_checkbox = yydev_mobile_line_checkbox_isset('whatsapp_display_checkbox');
        $whatsapp_button_href = sanitize_text_field( $_POST['whatsapp_button_href'] );
        $whatsapp_url_message = sanitize_text_field( $_POST['whatsapp_url_message'] );
        $whatsapp_button_text = sanitize_text_field( $_POST['whatsapp_button_text'] );
        $whatsapp_background_color = sanitize_text_field( $_POST['whatsapp_background_color'] );
        $whatsapp_button_width = sanitize_text_field( $_POST['whatsapp_button_width'] );
        $whatsapp_button_position = sanitize_text_field( $_POST['whatsapp_button_position'] );

        $chat_display_checkbox = yydev_mobile_line_checkbox_isset('chat_display_checkbox');
        $chat_button_href = sanitize_text_field( $_POST['chat_button_href'] );
        $chat_button_text = sanitize_text_field( $_POST['chat_button_text'] );
        $chat_background_color = sanitize_text_field( $_POST['chat_background_color'] );
        $chat_button_width = sanitize_text_field( $_POST['chat_button_width'] );
        $chat_button_position = sanitize_text_field( $_POST['chat_button_position'] );
        
        $skype_display_checkbox = yydev_mobile_line_checkbox_isset('skype_display_checkbox');
        $skype_button_href = sanitize_text_field( $_POST['skype_button_href'] );
        $skype_button_text = sanitize_text_field( $_POST['skype_button_text'] );
        $skype_background_color = sanitize_text_field( $_POST['skype_background_color'] );
        $skype_button_width = sanitize_text_field( $_POST['skype_button_width'] );
        $skype_button_position = sanitize_text_field( $_POST['skype_button_position'] );

        $mobile_width = intval( $_POST['mobile_width'] );

        $exclude_option = sanitize_text_field( $_POST['exclude_option'] );
        $exclude_ids = sanitize_text_field( $_POST['exclude_ids'] );

        // ----------------------------------------------
        // insert the data into an array
        // ----------------------------------------------  

        $plugin_data_array = array(
            'phone_display_checkbox' => $phone_display_checkbox,
            'phone_button_href' => $phone_button_href,
            'custom_contact_page_link' => $custom_contact_page_link,
            'phone_button_text' => $phone_button_text,
            'phone_background_color' => $phone_background_color,
            'phone_button_width' => $phone_button_width,
            'phone_button_position' => $phone_button_position,

            'email_display_checkbox' => $email_display_checkbox,
            'email_button_href' => $email_button_href,
            'email_button_text' => $email_button_text,
            'email_background_color' => $email_background_color,
            'email_button_width' => $email_button_width,
            'email_button_position' => $email_button_position,

            'whatsapp_display_checkbox' => $whatsapp_display_checkbox,
            'whatsapp_button_href' => $whatsapp_button_href,
            'whatsapp_url_message' => $whatsapp_url_message,
            'whatsapp_button_text' => $whatsapp_button_text,
            'whatsapp_background_color' => $whatsapp_background_color,
            'whatsapp_button_width' => $whatsapp_button_width,
            'whatsapp_button_position' => $whatsapp_button_position,

            'chat_display_checkbox' => $chat_display_checkbox,
            'chat_button_href' => $chat_button_href,
            'chat_button_text' => $chat_button_text,
            'chat_background_color' => $chat_background_color,
            'chat_button_width' => $chat_button_width,
            'chat_button_position' => $chat_button_position,

            'skype_display_checkbox' => $skype_display_checkbox,
            'skype_button_href' => $skype_button_href,
            'skype_button_text' => $skype_button_text,
            'skype_background_color' => $skype_background_color,
            'skype_button_width' => $skype_button_width,
            'skype_button_position' => $skype_button_position,

            'mobile_width' => $mobile_width,

            'exclude_option' => $exclude_option,
            'exclude_ids' => $exclude_ids,
        ); // $creating_data_array = array(

        // ----------------------------------------------
        // creating a value with all the array data
        // ----------------------------------------------  

        $array_key_name = '';
        $array_item_value = '';
        
	    foreach($plugin_data_array as $key=>$item) {
	        $array_key_name .= "####" . $key;
			$array_item_value .= "####" . $item;
	    } // foreach($medical_form_array as $key=>$item) {

        // ----------------------------------------------
        // inserting all the data to datbase
        // ----------------------------------------------  

        $plugin_data = $array_key_name . "***" . $array_item_value;
        $plugin_data = sanitize_text_field($plugin_data);

        // update optuon on the database into wp_options
        update_option($wp_options_name, $plugin_data);

        $success_message = "The data was updated successfully";

    } else { // if( wp_verify_nonce($_POST['yydev_mobile_line_nonce'], 'yydev_mobile_line_action') ) {
        $error_message = "Form nonce was incorrect";
    } // } else { // if( wp_verify_nonce($_POST['yydev_mobile_line_nonce'], 'yydev_mobile_line_action') ) {

} // if( isset($_POST['yydev_mobile_line_nonce']) ) {

// ========================================================================================================
// Get all the data and ouput it into the page
// ========================================================================================================

$getting_plugin_data = get_option($wp_options_name);

if( !empty($getting_plugin_data) ) {

    // ----------------------------------------------
    // breaking the string into to 2 variables. the array namd and vakue  
    // ----------------------------------------------  

    $break_array = explode("***", $getting_plugin_data);

    $item_name = explode("####", $break_array[0]);
    $key_name = explode("####", $break_array[1]);

    $array_count = count($key_name);

    // ----------------------------------------------
    // creating an organized array with all values
    // ----------------------------------------------      

    for($count_number = 0; $count_number < $array_count; $count_number++) {
    	$plugin_data_array[ $item_name[$count_number] ] = $key_name[$count_number];
    } // for($count_number = 0; $count_number < $array_count; $count_number++) {

} // if( !empty($getting_plugin_data) ) {

?>

<div class="wrap yydev-line-mobile">

    <h2 class="display-inline">Mobile Line Settings</h2>
    <p>Below you will be able to edit and make change to the buttons:</p>

    <?php yydev_mobile_line_echo_success_message_if_exists($success_message); ?>
    <?php yydev_mobile_line_echo_error_message_if_exists($error_message); ?>

    <div class="insert-new">

<form class="edit-form-data" method="POST" action="">



        <br />
        <div class="phone-button">

            <h2><span></span> Phone Button Settings: </h2>        

            <div class="yydev_mobile_line_line">
                <input type="checkbox" id="phone_display_checkbox" class="checkbox" name="phone_display_checkbox" value="1" <?php if($plugin_data_array['phone_display_checkbox'] == 1) {echo "checked";} ?> />
                <label for="phone_display_checkbox">Display this button on the page</label>
            </div><!--yydev_mobile_line_line-->
            
            <div class="yydev_mobile_line_line">
                <label for="phone_button_href">Phone Number: </label>
                <input type="text" id="phone_button_href" class="input-short" name="phone_button_href" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['phone_button_href']); ?>" /> 
                <small>Example: 0999999999</small>
            </div><!--yydev_mobile_line_line-->

            <div class="yydev_mobile_line_line">
                <label for="phone_button_text">Text For Button: </label>
                <input type="text" id="phone_button_text" class="input-short" name="phone_button_text" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['phone_button_text']); ?>" /> 
                <small>Example: Call Us</small>
            </div><!--yydev_mobile_line_line-->

            <div class="yydev_mobile_line_line">
                <label for="phone_background_color">Background color hex: </label>
                <input type="text" id="phone_background_color" class="input-very-short" name="phone_background_color" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['phone_background_color']); ?>" /> 
                <small>Example: #09547c</small>
            </div><!--yydev_mobile_line_line-->

            <div class="yydev_mobile_line_line">
                <label for="phone_button_width">Button Width: </label>
                <input type="text" id="phone_button_width" class="input-very-short" name="phone_button_width" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['phone_button_width']); ?>" /> 
                <small>Example: 25%</small>
            </div><!--yydev_mobile_line_line-->

            <div class="yydev_mobile_line_line">
                <label for="phone_button_position">Button display order on page: </label>
                <input type="text" id="phone_button_position" class="input-very-short" name="phone_button_position" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['phone_button_position']); ?>" /> 
                <small>The position of the banner on the page (1 = first)</small>
            </div><!--yydev_mobile_line_line-->

        </div><!--phone-button-->



        <br />
        <div class="email-button">

            <h2><span></span> Email / Contact Page Button Settings: </h2>        

            <div class="yydev_mobile_line_line">
                <input type="checkbox" id="email_display_checkbox" class="checkbox" name="email_display_checkbox" value="1" <?php if($plugin_data_array['email_display_checkbox'] == 1) {echo "checked";} ?> />
                <label for="email_display_checkbox">Display this button on the page</label>
            </div><!--yydev_mobile_line_line-->
            
            <div class="yydev_mobile_line_line">
                <label for="email_button_href">Email: </label>
                <input type="text" id="email_button_href" class="input-short" name="email_button_href" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['email_button_href']); ?>" /> 
                <small>Example: email@email.com</small>
            </div><!--yydev_mobile_line_line-->

            <div class="yydev_mobile_line_line">
                <input type="checkbox" id="custom_contact_page_link" class="checkbox" name="custom_contact_page_link" value="1" <?php if($plugin_data_array['custom_contact_page_link'] == 1) {echo "checked";} ?> />
                <label for="custom_contact_page_link">Set custom contact link URL instead of phone number. When select above URL instead of phone number: example: https://www.website.com/contact-us/
                </label>
            </div><!--yydev_mobile_line_line-->

            <div class="yydev_mobile_line_line">
                <label for="email_button_text">Text For Button: </label>
                <input type="text" id="email_button_text" class="input-short" name="email_button_text" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['email_button_text']); ?>" /> 
                <small>Example: Email Us</small>
            </div><!--yydev_mobile_line_line-->

            <div class="yydev_mobile_line_line">
                <label for="email_background_color">Background color hex: </label>
                <input type="text" id="email_background_color" class="input-very-short" name="email_background_color" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['email_background_color']); ?>" /> 
                <small>Example: #09547c</small>
            </div><!--yydev_mobile_line_line-->

            <div class="yydev_mobile_line_line">
                <label for="email_button_width">Button Width: </label>
                <input type="text" id="email_button_width" class="input-very-short" name="email_button_width" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['email_button_width']); ?>" /> 
                <small>Example: 25%</small>
            </div><!--yydev_mobile_line_line-->

            <div class="yydev_mobile_line_line">
                <label for="email_button_position">Button display order on page: </label>
                <input type="text" id="email_button_position" class="input-very-short" name="email_button_position" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['email_button_position']); ?>" /> 
                <small>The position of the banner on the page (1 = first)</small>
            </div><!--yydev_mobile_line_line-->

        </div><!--email-button-->


        <br />
        <div class="whatsapp-button">

            <h2><span></span> Whatsapp Button Settings: </h2>        

            <div class="yydev_mobile_line_line">
                <input type="checkbox" id="whatsapp_display_checkbox" class="checkbox" name="whatsapp_display_checkbox" value="1" <?php if($plugin_data_array['whatsapp_display_checkbox'] == 1) {echo "checked";} ?> />
                <label for="whatsapp_display_checkbox">Display this button on the page</label>
            </div><!--yydev_mobile_line_line-->
            
            <div class="yydev_mobile_line_line">
                <label for="whatsapp_button_href">Whatsapp Number: </label>
                <input type="text" id="whatsapp_button_href" class="input-short" name="whatsapp_button_href" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['whatsapp_button_href']); ?>" /> 
                <small>Example: 0999999999</small>
            </div><!--yydev_mobile_line_line-->

            <div class="yydev_mobile_line_line">
                <label for="whatsapp_url_message">Whatsapp URL Message: </label>
                <input type="text" id="whatsapp_url_message" class="input-short" name="whatsapp_url_message" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['whatsapp_url_message']); ?>" /> 
                <small>Example: I have contacted you from your site</small>
            </div><!--yydev_mobile_line_line-->

            <div class="yydev_mobile_line_line">
                <label for="whatsapp_button_text">Text For Button: </label>
                <input type="text" id="whatsapp_button_text" class="input-short" name="whatsapp_button_text" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['whatsapp_button_text']); ?>" /> 
                <small>Example: Send Us Whatsapp</small>
            </div><!--yydev_mobile_line_line-->


            <div class="yydev_mobile_line_line">
                <label for="whatsapp_background_color">Background color hex: </label>
                <input type="text" id="whatsapp_background_color" class="input-very-short" name="whatsapp_background_color" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['whatsapp_background_color']); ?>" /> 
                <small>Example: #09547c</small>
            </div><!--yydev_mobile_line_line-->

            <div class="yydev_mobile_line_line">
                <label for="whatsapp_button_width">Button Width: </label>
                <input type="text" id="whatsapp_button_width" class="input-very-short" name="whatsapp_button_width" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['whatsapp_button_width']); ?>" /> 
                <small>Example: 25%</small>
            </div><!--yydev_mobile_line_line-->

            <div class="yydev_mobile_line_line">
                <label for="whatsapp_button_position">Button display order on page: </label>
                <input type="text" id="whatsapp_button_position" class="input-very-short" name="whatsapp_button_position" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['whatsapp_button_position']); ?>" /> 
                <small>The position of the banner on the page (1 = first)</small>
            </div><!--yydev_mobile_line_line-->

        </div><!--whatsapp-button-->


        <br />
        <div class="chat-button">

            <h2><span></span> Chat Button Settings: </h2>        

            <div class="yydev_mobile_line_line">
                <input type="checkbox" id="chat_display_checkbox" class="checkbox" name="chat_display_checkbox" value="1" <?php if($plugin_data_array['chat_display_checkbox'] == 1) {echo "checked";} ?> />
                <label for="chat_display_checkbox">Display this button on the page</label>
            </div><!--yydev_mobile_line_line-->
            
            <div class="yydev_mobile_line_line">
                <label for="chat_button_href">Chat URL: </label>
                <input type="text" id="chat_button_href" class="input-short" name="chat_button_href" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['chat_button_href']); ?>" /> 
                <small>Example: https://www.chat.com</small>
            </div><!--yydev_mobile_line_line-->

            <div class="yydev_mobile_line_line">
                <label for="chat_button_text">Text For Button: </label>
                <input type="text" id="chat_button_text" class="input-short" name="chat_button_text" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['chat_button_text']); ?>" /> 
                <small>Example: Live Chat</small>
            </div><!--yydev_mobile_line_line-->

            <div class="yydev_mobile_line_line">
                <label for="chat_background_color">Background color hex: </label>
                <input type="text" id="chat_background_color" class="input-very-short" name="chat_background_color" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['chat_background_color']); ?>" /> 
                <small>Example: #09547c</small>
            </div><!--yydev_mobile_line_line-->

            <div class="yydev_mobile_line_line">
                <label for="chat_button_width">Button Width: </label>
                <input type="text" id="chat_button_width" class="input-very-short" name="chat_button_width" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['chat_button_width']); ?>" /> 
                <small>Example: 25%</small>
            </div><!--yydev_mobile_line_line-->

            <div class="yydev_mobile_line_line">
                <label for="chat_button_position">Button display order on page: </label>
                <input type="text" id="chat_button_position" class="input-very-short" name="chat_button_position" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['chat_button_position']); ?>" /> 
                <small>The position of the banner on the page (1 = first)</small>
            </div><!--yydev_mobile_line_line-->

        </div><!--chat-button-->


        <br />
        <div class="skype-button">

            <h2><span></span> Skype Button Settings: </h2>        

            <div class="yydev_mobile_line_line">
                <input type="checkbox" id="skype_display_checkbox" class="checkbox" name="skype_display_checkbox" value="1" <?php if($plugin_data_array['skype_display_checkbox'] == 1) {echo "checked";} ?> />
                <label for="skype_display_checkbox">Display this button on the page</label>
            </div><!--yydev_mobile_line_line-->
            
            <div class="yydev_mobile_line_line">
                <label for="skype_button_href">Skype Username: </label>
                <input type="text" id="skype_button_href" class="input-short" name="skype_button_href" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['skype_button_href']); ?>" /> 
                <small>Example: skype-name</small>
            </div><!--yydev_mobile_line_line-->

            <div class="yydev_mobile_line_line">
                <label for="skype_button_text">Text For Button: </label>
                <input type="text" id="skype_button_text" class="input-short" name="skype_button_text" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['skype_button_text']); ?>" /> 
                <small>Example: Skype</small>
            </div><!--yydev_mobile_line_line-->

            <div class="yydev_mobile_line_line">
                <label for="skype_background_color">Background color hex: </label>
                <input type="text" id="skype_background_color" class="input-very-short" name="skype_background_color" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['skype_background_color']); ?>" /> 
                <small>Example: #09547c</small>
            </div><!--yydev_mobile_line_line-->

            <div class="yydev_mobile_line_line">
                <label for="skype_button_width">Button Width: </label>
                <input type="text" id="skype_button_width" class="input-very-short" name="skype_button_width" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['skype_button_width']); ?>" /> 
                <small>Example: 25%</small>
            </div><!--yydev_mobile_line_line-->

            <div class="yydev_mobile_line_line">
                <label for="skype_button_position">Button display order on page: </label>
                <input type="text" id="skype_button_position" class="input-very-short" name="skype_button_position" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['skype_button_position']); ?>" /> 
                <small>The position of the banner on the page (1 = first)</small>
            </div><!--yydev_mobile_line_line-->

        </div><!--skype-button-->

        <br />
        <h2> Mobile Settings: </h2>    

        <div class="yydev_mobile_line_line">
            <label for="mobile_width">Show button only when screen width is smaller than: </label>
            <input type="text" id="mobile_width" class="input-very-short" name="mobile_width" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['mobile_width']); ?>" /> PX  
        </div><!--yydev_mobile_line_line-->

        <br />
        <h2> Include/Exclude Pages By ID: </h2>    

         <p> Insert the pages ID and separate them by comma. You can use <a target="_blank" href="https://wordpress.org/plugins/show-posts-and-pages-id/">Show Pages IDs</a> plugin for help.
         <br /><br />
         Example <small>(one page)</small>: 14 
         <br /> Example <small>(multiple pages)</small>: 14, 16, 23 </p>

        <div class="yydev_mobile_line_line">

            <label for="exclude_option">Include/Exclude Option: </label>

            <select name="exclude_option" id='exclude_option'>
                <option value="none" <?php if($plugin_data_array['exclude_option'] == "none") {echo "selected";} ?> >Not Active (Default)</option>
                <option value="exclude" <?php if($plugin_data_array['exclude_option'] == "exclude") {echo "selected";} ?> >Exclude Pages By ID</option>
                <option value="include" <?php if ($plugin_data_array['exclude_option'] == "include") {echo "selected";} ?> >Include Only On Pages</option>
            </select>

            <input type="text" id="exclude_ids" class="input-short" name="exclude_ids" value="<?php echo yydev_mobile_line_html_output($plugin_data_array['exclude_ids']); ?>" />

        </div><!--yydev_mobile_line_line-->

        <br />

        <?php 
            // creating nonce to make sure the form was submitted correctly from the right page
            wp_nonce_field( 'yydev_mobile_line_action', 'yydev_mobile_line_nonce' ); 
        ?>

        <input type="submit" class="edit-form-data yydev-tags-submit" name="insert_top_btn" value="Submit Changes" />

</form>

<br /><br /><br />
<span id="footer-thankyou-code">This plugin was create by <a target="_blank" href="https://www.yydevelopment.com">YYDevelopment</a>. If you liked the plugin please give it a <a target="_blank" href="https://wordpress.org/plugins/mobile-contact-line/#reviews">5 stars review</a>. 
If you want to help support this FREE plugin <a target="_blank" href="https://www.yydevelopment.com/coffee-break/?plugin=mobile-contact-line">buy us a coffee</a>.</span>
</span>
</div><!--wrap-->