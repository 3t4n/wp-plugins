<?php

$result = array();

/* Check if user has admin capabilities */
if(current_user_can('manage_options')){

    if(isset($_REQUEST['json_data'])){


        $json_data = sanitize_text_field($_REQUEST['json_data']);
        $json_data = html_entity_decode($json_data);
        $json_data = stripcslashes($json_data);
        $json_obj = json_decode($json_data, false);

        /* Create new form */
        $form_id = $this->base_admin->settings->createNewForm();

        /* Import Form Settings */
        foreach ($json_obj->form_settings as $single_settings){
            $this->base_admin->settings->updateFormSettings($form_id, $single_settings->key, $single_settings->value);
        }

        /* Import Form Entries */
        foreach ($json_obj->form_entries as $single_entry){
            $entry_id = $this->base_admin->settings->createNewEntry($form_id);
            foreach ($single_entry->entry_settings as $single_settings){
                $this->base_admin->settings->updateEntrySettings($entry_id, $single_settings->key, $single_settings->value);
            }
        }

        $result = array("status" => 'true', "form_id" => $form_id);

    }else{
        $result = array("status" => 'false');
    }
}else{
    $result = array("status" => 'false');
}

echo json_encode($result,  JSON_UNESCAPED_UNICODE);