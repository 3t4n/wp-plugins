<?php

if (!class_exists('ESIG_CF7_SETTING')):

    class ESIG_CF7_SETTING {

        const ESIG_CF7_COOKIE = 'esig-cf7-redirect';
        const CF7_COOKIE = 'esig-cf7-temp-data';
        const CF7_FORM_ID_META = 'esig_cf7_form_id';
        const CF7_ENTRY_ID_META = 'esig_cf7_entry_id';

        public static function is_cf7_requested_agreement($document_id) {
            $cf7_form_id = WP_E_Sig()->meta->get($document_id, self::CF7_FORM_ID_META);
            $cf7_entry_id = WP_E_Sig()->meta->get($document_id, self::CF7_ENTRY_ID_META);
            if ($cf7_form_id && $cf7_entry_id) {
                return true;
            }
            return false;
        }

        public static function is_cf7_esign_required() {
            if (self::get_temp_settings()) {
                return true;
            } else {
                return false;
            }
        }

        public static function get_temp_settings() {
            if (ESIG_COOKIE(self::CF7_COOKIE)) {
                return json_decode(stripslashes(ESIG_COOKIE(self::CF7_COOKIE)), true);
            }
            return false;
        }

        public static function save_esig_cf7_meta($meta_key, $meta_index, $meta_value) {

            $temp_settings = self::get_temp_settings();
            if (!$temp_settings) {
                $temp_settings = array();
                $temp_settings[$meta_key] = array($meta_index => $meta_value);
                // finally save slv settings . 
                self::save_temp_settings($temp_settings);
            } else {

                if (array_key_exists($meta_key, $temp_settings)) {
                    $temp_settings[$meta_key][$meta_index] = $meta_value;
                    self::save_temp_settings($temp_settings);
                } else {
                    $temp_settings[$meta_key] = array($meta_index => $meta_value);
                    self::save_temp_settings($temp_settings);
                }
            }
        }

        public static function save_temp_settings($value) {
            $json = $value;
            //esig_setcookie(self::CF7_COOKIE, $json, 600);
            if (!headers_sent()) {
                setcookie(self::CF7_COOKIE, $value, time() + 600, COOKIEPATH, COOKIE_DOMAIN, false);
            } elseif (defined('WP_DEBUG') && WP_DEBUG) {
                headers_sent($file, $line);
                trigger_error("{$name} cookie cannot be set - headers already sent by {$file} on line {$line}", E_USER_NOTICE);
            }
            // for instant cookie load. 
            $_COOKIE[self::CF7_COOKIE] = $json;
        }

        public static function save_invite_url($invite_hash, $document_checksum) {
            $invite_url = WP_E_Invite::get_invite_url($invite_hash, $document_checksum);
            esig_setcookie(self::ESIG_CF7_COOKIE, $invite_url, 600);
            $_COOKIE[self::ESIG_CF7_COOKIE] = $invite_url;
        }

        public static function get_invite_url() {
            return esig_cf7_get(self::ESIG_CF7_COOKIE, $_COOKIE);
        }

        public static function remove_invite_url() {
            setcookie(self::ESIG_CF7_COOKIE, null, time() - YEAR_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN);
        }

        public static function save_submission_value($document_id, $form_id) {


            $submission = WPCF7_Submission::get_instance();
            $cf7_data = $submission->get_posted_data();

            WP_E_Sig()->meta->add($document_id, "esig_cf7_submission_value", json_encode($cf7_data));
        }

        public static function get_submission_value($document_id, $form_id, $field_id) 
        {
           
            $submission = WPCF7_Submission::get_instance();
            if(!is_null($submission))
            {
                $cf7_data = $submission->get_posted_data();
                if (!empty($cf7_data) && is_array($cf7_data)) {
                    return esigget($field_id, $cf7_data);
                }
            }
            // support old backward compatibility
            $cf7_value = json_decode(WP_E_Sig()->meta->get($document_id, "esig_cf7_submission_value"), true);
            if (is_array($cf7_value)) 
            {
                return esigget($field_id, $cf7_value);
            }
        }

        
        public static function save_file_url($document_id) {

            global $wpdb;
            $form_to_DB = WPCF7_Submission::get_instance();

            if (!$form_to_DB) {
                return;
            }
            
            $fileUrls = array();
            $upload_dir    = wp_upload_dir();           
            $baseUrl = $upload_dir['url'];
            $uploaded_files = $form_to_DB->uploaded_files(); // this allows you access to the upload file in the temp location

            foreach ($uploaded_files as $file_key => $file) {
                $file = is_array( $file ) ? reset( $file ) : $file;
                if( empty($file) ) continue;
                $file_name = basename($file);
                copy($file, $upload_dir['path'] .'/'.$file_name);
                $fileurl = $baseUrl .'/'.$file_name;
                $fileUrls[$file_key] = $fileurl; 
            }
            if(!empty($fileUrls)) WP_E_Sig()->meta->add($document_id, "esig_cf7_file_url", json_encode($fileUrls));
        }

        public static function get_file_url($document_id,$field_id) {

           
            $fileEntry  = WP_E_Sig()->meta->get($document_id, "esig_cf7_file_url");

            $cf7_url = json_decode($fileEntry,true);
            if(json_last_error() === JSON_ERROR_NONE)
            {
                if (is_array($cf7_url)) return esigget($field_id, $cf7_url);
            }
           
            if($fileEntry) return $fileEntry;
            return false;
        }

        public static function display_value($underline_data, $form_id, $cf7_value,$displayFormat) {



            $result = '';
            if ($underline_data == "underline") {

                if (is_array($cf7_value)) {
                    foreach ($cf7_value as $val) 
                    {
                        
                        $result .= '<u>' . $val . '</u>';
                        if($displayFormat == "block")
                        {
                            $result .= '<br>';
                        }
                    }
                } else {
                    $result = '<u>' . nl2br($cf7_value) . '</u>';
                }
                // $result .= '<u>' . implode(", ", $cf7_value) . '</u><br>';
            } else {
                if (is_array($cf7_value)) {
                    foreach ($cf7_value as $val) {
                        $result .= $val . '<br>';
                    }
                } else {
                    $result = nl2br($cf7_value);
                }
            }
           
            return $result;
        }
        

        /**
         * Check empty value and take zero as input
         * @since 1.5.7.0
         * @return bolean
         */
        public static function notEmpty($value)
        {
            return ($value === "0" || $value);
        }

        /**
         * Return current contact form 7 id 
         */
        public static function currentFormId($formId)
        {
            if($formId) return $formId;
            $wpcf7 = WPCF7_ContactForm::get_current();
            if(is_null($wpcf7)) return $formId;
            $form_id = $wpcf7->id();
            return $form_id;  
        }

        public static function docId()
        {
            global $esig_cf7_document_id;

            if (!is_null($esig_cf7_document_id)) return $esig_cf7_document_id;

            if (function_exists('esig_cf7_get')) {
                $csum = ESIG_GET('csum');
            } else {
                $csum = (isset($_GET['csum'])) ? esig_cf7_get($_GET['csum']) : false;
            }

            if (empty($csum)) {
                $document_id = get_option('esig_global_document_id');
            } else {
                $document_id = WP_E_Sig()->document->document_id_by_csum($csum);
            }

            return $document_id;
        }

    }

    

    

endif;