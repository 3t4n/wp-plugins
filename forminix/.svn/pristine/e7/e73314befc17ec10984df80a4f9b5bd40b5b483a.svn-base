<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( ! class_exists( 'ForminixEmails' ) ) {
    class ForminixEmails
    {

        public $base_admin;

        function __construct($base_admin)
        {
            $this->base_admin = $base_admin;
        }

        /* ****************** Email Notification Operations ****************** */
        public function processEmailNotification($form_id, $cleaned_field_submissions, $email_extras)
        {
            $email_notification = $this->base_admin->settings->updateFormSettings($form_id, "email_notification");
            $email_notification = ($email_notification == Null) ? "[]" : $email_notification;

            $email_notification_arr = json_decode($email_notification, false);
            foreach ($email_notification_arr as $notification){

                $is_allowed_to_send_by_condition = True;
                if($notification->enable_conditional_logic == "1"){
                    if(!$this->isEmailNotificationConditionPassed($notification->conditional_logic_data, $cleaned_field_submissions)){
                        $is_allowed_to_send_by_condition = False;
                    }
                }

                if($is_allowed_to_send_by_condition){
                    $send_to = $notification->send_to;
                    $from_name = isset($notification->from_name) ? $this->base_admin->utils->forminix_unesc_and_codify_string($notification->from_name) : "";
                    $from_email = isset($notification->from_email) ? $notification->from_email : "";
                    $reply_to = isset($notification->reply_to) ? $notification->reply_to : "";
                    $cc = isset($notification->cc) ? $notification->cc : "";
                    $subject = isset($notification->subject) ? $this->base_admin->utils->forminix_unesc_and_codify_string($notification->subject) : "";
                    $email_body = $this->base_admin->utils->forminix_unesc_and_codify_string($this->emailShortCodeParser($form_id, $notification->email_body, $cleaned_field_submissions, $email_extras));
                    if($notification->email_body_format == "body_format_html"){
                        $email_body = $this->encloseEmailInTemplate($email_body);
                    }

                    $email_address = "";
                    if($send_to == "custom_email"){
                        $email_address = $notification->custom_email;
                    }elseif ($send_to == "email_field"){
                        foreach ($cleaned_field_submissions as $field) {
                            $field = (object) $field;
                            if($field->field_id == $notification->email_field){
                                $email_address = $field->field_value;
                                break;
                            }
                        }
                    }
                    if($this->base_admin->utils->is_email_valid($email_address)){
                        $sitename = strlen(trim($from_name)) > 0 ? $from_name : get_bloginfo( 'name');
                        $admin_email = $this->base_admin->utils->is_email_valid($from_email) ? $from_email : get_bloginfo( 'admin_email' );
                        $headers[] = 'Content-Type: text/html; charset=UTF-8';
                        $headers[] = 'From: '.$sitename. ' <' . $admin_email . '>';
                        if($this->base_admin->utils->is_email_valid($reply_to)){
                            $headers[] = 'Reply-To: ' . $reply_to;
                        }
                        if(strlen(trim($cc)) > 0){
                            $headers[] = 'Cc: ' . $cc;
                        }
                        wp_mail( $email_address, $subject, $email_body, $headers );
                    }
                }
            }
        }



        public function isEmailNotificationConditionPassed($condition_data, $cleaned_field_submissions)
        {
            $condition_checkmark = array();
            $matching_type = "or";
            foreach ($condition_data as $single_condition){
                $condition_result = 0;
                $matching_type = $single_condition->matching_type;
                $target_field_id = $single_condition->if;
                $condition = $single_condition->condition;
                $value = $this->base_admin->utils->forminix_unesc_and_codify_string($single_condition->value);

                foreach ($cleaned_field_submissions as $field) {
                    $field = (object) $field;
                    $field->field_value = $this->base_admin->utils->forminix_unesc_and_codify_string($field->field_value);
                    if($field->field_id == $target_field_id){
                        if($condition == "equal"){
                            if($field->field_value == $value) { $condition_result = 1; }else{ $condition_result = 0; }
                        }else if($condition == "not_equal"){
                            if($field->field_value != $value) { $condition_result = 1; }else{ $condition_result = 0; }
                        }else if($condition == "greater_than"){
                            if(is_numeric($field->field_value) && is_numeric($value)){
                                if($field->field_value > $value) { $condition_result = 1; }else{ $condition_result = 0; }
                            }else{
                                $condition_result = 0;
                            }
                        }else if($condition == "less_than"){
                            if(is_numeric($field->field_value) && is_numeric($value)){
                                if($field->field_value < $value) { $condition_result = 1; }else{ $condition_result = 0; }
                            }else{
                                $condition_result = 0;
                            }
                        }else if($condition == "starts_with"){
                            if(substr($field->field_value, 0, strlen($value)) === $value) { $condition_result = 1; }else{ $condition_result = 0; }
                        }else if($condition == "ends_with"){
                            $length = strlen($value);
                            if($length > 0){
                                if(substr( $field->field_value, -$length ) === $value) { $condition_result = 1; }else{ $condition_result = 0; }
                            }else{
                                $condition_result = 0;
                            }
                        }else if($condition == "contains"){
                            if(strpos($field->field_value, $value) !== false) { $condition_result = 1; }else{ $condition_result = 0; }
                        }else if($condition == "not_contains"){
                            if(strpos($field->field_value, $value) == false) { $condition_result = 1; }else{ $condition_result = 0; }
                        }else if($condition == "length_greater_than"){
                            if(strlen($field->field_value) > $value) { $condition_result = 1; }else{ $condition_result = 0; }
                        }else if($condition == "length_less_than"){
                            if(strlen($field->field_value) < $value) { $condition_result = 1; }else{ $condition_result = 0; }
                        }else if($condition == "filesize_greater_than"){
                            $file_info = get_headers($field->field_value, 1);
                            $file_size_in_bytes = isset($file_info["Content-Length"]) ? $file_info["Content-Length"] : 0;
                            $file_size_in_kb = $file_size_in_bytes / 1000;
                            if($file_size_in_kb > $value) { $condition_result = 1; }else{ $condition_result = 0; }
                        }else if($condition == "filesize_less_than"){
                            $file_info = get_headers($field->field_value, 1);
                            $file_size_in_bytes = isset($file_info["Content-Length"]) ? $file_info["Content-Length"] : 0;
                            $file_size_in_kb = $file_size_in_bytes / 1000;
                            if($file_size_in_kb < $value) { $condition_result = 1; }else{ $condition_result = 0; }
                        }
                        break;
                    }
                }

                $condition_checkmark[] = $condition_result;
            }


            if($matching_type == "or"){
                if (in_array(1, $condition_checkmark)){
                    return True;
                }
            }else if($matching_type == "and"){
                if(in_array(0, $condition_checkmark, true) === false){
                    return True;
                }
            }

            return False;
        }




        public function emailShortCodeParser($form_id, $msg, $cleaned_field_submissions, $email_extras)
        {

            /* Get Form Fields from DB to Extract Label or Placeholder */
            $form_fields = $this->base_admin->settings->updateFormSettings($form_id, "form_fields");
            $form_fields_obj = json_decode($form_fields, false);
            $form_fields_array = $this->base_admin->utils->extractFormFieldsJSONtoArray($form_fields_obj);
            $processed_fields = array();
            foreach ($cleaned_field_submissions as $field) {
                $field = (object) $field;
                $field_in_db = array();
                $field_id = $field->field_id;
                $field_label = "";
                $field_value = $field->field_value;
                foreach ($form_fields_array as $db_field){
                    if($field->field_id == $db_field->field_id){
                        $field_in_db = $db_field;
                        break;
                    }
                }
                /* Get Field Label */
                $field_label = isset($field_in_db->label) ? $field_in_db->label : "";
                if(strlen(trim($field_label)) == 0){
                    $field_label = isset($field_in_db->placeholder) ? $field_in_db->placeholder : "";
                }
                if(strlen(trim($field_label)) == 0){
                    $field_label = isset($field_in_db->placeholder_dropdown) ? $field_in_db->placeholder_dropdown : "";
                }
                if(strlen(trim($field_label)) == 0){
                    $field_label = isset($field_in_db->file_placeholder) ? $field_in_db->file_placeholder : "";
                }
                if(strlen(trim($field_label)) == 0){
                    $field_label = "Unknown Field";
                }
                /* If checkbox field, remove ::forminix_separator:: */
                if($field_in_db->slug == "checkbox"){
                    $field_value = str_replace("::forminix_separator::", "<br>", $field_value);
                }
                /* If textarea field, replace newline with br */
                if($field_in_db->slug == "text_area"){
                    $field_value = nl2br($field_value);
                }
                if($field_in_db->slug == "rich_text"){
                    $field_value = $this->base_admin->utils->forminix_unesc_and_codify_string($field_value);
                }
                $processed_fields[] = array(
                    "field_id" => $field_id,
                    "field_label" => $field_label,
                    "field_value" => $field_value,
                );
            }


            preg_match_all('/\{(.*?)\}/', $msg, $matches);
            if(is_array($matches[1])){
                if(sizeof($matches[1]) > 0){
                    foreach($matches[1] as $shortcode){
                        // Replace Field Shortcode
                        if (strpos($shortcode, 'field_') === 0) {
                            $shortcode_field_id = str_replace("field_", "", $shortcode);
                            foreach ($processed_fields as $field) {
                                $field = (object) $field;
                                if($field->field_id == $shortcode_field_id){
                                    $msg = str_replace("{".$shortcode."}", $field->field_value, $msg);
                                    break;
                                }
                            }
                        }
                        // Replace Predefined Shortcode
                        if($shortcode == "source_url"){
                            $msg = str_replace("{".$shortcode."}", $email_extras->user_page_url, $msg);
                        }
                        if($shortcode == "user_agent"){
                            $msg = str_replace("{".$shortcode."}", $email_extras->user_agent, $msg);
                        }
                        if($shortcode == "user_ip"){
                            $msg = str_replace("{".$shortcode."}", $email_extras->user_ip, $msg);
                        }
                        if($shortcode == "all_data"){

                            $all_data = "<p style=\"margin:0 0 20px\"></p>";
                            foreach ($processed_fields as $field) {
                                $field = (object) $field;
                                $all_data .= $this->allDataShortcodeInTemplate($field->field_label, $field->field_value);
                            }

                            $msg = str_replace("{".$shortcode."}", $all_data, $msg);
                        }
                    }
                }
            }
            return $msg;
        }


        public function allDataShortcodeInTemplate( $field_label, $field_value ) {
            ob_start(); ?>

            <table role="presentation" style="width:560px;border-collapse:collapse;border:0;border-spacing:0;background:#f8f8f8;">
                <tr>
                    <td style="padding:6px 12px; color: #555555; font-weight:bold;">
                        <?php echo $this->base_admin->utils->forminix_unesc_string($field_label); ?>
                    </td>
                </tr>
            </table>
            <table role="presentation" style="width:560px;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
                <tr>
                    <td style="padding:8px 12px 12px 12px; color: #555555; font-weight:normal;">
                        <?php echo $this->base_admin->utils->forminix_unesc_string($field_value); ?>
                    </td>
                </tr>
            </table>

            <?php return ob_get_clean();
        }

        public function encloseEmailInTemplate( $email_body ) {
            ob_start(); ?>

            <!DOCTYPE html>
            <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width,initial-scale=1">
                <meta name="x-apple-disable-message-reformatting">
                <title></title>
                <!--[if mso]>
                <noscript>
                    <xml>
                        <o:OfficeDocumentSettings>
                            <o:PixelsPerInch>96</o:PixelsPerInch>
                        </o:OfficeDocumentSettings>
                    </xml>
                </noscript>
                <![endif]-->
                <style>
                    table, td, div, h1, p {font-family: Arial, sans-serif;}
                    /*table, td {border:2px solid #000000 !important;}*/
                </style>
            </head>

            <body style="margin:0;padding:0;background: #f6f6f6;">
            <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                <tr>
                    <td align="center" style="padding:30px 10px">


                        <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #eee;border-spacing:0;text-align:left;background:#ffffff;">
                            <tr>
                                <td style="padding:20px 20px; color: #555555; font-family: 'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif; font-size: 14px; line-height: 170%;">
                                    <?php echo $email_body; ?>
                                </td>
                            </tr>
                        </table>


                    </td>
                </tr>
            </table>
            </body>
            </html>


            <?php return ob_get_clean();
        }

    }
}