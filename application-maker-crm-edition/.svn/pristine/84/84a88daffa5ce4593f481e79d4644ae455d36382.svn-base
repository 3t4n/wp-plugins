<?php

global $Application_Maker, $oThis;
if (!class_exists('setUploadPanelCls')) {

    class setUploadPanelCls extends Application_Maker_setField {

        public function __construct() {
            $this->fieldtype = "setUploadPanel";
            $this->hasSaveField = true;
            $this->AbortGlobalSave = false;
            $this->classSubActions = array('UpdateFileInfos', 'DeleteFile', 'UploadFile', 'test', 'getPostChildsFiles');
        }

        public function saveField($post_id, $key, $meta_marker, $data, $field) {
            global$current_user;
            /* var_dump($_POST);
              var_dump($_FILES);
              exit; */
        }

        public function test() {
            global$current_user;
        }

        public function UploadFile() {
            global$current_user, $oThis;
            // bug when upload multiple file
            // var_dump($_FILES);
            //var_dump($_POST);
            // echo "<br>init name first " . $_FILES['apm_fileupload']['name'];
            $newfile = self::addImageFromLocal($_FILES, $_POST);
            $posttitle = $_POST['title'];
            $newfilename = $newfile['name']; // $_POST['filename'];
            if ($posttitle == "") {
                $posttitle = $newfilename;
            }

            $files = $this->getPostChildsFiles($newfile['newid']);
            $f = $files[0];
            $thumb = "";
            $key = $_POST['key'];
            if (isset($oThis->default_fields[$key]['is_image']) and $oThis->default_fields[$key]['is_image'] == true) {
                if (isset($oThis->default_fields[$key]['image_resize'])) {
                    if (isset($oThis->default_fields[$key]['image_resize']['thumb'])) {
                        $thumbar = explode('.', $f->guid);
                        $ext = $thumbar[count($thumbar) - 1];
                        $thumb = str_replace("." . $ext, "_thumb." . $ext, $f->guid);
                    } else if (isset($oThis->default_fields[$key]['image_resize']['minithumb'])) {
                        $thumbar = explode('.', $f->guid);
                        $ext = $thumbar[count($thumbar) - 1];
                        $thumb = str_replace("." . $ext, "_minithumb." . $ext, $f->guid);
                    } else if (isset($oThis->default_fields[$key]['image_resize']['medium'])) {
                        $thumbar = explode('.', $f->guid);
                        $ext = $thumbar[count($thumbar) - 1];
                        $thumb = str_replace("." . $ext, "_medium." . $ext, $f->guid);
                    } else {
                        $thumb = $f->guid;
                    }
                }
            }
            $size = size_format($_FILES['apm_fileupload']['size']);
            /* $type = $_FILES['apm_fileupload']['type'];
              $date = date('Y-m-d H:i:s');
              $path_filename = wp_upload_dir();

              $fileobj = (object) array();
              $fileobj->date = $f->post_date;
              $fileobj->ID = $f->ID;
              $fileobj->name = $f->post_title;
              $fileobj->url = $f->guid;
              // $fileobj->caption = $f->post_excerpt;
              // $fileobj->description = $f->post_content;
              $fileobj->type = $f->post_mime_type; */
            //echo $_FILES['apm_fileupload'];
            ////COMMENT: Here we can use ID's attributes without issue because this is loaded in an iFrame totally separated from the main page.
            echo "<span id='filenb'>" . $_POST['filenb'] . "</span>";
            echo "<br><span id='postid'>" . $_POST['postid'] . "</span>";
            echo "<br><span id='posttitle'>" . $f->post_title . "</span>";
            echo "<br><span id='type'>" . $f->post_mime_type . "</span>";
            echo "<br><span id='url'>" . $f->guid . "</span>";
            echo "<br><span id='thumb'>" . $thumb . "</span>";
            echo "<br><span id='size'>" . $size . "</span>";
            echo "<br><span id='date'>" . $f->post_date . "</span>";
            echo "<br><span id='filename'>" . $_POST['filename'] . "</span>";
            echo "<br><span id='newfilename'>" . $newfilename . "</span>";
            echo "<br><span id='res_status'>" . $newfile['res_status'] . "</span>";
            echo "<br><span id='error'>" . $newfile['error'] . "</span>";
            echo "<br><span id='newid'>" . $newfile['newid'] . "</span>";
            //var_dump($oThis);
        }

        public function DeleteFile() {
            global $wpdb, $current_user;
        }

        public function UpdateFileInfos() {
            global $wpdb, $current_user;
        }

        public function GetFileInfos() {
            global $wpdb, $current_user;
        }

        public function getPostChildsFiles($download_id_arr) {
            global $current_user, $post_id, $oThis;
            if (!is_array($download_id_arr)) {
                $download_id_arr = explode(',', $download_id_arr);
            }
            if (count($download_id_arr) > 0) {

                $args = array(
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    'include' => implode(',', $download_id_arr),
                    'post_parent' => $post_id,
                    'post_type' => 'attachment',
                    'suppress_filters' => true);
                $posts_array = get_posts($args);
            } else {
                $posts_array = array();
            }
            return $posts_array;
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
            } else {
                $download_id_arr = array();
            }
            $files_list = $this->getPostChildsFiles($download_id_arr);
            $max_multi_files = '0';
            if (isset($config['max_multi_files'])) {
                $max_multi_files = $config['max_multi_files'];
            }
            // $cur_files_count = count($download_id_arr);
            //var_dump($files_list);
            $cur_files_count = count($files_list);
            $str.= "<div class=' c_field_container c_setUploadPanel' data-field_type='setUploadPanel'
                     data-fwidthCls='" . $config['fwidthCls'] . "'
                     data-field='" . $config['field'] . "'
                     data-info='" . $config['info'] . "'
                     data-value ='" . $config['value'] . "'
                     data-postid ='" . $post_id . "'
                     data-me ='" . $curuse . "'
                     data-filtypes ='" . $config['filtypes'] . "'
                     data-maxmultfil ='" . $max_multi_files . "'
                     data-nbfiles ='" . $cur_files_count . "'
                     data-label ='" . $config['label'] . "'
                     data-meta_marker='" . $meta_marker . "'></div>";
            return $str; //'test'.$this->meta_marker."**".$this->add_image;
        }

        public function addImageFromLocal($files, $posts) {
            global $oThis;
            // check post error
            if (is_uploaded_file($files['apm_fileupload']['tmp_name'])) {
                $mime = $files['apm_fileupload']['type'];
                $key = $posts['key'];
                $postid = $posts['postid'];
                $temp = $files['apm_fileupload']['tmp_name'];
                //processing when image has dupplicate name
                $path_filename = wp_upload_dir();
                $arr_filename = scandir($path_filename['path']);
                // echo "<br>init name " . $files['apm_fileupload']['name'];
                $newname = $this->replaceDuplicateName($files['apm_fileupload']['name'], $arr_filename);
                //  echo "<br>NEw name 1 " . $newname;
                $uploads = wp_upload_bits(strtolower($newname), null, '');

               // echo "AAA ' ";
                if (move_uploaded_file($temp, $uploads['file'])) {

                    if ($posts['title'] == '')
                        $post_title = $newname;
                    else
                        $post_title = $posts['title'];

                    $attachment = array(
                        'guid' => $uploads['url'],
                        'post_mime_type' => $mime,
                        'post_title' => $post_title,
                        'post_parent' => $_POST['postid'],
                        'post_excerpt' => $posts['capt'],
                        'post_content' => $posts['desc'],
                        'post_status' => 'inherit'
                    );

                   // echo "BBB ' ";
                    $rows = wp_insert_attachment($attachment, $uploads['url']);
                    //echo "  BBB111 ' ";
                    //require_once(ABSPATH . 'wp-admin/includes/image.php');
                   // $attach_data = wp_generate_attachment_metadata($rows, $uploads['url']);
                   // var_dump($attach_data);
                   // echo "  BBB222 ' ";
                    //wp_update_attachment_metadata($rows, $attach_data);

                   // echo "CCC ' ";
                    //resize image
                    if (isset($oThis->default_fields[$key]['is_image']) and $oThis->default_fields[$key]['is_image'] == true) {
                        if (isset($oThis->default_fields[$key]['image_resize'])) {
                            $oThis->handle_image_resize($oThis->default_fields[$key]['image_resize'], $uploads['file'], $rows, $key);
                        }
                    }

                   // echo "DDD ' ";
                    if ($rows !== 0) {
                        $this->error = false;

                        $file_ids_list = get_post_meta($postid, $key, true);
                        // echo "<br><br>file_ids_list before " . $file_ids_list;
                        $file_ids_list = explode('*****', $file_ids_list);
                        if (!in_array($rows, $file_ids_list)) {
                            $file_ids_list[] = $rows;
                        }
                        $file_ids_list = implode('*****', $file_ids_list);
                        update_post_meta($postid, $key, $file_ids_list);

                        //  echo "<br><br>file_ids_list after " . $file_ids_list;
                        // echo "<br><br><br>";
                        return array('res_status' => 'ok',
                            'newid' => $rows,
                            'name' => $newname,
                            'error' => 'none'
                        );
                    } else {
                        $this->error = true;
                        return array('res_status' => 'error',
                            'newid' => 'error',
                            'name' => '',
                            'error' => 'Error on insert local images type');
                    }
                } else {
                    $this->error = true;
                    $error = sprintf('Error while copying [%s] [%s bytes] - [%s]', $files['apm_fileupload']['name'], $files['apm_fileupload']['size'], $files['apm_fileupload']['error']);
                    return array('res_status' => 'error',
                        'newid' => 'error',
                        'name' => '',
                        'error' => $error);
                }
            } else {
                $this->error = true;
                $error = sprintf('No file to upload! - [%s]', $files['apm_fileupload']['error']);
                return array('res_status' => 'error',
                    'newid' => 'error',
                    'name' => '',
                    'error' => $error);
            }
        }

        private function replaceDuplicateName($filename, $arr_filename) {
            $extension = end(explode('.', $filename));
            $post_img_name = substr(basename($filename, $extension), 0, -1);
            $post_img_name_replace = preg_replace('/[^a-zA-Z0-9_]/s', '_', $post_img_name, -1);
            $name = $post_img_name_replace . '.' . $extension;
            if (in_array($name, $arr_filename)) {
                $dup_name = array();
                foreach ($arr_filename as $val) {
                    if ($val != "." && $val != "..") {
                        preg_match("/^$post_img_name_replace/", $val, $matches);
                        if ($matches[0] != '')
                            $dup_name[] = $val;
                    }
                }
                $total_count = count($dup_name);
                $new_name = $post_img_name_replace . '_' . $total_count . '.' . $extension;
                while (in_array($new_name, $dup_name)) {
                    $total_count += 1;
                    $new_name = $post_img_name_replace . '_' . $total_count . '.' . $extension;
                }
                return $new_name;
            } else {
                return $name;
            }
        }

    }

}

$oThis->extension_class_instances['setUploadPanel'] = new setUploadPanelCls();
//$setUploadPanel=new setUploadPanelCls();
?>
