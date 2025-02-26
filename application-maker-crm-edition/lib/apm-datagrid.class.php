<?php
if (!class_exists('Application_Maker_Core')) {
    require_once APPLICATION_MAKER_LIB_PATH . 'application-maker-core.class.php';
}
if (!class_exists('Application_Maker_Datagrid')) {

    class Application_Maker_Datagrid extends Application_Maker {

        // CONSTRUCTOR


        public function __construct() {
            $this->AM_Core = new Application_Maker_Core();
            //     parent::__construct(); default_pagin_nb
        }

        //CREATE A CUSTOM DROP DOWN COMBO FILTER FOR A CHECKBOX CUSTOM FIELD
        public function grid_show_custom_post_checkbox_dropdown($label, $object) {
            global $post, $wpdb;

            echo '<label> ' . $label . ':</label>
				<select name="key_' . $object . '" id="key_' . $object . '" class="postform">';
            $selecton = "";
            $select = "";
            $selectall = "  selected='selected' ";
            if (isset($_GET['key_' . $object])) {
                $v = $_GET['key_' . $object];
                switch ($v) {
                    case 'all':
                        $selectall = ' selected="selected" ';
                        break;
                    case '1':
                        $selecton = ' selected="selected" ';
                        break;
                    case '0':
                        $select = ' selected="selected" ';
                        break;
                }
            }
            echo '<option value="all" ' . $selectall . '>Show All</option>';
            echo '<option value="1" ' . $selecton . '>Yes</option>';
            echo '<option value="0" ' . $select . '>No</option>';
            echo '</select>
				';
        }

        //SHOW USERS DROPDOWN COMBO
        public function grid_show_userlist_dropdown($field, $object) {
            global $post, $wpdb;
            echo "<label> Assign to: </label>";
            $users_list = wp_dropdown_users(array(
                'show_option_all' => __('Show All'),
                'name' => 'key_' . $object
                , 'selected' => $_GET['key_' . $object],
                'echo' => '0'
                    ));
            $users_list = str_replace("'0'", "'all'", $users_list);

            echo $users_list;
            echo ' ';
        }

        public function grid_show_custom_post_dropdown($post_type, $post_type_label, $object = '') {
            global $post, $wpdb;
            if ($object == "") {
                $object = $post_type;
            }
            $posts_list = $this->AM_Core->get_posts_list_alone($post_type);
            echo '<label>' . $post_type_label . ':</label>
			<select name="key_' . $object . '" class="postform">
				<option value="all">Show All </option>';
            foreach ($posts_list as $post_item) {
                $select = '';
                if (isset($_GET['key_' . $post_type]) and $_GET['key_' . $post_type] == $post_item->ID) {
                    $select = ' selected="selected" ';
                }
                echo '<option value="' . $post_item->ID . '" ' . $select . '>' . $post_item->post_title . '</option>';
            }
            echo '</select>
			';
        }

        public function set_top_modules_list() {
            global $apm_settings, $app_name;
            //var_dump($this->Parent->applications);//->applications
            $appli_post_types = $this->config['app'] ['modules'];
            $appName = $this->config['app']['name'];
            $opappLabel = get_option($appName . '_app_name');
            $appLabel = $this->config['app']['singular_name'];
            $mod = $appli_post_types[$this->config['modulekey']];
            if ($opappLabel !== '' and $opappLabel !== false and !empty($opappLabel)) {
                $appLabel = $opappLabel;
            }
            echo ' <div class="navbar"><div class="navbar-inner"><ul class="nav apm_nav">';

            // var_dump($mod);
            $icon = '';
            if (isset($mod['icon']) and $mod['icon'] !== '' and $mod['icon'] !== false) {
                $icon = "<img src='" . $apm_settings['paths']['img'] . "/" . $mod['icon'] . "' /> ";
            }
            echo "<li><span class='topmodultitle'>" . $icon . " " . $appLabel . " - " . $mod['name'] . "";
            echo " <a data-placement='right'  class='btn btn-success btn-mini topbtnmoveup hasTooltip' title='Add a new " . $mod['singular_name'] . "' href='post-new.php?post_type=" . $this->config['modulekey'] . "' ><i class='icon-plus icon-white'></i></a>";
            echo "</span></li>";

            echo '<li class="divider-vertical"></li>';


            $navmain_str = '';
            $navother_str = '';

            foreach ($appli_post_types as $subkey => $post_type_obj) {
                $icon = '';
                if (isset($post_type_obj['icon'])) {
                    $icon = "<img src='" . $apm_settings['paths']['img'] . "/" . $post_type_obj['icon'] . "' /> ";
                }
                $acti = '';
                if ($subkey == $this->config['modulekey']) {
                    $acti = ' active ';
                }
                if (isset($post_type_obj['roles_authorized']) and $post_type_obj['roles_authorized'] != '') {
                    if (!$this->check_roles_authorized($post_type_obj['roles_authorized']))
                        continue;
                }
                if (isset($post_type_obj['is_secundary']) and $post_type_obj['is_secundary'] == true) {
                    $nav0bj = '
                        <li>
                            <a tabindex="-1" href="#" data-module="' . $subkey . '"  data-app="' . $appName . '" >
                            <span  class="hasTooltip apm_topnav_openmodgrid" title="See all ' . $post_type_obj['name'] . '">' . $icon . $post_type_obj['name'] . '
                                 <i class="icon-eye-open " ></i>
                             </span>
                                 |
                                <i class="icon-plus hasTooltip apm_topnav_addmodrec"  title="Add ' . $post_type_obj['singular_name'] . '"></i>
                                </a>
                            </li>';
                    $navother_str.=$nav0bj;
                } else {
                    $nav0bj = '
                    <li class="' . $acti . ' dropdown apmnavli ">
                        <a class="dropdown-toggle hasTooltip" data-placement="right"  title="See or Add ' . $post_type_obj['name'] . '" data-toggle="dropdown" href="admin.php?page=' . $this->config['appkey'] . '-' . $subkey . '">
                            ' . $icon . $post_type_obj['name'] . '<b class="caret"></b>
                         </a>
                         <ul class="dropdown-menu">
                            <li><a href="post-new.php?post_type=' . $subkey . '"><i class="icon-plus"></i> Add a ' . $post_type_obj['singular_name'] . '</a></li>
                            <li><a href="admin.php?page=' . $this->config['appkey'] . '-' . $subkey . '"><i class="icon-eye-open"></i> See all ' . $post_type_obj['name'] . '</a></li>
                        </ul>
                     </li>';
                    $navmain_str.=$nav0bj;
                }
            }
            echo $navmain_str;
            if ($navother_str !== '') {
                echo '<li class="divider-vertical"></li>
                <li class=" dropdown apmnavli">';
                echo '  <a class="dropdown-toggle hasTooltip" data-placement="right"  title="Other modules" data-toggle="dropdown" href="">
                     <i class="icon-list"></i>  OTHERS<b class="caret"></b> </a>
                     <ul class="dropdown-menu"  role="menu" >' . $navother_str . ' </ul> ';
                echo '</li>';
            }

            echo '<li class="divider-vertical"></li>'; //<a class="brand apm_navbarbrand" href="#">MODULES: </a>
            echo ' <li class=" dropdown apmnavli  hideIfWidthMax">
                        <a class="dropdown-toggle hasTooltip" data-placement="right"  title="SWITCH APP" data-toggle="dropdown" href="#">
                            APPS<b class="caret"></b>
                         </a>
                         <ul class="dropdown-menu">';

            foreach ($this->Parent->applications as $appkey => $app) {

                /* $setting_app_active = true;
                  $setting_app_active_op = get_option($app ['name'] . '_app_active');
                  if ($setting_app_active_op == 'off') {
                  $setting_app_active = false;
                  }
                  if (current_user_can('administrator')) {
                  $setting_app_active = true;
                  } */
                $setting_app_active = false;
                if (current_user_can('administrator')) {
                    $setting_app_active = true;
                }
                if (isset($app ['option_isactive_name'])) {
                    $option_isactive_name = $app ['option_isactive_name'];
                    $isactive = get_option($option_isactive_name);
                    // var_dump($isactive);
                    if ($isactive !== 'off') {
                        $setting_app_active = true; //
                    }
                }
                if (isset($app ['active']) and $app ['active'] == false) {
                    $setting_app_active = false;
                }

                if ($setting_app_active == true) {

                    $menuname = $app ['singular_name'];
                    $str = get_option($app ['name'] . '_app_menuname');
                    if ($str !== '' and $str !== false and !empty($str)) {
                        $menuname = $str;
                    }
                    echo '   <li  >
                                <a href="admin.php?page=' . $app ['name'] . '_home">' . $menuname . '</a> ';
                    /* echo '   <li  class="dropdown-submenu apm_submenu">
                      <a href="admin.php?page=' . $app ['name'] . '_home">' . $menuname . '</a> ';
                      echo '      <ul class="dropdown-menu apmsubdropmenu">
                      <li><a tabindex="-1" href="#">
                      <span  class="hasTooltip" title="See all XXX">APAPAPA <i class="icon-eye-open " ></i></span>
                      | <i class="icon-plus hasTooltip"  title="Add APAPA"></i>
                      </a>
                      </li>
                      </ul>'; */
                    echo '
                            </li>';
                }
            }
            echo '          </ul>
                     </li>';
            echo '</ul>
                </div>
                </div>';
        }

        public function set_sort_by() {
            global $apm_settings;
            if (!isset($this->config['module']['module_columns_sortby']) or !is_array($this->config['module']['module_columns_sortby']) or count($this->config['module']['module_columns_sortby']) == 0) {
                return;
            }
            $a = $this->config['module']['module_columns_sortby'];
            echo '<label>Sort by:</label><select name="sort_by"  class="postform apm_sortby">
				<option value="default">Default</option>';
            foreach ($a as $f) {
                $select = '';
                if (isset($_GET['apm_sortby']) and $_GET['apm_sortby'] == $f) {
                    $select = ' selected="selected" ';
                }
                if (isset($this->default_fields[$f]['column_label'])) {
                    $n = $this->default_fields[$f]['column_label'];
                } else {
                    $n = $this->default_fields[$f]['label'];
                }
                if ($f == "post_title") {
                    $n = "Title";
                }
                if ($f == "post_date") {
                    $n = "Date";
                }
                if ($f == "order") {
                    $n = "Order";
                }
                echo '<option value="' . $f . '" ' . $select . '>' . $n . '</option>';
            }
            echo '</select> ';
            //var_dump($this->default_fields);
        }

        public function set_advanced_search() {
            global $apm_settings;
            if (!isset($this->config['module']['module_columns_filters'])) {
                return;
            }
            $filters = $this->config['module']['module_columns_filters'];
            $taxo = get_object_taxonomies($this->config['modulekey']);
            $nb_of_filters = 0;
            foreach ($taxo as $tax_slug) {
                if (substr(($tax_slug), 0, 3) == 'cat') {
                    $nb_of_filters++;
                    $tax_obj = get_taxonomy($tax_slug);
                    echo '<br/><label> ' . $tax_obj->label . ':</label>';
                    wp_dropdown_categories(array(
                        'show_option_all' => __('Show All '),
                        'taxonomy' => $tax_slug,
                        'name' => 'cat_' . $tax_obj->name,
                        'orderby' => 'term_order',
                        'selected' => $_GET[$tax_obj->query_var],
                        'hierarchical' => $tax_obj->hierarchical,
                        'show_count' => false,
                        'hide_empty' => true
                    ));
                }
            }

            foreach ($filters as $object) {
                $nb_of_filters++;
                $field = $this->default_fields[$object];
                echo '<br/>';
                $field_type = $field['field_type'];
                if (isset($field['filter_field_type'])) {
                    $field_type = $field['filter_field_type'];
                }
                switch ($field_type) {
                    case 'select':
                        if (isset($field['field_config']['post_type'])) {
                            $this->grid_show_custom_post_dropdown($field['field_config']['post_type'], $field['label'], $object);
                        } else if (isset($field['field_config']['use_values']) and $field['field_config']['use_values'] == true) {
                            echo '<label> ' . $field['label'] . ':</label><select name="key_' . $object . '"  class="postform">
										<option value="all">Show All </option>';
                            foreach ($field['options'] as $key => $value) {
                                $select = '';
                                if (isset($_GET['key_' . $object]) and $_GET['key_' . $object] == $key) {
                                    $select = ' selected="selected" ';
                                }
                                echo '<option value="' . $key . '" ' . $select . '>' . $value . '</option>';
                            }
                            echo '</select>
									';
                        }
                        break;

                    case 'autocomplete':
                        if (isset($field['field_config']['post_type'])) {
                            $select_post_type = $field['field_config']['post_type'];
                            $value = '';
                            $valueDisplay = '';
                            if (isset($_GET['key_' . $object])) {
                                $value = $_GET['key_' . $object];
                            }
                            if (isset($_GET['keydisplay_' . $object])) {
                                $valueDisplay = $_GET['keydisplay_' . $object];
                            }
                            $label = $field['label'];
                            if (isset($field['filter_label'])) {
                                $label = $field['filter_label'];
                            }
                            echo ' <label>' . $label . ":</label>";
                            echo '<input class="autocomplete_field" post_type="' . $select_post_type . '" fieldname="' . $object . '" type="text" id="autocomplete_' . $config['field'] . '" name="keydisplay_' . $object . '" value="' . $valueDisplay . '" style="width:180px" />';
                            echo '<input class="autocomplete_field_value"  type="hidden" id="autocomplete_data_' . $object . '" name="key_' . $object . '" value="' . $value . '" />';

                            $help_image = WP_PLUGIN_URL . '/' . WP_PLUGIN_FOLDER . '/img/bugsqa_16.png';
                            echo '<span class="apm_help_btn"><img src="' . $help_image . '" /></span><span class="apm_legend_help">' . _('AutoSuggest field, please enter the first 3 characters.') . '</span>';
                        }

                        break;
                    case 'checkbox':
                        $this->grid_show_custom_post_checkbox_dropdown($field['label'], $object);
                        break;
                    case 'userslist':
                        $this->grid_show_userlist_dropdown($field, $object);
                        break;
                    case 'assignee':
                        $this->grid_show_userlist_dropdown($field, $object);
                        break;
                }
            }
        }

        public function set_page_header() {
            global $apm_settings;
            $module_name = $this->config['module']['name'];
            $appkey = $this->config['appkey'];

            if (get_option($appkey . '_app_name') !== false and get_option($appkey . '_app_name') !== '') {
                $app_name = get_option($appkey . '_app_name');
            } else {
                $app_name = $this->config['app']['name'];
            }
            $company_name = get_option('company_name');
            if ($company_name !== false and $company_name !== '') {
                $company_name = $company_name . " | ";
            } else {
                $company_name = '';
            }
            $iconCss = '';
            if (isset($this->config['module']['icon'])) {
                $iconCss = " background:url('" . $apm_settings['paths']['img'] . "/" . $this->config['module']['icon'] . "') no-repeat 5px 8px; ";
            }
            require_once APPLICATION_MAKER_VIEWS_PATH . 'datagrid/apm-datagrid-header.php';
        }

        public function do_basic_search_input() {
            echo '<form action="" class="apm_search"  method="post" enctype="multipart/form-data" name="apm_basic_search">';
            echo '<input type="text" value="" name="apm_basic_search" />';
            echo '<input type="submit" value="Search" name="apm_basic_search_submit" />';
            echo '<form action="">';
        }

        public function set_new_grid() {
            global $oThis;
            require_once APPLICATION_MAKER_VIEWS_PATH . 'datagrid/apm-datagrid-grid-new.php';
        }

        public function set_tabs() {
            ?>
            <div id='portal_tabs' >
                <ul class="htabs " >
                    <li><a class="select" href="#tab_1" id="tab_1t">Datagrid</a></li>
                    <!--<li><a     href="#tab_2" id="tab_2t">Dashboard</a></li>-->
                    <li><a    href="#tab_3" id="tab_3t">Settings</a></li>
                </ul>

                <div class="tabs">
                    <div class="tab  bmod apm_datagrid_wrapper" id="tab_1">
                        <?php
                        $this->set_datagrid();
                        $this->set_sidebar();
                        ?>
                    </div>
                    <!--<div class="tab  bmod" id="tab_2"></div>-->
                    <div class="tab  bmod" id="tab_3">
                        <form action=''  method='post' enctype='multipart/form-data' name='apm_pagin' class='apm_grid_settings'>
                            <?php $this->set_datagrid_paging('get_nb_by_page_form'); ?>
                            <p><input type="submit"  value="Save" /></p>
                        </form>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                tabs_obj["block"]= "#portal_tabs";
            </script>
            <?php
        }

        public function set_sidebar() {
            require_once APPLICATION_MAKER_VIEWS_PATH . 'datagrid/apm-datagrid-sidebar.php';
        }

        public function set_searchbar() {
            echo 'searchbard';
        }

        public function set_datagrid() {

            $btn_edit = "<span class='apm_act_edit apm_act' title='Edit record'> </span>";
            $btn_add = "<span class='apm_act_add apm_act' title='Add record'> </span>";
            $btn_del = "<span class='apm_act_del apm_act' title='Delete record'> </span>";
            $btn_trash = "<span class='apm_act_trash apm_act' title='Trash record (not definitive delete)'> </span>";
            $btn_unpub = "<span class='apm_act_unpub apm_act' title='UnPublish record'> </span>";
            $btn_pub = "<span class='apm_act_pub apm_act' title='Publish record'> </span>";
            $btn_view = "<span class='apm_act_view apm_act' title='Quick View record'> </span>";
            $btn_action = "<span class='apm_act_action apm_act'> </span>";
            $btn_info = "<span class='apm_act_info apm_act' title='Load details infos'> </span>";
            $btn_fav = "<span class='apm_act_fav apm_act' title='Add to Favorites'> </span>";
            $action_btns = $btn_action;
            $action_all_btns = $btn_edit . $btn_del . $btn_trash . $btn_unpub . $btn_pub; //.$btn_info.$btn_fav; $btn_view.
            require_once APPLICATION_MAKER_VIEWS_PATH . 'datagrid/apm-datagrid-grid.php';
        }

        public function apm_parse_schema($s, $post_id, $val) {
            $sa = explode('{', $s);
            foreach ($sa as $o) {
                $oa = explode('}', $o);
                $t = $oa[0];
                if ($t == 'value') {
                    $s = str_replace('{' . $t . '}', $val, $s);
                } else {
                    $v = get_post_meta($post_id, $t . $meta_marker, true);
                    $s = str_replace('{' . $t . '}', $v, $s);
                }
            }
            return $s;
        }

        public function apm_ajax_field_update() {
            global $meta_marker, $oThis;
            $fieldname = $_REQUEST['fieldname'];
            $post_id = $_REQUEST['post_id'];
            $modulekey = $_REQUEST['modulekey'];
            $val = $_REQUEST['val'];
            //$oThis->all_modules[$modulekey]['module_columns']
            $f = $oThis->default_fields[$fieldname];
            update_post_meta($post_id, $fieldname . $meta_marker, $val);
            if (isset($f['column_type'])) {
                //switch($f['column_type']){
                //case 'choice_li_ajax_select':
                if (isset($f['column_action_options']['replace'])) {
                    $a = $f['column_action_options']['replace'];
                    foreach ($a as $k => $o) {
                        switch ($k) {
                            case 'post_title':
                                $s = $this->apm_parse_schema($o, $post_id, $val);
                                $p = get_post($post_id);
                                $p->post_title = $s;
                                wp_update_post($p);
                                break;
                            case 'post_name':
                                $s = $this->apm_parse_schema($o, $post_id, $val);
                                $p = get_post($post_id);
                                $p->post_name = strtolower($s);
                                wp_update_post($p);
                                break;
                            default:
                                $s = $this->apm_parse_schema($o, $post_id, $val);
                                update_post_meta($post_id, $k . $meta_marker, $s);
                                break;
                        }
                    }
                }

                if (isset($f['column_action_options']['reset_title_schema'])) {
                    $s = $f['column_action_options']['reset_title_schema'];
                    $sa = explode('{', $s);
                    foreach ($sa as $o) {
                        $oa = explode('}', $o);
                        $t = $oa[0];
                        $v = get_post_meta($post_id, $t . $meta_marker, true);
                        $s = str_replace('{' . $t . '}', $v, $s);
                    }
                    $p = get_post($post_id);
                    $p->post_title = $s;
                    wp_update_post($p);
                }
                if (isset($f['column_action_options']['calculate_schema'])) {
                    $s = $f['column_action_options']['calculate_schema'];
                    $sf = $f['column_action_options']['calculate_sum_field'];
                    $sa = explode('{', $s);
                    foreach ($sa as $o) {
                        $oa = explode('}', $o);
                        $t = $oa[0];
                        $v = get_post_meta($post_id, $t . $meta_marker, true);
                        //echo "****".$v."**";
                        $s = str_replace('{' . $t . '}', $v, $s);
                        //echo $s;
                    }
                    //echo ">>>>".$s;
                    eval('$result = (' . $s . ');');
                    //echo ">>>".$result;
                    update_post_meta($post_id, $sf . $meta_marker, $result);
                }
                //break;
                //case 'choice_li_ajax_select':
                //break;
                //}
            }
            echo "true";
        }

        ///IS CALLED By AJAX, .
        public function manage_grid_data($browser_post) {
            switch ($browser_post['todo']) {
                case "special_action":
                    $this->update_special_action($browser_post['modulekey'], $browser_post['post_ids']);
                    break;
                case "get_file_csv":
                    $this->get_file_csv();
                    break;
                case "get_data":
                    $this->get_grid_data($browser_post['modulekey'], $browser_post);
                    break;
                case "del_rec":
                    $this->delete_record($browser_post['modulekey'], $browser_post['post_id']);
                    break;
                case "trash_rec":
                    $this->trash_record($browser_post['modulekey'], $browser_post['post_id']);
                    break;
                case "pub_rec":
                    $this->publish_record($browser_post['modulekey'], $browser_post['post_id']);
                    break;
                case "unpub_rec":
                    $this->unpublish_record($browser_post['modulekey'], $browser_post['post_id']);
                    break;
                case "unpub_multirecs":
                    $this->unpublish_records($browser_post['modulekey'], $browser_post['post_ids']);
                    break;
                case "pub_multirecs":
                    $this->publish_records($browser_post['modulekey'], $browser_post['post_ids']);
                    break;
                case "trash_multirecs":
                    $this->trash_records($browser_post['modulekey'], $browser_post['post_ids']);
                    break;
                case "del_multirecs":
                    $this->delete_records($browser_post['modulekey'], $browser_post['post_ids']);
                    break;
                default:
                    $todo = $_REQUEST['todo'];
                    switch ($todo) {
                        case "get_file_csv":
                            $this->get_file_csv($_request['modulekey']);
                            break;
                    }
            }
        }

        public function newget_file_csv() {
            global $wpdb, $meta_key, $oThis, $meta_marker, $apm_settings;
            $modulekey = $_REQUEST['modulekey'];
            $browser_post = array();
            $browser_post['sort_dir'] = $_REQUEST['sort_dir'];
            $browser_post['sortby_ajax'] = $_REQUEST['sortby_ajax'];
            $browser_post['filters'] = $_REQUEST['filters'];
            $action_key = $_REQUEST['action_key'];
            $fields = $_REQUEST['fields'];

            if (isset($oThis->all_modules[$modulekey]['module_columns'])) {
                $columns = $oThis->all_modules[$modulekey]['module_columns'];
            }
            //var_dump($oThis->all_modules[$modulekey]['module_datagrid_special_action'][$action_key]);

            $fields_ar = explode(',', $fields);
            //CHECK IF a filed is not tin the columns array, add it..
            foreach ($fields_ar as $k => $f) {
                if (!in_array($f, $columns)) {
                    $columns[] = $f;
                }
            }
            $fields_ar[] = 'ID';
            $columns[] = 'ID';
            //echo "****";
            //var_dump($columns);


            $posts = $this->get_grid_data($modulekey, $browser_post, true, true, $columns);
            //var_dump($posts);
            //$new_field_ar=$fields_ar;
            if (isset($oThis->all_modules[$modulekey]['module_datagrid_special_action'][$action_key])) {
                $o = $oThis->all_modules[$modulekey]['module_datagrid_special_action'][$action_key];
                //echo var_dump($o);
                //echo "////".$o['sub_entity'];
                $new_posts = array();
                if (isset($o['sub_fields'])) {
                    $subfieldsar = explode(',', $o['sub_fields']);
                    foreach ($subfieldsar as $subfield) {
                        if (!in_array($subfield, $columns)) {
                            $columns[] = $subfield;
                        }
                        if (!in_array($subfield, $fields_ar)) {
                            $fields_ar[] = $subfield;
                        }
                    }
                }
                foreach ($posts as $kp => $post) {
                    //echo "//".$post['ID'];
                    switch ($o['sub_entity']) {
                        default:
                            break;
                        case 'users':
                            $id_source = get_post_meta($post['ID'], $o['sub_id_source'] . $meta_marker, true);
                            //echo " +++ id_source  ".$id_source;
                            $user = get_users(array(
                                'include' => $id_source
                                    ));
                            $subfieldsar = explode(',', $o['sub_fields']);
                            //echo " +++ subfieldsar  ";
                            //var_dump($subfieldsar);
                            foreach ($subfieldsar as $subfield) {
                                $ar = array();
                                //$ar[$subfield]=$user[0]->$subfield;
                                //$post[]=$ar;
                                $post[$subfield] = $user[0]->$subfield;
                                //echo " subfield v ".$subfield." : ".$user[0]->$subfield;
                            }
                            break;
                    }
                    /* if(isset($post['ID'])){
                      unset($post['ID']);
                      } */
                    $new_posts[] = $post;
                }
                $posts = $new_posts;
            }
            //var_dump($posts);
            //
            //
            ///SHOW HEADER WITH COLUMNS LABELS
            $head = array();
            foreach ($columns as $k => $col) {
                if (in_array($col, $fields_ar)) {
                    switch ($col) {
                        default:
                            $f = $oThis->default_fields[$col];
                            if ($f !== null) {
                                if (isset($f['column_label'])) {
                                    $head[] = '"' . $f['column_label'] . '"';
                                } else {
                                    $head[] = '"' . $f['label'] . '"';
                                }
                            } else {
                                if (isset($oThis->all_modules[$modulekey]['module_datagrid_special_action'][$action_key]['sub_fields_label'])) {
                                    $flis = explode(',', $oThis->all_modules[$modulekey]['module_datagrid_special_action'][$action_key]['sub_fields']);
                                    $flablis = explode(',', $oThis->all_modules[$modulekey]['module_datagrid_special_action'][$action_key]['sub_fields_label']);
                                    foreach ($flis as $kli => $fli) {
                                        if ($fli == $col) {
                                            $head[] = '"' . $flablis[$kli] . '"';
                                        }
                                    }
                                }
                            }
                            break;
                        case 'post_title':
                            $head[] = '"Title"';
                            break;
                        case 'ID':
                            $head[] = '"ID"';
                            break;
                    }
                }
            }
            if (isset($o['get_comments']) and $o['get_comments'] == true) {
                $head[] = '"Comment email"';
                $head[] = '"Comment name"';
                $head[] = '"Comment content"';
                $head[] = '"Comment date"';
            }

            $time = time();
            $n = $oThis->all_modules[$modulekey]['menu_name'];
            if (isset($oThis->all_modules[$modulekey]['file_name'])) {
                $n = $oThis->all_modules[$modulekey]['file_name'];
            }
            $n = str_replace(' ', '_', $n);
            $d = date('ymd_his');
            header('Set-Cookie: fileDownload=true');
            header('Cache-Control: max-age=60, must-revalidate');
            header("Content-type: text/csv");
            header('Content-Disposition: attachment; filename="' . $n . '-20' . $d . '.csv"');
            echo implode(';', $head);
            echo "\n";
            //var_dump($columns);
            //var_dump($fields_ar);
            //GET POST ROWS
            foreach ($posts as $kp => $post) {
                $ra = array();
                //echo " ****** ";
                $notempty = false;
                if (isset($o['get_comments']) and $o['get_comments'] == true) {

                    $argscom = array(
                        'post_id' => $post['ID'],
                        'status' => 'approve',
                    );
                    $comments = get_comments($argscom);
                    if (count($comments) > 0) {
                        $notempty = true;
                        foreach ($comments as $kc => $com) {
                            $ra = array();
                            foreach ($columns as $k => $col) {
                                if (in_array($col, $fields_ar)) {
                                    //echo " ///".$col." : ".$post[$k]['value'];
                                    switch ($col) {
                                        default:
                                            $str = $post[$col];
                                            $str = str_replace('"', '\'', $str);
                                            $ra[] = '"' . $str . '"';
                                            break;
                                        /* case 'ID':
                                          echo "--id-";
                                          break; */
                                    }
                                }
                            }

                            $str = $com->comment_author_email;
                            $str = str_replace('"', '\'', $str);
                            $ra[] = '"' . $str . '"';
                            $str = $com->comment_author;
                            $str = str_replace('"', '\'', $str);
                            $ra[] = '"' . $str . '"';
                            $str = $com->comment_content;
                            $str = str_replace('"', '\'', $str);
                            $ra[] = '"' . $str . '"';
                            $str = $com->comment_date;
                            $str = str_replace('"', '\'', $str);
                            $ra[] = '"' . $str . '"';
                            if ($notempty) {
                                echo implode(';', $ra);
                                echo "\n";
                            }
                        }
                    }
                } else {

                    foreach ($columns as $k => $col) {
                        if (in_array($col, $fields_ar)) {
                            //echo " ///".$col." : ".$post[$k]['value'];

                            $notempty = true;
                            switch ($col) {
                                default:
                                    $str = $post[$col];
                                    $str = str_replace('"', '\'', $str);
                                    $ra[] = '"' . $str . '"';
                                    break;
                                /* case 'ID':
                                  echo "--id-";
                                  break; */
                            }
                        }
                    }
                }
            }
            echo "\n";
        }

        public function get_file_csv() {
            global $wpdb, $meta_key, $oThis, $meta_marker, $apm_settings;
            $modulekey = $_REQUEST['modulekey'];
            $browser_post = array();
            $browser_post['sort_dir'] = $_REQUEST['sort_dir'];
            $browser_post['sortby_ajax'] = $_REQUEST['sortby_ajax'];
            $browser_post['filters'] = stripslashes($_REQUEST['filters']);
            $action_key = $_REQUEST['action_key'];
            $fields = $_REQUEST['fields'];

            if (isset($oThis->all_modules[$modulekey]['module_columns'])) {
                $columns = $oThis->all_modules[$modulekey]['module_columns'];
            } else if (isset($oThis->all_modules[$modulekey]['module_datagrid']['fields_to_load'])) {
                $columns = $oThis->all_modules[$modulekey]['module_datagrid']['fields_to_load'];
                $columns = explode(',', $columns);
            }
            //var_dump($oThis->all_modules[$modulekey]['module_datagrid_special_action'][$action_key]);
            // var_dump($fields);
            $fields_ar = explode(',', $fields);
            // var_dump($fields_ar);
            //CHECK IF a filed is not tin the columns array, add it..
            foreach ($fields_ar as $k => $f) {
                if (!in_array($f, $columns)) {
                    $columns[] = $f;
                }
            }
            $fields_ar[] = 'ID';
            $columns[] = 'ID';
            $posts = $this->get_grid_data($modulekey, $browser_post, true, true, $columns);
            //$new_field_ar=$fields_ar;
            if (isset($oThis->all_modules[$modulekey]['module_datagrid_special_action'][$action_key])) {
                $o = $oThis->all_modules[$modulekey]['module_datagrid_special_action'][$action_key];
                //echo var_dump($o);
                //echo "////".$o['sub_entity'];
                $new_posts = array();
                if (isset($o['sub_fields'])) {
                    $subfieldsar = explode(',', $o['sub_fields']);
                    foreach ($subfieldsar as $subfield) {
                        if (!in_array($subfield, $columns)) {
                            $columns[] = $subfield;
                        }
                        if (!in_array($subfield, $fields_ar)) {
                            $fields_ar[] = $subfield;
                        }
                    }
                }
                foreach ($posts as $kp => $post) {
                    //echo "//".$post['ID'];
                    switch ($o['sub_entity']) {
                        default:
                            break;
                        case 'users':
                            $id_source = get_post_meta($post['ID'], $o['sub_id_source'] . $meta_marker, true);
                            //echo " +++ id_source  ".$id_source;
                            $user = get_users(array(
                                'include' => $id_source
                                    ));
                            $subfieldsar = explode(',', $o['sub_fields']);
                            //echo " +++ subfieldsar  ";
                            //var_dump($subfieldsar);
                            foreach ($subfieldsar as $subfield) {
                                $ar = array();
                                //$ar[$subfield]=$user[0]->$subfield;
                                //$post[]=$ar;
                                $post[$subfield] = $user[0]->$subfield;
                                //echo " subfield v ".$subfield." : ".$user[0]->$subfield;
                            }
                            break;
                    }
                    /* if(isset($post['ID'])){
                      unset($post['ID']);
                      } */
                    $new_posts[] = $post;
                }
                $posts = $new_posts;
            }
            //var_dump($posts);
            //
            //
            ///SHOW HEADER WITH COLUMNS LABELS
            $head = array();
            foreach ($columns as $k => $col) {
                if (in_array($col, $fields_ar)) {
                    switch ($col) {
                        default:
                            $f = $oThis->default_fields[$col];
                            if ($f !== null) {
                                if (isset($f['column_label'])) {
                                    $head[] = '"' . $f['column_label'] . '"';
                                } else {
                                    $head[] = '"' . $f['label'] . '"';
                                }
                            } else {
                                if (isset($oThis->all_modules[$modulekey]['module_datagrid_special_action'][$action_key]['sub_fields_label'])) {
                                    $flis = explode(',', $oThis->all_modules[$modulekey]['module_datagrid_special_action'][$action_key]['sub_fields']);
                                    $flablis = explode(',', $oThis->all_modules[$modulekey]['module_datagrid_special_action'][$action_key]['sub_fields_label']);
                                    foreach ($flis as $kli => $fli) {
                                        if ($fli == $col) {
                                            $head[] = '"' . $flablis[$kli] . '"';
                                        }
                                    }
                                }
                            }
                            break;
                        case 'post_title':
                            $head[] = '"Title"';
                            break;
                        case 'ID':
                            $head[] = '"ID"';
                            break;
                    }
                }
            }
            if (isset($o['get_comments']) and $o['get_comments'] == true) {
                $head[] = '"Comment email"';
                $head[] = '"Comment name"';
                $head[] = '"Comment content"';
                $head[] = '"Comment date"';
            }

            $time = time();
            $n = $oThis->all_modules[$modulekey]['menu_name'];
            if (isset($oThis->all_modules[$modulekey]['file_name'])) {
                $n = $oThis->all_modules[$modulekey]['file_name'];
            }
            $n = str_replace(' ', '_', $n);
            $d = date('ymd_his');
            header('Set-Cookie: fileDownload=true');
            header('Cache-Control: max-age=60, must-revalidate');
            header("Content-type: text/csv");
            header('Content-Disposition: attachment; filename="' . $n . '-20' . $d . '.csv"');
            echo implode(';', $head);
            echo "\n";
            // var_dump($columns);
            // var_dump($fields_ar);
            //GET POST ROWS
            foreach ($posts as $kp => $post) {
                $ra = array();
                //echo " ****** ";
                $notempty = false;
                if (isset($o['get_comments']) and $o['get_comments'] == true) {

                    $argscom = array(
                        'post_id' => $post['ID'],
                        'status' => 'approve',
                    );
                    $comments = get_comments($argscom);
                    if (count($comments) > 0) {
                        $notempty = true;
                        foreach ($comments as $kc => $com) {
                            $ra = array();
                            foreach ($columns as $k => $col) {
                                if (in_array($col, $fields_ar)) {
                                    //echo " ///".$col." : ".$post[$k]['value'];
                                    switch ($col) {
                                        default:
                                            $str = $post[$col];
                                            $str = str_replace('"', '\'', $str);
                                            $ra[] = '"' . $str . '"';
                                            break;
                                        /* case 'ID':
                                          echo "--id-";
                                          break; */
                                    }
                                }
                            }

                            $str = $com->comment_author_email;
                            $str = str_replace('"', '\'', $str);
                            $ra[] = '"' . $str . '"';
                            $str = $com->comment_author;
                            $str = str_replace('"', '\'', $str);
                            $ra[] = '"' . $str . '"';
                            $str = $com->comment_content;
                            $str = str_replace('"', '\'', $str);
                            $ra[] = '"' . $str . '"';
                            $str = $com->comment_date;
                            $str = str_replace('"', '\'', $str);
                            $ra[] = '"' . $str . '"';
                            if ($notempty) {
                                echo implode(';', $ra);
                                echo "\n";
                            }
                        }
                    }
                } else {
                    $ra = array();
                    foreach ($columns as $k => $col) {
                        if (in_array($col, $fields_ar)) {
                            //echo " ///".$col." : ".$post[$k]['value'];

                            $notempty = true;
                            switch ($col) {
                                default:
                                    $str = $post[$col];
                                    $str = str_replace('"', '\'', $str);
                                    $ra[] = '"' . $str . '"';
                                    break;
                                /* case 'ID':
                                  echo "--id-";
                                  break; */
                            }
                        }
                    }
                    echo implode(';', $ra);
                    echo "\n";
                }
            }
            echo "\n";
            die();
        }

        ///IS CALLED By AJAX, .

        public function publish_record($modulekey, $post_id) {
            echo $post_id . " Published";
            $my_post = array();
            $my_post['ID'] = intval($post_id);
            $my_post['post_status'] = 'publish';
            wp_update_post($my_post);
            //wp_delete_post( $post_id, true );
        }

        public function publish_records($modulekey, $post_ids) {

            echo $post_ids . " are published";
            $post_ids_ar = explode(',', $post_ids);
            foreach ($post_ids_ar as $post_id) {
                $my_post = array();
                $my_post['ID'] = intval($post_id);
                $my_post['post_status'] = 'publish';
                wp_update_post($my_post);
            }
        }

        public function unpublish_records($modulekey, $post_ids) {
            echo $post_ids . " are unpublished";
            $post_ids_ar = explode(',', $post_ids);
            foreach ($post_ids_ar as $post_id) {
                $my_post = array();
                $my_post['ID'] = intval($post_id);
                $my_post['post_status'] = 'draft';
                wp_update_post($my_post);
            }
            //wp_delete_post( $post_id, true );
        }

        public function unpublish_record($modulekey, $post_id) {
            echo $post_id . " Unpublished";
            $my_post = array();
            $my_post['ID'] = intval($post_id);
            $my_post['post_status'] = 'draft';
            wp_update_post($my_post);
        }

        public function delete_records($modulekey, $post_ids) {
            echo $post_ids . " are deleted";
            $post_ids_ar = explode(',', $post_ids);
            foreach ($post_ids_ar as $post_id) {
                wp_delete_post($post_id, true);
            }
        }

        public function delete_record($modulekey, $post_id) {
            echo $post_id . " Deleted";
            wp_delete_post($post_id, true);
        }

        public function trash_records($modulekey, $post_ids) {
            echo $post_ids . " are trashed";
            $post_ids_ar = explode(',', $post_ids);
            foreach ($post_ids_ar as $post_id) {
                wp_trash_post($post_id);
            }
        }

        public function update_special_action($modulekey, $post_ids) {
            global $meta_marker;
            echo $post_ids . " are updated";
            $post_ids_ar = explode(',', $post_ids);
            $v = $_REQUEST['v'];
            $f = $_REQUEST['f'];
            //echo $v."--".$f;
            foreach ($post_ids_ar as $post_id) {
                //echo "***".$post_id;
                update_post_meta($post_id, $f . $meta_marker, $v);
            }
        }

        public function trash_record($modulekey, $post_id) {
            echo $post_id . " Trashed";
            wp_trash_post($post_id);
        }

        ///IS LOADED By AJAX, send the HTML of the table content only.
        public function get_grid_data($modulekey, $browser_post, $do_return_array = false, $get_id = false, $special_column = false) {
            global $wpdb, $meta_key, $oThis, $meta_marker, $apm_settings;


            /////LOOP ALL FILTERS AND QUERY BY FILTERS
            $ar_filters = array();
            $sort_dir = 'ASC';
            if (isset($browser_post['sort_dir'])) {
                $sort_dir = $browser_post['sort_dir'];
            }
            $sortby_ajax = 'default';
            if (isset($browser_post['sortby_ajax'])) {
                $sortby_ajax = $browser_post['sortby_ajax'];
            }
            if (isset($browser_post['filters'])) {
                $filters = $browser_post['filters'];
                $filters = stripslashes($filters);
                $filters = json_decode($filters);
                $ar_filters = array('page_nb' => 1);
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
                /* if ($filters !== "{}") {
                  $ar_filters = json_decode(stripslashes($filters));
                  $filters_results = ''; */

                ///QUERY IF FILTERS
                //  $posts = $this->get_all_posts_list_with_meta($modulekey, $ar_filters, true, 0, 0, $sortby_ajax, $sort_dir);
                //} else {
                ///IF NOT FILTERS
                $posts = $this->get_all_posts_list_with_meta($modulekey, $ar_filters, false, 0, 0, $sortby_ajax, $sort_dir);
                //var_dump($posts);
                // }
            } else {
                ///IF NOT FILTERS
                $posts = $this->get_all_posts_list_with_meta($modulekey, $ar_filters, true, 0, 0, $sortby_ajax, $sort_dir);
            }
            //var_dump($ar_filters);
            //echo "******".$modulekey."***".$browser_post['filters']."*".$browser_post['sortby_ajax']."/".$browser_post['sort_dir'];
            $count_records = count($posts); //before paging

            $paging_nb = $this->get_datagrid_paging_nb($modulekey); //nb of records by page

            $nb_pages = 1;
            if ($paging_nb > 0) {
                $nb_pages = intval($count_records / $paging_nb);
                if ($nb_pages !== ($count_records / $paging_nb) or $nb_pages == 0) {
                    $nb_pages++;
                }
            }

            if (isset($browser_post['filters'])) {
                $filters = $browser_post['filters'];
                if ($filters !== "{}") {
                    //  $ar_filters = json_decode(stripslashes($filters));

                    $filters = $browser_post['filters'];
                    $filters = stripslashes($filters);
                    $filters = json_decode($filters);
                    $ar_filters = array('page_nb' => 1);
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
                    ///QUERY IF FILTERS WITH PAGING
                    $posts = $this->get_all_posts_list_with_meta($modulekey, $ar_filters, false, 0, 0, $sortby_ajax, $sort_dir);
                    // var_dump($posts);
                }
            }
            //exit;
            ///GET THE COLUMNS LIST REQUIRED FOR THIS CUSTOM POST TYPE
            $columns = array();
            if (isset($oThis->all_modules[$modulekey]['module_columns'])) {
                $columns = $oThis->all_modules[$modulekey]['module_columns'];
            }
            if ($special_column !== false) {
                $columns = $special_column;
            }
            /* 	if(isset($config['field_config']['calculations'])) {
              foreach($config['field_config']['calculations'] as $key=>$calculation){
              $totals [$key]=0;
              }
              } */


            ////LIST ALL THE POST
            //$count_records=0;
            $totals = array();
            $return_array = array();

            foreach ($posts as $p) {
                //$count_records++;
                $btn_action = "<span class='apm_act_action apm_act' post_id='" . $p->ID . "' post_status='" . $p->post_status . "'> </span>";
                $action_btns = $btn_action;
                if ($do_return_array == false) {
                    echo '<tr class="' . $modulekey . '_' . $p->ID . '"><td class="td_cb"><input type="checkbox" value="" name="grid_row_cb" class="apm_grid_row_cb" post_id="' . $p->ID . '"/></td>';
                    echo "<td>" . $action_btns . "</td>";
                }
                switch ($p->post_status) {
                    case 'draft':
                        $status = "apm_act_unpub td_status";
                        break;
                    case 'publish':
                        $status = "apm_act_pub td_status";
                        break;
                    case 'trash':
                        $status = "apm_act_trash td_status";
                        break;
                    case 'pending':
                        $status = "apm_act_pending td_status";
                        break;
                }

                if ($do_return_array == false) {
                    echo "<td class='" . $status . "'></td>";
                    $out = sprintf('<a href="%s" target="_blank" title="Open item in new window">%s</a>', esc_url(add_query_arg(array('post' => $p->ID, 'action' => 'edit'), 'post.php')), "<img src='" . $new_window_image . "' alt='' />"
                    );
                    $out .= sprintf(' <a href="%s" title="Open item ">%s</a>', esc_url(add_query_arg(array('post' => $p->ID, 'action' => 'edit'), 'post.php')), esc_html($p->post_title)
                    );
                }
                ///LIST ALL COLUMNS IN A POST
                $rows_array = array();
                foreach ($columns as $column) {
                    $row_array = array();
                    $debug = '';
                    $meta = $this->get_grid_td_content($column, $meta, $oThis, $modulekey, $rows_array, $do_return_array, $p);
                    $rows_array[$column] = $meta;
                    $meta = $this->check_grid_td_formatting($column, $meta, $oThis, $modulekey, $rows_array, $do_return_array, $p);

                    if ($do_return_array == false) {
                        echo '<td>' . $meta . '</td>';
                    }
                }
                if ($get_id == true) {
                    $row_array = array();
                    //$row_array['value']=$p->ID;
                    $row_array[$column] = $p->ID;
                    $row_array['ID'] = $p->ID;
                    $rows_array[] = $row_array;
                    $rows_array['ID'] = $p->ID;
                }
                /* else{

                  $rows_array[] = $row_array;
                  } */
                $return_array[] = $rows_array;
                if ($do_return_array == false) {
                    echo "</tr>";
                }
            }

            if ($do_return_array == true) {
                return $return_array;
            }


            foreach ($ar_filters as $filter_type => $filter_value) {
                $filter_type_lbl = '';
                $filter_lbl = '';
                switch ($filter_type) {
                    case "page_nb":
                        // $page_nb=intval($filter_value);
                        $filter_type_lbl = "Page";
                        if (intval($filter_value) > $nb_pages) {
                            $filter_value = $nb_pages;
                        }
                        $filter_lbl = $filter_value . ' / ' . $nb_pages . ' (' . $paging_nb . ' rec. by pages)';
                        break;
                    case "letter":
                        $filter_type_lbl = "First Letter";
                        $filter_lbl = $filter_value;
                        if ($filter_value == "#") {
                            $filter_lbl = '';
                            $filter_type_lbl = '';
                        }
                        break;
                    case "post_status":
                        $filter_type_lbl = "Status";
                        switch ($filter_value) {
                            case "filter_all":
                                $filter_lbl = '';
                                $filter_type_lbl = '';
                                break;
                            case "filter_pub":
                                $filter_lbl = 'Publish';
                                break;
                            case "filter_unpub":
                                $filter_lbl = 'UnPublish (Draft)';
                                break;
                            case "filter_trash":
                                $filter_lbl = 'Trash';
                                break;
                        }
                        break;
                }
                if ($filter_type_lbl !== '') {
                    $filters_results.=" | " . $filter_type_lbl . ': ' . $filter_lbl;
                }
            }
            ///////GET GLOBAL INFOS, LIKE TOTAL COUNT, FILTER COUNT, etc...
            $query = "SELECT DISTINCT *
					FROM $wpdb->posts
					WHERE   $wpdb->posts.post_type = '$modulekey'
					AND ($wpdb->posts.post_status = 'publish' OR $wpdb->posts.post_status = 'draft' OR $wpdb->posts.post_status = 'pending' OR $wpdb->posts.post_status = 'trash') ";
            $posts_list = $wpdb->get_results($query);
            echo '//cutter//{
				"page_count":"' . count($posts) . '",
				"count":"' . $count_records . '",
				 "total_count":"' . count($posts_list) . '",
				  "filters_results":"' . $filters_results . '",
				  "nb_by_page":"';
            echo $paging_nb;
            echo '", "last_page":"';
            echo $nb_pages;
            echo '"
				}';
            //var_dump($posts);
        }

        function get_grid_td_content($column, $meta, $oThis, $modulekey, $rows_array, $do_return_array, $p) {
            global $post, $wpdb, $meta_marker, $apm_settings, $oThis;
            $f = $oThis->default_fields[$column];
            if ($do_return_array == false) {
                $out = sprintf('<a href="%s" target="_blank" title="Open item in new window">%s</a>', esc_url(add_query_arg(array('post' => $p->ID, 'action' => 'edit'), 'post.php')), "<img src='" . $new_window_image . "' alt='' />"
                );
                $out .= sprintf(' <a href="%s" title="Open item ">%s</a>', esc_url(add_query_arg(array('post' => $p->ID, 'action' => 'edit'), 'post.php')), esc_html($p->post_title)
                );
            }
            switch ($column) {
                case "post_title":
                    //$row_array["value"]= $p->post_title;
                    $rows_array[$column] = $p->post_title;
                    $meta = $p->post_title;
                    if ($do_return_array == false) {
                        $meta = $out; //$this->check_grid_td_formatting($column,$p->post_title,$oThis,$modulekey,$rows_array,$do_return_array,$p);
                        // echo '<td>'.$meta.'</td>';
                    }
                    break;
                case "post_date":
                    $h_time = mysql2date(__('Y/m/d'), $p->post_date);
                    //$row_array["value"]=$h_time;
                    $rows_array[$column] = $h_time;
                    $meta = $h_time;
                    if ($do_return_array == false) {
                        $meta = $h_time; //$this->check_grid_td_formatting($column,$h_time,$oThis,$modulekey,$rows_array,$do_return_array,$p);
                        // echo '<td>'.$meta.'</td>';
                    }
                    break;
                case "post_status":
                    //$row_array["value"]=$p->post_status;
                    $rows_array[$column] = $p->post_status;
                    $meta = $p->post_status;
                    if ($do_return_array == false) {
                        $meta = $p->post_status; //$this->check_grid_td_formatting($column,$p->post_status,$oThis,$modulekey,$rows_array,$do_return_array,$p);
                        //  echo '<td>'.$meta.'</td>';
                    }
                    break;
                case "order":
                    //$row_array["value"]=$p->menu_order;
                    $rows_array[$column] = $p->menu_order;
                    $meta = $p->menu_order;
                    if ($do_return_array == false) {
                        $meta = $p->menu_order; //$this->check_grid_td_formatting($column,$p->menu_order,$oThis,$modulekey,$rows_array,$do_return_array,$p);
                        // echo '<td>'.$meta.'</td>';
                    }
                    break;
                case "menu_order":
                    $rows_array[$column] = $p->menu_order;
                    $meta = $p->menu_order;
                    //$row_array["value"]=$p->menu_order;
                    if ($do_return_array == false) {
                        $meta = $p->menu_order; //$this->check_grid_td_formatting($column,$p->menu_order,$oThis,$modulekey,$rows_array,$do_return_array,$p);
                        // echo '<td>'.$meta.'</td>';
                    }
                    break;
                case "featured_image":
                    $thumb_name = $oThis->all_modules[$modulekey]['custom_featured_image']['thumb_name'];
                    if ($thumb_name == '' or empty($thumb_name) or $thumb_name == false) {
                        $thumb_name = 'apm_grid_thumb';
                    }
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($p->ID), $thumb_name);
                    //$row_array["value"]=$thumb_name;
                    $rows_array[$column] = $thumb_name;
                    $meta = $image[0];
                    if ($do_return_array == false) {

                        $meta = '<img src="' . $image[0] . '" style="width:50px" />'; //$this->check_grid_td_formatting($column,'<img src="'.$image[0].'" style="width:50px" />',$oThis,$modulekey,$rows_array,$do_return_array,$p);
                        // echo '<td>'.$meta.'</td>';
                    }
                    break;
                //
                default:
                    $meta = get_post_meta($p->ID, $column . $meta_marker, true);
                    $rows_array[$column] = $meta;
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
                    if ($meta !== '') {
                        //userslist
                        if (isset($f['column_type'])) {
                            switch ($f['column_type']) {
                                case "input_ajax":
                                    $w = '';
                                    if (isset($f['column_options'])) {
                                        if (isset($f['column_options']['width'])) {
                                            switch ($f['column_options']['width']) {
                                                default:
                                                    $w = '';
                                                    break;
                                                case 'medium':
                                                    $w = ' style="width:100px" ';
                                                    break;
                                                case 'large':
                                                    $w = ' style="width:150px" ';
                                                    break;
                                            }
                                        }
                                    }
                                    //$row_array["value"]=$meta;
                                    $rows_array[$column] = $meta;

                                    if ($do_return_array == false) {
                                        $meta = '<input value="' . $meta . '" ' . $w . ' class="ajax_input" data-id="' . $p->ID . '" data-fieldname="' . $column . '" />';
                                    }
                                    break;
                                case "choice_li_ajax_select":
                                    $meta_s = "<span data-id='" . $p->ID . "' data-fieldname='" . $column . "' class='choice_li_ajax_select'>";
                                    //$meta=implode(',',$f['options']);
                                    "Yes";
                                    $str_m = "";
                                    $res = '';
                                    foreach ($f['options'] as $k => $op) {
                                        $cls = "apm_grid_field_unselected";
                                        if ($k == intval($meta)) {
                                            $cls = "apm_grid_field_selected";
                                            $res = $op;
                                        }
                                        $meta_s.=" <span class='" . $cls . "' data-val='" . $k . "'>" . $op . "</span>";
                                        $str_m.=$op . ', ';
                                    }

                                    if ($do_return_array == false) {
                                        $meta = $meta_s . "</span>";
                                    } else {
                                        $meta = $res;
                                    }
                                    //$row_array["value"]=$str_m;
                                    $rows_array[$column] = $str_m;
                                    break;
                                case "bool_ajax":
                                    if ($meta == "1") {
                                        $meta = '<span class="apm_act_pub apm_act_grid" style="display: block;"  data-id="' . $p->ID . '" data-fieldname="' . $column . '" ></span>';
                                        //$row_array["value"]="Yes";
                                        if ($do_return_array == true) {
                                            $meta = "Yes";
                                        }
                                        $rows_array[$column] = "Yes";
                                    } else {
                                        $meta = '<span class="apm_act_unpub apm_act_grid" style="display: block;"  data-id="' . $p->ID . '" data-fieldname="' . $column . '" ></span>';
                                        //$row_array["value"]="No";
                                        $rows_array[$column] = "No";
                                        if ($do_return_array == true) {
                                            $meta = "No";
                                        }
                                    }
                                    break;
                            }
                        } else if (isset($f['field_type'])) {
                            switch ($f['field_type']) {
                                default:
                                    $fieldtype = $f['field_type'];
                                    foreach ($oThis->extensions->extensions as $ke => $ext) {
                                        if ($ext == $f['field_type']) {
                                            include_once($oThis->extensions->clss[$fieldtype][0]['path'] . $oThis->extensions->clss[$fieldtype][0]['filename']);
                                            $meta = $oThis->extension_class_instances[$fieldtype]->getColumnData($meta, $f, $p->ID);
                                        }
                                    }
                                    break;
                                case "select":
                                    if ((isset($f['field_config']['use_values']) and $f['field_config']['use_values'] == true) or !isset($f['field_config'])) {
                                        if (isset($f['options'][$meta])) {
                                            $meta = $f['options'][$meta];
                                        }
                                    } else if (isset($f['field_config']['multiselect'])) {
                                        $meta_n = '';
                                        $str_m = "";
                                        foreach ($meta as $meta_id) {
                                            $subpost = get_post($meta_id);
                                            $meta_t = $subpost->post_title;
                                            $meta_n.=sprintf(' <a href="%s" class="addBtn" title="Open the selected record in the same window">%s</a> | ', esc_url(add_query_arg(array('action' => 'edit', 'post' => $subpost->ID), 'post.php')), $meta_t
                                            );
                                            $str_m.=$meta_t . ", ";
                                        }
                                        //$row_array["value"]=$str_m;
                                        $rows_array[$column] = $str_m;
                                        if ($do_return_array == false) {
                                            $meta = $meta_n;
                                        } else {
                                            $meta = $str_m;
                                        }
                                    } else {
                                        $subpost = get_post($meta);
                                        $meta_t = $subpost->post_title;

                                        if ($do_return_array == false) {
                                            $meta = sprintf('<a href="%s" class="addBtn" title="Open the selected record in the same window">%s</a>', esc_url(add_query_arg(array('action' => 'edit', 'post' => $subpost->ID), 'post.php')), $meta_t
                                            );
                                        } else {
                                            $meta = $meta_t;
                                        }


                                        //$row_array["value"]=$meta_t;
                                        $rows_array[$column] = $meta_t;
                                    }
                                    break;
                                case "autocomplete":
                                    $subpost = get_post($meta);
                                    $meta_t = $subpost->post_title;


                                    if ($do_return_array == false) {
                                        $meta = sprintf('<a href="%s" class="addBtn" title="Open the selected record in the same window">%s</a>', esc_url(add_query_arg(array('action' => 'edit', 'post' => $subpost->ID), 'post.php')), $meta_t
                                        );
                                    } else {
                                        $meta = $meta_t;
                                    }


                                    //$row_array["value"]=$meta_t;
                                    $rows_array[$column] = $meta_t;
                                    break;
                                case "userslist":
                                    $valid = $meta;
                                    $user = get_users(array(
                                        'include' => $meta
                                            ));
                                    $meta = $user[0]->display_name;
                                    //$row_array["value"]=$meta.' ('.$valid.')';
                                    $rows_array[$column] = $meta . ' (' . $valid . ')';
                                    if ($do_return_array == false) {
                                        $meta = sprintf('<a href="%s"  title="Open the user ' . $meta . '">%s</a>', esc_url(add_query_arg(array('user_id' => $valid), 'user-edit.php')), $meta);
                                    } else {
                                        $meta = $meta . ' (' . $valid . ')';
                                    }
                                    break;
                                case "photo":


                                    if ($do_return_array == false) {
                                        if (isset($f['column_img_width'])) {
                                            $meta = '<img src="' . $meta . '" style="width:' . $f['column_img_width'] . 'px"/>';
                                        } else {
                                            $meta = '<img src="' . $meta . '" />';
                                        }
                                    }
                                    //$row_array["value"]=$meta;
                                    $rows_array[$column] = $meta;
                                    break;
                                case "assignee":
                                    $valid = $meta;
                                    $user = get_users(array(
                                        'include' => $meta
                                            ));
                                    $meta = $user[0]->display_name;
                                    //$row_array["value"]=$meta.' ('.$valid.')';
                                    $rows_array[$column] = $meta . ' (' . $valid . ')';
                                    if ($do_return_array == false) {
                                        $meta = sprintf('<a href="%s"  title="Open the user ' . $meta . '">%s</a>', esc_url(add_query_arg(array('user_id' => $valid), 'user-edit.php')), $meta);
                                    } else {
                                        $meta = $meta . ' (' . $valid . ')';
                                    }
                                    break;
                                case "currencyfield":
                                    $meta = $meta . ' ' . $apm_settings['configs']['default_currency'];
                                    //$row_array["value"]=$meta;
                                    $rows_array[$column] = $meta;
                                    break;
                                case 'checkbox':
                                    $txt = 'No';
                                    if ($meta == '1') {
                                        $txt = 'Yes';
                                    }
                                    $meta = $txt;
                                    //$row_array["value"]=$meta;
                                    $rows_array[$column] = $meta;
                                    break;
                            }
                            //echo var_dump($subpost);
                        }
                    }
                    if ($do_return_array == false) {
                        // echo '<td>';
                        echo $debug;
                        // $meta=$this->check_grid_td_formatting($column,$meta,$oThis,$modulekey,$rows_array,$do_return_array,$p);
                        // echo $meta.'</td>';
                    }
                    break;
            }///END SWITCH
            return $meta;
        }

        function check_grid_td_formatting($column, $meta, $oThis, $modulekey, $rows_array, $do_return_array, $p) {
            global $post, $wpdb, $meta_marker, $apm_settings;
            if (isset($oThis->all_modules[$modulekey]['module_columns_formatting'])) {
                foreach ($oThis->all_modules[$modulekey]['module_columns_formatting'] as $kformat => $vformat) {
                    if ($column == $kformat) {
                        $meta = str_replace("{field}", $meta, $vformat['schema']);
                        $submeta = "";
                        if (isset($oThis->all_modules[$modulekey]['module_columns_subcontent'])) {
                            $colms = array_merge($oThis->all_modules[$modulekey]['module_columns'], $oThis->all_modules[$modulekey]['module_columns_subcontent']);
                        } else {
                            $colms = $oThis->all_modules[$modulekey]['module_columns'];
                        }
                        foreach ($colms as $kcol => $vcol) {
                            if (strpos($vformat['schema'], '[' . $vcol . ']') !== false) {
                                //$meta.="dd".strpos($vformat['schema'],'['.$vcol.']');
                                $submeta = $this->get_grid_td_content($vcol, '', $oThis, $modulekey, $rows_array, $do_return_array, $p);
                                $meta = str_replace('[' . $vcol . ']', $submeta, $meta);
                            }
                        }
                    }
                }
                //$column
            }
            return $meta;
        }

        /* HANDLE AUTO FILL OPTION  > IN case in config we have a
         * 'metaboxes'=>array(
          'auto_fill'=>array('-None-','Analyst','Competitor','Customer','Integrator','Investor','Partner','Press','Prospect','Reseller','Other'),
         * and if the post type is empty, we fill the post type by the content of the config array....
         *
         *
         * */

        function check_autofill_all() {
            global $post, $wpdb, $meta_marker, $apm_settings;
            foreach ($this->Parent->post_types as $k => $o) {
                $this->check_autofill($k);
                $this->check_migrate($k);
            }
        }

        function check_migrate($post_type) {
            global $post, $wpdb, $meta_marker, $apm_settings;
            if (isset($this->Parent->post_types[$post_type]['migrate_fields_list'])) {
                $this->check_autofill($post_type);
                $yet = get_option($post_type . '_migrated');
                if (isset($_REQUEST['force_migrate'])) {
                    $yet = 'redo';
                    echo '<br>Forcing to check and eventually migrating again non migrated items for ' . $this->Parent->post_types[$post_type]['name'];
                }
                if ($yet !== 'done') {
                    update_option($post_type . '_migrated', 'done');
                    //DO MIGRATE
                    echo '<br>Trying to migrate non migrated items for ' . $this->Parent->post_types[$post_type]['name'];

                    $query = "SELECT *
						FROM $wpdb->posts
						WHERE post_type = '$post_type'";
                    $posts_list = $wpdb->get_results($query);
                    $c = 0;
                    $ca = array();
                    foreach ($this->Parent->post_types[$post_type]['migrate_fields_list'] as $k2 => $o) {
                        $a = explode(',', $o);
                        $meta_name = $a[0];
                        $posttype_name = $a[1];
                        echo '<br>* Trying to migrate values for ' . $this->Parent->post_types[$a[1]]['name'];
                    }
                    foreach ($posts_list as $k => $p) {

                        foreach ($this->Parent->post_types[$post_type]['migrate_fields_list'] as $k2 => $o) {
                            $a = explode(',', $o);
                            $meta_name = $a[0];
                            $posttype_name = $a[1];
                            $meta = get_post_meta($p->ID, $meta_name . $meta_marker, true);
                            $vals = $this->Parent->post_types[$posttype_name]['auto_fill']['values'];
                            //echo $meta."///";
                            if (empty($meta) or $meta == "") {
                                $newval = $vals[0];
                            } else if (intval($meta) <= count($vals)) {
                                $newval = $vals[intval($meta)];
                            }
                            //echo $newval."---";
                            $query = "SELECT *
								FROM $wpdb->posts
								WHERE post_type = '$posttype_name'
								and post_title='$newval'
								";
                            $post = $wpdb->get_results($query);
                            if (count($post) > 0) {
                                $c++;
                                $ca[$posttype_name][] = 'o';
                                update_post_meta($p->ID, $meta_name . $meta_marker, $post[0]->ID);
                            }
                        }
                    }
                    if ($c > 0) {
                        echo "<p>IMPORTANT NOTE: following an update of the system, your values has been migrated automatically to new the equivalent values in the new way:";
                        foreach ($this->Parent->post_types[$post_type]['migrate_fields_list'] as $k2 => $o) {
                            $a = explode(',', $o);
                            $meta_name = $a[0];
                            $posttype_name = $a[1];
                            $lab = $this->Parent->post_types[$posttype_name]['name'];
                            $finam = $this->Parent->AM_Core->default_fields[$meta_name]['label'];
                            echo '<p>The field "' . $finam . '" has been updated and is now using the content from the new module "' . $lab . '". You can update those values now in the system settings.';
                        }
                    }
                }
            }
        }

        function check_autofill($post_type) {
            global $post, $wpdb, $meta_marker, $apm_settings;

            if (isset($this->Parent->post_types[$post_type]['auto_fill'])) {
                $query = "SELECT *
				FROM $wpdb->posts
				WHERE post_type = '$post_type'";
                $posts_list = $wpdb->get_results($query);
                if (count($posts_list) == 0) {
                    echo '<p>Check the new post type "' . $this->Parent->post_types[$post_type]['name'] . '" > Still empty, try to auto fill with values:</p>';
                    foreach ($this->Parent->post_types[$post_type]['auto_fill']['values'] as $k => $o) {
                        switch ($this->Parent->post_types[$post_type]['auto_fill']['type']) {
                            case 'list_of_terms':
                                echo " / " . $o;
                                $my_post = array(
                                    'post_title' => $o,
                                    'post_content' => '',
                                    'post_type' => $post_type,
                                    'post_status' => 'publish',
                                    'post_author' => 1
                                );
                                wp_insert_post($my_post);
                                break;
                        }
                    }
                    $query = "SELECT *
                                        FROM $wpdb->posts
                                        WHERE post_type = '$post_type'";
                    $posts_list = $wpdb->get_results($query);
                    echo '<p>Inserted: ' . count($posts_list) . ' values</p>';
                }
            }
        }

        ////PROCESS THE POST LIST AND FILTER
        function get_all_posts_list_with_meta($post_type, $ar_filters = array(), $no_paging = true, $paging_nb = 0, $nb_pages = 0, $sort_by = 'default', $sort_dir = "ASC") {//$filter_type='post_status',$filter_value='filter_all'){
            global $post, $wpdb, $meta_marker, $apm_settings, $current_user;
            $filter_str = '';

            //echo "////////////////";
            //echo "////".$nb_pages;
            $privacy_nonadmin = false;
            if (isset($this->Parent->post_types[$post_type]['module_datagrid'])) {
                $module_datagrid = $this->Parent->post_types[$post_type]['module_datagrid'];

                if (isset($module_datagrid['privacy_nonadmin'])) {
                    $privacy_nonadmin = $module_datagrid['privacy_nonadmin'];
                }
            }
            /* if (empty($ar_filters->post_status)) {
              if (is_array($ar_filters)) {
              $ar_filters['post_status'] = "filter_all";
              } else {
              $ar_filters->post_status = "filter_all";
              }
              } */
            $paging_str = '';
            $left_join_cat = "";
            $left_join_meta = '';
            $left_join_meta_count = 1;


            //CHEKC SORT BY
            $sort_by_str = " post_title ";
            $innerjoin_sort_meta = "";
            //echo "get_all_posts_list_with_meta***".$sort_by;
            if ($sort_by !== 'default') {
                //var_dump($this->Parent->AM_Core->default_fields[$sort_by]);
                //echo "****".$sort_by."****";
                if (isset($this->Parent->AM_Core->default_fields[$sort_by]['data_type']) or ($this->Parent->AM_Core->default_fields[$sort_by]['field_type'])) {
                    if (isset($this->Parent->AM_Core->default_fields[$sort_by]['data_type'])) {
                        $ty = $this->Parent->AM_Core->default_fields[$sort_by]['data_type'];
                        switch ($ty) {
                            default:
                                break;
                            case 'autocomplete':
                                $ty = 'parent_post';
                                break;
                            case 'select':
                                $ty = 'parent_post';
                                break;
                            case 'autosuggest_multiselect':
                                $ty = 'parent_post';
                                break;
                        }
                    } else {
                        switch ($this->Parent->AM_Core->default_fields[$sort_by]['field_type']) {
                            default:
                                $ty = 'text';
                                break;
                            case 'autocomplete':
                                $ty = 'parent_post';
                                break;
                            case 'select':
                                $ty = 'parent_post';
                                break;
                            case 'autosuggest_multiselect':
                                $ty = 'parent_post';
                                break;
                        }
                    }

                    //INNER JOIN ( SELECT post_id as key_id7, meta_value as sort_by_meta FROM wp_postmeta WHERE meta_key = "instatag_tag_value"  ) k ON a.ID = k.key_id7
                    //$innerjoin_sort_meta.=" LEFT JOIN $wpdb->postmeta as sort_by_meta ON ( $wpdb->posts.ID = sort_by_meta.post_id AND sort_by_meta.meta_key = '".$sort_by.$meta_marker."')";
                    /* $innerjoin_sort_meta.=' INNER JOIN ( SELECT post_id as key_id7, meta_value as sort_by_meta FROM ' . $wpdb->postmeta;
                      $querystr .= ' WHERE meta_key = "'.$sort_by.$meta_marker.'" ';
                      $querystr .= ' ) k ON a.ID = k.key_id7 ' ; */
                    switch ($ty) {
                        case 'bool':
                            $sort_by_str = 'sort_by_meta ' . $sort_dir . ' , post_title';
                            break;
                        case 'int':
                            $sort_by_str = " CAST(`sort_by_meta` AS SIGNED) " . $sort_dir . "  , post_title";
                            break;
                        case 'text':
                            $sort_by_str = 'sort_by_meta ' . $sort_dir . ' , post_title';
                            break;
                        case 'list':
                            $sort_by_str = 'sort_by_meta ' . $sort_dir . ' , post_title';
                            break;
                        case 'parent_post':
                            $sort_by_str = 'meta_title ' . $sort_dir . ' , post_title';
                            break;
                        default:
                            $sort_by_str = 'sort_by_meta ' . $sort_dir . ' , post_title';
                            break;
                    }
                    //echo '////////'.$ty;
                    if ($ty !== "parent_post") {
                        $innerjoin_sort_meta = 'INNER JOIN
						( SELECT post_id as key_id7, meta_value as sort_by_meta
						FROM ' . $wpdb->postmeta . ' WHERE meta_key = "' . $sort_by . $meta_marker . '"  )
						k ON a.ID = k.key_id7 ';
                    } else {
                        $innerjoin_sort_meta = 'INNER JOIN
						( SELECT post_id as key_id7, meta_value as sort_by_meta
						FROM ' . $wpdb->postmeta . ' WHERE meta_key = "' . $sort_by . $meta_marker . '"  )
						k ON a.ID = k.key_id7
						INNER JOIN ( SELECT ID as key_id20, post_title as meta_title FROM ' . $wpdb->posts . ' )
						w ON w.key_id20 = k.sort_by_meta  ';
                    }
                } else {
                    //echo "*******".$sort_by_str."**".$sort_by."----";
                    if ($sort_by !== "post_title" and $sort_by !== "post_name" and $sort_by !== "post_date" and $sort_by !== "" and $sort_by !== " " and $sort_by !== "order") {
                        $sort_by_str = 'sort_by_meta ' . $sort_dir . ' , post_title';
                        $innerjoin_sort_meta = 'INNER JOIN
						( SELECT post_id as key_id7, meta_value as sort_by_meta
						FROM ' . $wpdb->postmeta . ' WHERE meta_key = "' . $sort_by . $meta_marker . '"  )
						k ON a.ID = k.key_id7 ';
                    } else {
                        if ($sort_by == "order") {
                            $sort_by_str = " menu_order ";
                        } else if ($sort_by == "post_date") {
                            $sort_by_str = " post_date ";
                        } else {
                            $sort_by_str = $sort_by;
                        }
                    }
                    //echo "*******".$sort_by_str."**".$sort_by."----";
                }
            }

            //
            // echo '222 filters';
            // var_dump($ar_filters);
            // echo '111' . $ar_filters['post_status'];
            if (!isset($ar_filters['post_status']) or $ar_filters['post_status'] == false) {
                $ar_filters['post_status'] = 'filter_all';
            }
            foreach ($ar_filters as $filter_type => $filter_value) {

                // var_dump($filter_type);
                // var_dump($filter_value);
                if (substr($filter_type, 0, 4) == 'cat_' and $filter_value !== '') {
                    $categ_name = substr($filter_type, 4, strlen($filter_type) - 4);
                    $filter_str.=" AND ";
                    $filter_str.="  $wpdb->term_taxonomy.taxonomy = '$categ_name' ";
                    $filter_str.=" AND ";
                    $filter_str.="  $wpdb->terms.name = '$filter_value' ";
                    $left_join_cat = "
					LEFT JOIN $wpdb->term_relationships ON(a.ID = $wpdb->term_relationships.object_id)
					LEFT JOIN $wpdb->term_taxonomy ON($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
					LEFT JOIN $wpdb->terms ON($wpdb->term_taxonomy.term_id = $wpdb->terms.term_id)
					";
                }

                if (substr($filter_type, 0, 4) == 'key_' and $filter_value !== '' and $filter_value !== 'all') {//  and $filter_value!=='0'
                    $meta_name = substr($filter_type, 4, strlen($filter_type) - 4);
                    $filter_str.="
    					AND restriction$left_join_meta_count.meta_value = '$filter_value'  "; //AND $wpdb->postmeta.meta_key = '".$meta_name.$meta_marker."'
                    $left_join_meta.=" LEFT JOIN $wpdb->postmeta as restriction$left_join_meta_count ON ( a.ID = restriction$left_join_meta_count.post_id AND restriction$left_join_meta_count.meta_key = '" . $meta_name . $meta_marker . "')";
                    $left_join_meta_count++;
                }
                //var_dump($filter_type);
                switch ($filter_type) {
                    case "fievals":
                        if (count($filter_value) > 0 and $filter_value !== false) {
                            foreach ($filter_value as $fki => $fkv) {
                                switch ($fkv->field) {
                                    case 'post_date':
                                        $d = date("Y-m-d", strtotime($fkv->val));
                                        $filter_str.=" AND a.post_date LIKE '" . $d . "%'  ";
                                        // var_dump($d);
                                        break;
                                    default:
                                        $left_join_meta.=" LEFT JOIN $wpdb->postmeta as restriction$left_join_meta_count ON ( a.ID = restriction$left_join_meta_count.post_id AND restriction$left_join_meta_count.meta_key = '" . $fkv->field . $meta_marker . "')";
                                        $filter_str.=" AND restriction$left_join_meta_count.meta_value = '" . $fkv->val . "'  ";
                                        $left_join_meta_count++;
                                        break;
                                }
                            }
                        }
                    case "page_nb":
                        if ($no_paging !== true) {
                            $page = intval($filter_value);
                            if ($page > $nb_pages) {
                                $page = $nb_pages;
                            }
                            if ($page > 0) {
                                $page--;
                            }
                            // echo '- '.$filter_value.' * '.$page;
                            if ($paging_nb !== 0) {
                                $paging_str = ' LIMIT ' . ($page * $paging_nb) . ' , ' . $paging_nb;
                            }
                        }
                        break;
                    case "letter":
                        if ($filter_value == "#") {

                        } else if ($filter_value == "0-9") {
                            $filter_str.=" AND (";
                            $filter_str.="  a.post_title LIKE '0%' ";
                            for ($i = 1; $i < 10; $i++) {
                                $filter_str.=" OR   a.post_title LIKE '" . $i . "%' ";
                            }
                            $filter_str.=" ) ";
                        } else {
                            if ($filter_value !== "" and $filter_value !== false) {
                                $filter_str.=" AND a.post_title LIKE '" . $filter_value . "%' ";
                            }
                        }
                        break;
                    case "free_search":
                        if ($filter_value == "" or $filter_value == 'false') {

                        } else {
                            $filter_str.=" AND a.post_title LIKE '%" . $filter_value . "%' ";
                        }
                        break;
                    case "post_status":
                        //echo $filter_value;
                        switch ($filter_value) {
                            case "filter_all":
                                $filter_str.=" AND (a.post_status = 'publish' OR a.post_status = 'draft' OR a.post_status = 'pending') ";
                                break;
                            case "filter_pub":
                                $filter_str.=" AND (a.post_status = 'publish' ) ";
                                break;
                            case "publish":
                                $filter_str.=" AND (a.post_status = 'publish' ) ";
                                break;
                            case "pending":
                                $filter_str.=" AND (a.post_status = 'pending' ) ";
                                break;
                            case "filter_unpub":
                                $filter_str.=" AND (a.post_status = 'draft' ) ";
                                break;
                            case "draft":
                                $filter_str.=" AND (a.post_status = 'draft' ) ";
                                break;
                            case "filter_trash":
                                $filter_str.=" AND (a.post_status = 'trash' ) ";
                                break;
                            case "trash":
                                $filter_str.=" AND (a.post_status = 'trash' ) ";
                                break;
                        }
                        break;
                }
            }
            $privacysql = '';
            $selectsql = "";
            if (current_user_can('administrator')) {

            } else {
                if ($privacy_nonadmin !== false) {
                    // var_dump($privacy_nonadmin);
                    $privfiel = $privacy_nonadmin['field'];


                    $selectsql.=" , metaassignee.meta_key AS metassikey, metaassignee.meta_value AS metassival ";
                    $left_join_meta.=" LEFT JOIN $wpdb->postmeta as metaassignee ON ( a.ID = metaassignee.post_id  AND metaassignee.meta_key = '" . $meta_name . "assign_to')";
                    $left_join_meta.=" LEFT JOIN $wpdb->postmeta as metasetprivacy ON ( a.ID = metasetprivacy.post_id  AND metasetprivacy.meta_key = '" . $meta_name . $privfiel . "')";
                    $privacysql = ' AND (';
                    $privacysql .= " ( metasetprivacy.meta_value= '0' ) "; //PUBLIC
                    $privacysql .= " OR ( metasetprivacy.meta_value= '1' AND  a.post_author='" . $current_user->ID . "' ) "; //PRIVATE
                    $privacysql .= " OR ( metasetprivacy.meta_value= '2' AND  ( a.post_author='" . $current_user->ID . "' OR  metaassignee.meta_value= '" . $current_user->ID . "' ) ) "; //SHARE
                    $privacysql .= ' ) ';
                }
            }
            $query = "SELECT DISTINCT * $selectsql
                        FROM $wpdb->posts as a
                        LEFT JOIN $wpdb->postmeta ON a.ID = $wpdb->postmeta.post_id
                        $left_join_meta
                        $left_join_cat
                        $innerjoin_sort_meta
                        WHERE   a.post_type = '$post_type' $privacysql
                        $filter_str
                        GROUP BY ID";

            $query .=" 	ORDER BY " . $sort_by_str . " " . $sort_dir . " " . $paging_str;
            $posts_list = $wpdb->get_results($query);
            /* foreach ($posts_list as $p) {
              //var_dump(get_post_meta($p->ID, 'set_privacy', true));
              } */
            // echo "***" . $query;
            // var_dump($posts_list);
            return $posts_list;
        }

        public function set_datagrid_paging($action = false) {
            global $apm_settings;
            $module_name = $this->config['module']['name'];
            $appkey = $this->config['appkey'];
            $modulekey = $this->config['modulekey'];
            $ret = '';
            $nb_by_page = false;
            $page_nb = false;
            if (isset($this->config['module']['module_columns_config'])) {
                $col_config = $this->config['module']['module_columns_config'];
                if (isset($col_config['use_paging']) and $col_config['use_paging'] == true) {

                    $page_nb = 1;
                    if (intval(get_option($appkey . '_page_nb')) > 0) {
                        $page_nb = intval(get_option($appkey . '_page_nb'));
                    }
                    $default_pagin_nb = $this->get_datagrid_paging_nb();
                    $ret.= "Paging: <form action=''  method='post' enctype='multipart/form-data' name='apm_pagin''>";
                    if ($page_nb > 1) {
                        $ret.= "<span class='pagin_prev'>< Prev.<:span>";
                    }
                    $ret.= "Page <input type='page_nb' value='" . $page_nb . "' style='width:25px' /> / 0";
                    $ret.= "</form>";
                    if (isset($col_config['user_can_change_paging_nb_by_module']) and $col_config['user_can_change_paging_nb_by_module'] == true) {
                        if ($action == "get_nb_by_page_form") {
                            if (isset($_REQUEST['default_pagin_nb'])) {
                                $default_pagin_nb = intval($_REQUEST['default_pagin_nb']);
                                update_option($modulekey . '_default_paging_nb', $default_pagin_nb);
                            }
                            $ret = "<p>Records by page: <input type='text' name='default_pagin_nb' value='" . $default_pagin_nb . "' style='width:25px' /></p>";
                        }
                    }
                    switch ($action) {
                        case "header_paging":
                            $ret = "<span class='apm_pagin_header_zone'>";
                            $ret.= "Paging: <span class='apm_page_first inactive'><<</span> <span class='apm_page_prev inactive'><</span> <input type='page_nb' value='" . $page_nb . "' style='width:25px'  class='apm_page_nb' /> <span   class='apm_page_next' >></span> <span   class='apm_page_last' >>></span> ";
                            $ret.= "</span> ";
                            break;
                        case "has_paging":
                            $ret = true;
                            break;
                        case "nb_by_page":
                            $ret = $default_pagin_nb;
                            break;
                        case "initial_page":
                            $ret = $page_nb;
                            break;
                    }
                }
            }
            echo $ret;
        }

        public function get_datagrid_paging_nb($modulekey = '') {
            global $apm_settings, $oThis;
            if (isset($this->config['appkey'])) {
                $appkey = $this->config['appkey'];
                $module = $this->config['module'];
                $modulekey = $this->config['modulekey'];
            } else {
                $module = $oThis->all_modules[$modulekey];
            }
            $module_name = $module['name'];

            $default_pagin_nb = 'all';
            if (isset($module['module_columns_config'])) {
                $col_config = $module['module_columns_config'];
                if (isset($col_config['use_paging']) and $col_config['use_paging'] == true) {
                    $default_pagin_nb = 15;
                    if (isset($col_config['use_global_default_paging_nb']) and $col_config['use_global_default_paging_nb'] == true) {
                        if (get_option('default_paging_nb') !== false and get_option('default_paging_nb') !== '' and intval(get_option('default_paging_nb')) > 0) {
                            $default_pagin_nb = get_option('default_paging_nb');
                        }
                    }
                    if (isset($col_config['nb_by_page']) and intval($col_config['nb_by_page']) > 0) {
                        $default_pagin_nb = intval($col_config['nb_by_page']);
                    }
                    if (isset($col_config['user_can_change_paging_nb_by_module']) and $col_config['user_can_change_paging_nb_by_module'] == true) {
                        if (get_option($modulekey . '_default_paging_nb') !== false and get_option($modulekey . '_default_paging_nb') !== '') {
                            $default_pagin_nb = intval(get_option($modulekey . '_default_paging_nb'));
                        }
                    }
                }
            }

            return $default_pagin_nb;
        }

        public function set_datagrid_header() {
            global $apm_settings, $oThis;
            echo '<th class="apm_grid_head_cb_thtd"><input type="checkbox" value="" name="grid_head_cb" class="apm_grid_head_cb" /></th>';
            echo '<th class="apm_gr_act" title="Actions buttons">Acti.</th>';
            echo '<th title="Status">Sta.</th>';
            if (isset($this->config['module']['module_columns'])) {
                foreach ($this->config['module']['module_columns'] as $column) {
                    $f = $this->default_fields[$column];
                    $label = $f['label'];
                    $clabel = '';
                    $width = '';
                    if (isset($f['column_label'])) {
                        $clabel = $f['column_label'];
                    }
                    if (isset($f['column_width'])) {
                        $width = ' style="width:' . $f['column_width'] . 'px;" ';
                    }

                    $label = $oThis->get_currency($label);
                    $clabel = $oThis->get_currency($clabel);
                    // $label = str_replace("{{currency}}", $apm_settings['configs']['default_currency'], $label);
                    // $clabel = str_replace("{{currency}}", $apm_settings['configs']['default_currency'], $clabel);

                    if ($column == "post_title") {
                        $label = 'Title';
                    }
                    if ($column == "post_date") {
                        $label = 'Date';
                    }
                    if ($column == "featured_image") {
                        $label = 'Image';
                    }
                    if ($column == "menu_order" or $column == "order") {
                        $label = 'Order';
                    }

                    if ($clabel == '') {
                        echo '<th ' . $width . '>' . $label . '</th>';
                    } else {
                        echo '<th  ' . $width . ' title="' . $label . '" >' . $clabel . '</th>';
                    }
                }
            } else {
                echo '<th >Title</th>
					<th>Status</th>
					<th >Date</th>';
            }
            /* echo '<th class="apm_grid_head_cb_thtd"><input type="checkbox" value="" name="grid_head_cb" class="apm_grid_head_cb" /></th>
              <th>Title</th><th>Date</th><th>xxx</th><th>Childs</th><th class="apm_gr_act">Acti.</th>'; */
        }

        public function set_footer() {
            require_once APPLICATION_MAKER_VIEWS_PATH . 'datagrid/apm-datagrid-footer.php';
        }

    }

}