<?php

if ( !class_exists('ADL_team_custom_taxonomy') ):
class ADL_team_custom_taxonomy {

    public function __construct() {
        add_action( 'init', array($this, 'add_custom_taxonomy'), 0 );

    }

    function add_custom_taxonomy() {
        $designation_labels = array(
            'name'              => _x( 'Designation', 'taxonomy general name', ADL_TEAM_TEXTDOMAIN ),
            'singular_name'     => _x( 'Designation', 'taxonomy singular name', ADL_TEAM_TEXTDOMAIN ),
            'search_items'      => __( 'Search Designation', ADL_TEAM_TEXTDOMAIN ),
            'all_items'         => __( 'All Designation', ADL_TEAM_TEXTDOMAIN ),
            'parent_item'       => __( 'Parent Designation', ADL_TEAM_TEXTDOMAIN ),
            'parent_item_colon' => __( 'Parent Designation:', ADL_TEAM_TEXTDOMAIN ),
            'edit_item'         => __( 'Edit Designation', ADL_TEAM_TEXTDOMAIN ),
            'update_item'       => __( 'Update Designation', ADL_TEAM_TEXTDOMAIN ),
            'add_new_item'      => __( 'Add New Designation', ADL_TEAM_TEXTDOMAIN ),
            'new_item_name'     => __( 'New Designation Name', ADL_TEAM_TEXTDOMAIN ),
            'menu_name'         => __( 'Designations', ADL_TEAM_TEXTDOMAIN ),
        );

        $designation_args = array(
            'hierarchical'      => true,
            'labels'            => $designation_labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => ADL_TEAM_POST_TYPE.'-designation' ), // eg. adl-team-designation
        );


        register_taxonomy( ADL_TEAM_POST_TYPE.'-designation', ADL_TEAM_POST_TYPE, $designation_args );
    }


    /**
     * Display Members designations markup for shortcode generator
     * @param string $term_name The name of the term whose items should be listed
     * @param array $var_name The name of the variable that will store the data
     * @param array $old_terms The name of the variable that will have old term data
     * @return string An unordered list of all items of the given term
     */
    public function list_term_items($term_name = '', $var_name=array(), $old_terms = array() ){
        global $post;
        $old_terms = (!is_array($old_terms)) ? (array) $old_terms : $old_terms;

        $terms = get_terms($term_name);

        echo '<div class="adl-team-checkbox-wrapper">';

        if(empty($terms)) {
            printf("N0 %s Found.", $term_name);
        } else {
            echo '<ul class="cmb2-list">';
            foreach ( $terms as $term ) {
                if ( in_array( $term->term_id, $old_terms ) ) {
                    echo "<li class='{$term->term_id}'> <input class='custom_terms' id='custom_terms_{$term->name}' type='checkbox' checked name={$var_name}[{$term->term_id}] value ='{$term->term_id}' /><label for='custom_terms_{$term->name}' > {$term->name} </label ></li>";
                }
                else {
                    echo "<li class='{$term->term_id}'> <input class='custom_terms' id='custom_terms_{$term->name}' type='checkbox' name={$var_name}[{$term->term_id}] value ='{$term->term_id}' /><label for='custom_terms_{$term->name}' > {$term->name} </label ></li>";
                }
            }
        }
        echo '</ul></div>';
    }


    public function display_terms_of_post( $post_id, $term_name = 'category' ) {
        /* Get the bs3d-categories for the post. */
        global $post;
        $terms = get_the_terms( $post_id, $term_name );

        /* If terms were found. */
        if ( !empty( $terms ) ) {

            $out = array();

            /* Loop through each term, linking to the 'edit posts' page for the specific term. */
            foreach ( $terms as $term ) {
                $out[] = sprintf( '<a href="%s">%s</a>',
                    esc_url( add_query_arg( array( 'post_type' => $post->post_type, $term_name => $term->slug ), 'edit.php' ) ),
                    esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, $term_name, 'display' ) )
                );
            }

            /* Join the terms, separating them with a comma. */
            echo join( ', ', $out );
        }

        /* If no terms were found, output a default message. */
        else {
            esc_html_e( 'No Category', ADL_TEAM_TEXTDOMAIN );
        }
    }


}


endif;