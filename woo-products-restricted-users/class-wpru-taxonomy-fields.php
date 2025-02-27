<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPRU_Taxonomy_Fields{
    private $meta_fields;
    
    function __construct(){
        $wpru_metabox = new WPRU_Metabox();
        $this->meta_fields = $wpru_metabox->meta_fields();
    }

    function hooks(){
        add_action( 'product_cat_add_form_fields', array( $this, 'add_form_fields' ), PHP_INT_MAX );
        add_action( 'product_cat_edit_form_fields', array( $this, 'edit_form_fields' ), PHP_INT_MAX, 2 );
        add_action( 'create_product_cat', array( $this, 'save_taxonomy_meta_fields' ), 10, 2 );
        add_action( 'edited_product_cat', array( $this, 'save_taxonomy_meta_fields' ), 10, 2 );
        add_action( 'admin_footer', array( $this, 'scripts' ) );
    }

    public function add_form_fields() {
        $output = '<strong>WooCommerce Products Restricted Users</strong>';
        
        foreach ($this->meta_fields as $meta_field) {
            $label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
            
            switch ($meta_field['type']) {
                case 'select':
                    $input = sprintf(
                        '<select style="width:100%%;" %s id="%s" name="%s%s">',
                        $meta_field['multiple'] ? 'multiple' : '',
                        $meta_field['id'],
                        $meta_field['id'],
                        $meta_field['multiple'] ? '[]' : ''
                    );
    
                    foreach ($meta_field['options'] as $key => $value) {
                        if ($meta_field['multiple']) {
                            $input .= sprintf(
                                '<option %s value="%s">%s</option>',
                                '',
                                $key,
                                $value
                            );
                        } else {
                            $input .= sprintf(
                                '<option %s value="%s">%s</option>',
                                '',
                                $key,
                                $value
                            );
                        }
                    }
    
                    $input .= '</select>';
                    break;
    
                case 'checkbox':
                    $input = sprintf('<input type="checkbox" id="%s" name="%s">', $meta_field['id'], $meta_field['id'] );
                    break;
            }
    
            $output .= '<div class="form-field">' . $label . $input . '</div>';
        }
    
        echo $output;
    }

    function edit_form_fields( $term, $taxonomy ) {
        $output = '<tr class="form-field"><th scope="row" colspan="2">WooCommerce Products Restricted Users</th></tr>';

        array_unshift( $this->meta_fields, array(
            'label' => __( 'Update to all the products in the category', 'wpru' ),
            'id' => 'wpru_update_products',
            'type' => 'checkbox',
            'options' => false,
        ), );

		foreach ( $this->meta_fields as $meta_field ) {
			$label = '<th scope="row"><label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label></th>';
			$meta_value = get_term_meta( $term->term_id, $meta_field['id'], true );
            
			if ( empty( $meta_value ) ) {
				$meta_value = array();
			}

			switch ( $meta_field['type'] ) {
				case 'select':
					$input = sprintf( '<select style="width:100%%;" %s id="%s" name="%s%s">', $meta_field['multiple'] ? 'multiple' : '', $meta_field['id'], $meta_field['id'], $meta_field['multiple'] ? '[]' : '' );

					foreach ( $meta_field['options'] as $key => $value ) {
						if ( $meta_field['multiple'] ) {
							$input .= sprintf( '<option %s value="%s">%s</option>', in_array( $key, $meta_value ) ? 'selected' : '', $key, $value );
						} else {
							$input .= sprintf( '<option %s value="%s">%s</option>', ( $key == $meta_value ) ? 'selected' : '', $key, $value );
						}
					}

					$input .= '</select>';

					break;

				case 'checkbox':
					$checked = ( $meta_value == true ) ? 'checked="checked"' : '';
					$input = sprintf( '<input type="checkbox" multiple id="%s" name="%s" %s>', $meta_field['id'], $meta_field['id'], $checked );
					break;
			}

			$output .= '<tr class="form-field">' . $label . '<td>' . $input . '</td></tr>';
		}

		echo $output;
    }

    function save_taxonomy_meta_fields( $term_id ){
        $wpru_metabox = new WPRU_Metabox();
    	$mode = isset( $_POST['wpru_mode'] ) ? sanitize_text_field( wp_unslash( $_POST['wpru_mode'] ) ) : 'view';

        $wpru_users = array();
        $wpru_users_from_post = isset( $_POST['wpru_users'] ) ? $_POST['wpru_users'] : array();
        foreach ( $wpru_users_from_post as $wpru_user ) {
            $wpru_users[] = absint( $wpru_user );
        }

        if( isset( $_POST['wpru_enable'] ) && ! empty( $_POST['wpru_enable'] ) ) {
            update_term_meta( $term_id, 'wpru_enable', true );
            update_term_meta( $term_id, 'wpru_mode', $mode );
            update_term_meta( $term_id, 'wpru_users', $wpru_users );

            if( isset( $_POST['wpru_update_products'] ) && ! empty( $_POST['wpru_update_products'] ) ) {
                foreach( $this->get_products( $term_id ) as $post_id ){
                    update_post_meta( $post_id, 'wpru_enable', true );
                    update_post_meta( $post_id, 'wpru_mode', $mode );
                    update_post_meta( $post_id, 'wpru_users', $wpru_users );
                    
                    ( $mode === 'view' ) ? $wpru_metabox->refresh_allowed_products_users( $wpru_users, $post_id ) : $wpru_metabox->maybe_remove_allowed_products_users( $wpru_users, $post_id );
                }
            }
        } else {
            update_term_meta( $term_id, 'wpru_enable', false );
            update_term_meta( $term_id, 'wpru_users', array() );
            update_term_meta( $term_id, 'wpru_mode', 'restrict' );
            
            if( isset( $_POST['wpru_update_products'] ) && ! empty( $_POST['wpru_update_products'] ) ) {
                foreach( $this->get_products( $term_id ) as $post_id ){
                    update_post_meta( $post_id, 'wpru_enable', false );
                    update_post_meta( $post_id, 'wpru_users', array() );
                    update_post_meta( $post_id, 'wpru_mode', 'restrict' );
                    
                    $wpru_metabox->maybe_remove_allowed_products_users( $wpru_users, $post_id );
                }
            }
        }
    }

    function get_products( $term_id ){
        return get_posts( array(
            'fields'         => 'ids',
            'post_type'      => 'product',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'tax_query'      => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'term_id',
                    'terms'    => $term_id,
                ),
            ),
         ) );
    }

    public function scripts() {
		$screen = get_current_screen();
    
        if( !$screen || $screen->id != 'edit-product_cat' || $screen->taxonomy != 'product_cat')
            return;    
		?>
		<script type="text/javascript">
		jQuery( document ).ready( function( $ ){
			$( '#wpru_users' ).select2({
				width: 'element',
				minimumResultsForSearch: Infinity,
			});
		} )
		</script>
		<?php
	}
}