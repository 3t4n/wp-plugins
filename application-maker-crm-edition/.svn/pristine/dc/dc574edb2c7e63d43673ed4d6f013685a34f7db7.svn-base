<?php

if (!class_exists('Application_Maker_AppSettings')) {

    class Application_Maker_AppSettings extends Application_Maker {

        // CONSTRUCTOR


        public function Application_Maker_AppSettings() {

            $this->add_image = WP_PLUGIN_URL . '/' . WP_PLUGIN_FOLDER . '/img/plus_16.png';
            $this->del_image = WP_PLUGIN_URL . '/' . WP_PLUGIN_FOLDER . '/img/block_16.png';
        }

        public function init() {
            
        }

        public function do_page($args) {
            global $oThis, $apm_settings, $meta_marker, $wpdb, $post_types, $current_user;

            $appNametop = str_replace('toplevel_page_', '', current_filter());
            $appNameAr = explode('_', $appNametop);
            $appName = $appNameAr[0];
            $opappLabel = get_option($appName . '_app_name');
            $opappMenuName = get_option($appName . '_app_menuname');
            $opappActive = get_option($appName . '_app_active');
            $appLabel = $oThis->applications[$appName]['singular_name'];
            if ($opappLabel !== '' and $opappLabel !== false and !empty($opappLabel)) {
                $appLabel = $opappLabel;
            }
            if (isset($_GET['action-type'])) {
                $action_type = $_GET['action-type'];
                switch ($action_type) {
                    case 'convert':
                        require_once APPLICATION_MAKER_PATH . 'views/apm-converter.php';
                        break;
                }
            } else {
                $appIntrotext = '';
                $appHometext = '';
                $appFootertext = '';
                if ($args['page_type'] == 'origamisettings') {
                    require_once APPLICATION_MAKER_PATH . 'views/origami_settings.php';
                } else {
                    $appIntrotext = '';
                    $appHometext = '';
                    $appFootertext = '';
                    if (isset($oThis->applications[$appName]['intro_page_text'])) {
                        $appIntrotext = '<p>' . $oThis->applications[$appName]['intro_page_text'] . '</p>';
                        $appIntrotext = str_replace('{{appname}}', $appLabel, $appIntrotext);
                    }
                    if (isset($oThis->applications[$appName]['intro_home_text'])) {
                        $appHometext = '<p>' . $oThis->applications[$appName]['intro_home_text'] . '</p>';
                        $appHometext = str_replace('{{appname}}', $appLabel, $appHometext);
                    }
                    if (isset($oThis->applications[$appName]['intro_homefooter_text'])) {
                        $appFootertext = '<p>' . $oThis->applications[$appName]['intro_homefooter_text'] . '</p>';
                    }
                    require_once APPLICATION_MAKER_PATH . 'views/apm-settings-top.php';


                    require_once APPLICATION_MAKER_PATH . 'views/apm-home-footer.php';
                }
            }
        }

        public function apm_ajax_savesettings() {
            global $oThis, $apm_settings, $meta_marker, $wpdb, $post_types;
            $do_ajax = $_POST['do_ajax'];
            var_dump($_POST);
            switch ($do_ajax) {
                case 'save_never_see_anymore':
                    $this->save_never_see_anymore();
                    break;
                case 'save_hideaskstat':
                    $this->save_hideaskstat();
                    break;
                case 'save_hidepollpro':
                    $this->save_hidepollpro();
                    break;
            }
            die();
        }

        public function save_hidepollpro() {
            global $oThis, $current_user, $apm_settings, $meta_marker, $wpdb, $post_types;
            // echo $current_user->ID . '--' . $id;
            update_option('set_pollpro', 'hide');
        }

        public function save_hideaskstat() {
            global $oThis, $current_user, $apm_settings, $meta_marker, $wpdb, $post_types;
            // echo $current_user->ID . '--' . $id;
            update_option('statsapproove', 'hide');
        }

        public function save_never_see_anymore() {
            global $oThis, $current_user, $apm_settings, $meta_marker, $wpdb, $post_types;
            $id = $_POST['id'];
            // echo $current_user->ID . '--' . $id;
            update_option('neveragain_' . $id . "_" . $current_user->ID, 'hide');
        }

        public function do_settings_page($args) {
            global $oThis, $apm_settings, $meta_marker, $wpdb, $post_types;
            // var_dump($args);
            $args['page_type'] = 'settings';
            $args['page_type_label'] = 'Modules & Settings';
            $this->do_page($args);
        }

        public function do_home_page($args) {
            global $oThis, $apm_settings, $meta_marker, $wpdb, $post_types;
            // var_dump($args);
            $args['page_type'] = 'home';
            $args['page_type_label'] = 'Home';
            $this->do_page($args);
        }

        public function do_link_page($args) {
            global $oThis, $apm_settings, $meta_marker, $wpdb, $post_types;
            // var_dump($args);
            $args['page_type'] = 'cc';
            $args['page_type_label'] = 'ccc';
            echo 'dddddd';
            //$this->do_page($args);
        }

        public function before_widget($key, $label) {
            global $oThis;

            $html =
                    '<div id="fgl_dashboard_widget_' . $key . '" class="postbox">
                        <div class="handlediv" title="Click to toggle" to-toggle="toggle_' . $key . '">
                            <br>
                        </div>
                        <h3 class="hndle">
                            <span>' . $label . '</span>
                        </h3>
                        <div class="inside toggle_' . $key . '">';
            return $html;
        }

        public function after_widget() {
            $html =
                    '</div></div>';
            return $html;
        }

        public function show_widget($widg) {
            global $oThis;

            echo $this->before_widget($widg['widgetkey'], $widg['label']);
            $oThis->AM_Extensions->doAppDashboardHome($widg['data_content']['mainkey'], $widg['widgetkey'], $oThis, $widg['data_content']['applabel']);
            echo $this->after_widget();
        }

        public function generate_widget($key) {
            global $oThis;
            
            $content = array();
            foreach ($oThis->applications as $mainkey => $application) {
                $appli_widg = $application ['widgets'];
                if (count($appli_widg) > 0) {
                    foreach ($appli_widg as $widgetkey => $widget) {
                        $name = strtolower($widget["name"]);
                        $name = $this->get_word_from_number($name);
                        $lab = $widget['label'];
                        $opappLabel = get_option($mainkey . '_app_name');
                        $appLabel = $application['singular_name'];
                        if ($opappLabel !== '' and $opappLabel !== false and !empty($opappLabel)) {
                            $appLabel = $opappLabel;
                        }
                        $lab = str_replace('{{appname}}', $appLabel, $lab);
                        if (isset($widget['default_nbr'])) {
                            $nbr = $widget['default_nbr'];
                        } else {
                            $nbr = 20;
                        }
                        if (isset($widget['option_nbr_name'])) {
                            $nbrtest = get_option($widget['option_nbr_name']);
                            if ($nbrtest !== false and $nbrtest !== '') {
                                $nbr = intval($nbrtest);
                            }
                        }

                        $bool = false;
                        if (current_user_can('administrator')) {
                            $bool = true; //
                        } else {
                            if (isset($application ['option_isactive_name'])) {
                                $option_isactive_name = $application ['option_isactive_name'];
                                $isactive = get_option($option_isactive_name);
                                if ($isactive !== 'off') {
                                    $bool = true; //
                                }
                            }
                        }
                        $lab = str_replace('{{nbr}}', $nbr, $lab);

                        if (isset($widget['roles_authorized']) and $widget['roles_authorized'] != '' and $bool)
                            $bool = $this->check_roles_authorized($widget['roles_authorized']);

                        if (isset($widget['hide_admin']) and $widget['hide_admin'] == true and current_user_can('administrator'))
                            $bool = false;

                        $widg = $widget;
                        $boolsub = false;
                        if (isset($widg['dashboard_type'])) {
                            $widgtype = $widg['dashboard_type'];
                        } else {
                            $widgtype = 'default';
                        }

                        if (strpos($widgtype, ',') == -1) {
                            if ($widgtype == $oThis->special_links[$key]['widget_type']) {
                                $boolsub = true;
                            }
                        } else {
                            $dashtypes = explode(',', $widgtype);
                            foreach ($dashtypes as $kd => $dasht) {
                                if ($dasht == $oThis->special_links[$key]['widget_type']) {
                                    $boolsub = true;
                                }
                            }
                        }

                        if ($bool and $boolsub) {
                            $pos = explode('.', $widget[position]);
                            $data_content = array('mainkey' => $mainkey, 'applabel' => $appLabel);
                            $data = array('widgetkey' => $widgetkey, 'label' => $lab, 'data_content' => $data_content);
                            if ($pos[0] === '1'){
                                if(!isset($content[0][$pos[1]]))
                                    $content[0][$pos[1]] = $data;
                                else 
                                    $content[0][] = $data;
                            }
                                
                            elseif ($pos[0] === '2'){
                                if(!isset($content[1][$pos[1]]))
                                    $content[1][$pos[1]] = $data;
                                else 
                                    $content[1][] = $data;
                            }
                            elseif ($pos[0] === '3'){
                                if(!isset($content[2][$pos[1]]))
                                    $content[2][$pos[1]] = $data;
                                else 
                                    $content[2][] = $data;
                            }
                            else{
                                $content[0][] = $data;
                            }
                        }
                    }
                }
            }
            ksort($content[0]);
            ksort($content[1]);
            ksort($content[2]);
            
            return $content;
        }

        public function do_link_url_action($key) {
            global $oThis, $apm_settings, $meta_marker;
            // header('Location: '.$oThis->special_links[$key]['url']);
            // wp_redirect($oThis->special_links[$key]['url']);
            //echo 'do_link_url_action '.$key;
            // echo '<br>do_link_url_action '.$oThis->special_links[$key]['url'];
            if (!isset($oThis->special_links[$key]['dash_view'])) {
                echo "<script>
                 document.location.href='" . $oThis->special_links[$key]['url'] . "';
                  </script>";
            } else {
                $content = $this->generate_widget($key);
                include APPLICATION_MAKER_PATH . 'views/dashboard/custom/' . $oThis->special_links[$key]['dash_view'] . '.php';
                echo 
                    '<script>
                        $(document).ready(function(){
                            $(".wp-has-submenu").mouseover(function() {
                                $(this).addClass("opensub");
                            });
                            $(".wp-has-submenu").mouseout(function() {
                                $(this).removeClass("opensub");
                            });
                            $(".handlediv").click(function() {
                                var id_to_toggle = $(this).attr("to-toggle");
                                $("."+id_to_toggle).toggle();
                            });
                            $(".js .postbox .hndle").css("cursor", "default");
                            $(".js .widget .widget-top, .js .postbox h3").css("cursor", "default");
                        });
                    </script>';
                exit;
            }
        }

        public function do_link_url($args) {
            global $oThis, $apm_settings, $meta_marker, $wpdb, $post_types;
            $key = $_GET['page'];
            $key = str_replace('_home', '', $key);
            add_action('do_link_url_action', array($this, 'do_link_url_action'), 10, 2);
            $args = array();
            do_action('do_link_url_action', $key);
            // var_dump($key);
            // var_dump($oThis->special_links[$key]);
            // var_dump($oThis->special_links);
            // var_dump($oThis->special_links[$key]['url']);
            //$this->do_page($args);
        }

        public function do_origsetting_page($args) {
            global $oThis, $apm_settings, $meta_marker, $wpdb, $post_types;
            $args['page_type'] = 'origamisettings';
            $args['page_type_label'] = 'Blue Origami Generic Settings';
            $this->do_page($args);
        }

        public function do_taxonomy_page($args) {
            global $oThis, $apm_settings, $meta_marker, $wpdb, $post_types;

            $args['page_type'] = 'taxonomy';
            $args['page_type_label'] = 'Categories & Tags';
            $this->do_page($args);
        }

        function test() {
            echo "////" . $this->Parent->toto . "****";
        }

    }

}