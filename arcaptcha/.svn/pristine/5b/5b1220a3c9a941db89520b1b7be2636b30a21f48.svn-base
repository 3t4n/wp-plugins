<?php

namespace ARCaptcha\ElementorPro;

use ElementorPro\Modules\Forms\Fields\Field_Base;

class ARCaptchaField extends Field_Base
{
    public function __construct()
    {
        parent::__construct();

        add_action('wp_print_footer_scripts', [$this, 'after_enqueue_scripts'], 9);

        add_action('elementor/preview/init', [$this, 'editor_preview_footer']);

        add_filter('elementor_pro/forms/render/item', [$this, 'filter_field_item']);
    }

    public function after_enqueue_scripts()
    {
?>
        <script>
            jQuery(document).on('elementor/popup/show', () => {
                // load arcaptcha widget on popup shown
                window.arcaptcha.loadWidget();
            });
            jQuery(document).ready(() => {

                jQuery(document).on('submit_success', function() {
                    // code
                    window.arcaptcha.reset();
                });
            });
        </script>
    <?php
    }

    public function filter_field_item($item)
    {
        if ($this->get_type() === $item['field_type']) {
            $item['field_label'] = false;
        }

        return $item;
    }

    public function editor_preview_footer()
    {
        add_action('wp_footer', [$this, 'content_template_script']);
    }

    public function content_template_script()
    {
    ?>
        <script>
            jQuery(document).ready(() => {

                elementor.hooks.addFilter(
                    'elementor_pro/forms/content_template/item',
                    function(item) {
                        if ('arcaptcha' === item.field_type) {
                            item.field_label = false;
                        }

                        return item;
                    }
                );
                elementor.hooks.addFilter(
                    'elementor_pro/forms/content_template/field/<?php echo $this->get_type(); ?>',
                    function(inputField, item, i) {
                        const fieldId = `form_field_${i}`;
                        const fieldClass = `elementor-alert elementor-alert-info`;

                        const message = "<?php echo  __('To use ARCaptcha, you need to add the Site and Secret keys.', 'arcaptcha-plugin'); ?>"

                        return `<div class="elementor-field"><div id="${fieldId}" class="${fieldClass}">${message}</div></div>`;
                    }, 10, 3
                );

            });
        </script>
<?php
    }

    public function get_type()
    {
        return 'arcaptcha';
    }

    public function get_name()
    {
        return __('ARCaptcha', 'arcaptcha-plugin');
    }

    public function render($item, $item_index, $form)
    {
        $arcaptcha_html = '<div class="elementor-field" id="form-field-' . $item['custom_id'] . '">';

        $arcaptcha_api_key = get_option('arcaptcha_api_key');
        $arcaptcha_theme = get_option('arcaptcha_theme');
        $arcaptcha_language = get_option("arcaptcha_language");
        $arcaptcha_color = get_option("arcaptcha_color");

        $arcaptcha_widget = '<div class="arcaptcha" style="margin-bottom: 16px;"' .
            '" data-site-key="' . $arcaptcha_api_key .
            '" data-lang="' . $arcaptcha_language  .
            '" data-color="' . $arcaptcha_color .
            '" data-theme="' . $arcaptcha_theme . '"></div>';

        $arcaptcha_html .=
            '<div class="elementor-arcaptcha">' .
            $arcaptcha_widget .
            '</div>';

        $arcaptcha_html .= '</div>';

        echo $arcaptcha_html;
    }

    public function validation($field, $record, $ajax_handler)
    {
        $fields = $record->get_field(['type' => $this->get_type()]);

        if (empty($fields)) {
            return;
        }

        $field = current($fields);

        $arcaptcha_token = $_POST['arcaptcha-token'];

        $result = arcaptcha_request_verify($arcaptcha_token);

        if ('success' !== $result) {
            $ajax_handler->add_error($field['id'], __('Please complete the captcha.', 'arcaptcha-plugin'));

            return;
        }

        // If success - remove the field form list (don't send it in emails etc.).
        $record->remove_field($field['id']);
    }
}
