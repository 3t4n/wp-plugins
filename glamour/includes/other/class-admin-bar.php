<?php

namespace glamour\other;


class Admin_Bar {
    function __construct() {
        add_action( 'admin_bar_menu', array($this, 'admin_bar_menu'), 999 );
        add_action('wp_head', array($this, 'admin_bar_style'));
        add_action('admin_head', array($this, 'admin_bar_style'));
        add_action( 'init', array($this, 'hide_adminbar') );
    }

    public function admin_bar_menu( $wp_admin_bar ) {
        global $wp, $wp_query;

        $glmr = isset($_GET['glmr']) ? $_GET['glmr'] : '';
        
        if($glmr != 'yes' && !is_admin() && current_user_can('manage_options')){
            $raw_link = home_url( $wp->request );

            if (isset($wp_query->queried_object)) {
                $post_id = @$wp_query->queried_object->ID;
            } else {
                $post_id = null;
            }

            $post_type = 'page';

            if($post_id){
                $post = get_post($post_id);
                $post_type_object = get_post_type_object( $post->post_type );

                $post_type = $post_type_object->labels->singular_name;
            }
            

            $queries = explode("&", $wp->query_string);
            $url_args = array();
            if(!empty($queries)){
                foreach($queries as $query){
                    $argArray = explode("=", $query);
                    if(isset($argArray[0]) && isset($argArray[1])){
                        $url_args[$argArray[0]] = $argArray[1];
                    }
                }
            }

            $args = array(
                'id'    => 'glamour_css_edit',
                'title' => esc_html__( 'Style with Glamour', 'glamour' ),
                'href'  => '',
                'meta'  => array( 'class' => 'my-toolbar-page' )
            );
            $wp_admin_bar->add_node( $args );

            $args = array(
                'id'    => 'glamour_css_edit_global',
                'title' => esc_html__( 'Style Globally', 'glamour' ),
                'href'  => esc_url(
                    add_query_arg(
                        array_merge($url_args, array(
                            'glamour' => 'edit',
                            'glmrmode' => 'global',
                        )),
                        $raw_link
                    )
                ),
                'meta'  => array( 'class' => 'my-toolbar-page' ),
                'parent' => 'glamour_css_edit'
            );
            $wp_admin_bar->add_node( $args );

            $args = array(
                'id'    => 'glamour_css_edit_single_post',
                'title' =>  sprintf(esc_html__( 'Style this %s', 'glamour' ),  $post_type),
                'href'  => esc_url(
                    add_query_arg(
                        array_merge($url_args, array(
                            'glamour' => 'edit',
                            'glmrmode' => 'single',
                        )),
                        $raw_link
                    )
                ),
                'meta'  => array( 'class' => 'my-toolbar-page' ),
                'parent' => 'glamour_css_edit'
            );
            $wp_admin_bar->add_node( $args );
        } else if(is_admin() && current_user_can('manage_options')){
            $current_screen = get_current_screen();
            $post = get_post();
            if ( 'post' == $current_screen->base
                && 'add' != $current_screen->action
                && ( $post_type_object = get_post_type_object( $post->post_type ) )
                && current_user_can( 'read_post', $post->ID )
                && ( $post_type_object->public )
                && ( $post_type_object->show_in_admin_bar ) )
            {
                if ( 'draft' == $post->post_status ) {
                    $preview_link = get_preview_post_link( $post );
                    $wp_admin_bar->add_menu( array(
                        'id' => 'glamour_css_edit_single',
                        'title' => sprintf(esc_html__( 'Style this %s', 'glamour' ),  $post_type_object->labels->singular_name),
                        'href' => esc_url( 
                            add_query_arg(
                                array(
                                    'glamour' => 'edit',
                                    'glmrmode' => 'single',
                                ),
                                $preview_link
                            )
                        ),
                        'meta' => array( 'target' => '_blank' ),
                    ) );
                } else {
                    $wp_admin_bar->add_menu( array(
                        'id' => 'glamour_css_edit_single',
                        'title' => sprintf(esc_html__( 'Style this %s', 'glamour' ),  $post_type_object->labels->singular_name),
                        'href' => esc_url( 
                            add_query_arg(
                                array(
                                    'glamour' => 'edit',
                                    'glmrmode' => 'single',
                                ),
                                get_permalink( $post->ID )
                            )
                        ),
                        'meta' => array( 'target' => '_blank' ),
                    ) );
                }
            }
        }
    }

    function admin_bar_style(){
        if(is_user_logged_in() && current_user_can('manage_options')){
            ?>
            <style type='text/css'>#wpadminbar #wp-admin-bar-glamour_css_edit > div.ab-item::before, #wpadminbar #wp-admin-bar-glamour_css_edit_single > a::before{content: "\f540";top: 3px;font-size: 18px;}</style>
            <?php
        }
    }

    function hide_adminbar(){
        if(isset($_GET['glmr']) && $_GET['glmr'] == 'yes'){
            show_admin_bar( false );
        }
    }
}