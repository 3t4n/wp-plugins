<?php

$result = array();

/* Check if user has admin capabilities */
if(current_user_can('manage_options')){

    if(isset($_REQUEST['form_id'])){

        $form_id = sanitize_text_field($_REQUEST['form_id']);

        $form_name = $this->base_admin->settings->updateFormSettings($form_id, "form_name");

        $entryList = array();
        $list_entries = $this->base_admin->settings->listAllEntries($form_id);
        foreach ($list_entries as $single_entry){

            $entry_id = $single_entry['entry_id'];

            $read_status = $this->base_admin->settings->updateEntrySettings($entry_id, "read_status");
            $gmt_time = $this->base_admin->settings->updateEntrySettings($entry_id, "gmt_time");
            $user_id = $this->base_admin->settings->updateEntrySettings($entry_id, "user_id");
            $user_ip = $this->base_admin->settings->updateEntrySettings($entry_id, "user_ip");
            $user_page_url = $this->base_admin->settings->updateEntrySettings($entry_id, "user_page_url");
            $user_agent = $this->base_admin->settings->updateEntrySettings($entry_id, "user_agent");
            $user_browser = $this->base_admin->utils->getBrowserInformation($user_agent);

            $user_info = get_userdata($user_id);
            $user_name = ($user_info) ? $user_info->display_name : "Anonymous";
            $user_profile = ($user_info) ? admin_url( 'user-edit.php?user_id=').$user_id : "#";


            $entryList[] = array(
                "entry_id" => $entry_id,
                "read_status" => $read_status,
                "submission_time" => get_date_from_gmt($gmt_time, 'd/m/Y, h:i A' ),
                "user_id" => $user_id,
                "user_name" => $user_name,
                "user_profile" => $user_profile,
                "user_ip" => $user_ip,
                "user_page_url" => $user_page_url,
                "user_browser" => $user_browser["name"].", ".$user_browser["platform"],
            );
        }

        $result = array("status" => 'true', "form_name" => $form_name, "entries" => array_reverse($entryList));

    }else{
        $result = array("status" => 'false');
    }

}else{
    $result = array("status" => 'false');
}

echo json_encode($result,  JSON_UNESCAPED_UNICODE);