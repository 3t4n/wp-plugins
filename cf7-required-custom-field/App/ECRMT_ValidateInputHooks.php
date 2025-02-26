<?php

/**
 * Class ECRMT_ValidateInputHooks
 */
class ECRMT_ValidateInputHooks
{


    /**
     * ECRMT_ValidateInputHooks constructor.
     */
    public function __construct()
    {

        add_filter('wpcf7_validate_text*', [$this, 'ecrmtValidationText'], 1, 2);
        add_filter('wpcf7_validate_email*', [$this, 'ecrmtValidationEmail'], 1, 2);
        add_filter('wpcf7_validate_url*', [$this, 'ecrmtValidationUrl'], 1, 2);
        add_filter('wpcf7_validate_tel*', [$this, 'ecrmtValidationTel'], 1, 2);
        add_filter('wpcf7_validate_number*', [$this, 'ecrmtValidationNumber'], 1, 2);
        add_filter('wpcf7_validate_select*', [$this, 'ecrmtValidationSelect'], 1, 2);
        add_filter('wpcf7_validate_checkbox*', [$this, 'ecrmtValidationCheckbox'], 1, 2);
        add_filter('wpcf7_validate_file*', [$this, 'ecrmtValidationFile'], 1, 2);
        add_filter('wpcf7_validate_textarea*', [$this, 'ecrmtValidationTextarea'], 1, 2);
        add_filter('wpcf7_validate_date*', [$this, 'ecrmtValidationDate'], 1, 2);

    }


    /**
     * @param $result
     * @param $tag
     * @return mixed
     */
    public function ecrmtValidationText($result, $tag)
    {
        $wpcf7_contact_form = WPCF7_ContactForm::get_current();
        $name = $tag['name'];

        $res_error_message = self::ecrmtGetErrorMessage($wpcf7_contact_form->id());

        if ((isset($res_error_message[$name]) && '' != $res_error_message[$name] && !empty(trim($res_error_message[$name]))) && empty($_POST[$name])) {
            $result->invalidate($tag, $res_error_message[$name]);

        }
        return $result;

    }


    /**
     * @param $result
     * @param $tag
     * @return mixed
     */
    public function ecrmtValidationEmail($result, $tag)
    {
        $wpcf7_contact_form = WPCF7_ContactForm::get_current();
        $name = $tag['name'];

        $res_error_message = self::ecrmtGetErrorMessage($wpcf7_contact_form->id());


        $value = (empty($_POST[$name]));

        if ((isset($res_error_message[$name]) && '' != $res_error_message[$name] && !empty(trim($res_error_message[$name]))) && empty($_POST[$name])) {

            $result->invalidate($tag, $res_error_message[$name]);

        } elseif (1 != $value && wpcf7_is_email($value) && (isset($res_error_message[$name]))) {

            $result->invalidate($tag, wpcf7_get_message('invalid_email'));

        }

        return $result;

    }


    /**
     * @param $result
     * @param $tag
     * @return mixed
     */
    public function ecrmtValidationUrl($result, $tag)
    {
        $wpcf7_contact_form = WPCF7_ContactForm::get_current();
        $name = $tag['name'];

        $res_error_message = self::ecrmtGetErrorMessage($wpcf7_contact_form->id());

        if ((isset($res_error_message[$name]) && '' != $res_error_message[$name] && !empty(trim($res_error_message[$name]))) && empty($_POST[$name])) {
            $result->invalidate($tag, $res_error_message[$name]);

        }
        return $result;

    }


    /**
     * @param $result
     * @param $tag
     * @return mixed
     */
    public function ecrmtValidationTel($result, $tag)
    {
        $wpcf7_contact_form = WPCF7_ContactForm::get_current();
        $name = $tag['name'];

        $res_error_message = self::ecrmtGetErrorMessage($wpcf7_contact_form->id());

        if ((isset($res_error_message[$name]) && '' != $res_error_message[$name] && !empty(trim($res_error_message[$name]))) && empty($_POST[$name])) {
            $result->invalidate($tag, $res_error_message[$name]);

        }
        return $result;

    }


    /**
     * @param $result
     * @param $tag
     * @return mixed
     */
    public function ecrmtValidationNumber($result, $tag)
    {
        $wpcf7_contact_form = WPCF7_ContactForm::get_current();
        $name = $tag['name'];

        $res_error_message = self::ecrmtGetErrorMessage($wpcf7_contact_form->id());

        if ((isset($res_error_message[$name]) && '' != $res_error_message[$name] && !empty(trim($res_error_message[$name]))) && empty($_POST[$name])) {
            $result->invalidate($tag, $res_error_message[$name]);

        }
        return $result;

    }


    /**
     * @param $result
     * @param $tag
     * @return mixed
     */
    public function ecrmtValidationSelect($result, $tag)
    {
        $wpcf7_contact_form = WPCF7_ContactForm::get_current();
        $name = $tag['name'];

        $res_error_message = self::ecrmtGetErrorMessage($wpcf7_contact_form->id());

        if ((isset($res_error_message[$name]) && '' != $res_error_message[$name] && !empty(trim($res_error_message[$name]))) && empty($_POST[$name])) {
            $result->invalidate($tag, $res_error_message[$name]);

        }
        return $result;

    }


    /**
     * @param $result
     * @param $tag
     * @return mixed
     */
    public function ecrmtValidationCheckbox($result, $tag)
    {
        $wpcf7_contact_form = WPCF7_ContactForm::get_current();
        $name = $tag['name'];

        $res_error_message = self::ecrmtGetErrorMessage($wpcf7_contact_form->id());

        if ((isset($res_error_message[$name]) && '' != $res_error_message[$name] && !empty(trim($res_error_message[$name]))) && empty($_POST[$name])) {
            $result->invalidate($tag, $res_error_message[$name]);

        }
        return $result;

    }


    /**
     * @param $result
     * @param $tag
     * @return mixed
     */
    public function ecrmtValidationFile($result, $tag)
    {
        $wpcf7_contact_form = WPCF7_ContactForm::get_current();
        $name = $tag['name'];

        $res_error_message = self::ecrmtGetErrorMessage($wpcf7_contact_form->id());

        if ((isset($res_error_message[$name]) && '' != $res_error_message[$name] && !empty(trim($res_error_message[$name]))) && empty($_POST[$name])) {
            $result->invalidate($tag, $res_error_message[$name]);

        }
        return $result;

    }


    /**
     * @param $result
     * @param $tag
     * @return mixed
     */
    public function ecrmtValidationTextarea($result, $tag)
    {
        $wpcf7_contact_form = WPCF7_ContactForm::get_current();
        $name = $tag['name'];

        $res_error_message = self::ecrmtGetErrorMessage($wpcf7_contact_form->id());

        if ((isset($res_error_message[$name]) && '' != $res_error_message[$name] && !empty(trim($res_error_message[$name]))) && empty($_POST[$name])) {
            $result->invalidate($tag, $res_error_message[$name]);

        }
        return $result;

    }


    /**
     * @param $result
     * @param $tag
     * @return mixed
     */
    public function ecrmtValidationDate($result, $tag)
    {

        $wpcf7_contact_form = WPCF7_ContactForm::get_current();
        $name = $tag['name'];

        $res_error_message = self::ecrmtGetErrorMessage($wpcf7_contact_form->id());

        if ((isset($res_error_message[$name]) && '' != $res_error_message[$name] && !empty(trim($res_error_message[$name]))) && empty($_POST[$name])) {
            $result->invalidate($tag, $res_error_message[$name]);

        }

        return $result;

    }


    /**
     * @param $form_id
     * @return array|mixed|object
     */
    protected static function ecrmtGetErrorMessage($form_id)
    {

        $val_error = get_post_meta($form_id, ECRMT_REQUIRED_CUSTOM_FIELD_SLUG, true);
        return json_decode($val_error, 1);

    }

}