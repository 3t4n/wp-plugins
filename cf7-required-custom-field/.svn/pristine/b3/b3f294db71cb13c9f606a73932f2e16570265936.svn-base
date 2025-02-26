<?php

/**
 * Class ECRMT_SetupWizard
 */
class ECRMT_SetupWizard
{


    /**
     * ECRMT_SetupWizard constructor.
     */
    public function __construct()
    {
        add_filter('wpcf7_editor_panels', [$this, 'ecrmtAddEditorPanelsError']);
        add_action('wpcf7_save_contact_form', [$this, 'ecrmtSaveContactForm']);
        add_action('plugins_loaded', [$this, 'ecrmtLoadPluginTextdomain']);
    }


    /**
     * Loads a string to translate the plugin from the .mo file
     *
     */
    public function ecrmtLoadPluginTextdomain()
    {

        load_plugin_textdomain('cf7-required-custom-field', false, '/cf7-required-custom-field/languages');

    }


    /**
     * @param $value
     * @return bool
     */
    static public function ecrmtOldVersionIsRequired($value)
    {

        return ('*' == substr($value['type'], -1));
    }


    /**
     * Adds the plugin settings tab to the Contact Form 7
     *
     * @param array $panels
     * @return array $panels
     *
     */
    public function ecrmtAddEditorPanelsError($panels)
    {

        $panels['error_custom_required'] = [
            'title' => __('Custom required field message', 'cf7-required-custom-field'),
            'callback' => [self::class, 'ecrmtSettingsError']
        ];

        return $panels;

    }


    /**
     * @param $cf7
     */
    static function ecrmtSettingsError($cf7)
    {

        $wpcf7_version = get_option('wpcf7')['version'];
        $post_id = sanitize_text_field($_GET['post']);

        $tags = (4.6 <= (int)$wpcf7_version) ? $cf7->scan_form_tags() : $cf7->form_scan_shortcode();

        foreach ($tags as $key => $value) {

            if (4.6 <= (int)$wpcf7_version) {

                if (!$value->is_required()) {
                    continue;
                }

            } else {

                if (!self:: ecrmtOldVersionIsRequired($value)) {
                    continue;
                }

            }

            $val_error = get_post_meta($post_id, ECRMT_REQUIRED_CUSTOM_FIELD_SLUG, true);
            $res_error_message = json_decode($val_error, 1);
            ?>
            <p>
                <label for="<?= $value['name']; ?>">
                    <?= __('Field name:', 'cf7-required-custom-field') . ' <b>' . $value['name'] . '</b>'; ?> |
                    <?= __('Field type:', 'cf7-required-custom-field') . ' ' . $value['type']; ?><br/>
                </label>
                <?= __('Error message:', 'ecrmt'); ?>
                <input type="text" name="<?= ECRMT_REQUIRED_CUSTOM_FIELD_SLUG . '[' . $value['name'] . ']'; ?>"
                       id="<?= $value['name']; ?>"
                       value="<?= (isset($res_error_message[$value['name']])) ? trim($res_error_message[$value['name']]) : ''; ?>"/><br/>
            </p>
            <?php
        }


    }


    /**
     * save data
     * @return bool
     */
    public function ecrmtSaveContactForm()
    {
        $post_id = sanitize_text_field($_GET['post']);
        if (!current_user_can('edit_post', $post_id))
            return false;

        if ($_POST[ECRMT_REQUIRED_CUSTOM_FIELD_SLUG] && $post_id) {

            update_post_meta($post_id, ECRMT_REQUIRED_CUSTOM_FIELD_SLUG, json_encode($_POST[ECRMT_REQUIRED_CUSTOM_FIELD_SLUG], JSON_UNESCAPED_UNICODE));

        }

    }

}
