<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!class_exists('esigCf7Filters')):

    class esigCf7Filters {

        protected static $instance = null;

        private function __construct() {
            add_filter("esig_document_title_filter", array($this, "cf7_document_title_filter"), 10, 2);
            add_filter("esig_strip_shortcodes_tagnames", array($this, "tag_list_filter"), 10, 1);
            add_filter("esig_document_clone_render_content",array($this,"replace_esigcf7_shortcode"),10,4);
        }

        public function replace_esigcf7_shortcode($content, $new_doc_id, $docType, $args){

            if(!function_exists("esig_do_unique_shortcode")) return $content;
            if ($docType != 'stand_alone') {
                return  $content;
            }         
            
            ESIG_CF7_SETTING::save_file_url($new_doc_id);       

            global $esig_cf7_document_id; 
            $esig_cf7_document_id = $new_doc_id; 
            return esig_do_unique_shortcode($content,["esigcf7"]);
        }

        public function tag_list_filter($listArray) {
            $listArray[] = "contact-form-7";
            return $listArray;
        }

        public function cf7_document_title_filter($docTitle, $docId) {
            
            $formIntegration = WP_E_Sig()->document->getFormIntegration($docId);
            if ($formIntegration != "cf7") {
                return $docTitle;
            }

            preg_match_all('/{{+(.*?)}}/', $docTitle, $matchesAll);

            if (empty($matchesAll[1])) {
                return $docTitle;
            }
            if (!is_array($matchesAll[1])) {
                return $docTitle;
            }

            $titleResult = $matchesAll[1];

            $formId = WP_E_Sig()->meta->get($docId, 'esig_cf7_form_id');
            foreach ($titleResult as $result) {
               
               
                $fieldId = ($result) ? str_replace('cf7-field-id-', "", $result) : false;
                
                if ($fieldId) {
                    $cf7Value = ESIG_CF7_SETTING::get_submission_value($docId, $formId, $fieldId);
                    
                    if(is_array( $cf7Value) && strpos($fieldId,'menu') !== false){
                        $cf7Value = $cf7Value[0];
                    }elseif(is_array( $cf7Value) && strpos($fieldId,'menu') === false){
                        $valueTitle = '';
                        foreach($cf7Value as $value){

                            $valueTitle .= $value.' ';

                        }
                        $cf7Value = $valueTitle ;
                    }

                    $docTitle = str_replace("{{cf7-field-id-" . $fieldId . "}}", $cf7Value, $docTitle);
                }
            }
            
            return $docTitle;
        }

        /**
         * Return an instance of this class.
         * @since     0.1
         * @return    object    A single instance of this class.
         */
        public static function instance() {

            // If the single instance hasn't been set, set it now.
            if (null == self::$instance) {
                self::$instance = new self;
            }

            return self::$instance;
        }

    }

    

    

    

    

    
endif;
