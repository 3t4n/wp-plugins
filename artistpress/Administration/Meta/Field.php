<?php

namespace ArtistPress\Administration\Meta;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Utitlity class containing HTML markup for the fields of MetaBox dropin library.
 */
class Field
{
    private static function getTextField($field, $meta)
    {
        \ob_start();

        \printf(
            '<input type="%1$s" name="%2$s" id="%3$s" value="%4$s" class="regular-text" size="30" />',
            $field['field_type'],
            $field['field_name'],
            $field['field_id'],
            \esc_attr($meta)
        );

        return apply_filters(__METHOD__, \ob_get_clean());
    }

    private static function getDateField($field, $meta)
    {
        \ob_start();

        \printf(
            '<input required type="%1$s" name="%2$s" id="%3$s" value="%4$s" size="30" />',
            $field['field_type'],
            $field['field_name'],
            $field['field_id'],
            \esc_attr($meta)
        );

        return apply_filters(__METHOD__, ob_get_clean());
    }

    private static function getHiddenField($field, $meta)
    {
        \ob_start();

        \printf(
            '<input type="%1$s" name="%2$s" id="%3$s" value="%4$s" class="hidden-field" size="30" />',
            $field['field_type'],
            $field['field_name'],
            $field['field_id'],
            \esc_attr($meta)
        );

        return apply_filters(__METHOD__, \ob_get_clean());
    }

    private static function getGeocodeField($field, $meta)
    {
        \ob_start();

        \printf(
            '<input type="text" name="%2$s" id="%3$s" value="%4$s" size="30" />
            <button id="geocode" type="button" class="button button-primary button-large">Get Coordinates</button>',
            $field['field_type'],
            $field['field_name'],
            $field['field_id'],
            \esc_attr($meta)
        );

        return apply_filters(__METHOD__, \ob_get_clean());
    }

    private static function getNumberField($field, $meta)
    {
        \ob_start();

        \printf(
            '<input type="%1$s" name="%2$s" id="%3$s" value="%4$s" class="regular-text" size="30" />',
            $field['field_type'],
            $field['field_name'],
            $field['field_id'],
            \intval($meta)
        );

        return apply_filters(__METHOD__, \ob_get_clean());
    }

    private static function getTextareaField($field, $meta)
    {
        \ob_start();

        \printf(
            '<textarea name="%1$s" id="%2$s" cols="60" rows="4">%3$s</textarea>',
            $field['field_name'],
            $field['field_id'],
            \esc_textarea($meta)
        );

        return apply_filters(__METHOD__, \ob_get_clean());
    }

    private static function getEditorField($field, $meta)
    {
        \ob_start();

        echo \wp_editor($meta, $field['field_id'], $field['field_settings']);

        return apply_filters(__METHOD__, \ob_get_clean());
    }

    private static function getCheckboxField($field, $meta)
    {
        \ob_start();

        printf(
            '<input type="checkbox" name="%1$s" id="%2$s" %3$s value="1"><label for="%2$s">%4$s</label>',
            $field['field_name'],
            $field['field_id'],
            checked($meta, true, false),
            $field['field_desc']
        );

        return apply_filters(__METHOD__, \ob_get_clean());
    }

    private static function getSelectField($field, $meta)
    {
        \ob_start();

        \printf(
            '<select required name="%1$s" id="%2$s" %3$s %4$s><option value="">%5$s</option>',
            $field['field_name'],
            $field['field_id'],
            $field['field_type'] == 'chosen' ? ' class="chosen"' : '',
            isset($multiple) && $multiple == true ? ' multiple="multiple"' : '',
            'Select One'
        );

        foreach ($field['field_options'] as $option) {
            \printf(
                '<option %1$s value="%2$s">%3$s</option>',
                selected($meta, $option['value'], false),
                $option['value'],
                $option['label']
            );
        }

        \printf(
            '</select>'
        );

        return apply_filters(__METHOD__, \ob_get_clean());
    }

    private static function getRadioField($field, $meta)
    {
        \ob_start();

        echo '<ul class="meta_box_items">';

        foreach ($field['field_options'] as $option) {
            printf(
                '<li><input type="%1$s" name="%2$s" id="%3$s" value="%4$s" %6$s/><label for="%3$s">%5$s</li>',
                $field['field_type'],
                $field['field_name'],
                $field['field_id'] .'-'. $option['value'],
                $option['value'],
                $option['label'],
                checked($meta, $option['value'], false)
            );
        }
        
        echo '</ul>';
        echo $field['field_desc'];

        return apply_filters(__METHOD__, \ob_get_clean());
    }

    private static function getCheckboxGroupField($field, $meta)
    {
        \ob_start();

        echo '<ul class="meta_box_items">';

        foreach ($field['field_options'] as $option) {
            $checked = is_array($meta) && in_array($option['value'], $meta) ? ' checked="checked"' : '';

            printf(
                '<li><input type="checkbox" value="%1$s" name="%2$s" id="%3$s" %4$s/><label for="%2$s">%5$s</li>',
                $option['value'],
                $field['field_name'] . '[]',
                $field['field_id'] .'-'. $option['value'],
                $checked,
                $option['label']
            );
        }

        echo '</ul>';
        echo $field['field_desc'];

        return apply_filters(__METHOD__, \ob_get_clean());
    }

    private static function getSelectPostField($field, $meta)
    {
        $posts = \get_posts([
            'post_type' => $field['field_post_type'],
            'posts_per_page' => -1,
            'orderby' => 'name',
            'order' => 'ASC'
        ]);

        \ob_start();

        \printf(
            '<select required data-placeholder="%5$s" name="%1$s[]" id="%2$s" %3$s %4$s><option value="">%5$s</option>',
            $field['field_name'],
            $field['field_id'],
            $field['field_type'] == 'chosen' ? ' class="chosen"' : '',
            isset($field['field_multiple']) && $field['field_multiple'] == true ? ' multiple="multiple"' : '',
            isset($field['field_multiple']) && $field['field_multiple'] == true ? 'Select Multiple' : 'Select One',
        );

        foreach ($posts as $item) {
            \printf(
                '<option data-name="%1$s" value="%2$s" %3$s >%4$s</option>',
                $item->post_name,
                $item->ID,
                selected(is_array($meta) && in_array($item->ID, $meta), true, false),
                $item->post_title
            );
        }

        \printf(
            '</select>'
        );

        return apply_filters(__METHOD__, \ob_get_clean());
    }

    private static function getSelectPostRelationshipField($field, $meta)
    {
        $posts = \get_posts([
            'post_type' => $field['field_post_type'],
            'posts_per_page' => -1,
            'orderby' => 'name',
            'order' => 'ASC'
        ]);

        \ob_start();

        \printf(
            '<select required class="multi-select" data-placeholder="%4$s" name="%1$s[]" id="%2$s" %3$s multiple="multiple"><option value="">%4$s</option>',
            $field['field_name'],
            $field['field_id'],
            $field['field_type'] == 'chosen' ? ' class="chosen"' : '',
            'Select Items'
        );

        foreach ($posts as $item) {
            \printf(
                '<option data-name="%1$s" value="%2$s" %3$s >%4$s</option>',
                $item->post_name,
                $item->ID,
                selected(is_array($meta) && in_array($item->ID, $meta), true, false),
                $item->post_title
            );
        }

        \printf(
            '</select>'
        );

        return apply_filters(__METHOD__, \ob_get_clean());
    }

    private static function getRangeField($field, $meta)
    {
        $value = !empty($meta) ? intval($meta) : '0';


        echo '<pre>';
        print_r($meta);
        echo '</pre>';

        \ob_start();

        printf(
            '<div id="%1$s-slider"></div>
            <input type="%2$s" name="%3$s" id="%4$s" min="0" max="100" value="%5$s" step="1"><br/>%6$s',
            $field['field_id'],
            $field['field_type'],
            $field['field_name'],
            $field['field_id'],
            $value,
            $field['field_desc']
        );

        return apply_filters(__METHOD__, \ob_get_clean());
    }

    private static function getRepeaterField($field, $meta)
    {
        \ob_start(); ?>

        <table id="<?php echo $field['field_id']; ?>-repeatable" class="meta_box_repeatable <?php echo get_post_type(); ?>" cellspacing="0">
            <tbody>
                <?php
                $i = 0;

                // Create an empty array
                if ($meta == '' || $meta == array()) {
                    $keys = wp_list_pluck($field['field_repeatable_fields'], 'id');
                    $meta = array(array_fill_keys($keys, null));
                }
                $meta = array_values($meta);

                foreach ($meta as $row) {
                    echo '<tr><td class="form-row">';
                    foreach ($field['field_repeatable_fields'] as $repeatableField) {
                        if (!array_key_exists($repeatableField['id'], $meta[$i])) $meta[$i][$repeatableField['id']] = null;
                        echo '<label>' . $repeatableField['label']  . '</label>';
                        echo self::render($repeatableField, $meta[$i][$repeatableField['id']], array($field['field_id'], $i));
                    }
                    echo '</td></tr>';
                    $i++;
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td class="form-row">
                        <?php
                        echo '<button type="button" class="meta_box_repeatable_add button">Add Field</button>';
                        ?>
                    </td>
                </tr>
            </tfoot>
        </table>

        <?php
        return apply_filters(__METHOD__, \ob_get_clean());
    }

    private static function getImageField($field, $meta)
    {
        \ob_start();

        $defaultImage   = ARTISTPRESS_DIR_URL . '/Admin/images/default.png';
        $chosenImage    = !empty($meta) ? wp_get_attachment_image_url(intval($meta), 'thumbnail', false ) : $defaultImage;
        ?>

        <div class="meta_box_image">
            <span class="meta_box_default_image" style="display: none;"><?php echo $defaultImage; ?></span>
            <input name="<?php echo $field['field_name']; ?>" type="hidden" class="meta_box_upload_image" value="<?php echo intval($meta); ?>" />
            <img src="<?php echo esc_attr($chosenImage); ?>" class="meta_box_preview_image" alt=""/>
            <button type="button" class="meta_box_upload_image_button button button-primary button-large" rel="<?php echo get_the_ID(); ?>">Choose Image</button>
            <button type="button" style="display: none;" class="meta_box_clear_image_button button button-primary button-large">Remove Image</button>
            <div class="clear"></div>
        </div>

        <?php
        return apply_filters(__METHOD__, \ob_get_clean());
    }

    private static function getFileField($field, $meta)
    {
        \ob_start();

        $iconClass = 'meta_box_file';
        if ($meta) {
            $iconClass .= ' checked';
        }

        ?>

        <div class="meta_box_file_stuff">
            <input name="<?php echo $field['field_name']; ?>" type="hidden" class="meta_box_upload_file" value="<?php echo esc_url($meta); ?>" />
            <span class="<?php echo $iconClass; ?>"></span>
            <span class="meta_box_filename"><?php echo esc_url($meta); ?></span>
            <button class="meta_box_upload_file_button button" rel="<?php echo get_the_ID(); ?> ">Choose File</button>
            <button class="meta_box_clear_file_button">Remove File</button>
        </div>

        <?php
        return apply_filters(__METHOD__, \ob_get_clean());
    }

    public static function render($field, $meta = null, $repeatable = null)
    {
        $field = array(
            'field_id'      => isset($field['id']) ? esc_attr($field['id']) : null,
            'field_name'    => isset($field['id']) ? esc_attr($field['id']) : null,
            'field_type'    => isset($field['type']) ? $field['type'] : null,
            'field_label'   => isset($field['label']) ? $field['label'] : null,
            'field_desc'    => isset($field['desc']) ? '<span class="description">' . $field['desc'] . '</span>' : null,
            'field_place'   => isset($field['place']) ? $field['place'] : null,
            'field_size'    => isset($field['size']) ? $field['size'] : null,
            'field_options' => isset($field['options']) ? $field['options'] : null,
            'field_settings'    => isset($field['settings']) ? $field['settings'] : null,
            'field_post_type'   => isset($field['post_type']) ? $field['post_type'] : null,
            'field_multiple'   => isset($field['multiple']) ? $field['multiple'] : null,
            'field_repeatable_fields'   => isset($field['repeatable_fields']) ? $field['repeatable_fields'] : null,
        );

        if ($repeatable) {
            $field['field_name'] = $repeatable[0] . '[' . $repeatable[1] . '][' . $field['field_id'] . ']';
            $field['field_id'] = $repeatable[0] . '_' . $repeatable[1] . '_' . $field['field_id'];
        }

        switch ($field['field_type']) {
            case 'date':
                print self::getDateField($field, $meta);
                break;
            case 'hidden':
                print self::getHiddenField($field, $meta);
                break;
            case 'geocode':
                print self::getGeocodeField($field, $meta);
                break;
            case 'number':
                print self::getNumberField($field, $meta);
                break;
            case 'textarea':
                print self::getTextareaField($field, $meta);
                break;
            case 'editor':
                print self::getEditorField($field, $meta);
                break;
            case 'checkbox':
                print self::getCheckboxField($field, $meta);
                break;
            case 'select':
            case 'chosen':
                print self::getSelectField($field, $meta);
                break;
            case 'radio':
                print self::getRadioField($field, $meta);
                break;
            case 'checkbox_group':
                print self::getCheckboxGroupField($field, $meta);
                break;
            case 'post_select':
            case 'post_list':
            case 'post_chosen':
                print self::getSelectPostField($field, $meta);
                break;
            case 'post_relationship':
                print self::getSelectPostRelationshipField($field, $meta);
                break;
            case 'range':
                print self::getRangeField($field, $meta);
                break;
            case 'image':
                print self::getImageField($field, $meta);
                break;
            case 'file':
                print self::getFileField($field, $meta);
                break;
            case 'repeatable':
                print self::getRepeaterField($field, $meta);
                break;
            default:
                print self::getTextField($field, $meta);
        }
    }
}
