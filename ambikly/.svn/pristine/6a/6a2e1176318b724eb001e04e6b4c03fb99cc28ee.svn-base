<?php

namespace Ambikly\Admin;

class UIComponents
{
    public static function metabox($content_callback, $title = '', $id = '', $extra_classes = '')
    {
        $class_attr = "ambikly-admin-metabox {$extra_classes}";

        ?>
        <div class="<?php echo esc_attr($class_attr); ?>" <?php echo $id ? 'id="' . esc_attr($id) . '"' : '' ?>>
            <div class="ambikly-admin-metabox-inner">
                <?php if ($title) { ?>
                    <div class="ambikly-admin-metabox-header">
                        <h2><?php echo esc_html($title); ?></h2>
                    </div>
                <?php } ?>
                <div class="ambikly-admin-metabox-content">
                    <?php
                    if (is_callable($content_callback)) {
                        call_user_func($content_callback, $title, $id, $extra_classes);
                    } else {
                        echo 'Content not found';
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }

    public static function breadcrumb($items = [], $show_save_button = true)
    {

        $breadcrumb_items = [
            ['title' => esc_html__('Ambikly', 'ambikly'), 'url' => admin_url('admin.php?page=ambikly')]
        ];

        // Merge with the provided items
        $items = array_merge($breadcrumb_items, $items);

        $action = isset($_GET['action']) ? sanitize_text_field($_GET['action']) : '';
        $id = isset($_GET['id']) ? absint($_GET['id']) : 0;

        if ($id > 0 && $action == "edit") {
            $saving_text = esc_html__('Updating...', 'ambikly');
            $save_text = esc_html__('Update Changes', 'ambikly');
        } else {

            $saving_text = esc_html__('Saving...', 'ambikly');
            $save_text = esc_html__('Save Changes', 'ambikly');
        } ?>
        <div class="ambikly-breadcrumb-wrap">
            <nav class="ambikly-breadcrumb">
                <ul class="breadcrumb-left">
                    <?php foreach ($items as $index => $item) : ?>
                        <li>
                            <?php if (!empty($item['url'])) : ?>
                                <a href="<?php echo esc_url($item['url']); ?>"><?php echo esc_html($item['title']); ?></a>
                            <?php else : ?>
                                <span><?php echo esc_html($item['title']); ?></span>
                            <?php endif; ?>
                        </li>
                        <?php if ($index < count($items) - 1) : // Add separator if not the last item ?>
                            <li class="breadcrumb-separator">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
                <?php if ($show_save_button) : ?>
                    <div class="breadcrumb-right">
                        <button type="submit" class="save-trigger-button"
                                data-text="<?php echo esc_attr($save_text); ?>"
                                data-saving-text="<?php echo esc_attr($saving_text) ?>">
                            <?php echo esc_html($save_text); ?>
                        </button>
                    </div>
                <?php endif; ?>
            </nav>
        </div>
        <?php
    }

    public static function field($setting, $field_value = '__EMPTY__')
    {
        $name = $setting['name'] ?? '';
        $type = $setting['type'] ?? '';
        $placeholder = $setting['placeholder'] ?? '';
        $label = $setting['label'] ?? '';
        $value = $setting['value'] ?? '';
        $value = $field_value == '__EMPTY__' ? $value : $field_value;
        $description = $setting['desc'] ?? '';
        $attributes = $setting['attributes'] ?? [];
        $is_required = in_array('required', $setting['validation'] ?? []);
        if ($is_required) {
            $attributes['required'] = 'required';
        }
        $attribute_text = '';

        $wrapper_class = $setting['wrapper_class'] ?? '';

        $is_clear_div = str_contains($wrapper_class, 'clear-div');

        $wrapper_class = str_replace('clear-div', '', $wrapper_class);

        foreach ($attributes as $key => $attr) {
            $attribute_text .= sprintf(' %s="%s"', esc_attr($key), esc_attr($attr));
        }
        ?>
        <div class="form-group <?php echo esc_attr('type-' . $type . ' ' . $wrapper_class); ?>">
            <?php
            if (!empty($label) && $type !== 'checkbox') : ?>
                <label for="<?php echo esc_attr($name); ?>" class="title">
                    <?php echo esc_html($label) . ($is_required ? '*' : ''); ?>
                </label>
            <?php
            endif;
            switch ($type) {
                case 'button':
                    $value = $setting['value'] ?? $setting['value'];
                    echo sprintf(
                        '<button type="%s" class="button button-primary" placeholder="%s" %s >%s</button>',
                        esc_attr($type),
                        esc_attr($placeholder),
                        $attribute_text,
                        esc_attr($value),
                    );
                    break;
                case 'text':
                case 'number':
                    echo sprintf(
                        '<input type="%s" name="%s" value="%s" placeholder="%s" %s />',
                        esc_attr($type),
                        esc_attr($name),
                        esc_attr($value),
                        esc_attr($placeholder),
                        $attribute_text
                    );
                    break;

                case 'textarea':
                    echo sprintf(
                        '<textarea name="%s" placeholder="%s" %s>%s</textarea>',
                        esc_attr($name),
                        esc_attr($placeholder),
                        $attribute_text,
                        esc_html($value)
                    );
                    break;

                case 'image':
                    $image_url = wp_get_attachment_url($value);
                    $image_preview = $image_url ? '<img src="' . esc_url($image_url) . '" style="max-width: 100%; height: auto;" />' : '';

                    echo sprintf(
                        '<div class="media-upload-box">
                            <button type="button" class="ambikly-image-upload">Upload</button>
                            <input type="hidden" class="image_id" name="%s" value="%s" %s />
                            <div class="image-preview">%s</div>
                            <p>%s</p>
                        </div>',
                        esc_attr($name),
                        esc_attr($value),
                        $attribute_text,
                        $image_preview,
                        esc_html($description)
                    );
                    break;

                case 'select':
                    echo sprintf('<select name="%s" %s>', esc_attr($name), $attribute_text);
                    foreach ($setting['options'] as $option_id => $option_value) {
                        echo sprintf(
                            '<option value="%s" %s>%s</option>',
                            esc_attr($option_id),
                            selected($value, $option_id, false),
                            esc_html($option_value)
                        );
                    }
                    echo '</select>';
                    break;

                case 'dropdown_pages':

                    $args = array(
                        'name' => $name,
                        'show_option_none' => $placeholder,
                        'option_none_value' => '0',
                        'selected' => $value,
                        'post_status' => 'publish', // Only show publish pages
                    );

                    wp_dropdown_pages($args);
                    break;
                case 'multiselect':
                    $value_array = $value !== '' ? explode(',', $value) : [];
                    echo sprintf('<select data-placeholder="%s" class="ambikly-multiselect" name="%s[]" %s multiple>', esc_attr($placeholder), esc_attr($name), $attribute_text);
                    foreach ($setting['options'] as $option_id => $option_value) {
                        echo sprintf(
                            '<option value="%s" %s>%s</option>',
                            esc_attr($option_id),
                            in_array($option_id, $value_array) ? 'selected="selected"' : '',
                            esc_html($option_value)
                        );
                    }
                    echo '</select>';
                    break;
                case "checkbox":
                    ?>
                <label for="<?php echo esc_attr($name); ?>">
                    <?php
                    echo sprintf(
                        '<input type="%s" id="%s" name="%s" value="%s" placeholder="%s" %s %s/>',
                        esc_attr($type),
                        esc_attr($name),
                        esc_attr($name),
                        esc_attr(1),
                        esc_attr($placeholder),
                        $attribute_text,
                        checked(1, $value, false)
                    );
                    echo '&nbsp;';
                    echo esc_html($label) . ($is_required ? '*' : ''); ?>
                    </label><?php
                    break;
                case "multicheckbox":
                    $options = $setting['options'] ?? [];
                    $options = is_array($options) ? $options : [];
                    $value = is_array($value) ? $value : [];
                    foreach ($options as $option_id => $option_value) {

                        $is_checked = in_array($option_id, $value);
                        ?>
                        <label for="<?php echo esc_attr($name . '_' . $option_id); ?>">
                            <?php
                            echo sprintf(
                                '<input type="checkbox" id="%s" name="%s[]" value="%s" %s %s/>',
                                esc_attr($name . '_' . $option_id),
                                esc_attr($name),
                                esc_attr($option_id),
                                $attribute_text,
                                checked(1, $is_checked, false)
                            );
                            echo '&nbsp;';
                            echo esc_html($option_value); ?></label>
                        <?php
                    }
                    break;

                // Additional cases for other input types can be added here.
            }
            if ($description) {
                echo '<p>' . wp_kses($description,array('a'=>array('href'=>array(), 'target'=>array()))) . '</p>';
            }
            ?>
        </div>
        <?php
        if ($is_clear_div) {
            echo '<div class="clear-div"></div>';
        }
    }

}