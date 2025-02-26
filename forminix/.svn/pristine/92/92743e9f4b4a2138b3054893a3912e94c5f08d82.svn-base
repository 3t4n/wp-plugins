<?php

$result = array();

/* Check if user has admin capabilities */
if(current_user_can('manage_options')){


    $formsList = array();
    $list_forms = $this->base_admin->settings->listAllForms();
    foreach ($list_forms as $single_form){

        $form_id = $single_form['form_id'];
        $form_name = $this->base_admin->settings->updateFormSettings($form_id, "form_name");

        $created_at_gmt_time = $this->base_admin->settings->updateFormSettings($form_id, "created_at");

        $total_view = $this->base_admin->settings->updateFormSettings($form_id, "total_views");
        $total_view = ($total_view == Null) ? 0 : $total_view;

        $list_entries = $this->base_admin->settings->listAllEntries($form_id);
        $total_entries = is_array($list_entries) ? sizeof($list_entries) : 0;

        $formsList[] = array(
            "form_id" => $form_id,
            "form_name" => $form_name,
            "total_views" => $total_view,
            "total_entries" => $total_entries,
            "created_at" => get_date_from_gmt($created_at_gmt_time, 'd F Y' ),
        );
    }

    $result = array("status" => 'true', "forms" => $formsList);

}else{
    $result = array("status" => 'false');
}

echo json_encode($result,  JSON_UNESCAPED_UNICODE);