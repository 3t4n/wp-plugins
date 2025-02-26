<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Quotes_Post_Type {

    function __construct() {
        add_action( 'init', array($this, 'post_type') );
        add_filter( 'use_block_editor_for_post_type', array($this, 'remove_block_editor'), 10, 2);
        add_action( 'init', array($this, 'taxonomy'), 30 );
        add_action( 'save_post_quote', array($this, 'save_meta') );
        add_action( 'admin_enqueue_scripts', array($this, 'enqueue_scripts') );
        add_filter( 'manage_quote_posts_columns', array($this,'quote_posts_columns') );
        add_action( 'manage_quote_posts_custom_column', array($this, 'quote_posts_custom_column'), 10, 2 );
        add_filter( 'manage_edit-quote_sortable_columns', array($this, 'quote_sortable_columns') );
        add_action( 'pre_get_posts', array($this, 'pre_get_posts') );
        add_action( 'quick_edit_custom_box', array($this, 'quick_edit_custom_box'), 10, 2 );
        add_action( 'bulk_edit_custom_box', array($this, 'quick_edit_custom_box'), 10, 2 );
        add_action( 'restrict_manage_posts', array($this, 'restrict_manage_posts') );
    }

    /**
     * Registering Post_Type "quote"
     *
     * @return void
     */
    function post_type()
	{
        $labels = array(
            'name'                     => _x('Quotes', 'Post type general name', 'easy-quotes'),
            'singular_name'            => _x('Quote', 'Post type singular name', 'easy-quotes'),
            'menu_name'                => _x('Quotes', 'Admin Menu text', 'easy-quotes'),
            'name_admin_bar'           => _x('Quote', 'Add New on Toolbar', 'easy-quotes'),
            'add_new_item'             => __('Add New Quote', 'easy-quotes'),
            'add_new'                  => __('Add New', 'easy-quotes'),
            'edit_item'                => __('Edit Quote', 'easy-quotes'),
            'new_item'                 => __('New Quote', 'easy-quotes'),
            'view_item'                => __('View Quote', 'easy-quotes'),
            'view_items'               => __('View Quotes', 'easy-quotes'),
            'search_items'             => __('Search Quotes', 'easy-quotes'),
            'not_found'                => __('No quotes found.', 'easy-quotes'),
            'not_found_in_trash'       => __('No quotes found in Trash.', 'easy-quotes'),
            'all_items'                => __('All Quotes', 'easy-quotes'),
            'archives'                 => __('Quote Archives', 'easy-quotes'),
            'attributes'               => __('Quote Attributes', 'easy-quotes'),
            'insert_into_item'         => __('Insert into quote', 'easy-quotes'),
            'uploaded_to_this_item'    => __('Uploaded to this quote', 'easy-quotes'),
            'filter_items_list'        => __('Filter quotes list', 'easy-quotes'),
            'items_list_navigation'    => __('Quotes list navigation', 'easy-quotes'),
            'items_list'               => __('Quotes list', 'easy-quotes'),
            'item_published'           => __('Quote published.', 'easy-quotes'),
            'item_published_privately' => __('Quote published privately.', 'easy-quotes'),
            'item_reverted_to_draft'   => __('Quote reverted to draft.', 'easy-quotes'),
            'item_scheduled'           => __('Quote scheduled.', 'easy-quotes'),
            'item_updated'             => __('Quote updated.', 'easy-quotes'),
            'item_link'                => __('Quote Link', 'easy-quotes'),
            'item_link_description'    => __('A link to a quote.', 'easy-quotes') 
        );
        $args = array(
            //'label'                 => __('Quotes', 'easy-quotes'),
            'labels' 				=> $labels,
            'description'           => __('Add Quotes to your wordpress site', 'easy-quotes'),
            'public'                => true,
            'show_ui' 				=> true, 
            'menu_icon'             => 'dashicons-editor-quote',
            'show_in_rest'          => true,
            'supports'              => array('title', 'editor'),
            'register_meta_box_cb'  => array($this, 'register_meta_box')
        ); 
        register_post_type('quote', $args);   
    }

    /**
     * Remove Block-Editor from Post-Type "quote"
     *
     * @param bool $enabled
     * @param string $post_type
     * @return bool
     */
    function remove_block_editor( $enabled, $post_type ) {
        if (in_array($post_type, ['quote']))
            return false;
        return $enabled;
    }

    /**
     * Register Taxonomy "Category"
     *
     * @return void
     */
    function taxonomy() {
        $labels = array(
            'name'              => _x( 'Categories', 'taxonomy general name', 'easy-quotes' ),
            'singular_name'     => _x( 'Category', 'taxonomy singular name', 'easy-quotes' ),
            'search_items'      => __( 'Search Category', 'easy-quotes' ),
            'all_items'         => __( 'All Categories', 'easy-quotes' ),
            'parent_item'       => __( 'Parent Category', 'easy-quotes' ),
            'parent_item_colon' => __( 'Parent Category:', 'easy-quotes' ),
            'edit_item'         => __( 'Edit Category', 'easy-quotes' ),
            'update_item'       => __( 'Update Category', 'easy-quotes' ),
            'add_new_item'      => __( 'Add New Category', 'easy-quotes' ),
            'new_item_name'     => __( 'New Category Name', 'easy-quotes' ),
            'menu_name'         => __( 'Categories', 'easy-quotes' )
        );
        $args = array(
            'hierarchical'          => true,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'query_var'             => true,
            'rewrite'               => array( 'slug' => 'quote-category' ),
            'show_in_rest'          => true,
            'rest_base'             => 'quote-category',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
        );
        register_taxonomy( 'quote-category', array( 'quote' ), $args ); 
    }

    /**
     * Is the current Page the Quote Admin List View
     *
     * @param string $hook_suffix
     * @return boolean
     */
    function isQuoteListView( $hook_suffix ) {
        if ($hook_suffix != 'edit.php')
            return false;
        if (get_post_type() === 'quote')
            return true;
        return false;
    }

    /**
     * Is the current Page the Quote Edit (Editor)
     *
     * @param string $hook_suffix
     * @return boolean
     */
    function isQuoteEdit( $hook_suffix ) {
        if (!($hook_suffix === 'post.php' || $hook_suffix === 'post-new.php'))
            return false;
        if (get_post_type() === 'quote')
            return true;
        return false;
    }

    /**
     * Enqueue_Admin_Scripts
     *
     * @return void
     */
    function enqueue_scripts( $hook_suffix ) {

        $listView = $this->isQuoteListView( $hook_suffix );
        $quoteEdit = $this->isQuoteEdit( $hook_suffix );
        
        if ($listView || $quoteEdit) {
            wp_enqueue_style(
                'quote-css',
                QUOTES_PLUGIN_URL.'admin/css/style.css'
            );
    
            wp_enqueue_script(
                'custom-quickedit-box',
                QUOTES_PLUGIN_URL.'admin/js/quickedit.js',
                array( 'jquery', 'inline-edit-post' )
            );

            if ($quoteEdit) {
                wp_enqueue_script(
                    'quote-rating',
                    QUOTES_PLUGIN_URL.'admin/js/quoterating.js',
                    array( 'jquery' )
                );
            }
        }    
    }

    /**
     * Register_meta_box
     *
     * @return void
     */
    function register_meta_box() {
        add_meta_box(
            'quote-meta',
            __('Meta', 'easy-quotes'),
            array($this, 'get_meta_html'),
            'quote',
            'side'
        );
    }

    /**
     * Echoes html for the meta fields quote_author and quote_date and quote_rating
     *
     * @param [WP_Post] $post
     */
    function get_meta_html( $post ) {
        $quote_author = get_post_meta( $post->ID, 'quote_author', true );
        $quote_date = get_post_meta($post->ID, 'quote_date', true);
        $quote_rating = get_post_meta($post->ID, 'quote_rating', true);
        if (empty($quote_rating))
            $quote_rating = "0";

        echo '<div class="form-row">';
        echo '<label for="quote_author" alt="Quote Author">' . __('Author:', 'easy-quotes') . '</label>';
        echo '<input type="text" id="quote_author" name="quote_author" value="'.esc_attr($quote_author).'" />';
        echo '</div>';
        echo '<div class="form-row">';
        echo '<label for="quote_date" alt="Quote Date">' . __('Date:', 'easy-quotes') . '</label>';
        echo '<input type="text" id="quote_date" name="quote_date" value="'.esc_attr($quote_date).'" />';
        echo '</div>';
        echo '<div class="form-row">';
        echo '<label for="quote_rating" alt="Quote Stars">' . __('Rating:', 'easy-quotes') . '</label>';
        echo '<input type="number" id="quote_rating" name="quote_rating" step="0.1" min="0" max="5" value="'.esc_attr($quote_rating).'" />';
        echo '</div>';
        echo '<div class="form-row">';
        echo Quotes_Stars::get_stars((float)$quote_rating);
        echo '</div>';
    }

    /**
     * Save Meta Data
     *
     * @param integer $post_id
     * @return void
     */
    function save_meta( $post_id ) {
        // Check nonce
        if (!$this->is_nonce_valid($post_id))
            return;
        
        // Autosave?
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
            return;

        // Check the user's permissions.
        if ( isset( $_POST['post_type'] ) && 'quote' == $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return;
            }
        }
        else {
            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return;
            }
        }

        // All checks done now safe the data
        $this->update_quote_meta($post_id, 'quote_author');
        $this->update_quote_meta($post_id, 'quote_date');
        $this->update_quote_meta($post_id, 'quote_rating', 'number');
    }

    /**
     * Update and sanitize custom meta string data
     *
     * @param integer $post_id
     * @param string $meta_key
     * @return boolean true if success
     */
    function update_quote_meta($post_id, $meta_key = '', $type = 'text')
    {
        // Quick Edit and "normal" inside Quote Edit
        if (isset($_POST[$meta_key])) {
            if ($type == 'number')
                $value = filter_input(INPUT_POST, $meta_key, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            else 
                $value = sanitize_text_field($_POST[$meta_key]);
            update_post_meta( $post_id, $meta_key, $value);
            return true;
        }
        // BULK edit
        if (isset($_GET[$meta_key])) {
            if ($type == 'number')
                $value = filter_input(INPUT_GET, $meta_key, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            else
                $value = sanitize_text_field($_GET[$meta_key]);
            if (!empty($value)) {
                update_post_meta( $post_id, $meta_key, $value);
                return true;
            }  
        }
        return false;
    }

    /**
     * Check for the right Wordpress nonce fields and verifies them
     *
     * @param integer $post_id
     * @return boolean
     */
    function is_nonce_valid( $post_id ) {
        // In Quote Save
        if ( isset($_POST['_wpnonce']) ) {
            if ( wp_verify_nonce($_POST['_wpnonce'], 'update-post_' . $post_id) ) {
                return true;
            }
        }

        // In Quick Edit Save
        if ( isset($_POST['_inline_edit']) ) {
            if ( wp_verify_nonce( $_POST['_inline_edit'], 'inlineeditnonce' ) ) {
                return true;
            }
        }

        // In Bulk Edit Save
        if ( isset($_REQUEST['_wpnonce'])) {
            $suffix = _get_list_table( 'WP_Posts_List_Table' )->_args['plural'];
            if ( wp_verify_nonce($_REQUEST['_wpnonce'], 'bulk-' . $suffix) ) {
                return true;
            }
        }
        return false;
    }

    /**
     * Add extra columns in admin Quote List View
     *
     * @param [array] $columns
     * @return array
     */
    function quote_posts_columns( $columns )
    {
        return
        array (
            'cb'                        => '<input type="checkbox" />',
            'title'                     => __('Title', 'easy-quotes'),
            'quote'                     => __('Quote', 'easy-quotes'),
            'taxonomy-quote-category'   => __('Categories', 'easy-quotes'),
            'quote_author'              => __('Author', 'easy-quotes'),
            'quote_date'                => __('Date', 'easy-quotes'),
            'quote_rating'              => __('Rating', 'easy-quotes'),
            'date'                      => __('Status', 'easy-quotes')
        );
    }

    /**
     * Return extra columns data in admin Quote List View
     *
     * @param [string] $column_key
     * @param int $post_id
     * @return void
     */
    function quote_posts_custom_column( $column_key, $post_id ) {
        switch ($column_key) {
            case 'quote':
                $quote = get_the_content(null, false, $post_id);
                $quote = wp_trim_words($quote, 15, ' (...)');
                if (!empty($quote))
                    echo wpautop(esc_html($quote));
                break;
            
            case 'quote_author':
                $author = get_post_meta($post_id, 'quote_author', true);
                if (!empty($author))
                    echo esc_html($author);
                break;

            case 'quote_date':
                $date = get_post_meta($post_id, 'quote_date', true);
                if (!empty($date))
                    echo esc_html($date);
                break;

            case 'quote_rating':
                $rating = get_post_meta($post_id, 'quote_rating', true);
                if(empty($rating))
                    $rating = "0";
                echo Quotes_Stars::get_stars((float)$rating);
                echo '<span data-value="'.esc_attr($rating).'">'.esc_html(number_format_i18n($rating,1) . ' ' . __('out of 5', 'easy-quotes') ).'</span>';
                break;
        }
    }

    /**
     * Return sortable columns
     *
     * @param [array] $columns
     * @return array
     */
    function quote_sortable_columns ($columns) {
        $columns['quote_author']    = 'quote_author';
        $columns['quote_date']      = 'quote_date';
        $columns['quote_rating']    = 'quote_rating';
        return $columns;
    }

    /**
     * Correct the type of query for sorting
     *
     * @param [type] $query
     * @return void
     */
    function pre_get_posts($query) {
        if (!is_admin())
            return;

        $orderby = $query->get('orderby');
        if ($orderby === 'quote_author') {
            $query->set('meta_key', 'quote_author');
            $query->set('orderby', 'meta_value');
            return;
        }

        if ($orderby === 'quote_date') {
            $query->set('meta_key', 'quote_date');
            $query->set('orderby', 'meta_value_date');
            return;
        }

        if ($orderby === 'quote_rating') {
            $query->set('meta_key', 'quote_rating');
            $query->set('orderby', 'meta_value_num');
            return;
        }
    }

    /**
     * Adds a Quick Edit Custom Box to Post-Type 'quote'
     *
     * @param string $column_name
     * @param string $post_type
     * @return void
     */
    function quick_edit_custom_box($column_name, $post_type) {
        if (!($post_type === 'quote'))
            return;
        
        switch ($column_name) {
            case 'quote_author':
                echo
                    '<fieldset class="inline-edit-col-right">
                        <div class="inline-edit-col">           
                            <label>
                                <span class="title">' . __('Author', 'easy-quotes') . '</span>
                                <span class="input-text-wrap">
                                    <input class="quote_author" id="quote_author" type="text" name="quote_author" value="">
                                </span>
                            </label>
                        </div>
                    </fieldset>';
                break;
            case 'quote_date':
                echo
                    '<fieldset class="inline-edit-col-right">
                        <div class="inline-edit-col">
                            <label>
                                <span class="title">' . __('Date', 'easy-quotes') . '</span>
                                <span class="input-text-wrap">
                                    <input class="quote_date" id="quote_date" type="text" name="quote_date" value="">
                                </span>
                            </label>
                        </div>
                    </fieldset>';
                break;
            case 'quote_rating':
                echo
                    '<fieldset class="inline-edit-col-right">
                        <div class="inline-edit-col">
                            <label>
                                <span class="title">' . __('Rating', 'easy-quotes') . '</span>
                                <span class="input-text-wrap">
                                    <input class="quote_rating" id="quote_rating" type="number" min="0" max="5" step="0.1" name="quote_rating" value="">
                                </span>
                            </label>
                        </div>
                    </fieldset>';
                break;
        }
    }

    /**
     * Adds Category-dropdown to Admin View 'Quote'
     *
     * @param string $post_type
     * @return void
     */
    function restrict_manage_posts( $post_type ) {
        if ('quote' !== $post_type)
            return;
        
        $slug = 'quote-category';
        $taxonomy = get_taxonomy('quote-category');
        $category = "";
        if (isset($_GET[$slug]))
            $category = sanitize_title( $_GET[$slug] );

        wp_dropdown_categories( array(
            'show_option_all' =>  $taxonomy->labels->all_items,
            'taxonomy'        =>  $slug,
            'name'            =>  $slug,
            'orderby'         =>  'name',
            'value_field'     =>  'slug',
            'selected'        =>  $category,
            'hierarchical'    =>  true,
        ) );
    }

}
