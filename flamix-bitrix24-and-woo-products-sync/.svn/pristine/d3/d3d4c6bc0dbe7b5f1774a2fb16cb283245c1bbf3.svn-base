<?php

namespace FlamixLocal\Exchange;

class Helpers
{
    /**
     * Is plugin active.
     *
     * Some people download plugin for CF7, but don't install CF7
     *
     * @param string $plugin
     * @return bool
     */
    public static function isPluginActive(string $plugin)
    {
        return in_array($plugin, (array)get_option('active_plugins', []));
    }

    /**
     * When saving email - check.
     *
     * @param string $option
     * @return bool|string
     */
    public static function isEmail(string $option)
    {
        if (filter_var($option, FILTER_VALIDATE_EMAIL))
            return $option;

        return false;
    }

    /**
     * When saving email - check.
     *
     * @param $option
     * @return bool|string
     */
    public static function parseDomain($option)
    {
        $tmp = parse_url($option);
        if (!empty($tmp['host']))
            return $tmp['host'];

        return $option;
    }

    public static function markup_input(string $id, array $params)
    {
        ?>
        <tr class="form-field">
            <th>
                <label for="<?php echo $id; ?>"><?php echo esc_html($params['label'] ?? $id); ?></label>
            </th>
            <td>
                <input type="text"
                       name="<?php echo $id; ?>"
                       id="<?php echo $id; ?>"
                       value="<?php echo esc_html($params['value'] ?? ''); ?>"
                       placeholder="<?php echo esc_html($params['placeholder'] ?? ''); ?>"
                />
                <?php if (isset($params['description'])): ?>
                    <p class="description"><?php echo $params['description']; // Here we can put HTML tags ?></p>
                <?php endif; ?>
            </td>
        </tr>
        <?php
    }

    public static function markup_select(string $id, array $params)
    {
        ?>
        <tr class="form-field">
            <th>
                <label for="<?php echo $id; ?>"><?php echo esc_html($params['label'] ?? $id); ?></label>
            </th>
            <td>
                <select id="<?php echo $id; ?>" name="<?php echo $id; ?>">
                    <?php foreach ($params['options'] ?? [] as $option_key => $option_value): ?>
                        <option value="<?php echo esc_html($option_key); ?>" <?php echo ($option_key === ($params['value'] ?? '')) ? 'selected=selected' : '' ?>><?php echo esc_html($option_value); ?></option>
                    <?php endforeach; ?>
                </select>
                <?php if (isset($params['description'])): ?>
                    <p class="description"><?php echo $params['description']; // Here we can put HTML tags ?></p>
                <?php endif; ?>
            </td>
        </tr>
        <?php
    }

    /**
     * Show admin msg (only when plugin active!)
     *
     * @param string $msg
     * @param $type
     * @return string
     */
    public static function adminMessage(string $msg, $type = 'updated'): string
    {
        return '<div class="' . esc_html($type) . ' notice"><p>' . $msg . ' </p></div>';
    }

    /**
     * @param string $name Checking param name, ex: PHP Version
     * @param callable|bool $callback
     * @param array $options What write when pass (first option) and failed (second option)
     * @return string
     */
    public static function checkParams(string $name, $callback, array $options = [])
    {
        $result = is_bool($callback) ? $callback : (bool)$callback();

        if ($result)
            $result = '<span style="color: #46b450;">' . ($options['0'] ?? 'Enable') . '</span>';
        else
            $result = '<span style="color: #dc3232;">' . ($options['1'] ?? 'Disabled') . '</span>';

        return $name . ': ' . $result;
    }
}