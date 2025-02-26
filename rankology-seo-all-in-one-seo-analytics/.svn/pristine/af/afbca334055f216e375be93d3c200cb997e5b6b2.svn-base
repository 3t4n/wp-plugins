<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//XML

//Headers
rankology_get_service('SitemapHeaders')->printHeaders();

//Remove primary category
remove_filter('post_link_category', 'rankology_titles_primary_cat_hook', 10, 3);

//WPML - Home URL
if ( 2 == apply_filters( 'wpml_setting', false, 'language_negotiation_type' ) ) {
    add_filter('rankology_sitemaps_home_url', function($home_url) {
        $home_url = apply_filters( 'wpml_home_url', get_option( 'home' ));
        return trailingslashit($home_url);
    });
} else {
    add_filter('wpml_get_home_url', 'rankology_remove_wpml_home_url_filter', 20, 5);
}

add_filter('rankology_sitemaps_video_query', function ($args) {
    global $sitepress, $sitepress_settings;

    $sitepress_settings['auto_adjust_ids'] = 0;
    remove_filter('terms_clauses', [$sitepress, 'terms_clauses']);
    remove_filter('category_link', [$sitepress, 'category_link_adjust_id'], 1);

    //If multidomain setup
    if ( 2 == apply_filters( 'wpml_setting', false, 'language_negotiation_type' ) ) {
        $args['suppress_filters'] = false;
    }

    return $args;
});

function rankology_xml_sitemap_video() {
    $offset = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '.xml');
    $offset = preg_match_all('/\d+/', $offset, $matches);
    $offset = end($matches[0]);

    //Max posts per paginated sitemap
    $max = 1000;
    $max = apply_filters('rankology_sitemaps_max_videos_per_sitemap', $max);

    if (isset($offset) && absint($offset) && '' != $offset && 0 != $offset) {
        $offset = (($offset - 1) * $max);
    } else {
        $offset = 0;
    }

    $home_url = home_url() . '/';

    if (function_exists('pll_home_url')) {
        $home_url = site_url() . '/';
    }

    $home_url = apply_filters('rankology_sitemaps_home_url', $home_url);

    $rankology_sitemaps ='<?xml version="1.0" encoding="UTF-8"?>';
    $rankology_sitemaps .= '<?xml-stylesheet type="text/xsl" href="' . $home_url . 'sitemaps_video_xsl.xsl"?>';
    $rankology_sitemaps .= "\n";
    $rankology_sitemaps .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">';

    //CPT
    if (!empty(rankology_get_service('SitemapOption')->getPostTypesList())) {
        $cpt = [];
        foreach (rankology_get_service('SitemapOption')->getPostTypesList() as $cpt_key => $cpt_value) {
            foreach ($cpt_value as $_cpt_key => $_cpt_value) {
                if ('1' == $_cpt_value) {
                    $cpt[] = $cpt_key;
                }
            }
        }

        $args = [
            'post_type'           => $cpt,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
            'posts_per_page'      => 1000,
            'offset'              => $offset,
            'order'        => 'DESC',
            'orderby'      => 'modified',
            'lang'         => '',
            'has_password' => false,
        ];

        $args      = apply_filters('rankology_sitemaps_video_query', $args, $cpt_key);
        $postslist = get_posts($args);


        foreach ($postslist as $post) {
            setup_postdata($post);

            //If noindex, continue to next post
            if (get_post_meta($post->ID, '_rankology_robots_index', true) ==='yes') {
                continue;
            }

            $rankology_video_disabled     	= get_post_meta($post->ID, '_rankology_video_disabled', true);
            $rankology_video     			= get_post_meta($post->ID, '_rankology_video');
            $rankology_video_xml_yt     		= get_post_meta($post->ID, '_rankology_video_xml_yt', true);

            if (( ! empty($rankology_video[0][0]['url']) || !empty($rankology_video_xml_yt) ) && 'yes' != $rankology_video_disabled) {
                $rankology_sitemaps .= "\n";
                $rankology_sitemaps .= '<url>';
                $rankology_sitemaps .= "\n";
                $rankology_sitemaps .= '<loc>';
                $rankology_sitemaps .= htmlspecialchars(urldecode(get_permalink($post->ID)));
                $rankology_sitemaps .= '</loc>';
                $rankology_sitemaps .= "\n";

                if (isset($rankology_video_xml_yt)) {
                    $rankology_sitemaps .= $rankology_video_xml_yt;
                }

                if (! empty($rankology_video[0][0]['url'])) {
                    foreach ($rankology_video[0] as $key => $value) {
                        $rankology_sitemaps .= '<video:video>';
                        $rankology_sitemaps .= "\n";

                        //Thumbnail
                        $thumbnail = isset($rankology_video[0][$key]['thumbnail']) ? $rankology_video[0][$key]['thumbnail'] : null;
                        if ('' != $thumbnail) {//Video Thumbnail
                            $rankology_sitemaps .= '<video:thumbnail_loc>' . htmlspecialchars(urldecode(esc_attr(wp_filter_nohtml_kses($thumbnail)))) . '</video:thumbnail_loc>';
                            $rankology_sitemaps .= "\n";
                        } elseif ('' != get_the_post_thumbnail_url($post->ID, 'full')) {//Post Thumbnail
                            $rankology_sitemaps .= '<video:thumbnail_loc>' . htmlspecialchars(urldecode(esc_attr(wp_filter_nohtml_kses(get_the_post_thumbnail_url($post->ID, 'full'))))) . '</video:thumbnail_loc>';
                            $rankology_sitemaps .= "\n";
                        }

                        //Post Title
                        $title = isset($rankology_video[0][$key]['title']) ? $rankology_video[0][$key]['title'] : null;
                        if ('' != $title) {//Video Title
                            $rankology_sitemaps .= '<video:title><![CDATA[' . $title . ']]></video:title>';
                            $rankology_sitemaps .= "\n";
                        } elseif ('' != get_post_meta($post->ID, '_rankology_titles_title', true)) {//SEO Custom Title
                            $rankology_sitemaps .= '<video:title><![CDATA[' . get_post_meta($post->ID, '_rankology_titles_title', true) . ']]></video:title>';
                            $rankology_sitemaps .= "\n";
                        } elseif ('' != get_the_title($post->ID)) {//Post title
                            $rankology_sitemaps .= '<video:title><![CDATA[' . get_the_title($post->ID) . ']]></video:title>';
                            $rankology_sitemaps .= "\n";
                        }

                        //Description
                        $desc = isset($rankology_video[0][$key]['desc']) ? $rankology_video[0][$key]['desc'] : null;
                        if ('' != $desc) {//Video Description
                            $rankology_sitemaps .= '<video:description><![CDATA[' . $desc . ']]></video:description>';
                            $rankology_sitemaps .= "\n";
                        } elseif ('' != get_post_meta($post->ID, '_rankology_titles_desc', true)) {//SEO Custom Meta desc
                            $rankology_sitemaps .= '<video:description><![CDATA[' . get_post_meta($post->ID, '_rankology_titles_desc', true) . ']]></video:description>';
                            $rankology_sitemaps .= "\n";
                        } elseif ('' != get_the_excerpt($post->ID)) {//Excerpt
                            $rankology_sitemaps .= '<video:description><![CDATA[' . wp_trim_words(esc_attr(wp_filter_nohtml_kses(htmlentities(get_the_excerpt($post->ID)))), 60) . ']]></video:description>';
                            $rankology_sitemaps .= "\n";
                        }

                        //URL
                        $internal_video = isset($rankology_video[0][$key]['internal_video']) ? $rankology_video[0][$key]['internal_video'] : null;
                        $url            = isset($rankology_video[0][$key]['url']) ? $rankology_video[0][$key]['url'] : null;

                        if ('' != $url && '' != $internal_video) {
                            $rankology_sitemaps .= '<video:content_loc><![CDATA[' . $url . ']]></video:content_loc>';
                            $rankology_sitemaps .= "\n";
                        } elseif ('' != $url) {
                            $rankology_sitemaps .= '<video:player_loc><![CDATA[' . $url . ']]></video:player_loc>';
                            $rankology_sitemaps .= "\n";
                        }

                        //Duration
                        $duration = isset($rankology_video[0][$key]['duration']) ? $rankology_video[0][$key]['duration'] : null;
                        if ('' != $duration) {
                            $rankology_sitemaps .= '<video:duration>' . $duration . '</video:duration>';
                            $rankology_sitemaps .= "\n";
                        }

                        //Rating
                        $rating = isset($rankology_video[0][$key]['rating']) ? $rankology_video[0][$key]['rating'] : null;
                        if ('' != $rating) {
                            $rankology_sitemaps .= '<video:rating>' . $rating . '</video:rating>';
                            $rankology_sitemaps .= "\n";
                        }

                        //View count
                        $view_count = isset($rankology_video[0][$key]['view_count']) ? $rankology_video[0][$key]['view_count'] : null;
                        if ('' != $view_count) {
                            $rankology_sitemaps .= '<video:view_count>' . $view_count . '</video:view_count>';
                            $rankology_sitemaps .= "\n";
                        }

                        //Publication date
                        $rankology_sitemaps .= '<video:publication_date>' . get_the_modified_date('c', $post) . '</video:publication_date>';
                        $rankology_sitemaps .= "\n";

                        //Family Friendly
                        $family_friendly = isset($rankology_video[0][$key]['family_friendly']) ? $rankology_video[0][$key]['family_friendly'] : null;
                        if ('' != $family_friendly) {
                            $rankology_sitemaps .= '<video:family_friendly>no</video:family_friendly>';
                            $rankology_sitemaps .= "\n";
                        } else {
                            $rankology_sitemaps .= '<video:family_friendly>yes</video:family_friendly>';
                            $rankology_sitemaps .= "\n";
                        }
                        //Tags
                        $tag                = isset($rankology_video[0][$key]['tag']) ? $rankology_video[0][$key]['tag'] : null;
                        $rankology_target_kw ='';
                        if ('' != get_post_meta($post->ID, '_rankology_analysis_target_kw', true)) {
                            $rankology_target_kw = get_post_meta($post->ID, '_rankology_analysis_target_kw', true) . ',';
                        }

                        if ('' != $tag) {//Video tags
                            $rankology_sitemaps .= '<video:tag>' . esc_attr(wp_filter_nohtml_kses($tag)) . '</video:tag>';
                            $rankology_sitemaps .= "\n";
                        } else {//Post tags
                            $tags = get_the_tags($post->ID);
                            if ( ! empty($tags)) {
                                $count = count($tags);
                                $i     = 1;
                                $tags_list = '';
                                foreach ($tags as $tag) {
                                    $tags_list .= $tag->name;
                                    if ($i < $count) {
                                        $tags_list .= ',';
                                    }
                                    ++$i;
                                }
                                $rankology_sitemaps .= '<video:tag>' . $rankology_target_kw . $tags_list . '</video:tag>';
                                $rankology_sitemaps .= "\n";
                            }
                        }

                        $rankology_sitemaps .= '</video:video>';
                        $rankology_sitemaps .= "\n";
                    }
                }
                $rankology_sitemaps .= '</url>';
            }
        }
    }
    $rankology_sitemaps .= "\n";
    $rankology_sitemaps .= '</urlset>';

    $rankology_sitemaps = apply_filters('rankology_sitemaps_xml_video', $rankology_sitemaps);

    return $rankology_sitemaps;
}
echo rankology_xml_sitemap_video();
