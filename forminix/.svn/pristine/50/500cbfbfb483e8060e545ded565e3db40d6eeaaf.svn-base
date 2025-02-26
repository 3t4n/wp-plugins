<?php

$result = array();

/* Check if user has admin capabilities */
if(current_user_can('manage_options')){

    if(isset($_REQUEST['entries']) && isset($_REQUEST['new_status'])){

        $new_status = sanitize_text_field($_REQUEST['new_status']);

        if($new_status == "read" || $new_status == "unread"){
            $entries = sanitize_text_field($_REQUEST['entries']);
            $entries = stripcslashes($entries);
            $entries_arr = json_decode($entries, false);

            foreach ($entries_arr as $single_entry_id){
                $this->base_admin->settings->updateEntrySettings(sanitize_text_field($single_entry_id), "read_status", $new_status);
            }

            $result = array("status" => "true");
        }else{
            $result = array("status" => 'false');
        }

    }else{
        $result = array("status" => 'false');
    }
}else{
    $result = array("status" => 'false');
}

echo json_encode($result,  JSON_UNESCAPED_UNICODE);