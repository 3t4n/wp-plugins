<?php

/**
 * Ticket category.
 */

defined('ABSPATH') || exit;

class Apbd_wps_ticket_category extends AppsBDBaseModuleLite
{
    public function initialize()
    {
        parent::initialize();
        $this->disableDefaultForm();
        $this->AddAjaxAction("add", [$this, "add"]);
        $this->AddAjaxAction("edit", [$this, "edit"]);
        $this->AddAjaxAction("delete_item", [$this, "delete_item"]);
        $this->AddAjaxAction("delete_items", [$this, "delete_items"]);
        $this->AddAjaxAction("data_for_select", [$this, "data_for_select"]);
        $this->AddAjaxAction("activate_items", [$this, "activate_items"]);
        $this->AddAjaxAction("deactivate_items", [$this, "deactivate_items"]);

        $this->AddPortalAjaxAction("data_for_select", [$this, "data_for_select"]);
    }

    public function add()
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        if (APPSBD_IsPostBack) {
            $nobject = new Mapbd_wps_ticket_category();

            if ($nobject->SetFromPostData(true)) {
                if ($nobject->Save()) {
                    $apiResponse->SetResponse(true, $this->__('Successfully added.'));
                } else {
                    $apiResponse->SetResponse(false, $this->__('Something went wrong.'));
                }
            } else {
                $dataError = APBD_GetError();

                if ($dataError) {
                    $apiResponse->SetResponse(false, $dataError);
                } else {
                    $apiResponse->SetResponse(false, $this->__('Invalid data.'));
                }
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function edit($param_id = 0)
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $param_id = APBD_GetValue("id");

        if (APPSBD_IsPostBack && !empty($param_id)) {
            $mainobj = new Mapbd_wps_ticket_category();
            $mainobj->id($param_id);

            if ($mainobj->Select()) {
                $uobject = new Mapbd_wps_ticket_category();

                if ($uobject->SetFromPostData(false)) {
                    if (absint($param_id) !== absint($uobject->parent_category)) {
                        $uobject->SetWhereUpdate("id", $param_id);

                        if ($uobject->Update()) {
                            $apiResponse->SetResponse(true, $this->__('Successfully updated.'));
                        } else {
                            $apiResponse->SetResponse(false, $this->__('Nothing to update.'));
                        }
                    } else {
                        $apiResponse->SetResponse(false, $this->__('Invalid data.'));
                    }
                } else {
                    $dataError = APBD_GetError();

                    if ($dataError) {
                        $apiResponse->SetResponse(false, $dataError);
                    } else {
                        $apiResponse->SetResponse(false, $this->__('Invalid data.'));
                    }
                }
            } else {
                $apiResponse->SetResponse(false, $this->__('Invalid item.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function data()
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $mainobj = new Mapbd_wps_ticket_category();
        $total = absint($mainobj->CountALL());

        if (0 < $total) {
            $sort = APBD_GetValue("sort");
            $page = APBD_GetValue("page");
            $limit = APBD_GetValue("limit");

            $orderBy = 'id';
            $order = 'ASC';

            if ($sort) {
                $sort = explode('-', $sort);

                if (isset($sort[0]) && !empty($sort[0])) {
                    $orderBy = sanitize_key($sort[0]);
                }

                if (isset($sort[1]) && !empty($sort[1])) {
                    $order = 'asc' === sanitize_key($sort[1]) ? 'ASC' : 'DESC';
                }
            }

            $page = max(absint($page), 1);
            $limit = max(absint($limit), 10);
            $limitStart = ($limit * ($page - 1));

            $ctgs = $mainobj->SelectAllWithKeyValue("id", "title");
            $result = $mainobj->SelectAll("", $orderBy, $order, $limit, $limitStart);

            if ($result) {
                foreach ($result as &$data) {
                    $parent_category = absint($data->parent_category);

                    if ($parent_category) {
                        $data->parent_category_title = APBD_getTextByKey($data->parent_category, $ctgs);
                    } else {
                        $data->parent_category_title = '';
                    }
                }
            }

            $apiResponse->SetResponse(true, "", [
                'result' => $result,
                'total' => $total,
            ]);
        }

        echo wp_json_encode($apiResponse);
    }

    public function delete_item($param_id = 0)
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $param_id = APBD_GetValue("id");

        if (!empty($param_id)) {
            $mainobj = new Mapbd_wps_ticket_category();
            $mainobj->id($param_id);

            if ($mainobj->Select()) {
                $dobject = new Mapbd_wps_ticket_category();
                $dobject->SetWhereUpdate("id", $param_id);

                if ($dobject->Delete()) {
                    $apiResponse->SetResponse(true, $this->__('Successfully deleted.'));
                } else {
                    $apiResponse->SetResponse(false, $this->__('Something went wrong.'));
                }
            } else {
                $apiResponse->SetResponse(false, $this->__('Invalid item.'));
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
                foreach ($param_ids as $param_id) {
                    $mainobj = new Mapbd_wps_ticket_category();
                    $mainobj->id($param_id);

                    if ($mainobj->Select()) {
                        $dobject = new Mapbd_wps_ticket_category();
                        $dobject->SetWhereUpdate("id", $param_id);
                        $dobject->Delete();
                    }
                }

                $apiResponse->SetResponse(true, $this->__('Successfully deleted.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function data_for_select($except_id = 0, $select = false, $select_all = false, $with_id = false, $no_value = false)
    {
        $apiResponse = new Apbd_WPS_API_Response();

        $except_id = APBD_GetValue("except_id", 0);
        $select = APBD_GetValue("select", false);
        $select_all = APBD_GetValue("select_all", false);
        $with_id = APBD_GetValue("with_id", false);
        $no_value = APBD_GetValue("no_value", false);

        $except_id = absint($except_id);
        $select = rest_sanitize_boolean($select);
        $select_all = rest_sanitize_boolean($select_all);
        $with_id = rest_sanitize_boolean($with_id);
        $no_value = rest_sanitize_boolean($no_value);

        $mainobj = new Mapbd_wps_ticket_category();
        $prntobj = new Mapbd_wps_ticket_category();
        $total = absint($mainobj->CountALL());

        $result = [];
        $valkey = $no_value ? 'key' : 'value';

        if ($select) {
            $result[] = [
                $valkey => "",
                'label' => '-- ' . $this->__('Select Category') . ' --',
            ];
        }

        if ($select_all) {
            $result[] = [
                $valkey => "0",
                'label' => $this->__('All Categories'),
            ];
        }

        if (0 < $total) {
            $records = $mainobj->SelectAllWithKeyValue("id", "title", 'id', 'ASC', '', '', '', '', ['status' => 'A']);
            $parents = $prntobj->SelectAllWithKeyValue("id", "parent_category", 'id', 'ASC');

            if ($records) {
                foreach ($records as $id => $title) {
                    $id = absint($id);

                    if ($id !== $except_id) {
                        $title .= $with_id ? ' ' . $this->___('(ID: %d)', $id) : '';
                        $child = $this->FilterChildList($parents, $id);

                        $result[] = [
                            $valkey => strval($id),
                            'label' => $title,
                            'child' => $child,
                        ];
                    }
                }
            }
        }

        $apiResponse->SetResponse(true, "", [
            'result' => $result,
            'total' => $total,
        ]);

        echo wp_json_encode($apiResponse);
    }

    public function activate_items($param_ids = "")
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $param_ids = APBD_GetValue("ids");

        if (!empty($param_ids)) {
            $param_ids = explode(',', $param_ids);

            if (!empty($param_ids)) {
                foreach ($param_ids as $param_id) {
                    $mainobj = new Mapbd_wps_ticket_category();
                    $mainobj->id($param_id);

                    if ($mainobj->Select()) {
                        $uobject = new Mapbd_wps_ticket_category();
                        $uobject->status('A');
                        $uobject->SetWhereUpdate("id", $param_id);
                        $uobject->Update();
                    }
                }

                $apiResponse->SetResponse(true, $this->__('Successfully updated.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function deactivate_items($param_ids = "")
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $param_ids = APBD_GetValue("ids");

        if (!empty($param_ids)) {
            $param_ids = explode(',', $param_ids);

            if (!empty($param_ids)) {
                foreach ($param_ids as $param_id) {
                    $mainobj = new Mapbd_wps_ticket_category();
                    $mainobj->id($param_id);

                    if ($mainobj->Select()) {
                        $uobject = new Mapbd_wps_ticket_category();
                        $uobject->status('I');
                        $uobject->SetWhereUpdate("id", $param_id);
                        $uobject->Update();
                    }
                }

                $apiResponse->SetResponse(true, $this->__('Successfully updated.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function FilterChildList($parents, $id)
    {
        $child = [];

        foreach ($parents as $child_id => $parent) {
            if ($parent === strval($id)) {
                $child[] = $child_id;
                $child = array_merge($child, $this->FilterChildList($parents, $child_id));
            }
        }

        return $child;
    }
}
