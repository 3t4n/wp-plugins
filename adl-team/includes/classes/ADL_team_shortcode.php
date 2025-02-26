<?php
if ( !class_exists('ADL_team_shortcode') ):

class ADL_team_shortcode {



    public function __construct() {
        add_shortcode( 'adl-team', array( $this, 'adl_team_shortcode' ) );
    }

    public function adl_team_shortcode($atts, $content = null, $sc_name) {
        global $ADL_team;
        ob_start();
        extract(shortcode_atts( array( 'id' => ""), $atts, $sc_name));

        $this->enqueue_required_scripts();
        // get all value from db
        $gs = get_post_meta( $id, 'gs' , true); // serialized and encoded value of array
        // validate  and make usable vars.
        $general_setting = ( !empty($gs) ) ? unserialize( base64_decode( $gs )) : array(); // multi array
        extract($general_setting);



        /*
         * BUILD THE QUERY ARGUMENTS
         * --------------------
         *
         */
        //for pagination
        if ( get_query_var('paged') ) {
            $paged = get_query_var('paged');
        } elseif ( get_query_var('page') ) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }
        $query_type = (!empty($query_type))? $query_type : 'date'; // set default query type
        // show all posts for slider layout, so set $total_members = -1
        if ( $general_setting['theme_name'] == 'style3' ||  $general_setting['theme_name'] == 'style4') {
            $total_members = -1;
        }
        $common_args = array(
            'post_type' => ADL_TEAM_POST_TYPE,
            'posts_per_page'=> ( !empty($total_members) ) ?  (int) $total_members : -1 ,
            'paged'         => $paged,
            'orderby'   => 'date',
            'order'     => ( !empty($arrange_type) ) ?  $arrange_type : 'ASC' ,
        );

        if ( 'date' == $query_type ) { $args = $common_args; }
        elseif ('by_designation' == $query_type) {
            $designations = array(
                'tax_query' => array(
                    array(
                        'taxonomy' => 'adl-team-designation',
                        'field'    => 'term_id',
                        'terms'    => ( !empty($custom_terms) ) ?  (array) $custom_terms : null,
                    ),

                ),
            );
            $args = array_merge($common_args, $designations);
        } elseif ('title' == $query_type) {
            $title = array(
                'orderby'   => 'title',
            );
            $args = array_merge($common_args, $title);
        }elseif ('by_id' == $query_type) {
            $books_by_id = array(
                'post__in' => (!empty($member_ids)) ? array_map('trim', explode(',', $member_ids)) : null,
            );
            $args = array_merge($common_args, $books_by_id);
        }
        $members = new WP_Query($args);
        //we need loop, paged and nav_text for pagination, nav_text is available on helper class, so add paged var to gen setting.
        $general_setting['paged'] = $paged;
        $data = array(
            'loop'          => $members,
            'general_info'                => $general_setting,
        );

        if ( $members->have_posts() ) {
            $ADL_team->loadView('themes/'.$general_setting['theme_name'].'/index', $data);
            wp_reset_postdata();
        }

        $content = ob_get_clean();
        return $content;
    }

    private function enqueue_required_scripts(  ) {
        // enqueue styles and scripts for this shortcode


        wp_enqueue_style('adl-team-core-style');
        wp_enqueue_style('featherlight');

        wp_enqueue_script('adl-team-public-js');
        wp_enqueue_script('featherlight-js');

    }

}


endif;