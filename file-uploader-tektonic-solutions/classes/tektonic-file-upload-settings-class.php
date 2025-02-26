<?php
if( !class_exists('TektonicFileUploadSettingsPage') ) {
    class TektonicFileUploadSettingsPage {
        /**
         * Holds the values to be used in the fields callbacks
         */
        private $options;

        /**
         * Start up
         */
        public function __construct() {
            add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
            add_action( 'admin_init', array( $this, 'page_init' ) );
        }

        /**
         * Add options page
         */
        public function add_plugin_page() {
            // This page will be under "Settings"
            add_options_page(
                __('Tektonic File Uploader'), 
                __('Tektonic File Uploader'), 
                'manage_options', 
                'tektonic-file-upload-settings', 
                array( $this, 'tektonic_file_upload_settings_page' )
            );
        }

        /**
         * Options page callback
         */
        public function tektonic_file_upload_settings_page() {
            ?>
            <div class="wrap">
                <form method="post" action="<?php echo esc_url('options.php'); ?>">
                <?php
                    // This prints out all hidden setting fields
                    settings_fields( 'tektonic_file_upload_options_group' );
                    do_settings_sections( 'tektonic-file-upload-settings' );
                    submit_button( __('Save Settings') );
                ?>
                </form>
            </div>
            <?php
        }

        /**
         * Register and add settings
         */
        public function page_init() {
            register_setting(
                'tektonic_file_upload_options_group', // Option group
                'tektonic_file_upload_options', // Option name
                array( $this, 'sanitizeTektonicSettings' ) // Sanitize
            );

            add_settings_section(
                'tektonic_file_upload_setting_section_id', // ID
                '<h1>' . __('Tektonic File Uploader Settings') . '<a href="' . esc_url(admin_url('plugins.php')) . '#tektonic-settings" class="upload-view-toggle page-title-action" role="button" aria-expanded="false"><span class="upload">' . __('Plugins') . '</span></a></h1>', // Title
                array( $this, 'print_section_info' ), // Callback
                'tektonic-file-upload-settings' // Page
            );

            add_settings_field(
                'tektonic_file_upload_allowed_file_types', 
                __('Allowed File Types'), 
                array( $this, 'tektonicFileUploadAllowedFileTypes' ),
                'tektonic-file-upload-settings', 
                'tektonic_file_upload_setting_section_id'
            );

            add_settings_field(
                'tektonic_file_upload_bar_show', 
                __('Show progress bar'), 
                array( $this, 'tektonicFileUploadShowProgressBar' ), 
                'tektonic-file-upload-settings', 
                'tektonic_file_upload_setting_section_id'
            );

            add_settings_field(
                'tektonic_file_upload_bar_type', 
                __('Progress Bar Type'), 
                array( $this, 'tektonicFileUploadBarType' ), 
                'tektonic-file-upload-settings', 
                'tektonic_file_upload_setting_section_id'
            );

            add_settings_field(
                'tektonic_file_upload_hotlink_filename', 
                __('Enable Hotlinking'), 
                array( $this, 'tektonicFileUploadHotLinking' ), 
                'tektonic-file-upload-settings', 
                'tektonic_file_upload_setting_section_id'
            );
        }

        /**
         * Sanitize each setting field as needed
         *
         * @param array $input Contains all settings fields as array keys
         */
        public function sanitizeTektonicSettings() {
            $new_input = array();

            if( isset( $_POST['tektonic_file_upload_bar_show'] ) )
                $new_input['tektonic_file_upload_bar_show'] = sanitize_text_field( $_POST['tektonic_file_upload_bar_show'] );

            if( isset( $_POST['tektonic_file_upload_bar_type'] ) )
                $new_input['tektonic_file_upload_bar_type'] = sanitize_text_field( $_POST['tektonic_file_upload_bar_type'] );

            if( isset( $_POST['tektonic_file_upload_allowed_file_types'] ) )
                $new_input['tektonic_file_upload_allowed_file_types'] = sanitize_text_field( $_POST['tektonic_file_upload_allowed_file_types'] );

            if( isset( $_POST['tektonic_file_upload_hotlink_filename'] ) )
                $new_input['tektonic_file_upload_hotlink_filename'] = sanitize_text_field( $_POST['tektonic_file_upload_hotlink_filename'] );

            return $new_input;
        }

        /** 
         * Print the Section text
         */
        public function print_section_info() {
            $sectionInfo = __('Configure the plugin settings below. For more details, see the ') . '<a href="' . esc_url('https://www.tektonicsolutions.com/ts_plugin/file-uploader/') . '" title="' . __('Click here to see the User Manual') . '" target="_blank"> ' . __('User Manual') . '</a>.';
            $sectionInfo .= '<br>';
            $sectionInfo .= '<strong><a href="' . esc_url('https://www.tektonicsolutions.com/ts_plugin/file-uploader-pro-with-drag-n-drop/') . '" title="' . __('Click here to see the details') . '" target="_blank">' . __('Upgrade to Pro!') . '</a></strong> ' . __('Features include: drag and drop, image thumbnail, multiple file upload. More') . ' <a href="' . esc_url('https://www.tektonicsolutions.com/ts_plugin/file-uploader-pro-with-drag-n-drop/') . '" title="' . __('Click here to see the details') . '" target="_blank">' . __('details') . '</a> ' . __('here');
            $sectionInfo .= '<br><br>';
            $sectionInfo .= __('Copy and paste the following shortcode where you want to display the upload file button:');
            $sectionInfo .= '<br>';
            $sectionInfo .= '<strong>[tektonic_file_upload]</strong>';
            $sectionInfo .= '<br>';
            $sectionInfo .= '<br>';
            $sectionInfo .= __('In this free version, all files are uploaded to:') . ' <strong>' . esc_url(get_site_url() . '/wp-content/uploads/') . '</strong> ' . __('and you can see, utlilize and/or download all these files in the') . ' <a href="' . esc_url(admin_url() . 'upload.php') . '" title="' . __('Click here to go to the media section') . '">' . __('Media') . '</a> ' . __('section in the admin panel.');
            $sectionInfo .= '<br>';
            $sectionInfo .= __('If you require a different upload folder, please upgrade to the') . ' <a href="' . esc_url('https://www.tektonicsolutions.com/ts_plugin/file-uploader-pro-with-drag-n-drop/') . '" title=" '. __('Click here to see the details') . '" target="_blank">' . __('Pro version') . '</a>. ' . __('For more information, please see the') . ' <a href="' . esc_url('https://www.tektonicsolutions.com/ts_plugin/file-uploader-pro-with-drag-n-drop/') . '" title="' . __('Click here to see the details') . '" target="_blank">' . __('User Manual') . '</a>.';

            print $sectionInfo;
        }

        /** 
         * Get the settings option array and print one of its values
         */
        public function tektonicFileUploadShowProgressBar() {
            $checked = null;
            $getTektonicOptions = get_option('tektonic_file_upload_options');
            $showProgressBar    = isset($getTektonicOptions['tektonic_file_upload_bar_show']) ? $getTektonicOptions['tektonic_file_upload_bar_show'] : null;

            if($showProgressBar == 'on') {
                $checked = 'checked';
            }

            echo '<label class="switch"><input name="tektonic_file_upload_bar_show" type="checkbox" ' . $checked . '><span class="slider round"></span></label>';
        }

        public function tektonicFileUploadBarType() {
            $html = $disabled = $class = null;
            $getTektonicOptions = get_option('tektonic_file_upload_options');
            $selectedVarType    = isset($getTektonicOptions['tektonic_file_upload_bar_type']) ? $getTektonicOptions['tektonic_file_upload_bar_type'] : null;

            $arrSelectOption = array(
                'bar'      => 'Bar',
                'circular' => 'Circular'
            );

            if(!empty($arrSelectOption)) {
                $html = '<select name="tektonic_file_upload_bar_type">';

                foreach( $arrSelectOption as $optionKey=>$optionValue ) {
                    $selected = null;

                    if( $selectedVarType == $optionKey ) {
                        $selected = 'selected';
                    }

                    $html .= '<option value="' . esc_attr__($optionKey) . '" ' . esc_attr__($selected) . '>' . esc_html__($optionValue) . '</option>';
                }

                echo '</select>';
            }

            echo $html;
        }

        public function tektonicFileUploadAllowedFileTypes() {
            $getTektonicOptions = get_option('tektonic_file_upload_options');
            $allowedFileType    = isset($getTektonicOptions['tektonic_file_upload_allowed_file_types']) ? $getTektonicOptions['tektonic_file_upload_allowed_file_types'] : null;

            if($allowedFileType == null) {
                $allowedFileType = 'txt,jpg,jpeg,bmp,gif,png';
            }

            printf(
                '<input type="text" name="tektonic_file_upload_allowed_file_types" value="%s" class="regular-text" /><p class="description">'.__('You can use upper and/or lower case letters').'</p>',
                esc_html($allowedFileType)
            );
        }

        public function tektonicFileUploadHotLinking() {
            $checked = null;
            $getTektonicOptions = get_option('tektonic_file_upload_options');
            $enableHotlinking   = isset($getTektonicOptions['tektonic_file_upload_hotlink_filename']) ? $getTektonicOptions['tektonic_file_upload_hotlink_filename'] : null;

            if($enableHotlinking == 'on') {
                $checked = 'checked';
            }

            echo '<label class="switch"><input name="tektonic_file_upload_hotlink_filename" type="checkbox" ' . esc_attr($checked) . '><span class="slider round"></span></label><p class="description">'.__('When your file has been uploaded, this will enable you to click on the file and be taken to its web location').'</p>';
        }
    }
}
