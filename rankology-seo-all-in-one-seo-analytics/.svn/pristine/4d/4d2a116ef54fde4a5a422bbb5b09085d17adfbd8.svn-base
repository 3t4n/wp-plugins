<?php
defined( 'ABSPATH' ) or die( 'Please don&rsquo;t call the plugin directly. Thanks :)' );

//Dublin Core
//=================================================================================================
//DC Tags
if (rankology_fno_get_service('OptionPro')->getDublinCoreEnable() ==='1') { //Is DC enable
    if (is_singular() || is_home()) { //Is Singular (post, page, cpt)
        function rankology_dublin_core_title_hook() {
            if (function_exists('rankology_titles_the_title') && rankology_titles_the_title() !='') {
                $rankology_dublin_core_title = '<meta name="dc.title" content="'.rankology_titles_the_title().'">';

                //Hook on post Dublin Core Title - 'rankology_dublin_core_title'
                if (has_filter('rankology_dublin_core_title')) {
                    $rankology_dublin_core_title = apply_filters('rankology_dublin_core_title', $rankology_dublin_core_title);
                }
                echo $rankology_dublin_core_title."\n";
            }
        }
        add_action( 'wp_head', 'rankology_dublin_core_title_hook', 1 );
        //DC Description
        function rankology_dublin_core_description_hook() {
            if (function_exists('rankology_titles_the_description_content') && rankology_titles_the_description_content() !='') {
                $rankology_dublin_core_desc = '<meta name="dc.description" content="'.rankology_titles_the_description_content().'">';

                //Hook on post Dublin Core Description - 'rankology_dublin_core_desc'
                if (has_filter('rankology_dublin_core_desc')) {
                    $rankology_dublin_core_desc = apply_filters('rankology_dublin_core_desc', $rankology_dublin_core_desc);
                }
                echo $rankology_dublin_core_desc."\n";
            }
        }
        add_action( 'wp_head', 'rankology_dublin_core_description_hook', 1 );

        //DC Relation
        function rankology_dublin_core_relation_hook() {
            //Init
            $rankology_dublin_core_relation ='';
            $page_id = get_option( 'page_for_posts' );;

            if ( is_home() && get_post_meta($page_id,'_rankology_robots_canonical',true) !='') {
                $_rankology_robots_canonical = get_post_meta($page_id,'_rankology_robots_canonical',true);
                $rankology_dublin_core_relation = '<meta name="dc.relation" content="'.htmlspecialchars(urldecode($_rankology_robots_canonical)).'">';
            } elseif (get_post_meta(get_the_ID(),'_rankology_robots_canonical',true) !='') { //IS METABOXE
                $_rankology_robots_canonical = get_post_meta(get_the_ID(),'_rankology_robots_canonical',true);
                $rankology_dublin_core_relation = '<meta name="dc.relation" content="'.htmlspecialchars(urldecode($_rankology_robots_canonical)).'">';
            } else {
                global $wp;
                $current_url = user_trailingslashit(home_url(add_query_arg(array(), $wp->request)));
                $rankology_dublin_core_relation = '<meta name="dc.relation" content="'.htmlspecialchars(urldecode($current_url)).'">';
            }
            //Hook on post Dublin Core Relation - 'rankology_dublin_core_relation'
            if (has_filter('rankology_dublin_core_relation')) {
                $rankology_dublin_core_relation = apply_filters('rankology_dublin_core_relation', $rankology_dublin_core_relation);
            }

            if (isset($rankology_dublin_core_relation) && $rankology_dublin_core_relation !='') {
                echo $rankology_dublin_core_relation."\n";
            }
        }
        add_action( 'wp_head', 'rankology_dublin_core_relation_hook', 1 );

        //DC Source
        function rankology_dublin_core_source_hook() {
            $rankology_dublin_core_source = '<meta name="dc.source" content="'.htmlspecialchars(urldecode(user_trailingslashit(get_home_url()))).'">';

            //Hook on post Dublin Core Source - 'rankology_dublin_core_source'
            if (has_filter('rankology_dublin_core_source')) {
                $rankology_dublin_core_source = apply_filters('rankology_dublin_core_source', $rankology_dublin_core_source);
            }
            echo $rankology_dublin_core_source."\n";
        }
        add_action( 'wp_head', 'rankology_dublin_core_source_hook', 1 );

        //DC Language
        function rankology_dublin_core_language_hook() {
            $rankology_dc_language = '<meta name="dc.language" content="'.get_locale().'">';

            //Hook on post Dublin Core Source - 'rankology_dublin_core_language'
            if (has_filter('rankology_dublin_core_language')) {
                $rankology_dc_language = apply_filters('rankology_dublin_core_language', $rankology_dc_language);
            }

            echo $rankology_dc_language."\n";
        }
        add_action( 'wp_head', 'rankology_dublin_core_language_hook', 1 );
    }
}
