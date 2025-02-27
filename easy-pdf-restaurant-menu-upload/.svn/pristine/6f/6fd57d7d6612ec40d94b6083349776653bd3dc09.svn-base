<?php

class clean_input_validation_nsc_eprm
{
    public function sanitize_user_input_nsc_eprm($input)
    {
        if (is_array($input)) {
            $sanitizedArray = array();
            foreach ($input as $key => $input_field) {
                $sanitizedkey = sanitize_text_field($key);
                $sanitizedArray[$sanitizedkey] = sanitize_text_field($input_field);
            }
            return $sanitizedArray;
        }
        return sanitize_text_field($input);
    }

    public function check_if_json_is_valid_nsc_eprm($input)
    {
        $check = json_encode(json_decode($input));
        if (empty($check) || $check == "null") {
            return false;
        }
        return true;
    }

    public function unixtimestamp_to_date_nsc_eprm($unix_timestamp)
    {
        return date_i18n(get_option('date_format') . " " . get_option('time_format'), $unix_timestamp + get_option('gmt_offset') * 3600);
    }

    public function gmt_timestamp_to_date_nsc_eprm($gmt_timestamp)
    {
        return date_i18n(get_option('date_format') . " " . get_option('time_format'), strtotime($gmt_timestamp) + get_option('gmt_offset') * 3600);
    }

    public function validate_upload_nsc_eprm($uploadedFile, $allowedExt)
    {
        $uploadedFileExt = pathinfo(sanitize_file_name($uploadedFile["name"]), PATHINFO_EXTENSION);
        $passedFileChecks = true;
        $filename = $uploadedFile['tmp_name'];
        //check extension
        if (!array_key_exists($uploadedFileExt, $allowedExt)) {
            $passedFileChecks = false;
        }

        //check mime type if extension check is passed.
        if ($passedFileChecks === true) {
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            if (!in_array($finfo->file($filename), $allowedExt)) {
                $passedFileChecks = false;
            }
        }
        return $passedFileChecks;
    }

    public function text_only_nsc_eprm($input)
    {
        $forbidden = "/[^\w\-\.\ _]/";
        $forbidden_chars = preg_match_all($forbidden, $input);

        if (empty($forbidden_chars) === false) {
            return null;
        }

        return $input;
    }
}
