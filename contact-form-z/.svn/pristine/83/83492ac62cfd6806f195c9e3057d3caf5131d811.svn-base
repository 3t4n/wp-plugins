<?php

class ZCForm_Admin{

    private $plugin_name;
    private $version;
    private $message_error;

    public function __construct($plugin_name, $version){

        if(!is_admin())
            return;

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function enqueue_styles(){

        wp_enqueue_style('wp-color-picker');
        wp_enqueue_style($this->plugin_name.'-css-calendar', ZCFORM_PLUGIN_BASEDIR.'/css/jquery.datetimepicker.css', [], $this->version, 'all');
//        wp_enqueue_style($this->plugin_name.'-css-filestyle-normalize', ZCFORM_PLUGIN_BASEDIR.'/css/custom-file-input/normalize.css', [], $this->version, 'all');
        wp_enqueue_style($this->plugin_name.'-css-jquery-confirm', ZCFORM_PLUGIN_BASEDIR.'/css/jquery-confirm.min.css', [], $this->version, 'all');
        wp_enqueue_style($this->plugin_name.'-css-tooltipster', ZCFORM_PLUGIN_BASEDIR.'/css/tooltipster.bundle.min.css', [], $this->version, 'all');
        wp_enqueue_style($this->plugin_name.'-css-tooltipster-light', ZCFORM_PLUGIN_BASEDIR.'/css/tooltipster-sideTip-light.min.css', [], $this->version, 'all');
        wp_enqueue_style($this->plugin_name.'-css-tooltipster-shadow', ZCFORM_PLUGIN_BASEDIR.'/css/tooltipster-sideTip-shadow.min.css', [], $this->version, 'all');
        wp_enqueue_style($this->plugin_name.'-css-bars-theme', ZCFORM_PLUGIN_BASEDIR.'/css/bars-theme.css', [], $this->version, 'all');
        wp_enqueue_style($this->plugin_name.'-css-admin', plugin_dir_url(__FILE__).'css/'.ZCFORM_PLUGIN_NAME.'-admin.css', [], $this->version, 'all');
        wp_enqueue_style($this->plugin_name.'-css-admin-checkbox', plugin_dir_url(__FILE__).'css/'.ZCFORM_PLUGIN_NAME.'-admin-checkbox.css', [], $this->version, 'all');
        wp_enqueue_style($this->plugin_name.'-css-admin-font', plugin_dir_url(__FILE__).'css/font-awesome.min.css', [], $this->version, 'all');
        wp_enqueue_style($this->plugin_name.'-css', ZCFORM_PLUGIN_BASEDIR.'/css/'.ZCFORM_PLUGIN_NAME.'.css', [], $this->version, 'all');
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function enqueue_scripts(){

        wp_enqueue_script('jquery-ui-core', '', array(), false, true);
        wp_enqueue_script('jquery-ui-tabs', '', array(), false, true);
        wp_enqueue_script('wp-color-picker');

        // Load
        wp_register_script('zcf-google-recaptcha', 'https://www.google.com/recaptcha/api.js', [], '3.0', true);
        wp_enqueue_script('zcf-google-recaptcha');
        wp_enqueue_editor();
        wp_register_script('zcf-alasql', 'https://cdn.jsdelivr.net/npm/alasql@0.4.11/dist/alasql.min.js', [], '0.4.11', true);
        wp_enqueue_script('zcf-alasql');
        wp_register_script('zcf-xlsx-core', 'https://cdn.jsdelivr.net/npm/xlsx-core@1.0.3/xlsx.core.min.js', [], '1.0.3', true);
        wp_enqueue_script('zcf-xlsx-core');

        //Plagins
        wp_enqueue_script($this->plugin_name.'-js-mask', ZCFORM_PLUGIN_BASEDIR.'/js/jquery.mask.min.js', ['jquery'], $this->version, false);
        wp_enqueue_script($this->plugin_name.'-js-calendar', ZCFORM_PLUGIN_BASEDIR.'/js/jquery.datetimepicker.full.min.js', ['jquery'], $this->version, false);
        wp_enqueue_script($this->plugin_name.'-js-jquery-confirm', ZCFORM_PLUGIN_BASEDIR.'/js/jquery-confirm.min.js', ['jquery'], $this->version, false);
        wp_enqueue_script($this->plugin_name.'-js-tooltipster', ZCFORM_PLUGIN_BASEDIR.'/js/tooltipster.bundle.min.js', ['jquery'], $this->version, false);
        wp_enqueue_script($this->plugin_name.'-js-barrating', ZCFORM_PLUGIN_BASEDIR.'/js/jquery.barrating.min.js', ['jquery'], $this->version, false);

        // Additionally
        wp_enqueue_script(
            $this->plugin_name.'-js-additionally', plugin_dir_url(__FILE__).'js/'.ZCFORM_PLUGIN_NAME.'-admin-additionally.js', ['jquery'], $this->version, false
        );
        wp_add_inline_script($this->plugin_name.'-js-additionally', ZCForm_Static::zcform_base_get_options(), 'before');
        wp_add_inline_script($this->plugin_name.'-js-additionally', ZCForm_Static::zcform_admin_get_options(), 'before');
        wp_enqueue_script($this->plugin_name.'-js-file', ZCFORM_PLUGIN_BASEDIR.'/js/CFileInput.js', ['jquery'], $this->version, false);

        // Form
        wp_enqueue_script(
            $this->plugin_name.'-js-form-common', plugin_dir_url(__FILE__).'js/form/'.ZCFORM_PLUGIN_NAME.'-admin-common.js', ['jquery', 'jquery-ui-tabs', 'jquery-ui-tooltip'], $this->version, true
        );
        wp_enqueue_script(
            $this->plugin_name.'-js-form-style', plugin_dir_url(__FILE__).'js/form/'.ZCFORM_PLUGIN_NAME.'-admin-style.js', ['jquery'], $this->version, true
        );
        wp_enqueue_script(
            $this->plugin_name.'-js-form-mail', plugin_dir_url(__FILE__).'js/form/'.ZCFORM_PLUGIN_NAME.'-admin-mail.js', ['jquery'], $this->version, true
        );
        wp_enqueue_script(
            $this->plugin_name.'-js-form-paste', plugin_dir_url(__FILE__).'js/form/'.ZCFORM_PLUGIN_NAME.'-admin-paste.js', ['jquery'], $this->version, true
        );
        wp_enqueue_script(
            $this->plugin_name.'-js-form-logic', plugin_dir_url(__FILE__).'js/form/'.ZCFORM_PLUGIN_NAME.'-admin-logic.js', ['jquery'], $this->version, true
        );

        // Form Template
        wp_enqueue_script(
            $this->plugin_name.'-js-form-template-field', plugin_dir_url(__FILE__).'js/form/template/'.ZCFORM_PLUGIN_NAME.'-admin-field.js', ['jquery'], $this->version, true
        );
        wp_enqueue_script(
            $this->plugin_name.'-js-form-template-accept-file', plugin_dir_url(__FILE__).'js/form/template/'.ZCFORM_PLUGIN_NAME.'-admin-accept-file.js', ['jquery'], $this->version, true
        );
        wp_enqueue_script(
            $this->plugin_name.'-js-form-template-datetime', plugin_dir_url(__FILE__).'js/form/template/'.ZCFORM_PLUGIN_NAME.'-admin-datetime.js', ['jquery'], $this->version, true
        );
        wp_enqueue_script(
            $this->plugin_name.'-js-form-template-select-checkbox-radio', plugin_dir_url(__FILE__).'js/form/template/'.ZCFORM_PLUGIN_NAME.'-admin-select-checkbox-radio.js', ['jquery'], $this->version, true
        );
        wp_enqueue_script(
            $this->plugin_name.'-js-form-template-text-textarea', plugin_dir_url(__FILE__).'js/form/template/'.ZCFORM_PLUGIN_NAME.'-admin-text-textarea.js', ['jquery'], $this->version, true
        );
        wp_enqueue_script(
            $this->plugin_name.'-js-form-template-rating', plugin_dir_url(__FILE__).'js/form/template/'.ZCFORM_PLUGIN_NAME.'-admin-rating.js', ['jquery'], $this->version, true
        );

        wp_enqueue_script(
            $this->plugin_name.'-js-actions', plugin_dir_url(__FILE__).'js/'.ZCFORM_PLUGIN_NAME.'-admin-actions.js', ['jquery'], $this->version, true
        );
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_create_admin_menu(){

        global $_wp_last_object_menu;

        $_wp_last_object_menu++;

        add_menu_page(
            __('Contact Form Z', 'contact-form-z'), __('Contact Form Z', 'contact-form-z'), 'edit_posts', 'zcf-add-form', [$this, 'zcform_admin_add_form'], 'dashicons-list-view', $_wp_last_object_menu
        );

        add_submenu_page(
            'zcf-add-form', __('Add form', 'contact-form-z'), __('Add form', 'contact-form-z'), 'publish_pages', 'zcf-add-form', [$this, 'zcform_admin_add_form']
        );

        add_submenu_page(
            'zcf-add-form', __('All Forms', 'contact-form-z'), __('All Forms', 'contact-form-z'), 'edit_posts', 'zcf-list-form', [$this, 'zcform_admin_list_forms']
        );

        add_submenu_page(
            'zcf-add-form', __('Entries', 'contact-form-z'), __('Entries', 'contact-form-z'), 'edit_posts', 'zcf-report-form', [$this, 'zcform_admin_report_form']
        );

        add_submenu_page(
            'zcf-add-form', __('Settings'), __('Settings'), 'edit_posts', 'zcf-settings-form', [$this, 'zcform_admin_settings_form']
        );

        add_submenu_page(
            'options.php', __('Edit form', 'contact-form-z'), '', 'edit_posts', 'zcf-edit-form', [$this, 'zcform_admin_edit_form']
        );

        add_submenu_page(
            'options.php', __('Restore form', 'contact-form-z'), '', 'edit_posts', 'zcf-restore-form', [$this, 'zcform_admin_restore_form']
        );

        add_filter('plugin_action_links_'.ZCFORM_PLUGIN_BASENAME, [$this, 'zcform_plugin_action_links'], 10, 2);
        
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    function zcform_plugin_action_links($links){
        $settings_link = '<a href="admin.php?page=zcf-settings-form">'.(__('Settings')).'</a>';
        array_unshift($links, $settings_link);
        return $links;
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_admin_add_form(){

        $editor = new ZCForm_Admin_Editor();

        global $wpdb;
        $editor->content['id'] = $wpdb->get_var("SELECT CASE WHEN (SELECT MAX(id) FROM wp_zcf_form_list) IS NOT NULL 
                                                                                    THEN (SELECT MAX(id)+1 FROM wp_zcf_form_list)
                                                                                    WHEN (SELECT MAX(form_list_id) FROM wp_zcf_form_list_history) IS NOT NULL 
                                                                                    THEN (SELECT MAX(form_list_id)+1 FROM wp_zcf_form_list_history)
                                                                                    ELSE 1 END");
        if(is_null($editor->content['id'])){
            $editor->content['id'] = 1;
        }

        $editor->content['page_title'] = esc_attr__('Add form', 'contact-form-z');
        $editor->content['title'] = '';
        $editor->content['type'] = 'add_form';
        $editor->content['action'] = 'save_form';
        $editor->content['button_text'] = esc_attr__('Create a form', 'contact-form-z');

        require_once plugin_dir_path(__FILE__).'partials/pages/'.$this->plugin_name.'-admin-save-form.php';
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_admin_edit_form(){

        $id = isset($_GET['form_id']) ? sanitize_key($_GET['form_id']) : 0;
        if(empty($id)){
            $this->message_error = esc_attr__('Form id not found', 'contact-form-z');
            require_once plugin_dir_path(__FILE__).'partials/pages/'.$this->plugin_name.'-admin-page-error.php';
            return;
        }

        global $wpdb;
        $res_form = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT id, title, fields, mail, style, message, options, paste, plugin, rank, add_user, add_date, version
                        FROM {$wpdb->prefix}zcf_form_list WHERE id = %d;", $id
            )
            , ARRAY_A, 0
        );

        if(is_null($res_form)){
            $this->message_error = esc_attr__('Selected form not found', 'contact-form-z');
            require_once plugin_dir_path(__FILE__).'partials/pages/'.$this->plugin_name.'-admin-page-error.php';
            return;
        }

        $res_form['page_title'] = esc_attr__('Edit form', 'contact-form-z');
        $res_form['type'] = 'edit_form';
        $res_form['action'] = 'save_form';
        $res_form['button_text'] = esc_attr__('Update form', 'contact-form-z');
        $res_form['fields'] = json_decode($res_form['fields'], true);
        $res_form['mail'] = json_decode($res_form['mail'], true);
        $res_form['style'] = json_decode($res_form['style'], true);
        $res_form['message'] = json_decode($res_form['message'], true);
        $res_form['options'] = json_decode($res_form['options'], true);
        $res_form['paste'] = json_decode($res_form['paste'], true);
        $res_form['plugin'] = json_decode($res_form['plugin'], true);
        $res_form['rank'] = json_decode($res_form['rank'], true);

        $editor = new ZCForm_Admin_Editor($res_form);
        require_once plugin_dir_path(__FILE__).'partials/pages/'.$this->plugin_name.'-admin-save-form.php';

    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_admin_restore_form(){

        $id = isset($_GET['form_id']) ? sanitize_key($_GET['form_id']) : 0;
        if(empty($id)){
            $this->message_error = esc_attr__('Form id not found', 'contact-form-z');
            require_once plugin_dir_path(__FILE__).'partials/pages/'.$this->plugin_name.'-admin-page-error.php';
            return;
        }

        global $wpdb;
        $res_form = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT id, title, fields, mail, style, message, options, paste, plugin, rank, add_user, add_date, version
                        FROM {$wpdb->prefix}zcf_form_list_history WHERE id = %d;", $id
            )
            , ARRAY_A, 0
        );

        if(is_null($res_form)){
            $this->message_error = esc_attr__('Selected form not found', 'contact-form-z');
            require_once plugin_dir_path(__FILE__).'partials/pages/'.$this->plugin_name.'-admin-page-error.php';
            return;
        }

        $res_form['page_title'] = esc_attr__('Recovery form', 'contact-form-z').' v.'.sprintf('%0.1f', $res_form['version']);
        $res_form['type'] = 'restore_form';
        $res_form['action'] = 'restore_form';
        $res_form['button_text'] = esc_attr__('Restore form', 'contact-form-z');
        $res_form['fields'] = json_decode($res_form['fields'], true);
        $res_form['mail'] = json_decode($res_form['mail'], true);
        $res_form['style'] = json_decode($res_form['style'], true);
        $res_form['message'] = json_decode($res_form['message'], true);
        $res_form['options'] = json_decode($res_form['options'], true);
        $res_form['paste'] = json_decode($res_form['paste'], true);
        $res_form['plugin'] = json_decode($res_form['plugin'], true);
        $res_form['rank'] = json_decode($res_form['rank'], true);

        $editor = new ZCForm_Admin_Editor($res_form);
        require_once plugin_dir_path(__FILE__).'partials/pages/'.$this->plugin_name.'-admin-save-form.php';
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_admin_list_forms(){

        $option = 'per_page';
        $args = [
            'label' => 'Forms',
            'default' => 20,
            'option' => 'forms_per_page'
        ];
        add_screen_option($option, $args);
        $this->zcf_form_list = new ZCForm_Admin_List_Table();
        $this->zcf_form_list->prepare_items();

        require_once plugin_dir_path(__FILE__).'partials/pages/'.$this->plugin_name.'-admin-list-forms.php';
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_admin_settings_form(){

        $settings = ZCForm_Static::zcform_get_settings();

        require_once plugin_dir_path(__FILE__).'partials/pages/'.$this->plugin_name.'-admin-settings-form.php';
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_admin_report_form(){

        global $wpdb;
        $res_forms = $wpdb->get_results("SELECT id, title FROM {$wpdb->prefix}zcf_form_list ORDER BY title;", ARRAY_A);

        if(is_null($res_forms)){
            $this->message_error = esc_attr__('Failed to get the list of forms', 'contact-form-z');
            require_once plugin_dir_path(__FILE__).'partials/pages/'.$this->plugin_name.'-admin-page-error.php';
            return;
        }

        require_once plugin_dir_path(__FILE__).'partials/pages/'.$this->plugin_name.'-admin-report-form.php';

        ZCForm_Static::zcform_admin_report_script();
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------
}
