<?php

/**
 * Change the columns title to display on Books post type
 * @param $new_columns
 *
 * @return array
 */
function bs3d_add_new_columns($new_columns){
    $new_columns = [];
    $new_columns['cb']   = '<input type="checkbox" />';
    $new_columns['title']   = __('Book Name', BS3D_TEXTDOMAIN);
    $new_columns['book-author']   = __('Book Author', BS3D_TEXTDOMAIN);
    $new_columns['date']   = __('Created at', BS3D_TEXTDOMAIN);
    return $new_columns;
}
add_filter('manage_edit-bs3dbook_columns', 'bs3d_add_new_columns');

function bs3d_manage_custom_columns( $column_name, $post_id ) {

    switch($column_name){
        case 'book-author':
            echo  esc_attr( get_post_meta( $post_id, 'bs3d_author_name', true ));
            break;

        case 'bs3d_book_id':
            echo $post_id;
            break;

        default:
            break;

    }
}

add_action('manage_bs3dbook_posts_custom_column', 'bs3d_manage_custom_columns', 10, 2);



/**
 * Change the columns names for our Shortcode generator
 * @param $new_columns
 *
 * @return array
 */
function bs3d_add_new_columns_for_shortcode($new_columns){
    $new_columns = [];
    $new_columns['cb']   = '<input type="checkbox" />';
    $new_columns['title']   = __('Shortcode Name', BS3D_TEXTDOMAIN);
    $new_columns['bs3d_shortcode_column']   = __('Book Showcase Shortcode', BS3D_TEXTDOMAIN);
    $new_columns['bs3d_shortcode_column_2']   = __('Shortcode For Template File', BS3D_TEXTDOMAIN);
    $new_columns['date']   = __('Created at', BS3D_TEXTDOMAIN);
    return $new_columns;
}
add_filter('manage_bs3d_sgenerator_posts_columns', 'bs3d_add_new_columns_for_shortcode');

function bs3d_manage_custom_columns_for_shortcode( $column_name, $post_id ) {

    switch($column_name){
        case 'bs3d_shortcode_column': ?>
            <textarea style="resize: none; background-color: #0073AA; color: #fff;" cols="24" rows="1" onClick="this.select();" >[book_showcase <?php echo 'id="'.$post_id.'"';?>]</textarea>
        <?php
        break;
        case 'bs3d_shortcode_column_2':
            ?>
                    <textarea style="resize: none; background-color: #0073AA; color: #fff; " cols="54" rows="1" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[book_showcase id='; echo "'".$post_id."']"; echo '"); ?>'; ?></textarea>
            <?php
            break;

        default:
            break;

    }
}



add_action('manage_bs3d_sgenerator_posts_custom_column', 'bs3d_manage_custom_columns_for_shortcode', 10, 2);
/**
 * Display custom category of book post type
 * @param int $post_id current post id
 */
function bs3d_display_terms_of_books( $post_id ) {
        /* Get the bs3d-categories for the post. */
        global $post;
        $terms = get_the_terms( $post_id, 'bs3d-category' );

        /* If terms were found. */
        if ( !empty( $terms ) ) {

            $out = array();

            /* Loop through each term, linking to the 'edit posts' page for the specific term. */
            foreach ( $terms as $term ) {
                $out[] = sprintf( '<a href="%s">%s</a>',
                    esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'bs3d-category' => $term->slug ), 'edit.php' ) ),
                    esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'bs3d-category', 'display' ) )
                );
            }

            /* Join the terms, separating them with a comma. */
            echo join( ', ', $out );
        }

        /* If no terms were found, output a default message. */
        else {
            _e( 'No Category', BS3D_TEXTDOMAIN );
        }
    }
