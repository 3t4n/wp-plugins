<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( ! class_exists( 'ForminixUtils' ) ) {
    class ForminixUtils
    {

        public $base_admin;
        public function __construct($base_admin)
        {
            $this->base_admin = $base_admin;
        }

        public function getDefaultFieldData($slug)
        {
            $fieldData = array();
            switch ($slug){
                case "simple_text":
                    $fieldData = array(
                        "slug" => "simple_text",
                        "label" => "Text Input",
                        "label_position" => "label_top_left",
                        "placeholder" => "",
                        "required" => "0",
                        "required_error_msg" => "This field is required",
                        "default_value" => "",
                        "max_length" => "",
                        "min_length" => "",
                        "help_msg" => "",
                        "name" => "",
                        "container_class" => "",
                        "field_class" => "",
                    );
                    break;
                case "full_name":
                    $fieldData = array(
                        "slug" => "full_name",
                        "label" => "Full Name",
                        "label_position" => "label_top_left",
                        "placeholder" => "",
                        "required" => "0",
                        "required_error_msg" => "This field is required",
                        "default_value" => "",
                        "max_length" => "",
                        "min_length" => "",
                        "allowed_chars" => "a::forminix_separator::u::forminix_separator::s::forminix_separator::.::forminix_separator::-",
                        "help_msg" => "",
                        "name" => "",
                        "container_class" => "",
                        "field_class" => "",
                    );
                    break;
                case "email_address":
                    $fieldData = array(
                        "slug" => "email_address",
                        "label" => "Email Address",
                        "label_position" => "label_top_left",
                        "placeholder" => "",
                        "required" => "0",
                        "required_error_msg" => "This field is required",
                        "default_value" => "",
                        "help_msg" => "",
                        "name" => "",
                        "container_class" => "",
                        "field_class" => "",
                    );
                    break;
                case "number":
                    $fieldData = array(
                        "slug" => "number",
                        "label" => "Numeric Field",
                        "label_position" => "label_top_left",
                        "placeholder" => "",
                        "required" => "0",
                        "required_error_msg" => "This field is required",
                        "default_number_value" => "",
                        "min_value" => "",
                        "max_value" => "",
                        "allow_decimal" => "1",
                        "help_msg" => "",
                        "name" => "",
                        "container_class" => "",
                        "field_class" => "",
                    );
                    break;
                case "password":
                    $fieldData = array(
                        "slug" => "password",
                        "label" => "Password Field",
                        "label_position" => "label_top_left",
                        "placeholder" => "",
                        "required" => "0",
                        "required_error_msg" => "This field is required",
                        "default_value" => "",
                        "max_length" => "",
                        "min_length" => "",
                        "help_msg" => "",
                        "name" => "",
                        "container_class" => "",
                        "field_class" => "",
                    );
                    break;
                case "phone":
                    $fieldData = array(
                        "slug" => "phone",
                        "label" => "Phone Number",
                        "label_position" => "label_top_left",
                        "placeholder" => "",
                        "required" => "0",
                        "required_error_msg" => "This field is required",
                        "country_flag_phone" => "1",
                        "default_value" => "",
                        "max_length" => "",
                        "min_length" => "",
                        "help_msg" => "",
                        "name" => "",
                        "container_class" => "",
                        "field_class" => "",
                    );
                    break;
                case "website_url":
                    $fieldData = array(
                        "slug" => "website_url",
                        "label" => "Website URL",
                        "label_position" => "label_top_left",
                        "placeholder" => "",
                        "required" => "0",
                        "required_error_msg" => "This field is required",
                        "default_value" => "",
                        "help_msg" => "",
                        "name" => "",
                        "container_class" => "",
                        "field_class" => "",
                    );
                    break;
                case "time":
                    $fieldData = array(
                        "slug" => "time",
                        "label" => "Time Field",
                        "label_position" => "label_top_left",
                        "required" => "0",
                        "required_error_msg" => "This field is required",
                        "default_time_value" => "",
                        "help_msg" => "",
                        "name" => "",
                        "container_class" => "",
                        "field_class" => "",
                    );
                    break;
                case "date":
                    $fieldData = array(
                        "slug" => "date",
                        "label" => "Date Field",
                        "label_position" => "label_top_left",
                        "required" => "0",
                        "required_error_msg" => "This field is required",
                        "default_date_value" => "",
                        "help_msg" => "",
                        "name" => "",
                        "container_class" => "",
                        "field_class" => "",
                    );
                    break;
                case "datetime":
                    $fieldData = array(
                        "slug" => "datetime",
                        "label" => "Datetime Field",
                        "label_position" => "label_top_left",
                        "required" => "0",
                        "required_error_msg" => "This field is required",
                        "default_datetime_value" => "",
                        "help_msg" => "",
                        "name" => "",
                        "container_class" => "",
                        "field_class" => "",
                    );
                    break;
                case "dropdown":
                    $fieldData = array(
                        "slug" => "dropdown",
                        "label" => "Dropdown Field",
                        "label_position" => "label_top_left",
                        "required" => "0",
                        "required_error_msg" => "This field is required",
                        "placeholder_dropdown" => "Select Option",
                        "options_dropdown" => "Option 1::forminix_separator::Option 2::forminix_separator::Option 3",
                        "help_msg" => "",
                        "name" => "",
                        "container_class" => "",
                        "field_class" => "",
                    );
                    break;
                case "radio":
                    $fieldData = array(
                        "slug" => "radio",
                        "label" => "Radio Field",
                        "label_position" => "label_top_left",
                        "required" => "0",
                        "required_error_msg" => "This field is required",
                        "orientation" => "2",
                        "options_radio" => "Option 1::forminix_separator::Option 2::forminix_separator::Option 3",
                        "option_alignment" => "left",
                        "help_msg" => "",
                        "name" => "",
                        "container_class" => "",
                        "field_class" => "",
                    );
                    break;
                case "checkbox":
                    $fieldData = array(
                        "slug" => "checkbox",
                        "label" => "Checkbox Field",
                        "label_position" => "label_top_left",
                        "required" => "0",
                        "required_error_msg" => "This field is required",
                        "orientation" => "2",
                        "options_checkbox" => "Option 1::forminix_separator::Option 2::forminix_separator::Option 3",
                        "option_alignment" => "left",
                        "help_msg" => "",
                        "name" => "",
                        "container_class" => "",
                        "field_class" => "",
                    );
                    break;
                case "text_area":
                    $fieldData = array(
                        "slug" => "text_area",
                        "label" => "Text Area",
                        "label_position" => "label_top_left",
                        "required" => "0",
                        "required_error_msg" => "This field is required",
                        "textarea_rows" => "3",
                        "default_textarea_value" => "",
                        "max_length" => "",
                        "min_length" => "",
                        "help_msg" => "",
                        "name" => "",
                        "container_class" => "",
                        "field_class" => "",
                    );
                    break;
                case "file":
                    $fieldData = array(
                        "slug" => "file",
                        "label" => "Upload File",
                        "label_position" => "label_top_left",
                        "file_placeholder" => "Choose the required file",
                        "required" => "0",
                        "required_error_msg" => "This field is required",
                        "file_btn_txt" => "Choose File",
                        "file_btn_bg_color" => "#F6F8FA",
                        "file_btn_txt_color" => "#43454b",
                        "max_filesize" => "",
                        "allowed_file_ext" => "",
                        "file_to_media_library" => "0",
                        "allow_multiple_file" => "0",
                        "help_msg" => "",
                        "name" => "",
                        "container_class" => "",
                        "field_class" => "",
                    );
                    break;
                case "country":
                    $fieldData = array(
                        "slug" => "country",
                        "label" => "Choose Country",
                        "label_position" => "label_top_left",
                        "required" => "0",
                        "required_error_msg" => "This field is required",
                        "placeholder_dropdown" => "Select Country",
                        "options_dropdown" => "Afghanistan::forminix_separator::Albania::forminix_separator::Algeria::forminix_separator::Andorra::forminix_separator::Angola::forminix_separator::Antigua and Barbuda::forminix_separator::Argentina::forminix_separator::Armenia::forminix_separator::Australia::forminix_separator::Austria::forminix_separator::Azerbaijan::forminix_separator::Bahamas::forminix_separator::Bahrain::forminix_separator::Bangladesh::forminix_separator::Barbados::forminix_separator::Belarus::forminix_separator::Belgium::forminix_separator::Belize::forminix_separator::Benin::forminix_separator::Bhutan::forminix_separator::Bolivia::forminix_separator::Bosnia and Herzegovina::forminix_separator::Botswana::forminix_separator::Brazil::forminix_separator::Brunei::forminix_separator::Bulgaria::forminix_separator::Burkina Faso::forminix_separator::Burundi::forminix_separator::Côte d'Ivoire::forminix_separator::Cabo Verde::forminix_separator::Cambodia::forminix_separator::Cameroon::forminix_separator::Canada::forminix_separator::Central African Republic::forminix_separator::Chad::forminix_separator::Chile::forminix_separator::China::forminix_separator::Colombia::forminix_separator::Comoros::forminix_separator::Congo (Congo-Brazzaville)::forminix_separator::Costa Rica::forminix_separator::Croatia::forminix_separator::Cuba::forminix_separator::Cyprus::forminix_separator::Czechia (Czech Republic)::forminix_separator::Democratic Republic of the Congo::forminix_separator::Denmark::forminix_separator::Djibouti::forminix_separator::Dominica::forminix_separator::Dominican Republic::forminix_separator::Ecuador::forminix_separator::Egypt::forminix_separator::El Salvador::forminix_separator::Equatorial Guinea::forminix_separator::Eritrea::forminix_separator::Estonia::forminix_separator::Eswatini (fmr. Swaziland)::forminix_separator::Ethiopia::forminix_separator::Fiji::forminix_separator::Finland::forminix_separator::France::forminix_separator::Gabon::forminix_separator::Gambia::forminix_separator::Georgia::forminix_separator::Germany::forminix_separator::Ghana::forminix_separator::Greece::forminix_separator::Grenada::forminix_separator::Guatemala::forminix_separator::Guinea::forminix_separator::Guinea-Bissau::forminix_separator::Guyana::forminix_separator::Haiti::forminix_separator::Holy See::forminix_separator::Honduras::forminix_separator::Hungary::forminix_separator::Iceland::forminix_separator::India::forminix_separator::Indonesia::forminix_separator::Iran::forminix_separator::Iraq::forminix_separator::Ireland::forminix_separator::Israel::forminix_separator::Italy::forminix_separator::Jamaica::forminix_separator::Japan::forminix_separator::Jordan::forminix_separator::Kazakhstan::forminix_separator::Kenya::forminix_separator::Kiribati::forminix_separator::Kuwait::forminix_separator::Kyrgyzstan::forminix_separator::Laos::forminix_separator::Latvia::forminix_separator::Lebanon::forminix_separator::Lesotho::forminix_separator::Liberia::forminix_separator::Libya::forminix_separator::Liechtenstein::forminix_separator::Lithuania::forminix_separator::Luxembourg::forminix_separator::Madagascar::forminix_separator::Malawi::forminix_separator::Malaysia::forminix_separator::Maldives::forminix_separator::Mali::forminix_separator::Malta::forminix_separator::Marshall Islands::forminix_separator::Mauritania::forminix_separator::Mauritius::forminix_separator::Mexico::forminix_separator::Micronesia::forminix_separator::Moldova::forminix_separator::Monaco::forminix_separator::Mongolia::forminix_separator::Montenegro::forminix_separator::Morocco::forminix_separator::Mozambique::forminix_separator::Myanmar (formerly Burma)::forminix_separator::Namibia::forminix_separator::Nauru::forminix_separator::Nepal::forminix_separator::Netherlands::forminix_separator::New Zealand::forminix_separator::Nicaragua::forminix_separator::Niger::forminix_separator::Nigeria::forminix_separator::North Korea::forminix_separator::North Macedonia::forminix_separator::Norway::forminix_separator::Oman::forminix_separator::Pakistan::forminix_separator::Palau::forminix_separator::Palestine State::forminix_separator::Panama::forminix_separator::Papua New Guinea::forminix_separator::Paraguay::forminix_separator::Peru::forminix_separator::Philippines::forminix_separator::Poland::forminix_separator::Portugal::forminix_separator::Qatar::forminix_separator::Romania::forminix_separator::Russia::forminix_separator::Rwanda::forminix_separator::Saint Kitts and Nevis::forminix_separator::Saint Lucia::forminix_separator::Saint Vincent and the Grenadines::forminix_separator::Samoa::forminix_separator::San Marino::forminix_separator::Sao Tome and Principe::forminix_separator::Saudi Arabia::forminix_separator::Senegal::forminix_separator::Serbia::forminix_separator::Seychelles::forminix_separator::Sierra Leone::forminix_separator::Singapore::forminix_separator::Slovakia::forminix_separator::Slovenia::forminix_separator::Solomon Islands::forminix_separator::Somalia::forminix_separator::South Africa::forminix_separator::South Korea::forminix_separator::South Sudan::forminix_separator::Spain::forminix_separator::Sri Lanka::forminix_separator::Sudan::forminix_separator::Suriname::forminix_separator::Sweden::forminix_separator::Switzerland::forminix_separator::Syria::forminix_separator::Tajikistan::forminix_separator::Tanzania::forminix_separator::Thailand::forminix_separator::Timor-Leste::forminix_separator::Togo::forminix_separator::Tonga::forminix_separator::Trinidad and Tobago::forminix_separator::Tunisia::forminix_separator::Turkey::forminix_separator::Turkmenistan::forminix_separator::Tuvalu::forminix_separator::Uganda::forminix_separator::Ukraine::forminix_separator::United Arab Emirates::forminix_separator::United Kingdom::forminix_separator::United States of America::forminix_separator::Uruguay::forminix_separator::Uzbekistan::forminix_separator::Vanuatu::forminix_separator::Venezuela::forminix_separator::Vietnam::forminix_separator::Yemen::forminix_separator::Zambia::forminix_separator::Zimbabwe",
                        "help_msg" => "",
                        "name" => "",
                        "container_class" => "",
                        "field_class" => "",
                    );
                    break;
                case "custom_html":
                    $fieldData = array(
                        "slug" => "custom_html",
                        "html" => "<p>Some description about this section</p>",
                        "container_class" => "",
                    );
                    break;
                case "star_rating":
                    $fieldData = array(
                        "slug" => "star_rating",
                        "label" => "Star Rating",
                        "label_position" => "label_top_left",
                        "required" => "0",
                        "required_error_msg" => "This field is required",
                        "star_count" => "5",
                        "star_alignment" => "left",
                        "help_msg" => "",
                        "name" => "",
                        "container_class" => "",
                        "field_class" => "",
                    );
                    break;
                case "grecaptcha":
                    $fieldData = array(
                        "slug" => "grecaptcha",
                        "grecaptcha_site_key" => "",
                        "grecaptcha_secret_key" => "",
                        "grecaptcha_theme" => "light",
                        "grecaptcha_alignment" => "left",
                        "container_class" => "",
                    );
                    break;
                case "address":
                    $fieldData = array(
                        "slug" => "address",
                    );
                    break;
                case "rich_text":
                    $fieldData = array(
                        "slug" => "rich_text",
                        "label" => "Rich Text",
                        "label_position" => "label_top_left",
                        "required" => "0",
                        "required_error_msg" => "This field is required",
                        "rich_text_height" => "200",
                        "allowed_rich_text_plugins" => "undo::forminix_separator::redo::forminix_separator::formatselect::forminix_separator::bold::forminix_separator::italic::forminix_separator::forecolor::forminix_separator::removeformat::forminix_separator::bullist::forminix_separator::numlist::forminix_separator::blockquote::forminix_separator::alignleft::forminix_separator::aligncenter::forminix_separator::alignright::forminix_separator::alignjustify::forminix_separator::image::forminix_separator::link::forminix_separator::code",
                        "default_rich_text_value" => "",
                        "help_msg" => "",
                        "name" => "",
                        "container_class" => "",
                        "field_class" => "",
                    );
                    break;
                case "color_picker":
                    $fieldData = array(
                        "slug" => "color_picker",
                        "label" => "Pick Color",
                        "label_position" => "label_top_left",
                        "required" => "0",
                        "required_error_msg" => "This field is required",
                        "default_color_value" => "",
                        "help_msg" => "",
                        "name" => "",
                        "container_class" => "",
                        "field_class" => "",
                    );
                    break;
                case "shortcode":
                    $fieldData = array(
                        "slug" => "shortcode",
                        "shortcode" => "[your_shortcode_here]",
                        "container_class" => "",
                    );
                    break;
                case "single_range_slider":
                    $fieldData = array(
                        "slug" => "single_range_slider",
                        "label" => "Single Range Slider",
                        "label_position" => "label_top_left",
                        "required" => "0",
                        "required_error_msg" => "This field is required",
                        "default_single_range_value" => "50",
                        "min_range_value" => "0",
                        "max_range_value" => "100",
                        "help_msg" => "",
                        "name" => "",
                        "container_class" => "",
                        "field_class" => "",
                    );
                    break;
                case "dual_range_slider":
                    $fieldData = array(
                        "slug" => "dual_range_slider",
                        "label" => "Dual Range Slider",
                        "label_position" => "label_top_left",
                        "required" => "0",
                        "required_error_msg" => "This field is required",
                        "default_dual_range_min_value" => "50",
                        "default_dual_range_max_value" => "75",
                        "min_range_value" => "0",
                        "max_range_value" => "100",
                        "help_msg" => "",
                        "name" => "",
                        "container_class" => "",
                        "field_class" => "",
                    );
                    break;
                case "submit_btn":
                    $fieldData = array(
                        "slug" => "submit_btn",
                        "btn_text" => "Submit Form",
                        "btn_alignment" => "left",
                        "btn_size" => "medium",
                        "btn_bg_color" => "#252F3C",
                        "btn_txt_color" => "#FFFFFF",
                        "container_class" => "",
                        "field_class" => "",
                    );
                    break;
                case "2_column":
                    $fieldData = array(
                        "slug" => "2_column",
                    );
                    break;
                case "3_column":
                    $fieldData = array(
                        "slug" => "3_column",
                    );
                    break;
                case "4_column":
                    $fieldData = array(
                        "slug" => "4_column",
                    );
                    break;
            }

            return $fieldData;
        }


        public function generateBuilderFieldDataHTML($fieldData)
        {
            $html = "";
            foreach ($fieldData as $key=>$value){
                $html .= 'data-'.$key.'="'.$value.'" ';
            }
            return $html;
        }


        public function generateAllowedCharToPattern($allowed_chars_str)
        {
            $expression = "";
            $allowed_chars = explode ("::forminix_separator::", $allowed_chars_str);
            foreach ($allowed_chars as $char){
                if($char == "a"){
                    $expression .= "A-Za-z";
                }
                if($char == "u"){
                    $expression .= "\u007F-\uFFFF";
                }
                if($char == "s"){
                    $expression .= " ";
                }
                if($char == "."){
                    $expression .= ".";
                }
                if($char == "-"){
                    $expression .= "\-";
                }
                if($char == "d"){
                    $expression .= "0-9";
                }
            }
            if(strlen(trim($expression)) > 0){
                return trim($expression);
            }
            return "";
        }


        public function extractFormFieldsJSONtoArray($form_fields_obj)
        {
            $result = array();
            foreach ($form_fields_obj as $field){
                if($field->type == "field"){
                    $result[] = $field->field_data;
                }
                if($field->type == "column_container"){
                    $result = array_merge($result, $this->extractFormFieldsJSONtoArray($field->data));
                }
                if($field->type == "column"){
                    $result = array_merge($result, $this->extractFormFieldsJSONtoArray($field->data));
                }
            }
            return $result;
        }

        public function getBrowserInformation($u_agent)
        {
            $bname = 'Unknown Browser';
            $platform = 'Unknown OS';

            //First get the platform?
            if (preg_match('/linux/i', $u_agent)) {
                $platform = 'Linux';
            }
            elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
                $platform = 'Mac';
            }
            elseif (preg_match('/windows|win32/i', $u_agent)) {
                $platform = 'Windows';
            }

            // Next get the name of the useragent yes seperately and for good reason
            if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
            {
                $bname = 'Internet Explorer';
            }
            elseif(preg_match('/Firefox/i',$u_agent))
            {
                $bname = 'Mozilla Firefox';
            }
            elseif(preg_match('/Chrome/i',$u_agent))
            {
                $bname = 'Google Chrome';
            }
            elseif(preg_match('/Safari/i',$u_agent))
            {
                $bname = 'Apple Safari';
            }
            elseif(preg_match('/Opera/i',$u_agent))
            {
                $bname = 'Opera';
            }
            elseif(preg_match('/Netscape/i',$u_agent))
            {
                $bname = 'Netscape';
            }
            return array(
                'name'      => $bname,
                'platform'  => $platform
            );
        }



        public function getIPAddress() {
            if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = sanitize_text_field($_SERVER['HTTP_CLIENT_IP']);
            }
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = sanitize_text_field($_SERVER['HTTP_X_FORWARDED_FOR']);
            }
            else{
                $ip = sanitize_text_field($_SERVER['REMOTE_ADDR']);
            }
            return $ip;
        }


        public function forminix_esc_string($str){
            $str = str_replace('&', '::forminix_amp::', $str);
            $str = str_replace('<', '::forminix_left_arrow::', $str);
            $str = str_replace('>', '::forminix_right_arrow::', $str);
            $str = str_replace('"', '::forminix_dbl_quote::', $str);
            $str = str_replace("'", '::forminix_sin_quote::', $str);
            $str = str_replace("`", '::forminix_grave::', $str);
            $str = str_replace('\\', '::forminix_backslash::', $str);
            return $str;
        }

        public function forminix_unesc_string($str){
            $str = str_replace('::forminix_amp::', '&amp;', $str);
            $str = str_replace('::forminix_left_arrow::', '&lt;', $str);
            $str = str_replace('::forminix_right_arrow::', '&gt;', $str);
            $str = str_replace('::forminix_dbl_quote::', '&quot;', $str);
            $str = str_replace('::forminix_sin_quote::', "&#039;", $str);
            $str = str_replace('::forminix_grave::', "&#96;", $str);
            $str = str_replace('::forminix_backslash::', "&#92;", $str);
            return $str;
        }

        public function forminix_codify_string($str){
            $str = str_replace('&amp;', '&', $str);
            $str = str_replace('&lt;', '<', $str);
            $str = str_replace('&gt;', '>', $str);
            $str = str_replace('&quot;', '"', $str);
            $str = str_replace('&#039;', "'", $str);
            $str = str_replace('&#96;', "`", $str);
            $str = str_replace('&#92;', "\\", $str);
            return $str;
        }

        public function forminix_unesc_and_codify_string($str){
            $str = str_replace('::forminix_amp::', '&', $str);
            $str = str_replace('::forminix_left_arrow::', '<', $str);
            $str = str_replace('::forminix_right_arrow::', '>', $str);
            $str = str_replace('::forminix_dbl_quote::', '"', $str);
            $str = str_replace('::forminix_sin_quote::', "'", $str);
            $str = str_replace('::forminix_grave::', "`", $str);
            $str = str_replace('::forminix_backslash::', "\\", $str);
            return $str;
        }


        public function sanitize_global_requests($function, $array){
            return array_map( $function, $array);
        }

        public function sanitize_global_files($function, $array){
            $result = array();
            foreach ($array as $key => $val)
            {
                $result2 = array();
                foreach ($val as $key2 => $val2)
                {
                    $result2[$key2] = (is_array($val2) ? array_map( $function, $val2) : $function($val2));
                }
                $result[$key] = $result2;
            }
            return $result;
        }



        public function is_url_valid($url) {
            return filter_var($url, FILTER_VALIDATE_URL);
        }

        public function is_email_valid($email) {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }



        public function get_wp_user_roles(){
            global $wp_roles;
            $roles = array();
            foreach ($wp_roles->get_names() as $key => $val)
            {
                $roles[] = array(
                    "role_key" => $key,
                    "role_title" => $val
                );
            }
            return $roles;
        }

        public function shortCodeParser($msg, $cleaned_field_submissions, $email_extras)
        {
            preg_match_all('/\{(.*?)\}/', $msg, $matches);
            if(is_array($matches[1])){
                if(sizeof($matches[1]) > 0){
                    foreach($matches[1] as $shortcode){
                        // Replace Field Shortcode
                        if (strpos($shortcode, 'field_') === 0) {
                            $shortcode_field_id = str_replace("field_", "", $shortcode);
                            foreach ($cleaned_field_submissions as $field) {
                                $field = (object) $field;
                                if($field->field_id == $shortcode_field_id){
                                    $msg = str_replace("{".$shortcode."}", $field->field_value, $msg);
                                    break;
                                }
                            }
                        }
                        // Replace Predefined Shortcode
                        if($shortcode == "source_url"){
                            $msg = str_replace("{".$shortcode."}", $email_extras->user_page_url, $msg);
                        }
                        if($shortcode == "user_agent"){
                            $msg = str_replace("{".$shortcode."}", $email_extras->user_agent, $msg);
                        }
                        if($shortcode == "user_ip"){
                            $msg = str_replace("{".$shortcode."}", $email_extras->user_ip, $msg);
                        }
                    }
                }
            }
            return $msg;
        }

        public function is_form_allowed_to_show_by_schedule_and_restriction($form_id){
            $rejection_msg = "";
            $current_time_to_wp_timezone = get_date_from_gmt(gmdate("Y/m/d H:i:s", time()+date("Z")), "Y/m/d H:i:s");
            $enable_form_scheduling = $this->base_admin->settings->updateFormSettings($form_id, "enable_form_scheduling");
            $enable_form_scheduling = ($enable_form_scheduling == Null) ? "0" : $enable_form_scheduling;
            if($enable_form_scheduling == "1"){
                /* Check if the time started */
                $form_scheduling_start_datetime = $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_start_datetime");
                $form_scheduling_start_datetime = ($form_scheduling_start_datetime == Null) ? "" : $form_scheduling_start_datetime;
                $form_scheduling_inactive_msg = $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_inactive_msg");
                $form_scheduling_inactive_msg = ($form_scheduling_inactive_msg == Null) ? "Submission to this form has not started yet." : $form_scheduling_inactive_msg;
                if((bool)strtotime($form_scheduling_start_datetime)){
                    $db_time = gmdate("Y/m/d H:i:s", strtotime($form_scheduling_start_datetime));
                    if(strtotime($db_time) > strtotime($current_time_to_wp_timezone)){
                        $rejection_msg = $form_scheduling_inactive_msg."::avoid_empty_check::";
                    }
                }

                /* Check excluded weekday */
                $current_weekday = strtolower(date('D', strtotime($current_time_to_wp_timezone)));
                $form_scheduling_exclude_weekday_sat = $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_exclude_weekday_sat");
                $form_scheduling_exclude_weekday_sat = ($form_scheduling_exclude_weekday_sat == Null) ? "0" : $form_scheduling_exclude_weekday_sat;
                $form_scheduling_exclude_weekday_sun = $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_exclude_weekday_sun");
                $form_scheduling_exclude_weekday_sun = ($form_scheduling_exclude_weekday_sun == Null) ? "0" : $form_scheduling_exclude_weekday_sun;
                $form_scheduling_exclude_weekday_mon = $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_exclude_weekday_mon");
                $form_scheduling_exclude_weekday_mon = ($form_scheduling_exclude_weekday_mon == Null) ? "0" : $form_scheduling_exclude_weekday_mon;
                $form_scheduling_exclude_weekday_tue = $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_exclude_weekday_tue");
                $form_scheduling_exclude_weekday_tue = ($form_scheduling_exclude_weekday_tue == Null) ? "0" : $form_scheduling_exclude_weekday_tue;
                $form_scheduling_exclude_weekday_wed = $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_exclude_weekday_wed");
                $form_scheduling_exclude_weekday_wed = ($form_scheduling_exclude_weekday_wed == Null) ? "0" : $form_scheduling_exclude_weekday_wed;
                $form_scheduling_exclude_weekday_thu = $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_exclude_weekday_thu");
                $form_scheduling_exclude_weekday_thu = ($form_scheduling_exclude_weekday_thu == Null) ? "0" : $form_scheduling_exclude_weekday_thu;
                $form_scheduling_exclude_weekday_fri = $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_exclude_weekday_fri");
                $form_scheduling_exclude_weekday_fri = ($form_scheduling_exclude_weekday_fri == Null) ? "0" : $form_scheduling_exclude_weekday_fri;

                if($current_weekday == "sat" && $form_scheduling_exclude_weekday_sat == "1"){ $rejection_msg = $form_scheduling_inactive_msg."::avoid_empty_check::"; };
                if($current_weekday == "sun" && $form_scheduling_exclude_weekday_sun == "1"){ $rejection_msg = $form_scheduling_inactive_msg."::avoid_empty_check::"; };
                if($current_weekday == "mon" && $form_scheduling_exclude_weekday_mon == "1"){ $rejection_msg = $form_scheduling_inactive_msg."::avoid_empty_check::"; };
                if($current_weekday == "tue" && $form_scheduling_exclude_weekday_tue == "1"){ $rejection_msg = $form_scheduling_inactive_msg."::avoid_empty_check::"; };
                if($current_weekday == "wed" && $form_scheduling_exclude_weekday_wed == "1"){ $rejection_msg = $form_scheduling_inactive_msg."::avoid_empty_check::"; };
                if($current_weekday == "thu" && $form_scheduling_exclude_weekday_thu == "1"){ $rejection_msg = $form_scheduling_inactive_msg."::avoid_empty_check::"; };
                if($current_weekday == "fri" && $form_scheduling_exclude_weekday_fri == "1"){ $rejection_msg = $form_scheduling_inactive_msg."::avoid_empty_check::"; };


                /* Check if the time expired */
                $form_scheduling_end_datetime = $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_end_datetime");
                $form_scheduling_end_datetime = ($form_scheduling_end_datetime == Null) ? "" : $form_scheduling_end_datetime;
                $form_scheduling_expired_msg = $this->base_admin->settings->updateFormSettings($form_id, "form_scheduling_expired_msg");
                $form_scheduling_expired_msg = ($form_scheduling_expired_msg == Null) ? "Submission to this form has expired." : $form_scheduling_expired_msg;

                if((bool)strtotime($form_scheduling_end_datetime)){
                    $db_time = gmdate("Y/m/d H:i:s", strtotime($form_scheduling_end_datetime));
                    if(strtotime($db_time) < strtotime($current_time_to_wp_timezone)){
                        $rejection_msg = $form_scheduling_expired_msg."::avoid_empty_check::";
                    }
                }
            }


            $allow_logged_in_only = $this->base_admin->settings->updateFormSettings($form_id, "allow_logged_in_only");
            $allow_logged_in_only = ($allow_logged_in_only == Null) ? "0" : $allow_logged_in_only;
            if($allow_logged_in_only == "1"){
                if(!is_user_logged_in()){
                    $require_login_msg = $this->base_admin->settings->updateFormSettings($form_id, "require_login_msg");
                    $require_login_msg = ($require_login_msg == Null) ? "You must be logged in to submit the form." : $require_login_msg;
                    $rejection_msg = $require_login_msg."::avoid_empty_check::";
                }
            }


            $maximum_entry_limit_enabled = $this->base_admin->settings->updateFormSettings($form_id, "enable_maximum_entry_limit");
            $maximum_entry_limit_enabled = ($maximum_entry_limit_enabled == Null) ? "0" : $maximum_entry_limit_enabled;
            if($maximum_entry_limit_enabled == "1"){
                $is_maximum_entry_exceeded = False;
                $maximum_entry_amount = $this->base_admin->settings->updateFormSettings($form_id, "maximum_entry_amount");
                $maximum_entry_amount = ($maximum_entry_amount == Null) ? 0 : (int) $maximum_entry_amount;
                $maximum_entry_limitation_type = $this->base_admin->settings->updateFormSettings($form_id, "maximum_entry_limitation_type");
                $maximum_entry_limitation_type = ($maximum_entry_limitation_type == Null) ? "total_entries" : $maximum_entry_limitation_type;
                $maximum_entry_limitation_msg = $this->base_admin->settings->updateFormSettings($form_id, "maximum_entry_limitation_msg");
                $maximum_entry_limitation_msg = ($maximum_entry_limitation_msg == Null) ? "Maximum number of entries exceeded." : $maximum_entry_limitation_msg;

                $list_entries = $this->base_admin->settings->listAllEntries($form_id);

                if($maximum_entry_limitation_type == "total_entries"){
                    $total_entries = is_array($list_entries) ? sizeof($list_entries) : 0;
                    $is_maximum_entry_exceeded = $total_entries >= $maximum_entry_amount;
                }else if($maximum_entry_limitation_type == "per_day"){
                    $count_entries_per_day = 0;
                    $current_gmt_date = gmdate("Y/m/d", time()+date("Z"));
                    foreach ($list_entries as $single_entry){
                        if(date("Y/m/d", strtotime($this->base_admin->settings->updateEntrySettings($single_entry['entry_id'], "gmt_time"))) == $current_gmt_date){
                            $count_entries_per_day++;
                        }
                    }
                    $is_maximum_entry_exceeded = $count_entries_per_day >= $maximum_entry_amount;
                }else if($maximum_entry_limitation_type == "per_week"){
                    $count_entries_per_week = 0;
                    $current_gmt_week = gmdate("W/Y", time()+date("Z"));
                    foreach ($list_entries as $single_entry){
                        if(date("W/Y", strtotime($this->base_admin->settings->updateEntrySettings($single_entry['entry_id'], "gmt_time"))) == $current_gmt_week){
                            $count_entries_per_week++;
                        }
                    }
                    $is_maximum_entry_exceeded = $count_entries_per_week >= $maximum_entry_amount;
                }else if($maximum_entry_limitation_type == "per_month"){
                    $count_entries_per_month = 0;
                    $current_gmt_month = gmdate("Y/m", time()+date("Z"));
                    foreach ($list_entries as $single_entry){
                        if(date("Y/m", strtotime($this->base_admin->settings->updateEntrySettings($single_entry['entry_id'], "gmt_time"))) == $current_gmt_month){
                            $count_entries_per_month++;
                        }
                    }
                    $is_maximum_entry_exceeded = $count_entries_per_month >= $maximum_entry_amount;
                }else if($maximum_entry_limitation_type == "per_year"){
                    $count_entries_per_year = 0;
                    $current_gmt_year = gmdate("Y", time()+date("Z"));
                    foreach ($list_entries as $single_entry){
                        if(date("Y", strtotime($this->base_admin->settings->updateEntrySettings($single_entry['entry_id'], "gmt_time"))) == $current_gmt_year){
                            $count_entries_per_year++;
                        }
                    }
                    $is_maximum_entry_exceeded = $count_entries_per_year >= $maximum_entry_amount;
                }else if($maximum_entry_limitation_type == "per_user"){
                    $count_entries_per_user = 0;
                    $current_user_ip = $this->getIPAddress();
                    foreach ($list_entries as $single_entry){
                        if($current_user_ip == $this->base_admin->settings->updateEntrySettings($single_entry['entry_id'], "user_ip")){
                            $count_entries_per_user++;
                        }
                    }
                    $is_maximum_entry_exceeded = $count_entries_per_user >= $maximum_entry_amount;
                }
                if($is_maximum_entry_exceeded){
                    $rejection_msg = $maximum_entry_limitation_msg."::avoid_empty_check::";
                }
            }

            return $this->forminix_unesc_and_codify_string($rejection_msg);
        }


    }
}
