<?php

/**
 * @package CF7SubmitAnimations
 */

namespace Cf7subanimsinc\Api\Callbacks;

use Cf7subanimsinc\Base\BaseController;

final class AdminCallbacks extends BaseController
{
    public function adminDashboard()
    {
        return require_once("$this->plugin_path/templates/admin.php");
    }

    public function adminSectionManager()
    {
        echo "Select your options";
    }
    public function inputSanitize($input)
    {
        var_dump($input);
        if (isset($input['enable'])) {
            $input['enable'] = 'true';
        } else {
            $input['enable'] = 'false';
        }
        return $input;
    }

    public function checkboxField($args)
    {
        $name = $args['label_for'];
        $option_name = $args['option_name'];
        $data = get_option($option_name);
        $value = isset($data[$name]) ? $data[$name] : 'false';
        $checked = $value == 'true' ? 'checked' : null;
        echo '<input 
            type="checkbox" 
            name="' . $option_name . '[' . $name . ']"
            id="' . $name . '"
            value="' . $value . '"' .
            $checked .
            '>';
    }

    public function inputField($args)
    {
        $name = $args['label_for'];
        $option_name = $args['option_name'];
        $data = get_option($option_name);
        $value = isset($data[$name]) ? esc_attr($data[$name]) : null;
        $placeholder = $args['placeholder'];
        echo '<input 
            type="number" 
            name="' . $option_name . '[' . $name . ']"
            id="' . $name . '"
            value="' . $value . '"
            placeholder="' . $placeholder . '"
            >';
    }
    public function colorField($args)
    {
        $name = $args['label_for'];
        $option_name = $args['option_name'];
        $data = get_option($option_name);
        $selected = isset($data[$name]) ? esc_attr($data[$name]) : null;
        echo '<input 
            type="color" 
            name="' . $option_name . '[' . $name . ']"
            id="' . $name . '"
            value="' . $selected . '"
            >';
    }
    public function dropdownField($args)
    {
        $options = '';
        $name = $args['label_for'];
        $option_name = $args['option_name'];
        $data = get_option($option_name);
        $values = $args['options'];
        $selected = isset($data[$name]) ? esc_attr($data[$name]) : null;
        foreach ($values as $key => $value) {
            $options = $options . '<option name="' . $key . '" value="' . $key . '"' . ($selected == $key ? 'selected' : null) . '>' . $value . '</option>';
        }

        echo '
        <select
        name="' . $option_name . '[' . $name . ']"
        id="' . $name . '">'
            . $options .
            '</select>';
    }
}
