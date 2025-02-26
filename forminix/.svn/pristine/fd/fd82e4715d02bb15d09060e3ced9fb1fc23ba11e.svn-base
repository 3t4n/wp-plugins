<?php

$result = array();

/* Check if user has admin capabilities */
if(current_user_can('manage_options')){

    if(isset($_REQUEST['form_id'])){

        $form_id = sanitize_text_field($_REQUEST['form_id']);

        $this->base_admin->settings->deleteForm($form_id);

        $result = array("status" => 'true');

    }else{
        $result = array("status" => 'false');
    }
}else{
    $result = array("status" => 'false');
}

echo json_encode($result,  JSON_UNESCAPED_UNICODE);