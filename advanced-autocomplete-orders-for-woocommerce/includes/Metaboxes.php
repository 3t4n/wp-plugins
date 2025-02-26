<?php

/**
 * Metaboxes Class
 *
 * @category Metaboxes
 * @package  Optemiz\AWO
 * @author   Nazrul Islam Nayan <nazrulislamnayan7@gmail.com>
 * @license  GPL3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @since    1.0.0
 */

namespace Optemiz\AWO;

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Metaboxes class
 *
 * @class Metaboxes The class that manages all about Admin Menus.
 *
 * @category Metaboxes
 * @package  Optemiz\AWO
 * @author   Nazrul Islam Nayan <nazrulislamnayan7@gmail.com>
 * @license  GPL3 https://www.gnu.org/licenses/gpl-3.0.en.html
 */
class Metaboxes
{

    /**
     * Class constructor
     *
     * Sets up all the appropriate hooks and functions
     * within our plugin.
     *
     * @return void
     */
    public function __construct()
    {
        $this->hooks();

        do_action('awo_metaboxes_loaded', $this);
    }

    /**
     * Instance.
     * 
     * The instance will be created if it does not exist yet.
     *
     * @return self The main instance.
     * @since 1.0.0
     */
    public static function instance(): self
    {
        static $instance = null;
        if (is_null($instance)) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Hooks.
     * 
     * @since 1.0.0
     */
    public function hooks()
    {
        add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
        add_action('save_post', array($this, 'save'));
    }

    /**
     * Add Metaboxes.
     *
     * @param mixed $post_type post type
     * 
     * @return void
     */
    public function add_meta_boxes($post_type)
    {
        $post_types = array('hawo-rules');

        if (in_array($post_type, $post_types)) {
            add_meta_box(
                'hawo_meta_settings',
                esc_html__('Conditional Rules', 'advanced-autocomplete-orders-for-woocommerce'),
                array($this, 'meta_box_content'),
                $post_type,
                'normal',
                'high'
            );
        }
    }

    /**
     * Meta Box content.
     *
     * @param WP_Post $post The post object.
     */
    public function meta_box_content($post)
    {
        do_action('hawo_metabox_content_before');
        ?>
        <div class="hawo-metabox-wrapper woocommerce">
            <div class="hpcl-metabox-content">
                <div class="hpcl-rule-header-wrapper">
                    <h4 class="hpcl-rule-header">Rules</h4>
                    <p class="hpcl-rule-description">Set dynamic rules to apply or not apply order completed automatically.</p>
                </div>
                <div class="hpcl-field-group">
                    <h5 class="hpcl-field-group-header">Show this field group if</h5>
                    <div class="hpcl-select-group-fields">
                        <div class="hpcl-selets-wrapper">
                            <select class="hpcl-rules-name">

                            <?php
                                $condition_data = hawo_get_condition_options();
                                if (!empty($condition_data)) {
                                    foreach($condition_data as $condition_item_key => $condition_item) {
                                        $group_label = $condition_item['label'];
                                        $options = $condition_item['options'];
                                        ?>
                                        <optgroup label="<?php echo esc_attr($group_label); ?>">
                                        <?php
                                            foreach($options as $option_key => $option_label) {
                                                ?>
                                                <option><?php echo esc_attr($option_label); ?></option>
                                                <?php
                                            }
                                        ?>
                                        </optgroup>
                                        <?php
                                    }
                                }
                            ?>
                            </select>

                            <select class="hpcl-rule-conditions">
                                <option>is equal to (=)</option>
                                <option>is not equal to</option>
                                <option>is any of</option>
                                <option>is not any of</option>
                                <option>is greater then (>)</option>
                                <option>is greater then or equal (>=)</option>
                                <option>is less then (<)</option>
                                <option>is less then or equal (<=)</option>
                                <option>between</option>
                                <option>contains</option>
                                <option>starts with</option>
                                <option>ends with</option>
                                <option>date range</option>
                                <option>date before</option>
                                <option>date after</option>
                            </select>
                            <!-- <select>
                                <option>Post</option>
                                <option>1</option>
                                <option>2</option>
                            </select> -->
                            <input type="date" name="" id="">

                            <button class="hpcl-and-btn">and</button>
                            <button class="hpcl-delete-btn">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM8.96963 8.96965C9.26252 8.67676 9.73739 8.67676 10.0303 8.96965L12 10.9393L13.9696 8.96967C14.2625 8.67678 14.7374 8.67678 15.0303 8.96967C15.3232 9.26256 15.3232 9.73744 15.0303 10.0303L13.0606 12L15.0303 13.9696C15.3232 14.2625 15.3232 14.7374 15.0303 15.0303C14.7374 15.3232 14.2625 15.3232 13.9696 15.0303L12 13.0607L10.0303 15.0303C9.73742 15.3232 9.26254 15.3232 8.96965 15.0303C8.67676 14.7374 8.67676 14.2625 8.96965 13.9697L10.9393 12L8.96963 10.0303C8.67673 9.73742 8.67673 9.26254 8.96963 8.96965Z" fill="#1C274C"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <h4 class="hpcl-rule-group-or-label">Or</h4>
                    <button class="hpcl-add-rule-group-btn">Add rule group</button>
                </div>
            </div>
        </div>
        <?php
        do_action('hawo_metabox_content_after');
    }

    /**
     * Save the meta when the post is saved.
     *
     * @param int $post_id The ID of the post being saved.
     */
    public function save($post_id)
    {

        // when nonce is not set, do nothing
        if (! isset($_POST['ffw_faq_product_settings_nonce'])) {
            return $post_id;
        }

        $nonce = wp_unslash($_POST['ffw_faq_product_settings_nonce']);

        // Verify that the nonce is valid.
        if (! wp_verify_nonce($nonce, 'ffw_faq_product_settings')) {
            return $post_id;
        }

        /*
            * If this is an autosave, our form has not been submitted,
            * so we don't want to do anything.
            */
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }

        // Check the user's permissions.
        if ('ffw' == $_POST['post_type']) {
            //check user access or not.
            if (!ffw_is_user_capable()) {
                return $post_id;
            }
        }

        do_action('ffw_save_faq_meta', $post_id);

        $is_global_product_support_enable = $this->get_product_support();

        if (! $is_global_product_support_enable) {

            $product_ids = [];
            $cat_ids = [];
            $removed_product_ids = [];
            $removed_cat_ids = [];
            $removed_tag_ids = [];

            // save product ids.
            if (isset($_POST['ffw_faq_products']) && !empty($_POST['ffw_faq_products'])) {
                // Sanitize the faqs products field value.
                $product_ids = $_POST['ffw_faq_products'];
            }

            // Reference for saved previous products ids.
            // It'll help to check if new selected product ids are removed or not.
            if (isset($_POST['ffw_faq_save_products']) && !empty($_POST['ffw_faq_save_products'])) {
                $saved_product_ids = sanitize_text_field($_POST['ffw_faq_save_products']);

                if (!empty($saved_product_ids)) {
                    $saved_product_ids      = explode(',', $saved_product_ids);
                    $removed_product_ids    = array_diff($saved_product_ids, $product_ids);
                }
            }

            /**
             * Let's remove faq for the removed product ids.
             * 
             * @since 1.6.0
             */
            if (isset($removed_product_ids) && is_array($removed_product_ids) && !empty($removed_product_ids)) {
                foreach ($removed_product_ids as $removed_product_id) {

                    // get product faqs
                    $faq_ids = get_post_meta($removed_product_id, 'ffw_product_faq_post_ids', true);

                    // search curret faq id to saved ids and remove if found.
                    if (!empty($faq_ids)) {
                        $index = array_search($post_id, $faq_ids);

                        if (isset($faq_ids[$index])) {
                            unset($faq_ids[$index]);

                            // Update the meta field.
                            update_post_meta($removed_product_id, 'ffw_product_faq_post_ids', $faq_ids);
                        }
                    }
                }
            }

            /**
             * Add faq post id to the product.
             * 
             * @since 1.6.0
             */
            if (isset($product_ids) && is_array($product_ids) && !empty($product_ids)) {
                foreach ($product_ids as $product_id) {
                    $post_id    = (int) $post_id;
                    $product_id = (int) $product_id;

                    //insert faqs.
                    ffw_insert_faqs_by_product($post_id, $product_id);
                }
            }

            /**
             * Categories Conditions and Savings.
             * 
             * @since 1.6.0
             */

            // save categories ids.
            if (isset($_POST['ffw_faq_categories']) && !empty($_POST['ffw_faq_categories'])) {
                // sanitize the faqs categories field value.
                $cat_ids = $_POST['ffw_faq_categories'];
            }

            // Reference for saved previous category ids.
            // It'll help to check if new selected category ids are removed or not.
            if (isset($_POST['ffw_faq_save_categories']) && !empty($_POST['ffw_faq_save_categories'])) {
                $saved_cat_ids = sanitize_text_field($_POST['ffw_faq_save_categories']);

                if (!empty($saved_cat_ids)) {
                    $saved_cat_ids = explode(',', $saved_cat_ids);
                    $removed_cat_ids = array_diff($saved_cat_ids, $cat_ids);
                }
            }

            /**
             * Let's remove faq for the removed category ids.
             * 
             * @since 1.6.0
             */
            if (isset($removed_cat_ids) && is_array($removed_cat_ids) && !empty($removed_cat_ids)) {
                foreach ($removed_cat_ids as $removed_cat_id) {

                    // get category faqs
                    $faq_ids = get_term_meta($removed_cat_id, 'ffw_cat_faq_post_ids', true);

                    // search curret faq id to saved ids and remove if found.
                    if (!empty($faq_ids)) {
                        $index = array_search($post_id, $faq_ids);

                        if (isset($faq_ids[$index])) {
                            unset($faq_ids[$index]);

                            // Update the meta field.
                            update_term_meta($removed_cat_id, 'ffw_cat_faq_post_ids', $faq_ids);
                        }
                    }
                }
            }

            /**
             * Add faq post id to the categories.
             * 
             * @since 1.6.0
             */
            if (isset($cat_ids) && is_array($cat_ids) && !empty($cat_ids)) {
                foreach ($cat_ids as $cat_id) {

                    // get categories faqs.
                    $faq_ids = get_term_meta($cat_id, 'ffw_cat_faq_post_ids', true);

                    // when no faqs is set, put empty array.
                    if (empty($faq_ids)) {
                        $faq_ids = [];
                    }

                    //push the faq id.
                    array_push($faq_ids, $post_id);

                    //remove duplicate faq id.
                    $faq_ids = array_unique($faq_ids);

                    // Update the meta field.
                    update_term_meta($cat_id, 'ffw_cat_faq_post_ids', $faq_ids);
                }
            }

            /**
             * Tag Conditions and Savings.
             * 
             * @since 1.7.5
             */

            // save tags ids.
            if (isset($_POST['ffw_faq_tags']) && !empty($_POST['ffw_faq_tags'])) {
                // sanitize the faqs tags field value.
                $tag_ids = $_POST['ffw_faq_tags'];
            }

            // Reference for saved previous tag ids.
            // It'll help to check if new selected tag ids are removed or not.
            if (isset($_POST['ffw_faq_save_tags']) && !empty($_POST['ffw_faq_save_tags'])) {
                $saved_tag_ids = sanitize_text_field($_POST['ffw_faq_save_tags']);

                if (!empty($saved_tag_ids)) {
                    $saved_tag_ids = explode(',', $saved_tag_ids);
                    $removed_tag_ids = array_diff($saved_tag_ids, $tag_ids);
                }
            }

            /**
             * Let's remove faq for the removed tag ids.
             * 
             * @since 1.6.0
             */
            if (isset($removed_tag_ids) && is_array($removed_tag_ids) && !empty($removed_tag_ids)) {
                foreach ($removed_tag_ids as $removed_tag_id) {

                    // get tag faqs.
                    $faq_ids = get_term_meta($removed_tag_id, 'ffw_tag_faq_post_ids', true);

                    // search curret faq id to saved ids and remove if found.
                    if (!empty($faq_ids)) {
                        $index = array_search($post_id, $faq_ids);

                        if (isset($faq_ids[$index])) {
                            unset($faq_ids[$index]);

                            // Update the meta field.
                            update_term_meta($removed_tag_id, 'ffw_tag_faq_post_ids', $faq_ids);
                        }
                    }
                }
            }

            /**
             * Add faq post id to the tags.
             * 
             * @since 1.7.5
             */
            if (isset($tag_ids) && is_array($tag_ids) && !empty($tag_ids)) {
                foreach ($tag_ids as $tag_id) {

                    // get tags faqs.
                    $faq_ids = get_term_meta($tag_id, 'ffw_tag_faq_post_ids', true);

                    // when no faqs is set, put empty array.
                    if (empty($faq_ids)) {
                        $faq_ids = [];
                    }

                    //push the faq id.
                    array_push($faq_ids, $post_id);

                    //remove duplicate faq id.
                    $faq_ids = array_unique($faq_ids);

                    // Update the meta field.
                    update_term_meta($tag_id, 'ffw_tag_faq_post_ids', $faq_ids);
                }
            }
        }

        /**
         * Display Pages Conditions and Savings.
         * 
         * @since 1.7.7
         */
        $page_types = [];
        $removed_page_types = [];

        // save pages types.
        if (isset($_POST['ffw_display_in_pages']) && !empty($_POST['ffw_display_in_pages'])) {
            // sanitize the pages field value.
            $page_types = $_POST['ffw_display_in_pages'];
        }

        // Reference for saved previous tag ids.
        // It'll help to check if new selected tag ids are removed or not.
        if (isset($_POST['ffw_page_save_types']) && !empty($_POST['ffw_page_save_types'])) {
            $saved_page_types = sanitize_text_field($_POST['ffw_page_save_types']);

            if (!empty($saved_page_types)) {
                $saved_page_types = explode(',', $saved_page_types);
                $removed_page_types = array_diff($saved_page_types, $page_types);
            }
        }

        /**
         * Let's remove faq for the removed page types.
         * 
         * @since 1.6.0
         */
        if (isset($removed_page_types) && is_array($removed_page_types) && !empty($removed_page_types)) {
            foreach ($removed_page_types as $removed_page_type) {

                // get page's faqs.
                $faq_ids = get_option("ffw_{$removed_page_type}_faqs");

                // search curret faq id to saved ids and remove if found.
                if (!empty($faq_ids)) {
                    $index = array_search($post_id, $faq_ids);

                    if (isset($faq_ids[$index])) {
                        unset($faq_ids[$index]);

                        // Update pages faqs.
                        update_option("ffw_{$removed_page_type}_faqs", $faq_ids);
                    }
                }
            }
        }

        /**
         * Add faq post id to the page type.
         * 
         * @since 1.7.7
         */
        if (isset($page_types) && is_array($page_types) && !empty($page_types)) {
            foreach ($page_types as $page_type) {

                // get page's faqs.
                $faq_ids = get_option("ffw_{$page_type}_faqs");

                // when no faqs is set, put empty array.
                if (empty($faq_ids)) {
                    $faq_ids = [];
                }

                //push the faq id.
                array_push($faq_ids, $post_id);

                //remove duplicate faq id.
                $faq_ids = array_unique($faq_ids);

                // Update pages faqs.
                update_option("ffw_{$page_type}_faqs", $faq_ids);
            }
        }
    }
}
