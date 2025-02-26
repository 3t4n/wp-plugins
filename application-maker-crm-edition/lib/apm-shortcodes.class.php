<?php

if (!class_exists('Application_Maker_Shortcodes')) {

    class Application_Maker_Shortcodes extends Application_Maker {

        // CONSTRUCTOR


        public function Application_Maker_Shortcodes() {
            add_shortcode('apm_portal', array($this, 'apm_portal_func'));

            $this->add_image = WP_PLUGIN_URL . '/' . WP_PLUGIN_FOLDER . '/img/plus_16.png';
            $this->del_image = WP_PLUGIN_URL . '/' . WP_PLUGIN_FOLDER . '/img/block_16.png';
            $this->defineContactShortCode();
        }

        public function init() {

        }

        function apm_portal_func($atts) {
            global $post, $apm_settings;
            /* extract( shortcode_atts( array(
              'foo' => 'something',
              'bar' => 'something else',
              ), $atts ) ); */
            $this->atts = $atts;
            require_once APPLICATION_MAKER_VIEWS_PATH . 'apm-portal_head.php';
        }

        public function defineContactShortCode() {

            function apm_contact_form($atts) {
                extract(shortcode_atts(array(//
                            "fields" => '{
                                "contact_fistname":{"label":"First name","required":true},
                                "contact_lastname":{"label":"Last name","required":true},
                                "email":{"label":"Email","required":true,"format":"email"},
                                "company":{"label":"Company"},
                                "phone":{"label":"Phone","default_value":""},
                                "street":{"label":"Address"},
                                "city_webform":{"label":"City"},
                                "state":{"label":"State"},
                                "zipcode":{"label":"Zip code"},
                                "country_webform":{"label":"Country"},
                                "full_description":{"label":"Message","type":"textarea"}}',
                            "hidden_field" => '{"assign_to":{"default_value":"1"},
                                "lead_status":{"default_value":"Not Contacted","get_id_by_name":true,"source_post_type":"ff_lead_status"},
                                "lead_source":{"default_value":"Web site form","get_id_by_name":true,"source_post_type":"ff_lead_source"}}',
                            "thanks_txt" => 'Thanks for contacting us.',
                            "form_action" => '',
                            "require_marker" => '*',
                            "label_separator" => ':',
                            "submit_txt" => 'Submit',
                            "thanks_email" => 'Thanks for contacting us.',
                            "thanks_email_subj" => 'Thanks for contacting us.',
                            "hiddenfield_tpl" => '<input name="[apm_name]" value="[apm_value]"  type="hidden">',
                            "field_tpl" => '<p class="apm_field"><label>[apm_label]</label><input name="[apm_name]" value="[apm_value]" class="[apm_field_classes]" size="40" title="[apm_label]" type="[apm_type]"></p>',
                            "textarea_tpl" => '<p class="apm_field"><label>[apm_label]</label><textarea name="[apm_name]" value="[apm_value]" class="[apm_field_classes]" rows="7" cols="30" title="[apm_label]" >[apm_value]</textarea></p>',
                            "form_tpl" => 'default',
                            "form_css" => 'default',
                                ), $atts));
                if ($form_css == "default") {
                    $form_css = "label {width: 150px; float:left; display:block; color:#555; font-size:12px}
                                 .apm-result-contact_ok{color:green; font-size:12px;}
                                 .apm-result-contact_notok{color:red; font-size:12px;}";
                }
                $str_fields = "";
                $str_hiddenfields = "";
                $fields_list = json_decode($fields);

                $hiddenfields_list = json_decode($hidden_field);
                if ($form_tpl == "default") {
                    $form_tpl = '<div class="apm_contact" >
                                <style type="text/css">[form_css]
                                </style>
                                <form action="[form_action]" method="post" class="apm_contact-form">
                                    <input value="true"  type="hidden" name="submit_apm_contact">
                                    [hidden_fields]
                                    [fields]
                                    <p class="submit-wrap"><input value="[submit_txt]" class="apm-submit" type="submit"></p>
                                    <div class="[apm-result-contact-cls]">[apm-result-contact]</div>
                                  </form>
                                <script type="text/javascript">
                                     if (typeof jQuery == "undefined") {
                                        // jQuery is not loaded
                                    } else {
                                        // jQuery is loaded
                                        var fields_required=[';

                    foreach ($fields_list as $k => $f) {
                        if (isset($f->format)) {
                            switch ($f->format) {
                                case 'email':
                                    $form_tpl.= '"' . $k . '/' . $f->label . ':required/email",';
                                    break;
                            }
                        } else {
                            if (isset($f->required)) {
                                $form_tpl.= '"' . $k . '/' . $f->label . ':required",';
                            }
                        }
                    }
                    $form_tpl.= ' ]

                                 }
                                 var is_valid=true;
                                 var invalid_str="";
                                 jQuery(".apm_contact-form").live("submit",function(){
                                    invalid_str="";
                                    is_valid=true;
                                    jQuery.each(fields_required, function(i,fi) {
                                        a=fi.split(":");
                                        aa=a[0].split("/");
                                        var fname=aa[0];
                                        var flabel=aa[1];
                                        val=jQuery(\'input[name="\'+fname+\'"]\').val();

                                        switch(a[1]){
                                            case "required":
                                                if(val==""){
                                                    is_valid=false;
                                                    invalid_str+="\n "+flabel+" is required. ";
                                                }
                                            break;
                                            case "required/email":
                                                country_code_ar=val.split(".");
                                                if(val==""){
                                                    is_valid=false;
                                                    invalid_str+="\n "+flabel+" is required. ";
                                                } else if(val.indexOf("@")==-1 || val.indexOf(".")==-1 || country_code_ar[1].length>3){
                                                    is_valid=false;
                                                    invalid_str+="\n "+flabel+" is invalid. ";
                                                }
                                            break;
                                        }
                                    });
                                    if(is_valid==false){
                                         invalid_str="Please correct the following fields:"+invalid_str;
                                         alert(invalid_str);
                                         return false;
                                    }
                                 });
                                </script>
                                </div>';
                }

                $o = doSubmitContactShortCode($fields_list, $hiddenfields_list);


                foreach ($fields_list as $k => $f) {

                    $type = "text";
                    if (isset($f->type)) {
                        $type = $f->type;
                    }
                    if ($type == "textarea") {
                        $field_tpl = $textarea_tpl;
                    }
                    $label = $f->label;
                    if (isset($f->required)) {
                        $label.=$require_marker;
                    }
                    $fi = str_replace('[apm_label]', $label . $label_separator, $field_tpl);
                    $fi = str_replace('[apm_name]', $k, $fi);
                    $val = "";
                    if (isset($f->default_value)) {
                        $val = $f->default_value;
                    }
                    if ($o->submitted == true) {
                        if ($o->valid == false) {
                            if (isset($_REQUEST[$k])) {
                                $val = $_REQUEST[$k];
                            }
                        }
                    }
                    $fi = str_replace('[apm_value]', $val, $fi);
                    $fi = str_replace('[apm_type]', $type, $fi);
                    $cls_input = ' apm_input';
                    if (isset($f->required)) {
                        $cls_input.=" apm_required";
                    }
                    $fi = str_replace('[apm_field_classes]', $cls_input, $fi);
                    $str_fields.=$fi;
                }

                foreach ($hiddenfields_list as $k => $f) {
                    $val = "";
                    if (isset($f->default_value)) {
                        $val = $f->default_value;
                    }
                    $fi = str_replace('[apm_value]', $val, $hiddenfield_tpl);
                    $fi = str_replace('[apm_name]', $k, $fi);
                    $str_hiddenfields.=$fi;
                }

                $form_str = str_replace('[fields]', $str_fields, $form_tpl);
                $form_str = str_replace('[hidden_fields]', $str_hiddenfields, $form_str);
                $form_str = str_replace('[form_css]', $form_css, $form_str);
                $form_str = str_replace('[submit_txt]', $submit_txt, $form_str);
                $form_str = str_replace('[form_action]', $form_action, $form_str);

                if ($o->submitted == true) {
                    if ($o->valid == false) {
                        $form_str = str_replace('[apm-result-contact]', "Invalid field(s):<br/>" . $o->invalid_fields_str, $form_str);
                        $form_str = str_replace('[apm-result-contact-cls]', "apm-result-contact_notok", $form_str);
                    } else {
                        $form_str = str_replace('[apm-result-contact]', "Successfully submitted", $form_str);
                        $form_str = str_replace('[apm-result-contact-cls]', "apm-result-contact_ok", $form_str);
                    }
                } else {
                    $form_str = str_replace('[apm-result-contact]', "", $form_str);
                }

                return $form_str;
            }

            function isValidEmail($email) {
                return preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email);
            }

            function get_id_by_name($key, $field, $v) {
                global $wpdb;
                $query = "SELECT *
                                FROM $wpdb->posts
                                WHERE   $wpdb->posts.post_type ='" . $field->source_post_type . "'
                                AND $wpdb->posts.post_status = 'publish'
                                AND $wpdb->posts.post_title = '" . $v . "'
                                ORDER BY post_title";
                $posts_list = $wpdb->get_results($query);
                if (count($posts_list) > 0) {
                    return $posts_list[0]->ID;
                } else {
                    return $v;
                }
            }

            function doSubmitContactShortCode($fields_list, $hiddenfields_list) {
                $valid = true;
                $submitted = false;
                if (isset($_REQUEST['submit_apm_contact'])) {
                    $submitted = true;
                    $invalid_fields_str = "";
                    foreach ($fields_list as $k => $f) {
                        if (isset($f->required)) {
                            if (!isset($_REQUEST[$k])) {
                                $valid = false;
                                $invalid_fields_str.="Missing field for " . $f->label . "<br/>";
                            } else if ($_REQUEST[$k] == "") {
                                $valid = false;
                                $invalid_fields_str.="Missing value for " . $f->label . "<br/>";
                            }
                        }

                        if (isset($f->format)) {
                            switch ($f->format) {
                                case 'email':
                                    $va = isValidEmail($_REQUEST[$k]);
                                    if ($va == false) {
                                        $valid = false;
                                        $invalid_fields_str.="Invalid email format for " . $f->label . "<br/>";
                                    }
                                    break;
                            }
                        }
                    }
                    if ($valid) {
                        $post_title = '';
                        $meta_ar = array();
                        $contact_fistname = "";
                        $contact_lastname = "Undefined";
                        foreach ($fields_list as $k => $f) {// contact_fistname  contact_lastname
                            if ($k == "contact_fistname") {
                                $contact_fistname = $_REQUEST[$k];
                            }
                            if ($k == "contact_lastname") {
                                $contact_lastname = $_REQUEST[$k];
                            }
                            $v = $_REQUEST[$k];
                            //
                            if (isset($f->get_id_by_name) and isset($f->source_post_type)) {
                                $v = get_id_by_name($k, $f, $v);
                            }
                            $meta_ar[$k] = $v;
                        }
                        foreach ($hiddenfields_list as $k => $f) {
                            if ($k == "submit_apm_contact") {

                            } else {
                                $v = $_REQUEST[$k];
                                if (isset($f->get_id_by_name) and isset($f->source_post_type)) {
                                    $v = get_id_by_name($k, $f, $v);
                                }
                                $meta_ar[$k] = $v;
                            }
                        }
                        $current_user = wp_get_current_user();
                        $user_id = $current_user->ID;
                        $my_post = array(
                            'post_title' => $contact_fistname . " " . $contact_lastname,
                            'post_status' => 'publish',
                            'post_type' => 'ff_leads',
                            'post_author' => $user_id
                        );

                        // Insert the post into the database
                        $post_id = wp_insert_post($my_post);
                        if (count($meta_ar) > 0) {
                            foreach ($meta_ar as $k => $v) {
                                update_post_meta($post_id, $k . "_value", $v);
                            }
                        }
                    }
                }
                $o = (object) array(
                            'valid' => $valid,
                            'submitted' => $submitted,
                            'invalid_fields_str' => $invalid_fields_str
                );
                return $o;
            }

            add_shortcode('apmcontactform', 'apm_contact_form');
            /* To use the shortcode, type in:
              1                       [apmcontactform ] */
        }

        function test() {
            echo "////" . $this->Parent->toto . "****";
        }

    }

}