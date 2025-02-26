<?php

class P18T_Sass_SettingsValidator
{
    /**
     * Validate css file input
     *
     * @param string $input
     * @return string
     */
    public function validateScssFile($input)
    {
        $input = sanitize_file_name($input);
        if (0 == strlen($input)) {
            add_settings_error(
                'p18t_sass_scss_file',
                'p18t_sass_scss_file_error',
                'Scss / Sass Filename is mandatory',
                'error'
            );
        }
        $cssPath = get_stylesheet_directory() . '/' . $input;
        if (false === is_writable($cssPath)) {
            add_settings_error(
                'p18t_sass_scss_file',
                'p18t_sass_scss_file_error',
                'Scss / Sass File <code>' . $cssPath . '</code> is not readable. Please check permissions',
                'error');
        }

        return $input;
    }

    /**
     * Validate css file input
     *
     * @param string $input
     * @return string
     */
    public function validateCssFile($input)
    {
        $input = sanitize_file_name($input);
        $cssPath = get_stylesheet_directory() . '/' . $input;

        if (false === is_writable($cssPath)) {
            $message = 'CSS File <code>' . $cssPath . '</code> is not writable. Please check permissions';
            add_settings_error('p18t_sass_css_file', 'p18t_sass_css_file_error', $message, 'error');
        }
        return $input;
    }

    /**
     * Validate style
     *
     * @param string $input
     * @return string
     */
    public function validateStyle($input) {
        if (!in_array($input, array('nested', 'expanded', 'compact', 'compressed'))) {
            $input = 'compressed';
        }
        return $input;
    }

    /**
     * Validate syntax
     *
     * @param string $input
     * @return string
     */
    public function validateSyntax($input) {
        if (!in_array($input, array('sass', 'scss'))) {
            $input = 'scss';
        }
        return $input;
    }

    /**
     * Validate depends
     *
     * @param string $input
     * @return string
     */
    public function validateDepends($input)
    {
        $input = sanitize_text_field($input);
        return $input;
    }
}