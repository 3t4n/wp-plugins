<?php

if (!class_exists('Application_Maker_setField')) {

    class Application_Maker_setField {

        public function __construct() {
            $this->classSubActions = array();
        }

        public function init($oThis, $config, $post, $meta_marker) { //ADD BUTTON
            $this->add_image = WP_PLUGIN_URL . '/' . WP_PLUGIN_FOLDER . '/img/plus_16.png';
            $this->del_image = WP_PLUGIN_URL . '/' . WP_PLUGIN_FOLDER . '/img/block_16.png';
            $this->help_image = WP_PLUGIN_URL . '/' . WP_PLUGIN_FOLDER . '/img/bugsqa_16.png';
            $this->new_window_image = WP_PLUGIN_URL . '/' . WP_PLUGIN_FOLDER . '/img/new_window_icon.gif';
            $this->calendar_image = site_url() . '/wp-admin/images/date-button.gif';
            $this->config = $config;
            $this->oThis = $oThis;
            $this->classInstances = array();
            $this->hasSaveField = false;
            $this->AbortGlobalSave = false;
            $this->post = $post;
            $this->meta_marker = $meta_marker;
            $this->is_edit = false;
            if (isset($_GET['action']) and $_GET['action'] == "edit") {
                $this->is_edit = true;
            }
        }

        public function getViewTpl($clsname, $tpl) {

            global $oThis;
            //var_dump($oThis->extensions);


            $str = "";
            $path = APPLICATION_MAKER_PATH . 'extensions/fields_types/' . $clsname . "/views/";
            if (!file_exists($path)) {
                $path = APPLICATION_MAKER_PATH . 'extensions/ui_elements/' . $clsname . "/views/";
            }
            if (!file_exists($path)) {
                $path = APPLICATION_MAKER_PATH . 'extensions/pro_extensions/' . $clsname . "/views/";
            }
            $r = fopen($path . $tpl, 'r');
            $str.= fread($r, filesize($path . $tpl));
            fclose($r);


            return $str;
        }

        public function getHasSaved() {
            echo "555";
        }

        public function getSuggest() {
            return false;
        }

        public function hasSubAction($subaction) {
            $has = false;
            foreach ($this->classSubActions as $k => $subact) {
                if ($subact == $subaction) {
                    $has = true;
                }
            }
            return $has;
        }

    }

}


if (!class_exists('Application_Maker_Extensions')) {

    class Application_Maker_Extensions {

        // CONSTRUCTOR


        public function __construct() { //ADD BUTTON
            $this->add_image = WP_PLUGIN_URL . '/' . WP_PLUGIN_FOLDER . '/img/plus_16.png';
            $this->del_image = WP_PLUGIN_URL . '/' . WP_PLUGIN_FOLDER . '/img/block_16.png';

			global $main_config,$apm_settings ,$current_user;

			if($main_config['other_roles'] != ''){
				$new_roles = explode(',',$main_config['other_roles']);

				$AdaptRole2 = get_role('editor');
				$caps2 = $AdaptRole2->capabilities;

				 //remove_role('tax_agent');
				// remove_role('tax_office');

				foreach($new_roles as $role){
					remove_role($role);
					$result = add_role($role, $role, $caps2);

					if($result != null){
						$role = get_role($role);
						$role->add_cap('apm_cap');

						$role->remove_cap('manage_categories');
						$role->remove_cap('manage_links');
						$role->remove_cap('moderate_comments');
					}
				}
			}

        }

        //

        public function getLatestActivities($mainkey, $moduleslist, $nbr = 20, $widg = false) {
            global $oThis, $wpdb, $current_user, $meta_marker;
            $activities = array();
            $moduleslistar = explode(',', $moduleslist);
            foreach ($moduleslistar as $k => $mod) {
                $moduleslistar[$k] = "'" . $mod . "'";
            }
            $modulestr = implode(',', $moduleslistar);
            /*  $q = array(
              // Leave this as "post" if you just want blog posts
              'post_type' => $moduleslist,
              'post_status' => array('publish', 'draft', 'pending'),
              'posts_per_page' => intval($nbr),
              //  'orderby' => $sortby,
              'order' => 'DESC'
              );
              $posts_query = new WP_Query($q);
              $posts = & $posts_query->posts; */
            if ($nbr == '' or $nbr == false) {
                $nbr = 20;
            }
            /*  $query = "SELECT *
              FROM $wpdb->posts
              WHERE post_type IN (" . $modulestr . ")
              AND post_status IN ('publish', 'draft', 'pending')
              ORDER BY post_date DESC
              LIMIT 0,$nbr "; */

            if (current_user_can('administrator')) {

                $query = "SELECT *
              FROM $wpdb->posts

              WHERE post_type IN (" . $modulestr . ")
              AND post_status IN ('publish', 'draft', 'pending')
              ORDER BY post_date DESC
              LIMIT 0,$nbr ";
            } else {
                $uid = $current_user->ID;
                $query = "SELECT DISTINCT  post_title, post_name , ID, post_status, post_date, post_type, post_author,post_modified, metaprivacy.meta_value as set_privacy
              FROM $wpdb->posts
              INNER JOIN $wpdb->postmeta  as metaprivacy  ON $wpdb->posts.ID = metaprivacy.post_id
               INNER JOIN $wpdb->postmeta as metaassignee ON  $wpdb->posts.ID = metaassignee.post_id
              WHERE post_type IN (" . $modulestr . ")
              AND ((post_author = $uid AND metaprivacy.meta_value = '1'  AND metaprivacy.meta_key = '" . $meta_name . "set_privacy')
                  OR ( metaprivacy.meta_value = '0'  AND metaprivacy.meta_key = '" . $meta_name . "set_privacy')
                  OR ( metaprivacy.meta_value = '2'  AND metaprivacy.meta_key = '" . $meta_name . "set_privacy' AND post_author = $uid )
                  OR ( metaprivacy.meta_value = '2'  AND metaprivacy.meta_key = '" . $meta_name . "set_privacy' AND metaassignee.meta_key = '" . $meta_name . "assign_to' AND metaassignee.meta_value = '$uid'  ))
              AND post_status IN ('publish', 'draft', 'pending')
              ORDER BY post_date DESC
              LIMIT 0,$nbr ";
            }
            // AND (meta_value=''
            // var_dump($query);
           // echo $query;
            $posts_list = $wpdb->get_results($query);
            // var_dump($posts_list);
            return $posts_list;
        }

        public function getModuleNumbers($app) {
            global $oThis, $wpdb, $current_user, $meta_marker;
            $armodsnum = array();
            foreach ($app['modules'] as $k => $module) {

                $sql = "SELECT COUNT(*) as total FROM $wpdb->posts  WHERE  $wpdb->posts.post_type='" . $k . "' AND (post_status = 'publish' )  ";
                $post = $wpdb->get_row($sql);
                $armodsnum[$k]['total'] = $post->total;

                $current_user = wp_get_current_user();
                $user_id = $current_user->ID;
                $sql = "SELECT COUNT(*) as total_mine FROM $wpdb->posts  WHERE  $wpdb->posts.post_type='" . $k . "' AND (post_status = 'publish' ) AND post_author='" . $user_id . "'  ";
                $post = $wpdb->get_row($sql);
                $armodsnum[$k]['total_mine'] = $post->total_mine;
                $sql = "SELECT COUNT(*) as total_assignme FROM $wpdb->posts as a ";
                $sql.="LEFT JOIN $wpdb->postmeta as postmeta ON  a.ID = postmeta.post_id ";
                $sql.="WHERE a.post_type='" . $k . "' AND (post_status = 'publish' )   ";
                $sql.="	AND postmeta.meta_key='assign_to" . $meta_marker . "' AND postmeta.meta_value='" . $user_id . "' ";
                $post = $wpdb->get_row($sql);
                $armodsnum[$k]['total_assignme'] = $post->total_assignme;
                //LEFT JOIN $wpdb->postmeta as restriction$left_join_meta_count ON ( a.ID = restriction$left_join_meta_count.post_id AND restriction$left_join_meta_count.meta_key = '" . $meta_name . $meta_marker . "')
            }
            return $armodsnum;
        }

        public function doAppDashboardHome($mainkey, $widgetkey, $oThis, $appLabel) {
            global $apm_settings;
            // echo 'dfgdfhdf'.$appLabel.$mainkey.$widgetkey;
            $app = $oThis->applications[$mainkey];
            $widg = $app['widgets'][$widgetkey];
            if (isset($widg['show_dashboard_link']) and $widg['show_dashboard_link'] == true) {
                include APPLICATION_MAKER_PATH . 'views/dashboard/show_dashboard_link.php';
            }

            //var_dump($widg);
            if (isset($widg['type'])) {
                switch ($widg['type']) {
                    case 'list_modules':
                        $armodsnum = $this->getModuleNumbers($app);
                        include APPLICATION_MAKER_PATH . 'views/dashboard/show_dashboard_modules.php';
                        break;

                    case 'latests':
                        $nbr = $widg['default_nbr'];
                        if (isset($widg['option_nbr_name'])) {
                            $nbrtest = get_option($widg['option_nbr_name']);
                            if ($nbrtest !== false and $nbrtest !== '') {
                                $nbr = intval($nbrtest);
                            }
                        }
                        $activities = $this->getLatestActivities($mainkey, $widg['modules'], $nbr, $widg);
                        include APPLICATION_MAKER_PATH . 'views/dashboard/show_dashboard_latest.php';
                        break;

                    case 'list_yourtax':
                        include APPLICATION_MAKER_PATH . 'lib/widgets/show_dashboard_list_yourtax.php';
                        break;
                    case 'agent_earning_widget':
                        include APPLICATION_MAKER_PATH . 'lib/widgets/show_dashboard_agent_earning.php';
                        break;
                    case 'status_widget':
                        include APPLICATION_MAKER_PATH . 'lib/widgets/show_dashboard_status.php';
                        break;
                    case 'list_widget':
                        include APPLICATION_MAKER_PATH . 'lib/widgets/show_dashboard_list_widget.php';
                        break;
                }
            }
        }

        public function getExtensionsAction($subaction) {
            global $apm_settings, $oThis;
            // echo ' start getExtensionsAction ' . $subaction;
            foreach ($oThis->extensions->extensions as $k => $ext) {
                //echo "<br> EXT BASE " . $ext;
                $filepath = APPLICATION_MAKER_PATH . 'extensions/fields_types/' . $ext . '/classes/' . $ext . '.php';
                if (!file_exists($filepath)) {
                    $filepath = APPLICATION_MAKER_PATH . 'extensions/ui_elements/' . $ext . "/classes/" . $ext . '.php';
                }
                if (!file_exists($filepath)) {
                    $filepath = APPLICATION_MAKER_PATH . 'extensions/pro_extensions/' . $ext . "/classes/" . $ext . '.php';
                }
                // echo "<br> filepath ".$filepath;
                if (file_exists($filepath)) {
                    //echo "<br> EXIST filepath ".$filepath;
                    include $filepath;
                    if (isset($oThis->extension_class_instances[$ext]->classSubActions)) {
                        // echo "<br> EXT " . $ext;
                        // var_dump($oThis->extension_class_instances[$ext]->classSubActions);
                        foreach ($oThis->extension_class_instances[$ext]->classSubActions as $ks => $sub) {
                            if ($sub == $subaction) {
                                //echo ' ok subaction '.$subaction;
                                $oThis->extension_class_instances[$ext]->$subaction();
                            }
                        }
                    };
                }
            }
            // echo ' end  getExtensionsAction ';
        }

        public function getListExtensions() {
            global $apm_settings;
            $this->getExtensionsFilesList("init");
        }

        public function manageExtensions() {
            global $apm_settings;
            $this->getListExtensions();
            $clearcache = "false";
            if (isset($_REQUEST['clearcache'])) {
                $clearcache = $_REQUEST['clearcache'];
            }
            if (isset($_GET['type'])) {
                $this->getExtensionsFiles($_GET['type']);
            } else {
                //wp_register_script('application_maker_extensions_js', $apm_settings['paths']['ajax_url'] . '?action=apm_extensions&subaction=get_extensions_files&type=js&clearcache=' . $clearcache, array('application_maker_script'), null);
                wp_register_script('application_maker_extensionslang_js', $apm_settings['paths']['extensions'] . 'cache/cache_jslangs.js', array('application_maker_script'), null);
                wp_enqueue_script('application_maker_extensionslang_js');
                wp_register_script('application_maker_extensions_js', $apm_settings['paths']['extensions'] . 'cache/cache_jsextensions.js', array('application_maker_script'), null);
                wp_enqueue_script('application_maker_extensions_js');

                //wp_enqueue_style('application_maker_extensions_css', $apm_settings['paths']['ajax_url'] . '?action=apm_extensions&subaction=get_extensions_files&type=css&clearcache=' . $clearcache);
                wp_enqueue_style('application_maker_extensions_css', $apm_settings['paths']['extensions'] . 'cache/cache_style.css');
                //wp_register_script('application_maker_extensions_views', $apm_settings['paths']['ajax_url'] . '?actio.n=apm_extensions&subaction=get_extensions_files&type=views&clearcache=' . $clearcache, array('application_maker_script'), null);
                wp_register_script('application_maker_extensions_views', $apm_settings['paths']['extensions'] . 'cache/cache_jsviews.js', array('application_maker_script'), null);
                wp_enqueue_script('application_maker_extensions_views');
                //$this->getExtensionsFiles('classes');
                return $this->extensions_files;
            }
        }

        public function getExtensionsSuggest() {
            global $apm_settings, $oThis;
            $str = $_POST['str'];
            $nbsent = $_POST['nbsent'];
            $entity = $_POST['entity'];
            $check_extensions = false;
            $result = false;
            foreach ($oThis->extensions->extensions as $k => $ext) {
                if ($ext == $entity) {
                    $check_extensions = true;
                    $path = $oThis->extensions->clss[$ext][0]['path'] . $oThis->extensions->clss[$ext][0]['filename'];
                    //var_dump($oThis->extensions->clss[$ext]);
                    require_once $path;
                    $res = $oThis->extension_class_instances[$ext]->getSuggest($str);
                    if ($res == false) {
                        $result = false;
                    } else {
                        $result = $res;
                    }
                }
            }
            if ($check_extensions == false) {

            }
            if ($result == false) {
                $send = array(
                    'result' => false,
                    'nbsent' => $nbsent,
                    'count' => 0,
                );
            } else {
                $send = array(
                    'result' => $result,
                    'nbsent' => $nbsent,
                    'count' => count($result),
                );
            }
            echo json_encode($send);
        }

        public function getExtensionsData() {

            $type = $_POST['type'];
            $field = $_POST['field'];
            switch ($type) {
                case 'category':
                    $cate = $_POST['name'];
                    $args = array(
                        'taxonomy' => $cate,
                        'hide_empty' => 0,
                        //'parent' => $parent,
                        'orderby' => 'name',
                        'order' => 'ASC'
                    );
                    $categs = get_categories($args);
                    $categs2 = array();
                    foreach ($categs as $k => $cat) {
                        $catt = array();
                        $car = get_objects_in_term($cat->cat_ID, $cate);
                        $c = count($car);
                        $catt['id'] = $cat->cat_ID;
                        $catt['name'] = $cat->name;
                        $catt['count'] = $c;
                        $categs2[] = $catt;
                    };
                    $return = array(
                        'category' => $cate,
                        'field' => $field,
                        'data' => $categs2,
                    );
                    echo json_encode($return);
                    break;
            }
        }

        public function getExtensionsFilesListLoop($handle, $type = 'init', $folderpath = 'fields_types') {
            global $post_types, $oThis, $show_help, $apm_settings;


            $entries = array();
            while (false !== ($entry = readdir($handle))) {
                $entries[] = $entry;
            }
            sort($entries);

            foreach ($entries as $ke => $entry) {
                if ($entry !== "." and $entry !== ".." and $entry !== ".svn") {
                    $my_extensions[] = $entry;
                    $subhandle = opendir(APPLICATION_MAKER_PATH . 'extensions/' . $folderpath . '/' . $entry);
                    $this->extensions_files->extensions[] = $entry;
                    //echo $entry."---";
                    while (false !== ($subentry = readdir($subhandle))) {
                        if ($subentry !== "." and $subentry !== ".." and $subentry !== ".svn") {
                            //  if( isset(dir(APPLICATION_MAKER_PATH . 'extensions/fields_types/'.$entry."/".$subentry)) ){
                            if ($subentry == "css" or $subentry == "js" or $subentry == "classes" or $subentry == "views" or $subentry == "langs") {
                                $filehandle = opendir(APPLICATION_MAKER_PATH . 'extensions/' . $folderpath . '/' . $entry . "/" . $subentry . "/");
                                while (false !== ($sfileentry = readdir($filehandle))) {
                                    if ($sfileentry !== "." and $sfileentry !== ".." and $sfileentry !== ".svn") {
                                        $fil = array();
                                        $fil['filename'] = $sfileentry;
                                        if (is_dir(APPLICATION_MAKER_PATH . 'extensions/' . $folderpath . '/' . $entry . "/" . $subentry . "/")) {

                                            $fil['path'] = APPLICATION_MAKER_PATH . 'extensions/' . $folderpath . '/' . $entry . "/" . $subentry . "/";
                                            $fil['filetype'] = $subentry;
                                            $fil['extension'] = $entry;
                                            switch ($subentry) {
                                                case "css":
                                                    $this->extensions_files->css[$entry][] = $fil;
                                                    break;
                                                case "js":
                                                    $this->extensions_files->js[$entry][] = $fil;
                                                    break;
                                                case "langs":
                                                    $this->extensions_files->lang[$entry][] = $fil;
                                                    break;
                                                case "classes":
                                                    $this->extensions_files->clss[$entry][] = $fil;
                                                    break;
                                                case "views":
                                                    $this->extensions_files->views[$entry][] = $fil;
                                                    break;
                                            }
                                        }
                                    }
                                }
                            } // }
                        }
                    }
                    /* require_once APPLICATION_MAKER_PATH . 'applications/fields/' . $entry;
                      foreach ($local_custom_fields as $key => $field) {
                      $my_custom_fields[$key] = $field;
                      } */
                }
            }
            closedir($handle);
        }

        public function getExtensionsFilesList($type = 'init') {
            global $post_types, $oThis, $show_help, $apm_settings;

            $this->extensions_files = (Object) array();
            $this->extensions_files->css = array();
            $this->extensions_files->clss = array();
            $this->extensions_files->js = array();
            $this->extensions_files->views = array();
            $this->extensions_files->extensions = array();
            // $my_extensions_cls = array();
            //$my_extensions_js = array();
            //$my_extensions_views = array();
            if ($handle = opendir(APPLICATION_MAKER_PATH . 'extensions/fields_types/')) {
                $this->getExtensionsFilesListLoop($handle, $type, 'fields_types');
            }
            if ($handle = opendir(APPLICATION_MAKER_PATH . 'extensions/ui_elements/')) {
                $this->getExtensionsFilesListLoop($handle, $type, 'ui_elements');
            }
            if (is_dir(APPLICATION_MAKER_PATH . 'extensions/pro_extensions/')) {
                if ($handle = opendir(APPLICATION_MAKER_PATH . 'extensions/pro_extensions/')) {
                    $this->getExtensionsFilesListLoop($handle, $type, 'pro_extensions');
                }
            }
        }

        public function getExtensionsFiles($type = 'init') {
            global $post_types, $oThis, $main_config, $show_help, $apm_settings, $clearcache;
            //$apm_settings['extensions']
            $clearcache = "true";
            //$clearcache = "false";
            // if (isset($_REQUEST['clearcache'])) {
            //   $clearcache = $_REQUEST['clearcache'];
            //}
            switch ($type) {
                case "css":
                    if ($clearcache == "false") {
                        header("Last-Modified: " . date('D, d M Y H:i:s', time() + (60 * 60 * 24 * 45)) . ' GMT');
                        header("HTTP/1.0 304 Not Modified");
                    }
                    header("Content-type: text/css", true);
                    if ($clearcache == "false") {
                        header('Expires: ' . date('D, d M Y H:i:s', time() + (60 * 60 * 24 * 45)) . ' GMT');
                    }
                    $str = "";
                    $css_contents = '';
                    foreach ($this->extensions_files->css as $k => $css) {
                        foreach ($css as $subk => $subo) {
                            $f = $subo['path'] . $subo['filename'];
                            //require_once $f;
                            if (file_exists($f)) {
                                $handle = fopen($f, 'r');
                                if ($handle !== false) {
                                    $css_contents .= fread($handle, filesize($f));
                                    fclose($handle);
                                }
                            }
                        }
                    }
                    //echo $css_contents;
                    $file = APPLICATION_MAKER_PATH . 'extensions/cache/cache_style.css';
                    file_put_contents($file, $css_contents);
                    echo ' cache css styles set ';
                    break;
                case "js":
                    if ($clearcache == "false") {
                        header("Last-Modified: " . date('D, d M Y H:i:s', time() + (60 * 60 * 24 * 45)) . ' GMT');
                        header("HTTP/1.0 304 Not Modified");
                    }
                    Header("content-type: application/x-javascript");
                    if ($clearcache == false) {
                        header('Expires: ' . date('D, d M Y H:i:s', time() + (60 * 60 * 24 * 45)) . ' GMT');
                    }
                    $str = "";
                    $langdefault = array();
                    $langselect = array();
                    $cnt = 0;
                    foreach ($this->extensions_files->lang as $k => $js) {
                        foreach ($js as $subk => $subo) {
                            $f = $subo['path'] . $subo['filename'];
                            if ($main_config['lang'] == 'en') {
                                if (strpos($f, '_' . $main_config['lang']) > -1) {
                                    $langselect[] = $f;
                                    $langdefault[] = $f;
                                }
                            } else {

                                if (strpos($f, '_' . $main_config['lang']) > -1) {
                                    $langselect[] = $f;
                                } else if (strpos($f, '_en') > -1) {
                                    $langdefault[] = $f;
                                }
                            }
                        }
                    }

                    $js_contents = '';
                    foreach ($langdefault as $k => $lg) {

                        if ($main_config['lang'] !== 'en') {
                            $f = $lg;
                            foreach ($langselect as $ks => $lgs) {
                                // echo $lgs . '<br>';
                                // echo '******************' . str_replace('_' . $main_config['lang'], '_en', $lgs) . ' ---- ' . $lg;
                                if (str_replace('_' . $main_config['lang'], '_en', $lgs) == $lg) {//Has a lang for this en file
                                    $f = $lgs;
                                }
                            }
                            if (file_exists($f)) {
                                $handle = fopen($f, 'r');
                                if ($handle !== false) {
                                    $js_contents .= fread($handle, filesize($f));
                                    fclose($handle);
                                }
                            }
                            // echo $js_contents;
                            $file = APPLICATION_MAKER_PATH . 'extensions/cache/cache_jslangs.js';
                            file_put_contents($file, $js_contents);
                            echo ' cache js langs set ';
                            // require_once $f;
                        } else {
                            // echo $lg . '<br>';
                            // echo '******************';

                            if (file_exists($lg)) {
                                $handle = fopen($lg, 'r');
                                if ($handle !== false) {
                                    $js_contents .= fread($handle, filesize($lg));
                                    fclose($handle);
                                }
                            }
                            //echo $js_contents;
                            $file = APPLICATION_MAKER_PATH . 'extensions/cache/cache_jslangs.js';
                            file_put_contents($file, $js_contents);
                            echo ' cache js langs set ';
                            // require_once $lg;
                        }
                    }
                    //var_dump($langdefault);
                    //var_dump($langselect);
                    // var_dump($this->extensions_files->js);
                    $js_contentslibs = 'flg_apm.siteurl="' . site_url() . '";
                        flg_apm.pluginurl="' . site_url() . '/wp-content/plugins/' . $apm_settings['plugin']['name'] . '";
                            ';
                    foreach ($this->extensions_files->js as $k => $js) {
                        foreach ($js as $subk => $subo) {
                            $f = $subo['path'] . $subo['filename'];
                            //require_once $f;
                            if (file_exists($f)) {
                                $handle = fopen($f, 'r');
                                if ($handle !== false) {
                                    $js_contentslibs .= fread($handle, filesize($f));
                                    fclose($handle);
                                }
                            }
                        }
                    }
                    $file = APPLICATION_MAKER_PATH . 'extensions/cache/cache_jsextensions.js';
                    file_put_contents($file, $js_contentslibs);

                    echo ' cache js libs set ';
                    //echo $js_contentslibs;
                    //echo $str;
                    break;
                case "classes":
                    $str = "";
                    /* foreach($my_extensions_cls as $k=>$cls){
                      $f=$cls['path'].$cls['filename'];
                      require_once $f;
                      } */
                    break;
                case "views":
                    $str = "";
                    if ($clearcache == "false") {
                        header("Last-Modified: " . date('D, d M Y H:i:s', time() + (60 * 60 * 24 * 45)) . ' GMT');
                        header("HTTP/1.0 304 Not Modified");
                    }
                    Header("content-type: application/x-javascript");
                    if ($clearcache == false) {
                        header('Expires: ' . date('D, d M Y H:i:s', time() + (60 * 60 * 24 * 45)) . ' GMT');
                    }

                    $js_views = " var my_extensions_views=[];
                        ";
                    foreach ($this->extensions_files->views as $k => $view) {
                        foreach ($view as $subk => $subo) {
                            $f = $subo['path'] . $subo['filename'];
                            $fna = explode('.', $subo['filename']);
                            $fn = $fna[0];

                            if (file_exists($f)) {
                                $handle = fopen($f, 'r');
                                if ($handle !== false) {
                                    $contents = fread($handle, filesize($f));
                                    fclose($handle);
                                }
                            }
                            $c = addslashes($contents);
                            $c = trim($c);
                            $c = str_replace(array("\r\n", "\r", "\n"), "", $c);
                            $js_views.= "
                                            my_extensions_views['" . $fn . "']={tpl:'" . $c;
                            $js_views.= "'};";
                        }
                    }

                    $file = APPLICATION_MAKER_PATH . 'extensions/cache/cache_jsviews.js';
                    file_put_contents($file, $js_views);
                    //echo $js_views;
                    echo ' cache views set ';
                    break;
            }
            /*
              foreach($my_extensions_js as $k=>$js){
              var_dump($js);
              }
              foreach($my_extensions_css as $k=>$css){
              var_dump($css);
              }
              foreach($my_extensions_cls as $k=>$cls){
              var_dump($cls);
              } */
        }

    }

}
