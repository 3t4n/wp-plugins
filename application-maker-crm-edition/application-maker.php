<?php
/*
  Plugin Name:  BLUE ORIGAMI CRM (Formerly Application Maker / APM - CRM edition) - FREE VERSION. A 15 Green Leaves product
  Plugin URI: http://apmcrm2013.weproduceweb.com
  Description:  CRM created on the basis of the Application Maker Plugin from 15 Green Leaves
  Version:1.5.15
  Author: Renaud Hamelin, 15 Green Leaves Ltd.  - renaud@15gl.biz
  Author URI: http://15greenleaves.com
  Text Domain: blue-origami-crm
 */





if (!class_exists('Application_Maker')) {
    define('APPLICATION_MAKER_PATH', trailingslashit(dirname(__FILE__)));
    define('MY_THEME_PATH', get_theme_root() . '/' . get_template());

    require_once APPLICATION_MAKER_PATH . 'config.php';

    if (!isset($main_config['lang'])) {
        echo 'Sorry but you have a wrong config, the languages by default has not been set';
        exit;
    } else {
        $ori_lang_name = esc_attr(get_option('ori_lang_name'));
        if ($ori_lang_name !== false and $ori_lang_name !== '') {
            $main_config['lang'] = $ori_lang_name;
        }
    }
    //CHekc the list of langs available
    $apm_lang_list = array();
    if ($handle = opendir(APPLICATION_MAKER_PATH . 'langs/')) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry !== "." and $entry !== ".." and $entry !== ".svn") {
                require_once APPLICATION_MAKER_PATH . 'langs/' . $entry;
            }
        }
        closedir($handle);
    }

    if (file_exists(APPLICATION_MAKER_PATH . 'langs/lang_' . $main_config['lang'] . '.php')) {
        require_once APPLICATION_MAKER_PATH . 'langs/lang_' . $main_config['lang'] . '.php';
    } else {
        echo 'Sorry but you have a wrong config, the languages by default has been set to "' . $main_config['lang'] . '" but there is not language file corresponding in the folder "langs".';
        exit;
    }
    $p = APPLICATION_MAKER_PATH;




    if (substr(APPLICATION_MAKER_PATH, 0, 2) !== 'C:') {
        $ar = explode('/', APPLICATION_MAKER_PATH);
        if (substr($p, strlen($p) - 1, 1) == '/') {
            $fo = $ar[count($ar) - 2];
        } else {

            $fo = $ar[count($ar) - 1];
        }
    } else {
        $ar = explode('\\', $p);
        $fo = $ar[count($ar) - 1];
        if ($debug) {
            echo "case windows " . $fo . "--<br/>";
        }
    }
    if ($debug) {
        echo "plug fold " . $fo . "--<br/>";
    }
    if (substr($fo, strlen($fo) - 1, 1) == '/') {
        $fo = substr($fo, 0, strlen($fo) - 1);
    }


    define('WP_PLUGIN_FOLDER', $fo);
    define('APPLICATION_MAKER_LIB_PATH', APPLICATION_MAKER_PATH . 'lib/');
    define('APPLICATION_MAKER_VIEWS_PATH', APPLICATION_MAKER_PATH . 'views/');
    define('APPLICATION_MAKER_JS_PATH', APPLICATION_MAKER_PATH . 'js/');
    define('APPLICATION_MAKER_CSS_PATH', APPLICATION_MAKER_PATH . 'css/');

    $apm_settings = array(
        'plugin' => array(
// edit by huypham--09-05-2013
            // 'name' => WP_PLUGIN_FOLDER, //'application-maker'
            'name' => 'application-maker-crm-edition', //'application-maker'
        ),
    ); //$apm_settings->plugin->name









    $apm_settings = array_merge($apm_settings, array(
        'paths' => array(
            'js' => site_url() . '/wp-content/plugins/' . $apm_settings['plugin']['name'] . '/js/',
            'css' => site_url() . '/wp-content/plugins/' . $apm_settings['plugin']['name'] . '/css/',
            'img' => site_url() . '/wp-content/plugins/' . $apm_settings['plugin']['name'] . '/img/',
            'extensions' => site_url() . '/wp-content/plugins/' . $apm_settings['plugin']['name'] . '/extensions/',
            'includes' => site_url() . '/wp-includes',
            'ajax_url' => site_url() . '/wp-admin/admin-ajax.php'
        ),
        'configs' => array(
            'default_currency' => $main_config['default_currency'],
            'widget_latest_default_max' => $main_config['widget_latest_default_max'],
            'from_email' => $main_config['from_email'],
        )
            )
    );

//
    class Application_Maker {

        protected $textdomain = 'application-maker';
        protected $args;
        public $post_types;
        protected $metaboxes;
        protected $url;
        public $settings;

// CONSTRUCTOR

        /**
         * Kicks things off
         * @param
         */
        public function __construct() {
            global $post_types, $oThis, $show_help, $apm_settings;

            register_activation_hook(__FILE__, 'my_plugin_activate');
            add_action('admin_init', 'my_plugin_redirect');

            function my_plugin_activate() {
                add_option('my_plugin_do_activation_redirect', true);
            }

            function my_plugin_redirect() {
                if (get_option('my_plugin_do_activation_redirect', false)) {
                    delete_option('my_plugin_do_activation_redirect');
                    if (!isset($_GET['activate-multi'])) {
                        wp_redirect('admin.php?page=origami_home&do_clearcache=true');
                        exit;
                    }
                }
            }

            require_once APPLICATION_MAKER_PATH . 'default/application-maker-default_application.php';
            require_once APPLICATION_MAKER_PATH . 'default/application-maker-default_fields.php';

//FOR BACK COMPATIBILITY for V<V1.04
            if (file_exists(APPLICATION_MAKER_PATH . 'application-maker-custom_fields.php')) {
                require_once APPLICATION_MAKER_PATH . 'application-maker-custom_fields.php';
            }
            if (file_exists(APPLICATION_MAKER_PATH . 'application-maker-custom_applications.php')) {
                require_once APPLICATION_MAKER_PATH . 'application-maker-custom_applications.php';
            }


            require_once APPLICATION_MAKER_PATH . 'lib/SimpleImage.php';
///AA// GET ALL MODULES CONFIG FILES FROM PLUGIN
            $app_modules = array();
            if ($handle = opendir(APPLICATION_MAKER_PATH . 'applications/modules/')) {
                while (false !== ($entry = readdir($handle))) {
                    if ($entry !== "." and $entry !== ".." and $entry !== ".svn") {
                        require_once APPLICATION_MAKER_PATH . 'applications/modules/' . $entry;
                    }
                }
                closedir($handle);
            }
//END AA
///AA// GET ALL APPS CONFIG FILES FROM PLUGIN
            $custom_applications = array();
            if ($handle = opendir(APPLICATION_MAKER_PATH . 'applications/apps/')) {
                while (false !== ($entry = readdir($handle))) {
                    if ($entry !== "." and $entry !== ".." and $entry !== ".svn") {
                        require_once APPLICATION_MAKER_PATH . 'applications/apps/' . $entry;
                    }
                }
                closedir($handle);
            }
//END AA
///AB// GET ALL APPS CONFIG FILES FROM ACTIVE THEME, if the following DIR exist in the them and if it containt an application config file
            if (file_exists(MY_THEME_PATH . '/applications/apps/')) {
                if ($handle = opendir(MY_THEME_PATH . '/applications/apps/')) {
                    while (false !== ($entry = readdir($handle))) {
                        if ($entry !== "." and $entry !== ".." and $entry !== ".svn") {
                            require_once MY_THEME_PATH . '/applications/apps/' . $entry;
                        }
                    }
                    closedir($handle);
                }
            }
//END AB
            $my_custom_fields = array();
///AB// GET ALL APPS CONFIG FILES FROM PRO PLUGIN APPS, if the following DIR exist in the them and if it containt an application config file
            if (file_exists(APPLICATION_MAKER_PATH . '/applications/applications_pro/')) {
                if ($handle = opendir(APPLICATION_MAKER_PATH . '/applications/applications_pro/')) {
                    while (false !== ($entry2 = readdir($handle))) {
                        if ($entry2 !== "." and $entry2 !== ".." and $entry2 !== ".svn") {
                            if (file_exists(APPLICATION_MAKER_PATH . '/applications/applications_pro/' . $entry2 . '/fields/')) {
                                if ($subhandle = opendir(APPLICATION_MAKER_PATH . '/applications/applications_pro/' . $entry2 . '/fields/')) {
                                    while (false !== ($subentry = readdir($subhandle))) {
                                        if ($subentry !== "." and $subentry !== ".." and $subentry !== ".svn") {
                                            require_once APPLICATION_MAKER_PATH . '/applications/applications_pro/' . $entry2 . '/fields/' . $subentry;
                                            foreach ($local_custom_fields as $key => $field) {
                                                $my_custom_fields[$key] = $field;
                                            }
                                        }
                                    }
                                    closedir($subhandle);
                                }
                            }
                            if (file_exists(APPLICATION_MAKER_PATH . '/applications/applications_pro/' . $entry2 . '/modules/')) {
                                if ($subhandle2 = opendir(APPLICATION_MAKER_PATH . '/applications/applications_pro/' . $entry2 . '/modules/')) {

                                    while (false !== ($subentry2 = readdir($subhandle2))) {
                                        if ($subentry2 !== "." and $subentry2 !== ".." and $subentry2 !== ".svn") {
                                            require_once APPLICATION_MAKER_PATH . '/applications/applications_pro/' . $entry2 . '/modules/' . $subentry2;
                                        }
                                    }
                                    closedir($subhandle2);
                                }
                            }
                        }
                    }
                    closedir($handle);
                }
                if ($handle = opendir(APPLICATION_MAKER_PATH . '/applications/applications_pro/')) {
                    while (false !== ($entry2 = readdir($handle))) {
                        if ($entry2 !== "." and $entry2 !== ".." and $entry2 !== ".svn") {
                            if (file_exists(APPLICATION_MAKER_PATH . '/applications/applications_pro/' . $entry2 . '/app/')) {

                                if ($subhandle = opendir(APPLICATION_MAKER_PATH . '/applications/applications_pro/' . $entry2 . '/app/')) {
                                    while (false !== ($subentry = readdir($subhandle))) {
                                        if ($subentry !== "." and $subentry !== ".." and $subentry !== ".svn") {
                                            require_once APPLICATION_MAKER_PATH . '/applications/applications_pro/' . $entry2 . '/app/' . $subentry;
                                        }
                                    }
                                    closedir($subhandle);
                                }
                            }
                        }
                    }
                    closedir($handle);
                }
            }
//END AB
//
//AE//GET CONFIG FROM PRO MODULES
            if (file_exists(APPLICATION_MAKER_PATH . '/applications/modules_pro/')) {
                if ($handle = opendir(APPLICATION_MAKER_PATH . '/applications/modules_pro/')) {
                    while (false !== ($entry = readdir($handle))) {
                        if ($entry !== "." and $entry !== ".." and $entry !== ".svn") {
                            if (file_exists(APPLICATION_MAKER_PATH . '/applications/modules_pro/' . $entry)) {
                                if ($subhandle = opendir(APPLICATION_MAKER_PATH . '/applications/modules_pro/' . $entry)) {
                                    while (false !== ($subentry = readdir($subhandle))) {
                                        if ($subentry !== "." and $subentry !== ".." and $subentry !== ".svn" and $subentry !== "fields") {
                                            //echo '<br>' . $entry . '/' . $subentry;
                                            require_once APPLICATION_MAKER_PATH . '/applications/modules_pro/' . $entry . '/' . $subentry;
                                        }
                                        if ($subentry == "fields") {
                                            if ($handle3 = opendir(APPLICATION_MAKER_PATH . '/applications/modules_pro/' . $entry . '/fields/')) {
                                                while (false !== ($entry3 = readdir($handle3))) {
                                                    if ($entry3 !== "." and $entry3 !== ".." and $entry3 !== ".svn") {
                                                        require_once APPLICATION_MAKER_PATH . '/applications/modules_pro/' . $entry . '/fields/' . $entry3;
                                                        foreach ($local_custom_fields as $key => $field) {
                                                            $my_custom_fields[$key] = $field;
                                                        }
                                                    }
                                                }
                                                closedir($handle3);
                                            }
                                        }
                                    }
                                    closedir($subhandle);
                                }
                            }
                        }
                    }
                    closedir($handle);
                }
            }



//END AE
///AC// GET ALL FIELDS CONFIG FILES FROM PLUGIN
            if ($handle = opendir(APPLICATION_MAKER_PATH . 'applications/fields/')) {
                while (false !== ($entry = readdir($handle))) {
                    if ($entry !== "." and $entry !== ".." and $entry !== ".svn") {
                        require_once APPLICATION_MAKER_PATH . 'applications/fields/' . $entry;
                        foreach ($local_custom_fields as $key => $field) {
                            $my_custom_fields[$key] = $field;
                        }
                    }
                }
                closedir($handle);
            }
//END AC
///AD// GET ALL FIELDS CONFIG FILES FROM ACTIVE THEME, if the following DIR exist in the them and if it containt an application config file

            if (file_exists(MY_THEME_PATH . '/applications/fields/')) {
                if ($handle = opendir(MY_THEME_PATH . '/applications/fields/')) {
                    while (false !== ($entry = readdir($handle))) {
                        if ($entry !== "." and $entry !== ".." and $entry !== ".svn") {
                            require_once MY_THEME_PATH . '/applications/fields/' . $entry;
                            foreach ($local_custom_fields as $key => $field) {
                                $my_custom_fields[$key] = $field;
                            }
                        }
                    }
                    closedir($handle);
                }
            }
//END AD


            $this->site_email = ( is_email($this->settings['email']) && $this->settings['email'] != 'email@example.com' ) ? $this->settings['email'] : get_bloginfo('admin_email');
            $this->site_name = ( $this->settings['name'] != 'YOUR NAME' && !empty($this->settings['name']) ) ? stripslashes($this->settings['name']) : get_bloginfo('name');
            $this->simple_image = new SimpleImage();


            /*
             *  by default a field is field_type textfield is not precised
             * default label_position=left
             * default label_width=150
             * */
            $this->default_fields = array_merge($default_fields, $my_custom_fields);
            $this->applications = array_merge($default_application, $custom_applications);

            $this->post_types = array();
            $this->all_categories = array();
            $this->all_tags = array();
            $this->all_modules = array();

            foreach ($this->applications as $key => $application) {
                $this->post_types = array_merge($this->post_types, $application['modules']);
                if (isset($application['categories'])) {
                    $this->all_categories = array_merge($this->all_categories, $application ['categories']);
                }
                if (isset($application['tags'])) {
                    $this->all_tags = array_merge($this->all_tags, $application ['tags']);
                }
                if (isset($application['modules'])) {
                    $this->all_modules = array_merge($this->all_modules, $application ['modules']);
                }
                if (isset($application['option_sections'])) {
///SET DEFAULT OPTIONS
                    foreach ($application['option_sections'] as $subkey => $option_sections) {
                        foreach ($option_sections['fields'] as $subsubkey => $option_section) {
                            if (count($option_section) > 2) {
                                if (esc_attr(get_option($subsubkey)) !== false and esc_attr(get_option($subsubkey)) !== '') {
                                    $option = esc_attr(get_option($subsubkey));
//echo '<br/>---'.$subsubkey.'-'.$option;
                                } else {
                                    $option = $option_section[2];
//echo '<br/>---'.$subsubkey.'-'.$option;
                                    update_option($subsubkey, $option);
                                }
                            }
                        }
                    }
                }
            }
            if (esc_attr(get_option('default_currency')) !== false) {
                $apm_settings['configs']['default_currency'] = esc_attr(get_option('default_currency'));
            }
            if (esc_attr(get_option('widget_latest_default_max')) !== false) {
                $apm_settings['configs']['widget_latest_default_max'] = esc_attr(get_option('widget_latest_default_max'));
            }
            if (esc_attr(get_option('from_email')) !== false) {
                $apm_settings['configs']['from_email'] = esc_attr(get_option('from_email'));
            }
            $post_types = $this->post_types;
            $oThis = $this;
            $this->textdomain = apply_filters('application-maker_textdomain', $this->textdomain);
            $this->url = site_url() . '/wp-content/plugins/' . WP_PLUGIN_FOLDER;
            $this->cururl = $_SERVER["REQUEST_URI"];


            add_action('admin_init', array($this, 'init'), 0);
            add_action('admin_menu', array($this, 'my_appmaker_menu'), 0);

            add_action('init', array($this, 'create_main_post_types'));
            add_action('admin_menu', array($this, 'my_categ_menu'), 0);
            add_action('add_meta_boxes', array($this, 'myplugin_add_custom_box'));
            add_action('wp_dashboard_setup', array($this, 'myplugin_add_dashboard_widgets'));
            add_action('post_edit_form_tag', array($this, 'post_edit_form_tag'));

            add_action('save_post', array($this, 'myplugin_save_postdata'));
//add_action( 'tiny_mce_before_init', array($this,'my_add_editor_style' ));

            add_action('in_admin_header', array($this, 'my_admin_head'));

// add by huypham
            function addUserMailInAdd() {
                if ($_GET['emailAddUser'] != '') {
                    echo '<script type="text/javascript">';
                    echo 'jQuery("#createuser #email").val("' . $_GET['emailAddUser'] . '")';
                    echo '</script>';
                }
            }

            add_action('admin_footer', 'addUserMailInAdd');
// end add by huypham



            /* 	function test_apm(){
              echo "iiiii";
              }
              add_action( 'in_admin_header', 'test_apm' ); */

            /* MANAGE the COLUMN in the POST DATA GRIDS * */

            foreach ($this->post_types as $key => $post_type_obj) {
                if (isset($post_type_obj['module_columns'])) {
                    add_filter('manage_edit-' . $key . '_columns', array($this, 'create_my_custom_columns'));
                    add_filter('manage_edit-' . $key . '_sortable_columns', array($this, 'create_my_custom_columns_register_sortable'));
                }
            }






            add_action('manage_posts_custom_column', array($this, 'my_show_columns'));
            if (isset($_GET['post_type']) and $_GET['post_type'] !== 'page') {
                add_action('request', array($this, 'my_column_orderby'));
            }

            if ($show_help) {
                add_action('admin_menu', 'application_maker_do_help_menu');

                function application_maker_do_help_menu() {
//add_options_page(_('Applications Maker Plugin Help'), _('Applications Maker Plugin Help'), 'manage_options', 'application-maker-help', 'application_maker_help');
                }

                function application_maker_help() {
                    global $oThis;
                    require_once APPLICATION_MAKER_VIEWS_PATH . 'application-maker-help.php';
                }

            }
//	add_filter( 'get_meta_sql', array($this, 'test1'));
//	add_filter( 'posts_orderby', array($this, 'testposts_orderby'));

            require_once APPLICATION_MAKER_LIB_PATH . 'apm-app_setting.class.php';
            $this->AM_AppSettings = new Application_Maker_AppSettings();
            $this->AM_AppSettings->Parent = $this;
            $this->AM_AppSettings->init();


            require_once APPLICATION_MAKER_LIB_PATH . 'apm-shortcodes.class.php';
            $this->AM_Shortcodes = new Application_Maker_Shortcodes();
            $this->AM_Shortcodes->Parent = $this;
            $this->AM_Shortcodes->init();

            require_once APPLICATION_MAKER_LIB_PATH . 'apm-portal.class.php';
            $this->AM_Portal = new Application_Maker_Portal();
            $this->AM_Portal->Parent = $this;

            require_once APPLICATION_MAKER_LIB_PATH . 'apm-datagrid.class.php';
            $this->AM_Datagrid = new Application_Maker_Datagrid();
            $this->AM_Datagrid->Parent = $this;
        }

        public function check_fill_category($categs, $spec = false, $catreset = false) {
            global $apm_settings, $wpdb, $current_user, $main_config;
            $lan = $main_config['lang'];
            foreach ($categs as $k => $cat) {
                if (isset($cat['default_data']['slug'])) {
                    $exist = esc_attr(get_option('already_fill_' . $k));
                    if ($spec == 'reset' and $catreset == $k) {
                        $args = array(
                            'taxonomy' => $k,
                            'hide_empty' => 0,
                            //'parent' => $parent,
                            'orderby' => 'name',
                            'order' => 'ASC'
                        );
                        $terms = get_categories($args);
                        $exist = false;
                        foreach ($terms as $kt => $term) {
                            wp_delete_term($term->term_id, $k);
                        }
                    }
                    if (!$exist) {
                        $slu = $cat['default_data']['slug'];
                        if (isset($cat['default_data'][$lan])) {
                            $options = $cat['default_data'][$lan];
                        } else {
                            $options = $cat['default_data']['en'];
                        }
                        $ar = array();
                        $c = 0;
                        foreach ($options as $option) {
                            $c++;
                            $ret = wp_insert_term(
                                    $options[$c], // the term
                                    $k, // the taxonomy
                                    array(
                                'description' => '',
                                'slug' => $slu[$c]
                                    )
                            );
                        }
                        update_option('already_fill_' . $k, true);
                    }
                }
            }
        }

        public function initShortCodes() {

        }

        public function init() {
            global $apm_settings, $wpdb, $current_user, $main_config;


// echo "---".$current_user->ID;
            $user_rich_text = get_user_meta($current_user->ID, 'rich_editing', true);

            wp_register_script('application_maker_configjs', $apm_settings['paths']['js'] . 'admin/config.js', '');
            wp_enqueue_script('application_maker_configjs');

            require_once APPLICATION_MAKER_LIB_PATH . 'application-maker-extensions.class.php';
            $this->AM_Extensions = new Application_Maker_Extensions();
            $this->extensions = $this->AM_Extensions->manageExtensions();
            if (isset($this->extensions->extensions)) {
                foreach ($this->extensions->extensions as $ke => $ext) {
                    $filename = $this->extensions->clss[$ext][0]['path'] . $this->extensions->clss[$ext][0]['filename'];
                    if (file_exists($filename)) {
                        include_once($filename);
                    }
                }
            }
//var_dump($this->extensions);

            require_once APPLICATION_MAKER_LIB_PATH . 'application-maker-core.class.php';
            $this->AM_Core = new Application_Maker_Core();
            $this->AM_Core->default_fields = $this->default_fields;
            $this->AM_Core->post_types = $this->post_types;
            $this->AM_Core->applications = $this->applications;


            require_once APPLICATION_MAKER_LIB_PATH . 'application-maker-notifications.class.php';
            $this->AM_Notifications = new Application_Maker_Notifications();
//add_editor_style('editor-buttons.css' );

            wp_tiny_mce(false, // true makes the editor "teeny"
                    array(
                "editor_selector" => "apm-editor",
                "height" => 150
                    )
            );


            wp_register_script('application_tab_script', $apm_settings['paths']['js'] . 'admin/jquery-ilc-tabs.js', array('jquery-ui-sortable'));
            wp_enqueue_script('application_tab_script');
//wp_register_script( 'application_font_gotham_script', $apm_settings['paths']['js']. 'admin/gotham_rounded_light.typeface.js' );
//wp_enqueue_script( 'application_font_gotham_script' );
//wp_register_script( 'application_font_script', $apm_settings['paths']['js']. 'admin/typeface-0.15.js' );
//wp_enqueue_script( 'application_font_script' );
//wp_register_script( 'application_maker_jqueryui18_script', $apm_settings['paths']['js']. 'admin/multiselect_jquery/jquery-ui-1.8.custom.min.js' );
//wp_enqueue_script( 'application_maker_jqueryui18_script' );
            // wp_register_script('application_maker_script_libs', $apm_settings['paths']['js'] . 'admin/jquery.validate.js', array('jquery-ui-sortable'));
            // wp_enqueue_script('application_form_validate');
            wp_register_script('application_maker_script_libs', $apm_settings['paths']['js'] . 'admin/scripts_libs.js', array('jquery-ui-sortable'));
            wp_enqueue_script('application_maker_script_libs'); //bootstrap-combobox.js
            wp_register_script('application_maker_script_bootstrap', $apm_settings['paths']['js'] . 'admin/bootstrap.js', array('jquery-ui-sortable'));
            wp_enqueue_script('application_maker_script_bootstrap');

            if (strpos($this->cururl, 'post-new.php') == false and strpos($this->cururl, 'php') == true and strpos($this->cururl, 'index.php') == false and strpos($this->cururl, 'admin.php?page') == false and strpos($this->cururl, 'post.php?post') == false) {

            } else {
                if ((strpos($this->cururl, 'admin.php?page=' . $main_config['rootname']) == true) or strpos($this->cururl, 'php') == false or strpos($this->cururl, 'post-new.php') == true or strpos($this->cururl, 'post.php?post') == true) {

                }
            }
            if (strpos($this->cururl, 'post-new.php') == false and strpos($this->cururl, 'php') == true and strpos($this->cururl, 'index.php') == false and strpos($this->cururl, 'admin.php?page') == false and strpos($this->cururl, 'post.php?post') == false) {

            } else {

                if ((strpos($this->cururl, 'admin.php?page=origami_home') == true) or (strpos($this->cururl, 'admin.php?page=' . $main_config['rootname']) == true) or strpos($this->cururl, 'php') == false or strpos($this->cururl, '_home') == true or strpos($this->cururl, 'index.php') == true or strpos($this->cururl, 'post-new.php') == true or strpos($this->cururl, 'post.php?post') == true) {
                    wp_register_script('application_maker_script_bootstrap-combobox', $apm_settings['paths']['js'] . 'admin/bootstrap-combobox.js', array('jquery-ui-sortable'));
                    wp_enqueue_script('application_maker_script_bootstrap-combobox');
                    wp_register_script('application_maker_script_bootstrap-date', $apm_settings['paths']['js'] . 'admin/bootstrap-datepicker.js', array('jquery-ui-sortable'));
                    wp_enqueue_script('application_maker_script_bootstrap-date');
                    wp_register_script('application_maker_localization_script', $apm_settings['paths']['js'] . 'admin/multiselect_jquery/plugins/localisation/jquery.localisation-min.js', array('jquery-ui-sortable'));
                    wp_enqueue_script('application_maker_localization_script');
                    wp_register_script('application_maker_scrollto_script', $apm_settings['paths']['js'] . 'admin/multiselect_jquery/plugins/scrollTo/jquery.scrollTo-min.js', array('jquery-ui-sortable'));
                    wp_enqueue_script('application_maker_scrollto_script');
                    wp_register_script('application_maker_multiselect_script', $apm_settings['paths']['js'] . 'admin/multiselect_jquery/ui.multiselect.js', array('jquery-ui-sortable'));
                    wp_enqueue_script('application_maker_multiselect_script');
                    wp_register_script('application_maker_jwys', $apm_settings['paths']['js'] . 'jwysiwyg-master/jquery.wysiwyg.js', array('jquery-ui-sortable'));
                    wp_enqueue_script('application_maker_jwys');
                    wp_register_script('application_maker_jwysimg', $apm_settings['paths']['js'] . 'jwysiwyg-master/controls/wysiwyg.image.js', array('jquery-ui-sortable'));
                    wp_enqueue_script('application_maker_jwysimg');
                    wp_register_script('application_maker_jwyslink', $apm_settings['paths']['js'] . 'jwysiwyg-master/controls/wysiwyg.link.js', array('jquery-ui-sortable'));
                    wp_enqueue_script('application_maker_jwyslink');
                    wp_register_script('application_maker_jwystabl', $apm_settings['paths']['js'] . 'jwysiwyg-master/controls/wysiwyg.table.js', array('jquery-ui-sortable'));
                    wp_enqueue_script('application_maker_jwystabl');
                    wp_register_script('application_maker_script', $apm_settings['paths']['js'] . 'admin/scripts.js', array('jquery-ui-sortable'));
                    wp_enqueue_script('application_maker_script');
                    wp_register_script('application_maker_scriptnew', $apm_settings['paths']['js'] . 'admin/scripts_new.js', array('jquery-ui-sortable'));
                    wp_enqueue_script('application_maker_scriptnew');
                    wp_register_script('application_maker_c_script', $apm_settings['paths']['js'] . 'admin/apm_extensions.js', array('application_maker_script'));
                    wp_enqueue_script('application_maker_c_script');


                    wp_enqueue_style('application_maker_jwysiwygstyle', $apm_settings['paths']['js'] . 'jwysiwyg-master/jquery.wysiwyg.css');
                    wp_enqueue_style('application_maker_multiselect_style', $apm_settings['paths']['css'] . 'admin/ui.multiselect.css');

                    wp_enqueue_style('application_maker_style_boot', $apm_settings['paths']['css'] . 'admin/bootstrap.css');
                    wp_enqueue_style('application_maker_style_boot-combobox', $apm_settings['paths']['css'] . 'admin/bootstrap-combobox.css');
                    wp_enqueue_style('application_maker_style_boot-date', $apm_settings['paths']['css'] . 'admin/datepicker.css');
                    wp_enqueue_style('application_maker_style_editor', $apm_settings['paths']['includes'] . '/css/editor-buttons.css');
                }
            }
            wp_enqueue_style('application_maker_style', $apm_settings['paths']['css'] . 'admin/style.css');
//wp_enqueue_style( 'jqueryui_style_editor', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/ui-lightness/jquery-ui.css' );
            $this->manage_featured_images();

            function get_my_suggestions_ajax_autocomplete() {
                global $wpdb, $current_user, $meta_marker;
// This function should query the database and get results as an array of rows:
// GET the 'term' (what has been typed by the user)
                $suggestions_array = array();
//$term=$_REQUEST["q"];
//echo 'fffff'.$term;
// echo JSON to page  and exit.
                $selected_post_type = $_REQUEST["post_type"];
                if ($selected_post_type == "users") {
                    $term = $_REQUEST['name_startsWith'];
                    $query = "
                                SELECT      *
                                FROM        $wpdb->users
                                WHERE       $wpdb->users.display_name LIKE '%$term%'
                                AND         $wpdb->users.user_status = '0'
                                ORDER BY    $wpdb->users.display_name
                        ";
                    $users_list = $wpdb->get_results($query);
// $suggestions = array();
                    $data = array();

                    foreach ($users_list as $key => $value) {
//  $suggestions[] = $value->display_name;
                        $da = array();
                        $da['id'] = $value->ID;
                        $da['name'] = $value->display_name;
                        $data[] = $da;
                    }
//echo var_dump($posts_list);
                    $ar = array(
                        'query' => $term,
                        'totalResultsCount' => count($data),
                        'results' => $data
                    );
                    $str = $_REQUEST['callback'] . json_encode($ar); // "({query:'" . $term . "', 'totalResultsCount':" . count($data) . ",  results:" . json_encode($data) . "})"; // json_encode($suggestions_array)
// $response = $_GET["callback"]."(".$str.")";
                    echo $str;
                    exit;
                } else {
                    $fieldname = $_GET["fieldname"];
                    $term = $_REQUEST['name_startsWith'];

                    if (strpos($selected_post_type, ',') > -1) {
                        $sqlposttype = "";
                        $selected_post_type_arr = explode(',', $selected_post_type);
                        foreach ($selected_post_type_arr as $kpt => $pt) {
                            if ($kpt > 0) {
                                $sqlposttype.=" OR ";
                            }
                            $sqlposttype.="  $wpdb->posts.post_type = '$pt' ";
                        }
                    } else {
                        $sqlposttype = "  $wpdb->posts.post_type = '$selected_post_type' ";
                    }

                    if (current_user_can('administrator')) {
                        $query = "
                                SELECT      * FROM        $wpdb->posts
                                WHERE       $wpdb->posts.post_title LIKE '%$term%'
                                AND         $sqlposttype
                                AND         $wpdb->posts.post_status='publish'
                                ORDER BY    $wpdb->posts.post_title
                        ";

                        //echo $query;
                    } else {
                        $uid = $current_user->ID;
                        $query = "
                                SELECT      DISTINCT post_title, ID, post_type  FROM        $wpdb->posts
                                 INNER JOIN $wpdb->postmeta  as metaprivacy  ON $wpdb->posts.ID = metaprivacy.post_id
                                 INNER JOIN $wpdb->postmeta as metaassignee ON  $wpdb->posts.ID = metaassignee.post_id
                                WHERE       $wpdb->posts.post_title LIKE '%$term%'
                                AND         $sqlposttype
                                AND         $wpdb->posts.post_status='publish'
                                AND ((post_author = $uid AND metaprivacy.meta_value = '1'  AND metaprivacy.meta_key = '" . $meta_name . "set_privacy')
                                OR ( metaprivacy.meta_value = '0'  AND metaprivacy.meta_key = '" . $meta_name . "set_privacy')
                                 OR ( metaprivacy.meta_value = '2'  AND metaprivacy.meta_key = '" . $meta_name . "set_privacy' AND post_author = $uid )
                                OR ( metaprivacy.meta_value = '2'  AND metaprivacy.meta_key = '" . $meta_name . "set_privacy' AND metaassignee.meta_key = '" . $meta_name . "assign_to' AND metaassignee.meta_value = '$uid'  ))

                                ORDER BY    $wpdb->posts.post_title
                        ";
                        // echo $query;
                    }
                    $posts_list = $wpdb->get_results($query);
//echo $query.'-'.count($posts_list);
//$suggestions = array();
                    $data = array();

                    foreach ($posts_list as $key => $value) {
// $suggestions[] = $value->post_title;
                        $da = array();
                        $da['id'] = $value->ID;
                        $da['name'] = $value->post_title;
                        $data[] = $da;
                    }
//echo var_dump($posts_list);
// if (isset($_REQUEST['noparenthesis']) and $_REQUEST['noparenthesis'] == 'true') {
//   $str = json_encode($data); // json_encode($suggestions_array)
// } else {
                    $ar = array(
                        'query' => $term,
                        'totalResultsCount' => count($data),
                        'results' => $data
                    );
                    $str = $_REQUEST['callback'] . json_encode($ar); // "({query:'" . $term . "', 'totalResultsCount':" . count($data) . ",  results:" . json_encode($data) . "})"; // json_encode($suggestions_array)
// }
// $response = $_GET["callback"]."(".$str.")";
                    echo $str;
                    exit;
                }
            }

            add_action('wp_ajax_amp-ajax-autocomplete', 'get_my_suggestions_ajax_autocomplete');

            function apm_save_comments() {
                global $post, $module_name, $wpdb, $current_user, $oThis, $meta_marker;
                $post_id = $_POST['post_id'];
                $post = get_post($post_id);
                $post_type = get_post_type($post_id);
                $post_type_label = '';
                foreach ($oThis->applications as $mainkey => $application) {
                    $modules = $application ['modules'];
                    foreach ($modules as $key => $module) {
                        if ($key == $post_type) {
                            $post_type_label = $module['singular_name'];
                        }
                    }
                }
                $comment = $_POST['comment'];
                $fieldname = $_POST['fieldname'];
                require_once APPLICATION_MAKER_VIEWS_PATH . 'apm-comments-tpl.php';
//require_once APPLICATION_MAKER_VIEWS_PATH . 'apm-comments-email-tpl.php';
                get_currentuserinfo();
//$current_user->ID


                $time = current_time('mysql');
                $lang_str = '';
                $lang = '';
                if (isset($_POST['lang'])) {
                    $lang = $_POST['lang'];
                    $lang_str = ' - <strong>Language:</strong> ' . $lang;
                }
                $data = array(
                    'comment_post_ID' => $post_id,
                    'comment_author' => $current_user->user_login,
                    'comment_author_email' => $lang, //$current_user->user_email,
                    'comment_content' => $comment,
                    'comment_type' => '',
                    //  'comment_parent' => 0,
                    'user_id' => $current_user->ID,
                    'comment_date' => $time,
                    'comment_approved' => 0
                );
                $com_id = wp_insert_comment($data);
//var_dump($data);
///////////////////////  SAVE HANDLE NOTIFICATIONS
                $oThis->AM_Notifications->do_notifications($comment, $post_id, "comment");



                $view = '<div class="well well-small apm_comment_item" data-comment_id="[[id]]" ><a name="comment_[[id]]" ></a>
                  <div>By: <strong>[[username]]</strong>
                  <span class="apm_commedit_btns_cont"><button rel="tooltip" title="Edit this comment" class="hasTooltip  btn btn-mini btn-info   apm_edit_comment"><i class="icon-edit icon-white"></i> Edit</button>
                  <button rel="tooltip" title="Delete this comment" class="hasTooltip  btn btn-mini btn-warning    apm_delet_comment"><i class="icon-ban-circle icon-white"></i> Delete</button></span>
                  </div>
                  <div class="apm_comment_content">[[comment]]</div>
                  [[comm_edit_in]]
                  <span style="padding: 8px 0 0 0" class="help-block">Posted on [[date]] at [[time]]</span>
                  </div>';
                $viewedit = '<div class="comm_edit_in"><textarea rows="3" style="width:100%!important;"></textarea><button rel="tooltip" title="Save the update on this comment" class="hasTooltip  btn btn-mini   apm_update_comment"><i class="icon-comment"></i> Update</button></div>';

                $view = str_replace('[[comm_edit_in]]', $viewedit, $view);
                $view = str_replace('[[username]]', $current_user->user_login, $view);
                $view = str_replace('[[id]]', $com_id, $view);
                $view = str_replace('[[comment_author_email]]', $current_user->user_email, $view);
                $view = str_replace('[[date]]', 'Today', $view);
                $view = str_replace('[[lang_zone]]', $lang_str, $view);
                $view = str_replace('[[time]]', date('H:i') . '  hrs', $view);
                $view = str_replace('[[comment]]', $comment, $view);
                $view = str_replace('[[fieldname]]', '"' . $fieldname . '"', $view); //
                $view = str_replace('\"', '***', $view);
                echo $view;
                die();
                /*

                  $company_name = esc_attr(get_option('company_name'));
                  $system_name = esc_attr(get_option('system_name'));

                  if ($system_name == false) {
                  $system_name = 'Application Maker';
                  }
                  $emailview = str_replace('[[company_name]]', $company_name, $emailview);
                  $emailview = str_replace('[[system_name]]', $system_name, $emailview);

                  $emailview = str_replace('[[username]]', $current_user->user_login, $emailview);
                  $emailview = str_replace('[[id]]', $com_id, $emailview);
                  $emailview = str_replace('[[comment_author_email]]', $current_user->user_email, $emailview);
                  $emailview = str_replace('[[date]]', 'Today', $emailview);
                  $emailview = str_replace('[[time]]', date('H:i') . '  hrs', $emailview);
                  $emailview = str_replace('[[lang_zone]]', $lang_str, $emailview);
                  $emailview = str_replace('[[comment]]', $comment, $emailview);
                  $emailview = str_replace('[[post_type]]', $post_type_label, $emailview);
                  $emailview = str_replace('[[post_title]]', $post->post_title, $emailview);
                  $emailview = str_replace('[[post_url]]', site_url() . "/wp-admin/post.php?post=" . $post->ID . "&action=edit", $emailview);
                  $subject = '[' . $post->post_title . '] - comment added: ' . substr(strip_tags($comment), 0, 30) . '...';
                  $message = $emailview;
                  $notifications_comments = get_post_meta($post->ID, 'notifications_comments' . $meta_marker, true);


                  $notifications_rules = get_post_meta($post->ID, 'notifications_rules' . $meta_marker, true);
                  $notifications_comments_list = explode(',', $notifications_comments);
                  if (is_array($notifications_rules) and count($notifications_rules) > 0) {
                  foreach ($notifications_rules as $key => $value) {
                  if ($value == "not_assi_com_yes") {
                  $assignee_id = get_post_meta($post->ID, 'assign_to' . $meta_marker, true);
                  if (!empty($assignee_id)) {
                  if (in_array($assignee_id, $notifications_comments_list)) {

                  } else {
                  array_push($notifications_comments_list, $assignee_id);
                  }
                  }
                  //$assignee=get_user($assignee_id);
                  }
                  if ($value == "not_team_com_yes") {
                  $team_ids = get_post_meta($post->ID, 'team_assignments' . $meta_marker, true);

                  if (!empty($team_ids)) {
                  $team_array = explode(',', $team_ids);
                  foreach ($team_array as $key => $member_id) {
                  if (in_array($member_id, $notifications_comments_list)) {

                  } else {
                  array_push($notifications_comments_list, $member_id);
                  }
                  }
                  }
                  }
                  if ($value == "not_selec_yes") {
                  $users_ids = get_post_meta($post->ID, 'notifications' . $meta_marker, true);

                  if (!empty($users_ids)) {
                  $users_array = explode(',', $users_ids);
                  foreach ($users_array as $key => $member_id) {
                  if (in_array($member_id, $notifications_comments_list)) {

                  } else {
                  array_push($notifications_comments_list, $member_id);
                  }
                  }
                  }
                  }
                  }
                  }



                  $notifications_comments = implode(',', $notifications_comments_list);
                  //$message='---'.$notifications_comments.'---'.$message;
                  $oThis->apmSendMail($current_user->user_email, $subject, $message);
                  // echo "////".$current_user->user_email;
                  if ($notifications_comments !== "") {
                  $notify_to_list = get_users(array('include' => $notifications_comments));
                  foreach ($notify_to_list as $user) {
                  if (intval($user->ID) !== intval($current_user->ID)) {
                  $oThis->apmSendMail($user->user_email, $subject, $message);
                  // echo "++++".$user->user_email;
                  }
                  }
                  } */
            }

            add_action('wp_ajax_apm_save_comments', 'apm_save_comments');

            function apm_delete_comments() {
                global $wpdb, $current_user;
                if (is_user_logged_in()) {
                    $comment_id = $_POST['comment_id'];
                    wp_delete_comment($comment_id);
                    echo $comment_id;
                }
            }

            add_action('wp_ajax_apm_delete_comments', 'apm_delete_comments');

            function apm_update_comments() {
                global $wpdb, $current_user;
                if (is_user_logged_in()) {
                    $comment_id = $_POST['comment_id'];
                    $comment = $_POST['comment'];
                    $commentarr = get_comment($comment_id, ARRAY_A);
//var_dump($commentarr);
                    $commentarr['comment_content'] = $comment;
                    wp_update_comment($commentarr);
// wp_delete_comment($comment_id);
                    echo $comment_id;
                }
            }

            add_action('wp_ajax_apm_update_comments', 'apm_update_comments');

            function apm_udpate_status() {
                global $wpdb, $current_user;
                if (is_user_logged_in()) {
                    $post_id = $_POST['post_id'];
                    $status = $_POST['status'];
                    $p = get_post($post_id);
                    $p->post_status = $status;
                    wp_update_post($p);
                    echo "true";
                } else {
                    echo "false";
                }
                die();
            }

            add_action('wp_ajax_apm_udpate_status', 'apm_udpate_status');

            function apm_get_childtable() {
                global $oThis, $wpdb, $current_user, $meta_marker;

                if (is_user_logged_in()) {
                    $post_id = $_POST['post_id'];
                    $post_type = $_POST['post_type'];
                    $meta_key = $_POST['meta_key'];
                    $search = $_POST['search'];
                    $field = $_POST['field'];

                    $oThis->AM_Core->get_childtable($post_id, $post_type, $meta_key, $search, $field);
                } else {
                    echo "false";
                }
                die();
            }

            add_action('wp_ajax_apm_get_childtable', 'apm_get_childtable');

            function apm_ajax_field_update() {
                global $oThis;
                $oThis->AM_Datagrid->apm_ajax_field_update($_POST);
            }

            add_action('wp_ajax_apm_ajax_field_update', 'apm_ajax_field_update');

            function apm_ajax_savesettings() {
                global $oThis;
                $oThis->AM_AppSettings->apm_ajax_savesettings();
            }

            add_action('wp_ajax_apm_ajax_savesettings', 'apm_ajax_savesettings');

            function apm_extensions() {
                global $oThis, $clearcache;
                $clearcache = "false";
                if (isset($_REQUEST['clearcache'])) {
                    $clearcache = $_REQUEST['clearcache'];
                }
                $subaction = $_REQUEST['subaction'];
                switch ($subaction) {
                    case 'get_extensions_files':
                        $str = $oThis->AM_Extensions->getExtensionsFiles();
                        break;
                    case 'get_suggest':
                        $str = $oThis->AM_Extensions->getExtensionsSuggest();
                        break;
                    case 'reset_check_fill_category':
                        foreach ($oThis->applications as $key => $application) {
                            if (isset($application['categories'])) {
                                $cat = $_REQUEST['category'];
                                $oThis->check_fill_category($application ['categories'], 'reset', $cat);
                            }
                        }
                        break;
                    default:
// var_dump($oThis->AM_Extensions);
//echo ' before getExtensionsAction ';
                        $str = $oThis->AM_Extensions->getExtensionsAction($subaction);
// echo ' after getExtensionsAction ';
                        break;
                }
                die();
            }

            add_action('wp_ajax_apm_extensions', 'apm_extensions');

            function apm_extensions_data() {
                global $oThis;
                $oThis->AM_Extensions->getExtensionsData();
                die();
            }

            add_action('wp_ajax_apm_extensions_data', 'apm_extensions_data');

            function apm_manage_grid_data() {
                global $oThis;
                $oThis->AM_Datagrid->manage_grid_data($_POST);
            }

            add_action('wp_ajax_apm_manage_grid_data', 'apm_manage_grid_data');

            function apm_add_category() {
                global $wpdb, $current_user;
                $name = $_REQUEST['name'];
                $parent = $_REQUEST['parent'];
//$slug = $_REQUEST['slug'];
                $description = $_REQUEST['description'];
                $tagcateg = $_REQUEST['tagcateg'];
                $parent_term = term_exists($tagcateg, $tagcateg); // array is returned if taxonomy is given
                if (!$parent_term) {
                    register_taxonomy($tagcateg, $tagcateg);
                }
                $ret = wp_insert_term(
                        $name, // the term
                        $tagcateg, // the taxonomy
                        array(
                    'description' => $description,
                    'parent' => $parent
                        )
                );

                echo $ret['term_id'];
                die();
            }

            add_action('wp_ajax_apm_add_category', 'apm_add_category');







//apm_save_comments
            add_action('admin_footer', array($this, 'apm_set_footer'));

//ADD a hidden field to know if we are in edit or create post
            function apm_edit_form_advanced() {
                global $wpdb, $current_user, $oThis;
                if (isset($_GET['post'])) {
                    $act = 'updated';
                } else {
                    $act = 'created';
                }
                echo "<input type='hidden' value='" . $act . "' name='apm_post_action' />";
            }

            add_action('edit_form_advanced', 'apm_edit_form_advanced');

// 	add_submenu_page('options-general.php',_('Applications Maker Plugin Help'), _('Applications Maker Plugin Help'), 'administrator', 'application-maker-help', array($this, 'application_maker_help'));




            /*             * *START MANAGE AUTO COMBO ON POST COLUMN, for CATEGORIES */
            function todo_restrict_manage_posts() {
                global $typenow, $post_type, $oThis;
                $args = array('public' => true, '_builtin' => false);
                $post_types = get_post_types($args);
                if (in_array($typenow, $post_types)) {
                    $filters = get_object_taxonomies($typenow);
                    $nb_of_filters = 0;
                    echo '<span id="apm_searchBlock"><strong>Advanced Search:</strong> <a id="apm_searchBlock_Hide" href="#">(Show)</a></span>
				    <div  id="apm_searchBlock_fields"><div>';
                    foreach ($filters as $tax_slug) {
                        $nb_of_filters++;
                        $tax_obj = get_taxonomy($tax_slug);
                        echo ' ' . $tax_obj->label . ':';
                        wp_dropdown_categories(array(
                            'show_option_all' => __('Show All '),
                            'taxonomy' => $tax_slug,
                            'name' => $tax_obj->name,
                            'orderby' => 'term_order',
                            'selected' => $_GET[$tax_obj->query_var],
                            'hierarchical' => $tax_obj->hierarchical,
                            'show_count' => false,
                            'hide_empty' => true
                        ));
                    }
                    echo '</div><div>';


//add custom dropdown comboboxes for custom fields, for "module_columns_filters" in the array
                    $post_type_object = $oThis->post_types[$post_type];
                    if (isset($post_type_object['module_columns_filters'])) {
                        foreach ($post_type_object['module_columns_filters'] as $object) {
                            $nb_of_filters++;
                            $field = $oThis->default_fields[$object];
                            switch ($field['field_type']) {
                                case 'select':
                                    if (isset($field['field_config']['post_type'])) {
                                        show_custom_post_dropdown($field['field_config']['post_type'], $field['label']);
                                    } else if (isset($field['field_config']['use_values']) and $field['field_config']['use_values'] == true) {
                                        echo ' ' . $field['label'] . ':<select name="key_' . $object . '" id="key_' . $object . '" class="postform">
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
                                        echo ' ' . $field['label'] . ":";
                                        echo '<input class="autocomplete_field" post_type="' . $select_post_type . '" fieldname="' . $object . '" type="text" id="autocomplete_' . $config['field'] . '" name="keydisplay_' . $object . '" value="' . $valueDisplay . '" style="width:180px" />';
                                        echo '<input class="autocomplete_field_value"  type="hidden" id="autocomplete_data_' . $object . '" name="key_' . $object . '" value="' . $value . '" />';

                                        $help_image = WP_PLUGIN_URL . '/' . WP_PLUGIN_FOLDER . '/img/bugsqa_16.png';
                                        echo '<span class="apm_help_btn"><img src="' . $help_image . '" /></span><span class="apm_legend_help">' . _('AutoSuggest field, please enter the first 3 characters.') . '</span>';
                                    }

                                    break;
                                case 'checkbox':
                                    show_custom_post_checkbox_dropdown($field['label'], $object);
                                    break;
                                case 'userslist':
                                    show_userlist_dropdown($field, $object);
                                    break;
                                case 'assignee':
                                    show_userlist_dropdown($field, $object);
                                    break;
                            }
                        }
                    }

                    echo '</div></div>';
                    if ($nb_of_filters == 0) {
                        echo '<script>
						jQuery("#apm_searchBlock").hide();
				  	  </script>';
                    }
                }
            }

//CREATE A CUSTOM DROP DOWN COMBO FILTER FOR A CHECKBOX CUSTOM FIELD
            function show_custom_post_checkbox_dropdown($label, $object) {
                global $post, $wpdb, $oThis;

                echo ' ' . $label . ':
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

//CREATE A CUSTOM DROP DOWN COMBO FILTER FOR A CUSTOM FIELD
            function show_custom_post_dropdown($post_type, $post_type_label) {
                global $post, $wpdb, $oThis;
                $posts_list = $oThis->AM_Core->get_posts_list_alone($post_type);
                echo ' ' . $post_type_label . ':
				<select name="key_' . $post_type . '" id="key_' . $post_type . '" class="postform">
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

//SHOW USERS DROPDOWN COMBO
            function show_userlist_dropdown($field, $object) {
                global $post, $wpdb, $oThis;
                echo " Assign to: ";
                wp_dropdown_users(array(
                    'show_option_all' => __('Show All'),
                    'name' => 'key_' . $object
                    , 'selected' => $_GET['key_' . $object]
                ));
                echo ' ';
            }

//MANAGE THE DATAGRIDS COMBO DROPDOWNS FILTERING
            function my_filter($query) {

                global $pagenow, $post_type, $oThis, $meta_marker;

                if ($pagenow == 'edit.php') {

                    $post_type_object = $oThis->post_types[$post_type];
                    if (isset($post_type_object['module_columns_filters'])) {
                        foreach ($post_type_object['module_columns_filters'] as $object) {
                            $field = $oThis->default_fields[$object];
//echo "---".$field['field_config']['post_type'];
                            if (isset($_GET['key_' . $field['field_config']['post_type']]) and $_GET['key_' . $field['field_config']['post_type']] !== 'all') {
                                set_query_var('meta_value', $_GET['key_' . $field['field_config']['post_type']]);
                                set_query_var('meta_key', $object . $meta_marker);
                                switch ($field['field_type']) {
                                    case 'select':
                                        set_query_var('meta_compare', '=');
                                        break;
                                }
                            } else if (isset($_GET['key_' . $object]) and $_GET['key_' . $object] !== 'all') {
                                set_query_var('meta_value', $_GET['key_' . $object]);
                                set_query_var('meta_key', $object . $meta_marker);
                                set_query_var('meta_compare', '=');
                            } else if (isset($field['field_type']) and $field['field_type'] == 'userslist' and isset($_GET['key_' . $object]) and $_GET['key_' . $object] !== 'all') {
                                set_query_var('meta_value', $_GET['key_' . $object]);
                                set_query_var('meta_key', $object . $meta_marker);
                                set_query_var('meta_compare', '=');
                            } else if (isset($field['field_type']) and $field['field_type'] == 'checkbox' and isset($_GET['key_' . $object]) and $_GET['key_' . $object] !== 'all') {
                                $v = $_GET['key_' . $object];
                                if ($v == '1') {
                                    set_query_var('meta_value', $v);
                                    set_query_var('meta_key', $object . $meta_marker);
                                    set_query_var('meta_compare', '=');
                                } else {
//set_query_var('meta_value','') ;
                                    set_query_var('meta_value', '1');
                                    set_query_var('meta_key', $object . $meta_marker);
                                    set_query_var('meta_compare', '!=');
                                }
                            }
                        }
                    }
                }
            }

            add_action('parse_query', 'my_filter');

            function todo_convert_restrict($query) {
                global $pagenow, $oThis;
                global $typenow;
                if ($pagenow == 'edit.php') {
                    $filters = get_object_taxonomies($typenow);
                    foreach ($filters as $tax_slug) {
                        $var = &$query->query_vars[$tax_slug];
                        if (isset($var)) {
                            $term = get_term_by('id', $var, $tax_slug);
                            $var = $term->slug;
                        }
                    }
                }
            }

            add_action('restrict_manage_posts', 'todo_restrict_manage_posts');
            add_filter('parse_query', 'todo_convert_restrict');


            /*             * *END MANAGE AUTO COMBO ON POST COLUMN, for CATEGORIES */
        }

///END INIT
//MAKE THE CUSTOM COLUMNS SORTABLE
//Register the columns to display as sortable
        function create_my_custom_columns_register_sortable($columns) {
            global $post, $wpdb;
            if (isset($_GET['post_type'])) {
                $selected_post_type = $_GET['post_type'];
                $post_type_obj = $this->post_types[$selected_post_type];
                $columns_list = $post_type_obj['module_columns'];
//echo var_dump($columns_list);
                foreach ($columns_list as $column) {
                    $columns[$column] = $column;
                }
            }
            return $columns;
        }

//Process the sorting for one column
        function my_column_orderby($vars) {
            global $wpdb, $wp_query, $oThis, $meta_marker;

//Is it a category? (look in our array listing all the custom categories)
            if (isset($this->all_categories[$vars['orderby']])) {

            } else { //Is not a category, so we process sort by the meta value of the column.
//note: currently sorting on ly the the meta_value that is a number ID value in case of related or Select combo data... Not sorting yet on the text value...
                if (isset($vars['orderby'])) {
                    $fieldname = $vars['orderby'];
                    $selected_post_type = $_GET['post_type'];
                    $field = $this->default_fields[$fieldname];
                    isset($field['field_type']) ? $field_type = $field['field_type'] : $field_type = 'textfield';

                    if ($field_type == 'select') {
                        if (isset($field['field_config'])) {
                            if (isset($field['field_config']['use_values']) or isset($field['field_config']['autoid']) or isset($field['field_config']['post_type'])) { //SO it is a number ID
                                $vars = array_merge($vars, array(
                                    'meta_key' => $fieldname . $meta_marker,
                                    'orderby' => 'meta_value_num'
                                        ));
                            } else {

                                $vars = array_merge($vars, array(
                                    'meta_key' => $fieldname . $meta_marker,
                                    'orderby' => 'meta_value'
                                        ));
                            }
                        } else {
                            $vars = array_merge($vars, array(
                                'meta_key' => $fieldname . $meta_marker,
                                'orderby' => 'meta_value'
                                    ));
                        }

//echo "<br/><br/><br/><br/>". var_dump($vars);
                    } else if ($field_type == 'datefield') {
                        $vars = array_merge($vars, array(
                            'meta_key' => $fieldname . $meta_marker,
                            'orderby' => 'meta_value'
//'orderby' =>'(SELECT STR_TO_DATE(meta_value,’%m/%d/%Y’) FROM '.$wpdb->postmeta.' WHERE post_id = '.$wpdb->posts.ID.' AND meta_key = ‘'.$fieldname.'_value.’)' . $wp_query->get(‘order’)
                                ));
//echo "<br/><br/><br/><br/>". '(SELECT STR_TO_DATE(meta_value,’%m/%d/%Y’) FROM '.$wpdb->postmeta.' WHERE post_id = '.$wpdb->posts.ID.' AND meta_key = ‘'.$fieldname.'_value.’)' . $wp_query->get(‘order’);
                    } else {
                        $vars = array_merge($vars, array(
                            'meta_key' => $fieldname . $meta_marker,
                            'orderby' => 'meta_value'
                                ));
                    }
                }
            }

            return $vars;
        }

        function test1($meta_sql) {
            echo '<br/><br/><br/><br/><br/>TEST ';
            echo var_dump($meta_sql);
            return $meta_sql;
        }

        function testposts_orderby($orderby) {
            echo '<br/><br/><br/><br/><br/>TEST order ';
            echo var_dump($orderby);
            return $orderby;
        }

        function get_currency($str) {
            global $post, $wpdb, $apm_settings;
            $cur = $apm_settings['configs']['default_currency'];
            $curOpt = get_option('15CRM_currency');
            if ($curOpt !== '' and $curOpt !== false and !empty($curOpt)) {
                $cur = $curOpt;
            }
            $str = str_replace("{{currency}}", $cur, $str);
            return $str;
        }

//CREATE CUSTOM COLUMNS ON DATA GRIDS
        function create_my_custom_columns($columns) {
            global $post, $wpdb, $apm_settings;
            if (isset($_GET['post_type'])) {
                $selected_post_type = $_GET['post_type'];
                $post_type_obj = $this->post_types[$selected_post_type];
                $columns_list = $post_type_obj['module_columns'];
                foreach ($columns_list as $column) {
                    if (isset($this->default_fields[$column])) {
                        $label = $this->default_fields[$column]['label'];
// $label = str_replace("{{currency}}", $apm_settings['configs']['default_currency'], $label);
                        $label = $this->get_currency($label);
                        $columns[$column] = $label;
                    } elseif (isset($this->all_categories[$column])) {
                        $columns[$column] = $this->all_categories[$column]['name'];
                    }
                }
            }
            return $columns;
        }

//DISPLAY THE CONTENT OF THE CUSTOM DATA GRIDS COLUMNS
        function my_show_columns($name) {
            global $post, $wpdb;
            $field_type = 'textfield';
            if (isset($this->default_fields[$name]['field_type'])) {
                $field_type = $this->default_fields[$name]['field_type'];
            }
            $val = $this->get_field_value($field_type, $name, $post);
            echo $val; //.$field_type;
        }

        function get_field_value($field_type, $name, $post_obj) {
            global $wpdb, $meta_marker, $apm_settings;
//echo "  +".$post_obj->ID."+  ";
            $val = '-';
            switch ($field_type) {
                case 'textfield':
                    $val = get_post_meta($post_obj->ID, $name . $meta_marker, true);
                    break;
                case 'currencyfield':
                    $val = get_post_meta($post_obj->ID, $name . $meta_marker, true) . " " . $apm_settings['configs']['default_currency'];
                    break;
                case 'numberfield':
                    $val = get_post_meta($post_obj->ID, $name . $meta_marker, true);
                    break;
                case 'userslist':
                    $valid = get_post_meta($post_obj->ID, $name . $meta_marker, true);
                    $users = get_users(array('include' => array($valid)));
                    $val = $users[0]->display_name;
                    $val = sprintf('<a href="%s"  title="Open the user ' . $val . '">%s</a>', esc_url(add_query_arg(array('user_id' => $valid), 'user-edit.php')), $val);
                    break;
                case 'assignee':
                    $valid = get_post_meta($post_obj->ID, $name . $meta_marker, true);
                    $users = get_users(array('include' => array($valid)));
                    $val = $users[0]->display_name;
                    $val = sprintf('<a href="%s"  title="Open the user ' . $val . '">%s</a>', esc_url(add_query_arg(array('user_id' => $valid), 'user-edit.php')), $val);
                    break;
                case 'autocomplete':
                    $valid = get_post_meta($post_obj->ID, $name . $meta_marker, true);
                    if (is_array($valid)) {
                        $valid = implode(',', $valid);
                    }
                    if (isset($this->default_fields[$name]['field_config']['post_type'])) {
                        $query = "SELECT post_title, ID FROM $wpdb->posts " .
                                "WHERE post_type='" . $this->default_fields[$name]['field_config']['post_type'] . "' AND ID in (" . $valid . ")";
                        $posts_list = $wpdb->get_results($query);
                        $val = $this->AM_Core->get_posts_list_titles($posts_list, true);
                    }
                    break;
                case 'select':
                    $valid = get_post_meta($post_obj->ID, $name . $meta_marker, true);
//$val.=" ".$this->default_fields[$name]['field_config']['post_type'];
                    if (is_array($valid)) {
                        $valid = implode(',', $valid);
                    }
                    if (isset($this->default_fields[$name]['field_config']['post_type'])) {
                        $query = "SELECT post_title, ID FROM $wpdb->posts " .
                                "WHERE post_type='" . $this->default_fields[$name]['field_config']['post_type'] . "' AND ID in (" . $valid . ")";
                        $posts_list = $wpdb->get_results($query);
                        $val = $this->AM_Core->get_posts_list_titles($posts_list, true);
                    } else if (isset($this->default_fields[$name]['field_config']['use_values'])) {

                        $val = _('None');
                        $values = $this->default_fields[$name]['options'];
                        foreach ($values as $key => $value) {
                            if ($key == $valid) {
                                $val = $value;
                            }
                        }
                    } else {
                        $val = $valid;
                    }
                    break;
                case 'checkbox':
                    $val = get_post_meta($post_obj->ID, $name . $meta_marker, true);
                    $txt = 'No';
                    if ($val == '1') {
                        $txt = 'Yes';
                    }
                    $val = $txt;
                    break;
                case 'datefield':
                    $val = get_post_meta($post_obj->ID, $name . $meta_marker, true);
                    break;
            }
            if (isset($this->all_categories[$name])) {
//$categ=$this->all_categories[$name];
                $val = '';
                $_taxonomy = $name;
                $terms = get_the_terms($post_obj->ID, $_taxonomy);
//echo $_taxonomy;
                if (!empty($terms)) {
                    $out = array();
                    foreach ($terms as $c)
                        $out[] = $c->name;
                    $val.= join(', ', $out);
                } else {
                    $val = ' None';
                }
            }

            return $val;
        }

        function post_edit_form_tag() {
            echo ' enctype="multipart/form-data"';
        }

//MANAGE THE FEATURED IMAGES SIZE AND EXTRA FEATURED IMAGES BLOCKS
        public function manage_featured_images() {

            add_image_size('apm_grid_thumb', 50, 50, true);
            foreach ($this->applications as $mainkey => $application) {
                $modules = $application ['modules'];
                foreach ($modules as $key => $module) {
                    if (isset($module['custom_featured_image'])) {
                        if (isset($module['custom_featured_image']['sizes'])) {
                            foreach ($module['custom_featured_image']['sizes'] as $size_key => $size) {
                                if (isset($size[2]) and $size[2] == true) {
                                    add_image_size($size_key, $size[0], $size[1], true);  ///CROPPING
                                } else {
                                    add_image_size($size_key, $size[0], $size[1]);
                                }
                            }
                        }
                        if (isset($module['custom_featured_image']['blocks']) and class_exists('MultiPostThumbnails')) {
                            foreach ($module['custom_featured_image']['blocks'] as $block_key => $block) {
                                new MultiPostThumbnails(array('label' => $block, 'id' => $block_key, 'post_type' => $key));
                            }
                        }
                    }
                }
            }
        }

//ADD THE CUSTOM METABOXES
        public function myplugin_add_custom_box() {
            global $current_user;


            foreach ($this->post_types as $key => $post_type_obj) {
                if (isset($post_type_obj['metaboxes'])) {
                    foreach ($post_type_obj['metaboxes'] as $metaboxkey => $metabox_obj) {
                        if (isset($metabox_obj['fields']) or isset($metabox_obj['positioning'])) {
                            if (count($metabox_obj['fields']) > 0 or count($metabox_obj['positioning']) > 0) {
                                $module_name = $key;
                                add_meta_box($metaboxkey, $metabox_obj['title'], 'myplugin_inner_custom_box', $key, $metabox_obj['context'], $metabox_obj['priority'], array('post_type' => $key));
                            }
                        }
                    }
                }
            }

            function myplugin_inner_custom_box($post, $metabox) {
                global $post_types, $oThis;
// Use nonce for verification
                wp_nonce_field(plugin_basename(__FILE__), 'app-maker-nonce');
// The actual fields for data entry
                $current_post_type = $post_types[$metabox['args']['post_type']];
                $oThis->AM_Core->setRelations($current_post_type);
                $previewbtn = false;
                if (isset($current_post_type['module_editform']['use_previewbtn'])) {
                    $previewbtn = $current_post_type['module_editform']['use_previewbtn'];
                };
                $oThis->AM_Core->setFieldsBox($key, $current_post_type['metaboxes'], $previewbtn);
                foreach ($current_post_type['metaboxes'] as $key => $metabox_obj) {
                    if ($key == $metabox['id']) {//and isset($metabox_obj['fields'])
                        /* foreach($metabox_obj['fields'] as $field){
                          $oThis->AM_Core->setField($field);
                          } */
                        $oThis->AM_Core->setFieldsBox($key, $metabox_obj, $previewbtn);
                    }
                }
            }

        }

//CREATE ALL THE CUSTOM POST TYPES FROM $this->applications
        public function create_main_post_types() {
            global $apm_settings;
            foreach ($this->applications as $mainkey => $application) {
                $appli_post_types = $application ['modules'];
                foreach ($appli_post_types as $key => $post_type_obj) {
                    $supports = array('title');


                    if (isset($post_type_obj['show_editor']) and $post_type_obj['show_editor'] == true) {
                        array_push($supports, 'editor');
                    }
                    if (isset($post_type_obj['hide_featured_image']) and $post_type_obj['hide_featured_image'] == true) {

                    } else {
                        array_push($supports, 'thumbnail');
                    }
                    if (isset($post_type_obj['hide_author']) and $post_type_obj['hide_author'] == true) {

                    } else {
                        array_push($supports, 'author');
                    }
                    if (isset($post_type_obj['is_page']) and $post_type_obj['is_page'] == true) {
                        $is_page = true;
                    } else {
                        $is_page = false;
                    }
                    if (isset($post_type_obj['hide_attributes']) and $post_type_obj['hide_attributes'] == true) {

                    } else {
                        array_push($supports, 'page-attributes');
                    }
                    if (isset($post_type_obj['show_editor']) and $post_type_obj['show_editor'] == true) {
                        array_push($supports, 'editor');
                    }
                    if (isset($post_type_obj['module_categories'])) {
                        $module_categories = $post_type_obj['module_categories'];
                    } else {
                        $module_categories = array();
                    }

                    if (isset($post_type_obj['module_tags'])) {
                        $module_tags = $post_type_obj['module_tags'];
                    } else {
                        $module_tags = array();
                    }
                    if (isset($post_type_obj['slug'])) {
                        $post_slug = $post_type_obj['slug'];
                    } else {
                        $post_slug = $key;
                    }
                    $icon = '';
                    if (isset($post_type_obj['icon'])) {
                        $icon = "<img src='" . $apm_settings['paths']['img'] . "/" . $post_type_obj['icon'] . "' /> ";
                    }

//echo '<br/><br/><br/>----'.$key;
//15CRM_app_menuname
                    $menu_name = $post_type_obj['name'];
                    $publicly_queryable = true;
                    if (isset($post_type_obj['publicly_queryable'])) {
                        $publicly_queryable = $post_type_obj['publicly_queryable'];
                    }
//exclude_from_search publicly_queryable
                    $exclude_from_search = false;
                    if (isset($post_type_obj['exclude_from_search'])) {
                        $exclude_from_search = $post_type_obj['exclude_from_search'];
                    }
                    register_post_type($key, array(
                        'labels' => array(
                            'name' => $post_type_obj['name'],
                            'singular_name' => $post_type_obj['singular_name'],
                            'menu_name' => _('List ') . " " . $menu_name,
                            'add_new' => _('Add New') . " " . $post_type_obj['singular_name'],
                            'add_new_item' => _('Add New') . " " . $post_type_obj['singular_name'],
                            'new_item' => _('New') . " " . $post_type_obj['singular_name'],
                            'edit_item' => _('Edit') . " " . $post_type_obj['singular_name'],
                            'all_items' => '<a href="post-new.php?post_type=' . $key . '" style="float:left;" title="Add a new ' . $post_type_obj['singular_name'] . '"><img src="' . $apm_settings['paths']['img'] . '/plus_16.png" /></a><a href="edit.php?post_type=' . $key . '" style="float:left;"  title="View all ' . $post_type_obj['name'] . '"> ' . $icon . $post_type_obj['menu_name'] . '</a><br clear="all"/>',
                            //'all_items' => '<img src="'.$apm_settings['paths']['img'].'/plus_16.png" />'.$icon.$post_type_obj['menu_name'].'<br clear="all"/>',
                            'view_item' => _('View') . " " . $post_type_obj['singular_name'],
                            'search_items' => _('Search') . " " . $post_type_obj['singular_name'],
                            'not_found' => _('No') . " " . $post_type_obj['singular_name'] . " " . _('found')
                        ),
                        'public' => true,
                        'show_ui' => true,
                        'show_in_menu' => false, //$mainkey.'-main-menu',//false,//
                        'publicly_queryable' => $publicly_queryable,
                        //'capability_type' => 'post',
//'capabilities' =>array( 'administrator' ),
//'hierarchical' => $is_page,

                        'exclude_from_search' => $exclude_from_search,
                        'rewrite' => array('slug' => $post_slug),
                        'supports' => $supports
//,'taxonomies' =>array('cat_module_types')//$module_categories
                            )
                    );
//echo '<br>-///---'.$mainkey .'-main-menu';
                }
            }

            foreach ($this->applications as $key => $application) {
                if (isset($application['categories'])) {
                    foreach ($application['categories'] as $catkey => $category) {
                        register_taxonomy(
                                $catkey, null, array(
                            'labels' => array(
                                'name' => $category['name'],
                                'singular_name' => $category['name']
                            ),
                            //'capabilities' =>array( 'administrator' ),
                            'hierarchical' => true
                                )
                        );
                    };
// update_option('already_fill_' . $k, true);
                    $this->check_fill_category($application ['categories']);
                }

                if (isset($application['tags'])) {
//echo '<br/><br/><br/><br/><br/><br/><br/><br/>****'.var_dump($application['tags']);
                    foreach ($application['tags'] as $catkey => $category) {
//echo $category['name'].'-'.$catkey;
                        register_taxonomy(
                                $catkey, null, array(
                            'labels' => array(
                                'name' => $category['name'],
                                'singular_name' => $category['name']
                            ),
                            //'capabilities' =>array( 'administrator' ),
                            'hierarchical' => false
                                )
                        );
                    };
                }
//echo '<br>----'.$key .'-main-menu';
            }
            foreach ($this->applications as $key => $application) {
                $appli_post_types = $application ['modules'];
                foreach ($appli_post_types as $subkey => $post_type_obj) {
                    if (isset($post_type_obj['module_categories'])) {
                        foreach ($post_type_obj['module_categories'] as $categ_name) {
                            register_taxonomy_for_object_type($categ_name, $subkey);
                        }
                    }
                    if (isset($post_type_obj['module_tags'])) {
                        foreach ($post_type_obj['module_tags'] as $categ_name) {
                            register_taxonomy_for_object_type($categ_name, $subkey);
                        }
                    }
                }
            }
        }

//ADD MAIN APPLICATIONS TOP MENUS
        public function my_admin_head() {
            global $current_user, $main_config, $apm_settings, $post, $post_type, $appli_post_types;
            $oThis = $this;
            if (isset($_REQUEST['action']) and $_REQUEST['action'] == "edit") {
//$post->post_type
                $tb = false;
                $appkey = "";
                $app = false;
                $module = false;
                foreach ($this->applications as $key => $application) {
                    foreach ($application['modules']as $subkey => $module_obj) {
                        if ($subkey == $post->post_type) {
                            $tb = true;
                            $appkey = $key;
                            $app = $application;
                            $module = $module_obj;
                        }
                    }
                }
                if ($tb) {
                    $oThis->AM_Datagrid->config = array(
                        'appkey' => $appkey,
                        'modulekey' => $post->post_type,
                        'app' => $app,
                        'module' => $module,
                    );
                    $this->AM_Datagrid->set_top_modules_list();
                }
            }
            $user_rich_text = get_user_meta($current_user->ID, 'rich_editing', true);
            if ($user_rich_text == 'false') {
// echo "<div class='update-nag'><strong>The APM plugin is requiring to have you user set to allow using Rich Text Editor, and the editor must be TinyMce.<br/>Your current settings will generate a bug in our plugin. We are working to change this but for the moment please adapt your user settings.</strong></div>";
            }
            if (wp_default_editor() !== 'tinymce') {
// echo "<div class='update-nag'><strong>The APM plugin is requiring to have you default Rich Text Editor activated and set to TinyMce.<br/>Your current settings will generate a bug in our plugin. We are working to change this but for the moment please adapt your settings.</strong></div>";
            }
        }

//ADD MAIN APPLICATIONS TOP MENUS
        public function my_appmaker_menu() {
            global $main_config, $apm_settings;
            $oThis = $this;
            $this->toto = 'llll';
            $role = get_role('contributor');
            $role->add_cap('apm_cap');
            $role = get_role('author');
            $role->add_cap('apm_cap');
            $role = get_role('editor');
            $role->add_cap('apm_cap');
            $role = get_role('administrator');
            $role->add_cap('apm_cap');
            $main_config['default_role_minimum'] = "apm_cap";
            $this->special_links = array();
            foreach ($this->applications as $key => $application) {
                /*  $setting_app_active_op = get_option($application ['name'] . '_app_active');
                  if ($setting_app_active_op == 'off') {
                  $setting_app_active = false;
                  } */

                $setting_app_active = false;
                if (current_user_can('administrator')) {
                    $setting_app_active = true;
                }
                if (isset($application ['option_isactive_name'])) {
                    $option_isactive_name = $application ['option_isactive_name'];
                    $isactive = get_option($option_isactive_name);
// var_dump($isactive);
                    if ($isactive !== 'off') {
                        $setting_app_active = true; //
                    }
                }
                if (isset($application ['active']) and $application ['active'] == false) {
                    $setting_app_active = false;
                }
                if ($setting_app_active == true) {
                    $menuname = $application ['menuname'];
                    $str = get_option($application ['name'] . '_app_menuname');
                    if ($str !== '' and $str !== false and !empty($str)) {
                        $menuname = $str;
                    }
                    if (isset($application ['special_links'])) {
                        if (count($application ['special_links']) > 0) {
                            foreach ($application ['special_links'] as $spk => $spo) {
                                switch ($spo ['type']) {
                                    case 'page':
                                        if (strpos($spo ['roles_authorized'], ',') == -1) {
                                            if (current_user_can($spo ['roles_authorized'])) {
                                                add_menu_page($spo ['linktitle'], $spo ['linktitle'], $main_config['default_role_minimum'], $spk . '_home', array($this->AM_AppSettings, 'do_link_page'), plugin_dir_url(__FILE__) . 'img/origami_logo_16.png', $spo ['position']);
                                            }
                                        } else {
                                            $spbool = false;
                                            $sproles = explode(',', $spo ['roles_authorized']);
                                            foreach ($sproles as $kr => $srole) {
                                                if (current_user_can($srole)) {
                                                    $spbool = true;
                                                }
                                            }
                                            if ($spbool) {
                                                add_menu_page($spo ['linktitle'], $spo ['linktitle'], $main_config['default_role_minimum'], $spk . '_home', array($this->AM_AppSettings, 'do_link_page'), plugin_dir_url(__FILE__) . 'img/origami_logo_16.png', $spo ['position']);
                                            }
                                        }
                                        break;

                                    case 'link':
                                        if (strpos($spo ['roles_authorized'], ',') == -1) {
                                            if (current_user_can($spo ['roles_authorized'])) {
                                                $this->special_links[$spk] = $spo;
                                                add_menu_page($spo ['linktitle'], $spo ['linktitle'], $main_config['default_role_minimum'], $spk . '_home', array($this->AM_AppSettings, 'do_link_url'), plugin_dir_url(__FILE__) . 'img/origami_logo_16.png', $spo ['position']);
                                            }
                                        } else {
                                            $spbool = false;
                                            $sproles = explode(',', $spo ['roles_authorized']);
                                            foreach ($sproles as $kr => $srole) {
                                                if (current_user_can($srole)) {
                                                    $spbool = true;
                                                }
                                            }
                                            if ($spbool) {
                                                $this->special_links[$spk] = $spo;
                                                add_menu_page($spo ['linktitle'], $spo ['linktitle'], $main_config['default_role_minimum'], $spk . '_home', array($this->AM_AppSettings, 'do_link_url'), plugin_dir_url(__FILE__) . 'img/origami_logo_16.png', $spo ['position']);
                                            }
                                        }
                                        break;
                                }
                            }
                        }
                    }
// add_menu_page($application ['name'], $menuname, $main_config['default_role_minimum'], $key . '-main-menu', array($this, 'my_appmaker_menu_do'));
                    add_menu_page($application ['name'], $menuname, $main_config['default_role_minimum'], $key . '_home', array($this->AM_AppSettings, 'do_home_page'), plugin_dir_url(__FILE__) . 'img/origami_logo_16.png');

                    $appli_post_types = $application ['modules'];
//add_submenu_page($key . '-main-menu', $key . '_home', $menuname . ' Home', $main_config['default_role_minimum'], $key . '_home', array($this->AM_AppSettings, 'do_home_page'));
//add_submenu_page($key . '-main-menu', $key . '_taxonomy', 'Categories and Tags', $main_config['default_role_minimum'], $key . '_taxonomy', array($this->AM_AppSettings, 'do_taxonomy_page'));


                    foreach ($appli_post_types as $subkey => $post_type_obj) {

//foreach ($oThis->post_types as $key => $post_type_obj) {
// }
                        if (isset($post_type_obj['roles_authorized']) and $post_type_obj['roles_authorized'] != '') {

                            if (!$this->check_roles_authorized($post_type_obj['roles_authorized']))
                                continue;
                        }
                        $icon = '';
                        if (isset($post_type_obj['icon'])) {
                            $icon = "<img src='" . $apm_settings['paths']['img'] . "/" . $post_type_obj['icon'] . "' /> ";
                        }
                        $menu = '<a href="post-new.php?post_type=' . $subkey . '" style="float:left;" title="Add a new ' . $post_type_obj['singular_name'] . '">';
                        $menu.='<img src="' . $apm_settings['paths']['img'] . '/plus_16.png" /></a><a href="admin.php?page=' . $key . '-' . $subkey . '" style="float:left;"  title="View all ' . $post_type_obj['name'] . '"> ' . $icon . $post_type_obj['menu_name'] . '</a><br clear="all"/>';

                        add_submenu_page($key . '_home', $key . '_' . $subkey, $menu, $main_config['default_role_minimum'], $key . '-' . $subkey, create_function('', 'return apm_do_list("' . $key . '","' . $subkey . '");')
                        );
                    };
                };
            }

            if ($main_config['user_generic_settings'] == true) {
                add_menu_page('ORIGAMISETTINGS', 'BLUE ORIGAMI General Settings', 'administrator', 'origami_home', array($this->AM_AppSettings, 'do_origsetting_page'), plugin_dir_url(__FILE__) . 'img/origami_logo_16.png');
            }

//CREATE DATAGRIDS
            function apm_do_list($appkey, $modulekey) {
                global $main_config, $oThis;
                $app = $oThis->applications[$appkey];
                $module = $app['modules'][$modulekey];


                $oThis->AM_Datagrid->config = array(
                    'appkey' => $appkey,
                    'modulekey' => $modulekey,
                    'app' => $app,
                    'module' => $module,
                );
                $oThis->AM_Datagrid->default_fields = $oThis->default_fields;
                $oThis->AM_Datagrid->set_top_modules_list();
                $oThis->AM_Datagrid->set_new_grid();
//$oThis->AM_Datagrid->set_page_header();
//$oThis->AM_Datagrid->set_tabs();
//$oThis->AM_Datagrid->set_footer();
            }

        }

//ADD CUSTOM CATEGORIES IN THE APPLICATION MENU
        public function my_categ_menu() {
            global $main_config;
            foreach ($this->applications as $key => $application) {
                if (isset($application['categories']) and isset($application['show_categories_in_menu']) and $application['show_categories_in_menu'] == true) {
                    foreach ($application['categories'] as $catkey => $category) {
                        add_submenu_page($key . '-main-menu', $category['name'], 'Category ' . $category['menu_name'], $main_config['default_role_minimum'], $catkey, array($this, 'my_categories_redirect_do'));
                    };
                }
            }
        }

//REDIRECT TO A TAXNOMONY PAGE FORM A LINK IN THE APPLICATION MENU
        public function my_categories_redirect_do() {
            /* if (!current_user_can('administrator'))  {
              wp_die( __('You do not have sufficient permissions to access this page.') );
              } */
//echo site_url().'/wp-admin/';
            wp_redirect(site_url() . '/wp-admin/edit-tags.php?taxonomy=' . $_GET['page']);
//header("Location: ".site_url().'/wp-admin/edit-tags.php?taxonomy='.$_GET['page'], true);
            echo "<h5>Redirecting to the category</h6>.
			<script type='text/javascript'>
			  document.location.href='" . site_url() . '/wp-admin/edit-tags.php?taxonomy=' . $_GET['page'] . "';
			</script>
			<p>If you are not auto redirected to your category, please <a href='" . site_url() . '/wp-admin/edit-tags.php?taxonomy=' . $_GET['page'] . "'>click here</a>. (You need to activate your javascript for using Wordpress)</p>";
            exit;
//echo 'after redirect wp';
        }

///DISPLAY THE CONVERTOR PAGE
//DEPRECATED!!!!!

        /* public function my_appmaker_convert_apps_do($args) {
          global $oThis, $apm_settings,$meta_marker;
          if (!current_user_can('administrator'))  {
          wp_die( __('>>>You do not have sufficient permissions to access this page.') );
          }

          $appName=str_replace('toplevel_page_', '', current_filter());
          $appNameArr=explode('_',$appName);
          $appName=$appNameArr[2];
          $appName=str_replace('-convert', '', $appName);
          $appLabel=$oThis->applications[$appName]['name'];

          require_once APPLICATION_MAKER_PATH . 'views/apm-converter.php';

          } */



//DISPLAY THE MAIN PAGE OF THE APPLICATION
        public function my_appmaker_menu_do($args) {
            global $oThis, $apm_settings, $meta_marker, $wpdb, $post_types;

            $appName = str_replace('toplevel_page_', '', current_filter());
            $appName = str_replace('-main-menu', '', $appName);
            $appLabel = $oThis->applications[$appName]['name'];

///-main-menu
            if (isset($_GET['action-type'])) {
                $action_type = $_GET['action-type'];
                switch ($action_type) {
                    case 'convert':
                        require_once APPLICATION_MAKER_PATH . 'views/apm-converter.php';
                        break;
                }
            } else {
                $appIntrotext = '';
                if (isset($oThis->applications[$appName]['intro_page_text'])) {
                    $appIntrotext = '<p>' . $oThis->applications[$appName]['intro_page_text'] . '</p>';
                }

                require_once APPLICATION_MAKER_PATH . 'views/apm-home-top.php';

                if (isset($oThis->applications[$appName]['options_form'])) {
                    if (current_user_can('administrator')) {
                        require_once APPLICATION_MAKER_PATH . 'views/' . $oThis->applications[$appName]['options_form'] . '.php'; //apm-home-options
//wp_die( __('You do not have sufficient permissions to access this page.') );
                    }
                }
            }
        }

//CREATE CUSTOM DASHBOARD WIDGETS
        function get_word_from_number($name) {
            $name = str_replace(' ', '_', $name);
            $name = str_replace('1', 'one_', $name);
            $name = str_replace('2', 'two_', $name);
            $name = str_replace('3', 'three_', $name);
            $name = str_replace('4', 'four_', $name);
            $name = str_replace('5', 'five_', $name);
            $name = str_replace('6', 'six_', $name);
            $name = str_replace('7', 'seven__', $name);
            $name = str_replace('8', 'height', $name);
            $name = str_replace('9', 'nine_', $name);
            $name = str_replace('0', 'zero_', $name);
            return $name;
        }

        function check_roles_authorized($roles_authorizeds) {
            global $current_user;

            $roles_authorizeds = explode(',', $roles_authorizeds);

            foreach ($roles_authorizeds as $roles_authorized) {
                if ($roles_authorized == 'all')
                    return true;

                if ($current_user->roles[0] == $roles_authorized || $current_user->roles[0] == 'administrator')
                    return true;
            }
            return false;
        }

        function myplugin_add_dashboard_widgets() {
//

            foreach ($this->applications as $mainkey => $application) {
                $appli_post_types = $application ['modules'];
                foreach ($appli_post_types as $key => $post_type_obj) {
                    /* var_dump($post_type_obj);
                      if (isset($post_type_obj['remove_meta_box'])) {
                      echo "<br>";
                      foreach ($post_type_obj['remove_meta_box'] as $kmb => $mb) {
                      remove_meta_box($kmb, $post_type_obj, $mb->position);
                      }
                      } */
                    if (isset($post_type_obj['module_dashboard_widgets'])) {
                        foreach ($post_type_obj['module_dashboard_widgets'] as $widgetkey => $widget) {
                            $name = strtolower($post_type_obj["name"]);
                            $name = $this->get_word_from_number($name);
//$name=preg_replace('%[0-9]%', '_', $name, 1);
                            wp_add_dashboard_widget('fgl_dashboard_widget_' . $key . "_" . $widgetkey, $widget['label'], create_function('', 'return myplugin_do_dashboard_widgets("' . $key . '",' . $name . ',"' . $widgetkey . '");'), create_function('', 'return myplugin_control_dashboard_widgets("' . $key . '",' . $name . ',"' . $widgetkey . '");'));
//, array($this, 'myplugin_control_dashboard_widgets'));//array($this, 'myplugin_do_dashboard_widgets')
                        }
                    }
                }
            }
            foreach ($this->applications as $mainkey => $application) {
                $appli_widg = $application ['widgets'];
                if (count($appli_widg) > 0) {
                    foreach ($appli_widg as $widgetkey => $widget) {
                        $name = strtolower($widget["name"]);
                        $name = $this->get_word_from_number($name);
//$name=preg_replace('%[0-9]%', '_', $name, 1);
                        $lab = $widget['label'];
// $appName=$application ['name'];
                        $opappLabel = get_option($mainkey . '_app_name');
                        $appLabel = $application['singular_name'];
                        if ($opappLabel !== '' and $opappLabel !== false and !empty($opappLabel)) {
                            $appLabel = $opappLabel;
                        }
                        $lab = str_replace('{{appname}}', $appLabel, $lab);
                        if (isset($widget['default_nbr'])) {
                            $nbr = $widget['default_nbr'];
// } else if(){
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
// var_dump($isactive);
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
                        // var_dump();

                        $widg = $widget;
                        $boolsub = false;
                        if (isset($widg['dashboard_type'])) {
                            $widgtype = $widg['dashboard_type'];
                        } else {
                            $widgtype = 'default';
                        }
                        // if ($widg['dashboard_type'] == 'default') {
                        //  $boolsub = true;
                        // } else {
                        if (isset($_GET['dashboard_type'])) {
                            if (strpos($widgtype, ',') == -1) {
                                if ($_GET['dashboard_type'] == $widgtype) {
                                    $boolsub = true;
                                }
                            } else {
                                $dashtypes = explode(',', $widgtype);
                                foreach ($dashtypes as $kd => $dasht) {
                                    if ($_GET['dashboard_type'] == $dasht) {
                                        $boolsub = true;
                                    }
                                }
                            }
                        } else {
                            if (strpos($widgtype, ',') == -1) {
                                if ($widgtype == 'default') {
                                    $boolsub = true;
                                }
                            } else {
                                $dashtypes = explode(',', $widgtype);
                                foreach ($dashtypes as $kd => $dasht) {
                                    if ($dasht == 'default') {
                                        $boolsub = true;
                                    }
                                }
                            }
                        }
                        //}




                        if ($bool and $boolsub) {
                            wp_add_dashboard_widget('fgl_dashboard_widget_' . $widgetkey, $lab, create_function('', 'return myplugin_do_app_dashboard_widgets("' . $mainkey . '","' . $widgetkey . '","' . $appLabel . '");')); //, create_function('', 'return myplugin_app_control_dashboard_widgets("' . $mainkey . '","' . $widgetkey . '","' . $appLabel . '");')
                        }   //, array($this, 'myplugin_control_dashboard_widgets'));//array($this, 'myplugin_do_dashboard_widgets')
                    }
                }
            }
            remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
            remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
            remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
            remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
            remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
            remove_meta_box('dashboard_recent_drafts', 'dashboard', 'normal');
            remove_meta_box('dashboard_primary', 'dashboard', 'normal');
            remove_meta_box('dashboard_secondary', 'dashboard', 'normal');

            $oThis = $this;

            function myplugin_do_app_dashboard_widgets($mainkey, $widgetkey, $applabel) {
                global $oThis;
                $oThis->AM_Extensions->doAppDashboardHome($mainkey, $widgetkey, $oThis, $applabel);
            }

            function myplugin_app_control_dashboard_widgets($mainkey, $widgetkey, $applabel) {
                global $oThis;
            }

            ;

            function myplugin_do_dashboard_widgets($post_type, $post_type_label, $widgetkey) {
                global $oThis;
                $oThis->myplugin_do_dashboard_widgets($post_type, $post_type_label, $widgetkey);
            }

            ;

            function myplugin_control_dashboard_widgets($post_type, $post_type_label, $widgetkey) {
                global $oThis;
                $oThis->myplugin_control_dashboard_widgets($post_type, $post_type_label, $widgetkey);
            }

            ;
        }

        function myplugin_do_dashboard_widgets($post_type, $post_type_label, $widgetkey) {
            global $oThis, $wpdb, $meta_marker, $apm_settings;
//$post_type='fgl_invoices';
//$post_type_label='Invoices';'15_green_leaves'
            foreach ($oThis->applications as $appli) {
                $applications = $appli['modules'][$post_type];
                $widgObject = $applications['module_dashboard_widgets'][$widgetkey];

                $widgType = $widgObject['type'];

                $widgets = get_option('dashboard_widget_options'); // Get the dashboard widget options
                $widget_id = 'fgl_dashboard_widget_' . $post_type . "_" . $widgetkey; // This must be the same ID we set in wp_add_dashboard_widget
                $widget_latest_default_max = esc_attr(get_option('widget_latest_default_max'));
                if ($widget_latest_default_max == false) {
                    $widget_latest_default_max = 15;
                }
                $total_items = isset($widgets[$widget_id]) && isset($widgets[$widget_id]['items']) ? absint($widgets[$widget_id]['items']) : $widget_latest_default_max;

                $calculs_array = array();
                /*
                 * Check whether we have set the post count through the controls.
                 * If we didn't, set the default to 5
                 */
                switch ($widgType) {
                    case 'latest_list':
                        break;
                    case 'filtered_list':
                        $total_items = 1000000;
                        break;
                    case 'calculs_only':
                        $total_items = 1000000;
                        break;
                } //END  switch($widgType){

                $q = array(
// Leave this as "post" if you just want blog posts
                    'post_type' => $post_type,
                    'post_status' => 'publish',
                    'posts_per_page' => $total_items,
                    //  'orderby' => $sortby,
                    'order' => 'DESC'
                );

                $sortby = 'date';
                if (isset($widgObject['sortby'])) {
                    $sortby = $widgObject['sortby'];
                    if (isset($widgObject['sortbymetavalue']) and $widgObject['sortbymetavalue'] == true) {
                        $sortby = 'meta_value';
                        $q['meta_key'] = $widgObject['sortby'] . $meta_marker;
                    }
                    if (isset($widgObject['sortbymetavalue_num']) and $widgObject['sortbymetavalue_num'] == true) {
                        $sortby = 'meta_value_num';
                        $q['meta_key'] = $widgObject['sortby'] . $meta_marker;
                    }
                }
                $q['orderby'] = $sortby;

                if (isset($widgObject['filters'])) {
                    $mq = array();
                    foreach ($widgObject['filters'] as $filterkey => $filterobj) {
                        $filtervalue = $filterobj['value'];
                        if (is_array($filtervalue)) {
                            $in = join(',', $filtervalue);
                            array_push($mq, array('key' => $filterkey . $meta_marker, 'value' => $filtervalue, 'compare' => 'IN'));
                        } else {
                            array_push($mq, array('key' => $filterkey . $meta_marker, 'value' => $filtervalue));
                        }
                    }
                    if (isset($widgObject['filters_relation_is_or']) and $widgObject['filters_relation_is_or'] == true) {
                        $mq['value'] = 'OR';
                    }
                    $q['meta_query'] = $mq;
                }
//echo var_dump($q);
                $posts_query = new WP_Query($q);
                $posts = & $posts_query->posts;
                $total_items_result = 0;
                if ($posts && is_array($posts)) {

                    $list = array();
                    foreach ($posts as $post) { // Loop through our array
                        $total_items_result++;
                        $url = get_edit_post_link($post->ID); // The URL to the "Edit" post page
                        $title = get_the_title($post->ID); // The title of the post
                        $chars = 30; // Our character limit

                        $date = "";
                        if (isset($widgObject['show_date']) and $widgObject['show_date'] == true) {
                            $date = "<abbr title='" . get_the_time(__('Y/m/d g:i:s A'), $post) . "'>" . get_the_time(get_option('date_format'), $post) . '</abbr>';
                        }

                        $special_fields_str = "";
                        if (isset($widgObject['fields'])) {
                            $fields = $widgObject['fields'];
                            foreach ($fields as $field) {
                                $field_type = 'textfield';
                                $field_label = "";
                                if (isset($this->default_fields[$field]['label'])) {
                                    $field_label = $this->default_fields[$field]['label'];
                                }
                                if (isset($this->default_fields[$field]['field_type'])) {
                                    $field_type = $this->default_fields[$field]['field_type'];
                                }
                                if (isset($this->all_categories[$field])) {
                                    $field_label = $this->all_categories[$field]['singular_name'];
                                }
                                if (isset($this->all_tags[$field])) {
                                    $field_label = $this->all_tags[$field]['singular_name'];
                                }

                                if ($field !== 'post_title') {
                                    $field_label.=':';
                                }

                                $val = $this->get_field_value($field_type, $field, $post);

                                $field_label = $this->get_currency($field_label);
//$field_label = str_replace("{{currency}}", $apm_settings['configs']['default_currency'], $field_label);
                                $special_fields_str.="<span class='apm_widget_criteria'><strong>" . $field_label . "</strong> " . $val . "</span>|";
//  echo '///'.$field.'-'.$field_type.'-'.$val.'//';
                            }
                            $special_fields_str = "<span class='apm_widget_subfields'>" . $special_fields_str . "</span>";
                        }

                        $item = "<p ><a class='apm_widget_list_title' href='$url' title='" . sprintf(__('Edit &#8220;%s&#8221;'), esc_attr($title)) . "'>" . esc_html($title) . "</a> " . $date . $special_fields_str . '</p>';
                        if ($the_content = preg_split('#\s#', strip_tags($post->post_content), $chars + 1, PREG_SPLIT_NO_EMPTY))
                            $item .= '<p>' . join(' ', array_slice($the_content, 0, $chars)) . ( $chars < count($the_content) ? '&hellip;' : '' ) . '</p>';

                        $list[] = $item;

///Check if having functions to display and calculate, and proceed
                        if (isset($widgObject['calculs'])) {
//echo '<br/>****calculs**** ';
                            foreach ($widgObject['calculs'] as $calculkey => $calcul) {
//echo '<br/> calculstype  '.$calcul['type'];
                                switch ($calcul['type']) {
                                    case 'sum':
                                        if (isset($calculs_array[$calculkey])) {
                                            $v = get_post_meta($post->ID, $calculkey . $meta_marker, true);
                                            $calculs_array[$calculkey] = intval($calculs_array[$calculkey] + intval($v));
//echo $calculkey.":".$v.' - '.intval($calculs_array[$calculkey]+intval($v)).' - ';
                                        } else {

                                            $v = get_post_meta($post->ID, $calculkey . $meta_marker, true);
                                            $calculs_array[$calculkey] = intval($v);
//echo $calculkey.": ".$v.' - ';
                                        }
                                        break;
                                }
                            }
                        }
                    }//END LIST ALL POSTS

                    $post_type_label = $this->get_currency($post_type_label);
//$post_type_label = str_replace("{{currency}}", $apm_settings['configs']['default_currency'], $post_type_label);
                    $default_top_str = ""; //<p class='apm_widget_top_title'>"._('Show ').$total_items._(' latest item(s) for ').$post_type_label.":</p>
                    $latest_str = 'Latest';
                    if ($total_items_result !== 0) {
                        $total_items = $total_items_result;
                        $default_top_str = "<p class='apm_widget_top_title'>*" . _('Show  ') . $total_items . _(' latest record(s) for ') . $post_type_label . ":<span ><a href='post-new.php?post_type=" . $post_type . "' title='Add a new record'><img src='" . $apm_settings['paths']['img'] . "/plus_16.png'' /></a></span></p>";
                        if ($widgType == 'calculs_only') {
                            $default_top_str = "<p class='apm_widget_top_title'>*" . _('Totals') . ":<span ><a href='post-new.php?post_type=" . $post_type . "' title='Add a new record'><img src='" . $apm_settings['paths']['img'] . "/plus_16.png'' /></a></span></p>";
                        }
                        $latest_str = ''; //{latest}
                    }

                    if (isset($widgObject['top_string'])) {
                        $default_top_str = "<p class='apm_widget_top_title'>*" . $widgObject['top_string'] . ":<span ><a href='post-new.php?post_type=" . $post_type . "' title='Add a new record'><img src='" . $apm_settings['paths']['img'] . "/plus_16.png'' /></a></span></p>";
                    }

                    if ($widgType == 'latest_list' or $widgType == 'calculs_only' or $widgType == 'filtered_list') {
                        $default_top_str = str_replace('{latest}', $latest_str, $default_top_str);
                        $default_top_str = str_replace('{label}', $post_type_label, $default_top_str);
                        $default_top_str = str_replace('{total_items}', $total_items, $default_top_str);

                        $default_top_str = $this->get_currency($default_top_str);
// $default_top_str = str_replace("{{currency}}", $apm_settings['configs']['default_currency'], $default_top_str);
                        echo $default_top_str;
                    }
                    if ($widgType == 'latest_list' or $widgType == 'filtered_list') {

                        echo "<ul>";
                        echo join("</li>\n<li>", $list);
                        echo "</ul>";
                    }

                    if ($widgType == 'latest_list' or $widgType == 'calculs_only' or $widgType == 'filtered_list') {
                        if (isset($widgObject['calculs'])) {
                            echo '<p>_________________________________</p>';
                            foreach ($widgObject['calculs'] as $key => $calcul) {

                                switch ($calcul['type']) {
                                    case 'sum':
                                        $calcul_label = $calcul['label'];
                                        $calcul_label = $this->get_currency($calcul_label);
// $calcul_label = str_replace("{{currency}}", $apm_settings['configs']['default_currency'], $calcul_label);
                                        echo '<p class="apm_widget_top_title">' . $calcul_label . ': ' . $calculs_array[$key] . '</p>';
                                        break;
                                }
                            }
                        }
                        if ($widgType == 'latest_list') {
                            echo "<span>" . _('Click on configure to change the nb of rows listed') . '</span>';
                        }
//echo "<span>"._('Click on configure to change the nb of rows listed').'</span>';
                    }
                } else {

                    if ($widgType == 'latest_list' or $widgType == 'calculs_only' or $widgType == 'filtered_list') {
                        _e('Sorry, there is no results.');
                    }
                }
            }
///Check if having functions to display and calculate, and proceed
        }

        function myplugin_control_dashboard_widgets($post_type, $post_type_label, $widgetkey) {

            global $oThis, $wpdb, $meta_marker;
// This must be the same ID we set in wp_add_dashboard_widget
            $widget_id = 'fgl_dashboard_widget_' . $post_type . "_" . $widgetkey; // This must be the same ID we set in wp_add_dashboard_widget
            $form_id = 'fgl_dashboard_widget-posts-control_' . $post_type; // Set this to whatever you want
//$post_type='fgl_invoices';
//$post_type_label='Invoices';'15_green_leaves'
            foreach ($oThis->applications as $appli) {
                $applications = $appli['modules'][$post_type];
                $widgObject = $applications['module_dashboard_widgets'][$widgetkey];


                $widgType = $widgObject['type'];
                if (!$widget_options = get_option('dashboard_widget_options'))
                    $widget_options = array(); // If not, we create a new array

                if (!isset($widget_options[$widget_id]))
                    $widget_options[$widget_id] = array(); // If not, we create a new array
// Check whether our form was just submitted
                if ('POST' == $_SERVER['REQUEST_METHOD'] && isset($_POST[$form_id])) {
                    /*
                     * Get the value. In this case ['items'] is from the input
                     * field with the name of '.$form_id.'[items]
                     */

                    if ($widgType == 'latest_list') {
                        $number = absint($_POST[$form_id]['items']);

                        $widget_options[$widget_id]['items'] = $number; // Set the number of items
                        update_option('dashboard_widget_options', $widget_options); // Update our dashboard widget options so we can access later
                    }
                }


                if ($widgType == 'latest_list') {
                    $number = isset($widget_options[$widget_id]['items']) ? (int) $widget_options[$widget_id]['items'] : '';
// Create our form fields. Pay very close attention to the name part of the input field.
                    echo '<p><label for="fgl_dashboard_widget-posts-number">' . __('Number of items to show:') . '</label> ';
                    echo '<input id="fgl_dashboard_widget-posts-number" name="' . $form_id . '[items]" type="text" value="' . $number . '" size="3" /></p>';
                }
            }
        }

        public function handle_upload_field($post_id, $key, $typeupload = 'default_file', $count = 0) {
            global $meta_marker;
            $is_file = true;
// if ($typeupload == 'default_file') {
// $file = $_FILES[$key . $meta_marker];
// } else if ($typeupload == 'added_file') {
// $file = $_FILES[$key . '_value_' . $count];
            $file = $_FILES['uploadinput_' . $key . '_' . $count];
// } else {
// return '';
// }
            $filename = $file['name'];
            $filev = $file;
            $upload = wp_handle_upload($file, array('test_form' => false));
            if (!isset($upload['error']) && isset($upload['file'])) {
                $filetype = wp_check_filetype(basename($upload['file']), null);
                $title = $file['name'];
                if (isset($_REQUEST['upload_title_' . $key . '_' . $count]) and $_REQUEST['upload_title_' . $key . '_' . $count] !== "") {
                    $title = $_REQUEST['upload_title_' . $key . '_' . $count];
                }
                $post_content = "";
                if (isset($_REQUEST['upload_description_' . $key . '_' . $count]) and $_REQUEST['upload_description_' . $key . '_' . $count] !== "") {
                    $post_content = $_REQUEST['upload_description_' . $key . '_' . $count];
                }
                $post_excerpt = "";
                if (isset($_REQUEST['upload_caption_' . $key . '_' . $count]) and $_REQUEST['upload_caption_' . $key . '_' . $count] !== "") {
                    $post_excerpt = $_REQUEST['upload_caption_' . $key . '_' . $count];
                }
                $ext = strrchr($title, '.');
                $wp_filetype = wp_check_filetype(basename($filename), null);
                $title = ($ext !== false) ? substr($title, 0, -strlen($ext)) : $title;
                $wp_upload_dir = wp_upload_dir();
                $attachment = array(
                    'guid' => $wp_upload_dir['url'] . '/' . basename($filename),
                    'post_mime_type' => $wp_filetype['type'],
                    'post_title' => addslashes($title),
                    'post_content' => $post_content,
                    'post_excerpt' => $post_excerpt,
                    'post_status' => 'inherit',
                    'post_parent' => $post_id
                );
                /* if ($typeupload == 'default_file') {
                  $attach_key = $key . $meta_marker;
                  } else if ($typeupload == 'added_file') {
                  $attach_key = $key . '_value_' . $count;
                  } else {
                  return '';
                  } */
                $attach_key = 'uploadinput_' . $key . '_' . $count;
                $attach_id = wp_insert_attachment($attachment, $upload['file']);
                $my_post = array();

                require_once(ABSPATH . 'wp-admin/includes/image.php');
                $attach_data = wp_generate_attachment_metadata($attach_id, $filename);
                wp_update_attachment_metadata($attach_id, $attach_data);
                $existing_download = (int) get_post_meta($post_id, $attach_key, true);
                $data = $attach_id;
                if (is_numeric($existing_download)) {
                    wp_delete_attachment($existing_download);
                }
                if (isset($this->default_fields[$key]['is_image']) and $this->default_fields[$key]['is_image'] == true) {
                    if (isset($this->default_fields[$key]['image_resize'])) {
                        $this->handle_image_resize($this->default_fields[$key]['image_resize'], $upload['file'], $post_id, $key);
                    }
                }

                /* $my_post['ID'] = $data;
                  $my_post['post_content'] = 'This is the updated content.';
                  wp_update_post( $post ); */

// update_post_meta($post_id, $attach_key, $attach_id);
            }

            /* echo "///".$key." - ";
              echo $_POST['uploadfield_'.$key . '_add_file']." - ";
              echo " save ".$data; */
            return $data;
        }

        public function handle_image_resize($sizes, $file_path, $post_id, $key) {

//$this->simple_image ->load($file_path);
            $file_path = str_replace('\\', '/', $file_path);
            $path_arr = explode('/', $file_path);
            $separ = '/';
            $path_arr_new = array();
            for ($inc = 0; $inc < count($path_arr) - 1; $inc++) {
                $path_arr_new[] = $path_arr[$inc];
            }
//$path_only_arr=array_pop($path_arr);
            $path_only = implode('/', $path_arr_new) . '/';

            $image_name = $path_arr[count($path_arr) - 1];
            $image_name_arr = explode('.', $image_name);
            $image_name_no_ext = $image_name_arr[0];
//update_post_meta($post_id, $key.'_images_info', $file_path.'***--'.count($path_arr_new)."++".$path_only.'**'.$test);
            foreach ($sizes as $size_name => $size) {
                $this->simple_image->load($file_path);
                if ($size[2] == 'crop:topleft' or $size[2] == 'crop:center') {
                    $this->simple_image->resize_crop($size[0], $size[1], $size[2]);
                } else {
                    $this->simple_image->resizeToSquareLimit($size[0], $size[1]);
                }
                $filenextarr = explode(".", $file_path);
                $ext = $filenextarr[count($filenextarr) - 1];
                $extlow = strtolower($ext);
                $this->simple_image->save($path_only . $image_name_no_ext . '_' . $size_name . '.' . $extlow);
            }
        }

        public function apm_set_footer() {
            global $post, $module_name, $oThis, $apm_settings;
            $post_type = get_post_type();
            $post_type_object = $oThis->post_types[$post_type];

//echo var_dump($post_type_object);
            $categs_of_post = $post_type_object['module_categories'];
            $categ_arr = array();
            echo "<script>";
            if ($categs_of_post !== null) {
                foreach ($categs_of_post as $key => $categ) {
                    $categ_arr [$categ] = $this->all_categories [$categ];
                }
                echo "var all_categories=" . json_encode($categ_arr) . ';
				    fgl_manageCategories();
				    ';
            } else {
                echo "var all_categories=false; ";
            }
            echo " var apm_settings=" . stripslashes(json_encode($apm_settings)) . "; ";
// echo "alert(apm_settings.configs.default_currency);";
            echo "</script>"; //
//
        }

////MANAGE SAVING THE DATA FROm A META BOX cutoms fields
        public function myplugin_save_postdata($post_id) {
            global $post, $module_name, $oThis, $meta_marker, $current_user, $wpdb;
//  echo " myplugin_save_postdata ";
// verify if this is an auto save routine.
// If it is our form has not been submitted, so we dont want to do anything
            $comment = "";
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
                return;
// verify this came from the our screen and with proper authorization,
// because save_post can be triggered at other times

            if (!wp_verify_nonce($_POST['app-maker-nonce'], plugin_basename(__FILE__)))
                return;

// Check permissions
            if ('page' == $_POST['post_type']) {
                if (!current_user_can('edit_page', $post_id))
                    return;
            }
            else {
                if (!current_user_can('edit_post', $post_id))
                    return;
            }

// OK, we're authenticated: we need to find and save the data

            $post_type_object = $oThis->post_types[$_POST['post_type']];
            $fields_list = array();
            foreach ($post_type_object['metaboxes'] as $k => $object) {

                if (isset($object['positioning'])) {
                    $positioning = $object['positioning'];
                    if (isset($positioning['main'])) {
                        foreach ($positioning['main'] as $fieldset) {
                            foreach ($fieldset as $field) {
                                array_push($fields_list, $field);
                            }
                        }
                    }
                    if (isset($positioning['topbar'])) {
                        foreach ($positioning['topbar'] as $fieldset) {
                            foreach ($fieldset as $field) {
                                array_push($fields_list, $field);
                            }
                        }
                    }
                    if (isset($positioning['tabs'])) {
                        foreach ($positioning['tabs'] as $subkey => $tab) {
                            foreach ($tab['items'] as $fieldset) {
                                foreach ($fieldset as $field) {
                                    array_push($fields_list, $field);
                                }
                            }
                        }
                    }
                } else if (isset($object['fields'])) {
                    foreach ($object['fields'] as $subk => $subobject) {
                        array_push($fields_list, $subk);
                    }
                }
            }

            $action_done = 'updated';
            if (isset($_REQUEST['apm_post_action'])) {
                $action_done = $_REQUEST['apm_post_action'];
            }
            $send_newletter = false;



            /*             * *LOOP ALL FIELDS** */
//var_dump($_POST);
            //echo "<br>***LOOP ALL FIELDS***<br>";
            foreach ($oThis->default_fields as $key => $field) {
                if (in_array($key, $fields_list)) {

                    if (isset($_POST[$key . $meta_marker])) {
                        $data = $_POST[$key . $meta_marker];
                    } else if (get_post_meta($post_id, $key . $meta_marker) !== "") {///TO CHECK!!!!!!
                        $data = get_post_meta($post_id, $key . $meta_marker, true);
                    } else {
                        $data = '';
                    }
                    $cla = false;
                    foreach ($this->extensions->extensions as $extk => $exto) {
                        if ($field['field_type'] == $exto) {
                            include_once($oThis->extensions->clss[$exto][0]['path'] . $oThis->extensions->clss[$exto][0]['filename']);
                            $cla = $oThis->extension_class_instances[$exto];
                            //  echo $exto;
                            if ($cla->hasSaveField) {
                                $cla->saveField($post_id, $key, $meta_marker, $data, $field);
                            }
                        }
                    }
                    // exit;
                    if ($cla !== false and $cla->AbortGlobalSave == true) {

                    } else {

                        if ((isset($_POST[$key . $meta_marker . '_rte'])) and $field['field_type'] == 'richtexteditor') {
                            $data = $_POST[$key . $meta_marker . '_rte'];
                        }


                        //echo '<br>FILE UPLOAD MANAGEMENT';
///FILE UPLOAD MANAGEMENTF
                        $is_file = false;
                        $filev = '-';
                        /* if (!empty($_FILES[$key . $meta_marker])) {
                          $data = $this->handle_upload_field($post_id, $key);
                          } */
////NEW fields upload

                        /* if (isset($_POST['uploadfield_' . $key . '_add_file'])) {
                          $uploadfieldscount = $_POST['uploadfield_' . $key . '_add_file'];
                          echo $uploadfieldscount . "***";
                          if ($uploadfieldscount !== 'false' and $uploadfieldscount !== false and intval($uploadfieldscount) > 0) {
                          $uploadfieldscount = intval($uploadfieldscount) - 1;
                          if ($data == '') {
                          $data = get_post_meta($post_id, $key . $meta_marker, true);
                          }
                          $hasfile = false;
                          $dattemp = $data;
                          for ($i = 1; $i < $uploadfieldscount + 1; $i++) {
                          echo "<br>  / " . 'uploadinput_' . $key . '_' . $i . " - " . $_FILES['uploadinput_' . $key . '_' . $i]['size'] . " * ";
                          if ($_FILES['uploadinput_' . $key . '_' . $i]['size'] > 0) {
                          $hasfile = true;
                          $data_added = $this->handle_upload_field($post_id, $key, 'added_file', $i);
                          if ($dattemp == "" or empty($dattemp)) {
                          $dattemp.= $data_added;
                          } else {
                          $dattemp.="*****" . $data_added;
                          }
                          }
                          }
                          $data = $dattemp;
                          }
                          }


                          //END
                          if (isset($_POST[$key . '_add_file'])) {
                          $uploadfieldscount = $_POST[$key . '_add_file'];
                          if ($uploadfieldscount !== 'false' and $uploadfieldscount !== false and intval($uploadfieldscount) > 0) {
                          if ($data == '') {
                          $data = get_post_meta($post_id, $key . $meta_marker, true);
                          }
                          for ($i = 1; $i < intval($uploadfieldscount) + 1; $i++) {
                          if ($_FILES[$key . '_value_' . $i]['size'] > 0) {
                          $data_added = $this->handle_upload_field($post_id, $key, 'added_file', $i);
                          $data.="*****" . $data_added;
                          }
                          }
                          }
                          } */

                        if ($key == 'newsletter_send_order' and $data == "true") {
                            $data = 'sent';
                            $send_newletter = true;
                        }




                        $do_update = true;
                        $field_type = '';
                        if (isset($field['field_type']) and $field['field_type'] == 'uploadfield' and $data == '') {
                            $do_update = false;
                        }


//CHECK for checkbox, dont delete if zero
                        $allow_delete = true;
                        if (isset($field['field_type']) and $field['field_type'] == 'checkbox') {
                            if ($data == 'on') {
                                $data = '1';
                                $allow_delete = false;
                            } else {
                                $data = '0';
                                $allow_delete = false;
                            }
                        }



                        if ($key !== "post_content" and $key !== "post_title" and $key !== "post_status") {
                            /*                             * **UPDATE META****** */

                            if (get_post_meta($post_id, $key . $meta_marker) == "") {
                                add_post_meta($post_id, $key . $meta_marker, $data, true);
                            } else if ($data != get_post_meta($post_id, $key . $meta_marker, true)) {
                                if ($do_update) {
                                    update_post_meta($post_id, $key . $meta_marker, $data);
                                }
                            } else if ($data == "" or empty($data)) {
                                if ($do_update and $allow_delete) {
                                    delete_post_meta($post_id, $key . $meta_marker, get_post_meta($post_id, $key . $meta_marker, true));
                                }
                            }



                            if ($data == "") {
                                $data = get_post_meta($post_id, $key . $meta_marker, true);
                            }
                        } else {
                            if ($key == "post_content") {
                                $query = "
                                        UPDATE $wpdb->posts
                                        SET  post_content='" . $data . "'
                                        WHERE  $wpdb->posts.ID = '$post_id'
                                     ";
                                $res = $wpdb->get_results($query);
                            }
                            if ($key == "post_title") {
                                $query = "
                                        UPDATE $wpdb->posts
                                        SET  post_title='" . $data . "'
                                        WHERE  $wpdb->posts.ID = '$post_id'
                                     ";
                                $res = $wpdb->get_results($query);
                            }
                            if ($key == "post_status") {
                                $query = "
                                        UPDATE $wpdb->posts
                                        SET  post_status='" . $data . "'
                                        WHERE  $wpdb->posts.ID = '$post_id'
                                     ";
                                $res = $wpdb->get_results($query);
                            }
                        }





                        /*                         * **IMAGE AND FILES****** */

                        /*  if (isset($_POST[$key . '_remove_file']) and $_POST[$key . '_remove_file'] !== "false") {

                          if (strpos($data, '*****') > -1) {

                          $this->handle_image_removal($data, $post_id, $key);
                          } else {
                          delete_post_meta($post_id, $key . $meta_marker, get_post_meta($post_id, $key . $meta_marker, true));
                          }
                          } else {
                          if (strpos($data, '*****') > -1) {

                          $this->handle_image_removal($data, $post_id, $key);
                          }
                          }

                          if (strpos($data, '*****') > -1) {
                          $this->handle_image_description($data, $post_id, $key);
                          } else if (isset($_POST[$key . '_file_title_' . $data])) {

                          $this->handle_file_description_update($key, $data);
                          }

                         */
//


                        /*                         * **** COMMENTS *** */
                        if ((isset($_POST[$key . $meta_marker])) and $field['field_type'] == 'comments') {
                            $comment_quick = $_POST[$key . $meta_marker];
                            $comment_rte = $_POST[$key . $meta_marker . '_rte'];
                            $comment = $comment_quick;
                            if ($comment_rte !== "" and $comment_rte !== " ") {
                                $comment = $comment_rte;
                            }
                            $lang = '';
                            if (isset($_POST[$key . '_lang'])) {
                                $lang = $_POST[$key . '_lang'];
                            }
                            if ($comment !== '' and $comment !== '<p></p>' and $comment !== ' ') {
// echo " adding comment ";
                                get_currentuserinfo();
                                $time = current_time('mysql');

                                $data = array(
                                    'comment_post_ID' => $post_id,
                                    'comment_author' => $current_user->user_login,
                                    'comment_author_email' => $lang, //$current_user->user_email,
                                    'comment_content' => $comment,
                                    // 'comment_author_url'=>$url,
                                    'comment_type' => '',
                                    //  'comment_parent' => 0,
                                    'user_id' => $current_user->ID,
                                    'comment_date' => $time,
                                    'comment_approved' => 1
                                );
                                $com_id = wp_insert_comment($data);
// echo " com_id ".$com_id."-".$post_id;
                            }
//exit;
                        }
                    }
                }
            }////END foreach ($oThis->default_fields as $key => $field) {
//exit;
////////////////SAVE NEWSLETTER
            if ($send_newletter) {
                $oThis->handle_newsletter_sending($post_id);
            }


///////////////  SAVE COMMENTS

            /* $comment = '';
              //if(!isset($_GET['action'])){
              if (isset($_POST['comments' . $meta_marker . ''])) {
              $comment = $_POST['comments' . $meta_marker . ''];
              } */


///////////////////////  SAVE HANDLE NOTIFICATIONS
            $this->AM_Notifications->do_notifications($comment, $post_id);


//$comment='++'.$_POST['comments_value_comment'].'++';
//}
//
        }

///END public function myplugin_save_postdata

        public function handle_newsletter_sending($post_id) {
            global $meta_marker;
////DEPRECATED, now in the Extension MailingList
            /*  $email_template = $_POST['email_template' . $meta_marker];
              $newsletter_special_subject = $_POST['newsletter_special_subject' . $meta_marker];
              $contact_parent = $_POST['contact_parent' . $meta_marker];
              $account_parent = $_POST['account_parent' . $meta_marker];
              $lead_parent = $_POST['lead_parent' . $meta_marker];

              $tpl_post = get_post($email_template);
              $to_post = false;

              $contact_post = intval($account_parent) > 0 ? get_post($contact_parent) : false;
              $account_post = intval($account_parent) > 0 ? get_post($account_parent) : false;
              $lead_post = intval($account_parent) > 0 ? get_post($lead_parent) : false;

              if (intval($contact_parent) > 0) {
              $to_post = get_post($contact_parent);
              }
              if (intval($account_parent) > 0) {
              $to_post = get_post($account_parent);
              }
              if (intval($lead_parent) > 0) {
              $to_post = get_post($lead_parent);
              }
              $to_email = get_post_meta($to_post->ID, 'email' . $meta_marker, true);

              if ($to_post == false) {
              return;
              }

              $email_body = get_post_meta($email_template, 'email_body' . $meta_marker, true);
              $email_footer = get_post_meta($email_template, 'email_footer' . $meta_marker, true);
              $from_parent_email = 'none';
              $from_parent_id = get_post_meta($email_template, 'from_parent' . $meta_marker, true);
              $user_from = get_users(array('include' => $from_parent_id));
              $from_parent_email = $user_from[0]->user_email;
              $from_display_name = $user_from[0]->display_name;
              $reply_to_email = get_post_meta($email_template, 'reply_to_email' . $meta_marker, true);
              $email_subject = get_post_meta($email_template, 'email_subject' . $meta_marker, true);
              if ($newsletter_special_subject == '') {
              $subject = $email_subject;
              } else {
              $subject = $newsletter_special_subject;
              }
              $reply_to_name = get_post_meta($email_template, 'reply_to_name' . $meta_marker, true);
              $add_user_signature = get_post_meta($email_template, 'add_user_signature' . $meta_marker, true);
              $signature = '';
              if ($add_user_signature == true) {
              //$signature='signature';
              }
              //{{contact_gender}} {{contact_last_name}} {{contact_first_name}} {{contact_email}} | {{lead_gender}} {{lead_name}} {{lead_first_name}} {{lead_lastname}} {{lead_email}} | {{account_name}}

              $tags = array(
              'contact_gender' => intval($account_parent) > 0 ? get_post_meta($contact_parent, 'contact_gender' . $meta_marker, true) : "",
              'contact_lastname' => intval($account_parent) > 0 ? get_post_meta($contact_parent, 'contact_lastname' . $meta_marker, true) : "",
              'contact_firstname' => intval($account_parent) > 0 ? get_post_meta($contact_parent, 'contact_firstname' . $meta_marker, true) : "",
              'contact_email' => intval($account_parent) > 0 ? get_post_meta($contact_parent, 'email' . $meta_marker, true) : "",
              'lead_gender' => intval($lead_parent) > 0 ? get_post_meta($lead_parent, 'contact_gender' . $meta_marker, true) : "",
              'lead_lastname' => intval($lead_parent) > 0 ? get_post_meta($lead_parent, 'contact_lastname' . $meta_marker, true) : "",
              'lead_firstname' => intval($lead_parent) > 0 ? get_post_meta($lead_parent, 'contact_firstname' . $meta_marker, true) : "",
              'lead_email' => intval($lead_parent) > 0 ? get_post_meta($lead_parent, 'email' . $meta_marker, true) : "",
              'account_name' => $account_post !== false ? $account_post->post_title : "",
              );
              foreach ($tags as $key => $value) {
              $email_body = str_replace('{{' . $key . '}}', $value, $email_body);
              }
              $message = $email_body . $email_footer . $signature;
              $charset = get_settings('blog_charset');
              $headers = 'From: ' . $from_display_name . ' <' . $from_parent_email . '> ' . "\r\n"; //$from_parent_email;//$from_display_name
              $headers .= "MIME-Version: 1.0\n";
              $headers .= "Content-Type: text/html; charset=\"{$charset}\"\n";

              return wp_mail($to_email, $subject, $message, $headers);
             * */
//update_post_meta($post_id, 'newsletter_info', $email_template."-".$subject.'-'.$tpl_post->post_title.'****'.$email_body.'   /////   '.$signature.' +++ '.$to_post->post_title.' email to : '.$to_email.' email from : '.$from_parent_id.$from_parent_email);//var_export($user_from,true)
        }

        public function handle_image_description($data, $post_id, $key) {
            if (strpos($data, '*****') > -1) {
                $data_arr = explode('*****', $data);
                foreach ($data_arr as $id) {//
                    $this->handle_file_description_update($key, $id);
                }
            }
        }

        public function handle_file_description_update($key, $id) {
            $file_arr = array();
            if (isset($_POST[$key . '_file_title_' . $id])) {
                $file_arr['file_title'] = $_POST[$key . '_file_title_' . $id];
            } else {
                $file_arr['file_title'] = '';
            }
            if (isset($_POST[$key . '_file_descr_' . $id])) {
                $file_arr['file_description'] = $_POST[$key . '_file_descr_' . $id];
            } else {
                $file_arr['file_description'] = '';
            }
            $my_post = array();
            $my_post['ID'] = intval($id);
            $my_post['post_content'] = $file_arr['file_description'];
            $my_post['post_excerpt'] = $file_arr['file_title'];
            wp_update_post($my_post);
        }

        public function handle_image_removal($data, $post_id, $key) {
            global $meta_marker;
            $data_arr = explode('*****', $data);
            $new_data_arr = array();
            foreach ($data_arr as $id) {//
                if ($id !== $_POST[$key . '_remove_file'] and intval($id) !== intval($_POST[$key . '_remove_file_' . $id])) {
                    $new_data_arr[] = $id;
                }
            }
            $data = join('*****', $new_data_arr);
            update_post_meta($post_id, $key . $meta_marker, $data);
        }

        /**
         * Sends email
         * @param string $to
         * @param string $subject
         * @param string $message
         * @access public
         */
        public function apmSendMail($to, $subject, $message) {
            $from_email = esc_attr(get_option('from_email'));
            $site_name = str_replace('"', "'", $this->site_name);
            $site_email = str_replace(array('<', '>'), array('', ''), $this->site_email);

            // if (esc_attr(get_option('notification_from_email')) !== false) {
            // $site_email = esc_attr(get_option('notification_from_email'));
            // }

            if ($from_email !== false && $from_email !== '') {
                $from = "From: \"{$from_email}\" <{$site_email}> \n";
            } else {
                $from = "From: \"{$site_name}\" <{$site_email}> \n";
            }
            $notification_subject = esc_attr(get_option('notification_subject'));
            $company_name = esc_attr(get_option('company_name'));
            if ($notification_subject !== false and $notification_subject !== '') {
                $subject = '[' . $notification_subject . ']' . $subject;
            }
            if ($company_name !== false and $company_name !== '') {
                $subject = '[' . $company_name . ']' . $subject;
            }

            $charset = get_settings('blog_charset');
            $headers = $from;
            $headers .= "MIME-Version: 1.0\n";
            $headers .= "Content-Type: text/html; charset=\"{$charset}\"\n";
//$subject    = '[15GL]'.$subject;
            $message = "<html><head><title>" . $subject . "</title></head><body>" . $message . "</body></html>";
            //var_dump($to);
            //var_dump($subject);
            //var_dump($message);
            // var_dump($headers);
            $res = wp_mail($to, $subject, $message, $headers);

            // var_dump($res);
            // exit;
            return $res;
        }

    }

// edit by huypham config default mail for wp_mail wordpress
    function wpse8170_phpmailer_init($phpmailer) {
        global $main_config;
        $host = get_option('ori_smtp_host');
        $port = get_option('ori_smtp_port');
        $username = get_option('ori_smtp_username');
        $pass = get_option('ori_smtp_psw');

        if ($host == '')
            $host = $main_config['smtp_host'];

        if ($port == '')
            $port = $main_config['smtp_port'];

        if ($username == '')
            $username = $main_config['smtp_username'];

        if ($pass == '')
            $pass = $main_config['smtp_psw'];

        $phpmailer->Host = $host;
        $phpmailer->Port = $port; // could be different
        $phpmailer->Username = $username; // if required
        $phpmailer->Password = $pass; // if required
        $phpmailer->SMTPAuth = true; // if required
        $phpmailer->SMTPSecure = 'ssl'; // enable if required, 'tls' is another possible value

        $phpmailer->IsSMTP();
    }

    add_action('phpmailer_init', 'wpse8170_phpmailer_init');


    add_action('show_user_profile', 'wpse8170_display_user_custom');
    add_action('edit_user_profile', 'wpse8170_display_user_custom');

    function wpse8170_display_user_custom($user) {
        require_once APPLICATION_MAKER_PATH . '/applications/user_pro/ff_user_pro_customfields.php';
        ?>
        <h3>Custom Fields</h3>
        <table class="form-table">
            <?php
            foreach ($app_user_fields as $user_field) {
                ?>
                <tr>
                    <th><label><?php echo $user_field['label'] ?></label></th>
                    <td><input type="text" value="<?php echo get_user_meta($user->ID, $user_field['field'], true); ?>" class="regular-text" readonly=readonly /></td>
                </tr>
            <?php } ?>
        </table>
        <?php
    }

    // remove_action( 'admin_enqueue_scripts', 'wp_auth_check_load' );
    // remove_filter( 'heartbeat_received',        'wp_auth_check', 10, 2 );
    // remove_filter( 'heartbeat_nopriv_received', 'wp_auth_check', 10, 2 );

    add_action('admin_init', 'disable_ortherScript');

    function disable_ortherScript() {
        wp_deregister_script('autosave');
        // wp_deregister_script( 'wp-auth-check' );
    }

    $Application_Maker = new Application_Maker();
}