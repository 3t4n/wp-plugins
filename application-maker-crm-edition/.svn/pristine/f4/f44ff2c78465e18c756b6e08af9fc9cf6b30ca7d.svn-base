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

        public function do_link_url_action($key) {
            global $oThis, $apm_settings, $meta_marker;
            // header('Location: '.$oThis->special_links[$key]['url']);
            // wp_redirect($oThis->special_links[$key]['url']);
            //echo 'do_link_url_action '.$key;
            // echo '<br>do_link_url_action '.$oThis->special_links[$key]['url'];
            echo "<script>
             document.location.href='" . $oThis->special_links[$key]['url'] . "';
              </script>

";
           //  include APPLICATION_MAKER_PATH . 'views/dashboard/testDashboardBis.php';
            // exit;
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