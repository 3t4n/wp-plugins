<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Lexilink_CPT {

    const CUSTOM_LINK_ID = 'lexilink_custom_link';

    /**
     * Register post type
     */
    public function register_post_type() {

        $settings_class = new Lexilink_Settings();
        $settings       = $settings_class->get_settings();

        $dedicated_page = $settings['dedicated_page'] === '1';

        $public   = false;
        $supports = array( 'title', 'excerpt' );
        if ( $dedicated_page ) {
            $supports[] = 'thumbnail';
            $supports[] = 'editor';
            $public     = true;
        }

        $labels = array(
            'name'                  => _x( 'Glosses', 'Post Type General Name', 'lexilink' ),
            'singular_name'         => _x( 'Gloss', 'Post Type Singular Name', 'lexilink' ),
            'menu_name'             => __( 'Glossary', 'lexilink' ),
            'name_admin_bar'        => __( 'Glossary', 'lexilink' ),
            'archives'              => __( 'Glossary', 'lexilink' ),
            'attributes'            => __( 'Glossary Attributes', 'lexilink' ),
            'parent_item_colon'     => __( 'Parent Gloss:', 'lexilink' ),
            'all_items'             => __( 'All Glosses', 'lexilink' ),
            'add_new_item'          => __( 'Add New Gloss', 'lexilink' ),
            'add_new'               => __( 'Add New', 'lexilink' ),
            'new_item'              => __( 'New Gloss', 'lexilink' ),
            'edit_item'             => __( 'Edit Gloss', 'lexilink' ),
            'update_item'           => __( 'Update Gloss', 'lexilink' ),
            'view_item'             => __( 'View Gloss', 'lexilink' ),
            'view_items'            => __( 'View Glosses', 'lexilink' ),
            'search_items'          => __( 'Search Gloss', 'lexilink' ),
            'not_found'             => __( 'Not found', 'lexilink' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'lexilink' ),
            'featured_image'        => __( 'Featured Image', 'lexilink' ),
            'set_featured_image'    => __( 'Set featured image', 'lexilink' ),
            'remove_featured_image' => __( 'Remove featured image', 'lexilink' ),
            'use_featured_image'    => __( 'Use as featured image', 'lexilink' ),
            'insert_into_item'      => __( 'Insert into Gloss', 'lexilink' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Gloss', 'lexilink' ),
            'items_list'            => __( 'Glosses list', 'lexilink' ),
            'items_list_navigation' => __( 'Glosses list navigation', 'lexilink' ),
            'filter_items_list'     => __( 'Filter Glosses list', 'lexilink' ),
        );
        $args = array(
            'label'               => __( 'Glossary', 'lexilink' ),
            'labels'              => $labels,
            'description'         => __( 'Glossary', 'lexilink' ),
            'public'              => $public,
            'show_ui'             => true,
            'menu_position'       => 5,
            'menu_icon'           => LEXILINK_PLUGIN_URL . 'public/assets/images/logo-icon.png',
            'supports'            => $supports,
            'rewrite'             => array( 'slug' => 'glossary' ),
        );
        register_post_type( 'lexilink-glossary', $args );
    }

    /**
     * Add meta boxes
     */
    public function add_meta_boxes( $post_type, $post ) {

        add_meta_box(
            'lexilink-meta-box-custom-link',
            __( 'Custom Link', 'lexilink' ),
            array( $this, 'meta_box_content' ),
            'lexilink-glossary',
            'side',
            'low',
            array($post)
        );
    }

    /**
     * Meta box content
     */
    public function meta_box_content( $post ) {

        $settings_class = new Lexilink_Settings();
        $settings       = $settings_class->get_settings();

        if ( $settings['dedicated_page'] === '1' ) {
            
            echo wp_kses_post( '<p>' . __( 'The custom link functions only if the dedicated page is disabled.', 'lexilink' ) . '</p>' );
            return;
        }

        $custom_link = get_post_meta( $post->ID, self::CUSTOM_LINK_ID, true );
        if ( ! $custom_link ) {
            $custom_link = '';
        }

        ?>
        <label>
            <input type="url" style="width: 100%;" name="<?php echo esc_attr( self::CUSTOM_LINK_ID ); ?>" id="<?php echo esc_attr( self::CUSTOM_LINK_ID ); ?>" value="<?php echo esc_attr( $custom_link ); ?>">
        </label>
        <?php
    }

    /**
     * Save meta boxes
     */
    public function save_meta_boxes( $post_id, $post, $update ) {

        if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash ( $_POST['_wpnonce'] ) ) , 'lexilink-settings' ) ) return;

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        $custom_link = isset( $_POST[ self::CUSTOM_LINK_ID ] ) ? sanitize_url( $_POST[ self::CUSTOM_LINK_ID ] ) : '';
        if ( ! empty( $custom_link ) ) {
            update_post_meta( $post_id, self::CUSTOM_LINK_ID, $custom_link );
        }
    }
}
