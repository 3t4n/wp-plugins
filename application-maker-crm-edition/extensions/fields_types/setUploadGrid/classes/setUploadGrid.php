<?php

//TODO: Top of Grid, Nb of files
//TODO: On upload, save the new file in the post meta
//TODO: Missing btns actions on Grid > Delete Selected + Delete one by one / Edit Layer / View layer (to add also on UploadPanel)
//TODO: move btn select all to topleft grid
//TODO: Check if we dont select add files already in Grid..
//TODO: Change Collpase expand UploadPanel Btns.. (and maybe it should expand ABOVE as an absolute panel, from left of page???)
//TODO: Manage the case of rows images (and do we do a thumbs grid...)
//TODO: Paging?
//TODO: Later > A version with only one file to upload and a simle UI
//TODO: Later > Add a 'Pick file from Media lib"!!!
//TODO: Later MAYBE > Upload Panel with a version on Drag Drop? and how to multiselect?
//TODO: Later MAYBE > Store something in Local browser??
global $Application_Maker, $oThis;
if (!class_exists('setUploadGridCls')) {

    class setUploadGridCls extends Application_Maker_setField {

        public function __construct() {
            $this->fieldtype = "setUploadGrid";
            $this->hasSaveField = false;
            $this->AbortGlobalSave = false;
            $this->classSubActions = array('UpdateFileInfos', 'GetFileInfos', 'DeleteFile', 'loadFilesGrid', 'deleteFilesGrid', 'deleteRowGrid');
        }

        public function saveField($post_id, $key, $meta_marker, $data, $field) {
            global$current_user;
        }

        /*
         * Create by LEHUNG
         * Delete row data with post id
         */

        public function deleteRowGrid() {
            global $wpdb, $current_user;
            if (is_user_logged_in()) {

                if (isset($_REQUEST['postid']) && is_numeric($_REQUEST['postid'])) {
                    $postid = $_REQUEST['postid'];
                    wp_delete_post($postid);
                    echo "success to deleted " . $postid;
                } else {
                    exit('Error!');
                }
            } else {
                echo "Only for loggedin users";
            }
        }

        public function deleteFilesGrid() {
            global $wpdb, $current_user;
            if (is_user_logged_in()) {
                $ids = $_REQUEST['ids'];
                $ids_ar = explode(",", $ids);
                $field = $_REQUEST['field'];
                $postid = $_REQUEST['postid'];
                $file_ids_list = get_post_meta($postid, $field, true);
                //echo 'prev list '.$file_ids_list;
                $file_ids_list = explode('*****', $file_ids_list);
                $newidlist = array();
                foreach ($file_ids_list as $k => $f) {
                    if (!in_array($f, $ids_ar)) {
                        $newidlist[] = $f;
                    }
                }
                update_post_meta($postid, $field, implode('*****', $newidlist));
                //echo " new list ".implode('*****',$newidlist);
                echo "total deleted " . count($ids_ar);
                //TODO add check roles if can delete
            } else {
                echo "Only for loggedin users";
            }
        }

        public function getThumb($field, $f) {
            global $wpdb, $current_user, $oThis;
            $thumb = "";
            if (isset($oThis->default_fields[$field]['image_resize'])) {
                if (isset($oThis->default_fields[$field]['image_resize']['thumb'])) {
                    $thumbar = explode('.', $f->guid);
                    $ext = $thumbar[count($thumbar) - 1];
                    $thumb = str_replace("." . $ext, "_thumb." . $ext, $f->guid);
                } else if (isset($oThis->default_fields[$field]['image_resize']['minithumb'])) {
                    $thumbar = explode('.', $f->guid);
                    $ext = $thumbar[count($thumbar) - 1];
                    $thumb = str_replace("." . $ext, "_minithumb." . $ext, $f->guid);
                } else if (isset($oThis->default_fields[$field]['image_resize']['medium'])) {
                    $thumbar = explode('.', $f->guid);
                    $ext = $thumbar[count($thumbar) - 1];
                    $thumb = str_replace("." . $ext, "_medium." . $ext, $f->guid);
                } else {
                    $thumb = $f->guid;
                }
            }
            return $thumb;
        }

        public function getZoom($field, $f) {
            global $wpdb, $current_user, $oThis;
            $zoom = "";
            if (isset($oThis->default_fields[$field]['image_resize'])) {
                if (isset($oThis->default_fields[$field]['image_resize']['zoom'])) {
                    $zoomar = explode('.', $f->guid);
                    $ext = $zoomar[count($zoomar) - 1];
                    $zoom = str_replace("." . $ext, "_zoom." . $ext, $f->guid);
                } else if (isset($oThis->default_fields[$field]['image_resize']['medium'])) {
                    $thumbar = explode('.', $f->guid);
                    $ext = $zoomar[count($zoomar) - 1];
                    $zoom = str_replace("." . $ext, "_medium." . $ext, $f->guid);
                } else {
                    $zoom = $f->guid;
                }
            }
            return $zoom;
        }

        public function loadFilesGrid() {
            global $wpdb, $current_user, $oThis;
            //var_dump($oThis->extension_class_instances['setUploadPanel']);
            // var_dump($oThis->extensions);
            //echo 'files_upload - loadFilesGrid';
            $field = $_REQUEST['field'];
            $postid = $_REQUEST['postid'];
            $file_ids_list = get_post_meta($postid, $field, true);
            $file_ids_list = str_replace('*****', ',', $file_ids_list);
            if ($file_ids_list == "") {
                echo json_encode(array("files" => array(), "success" => "ok", "total" => 0));
                return;
            }
            $files = $oThis->extension_class_instances['setUploadPanel']->getPostChildsFiles($file_ids_list);
            $files_arr = array();
            // var_dump($oThis->default_fields[$field]['image_resize']);
            foreach ($files as $k => $f) {
                $thumb = "";
                if (isset($oThis->default_fields[$field]['is_image']) and $oThis->default_fields[$field]['is_image'] == true) {
                    $thumb = $this->getThumb($field, $f);
                }
                $fileobj = (object) array();
                $fileobj->date = $f->post_date;
                $fileobj->ID = $f->ID;
                $fileobj->name = $f->post_title;
                $fileobj->url = $f->guid;
                $fileobj->thumb = $thumb;
                // $fileobj->caption = $f->post_excerpt;
                // $fileobj->description = $f->post_content;
                $fileobj->type = $f->post_mime_type;
                $path_ar = explode('uploads', $f->guid);
                $direc = wp_upload_dir();
                $direc = $direc['basedir'];
                $path = $direc . $path_ar[1];
                $myfile = filesize($path);
                $docsize = size_format($myfile);
                $fileobj->size = $docsize;
                $path_ar = explode('/', $f->guid);
                $fileobj->filename = $path_ar[count($path_ar) - 1];
                $files_arr[] = $fileobj;
            }
            //var_dump($files);
            echo json_encode(array("files" => $files_arr, "success" => "ok", "total" => count($files_arr)));
        }

        public function DeleteFile() {
            global $wpdb, $current_user;
        }

        public function UpdateFileInfos() {
            global $wpdb, $current_user;
            $postid = $_REQUEST['postid'];
            $title = stripslashes($_REQUEST['title']);
            $capt = stripslashes($_REQUEST['capt']);
            $desc = stripslashes($_REQUEST['desc']);

            $my_post = array();
            $my_post['ID'] = $postid;
            $my_post['post_content'] = $desc;
            $my_post['post_title'] = $title;
            $my_post['post_excerpt'] = $capt;
            wp_update_post($my_post);
        }

        public function GetFileInfos() {
            global $wpdb, $current_user, $oThis;

            $postid = $_REQUEST['postid'];
            $field = $_REQUEST['field'];
            $args = array(
                'include' => $postid,
                'post_type' => 'attachment',
                'suppress_filters' => true);
            $posts_array = get_posts($args);
            $f = $posts_array[0];
            $path_ar = explode('uploads', $f->guid);
            $direc = wp_upload_dir();
            $direc = $direc['basedir'];
            $path = $direc . $path_ar[1];
            $myfile = filesize($path);
            $docsize = size_format($myfile);
            $thumb = $this->getThumb($field, $f);
            $zoom = $this->getZoom($field, $f);
            $f->size = $docsize;
            $f->thumbimg = $thumb;
            $f->zoomimg = $zoom;
            echo json_encode($f);
        }

        public function getField($oThis, $config, $post, $meta_marker) {
            global $current_user, $post_id;
            $this->init($oThis, $config, $post, $meta_marker);
            wp_get_current_user();
            $curuse = strval($current_user->ID) . ',' . $current_user->display_name;
            // var_dump($config);
            $str = "";
            $custom = get_post_custom($this->post->ID);
            $download_id = get_post_meta($this->post->ID, $config['field'] . $this->meta_marker, true);
            // echo "---".$this->post->ID."-".$config['field'];
            $download_id_arr = false;
            if (strpos($download_id, '*****') > -1) {
                $download_id_arr = explode('*****', $download_id);
                $download_id = $download_id_arr[0];
            } else {
                $download_id_arr = array();
                if (!empty($download_id) and $download_id !== "") {
                    array_push($download_id_arr, $download_id);
                }
            }
            $max_multi_files = '0';
            if (isset($config['max_multi_files'])) {
                $max_multi_files = $config['max_multi_files'];
            }

            $cur_files_count = count($download_id_arr);
            $str.= "<div class=' c_field_container c_setUploadGrid' data-field_type='setUploadGrid'
                     data-fwidthCls='" . $config['fwidthCls'] . "'
                     data-field='" . $config['field'] . "'
                     data-info='" . $config['info'] . "'
                     data-value ='" . $config['value'] . "'
                     data-postid ='" . $post_id . "'
                     data-me ='" . $curuse . "'
                     data-filtypes ='" . $config['filtypes'] . "'
                     data-maxmultfil ='" . $max_multi_files . "'
                     data-nbfiles ='" . count($download_id_arr) . "'
                     data-label ='" . $config['label'] . "'
                     data-meta_marker='" . $meta_marker . "'></div>";


            return $str; //'test'.$this->meta_marker."**".$this->add_image;
        }

    }

}

$oThis->extension_class_instances['setUploadGrid'] = new setUploadGridCls();
//$setUploadGrid=new setUploadGridCls();
?>
