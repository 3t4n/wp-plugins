<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( ! class_exists( 'ForminixSettings' ) ) {
    class ForminixSettings
    {

        public $base_admin;

        function __construct($base_admin)
        {

            $this->base_admin = $base_admin;

            $defaultOption = array();
            if (!get_option("forminix_modules")) {
                update_option('forminix_modules', $defaultOption);
            }
            if (!get_option("forminix_forms")) {
                update_option('forminix_forms', $defaultOption);
            }
            if (!get_option("forminix_form_settings")) {
                update_option('forminix_form_settings', $defaultOption);
            }
            if (!get_option("forminix_entries")) {
                update_option('forminix_entries', $defaultOption);
            }
            if (!get_option("forminix_entry_settings")) {
                update_option('forminix_entry_settings', $defaultOption);
            }

        }


        /* ****************** Modules Operations ****************** */

        public function update_activated_modules($list_modules)
        {
            $dataFreshModules = array();
            foreach ($list_modules as $single_module_slug) {
                $dataFreshModules[] = $single_module_slug;
            }
            update_option('forminix_modules', $dataFreshModules);
        }

        public function listAllModules()
        {
            $dataModules = get_option("forminix_modules");
            return is_array($dataModules) ? $dataModules : array();
        }

        /* ****************** Form Operations ****************** */

        public function createNewForm()
        {
            $dataForms = get_option("forminix_forms");
            $form_id = $this->generateFormID($dataForms);
            $dataForms[] = array("form_id" => $form_id);
            update_option('forminix_forms', $dataForms);

            $created_at_gmt_time = gmdate("Y/m/d H:i:s", time()+date("Z"));
            $this->updateFormSettings($form_id, "created_at", $created_at_gmt_time);

            return $form_id;
        }

        public function deleteForm($form_id)
        {

            $dataFreshForms = array();
            $dataForms = get_option("forminix_forms");
            foreach ($dataForms as $singleData) {
                if (isset($singleData['form_id'])) {
                    if ($singleData['form_id'] != $form_id) {
                        $dataFreshForms[] = $singleData;
                    }
                }
            }

            $dataFreshFormSettings = array();
            $dataFormSettings = get_option("forminix_form_settings");
            foreach ($dataFormSettings as $singleData) {
                if (isset($singleData['form_id'])) {
                    if ($singleData['form_id'] != $form_id) {
                        $dataFreshFormSettings[] = $singleData;
                    }
                }
            }


            $dataEntries = get_option("forminix_entries");
            foreach ($dataEntries as $singleData){
                if(isset($singleData['entry_id']) && isset($singleData['form_id'])){
                    if($singleData['form_id'] == $form_id){
                        $this->deleteEntry($singleData['entry_id']);
                    }
                }
            }


            update_option('forminix_forms', $dataFreshForms);
            update_option('forminix_form_settings', $dataFreshFormSettings);
        }


        public function listAllForms()
        {
            $dataForms = get_option("forminix_forms");
            return is_array($dataForms) ? $dataForms : Null;
        }

        public function updateFormSettings($form_id, $key, $value = "<<forminix_empty_value>>")
        {
            $exits = false;
            $exitingValue = Null;
            $dataFormSettings = get_option("forminix_form_settings");
            $dataNewFormSettings = array();
            foreach ($dataFormSettings as $singleSettings) {
                if (isset($singleSettings['form_id']) && isset($singleSettings['key'])) {
                    if ($singleSettings['form_id'] == $form_id && $singleSettings['key'] == $key) {
                        $exits = true;
                        $exitingValue = $singleSettings['value'];
                        $singleSettings['value'] = ($value != "<<forminix_empty_value>>") ? $value : $singleSettings['value'];
                    }
                }
                if ($value != "<<forminix_empty_value>>") {
                    $dataNewFormSettings[] = $singleSettings;
                }
            }
            if ($exits && $value != "<<forminix_empty_value>>") {
                update_option('forminix_form_settings', $dataNewFormSettings);
            } else if (!$exits && $value != "<<forminix_empty_value>>") {
                $dataNewFormSettings[] = array("form_id" => $form_id, "key" => $key, "value" => $value);
                update_option('forminix_form_settings', $dataNewFormSettings);
            } else if ($exits && $value == "<<forminix_empty_value>>") {
                return stripslashes($exitingValue);
            }else{
                return Null;
            }
        }

        public function generateFormID($resultData)
        {
            $exits = false;
            $length = 9;
            $key = substr(str_shuffle(str_repeat($x = '123456789', ceil($length / strlen($x)))), 1, $length);
            foreach ($resultData as $singleResult) {
                if (isset($singleResult['form_id'])) {
                    if ($singleResult['form_id'] == $key) {
                        $exits = true;
                    }
                }
            }
            return (!$exits) ? $key : $this->generateFormID($resultData);
        }













        /* ****************** Form Entry Operations ****************** */

        public function createNewEntry($form_id)
        {
            $dataEntries = get_option("forminix_entries");
            $entry_id = $this->generateEntryID($dataEntries);
            $dataEntries[] = array("form_id" => $form_id, "entry_id" => $entry_id);
            update_option('forminix_entries', $dataEntries);
            return $entry_id;
        }

        public function updateEntrySettings($entry_id, $key, $value = "<<forminix_empty_value>>")
        {
            $exits = false;
            $exitingValue = Null;
            $dataEntrySettings = get_option("forminix_entry_settings");
            $dataNewEntrySettings = array();
            foreach ($dataEntrySettings as $singleSettings) {
                if (isset($singleSettings['entry_id']) && isset($singleSettings['key'])) {
                    if ($singleSettings['entry_id'] == $entry_id && $singleSettings['key'] == $key) {
                        $exits = true;
                        $exitingValue = $singleSettings['value'];
                        $singleSettings['value'] = ($value != "<<forminix_empty_value>>") ? $value : $singleSettings['value'];
                    }
                }
                if ($value != "<<forminix_empty_value>>") {
                    $dataNewEntrySettings[] = $singleSettings;
                }
            }
            if ($exits && $value != "<<forminix_empty_value>>") {
                update_option('forminix_entry_settings', $dataNewEntrySettings);
            } else if (!$exits && $value != "<<forminix_empty_value>>") {
                $dataNewEntrySettings[] = array("entry_id" => $entry_id, "key" => $key, "value" => $value);
                update_option('forminix_entry_settings', $dataNewEntrySettings);
            } else if ($exits && $value == "<<forminix_empty_value>>") {
                return stripslashes($exitingValue);
            }else{
                return Null;
            }
        }


        public function getFormIDfromEntryID($entry_id){
            $dataEntries = get_option("forminix_entries");
            foreach ($dataEntries as $singleData){
                if(isset($singleData['entry_id'])){
                    if($singleData['entry_id'] == $entry_id){
                        return $singleData['form_id'];
                    }
                }
            }
            return Null;
        }

        public function listAllEntries($form_id){
            $dataEntriesByForm = array();
            $dataEntries = get_option("forminix_entries");
            foreach ($dataEntries as $singleData){
                if(isset($singleData['form_id'])){
                    if($singleData['form_id'] == $form_id){
                        $dataEntriesByForm[] = $singleData;
                    }
                }
            }
            return $dataEntriesByForm;
        }


        public function deleteEntry($entry_id){
            $dataFreshEntries = array();
            $dataEntries = get_option("forminix_entries");
            foreach ($dataEntries as $singleData){
                if(isset($singleData['entry_id'])){
                    if($singleData['entry_id'] != $entry_id){
                        $dataFreshEntries[] = $singleData;
                    }
                }
            }

            $dataFreshEntrySettings = array();
            $dataEntrySettings = get_option("forminix_entry_settings");
            foreach ($dataEntrySettings as $singleData){
                if(isset($singleData['entry_id'])){
                    if($singleData['entry_id'] != $entry_id){
                        $dataFreshEntrySettings[] = $singleData;
                    }
                }
            }
            update_option( 'forminix_entries', $dataFreshEntries );
            update_option( 'forminix_entry_settings', $dataFreshEntrySettings );
        }


        public function generateEntryID($resultData)
        {
            $exits = false;
            $length = 9;
            $key = substr(str_shuffle(str_repeat($x = '123456789', ceil($length / strlen($x)))), 1, $length);
            foreach ($resultData as $singleResult) {
                if (isset($singleResult['entry_id'])) {
                    if ($singleResult['entry_id'] == $key) {
                        $exits = true;
                    }
                }
            }
            return (!$exits) ? $key : $this->generateEntryID($resultData);
        }




    }

}