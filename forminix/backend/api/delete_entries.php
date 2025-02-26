<?php

$result = array();

/* Check if user has admin capabilities */
if(current_user_can('manage_options')){

    if(isset($_REQUEST['entries'])){

        $entries = sanitize_text_field($_REQUEST['entries']);
        $entries = html_entity_decode($entries);
        $entries = stripcslashes($entries);
        $entries_arr = json_decode($entries, false);

        foreach ($entries_arr as $single_entry_id){
            $this->base_admin->settings->deleteEntry(sanitize_text_field($single_entry_id));
        }

        $result = array("status" => "true");

    }else{
        $result = array("status" => 'false');
    }
}else{
    $result = array("status" => 'false');
}

echo json_encode($result,  JSON_UNESCAPED_UNICODE);