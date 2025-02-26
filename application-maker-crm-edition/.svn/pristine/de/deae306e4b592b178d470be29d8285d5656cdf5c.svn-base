<?php

if (!class_exists('Application_Maker_Core')) {

    class Application_Maker_Core {

        // CONSTRUCTOR


        public function __construct() { //ADD BUTTON
            $this->add_image = WP_PLUGIN_URL . '/' . WP_PLUGIN_FOLDER . '/img/plus_16.png';
            $this->del_image = WP_PLUGIN_URL . '/' . WP_PLUGIN_FOLDER . '/img/block_16.png';
            $this->help_image = WP_PLUGIN_URL . '/' . WP_PLUGIN_FOLDER . '/img/bugsqa_16.png';
            $this->new_window_image = WP_PLUGIN_URL . '/' . WP_PLUGIN_FOLDER . '/img/new_window_icon.gif';
            $this->calendar_image = site_url() . '/wp-admin/images/date-button.gif';
        }

        public function setRelations($module) {
            $this->parent_key = false;
            $this->parent_module = false;
            $this->childs_modules_array = false;
            $this->childs_modules = false;
            $this->relation_notif_config = false;
            if (isset($module['relation_notif_config'])) {
                $this->relation_notif_config = $module['relation_notif_config'];
                if ($module['relation_notif_config']['relationships']['parent'] !== null) {
                    $ar_parent = $module['relation_notif_config']['relationships']['parent'];
                    foreach ($ar_parent as $parkey => $parsubarr) {
                        $this->parent_key = $parkey;
                    }
                }
                if ($module['relation_notif_config']['relationships']['childs'] !== null) {
                    $this->childs_modules_array = $module['relation_notif_config']['relationships']['childs'];
                    $this->childs_modules = array();
                    foreach ($this->applications as $key => $application) {
                        foreach ($this->childs_modules_array as $chikey => $chisubarr) {
                            if (isset($application['modules'][$chikey])) {
                                $this->childs_modules[] = $application['modules'][$chikey];
                            }
                        }
                    }
                }
            }
        }

        /**/

        public function setFieldsBox($key, $metabox_obj, $previewbtn = false) {
            global $post;
            if (isset($metabox_obj['positioning'])) {
                $this->setBoxByTabsNew($key, $metabox_obj['positioning'], $previewbtn);
            } else if (isset($metabox_obj['fields'])) {
                $this->setBoxByFields($key, $metabox_obj['fields']);
            }
        }

        public function setBoxByTabsNew($key, $positioning, $previewbtn = false) {
            global $post;
            if (count($positioning['topbar']) > 0) {
                $this->setBoxTopBar($key, $positioning['topbar'], $previewbtn);
            }
            if (count($positioning['main']) > 0) {
                $this->setBoxByTabsMain($key, $positioning);
            }
            if (isset($positioning['tabs']) and count($positioning['tabs']) > 0) {
                $this->setBoxByTabsTabs($key, $positioning);
            }
        }

        public function setBoxTopBar($key, $postopbar, $previewbtn = false) {
            global $post, $current_user;
            $this->cururl = $_SERVER["REQUEST_URI"];
            $str.='<style> #submitdiv{display:none!important;} </style>
                             <div id="ModalGlobal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                         <h4>Global Title</h4>
                                    </div>
                                    <div class="modal-body ">
                                    </div>
                                    <div class="modal-footer">
                                        <span class="modal_add_categ_alert"></span>
                                        <a class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
                                    </div>
                                </div>';
            $usid = $current_user->ID;
            $isadmin = current_user_can('administrator');
            $usdislpayname = $current_user->display_name;
            $str.=' <script type="text/javascript">
               if(flg_apm==undefined){
                    flg_apm={};
               }
               flg_apm.userProfile={
                isadmin:"' . $isadmin . '",
                userid:"' . $usid . '",
                display_name:"' . $usdislpayname . '",
               };
               </script>
               ';
            $str.='<div class="topnav_bar">';
            $str.=' <div class="navbar " style="margin: -1px -1px 0; ">
                          <div class="navbar-inner nav_s">
                            <div class="container" style="width: auto; padding: 0 5px;">
                              <ul class="nav ">';
            if (isset($postopbar['special']) and count($postopbar['special']) > 0) {
                foreach ($postopbar['special'] as $k => $field) {
                    if ($field == "-") {
                        $str.='<li class="divider-vertical"></li>';
                    } else {
                        if (isset($this->default_fields[$field])) {
                            $pos = 'regular';
                            $total_width = 0;
                            $str.='<li>' . $this->setFieldNew($field, $pos, $total_width) . '</li>';
                        }
                    }
                }
            }

            $str.='
                                <li class="divider-vertical"></li>
                                <!--li class=""><a href="#">Home</a></li>
                                <li><a href="#">Link</a></li>
                                <li class="divider-vertical"></li>
                                <li><a href="#">Link</a></li-->';
            $str.='  </ul>
                              <ul class="nav pull-right"> ';
            if (isset($postopbar['common']['status_action'])) {
                $act_pub = "";
                $act_pen = "";
                $act_dra = "";

                switch ($post->post_status) {
                    case 'publish':
                        $act_pub = "active";
                        break;
                    case 'pending':
                        $act_pen = "active";
                        break;
                    case 'draft':
                        $act_dra = "active";
                        break;
                    case 'auto-draft':
                        $act_dra = "active";
                        break;
                }
                $str.='       <li><label class="lbl_float lbl_f lbl_padtop">Status: </label>
                                       <div class="btn-group">
                                    <a class="hasTooltip btn  btn-mini apm_is_publish apm_is_status ' . $act_pub . '" data-status="publish" title="Save as Published" >Published</a>
                                    <a class="hasTooltip btn btn-mini apm_is_pending apm_is_status ' . $act_pen . '" data-status="pending" title="Save as Pending">Pending</a>
                                    <a class="hasTooltip btn btn-mini apm_is_draft apm_is_status ' . $act_dra . '" data-status="draft" title="Save as Draft">Draft</a>
                                    </div></li>
                                    <li class="divider-vertical"></li>';
            }

            if (isset($postopbar['common']['save_action'])) {
                $str.='   <li> <button type="button" class="hasTooltip  btn btn-mini btn-primary  apm_update_post"  rel="tooltip" title="Save"  type="submit"><!--i class="icon-ok-sign  icon-white"></i--> Save</button></li>';
            }

            if (isset($postopbar['common']['delete_action']) and strpos($this->cururl, 'post-new.php') == false) {
                $testb = false;
                if (current_user_can('administrator')) {
                    $testb = true;
                } else {
                    if ($post->post_author == $usid) {
                        $testb = true;
                    }
                    //
                }
                if ($testb) {
                    $str.='   <li> <button type="button" class="hasTooltip btn btn-mini btn-danger btn_left_mar apm_trash_post" rel="tooltip" title="Trash"><!--i class="icon-remove-sign  icon-white"></i--> Trash</button></li>';
                } else {
                    $str.='   <li> <button type="button" class="hasTooltip btn btn-mini btn-danger btn_left_mar disabled" data-placement="left" rel="tooltip" title="Only an Admin or the item author can trash this"><!--i class="icon-remove-sign  icon-white"></i--> Trash</button></li>';
                }
            }
            if ($previewbtn == true) {
                $str.='   <li> <button data-url="' . get_permalink() . '" data-placement="left" class="hasTooltip  btn btn-mini  btn-info  btn_left_mar apm_open_preview"  rel="tooltip" title="Preview the post"  ><!--i class="icon-eye-open  "></i--> Preview</button> </li>';
            }
            $str.='   </ul>

                            </div>
                          </div>
                        </div>
                        <div class="alert alert-info top_mar_4 hidden">Submitting....</div>
                        <div class="alert alert-success top_mar_4 hidden">Submitted</div>
                     </div>
                     <br class="clear"/>
                      <div class="modal hide fade" id="confirmModal">
                        <div class="modal-header">
                        <h4>Please confirm</h4>
                        </div>
                        <div class="modal-body">
                        <p>fhfhfh</p>
                        </div>
                        <div class="modal-footer">
                        <a href="#" class="btn  btn-mini apm_confirm_no">No</a>
                        <a href="#" class="btn btn-primary btn-mini  apm_confirm_yes">Yes</a>
                        </div>
                        </div>';

            echo $str;
        }

        public function setBoxByTabsMain($key, $positioning) {
            global $post;
            $str = '<div id="main_block_' . $key . '" class="block apm_fieldset" > ';
            $c = 0;
            $ctotal = count($positioning['main']);
            foreach ($positioning['main'] as $fieldset) {
                $str.=$this->setFieldSet($key, $positioning, $fieldset);
            }
            $str.="</div>";
            echo $str;
        }

        public function setBoxByTabsTabs($key, $positioning) {
            global $post;
            $strhead = ' <ul class="nav nav-tabs nav-tabs-xtra" id="tabblock_' . $key . '">';
            $strbody = ' <div class="tab-content tab-content-xtra">';
            $c = 0;
            /* $strhead.='
              <li><a href="#1'.$key.'" data-toggle="tab">Home'.$key.'</a></li>
              <li><a href="#2'.$key.'" data-toggle="tab">Profile'.$key.'</a></li>
              <li><a href="#3'.$key.'" data-toggle="tab">Messages'.$key.'</a></li>
              <li><a href="#4'.$key.'" data-toggle="tab">Settings'.$key.'</a></li>
              ';
              $strbody.='
              <div class="tab-pane active" id="1'.$key.'">a...</div>
              <div class="tab-pane" id="2'.$key.'">b...</div>
              <div class="tab-pane" id="3'.$key.'">c...</div>
              <div class="tab-pane" id="4'.$key.'">d...</div>'; */
            foreach ($positioning['tabs'] as $subkey => $tab) {
                //$subkey=  str_replace('_', '', $subkey);
                // echo '<li><h2><a href="#'.$subkey.'" id="'.$subkey.'t">'.$tab['label'].'</a></h2></li>';
                $clsacti = "";
                if ($c == 0) {
                    $clsacti = ' active ';
                }
                $c++;
                $strhead.='<li class="' . $clsacti . '"><a href="#' . $c . $key . '" data-toggle="tab">' . $tab['label'] . '</a></li>';
                $strbody.='<div class="tab-pane ' . $clsacti . '" id="' . $c . $key . '">';

                foreach ($tab['items'] as $fieldset) {
                    $strbody.=$this->setFieldSet($key, $positioning, $fieldset);
                }
                $strbody.='</div>';
                /*
                 */
            }
            $strhead.=' </ul>';
            $strbody.=' </div> '; /*
              <script>
              $(function () {
              $("#tabblock_'.$key.' a:first").tab("show");
              })
              </script>'; */

            /* <div class="tab-pane active" id="home_'.$key.'">azaz</div>
              <div class="tab-pane" id="profile_'.$key.'">sdsds</div>
              <div class="tab-pane" id="messages_'.$key.'">fgfhfh</div>
              <div class="tab-pane" id="settings_'.$key.'">klklkl</div> */

            echo $strhead . $strbody;

            /* echo '<div id="block_'.$key.'" class="block">';
              if(count($positioning['tabs'])>1){
              echo '<script type="text/javascript">
              tabs_obj["block_'.$key.'"]= "#block_'.$key.'";
              </script>
              ';
              }
              echo '<ul class="htabs">';
              foreach($positioning['tabs'] as $subkey => $tab){
              echo '<li><h2><a href="#'.$subkey.'" id="'.$subkey.'t">'.$tab['label'].'</a></h2></li>';
              }
              echo '</ul><div class="tabs">';
              foreach($positioning['tabs'] as $subkey => $tab){
              echo '<div class="tab  bmod" id="'.$subkey.'"><ul>';
              $c=0;
              $ctotal=count($positioning['main']);
              foreach($tab['items'] as $fieldset){
              $c++;
              $class='apm_li_inline';
              if($c==$ctotal){
              $class='apm_li_inline_last';
              }
              echo '<ul class="'.$class.'">';
              $pos='inline';
              if(count($fieldset )==1){
              $pos='regular';
              }
              $total_width=0;
              foreach($fieldset as $field){
              $width=10;
              if(isset($this->default_fields[$field])){
              $f=$this->default_fields[$field];
              isset($f['width']) ? $width=intval($f['width']): $width=10;
              }
              $total_width+=$width;
              }
              foreach($fieldset as $field){
              $this->setField($field,'<li >','</li>',$pos,$total_width);
              }
              echo '<br clear="all"/></ul>';
              }
              echo '</ul></div>';
              }
              echo '</div></div>'; */
        }

        public function setFieldSet($key, $positioning, $fieldset) {
            global $post;
            $total_width = 0;
            $str = '<div class="row-fluid">  ';
            foreach ($fieldset as $field) {
                $width = 1;
                if (isset($this->default_fields[$field])) {
                    $f = $this->default_fields[$field];
                    isset($f['width']) ? $width = $f['width'] : $width = 1;
                }
                $total_width+=$width;
            }
            if (count($fieldset) == 1) {
                $pos = 'regular';
            }
            // $total_width=intval($total_width);

            $width_rate = 12 / $total_width;
            foreach ($fieldset as $field) {
                $width = 1;
                if (isset($this->default_fields[$field])) {
                    $f = $this->default_fields[$field];
                    isset($f['width']) ? $width = $f['width'] : $width = 1;
                }
                $width_ra = intval($width * $width_rate);
                $str.='<div class="span' . $width_ra . '" style="">';
                $str.=$this->setFieldNew($field, $pos, $total_width);
                $str.='</div>';
            }
            //echo "<br/>".$total_width;

            $str.='</div>  ';
            return $str;
        }

        public function setFieldNew($field, $pos, $total_width) {
            global $post, $meta_marker, $oThis;
            if (isset($this->default_fields[$field])) {
                $f = $this->default_fields[$field];
                $f['field'] = $field;
                isset($f['field_type']) ? $f['field_type'] = $f['field_type'] : $f['field_type'] = 'textfield';
                isset($f['default']) ? $f['default'] = $f['default'] : $f['default'] = '';
                isset($f['child_second_parent']) ? $f['child_second_parent'] = $f['child_second_parent'] : $f['child_second_parent'] = '';
                isset($f['child_key']) ? $f['child_key'] = $f['child_key'] : $f['child_key'] = '';
                isset($f['label_position']) ? $f['label_position'] = $f['label_position'] : $f['label_position'] = 'left';
                isset($f['description']) ? $f['description'] = $f['description'] : $f['description'] = '';
                isset($f['info']) ? $f['info'] = $f['info'] : $f['info'] = '';
                isset($f['help']) ? $f['help'] = $f['help'] : $f['help'] = '';
                isset($f['hide_label']) ? $f['hide_label'] = $f['hide_label'] : $f['hide_label'] = '';
                isset($f['image_resize']) ? $f['image_resize'] = $f['image_resize'] : $f['image_resize'] = false;
                isset($f['img_config']) ? $f['img_config'] = $f['img_config'] : $f['img_config'] = false;
                isset($f['label_width']) ? $f['label_width'] = $f['label_width'] : $f['label_width'] = 100;
                isset($f['width']) ? $f['widthli'] = $f['width'] : $f['widthli'] = 10;
                isset($f['width']) ? $f['width'] = ' width:' . ($f['width'] * 10 ) . '%; ' : $f['width'] = '';
                isset($f['img_width']) ? $f['img_width'] = intval($f['img_width']) : $f['img_width'] = false;
                isset($f['show_input']) ? $f['show_input'] = intval($f['show_input']) : $f['show_input'] = false;
                isset($f['img_height']) ? $f['img_height'] = intval($f['img_height']) : $f['img_height'] = false;
                isset($f['label_width_perc']) ? $f['label_width_perc'] = intval($f['label_width_perc']) : $f['label_width_perc'] = 0;
                isset($f['options']) ? $f['options'] = $f['options'] : $f['options'] = array();
                isset($f['html']) ? $f['html'] = $f['html'] : $f['html'] = "";
                isset($f['use_none']) ? $f['use_none'] = $f['use_none'] : $f['use_none'] = "";
                isset($f['maxlength']) ? $f['maxlength'] = $f['maxlength'] : $f['maxlength'] = "";
                isset($f['label_type']) ? $f['label_type'] = $f['label_type'] : $f['label_type'] = 'regular';
                if ($global_label_type !== false) {
                    $f['label_type'] = $global_label_type;
                }
                isset($f['allow_multi_files']) ? $f['allow_multi_files'] = $f['allow_multi_files'] : $f['allow_multi_files'] = false;
                isset($f['allow_files_description']) ? $f['allow_files_description'] = $f['allow_files_description'] : $f['allow_files_description'] = false;
                isset($f['field_config']) ? $f['field_config'] = $f['field_config'] : $f['field_config'] = '';
                isset($f['required']) ? $f['required'] = $f['required'] : $f['required'] = false;
                isset($f['restrict_format']) ? $f['restrict_format'] = $f['restrict_format'] : $f['restrict_format'] = false;


                if ($field !== "post_content" and $field !== "post_title" and $field !== "post_status") {

                    $field_value = get_post_meta($post->ID, $field . $meta_marker, true);
                } else {
                    if ($field == "post_content") {
                        $field_value = $post->post_content;
                    }
                    if ($field == "post_title") {
                        $field_value = $post->post_title;
                    }
                    if ($field == "post_status") {
                        $field_value = $post->post_status;
                    }
                }
                empty($field_value) ? $value = $default : $value = $field_value;
                $post_type = get_post_type($post);
                $f['value'] = $field_value;
                ///DEFINE PARENT ID, in case we need it... Only if we defined in module config, the follow:
                /* 'define_parent'=>array(
                  'parent_post_type'=>'fgl_companies',
                  'parent_post_field'=>'fgl_company_parent'
                  ),
                 *
                 * */
                $parent_id = 0;


                foreach ($this->applications as $key => $application) {



                    if (isset($application['modules'][$post_type])) {
                        $parent_post_type = $application['modules'][$post_type]['define_parent']['parent_post_type'];
                        $parent_post_field = $application['modules'][$post_type]['define_parent']['parent_post_field'];
                        if (isset($_GET['post'])) {//=is edit
                            $parent_id = get_post_meta($post->ID, $parent_post_field . $meta_marker, true);
                        } else if (isset($_GET['parent_id'])) {
                            $parent_id = $_GET['parent_id'];
                        }
                        if (isset($application['modules'][$post_type]['module_new_categories'])) {//=is edit
                            $f['module_new_categories'] = $application['modules'][$post_type]['module_new_categories'];
                            $f['app_categories'] = $application['categories'];
                        }
                    };
                }
                //echo "//".$f['field_type'];
                switch ($f['field_type']) {
                    case 'textfield':
                        $str = $this->setBasicFieldNew($f, 'textfield');
                        break;
                    case 'currencyfield':
                        $str = $this->setBasicFieldNew($f, 'currencyfield');
                        break;
                    case 'autoincrementfield':
                        $str = $this->setBasicFieldNew($f, 'autoincrementfield');
                        break;
                    case 'numberfield':
                        $str = $this->setBasicFieldNew($f, 'numberfield');
                        break;
                    case 'hiddenfield':
                        $str = $this->setBasicFieldNew($f, 'hiddenfield');
                        break;
                    case 'autocomplete':
                        $str = $this->setBasicFieldNew($f, 'autocomplete');
                        break;
                    case 'add_child':
                        $str = $this->setAddChildNew($f);
                        break;
                    case 'photo':
                        break;
                    case 'autosuggest_multiselect':
                        break;
                    case 'convert_button':
                        break;
                    case 'action_button':
                        $str = $this->setActionButtonNew($f);
                        break;
                    case 'categories_list':
                        $str = $this->setCategoriesListNew($f);
                        break;
                    case 'auto_set_title':
                        $str = $this->setBasicFieldNew($f, 'auto_set_title');
                        break;
                    case 'created_by':
                        $str = $this->setBasicFieldNew($f, 'created_by');
                        break;
                    case 'created_date':
                        $str = $this->setBasicFieldNew($f, 'created_date');
                        break;
                    case 'modified_date':
                        $str = $this->setBasicFieldNew($f, 'modified_date');
                        break;
                    case 'displayfield':
                        break;
                    case 'checkbox':
                        $str = $this->setBasicFieldNew($f, 'checkbox');
                        break;
                    case 'select':
                        $str = $this->setBasicFieldNew($f, 'select');
                        break;
                    case 'radio':
                        $str = $this->setBasicFieldNew($f, 'radio');
                        break;
                    case 'html':
                        $str = $this->setBasicFieldNew($f, 'html');
                        break;
                    case 'comments':
                        $str = $this->setBasicFieldNew($f, 'comments');
                        break;
                    case 'textarea':
                        $str = $this->setBasicFieldNew($f, 'textarea');
                        break;
                    case 'uploadfield':
                        $str = $this->setBasicFieldNew($f, 'uploadfield');
                        break;
                    /* case 'team':
                      $str=$this->setBasicFieldNew($f,'team');
                      break; */
                    /* case 'in_body_category_select':
                      $str=$this->setBasicFieldNew($f,'in_body_category_select');
                      break; */
                    case 'richtexteditor':
                        $str = $this->setBasicFieldNew($f, 'richtexteditor');
                        break;
                    case 'childgrid':
                        $str = $this->setChildGridNew($f);
                        break;
                    case 'childphotogrid':
                        break;
                    case 'userslist':
                        $str = $this->setUserslistNew($f); //
                        break;
                    case 'datefield':
                        $str = $this->setBasicFieldNew($f, 'datefield');
                        break;
                    case 'assignee':
                        $str = $this->setAssignmentsNew($f); //
                        break;
                    case 'notifications_rules':
                        $str = $this->setBasicFieldNew($f, 'notifications_rules');
                        break;
                    case 'notifications':
                        $str = $this->setBasicFieldNew($f, 'notifications');
                        //$this->setNotifications($args);
                        //$this->setNotificationsRules($args);
                        break;
                    default:
                        //case 'in_body_category_select':
                        $str = $this->setBasicFieldNew($f, $f['field_type']);
                        // echo "///////////////////////";
                        // var_dump($oThis->extensions);
                        // exit;
                        break;
                }
            }
            return $str;
        }

        public function get_childtable($post_id, $post_type, $meta_key, $search, $field) {
            global $wpdb, $current_user, $meta_marker;
            // echo "///".$meta_marker."///";

            if (current_user_can('administrator')) {
                $query = "SELECT *
                            FROM $wpdb->posts
                            LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id
                            WHERE   $wpdb->posts.post_type = '$post_type'
                            AND $wpdb->postmeta.meta_key='" . $meta_key . $meta_marker . "'
                            AND $wpdb->postmeta.meta_value='$post_id'
                            AND ($wpdb->posts.post_status = 'publish' OR $wpdb->posts.post_status = 'draft') ";
            } else {
                $uid = $current_user->ID;
                $query = "SELECT DISTINCT  post_title, post_name , ID, post_status, post_date, post_type, post_author
                            FROM $wpdb->posts
                            LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id
                            INNER JOIN $wpdb->postmeta  as metaprivacy  ON $wpdb->posts.ID = metaprivacy.post_id
                            INNER JOIN $wpdb->postmeta as metaassignee ON  $wpdb->posts.ID = metaassignee.post_id
                            WHERE   $wpdb->posts.post_type = '$post_type'
                            AND $wpdb->postmeta.meta_key='" . $meta_key . $meta_marker . "'
                            AND $wpdb->postmeta.meta_value='$post_id'
                            AND ($wpdb->posts.post_status = 'publish' OR $wpdb->posts.post_status = 'draft')
                        AND ((post_author = $uid AND metaprivacy.meta_value = '1'  AND metaprivacy.meta_key = '" . $meta_name . "set_privacy')
                  OR ( metaprivacy.meta_value = '0'  AND metaprivacy.meta_key = '" . $meta_name . "set_privacy')
                  OR ( metaprivacy.meta_value = '2'  AND metaprivacy.meta_key = '" . $meta_name . "set_privacy' AND post_author = $uid )
                  OR ( metaprivacy.meta_value = '2'  AND metaprivacy.meta_key = '" . $meta_name . "set_privacy' AND metaassignee.meta_key = '" . $meta_name . "assign_to' AND metaassignee.meta_value = '$uid'  ))
            ";
            }
            if ($search !== "") {
                $query .="  AND ($wpdb->posts.post_title LIKE '%" . $search . "%') ";
            }
            $query .="    ORDER BY post_title";
            $posts = $wpdb->get_results($query);
            //echo $query;
            // var_dump($posts);
            $str = "";
            $f = $this->default_fields[$field];
            $field_config = $f['field_config'];
            $columns = array();
            if (isset($field_config['columns'])) {
                $columns = $field_config['columns'];
            }
            if (count($posts) > 0) {

                foreach ($posts as $p) {

                    $str.= "<tr >";
                    foreach ($columns as $columnar) {
                        $column = $columnar['field'];
                        $out = sprintf(' <a  rel="tooltip" class="hasTooltip "  href="%s" title="Open item ">%s</a>', esc_url(add_query_arg(array('post' => $p->ID, 'action' => 'edit'), 'post.php')), esc_html($p->post_title)
                        );
                        $out .= sprintf(' <a  rel="tooltip" class="hasTooltip " href="%s" target="_blank" title="Open item in new window">%s</a>', esc_url(add_query_arg(array('post' => $p->ID, 'action' => 'edit'), 'post.php')), '<i class="icon-share-alt "></i>'
                        );

                        $f = $this->default_fields[$column];


                        switch ($column) {
                            case "post_title":
                                $str.= '<td>' . $out . '</td>';
                                break;
                            case "post_date":
                                $h_time = mysql2date(__('Y/m/d'), $p->post_date);
                                $str.= '<td>' . $h_time . '</td>';
                                break;
                            case "post_status":
                                $str.= '<td>' . $p->post_status . '</td>';
                                break;
                            default:
                                $meta = get_post_meta($p->ID, $column . $meta_marker, true);
                                if ($meta !== '') {
                                    //userslist
                                    if (isset($f['field_type'])) {
                                        switch ($f['field_type']) {//setInBodyCategorySelect
                                            case "setInBodyCategorySelect":
                                                $taxonomies = $f['field_config']['category'];
                                                $t = get_term($meta, $taxonomies);
                                                $meta = $t->name;
                                                break;
                                            case "select":
                                                if (isset($f['field_config']['use_values']) and $f['field_config']['use_values'] == true) {
                                                    $meta = $f['options'][$meta];
                                                } else {
                                                    $subpost = get_post($meta);
                                                    $meta_t = $subpost->post_title;
                                                    $meta = sprintf('<a rel="tooltip" href="%s" class="hasTooltip addBtn" title="Open the selected record in the same window">%s</a>', esc_url(add_query_arg(array('action' => 'edit', 'post' => $subpost->ID), 'post.php')), $meta_t
                                                    );
                                                    $meta.=sprintf('<a rel="tooltip" href="%s" target="_blank" class="hasTooltip addBtn" title="Open the selected record in a new window">%s</a>', esc_url(add_query_arg(array('action' => 'edit', 'post' => $subpost->ID), 'post.php')), ' <i class="icon-share-alt "></i>'
                                                    );
                                                }
                                                break;
                                            case "autocomplete":
                                                $subpost = get_post($meta);
                                                $meta_t = $subpost->post_title;
                                                $meta = sprintf('<a rel="tooltip" href="%s" class="hasTooltip addBtn" title="Open the selected record in the same window">%s</a>', esc_url(add_query_arg(array('action' => 'edit', 'post' => $subpost->ID), 'post.php')), $meta_t
                                                );
                                                $meta.=sprintf('<a rel="tooltip" href="%s" target="_blank" class="hasTooltip addBtn" title="Open the selected record in a new window">%s</a>', esc_url(add_query_arg(array('action' => 'edit', 'post' => $subpost->ID), 'post.php')), ' <i class="icon-share-alt "></i>'
                                                );
                                                break;
                                            case "userslist":
                                                $user = get_users(array(
                                                    'include' => $meta
                                                        ));
                                                $meta = $user[0]->display_name;
                                                break;
                                            case "assignee":
                                                $user = get_users(array(
                                                    'include' => $meta
                                                        ));
                                                $meta = $user[0]->display_name;
                                                break;
                                        }
                                        //echo var_dump($subpost);
                                    }
                                }
                                $str.= '<td>' . $meta . '</td>';
                                break;
                        }
                    }

                    $str.= "</tr >";
                }
            } else {
                $nbcol = count($columns);
                $str = "<tr ><td  colspan='" . $nbcol . "' >No child items</td></tr >";
            }
            $a = array(
                str => $str
            );

            echo json_encode($a);
            die();
        }

        public function setCategoriesLi($cat, $parent, $t = '', $pcat, $lvl = 0) {
            $args = array(
                'taxonomy' => $cat,
                'hide_empty' => 0,
                'parent' => $parent,
                'orderby' => 'name',
                'order' => 'ASC'
            );
            $categs = get_categories($args);
            if ($t == "sub") {
                $str = '<ul class="subcateg_list">';
            } else {
                $str = '<ul class="categ_list">';
            }
            if (count($categs) > 0) {
                foreach ($categs as $ke => $ca) {
                    $check = "";
                    if (in_array($ca->term_id, $pcat)) {
                        $check = ' checked="checked" ';
                    }
                    $str.= '<li data-lvl="' . $lvl . '" data-nbcount="' . $ca->count . '" data-id="' . $ca->term_id . '" data-name="' . $ca->name . '" ><input class="categ_checkb" ' . $check . ' value="' . $ca->term_id . '" name="tax_input[' . $cat . '][]" id="in-' . $cat . '-' . $ca->term_id . '"  type="checkbox"><label> ' . $ca->name . ' (<span class="cat_count">' . $ca->count . '</span>) </label></li>'; //checked="checked"
                    $str.= $this->setCategoriesLi($cat, $ca->term_id, 'sub', $pcat, $lvl + 1);
                }
            }
            $str.='</ul>';
            return $str;
            //  var_dump($categs);
        }

        public function refreshCategoriesCount($cat) {
            global $wpdb;
            $args = array(
                'taxonomy' => $cat,
                'hide_empty' => 0,
                'orderby' => 'name',
                'order' => 'ASC'
            );
            $categs = get_categories($args);
            foreach ($categs as $ke => $ca) {
                $query = "SELECT object_id, term_taxonomy_id FROM $wpdb->term_relationships " .
                        "WHERE  term_taxonomy_id='" . $ca->term_id . "' ";
                $terms_list = $wpdb->get_results($query);
                $query = "
                                UPDATE $wpdb->term_taxonomy
                                SET  count='" . count($terms_list) . "'
                                WHERE  term_id = '" . $ca->term_id . "'
                             ";
                $res = $wpdb->get_results($query);
                // var_dump($terms_list);
                // echo "<br> - ".$ca->term_id."/".$ca->name."//".count($terms_list);
            }
        }

        public function setCategoriesListNew($config) {
            global $apm_lang;
            // var_dump($config['module_new_categories']);
            // var_dump($config['app_categories']);
            $str = ' <div class="accordion" id="accordion_categs">';
            $c = 0;
            $category_label = '';

            foreach ($config['app_categories'] as $k => $cat) {
                if (in_array($k, $config['module_new_categories'])) {
                    // print_r($cat);exit();
                    $category_label = $cat['singular_name'];
                    $c++;
                    $in = " ";
                    if ($c == 1) {
                        $in = " in ";
                    }
                    $this->refreshCategoriesCount($k);
                    $str.=' <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle accord_title" title="' . $apm_lang['expand_categ'] . '" data-toggle="collapse" data-parent="#accordion_categs" href="#collapse' . $k . '">
                                    ' . $cat['name'] . '
                                    </a>
                                </div>
                                <div id="collapse' . $k . '" class="accordion-body collapse ' . $in . '">
                                    <div class="accordion-inner">';

                    if (isset($_GET['post'])) {
                        $post_id = $_GET['post'];
                        $pcatobj = wp_get_post_terms($post_id, $k);
                        $pcat = array();
                        foreach ($pcatobj as $kca => $oca) {
                            array_push($pcat, $oca->term_id);
                        }
                    } else {
                        $pcat = array();
                    }
                    $str.=$this->setCategoriesLi($k, 0, '', $pcat, 0);
                    $str.='     <p>';
                    if (current_user_can('administrator')) {
                        $str.='                       <a rel="tooltip" data-placement="right" data-categ="' . $k . '" title="Add category" class="hasTooltip btn btn-mini add_categ_btn" href="javascript:void(0);"><i class="icon-plus"></i></a>
                                             <a rel="tooltip"  data-categ="' . $k . '" title="Manage category" class="hasTooltip btn btn-mini manage_cat_btn" href="javascript:void(0);">Manage</a>';
                    } else {

                        $str.='<i data-placement="right" class="hasTooltip icon-question-sign" rel="tooltip" title="Only Admin users can mamage and add categories"></i>';
                    }
                    $str.='                        <a rel="tooltip" title="See All" class="hasTooltip btn btn-mini apm_hidden all_used_btn" href="javascript:void(0);">See All</a>
                                                <a rel="tooltip" title="See Most used" class="hasTooltip btn btn-mini most_used_btn" href="javascript:void(0);">See Most used</a>
                                                </p>
                                    </div>
                                </div>
                            </div>';
                }
            }
            $str.='</div>
                            <div id="myModalcategs" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                         <h4 style="text-transform: capitalize;">Add New ' . $category_label . '</h4>
                                    </div>
                                    <div class="modal-body add_modal_form">
                                                <fieldset>
                                                <p><label class="add_modal_label ">Category name*</label>
                                                <input type="text" class="addcateg_name" placeholder="Category name..."></p>
                                                <input type="hidden"  class="tagcateg" value=""></p>
                                                <p><label>Parent Category</label>
                                                <select><option value="tt">ooo</option>
                                                </select></p>
                                               <p> <label>Category description</label>
                                                <textarea rows="3"></textarea></p>
												<p><lable class="note-required-italic">* = required</lable></p>
                                            </fieldset>
                                    </div>
                                    <div class="modal-footer">
                                        <span class="modal_add_categ_alert"></span>
                                        <a class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
                                        <a class="btn btn-primary send_add_categ_btn">Add</a>
                                    </div>
                                </div>';

            return $str;
        }

        public function setBasicFieldNew($config, $fieldtype = 'textfield') {
            global $post, $meta_marker, $oThis;
            $str = ' <div class="control-group" style="margin:0 0;">
                    <div class="controls"> ';
            $fwidthCls = $this->getFieldWidthCls($config);
            $config['fwidthCls'] = $fwidthCls;
            $fheightCls = $this->getFieldHeightCls($config);
            $config['fheightCls'] = $fheightCls;

            if (isset($config['field_config']['hide_btn']) and $config['field_config']['hide_btn'] == true) {

            } else {
                $str.=$this->setLabelNew($config); // <label class="control-label" style="float:left" for="input01">Text input</label> ';
            }
            if (is_array($config['value'])) {
                $config['value'] = implode(' - ', $config['value']);
            }
            if (is_object($config['value'])) {
                $config['value'] = print_r($config['value']);
            }
            switch ($fieldtype) {
                case 'numberfield':
                    if ($config['restrict_format'] == false or !isset($config['restrict_format'])) {
                        $config['restrict_format'] = "numbers";
                    }
            }
            $req = '';
            $config['extraCls'] = '';
            if ($config['required']) {
                $config['extraCls'].=' apm_is_required';
            }
            if ($config['restrict_format'] !== false) {
                switch ($config['restrict_format']) {
                    case 'email':
                        $config['extraCls'].=' apm_is_email';
                        break;
                    case 'numbers':
                        $config['extraCls'].=' apm_is_numbers';
                        break;
                    case 'phone':
                        $config['extraCls'].=' apm_is_phone';
                        break;
                }
            }
            $config['extra'] = '';
            switch ($fieldtype) {//
                case 'auto_set_title':
                    $str.= $this->setAutoSetTitleNew($config);
                    $str.=$this->getHelpNew($config);
                    break;
                case 'assignee':
                    $str.= $this->setAssignmentsNew($config);
                    $str.=$this->getHelpNew($config);
                    break;
                case 'notifications_rules':
                    $str.= $this->setNotificationsRulesNew($args);
                    $str.=$this->getHelpNew($config);
                    break;
                case 'notifications':
                    $str.= $this->setNotificationsNew($args);
                    $str.=$this->getHelpNew($config);
                    break;
                case 'textfield':
                    $str.= $this->setTextFieldNew($config);
                    $str.=$this->getHelpNew($config);
                    break;
                case 'numberfield':
                    $maxlength = $this->getMaxLength($config);
                    $config['extra'].=$maxlength;
                    $str.= $this->setTextFieldNew($config);
                    $str.=$this->getHelpNew($config);
                    break;
                case 'datefield':////icon-calendar
                    $config['extra'].=$maxlength;
                    $str.= $this->setTextFieldNew($config);
                    $str.='	<span title="Click to select a date" class="hasTooltip btn add-on btn-mini btn-adjust-pos " rel="tooltip" id="btn_date_' . $config['field'] . '" data-date="' . $config['value'] . '"><i class="icon-calendar"></i></span>
                                                <script>
                                                $("#btn_date_' . $config['field'] . '").datepicker({
                                                        format: "mm/dd/yyyy",
                                                   })
                    				.on("changeDate", function(ev){
                                                            theDate = new Date(ev.date);
                                                            da=$(this).data("date");
                                                            $("#' . $config['field'] . '").val(da);
                                                            $("#' . $config['field'] . '").data("date",da);
                    					$(this).datepicker("hide");
                    				});
                                                </script>';
                    $str.=$this->getHelpNew($config);
                    break;
                case 'hiddenfield':
                    $config['type'] = 'hidden';
                    $str.= $this->setTextFieldNew($config);
                    break;
                case 'autocomplete':
                    $str.= $this->setTextAutoCompleteNew($config);
                    $str.=$this->getHelpNew($config);
                    break;
                /* case 'childgrid':
                  break; */
                case 'currencyfield':
                    $maxlength = $this->getMaxLength($config);
                    $config['extra'].=$maxlength;
                    $str.= $this->setTextFieldNew($config);
                    $str.=$this->getHelpNew($config);
                    break;
                case 'checkbox':
                    $str.= $this->setCheckboxNew($config);
                    break;
                /* case 'action_button':
                  $str.=  $this->setActionButton($config);
                  break; * */
                case 'html':
                    $str.= $config['html'];
                    $str.=$this->getHelpNew($config);
                    break;
                case 'textarea':
                    $str.= $this->setTextAreaNew($config);
                    $str.=$this->getHelpNew($config);
                    break;
                case 'radio':
                    $str.= $this->setRadioNew($config);
                    $str.=$this->getHelpNew($config);
                    break;
                case 'richtexteditor':
                    $str.= $this->setRTEditorItemNew($config);
                    $str.=$this->getHelpNew($config);
                    break;

                case 'comments':
                    $str.= $this->setCommentsNew($config);
                    $str.=$this->getHelpNew($config);
                    break;
                case 'select':
                    $str.= $this->setSelectNew($config);
                    break;
                case 'modified_date':
                    $str.= '<span class="adjust_display_txt">' . $this->setModifiedDateNew($config) . '</span>';
                    $str.=$this->getHelpNew($config);
                    break;
                case 'created_date':
                    $str.= '<span class="adjust_display_txt">' . $this->setCreatedDateNew($config) . '</span>';
                    $str.=$this->getHelpNew($config);
                    break;
                case 'created_by':
                    $str.= '<span class="adjust_display_txt">' . $this->setCreatedByNew($config) . '</span>';
                    $str.=$this->getHelpNew($config);
                    break;
                case 'autoincrementfield':
                    if (isset($_GET['action']) and $_GET['action'] == 'edit') {

                    } else {
                        $post_type = get_post_type($post);
                        $val = $this->get_highest_value($post_type, $config['field']);
                        $val = intval($val) + 1;
                        if ($val < 10) {
                            $config['value'] = '00' . $val;
                        } else if ($val < 100) {
                            $config['value'] = '0' . $val;
                        } else {
                            $config['value'] = $val;
                        }
                    }
                    $str.= $this->setTextFieldNew($config);
                    $str.=$this->getHelpNew($config);
                    break;
                /* case 'in_body_category_select':
                  $str.= $this->setInBodyCategorySelectClsNew($config);
                  break; */
                default:
                    foreach ($oThis->extensions->extensions as $ke => $ext) {
                        if ($ext == $fieldtype) {
                            include_once($oThis->extensions->clss[$fieldtype][0]['path'] . $oThis->extensions->clss[$fieldtype][0]['filename']);
                            $str.=$oThis->extension_class_instances[$fieldtype]->getField($this, $config, $post, $meta_marker);
                        }
                    }
                    $str.=$this->getHelpNew($config);
                    break;
            }
            $str.=$this->getDescriptionNew($config); //'
            $str.=' </div>
                      </div> ';
            return $str;
        }

        public function getFieldHeightCls($config) {
            $height = 2;
            if (isset($config['fieldheight'])) {
                $height = $config['fieldheight'];
            }
            $fheightCls = "sel_h-mini";
            switch ($height) {
                case 1:
                    $fheightCls = "sel_h-mini";
                    break;
                case 2:
                    $fheightCls = "sel_h-small";
                    break;
                case 3:
                    $fheightCls = "sel_h-medium";
                    break;
                case 4:
                    $fheightCls = "sel_h-large";
                    break;
                case 5:
                    $fheightCls = "sel_h-xlarge";
                    break;
            }
            return $fheightCls;
        }

        public function getFieldWidthCls($config) {
            $width = $config['widthli'];
            if (isset($config['fieldwidth'])) {
                $width = $config['fieldwidth'];
            }
            $fwidthCls = "input-medium";
            switch ($width) {
                case 1:
                    $fwidthCls = "input-mini";
                    break;
                case 2:
                    $fwidthCls = "input-small";
                    break;
                case 3:
                    $fwidthCls = "input-smallmedium";
                    break;
                case 4:
                    $fwidthCls = "input-medium";
                    break;
                case 5:
                    $fwidthCls = "input-largemedium";
                    break;
                case 6:
                    $fwidthCls = "input-large";
                    break;
                case 7:
                    $fwidthCls = "input-xlarge";
                    break;
                case 8:
                    $fwidthCls = "input-xllarge";
                    break;
                case 9:
                    $fwidthCls = "input-xxlarge";
                    break;
                case 10:
                    $fwidthCls = "input-xxxlarge";
                    break;
            }
            return $fwidthCls;
        }

        public function Add_Extension($class_instance) {
            global $post, $meta_marker;
            //$setTeamField=$this->extension_fields['setTeamField'];
            // var_dump ($class_instance->config['field']);
            $this->classInstances[$class_instance->config['field']] = $class_instance;
        }

        public function setTextFieldNew($config) {
            global $meta_marker;
            if (!isset($config['type']) or $config['type'] == false) {
                $config['type'] = "text";
            }
            $placeholder = "";
            if (isset($config['placeholder'])) {
                $placeholder = ' placeholder="' . $config['placeholder'] . '" ';
            }
            return '<input ' . $placeholder . ' class="' . $config['fwidthCls'] . ' ' . $config['extraCls'] . '" type="text" id="' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '" value="' . $config['value'] . '" ' . $config['extra'] . ' />';
        }

        public function setCheckboxNew($config) {
            global $meta_marker;
            return '<span class="apm_checboxnew" ><input type="checkbox" name="' . $config['field'] . $meta_marker . '"  id="' . $config['field'] . '" ' . checked(!empty($config['value']), true, false) . ' /></span>';
        }

        public function setTextAutoCompleteNew($config) {
            global $post, $meta_marker;
            $select_post_type = false;
            $display_value = '';
            $null_value = false;
            $use_none = false;
            $multiselect = false;
            $select_type = 'autocomplete';

            if (isset($config['placeholder'])) {
                $placeholder = ' placeholder="' . $config['placeholder'] . '" ';
            }
            if (isset($config['field_config']['post_type'])) {
                $select_post_type = $config['field_config']['post_type'];
            }

            if (isset($_GET['apm_do'])) {
                if (strpos($select_post_type, ',') > -1) {

                   // var_dump($select_post_type);
                    $selected_post_type_arr = explode(',', $select_post_type);
                   // var_dump($selected_post_type_arr);
                    foreach ($selected_post_type_arr as $kpt => $pt) {

                        if ($_GET['apm_do'] == 'set_select' and $_GET['parent_post_type'] == $pt) {
                            $config['value'] = $_GET['parent_id'];
                        }
                        if ($_GET['apm_do'] == 'set_select' and $_GET['second_parent_post_type'] == $pt) {
                            $config['value'] = $_GET['second_parent_id'];
                        }
                    }
                } else {
                    if ($_GET['apm_do'] == 'set_select' and $_GET['parent_post_type'] == $select_post_type) {
                        $config['value'] = $_GET['parent_id'];
                    }
                    if ($_GET['apm_do'] == 'set_select' and $_GET['second_parent_post_type'] == $select_post_type) {
                        $config['value'] = $_GET['second_parent_id'];
                    }
                }
            }

            if ($config['value'] !== '') {
                $p = get_post($config['value']);
                if (count($p) > 0) {
                    $display_value = $p->post_title;
                }
            }
            // $str = '<input ' . $placeholder . ' autocomplete="off" class="' . $config['fwidthCls'] . ' ' . $config['extraCls'] . ' autocomplete_field" post_type="' . $select_post_type . '" fieldname="' . $config['field'] . '" type="text" id="autocomplete_' . $config['field'] . '" name="' . $config['field'] . '_displayvalue" value="' . $display_value . '" />';
            //$str.='<input class="autocomplete_field_value"  type="hidden" id="autocomplete_data_' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '" value="' . $config['value'] . '" />';

            $strtpl = file_get_contents(APPLICATION_MAKER_PATH . '/views/fields/autoCompleteNew_tpl.html');

            $strtpl = str_replace('{{label}}', $config['label'], $strtpl);
            $strtpl = str_replace('{{field}}', $config['field'], $strtpl);
            $strtpl = str_replace('{{value}}', $config['value'], $strtpl);
            $strtpl = str_replace('{{fwidthCls}}', $config['fwidthCls'], $strtpl);
            $strtpl = str_replace('{{extraCls}}', $config['extraCls'], $strtpl);
            $strtpl = str_replace('{{display_value}}', $display_value, $strtpl);
            $strtpl = str_replace('{{select_post_type}}', $select_post_type, $strtpl);
            $strtpl = str_replace('{{placeholder}}', $placeholder, $strtpl);
            $str = str_replace('{{meta_marker}}', $meta_marker, $strtpl);


            $str.=$this->setExtraBtns($config, $select_post_type, $multiselect, $select_type);
            return $str;
        }

        //	echo '<input class="autocomplete_field" post_type="'.$select_post_type.'" fieldname="'.$config['field'].'" type="text" id="autocomplete_'.$config['field'].'" name="'.$config['field'].'_displayvalue" value="'.$display_value.'" /><input class="autocomplete_field_value"  type="hidden" id="autocomplete_data_'.$config['field'].'" name="'.$config['field'].$meta_marker.'" value="'.$config['value'].'" />';

        public function setTextAreaNew($config) {
            global $meta_marker;
            // var_dump($config);
            $addstyle = "";
            $rows = "8";
            if (isset($config['field_config']['flotable']) and $config['field_config']['flotable'] == true) {
                $addstyle = "float:left;";
            }
            if (isset($config['field_config']['rows'])) {
                $rows = $config['field_config']['rows'];
            }
            $str = '<textarea id="' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '"  style="width:100%" rows="' . $rows . '">' . $config['value'] . ' </textarea>';
            return $str;
        }

        public function setRTEditorItemNew($config) {
            global $meta_marker;
            $str = '<div class="apm_rte_container" id="rte_container_' . $config['field'] . '" >'; // .
            $type = "";
            if (isset($config['field_config']['rte_type'])) {
                if ($config['field_config']['rte_type'] == 'show_text_first') {
                    $type = 'show_text_first';
                }
            }
            if ($type == 'show_text_first' and $_GET['action'] == 'edit') {

                $str .="<div class='rte_content'><div class='rte_content_txt' > " . wpautop($config['value']); //
                $str .='</div><br/> <span title="Click to edit in Rich text Editor" class="hasTooltip btn btn-mini apm_show_desc_rte" rel="tooltip" ><i class="icon-edit"></i> Edit in Text Editor</span>'; // .

                $str .='</div><div class="hidden hidden_rte" >'; //
                $config['field_config']['rows'] = 12;
                $str .=$this->setRTEditorNew($config); //
                $str .='<br/> <span title="Click to preview in text view" class="hasTooltip btn btn-mini apm_show_desc_txt" rel="tooltip" ><i class="icon-eye-open"></i> Preview in text view</span>'; // .

                $str .='</div>'; // .
            } else {
                $str .=$this->setRTEditorNew($config); //
            }
            $str .='</div>'; // .

            return $str;
        }

        public function setRTEditorNew($config) {
            global $meta_marker;
            $rows = "20";
            if (isset($config['field_config']['rows'])) {
                $rows = $config['field_config']['rows'];
            }
            $str = '<textarea cols="70" style="width:700px;" rows="' . $rows . '" id="' . $config['field'] . $meta_marker . '_rte"  name="' . $config['field'] . $meta_marker . '_rte" class="rte_textarea_value ' . $config['field'] . $meta_marker . ' "  >' . wpautop($config['value']) . ' </textarea>';
            $str.= '<script type="text/javascript">
                                    $(function() {
                                        $("#' . $config['field'] . $meta_marker . '_rte").wysiwyg(apm_rte_controls);
                                           // alert($("#rte_container_' . $config['field'] . '")+"-"+$("#rte_container_' . $config['field'] . '").html());
                                        $("#rte_container_' . $config['field'] . ' textarea").live("change",function(){
                                           // console.log($("#rte_container_' . $config['field'] . ' textarea").val());
                                            $("#' . $config['field'] . $meta_marker . '_rte").html($("#rte_container_' . $config['field'] . ' textarea").val());
                                        });
                                    });
                                    </script>';
            return $str;
        }

        public function setCreatedByNew($config) {
            global $meta_marker;
            $post_id = $_GET['post'];
            $post = get_post($post_id);
            $user = get_users(array(
                'include' => $post->post_author
                    ));
            return $user[0]->display_name;
        }

        public function setCreatedDateNew($config) {
            global $meta_marker;
            $post_id = $_GET['post'];
            $post = get_post($post_id);
            return $post->post_date;
        }

        public function setModifiedDateNew($config) {
            global $meta_marker;
            $post_id = $_GET['post'];
            $post = get_post($post_id);
            return $post->post_modified;
        }

        public function getDescriptionNew($config, $default_description = "", $default_help = "", $addBr = false) {
            $str = "";
            //<p class="help-block">In addition to freeform text, any HTML5 text-based input appears like so.</p> ';
            if ($config['description'] !== '') {
                $str.= '<p class="help-block">' . $config['description'] . '</p>';
            } else if ($default_description !== '') {
                $str.= '<p class="help-block">' . $default_description . '</p>';
            }
            /* if ($config['help'] !== '') {
              $str.= '<a  rel="tooltip" title="' . $config['help'] . '" class="hasTooltip btn btn-mini btn-adjust-pos" href="javascript:void(0);"><i class="icon-info-sign ico-adjust-pos"></i></a>'; //'<span class="apm_help_btn"><img src="'.$this->help_image .'" /></span><span class="apm_legend_help">'.$config['help'].'</span>';
              } */
            return $str;
        }

        public function getHelpNew($config, $default_description = "", $default_help = "", $addBr = false) {
            $str = "";
            //<p class="help-block">In addition to freeform text, any HTML5 text-based input appears like so.</p> ';

            if ($config['help'] !== '') {
                $str.= '<a  rel="tooltip" title="' . $config['help'] . '" class="hasTooltip btn btn-mini btn-adjust-pos" href="javascript:void(0);"><i class="icon-info-sign ico-adjust-pos"></i></a>'; //'<span class="apm_help_btn"><img src="'.$this->help_image .'" /></span><span class="apm_legend_help">'.$config['help'].'</span>';
            }
            return $str;
        }

        public function setSelectNew($config) {
            global $wpdb, $current_user, $meta_marker;

            $options = $config['options'];
            if (is_array($options)) {

            } else {
                $options = explode(';', $options);
            }

            //echo $uid;
            if (is_array($options)) {
                $null_value = false;
                $use_none = false;
                $multiselect = false;
                $advanced_ui = false;
                $select_type = 'default';
                if (isset($config['field_config'])) {
                    if (isset($config['field_config']['use_values']) && $config['field_config']['use_values'] = true) {
                        $select_type = 'use_values';
                    }
                    if (isset($config['field_config']['autoid']) && $config['field_config']['autoid'] = true) {
                        $select_type = 'autoid';
                    }
                    if (isset($config['field_config']['post_type'])) {
                        $select_post_type = $config['field_config']['post_type'];
                        $select_type = 'use_values_posttype';
                        $posts_list = $this->get_posts_list_alone($select_post_type);
                        $options = array();
                        foreach ($posts_list as $pos) {
                            $options[$pos->ID] = $pos->post_title;
                        }
                    }
                    if (isset($config['field_config']['null_value']) && $config['field_config']['null_value'] = true) {
                        $null_value = true;
                    }
                    if (isset($config['field_config']['use_none']) && $config['field_config']['use_none'] = true) {
                        $use_none = true;
                    }
                    if (isset($config['field_config']['multiselect']) && $config['field_config']['multiselect'] = true) {
                        $multiselect = true;
                    }
                    if (isset($config['field_config']['advanced_ui']) && $config['field_config']['advanced_ui'] = true) {
                        $advanced_ui = true;
                    }
                }
                $selected = '';
                $src_value = $config['value'];
                if (strpos($config['value'], '-') !== false) {
                    $config['value'] = explode(' - ', $config['value']);
                }
                if (is_array($config['value'])) {
                    $value = $config['value'];
                } else {
                    $value = (array) $config['value'];
                }
                $multiselect_str = "";
                $extraCls = " apm_monoselect";

                $str = ' <div class="controls">  ';
                if ($multiselect) {
                    $multiselect_str = '  multiple="multiple"  ';
                    $extraCls = " apm_multiselect";
                    if ($advanced_ui) {
                        $str .= '<select id="' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '[]" ' . $config['width'] . '  ' . $multiselect_str . ' class="multiselect" >';
                    } else {
                        $str.='<input type="hidden" name="' . $config['field'] . $meta_marker . '" value="' . $src_value . '" />
                                              <select class="' . $config['fwidthCls'] . ' ' . $config['fheightCls'] . $extraCls . ' multiselect_classic" ' . $multiselect_str . ' id="' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '_display">  ';
                    }
                } else {
                    $str.='<select class="combobox ' . $config['fwidthCls'] . ' ' . $config['fheightCls'] . $extraCls . '"
                                          id="' . $config['field'] . '_select"
                                           name="' . $config['field'] . $meta_marker . '">  ';
                }

                if ($null_value) {
                    $str.= '<option value="-">' . _('Please select a') . ' ' . $config['label'] . '</option>';
                }
                if ($use_none) {
                    $str.= '<option value="none">' . _('None') . ' </option>';
                }
                if (isset($_GET['apm_do'])) {
                    if ($_GET['apm_do'] == 'set_select' and $_GET['parent_post_type'] == $select_post_type) {
                        $value = array();
                        array_push($value, $_GET['parent_id']);
                    }
                    if ($_GET['apm_do'] == 'set_select' and $_GET['second_parent_post_type'] == $select_post_type) {
                        $value = array();
                        array_push($value, $_GET['second_parent_id']);
                        //echo "/////".$_GET['second_parent_post_type'].'/'.$select_post_type.'---'.$_GET['second_parent_id'];
                    }
                }

                $selectedValue = 0;
                foreach ($options as $k => $v) {
                    $v = stripslashes($v);
                    switch ($select_type) {
                        case 'default':
                            $selected = selected(in_array($v, $value), true, false);
                            $str.= '<option value="' . $v . '"' . $selected . '>' . $v . '</option>';
                            if ($selected !== '') {
                                $selectedValue = $v;
                            }
                            break;
                        case 'use_values_posttype':
                            $selected = selected(in_array($k, $value), true, false);
                            $str.= '<option value="' . $k . '"' . $selected . '>' . $v . '</option>';
                            if ($selected !== '') {
                                $selectedValue = $k;
                            }
                            break;
                        case 'use_values':
                            $selected = selected(in_array($k, $value), true, false);
                            $str.= '<option value="' . $k . '"' . $selected . '>' . $v . '</option>';
                            if ($selected !== '') {
                                $selectedValue = $k;
                            }
                            break;
                        case 'autoid':
                            $selected = selected(in_array($k, $value), true, false);
                            $str.= '<option value="' . $k . '"' . $selected . '>' . $v . '</option>';
                            if ($selected !== '') {
                                $selectedValue = $k;
                            }
                            break;
                    }
                }
                $str.=' </select> ';

                /* $addBtn= sprintf( ' <a href="%s" class="addBtn" target="_blank" title="Add a new value" style="margin:3px 0 0 4px; padding:5px 0 0 0; float:left;">%s</a>',
                  esc_url( add_query_arg( array( 'post_type' => $select_post_type), 'post-new.php' ) ),
                  "<img src='".$this->add_image."' alt='Add' />"
                  ); */
                $str.=$this->setExtraBtns($config, $select_post_type, $multiselect, $select_type);

                $str.=$this->getHelpNew($config);
                $str.='</div> ';
            }
            return $str;
        }

        public function setExtraBtns($config, $select_post_type, $multiselect, $select_type) {
            $dropup = "";
            $addBtnstr = '';
            $addBtnsNb = 0;
            $str = "";

            if (isset($config['field_config']['action_dropup']) and $config['field_config']['action_dropup'] == true) {
                $dropup = "dropup";
                // $addBtnsNb++;
            }

            $btnsaction = ' <div class="btn-group ' . $dropup . ' pull-rights">
                                    <button class="btn btn-mini dropdown-toggle btn-adjust-pos" data-toggle="dropdown">
                                    Action
                                    <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu  apm_adj_size_drop">';
            if ($select_type == 'autocomplete' and $config['field_config']['quick_add_ajax'] == true) {
                // $btnsaction.='<li><a href="javascript:void(0);" class="apm_add_directajax" post_type="'.$select_post_type.'" >Create from the input value</a></li>';
            }
            $btnsaction.='<li><a href="javascript:void(0);" class="apm_add_edit" post_type="' . $select_post_type . '" >Create a new ' . $config['label'] . ' in a new window</a></li>
                                    <li><a href="javascript:void(0);" class="apm_open_edit"  >View this ' . $config['label'] . ' in a new window</a></li>
                                    </ul>
                                    </div>';

            $addBtn = ' <button class="hasTooltip btn btn-mini btn-adjust-pos apm_add_edit" rel="tooltip"  post_type="' . $select_post_type . '"   type="button" title="Add a new value for this parent data module."><i class="icon-plus"></i> Add</button>';
            $seeBtn = ' <button class="hasTooltip btn btn-mini btn-adjust-pos apm_open_edit" rel="tooltip"   type="button" title="See the selected parent item in a new window"><i class="icon-eye-open"></i> See</button>';

            if (isset($_GET['action']) and $_GET['action'] == 'edit' and $multiselect == false and ($select_type == 'use_values_posttype' or $select_type == 'autocomplete')) {//
                if (isset($config['field_config']['hide_add_btn']) and $config['field_config']['hide_add_btn'] == true) {

                } else {
                    $addBtnstr.= $addBtn; //$addBtn;
                    $addBtnsNb++;
                }
                if (isset($value[0]) and ($value[0] == 'none' or $value[0] == '' )) {

                } else {
                    if (isset($config['field_config']['link_parent']) and $config['field_config']['link_parent'] == false) {

                    } else {
                        $addBtnstr.= $seeBtn; //
                        $addBtnsNb++;
                    }
                }
            } else if (!isset($_GET['action']) and $multiselect == false and isset($config['field_config']['force_add_btn']) and $config['field_config']['force_add_btn'] == true) {
                $addBtnstr.= $addBtn; //
                $addBtnsNb++;
            }
            if ($addBtnsNb > 1) {
                $addBtnstr = $btnsaction;
            }
            $str.= $addBtnstr;

            return $str;
        }

        public function setLabelNew($config) {
            global $apm_settings, $oThis;
            if ($config['label'] == '') {
                return '';
            }
            switch ($config['label_position']) {
                case 'left':
                    $lbl_cls = ' lbl_float ';
                    break;
                case 'top':
                    $lbl_cls = ' ';
                    break;
            }
            $req = '';
            if ($config['required']) {
                $req = '<span class="apm_required">*</span>';
            }
            $label_size_cls = "lbl_sm";
            if ($config['label_config']['size_cls']) {
                $label_size_cls = $config['label_config']['size_cls'];
                switch ($label_size_cls) {
                    case "s":
                        $label_size_cls = "lbl_s";
                        break;
                    case "sm":
                        $label_size_cls = "lbl_sm";
                        break;
                    case "m":
                        $label_size_cls = "lbl_m";
                        break;
                    case "ml":
                        $label_size_cls = "lbl_ml";
                        break;
                    case "l":
                        $label_size_cls = "lbl_l";
                        break;
                    case "xl":
                        $label_size_cls = "lbl_xl";
                        break;
                    case "xxl":
                        $label_size_cls = "lbl_xxl";
                        break;
                    case "f":
                        $label_size_cls = "lbl_f";
                        break;
                }
            }
            $lbl_cls.=$label_size_cls;
            switch ($config['label_type']) {
                case 'regular':
                    //$labl=  '<label for="'.$config['field'].'" style="width:'.$config['label_width'].'px; text-align:right;display:block; float:left">'.$config['label'].$req.': </label> '.$label_br;
                    //return '<label for="'.$config['field'].'" style="width:'.$config['label_width'].'px; display:block; float:left" >'.$config['label'].'</label> '.$label_br;
                    break;
                case 'inline':
                    /* $style=' style=""  ';
                      if(isset($config['label_width'])) {
                      $style=' style="width:'.$config['label_width'].'px; display:block;float:left; text-align:right; padding: 0 5px" ';
                      }
                      if($config['label_width_perc']!==0) {
                      $style=' style="width:'.$config['label_width_perc'].'%;  float:left;" ';
                      }
                      $labl= '<label for="'.$config['field'].'" '.$style.'>'.$config['label'].$req.': </label> '.$label_br;
                      //return '<label for="'.$config['field'].'" style="width:'.$config['label_width'].'px; display:block; float:left" >'.$config['label'].'</label> '.$label_br;
                     */break;
                default:
                    //return '<label for="'.$config['field'].'" style="width:'.$config['label_width'].'px; display:inline;" >'.$config['label'].'</label> '.$label_br;
                    //$labl= '<label for="'.$config['field'].'" '.$style.' >'.$config['label'].$req.': </label> '.$label_br;
                    break;
            }
            $labl = ' <div ><label class="control-label ' . $lbl_cls . '"  for="' . $config['field'] . '">' . $config['label'] . $req . ':</label><br clear="both"/></div> ';

            $labl = $oThis->get_currency($labl);
            // $labl = str_replace('{{currency}}', $apm_settings['configs']['default_currency'], $labl);
            if ($config['hide_label'] == true) {
                $labl = '';
            }
            return $labl;
        }

        public function setBoxByTabs($key, $positioning) {
            global $post;
            if (count($positioning['main']) > 0) {
                echo '<div id="main_block_' . $key . '" class="block apm_fieldset">';
                $c = 0;
                $ctotal = count($positioning['main']);
                foreach ($positioning['main'] as $fieldset) {
                    $c++;
                    $class = 'apm_li_inline';
                    if ($c == $ctotal) {
                        $class = 'apm_li_inline_last';
                    }
                    echo '<ul class="' . $class . '">';
                    $pos = 'inline';
                    $total_width = 0;
                    foreach ($fieldset as $field) {
                        $width = 1;
                        if (isset($this->default_fields[$field])) {
                            $f = $this->default_fields[$field];
                            isset($f['width']) ? $width = intval($f['width']) : $width = 1;
                        }
                        $total_width+=$width;
                    }
                    if (count($fieldset) == 1) {
                        $pos = 'regular';
                    }
                    foreach ($fieldset as $field) {
                        $this->setField($field, '<li >', '</li>', $pos, $total_width);
                    }
                    echo '<br clear="all"/></ul>';
                }
                echo '</div>';
            }
            if (isset($positioning['tabs']) and count($positioning['tabs']) > 0) {
                echo '<div id="block_' . $key . '" class="block">';
                if (count($positioning['tabs']) > 1) {
                    echo '<script type="text/javascript">
						tabs_obj["block_' . $key . '"]= "#block_' . $key . '";
					</script>
					';
                }
                echo '<ul class="htabs">';
                foreach ($positioning['tabs'] as $subkey => $tab) {
                    echo '<li><h2><a href="#' . $subkey . '" id="' . $subkey . 't">' . $tab['label'] . '</a></h2></li>';
                }
                echo '</ul><div class="tabs">';
                foreach ($positioning['tabs'] as $subkey => $tab) {
                    echo '<div class="tab  bmod" id="' . $subkey . '"><ul>';
                    $c = 0;
                    $ctotal = count($positioning['main']);
                    foreach ($tab['items'] as $fieldset) {
                        $c++;
                        $class = 'apm_li_inline';
                        if ($c == $ctotal) {
                            $class = 'apm_li_inline_last';
                        }
                        echo '<ul class="' . $class . '">';
                        $pos = 'inline';
                        if (count($fieldset) == 1) {
                            $pos = 'regular';
                        }
                        $total_width = 0;
                        foreach ($fieldset as $field) {
                            $width = 10;
                            if (isset($this->default_fields[$field])) {
                                $f = $this->default_fields[$field];
                                isset($f['width']) ? $width = intval($f['width']) : $width = 10;
                            }
                            $total_width+=$width;
                        }
                        foreach ($fieldset as $field) {
                            $this->setField($field, '<li >', '</li>', $pos, $total_width);
                        }
                        echo '<br clear="all"/></ul>';
                    }
                    echo '</ul></div>';
                }
                echo '</div></div>';
            }
        }

        public function setBoxByFields($key, $fields) {
            global $post;
            foreach ($fields as $field) {
                $this->setField($field);
            }
        }

        /////////////////


        public function setField($field, $before_field = '<p>', $after_field = '</p>', $global_label_type = false, $total_width = 10) {
            global $post, $meta_marker;
            if (isset($this->default_fields[$field])) {
                $f = $this->default_fields[$field];
                isset($f['field_type']) ? $field_type = $f['field_type'] : $field_type = 'textfield';
                isset($f['default']) ? $default = $f['default'] : $default = '';
                isset($f['child_second_parent']) ? $child_second_parent = $f['child_second_parent'] : $child_second_parent = '';
                isset($f['child_key']) ? $child_key = $f['child_key'] : $child_key = '';
                isset($f['label_position']) ? $label_position = $f['label_position'] : $label_position = 'left';
                isset($f['description']) ? $description = $f['description'] : $description = '';
                isset($f['info']) ? $info = $f['info'] : $info = '';
                isset($f['help']) ? $help = $f['help'] : $help = '';
                isset($f['hide_label']) ? $hide_label = $f['hide_label'] : $hide_label = '';
                isset($f['image_resize']) ? $image_resize = $f['image_resize'] : $image_resize = false;
                isset($f['img_config']) ? $img_config = $f['img_config'] : $img_config = false;
                isset($f['label_width']) ? $label_width = $f['label_width'] : $label_width = 150;
                isset($f['width']) ? $width = ' width:' . ($f['width'] * 10 ) . '%; ' : $width = '';
                isset($f['width']) ? $widthli = intval($f['width']) : $widthli = 10;
                isset($f['img_width']) ? $img_width = intval($f['img_width']) : $img_width = false;
                isset($f['show_input']) ? $show_input = intval($f['show_input']) : $show_input = false;
                isset($f['img_height']) ? $img_height = intval($f['img_height']) : $img_height = false;
                isset($f['label_width_perc']) ? $label_width_perc = intval($f['label_width_perc']) : $label_width_perc = 0;
                isset($f['options']) ? $options = $f['options'] : $options = array();
                isset($f['html']) ? $html = $f['html'] : $html = "";
                isset($f['use_none']) ? $use_none = $f['use_none'] : $use_none = "";

                isset($f['maxlength']) ? $maxlength = $f['maxlength'] : $maxlength = "";
                isset($f['label_type']) ? $label_type = $f['label_type'] : $label_type = 'regular';
                if ($global_label_type !== false) {
                    $label_type = $global_label_type;
                }
                isset($f['allow_multi_files']) ? $allow_multi_files = $f['allow_multi_files'] : $allow_multi_files = false;
                isset($f['field_config']) ? $field_config = $f['field_config'] : $field_config = '';
                isset($f['required']) ? $required = $f['required'] : $required = false;
                isset($f['restrict_format']) ? $restrict_format = $f['restrict_format'] : $restrict_format = false;
                $field_value = get_post_meta($post->ID, $field . $meta_marker, true);
                empty($field_value) ? $value = $default : $value = $field_value;
                $post_type = get_post_type($post);

                ///DEFINE PARENT ID, in case we need it... Only if we defined in module config, the follow:
                /* 'define_parent'=>array(
                  'parent_post_type'=>'fgl_companies',
                  'parent_post_field'=>'fgl_company_parent'
                  ),
                 *
                 * */
                $parent_id = 0;
                foreach ($this->applications as $key => $application) {
                    if (isset($application['modules'][$post_type])) {
                        $parent_post_type = $application['modules'][$post_type]['define_parent']['parent_post_type'];
                        $parent_post_field = $application['modules'][$post_type]['define_parent']['parent_post_field'];
                        if (isset($_GET['post'])) {//=is edit
                            $parent_id = get_post_meta($post->ID, $parent_post_field . $meta_marker, true);
                        } else if (isset($_GET['parent_id'])) {
                            $parent_id = $_GET['parent_id'];
                        }
                    };
                }



                $args = array(
                    'value' => $value,
                    'hide_label' => $hide_label,
                    'required' => $required,
                    'restrict_format' => $restrict_format,
                    'parent_id' => $parent_id,
                    'label_width' => $label_width,
                    'label_width_perc' => $label_width_perc,
                    'show_input' => $show_input,
                    'img_height' => $img_height,
                    'img_width' => $img_width,
                    'image_resize' => $image_resize,
                    'img_config' => $img_config,
                    'allow_multi_files' => $allow_multi_files,
                    'html' => $html,
                    'width' => $width,
                    'widthli' => $widthli,
                    'total_width' => $total_width,
                    'child_key' => $child_key,
                    'info' => $info,
                    'description' => $description,
                    'help' => $help,
                    'child_second_parent' => $child_second_parent,
                    'use_none' => $use_none,
                    'options' => $options,
                    'maxlength' => $maxlength,
                    'field_config' => $field_config,
                    'label_position' => $label_position,
                    'field' => $field,
                    'before_field' => $before_field,
                    'after_field' => $after_field,
                    'label' => $f['label'],
                    'label_type' => $label_type
                );
                switch ($field_type) {
                    case 'add_child':
                        $this->setAddChild($args);
                        break;
                    case 'textfield':
                        //$this->setTextField($args);
                        $this->setBasicField($args, 'textfield');

                        break;
                    case 'photo':
                        $this->setPhoto($args);
                        break;
                    case 'hiddenfield':
                        $this->setHiddenField($args);
                        break;
                    case 'autocomplete':
                        $this->setAutocomplete($args);
                        break;
                    case 'autosuggest_multiselect':
                        $this->setAutocompleteMultiSelect($args);
                        break;
                    case 'convert_button':
                        $this->setConvertButton($args);
                        break;
                    case 'action_button':
                        $this->setActionButton($args);
                        break;
                    case 'auto_set_title':
                        $this->setAutoSetTitle($args);
                        break;
                    case 'created_by':
                        $this->setCreatedBy($args);
                        break;
                    case 'created_date':
                        $this->setCreatedDate($args);
                        break;
                    case 'modified_date':
                        $this->setModifiedDate($args);
                        break;
                    case 'numberfield':
                        $this->setNumberField($args);
                        break;
                    case 'displayfield':
                        $this->setDisplayField($args);
                        break;
                    case 'currencyfield':
                        //$this->setCurrencyField($args);
                        $this->setBasicField($args, 'currencyfield');
                        break;
                    case 'html':
                        $this->setHTML($args);
                        break;
                    case 'textarea':
                        $this->setTextArea($args);
                        break;
                    case 'select':
                        $this->setSelect($args);
                        break;
                    case 'checkbox':
                        $this->setCheckbox($args);
                        break;
                    case 'richtexteditor':
                        $this->setRTEditor($args);
                        break;
                    case 'childgrid':
                        $this->setChildGrid($args);
                        break;
                    case 'childphotogrid':
                        $this->setChildPhotoGrid($args);
                        break;
                    case 'radio':
                        $this->setRadio($args);
                        break;
                    case 'userslist':
                        $this->setUsersList($args);
                        break;
                    case 'datefield':
                        $this->setDatePicker($args);
                        break;
                    case 'autoincrementfield':
                        //$this->setAutoIncrementField($args);
                        $this->setBasicField($args, 'autoincrementfield');
                        break;
                    case 'comments':
                        $this->setComments($args);
                        break;
                    case 'assignee':
                        $this->setAssignments($args);
                        break;
                    case 'notifications_rules':
                        $this->setNotificationsRules($args);
                        break;
                    case 'notifications':
                        $this->setNotifications($args);
                        break;
                }
            }
        }

        public function getDescription($config, $default_description = "", $default_help = "", $addBr = false) {

            if ($config['description'] !== '') {
                if ($addBr) {
                    echo'<br/>';
                }
                echo '<span class="apm_legend">' . $config['description'] . '</span>';
            } else if ($default_description !== '') {
                if ($addBr) {
                    echo'<br/>';
                }
                echo '<span class="apm_legend">' . $default_description . '</span>';
            }
            if ($config['help'] !== '') {
                $help_image = WP_PLUGIN_URL . '/' . WP_PLUGIN_FOLDER . '/img/bugsqa_16.png';
                echo '<span class="apm_help_btn"><img src="' . $help_image . '" /></span><span class="apm_legend_help">' . $config['help'] . '</span>';
            }
        }

        public function getMaxLength($config) {
            $maxlength = '';
            if ($config['maxlength'] !== '') {
                $maxlength = ' maxlength="' . $config['maxlength'] . '" ';
            }
            return $maxlength;
        }

        public function setUserslistNew($config) {
            global $meta_marker, $apm_settings;




            $post_id = $_GET['post'];
            $assign_rule_apply_child = '0';
            $display_value = "";
            if ($config['value'] !== '') {
                $u = get_userdata($config['value']);
                if (count($u) > 0) {
                    $display_value = $u->display_name;
                }
            }
            $select_post_type = "";
            if (isset($config['field_config']['post_type'])) {
                $select_post_type = $config['field_config']['post_type'];
            }//
            if (isset($config['placeholder'])) {
                $placeholder = ' placeholder="' . $config['placeholder'] . '" ';
            }
            // $str='<input '.$placeholder.' class="'.$config['fwidthCls'].' '.$config['extraCls'].' autocomplete_field" post_type="'.$select_post_type.'" fieldname="'.$config['field'].'" type="text" id="autocomplete_'.$config['field'].'" name="'.$config['field'].'_displayvalue" value="'.$display_value.'" />';
            //  $str.='<input class="autocomplete_field_value"  type="hidden" id="autocomplete_data_'.$config['field'].'" name="'.$config['field'].$meta_marker.'" value="'.$config['value'].'" />';


            $str = '<div><label class="control-label lbl_float lbl_f lbl_padtop lbl_marg_right_s">' . $config['label'] . ': </label><br clear="both"/></div>
                                <input ' . $placeholder . ' class="autocomplete_field autocomplete_field_save_ajax input-small input-hsmall " post_type="users" fieldname="' . $config['field'] . '" type="text" id="autocomplete_' . $config['field'] . '" name="' . $config['field'] . '_displayvalue" value="' . $display_value . '" autocomplete="off" />
                                <input class="autocomplete_field_value"  type="hidden" id="autocomplete_data_' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '" value="' . $config['value'] . '" initial_value="' . $config['value'] . '"/>
                                    <div class="btn-group  pull-rights">
                                    <button class="btn btn-mini dropdown-toggle btn-adjust-pos_s" data-toggle="dropdown">
                                    Action
                                    <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu  apm_adj_size_drop">
                                        <!--li><a href="javascript:void(0);" class="apm_select_user" >Select a user in search grid</a></li-->';

            if (current_user_can('administrator')) {
                $str .= '                  <li><a href="javascript:void(0);" class="apm_add_user" >Add a new user</a></li>
                                         <li><a href="javascript:void(0);" class="apm_open_user" user_id="' . $config['value'] . '">Open profile</a></li>';
            } else {
                $str.='<i data-placement="right" class="hasTooltip icon-question-sign" rel="tooltip" title="Only Admin users can mamage and add categories"></i>';
            }
            $str .= '                 </ul>
                                    </div>';
            return $str;
        }

        public function setAssignmentsNew($config) {
            global $meta_marker, $apm_settings;

            $post_id = $_GET['post'];
            $assign_rule_apply_child = '0';
            if ($config['parent_id'] !== 0) {
                $assign_rule_apply_child = get_post_meta($config['parent_id'], 'assign_rule_apply_child' . $meta_marker, true);
            }
            $display_value = "";
            if ($config['value'] !== '') {
                $u = get_userdata($config['value']);
                if (count($u) > 0) {
                    $display_value = $u->display_name;
                }
            }
            $select_post_type = "";
            if (isset($config['field_config']['post_type'])) {
                $select_post_type = $config['field_config']['post_type'];
            }//
            if (isset($config['placeholder'])) {
                $placeholder = ' placeholder="' . $config['placeholder'] . '" ';
            }
            // $str='<input '.$placeholder.' class="'.$config['fwidthCls'].' '.$config['extraCls'].' autocomplete_field" post_type="'.$select_post_type.'" fieldname="'.$config['field'].'" type="text" id="autocomplete_'.$config['field'].'" name="'.$config['field'].'_displayvalue" value="'.$display_value.'" />';
            //  $str.='<input class="autocomplete_field_value"  type="hidden" id="autocomplete_data_'.$config['field'].'" name="'.$config['field'].$meta_marker.'" value="'.$config['value'].'" />';

            $strtpl = file_get_contents(APPLICATION_MAKER_PATH . '/views/fields/autoCompleteAssigneeNew_tpl.html');

            $strtpladduser = file_get_contents(APPLICATION_MAKER_PATH . '/views/fields/autoCompleteAssigneeNewAddUser_tpl.html');
            $strtplinfo = file_get_contents(APPLICATION_MAKER_PATH . '/views/fields/autoCompleteAssigneeNewInfo_tpl.html');
            if (current_user_can('administrator')) {
                $strtpl = str_replace('{{btns}}', $strtpladduser, $strtpl);
            } else {
                $strtpl = str_replace('{{btns}}', $strtplinfo, $strtpl);
            }


            $strtpl = str_replace('{{label}}', $config['label'], $strtpl);
            $strtpl = str_replace('{{field}}', $config['field'], $strtpl);
            $strtpl = str_replace('{{value}}', $config['value'], $strtpl);
            $strtpl = str_replace('{{display_value}}', $display_value, $strtpl);
            $strtpl = str_replace('{{placeholder}}', $placeholder, $strtpl);
            $strtpl = str_replace('{{meta_marker}}', $meta_marker, $strtpl);
            return $strtpl;
        }

        public function setAssignments($config) {
            global $meta_marker, $apm_settings;
            $post_id = $_GET['post'];
            $assign_rule_apply_child = '0';
            if ($config['parent_id'] !== 0) {
                $assign_rule_apply_child = get_post_meta($config['parent_id'], 'assign_rule_apply_child' . $meta_marker, true);
            }

            $width = 0; //intval(100/$config['total_width']*$config['widthli'])-2;
            echo '<li style="width:' . $width . '%; float:left">';
            echo $this->setLabel($config);

            //echo $config['info'].": ";
            if ($config['label_width_perc'] > 0) {
                echo '<div style="width:' . (100 - intval($config['label_width_perc']) - 2) . '%; float:right;">';
            }
            $users_list = wp_dropdown_users(array(
                'name' => $config['field'] . $meta_marker,
                'selected' => $config['value'],
                'show' => 'display_name',
                    //'echo' => '0'
                    ));
            //	$users_list=str_replace('value', 'valueddd', $users_list);
            //echo "88888".$users_list;
            $this->getDescription($config);
            if ($config['label_width_perc'] > 0) {
                echo '</div> ';
            }
            //echo " <img src='".$apm_settings['paths']['img']."/plus_16.png'' onclick='apm_add_assignee();' style='cursor:pointer;' />";
            echo '</li>';
        }

        public function getNotifRuleValueNew($fieldvalue, $selectvalue, $force_if_new) {
            global $meta_marker, $apm_settings;
            return "getNotifRuleValueNew";
        }

        public function getNotifRuleValue($fieldvalue, $selectvalue, $force_if_new) {
            $select = '';
            if ($force_if_new and !isset($_GET['action'])) {
                $select = ' selected="selected" ';
            } else {
                foreach ($fieldvalue as $key => $value) {
                    if ($value == $selectvalue) {
                        $select = ' selected="selected" ';
                    }
                }
            }
            return $select;
        }

        public function setNotificationsRulesNew($config) {
            global $meta_marker, $apm_settings;
            $post_id = $_GET['post'];
            return "setNotificationsRulesNew";
        }

        public function setNotificationsRules($config) {
            global $meta_marker, $apm_settings;
            $post_id = $_GET['post'];

            //Check if we need to aplly the same setting than the parent object... 1 if yes.
            $assign_rule_apply_child = '0';
            if ($config['parent_id'] !== 0) {
                $assign_rule_apply_child = get_post_meta($config['parent_id'], 'assign_rule_apply_child' . $meta_marker, true);
            }


            echo $config['before_field'] . $this->setLabel($config) . "<br/>";
            echo "<div class='apm_intro_note'>Notify also the following users for each post update:</div>";
            //echo var_dump($config['value']);
            if (isset($config['field_config']['notify_assignee']) and $config['field_config']['notify_assignee'] == true) {
                echo '<span>Assignee:</span>';
                echo '<select  name="' . $config['field'] . $meta_marker . '[]" >';
                $select = $this->getNotifRuleValue($config['value'], 'not_ass_no');
                echo '<option value="not_ass_no" ' . $select . '>No</option>';
                $select = $this->getNotifRuleValue($config['value'], 'not_ass_yes', true);
                echo '<option value="not_ass_yes" ' . $select . '>Yes</option>';
                echo "</select> - ";
                // <input type="checkbox" name="'.$config['field'].$meta_marker.'[]"  id="'.$config['field'].'" /><br/>';//'. checked(!empty($config['value']), true, false) . '
            }
            if (isset($config['field_config']['notify_full_team']) and $config['field_config']['notify_full_team'] == true) {
                echo '<span>Whole team:</span>';
                echo '<select  name="' . $config['field'] . $meta_marker . '[]" >';
                $select = $this->getNotifRuleValue($config['value'], 'not_team_no');
                echo '<option value="not_team_no" ' . $select . '>No</option>';
                $select = $this->getNotifRuleValue($config['value'], 'not_team_yes');
                echo '<option value="not_team_yes" ' . $select . '>Yes</option>';
                echo "</select> - ";
                // <input type="checkbox" name="'.$config['field'].$meta_marker.'[]"  id="'.$config['field'].'" /><br/>';//'. checked(!empty($config['value']), true, false) . '
            }
            if (isset($config['field_config']['notify_udpater']) and $config['field_config']['notify_udpater'] == true) {
                echo '<span>Updater:</span>';
                echo '<select  name="' . $config['field'] . $meta_marker . '[]" >';
                $select = $this->getNotifRuleValue($config['value'], 'not_updat_yes');
                echo '<option value="not_updat_no" ' . $select . '>No</option>';
                $select = $this->getNotifRuleValue($config['value'], 'not_updat_yes', true);
                echo '<option value="not_updat_yes" ' . $select . '>Yes</option>';
                echo "</select><br/>";
                // <input type="checkbox" name="'.$config['field'].$meta_marker.'[]"  id="'.$config['field'].'" /><br/>';//'. checked(!empty($config['value']), true, false) . '
            }

            echo "<div class='apm_intro_note'>Notify also the following users for each comment:</div>";
            if (isset($config['field_config']['comment_assignee']) and $config['field_config']['comment_assignee'] == true) {
                echo '<span>Assignee:</span>';
                echo '<select  name="' . $config['field'] . $meta_marker . '[]" >';
                $select = $this->getNotifRuleValue($config['value'], 'not_assi_com_no');
                echo '<option value="not_assi_com_no" ' . $select . '>No</option>';
                $select = $this->getNotifRuleValue($config['value'], 'not_assi_com_yes', true);
                echo '<option value="not_assi_com_yes" ' . $select . '>Yes</option>';
                echo "</select> -";
                // <input type="checkbox" name="'.$config['field'].$meta_marker.'[]"  id="'.$config['field'].'" /><br/>';//'. checked(!empty($config['value']), true, false) . '
            }

            if (isset($config['field_config']['comment_notify_full_team']) and $config['field_config']['comment_notify_full_team'] == true) {
                echo '<span>Whole team:</span>';
                echo '<select  name="' . $config['field'] . $meta_marker . '[]" >';
                $select = $this->getNotifRuleValue($config['value'], 'not_team_com_no');
                echo '<option value="not_team_com_no" ' . $select . '>No</option>';
                $select = $this->getNotifRuleValue($config['value'], 'not_team_com_yes');
                echo '<option value="not_team_com_yes" ' . $select . '>Yes</option>';
                echo "</select> - ";
                // <input type="checkbox" name="'.$config['field'].$meta_marker.'[]"  id="'.$config['field'].'" /><br/>';//'. checked(!empty($config['value']), true, false) . '
            }

            if (isset($config['field_config']['comment_notify_selected']) and $config['field_config']['comment_notify_selected'] == true) {
                echo '<span>All the users selected for Post notification</span>';
                echo '<select  name="' . $config['field'] . $meta_marker . '[]" >';
                $select = $this->getNotifRuleValue($config['value'], 'not_selec_no');
                echo '<option value="not_selec_no" ' . $select . '>No</option>';
                $select = $this->getNotifRuleValue($config['value'], 'not_selec_yes');
                echo '<option value="not_selec_yes" ' . $select . '>Yes</option>';
                echo "</select>";
                // <input type="checkbox" name="'.$config['field'].$meta_marker.'[]"  id="'.$config['field'].'" /><br/>';//'. checked(!empty($config['value']), true, false) . '
            }

            $this->getDescription($config);
            echo $config['after_field'];
        }

        public function setNotificationsNew($config) {
            global $meta_marker, $apm_settings;
            $post_id = $_GET['post'];
            return "setNotificationsNew";
        }

        public function setNotifications($config) {
            global $meta_marker, $apm_settings;
            $post_id = $_GET['post'];
            $assign_rule_apply_child = '0';
            if ($config['parent_id'] !== 0) {
                $assign_rule_apply_child = get_post_meta($config['parent_id'], 'assign_rule_apply_child' . $meta_marker, true);
            }
            echo $config['before_field'] . $this->setLabel($config) . "<br/>";
            /* if(isset( $config['field_config']['notify_assignee'] ) and $config['field_config']['notify_assignee']  == true ){


              } */
            $usersids = explode(',', $config['value']);
            $userslist = get_users(array(
                'include' => $usersids
                    ));
            echo '<div>';
            foreach ($userslist as $user) {

                echo "<span class='apm_user_listed'>" . $user->user_login . " <div><img src='" . $apm_settings['paths']['img'] . "/delete_16.png'' fieldname='" . $config['field'] . "' onclick='apm_remove_notif(this," . $user->ID . ");' style='cursor:pointer;' /></div></span> ";
            }
            echo '</div>';
            $this->getDescription($config);
            echo " <br/> Add more: ";

            wp_dropdown_users(array(
                'name' => $config['field'] . "show_users",
                'selected' => $config['value'],
                'show' => 'display_name',
                'exclude' => $config['value']
            ));
            echo " <img src='" . $apm_settings['paths']['img'] . "/plus_16.png'' onclick='apm_add_notif(this);' style='cursor:pointer;' fieldname='" . $config['field'] . "' />";
            echo '<input type="hidden" id="' . $config['field'] . '_apm" name="' . $config['field'] . $meta_marker . '" value="' . $config['value'] . '" ' . $config['width'] . ' />';
            echo $config['after_field'];
        }

        public function setCommentsNew($config) {
            global $post, $current_user;
            if (!isset($_REQUEST['action']) or $_REQUEST['action'] !== 'edit') {
                $str = '<div class="alert  alert-error">You can only comment for an item already created.</div>';
                return $str;
            }

            $comments = get_comments('post_id=' . $post->ID);
            $config['field_config']['rows'] = 7;
            $config['value'] = '';
            $str = '<a name="commenttop_' . $config['field'] . '" ></a>
                       <div class="apm_rte_container apm_rte_container_hide" id="rte_container_' . $config['field'] . '" >' . $this->setRTEditorNew($config) . '</div>';
            $config['field_config']['rows'] = 1;
            $str.='<div class="apm_simplecomment_container" id="simplecomment_container_' . $config['field'] . '" >' . $this->setTextAreaNew($config) . '</div>';
            $str.='<div class="apm_comments_block" data-fieldname="' . $config['field'] . '" data-post_id="' . $post->ID . '" >';
            $str.='<div class="apm_comments_btn">
                                <div class="alert alert-success  hidden apm_com_success">Comment posted successfully - <a href="#commentdown_' . $config['field'] . '">Scroll to the comment</a><button type="button" class="close" data-dismiss="alert">&times;</button></div>
                                <div class="alert alert-info hidden apm_com_submit">Submitting, please wait...</div>
                                <div class="alert  alert-error hidden apm_com_fail">Problem on posting, please retry... <button type="button" class="close" data-dismiss="alert">&times;</button></div>
                                <div class="apm_comments_descr">All the users added in the Team in "Team & Notifications" will receive a notification email, if "Notify on Comment" is set.</div>
                                <span style="display:none;" title="Click to post the comment" class="hasTooltip btn btn-mini  apm_do_post_comments" rel="tooltip" ><i class="icon-comment"></i> Post comment</span>
                                <span style="display:none;" title="Click to come back to the quick comment form" class="hasTooltip btn btn-mini  apm_back_quick_comments" rel="tooltip" ><i class="icon-comment"></i> Back quick comment</span>
                                <span title="Click to post a quick comment" class="hasTooltip btn btn-mini  apm_quick_comments" rel="tooltip" ><i class="icon-comment"></i> Post quick comment</span>
                                <span title="Click to open the advanced comment rich text editor" class="hasTooltip btn btn-mini  apm_show_comments" rel="tooltip" ><i class="icon-comment"></i> Open Advanced comment</span>
                            </div>';
            $str.= '<div ><span class="nbcomments">' . count($comments) . '</span> Comment(s) - <a href="#commentdown_' . $config['field'] . '">Scroll to the latest comment</a></div>';
            $str.= '<div class="apm_comments_list">';
            $strview = "";
            foreach ($comments as $comment) :
                //get_avatar( $comment->comment_author_email, 48 );
                $view = '<div class="well well-small apm_comment_item" data-comment_id="[[id]]" ><a name="comment_[[id]]" ></a>
                                            <div>By: <strong>[[username]]</strong>
                                                [[btns]]
                                                </div>
                                                <div class="apm_comment_content">[[comment]]</div>
                                                [[comm_edit_in]]
                                            <span style="padding: 8px 0 0 0" class="help-block">Posted on [[date]] at [[time]]</span>
                                        </div>';
                $viewbtns = ' <span class="apm_commedit_btns_cont"><button rel="tooltip" title="Edit this comment" class="hasTooltip  btn btn-mini btn-info  apm_edit_comment"><i class="icon-edit icon-white"></i> Edit</button>
                                                <button rel="tooltip" title="Delete this comment" class="hasTooltip  btn btn-mini btn-warning  apm_delet_comment"><i class="icon-ban-circle icon-white"></i> Delete</button></span>';
                $viewedit = '<div class="comm_edit_in">
                                             <textarea rows="3" style="width:100%!important;" class="comm_edit_in_frm"></textarea>
                                             <button rel="tooltip" title="Save comment" class="hasTooltip  btn btn-mini   apm_update_comment"><i class="icon-comment"></i> Update</button>
                                             <button rel="tooltip" title="Cancel and close the form" class="hasTooltip  btn btn-mini   apm_updatecancel_comment"><i class="icon-cancel"></i> Cancel</button>
                                             <span class="com_edit_alert hidden">Submitting....</span>
                                             </div>';
                $nview = str_replace('[[username]]', $comment->comment_author, $view);
                //var_dump($comment);
                if ($current_user->ID == $comment->user_id) {
                    $nview = str_replace('[[btns]]', $viewbtns, $nview);
                    $nview = str_replace('[[comm_edit_in]]', $viewedit, $nview);
                } else {
                    $nview = str_replace('[[btns]]', '', $nview);
                    $nview = str_replace('[[comm_edit_in]]', '', $nview);
                }
                // $nview=str_replace('[[comment_author_email]]', $comment->comment_author_email, $nview);
                $da = $comment->comment_date;
                $day = substr($da, 0, 10);
                $time = substr($da, 12, 8);
                $curday = date('Y-M-d');
                if ($curday == $day) {
                    $day = 'Today';
                }
                $nview = str_replace('[[date]]', $day, $nview);

                $GLOBALS['comment'] = $comment;
                $lang_str = '';
                if (!empty($comment->comment_author_email)) {
                    $lang_str = ' - <strong>Language:</strong> ' . $comment->comment_author_email;
                }
                $nview = str_replace('[[lang_zone]]', $lang_str, $nview);

                $nview = str_replace('[[id]]', get_comment_id(), $nview);
                $nview = str_replace('[[time]]', $time, $nview); //
                // $nview=str_replace('[[fieldname]]', '"'.$config['field'].'"', $nview);//
                $nview = str_replace('[[comment]]', get_comment_text(), $nview);
                $strview = $nview . $strview;
            endforeach;
            /* */
            $str.= $strview;
            $str.= '      </div><a name="commentdown_' . $config['field'] . '" ></a>
                           <div><a href="#commenttop_' . $config['field'] . '">Scroll back to the comment form</a></div>
                        </div>
                       ';
            return $str;
        }

        public function setComments($config) {
            global $meta_marker, $apm_settings;
            if (isset($_GET['post']) and !empty($_GET['post'])) {
                $post_id = $_GET['post'];
            } else {
                $post_id = 'false';
            }
            echo $config['before_field'] . $this->setLabel($config) . "<br/>";
            if (isset($_GET['action'])) {
                $comments = get_comments('post_id=' . $post_id);
                echo "Nb of comment(s): <span id='" . $config['field'] . "_comment_nb'>" . count($comments) . '</span><br/>';
            } else {
                echo 'No comments yet, this is a new post...<br/>';
            }
            $cls = '';
            if (count($comments) == 0) {
                //$cls=" apm_hidden";
            }
            require_once APPLICATION_MAKER_VIEWS_PATH . 'apm-comments-tpl.php';

            echo "<div class='apm_hidden' id='" . $config['field'] . "_comment_tpl' >" . $view . "</div>";
            echo "<div class='apm_hidden' id='" . $config['field'] . "_comment_loader' ><img src='" . $apm_settings['paths']['css'] . "/images/ui-anim_basic_16x16.gif''/> Submitting, please wait...</div>";
            echo "<div class='apm_add_comments'>Add comment:<br/>";
            echo '
				<script type="text/javascript">
					jQuery(document).ready(function() {

					tinyMCE.init({
					//        mode : "exact",
					        theme : "advanced",
					        skin:"wp_theme",
					       // , plugins : "emotions,spellchecker,advhr,insertdatetime,preview",

					     // Theme options - button# indicated the row# only
					        theme_advanced_buttons1 : "bold,italic,underline,|,fontsizeselect,formatselect",
					        theme_advanced_buttons2 : "bullist,numlist,outdent,indent,|,link,unlink,anchor,image",
					        theme_advanced_buttons3 : "",
					        theme_advanced_toolbar_location : "top",
					        theme_advanced_toolbar_align : "left",
					        theme_advanced_statusbar_location : "bottom",
					        theme_advanced_resizing : true
					});

					jQuery("#' . $config['field'] . $meta_marker . '_comment").addClass("apm-editor");
					if ( typeof( tinyMCE ) == "object" && typeof( tinyMCE.execCommand ) == "function" ) {
						tinyMCE.execCommand("mceAddControl", false, "' . $config['field'] . $meta_marker . '_comment");
					}

					});
					fgl_add_to_comments_list("' . $config['field'] . $meta_marker . '_comment","' . $config['field'] . '",' . $post_id . ');
				</script>
				';
            //fgl_submitComment(\''.$config['field'].$meta_marker.'_comment\',\''.$config['field'].'\',\''.$post_id.'\');"
            echo "<textarea name='" . $config['field'] . $meta_marker . "_comment' id='" . $config['field'] . $meta_marker . "_comment'  style='width:100%; height:300px;' ></textarea>";

            if (isset($_GET['action'])) {
                echo '<input type="button" id="' . $config['field'] . '_commentbtn" name="' . $config['field'] . $meta_marker . '_comment" value="Submit new comment" onclick="fgl_submitComment(\'' . $config['field'] . $meta_marker . '_comment\',\'' . $config['field'] . '\',\'' . $post_id . '\');" />';
            } else {
                echo "This comment will be submitted when you'll save the post";
            }
            //ADD a lang selection
            if (isset($config['field_config']['use_lang']) and $config['field_config']['use_lang'] == true) {
                echo '</br><label>Please select the language</label> <select  name="' . $config['field'] . '_lang" id="' . $config['field'] . '_lang" >';
                $langs = explode(',', $config['field_config']['langs_values']);
                foreach ($langs as $key => $lang) {
                    echo '<option value="' . $lang . '" >' . $lang . '</option>';
                }
                echo "</select> ";
            }
            echo "</div>";

            echo "<div class='apm_comments_zone" . $cls . "' id='" . $config['field'] . "_comments_list' >";
            $strview = '';

            if (isset($_GET['action'])) {
                foreach ($comments as $comment) :
                    //get_avatar( $comment->comment_author_email, 48 );
                    $nview = str_replace('[[username]]', $comment->comment_author, $view);
                    // $nview=str_replace('[[comment_author_email]]', $comment->comment_author_email, $nview);
                    $da = $comment->comment_date;
                    $day = substr($da, 0, 10);
                    $time = substr($da, 12, 8);
                    $curday = date('Y-M-d');
                    if ($curday == $day) {
                        $day = 'Today';
                    }
                    $nview = str_replace('[[date]]', $day, $nview);

                    $GLOBALS['comment'] = $comment;
                    $lang_str = '';
                    if (!empty($comment->comment_author_email)) {
                        $lang_str = ' - <strong>Language:</strong> ' . $comment->comment_author_email;
                    }
                    $nview = str_replace('[[lang_zone]]', $lang_str, $nview);

                    $nview = str_replace('[[id]]', get_comment_id(), $nview);
                    $nview = str_replace('[[time]]', $time, $nview); //
                    $nview = str_replace('[[fieldname]]', '"' . $config['field'] . '"', $nview); //
                    $nview = str_replace('[[comment]]', get_comment_text(), $nview);
                    $strview = $nview . $strview;
                endforeach;
                echo $strview;
            }
            echo "</div>";
            $this->getDescription($config);
            echo $config['after_field'];
        }

        public function setAutocompleteMultiSelect($config) {
            global $post, $meta_marker, $wpdb;
            $select_post_type = false;
            $display_value = '';

            if (isset($config['field_config']['post_type'])) {
                $select_post_type = $config['field_config']['post_type'];
            }

            if (isset($_GET['apm_do'])) {
                if ($_GET['apm_do'] == 'set_select' and $_GET['parent_post_type'] == $select_post_type) {
                    $config['value'] = $_GET['parent_id'];
                }
                if ($_GET['apm_do'] == 'set_select' and $_GET['second_parent_post_type'] == $select_post_type) {
                    $config['value'] = $_GET['second_parent_id'];
                }
            }

            if ($config['value'] !== '') {
                $p = get_post($config['value']);
                if (count($p) > 0) {
                    $display_value = $p->post_title;
                }
            }
            echo "<div  class='ui-helper-clearfix apm_autocomplete_hold'>" . $this->setLabel($config);


            /* 	if($config['label_width_perc']>0){
              echo '<div style="width:'.(100-intval($config['label_width_perc'])-2).'%; float:right;"><input class="autocomplete_field" post_type="'.$select_post_type.'" fieldname="'.$config['field'].'" type="text" id="autocomplete_'.$config['field'].'" name="'.$config['field'].'_displayvalue" value="'.$display_value.'"  style="width:100%" /><input class="autocomplete_field_value"  type="hidden" id="autocomplete_data_'.$config['field'].'" name="'.$config['field'].$meta_marker.'" value="'.$config['value'].'" /></div><br class="clear" />';
              } else {
              echo '<input class="autocomplete_field" post_type="'.$select_post_type.'" fieldname="'.$config['field'].'" type="text" id="autocomplete_'.$config['field'].'" name="'.$config['field'].'_displayvalue" value="'.$display_value.'" /><input class="autocomplete_field_value"  type="hidden" id="autocomplete_data_'.$config['field'].'" name="'.$config['field'].$meta_marker.'" value="'.$config['value'].'" />';
              } */
            if ($config['label_width_perc'] > 0) {
                echo '<div style="width:' . (100 - intval($config['label_width_perc']) - 2) . '%; float:right;"><input class="autocomplete_field" post_type="' . $select_post_type . '" fieldname="' . $config['field'] . '" type="text" id="autocomplete_' . $config['field'] . '" name="' . $config['field'] . '_displayvalue" value=""  style="width:100%" /><input class="autocomplete_field_value"  type="hidden" id="autocomplete_data_' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '_hidden" value="" /></div><br class="clear" />';
            } else {
                echo '<input class="autocomplete_field" style="width:400px; "  post_type="' . $select_post_type . '" fieldname="' . $config['field'] . '" type="text" id="autocomplete_' . $config['field'] . '" name="' . $config['field'] . '_displayvalue" value="" /><input class="autocomplete_field_value"  type="hidden" id="autocomplete_data_' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '_hidden" value="" />';
            }

            //ADD BUTTON
            $del_image = WP_PLUGIN_URL . '/' . WP_PLUGIN_FOLDER . '/img/block_16.png';

            //'description' => 'AutoSuggest field: Start type the 2 first characters to get the Suggestions',
            $this->getDescription($config, '<br clear="all" />AutoSuggest field: Start type the 2 first characters to get the Suggestions', '', false);
            echo "<p><span class='add_multi_select_autosuggest_list' ><img src='" . $this->add_image . "' /> Add this item in the list</span></p>";


            echo '<input class="autocomplete_field_real_value"  type="hidden" id="autocomplete_real_data_' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '" value="' . $config['value'] . '" />';

            echo "<p>List of related items:</p>
					<ul class='multi_select_autosuggest_list'>";
            if ($config['value'] !== '') {
                $query = "SELECT *
						FROM $wpdb->posts
						WHERE   $wpdb->posts.ID IN (" . $config['value'] . ")
						AND ($wpdb->posts.post_status = 'publish' )
						ORDER BY post_title";
                $posts_list = $wpdb->get_results($query);
                foreach ($posts_list as $post_item) {
                    echo '<li><a href="post.php?action=edit&post=' . $post_item->ID . '" title="Click to open the related item edit form"/>' . $post_item->post_title . ' </a><img src="' . $del_image . '" title="Click to remove this item from the list" item_id="' . $post_item->ID . '"/></li>';
                }
            }
            echo '</ul>';
            echo "</div>";
        }

        public function setAutocomplete($config) {
            global $post, $meta_marker;
            $select_post_type = false;
            $display_value = '';

            if (isset($config['field_config']['post_type'])) {
                $select_post_type = $config['field_config']['post_type'];
            }

            if (isset($_GET['apm_do'])) {
                if ($_GET['apm_do'] == 'set_select' and $_GET['parent_post_type'] == $select_post_type) {
                    $config['value'] = $_GET['parent_id'];
                }
                if ($_GET['apm_do'] == 'set_select' and $_GET['second_parent_post_type'] == $select_post_type) {
                    $config['value'] = $_GET['second_parent_id'];
                }
            }

            if ($config['value'] !== '') {
                $p = get_post($config['value']);
                if (count($p) > 0) {
                    $display_value = $p->post_title;
                }
            }
            echo "<div  class='ui-helper-clearfix apm_autocomplete_hold'>" . $this->setLabel($config);


            if ($config['label_width_perc'] > 0) {
                echo '<div style="width:' . (100 - intval($config['label_width_perc']) - 2) . '%; float:right;"><input class="autocomplete_field" post_type="' . $select_post_type . '" fieldname="' . $config['field'] . '" type="text" id="autocomplete_' . $config['field'] . '" name="' . $config['field'] . '_displayvalue" value="' . $display_value . '"  style="width:100%" /><input class="autocomplete_field_value"  type="hidden" id="autocomplete_data_' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '" value="' . $config['value'] . '" /></div><br class="clear" />';
            } else {
                echo '<input class="autocomplete_field" post_type="' . $select_post_type . '" fieldname="' . $config['field'] . '" type="text" id="autocomplete_' . $config['field'] . '" name="' . $config['field'] . '_displayvalue" value="' . $display_value . '" /><input class="autocomplete_field_value"  type="hidden" id="autocomplete_data_' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '" value="' . $config['value'] . '" />';
            }


            //'description' => 'AutoSuggest field: Start type the 2 first characters to get the Suggestions',
            $this->getDescription($config, 'AutoSuggest field: Start type the 2 first characters to get the Suggestions', '', false);

            if ($config['value'] !== '') {
                $new_window_image = WP_PLUGIN_URL . '/' . WP_PLUGIN_FOLDER . '/img/new_window_icon.gif';
                if (isset($_GET['action']) and $_GET['action'] == 'edit') {//
                    $jumpBtn = '<br/>' . sprintf('<a href="%s" class="addBtn" target="_blank" title="Open the selected parent article in a new window">%s</a>', esc_url(add_query_arg(array('action' => 'edit', 'post' => $config['value']), 'post.php')), "<img src='" . $new_window_image . "' alt='' />"
                    );
                    $jumpBtn.=" " . sprintf('<a href="%s" class="addBtn" title="Open the selected parent article in the same window">%s</a>', esc_url(add_query_arg(array('action' => 'edit', 'post' => $config['value']), 'post.php')), _('Open the selected parent article')
                    );
                    echo $jumpBtn;
                }
            }
            echo "</div>";
        }

        public function setAutoSetTitleNew($config) {
            global $meta_marker, $apm_settings;
            $schema = '';
            //var_dump($config);
            if (isset($config['field_config']['schema'])) {
                $schema = $config['field_config']['schema'];
                $itemarray1 = explode('{', $schema);
                $str = $schema;
                $fields_arr = array();
                foreach ($itemarray1 as $item) {
                    $itemarray2 = explode('}', $item);
                    $s = $itemarray2[0];
                    if ($s !== '') {
                        array_push($fields_arr, array(
                            'field' => $s,
                            'field_type' => $this->default_fields[$s]['field_type']
                        ));
                        /* if(!isset($this->default_fields[$s]['field_type']) or ($this->default_fields[$s]['field_type'])=='numberfield' or ($this->default_fields[$s]['field_type'])=='textfield' or ($this->default_fields[$s]['field_type'])=='autoincrementfield'  or ($this->default_fields[$s]['field_type'])=='currencyfield' or ($this->default_fields[$s]['field_type'])=='datefield'){

                          $post_id=$_GET['post'];
                          $val=get_post_meta($post_id, $child_second_parent[0].'_value', true);
                          } */
                    }
                }
                $final_array = array(
                    'fields' => $fields_arr,
                    'schema' => $schema
                );
                echo '<script>';
                echo "var setAutoSetTitleFields=" . json_encode($final_array) . "; ";
                if (isset($_GET['action']) and $_GET['action'] == 'edit') {

                } else {
                    echo 'fgl_setAutoSetTitle(setAutoSetTitleFields);';
                }
                echo '</script>';
                if (isset($config['field_config']['hide_btn']) and $config['field_config']['hide_btn'] == true) {

                } else {
                    echo '<input type="button" id="' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '" value="' . $config['label'] . '" ' . $config['width'] . ' onclick="fgl_setAutoSetTitle(setAutoSetTitleFields);" />';
                }
                if (isset($config['field_config']['hide_title']) and $config['field_config']['hide_title'] == true) {
                    echo '<style type="text/css" >#titlediv { display:none; }</style>';
                }
                if (isset($config['field_config']['auto_on_save']) and $config['field_config']['auto_on_save'] == true) {
                    echo '<script>fgl_setAutoSetSaveTitle(setAutoSetTitleFields);</script>';
                }
            }
        }

        public function setAutoSetTitle($config) {
            global $meta_marker;
            $schema = '';
            if (isset($config['field_config']['schema'])) {
                $schema = $config['field_config']['schema'];
                $itemarray1 = explode('{', $schema);
                $str = $schema;
                $fields_arr = array();
                foreach ($itemarray1 as $item) {
                    $itemarray2 = explode('}', $item);
                    $s = $itemarray2[0];
                    if ($s !== '') {
                        array_push($fields_arr, array(
                            'field' => $s,
                            'field_type' => $this->default_fields[$s]['field_type']
                        ));
                        /* if(!isset($this->default_fields[$s]['field_type']) or ($this->default_fields[$s]['field_type'])=='numberfield' or ($this->default_fields[$s]['field_type'])=='textfield' or ($this->default_fields[$s]['field_type'])=='autoincrementfield'  or ($this->default_fields[$s]['field_type'])=='currencyfield' or ($this->default_fields[$s]['field_type'])=='datefield'){

                          $post_id=$_GET['post'];
                          $val=get_post_meta($post_id, $child_second_parent[0].'_value', true);
                          } */
                    }
                }
                $final_array = array(
                    'fields' => $fields_arr,
                    'schema' => $schema
                );
                echo '<script>';
                echo "var setAutoSetTitleFields=" . json_encode($final_array) . "; ";
                if (isset($_GET['action']) and $_GET['action'] == 'edit') {

                } else {
                    echo 'fgl_setAutoSetTitle(setAutoSetTitleFields);';
                }
                echo '</script>';
                if (isset($config['field_config']['hide_btn']) and $config['field_config']['hide_btn'] == true) {

                } else {
                    echo '<input type="button" id="' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '" value="' . $config['label'] . '" ' . $config['width'] . ' onclick="fgl_setAutoSetTitle(setAutoSetTitleFields);" />';
                }
                if (isset($config['field_config']['hide_title']) and $config['field_config']['hide_title'] == true) {
                    echo '<style type="text/css" >#titlediv { display:none; }</style>';
                }
                if (isset($config['field_config']['auto_on_save']) and $config['field_config']['auto_on_save'] == true) {
                    echo '<script>fgl_setAutoSetSaveTitle(setAutoSetTitleFields);</script>';
                }
            }
        }

        public function setAutoIncrementField($config) {
            global $post, $meta_marker;

            if (isset($_GET['action']) and $_GET['action'] == 'edit') {

            } else {
                $post_type = get_post_type($post);
                $val = $this->get_highest_value($post_type, $config['field']);
                $val = intval($val) + 1;
                if ($val < 10) {
                    $config['value'] = '00' . $val;
                } else if ($val < 100) {
                    $config['value'] = '0' . $val;
                } else {
                    $config['value'] = $val;
                }
            }
            if ($config['label_width_perc'] > 0) {
                echo '<div style="width:' . (100 - intval($config['label_width_perc']) - 2) . '%; float:right;">';
                echo '<input type="text" id="' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '" value="' . $config['value'] . '" style="width:100%" />';
                echo '</div>';
            } else {
                echo '<input type="text" id="' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '" value="' . $config['value'] . '" ' . $config['width'] . '  />';
            }
        }

        public function setConvertButton($config) {
            global $post, $meta_marker;
            //var_dump($config);

            $post_type = get_post_type($post);
            $appname = '';
            foreach ($this->applications as $key => $application) {
                if (isset($application['modules'][$post_type])) {
                    $appname = $key;
                }
            }
            $width = intval(100 / $config['total_width'] * $config['widthli']) - 2;
            $post_id = $_GET['post'];
            echo '<li style="width:' . $width . '%; float:left">';
            echo '<input class="convert_btn" type="button" id="' . $config['field'] . '_convertbtn" name="' . $config['field'] . $meta_marker . '_convert" value="' . $config['label'] . '"  onclick="apm_convert(this,\'' . $config['field'] . '\',' . $post_id . ',\'' . $appname . '\',\'' . $post_type . '\');"  />';
            $this->getDescription($config);
            echo '</li>';
        }

        public function setActionButtonNew($config) {
            $post_type = get_post_type($post);
            $appname = '';
            foreach ($this->applications as $key => $application) {
                if (isset($application['modules'][$post_type])) {
                    $appname = $key;
                }
            }
            $button_margin = '  ';
            if (isset($config['button_margin'])) {
                $button_margin = $config['button_margin'];
            }
            $btn_size = ' btn-mini ';
            if (isset($config['field_config']['btn_size'])) {
                $btn_size = $config['field_config']['btn_size'];
            }
            $post_id = $_REQUEST['post'];
            $str = '<span  class="action_button hasTooltip btn ' . $button_margin . ' ' . $btn_size . ' ' . $config['field_config']['btn_class'] . ' " rel="tooltip" title="' . $config['label'] . '" ';
            $str.= ' data-fields=\'' . json_encode($config['field_config']['transform_fields']) . '\' ';
            $str.= ' data-post_type="' . $post_type . '" ';
            $str.= ' data-post_id="' . $post_id . '" ';
            $str.= ' data-fieldname="' . $config['field'] . '" ';
            $str.= ' data-appname="' . $appname . '" ';
            $str.= ' > ';
            if (isset($config['button_icon']) and $config['button_icon'] !== false and $config['button_icon'] !== '') {
                $str.= '<i class="' . $config['button_icon'] . '  icon-white"></i> ';
            }
            $str.= $config['button_label'];
            $str.= '</span>';
            if (isset($config['field_config']['clearfix'])) {
                $str.= '<br class="clearfix" /><br class="clearfix" />';
            }

            $post_id = $_GET['post'];
            if (isset($config['field_config']['limit_to_edit']) and $config['field_config']['limit_to_edit'] == true and $post_id == '') {
                $str = "";
            }
            if (isset($config['field_config']['hide_on_fields_values'])) {
                $test = false;
                foreach ($config['field_config']['hide_on_fields_values'] as $key => $field_restrict) {
                    $v = get_post_meta($post_id, $field_restrict[0] . $meta_marker, true);
                    $fielparent = $this->default_fields[$field_restrict[0]];
                    $cat_id = (int) $v;
                    $catname = $fielparent['field_config']['category'];
                    $category = get_term_by('id', $cat_id, $catname);
                    // var_dump($category);
                    $name = $category->name;
                    //echo " field " . $field_restrict[0] . "/ val " . $v . " - categ " .$catname ;
                    $fva = explode(',', $field_restrict[1]);
                    foreach ($fva as $fv) {
                        if ($name == $fv) {
                            $test = true;
                        }
                    }
                }
                if ($test) {
                    $str = "";
                }
            }
            return $str;
        }

        public function setActionButton($config) {
            global $post, $meta_marker;
            //var_dump($config);

            $post_type = get_post_type($post);
            $appname = '';
            foreach ($this->applications as $key => $application) {
                if (isset($application['modules'][$post_type])) {
                    $appname = $key;
                }
            }
            //$width=intval(100/$config['total_width']*$config['widthli'])-2;
            $post_id = $_GET['post'];
            $test = true;
            if (isset($config['field_config']['limit_to_edit']) and $config['field_config']['limit_to_edit'] == true and $post_id == '') {
                $test = false;
            }
            if (isset($config['field_config']['hide_on_fields_values'])) {
                foreach ($config['field_config']['hide_on_fields_values'] as $key => $field_restrict) {
                    $v = get_post_meta($post_id, $field_restrict[0] . $meta_marker, true);
                    $fva = explode(',', $field_restrict[1]);
                    foreach ($fva as $fv) {
                        if (intval($v) == intval($fv)) {
                            $test = false;
                        }
                    }
                }
            }
            $str = "";
            if ($test) {
                $str.= '<input class="' . $config['field_config']['btn_class'] . '" fields=\'' . json_encode($config['field_config']['transform_fields']) . '\' type="button" id="' . $config['field'] . '_actionbtn" name="' . $config['field'] . $meta_marker . '_actionbtn" value="' . $config['label'] . '"  onclick="apm_actionbtn(this,\'' . $config['field'] . '\',' . $post_id . ',\'' . $appname . '\',\'' . $post_type . '\');"  />';
            }
            return $str;
        }

        public function setCreatedBy($config) {
            global $meta_marker;
            $width = intval(100 / $config['total_width'] * $config['widthli']) - 2;
            echo '<li style="width:' . $width . '%; float:left">';
            echo $this->setLabel($config);
            $post_id = $_GET['post'];
            $post = get_post($post_id);
            $user = get_users(array(
                'include' => $post->post_author
                    ));
            echo $user[0]->display_name;
            $this->getDescription($config);
            echo '</li>';
        }

        public function setCreatedDate($config) {
            global $meta_marker;
            $width = intval(100 / $config['total_width'] * $config['widthli']) - 2;
            echo '<li style="width:' . $width . '%; float:left">';
            echo $this->setLabel($config);
            $post_id = $_GET['post'];
            $post = get_post($post_id);
            echo $post->post_date;
            $this->getDescription($config);
            echo '</li>';
        }

        public function setModifiedDate($config) {
            global $meta_marker;
            $width = intval(100 / $config['total_width'] * $config['widthli']) - 2;
            echo '<li style="width:' . $width . '%; float:left">';
            echo $this->setLabel($config);
            $post_id = $_GET['post'];
            $post = get_post($post_id);
            echo $post->post_modified;
            $this->getDescription($config);
            echo '</li>';
        }

        //setHiddenField
        public function setHiddenField($config) {
            global $meta_marker;
            echo '<input ' . $req . ' type="hidden" id="' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '" value="' . $config['value'] . '"   />';
        }

        /* public function setPhoto($config) {
          global $meta_marker;
          $width=intval(100/$config['total_width']*$config['widthli'])-2;
          echo '<li style="width:'.$width.'%; float:left">';
          echo $this->setLabel($config);
          $w=100;
          if($config['help']!==''){
          $w=90;
          }
          if($config['label_width_perc']>0){
          echo '<div style="width:'.(100-intval($config['label_width_perc'])-2).'%; float:right;">';
          $this->getDescription($config);
          echo '</div>';
          } else {
          echo '<input '.$req.' type="text" id="'.$config['field'].'" name="'.$config['field'].$meta_marker.'" value="'.$config['value'].'"   />';
          $this->getDescription($config);
          }
          echo "</li>";
          } */

        public function setPhoto($config) {
            global $meta_marker;
            $width = intval(100 / $config['total_width'] * $config['widthli']) - 2;
            echo '<li style="width:' . $width . '%; float:left">';
            echo $this->setLabel($config) . "<br/>";
            $w = 100;
            if ($config['help'] !== '') {
                $w = 90;
            }
            if ($config['img_width'] !== false and $config['img_height'] !== false) {
                echo ' <img src="' . $config['value'] . '" style="width:' . $config['img_width'] . 'px; height:' . $config['img_height'] . 'px" /><br/>';
            } else if ($config['img_width'] !== false) {
                echo ' <img src="' . $config['value'] . '" style="width:' . $config['img_width'] . 'px;" /><br/>';
            } else if ($config['img_height'] !== false) {
                echo ' <img src="' . $config['value'] . '" style="height:' . $config['img_height'] . 'px" /><br/>';
            } else {
                echo ' <img src="' . $config['value'] . '" /><br/>';
            }
            //<input '.$req.' type="text" id="'.$config['field'].'" name="'.$config['field'].$meta_marker.'" value="'.$config['value'].'"   style="width:'.$w.'%" />
            echo '<span>' . $config['value'] . '</span><br/>';
            if ($config['show_input']) {
                echo '<br/><input  type="text" id="' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '" value="' . $config['value'] . '"   style="width:' . $w . '%" />';
            }
            $this->getDescription($config);
            echo '</li>';
        }

        public function setTextField($config, $req, $widfield) {
            global $meta_marker;
            $this->setInputField($config, $req, $widfield, '');
        }

        public function setUsersList($config) {
            global $meta_marker;

            $width = intval(100 / $config['total_width'] * $config['widthli']) - 2;
            echo '<li style="width:' . $width . '%; float:left">';
            echo $this->setLabel($config);
            if ($config['label_width_perc'] > 0) {
                echo '<div style="width:' . (100 - intval($config['label_width_perc']) - 2) . '%; float:right; ">';
                wp_dropdown_users(array(
                    'name' => $config['field'] . $meta_marker,
                    'selected' => $config['value'],
                    'show' => 'display_name'
                ));
                echo '</div>';
            } else {
                wp_dropdown_users(array(
                    'name' => $config['field'] . $meta_marker,
                    'selected' => $config['value'],
                    'show' => 'display_name'
                ));
            }
            $this->getDescription($config);
            echo '</li>';
        }

        public function setDisplayField($config) {
            global $meta_marker;
            $width = intval(100 / $config['total_width'] * $config['widthli']) - 2;
            echo '<li style="width:' . $width . '%; float:left">' . $this->setLabel($config);
            if (empty($config['value'])) {
                echo 'Empty field';
            } else {
                echo $config['value'];
            }
            echo '<input ' . $req . ' type="hidden" id="' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '" value="' . $config['value'] . '"   />';
            $this->getDescription($config);
            echo '</li>';
        }

        public function setNumberField($config) {
            global $meta_marker;
            $width = intval(100 / $config['total_width'] * $config['widthli']) - 2;
            echo '<li style="width:' . $width . '%; float:left">' . $this->setLabel($config);

            $maxlength = $this->getMaxLength($config);

            $req = '';
            if ($config['required']) {
                $req = " class='apm_is_required' ";
            }
            if ($config['restrict_format'] !== false) {
                switch ($config['restrict_format']) {
                    case 'email':
                        $req = " class='apm_is_email' ";
                        break;
                    case 'numbers':
                        $req = " class='apm_is_numbers' ";
                        break;
                    case 'phone':
                        $req = " class='apm_is_phone' ";
                        break;
                }
            }
            if ($config['label_width_perc'] > 0) {
                echo '<div style="width:' . (100 - intval($config['label_width_perc']) - 2) . '%; float:right;"><input ' . $req . ' type="text" id="' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '" value="' . $config['value'] . '" ' . $maxlength . '  style="width:100%" /></div>';
            } else {
                echo '<input ' . $req . ' type="text" id="' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '" value="' . $config['value'] . '" ' . $maxlength . ' width="100%" />';
            }





            $this->getDescription($config);
            echo '</li>';
        }

        public function setBasicField($config, $fieldtype = 'textfield') {
            $width = intval(100 / $config['total_width'] * $config['widthli']) - 2;
            echo '<li style="width:' . $width . '%; float:left">';
            echo $this->setLabel($config);
            $w = 100;
            if ($config['help'] !== '') {
                $w = 90;
            }
            $req = '';
            $widfield = ($config['widthli'] * 100) - $config['label_width'];
            if ($config['required']) {
                $req = " class='apm_is_required' ";
            }
            if ($config['restrict_format'] !== false) {
                switch ($config['restrict_format']) {
                    case 'email':
                        $req = " class='apm_is_email' ";
                        break;
                    case 'numbers':
                        $req = " class='apm_is_numbers' ";
                        break;
                    case 'phone':
                        $req = " class='apm_is_phone' ";
                        break;
                }
            }
            switch ($fieldtype) {
                case 'textfield':
                    $this->setTextField($config, $req, $widfield);
                    break;
                case 'currencyfield':
                    $this->setCurrencyField($config, $req, $widfield);
                    break;
                case 'autoincrementfield':
                    $this->setAutoIncrementField($config, $req, $widfield);
                    break;
            }
            $this->getDescription($config);
            echo '</li>';
        }

        public function setInputField($config, $req, $widfield, $extra = '') {
            if ($config['label_width_perc'] > 0) {
                //var_dump($config['value']);
                if (is_array($config['value'])) {
                    $config['value'] = implode(' - ', $config['value']);
                }
                if (is_object($config['value'])) {
                    $config['value'] = print_r($config['value']);
                }
                //var_dump($config['value']);
                echo '<div style="width:' . (100 - intval($config['label_width_perc']) - 2) . '%; float:right;">';
                echo '<input ' . $req . ' type="text" id="' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '" value="' . $config['value'] . '"   style="width:' . $w . '%"  ' . $extra . '/>';
                echo '</div>';
            } else {
                echo '<input ' . $req . ' style="width:' . $widfield . 'px" type="text" id="' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '" value="' . $config['value'] . '"    ' . $extra . '/>';
            }
        }

        public function setCurrencyField($config, $req, $widfield) {
            global $meta_marker;

            $maxlength = $this->getMaxLength($config);

            $this->setInputField($config, $req, $widfield, $maxlength);
            /* $width=intval(100/$config['total_width']*$config['widthli'])-2;
              echo '<li style="width:'.$width.'%; float:left">';
              echo $this->setLabel($config);
              $maxlength =$this->getMaxLength($config);
              $req=''; */

            /* if($config['label_width_perc']>0){
              echo '<div style="width:'.(100-intval($config['label_width_perc'])-2).'%; float:right;">';
              echo '<input '.$req.' type="text" id="'.$config['field'].'" name="'.$config['field'].$meta_marker.'" value="'.$config['value'].'"   '.$maxlength.'  style="width:100%"  />';
              echo '</div>';
              } else {
              echo '<input '.$req.'  style="width:'.$widfield.'px" type="text" id="'.$config['field'].'" name="'.$config['field'].$meta_marker.'" value="'.$config['value'].'"   '.$maxlength.'  />';
              } */
            //$this->getDescription($config);
            //echo '</li>';
        }

        public function setDatePicker($config) {
            $calendar_image = site_url() . '/wp-admin/images/date-button.gif';






            global $meta_marker;
            $width = intval(100 / $config['total_width'] * $config['widthli']) - 2;
            echo '<li style="width:' . $width . '%; float:left">' . $this->setLabel($config);

            $maxlength = $this->getMaxLength($config);

            if ($config['label_width_perc'] > 0) {
                echo '<div style="width:' . (100 - intval($config['label_width_perc']) - 2) . '%; float:right;"><input type="text" id="' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '" value="' . $config['value'] . '" ' . $maxlength . '  style="width:80%" /></div>';
            } else {
                echo '<input type="text" id="' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '" value="' . $config['value'] . '" ' . $maxlength . ' width="80%" />';
            }





            $this->getDescription($config);
            echo '</li>';
            echo "<script>jQuery(function() {
						jQuery( '#" . $config['field'] . "').datepicker({ buttonImage: '" . $calendar_image . "' , buttonText: '" . __('Choose') . "',showOn: 'both'  });
					});
				</script>";
        }

        public function getAddBtn($config) {
            global $wpdb, $meta_marker, $apm_settings;
            $select_post_type = $config['field_config']['post_type'];
            $post_id = $_GET['post'];
            $meta_key = $config['field_config']['child_key'];
            $new_window_image = WP_PLUGIN_URL . '/' . WP_PLUGIN_FOLDER . '/img/new_window_icon.gif';
            $current_post = get_post($post_id);
            $type_label = $config['label'];
            $current_post_type = $current_post->post_type;
            if ($config['field_config']['child_second_parent'] !== '') {
                $child_second_parent = $config['field_config']['child_second_parent'];
                $second_parent_field = $this->default_fields[$child_second_parent[0]];
                $second_parent_post_type = $second_parent_field['field_config']['post_type'];
                $second_parent_id = get_post_meta($post_id, $child_second_parent[0] . $meta_marker, true);
                $addBtn = sprintf('<a href="%s" class="addBtn" target="_blank"  title="Add a new ' . $type_label . ' in a new window">%s</a>', esc_url(add_query_arg(array('post_type' => $select_post_type, 'parent_id' => $post_id, 'second_parent_id' => $second_parent_id, 'second_parent_post_type' => $second_parent_post_type, 'parent_title' => $current_post->post_title, 'parent_post_type' => $current_post_type, 'apm_do' => 'set_select'), 'post-new.php')), "<img src='" . $new_window_image . "' alt='' />"
                );
                $addBtn.=" " . sprintf('<a href="%s" class="addBtn" title="Add a new ' . $type_label . ' in the same window">%s</a>', esc_url(add_query_arg(array('post_type' => $select_post_type, 'parent_id' => $post_id, 'second_parent_id' => $second_parent_id, 'second_parent_post_type' => $second_parent_post_type, 'parent_title' => $current_post->post_title, 'parent_post_type' => $current_post_type, 'apm_do' => 'set_select'), 'post-new.php')), "<img src='" . $this->add_image . "' alt='Add a new " . $type_label . "' />"
                );
            } else {
                $addBtn = sprintf('<a href="%s" class="addBtn" target="_blank"  title="Add a new ' . $type_label . ' in a new window">%s</a>', esc_url(add_query_arg(array('post_type' => $select_post_type, 'parent_id' => $post_id, 'parent_title' => $current_post->post_title, 'parent_post_type' => $current_post_type, 'apm_do' => 'set_select'), 'post-new.php')), "<img src='" . $new_window_image . "' alt='' />"
                );
                $addBtn.=" " . sprintf('<a href="%s" class="addBtn" title="Add a new ' . $type_label . ' in the same window">%s</a>', esc_url(add_query_arg(array('post_type' => $select_post_type, 'parent_id' => $post_id, 'parent_title' => $current_post->post_title, 'parent_post_type' => $current_post_type, 'apm_do' => 'set_select'), 'post-new.php')), "Add a new " . $type_label
                );
            }
            return $addBtn;
        }

        public function setAddChildNew($config) {
            global $wpdb, $meta_marker, $apm_settings;
            $str = '';
            if (isset($config['field_config']['post_type'])) {
                $select_post_type = $config['field_config']['post_type'];
                $post_id = $_GET['post'];
                $meta_key = $config['field_config']['child_key'];

                foreach ($this->applications as $key => $application) {
                    if (isset($application['modules'][$select_post_type])) {
                        $application = $application['modules'][$select_post_type];
                        $icon = "";
                        if (isset($application['icon'])) {
                            $icon = "<img src='" . $apm_settings['paths']['img'] . "/" . $application['icon'] . "' style='width: 14px;float: left; margin:2px 5px 0 0'/> ";
                        }
                        $str.='<p class="apm_separator"><span style="width:160px; display:block; float:left;">' . $icon . ' ' . $config['label'] . '</span> ';
                        $str.=$this->addTwoButtonsAdd($config);
                        // <a class="btn btn-mini hasTooltip" rel="tooltip" title="Add in this window" ><i class="icon-plus"  ></i></a>
                        // <a class="btn btn-mini hasTooltip" rel="tooltip" title="Add in new window" ><i class="icon-share-alt"></i></a></p>';
                    }
                }
            }
            return $str;
        }

        public function setAddChild($config) {
            global $wpdb, $meta_marker, $apm_settings;

            if (isset($config['field_config']['post_type'])) {
                $select_post_type = $config['field_config']['post_type'];
                $post_id = $_GET['post'];
                $meta_key = $config['field_config']['child_key'];
                $addBtn = $this->getAddBtn($config);

                $width = intval(100 / $config['total_width'] * $config['widthli']) - 2;
                echo '<li style="width:' . $width . '%; float:left">';

                foreach ($this->applications as $key => $application) {
                    if (isset($application['modules'][$select_post_type])) {
                        $application = $application['modules'][$select_post_type];
                        if (isset($application['icon'])) {
                            $icon = "<img src='" . $apm_settings['paths']['img'] . "/" . $application['icon'] . "' style='width: 20px;float: left;'/> ";
                            echo $icon;
                        }
                    }
                }

                //echo var_dump($config);
                echo $this->setLabel($config);
                echo " <span> $addBtn</span>";
                $this->getDescription($config);
                echo "</li>";
            }
        }

        public function setChildPhotoGrid($config) {
            global $wpdb, $meta_marker, $apm_settings;

            if (isset($config['field_config']['post_type'])) {
                $select_post_type = $config['field_config']['post_type'];
                $post_id = $_GET['post'];
                $meta_key = $config['field_config']['child_key'];
                $posts = $this->setChildGrid($select_post_type, $post_id, $meta_key);
                echo '<div><div class="apm_table_top"><span class="apm_table_title">' . $config['label'] . '</span></div>';
                echo '<div>';
                foreach ($posts as $p) {
                    $meta = get_post_meta($p->ID, $config['field_config']['child_meta'] . $meta_marker, true);
                    if ($meta !== "" and !empty($meta) and $meta !== false) {
                        echo "<div class='apm_photo_grid'><a href=''>";
                        if (isset($config['field_config']['img_width'])) {
                            $img = "<img src='" . $meta . "' style='width:" . $config['field_config']['img_width'] . "px;'>";
                        } else {
                            $img = "<img src='" . $meta . "' >";
                        }
                        $out = sprintf('<a href="%s" target="_blank" title="' . $p->post_title . ' > Open item in new window">%s</a>', esc_url(add_query_arg(array('post' => $p->ID, 'action' => 'edit'), 'post.php')), $img
                        );
                        echo $out . "</a></div>";
                    }
                    //echo $p->post_title."//".$meta;
                }
                echo "</div><br clear='all'/></div>";
            }
        }

        public function getTableHeaderNew($columns = false) {
            global $oThis;
            $str = '<thead><tr>';
            // var_dump($columns);
            if ($columns == false) {
                $str.= '<th >Title</th>
					<th>Status</th>
					<th class="jcf_date_col">Date</th>';
            } else {
                foreach ($columns as $column) {
                    $f = $oThis->default_fields[$column['field']];
                    $label = $f['label'];
                    //  var_dump($column);
                    $label = $oThis->get_currency($label);
                    //$label = str_replace("{{currency}}", $apm_settings['configs']['default_currency'], $label);

                    if ($column['field'] == "post_title") {
                        $label = 'Name';
                    }
                    if ($column['field'] == "post_status") {
                        $label = 'Status';
                    }
                    if ($column['field'] == "post_date") {
                        $label = 'Date';
                    }
                    $w = "";
                    if (isset($column['width'])) {
                        $w = ' width="' . $column['width'] . '%" ';
                    }
                    $str.= '<th ' . $w . ' >' . $label . '</th>';
                }
            }
            $str.= '</tr></thead>';
            return $str;
        }

        public function addTwoButtonsAdd($config) {
            global $wpdb, $meta_marker, $apm_settings;
            $str = "";
            $post_id = $_GET['post'];
            $select_post_type = $config['field_config']['post_type'];
            $current_post = get_post($post_id);
            $type_label = $config['label'];
            $current_post_type = $current_post->post_type;
            $href = "post-new.php?";
            if ($config['field_config']['child_second_parent'] !== '' and isset($config['field_config']['child_second_parent'])) {
                $child_second_parent = $config['field_config']['child_second_parent'];
                $second_parent_field = $this->default_fields[$child_second_parent[0]];
                $second_parent_post_type = $second_parent_field['field_config']['post_type'];
                $second_parent_id = get_post_meta($post_id, $child_second_parent[0] . $meta_marker, true);
                var_dump($second_parent_id);
                if (is_array($second_parent_id)) {
                    $second_parent_id = $second_parent_id[0];
                }
                $href.="post_type=" . $select_post_type . "&parent_id=" . $post_id . "&second_parent_id=" . $second_parent_id . "&second_parent_post_type=" . $second_parent_post_type . "&parent_title=" . $current_post->post_title . "&parent_post_type=" . $current_post_type . "&apm_do=set_select";
            } else {
                $href.="post_type=" . $select_post_type . "&parent_id=" . $post_id . "&parent_title=" . $current_post->post_title . "&parent_post_type=" . $current_post_type . "&apm_do=set_select";
            }


            $str.='<a href="' . $href . '" class="btn btn-info btn-mini"><i class="icon-plus icon-white hasTooltip" rel="tooltip" title="Add in this window"></i></a>
                                    <a  href="' . $href . '" class="btn btn-info btn-mini hasTooltip" target="_blank"   rel="tooltip" title="Add in new window"  ><i class="icon-share-alt icon-white" ></i></a>';

            return $str;
        }

        public function setChildGridNew($config) {
            global $wpdb, $meta_marker, $apm_settings;
            if (isset($config['field_config']['post_type'])) {
                $lbl = "";
                if ($config['label'] !== '') {
                    $lbl = $config['label'];
                }
                $select_post_type = $config['field_config']['post_type'];
                $post_id = $_GET['post'];
                $meta_key = $config['field_config']['child_key'];
                $posts = $this->get_posts_list_with_meta($select_post_type, $post_id, $meta_key);
                //var_dump($posts);
                $str = "<br clear='all'/><div class='apm_childtable'> ";

                $str.='    <div class="navbar">
                                        <div class="navbar-inner">
                                        <a class="apm_table_label" >' . $lbl . ' <span class="apm_count_posts">(' . count($posts) . ')<span></a>  ';
                $str.=$this->addTwoButtonsAdd($config);

                $str.='       <a  href="javascript:void(0);" class="btn  btn-mini apm_childtable_refresh " ><i class="icon-refresh "></i></a>';
                $extracls = "";
                if (count($posts) == 0) {
                    // $extracls = " hidden";
                }
                $str.='     <div class="space-left-20 apm_search_childtable_block ' . $extracls . '">
                                                <input type="text"  class="search-query" placeholder="Search on Title">
                                                <a   href="javascript:void(0);" class="hasTooltip  btn btn-small apm_childtable_dosearch"  rel="tooltip" title="Search on Title"><i class="icon-search"></i> </a>
                                                <a   href="javascript:void(0);" class="hasTooltip  btn btn-small apm_childtable_dosearch_clear" rel="tooltip" title="Clear search"><i class=" icon-remove-sign"></i> </a>
                                            </div>';

                $str.='  </div>
                                        </div>';


                $str.='   <table class="table table-striped table-bordered table-hover table-condensed"  width="100%">';

                $columns = array();
                if (isset($config['field_config']['columns'])) {
                    $columns = $config['field_config']['columns'];
                }
                // var_dump($config['field_config']);
                // echo '<br>';
                $str.= $this->getTableHeaderNew($columns);
                $nbcol = count($columns);
                if ($nbcol == 0) {
                    $nbcol = 1;
                }
                //$posts =	$this->get_posts_list_with_meta($select_post_type,$post_id,$meta_key);
                if (count($posts) > 0) {

                    $str.='<tbody class="apm_tablebody" data-field="' . $config['field'] . '" data-meta_key="' . $meta_key . '" data-post_type="' . $select_post_type . '" data-post_id="' . $post_id . '" data-nb_cols="' . $nbcol . '" ><tr><td colspan="' . $nbcol . '" >Loading, please wait... <i class="icon-refresh "></i><td></tr></tbody> ';
                } else {
                    $str.='<tbody class="apm_tablebody" data-field="' . $config['field'] . '" data-meta_key="' . $meta_key . '" data-post_type="' . $select_post_type . '" data-post_id="' . $post_id . '" data-nb_cols="' . $nbcol . '"  ><tr ><td colspan="' . $nbcol . '" >No child items<td></tr></tbody> ';
                }

                $str.= $this->getTableHeaderNew($columns);
                $str.='  </table>';
                $str.="</div>";
                return $str;
            }
        }

        public function setChildGrid($config) {
            global $wpdb, $meta_marker, $apm_settings;

            if (isset($config['field_config']['post_type'])) {
                $select_post_type = $config['field_config']['post_type'];
                $post_id = $_GET['post'];
                $meta_key = $config['field_config']['child_key'];
                $posts = $this->get_posts_list_with_meta($select_post_type, $post_id, $meta_key);

                echo '<div><div class="apm_table_top"><span class="apm_table_title">' . $config['label'] . '</span>';

                $addBtn = $this->getAddBtn($config);
                echo "<span>$addBtn</span></div>";

                $columns = array();
                if (isset($config['field_config']['columns'])) {
                    $columns = $config['field_config']['columns'];
                }
                echo $this->getTableHeader($columns);

                $count_records = 0;

                $totals = array();
                if (isset($config['field_config']['calculations'])) {
                    foreach ($config['field_config']['calculations'] as $key => $calculation) {
                        $totals [$key] = 0;
                    }
                }
                foreach ($posts as $p) {
                    echo "<tr >";
                    $out = sprintf('<a href="%s" target="_blank" title="Open item in new window">%s</a>', esc_url(add_query_arg(array('post' => $p->ID, 'action' => 'edit'), 'post.php')), "<img src='" . $new_window_image . "' alt='' />"
                    );
                    $out .= sprintf(' <a href="%s" title="Open item ">%s</a>', esc_url(add_query_arg(array('post' => $p->ID, 'action' => 'edit'), 'post.php')), esc_html($p->post_title)
                    );
                    //echo var_dump($p);
                    foreach ($columns as $column) {
                        $f = $this->default_fields[$column];

                        switch ($column) {
                            case "post_title":
                                echo '<td>' . $out . '</td>';
                                break;
                            case "post_date":
                                $h_time = mysql2date(__('Y/m/d'), $p->post_date);
                                echo '<td>' . $h_time . '</td>';
                                break;
                            case "post_status":
                                echo '<td>' . $p->post_status . '</td>';
                                break;
                            default:

                                $meta = get_post_meta($p->ID, $column . $meta_marker, true);
                                if ($meta !== '') {
                                    //userslist
                                    if (isset($f['field_type'])) {
                                        switch ($f['field_type']) {
                                            case "select":
                                                if (isset($f['field_config']['use_values']) and $f['field_config']['use_values'] == true) {
                                                    $meta = $f['options'][$meta];
                                                } else {
                                                    $subpost = get_post($meta);
                                                    $meta_t = $subpost->post_title;
                                                    $meta = sprintf('<a href="%s" class="addBtn" title="Open the selected record in the same window">%s</a>', esc_url(add_query_arg(array('action' => 'edit', 'post' => $subpost->ID), 'post.php')), $meta_t
                                                    );
                                                }
                                                break;
                                            case "autocomplete":
                                                $subpost = get_post($meta);
                                                $meta_t = $subpost->post_title;
                                                $meta = sprintf('<a href="%s" class="addBtn" title="Open the selected record in the same window">%s</a>', esc_url(add_query_arg(array('action' => 'edit', 'post' => $subpost->ID), 'post.php')), $meta_t
                                                );
                                                break;
                                            case "userslist":
                                                $user = get_users(array(
                                                    'include' => $meta
                                                        ));
                                                $meta = $user[0]->display_name;
                                                break;
                                            case "assignee":
                                                $user = get_users(array(
                                                    'include' => $meta
                                                        ));
                                                $meta = $user[0]->display_name;
                                                break;
                                        }
                                        //echo var_dump($subpost);
                                    }
                                }
                                echo '<td>' . $meta . '</td>';
                                break;
                        }
                    }

                    echo "</tr>";

                    /*
                      $out = sprintf( '<a href="%s" target="_blank" title="Open item in new window">%s</a>',
                      esc_url( add_query_arg( array( 'post' => $p->ID, 'action' => 'edit'), 'post.php' ) ),
                      "<img src='".$new_window_image."' alt='' />"
                      );
                      $out .= sprintf( ' <a href="%s" title="Open item ">%s</a>',
                      esc_url( add_query_arg( array( 'post' => $p->ID, 'action' => 'edit'), 'post.php' ) ),
                      esc_html( $p->post_title )
                      );
                      $h_time = mysql2date( __( 'Y/m/d' ), $p->post_date );
                      echo "<tr >
                      <td >".$out."</td>
                      <td >".$p->post_status."</td>
                      <td >".$h_time."</td>
                      </tr>";//$p->post_title; */


                    if (isset($config['field_config']['calculations'])) {
                        foreach ($config['field_config']['calculations'] as $key => $calculation) {

                            if (!isset($calculation['type'])) {
                                $type = 'sum';
                            } else {
                                $type = $calculation['type'];
                            }

                            switch ($type) {
                                case 'sum':
                                    $f = $this->default_fields[$key];
                                    $meta = get_post_meta($p->ID, $key . $meta_marker, true);
                                    $totals[$key]+=intval($meta);
                                    break;
                                case 'average':
                                    $f = $this->default_fields[$key];
                                    $meta = get_post_meta($p->ID, $key . $meta_marker, true);
                                    $totals[$key]+=intval($meta);
                                    break;
                            }
                        }
                    }
                }
                echo $this->getTableFooter($columns);


                if (isset($config['field_config']['calculations'])) {
                    foreach ($config['field_config']['calculations'] as $key => $calculation) {
                        $total = 0;
                        if (!isset($calculation['type'])) {
                            $type = 'sum';
                        } else {
                            $type = $calculation['type'];
                        }
                        $f = $this->default_fields[$key];
                        $total = $totals[$key];
                        switch ($type) {
                            case 'sum':
                                /* foreach($posts as $p){
                                  $meta=get_post_meta($p->ID, $key.$meta_marker,true);
                                  $total+=intval($meta);
                                  } */
                                break;
                            case 'average':
                                /* foreach($posts as $p){
                                  $meta=get_post_meta($p->ID, $key.$meta_marker,true);
                                  $total+=intval($meta);
                                  } */
                                if (count($posts) == 0) {
                                    $total = 0;
                                } else {
                                    $total = $total / count($posts);
                                }
                                break;
                        }

                        if (isset($calculation['ending'])) {
                            $ending = $calculation['ending'];
                        } else {
                            $ending = 'currency';
                        }
                        if ($ending == 'currency') {
                            $ending = $apm_settings['configs']['default_currency'];
                        }
                        update_post_meta($post_id, $key . '_' . $type . $meta_marker, $total);
                        echo "<div><label>" . $calculation['label'] . ':</label> ' . $total . ' ' . $ending . '</div>';
                    }
                }
                echo '</div>';
            } else {
                echo 'You need to specify a Post Type child';
            }
        }

        public function getTableHeader($columns = false) {
            global $apm_settings, $oThis;
            echo '<table class="wp-list-table widefat fixed" cellspacing="0">
				<thead><tr>';
            if ($columns == false) {
                echo '<th >Title</th>
					<th>Status</th>
					<th class="jcf_date_col">Date</th>';
            } else {
                foreach ($columns as $column) {
                    $f = $this->default_fields[$column];
                    $label = $f['label'];
                    $label = $oThis->get_currency($label);
                    // $label = str_replace("{{currency}}", $apm_settings['configs']['default_currency'], $label);

                    if ($column == "post_title") {
                        $label = 'Name';
                    }
                    echo '<th >' . $label . '</th>';
                }
            }
            echo '	</tr></thead>';
        }

        public function getTableFooter($columns = false) {
            global $apm_settings, $oThis;
            echo '<tfoot><tr>';
            if ($columns == false) {
                echo '<th >Title</th>
					<th>Status</th>
					<th class="jcf_date_col">Date</th>';
            } else {
                foreach ($columns as $column) {
                    $f = $this->default_fields[$column];
                    $label = $f['label'];
                    $label = $oThis->get_currency($label);
                    // $label = str_replace("{{currency}}", $apm_settings['configs']['default_currency'], $label);
                    if ($column == "post_title") {
                        $label = 'Name';
                    }
                    echo '<th >' . $label . '</th>';
                }
            }
            echo '	</tr></tfoot>';
            echo '	</table>';
        }

        public function setUploadField($config) {
            global $post, $meta_marker;

            $custom = get_post_custom($post->ID);
            $download_id = get_post_meta($post->ID, $config['field'] . $meta_marker, true);
            //  echo '-----------'.$download_id;
            $download_id_arr = false;
            if (strpos($download_id, '*****') > -1) {
                $download_id_arr = explode('*****', $download_id);
                $download_id = $download_id_arr[0];
            }
            echo '<div class="apm_multi_fields">';
            echo $config['before_field'];
            echo '<a name="' . $config['field'] . 'anchorfield"></a>';
            echo $this->setLabel($config);
            $del_image = WP_PLUGIN_URL . '/' . WP_PLUGIN_FOLDER . '/img/block_16.png';
            echo '<br/>';
            $upload_field_display = "";
            /* if(!empty($download_id) && $download_id != '0') {
              $f=wp_get_attachment_url($download_id);
              $fa=explode('/',$f);
              $f=$fa[count($fa)-1];
              $img=wp_get_attachment_url($download_id);
              $imglow=strtolower($img);
              echo '<div>';
              if(strpos($imglow,'.jpg')>-1 or strpos($imglow,'.png')>-1 or strpos($imglow,'.gif')>-1 ){
              echo "<span class='apm_imgfile' title='"._('Click to zoom')."'><img src='".$img."'  width='150'/></span><br/>";
              }
              echo '<a href="' . $img . '" target="_blank" id="file_'.$download_id.'" >
              '.__('View file').': '. $f.'</a> <span  class="fileRemove"  filetype="main" fileid="'.$download_id.'"  fieldname="'.$config['field'].'" title="Remove this file"> <img src="'.$del_image.'"/></span><input type="hidden" name="'.$config['field'].'_remove_file" value="false" /></div>';//
              $upload_field_display=' display:none ';
              } */
            $upload_field_display = $this->handleAddFileAttach($download_id, $config);

            echo '<div><input style="' . $upload_field_display . '" type="file" id="' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '" value="' . $config['value'] . '" ' . $config['width'] . ' /></div>';
            if ($config['allow_multi_files'] == true) {
                if ($download_id_arr !== false) {
                    for ($i = 1; $i < count($download_id_arr); $i++) {
                        $download_id = $download_id_arr[$i];

                        /* if(!empty($download_id) && $download_id != '0') {
                          $f=wp_get_attachment_url($download_id);
                          $fa=explode('/',$f);
                          $f=$fa[count($fa)-1];
                          $img=wp_get_attachment_url($download_id);
                          $imglow=strtolower($img);
                          echo '<div>';
                          if(strpos($imglow,'.jpg')>-1 or strpos($imglow,'.png')>-1 or strpos($imglow,'.gif')>-1 ){
                          echo "<span class='apm_imgfile' title='"._('Click to zoom')."'><img src='".$img."'  width='150'/></span><br/>";
                          }
                          echo '<a href="' . $img . '" target="_blank" id="file_'.$download_id.'" >
                          '.__('View file').': '. $f.'</a> <span  class="fileRemove" filetype="added" fileid="'.$download_id.'"  fieldname="'.$config['field'].'" title="Remove this file"> <img src="'.$del_image.'"/></span><input type="hidden" name="'.$config['field'].'_remove_file_'.$download_id.'" value="false" /></div>';//

                          } */
                        $this->handleAddFileAttach($download_id, $config, 'sub');
                    }
                }
                echo '<br clear="all"/>';
                echo '<div><span  class="apm_add_upload"  fieldname="' . $config['field'] . '" >Add more files  <img src="' . $this->add_image . '"/></span><input type="hidden" id="' . $config['field'] . '_add_file"  name="' . $config['field'] . '_add_file" value="false" /></div>';
            } else {
                echo '<br clear="all"/>';
            }

            $this->getDescription($config);
            echo $config['after_field'] . '</div>';
        }

        public function handleAddFileAttach($download_id, $config, $filetype = 'main') {
            $del_image = WP_PLUGIN_URL . '/' . WP_PLUGIN_FOLDER . '/img/block_16.png';
            $path_image = WP_PLUGIN_URL . '/' . WP_PLUGIN_FOLDER . '/img/';
            $new_window_image = WP_PLUGIN_URL . '/' . WP_PLUGIN_FOLDER . '/img/new_window_icon.gif';
            $add_text_image = WP_PLUGIN_URL . '/' . WP_PLUGIN_FOLDER . '/img/document_pencil_16.png';
            $help_descr_layer_image = WP_PLUGIN_URL . '/' . WP_PLUGIN_FOLDER . '/img/bugsqa_16.png';
            $thumb_name = "_thumb";
            $zoom_name = "_zoom";
            if (isset($config['img_config'])) {
                if (isset($config['img_config']['thumb'])) {
                    $thumb_name = "_" . $config['img_config']['thumb'];
                    if ($config['img_config']['thumb'] == "fullsize") {
                        $thumb_name = "";
                    }
                }
                if (isset($config['img_config']['zoom'])) {
                    $zoom_name = "_" . $config['img_config']['zoom'];
                    if ($config['img_config']['$zoom_name'] == "fullsize") {
                        $zoom_name = "";
                    }
                }
            }
            $upload_field_display = '';
            if (!empty($download_id) && $download_id != '0') {
                $f = wp_get_attachment_url($download_id);
                $fa = explode('/', $f);
                $f = $fa[count($fa) - 1];
                $filen = wp_get_attachment_url($download_id);

                if ($config['image_resize'] !== false) {
                    $filen_arr = explode('.', $filen);
                    $filen_arr_thumb = $filen_arr;
                    $filen_arr_zoom = $filen_arr;

                    $filen_arr_thumb[count($filen_arr) - 2] = $filen_arr_thumb[count($filen_arr) - 2] . $thumb_name;
                    $filen_thumb = implode('.', $filen_arr_thumb);

                    $filen_arr_zoom[count($filen_arr) - 2] = $filen_arr_zoom[count($filen_arr) - 2] . $zoom_name;
                    $filen_zoom = implode('.', $filen_arr_zoom);
                } else {
                    $filen_zoom = $filen;
                    $filen_thumb = $filen;
                }
                $filenlow = strtolower($filen);
                $filenupp = strtoupper($filen);
                $filenextarr = explode(".", $filen);
                $ext = $filenextarr[count($filenextarr) - 1];
                $extlow = strtolower($ext);
                echo '<p class="apm_file_block">';
                if (strpos($filenlow, '.jpg') > -1 or strpos($filenlow, '.png') > -1 or strpos($filenlow, '.gif') > -1) {
                    if ($config['image_resize'] == false) {
                        echo "<span class='apm_imgfile' title='" . _('Click to zoom') . "' ><img src='" . $filen_thumb . "'  width='195' file_zoom='" . $filen_zoom . "'/></span><br/>";
                    } else {
                        echo "<span class='apm_imgfile' title='" . _('Click to zoom') . "' ><img src='" . $filen_thumb . "'  file_zoom='" . $filen_zoom . "' has_resize='true'/></span><br/>";
                    }
                }
                echo '<a class="apm_limit_width_thumb_block" href="' . $filen . '" target="_blank" id="file_' . $download_id . '" title="' . $f . ": " . __('Click to open the file in a new window') . '">' . $f . '</a>';
                echo '<br/>' . "<img src='" . $path_image . "filetypes/16px/" . $extlow . ".png'  /> " . '<a href="' . $filen . '" target="_blank" id="file_' . $download_id . '" title="' . __('Click to open the file in a new window') . '"><img src="' . $new_window_image . '"  /></a> ';
                if ($filetype == 'main') {
                    $type = "main";
                } else if ($filetype == 'sub') {
                    $type = "added";
                }
                echo ' <span  class="fileRemove"  filetype="' . $type . '" fileid="' . $download_id . '"  fieldname="' . $config['field'] . '" title="Remove this file"> <img src="' . $del_image . '"/></span> ';

                if ($filetype == 'main') {
                    echo '<input type="hidden" name="' . $config['field'] . '_remove_file" value="false" />';
                } else if ($filetype == 'sub') {
                    echo '<input type="hidden" name="' . $config['field'] . '_remove_file_' . $download_id . '" value="false" />';
                }//

                $file_post = get_post($download_id);
                echo ' <span  class="apm_help_btn"  > <img src="' . $help_descr_layer_image . '"/></span><span class="apm_description_layer_help">File name:' . $f . '. <br/>Title: ' . $file_post->post_excerpt . '.<br/>Description: ' . $file_post->post_content . '</span>';
                echo ' <span  class="fileAddDescription_btn"  filetype="' . $type . '" descriptionid="' . $download_id . '"  fieldname="' . $config['field'] . '" title="Add title and description for this file"> <img src="' . $add_text_image . '"/></span>';
                //
                echo "<br/><span class='fileAddDescription'><span><label>" . _('Title') . ": <input type='text' name='" . $config['field'] . "_file_title_" . $download_id . "' id='" . $config['field'] . "_file_title_" . $download_id . "' ";
                echo ' value="' . $file_post->post_excerpt . '"/></span>';
                echo "<br/><span><label>Description</label><br/><textarea  id='" . $config['field'] . "_file_descr_" . $download_id . "' name='" . $config['field'] . "_file_descr_" . $download_id . "'>" . $file_post->post_content . "</textarea></span><span>";
                echo '</p>';
                $upload_field_display = ' display:none ';
            }
            return $upload_field_display;
        }

        public function setHTML($config) {
            echo $config['before_field'];
            echo $config['html'];

            $this->getDescription($config);
            echo $config['after_field'];
        }

        public function setTextArea($config) {
            global $meta_marker;
            // var_dump($config);
            $config['label_position'] = "top";
            $addstyle = "";
            $rows = "8";
            if (isset($config['field_config']['flotable']) and $config['field_config']['flotable'] == true) {
                $addstyle = "float:left;";
            }
            if (isset($config['field_config']['rows'])) {
                $rows = $config['field_config']['rows'];
            }
            echo '<div style="' . $config['width'] . ';' . $addstyle . '; padding: 3px 10px" >';
            echo $config['before_field'] . $this->setLabel($config);
            echo '<textarea id="' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '"  style="width:100%" rows="' . $rows . '">' . $config['value'] . ' </textarea>';
            echo '</div>';


            $this->getDescription($config);
            echo $config['after_field'];
        }

        public function setRTEditor($config) {
            global $meta_marker;
            $config['label_position'] = "top";
            echo $config['before_field'];
            echo $this->setLabel($config);
            echo "<div style='background:#ffffff'>";
            echo '
				<script type="text/javascript">
					jQuery(document).ready(function() {

					/*tinyMCE.init({
					//        mode : "exact",
					        theme : "advanced",
					        skin:"wp_theme",
					       // , plugins : "emotions,spellchecker,advhr,insertdatetime,preview",

					     // Theme options - button# indicated the row# only
					        theme_advanced_buttons1 : "bold,italic,underline,|,justifyleft,justifycenter,justifyright,fontselect,fontsizeselect,formatselect,|,cut,copy,paste,|,bullist,numlist",
					        theme_advanced_buttons2 : "outdent,indent,|,undo,redo,|,link,unlink,anchor,image,|,code,preview,|,forecolor,backcolor,|,insertdate,inserttime,|,spellchecker,advhr,,removeformat,|,charmap",
					        theme_advanced_buttons3 : "",
					        theme_advanced_toolbar_location : "top",
					        theme_advanced_toolbar_align : "left",
					        theme_advanced_statusbar_location : "bottom",
					        theme_advanced_resizing : true
					});*/

					jQuery("#' . $config['field'] . $meta_marker . '").addClass("apm-editor");
					if ( typeof( tinyMCE ) == "object" && typeof( tinyMCE.execCommand ) == "function" ) {
						tinyMCE.execCommand("mceAddControl", false, "' . $config['field'] . $meta_marker . '");
					}

					});
				</script>
				';
            echo '<textarea rows="30" id="' . $config['field'] . $meta_marker . '"  name="' . $config['field'] . $meta_marker . '" class="' . $config['field'] . $meta_marker . '"  ' . $config['width'] . ' >' . wpautop($config['value']) . ' </textarea>';


            $this->getDescription($config);
            echo "</div>";
            echo $config['after_field'];
        }

        public function setRadioNew($config) {
            global $meta_marker;
            $options = $config['options'];
            if (is_array($options)) {

            } else {
                $options = explode(';', $options);
            }
            $str = '';
            if (is_array($options)) {
                foreach ($options as $key => $value) {
                    $str.= "<span class='apm-radiocont'><input type='radio' class='apm-radio' name='" . $config['field'] . $meta_marker . "' value='" . $key . "'" . checked($config['value'], $key, false) . " /> <span class='apm-radiovalue'>$value</span></span> ";
                }
                //$this->getDescription($config);
                $str.= $config['after_field'];
                return $str;
            }
        }

        public function setRadio($config) {
            global $meta_marker;
            $options = $config['options'];
            if (is_array($options)) {

            } else {
                $options = explode(';', $options);
            }

            if (is_array($options)) {
                echo $config['before_field'] . $this->setLabel($config);
                foreach ($options as $key => $value) {
                    echo "<input type='radio' class='apm-radio' name='" . $config['field'] . $meta_marker . "' value='" . $key . "'" . checked($config['value'], $key, false) . " /> $value ";
                }



                $this->getDescription($config);
                echo $config['after_field'];
            }
        }

        public function setCheckbox($config) {
            global $meta_marker;
            $width = intval(100 / $config['total_width'] * $config['widthli']) - 2;
            echo '<li style="width:' . $width . '%; float:left">' . $this->setLabel($config);

            if ($config['label_width_perc'] > 0) {
                echo '<div style="width:' . (100 - intval($config['label_width_perc']) - 2) . '%; float:right;">';
            }

            echo '<input type="checkbox" name="' . $config['field'] . $meta_marker . '"  id="' . $config['field'] . '" ' . checked(!empty($config['value']), true, false) . ' />';
            if ($config['label_width_perc'] > 0) {
                echo '</div>';
            }


            $this->getDescription($config);
            echo '</li>';
        }

        public function setSelect($config) {
            global $meta_marker;

            $widthli = intval(100 / $config['total_width'] * $config['widthli']) - 2;


            $new_window_image = WP_PLUGIN_URL . '/' . WP_PLUGIN_FOLDER . '/img/new_window_icon.gif';
            $options = $config['options'];
            if (is_array($options)) {

            } else {
                $options = explode(';', $options);
            }

            if (is_array($options)) {

                $null_value = false;
                $use_none = false;
                $multiselect = false;
                $advanced_ui = false;
                $select_type = 'default';
                if (isset($config['field_config'])) {
                    if (isset($config['field_config']['use_values']) && $config['field_config']['use_values'] = true) {
                        $select_type = 'use_values';
                    }
                    if (isset($config['field_config']['autoid']) && $config['field_config']['autoid'] = true) {
                        $select_type = 'autoid';
                    }
                    if (isset($config['field_config']['post_type'])) {
                        $select_post_type = $config['field_config']['post_type'];
                        $select_type = 'use_values_posttype';
                        $posts_list = $this->get_posts_list_alone($select_post_type);
                        $options = array();
                        foreach ($posts_list as $pos) {
                            $options[$pos->ID] = $pos->post_title;
                        }
                    }
                    if (isset($config['field_config']['null_value']) && $config['field_config']['null_value'] = true) {
                        $null_value = true;
                    }
                    if (isset($config['field_config']['use_none']) && $config['field_config']['use_none'] = true) {
                        $use_none = true;
                    }
                    if (isset($config['field_config']['multiselect']) && $config['field_config']['multiselect'] = true) {
                        $multiselect = true;
                    }
                    if (isset($config['field_config']['advanced_ui']) && $config['field_config']['advanced_ui'] = true) {
                        $advanced_ui = true;
                    }
                }

                $selected = '';

                if (is_array($config['value'])) {
                    $value = $config['value'];
                } else {
                    $value = (array) $config['value'];
                }



                if ($multiselect) {
                    $config['width'] = ' style="width:700px;" ';
                    $config['label_position'] = "top";
                    $sel .= '<select id="' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '[]" ' . $config['width'] . ' multiple="multiple" class="multiselect" >';
                } else {
                    if ($config['label_width_perc'] > 0) {
                        $sel .= '<div style="width:' . (100 - intval($config['label_width_perc']) - 2) . '%; float:left; ">';
                        $sel .='<select id="' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '" style="width:80%; float:left" >';
                        //<input type="text" id="'.$config['field'].'" name="'.$config['field'].$meta_marker.'" value="'.$config['value'].'"   style="width:100%" />
                    } else {
                        $sel .='<select id="' . $config['field'] . '" name="' . $config['field'] . $meta_marker . '" >';
                    }
                }

                if ($null_value) {
                    $sel.= '<option value="-">' . _('Please select a') . ' ' . $config['label'] . '</option>';
                }

                if ($use_none) {
                    $sel.= '<option value="none">' . _('None') . ' </option>';
                }

                if (isset($_GET['apm_do'])) {
                    if ($_GET['apm_do'] == 'set_select' and $_GET['parent_post_type'] == $select_post_type) {
                        $value = array();
                        array_push($value, $_GET['parent_id']);
                    }
                    if ($_GET['apm_do'] == 'set_select' and $_GET['second_parent_post_type'] == $select_post_type) {
                        $value = array();
                        array_push($value, $_GET['second_parent_id']);
                        //echo "/////".$_GET['second_parent_post_type'].'/'.$select_post_type.'---'.$_GET['second_parent_id'];
                    }
                }
                $selectedValue = 0;
                foreach ($options as $k => $v) {
                    $v = stripslashes($v);
                    switch ($select_type) {
                        case 'default':
                            $selected = selected(in_array($v, $value), true, false);
                            $sel.= '<option value="' . $v . '"' . $selected . '>' . $v . '</option>';
                            if ($selected !== '') {
                                $selectedValue = $v;
                            }
                            break;
                        case 'use_values_posttype':
                            $selected = selected(in_array($k, $value), true, false);
                            $sel.= '<option value="' . $k . '"' . $selected . '>' . $v . '</option>';
                            if ($selected !== '') {
                                $selectedValue = $k;
                            }
                            break;
                        case 'use_values':
                            $selected = selected(in_array($k, $value), true, false);
                            $sel.= '<option value="' . $k . '"' . $selected . '>' . $v . '</option>';
                            if ($selected !== '') {
                                $selectedValue = $k;
                            }
                            break;
                        case 'autoid':
                            $selected = selected(in_array($k, $value), true, false);
                            $sel.= '<option value="' . $k . '"' . $selected . '>' . $v . '</option>';
                            if ($selected !== '') {
                                $selectedValue = $k;
                            }
                            break;
                    }
                }
                $sel .= '</select>';

                if ($config['label_width_perc'] > 0) {
                    //$sel .= '</div>';
                }

                echo '<li style="width:' . $widthli . '%; float:left; ">';
                echo $this->setLabel($config);


                echo $sel;

                $addBtn = sprintf(' <a href="%s" class="addBtn" target="_blank" title="Add a new value" style="margin:3px 0 0 4px; padding:5px 0 0 0; float:left;">%s</a>', esc_url(add_query_arg(array('post_type' => $select_post_type), 'post-new.php')), "<img src='" . $this->add_image . "' alt='Add' />"
                );

                if (isset($_GET['action']) and $_GET['action'] == 'edit' and $multiselect == false and $select_type == 'use_values_posttype') {//
                    if (isset($config['field_config']['hide_add_btn']) and $config['field_config']['hide_add_btn'] == true) {

                    } else {
                        echo $addBtn;
                    }
                    $jumpBtn = '<br clear="all"/>' . sprintf('<a href="%s" class="addBtn" target="_blank" title="Open the selected parent article in a new window">%s</a>', esc_url(add_query_arg(array('action' => 'edit', 'post' => $selectedValue), 'post.php')), "<img src='" . $new_window_image . "' alt='' />"
                    );
                    $jumpBtn.=" " . sprintf('<a href="%s" class="addBtn" title="Open the selected parent article in the same window">%s</a>', esc_url(add_query_arg(array('action' => 'edit', 'post' => $selectedValue), 'post.php')), _('Open the selected parent article')
                    );
                    //echo var_dump($value[0]);
                    if (isset($value[0]) and ($value[0] == 'none' or $value[0] == '' )) {

                    } else {
                        if (isset($config['field_config']['link_parent']) and $config['field_config']['link_parent'] == false) {

                        } else {
                            echo $jumpBtn;
                        }
                    }
                } else if (!isset($_GET['action']) and $multiselect == false and isset($config['field_config']['force_add_btn']) and $config['field_config']['force_add_btn'] == true) {
                    echo $addBtn;
                }


                echo "<br clear='all' />";
                $this->getDescription($config);
                echo '</li>';
            }
        }

        function get_posts_list_titles($posts_list, $make_link = false) {
            $str = '';
            foreach ($posts_list as $key => $value) {
                if ($make_link == true) {
                    $str.= sprintf('<a href="%s"  title="Open the article ' . $value->post_title . '">%s</a>', esc_url(add_query_arg(array('post' => $value->ID, 'action' => 'edit'), 'post.php')), $value->post_title) . ' | ';
                } else {
                    $str.=$value->post_title . ' | ';
                }
            }
            $str = substr($str, 0, strlen($str) - 2);
            if ($str == "") {
                $str = "None";
            }
            return $str;
        }

        function get_posts_list_alone($post_type) {
            global $post, $oThis, $wpdb, $current_user, $meta_marker;
            if (current_user_can('administrator')) {
                $query = "SELECT post_title, ID FROM $wpdb->posts " .
                        "WHERE post_type='" . $post_type . "' AND post_status='publish' ";
            } else {
                $uid = $current_user->ID;
                $query = "SELECT DISTINCT post_title, ID FROM $wpdb->posts " .
                        "  INNER JOIN $wpdb->postmeta  as metaprivacy  ON $wpdb->posts.ID = metaprivacy.post_id
                            INNER JOIN $wpdb->postmeta as metaassignee ON  $wpdb->posts.ID = metaassignee.post_id
                            WHERE post_type='" . $post_type . "' AND post_status='publish'
                    AND ((post_author = $uid AND metaprivacy.meta_value = '1'  AND metaprivacy.meta_key = '" . $meta_name . "set_privacy')
                  OR ( metaprivacy.meta_value = '0'  AND metaprivacy.meta_key = '" . $meta_name . "set_privacy')
                  OR ( metaprivacy.meta_value = '2'  AND metaprivacy.meta_key = '" . $meta_name . "set_privacy' AND post_author = $uid )
                  OR ( metaprivacy.meta_value = '2'  AND metaprivacy.meta_key = '" . $meta_name . "set_privacy' AND metaassignee.meta_key = '" . $meta_name . "assign_to' AND metaassignee.meta_value = '$uid'  ))
         ";
            }
            $posts_list = $wpdb->get_results($query);
            return $posts_list;
        }

        function get_highest_value($post_type, $field) {
            global $post, $wpdb, $meta_marker;
            $query = "SELECT MAX(meta_value) as max FROM $wpdb->posts
					LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id
				         WHERE post_type='" . $post_type . "' AND post_status='publish'
					AND $wpdb->postmeta.meta_key='" . $field . $meta_marker . "'
					";
            $posts_list = $wpdb->get_results($query);
            return $posts_list[0]->max;
        }

        function get_posts_list_with_meta($post_type, $post_id, $meta_key) {
            global $post, $wpdb, $meta_marker;
            $query = "SELECT *
					FROM $wpdb->posts
					LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id
					WHERE   $wpdb->posts.post_type = '$post_type'
					AND $wpdb->postmeta.meta_key='" . $meta_key . $meta_marker . "'
					AND $wpdb->postmeta.meta_value='$post_id'
					AND ($wpdb->posts.post_status = 'publish' OR $wpdb->posts.post_status = 'draft')
					ORDER BY post_title";
            $posts_list = $wpdb->get_results($query);
            // echo $query;
            return $posts_list;
        }

        public function setLabel($config) {
            global $apm_settings, $oThis;
            if ($config['label'] == '') {
                return;
            }

            switch ($config['label_position']) {
                case 'left':
                    $label_br = '';
                    break;
                case 'top':
                    $label_br = '<br clear="both" />';
                    break;
            }
            $req = '';
            if ($config['required']) {
                $req = '<span class="apm_required">*</span>';
            }
            $style = ' style="text-align:right;"  ';
            switch ($config['label_type']) {
                case 'regular':
                    $labl = '<label for="' . $config['field'] . '" style="width:' . $config['label_width'] . 'px; text-align:right;display:block; float:left">' . $config['label'] . $req . ': </label> ' . $label_br;
                    //return '<label for="'.$config['field'].'" style="width:'.$config['label_width'].'px; display:block; float:left" >'.$config['label'].'</label> '.$label_br;
                    break;
                case 'inline':
                    $style = ' style=""  ';
                    if (isset($config['label_width'])) {
                        $style = ' style="width:' . $config['label_width'] . 'px; display:block;float:left; text-align:right; padding: 0 5px" ';
                    }
                    if ($config['label_width_perc'] !== 0) {
                        $style = ' style="width:' . $config['label_width_perc'] . '%;  float:left;" ';
                    }
                    $labl = '<label for="' . $config['field'] . '" ' . $style . '>' . $config['label'] . $req . ': </label> ' . $label_br;
                    //return '<label for="'.$config['field'].'" style="width:'.$config['label_width'].'px; display:block; float:left" >'.$config['label'].'</label> '.$label_br;
                    break;
                default:
                    //return '<label for="'.$config['field'].'" style="width:'.$config['label_width'].'px; display:inline;" >'.$config['label'].'</label> '.$label_br;
                    $labl = '<label for="' . $config['field'] . '" ' . $style . ' >' . $config['label'] . $req . ': </label> ' . $label_br;
                    break;
            }

            $labl = $oThis->get_currency($labl);
            //$labl = str_replace('{{currency}}', $apm_settings['configs']['default_currency'], $labl);
            if ($config['hide_label'] == true) {
                $labl = '';
            }
            return $labl;
        }

    }

}
