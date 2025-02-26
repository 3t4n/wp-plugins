<?php

global $Application_Maker, $oThis;
if (!class_exists('setModuleGridBodyCls')) {

    class setModuleGridBodyCls extends Application_Maker_setField {

        public function __construct() {
            $this->fieldtype = "setModuleGridBody";
            $this->hasSaveField = false;
            $this->AbortGlobalSave = false;
            $this->classSubActions = array('getGlobalGridData', 'oriGridDeleteRows', 'setPostsStatus');
        }

        public function setPostsStatus() {
            global $current_user, $post_id, $oThis, $post, $meta_marker;

            if (current_user_can('administrator') or current_user_can('editor')) {
                $args = $_POST['args'];
                $args = stripslashes($args);
                $args = json_decode($args);
                $ids = $args->ids;
                $status = $args->status;
                switch ($status) {
                    case'DRAFT':
                        $status = 'draft';
                        break;
                    case'PUBLISHED':
                        $status = 'publish';
                        break;
                    case'UNPUBLISHED':
                        $status = 'pending';
                        break;
                    case'TRASHED':
                        $status = 'trash';
                        break;
                }
                $hasNotAllowed = array();
                $updated = array();
                foreach ($ids as $id) {
                    $p = get_post($id);
                    $test = false;
                    if (current_user_can('administrator')) {
                        $test = true;
                    } else {
                        if ($p->post_author == $current_user->ID) {
                            $test = true;
                        }
                    }
                    if ($test) {
                        $my_post = array();
                        $my_post['ID'] = $id;
                        $my_post['post_status'] = $status;
                        wp_update_post($my_post);
                        $updated[] = $id;
                    } else {
                        $hasNotAllowed[] = $id;
                    }
                }
                if (count($hasNotAllowed) > 0) {
                    $rt = array(
                        'success' => 'partial',
                        'idsupdated' => implode(',', $updated),
                        'issue' => 'Sorry, you can\'t update records not created by you.<br/> ' . count($hasNotAllowed) . ' record(s) not updated: ',
                        'txt' => 'An issue occured'
                    );
                } else {
                    $rt = array(
                        'success' => 'ok',
                        'idsupdated' => implode(',', $updated),
                        'txt' => 'Row(s) successfully updated'
                    );
                }
            } else {
                $rt = array(
                    'success' => 'error',
                    'issue' => 'Trying to cheat... this user is not allowed to update....',
                    'txt' => 'An error occured'
                );
            }
            echo json_encode($rt);
            die();
        }

        public function oriGridDeleteRows() {
            global $current_user, $post_id, $oThis, $post, $meta_marker;
            if (current_user_can('administrator') or current_user_can('editor')) {
                $ids = $_POST['args'];
                $ids = explode(',', $ids);
                $hasNotAllowed = array();
                $deleted = array();
                foreach ($ids as $id) {
                    $p = get_post($id);
                    $test = false;
                    if (current_user_can('administrator')) {
                        $test = true;
                    } else {
                        if ($p->post_author == $current_user->ID) {
                            $test = true;
                        }
                    }
                    if ($test) {
                        wp_delete_post($id, true);
                        $deleted[] = $id;
                    } else {
                        $hasNotAllowed[] = $id;
                    }
                }
                if (count($hasNotAllowed) > 0) {

                    $rt = array(
                        'success' => 'partial',
                        'idsdeleted' => implode(',', $deleted),
                        'issue' => 'Sorry, you can\'t delete records not created by you.<br/> ' . count($hasNotAllowed) . ' record(s) not deleted: ',
                        'txt' => 'An issue occured'
                    );
                } else {
                    $rt = array(
                        'success' => 'ok',
                        'idsdeleted' => implode(',', $deleted),
                        'txt' => 'Row(s) successfully deleted'
                    );
                }
            } else {
                $rt = array(
                    'success' => 'error',
                    'issue' => 'Trying to cheat... this user is not allowed to delete....',
                    'txt' => 'An error occured'
                );
            }
            echo json_encode($rt);
            die();
        }

        public function getGlobalData($fields, $module, $columns, $args = '') {
            global $current_user, $post_id, $oThis, $post, $meta_marker, $wpdb;

            $sort_dir = 'ASC';
            if (isset($args->sortDir)) {
                if ($args->sortDir !== 'false') {
                    $sort_dir = $args->sortDir;
                }
            }
            $sort_by = 'default';
            if (isset($args->sortBy)) {
                if ($args->sortBy !== 'false') {
                    $sort_by = $args->sortBy;
                }
            }
            $filters = array();
            if (isset($args->filters)) {
                if ($args->filters !== 'false') {
                    /*  if (isset($args->filters->fievals)) {
                      foreach ($args->filters->fievals as $k => $f) {
                      $fi=$f->field ;
                      $args->filters->$fi=$f->val;
                      }
                      } */
                    $filters = $args->filters;
                }
            }
            $modulekey = $args->entity;
            $nbByPage = 10;
            if (isset($args->nbByPage)) {
                $nbByPage = $args->nbByPage;
            }
            $page = 1;
            if (isset($args->page)) {
                $page = $args->page;
            }
            $ar_filters = array('page_nb' => $page);

            if (isset($filters->letter)) {
                $ar_filters['letter'] = $filters->letter;
            }
            if (isset($filters->freesearch)) {
                $ar_filters['free_search'] = $filters->freesearch;
            }
            if (isset($filters->fievals)) {
                $ar_filters['fievals'] = $filters->fievals;
            }
            if (isset($filters->post_status)) {
                $ar_filters['post_status'] = $filters->post_status;
            }
            // var_dump($filters);
            // var_dump($ar_filters);
            // var_dump($sort_by);
            // var_dump($sort_dir);
            $postslist = $oThis->AM_Datagrid->get_all_posts_list_with_meta($args->entity, $ar_filters, false, $nbByPage, $page, $sort_by, $sort_dir);
            $postslistnopage = $oThis->AM_Datagrid->get_all_posts_list_with_meta($args->entity, $ar_filters, true, false, $page, $sort_by, $sort_dir);
            //echo ;
            $postslistall = $postslist; //$oThis->AM_Datagrid->get_all_posts_list_with_meta($args->entity, array(), true, 0, 0, 'default', $sort_dir);
            // var_dump($postslist);

            $query = "SELECT COUNT(*) as total FROM $wpdb->posts " .
                    "WHERE post_type='" . $modulekey . "' AND (post_status='publish' OR post_status='draft' OR post_status='trash' OR post_status='pending' )";
            $poststotal = $wpdb->get_results($query);


            if (!in_array('ID', $fields)) {
                array_push($fields, 'ID');
            }
            if (!in_array('post_author', $fields)) {
                array_push($fields, 'post_author');
            }
            if (!in_array('post_date', $fields)) {
                array_push($fields, 'post_date');
            }
            if (!in_array('post_status', $fields)) {
                array_push($fields, 'post_status');
            }
            $rows_array = array();
            foreach ($postslist as $kp => $p) {
                $row_array = array();
                foreach ($fields as $field) {
                    //echo $field;
                    $f = $oThis->default_fields[$field];
                    switch ($field) {
                        case 'featured_image':
                            $thumb_name = $oThis->all_modules[$modulekey]['custom_featured_image']['thumb_name'];
                            if ($thumb_name == '' or empty($thumb_name) or $thumb_name == false) {
                                $thumb_name = 'apm_grid_thumb';
                            }
                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($p->ID), $thumb_name);
                            //$row_array["value"]=$thumb_name;
                            $row_array[$field] = array('thumbname' => $thumb_name, 'image' => $image[0]);

                            break;
                        case 'post_title':
                            // $fObj = $oThis->AM_Core->default_fields[$field];
                            $row_array[$field] = $p->post_title;
                            break;
                        case 'ID':
                            $row_array[$field] = $p->ID;
                            break;
                        case 'post_parent':
                            $row_array[$field] = $p->post_parent;
                            break;
                        case 'post_author':
                            $row_array[$field] = $p->post_author;
                            break;
                        case 'menu_order':
                            $row_array[$field] = $p->menu_order;
                            break;
                        case 'order':
                            $row_array[$field] = $p->menu_order;
                            break;
                        case 'post_date':
                            $row_array[$field] = $p->post_date;
                            // $fObj = $oThis->AM_Core->default_fields[$field];
                            break;
                        case 'post_status':
                            $row_array[$field] = $p->post_status;
                            break;
                        default:
                            $fObj = $oThis->AM_Core->default_fields[$field];
                            //  echo '<br> ' . $p->ID . ' - ' . $field . $meta_marker . ' *** ';
                            $meta = get_post_meta($p->ID, $field . $meta_marker, true);

                            if ($meta == '' and isset($f['default'])) {
                                $meta = $f['default'];
                            }

                            if (isset($f['column_type'])) {
                                switch ($f['column_type']) {
                                    case "bool_ajax":
                                        if ($meta == '') {
                                            $meta = '0';
                                        }
                                        break;
                                    case "input_ajax":
                                        if ($meta == '') {
                                            $meta = '0';
                                        }
                                        break;
                                }
                            }
                            $txt = $meta;
                            if ($meta !== '') {
                                if (isset($f['column_type'])) {

                                    switch ($f['column_type']) {
                                        case "bool_ajax":
                                            $txt = 'No';
                                            if ($meta == "1") {
                                                $txt = 'Yes';
                                            }
                                            break;
                                    }
                                } else if (isset($f['field_type'])) {
                                    //echo ' - field_type: ' . $f['field_type'];
                                    switch ($f['field_type']) {
                                        default:
                                            $fieldtype = $f['field_type'];
                                            foreach ($oThis->extensions->extensions as $ke => $ext) {
                                                if ($ext == $f['field_type']) {
                                                    include_once($oThis->extensions->clss[$fieldtype][0]['path'] . $oThis->extensions->clss[$fieldtype][0]['filename']);
                                                    $txt = $oThis->extension_class_instances[$fieldtype]->getColumnData($meta, $f, $p->ID);
                                                }
                                            }
                                            break;

                                        case "autocomplete":
                                            $subpost = get_post($meta);
                                            $txt = $subpost->post_title;
                                            break;
                                        case "userslist":
                                            $valid = $meta;
                                            $user = get_users(array(
                                                'include' => $meta
                                                    ));
                                            $metao = $user[0]->display_name;
                                            //$row_array["value"]=$meta.' ('.$valid.')';
                                            $txt = $metao . ' (' . $valid . ')';

                                            break;

                                        case "assignee":
                                            $valid = $meta;
                                            $user = get_users(array(
                                                'include' => $meta
                                                    ));
                                            $metao = $user[0]->display_name;
                                            $txt = $metao . ' (' . $valid . ')';
                                            break;

                                        case "currencyfield":
                                            $txt = $meta . ' ' . $apm_settings['configs']['default_currency'];
                                            break;

                                        case "photo":
                                            $txt = $meta;

                                            break;

                                        case "select":
                                            if ((isset($f['field_config']['use_values']) and $f['field_config']['use_values'] == true) or !isset($f['field_config'])) {
                                                if (isset($f['options'][$meta])) {
                                                    $txt = $f['options'][$meta];
                                                }
                                            } else if (isset($f['field_config']['multiselect'])) {
                                                $meta_n = '';
                                                $str_m = "";
                                                $metavals = array();
                                                foreach ($meta as $meta_id) {
                                                    $subpost = get_post($meta_id);
                                                    $meta_t = $subpost->post_title;
                                                    $metavals[] = array(
                                                        'ID' => $meta_id,
                                                        'txt' => $meta_t
                                                    );
                                                }
                                                $meta = $metavals;
                                                $txt = false;
                                            } else if (isset($f['options']) and isset($f['field_config']['option_text']) and $f['field_config']['option_text'] == true) {

                                                // var_dump($meta);
                                                // var_dump($f['options'][$meta]);
                                                // if (isset($f['options'][$meta])) {
                                                $txt = $meta;
                                                // }
                                            } else {
                                                $subpost = get_post($meta);
                                                $txt = $subpost->post_title;
                                            }
                                            break;
                                        case 'checkbox':
                                            $txt = 'No';
                                            if ($meta == '1') {
                                                $txt = 'Yes';
                                            }
                                            break;
                                    }
                                }
                            }
                            if ($meta == $txt) {
                                $row_array[$field] = array('meta' => $meta);
                            } else {

                                $row_array[$field] = array('ID' => $meta, 'txt' => $txt);
                            }
                            //var_dump($fObj); //default_fields
                            break;
                    }
                }
                $rows_array[] = $row_array;
            }
            echo json_encode(array('rows' => $rows_array, 'success' => true, 'total' => count($postslistnopage), 'fulltotal' => $poststotal[0]->total, 'page' => $page));
        }

        public function getGlobalGridData() {
            global $current_user, $post_id, $oThis, $post, $meta_marker;
            $args = $_POST['args'];
            $args = stripslashes($args);
            $args = json_decode($args);
            // var_dump($oThis->post_types[$args->entity]);
            $module = $oThis->post_types[$args->entity];
            $fields = explode(',', $module['module_datagrid']['fields_to_load']);
            $columns = $module['module_datagrid']['columns_definition'];
            $this->getGlobalData($fields, $module, $columns, $args);
        }

        /* public function getField($oThis, $config, $post, $meta_marker) {
          global $current_user, $post_id;
          //'test'.$this->meta_marker."**".$this->add_image;


          $this->init($oThis, $config, $post, $meta_marker);
          // print_r($oThis);exit();
          $str = "<div class='c_field_container c_setModuleGridBody' data-field_type='setModuleGridBody'
          data-fwidthCls='" . $config['fwidthCls'] . "'
          data-field='" . $config['field'] . "'
          data-value ='" . $config['value'] . "'
          data-label ='" . $config['label'] . "'
          data-meta_marker='" . $meta_marker . "'></div>";
          return $str; //'test'.$this->meta_marker."**".$this->add_image;
          return $str;
          } */
    }

}

$oThis->extension_class_instances['setModuleGridBody'] = new setModuleGridBodyCls();
//$setUploadGrid=new setUploadGridCls();
?>
