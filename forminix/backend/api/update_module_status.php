<?php

$result = array();

/* Check if user has admin capabilities */
if(current_user_can('manage_options')){

    if(isset($_REQUEST['modules'])){

        $modules = sanitize_text_field($_REQUEST['modules']);
        $modules = html_entity_decode($modules);
        $modules = stripcslashes($modules);
        $modules_arr = json_decode($modules, false);

        $this->base_admin->settings->update_activated_modules($modules_arr);

        $result = array("status" => "true");

    }else{
        $result = array("status" => 'false');
    }
}else{
    $result = array("status" => 'false');
}

echo json_encode($result,  JSON_UNESCAPED_UNICODE);