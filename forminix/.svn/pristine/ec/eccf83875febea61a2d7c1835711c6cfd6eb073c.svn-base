<?php

$result = array();

/* Check if user has admin capabilities */
if(current_user_can('manage_options')){

    if(isset($_REQUEST['form_id'])){

        $form_id = sanitize_text_field($_REQUEST['form_id']);

        $form_name = $this->base_admin->settings->updateFormSettings($form_id, "form_name");

        $form_fields = $this->base_admin->settings->updateFormSettings($form_id, "form_fields");

        $result = array("status" => 'true',
            "form_name" => $form_name,
            "form_fields" => $form_fields
        );

    }else{
        $result = array("status" => 'false');
    }
}else{
    $result = array("status" => 'false');
}

echo json_encode($result,  JSON_UNESCAPED_UNICODE);