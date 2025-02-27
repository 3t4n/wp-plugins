<?php

class nsc_easy_pdf_restaurant_menu
{
    private $adminMessage = array('error' => array(), 'update' => array());
    private $pluginPath;
    private $allowedExt = array('pdf' => "application/pdf", 'txt' => "text/plain", 'jpg' => "image/jpeg", 'png' => "image/png", 'jpeg' => "image/jpeg");
    private $uploadedFileExt;
    private $pluginUploadDirName = "easy-pdf-restaurant-menu";
    private $plugin_configs;
    private $clean_input;

    public function __construct()
    {
        // Set Plugin Path
        $this->pluginPath = dirname(__FILE__);
        $this->plugin_configs = new plugin_configs_nsc_eprm;
        $this->clean_input = new clean_input_validation_nsc_eprm;
    }

    public function nsc_eprm_add_redirect_filter()
    {
        add_filter('login_redirect', array($this, 'nsc_eprm_redirect_to_menu_upload_page'), 99, 2);
        add_filter('woocommerce_login_redirect', array($this, 'nsc_eprm_redirect_to_menu_upload_page'), 99, 2);
    }

    public function nsc_eprm_save_menu($type, $uploadedFile)
    {

        if (current_user_can('upload_restaurant_menu_nsc_eprm') === false && current_user_can('manage_options') === false) {
            return false;
        }

        $uploadedFile = $this->clean_input->sanitize_user_input_nsc_eprm($uploadedFile);
        $oriFileName = sanitize_file_name($uploadedFile["name"]);

        $this->uploadedFileExt = pathinfo(sanitize_file_name($uploadedFile["name"]), PATHINFO_EXTENSION);

        $fileIsSecure = $this->clean_input->validate_upload_nsc_eprm($uploadedFile, $this->allowedExt);

        if ($fileIsSecure === false) {
            $this->add_admin_message('error', "Something wrong with your file, please make sure it is only one of this types: "
                . implode(", ", array_keys($this->allowedExt))
                . ". You uploaded: " . $this->uploadedFileExt . "!");
            return false;

        }

        $useOriFileName = $this->plugin_configs->get_option_nsc_eprm("orifilename_for_download") == true ? true : false;
        $upload_status = move_uploaded_file(
            $uploadedFile['tmp_name'],
            $this->return_menu_upload_dir()
            . $this->return_menu_file_name_without_extension($type, $useOriFileName)
            . "." . $this->uploadedFileExt
        );

        if ($upload_status !== true) {
            $this->add_admin_message('error', "Not able to upload file!");
            return false;
        }

        update_option('nsc_eprm_' . $type . '_orifilename', $oriFileName);
        $this->add_admin_message('update', "File " . $oriFileName . " successfully uploaded and already live!");

    }

    public function nsc_eprm_shortcode_processor($attr = "")
    {
        $attr = $this->clean_input->sanitize_user_input_nsc_eprm($attr);

        $atts = shortcode_atts(
            array(
                'restaurant_menu_type' => 'general',
                'linktext' => '',
                'css_class' => 'nsc_eprm_download_link',
                'p' => 'false',
                'nofollow' => 'false',
            ),
            $attr
        );
        return $this->create_href_link($atts['restaurant_menu_type'], $atts['linktext'], array("class" => $atts['css_class'], "id" => "nsceprm_" . $atts['restaurant_menu_type']), $atts['p'], $atts['nofollow'], );
    }

    public function nsc_eprm_shortcode_file_url($attr = "")
    {
        $attr = $this->clean_input->sanitize_user_input_nsc_eprm($attr);

        $atts = shortcode_atts(
            array(
                'restaurant_menu_type' => 'general',
                'cachebuster' => true,
            ),
            $attr
        );
        return $this->nsc_eprm_return_download_url($atts['restaurant_menu_type'], $atts['cachebuster']);
    }

    public function nsc_eprm_return_download_url($type, $cacheBuster)
    {
        $noindex = $this->plugin_configs->get_option_nsc_eprm("disable_seo_index") == true ? true : false;

        $cacheBusterString = "";
        if ($noindex === false && (empty($cacheBuster) === false || $cacheBuster === true || $cacheBuster === "true")) {
            $cacheBusterString = '?cb=' . rand(1, 99999);
        }

        $baseUrl = $this->return_menu_file_base_url();
        $downloadUrl = array("base_url" => $baseUrl, "file_name" => $this->return_menu_file_name_for_download($type), "query_string" => $cacheBusterString);
        $downloadUrl = apply_filters('download_url_menu_file_nsc_eprm', $downloadUrl, $type);

        return $downloadUrl["base_url"] . $downloadUrl["file_name"] . $downloadUrl["query_string"];
    }

    public function nsc_eprm_user_role()
    {
        add_role(
            'upload_menu_nsc_eprm',
            'Restaurant Menu Uploader',
            array('read' => true)
        );
        $role = get_role('upload_menu_nsc_eprm');
        $role->add_cap('upload_restaurant_menu_nsc_eprm');
    }

    public function nsc_eprm_deactivate()
    {
        remove_role('upload_menu_nsc_eprm');
    }

    public function nsc_eprm_redirect_to_menu_upload_page($redirect_to, $request)
    {
        global $user;
        $redirect_all = $this->plugin_configs->get_option_nsc_eprm("force_redirect_all_roles");
        $upload_page = admin_url("upload.php?page=easy-pdf-restaurant-menu");

        if ($redirect_all == true) {
            return $upload_page;
        }

        //doing it this way because i do not know the index of the role.. it must not start with 0. :/
        if (isset($user->roles) && isset(array_values($user->roles)[0]) && array_values($user->roles)[0] == 'upload_menu_nsc_eprm') {
            return $upload_page;
        }

        return $redirect_to;
    }

    private function return_menu_file_name_without_extension($type, $returnOriFilename)
    {
        if ($returnOriFilename == true) {
            $orifilename = get_option('nsc_eprm_' . $type . '_orifilename');
            $orifilenameWithoutExtension = pathinfo($orifilename, PATHINFO_FILENAME);
            $file_name = preg_replace('/[^a-z0-9\._-]+/', '-', strtolower($orifilenameWithoutExtension));
            $file_name = apply_filters('file_name_without_extension_nsc_eprm', $file_name, $type);
            return $file_name;
        }

        $type = sanitize_file_name($type);
        $fileNamePrefix = "menu-";
        $fileNamePrefix = apply_filters('file_name_prefix_nsc_eprm', $fileNamePrefix, $type);
        $file_name = preg_replace('/[^a-z0-9\._-]+/', '-', strtolower($fileNamePrefix . $type));
        $file_name = apply_filters('file_name_without_extension_nsc_eprm', $file_name, $type);
        return $file_name;
    }

    // needed for pre 1.9.0. Maybe delete in 2025/2026?
    private function return_menu_file_name_without_extension_deprecated($type, $returnOriFilename)
    {
        if ($returnOriFilename == true) {
            $orifilename = get_option('nsc_eprm_' . $type . '_orifilename');
            $orifilenameWithoutExtension = pathinfo($orifilename, PATHINFO_FILENAME);
            $file_name = preg_replace('/[^a-z0-9\._-]+/', '-', strtolower($orifilenameWithoutExtension));
            $file_name = apply_filters('file_name_without_extension_nsc_eprm', $file_name, $type);
            return $file_name;
        }

        $type = sanitize_file_name($type);
        $file_name = preg_replace('/[^a-z0-9\._-]+/', '-', strtolower(get_bloginfo('name') . "-menu-" . $type));
        $file_name = apply_filters('file_name_without_extension_nsc_eprm', $file_name, $type);
        return $file_name;
    }

    private function add_admin_message($type, $adminmessage)
    {
        $this->adminMessage[$type][] = $adminmessage;
    }

    private function show_admin_messages()
    {
        if ($this->adminMessage['error'] != array()) {
            add_action('admin_notices', array($this, 'nsc_eprm_admin_notice_error'));
        }
        if ($this->adminMessage['update'] != array()) {
            add_action('admin_notices', array($this, 'nsc_eprm_admin_notice_update'));
        }
    }

    public function nsc_eprm_admin_notice_error()
    {
        $class = 'notice notice-error';
        foreach ($this->adminMessage['error'] as $errormessage) {
            printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($errormessage));
        }
    }

    public function nsc_eprm_admin_notice_update()
    {
        $class = 'updated notice';
        foreach ($this->adminMessage['update'] as $errormessage) {
            printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($errormessage));
        }
    }

    public function nsc_eprm_cleanup_unused_entries_and_files($current_types)
    {
        // order is important. First delete the entries, then the files.
        $this->delete_unused_file_db_entries($current_types);
        $this->delete_unused_files($current_types);
    }

    private function delete_unused_files($current_types)
    {
        $files = $this->scan_dir($this->return_menu_upload_dir());
        $useOriFileName = $this->plugin_configs->get_option_nsc_eprm("orifilename_for_download") == true ? true : false;

        if (!is_array($files)) {
            return false;
        }

        foreach ($files as $file) {
            $file_needed = false;
            if (is_dir($this->return_menu_upload_dir() . $file) || $file === ".." || $file === "." || !is_string($file)) {
                continue;
            }

            foreach ($current_types as $type) {
                $original_file_name = $this->plugin_configs->get_option_nsc_eprm($type['menutype'] . "_orifilename", "none");
                $extension = pathinfo($original_file_name, PATHINFO_EXTENSION);
                $fileNameOfType = $this->return_menu_file_name_without_extension($type['menutype'], $useOriFileName) . "." . $extension;

                if ($file === $fileNameOfType) {
                    $file_needed = true;
                    break;
                }

                // not found. maybe file structure from before 1.9.0. So try to migrate.
                $fileNameDeprecated = $this->return_menu_file_name_without_extension_deprecated($type['menutype'], !$useOriFileName) . "." . $extension;
                if ($file === $fileNameDeprecated) {
                    $currentFilePath = $this->return_menu_upload_dir() . $file;
                    $targetFilePath = $this->return_menu_upload_dir() . $fileNameOfType;
                    rename(
                        $currentFilePath,
                        $targetFilePath
                    );
                    $file_needed = true;
                    break;
                }

                // not found. maybe recently toggled "use orifilename". So try to migrate.
                $fileNameOfTypeNoToggle = $this->return_menu_file_name_without_extension($type['menutype'], !$useOriFileName) . "." . $extension;
                if ($file === $fileNameOfTypeNoToggle) {
                    $currentFilePath = $this->return_menu_upload_dir() . $file;
                    $targetFilePath = $this->return_menu_upload_dir() . $fileNameOfType;
                    rename(
                        $currentFilePath,
                        $targetFilePath
                    );
                    $file_needed = true;
                    break;
                }
            }

            if ($file_needed === false) {
                unlink($this->return_menu_upload_dir() . $file);
            }
        }
    }

    private function delete_unused_file_db_entries($current_types)
    {
        global $wpdb;
        $options_orifilenames = $wpdb->get_results("select * from $wpdb->options where option_name like 'nsc_eprm_%_orifilename'");

        foreach ($options_orifilenames as $options_orifilename) {
            $entry_needed = false;
            foreach ($current_types as $type) {
                if ($options_orifilename->option_name === "nsc_eprm_" . $type['menutype'] . "_orifilename") {
                    $entry_needed = true;
                    break;
                }
            }

            if ($entry_needed === false) {
                delete_option($options_orifilename->option_name);
            }
        }
    }

    public function return_menu_upload_dir()
    {
        $uploadDirForFile = $this->plugin_configs->return_plugin_upload_base_dir_nsc_eprm();

        // no slash needed for path. only for url
        $uploadDirForFile = $uploadDirForFile . "menu-files/";
        if (!is_dir($uploadDirForFile)) {
            mkdir($uploadDirForFile);
        }
        return $uploadDirForFile;
    }

    private function return_menu_file_base_url()
    {

        $noindex = $this->plugin_configs->get_option_nsc_eprm("disable_seo_index") == true ? true : false;
        if ($noindex === true) {
            return get_bloginfo('wpurl') . "/" . $this->plugin_configs->plugin_slug_nsc_eprm() . "/menu-files/";
        }

        $uploadDirArray = wp_upload_dir();

        $defaultUploadDirURL = $uploadDirArray['baseurl'];

        $uploadPathForFile = $defaultUploadDirURL . "/" . $this->plugin_configs->plugin_slug_nsc_eprm();

        $uploadPathForFile = $uploadPathForFile . "/menu-files/";
        return $uploadPathForFile;
    }

    private function return_menu_file_name_for_download($type)
    {
        $files = $this->scan_dir($this->return_menu_upload_dir());

        if (!is_array($files)) {
            return "error_files_is_not_an_array_should_not_happen";
        }

        $useOriFileName = $this->plugin_configs->get_option_nsc_eprm("orifilename_for_download") == true ? true : false;

        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_FILENAME) == $this->return_menu_file_name_without_extension($type, $useOriFileName)) {
                return $file;
            }
        }

        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_FILENAME) == $this->return_menu_file_name_without_extension_deprecated($type, $useOriFileName)) {
                return $file;
            }
        }

        return "error_no_file_found_please_upload_in_MEDIA-EASY_PDF_MENU";
    }

    private function create_href_link($menuType, $anchorText = "", $arrAttributes = array(), $withP = 'false', $nofollow = 'false')
    {
        $attributesString = "";

        if (empty($anchorText)) {
            $filename = $this->plugin_configs->get_option_nsc_eprm($menuType . "_orifilename", "none");
            $filenameWithoutExtension = pathinfo($filename, PATHINFO_FILENAME);
            $anchorText = $filenameWithoutExtension;
        }

        if (!is_array($arrAttributes)) {
            throw new Exception('third Parameter expected to be an array ($arrAttributes).');
        }

        $defaultAttributes = array('target' => '_blank');
        $arrAttributes = array_merge($defaultAttributes, $arrAttributes);

        foreach ($arrAttributes as $key => $attributevalue) {
            $attributesString .= esc_attr($key) . '="' . esc_attr($attributevalue) . '" ';
        }

        $linkTarget = $this->nsc_eprm_return_download_url($menuType, true);

        $anchorText = $this->clean_input->sanitize_user_input_nsc_eprm($anchorText);
        $linkTarget = $this->clean_input->sanitize_user_input_nsc_eprm($linkTarget);
        $nofollowString = "";
        if ($nofollow === 'true') {
            $nofollowString = ' rel="nofollow" ';
        }
        $link = '<a href="' . esc_url_raw($linkTarget) . '" ' . $attributesString . $nofollowString . '>' . esc_html($anchorText) . '</a>';
        if ($withP === 'true') {
            $link = '<p id="nsc_eprm_download_link_wrapper_' . $menuType . '" class="nsc_eprm_download_link_wrapper">' . $link . '</p>';
        }
        return $link;
    }

    private function scan_dir($dir)
    {
        $ignored = array('.', '..', '.svn', '.htaccess');

        $files = scandir($dir);

        foreach ($files as $file) {
            if (in_array($file, $ignored)) {
                continue;
            }

            $files[$file] = filemtime($dir . '/' . $file);
        }

        arsort($files);

        $files = array_keys($files);

        return ($files) ? $files : false;
    }
}
