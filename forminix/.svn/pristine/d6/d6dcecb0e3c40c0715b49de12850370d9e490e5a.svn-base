<?php

$result = array();

/* Check if user has admin capabilities */
if(current_user_can('manage_options')){

    if(isset($_REQUEST['form_id'])){


        $form_id = sanitize_text_field($_REQUEST['form_id']);
        $form_id = ($form_id == "0") ? $this->base_admin->settings->createNewForm() : $form_id;

        if(isset($_REQUEST['form_fields'])){
            $form_fields = sanitize_text_field($_REQUEST['form_fields']);
            $this->base_admin->settings->updateFormSettings($form_id, "form_fields", $form_fields);
        }

        if(isset($_REQUEST['form_name'])){
            $form_name = sanitize_text_field($_REQUEST['form_name']);
            $form_name = empty($form_name) ? "Untitled Form" : $form_name;
            $this->base_admin->settings->updateFormSettings($form_id, "form_name", $form_name);
        }

        $result = array("status" => "true", "form_id" => $form_id);

    }else{
        $result = array("status" => 'false');
    }
}else{
    $result = array("status" => 'false');
}

echo json_encode($result,  JSON_UNESCAPED_UNICODE);