<?php
/**
 * Taxonomy Meta Fields
 *
 */

// Exit if accessed directly.
if ( ! defined('ABSPATH') ) {
    exit;
}

class Cre_Taxonomy_Fields {

    public static $_instance;

    public function __construct() {

        // Admin functions
        add_action( 'admin_init', array($this, 'admin_init' ) );
    }

    public static function instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Initialize things in the backend
     */
    public function admin_init() {

        // Get taxonomies
        $taxonomies = apply_filters( 'cre_taxonomy_thumbnail', ['property-location'] );

        // Loop through taxonomies
        foreach ( $taxonomies as $taxonomy ) {

            // Add forms
            add_action( $taxonomy . '_add_form_fields', array($this, 'add_form_fields' ), 10 );
            add_action( $taxonomy . '_edit_form_fields', array($this, 'edit_form_fields' ), 10, 2 );

            // Add columns
            if ( 'product_cat' != $taxonomy ) {
                add_filter( 'manage_edit-'. $taxonomy .'_columns', array($this, 'admin_columns' ) );
                add_filter( 'manage_'. $taxonomy .'_custom_column', array($this, 'admin_column' ), 10, 3 );
            }

            // Save forms
            add_action( 'created_'. $taxonomy, array($this, 'save_forms' ), 10, 3 );
            add_action( 'edit_'. $taxonomy, array($this, 'save_forms' ), 10, 3 );

        }

    }

    /**
     * Add Thumbnail field to add form fields
     *
     * @param $taxonomy
     */
    public function add_form_fields( $taxonomy ) {

        // Enqueue media for media selector
        wp_enqueue_media();

        ?>

        <div class="form-field term-thumbnail-wrap">

            <label for="term-thumbnail"><?php esc_html_e( 'Image', 'crucial-real-estate' ); ?></label>

            <div>

                <div id="cre-term-image" style="float:left;margin-right:10px;">
                    <img class="cre-term-image" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==" width="60px" height="60px" />
                </div>

                <input type="hidden" id="cre_property_taxonomy_image" name="cre_property_taxonomy_image" />

                <button type="submit" class="cre-remove-term-image button"><?php esc_html_e( 'Remove image', 'crucial-real-estate' ); ?></button>
                <button type="submit" class="cre-add-term-image button"><?php esc_html_e( 'Upload/Add image', 'crucial-real-estate' ); ?></button>

                <script type="text/javascript">

                    // Only show the "remove image" button when needed
                    if ( ! jQuery( '#cre_property_taxonomy_image' ).val() ) {
                        jQuery( '.cre-remove-term-image' ).hide();
                    }

                    // Uploading files
                    var file_frame;
                    jQuery( document ).on( 'click', '.cre-add-term-image', function( event ) {

                        event.preventDefault();

                        // If the media frame already exists, reopen it.
                        if ( file_frame ) {
                            file_frame.open();
                            return;
                        }

                        // Create the media frame.
                        file_frame = wp.media.frames.downloadable_file = wp.media({
                            title    : '<?php esc_html_e( 'Choose an image', 'crucial-real-estate' ); ?>',
                            button   : {
                                text : '<?php esc_html_e( 'Use image', 'crucial-real-estate' ); ?>',
                            },
                            multiple : false
                        });

                        // When an image is selected, run a callback.
                        file_frame.on( 'select', function() {
                            attachment = file_frame.state().get( 'selection' ).first().toJSON();
                            jQuery( '#cre_property_taxonomy_image' ).val( attachment.id );
                            jQuery( '.cre-term-image' ).attr( 'src', attachment.url );
                            jQuery( '.cre-remove-term-image' ).show();
                        });

                        // Finally, open the modal.
                        file_frame.open();

                    });

                    jQuery( document ).on( 'click', '.cre-remove-term-image', function( event ) {
                        jQuery( '.cre-term-image' ).attr( 'src', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==' );
                        jQuery( '#cre_property_taxonomy_image' ).val( '' );
                        jQuery( '.cre-remove-term-image' ).hide();
                        return false;
                    });

                </script>
            </div>
            <div class="clear"></div>
        </div>


        <?php
    }

    /**
     * Add Thumbnail field to edit form fields
     *
     * @param $term
     * @param $taxonomy
     */
    public function edit_form_fields( $term, $taxonomy ) {

        // Enqueue media for media selector
        wp_enqueue_media();

        // Get current taxonomy
        $term_id  = $term->term_id;

        // Get term data
        $term_data = cre_get_term_data();

        // Options not needed for Woo
        if ( 'product_cat' != $taxonomy ) :

            // Get thumbnail
            $thumbnail_id  = isset( $term_data[$term_id]['cre_property_taxonomy_image'] ) ? absint($term_data[$term_id]['cre_property_taxonomy_image']) : '';
            if ( $thumbnail_id ) {
                $thumbnail_src = wp_get_attachment_image_src( $thumbnail_id, 'cre_property_taxonomy_image', false );
                $thumbnail_url = ! empty( $thumbnail_src[0] ) ? $thumbnail_src[0] : '';
            } ?>

            <tr class="form-field">

                <th scope="row" valign="top">
                    <label for="term-thumbnail"><?php esc_html_e( 'Image', 'crucial-real-estate' ); ?></label>
                </th>

                <td>

                    <div id="cre-term-image" style="float:left;margin-right:10px;">
                        <?php if ( ! empty( $thumbnail_url ) ) { ?>
                            <img class="cre-term-image" src="<?php echo esc_url( $thumbnail_url ); ?>" width="60px" height="60px" alt="<?php esc_attr_e( 'Location Image', 'crucial-real-estate' ); ?>"/>
                        <?php } else { ?>
                            <img class="cre-term-image" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==" width="60px" height="60px" alt="<?php esc_attr_e( 'Location Image', 'crucial-real-estate' ); ?>" />
                        <?php } ?>
                    </div>

                    <input type="hidden" id="cre_property_taxonomy_image" name="cre_property_taxonomy_image" value="<?php echo esc_attr( $thumbnail_id ); ?>" />

                    <button type="submit" class="cre-remove-term-image button"<?php if ( ! $thumbnail_id ) echo 'style="display:none;"'; ?>>
                        <?php esc_html_e( 'Remove image', 'crucial-real-estate' ); ?>
                    </button>

                    <button type="submit" class="cre-add-term-image button">
                        <?php esc_html_e( 'Upload/Add image', 'crucial-real-estate' ); ?>
                    </button>

                    <script type="text/javascript">

                        // Uploading files
                        var file_frame;

                        jQuery( document ).on( 'click', '.cre-add-term-image', function( event ) {

                            event.preventDefault();

                            // If the media frame already exists, reopen it.
                            if ( file_frame ) {
                                file_frame.open();
                                return;
                            }

                            // Create the media frame.
                            file_frame = wp.media.frames.downloadable_file = wp.media({
                                title    : '<?php esc_html_e( 'Choose an image', 'crucial-real-estate' ); ?>',
                                button   : {
                                    text : '<?php esc_html_e( 'Use image', 'crucial-real-estate' ); ?>',
                                },
                                multiple : false
                            } );

                            // When an image is selected, run a callback.
                            file_frame.on( 'select', function() {
                                attachment = file_frame.state().get( 'selection' ).first().toJSON();
                                jQuery( '#cre_property_taxonomy_image' ).val( attachment.id );
                                jQuery( '.cre-term-image' ).attr( 'src', attachment.url );
                                jQuery( '.cre-remove-term-image' ).show();
                            } );

                            // Finally, open the modal.
                            file_frame.open();

                        } );

                        jQuery( document ).on( 'click', '.cre-remove-term-image', function( event ) {
                            jQuery( '.cre-term-image' ).attr( 'src', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==' );
                            jQuery( '#cre_property_taxonomy_image' ).val( '' );
                            jQuery( '.cre-remove-term-image' ).hide();
                            return false;
                        } );
                    </script>

                    <div class="clear"></div>
                </td>

            </tr>

        <?php endif; ?>

        <?php

    }

    /**
     * Adds the thumbnail to the database
     *
     * @param $term_id
     * @param $key
     * @param $data
     */
    public function add_term_data( $term_id, $key, $data ) {

        // Validate data
        if ( empty( $term_id ) || empty( $data ) || empty( $key ) ) {
            return;
        }

        // Get thumbnails
        $term_data = get_option( 'cre_term_data' );

        // Add to options
        $term_data[$term_id][$key] = $data;

        // Update option
        update_option( 'cre_term_data', $term_data );

    }

    /**
     * Deletes the thumbnail from the database
     *
     * @param $term_id
     * @param $key
     */
    public function remove_term_data( $term_id, $key ) {

        // Validate data
        if ( empty( $term_id ) || empty( $key ) ) {
            return;
        }

        // Get thumbnails
        $term_data = get_option( 'cre_term_data' );

        // Add to options
        if ( isset( $term_data[$term_id][$key] ) ) {
            unset( $term_data[$term_id][$key] );
        }

        // Update option
        update_option( 'cre_term_data', $term_data );

    }

    /**
     * Update thumbnail value
     *
     * @param $term_id
     * @param $thumbnail_id
     */
    public function update_thumbnail( $term_id, $thumbnail_id ) {

        // Add thumbnail
        if ( ! empty( $thumbnail_id ) ) {
            self::add_term_data( $term_id, 'cre_property_taxonomy_image', $thumbnail_id );
        }

        // Delete thumbnail
        else {
            self::remove_term_data( $term_id, 'cre_property_taxonomy_image' );
        }
    }

    /**
     * Save Forms
     *
     * @param $term_id
     */
    public function save_forms( $term_id ) {
        if ( isset( $_POST['cre_property_taxonomy_image'] ) ) {
            self::update_thumbnail( $term_id, absint( $_POST['cre_property_taxonomy_image'] ) );
        }
    }

    /**
     * Thumbnail column added to category admin.
     *
     * @param $columns
     * @return array
     */
    public function admin_columns( $columns ) {
        $columns['cre-term-image-col'] = esc_html__( 'Image', 'crucial-real-estate' );
        return $columns;
    }

    /**
     * Thumbnail column value added to category admin.
     *
     * @param $columns
     * @param $column
     * @param $id
     *
     * @return void
     */
    public function admin_column( $columns, $column, $id ) {

        // Add thumbnail to columns
        if ( 'cre-term-image-col' == $column ) {
            if ( $thumbnail_id = self::get_term_thumbnail_id( $id ) ) {
                $image = wp_get_attachment_image_src( $thumbnail_id, 'cre_property_taxonomy_image' );
                $image = $image[0];
                $columns .= '<img src="' . esc_url( $image ) . '" alt="' . esc_attr__( 'Location Image', 'crucial-real-estate' ) . '" class="wp-post-image" height="48" width="48" />';
            } else {
                $columns .= '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==" alt="' . esc_attr__( 'Location Image', 'crucial-real-estate' ) . '" class="wp-post-image" height="48" width="48" />';
            }

        }

        // Return columns
        return $columns;

    }

    /**
     * Retrieve term thumbnail
     *
     * @param null $term_id
     * @return integer
     */
    public function get_term_thumbnail_id( $term_id = null ) {

        // Get term id if not defined and is tax
        $term_id = $term_id ? $term_id : get_queried_object()->term_id;

        // Return if no term id
        if ( ! $term_id ) {
            return;
        }

        // Get data
        $term_data = get_option( 'cre_term_data' );
        $term_data = ! empty( $term_data[$term_id] ) ? $term_data[$term_id] : '';

        // Return thumbnail ID
        if ( $term_data && ! empty( $term_data['cre_property_taxonomy_image'] ) ) {
            return absint($term_data['cre_property_taxonomy_image']);
        }

    }
}

/**
 * Initialize cre taxonomy fields class.
 */
function cre_taxonomy_fields() {
    return Cre_Taxonomy_Fields::instance();
}
cre_taxonomy_fields();

/*----------------------------------------------------------------------
# Retrieve all term data
-------------------------------------------------------------------------*/
function cre_get_term_data() {
    return get_option( 'cre_term_data' );
}
