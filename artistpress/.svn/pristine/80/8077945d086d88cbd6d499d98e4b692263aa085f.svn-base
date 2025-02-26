<?php

namespace ArtistPress\Administration\Meta;

if (!defined('ABSPATH')) {
    exit;   // Exit if accessed directly
}

/**
 * The meta box abstract of MetaBox dropin library.
 */
abstract class MetaBox
{
    const FIELD_PREFIX = 'artistpress_';
    
    /**
     * The ID of the meta box.
     * @var string
     */
    private $id;

    /**
     * The title of the meta box.
     * @var string
     */
    private $title;

    /**
     * Screens where this meta box will appear.
     * @var string[]
     */
    private $screens;

    /**
     * Screen context where the meta box should display.
     * @var string
     */
    private $context;

    /**
     * The display priority of the meta box.
     * @var string
     */
    private $priority;

    /**
     * The meta box fields.
     * @var array
     */
    private $fields = [];

    /**
	 * Initialize the class and set its properties.
	 *
	 * @since    	1.0.0
	 * @param 		string    $plugin_name
	 * @param 		string    $version
     * @param 		string    $version
     * @param 		string    $version
     * @param 		string    $version
	 */
    public function __construct($id, $title, $screens = [], $context = 'advanced', $priority = 'default')
    {
        if (is_string($screens)) {
            $screens = (array) $screens;
        }
    
        $this->id 	    = $id;
        $this->title    = $title;
        $this->screens  = $screens;
        $this->context  = $context;
        $this->priority = $priority;
        $this->fields   = $this->getFields();
    }
    
    /**
     * Declare fields for the Meta Box
     */
    public abstract function getFields();

    /**
     * Renders the Meta Box
     */
    public function render()
    {
        if (empty($this->fields)) {
            print 'This box needs fields';
        }

        \wp_nonce_field('tg_programmatic_seo_nonce_action', 'tg_programmatic_seo_nonce_field');

        echo '<div class="meta-content">';

        foreach ($this->fields as $field) {
            $description = isset($field['desc']) ? '<span class="description">' . $field['desc'] . '</span>' : null;

            if ($field['type'] == 'section') {
                printf('<h3>%1$s</h3>%2$s', $field['label'], $description);
            }
            elseif ($field['type'] == 'repeatable') {
                $meta = \get_post_meta(\get_the_ID(), $field['id'], true);
                
                printf(
                    '<div class="form-group"></div>',
                    Field::render($field, $meta)
                );
            }
            elseif ($field['type'] == 'editor') {
                $meta = \get_post_meta(\get_the_ID(), $field['id'], true);

                echo '<div class="form-group">';
                echo '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
                Field::render($field, $meta);
                echo '</div>';
            } else {

                $meta = \get_post_meta(\get_the_ID(), $field['id'], true);

                echo '<div class="form-group">';
                echo '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
                Field::render($field, $meta);
                echo $description;
                echo '</div>';
            }
        }
        echo '</div>';
    }

    /**
     * Outputs properly sanitized data
     *
     * @param   string  $string     the string to run through a validation function
     * @param   string  $function   the validation function
     *
     * @return  string              a validated string
     */
    private static function sanitize($string, $function = 'sanitize_text_field')
    {
        switch ( $function ) {
            case 'intval':
                return intval($string);
            case 'absint':
                return absint($string);
            case 'wp_kses_post':
                return wp_kses_post($string);
            case 'wp_kses_data':
                return wp_kses_data($string);
            case 'esc_url_raw':
                return esc_url_raw($string);
            case 'is_email':
                return is_email($string);
            case 'sanitize_title':
                return sanitize_title($string);
            case 'santitize_boolean':
                return santitize_boolean($string);
            case 'sanitize_text_field':
            default:
                return sanitize_text_field($string);
        }
    }

    /**
     * Map a multideminsional array
     *
     * @param   string  $func       the function to map
     * @param   array   $meta       a multidimensional array
     * @param   array   $sanitizer  a matching multidimensional array of sanitizers
     *
     * @return  array               new array, fully mapped with the provided arrays
     */
    private static function map($func, $meta, $sanitizer)
    {
        $newMeta    = [];
        $meta       = array_values($meta);

        foreach($meta as $key => $array) {
            if ($array == '') {
                continue;
            }

            /**
             * Some values are stored as array, we only want multidimensional ones
             */
            if (!is_array($array) ) {
                return array_map($func, $meta, (array)$sanitizer);
                break;
            }

            /**
             * The sanitizer will have all of the fields, but the item may only
             * have values for a few, remove the ones we don't have from the santizer
             */
            $keys = array_keys($array);
            $newSanitizer = $sanitizer;
            if (is_array($sanitizer)) {
                foreach ($newSanitizer as $sanitizerKey => $value) {
                    if (!in_array($sanitizerKey, $keys)) {
                        unset($newSanitizer[$sanitizerKey]);
                    }
                }
            }

            /**
             * Run the function as deep as the array goes
             */
            foreach ($array as $arrayKey => $arrayValue) {
                if (is_array($arrayValue)) {
                    $array[$arrayKey] = self::map($func, $arrayValue, $newSanitizer[$arrayKey]);
                }
            }

            $array = array_map($func, $array, $newSanitizer);
            $newMeta[$key] = array_combine($keys, array_values($array));
        }

        return $newMeta;
    }

    /**
     * Saves the Meta Box data
     */
    public function save($postId)
    {
        $postType = \get_post_type();

        // Verify nonce
        if (!isset($_POST['tg_programmatic_seo_nonce_field'])) {
            return $postId;
        }

        if (
            !(in_array($postType, $this->screens) ||
            \wp_verify_nonce($_POST['tg_programmatic_seo_nonce_field'], 'tg_programmatic_seo_nonce_action')))
        {
            return $postId;
        }

        // Check autosave
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $postId;
        }

        // Check permissions
        if (!current_user_can('edit_page', $postId)) {
            return $postId;
        }

        // Loop through fields and save the data
        foreach ($this->fields as $field) {
            if ($field['type'] == 'section') {
                $sanitizer = null;
                continue;
            }
            if (in_array($field['type'], array('tax_select', 'tax_checkboxes'))) {
                // save taxonomies
                if (isset($_POST[$field['id']])) {
                    $term = $_POST[$field['id']];
                    \wp_set_object_terms($postId, $term, $field['id']);
                }
            } elseif (in_array($field['type'], array('editor'))) {
                $new = false;
                $old = \get_post_meta($postId, $field['id'], true);

                if (isset($_POST[$field['id']])) {
                    $new = $_POST[$field['id']];
                }

                if (isset($new) && '' == $new && $old) {
                    \delete_post_meta($postId, $field['id'], $old);
                } elseif (isset($new) && $new != $old) {
                    $sanitizer = isset($field['sanitizer']) ? $field['sanitizer'] : 'wp_kses_post';
                    
                    if (is_array($new)) {
                        $new = self::map('self::sanitize', $new, $sanitizer);
                    }else{
                        $new = self::sanitize($new, $sanitizer);
                    }
                    \update_post_meta($postId, $field['id'], $new);
                }
            } else {
                $new = false;
                $old = \get_post_meta($postId, $field['id'], true);
                if (isset($_POST[$field['id']])) {
                    $new = $_POST[$field['id']];
                }
                if (isset($new) && '' == $new && $old) {
                    \delete_post_meta($postId, $field['id'], $old);
                } elseif (isset($new) && $new != $old) {
                    $sanitizer = isset($field['sanitizer']) ? $field['sanitizer'] : 'sanitize_text_field';
                    
                    if (is_array($new)) {
                        $new = self::map('self::sanitize', $new, $sanitizer);
                    }else{
                        $new = self::sanitize($new, $sanitizer);
                    }
                    \update_post_meta($postId, $field['id'], $new);
                }

            }
        }
    }

    /**
     * Registers the Meta Box
     */
    public function register()
    {
        \add_meta_box(
            $this->id,
            $this->title,
            [$this, 'render'],
            $this->screens,
            $this->context,
            $this->priority
        );
    }
}
