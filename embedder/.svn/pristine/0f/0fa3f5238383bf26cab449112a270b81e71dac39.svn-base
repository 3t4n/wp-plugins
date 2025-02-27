<?php
/*  Copyright 2010  Michael J. Walker  (email : mike@moztools.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.
    
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/**
 * Called on the 'wp' hook when a blog page is about to be loaded.
 *
 * Retrieve all the embeds from the database and process them ready
 * for us, and register their shortcodes. Store the information in a
 * global variable for accessing later.
 */
function emb_add_global_embeds() {
    global $wpdb, $emb_codes;
    emb_trace("emb_add_embeds");
    $entries = $wpdb->get_results("SELECT * FROM ".EMB_TABLE);
    if (count($entries) != 0) {
        foreach ($entries as $entry) {
            // echo 'shortcode=['.$entry->embed.']';
            add_shortcode($entry->embed, 'emb_do_global_embed');
            $emb_codes[$entry->embed] = $entry;
            emb_trace("emb_add_embeds: $entry->embed");
        }
    }
}

function emb_add_local_embeds($post) {
    // First remove existing locals which are from a previous post.
    emb_remove_local_embeds();
    // Register local embeds in the post's custom fields.
    $field = get_post_custom($post->ID);
    if (!empty($field)) {
        foreach ($field as $key => $value) {
            $key = trim($key);
            if (strpos($key, '[') == 0 && strpos($key, ']') == strlen($key) - 1) {
                $key = trim($key, '[] ');
                add_shortcode($key, 'emb_do_local_embed');
                $findkeys[] = $key;
            }
        }
    }
    // Always call -- processes globals too.
    emb_add_nested_embeds($findkeys, $post->post_content);
}

/**
 * Add all nested global and local embeds, if there are any.
 */
function emb_add_nested_embeds($locals, $content) {
    global $emb_codes;
    // Process the local embeds first, if any.
    if (!empty($locals)) {
        emb_process_nested_embeds($locals, 'emb_add_local_nested_embed', $content);
    }
    // Now process the global embeds.
    if (!empty($emb_codes)) {
        foreach ($emb_codes as $embed) {
            if (!emb_is_disabled($embed->options)) {
                $globals[] = $embed->embed;
            }
        }
        if (!empty($globals)) {
            emb_process_nested_embeds($globals, 'emb_add_global_nested_embed', $content);
        }
    }
}

function emb_process_nested_embeds($embeds, $callback, $content) {
    $embeds = implode('|', $embeds);
    $pattern = '(.?)\[((?:'.$embeds.')\d+)\b(.*?)(?:(\/))?\](.?)';
    preg_replace_callback('/'.$pattern.'/s', $callback, $content);
}

function emb_add_local_nested_embed($terms) {
    add_shortcode($terms[2], 'emb_do_local_embed');
}

function emb_add_global_nested_embed($terms) {
    add_shortcode($terms[2], 'emb_do_global_embed');
}

/**
 * Remove the previous set of local keys.
 * In cases where there is more than one post on
 * a page, previous local embeds may already be
 * set.
 *
 * NOTE: In the absence of a WordPress API to do
 * this, we have to access and modify the global
 * shortcode_tag to do this.
 */
function emb_remove_local_embeds() {
    global $shortcode_tags;
    if (!empty($shortcode_tags)) {
        $keys = array_keys($shortcode_tags, 'emb_do_local_embed');
        if (!empty($keys)) {
            foreach ($keys as $key) {
                unset($shortcode_tags[$key]);
            }
        }
    }
}

/**
 * Called when "the_content" filters for a post are executed.
 *
 * Load the local embeds, and add auto-embeds for before
 * and after post/page content, when specified.
 */
function emb_add_post_auto_embeds($content, $settings = null) {
    global $emb_codes;
    // Only need workaround if using old parser.
    $workaround = empty($settings);
    $embeds = empty($settings) ? $emb_codes : $settings;

    if (!empty($embeds) && !is_admin()) {
        foreach ($embeds as $embed) {
            if (!empty($embed->options) && !emb_is_disabled($embed->options)) {
                $embed = emb_prepare($embed);
                if (is_single() && emb_is_set('single-post-content', $embed) && emb_should_include($embed, 'post')) {
                    if (emb_is_set('before-single-post-content', $embed)) {
                        $before[] = $embed;
                    }
                    if (emb_is_set('after-single-post-content', $embed)) {
                        $after[] = $embed;
                    }
                } else if (is_page() && emb_is_set('page-content', $embed) && emb_should_include($embed, 'page')) {
                    if (emb_is_set('before-page-content', $embed)) {
                        $before[] = $embed;
                    }
                    if (emb_is_set('after-page-content', $embed)) {
                        $after[] = $embed;
                    }
                } else if (emb_is_set('multi-post-content', $embed) && emb_should_include($embed, 'post')) {
                    if (emb_is_set('before-multi-post-content', $embed)) {
                        $before[] = $embed;
                    }
                    if (emb_is_set('after-multi-post-content', $embed)) {
                        $after[] = $embed;
                    }
                }
            }
        }
        if (!empty($before)) {
            if (count($before) > 1) {
                usort($before, 'emb_compare_embeds');
            }
            foreach ($before as $embed) {
                // Workaround for bug causing adjacent shortcodes to fail.
                if ($workaround && !empty($prefix)) {
                    $prefix .= ' ';
                }
                $prefix .= '['.$embed->embed.']';
            }
            $content = $prefix.$content;
        }
        if (!empty($after)) {
            if (count($after) > 1) {
                usort($after, 'emb_compare_embeds');
            }
            foreach ($after as $embed) {
                // Workaround for bug causing adjacent shortcodes to fail.
                if ($workaround && !empty($suffix)) {
                    $suffix .= ' ';
                }
                $suffix .= '['.$embed->embed.']';
            }
            $content .= $suffix;
        }
    }
    return $content;
}

/**
 * Inspect the embed includes and excludes to determine if
 * an auto-embed should be added to this post/page or not.
 */
function emb_should_include($embed, $location) {
    global $post;
    $included = false;
    $excluded = false;

    $empty = empty($embed->include_cats) && empty($embed->include_tags);
    if ($empty && $location == 'page') {
        $empty = $empty && empty($embed->include_pages);
    }

    if ($location == 'page' && !empty($embed->include_pages) || !empty($embed->exclude_pages)) {
        $parents = emb_get_parents($post);
        $included = emb_terms_in_list($parents, $embed->include_pages);
        $excluded = emb_terms_in_list($parents, $embed->exclude_pages);
        //echo "parents[$embed->include_pages:$embed->exclude_pages]";_pr($parents);
    }

    if (!empty($embed->include_cats) || !empty($embed->exclude_cats)) {
        $cats = wp_get_post_terms($post->ID, 'category');
        $embed->include_cats = emb_add_child_categories($embed->include_cats);
        $embed->exclude_cats = emb_add_child_categories($embed->exclude_cats);
        if (!$included) $included = emb_terms_in_list($cats, $embed->include_cats);
        if (!$excluded) $excluded = emb_terms_in_list($cats, $embed->exclude_cats);
        //echo "cats[$embed->include_cats:$embed->exclude_cats]"; //_pr($cats);
    }

    if (!empty($embed->include_tags) || !empty($embed->exclude_tags)) {
        $tags = wp_get_post_terms($post->ID, 'post_tag');
        if (!$included) $included = emb_terms_in_list($tags, $embed->include_tags);
        if (!$excluded) $excluded = emb_terms_in_list($tags, $embed->exclude_tags);
        //echo "tags[$embed->include_tags:$embed->exclude_tags]"; //_pr($tags);
    }
    //echo '<br>'.$embed->embed.(($empty || $included) && !$excluded ? '-----included' : '-----excluded').'<br>';
    return ($empty || $included) && !$excluded;
}

/**
 * Find and add child categories to the category list supplied with the embed.
 */
function emb_add_child_categories($list) {
    if (!empty($list)) {
        $items = explode(',', $list);
        foreach ($items as $item) {
            $cat = get_term_by('name', $item, 'category');
            if ($cat === false) {
                $cat = get_term_by('slug', $item, 'category');
            }
            if ($cat !== false) {
                $children = get_term_children($cat->term_id, 'category');
                foreach ($children as $child_id) {
                    $child = get_category($child_id);
                    $list .= ','.$child->slug;
                }
            }
        }
    }
    return $list;
}

/**
 * Find out if any one of an array of terms is in the supplied list.
 */
function emb_terms_in_list($terms, $list) {
    $inlist = false;
    if (!empty($list)) {
        $list = explode(',', $list);
        foreach ($terms as $term) {
            $inlist = in_array($term->name, $list) || in_array($term->slug, $list);
            if ($inlist) {
                break;
            }
        }
    }
    return $inlist;
}

/**
 * Fetch the ancestors of a post/page.
 */
function emb_get_parents($post) {
    if ($post->post_parent != 0) {
        $parent = $post;
        do {
            $parent = get_post($parent->post_parent);
            $parents[] = (object)array('name' => $parent->post_name, 'slug' => $parent->ID);
        } while ($parent->post_parent != 0);
    } else {
        $parents[] = (object)array('name' => '', 'slug' => '0');
    }
    return $parents;
}

/**
 * Get the value of an embed, wrapping it, if specified.
 */
function emb_get_value($embed) {
    $value = @html_entity_decode($embed->value, ENT_COMPAT, 'UTF-8');
    if (emb_is_set('wrap', $embed)) {
        $value = '<'.$embed->wrapwith.' class="'.$embed->wrapclass.'" style="'.$embed->wrapstyle.'">'.$value.'</'.$embed->wrapwith.'>';
    }
    return $value;
}

/**
 * Comparison function for sorting embeds in priority order.
 */
function emb_compare_embeds($em1, $em2) {
    return $em1->priority - $em2->priority;
}

/**
 * Strip shortcodes (but not their %content%) from the submitted text.
 * Repeat to remove all nested shortcodes until the string is no longer
 * modified by the replacement.
 */
function emb_remove_shortcodes($content) {
    global $post;
    if (!empty($post)) {
        emb_add_local_embeds($post);
        $pattern = get_shortcode_regex();
        do {
            $subject = $content;
            $content = preg_replace('/'.$pattern.'/s', '$1$5$6', $subject);
        } while (strlen($subject) != strlen($content));
    }
    return $content;
}

/**
 * Use this stub to distinguish between local and global embeds
 * so we can remove local embeds once we are done with them on
 * multi-post pages.
 */
function emb_do_local_embed($attrs = null, $content = null, $name) {
    return emb_do_embed($attrs, $content, $name);
}

/**
 * Use this stub to distinguish between local and global embeds
 * so we can remove local embeds once we are done with them on
 * multi-post pages.
 */
function emb_do_global_embed($attrs = null, $content = null, $name) {
    return emb_do_embed($attrs, $content, $name);
}

/**
 * Called on the shortcode hook to process global shortcodes.
 */
function emb_do_embed($attrs = null, $content = null, $name) {
    global $wpdb, $emb_codes;
    // Recursively call embeds if they have content.
    if (!empty($content)) {
        $content = do_shortcode($content);
    }
    $name = trim($name);
    //_echo("[Shortcode: $name]");

    $filter = current_filter();
    $local = false;
    $keys = get_post_custom_keys();
    if (!empty($keys) && ($filter != 'comment_text' || in_array('embed-comments', $keys))) {
        $local = in_array('['.$name.']', $keys);

        // Handle nested embeds (but make sure there isn't
        // a global embed with that name which would have
        // precedence).
        if (!$local && empty($emb_codes[$name])) {
            $tryname = substr($name, 0, strlen($name) - 1);
            $local = in_array('['.$tryname.']', $keys);
            if ($local) {
                $name = $tryname;
            }
        }
        if ($local) {
            $list = get_post_custom_values('['.$name.']');
            $value = $list[0];
        }
    }

    if (!$local && !empty($emb_codes)) {
        // Handle nested global embeds
        if (empty($emb_codes[$name])) {
            $name = substr($name, 0, strlen($name) - 1);
        }
        if (!empty($emb_codes[$name]) && !emb_is_disabled($emb_codes[$name]->options)
        && !($filter == 'comment_text' && !emb_is_set('allow-in-comments', $emb_codes[$name]))) {
            $value = emb_get_value($emb_codes[$name]);
            // Call specified user function, if it exists.
            if (emb_is_set('user-function', $emb_codes[$name]) && function_exists($emb_codes[$name]->userfunction)) {
                $value = call_user_func($emb_codes[$name]->userfunction, $name, $value, $attrs, $content);
            }
        }
    }
    if (!empty($value) && (!empty($content) || (strpos($value, '%') !== false))) {
        $value = emb_process_attributes($value, $attrs, $content);
    }
    // If we have no value but there is content, then
    // return the content to prevent text from going missing.
    if (empty($value) && !empty($content)) {
        $value = $content;
    }

    return $value;
}

/**
 * Process the embed's attributes.
 */
function emb_process_attributes($value, $attrs, $content) {
    $var = array();
    $val = array();
    $match_default = emb_get_match_default();

    if (!empty($attrs)) {
        $var = array_keys($attrs);
        $val = array_values($attrs);
        // First look for the attributes that are set in the shortcode.
        for ($i = 0; $i < sizeof($var); $i++) {
            $var[$i] = strtolower("/((%$var[$i]=".$match_default."%)|(%$var[$i]%))/i");
        }
    }
    // Next find all parameters in the embed that have defaults.
    // The % sign can be escaped with a backslash (as can the backslash itself).
    preg_match_all('/%([\w-]+?)='.$match_default.'%/', $value, $matches);

    // Only process the first occurrence of an attribute (with a default)
    // and remove the double escapes.
    for ($i = 0; $i < count($matches[0]); $i++) {
        if (empty($param[$matches[1][$i]])) {
            $param[$matches[1][$i]] = str_replace(array('\\\\', '\\%'), array('\\', '%'), $matches[2][$i]);
        }
    }
    // Add the defaults after the set attributes so they
    // will only be used if the attributes are not set.
    if (!empty($param)) {
        foreach ($param as $k => $v) {
            $var[] = "/((%$k=".$match_default."%)|(%$k%))/i";
            $val[] = $v;
        }
    }

    $var[] = "/%content%/";
    $val[] = $content;

    // Removed to prevent %-signs in default values from being mistaken for attributes.
    //  $var[] = "/%[\w-]+%/";
    //  $val[] = "";

    $var[] = "/%!!/";
    $val[] = "%";

    return preg_replace($var, $val, $value);
}

function emb_is_set($option, $embed) {
    return strpos($embed->options, $option) !== false;
}

function emb_prepare($embed) {
    if (isset($embed->data)) {
        $data = unserialize($embed->data);
        foreach ($data as $property => $val) $embed->$property = $val;
        unset($embed->data);
    }
    return $embed;
}
?>