<?php

/**
 * Ticket.
 */

defined('ABSPATH') || exit;

class Apbd_wps_ticket extends AppsBDBaseModuleLite
{
    public function initialize()
    {
        parent::initialize();
        $this->disableDefaultForm();
        $this->AddAjaxAction("add", [$this, "add"]);
        $this->AddAjaxAction("note_add", [$this, "note_add"]);
        $this->AddAjaxAction("edit", [$this, "edit"]);
        $this->AddAjaxAction("field_edit", [$this, "field_edit"]);
        $this->AddAjaxAction("bulk_edit", [$this, "bulk_edit"]);
        $this->AddAjaxAction("privacy_edit", [$this, "privacy_edit"]);
        $this->AddAjaxAction("data_single", [$this, "data_single"]);
        $this->AddAjaxAction("trash_item", [$this, "trash_item"]);
        $this->AddAjaxAction("trash_items", [$this, "trash_items"]);
        $this->AddAjaxAction("restore_item", [$this, "restore_item"]);
        $this->AddAjaxAction("restore_items", [$this, "restore_items"]);
        $this->AddAjaxAction("delete_item", [$this, "delete_item"]);
        $this->AddAjaxAction("delete_items", [$this, "delete_items"]);
        $this->AddAjaxAction("status_for_select", [$this, "status_for_select"]);
        $this->AddAjaxAction("priority_for_select", [$this, "priority_for_select"]);
        $this->AddAjaxAction("download", [$this, "download"]);

        $this->AddPortalAjaxAction("add", [$this, "add_portal"]);
        $this->AddPortalAjaxAction("note_add", [$this, "note_add"]);
        $this->AddPortalAjaxAction("edit", [$this, "edit_portal"]);
        $this->AddPortalAjaxAction("field_edit", [$this, "field_edit"]);
        $this->AddPortalAjaxAction("bulk_edit", [$this, "bulk_edit"]);
        $this->AddPortalAjaxAction("privacy_edit", [$this, "privacy_edit"]);
        $this->AddPortalAjaxAction("data", [$this, "data_portal"]);
        $this->AddPortalAjaxAction("data_single", [$this, "data_single_portal"]);
        $this->AddPortalAjaxAction("trash_item", [$this, "trash_item"]);
        $this->AddPortalAjaxAction("trash_items", [$this, "trash_items"]);
        $this->AddPortalAjaxAction("restore_item", [$this, "restore_item"]);
        $this->AddPortalAjaxAction("restore_items", [$this, "restore_items"]);
        $this->AddPortalAjaxAction("delete_item", [$this, "delete_item"]);
        $this->AddPortalAjaxAction("delete_items", [$this, "delete_items"]);
        $this->AddPortalAjaxAction("status_for_select", [$this, "status_for_select"]);
        $this->AddPortalAjaxAction("download", [$this, "download"]);
    }

    public function add()
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $hasError = false;

        if (APPSBD_IsPostBack) {
            $cat_id = absint(APBD_PostValue('cat_id', ''));
            $ticket_user = absint(APBD_PostValue('ticket_user', ''));
            $title = sanitize_text_field(APBD_PostValue('title', ''));
            $ticket_body = wp_kses_html(APBD_PostValue('ticket_body', ''));
            $is_public = sanitize_text_field(APBD_PostValue('is_public', ''));
            $custom_fields = APBD_PostValue('custom_fields', '');

            if (!empty($custom_fields)) {
                $custom_fields = json_decode(stripslashes($custom_fields), true);

                if (is_array($custom_fields)) {
                    $custom_fields = array_map(function ($value) {
                        return !is_bool($value) ? sanitize_text_field($value) : $value;
                    }, $custom_fields);
                }
            }

            $ticket_body = stripslashes($ticket_body);
            $check__ticket_body = sanitize_text_field($ticket_body);
            $is_public = 'Y' === $is_public ? 'Y' : 'N';

            $cat_id = strval($cat_id);
            $ticket_user = strval($ticket_user);
            $custom_fields = is_array($custom_fields) ? $custom_fields : [];

            if (
                (1 > strlen($title)) ||
                (1 > strlen($check__ticket_body))
            ) {
                $hasError = true;
            }

            $userObj = get_user_by("id", $ticket_user);

            if (empty($userObj)) {
                $hasError = true;
            }

            if (!$hasError) {
                $namespace = APBDWPSupportLite::getNamespaceStr();
                $apiObj = new APBDWPSTicketAPI($namespace, false);

                $apiObj->SetPayload('cat_id', $cat_id);
                $apiObj->SetPayload('ticket_user', $ticket_user);
                $apiObj->SetPayload('title', $title);
                $apiObj->SetPayload('ticket_body', $ticket_body);
                $apiObj->SetPayload('is_public', $is_public);
                $apiObj->SetPayload('custom_fields', $custom_fields);

                $resObj = $apiObj->create_ticket();
                $resStatus = isset($resObj->status) ? rest_sanitize_boolean($resObj->status) : false;

                if ($resStatus) {
                    $apiResponse->SetResponse(true, $this->__('Successfully added.'));
                } else {
                    $apiResponse->SetResponse(false, $this->__('Something went wrong.'));
                }
            } else {
                $apiResponse->SetResponse(false, $this->__('Invalid data.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function add_portal()
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $hasError = false;

        if (APPSBD_IsPostBack) {
            $cat_id = absint(APBD_PostValue('cat_id', ''));
            $ticket_user = absint(APBD_PostValue('ticket_user', ''));
            $title = sanitize_text_field(APBD_PostValue('title', ''));
            $ticket_body = wp_kses_html(APBD_PostValue('ticket_body', ''));
            $is_public = sanitize_text_field(APBD_PostValue('is_public', ''));
            $custom_fields = APBD_PostValue('custom_fields', '');

            if (Apbd_wps_settings::isClientLoggedIn()) {
                $userObj = wp_get_current_user();
                $ticket_user = is_object($userObj) && isset($userObj->ID) ? absint($userObj->ID) : 0;
            }

            if (!empty($custom_fields)) {
                $custom_fields = json_decode(stripslashes($custom_fields), true);

                if (is_array($custom_fields)) {
                    $custom_fields = array_map(function ($value) {
                        return !is_bool($value) ? sanitize_text_field($value) : $value;
                    }, $custom_fields);
                }
            }

            $ticket_body = stripslashes($ticket_body);
            $check__ticket_body = sanitize_text_field($ticket_body);
            $is_public = 'Y' === $is_public ? 'Y' : 'N';

            $cat_id = strval($cat_id);
            $ticket_user = strval($ticket_user);
            $custom_fields = is_array($custom_fields) ? $custom_fields : [];

            if (
                (1 > strlen($title)) ||
                (1 > strlen($check__ticket_body))
            ) {
                $hasError = true;
            }

            $userObj = get_user_by("id", $ticket_user);

            if (empty($userObj)) {
                $hasError = true;
            }

            if (!$hasError) {
                $namespace = APBDWPSupportLite::getNamespaceStr();
                $apiObj = new APBDWPSTicketAPI($namespace, false);

                $apiObj->SetPayload('cat_id', $cat_id);
                $apiObj->SetPayload('ticket_user', $ticket_user);
                $apiObj->SetPayload('title', $title);
                $apiObj->SetPayload('ticket_body', $ticket_body);
                $apiObj->SetPayload('is_public', $is_public);
                $apiObj->SetPayload('custom_fields', $custom_fields);

                $resObj = $apiObj->create_ticket();
                $resStatus = isset($resObj->status) ? rest_sanitize_boolean($resObj->status) : false;

                if ($resStatus) {
                    $apiResponse->SetResponse(true, $this->__('Successfully added.'));
                } else {
                    $apiResponse->SetResponse(false, $this->__('Something went wrong.'));
                }
            } else {
                $apiResponse->SetResponse(false, $this->__('Invalid data.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function note_add($param_id = "")
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $param_id = APBD_GetValue("id");

        $hasError = false;

        if (APPSBD_IsPostBack && !empty($param_id)) {
            $note_text = wp_kses_html(APBD_PostValue('note_text', ''));

            $note_text = stripslashes($note_text);
            $check__note_text = sanitize_text_field($note_text);

            if (1 > strlen($check__note_text)) {
                $hasError = true;
            }

            if (!$hasError) {
                $namespace = APBDWPSupportLite::getNamespaceStr();
                $apiObj = new APBDWPSTicketAPI($namespace, false);

                $mainobj = new Mapbd_wps_ticket();
                $mainobj->id($param_id);

                if ($mainobj->Select()) {
                    $namespace = APBDWPSupportLite::getNamespaceStr();
                    $apiObj = new APBDWPSTicketAPI($namespace, false);

                    $apiObj->SetPayload('ticket_id', $param_id);
                    $apiObj->SetPayload('note_text', $note_text);

                    $resObj = $apiObj->create_note();
                    $resStatus = isset($resObj->status) ? rest_sanitize_boolean($resObj->status) : false;

                    if ($resStatus) {
                        $apiResponse->SetResponse(true, $this->__('Successfully added.'));
                    } else {
                        $apiResponse->SetResponse(false, $this->__('Something went wrong.'));
                    }
                }
            } else {
                $apiResponse->SetResponse(false, $this->__('Invalid data.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function edit($param_id = "")
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $param_id = APBD_GetValue("id");

        if (APPSBD_IsPostBack && !empty($param_id)) {
            $assigned_on = absint(APBD_PostValue('assigned_on', ''));
            $cat_id = absint(APBD_PostValue('cat_id', ''));
            $email_notification = sanitize_text_field(APBD_PostValue('email_notification', ''));
            $status = sanitize_text_field(APBD_PostValue('status', ''));

            if (!empty($assigned_on) || !empty($cat_id) || !empty($email_notification) || !empty($status)) {
                $namespace = APBDWPSupportLite::getNamespaceStr();
                $apiObj = new APBDWPSTicketAPI($namespace, false);

                $mainobj = new Mapbd_wps_ticket();
                $mainobj->id($param_id);

                if ($mainobj->Select()) {
                    if (!empty($assigned_on)) {
                        $apiObj->SetPayload('propName', 'assigned_on');
                        $apiObj->SetPayload('value', $assigned_on);
                        $apiObj->SetPayload('ticketId', $param_id);

                        $apiObj->update_ticket();
                    }

                    if (!empty($cat_id)) {
                        $apiObj->SetPayload('propName', 'cat_id');
                        $apiObj->SetPayload('value', $cat_id);
                        $apiObj->SetPayload('ticketId', $param_id);

                        $apiObj->update_ticket();
                    }

                    if (!empty($email_notification)) {
                        $apiObj->SetPayload('propName', 'email_notification');
                        $apiObj->SetPayload('value', 'Y' === $email_notification ? 'Y' : 'N');
                        $apiObj->SetPayload('ticketId', $param_id);

                        $apiObj->update_ticket();
                    }

                    if (!empty($status)) {
                        $apiObj->SetPayload('propName', 'status');
                        $apiObj->SetPayload('value', $status);
                        $apiObj->SetPayload('ticketId', $param_id);

                        $apiObj->update_ticket();
                    }
                }

                $apiResponse->SetResponse(true, $this->__('Successfully updated.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function edit_portal($param_id = "")
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $param_id = APBD_GetValue("id");

        if (APPSBD_IsPostBack && !empty($param_id)) {
            $assigned_on = absint(APBD_PostValue('assigned_on', ''));
            $cat_id = absint(APBD_PostValue('cat_id', ''));
            $email_notification = sanitize_text_field(APBD_PostValue('email_notification', ''));
            $status = sanitize_text_field(APBD_PostValue('status', ''));

            $isAgent = Apbd_wps_settings::isAgentLoggedIn();

            if (
                (
                    $isAgent &&
                    (
                        !empty($assigned_on) ||
                        !empty($cat_id) ||
                        !empty($email_notification) ||
                        !empty($status)
                    )
                ) ||
                (!empty($status))
            ) {
                $namespace = APBDWPSupportLite::getNamespaceStr();
                $apiObj = new APBDWPSTicketAPI($namespace, false);

                $mainobj = new Mapbd_wps_ticket();
                $mainobj->id($param_id);

                if ($mainobj->Select()) {
                    if ($isAgent) {
                        if (!empty($assigned_on)) {
                            $apiObj->SetPayload('propName', 'assigned_on');
                            $apiObj->SetPayload('value', $assigned_on);
                            $apiObj->SetPayload('ticketId', $param_id);

                            $apiObj->update_ticket();
                        }

                        if (!empty($cat_id)) {
                            $apiObj->SetPayload('propName', 'cat_id');
                            $apiObj->SetPayload('value', $cat_id);
                            $apiObj->SetPayload('ticketId', $param_id);

                            $apiObj->update_ticket();
                        }

                        if (!empty($email_notification)) {
                            $apiObj->SetPayload('propName', 'email_notification');
                            $apiObj->SetPayload('value', 'Y' === $email_notification ? 'Y' : 'N');
                            $apiObj->SetPayload('ticketId', $param_id);

                            $apiObj->update_ticket();
                        }
                    }

                    if (!empty($status)) {
                        $apiObj->SetPayload('propName', 'status');
                        $apiObj->SetPayload('value', $status);
                        $apiObj->SetPayload('ticketId', $param_id);

                        $apiObj->update_ticket();
                    }
                }

                $apiResponse->SetResponse(true, $this->__('Successfully updated.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function field_edit($param_id = "")
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $param_id = APBD_GetValue("id");

        if (APPSBD_IsPostBack && !empty($param_id)) {
            $fields = array_map(function ($value) {
                return !is_bool($value) ? sanitize_text_field($value) : $value;
            }, $_POST);

            if (!empty($fields)) {
                $namespace = APBDWPSupportLite::getNamespaceStr();
                $apiObj = new APBDWPSTicketAPI($namespace, false);

                $mainobj = new Mapbd_wps_ticket();
                $mainobj->id($param_id);

                if ($mainobj->Select()) {
                    foreach ($fields as $name => $value) {
                        $apiObj->SetPayload('propName', $name);
                        $apiObj->SetPayload('value', $value);
                        $apiObj->SetPayload('ticket_id', $param_id);

                        $apiObj->update_custom_field();
                    }
                }

                $apiResponse->SetResponse(true, $this->__('Successfully updated.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function bulk_edit($param_ids = "")
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $param_ids = APBD_GetValue("ids");

        if (!empty($param_ids)) {
            $param_ids = explode(',', $param_ids);

            if (!empty($param_ids)) {
                $assigned_on = absint(APBD_PostValue('assigned_on', ''));
                $cat_id = absint(APBD_PostValue('cat_id', ''));
                $email_notification = sanitize_text_field(APBD_PostValue('email_notification', ''));
                $status = sanitize_text_field(APBD_PostValue('status', ''));

                if (!empty($assigned_on) || !empty($cat_id) || !empty($email_notification) || !empty($status)) {
                    $namespace = APBDWPSupportLite::getNamespaceStr();
                    $apiObj = new APBDWPSTicketAPI($namespace, false);

                    foreach ($param_ids as $param_id) {
                        $mainobj = new Mapbd_wps_ticket();
                        $mainobj->id($param_id);

                        if ($mainobj->Select()) {
                            if (!empty($assigned_on)) {
                                $apiObj->SetPayload('propName', 'assigned_on');
                                $apiObj->SetPayload('value', $assigned_on);
                                $apiObj->SetPayload('ticketId', $param_id);

                                $apiObj->update_ticket();
                            }

                            if (!empty($cat_id)) {
                                $apiObj->SetPayload('propName', 'cat_id');
                                $apiObj->SetPayload('value', $cat_id);
                                $apiObj->SetPayload('ticketId', $param_id);

                                $apiObj->update_ticket();
                            }

                            if (!empty($email_notification)) {
                                $apiObj->SetPayload('propName', 'email_notification');
                                $apiObj->SetPayload('value', 'Y' === $email_notification ? 'Y' : 'N');
                                $apiObj->SetPayload('ticketId', $param_id);

                                $apiObj->update_ticket();
                            }

                            if (!empty($status)) {
                                $apiObj->SetPayload('propName', 'status');
                                $apiObj->SetPayload('value', $status);
                                $apiObj->SetPayload('ticketId', $param_id);

                                $apiObj->update_ticket();
                            }
                        }
                    }

                    $apiResponse->SetResponse(true, $this->__('Successfully updated.'));
                }
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function privacy_edit($param_id = "")
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $param_id = APBD_GetValue("id");

        if (APPSBD_IsPostBack && !empty($param_id)) {
            $public = sanitize_text_field(APBD_PostValue('public', ''));
            $public = 'Y' === $public ? 'Y' : 'N';

            $namespace = APBDWPSupportLite::getNamespaceStr();
            $apiObj = new APBDWPSTicketAPI($namespace, false);

            $mainobj = new Mapbd_wps_ticket();
            $mainobj->id($param_id);

            if ($mainobj->Select()) {
                $namespace = APBDWPSupportLite::getNamespaceStr();
                $apiObj = new APBDWPSTicketAPI($namespace, false);

                $apiObj->SetPayload('ticketId', $param_id);
                $apiObj->SetPayload('privacy', $public);

                $resObj = $apiObj->update_privacy();
                $resStatus = isset($resObj->status) ? rest_sanitize_boolean($resObj->status) : false;

                if ($resStatus) {
                    $apiResponse->SetResponse(true, $this->__('Successfully updated.'));
                } else {
                    $apiResponse->SetResponse(false, $this->__('Something went wrong.'));
                }
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function data()
    {
        $tkt_type = APBD_GetValue("tkt_type");
        $sub_type = APBD_GetValue("sub_type");
        $category = APBD_GetValue("category");
        $tag = APBD_GetValue("tag");
        $agent = APBD_GetValue("agent");
        $search = APBD_GetValue("search");
        $need_reply = APBD_GetValue("need_reply");
        $sort = APBD_GetValue("sort");
        $page = APBD_GetValue("page");
        $limit = APBD_GetValue("limit");

        $tkt_type = in_array($tkt_type, ['T', 'MY', 'UA', 'D'], true) ? $tkt_type : 'T';
        $sub_type = in_array($sub_type, ['A', 'I', 'C', 'ST'], true) ? $sub_type : ('D' !== $tkt_type ? 'A' : 'ST');

        $orderBy = 'last_reply_time';
        $order = 'desc';

        if ($sort) {
            $sort = explode('-', $sort);

            if (isset($sort[0]) && !empty($sort[0])) {
                $orderBy = sanitize_key($sort[0]);
            }

            if (isset($sort[1]) && !empty($sort[1])) {
                $order = 'asc' === sanitize_key($sort[1]) ? 'asc' : 'desc';
            }
        }

        $page = max(absint($page), 1);
        $limit = max(absint($limit), 10);
        $filter_prop = '';
        $sort_by = [];
        $src_by = [];
        $group_by = [];

        if ('Y' === $need_reply) {
            $filter_prop = 'nr';
        }

        $sort_by[] = ['prop' => $orderBy, 'ord' => $order];

        if ($search) {
            $src_by[] = ['prop' => '*', 'val' => esc_attr($search), 'opr' => 'like'];
        }

        $namespace = APBDWPSupportLite::getNamespaceStr();
        $apiObj = new APBDWPSTicketAPI($namespace, false);

        $apiObj->SetPayload('data', $tkt_type);
        $apiObj->SetPayload('sub_type', $sub_type);
        $apiObj->SetPayload('category', $category);
        $apiObj->SetPayload('tag', $tag);
        $apiObj->SetPayload('agent', $agent);
        $apiObj->SetPayload('limit', $limit);
        $apiObj->SetPayload('page', $page);
        $apiObj->SetPayload('filter_prop', $filter_prop);
        $apiObj->SetPayload('sort_by', $sort_by);
        $apiObj->SetPayload('src_by', $src_by);
        $apiObj->SetPayload('group_by', $group_by);
        $apiObj->SetPayload('force', false);

        $apiResponse = $apiObj->ticket_list();

        echo wp_json_encode($apiResponse);
    }

    public function data_portal()
    {
        $tkt_type = APBD_GetValue("tkt_type");
        $sub_type = APBD_GetValue("sub_type");
        $category = APBD_GetValue("category");
        $tag = APBD_GetValue("tag");
        $agent = APBD_GetValue("agent");
        $search = APBD_GetValue("search");
        $need_reply = APBD_GetValue("need_reply");
        $sort = APBD_GetValue("sort");
        $page = APBD_GetValue("page");
        $limit = APBD_GetValue("limit");

        $isAgent = Apbd_wps_settings::isAgentLoggedIn();

        $tkt_type = in_array($tkt_type, ['T', 'MY', 'UA', 'D'], true) ? $tkt_type : 'T';
        $sub_type = in_array($sub_type, ['A', 'I', 'C', 'ST'], true) ? $sub_type : ('D' !== $tkt_type ? 'A' : 'ST');

        if (!$isAgent) {
            $tkt_type = 'T';
            $sub_type = in_array($sub_type, ['A', 'I', 'C', 'ST'], true) ? $sub_type : 'A';
            $tag = '';
            $agent = '';
            $need_reply = 'N';
        }

        $orderBy = 'last_reply_time';
        $order = 'desc';

        if ($sort) {
            $sort = explode('-', $sort);

            if (isset($sort[0]) && !empty($sort[0])) {
                $orderBy = sanitize_key($sort[0]);
            }

            if (isset($sort[1]) && !empty($sort[1])) {
                $order = 'asc' === sanitize_key($sort[1]) ? 'asc' : 'desc';
            }
        }

        $page = max(absint($page), 1);
        $limit = max(absint($limit), 10);
        $filter_prop = '';
        $sort_by = [];
        $src_by = [];
        $group_by = [];

        if ('Y' === $need_reply) {
            $filter_prop = 'nr';
        }

        $sort_by[] = ['prop' => $orderBy, 'ord' => $order];

        if ($search) {
            $src_by[] = ['prop' => '*', 'val' => esc_attr($search), 'opr' => 'like'];
        }

        $namespace = APBDWPSupportLite::getNamespaceStr();
        $apiObj = new APBDWPSTicketAPI($namespace, false);

        $apiObj->SetPayload('data', $tkt_type);
        $apiObj->SetPayload('sub_type', $sub_type);
        $apiObj->SetPayload('category', $category);
        $apiObj->SetPayload('tag', $tag);
        $apiObj->SetPayload('agent', $agent);
        $apiObj->SetPayload('limit', $limit);
        $apiObj->SetPayload('page', $page);
        $apiObj->SetPayload('filter_prop', $filter_prop);
        $apiObj->SetPayload('sort_by', $sort_by);
        $apiObj->SetPayload('src_by', $src_by);
        $apiObj->SetPayload('group_by', $group_by);
        $apiObj->SetPayload('force', false);

        $apiResponse = $apiObj->ticket_list();

        echo wp_json_encode($apiResponse);
    }

    public function data_single($param_id = 0)
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $param_id = APBD_GetValue("id");

        if (!empty($param_id)) {
            $namespace = APBDWPSupportLite::getNamespaceStr();
            $apiObj = new APBDWPSTicketAPI($namespace, false);

            $apiResponse = $apiObj->ticket_details__dashboard(['ticketId' => $param_id]);
        }

        echo wp_json_encode($apiResponse);
    }

    public function data_single_portal($param_id = 0)
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $param_id = APBD_GetValue("id");

        if (!empty($param_id)) {
            $namespace = APBDWPSupportLite::getNamespaceStr();
            $apiObj = new APBDWPSTicketAPI($namespace, false);

            $apiResponse = $apiObj->ticket_details__portal(['ticketId' => $param_id]);
        }

        echo wp_json_encode($apiResponse);
    }

    public function trash_item($param_id = "")
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $param_id = APBD_GetValue("id");

        if (APPSBD_IsPostBack && !empty($param_id)) {
            $namespace = APBDWPSupportLite::getNamespaceStr();
            $apiObj = new APBDWPSTicketAPI($namespace, false);

            $mainobj = new Mapbd_wps_ticket();
            $mainobj->id($param_id);

            if ($mainobj->Select()) {
                $resObj = $apiObj->move_to_trash(['ticketId' => $param_id]);
                $resStatus = isset($resObj->status) ? rest_sanitize_boolean($resObj->status) : false;

                if ($resStatus) {
                    $apiResponse->SetResponse(true, $this->__('Successfully moved to trash.'));
                } else {
                    $apiResponse->SetResponse(false, $this->__('Something went wrong.'));
                }
            } else {
                $apiResponse->SetResponse(false, $this->__('Invalid data.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function trash_items($param_ids = "")
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $param_ids = APBD_GetValue("ids");

        if (!empty($param_ids)) {
            $param_ids = explode(',', $param_ids);

            if (!empty($param_ids)) {
                $namespace = APBDWPSupportLite::getNamespaceStr();
                $apiObj = new APBDWPSTicketAPI($namespace, false);

                foreach ($param_ids as $param_id) {
                    $mainobj = new Mapbd_wps_ticket();
                    $mainobj->id($param_id);

                    if ($mainobj->Select()) {
                        $apiResponse = $apiObj->move_to_trash(['ticketId' => $param_id]);
                    }
                }

                $apiResponse->SetResponse(true, $this->__('Successfully moved to trash.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function restore_item($param_id = "")
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $param_id = APBD_GetValue("id");

        if (APPSBD_IsPostBack && !empty($param_id)) {
            $namespace = APBDWPSupportLite::getNamespaceStr();
            $apiObj = new APBDWPSTicketAPI($namespace, false);

            $mainobj = new Mapbd_wps_ticket();
            $mainobj->id($param_id);

            if ($mainobj->Select()) {
                $resObj = $apiObj->restore_ticket(['ticketId' => $param_id]);
                $resStatus = isset($resObj->status) ? rest_sanitize_boolean($resObj->status) : false;

                if ($resStatus) {
                    $apiResponse->SetResponse(true, $this->__('Successfully restored.'));
                } else {
                    $apiResponse->SetResponse(false, $this->__('Something went wrong.'));
                }
            } else {
                $apiResponse->SetResponse(false, $this->__('Invalid data.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function restore_items($param_ids = "")
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $param_ids = APBD_GetValue("ids");

        if (!empty($param_ids)) {
            $param_ids = explode(',', $param_ids);

            if (!empty($param_ids)) {
                $namespace = APBDWPSupportLite::getNamespaceStr();
                $apiObj = new APBDWPSTicketAPI($namespace, false);

                foreach ($param_ids as $param_id) {
                    $mainobj = new Mapbd_wps_ticket();
                    $mainobj->id($param_id);

                    if ($mainobj->Select()) {
                        $apiResponse = $apiObj->restore_ticket(['ticketId' => $param_id]);
                    }
                }

                $apiResponse->SetResponse(true, $this->__('Successfully restored.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function delete_item($param_id = "")
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $param_id = APBD_GetValue("id");

        if (APPSBD_IsPostBack && !empty($param_id)) {
            $namespace = APBDWPSupportLite::getNamespaceStr();
            $apiObj = new APBDWPSTicketAPI($namespace, false);

            $mainobj = new Mapbd_wps_ticket();
            $mainobj->id($param_id);

            if ($mainobj->Select()) {
                $resObj = $apiObj->delete_ticket(['ticketId' => $param_id]);
                $resStatus = isset($resObj->status) ? rest_sanitize_boolean($resObj->status) : false;

                if ($resStatus) {
                    $apiResponse->SetResponse(true, $this->__('Successfully deleted.'));
                } else {
                    $apiResponse->SetResponse(false, $this->__('Something went wrong.'));
                }
            } else {
                $apiResponse->SetResponse(false, $this->__('Invalid data.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function delete_items($param_ids = "")
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $param_ids = APBD_GetValue("ids");

        if (!empty($param_ids)) {
            $param_ids = explode(',', $param_ids);

            if (!empty($param_ids)) {
                $namespace = APBDWPSupportLite::getNamespaceStr();
                $apiObj = new APBDWPSTicketAPI($namespace, false);

                foreach ($param_ids as $param_id) {
                    $mainobj = new Mapbd_wps_ticket();
                    $mainobj->id($param_id);

                    if ($mainobj->Select()) {
                        $apiResponse = $apiObj->delete_ticket(['ticketId' => $param_id]);
                    }
                }

                $apiResponse->SetResponse(true, $this->__('Successfully deleted.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function status_for_select($except_key = '', $select = false, $select_all = false, $with_key = false, $no_value = false)
    {
        $apiResponse = new Apbd_WPS_API_Response();

        $except_key = APBD_GetValue("except_key", "");
        $select = APBD_GetValue("select", false);
        $select_all = APBD_GetValue("select_all", false);
        $with_key = APBD_GetValue("with_key", false);
        $no_value = APBD_GetValue("no_value", false);

        $except_key = sanitize_text_field($except_key);
        $select = rest_sanitize_boolean($select);
        $select_all = rest_sanitize_boolean($select_all);
        $with_key = rest_sanitize_boolean($with_key);
        $no_value = rest_sanitize_boolean($no_value);

        $settingsObj = Apbd_wps_settings::GetModuleInstance();

        $statuses = array(
            'N' => $this->__('New'),
            'C' => $this->__('Closed'),
            'P' => $this->__('In-progress'),
            'R' => $this->__('Re-open'),
            'A' => $this->__('Active'),
            'I' => $this->__('Inactive'),
            'D' => $this->__('Trashed'),
        );

        $result = [];
        $valkey = $no_value ? 'key' : 'value';

        if ($select) {
            $result[] = [
                $valkey => "",
                'label' => '-- ' . $this->__('Select Status') . ' --',
            ];
        }

        if ($select_all) {
            $result[] = [
                $valkey => "0",
                'label' => $this->__('All Statuses'),
            ];
        }

        foreach ($statuses as $key => $title) {
            $key = strval($key);

            if ($key !== $except_key) {
                $title .= $with_key ? ' ' . $this->___('(Key: %d)', $key) : '';

                $result[] = [
                    $valkey => $key,
                    'label' => $title,
                ];
            }
        }

        $apiResponse->SetResponse(true, "", [
            'result' => $result,
            'total' => count($result),
        ]);

        echo wp_json_encode($apiResponse);
    }

    public function priority_for_select($except_key = '', $select = false, $select_all = false, $with_key = false, $no_value = false)
    {
        $apiResponse = new Apbd_WPS_API_Response();

        $except_key = APBD_GetValue("except_key", "");
        $select = APBD_GetValue("select", false);
        $select_all = APBD_GetValue("select_all", false);
        $with_key = APBD_GetValue("with_key", false);
        $no_value = APBD_GetValue("no_value", false);

        $except_key = sanitize_text_field($except_key);
        $select = rest_sanitize_boolean($select);
        $select_all = rest_sanitize_boolean($select_all);
        $with_key = rest_sanitize_boolean($with_key);
        $no_value = rest_sanitize_boolean($no_value);

        $priorities = array(
            'L' => $this->__('Low'),
            'M' => $this->__('Medium'),
            'H' => $this->__('High'),
            'U' => $this->__('Urgent'),
        );

        $result = [];
        $valkey = $no_value ? 'key' : 'value';

        if ($select) {
            $result[] = [
                $valkey => "",
                'label' => '-- ' . $this->__('Select Priority') . ' --',
            ];
        }

        if ($select_all) {
            $result[] = [
                $valkey => "0",
                'label' => $this->__('All Priorities'),
            ];
        }

        foreach ($priorities as $key => $title) {
            $key = strval($key);

            if ($key !== $except_key) {
                $title .= $with_key ? ' ' . $this->___('(Key: %d)', $key) : '';

                $result[] = [
                    $valkey => $key,
                    'label' => $title,
                ];
            }
        }

        $apiResponse->SetResponse(true, "", [
            'result' => $result,
            'total' => count($result),
        ]);

        echo wp_json_encode($apiResponse);
    }

    public function download($param_id = 0)
    {
        $obj = APBDWPSupportLite::GetInstance();
        $pluginPath = untrailingslashit(plugin_dir_path($obj->pluginFile));

        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $param_id = APBD_GetValue("id");

        if (APPSBD_IsPostBack && !empty($param_id)) {
            $detailsObj = Mapbd_wps_ticket::getTicketDetails($param_id);

            if (! empty($detailsObj)) {
                $userObj = $detailsObj->user;
                $ticketObj = $detailsObj->ticket;
                $replies = $detailsObj->replies;

                $firstReplyObj = new stdClass();
                $firstReplyObj->replied_by = $ticketObj->ticket_user;
                $firstReplyObj->replied_by_type = 'U';
                $firstReplyObj->reply_text = $ticketObj->ticket_body;
                $firstReplyObj->reply_time = $ticketObj->opened_time;
                $firstReplyObj->is_private = 'N';
                $firstReplyObj->reply_user = $userObj;
                $firstReplyObj->attached_files = array();

                array_unshift($replies, $firstReplyObj);

                if (! empty($userObj) && ! empty($ticketObj)) {
                    $cssPath = $pluginPath . "/views/download_ticket/style.min.php";
                    $htmlPath = $pluginPath . "/views/download_ticket/main.php";

                    ob_start();
                    include $cssPath;
                    include $htmlPath;
                    $fileHtml = ob_get_clean();

                    $fileContent = base64_encode($fileHtml);

                    $domain = wp_parse_url(home_url(), PHP_URL_HOST);
                    $domainr = str_replace('.', '-dot-', $domain);

                    $fileName = sprintf('%1$s-sg-ticket-%2$s-%3$s.pdf', current_time('U'), $param_id, $domainr);
                    $fileName = sanitize_file_name($fileName);

                    $data = array(
                        'fileName' => $fileName,
                        'fileContent' => $fileContent,
                    );

                    $apiResponse->SetResponse(true, $this->__('Ticket downloaded.'), $data);
                }
            }
        }

        echo wp_json_encode($apiResponse);
    }
}
