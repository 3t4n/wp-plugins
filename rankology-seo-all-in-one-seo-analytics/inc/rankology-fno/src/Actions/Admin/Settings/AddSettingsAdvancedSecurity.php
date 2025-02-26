<?php

namespace RankologyFno\Actions\Admin\Settings;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Core\Hooks\ExecuteHooksBackend;

class AddSettingsAdvancedSecurity implements ExecuteHooksBackend {
    /**
     * 
     *
     * @return void
     */
    public function hooks() {
        // To be used in case of customer feedback on schema rights
        // add_action('rankology_add_settings_field_advanced_security', [$this, 'addSettings']);
    }

    /**
     * 
     *
     * @param string $keySettings
     *
     * @return void
     */
    public function render($keySettings) {
        $options = rankology_get_service('AdvancedOption')->getOption();

        global $wp_roles;

        if ( ! isset($wp_roles)) {
            $wp_roles = new WP_Roles();
        }

        foreach ($wp_roles->get_names() as $key => $value) {
            if ('administrator' === $key) {
                continue;
            }
            $uniqueKey   = sprintf('%s_%s', $keySettings, $key);
            $nameKey     = \sprintf('%s_%s', 'rankology_advanced_security_metaboxe', $keySettings);
            $dataOptions = isset($options[$nameKey]) ? $options[$nameKey] : []; ?>
            <div>
                <input
                    type="checkbox"
                    id="rankology_advanced_security_metaboxe_role_pages_<?php echo $uniqueKey; ?>"
                    value="1"
                    name="rankology_advanced_option_name[<?php echo $nameKey; ?>][<?php echo $key; ?>]"
                    <?php if (isset($dataOptions[$key])) {
                checked($dataOptions[$key], '1');
            } ?>
                />
                <label for="rankology_advanced_security_metaboxe_role_pages_<?php echo $uniqueKey; ?>">
                    <strong><?php echo $value; ?></strong> (<em><?php echo translate_user_role($value,  'default'); ?></em>)
                </label>
            </div>
            <?php
        }
    }

    /**
     * 
     *
     * @param string $name
     * @param array  $params
     *
     * @return void
     */
    public function __call($name, $params) {
        $functionWithKey = explode('-', $name);
        if ( ! isset($functionWithKey[1])) {
            return;
        }

        $this->render($functionWithKey[1]);
    }

    /**
     * 
     *
     * @return void
     */
    public function addSettings() {
        $postTypes = [
            'rankology_bot'     => __('Broken Link', 'wp-rankology-fno'),
            'rankology_404'     => '404',
            'rankology_schemas' => __('Schemas', 'wp-rankology'),
        ];
        foreach ($postTypes as $key => $value) {
            add_settings_field(
                'rankology_advanced_security_metaboxe_' . $key,
                $value,
                [$this, sprintf('render-%s', $key)],
                'rankology-settings-admin-advanced-security',
                'rankology_setting_section_advanced_security'
            );
        }
    }
}
