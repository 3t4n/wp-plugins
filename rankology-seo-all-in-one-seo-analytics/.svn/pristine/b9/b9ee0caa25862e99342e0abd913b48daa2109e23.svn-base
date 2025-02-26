<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

/**
 * Return the conditions for schemas.
 *
 * 
 *
 * 
 *
 * @return (array)
 **/
function rankology_get_schemas_conditions() {
    return ['equal' => __('is equal to', 'wp-rankology'), 'not_equal' => __('is NOT equal to', 'wp-rankology')];
}

/**
 * Return the filters for schemas.
 *
 * 
 *
 * 
 *
 * @return (array)
 **/
function rankology_get_schemas_filters() {
    return [
        'post_type' => __('Post Type', 'wp-rankology'),
        'taxonomy' => __('Term Taxonomy', 'wp-rankology'),
        'postId' => __('Post ID', 'wp-rankology'),
    ];
}

/**
 * Return default values for retrocompat.
 *
 * 
 *
 * 
 *
 * @return (array)
 *
 * @param mixed $rule
 **/
function rankology_get_default_schemas_rules($rule) {
    return [
        [
            [
                'filter' => 'post_type',
                'cpt' => $rule, 'taxo' => 0,
                'cond' => 'equal',
            ],
        ],
    ];
}

///////////////////////////////////////////////////////////////////////////////////////////////////
//Register Rankology Schemas Custom Post Type
///////////////////////////////////////////////////////////////////////////////////////////////////
function rankology_schemas_fn() {
    $labels = [
        'name' => _x('Schemas', 'Post Type General Name', 'wp-rankology'),
        'singular_name' => _x('Schema', 'Post Type Singular Name', 'wp-rankology'),
        'menu_name' => __('Schemas', 'wp-rankology'),
        'name_admin_bar' => __('Schemas', 'wp-rankology'),
        'archives' => __('Item Archives', 'wp-rankology'),
        'parent_item_colon' => __('Parent Item:', 'wp-rankology'),
        'all_items' => __('All schemas', 'wp-rankology'),
        'add_new_item' => __('Add New schema', 'wp-rankology'),
        'add_new' => __('Add schema', 'wp-rankology'),
        'new_item' => __('New schema', 'wp-rankology'),
        'edit_item' => __('Edit schema', 'wp-rankology'),
        'update_item' => __('Update schema', 'wp-rankology'),
        'view_item' => __('View schema', 'wp-rankology'),
        'search_items' => __('Search schema', 'wp-rankology'),
        'not_found' => __('Not found', 'wp-rankology'),
        'not_found_in_trash' => __('Not found in Trash', 'wp-rankology'),
        'featured_image' => __('Featured Image', 'wp-rankology'),
        'set_featured_image' => __('Set featured image', 'wp-rankology'),
        'remove_featured_image' => __('Remove featured image', 'wp-rankology'),
        'use_featured_image' => __('Use as featured image', 'wp-rankology'),
        'insert_into_item' => __('Insert into item', 'wp-rankology'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'wp-rankology'),
        'items_list' => __('Schemas list', 'wp-rankology'),
        'items_list_navigation' => __('Schemas list navigation', 'wp-rankology'),
        'filter_items_list' => __('Filter schema list', 'wp-rankology'),
    ];
    $args = [
        'label' => __('Schemas', 'wp-rankology'),
        'description' => __('List of Schemas', 'wp-rankology'),
        'labels' => $labels,
        'supports' => ['title'],
        'hierarchical' => false,
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => false,
        'menu_icon' => 'dashicons-excerpt-view',
        'show_in_admin_bar' => false,
        'show_in_nav_menus' => false,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'capability_type' => 'schema',
        'capabilities' => [
            'edit_post' => 'edit_schema',
            'edit_posts' => 'edit_schemas',
            'edit_others_posts' => 'edit_others_schemas',
            'publish_posts' => 'publish_schemas',
            'read_post' => 'read_schema',
            'read_private_posts' => 'read_private_schemas',
            'delete_post' => 'delete_schema',
            'delete_others_posts' => 'delete_others_schemas',
            'delete_published_posts' => 'delete_published_schemas',
        ],
    ];
    register_post_type('rankology_schemas', $args);
}
add_action('admin_init', 'rankology_schemas_fn', 10);

///////////////////////////////////////////////////////////////////////////////////////////////////
//Map Rankology Schema caps
///////////////////////////////////////////////////////////////////////////////////////////////////
add_filter('map_meta_cap', 'rankology_schemas_map_meta_cap', 10, 4);
function rankology_schemas_map_meta_cap($caps, $cap, $user_id, $args) {
    /* If editing, deleting, or reading a schema, get the post and post type object. */
    if ('edit_schema' === $cap || 'delete_schema' === $cap || 'read_schema' === $cap) {
        $post = get_post($args[0]);
        $post_type = get_post_type_object($post->post_type);

        /* Set an empty array for the caps. */
        $caps = [];
    }

    /* If editing a schema, assign the required capability. */
    if ('edit_schema' === $cap) {
        if ($user_id == $post->post_author) {
            $caps[] = $post_type->cap->edit_posts;
        } else {
            $caps[] = $post_type->cap->edit_others_posts;
        }
    }

    /* If deleting a schema, assign the required capability. */
    elseif ('delete_schema' === $cap) {
        if ($user_id == $post->post_author) {
            $caps[] = $post_type->cap->delete_published_posts;
        } else {
            $caps[] = $post_type->cap->delete_others_posts;
        }
    }

    /* If reading a private schema, assign the required capability. */
    elseif ('read_schema' === $cap) {
        if ('private' !== $post->post_status) {
            $caps[] = 'read';
        } elseif ($user_id == $post->post_author) {
            $caps[] = 'read';
        } else {
            $caps[] = $post_type->cap->read_private_posts;
        }
    }

    /* Return the capabilities required by the user. */
    return $caps;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
//Set title placeholder for Schemas Custom Post Type
///////////////////////////////////////////////////////////////////////////////////////////////////
function rankology_schemas_cpt_title($title) {
    $screen = get_current_screen();
    if ('rankology_schemas' == $screen->post_type) {
        $title = __('Enter the name of your schema', 'wp-rankology');
    }

    return $title;
}

add_filter('enter_title_here', 'rankology_schemas_cpt_title');

///////////////////////////////////////////////////////////////////////////////////////////////////
//Add custom buttons to Rankology Schemas Post Type
///////////////////////////////////////////////////////////////////////////////////////////////////

function rankology_schemas_btn_cpt() {
    $screen = get_current_screen();
    if ('rankology_schemas' == $screen->post_type) {
        ?>
<script>
    jQuery(function() {
        jQuery("body.post-type-rankology_schemas .wrap h1 ~ a").after(
            //'<a href="<?php //echo admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_rich_snippets'); ?>//" id="rankology-schemas-settings" class="page-title-action"><?php //esc_html_e('Settings', 'wp-rankology'); ?>//</a>'
        );
    });
</script>
<?php
    }
}
add_action('admin_head', 'rankology_schemas_btn_cpt');

///////////////////////////////////////////////////////////////////////////////////////////////////
//Add buttons to post type list if empty
///////////////////////////////////////////////////////////////////////////////////////////////////
add_action('manage_posts_extra_tablenav', 'rankology_schemas_maybe_render_blank_state');

function rankology_schemas_render_blank_state() {
?>
<div class="rankology-BlankState">

    <h2 class="rankology-BlankState-message">
        <?php esc_html_e('Boost your visibility in search results and increase your traffic and conversions.', 'wp-rankology'); ?>
    </h2>

    <div class="rankology-BlankState-buttons">

        <a class="rankology-BlankState-cta btn btnPrimary"
            href="<?php echo esc_url(admin_url('post-new.php?post_type=rankology_schemas')); ?>">
            <?php esc_html_e('Create a schema', 'wp-rankology'); ?>
        </a>

    </div>

</div>

<?php
}
function rankology_schemas_maybe_render_blank_state($which) {
    global $post_type;

    if ('rankology_schemas' === $post_type && 'bottom' === $which) {
        $counts = (array) wp_count_posts($post_type);
        unset($counts['auto-draft']);
        $count = array_sum($counts);

        if (isset($_GET['rankology_support']) && '1' === $_GET['rankology_support']) {
            ?>
<a href="<?php
                echo wp_nonce_url(
                add_query_arg(
                    [
                        'action' => 'rankology_relaunch_upgrader',
                    ],
                    admin_url('admin-post.php')
                ),
                'rankology_relaunch_upgrader'
            ); ?>" class="btn btn-primary">
    Reload upgrader schema
</a>
<?php
        }

        if (0 < $count) {
            return;
        }

        rankology_schemas_render_blank_state();

        echo '<style type="text/css">#posts-filter .wp-list-table, #posts-filter .tablenav.top, .tablenav.bottom .actions, .wrap .subsubsub  { display: none; } #posts-filter .tablenav.bottom { height: auto; } </style>';
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////
//Set messages for Schemas Custom Post Type
///////////////////////////////////////////////////////////////////////////////////////////////////

function rankology_schemas_set_messages($messages) {
    global $post, $post_ID, $typenow;
    $post_type = 'rankology_schemas';

    if ('rankology_schemas' === $typenow) {
        $obj = get_post_type_object($post_type);
        $singular = $obj->labels->singular_name;

        $messages[$post_type] = [
            0 => '', // Unused. Messages start at index 1.
            1 => __($singular . ' updated.'),
            2 => __('Custom field updated.'),
            3 => __('Custom field deleted.'),
            4 => __($singular . ' updated.'),
            5 => isset($_GET['revision']) ? sprintf(__($singular . ' restored to revision from %s'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
            6 => __($singular . ' published.'),
            7 => __('Schema saved.'),
            8 => sprintf(__($singular . ' submitted.'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
            9 => sprintf(__($singular . ' scheduled for: <strong>%1$s</strong>. '), date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
            10 => sprintf(__($singular . ' draft updated.'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
        ];

        return $messages;
    } else {
        return $messages;
    }
}

add_filter('post_updated_messages', 'rankology_schemas_set_messages');

function rankology_schemas_set_messages_list($bulk_messages, $bulk_counts) {
    $bulk_messages['rankology_schemas'] = [
        'updated' => _n('%s schema updated.', '%s schemas updated.', $bulk_counts['updated']),
        'locked' => _n('%s schema not updated, somebody is editing it.', '%s schemas not updated, somebody is editing them.', $bulk_counts['locked']),
        'deleted' => _n('%s schema permanently deleted.', '%s schemas permanently deleted.', $bulk_counts['deleted']),
        'trashed' => _n('%s schema moved to the Trash.', '%s schemas moved to the Trash.', $bulk_counts['trashed']),
        'untrashed' => _n('%s schema restored from the Trash.', '%s schemas restored from the Trash.', $bulk_counts['untrashed']),
    ];

    return $bulk_messages;
}
add_filter('bulk_post_updated_messages', 'rankology_schemas_set_messages_list', 10, 2);

///////////////////////////////////////////////////////////////////////////////////////////////////
//Columns for Schemas Custom Post Type
///////////////////////////////////////////////////////////////////////////////////////////////////

add_filter('manage_edit-rankology_schemas_columns', 'rankology_schemas_columns');
add_action('manage_rankology_schemas_posts_custom_column', 'rankology_schemas_display_column', 10, 2);

function rankology_schemas_columns($columns) {
    $columns['rankology_schemas_type'] = __('Data type', 'wp-rankology');
    $columns['rankology_schemas_cpt'] = __('Post type', 'wp-rankology');
    unset($columns['date']);

    return $columns;
}

function rankology_schemas_display_column($column, $post_id) {
    if ('rankology_schemas_type' == $column) {
        if (get_post_meta($post_id, '_rankology_fno_rich_snippets_type', true)) {
            echo get_post_meta($post_id, '_rankology_fno_rich_snippets_type', true);
        }
    }
    if ('rankology_schemas_cpt' == $column) {
        if (get_post_meta($post_id, '_rankology_fno_rich_snippets_rules', true)) {
            $rules = get_post_meta($post_id, '_rankology_fno_rich_snippets_rules', true);
            if ( ! is_array($rules)) {
                $rules = rankology_get_default_schemas_rules($rules);
            }
            $conditions = rankology_get_schemas_conditions();
            $filters = rankology_get_schemas_filters();
            $n = 0;
            $html = '';
            foreach ($rules as $or => $values) {
                foreach ($values as $and => $value) {
                    $filter = esc_html($filters[$value['filter']]);
                    $cond = $conditions[$value['cond']];
                    if ('post_type' === $value['filter'] && post_type_exists($value['cpt'])) {
                        $label = esc_html(get_post_type_object($value['cpt'])->label);
                        $html .= " <strong>$filter</strong> <em>$cond</em> \"$label\" ";
                    } elseif ('taxonomy' === $value['filter'] && term_exists((int) $value['taxo'])) {
                        $tax = get_term($value['taxo']);
                        if ( ! is_wp_error($tax) && is_object($tax)) {
                            $tax = esc_html(get_taxonomy($tax->taxonomy)->label);
                            $label = esc_html(get_term($value['taxo'])->name);
                            $html .= " <strong>$filter</strong> \"$tax\" <em>$cond</em> \"$label\" ";
                        }
                    } elseif ('postId' === $value['filter']) {
                        $label = esc_html($value['postId']);
                        $html .= " <strong>$filter</strong> <em>$cond</em> \"$label\" ";
                    }
                    $html .= __('and', 'wp-rankology');
                    ++$n;
                    if (3 === $n) {
                        $html = trim($html, __('and', 'wp-rankology') . ' ');
                        $html .= '&hellip;';
                        continue 2;
                    }
                }
                $html = trim($html, __('and', 'wp-rankology'));
                $html .= __('or', 'wp-rankology');
            }
            $html = trim($html, __('or', 'wp-rankology'));
            echo $html;
        }
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////
//Display metabox for Schemas Custom Post Type
///////////////////////////////////////////////////////////////////////////////////////////////////
add_action('add_meta_boxes', 'rankology_schemas_init_metabox');
function rankology_schemas_init_metabox() {
    add_meta_box('rankology_schemas', __('Your schema', 'wp-rankology'), 'rankology_schemas_cpt', 'rankology_schemas', 'normal', 'default');
}

function rankology_schemas_cpt($post) {
    $prefix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

    wp_nonce_field(plugin_basename(__FILE__), 'rankology_schemas_cpt_nonce');

    global $typenow;

    //Enqueue scripts
    wp_enqueue_script('jquery-ui-accordion');

    wp_enqueue_script('rankology-fno-media-uploader-js', plugins_url('assets/js/rankology-fno-media-uploader.js', dirname(dirname(dirname(__FILE__)))), ['jquery'], RANKOLOGY_VERSION, false);

    wp_enqueue_script('rankology-fno-rich-snippets-js', plugins_url('assets/js/rankology-fno-rich-snippets' . $prefix . '.js', dirname(dirname(dirname(__FILE__)))), ['jquery'], RANKOLOGY_VERSION, false);

    wp_enqueue_media();

    wp_enqueue_script('jquery-ui-datepicker');

    //Post types
    $rankology_get_post_types = rankology_get_service('WordPressData')->getPostTypes();

    //Filter taxonomies list to get WC product attributes
    add_filter('rankology_get_taxonomies_args', 'rkseo_get_taxonomies_args');
    function rkseo_get_taxonomies_args($args) {
        $args = [];

        return $args;
    }
    add_filter('rankology_get_taxonomies_list', 'rkseo_get_taxonomies_list');
    function rkseo_get_taxonomies_list($terms) {
        unset($terms['rankology_404_cat']);
        unset($terms['nav_menu']);
        unset($terms['link_category']);
        unset($terms['post_format']);

        return $terms;
    }

    //Mapping fields
    function rankology_schemas_mapping_array($post_meta_name, $cases) {
        global $post;

        //Custom fields
        if (function_exists('rankology_get_custom_fields')) {
            $rankology_get_custom_fields = rankology_get_custom_fields();
        }

        //init default case array
        $rankology_schemas_mapping_case = [
            'Select an option' => ['none' => __('None', 'wp-rankology')],
            'Site Meta' => [
                'site_title' => __('Site Title', 'wp-rankology'),
                'tagline' => __('Tagline', 'wp-rankology'),
                'site_url' => __('Site URL', 'wp-rankology'),
            ],
            'Post Meta' => [
                'post_id' => __('Post / Product ID', 'wp-rankology'),
                'post_title' => __('Post Title / Product title', 'wp-rankology'),
                'post_excerpt' => __('Excerpt / Product short description', 'wp-rankology'),
                'post_content' => __('Content', 'wp-rankology'),
                'post_permalink' => __('Permalink', 'wp-rankology'),
                'post_author_name' => __('Author', 'wp-rankology'),
                'post_date' => __('Publish date', 'wp-rankology'),
                'post_updated' => __('Last update', 'wp-rankology'),
            ],
            'Product meta (WooCommerce)' => [
                'product_regular_price' => __('Regular Price', 'wp-rankology'),
                'product_sale_price' => __('Sale Price', 'wp-rankology'),
                'product_price_with_tax' => __('Sales price, including tax', 'wp-rankology'),
                'product_date_from' => __('Sale price dates "From"', 'wp-rankology'),
                'product_date_to' => __('Sale price dates "To"', 'wp-rankology'),
                'product_sku' => __('SKU', 'wp-rankology'),
                'product_barcode_type' => __('Product Global Identifier type', 'wp-rankology'),
                'product_barcode' => __('Product Global Identifier', 'wp-rankology'),
                'product_category' => __('Product category', 'wp-rankology'),
                'product_stock' => __('Product availability', 'wp-rankology'),
            ],
            'Custom taxonomy / Product attribute (WooCommerce)' => [
                'custom_taxonomy' => __('Select your custom taxonomy / product attribute', 'wp-rankology'),
            ],
            'Custom fields' => [
                'custom_fields' => __('Select your custom field', 'wp-rankology'),
            ],
        ];

        //Custom field
        $post_meta_value = get_post_meta($post->ID, '_' . $post_meta_name . '_cf', true);

        $rankology_schemas_cf = '<select name="' . $post_meta_name . '_cf" class="cf">';

        foreach ($rankology_get_custom_fields as $value) {
            $rankology_schemas_cf .= '<option ' . selected($value, $post_meta_value, false) . ' value="' . $value . '">' . $value . '</option>';
        }

        $rankology_schemas_cf .= '</select>';

        //Custom taxonomy
        $post_meta_value = get_post_meta($post->ID, '_' . $post_meta_name . '_tax', true);

        $rankology_schemas_tax = '<select name="' . $post_meta_name . '_tax" class="tax">';

        $serviceWpData = rankology_get_service('WordPressData');
        $rankology_get_taxonomies = [];
        if ($serviceWpData && method_exists($serviceWpData, 'getTaxonomies')) {
            $rankology_get_taxonomies = $serviceWpData->getTaxonomies();
        }


        foreach ($rankology_get_taxonomies as $key => $value) {
            $rankology_schemas_tax .= '<option ' . selected($key, $post_meta_value, false) . ' value="' . $key . '">' . $key . '</option>';
        }
        $rankology_schemas_tax .= '</select>';

        if (is_string($cases)) {
            $cases = [$cases];
        }

        foreach ($cases as $case) {
            //LB types list
            if ('lb' === $case) {
                $post_meta_value = get_post_meta($post->ID, '_' . $post_meta_name . '_lb', true);

                $rankology_schemas_lb = '<select name="' . $post_meta_name . '_lb" class="lb">';

                foreach (rankology_lb_types_list() as $type_value => $type_i18n) {
                    $rankology_schemas_lb .= '<option ' . selected($type_value, $post_meta_value, false) . ' value="' . $type_value . '">' . __($type_i18n, 'wp-rankology') . '</option>';
                }
                $rankology_schemas_lb .= '</select>';
            }

            switch ($case) {
                case 'default':
                    $rankology_schemas_mapping_case['Manual'] = [
                        'manual_global' => __('Manual text', 'wp-rankology'),
                        'manual_single' => __('Manual text on each post', 'wp-rankology'),
                    ];

                    $post_meta_value = get_post_meta($post->ID, '_' . $post_meta_name . '_manual_global', true);

                    $rankology_schemas_manual_global = '<input type="text" id="' . $post_meta_name . '_manual_global" name="' . $post_meta_name . '_manual_global" class="manual_global" placeholder="' . esc_html__('Enter a global value here', 'wp-rankology') . '" aria-label="' . __('Manual value', 'wp-rankology') . '" value="' . $post_meta_value . '" />';

                    break;
                case 'lb':
                    $rankology_schemas_mapping_case['Manual'] = [
                        'manual_global' => __('Manual text', 'wp-rankology'),
                        'manual_single' => __('Manual text on each post', 'wp-rankology'),
                    ];

                    $post_meta_value = get_post_meta($post->ID, '_' . $post_meta_name . '_manual_global', true);

                    $rankology_schemas_manual_global = '<input type="text" id="' . $post_meta_name . '_manual_global" name="' . $post_meta_name . '_manual_global" class="manual_global" placeholder="' . esc_html__('Enter a global value here', 'wp-rankology') . '" aria-label="' . __('Manual value', 'wp-rankology') . '" value="' . $post_meta_value . '" />';

                    //lb types case
                    $rankology_schemas_mapping_case['Local Business'] = [
                        'manual_lb_global' => __('Local Business type', 'wp-rankology'),
                    ];

                    $post_meta_value = get_post_meta($post->ID, '_' . $post_meta_name . '_manual_lb_global', true);

                    break;
                case 'image':
                        $rankology_schemas_mapping_case = [
                            'Select an option' => ['none' => __('None', 'wp-rankology')],
                            'Site Meta' => [
                                'knowledge_graph_logo' => __('Knowledge Graph logo (SEO > Social)', 'wp-rankology'),
                            ],
                            'Post Meta' => [
                                'post_thumbnail' => __('Featured image / Product image', 'wp-rankology'),
                                'post_author_picture' => __('Post author picture', 'wp-rankology'),
                            ],
                            'Custom fields' => [
                                'custom_fields' => __('Select your custom field', 'wp-rankology'),
                            ],
                            'Manual' => [
                                'manual_img_global' => __('Manual Image URL', 'wp-rankology'),
                                'manual_img_library_global' => __('Manual Image from Library', 'wp-rankology'),
                                'manual_img_single' => __('Manual text on each post', 'wp-rankology'),
                            ],
                        ];

                        $post_meta_value = get_post_meta($post->ID, '_' . $post_meta_name . '_manual_img_global', true);

                        $rankology_schemas_manual_img_global = '<input type="text" id="' . $post_meta_name . '_manual_img_global" name="' . $post_meta_name . '_manual_img_global" class="manual_img_global" placeholder="' . esc_html__('Enter a global value here', 'wp-rankology') . '" aria-label="' . __('Manual Image URL', 'wp-rankology') . '" value="' . $post_meta_value . '" />';

                        $post_meta_value = get_post_meta($post->ID, '_' . $post_meta_name . '_manual_img_library_global', true);
                        $post_meta_value2 = get_post_meta($post->ID, '_' . $post_meta_name . '_manual_img_library_global_width', true);
                        $post_meta_value3 = get_post_meta($post->ID, '_' . $post_meta_name . '_manual_img_library_global_height', true);

                        $rankology_schemas_manual_img_library_global = '<input type="text" id="' . $post_meta_name . '_manual_img_library_global" name="' . $post_meta_name . '_manual_img_library_global" class="manual_img_library_global" placeholder="' . esc_html__('Select your global image from the media library', 'wp-rankology') . '" aria-label="' . __('Manual Image URL', 'wp-rankology') . '" value="' . $post_meta_value . '" />

						<input id="' . $post_meta_name . '_manual_img_library_global_width" type="hidden" name="' . $post_meta_name . '_manual_img_library_global_width" class="manual_img_library_global_width" value="' . $post_meta_value2 . '" />

						<input id="' . $post_meta_name . '_manual_img_library_global_height" type="hidden" name="' . $post_meta_name . '_manual_img_library_global_height" class="manual_img_library_global_height" value="' . $post_meta_value3 . '" />

						<input id="' . $post_meta_name . '_manual_img_library_global_btn" class="btn btnSecondary manual_img_library_global" type="button" value="' . __('Upload an Image', 'wp-rankology') . '" />';

                    break;
                case 'events':
                        //Events Calendar
                        if (is_plugin_active('the-events-calendar/the-events-calendar.php')) {
                            $rankology_schemas_mapping_case['Events Calendar'] = [
                                'events_start_date' => __('Start date', 'wp-rankology'),
                                'events_start_date_timezone' => __('Timezone start date', 'wp-rankology'),
                                'events_start_time' => __('Start time', 'wp-rankology'),
                                'events_end_date' => __('End date', 'wp-rankology'),
                                'events_end_time' => __('End time', 'wp-rankology'),
                                'events_location_name' => __('Event location name', 'wp-rankology'),
                                'events_location_address' => __('Event location address', 'wp-rankology'),
                                'events_website' => __('Event website', 'wp-rankology'),
                                'events_cost' => __('Event cost', 'wp-rankology'),
                                'events_currency' => __('Event currency', 'wp-rankology'),
                            ];
                        }

                    break;
                case 'date':
                        //date case
                        $rankology_schemas_mapping_case['Manual'] = [
                            'manual_date_global' => __('Manual date', 'wp-rankology'),
                            'manual_date_single' => __('Manual date on each post', 'wp-rankology'),
                        ];

                        $post_meta_value = get_post_meta($post->ID, '_' . $post_meta_name . '_manual_date_global', true);

                        $rankology_schemas_manual_date_global = '<input type="text" class="rankology-date-picker manual_date_global" autocomplete="false" name="' . $post_meta_name . '_manual_date_global" class="manual_global" placeholder="' . esc_html__('e.g. YYYY-MM-DD', 'wp-rankology') . '" aria-label="' . __('Global date', 'wp-rankology') . '" value="' . $post_meta_value . '" />';
                    break;
                case 'time':
                        //time case
                        $rankology_schemas_mapping_case['Manual'] = [
                            'manual_time_global' => __('Manual time', 'wp-rankology'),
                            'manual_time_single' => __('Manual time on each post', 'wp-rankology'),
                        ];

                        $post_meta_value = get_post_meta($post->ID, '_' . $post_meta_name . '_manual_time_global', true);

                        $rankology_schemas_manual_time_global = '<input type="time" step="2" placeholder="' . __('HH:MM', 'wp-rankology') . '" id="' . $post_meta_name . '_manual_time_global" name="' . $post_meta_name . '_manual_time_global" class="manual_time_global" aria-label="' . __('Time', 'wp-rankology') . '" value="' . $post_meta_value . '" />';
                    break;
                case 'rating':
                        //rating case
                        $rankology_schemas_mapping_case['Manual'] = [
                            'manual_rating_global' => __('Manual rating', 'wp-rankology'),
                            'manual_rating_single' => __('Manual rating on each post', 'wp-rankology'),
                        ];

                        $post_meta_value = get_post_meta($post->ID, '_' . $post_meta_name . '_manual_rating_global', true);

                        $rankology_schemas_manual_rating_global = '<input type="number" id="' . $post_meta_name . '_manual_rating_global" name="' . $post_meta_name . '_manual_rating_global" min="1" step="0.1" class="manual_rating_global" aria-label="' . __('Rating', 'wp-rankology') . '" value="' . $post_meta_value . '" />';
                    break;
                case 'custom':
                        //custom case
                        $rankology_schemas_mapping_case = [];
                        $rankology_schemas_mapping_case['custom'] = [
                            'manual_custom_global' => __('Manual custom schema', 'wp-rankology'),
                            'manual_custom_single' => __('Manual custom schema on each post', 'wp-rankology'),
                        ];

                        $post_meta_value = get_post_meta($post->ID, '_' . $post_meta_name . '_manual_custom_global', true);

                        $rankology_schemas_manual_custom_global = '<textarea rows="25" id="' . $post_meta_name . '_manual_custom_global" name="' . $post_meta_name . '_manual_custom_global" class="manual_custom_global" aria-label="' . __('Custom schema', 'wp-rankology') . '" value="' . htmlspecialchars($post_meta_value) . '">' . htmlspecialchars($post_meta_value) . '</textarea>';
                    break;
            }
        }

        $post_meta_value = get_post_meta($post->ID, '_' . $post_meta_name, true);

        $rankology_schemas_mapping_case = apply_filters('rankology_schemas_mapping_select', $rankology_schemas_mapping_case);

        $html = '<select name="' . $post_meta_name . '" class="dyn">';
        foreach ($rankology_schemas_mapping_case as $key => $value) {
            $html .= '<optgroup label="' . $key . '">';
            foreach ($value as $_key => $_value) {
                $html .= '<option ' . selected($_key, $post_meta_value, false) . ' value="' . $_key . '">' . __($_value, 'wp-rankology') . '</option>';
            }
            $html .= '</optgroup>';
        }
        $html .= '</select>';

        if (isset($rankology_schemas_manual_global)) {
            $html .= $rankology_schemas_manual_global;
        }
        if (isset($rankology_schemas_manual_img_global)) {
            $html .= $rankology_schemas_manual_img_global;
        }
        if (isset($rankology_schemas_manual_img_library_global)) {
            $html .= $rankology_schemas_manual_img_library_global;
        }
        if (isset($rankology_schemas_manual_date_global)) {
            $html .= $rankology_schemas_manual_date_global;
        }
        if (isset($rankology_schemas_manual_time_global)) {
            $html .= $rankology_schemas_manual_time_global;
        }
        if (isset($rankology_schemas_manual_rating_global)) {
            $html .= $rankology_schemas_manual_rating_global;
        }
        if (isset($rankology_schemas_cf) && 'custom' != $case) {
            $html .= $rankology_schemas_cf;
        }
        if (isset($rankology_schemas_tax) && 'custom' != $case) {
            $html .= $rankology_schemas_tax;
        }
        if (isset($rankology_schemas_lb) && 'custom' != $case) {
            $html .= $rankology_schemas_lb;
        }
        if (isset($rankology_schemas_manual_custom_global)) {
            $html .= $rankology_schemas_manual_custom_global;
        }

        return $html;
    }

    //Get datas
    $rankology_fno_rich_snippets_type = get_post_meta($post->ID, '_rankology_fno_rich_snippets_type', true);

    //Article
    $rankology_fno_rich_snippets_article_type = get_post_meta($post->ID, '_rankology_fno_rich_snippets_article_type', true);

    //Local Business
    $rankology_fno_rich_snippets_lb_opening_hours = get_post_meta($post->ID, '_rankology_fno_rich_snippets_lb_opening_hours', false); ?>
<tr id="term-rankology" class="form-field">
    <td>
        <div id="rankology_fno_cpt" class="rankology-your-schema">
            <div class="inside">
                <div id="rankology-your-schema">
                    <div class="box-lefteasy">
                        <div class="wrap-rich-snippets-type schema-steps">
                            <label for="rankology_fno_rich_snippets_type_meta"><?php esc_html_e('Select your data type:', 'wp-rankology'); ?></label>
                            <select id="rankology_fno_rich_snippets_type" name="rankology_fno_rich_snippets_type">
                                <option <?php echo selected('articles', $rankology_fno_rich_snippets_type, false); ?>
                                    value="articles"><?php esc_html_e('Article (WebPage)', 'wp-rankology'); ?>
                                </option>
                                <option <?php echo selected('localbusiness', $rankology_fno_rich_snippets_type, false); ?>
                                    value="localbusiness"><?php esc_html_e('Local Business', 'wp-rankology'); ?>
                                </option>
                                <option <?php echo selected('faq', $rankology_fno_rich_snippets_type, false); ?>
                                    value="faq"><?php esc_html_e('FAQ', 'wp-rankology'); ?>
                                </option>
                                <option <?php echo selected('courses', $rankology_fno_rich_snippets_type, false); ?>
                                    value="courses"><?php esc_html_e('Course', 'wp-rankology'); ?>
                                </option>
                                <option <?php echo selected('recipes', $rankology_fno_rich_snippets_type, false); ?>
                                    value="recipes"><?php esc_html_e('Recipe', 'wp-rankology'); ?>
                                </option>
                                <option <?php echo selected('jobs', $rankology_fno_rich_snippets_type, false); ?>
                                    value="jobs"><?php esc_html_e('Job', 'wp-rankology'); ?>
                                </option>
                                <option <?php echo selected('videos', $rankology_fno_rich_snippets_type, false); ?>
                                    value="videos"><?php esc_html_e('Video', 'wp-rankology'); ?>
                                </option>
                                <option <?php echo selected('events', $rankology_fno_rich_snippets_type, false); ?>
                                    value="events"><?php esc_html_e('Event', 'wp-rankology'); ?>
                                </option>
                                <option <?php echo selected('products', $rankology_fno_rich_snippets_type, false); ?>
                                    value="products"><?php esc_html_e('Product', 'wp-rankology'); ?>
                                </option>
                                <option <?php echo selected('services', $rankology_fno_rich_snippets_type, false); ?>
                                    value="services"><?php esc_html_e('Service', 'wp-rankology'); ?>
                                </option>
                                <option <?php echo selected('softwareapp', $rankology_fno_rich_snippets_type, false); ?>
                                    value="softwareapp"><?php esc_html_e('Software Application ', 'wp-rankology'); ?>
                                </option>
                                <option <?php echo selected('review', $rankology_fno_rich_snippets_type, false); ?>
                                    value="review"><?php esc_html_e('Review', 'wp-rankology'); ?>
                                </option>
                                <option <?php echo selected('custom', $rankology_fno_rich_snippets_type, false); ?>
                                    value="custom"><?php esc_html_e('Custom', 'wp-rankology'); ?>
                                </option>
                            </select>
                        </div>
                        <?php
                        add_action('admin_footer', function() {
                            ?>
                            <script>
                                jQuery(document).ready(function() {
                                    setTimeout(function() {
                                        jQuery('#rankology_fno_rich_snippets_type').trigger('change');
                                    }, 2000);
                                });
                            </script>
                            <?php
                        }, 90);
                        ?>
                        <div class="wrap-rich-snippets-rules schema-steps">
                            <p>
                                <label for="rankology_fno_rich_snippets_rules_meta"><?php esc_html_e('Show this schema if your singular post, page or post type has:', 'wp-rankology'); ?></label>
                                <?php
    $_id_name_for = 'rankology_fno_rich_snippets_rules';
    $snippets_rules = get_post_meta($post->ID, '_rankology_fno_rich_snippets_rules', true);
    $_available_rules_filters = rankology_get_schemas_filters();
    $_available_rules_conditions = rankology_get_schemas_conditions();
    // Retrocompat < 3.8.2
    if ( ! is_array($snippets_rules) || empty($snippets_rules)) {
        $snippets_rules = rankology_get_default_schemas_rules($snippets_rules);
    }
    $_g = 0;
    foreach ($snippets_rules as $_group => $_rules) {
        $_group = $_g++;
        $_n = 0;
        echo '<div data-group="' . $_group . '">';
        foreach ($_rules as $_index => $_rule) {
            $_index = $_n++;

            echo '<p data-group="' . $_group . '">';

            // Filters
            echo "\t<select id=\"{$_id_name_for}[g{$_group}][i{$_index}][filter]\" name=\"{$_id_name_for}[g{$_group}][i{$_index}][filter]\" class=\"small-text\">\n";
            foreach ($_available_rules_filters as $_filter => $_filter_label) {
                echo "\t\t" . '<option value="' . $_filter . '" ' . selected($_rule['filter'], $_filter, false) . '>' . $_filter_label . '</option>' . "\n";
            }
            echo '</select>';

            // Condition.
            echo "\t<select id=\"{$_id_name_for}[g{$_group}][i{$_index}][cond]\" name=\"{$_id_name_for}[g{$_group}][i{$_index}][cond]\" class=\"small-text\">\n";
            foreach ($_available_rules_conditions as $_cond => $_cond_label) {
                echo "\t\t" . '<option value="' . $_cond . '" ' . selected($_rule['cond'], $_cond, false) . '>' . $_cond_label . '</option>' . "\n";
            }
            echo '</select>';

            // CPT
            $class = 'post_type' === $_rule['filter'] ? '' : 'hidden';
            echo "\t<select id=\"{$_id_name_for}[g{$_group}][i{$_index}][cpt]\" name=\"{$_id_name_for}[g{$_group}][i{$_index}][cpt]\" class=\"{$class}\">\n";
            $postTypes = rankology_get_service('WordPressData')->getPostTypes();
            foreach ($postTypes as $_cpt_slug => $_post_type_obj) {
                echo "\t\t" . '<option ' . selected($_rule['cpt'], $_cpt_slug, false) . ' value="' . $_cpt_slug . '">' . $_post_type_obj->labels->name . '</option>' . "\n";
            }
            echo '</select>';

            // TAXO
            $class = 'taxonomy' === $_rule['filter'] ? '' : 'hidden';
            echo "\t<select id=\"{$_id_name_for}[g{$_group}][i{$_index}][taxo]\" name=\"{$_id_name_for}[g{$_group}][i{$_index}][taxo]\" class=\"{$class}\">\n";
            foreach (rankology_get_service('WordPressData')->getTaxonomies(true) as $_tax_slug => $_tax) {
                echo "\t\t" . '<optgroup label="' . $_tax->label . '">' . "\n";
                if (isset($_tax->terms)) {
                    foreach ($_tax->terms as $_term) {
                        echo "\t\t" . '<option ' . selected($_rule['taxo'], $_term->term_id, false) . ' value="' . $_term->term_id . '">' . esc_html($_term->name) . '</option>' . "\n";
                    }
                }
                echo '</optgroup>';
            }
            echo '</select>';

            // INPUT
            $class = 'postId' === $_rule['filter'] ? '' : 'hidden';
            $valuePostId = isset($_rule['postId']) ? $_rule['postId'] : '';
            echo "\t<input type=\"text\" id=\"{$_id_name_for}[g{$_group}][i{$_index}][postId]\" name=\"{$_id_name_for}[g{$_group}][i{$_index}][postId]\" class=\"{$class}\" value=\"{$valuePostId}\" />\n";

            // Buttons
            echo ' <span class="dashicons dashicons-plus-alt ' . $_id_name_for . '_and" data-group="' . $_group . '"></span>';
            echo ' <span class="hidden dashicons dashicons-no-alt ' . $_id_name_for . '_del" data-group="' . $_group . '"></span>';

            echo '</p>';
        }
        echo '</div>';
        echo '<p class="separat_or"><strong>' . __('or', 'wp-rankology') . '</strong></p>';
    } ?>
                            <p>
                                <button type="button" class="button button-secondary"
                                    id="<?php echo $_id_name_for; ?>_add">
                                    <?php esc_html_e('Add a rule', 'wp-rankology'); ?>
                                </button>
                            </p>
                        </div>
                        <p>
                            <label><?php esc_html_e('Map all schema properties to a value:', 'wp-rankology'); ?></label>
                        </p>

                        <?php
                            require_once dirname(__FILE__) . '/automatic/Article.php';
    require_once dirname(__FILE__) . '/automatic/LocalBusiness.php';
    require_once dirname(__FILE__) . '/automatic/Faq.php';
    require_once dirname(__FILE__) . '/automatic/Course.php';
    require_once dirname(__FILE__) . '/automatic/Recipe.php';
    require_once dirname(__FILE__) . '/automatic/Job.php';
    require_once dirname(__FILE__) . '/automatic/Video.php';
    require_once dirname(__FILE__) . '/automatic/Event.php';
    require_once dirname(__FILE__) . '/automatic/Product.php';
    require_once dirname(__FILE__) . '/automatic/SoftwareApp.php';
    require_once dirname(__FILE__) . '/automatic/Service.php';
    require_once dirname(__FILE__) . '/automatic/Review.php';
    require_once dirname(__FILE__) . '/automatic/Custom.php'; ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </td>
</tr>

<?php

    global $pagenow;

    if (isset($pagenow) && $pagenow === 'post-new.php'):

?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const $ = jQuery

        $("#rankology_fno_rich_snippets_type").on("change", function(e) {
            const val = $(this).val()
            if (!val === "products") {
                return;
            }

            $("select[name='rankology_fno_rich_snippets_product_name']").val("post_title")
            $("select[name='rankology_fno_rich_snippets_product_description']").val("post_excerpt")
            $("select[name='rankology_fno_rich_snippets_product_img']").val("post_thumbnail")
            $("select[name='rankology_fno_rich_snippets_product_price']").val(
                "product_regular_price")
            $("select[name='rankology_fno_rich_snippets_product_sku']").val("product_sku")
            $("select[name='rankology_fno_rich_snippets_product_price_valid_date']").val(
                "product_date_to")
            $("select[name='rankology_fno_rich_snippets_product_global_ids']").val(
                "product_barcode_type")
            $("select[name='rankology_fno_rich_snippets_product_global_ids_value']").val(
                "product_barcode")
            $("select[name='rankology_fno_rich_snippets_product_availability']").val("product_stock")
        })
    })
</script>
<?php
    endif;
}

function rankology_save_inputs_schema_automatic($inputs, $postId){
    foreach($inputs as $key => $item) {
        if(isset($_POST[$key])){
            if ($item['key'] === '_rankology_fno_rich_snippets_lb_opening_hours') {
                update_post_meta($postId, $item['key'], $_POST[$key]);
            } else {
                update_post_meta($postId, $item['key'], esc_html($_POST[$key]));
            }
        }
    }
}

add_action('save_post', 'rankology_schemas_save_metabox', 10, 2);
function rankology_schemas_save_metabox($post_id, $post) {
    //Nonce
    if ( ! isset($_POST['rankology_schemas_cpt_nonce']) || ! wp_verify_nonce(
        $_POST['rankology_schemas_cpt_nonce'],
        plugin_basename(__FILE__)
    )) {
        return $post_id;
    }

    //Post type object
    $post_type = get_post_type_object($post->post_type);

    //Check permission
    if ( ! current_user_can('edit_schemas', $post_id)) {
        return $post_id;
    }

    if (isset($_POST['rankology_fno_rich_snippets_rules'])) {
        update_post_meta($post_id, '_rankology_fno_rich_snippets_rules', $_POST['rankology_fno_rich_snippets_rules']);
    }
    if (isset($_POST['rankology_fno_rich_snippets_type'])) {
        update_post_meta($post_id, '_rankology_fno_rich_snippets_type', esc_html($_POST['rankology_fno_rich_snippets_type']));
    }

    //Article
    $inputsArticle = [
        'rankology_fno_rich_snippets_article_type' => [
            'key' => '_rankology_fno_rich_snippets_article_type',
        ],
        'rankology_fno_rich_snippets_article_title' => [
            'key' => '_rankology_fno_rich_snippets_article_title',
        ],
        'rankology_fno_rich_snippets_article_title_cf' => [
            'key' => '_rankology_fno_rich_snippets_article_title_cf',
        ],
        'rankology_fno_rich_snippets_article_title_tax' => [
            'key' => '_rankology_fno_rich_snippets_article_title_tax',
        ],
        'rankology_fno_rich_snippets_article_title_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_article_title_manual_global',
        ],
        'rankology_fno_rich_snippets_article_desc' => [
            'key' => '_rankology_fno_rich_snippets_article_desc',
        ],
        'rankology_fno_rich_snippets_article_desc_cf' => [
            'key' => '_rankology_fno_rich_snippets_article_desc_cf',
        ],
        'rankology_fno_rich_snippets_article_desc_tax' => [
            'key' => '_rankology_fno_rich_snippets_article_desc_tax',
        ],
        'rankology_fno_rich_snippets_article_desc_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_article_desc_manual_global',
        ],
        'rankology_fno_rich_snippets_article_author' => [
            'key' => '_rankology_fno_rich_snippets_article_author',
        ],
        'rankology_fno_rich_snippets_article_author_cf' => [
            'key' => '_rankology_fno_rich_snippets_article_author_cf',
        ],
        'rankology_fno_rich_snippets_article_author_tax' => [
            'key' => '_rankology_fno_rich_snippets_article_author_tax',
        ],
        'rankology_fno_rich_snippets_article_author_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_article_author_manual_global',
        ],
        'rankology_fno_rich_snippets_article_img' => [
            'key' => '_rankology_fno_rich_snippets_article_img',
        ],
        'rankology_fno_rich_snippets_article_img_manual_img_global' => [
            'key' => '_rankology_fno_rich_snippets_article_img_manual_img_global',
        ],
        'rankology_fno_rich_snippets_article_img_cf' => [
            'key' => '_rankology_fno_rich_snippets_article_img_cf',
        ],
        'rankology_fno_rich_snippets_article_img_tax' => [
            'key' => '_rankology_fno_rich_snippets_article_img_tax',
        ],
        'rankology_fno_rich_snippets_article_img_manual_img_library_global' => [
            'key' => '_rankology_fno_rich_snippets_article_img_manual_img_library_global',
        ],
        'rankology_fno_rich_snippets_article_img_manual_img_library_global_width' => [
            'key' => '_rankology_fno_rich_snippets_article_img_manual_img_library_global_width',
        ],
        'rankology_fno_rich_snippets_article_img_manual_img_library_global_height' => [
            'key' => '_rankology_fno_rich_snippets_article_img_manual_img_library_global_height',
        ],
        'rankology_fno_rich_snippets_article_coverage_start_date' => [
            'key' => '_rankology_fno_rich_snippets_article_coverage_start_date',
        ],
        'rankology_fno_rich_snippets_article_coverage_start_date_cf' => [
            'key' => '_rankology_fno_rich_snippets_article_coverage_start_date_cf',
        ],
        'rankology_fno_rich_snippets_article_coverage_start_date_tax' => [
            'key' => '_rankology_fno_rich_snippets_article_coverage_start_date_tax',
        ],
        'rankology_fno_rich_snippets_article_coverage_start_date_manual_date_global' => [
            'key' => '_rankology_fno_rich_snippets_article_coverage_start_date_manual_date_global',
        ],
        'rankology_fno_rich_snippets_article_coverage_start_time' => [
            'key' => '_rankology_fno_rich_snippets_article_coverage_start_time',
        ],
        'rankology_fno_rich_snippets_article_coverage_start_time_cf' => [
            'key' => '_rankology_fno_rich_snippets_article_coverage_start_time_cf',
        ],
        'rankology_fno_rich_snippets_article_coverage_start_time_tax' => [
            'key' => '_rankology_fno_rich_snippets_article_coverage_start_time_tax',
        ],
        'rankology_fno_rich_snippets_article_coverage_start_time_manual_time_global' => [
            'key' => '_rankology_fno_rich_snippets_article_coverage_start_time_manual_time_global',
        ],
        'rankology_fno_rich_snippets_article_coverage_end_date' => [
            'key' => '_rankology_fno_rich_snippets_article_coverage_end_date',
        ],
        'rankology_fno_rich_snippets_article_coverage_end_date_cf' => [
            'key' => '_rankology_fno_rich_snippets_article_coverage_end_date_cf',
        ],
        'rankology_fno_rich_snippets_article_coverage_end_date_tax' => [
            'key' => '_rankology_fno_rich_snippets_article_coverage_end_date_tax',
        ],
        'rankology_fno_rich_snippets_article_coverage_end_date_manual_date_global' => [
            'key' => '_rankology_fno_rich_snippets_article_coverage_end_date_manual_date_global',
        ],
        'rankology_fno_rich_snippets_article_coverage_end_time' => [
            'key' => '_rankology_fno_rich_snippets_article_coverage_end_time',
        ],
        'rankology_fno_rich_snippets_article_coverage_end_time_cf' => [
            'key' => '_rankology_fno_rich_snippets_article_coverage_end_time_cf',
        ],
        'rankology_fno_rich_snippets_article_coverage_end_time_tax' => [
            'key' => '_rankology_fno_rich_snippets_article_coverage_end_time_tax',
        ],
        'rankology_fno_rich_snippets_article_coverage_end_time_manual_time_global' => [
            'key' => '_rankology_fno_rich_snippets_article_coverage_end_time_manual_time_global',
        ],
        'rankology_fno_rich_snippets_article_speakable' => [
            'key' => '_rankology_fno_rich_snippets_article_speakable',
        ],
        'rankology_fno_rich_snippets_article_speakable_cf' => [
            'key' => '_rankology_fno_rich_snippets_article_speakable_cf',
        ],
        'rankology_fno_rich_snippets_article_speakable_tax' => [
            'key' => '_rankology_fno_rich_snippets_article_speakable_tax',
        ],
        'rankology_fno_rich_snippets_article_speakable_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_article_speakable_manual_global',
        ]
    ];

    rankology_save_inputs_schema_automatic($inputsArticle, $post_id);

    //Local Business
    $inputsLocalBusiness = [
        'rankology_fno_rich_snippets_lb_name' => [
            'key' => '_rankology_fno_rich_snippets_lb_name'
        ],
        'rankology_fno_rich_snippets_lb_name_cf' => [
            'key' => '_rankology_fno_rich_snippets_lb_name_cf'
        ],
        'rankology_fno_rich_snippets_lb_name_tax' => [
            'key' => '_rankology_fno_rich_snippets_lb_name_tax'
        ],
        'rankology_fno_rich_snippets_lb_name_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_lb_name_manual_global'
        ],
        'rankology_fno_rich_snippets_lb_type' => [
            'key' => '_rankology_fno_rich_snippets_lb_type'
        ],
        'rankology_fno_rich_snippets_lb_type_cf' => [
            'key' => '_rankology_fno_rich_snippets_lb_type_cf'
        ],
        'rankology_fno_rich_snippets_lb_type_tax' => [
            'key' => '_rankology_fno_rich_snippets_lb_type_tax'
        ],
        'rankology_fno_rich_snippets_lb_type_lb' => [
            'key' => '_rankology_fno_rich_snippets_lb_type_lb'
        ],
        'rankology_fno_rich_snippets_lb_type_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_lb_type_manual_global'
        ],
        'rankology_fno_rich_snippets_lb_img' => [
            'key' => '_rankology_fno_rich_snippets_lb_img'
        ],
        'rankology_fno_rich_snippets_lb_img_manual_img_global' => [
            'key' => '_rankology_fno_rich_snippets_lb_img_manual_img_global'
        ],
        'rankology_fno_rich_snippets_lb_img_cf' => [
            'key' => '_rankology_fno_rich_snippets_lb_img_cf'
        ],
        'rankology_fno_rich_snippets_lb_img_tax' => [
            'key' => '_rankology_fno_rich_snippets_lb_img_tax'
        ],
        'rankology_fno_rich_snippets_lb_img_manual_img_library_global' => [
            'key' => '_rankology_fno_rich_snippets_lb_img_manual_img_library_global'
        ],
        'rankology_fno_rich_snippets_lb_img_manual_img_library_global_width' => [
            'key' => '_rankology_fno_rich_snippets_lb_img_manual_img_library_global_width'
        ],
        'rankology_fno_rich_snippets_lb_img_manual_img_library_global_height' => [
            'key' => '_rankology_fno_rich_snippets_lb_img_manual_img_library_global_height'
        ],
        'rankology_fno_rich_snippets_lb_street_addr' => [
            'key' => '_rankology_fno_rich_snippets_lb_street_addr'
        ],
        'rankology_fno_rich_snippets_lb_street_addr_cf' => [
            'key' => '_rankology_fno_rich_snippets_lb_street_addr_cf'
        ],
        'rankology_fno_rich_snippets_lb_street_addr_tax' => [
            'key' => '_rankology_fno_rich_snippets_lb_street_addr_tax'
        ],
        'rankology_fno_rich_snippets_lb_street_addr_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_lb_street_addr_manual_global'
        ],
        'rankology_fno_rich_snippets_lb_city' => [
            'key' => '_rankology_fno_rich_snippets_lb_city'
        ],
        'rankology_fno_rich_snippets_lb_city_cf' => [
            'key' => '_rankology_fno_rich_snippets_lb_city_cf'
        ],
        'rankology_fno_rich_snippets_lb_city_tax' => [
            'key' => '_rankology_fno_rich_snippets_lb_city_tax'
        ],
        'rankology_fno_rich_snippets_lb_city_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_lb_city_manual_global'
        ],
        'rankology_fno_rich_snippets_lb_state' => [
            'key' => '_rankology_fno_rich_snippets_lb_state'
        ],
        'rankology_fno_rich_snippets_lb_state_cf' => [
            'key' => '_rankology_fno_rich_snippets_lb_state_cf'
        ],
        'rankology_fno_rich_snippets_lb_state_tax' => [
            'key' => '_rankology_fno_rich_snippets_lb_state_tax'
        ],
        'rankology_fno_rich_snippets_lb_state_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_lb_state_manual_global'
        ],
        'rankology_fno_rich_snippets_lb_pc' => [
            'key' => '_rankology_fno_rich_snippets_lb_pc'
        ],
        'rankology_fno_rich_snippets_lb_pc_cf' => [
            'key' => '_rankology_fno_rich_snippets_lb_pc_cf'
        ],
        'rankology_fno_rich_snippets_lb_pc_tax' => [
            'key' => '_rankology_fno_rich_snippets_lb_pc_tax'
        ],
        'rankology_fno_rich_snippets_lb_pc_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_lb_pc_manual_global'
        ],
        'rankology_fno_rich_snippets_lb_country' => [
            'key' => '_rankology_fno_rich_snippets_lb_country'
        ],
        'rankology_fno_rich_snippets_lb_country_cf' => [
            'key' => '_rankology_fno_rich_snippets_lb_country_cf'
        ],
        'rankology_fno_rich_snippets_lb_country_tax' => [
            'key' => '_rankology_fno_rich_snippets_lb_country_tax'
        ],
        'rankology_fno_rich_snippets_lb_country_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_lb_country_manual_global'
        ],
        'rankology_fno_rich_snippets_lb_lat' => [
            'key' => '_rankology_fno_rich_snippets_lb_lat'
        ],
        'rankology_fno_rich_snippets_lb_lat_cf' => [
            'key' => '_rankology_fno_rich_snippets_lb_lat_cf'
        ],
        'rankology_fno_rich_snippets_lb_lat_tax' => [
            'key' => '_rankology_fno_rich_snippets_lb_lat_tax'
        ],
        'rankology_fno_rich_snippets_lb_lat_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_lb_lat_manual_global'
        ],
        'rankology_fno_rich_snippets_lb_lon' => [
            'key' => '_rankology_fno_rich_snippets_lb_lon'
        ],
        'rankology_fno_rich_snippets_lb_lon_cf' => [
            'key' => '_rankology_fno_rich_snippets_lb_lon_cf'
        ],
        'rankology_fno_rich_snippets_lb_lon_tax' => [
            'key' => '_rankology_fno_rich_snippets_lb_lon_tax'
        ],
        'rankology_fno_rich_snippets_lb_lon_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_lb_lon_manual_global'
        ],
        'rankology_fno_rich_snippets_lb_website' => [
            'key' => '_rankology_fno_rich_snippets_lb_website'
        ],
        'rankology_fno_rich_snippets_lb_website_cf' => [
            'key' => '_rankology_fno_rich_snippets_lb_website_cf'
        ],
        'rankology_fno_rich_snippets_lb_website_tax' => [
            'key' => '_rankology_fno_rich_snippets_lb_website_tax'
        ],
        'rankology_fno_rich_snippets_lb_website_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_lb_website_manual_global'
        ],
        'rankology_fno_rich_snippets_lb_tel' => [
            'key' => '_rankology_fno_rich_snippets_lb_tel'
        ],
        'rankology_fno_rich_snippets_lb_tel_cf' => [
            'key' => '_rankology_fno_rich_snippets_lb_tel_cf'
        ],
        'rankology_fno_rich_snippets_lb_tel_tax' => [
            'key' => '_rankology_fno_rich_snippets_lb_tel_tax'
        ],
        'rankology_fno_rich_snippets_lb_tel_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_lb_tel_manual_global'
        ],
        'rankology_fno_rich_snippets_lb_price' => [
            'key' => '_rankology_fno_rich_snippets_lb_price'
        ],
        'rankology_fno_rich_snippets_lb_price_cf' => [
            'key' => '_rankology_fno_rich_snippets_lb_price_cf'
        ],
        'rankology_fno_rich_snippets_lb_price_tax' => [
            'key' => '_rankology_fno_rich_snippets_lb_price_tax'
        ],
        'rankology_fno_rich_snippets_lb_price_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_lb_price_manual_global'
        ],
        'rankology_fno_rich_snippets_lb_serves_cuisine' => [
            'key' => '_rankology_fno_rich_snippets_lb_serves_cuisine'
        ],
        'rankology_fno_rich_snippets_lb_serves_cuisine_cf' => [
            'key' => '_rankology_fno_rich_snippets_lb_serves_cuisine_cf'
        ],
        'rankology_fno_rich_snippets_lb_serves_cuisine_tax' => [
            'key' => '_rankology_fno_rich_snippets_lb_serves_cuisine_tax'
        ],
        'rankology_fno_rich_snippets_lb_serves_cuisine_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_lb_serves_cuisine_manual_global'
        ],
        'rankology_fno_rich_snippets_lb_menu' => [
            'key' => '_rankology_fno_rich_snippets_lb_menu'
        ],
        'rankology_fno_rich_snippets_lb_menu_cf' => [
            'key' => '_rankology_fno_rich_snippets_lb_menu_cf'
        ],
        'rankology_fno_rich_snippets_lb_menu_tax' => [
            'key' => '_rankology_fno_rich_snippets_lb_menu_tax'
        ],
        'rankology_fno_rich_snippets_lb_menu_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_lb_menu_manual_global'
        ],
        'rankology_fno_rich_snippets_lb_accepts_reservations' => [
            'key' => '_rankology_fno_rich_snippets_lb_accepts_reservations'
        ],
        'rankology_fno_rich_snippets_lb_accepts_reservations_cf' => [
            'key' => '_rankology_fno_rich_snippets_lb_accepts_reservations_cf'
        ],
        'rankology_fno_rich_snippets_lb_accepts_reservations_tax' => [
            'key' => '_rankology_fno_rich_snippets_lb_accepts_reservations_tax'
        ],
        'rankology_fno_rich_snippets_lb_accepts_reservations_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_lb_accepts_reservations_manual_global'
        ],
        'rankology_fno_rich_snippets_lb_opening_hours' => [
            'key' => '_rankology_fno_rich_snippets_lb_opening_hours'
        ],
    ];

    rankology_save_inputs_schema_automatic($inputsLocalBusiness, $post_id);

    //FAQ
    $inputsFaq = [
        'rankology_fno_rich_snippets_faq_q' => [
            'key' => '_rankology_fno_rich_snippets_faq_q'
        ],
        'rankology_fno_rich_snippets_faq_q_cf' => [
            'key' => '_rankology_fno_rich_snippets_faq_q_cf'
        ],
        'rankology_fno_rich_snippets_faq_q_tax' => [
            'key' => '_rankology_fno_rich_snippets_faq_q_tax'
        ],
        'rankology_fno_rich_snippets_faq_q_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_faq_q_manual_global'
        ],
        'rankology_fno_rich_snippets_faq_a' => [
            'key' => '_rankology_fno_rich_snippets_faq_a'
        ],
        'rankology_fno_rich_snippets_faq_a_cf' => [
            'key' => '_rankology_fno_rich_snippets_faq_a_cf'
        ],
        'rankology_fno_rich_snippets_faq_a_tax' => [
            'key' => '_rankology_fno_rich_snippets_faq_a_tax'
        ],
        'rankology_fno_rich_snippets_faq_a_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_faq_a_manual_global'
        ],
    ];

    rankology_save_inputs_schema_automatic($inputsFaq, $post_id);

    //Course
    $inputsCourse = [
        'rankology_fno_rich_snippets_courses_title' => [
            'key' => '_rankology_fno_rich_snippets_courses_title'
        ],
        'rankology_fno_rich_snippets_courses_title_cf' => [
            'key' => '_rankology_fno_rich_snippets_courses_title_cf'
        ],
        'rankology_fno_rich_snippets_courses_title_tax' => [
            'key' => '_rankology_fno_rich_snippets_courses_title_tax'
        ],
        'rankology_fno_rich_snippets_courses_title_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_courses_title_manual_global'
        ],
        'rankology_fno_rich_snippets_courses_desc' => [
            'key' => '_rankology_fno_rich_snippets_courses_desc'
        ],
        'rankology_fno_rich_snippets_courses_desc_cf' => [
            'key' => '_rankology_fno_rich_snippets_courses_desc_cf'
        ],
        'rankology_fno_rich_snippets_courses_desc_tax' => [
            'key' => '_rankology_fno_rich_snippets_courses_desc_tax'
        ],
        'rankology_fno_rich_snippets_courses_desc_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_courses_desc_manual_global'
        ],
        'rankology_fno_rich_snippets_courses_school' => [
            'key' => '_rankology_fno_rich_snippets_courses_school'
        ],
        'rankology_fno_rich_snippets_courses_school_cf' => [
            'key' => '_rankology_fno_rich_snippets_courses_school_cf'
        ],
        'rankology_fno_rich_snippets_courses_school_tax' => [
            'key' => '_rankology_fno_rich_snippets_courses_school_tax'
        ],
        'rankology_fno_rich_snippets_courses_school_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_courses_school_manual_global'
        ],
        'rankology_fno_rich_snippets_courses_website' => [
            'key' => '_rankology_fno_rich_snippets_courses_website'
        ],
        'rankology_fno_rich_snippets_courses_website_cf' => [
            'key' => '_rankology_fno_rich_snippets_courses_website_cf'
        ],
        'rankology_fno_rich_snippets_courses_website_tax' => [
            'key' => '_rankology_fno_rich_snippets_courses_website_tax'
        ],
        'rankology_fno_rich_snippets_courses_website_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_courses_website_manual_global'
        ],
    ];

    rankology_save_inputs_schema_automatic($inputsCourse, $post_id);

    //Recipe
    $inputsRecipe = [
        'rankology_fno_rich_snippets_recipes_name' => [
            'key' => '_rankology_fno_rich_snippets_recipes_name'
        ],
        'rankology_fno_rich_snippets_recipes_name_cf' => [
            'key' => '_rankology_fno_rich_snippets_recipes_name_cf'
        ],
        'rankology_fno_rich_snippets_recipes_name_tax' => [
            'key' => '_rankology_fno_rich_snippets_recipes_name_tax'
        ],
        'rankology_fno_rich_snippets_recipes_name_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_recipes_name_manual_global'
        ],
        'rankology_fno_rich_snippets_recipes_desc' => [
            'key' => '_rankology_fno_rich_snippets_recipes_desc'
        ],
        'rankology_fno_rich_snippets_recipes_desc_cf' => [
            'key' => '_rankology_fno_rich_snippets_recipes_desc_cf'
        ],
        'rankology_fno_rich_snippets_recipes_desc_tax' => [
            'key' => '_rankology_fno_rich_snippets_recipes_desc_tax'
        ],
        'rankology_fno_rich_snippets_recipes_desc_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_recipes_desc_manual_global'
        ],
        'rankology_fno_rich_snippets_recipes_cat' => [
            'key' => '_rankology_fno_rich_snippets_recipes_cat'
        ],
        'rankology_fno_rich_snippets_recipes_cat_cf' => [
            'key' => '_rankology_fno_rich_snippets_recipes_cat_cf'
        ],
        'rankology_fno_rich_snippets_recipes_cat_tax' => [
            'key' => '_rankology_fno_rich_snippets_recipes_cat_tax'
        ],
        'rankology_fno_rich_snippets_recipes_cat_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_recipes_cat_manual_global'
        ],
        'rankology_fno_rich_snippets_recipes_img' => [
            'key' => '_rankology_fno_rich_snippets_recipes_img'
        ],
        'rankology_fno_rich_snippets_recipes_img_manual_img_global' => [
            'key' => '_rankology_fno_rich_snippets_recipes_img_manual_img_global'
        ],
        'rankology_fno_rich_snippets_recipes_img_cf' => [
            'key' => '_rankology_fno_rich_snippets_recipes_img_cf'
        ],
        'rankology_fno_rich_snippets_recipes_img_tax' => [
            'key' => '_rankology_fno_rich_snippets_recipes_img_tax'
        ],
        'rankology_fno_rich_snippets_recipes_img_manual_img_library_global' => [
            'key' => '_rankology_fno_rich_snippets_recipes_img_manual_img_library_global'
        ],
        'rankology_fno_rich_snippets_recipes_img_manual_img_library_global_width' => [
            'key' => '_rankology_fno_rich_snippets_recipes_img_manual_img_library_global_width'
        ],
        'rankology_fno_rich_snippets_recipes_img_manual_img_library_global_height' => [
            'key' => '_rankology_fno_rich_snippets_recipes_img_manual_img_library_global_height'
        ],
        'rankology_fno_rich_snippets_recipes_video' => [
            'key' => '_rankology_fno_rich_snippets_recipes_video'
        ],
        'rankology_fno_rich_snippets_recipes_video_cf' => [
            'key' => '_rankology_fno_rich_snippets_recipes_video_cf'
        ],
        'rankology_fno_rich_snippets_recipes_video_tax' => [
            'key' => '_rankology_fno_rich_snippets_recipes_video_tax'
        ],
        'rankology_fno_rich_snippets_recipes_video_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_recipes_video_manual_global'
        ],
        'rankology_fno_rich_snippets_recipes_prep_time' => [
            'key' => '_rankology_fno_rich_snippets_recipes_prep_time'
        ],
        'rankology_fno_rich_snippets_recipes_prep_time_cf' => [
            'key' => '_rankology_fno_rich_snippets_recipes_prep_time_cf'
        ],
        'rankology_fno_rich_snippets_recipes_prep_time_tax' => [
            'key' => '_rankology_fno_rich_snippets_recipes_prep_time_tax'
        ],
        'rankology_fno_rich_snippets_recipes_prep_time_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_recipes_prep_time_manual_global'
        ],
        'rankology_fno_rich_snippets_recipes_cook_time' => [
            'key' => '_rankology_fno_rich_snippets_recipes_cook_time'
        ],
        'rankology_fno_rich_snippets_recipes_cook_time_cf' => [
            'key' => '_rankology_fno_rich_snippets_recipes_cook_time_cf'
        ],
        'rankology_fno_rich_snippets_recipes_cook_time_tax' => [
            'key' => '_rankology_fno_rich_snippets_recipes_cook_time_tax'
        ],
        'rankology_fno_rich_snippets_recipes_cook_time_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_recipes_cook_time_manual_global'
        ],
        'rankology_fno_rich_snippets_recipes_calories' => [
            'key' => '_rankology_fno_rich_snippets_recipes_calories'
        ],
        'rankology_fno_rich_snippets_recipes_calories_cf' => [
            'key' => '_rankology_fno_rich_snippets_recipes_calories_cf'
        ],
        'rankology_fno_rich_snippets_recipes_calories_tax' => [
            'key' => '_rankology_fno_rich_snippets_recipes_calories_tax'
        ],
        'rankology_fno_rich_snippets_recipes_calories_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_recipes_calories_manual_global'
        ],
        'rankology_fno_rich_snippets_recipes_yield' => [
            'key' => '_rankology_fno_rich_snippets_recipes_yield'
        ],
        'rankology_fno_rich_snippets_recipes_yield_cf' => [
            'key' => '_rankology_fno_rich_snippets_recipes_yield_cf'
        ],
        'rankology_fno_rich_snippets_recipes_yield_tax' => [
            'key' => '_rankology_fno_rich_snippets_recipes_yield_tax'
        ],
        'rankology_fno_rich_snippets_recipes_yield_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_recipes_yield_manual_global'
        ],
        'rankology_fno_rich_snippets_recipes_keywords' => [
            'key' => '_rankology_fno_rich_snippets_recipes_keywords'
        ],
        'rankology_fno_rich_snippets_recipes_keywords_cf' => [
            'key' => '_rankology_fno_rich_snippets_recipes_keywords_cf'
        ],
        'rankology_fno_rich_snippets_recipes_keywords_tax' => [
            'key' => '_rankology_fno_rich_snippets_recipes_keywords_tax'
        ],
        'rankology_fno_rich_snippets_recipes_keywords_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_recipes_keywords_manual_global'
        ],
        'rankology_fno_rich_snippets_recipes_cuisine' => [
            'key' => '_rankology_fno_rich_snippets_recipes_cuisine'
        ],
        'rankology_fno_rich_snippets_recipes_cuisine_cf' => [
            'key' => '_rankology_fno_rich_snippets_recipes_cuisine_cf'
        ],
        'rankology_fno_rich_snippets_recipes_cuisine_tax' => [
            'key' => '_rankology_fno_rich_snippets_recipes_cuisine_tax'
        ],
        'rankology_fno_rich_snippets_recipes_cuisine_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_recipes_cuisine_manual_global'
        ],
        'rankology_fno_rich_snippets_recipes_ingredient' => [
            'key' => '_rankology_fno_rich_snippets_recipes_ingredient'
        ],
        'rankology_fno_rich_snippets_recipes_ingredient_cf' => [
            'key' => '_rankology_fno_rich_snippets_recipes_ingredient_cf'
        ],
        'rankology_fno_rich_snippets_recipes_ingredient_tax' => [
            'key' => '_rankology_fno_rich_snippets_recipes_ingredient_tax'
        ],
        'rankology_fno_rich_snippets_recipes_ingredient_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_recipes_ingredient_manual_global'
        ],
        'rankology_fno_rich_snippets_recipes_instructions' => [
            'key' => '_rankology_fno_rich_snippets_recipes_instructions'
        ],
        'rankology_fno_rich_snippets_recipes_instructions_cf' => [
            'key' => '_rankology_fno_rich_snippets_recipes_instructions_cf'
        ],
        'rankology_fno_rich_snippets_recipes_instructions_tax' => [
            'key' => '_rankology_fno_rich_snippets_recipes_instructions_tax'
        ],
        'rankology_fno_rich_snippets_recipes_instructions_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_recipes_instructions_manual_global'
        ],
    ];

    rankology_save_inputs_schema_automatic($inputsRecipe, $post_id);

    //Job
    $inputsJob = [
        'rankology_fno_rich_snippets_jobs_name' => [
            'key' => '_rankology_fno_rich_snippets_jobs_name'
        ],
        'rankology_fno_rich_snippets_jobs_name_cf' => [
            'key' => '_rankology_fno_rich_snippets_jobs_name_cf'
        ],
        'rankology_fno_rich_snippets_jobs_name_tax' => [
            'key' => '_rankology_fno_rich_snippets_jobs_name_tax'
        ],
        'rankology_fno_rich_snippets_jobs_name_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_jobs_name_manual_global'
        ],
        'rankology_fno_rich_snippets_jobs_desc' => [
            'key' => '_rankology_fno_rich_snippets_jobs_desc'
        ],
        'rankology_fno_rich_snippets_jobs_desc_cf' => [
            'key' => '_rankology_fno_rich_snippets_jobs_desc_cf'
        ],
        'rankology_fno_rich_snippets_jobs_desc_tax' => [
            'key' => '_rankology_fno_rich_snippets_jobs_desc_tax'
        ],
        'rankology_fno_rich_snippets_jobs_desc_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_jobs_desc_manual_global'
        ],
        'rankology_fno_rich_snippets_jobs_date_posted' => [
            'key' => '_rankology_fno_rich_snippets_jobs_date_posted'
        ],
        'rankology_fno_rich_snippets_jobs_date_posted_cf' => [
            'key' => '_rankology_fno_rich_snippets_jobs_date_posted_cf'
        ],
        'rankology_fno_rich_snippets_jobs_date_posted_tax' => [
            'key' => '_rankology_fno_rich_snippets_jobs_date_posted_tax'
        ],
        'rankology_fno_rich_snippets_jobs_date_posted_manual_date_global' => [
            'key' => '_rankology_fno_rich_snippets_jobs_date_posted_manual_date_global'
        ],
        'rankology_fno_rich_snippets_jobs_valid_through' => [
            'key' => '_rankology_fno_rich_snippets_jobs_valid_through'
        ],
        'rankology_fno_rich_snippets_jobs_valid_through_cf' => [
            'key' => '_rankology_fno_rich_snippets_jobs_valid_through_cf'
        ],
        'rankology_fno_rich_snippets_jobs_valid_through_tax' => [
            'key' => '_rankology_fno_rich_snippets_jobs_valid_through_tax'
        ],
        'rankology_fno_rich_snippets_jobs_valid_through_manual_date_global' => [
            'key' => '_rankology_fno_rich_snippets_jobs_valid_through_manual_date_global'
        ],
        'rankology_fno_rich_snippets_jobs_employment_type' => [
            'key' => '_rankology_fno_rich_snippets_jobs_employment_type'
        ],
        'rankology_fno_rich_snippets_jobs_employment_type_cf' => [
            'key' => '_rankology_fno_rich_snippets_jobs_employment_type_cf'
        ],
        'rankology_fno_rich_snippets_jobs_employment_type_tax' => [
            'key' => '_rankology_fno_rich_snippets_jobs_employment_type_tax'
        ],
        'rankology_fno_rich_snippets_jobs_employment_type_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_jobs_employment_type_manual_global'
        ],
        'rankology_fno_rich_snippets_jobs_identifier_name' => [
            'key' => '_rankology_fno_rich_snippets_jobs_identifier_name'
        ],
        'rankology_fno_rich_snippets_jobs_identifier_name_cf' => [
            'key' => '_rankology_fno_rich_snippets_jobs_identifier_name_cf'
        ],
        'rankology_fno_rich_snippets_jobs_identifier_name_tax' => [
            'key' => '_rankology_fno_rich_snippets_jobs_identifier_name_tax'
        ],
        'rankology_fno_rich_snippets_jobs_identifier_name_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_jobs_identifier_name_manual_global'
        ],
        'rankology_fno_rich_snippets_jobs_identifier_value' => [
            'key' => '_rankology_fno_rich_snippets_jobs_identifier_value'
        ],
        'rankology_fno_rich_snippets_jobs_identifier_value_cf' => [
            'key' => '_rankology_fno_rich_snippets_jobs_identifier_value_cf'
        ],
        'rankology_fno_rich_snippets_jobs_identifier_value_tax' => [
            'key' => '_rankology_fno_rich_snippets_jobs_identifier_value_tax'
        ],
        'rankology_fno_rich_snippets_jobs_identifier_value_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_jobs_identifier_value_manual_global'
        ],
        'rankology_fno_rich_snippets_jobs_hiring_organization' => [
            'key' => '_rankology_fno_rich_snippets_jobs_hiring_organization'
        ],
        'rankology_fno_rich_snippets_jobs_hiring_organization_cf' => [
            'key' => '_rankology_fno_rich_snippets_jobs_hiring_organization_cf'
        ],
        'rankology_fno_rich_snippets_jobs_hiring_organization_tax' => [
            'key' => '_rankology_fno_rich_snippets_jobs_hiring_organization_tax'
        ],
        'rankology_fno_rich_snippets_jobs_hiring_organization_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_jobs_hiring_organization_manual_global'
        ],
        'rankology_fno_rich_snippets_jobs_hiring_same_as' => [
            'key' => '_rankology_fno_rich_snippets_jobs_hiring_same_as'
        ],
        'rankology_fno_rich_snippets_jobs_hiring_same_as_cf' => [
            'key' => '_rankology_fno_rich_snippets_jobs_hiring_same_as_cf'
        ],
        'rankology_fno_rich_snippets_jobs_hiring_same_as_tax' => [
            'key' => '_rankology_fno_rich_snippets_jobs_hiring_same_as_tax'
        ],
        'rankology_fno_rich_snippets_jobs_hiring_same_as_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_jobs_hiring_same_as_manual_global'
        ],
        'rankology_fno_rich_snippets_jobs_hiring_logo' => [
            'key' => '_rankology_fno_rich_snippets_jobs_hiring_logo'
        ],
        'rankology_fno_rich_snippets_jobs_hiring_logo_manual_img_global' => [
            'key' => '_rankology_fno_rich_snippets_jobs_hiring_logo_manual_img_global'
        ],
        'rankology_fno_rich_snippets_jobs_hiring_logo_cf' => [
            'key' => '_rankology_fno_rich_snippets_jobs_hiring_logo_cf'
        ],
        'rankology_fno_rich_snippets_jobs_hiring_logo_tax' => [
            'key' => '_rankology_fno_rich_snippets_jobs_hiring_logo_tax'
        ],
        'rankology_fno_rich_snippets_jobs_hiring_logo_manual_img_library_global' => [
            'key' => '_rankology_fno_rich_snippets_jobs_hiring_logo_manual_img_library_global'
        ],
        'rankology_fno_rich_snippets_jobs_hiring_logo_manual_img_library_global_width' => [
            'key' => '_rankology_fno_rich_snippets_jobs_hiring_logo_manual_img_library_global_width'
        ],
        'rankology_fno_rich_snippets_jobs_hiring_logo_manual_img_library_global_height' => [
            'key' => '_rankology_fno_rich_snippets_jobs_hiring_logo_manual_img_library_global_height'
        ],
        'rankology_fno_rich_snippets_jobs_address_street' => [
            'key' => '_rankology_fno_rich_snippets_jobs_address_street'
        ],
        'rankology_fno_rich_snippets_jobs_address_street_cf' => [
            'key' => '_rankology_fno_rich_snippets_jobs_address_street_cf'
        ],
        'rankology_fno_rich_snippets_jobs_address_street_tax' => [
            'key' => '_rankology_fno_rich_snippets_jobs_address_street_tax'
        ],
        'rankology_fno_rich_snippets_jobs_address_street_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_jobs_address_street_manual_global'
        ],
        'rankology_fno_rich_snippets_jobs_address_locality' => [
            'key' => '_rankology_fno_rich_snippets_jobs_address_locality'
        ],
        'rankology_fno_rich_snippets_jobs_address_locality_cf' => [
            'key' => '_rankology_fno_rich_snippets_jobs_address_locality_cf'
        ],
        'rankology_fno_rich_snippets_jobs_address_locality_tax' => [
            'key' => '_rankology_fno_rich_snippets_jobs_address_locality_tax'
        ],
        'rankology_fno_rich_snippets_jobs_address_locality_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_jobs_address_locality_manual_global'
        ],
        'rankology_fno_rich_snippets_jobs_address_region' => [
            'key' => '_rankology_fno_rich_snippets_jobs_address_region'
        ],
        'rankology_fno_rich_snippets_jobs_address_region_cf' => [
            'key' => '_rankology_fno_rich_snippets_jobs_address_region_cf'
        ],
        'rankology_fno_rich_snippets_jobs_address_region_tax' => [
            'key' => '_rankology_fno_rich_snippets_jobs_address_region_tax'
        ],
        'rankology_fno_rich_snippets_jobs_address_region_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_jobs_address_region_manual_global'
        ],
        'rankology_fno_rich_snippets_jobs_postal_code' => [
            'key' => '_rankology_fno_rich_snippets_jobs_postal_code'
        ],
        'rankology_fno_rich_snippets_jobs_postal_code_cf' => [
            'key' => '_rankology_fno_rich_snippets_jobs_postal_code_cf'
        ],
        'rankology_fno_rich_snippets_jobs_postal_code_tax' => [
            'key' => '_rankology_fno_rich_snippets_jobs_postal_code_tax'
        ],
        'rankology_fno_rich_snippets_jobs_postal_code_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_jobs_postal_code_manual_global'
        ],
        'rankology_fno_rich_snippets_jobs_country' => [
            'key' => '_rankology_fno_rich_snippets_jobs_country'
        ],
        'rankology_fno_rich_snippets_jobs_country_cf' => [
            'key' => '_rankology_fno_rich_snippets_jobs_country_cf'
        ],
        'rankology_fno_rich_snippets_jobs_country_tax' => [
            'key' => '_rankology_fno_rich_snippets_jobs_country_tax'
        ],
        'rankology_fno_rich_snippets_jobs_country_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_jobs_country_manual_global'
        ],
        'rankology_fno_rich_snippets_jobs_remote' => [
            'key' => '_rankology_fno_rich_snippets_jobs_remote'
        ],
        'rankology_fno_rich_snippets_jobs_remote_cf' => [
            'key' => '_rankology_fno_rich_snippets_jobs_remote_cf'
        ],
        'rankology_fno_rich_snippets_jobs_remote_tax' => [
            'key' => '_rankology_fno_rich_snippets_jobs_remote_tax'
        ],
        'rankology_fno_rich_snippets_jobs_remote_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_jobs_remote_manual_global'
        ],
        'rankology_fno_rich_snippets_jobs_direct_apply' => [
            'key' => '_rankology_fno_rich_snippets_jobs_direct_apply'
        ],
        'rankology_fno_rich_snippets_jobs_direct_apply_cf' => [
            'key' => '_rankology_fno_rich_snippets_jobs_direct_apply_cf'
        ],
        'rankology_fno_rich_snippets_jobs_direct_apply_tax' => [
            'key' => '_rankology_fno_rich_snippets_jobs_direct_apply_tax'
        ],
        'rankology_fno_rich_snippets_jobs_direct_apply_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_jobs_direct_apply_manual_global'
        ],
        'rankology_fno_rich_snippets_jobs_salary' => [
            'key' => '_rankology_fno_rich_snippets_jobs_salary'
        ],
        'rankology_fno_rich_snippets_jobs_salary_cf' => [
            'key' => '_rankology_fno_rich_snippets_jobs_salary_cf'
        ],
        'rankology_fno_rich_snippets_jobs_salary_tax' => [
            'key' => '_rankology_fno_rich_snippets_jobs_salary_tax'
        ],
        'rankology_fno_rich_snippets_jobs_salary_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_jobs_salary_manual_global'
        ],
        'rankology_fno_rich_snippets_jobs_salary_currency' => [
            'key' => '_rankology_fno_rich_snippets_jobs_salary_currency'
        ],
        'rankology_fno_rich_snippets_jobs_salary_currency_cf' => [
            'key' => '_rankology_fno_rich_snippets_jobs_salary_currency_cf'
        ],
        'rankology_fno_rich_snippets_jobs_salary_currency_tax' => [
            'key' => '_rankology_fno_rich_snippets_jobs_salary_currency_tax'
        ],
        'rankology_fno_rich_snippets_jobs_salary_currency_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_jobs_salary_currency_manual_global'
        ],
        'rankology_fno_rich_snippets_jobs_salary_unit' => [
            'key' => '_rankology_fno_rich_snippets_jobs_salary_unit'
        ],
        'rankology_fno_rich_snippets_jobs_salary_unit_cf' => [
            'key' => '_rankology_fno_rich_snippets_jobs_salary_unit_cf'
        ],
        'rankology_fno_rich_snippets_jobs_salary_unit_tax' => [
            'key' => '_rankology_fno_rich_snippets_jobs_salary_unit_tax'
        ],
        'rankology_fno_rich_snippets_jobs_salary_unit_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_jobs_salary_unit_manual_global'
        ],
        'rankology_fno_rich_snippets_jobs_location_requirement' => [
            'key' => '_rankology_fno_rich_snippets_jobs_location_requirement'
        ],
        'rankology_fno_rich_snippets_jobs_location_requirement_cf' => [
            'key' => '_rankology_fno_rich_snippets_jobs_location_requirement_cf'
        ],
        'rankology_fno_rich_snippets_jobs_location_requirement_tax' => [
            'key' => '_rankology_fno_rich_snippets_jobs_location_requirement_tax'
        ],
        'rankology_fno_rich_snippets_jobs_location_requirement_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_jobs_location_requirement_manual_global'
        ],
    ];
    rankology_save_inputs_schema_automatic($inputsJob, $post_id);

    //Video
    $inputsVideo = [
        'rankology_fno_rich_snippets_videos_name' => [
            'key' => '_rankology_fno_rich_snippets_videos_name'
        ],
        'rankology_fno_rich_snippets_videos_name_cf' => [
            'key' => '_rankology_fno_rich_snippets_videos_name_cf'
        ],
        'rankology_fno_rich_snippets_videos_name_tax' => [
            'key' => '_rankology_fno_rich_snippets_videos_name_tax'
        ],
        'rankology_fno_rich_snippets_videos_name_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_videos_name_manual_global'
        ],
        'rankology_fno_rich_snippets_videos_description' => [
            'key' => '_rankology_fno_rich_snippets_videos_description'
        ],
        'rankology_fno_rich_snippets_videos_description_cf' => [
            'key' => '_rankology_fno_rich_snippets_videos_description_cf'
        ],
        'rankology_fno_rich_snippets_videos_description_tax' => [
            'key' => '_rankology_fno_rich_snippets_videos_description_tax'
        ],
        'rankology_fno_rich_snippets_videos_description_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_videos_description_manual_global'
        ],
        'rankology_fno_rich_snippets_videos_date_posted' => [
            'key' => '_rankology_fno_rich_snippets_videos_date_posted'
        ],
        'rankology_fno_rich_snippets_videos_date_posted_cf' => [
            'key' => '_rankology_fno_rich_snippets_videos_date_posted_cf'
        ],
        'rankology_fno_rich_snippets_videos_date_posted_tax' => [
            'key' => '_rankology_fno_rich_snippets_videos_date_posted_tax'
        ],
        'rankology_fno_rich_snippets_videos_date_posted_manual_date_global' => [
            'key' => '_rankology_fno_rich_snippets_videos_date_posted_manual_date_global'
        ],
        'rankology_fno_rich_snippets_videos_img' => [
            'key' => '_rankology_fno_rich_snippets_videos_img'
        ],
        'rankology_fno_rich_snippets_videos_img_manual_img_global' => [
            'key' => '_rankology_fno_rich_snippets_videos_img_manual_img_global'
        ],
        'rankology_fno_rich_snippets_videos_img_cf' => [
            'key' => '_rankology_fno_rich_snippets_videos_img_cf'
        ],
        'rankology_fno_rich_snippets_videos_img_tax' => [
            'key' => '_rankology_fno_rich_snippets_videos_img_tax'
        ],
        'rankology_fno_rich_snippets_videos_img_manual_img_library_global' => [
            'key' => '_rankology_fno_rich_snippets_videos_img_manual_img_library_global'
        ],
        'rankology_fno_rich_snippets_videos_img_manual_img_library_global_width' => [
            'key' => '_rankology_fno_rich_snippets_videos_img_manual_img_library_global_width'
        ],
        'rankology_fno_rich_snippets_videos_img_manual_img_library_global_height' => [
            'key' => '_rankology_fno_rich_snippets_videos_img_manual_img_library_global_height'
        ],
        'rankology_fno_rich_snippets_videos_duration' => [
            'key' => '_rankology_fno_rich_snippets_videos_duration'
        ],
        'rankology_fno_rich_snippets_videos_duration_cf' => [
            'key' => '_rankology_fno_rich_snippets_videos_duration_cf'
        ],
        'rankology_fno_rich_snippets_videos_duration_tax' => [
            'key' => '_rankology_fno_rich_snippets_videos_duration_tax'
        ],
        'rankology_fno_rich_snippets_videos_duration_manual_time_global' => [
            'key' => '_rankology_fno_rich_snippets_videos_duration_manual_time_global'
        ],
        'rankology_fno_rich_snippets_videos_url' => [
            'key' => '_rankology_fno_rich_snippets_videos_url'
        ],
        'rankology_fno_rich_snippets_videos_url_cf' => [
            'key' => '_rankology_fno_rich_snippets_videos_url_cf'
        ],
        'rankology_fno_rich_snippets_videos_url_tax' => [
            'key' => '_rankology_fno_rich_snippets_videos_url_tax'
        ],
        'rankology_fno_rich_snippets_videos_url_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_videos_url_manual_global'
        ],
    ];
    rankology_save_inputs_schema_automatic($inputsVideo, $post_id);


    //Event
    $inputsEvent = [
        'rankology_fno_rich_snippets_events_type' => [
            'key' => '_rankology_fno_rich_snippets_events_type'
        ],
        'rankology_fno_rich_snippets_events_type_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_type_cf'
        ],
        'rankology_fno_rich_snippets_events_type_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_type_tax'
        ],
        'rankology_fno_rich_snippets_events_type_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_events_type_manual_global'
        ],
        'rankology_fno_rich_snippets_events_name' => [
            'key' => '_rankology_fno_rich_snippets_events_name'
        ],
        'rankology_fno_rich_snippets_events_name_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_name_cf'
        ],
        'rankology_fno_rich_snippets_events_name_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_name_tax'
        ],
        'rankology_fno_rich_snippets_events_name_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_events_name_manual_global'
        ],
        'rankology_fno_rich_snippets_events_desc' => [
            'key' => '_rankology_fno_rich_snippets_events_desc'
        ],
        'rankology_fno_rich_snippets_events_desc_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_desc_cf'
        ],
        'rankology_fno_rich_snippets_events_desc_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_desc_tax'
        ],
        'rankology_fno_rich_snippets_events_desc_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_events_desc_manual_global'
        ],
        'rankology_fno_rich_snippets_events_img' => [
            'key' => '_rankology_fno_rich_snippets_events_img'
        ],
        'rankology_fno_rich_snippets_events_img_manual_img_global' => [
            'key' => '_rankology_fno_rich_snippets_events_img_manual_img_global'
        ],
        'rankology_fno_rich_snippets_events_img_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_img_cf'
        ],
        'rankology_fno_rich_snippets_events_img_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_img_tax'
        ],
        'rankology_fno_rich_snippets_events_img_manual_img_library_global' => [
            'key' => '_rankology_fno_rich_snippets_events_img_manual_img_library_global'
        ],
        'rankology_fno_rich_snippets_events_img_manual_img_library_global_width' => [
            'key' => '_rankology_fno_rich_snippets_events_img_manual_img_library_global_width'
        ],
        'rankology_fno_rich_snippets_events_img_manual_img_library_global_height' => [
            'key' => '_rankology_fno_rich_snippets_events_img_manual_img_library_global_height'
        ],
        'rankology_fno_rich_snippets_events_desc' => [
            'key' => '_rankology_fno_rich_snippets_events_desc'
        ],
        'rankology_fno_rich_snippets_events_desc_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_desc_cf'
        ],
        'rankology_fno_rich_snippets_events_desc_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_desc_tax'
        ],
        'rankology_fno_rich_snippets_events_desc_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_events_desc_manual_global'
        ],
        'rankology_fno_rich_snippets_events_start_date' => [
            'key' => '_rankology_fno_rich_snippets_events_start_date'
        ],
        'rankology_fno_rich_snippets_events_start_date_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_start_date_cf'
        ],
        'rankology_fno_rich_snippets_events_start_date_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_start_date_tax'
        ],
        'rankology_fno_rich_snippets_events_start_date_manual_date_global' => [
            'key' => '_rankology_fno_rich_snippets_events_start_date_manual_date_global'
        ],
        'rankology_fno_rich_snippets_events_start_date_timezone' => [
            'key' => '_rankology_fno_rich_snippets_events_start_date_timezone'
        ],
        'rankology_fno_rich_snippets_events_start_date_timezone_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_start_date_timezone_cf'
        ],
        'rankology_fno_rich_snippets_events_start_date_timezone_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_start_date_timezone_tax'
        ],
        'rankology_fno_rich_snippets_events_start_date_timezone_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_events_start_date_timezone_manual_global'
        ],
        'rankology_fno_rich_snippets_events_start_time' => [
            'key' => '_rankology_fno_rich_snippets_events_start_time'
        ],
        'rankology_fno_rich_snippets_events_start_time_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_start_time_cf'
        ],
        'rankology_fno_rich_snippets_events_start_time_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_start_time_tax'
        ],
        'rankology_fno_rich_snippets_events_start_time_manual_time_global' => [
            'key' => '_rankology_fno_rich_snippets_events_start_time_manual_time_global'
        ],
        'rankology_fno_rich_snippets_events_end_date' => [
            'key' => '_rankology_fno_rich_snippets_events_end_date'
        ],
        'rankology_fno_rich_snippets_events_end_date_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_end_date_cf'
        ],
        'rankology_fno_rich_snippets_events_end_date_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_end_date_tax'
        ],
        'rankology_fno_rich_snippets_events_end_date_manual_date_global' => [
            'key' => '_rankology_fno_rich_snippets_events_end_date_manual_date_global'
        ],
        'rankology_fno_rich_snippets_events_end_time' => [
            'key' => '_rankology_fno_rich_snippets_events_end_time'
        ],
        'rankology_fno_rich_snippets_events_end_time_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_end_time_cf'
        ],
        'rankology_fno_rich_snippets_events_end_time_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_end_time_tax'
        ],
        'rankology_fno_rich_snippets_events_end_time_manual_time_global' => [
            'key' => '_rankology_fno_rich_snippets_events_end_time_manual_time_global'
        ],
        'rankology_fno_rich_snippets_events_previous_start_date' => [
            'key' => '_rankology_fno_rich_snippets_events_previous_start_date'
        ],
        'rankology_fno_rich_snippets_events_previous_start_date_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_previous_start_date_cf'
        ],
        'rankology_fno_rich_snippets_events_previous_start_date_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_previous_start_date_tax'
        ],
        'rankology_fno_rich_snippets_events_previous_start_date_manual_date_global' => [
            'key' => '_rankology_fno_rich_snippets_events_previous_start_date_manual_date_global'
        ],
        'rankology_fno_rich_snippets_events_previous_start_time' => [
            'key' => '_rankology_fno_rich_snippets_events_previous_start_time'
        ],
        'rankology_fno_rich_snippets_events_previous_start_time_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_previous_start_time_cf'
        ],
        'rankology_fno_rich_snippets_events_previous_start_time_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_previous_start_time_tax'
        ],
        'rankology_fno_rich_snippets_events_previous_start_time_manual_time_global' => [
            'key' => '_rankology_fno_rich_snippets_events_previous_start_time_manual_time_global'
        ],
        'rankology_fno_rich_snippets_events_location_name' => [
            'key' => '_rankology_fno_rich_snippets_events_location_name'
        ],
        'rankology_fno_rich_snippets_events_location_name_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_location_name_cf'
        ],
        'rankology_fno_rich_snippets_events_location_name_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_location_name_tax'
        ],
        'rankology_fno_rich_snippets_events_location_name_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_events_location_name_manual_global'
        ],
        'rankology_fno_rich_snippets_events_location_url' => [
            'key' => '_rankology_fno_rich_snippets_events_location_url'
        ],
        'rankology_fno_rich_snippets_events_location_url_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_location_url_cf'
        ],
        'rankology_fno_rich_snippets_events_location_url_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_location_url_tax'
        ],
        'rankology_fno_rich_snippets_events_location_url_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_events_location_url_manual_global'
        ],
        'rankology_fno_rich_snippets_events_location_address' => [
            'key' => '_rankology_fno_rich_snippets_events_location_address'
        ],
        'rankology_fno_rich_snippets_events_location_address_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_location_address_cf'
        ],
        'rankology_fno_rich_snippets_events_location_address_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_location_address_tax'
        ],
        'rankology_fno_rich_snippets_events_location_address_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_events_location_address_manual_global'
        ],
        'rankology_fno_rich_snippets_events_offers_name' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_name'
        ],
        'rankology_fno_rich_snippets_events_offers_name_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_name_cf'
        ],
        'rankology_fno_rich_snippets_events_offers_name_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_name_tax'
        ],
        'rankology_fno_rich_snippets_events_offers_name_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_name_manual_global'
        ],
        'rankology_fno_rich_snippets_events_offers_cat' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_cat'
        ],
        'rankology_fno_rich_snippets_events_offers_cat_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_cat_cf'
        ],
        'rankology_fno_rich_snippets_events_offers_cat_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_cat_tax'
        ],
        'rankology_fno_rich_snippets_events_offers_cat_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_cat_manual_global'
        ],
        'rankology_fno_rich_snippets_events_offers_price' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_price'
        ],
        'rankology_fno_rich_snippets_events_offers_price_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_price_cf'
        ],
        'rankology_fno_rich_snippets_events_offers_price_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_price_tax'
        ],
        'rankology_fno_rich_snippets_events_offers_price_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_price_manual_global'
        ],
        'rankology_fno_rich_snippets_events_offers_price_currency' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_price_currency'
        ],
        'rankology_fno_rich_snippets_events_offers_price_currency_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_price_currency_cf'
        ],
        'rankology_fno_rich_snippets_events_offers_price_currency_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_price_currency_tax'
        ],
        'rankology_fno_rich_snippets_events_offers_price_currency_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_price_currency_manual_global'
        ],
        'rankology_fno_rich_snippets_events_offers_availability' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_availability'
        ],
        'rankology_fno_rich_snippets_events_offers_availability_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_availability_cf'
        ],
        'rankology_fno_rich_snippets_events_offers_availability_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_availability_tax'
        ],
        'rankology_fno_rich_snippets_events_offers_availability_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_availability_manual_global'
        ],
        'rankology_fno_rich_snippets_events_offers_valid_from_date' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_valid_from_date'
        ],
        'rankology_fno_rich_snippets_events_offers_valid_from_date_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_valid_from_date_cf'
        ],
        'rankology_fno_rich_snippets_events_offers_valid_from_date_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_valid_from_date_tax'
        ],
        'rankology_fno_rich_snippets_events_offers_valid_from_date_manual_date_global' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_valid_from_date_manual_date_global'
        ],
        'rankology_fno_rich_snippets_events_offers_valid_from_time' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_valid_from_time'
        ],
        'rankology_fno_rich_snippets_events_offers_valid_from_time_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_valid_from_time_cf'
        ],
        'rankology_fno_rich_snippets_events_offers_valid_from_time_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_valid_from_time_tax'
        ],
        'rankology_fno_rich_snippets_events_offers_valid_from_time_manual_time_global' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_valid_from_time_manual_time_global'
        ],
        'rankology_fno_rich_snippets_events_offers_url' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_url'
        ],
        'rankology_fno_rich_snippets_events_offers_url_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_url_cf'
        ],
        'rankology_fno_rich_snippets_events_offers_url_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_url_tax'
        ],
        'rankology_fno_rich_snippets_events_offers_url_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_events_offers_url_manual_global'
        ],
        'rankology_fno_rich_snippets_events_performer' => [
            'key' => '_rankology_fno_rich_snippets_events_performer'
        ],
        'rankology_fno_rich_snippets_events_performer_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_performer_cf'
        ],
        'rankology_fno_rich_snippets_events_performer_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_performer_tax'
        ],
        'rankology_fno_rich_snippets_events_performer_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_events_performer_manual_global'
        ],
        'rankology_fno_rich_snippets_events_organizer_name' => [
            'key' => '_rankology_fno_rich_snippets_events_organizer_name'
        ],
        'rankology_fno_rich_snippets_events_organizer_name_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_organizer_name_cf'
        ],
        'rankology_fno_rich_snippets_events_organizer_name_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_organizer_name_tax'
        ],
        'rankology_fno_rich_snippets_events_organizer_name_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_events_organizer_name_manual_global'
        ],
        'rankology_fno_rich_snippets_events_organizer_url' => [
            'key' => '_rankology_fno_rich_snippets_events_organizer_url'
        ],
        'rankology_fno_rich_snippets_events_organizer_url_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_organizer_url_cf'
        ],
        'rankology_fno_rich_snippets_events_organizer_url_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_organizer_url_tax'
        ],
        'rankology_fno_rich_snippets_events_organizer_url_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_events_organizer_url_manual_global'
        ],
        'rankology_fno_rich_snippets_events_status' => [
            'key' => '_rankology_fno_rich_snippets_events_status'
        ],
        'rankology_fno_rich_snippets_events_status_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_status_cf'
        ],
        'rankology_fno_rich_snippets_events_status_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_status_tax'
        ],
        'rankology_fno_rich_snippets_events_status_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_events_status_manual_global'
        ],
        'rankology_fno_rich_snippets_events_attendance_mode' => [
            'key' => '_rankology_fno_rich_snippets_events_attendance_mode'
        ],
        'rankology_fno_rich_snippets_events_attendance_mode_cf' => [
            'key' => '_rankology_fno_rich_snippets_events_attendance_mode_cf'
        ],
        'rankology_fno_rich_snippets_events_attendance_mode_tax' => [
            'key' => '_rankology_fno_rich_snippets_events_attendance_mode_tax'
        ],
        'rankology_fno_rich_snippets_events_attendance_mode_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_events_attendance_mode_manual_global'
        ],
    ];
    rankology_save_inputs_schema_automatic($inputsEvent, $post_id);

    //Product
    $inputsProduct = [
        'rankology_fno_rich_snippets_product_name' => [
            'key' => '_rankology_fno_rich_snippets_product_name'
        ],
        'rankology_fno_rich_snippets_product_name_cf' => [
            'key' => '_rankology_fno_rich_snippets_product_name_cf'
        ],
        'rankology_fno_rich_snippets_product_name_tax' => [
            'key' => '_rankology_fno_rich_snippets_product_name_tax'
        ],
        'rankology_fno_rich_snippets_product_name_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_product_name_manual_global'
        ],
        'rankology_fno_rich_snippets_product_description' => [
            'key' => '_rankology_fno_rich_snippets_product_description'
        ],
        'rankology_fno_rich_snippets_product_description_cf' => [
            'key' => '_rankology_fno_rich_snippets_product_description_cf'
        ],
        'rankology_fno_rich_snippets_product_description_tax' => [
            'key' => '_rankology_fno_rich_snippets_product_description_tax'
        ],
        'rankology_fno_rich_snippets_product_description_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_product_description_manual_global'
        ],
        'rankology_fno_rich_snippets_product_img' => [
            'key' => '_rankology_fno_rich_snippets_product_img'
        ],
        'rankology_fno_rich_snippets_product_img_manual_img_global' => [
            'key' => '_rankology_fno_rich_snippets_product_img_manual_img_global'
        ],
        'rankology_fno_rich_snippets_product_img_cf' => [
            'key' => '_rankology_fno_rich_snippets_product_img_cf'
        ],
        'rankology_fno_rich_snippets_product_img_tax' => [
            'key' => '_rankology_fno_rich_snippets_product_img_tax'
        ],
        'rankology_fno_rich_snippets_product_img_manual_img_library_global' => [
            'key' => '_rankology_fno_rich_snippets_product_img_manual_img_library_global'
        ],
        'rankology_fno_rich_snippets_product_img_manual_img_library_global_width' => [
            'key' => '_rankology_fno_rich_snippets_product_img_manual_img_library_global_width'
        ],
        'rankology_fno_rich_snippets_product_img_manual_img_library_global_height' => [
            'key' => '_rankology_fno_rich_snippets_product_img_manual_img_library_global_height'
        ],
        'rankology_fno_rich_snippets_product_price' => [
            'key' => '_rankology_fno_rich_snippets_product_price'
        ],
        'rankology_fno_rich_snippets_product_price_cf' => [
            'key' => '_rankology_fno_rich_snippets_product_price_cf'
        ],
        'rankology_fno_rich_snippets_product_price_tax' => [
            'key' => '_rankology_fno_rich_snippets_product_price_tax'
        ],
        'rankology_fno_rich_snippets_product_price_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_product_price_manual_global'
        ],
        'rankology_fno_rich_snippets_product_price_valid_date' => [
            'key' => '_rankology_fno_rich_snippets_product_price_valid_date'
        ],
        'rankology_fno_rich_snippets_product_price_valid_date_cf' => [
            'key' => '_rankology_fno_rich_snippets_product_price_valid_date_cf'
        ],
        'rankology_fno_rich_snippets_product_price_valid_date_tax' => [
            'key' => '_rankology_fno_rich_snippets_product_price_valid_date_tax'
        ],
        'rankology_fno_rich_snippets_product_price_valid_date_manual_date_global' => [
            'key' => '_rankology_fno_rich_snippets_product_price_valid_date_manual_date_global'
        ],
        'rankology_fno_rich_snippets_product_sku' => [
            'key' => '_rankology_fno_rich_snippets_product_sku'
        ],
        'rankology_fno_rich_snippets_product_sku_cf' => [
            'key' => '_rankology_fno_rich_snippets_product_sku_cf'
        ],
        'rankology_fno_rich_snippets_product_sku_tax' => [
            'key' => '_rankology_fno_rich_snippets_product_sku_tax'
        ],
        'rankology_fno_rich_snippets_product_sku_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_product_sku_manual_global'
        ],
        'rankology_fno_rich_snippets_product_global_ids' => [
            'key' => '_rankology_fno_rich_snippets_product_global_ids'
        ],
        'rankology_fno_rich_snippets_product_global_ids_cf' => [
            'key' => '_rankology_fno_rich_snippets_product_global_ids_cf'
        ],
        'rankology_fno_rich_snippets_product_global_ids_tax' => [
            'key' => '_rankology_fno_rich_snippets_product_global_ids_tax'
        ],
        'rankology_fno_rich_snippets_product_global_ids_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_product_global_ids_manual_global'
        ],
        'rankology_fno_rich_snippets_product_global_ids_value' => [
            'key' => '_rankology_fno_rich_snippets_product_global_ids_value'
        ],
        'rankology_fno_rich_snippets_product_global_ids_value_cf' => [
            'key' => '_rankology_fno_rich_snippets_product_global_ids_value_cf'
        ],
        'rankology_fno_rich_snippets_product_global_ids_value_tax' => [
            'key' => '_rankology_fno_rich_snippets_product_global_ids_value_tax'
        ],
        'rankology_fno_rich_snippets_product_global_ids_value_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_product_global_ids_value_manual_global'
        ],
        'rankology_fno_rich_snippets_product_brand' => [
            'key' => '_rankology_fno_rich_snippets_product_brand'
        ],
        'rankology_fno_rich_snippets_product_brand_cf' => [
            'key' => '_rankology_fno_rich_snippets_product_brand_cf'
        ],
        'rankology_fno_rich_snippets_product_brand_tax' => [
            'key' => '_rankology_fno_rich_snippets_product_brand_tax'
        ],
        'rankology_fno_rich_snippets_product_brand_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_product_brand_manual_global'
        ],
        'rankology_fno_rich_snippets_product_price_currency' => [
            'key' => '_rankology_fno_rich_snippets_product_price_currency'
        ],
        'rankology_fno_rich_snippets_product_price_currency_cf' => [
            'key' => '_rankology_fno_rich_snippets_product_price_currency_cf'
        ],
        'rankology_fno_rich_snippets_product_price_currency_tax' => [
            'key' => '_rankology_fno_rich_snippets_product_price_currency_tax'
        ],
        'rankology_fno_rich_snippets_product_price_currency_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_product_price_currency_manual_global'
        ],
        'rankology_fno_rich_snippets_product_condition' => [
            'key' => '_rankology_fno_rich_snippets_product_condition'
        ],
        'rankology_fno_rich_snippets_product_condition_cf' => [
            'key' => '_rankology_fno_rich_snippets_product_condition_cf'
        ],
        'rankology_fno_rich_snippets_product_condition_tax' => [
            'key' => '_rankology_fno_rich_snippets_product_condition_tax'
        ],
        'rankology_fno_rich_snippets_product_condition_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_product_condition_manual_global'
        ],
        'rankology_fno_rich_snippets_product_availability' => [
            'key' => '_rankology_fno_rich_snippets_product_availability'
        ],
        'rankology_fno_rich_snippets_product_availability_cf' => [
            'key' => '_rankology_fno_rich_snippets_product_availability_cf'
        ],
        'rankology_fno_rich_snippets_product_availability_tax' => [
            'key' => '_rankology_fno_rich_snippets_product_availability_tax'
        ],
        'rankology_fno_rich_snippets_product_availability_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_product_availability_manual_global'
        ],
        'rankology_fno_rich_snippets_product_positive_notes' => [
            'key' => '_rankology_fno_rich_snippets_product_positive_notes'
        ],
        'rankology_fno_rich_snippets_product_positive_notes_cf' => [
            'key' => '_rankology_fno_rich_snippets_product_positive_notes_cf'
        ],
        'rankology_fno_rich_snippets_product_positive_notes_tax' => [
            'key' => '_rankology_fno_rich_snippets_product_positive_notes_tax'
        ],
        'rankology_fno_rich_snippets_product_positive_notes_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_product_positive_notes_manual_global'
        ],
        'rankology_fno_rich_snippets_product_negative_notes' => [
            'key' => '_rankology_fno_rich_snippets_product_negative_notes'
        ],
        'rankology_fno_rich_snippets_product_negative_notes_cf' => [
            'key' => '_rankology_fno_rich_snippets_product_negative_notes_cf'
        ],
        'rankology_fno_rich_snippets_product_negative_notes_tax' => [
            'key' => '_rankology_fno_rich_snippets_product_negative_notes_tax'
        ],
        'rankology_fno_rich_snippets_product_negative_notes_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_product_negative_notes_manual_global'
        ],
        'rankology_fno_rich_snippets_product_energy_consumption' => [
            'key' => '_rankology_fno_rich_snippets_product_energy_consumption'
        ],
        'rankology_fno_rich_snippets_product_energy_consumption_cf' => [
            'key' => '_rankology_fno_rich_snippets_product_energy_consumption_cf'
        ],
        'rankology_fno_rich_snippets_product_energy_consumption_tax' => [
            'key' => '_rankology_fno_rich_snippets_product_energy_consumption_tax'
        ],
        'rankology_fno_rich_snippets_product_energy_consumption_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_product_energy_consumption_manual_global'
        ],
    ];
    rankology_save_inputs_schema_automatic($inputsProduct, $post_id);

    //Software App
    $inputsSoftware = [
        'rankology_fno_rich_snippets_softwareapp_name' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_name'
        ],
        'rankology_fno_rich_snippets_softwareapp_name_cf' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_name_cf'
        ],
        'rankology_fno_rich_snippets_softwareapp_name_tax' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_name_tax'
        ],
        'rankology_fno_rich_snippets_softwareapp_name_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_name_manual_global'
        ],
        'rankology_fno_rich_snippets_softwareapp_os' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_os'
        ],
        'rankology_fno_rich_snippets_softwareapp_os_cf' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_os_cf'
        ],
        'rankology_fno_rich_snippets_softwareapp_os_tax' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_os_tax'
        ],
        'rankology_fno_rich_snippets_softwareapp_os_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_os_manual_global'
        ],
        'rankology_fno_rich_snippets_softwareapp_cat' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_cat'
        ],
        'rankology_fno_rich_snippets_softwareapp_cat_cf' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_cat_cf'
        ],
        'rankology_fno_rich_snippets_softwareapp_cat_tax' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_cat_tax'
        ],
        'rankology_fno_rich_snippets_softwareapp_cat_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_cat_manual_global'
        ],
        'rankology_fno_rich_snippets_softwareapp_price' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_price'
        ],
        'rankology_fno_rich_snippets_softwareapp_price_cf' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_price_cf'
        ],
        'rankology_fno_rich_snippets_softwareapp_price_tax' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_price_tax'
        ],
        'rankology_fno_rich_snippets_softwareapp_price_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_price_manual_global'
        ],
        'rankology_fno_rich_snippets_softwareapp_currency' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_currency'
        ],
        'rankology_fno_rich_snippets_softwareapp_currency_cf' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_currency_cf'
        ],
        'rankology_fno_rich_snippets_softwareapp_currency_tax' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_currency_tax'
        ],
        'rankology_fno_rich_snippets_softwareapp_currency_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_currency_manual_global'
        ],
        'rankology_fno_rich_snippets_softwareapp_rating' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_rating'
        ],
        'rankology_fno_rich_snippets_softwareapp_rating_cf' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_rating_cf'
        ],
        'rankology_fno_rich_snippets_softwareapp_rating_tax' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_rating_tax'
        ],
        'rankology_fno_rich_snippets_softwareapp_rating_manual_rating_global' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_rating_manual_rating_global'
        ],
        'rankology_fno_rich_snippets_softwareapp_max_rating' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_max_rating'
        ],
        'rankology_fno_rich_snippets_softwareapp_max_rating_cf' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_max_rating_cf'
        ],
        'rankology_fno_rich_snippets_softwareapp_max_rating_tax' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_max_rating_tax'
        ],
        'rankology_fno_rich_snippets_softwareapp_max_rating_manual_rating_global' => [
            'key' => '_rankology_fno_rich_snippets_softwareapp_max_rating_manual_rating_global'
        ],
    ];

    rankology_save_inputs_schema_automatic($inputsSoftware, $post_id);

    //Service
    $inputsService = [
        'rankology_fno_rich_snippets_service_name' => [
            'key' => '_rankology_fno_rich_snippets_service_name'
        ],
        'rankology_fno_rich_snippets_service_name_cf' => [
            'key' => '_rankology_fno_rich_snippets_service_name_cf'
        ],
        'rankology_fno_rich_snippets_service_name_tax' => [
            'key' => '_rankology_fno_rich_snippets_service_name_tax'
        ],
        'rankology_fno_rich_snippets_service_name_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_service_name_manual_global'
        ],
        'rankology_fno_rich_snippets_service_type' => [
            'key' => '_rankology_fno_rich_snippets_service_type'
        ],
        'rankology_fno_rich_snippets_service_type_cf' => [
            'key' => '_rankology_fno_rich_snippets_service_type_cf'
        ],
        'rankology_fno_rich_snippets_service_type_tax' => [
            'key' => '_rankology_fno_rich_snippets_service_type_tax'
        ],
        'rankology_fno_rich_snippets_service_type_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_service_type_manual_global'
        ],
        'rankology_fno_rich_snippets_service_description' => [
            'key' => '_rankology_fno_rich_snippets_service_description'
        ],
        'rankology_fno_rich_snippets_service_description_cf' => [
            'key' => '_rankology_fno_rich_snippets_service_description_cf'
        ],
        'rankology_fno_rich_snippets_service_description_tax' => [
            'key' => '_rankology_fno_rich_snippets_service_description_tax'
        ],
        'rankology_fno_rich_snippets_service_description_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_service_description_manual_global'
        ],
        'rankology_fno_rich_snippets_service_img' => [
            'key' => '_rankology_fno_rich_snippets_service_img'
        ],
        'rankology_fno_rich_snippets_service_img_manual_img_global' => [
            'key' => '_rankology_fno_rich_snippets_service_img_manual_img_global'
        ],
        'rankology_fno_rich_snippets_service_img_cf' => [
            'key' => '_rankology_fno_rich_snippets_service_img_cf'
        ],
        'rankology_fno_rich_snippets_service_img_tax' => [
            'key' => '_rankology_fno_rich_snippets_service_img_tax'
        ],
        'rankology_fno_rich_snippets_service_img_manual_img_library_global' => [
            'key' => '_rankology_fno_rich_snippets_service_img_manual_img_library_global'
        ],
        'rankology_fno_rich_snippets_service_img_manual_img_library_global_width' => [
            'key' => '_rankology_fno_rich_snippets_service_img_manual_img_library_global_width'
        ],
        'rankology_fno_rich_snippets_service_img_manual_img_library_global_height' => [
            'key' => '_rankology_fno_rich_snippets_service_img_manual_img_library_global_height'
        ],
        'rankology_fno_rich_snippets_service_area' => [
            'key' => '_rankology_fno_rich_snippets_service_area'
        ],
        'rankology_fno_rich_snippets_service_area_cf' => [
            'key' => '_rankology_fno_rich_snippets_service_area_cf'
        ],
        'rankology_fno_rich_snippets_service_area_tax' => [
            'key' => '_rankology_fno_rich_snippets_service_area_tax'
        ],
        'rankology_fno_rich_snippets_service_area_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_service_area_manual_global'
        ],
        'rankology_fno_rich_snippets_service_provider_name' => [
            'key' => '_rankology_fno_rich_snippets_service_provider_name'
        ],
        'rankology_fno_rich_snippets_service_provider_name_cf' => [
            'key' => '_rankology_fno_rich_snippets_service_provider_name_cf'
        ],
        'rankology_fno_rich_snippets_service_provider_name_tax' => [
            'key' => '_rankology_fno_rich_snippets_service_provider_name_tax'
        ],
        'rankology_fno_rich_snippets_service_provider_name_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_service_provider_name_manual_global'
        ],
        'rankology_fno_rich_snippets_service_lb_img' => [
            'key' => '_rankology_fno_rich_snippets_service_lb_img'
        ],
        'rankology_fno_rich_snippets_service_lb_img_manual_img_global' => [
            'key' => '_rankology_fno_rich_snippets_service_lb_img_manual_img_global'
        ],
        'rankology_fno_rich_snippets_service_lb_img_cf' => [
            'key' => '_rankology_fno_rich_snippets_service_lb_img_cf'
        ],
        'rankology_fno_rich_snippets_service_lb_img_tax' => [
            'key' => '_rankology_fno_rich_snippets_service_lb_img_tax'
        ],
        'rankology_fno_rich_snippets_service_lb_img_manual_img_library_global' => [
            'key' => '_rankology_fno_rich_snippets_service_lb_img_manual_img_library_global'
        ],
        'rankology_fno_rich_snippets_service_lb_img_manual_img_library_global_width' => [
            'key' => '_rankology_fno_rich_snippets_service_lb_img_manual_img_library_global_width'
        ],
        'rankology_fno_rich_snippets_service_lb_img_manual_img_library_global_height' => [
            'key' => '_rankology_fno_rich_snippets_service_lb_img_manual_img_library_global_height'
        ],
        'rankology_fno_rich_snippets_service_provider_mobility' => [
            'key' => '_rankology_fno_rich_snippets_service_provider_mobility'
        ],
        'rankology_fno_rich_snippets_service_provider_mobility_cf' => [
            'key' => '_rankology_fno_rich_snippets_service_provider_mobility_cf'
        ],
        'rankology_fno_rich_snippets_service_provider_mobility_tax' => [
            'key' => '_rankology_fno_rich_snippets_service_provider_mobility_tax'
        ],
        'rankology_fno_rich_snippets_service_provider_mobility_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_service_provider_mobility_manual_global'
        ],
        'rankology_fno_rich_snippets_service_slogan' => [
            'key' => '_rankology_fno_rich_snippets_service_slogan'
        ],
        'rankology_fno_rich_snippets_service_slogan_cf' => [
            'key' => '_rankology_fno_rich_snippets_service_slogan_cf'
        ],
        'rankology_fno_rich_snippets_service_slogan_tax' => [
            'key' => '_rankology_fno_rich_snippets_service_slogan_tax'
        ],
        'rankology_fno_rich_snippets_service_slogan_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_service_slogan_manual_global'
        ],
        'rankology_fno_rich_snippets_service_street_addr' => [
            'key' => '_rankology_fno_rich_snippets_service_street_addr'
        ],
        'rankology_fno_rich_snippets_service_street_addr_cf' => [
            'key' => '_rankology_fno_rich_snippets_service_street_addr_cf'
        ],
        'rankology_fno_rich_snippets_service_street_addr_tax' => [
            'key' => '_rankology_fno_rich_snippets_service_street_addr_tax'
        ],
        'rankology_fno_rich_snippets_service_street_addr_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_service_street_addr_manual_global'
        ],
        'rankology_fno_rich_snippets_service_city' => [
            'key' => '_rankology_fno_rich_snippets_service_city'
        ],
        'rankology_fno_rich_snippets_service_city_cf' => [
            'key' => '_rankology_fno_rich_snippets_service_city_cf'
        ],
        'rankology_fno_rich_snippets_service_city_tax' => [
            'key' => '_rankology_fno_rich_snippets_service_city_tax'
        ],
        'rankology_fno_rich_snippets_service_city_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_service_city_manual_global'
        ],
        'rankology_fno_rich_snippets_service_state' => [
            'key' => '_rankology_fno_rich_snippets_service_state'
        ],
        'rankology_fno_rich_snippets_service_state_cf' => [
            'key' => '_rankology_fno_rich_snippets_service_state_cf'
        ],
        'rankology_fno_rich_snippets_service_state_tax' => [
            'key' => '_rankology_fno_rich_snippets_service_state_tax'
        ],
        'rankology_fno_rich_snippets_service_state_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_service_state_manual_global'
        ],
        'rankology_fno_rich_snippets_service_pc' => [
            'key' => '_rankology_fno_rich_snippets_service_pc'
        ],
        'rankology_fno_rich_snippets_service_pc_cf' => [
            'key' => '_rankology_fno_rich_snippets_service_pc_cf'
        ],
        'rankology_fno_rich_snippets_service_pc_tax' => [
            'key' => '_rankology_fno_rich_snippets_service_pc_tax'
        ],
        'rankology_fno_rich_snippets_service_pc_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_service_pc_manual_global'
        ],
        'rankology_fno_rich_snippets_service_country' => [
            'key' => '_rankology_fno_rich_snippets_service_country'
        ],
        'rankology_fno_rich_snippets_service_country_cf' => [
            'key' => '_rankology_fno_rich_snippets_service_country_cf'
        ],
        'rankology_fno_rich_snippets_service_country_tax' => [
            'key' => '_rankology_fno_rich_snippets_service_country_tax'
        ],
        'rankology_fno_rich_snippets_service_country_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_service_country_manual_global'
        ],
        'rankology_fno_rich_snippets_service_lat' => [
            'key' => '_rankology_fno_rich_snippets_service_lat'
        ],
        'rankology_fno_rich_snippets_service_lat_cf' => [
            'key' => '_rankology_fno_rich_snippets_service_lat_cf'
        ],
        'rankology_fno_rich_snippets_service_lat_tax' => [
            'key' => '_rankology_fno_rich_snippets_service_lat_tax'
        ],
        'rankology_fno_rich_snippets_service_lat_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_service_lat_manual_global'
        ],
        'rankology_fno_rich_snippets_service_lon' => [
            'key' => '_rankology_fno_rich_snippets_service_lon'
        ],
        'rankology_fno_rich_snippets_service_lon_cf' => [
            'key' => '_rankology_fno_rich_snippets_service_lon_cf'
        ],
        'rankology_fno_rich_snippets_service_lon_tax' => [
            'key' => '_rankology_fno_rich_snippets_service_lon_tax'
        ],
        'rankology_fno_rich_snippets_service_lon_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_service_lon_manual_global'
        ],
        'rankology_fno_rich_snippets_service_tel' => [
            'key' => '_rankology_fno_rich_snippets_service_tel'
        ],
        'rankology_fno_rich_snippets_service_tel_cf' => [
            'key' => '_rankology_fno_rich_snippets_service_tel_cf'
        ],
        'rankology_fno_rich_snippets_service_tel_tax' => [
            'key' => '_rankology_fno_rich_snippets_service_tel_tax'
        ],
        'rankology_fno_rich_snippets_service_tel_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_service_tel_manual_global'
        ],
        'rankology_fno_rich_snippets_service_price' => [
            'key' => '_rankology_fno_rich_snippets_service_price'
        ],
        'rankology_fno_rich_snippets_service_price_cf' => [
            'key' => '_rankology_fno_rich_snippets_service_price_cf'
        ],
        'rankology_fno_rich_snippets_service_price_tax' => [
            'key' => '_rankology_fno_rich_snippets_service_price_tax'
        ],
        'rankology_fno_rich_snippets_service_price_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_service_price_manual_global'
        ],
    ];
    rankology_save_inputs_schema_automatic($inputsService, $post_id);

    //Review
    $inputsReview = [
        'rankology_fno_rich_snippets_review_item' => [
            'key' => '_rankology_fno_rich_snippets_review_item'
        ],
        'rankology_fno_rich_snippets_review_item_cf' => [
            'key' => '_rankology_fno_rich_snippets_review_item_cf'
        ],
        'rankology_fno_rich_snippets_review_item_tax' => [
            'key' => '_rankology_fno_rich_snippets_review_item_tax'
        ],
        'rankology_fno_rich_snippets_review_item_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_review_item_manual_global'
        ],
        'rankology_fno_rich_snippets_review_item_type' => [
            'key' => '_rankology_fno_rich_snippets_review_item_type'
        ],
        'rankology_fno_rich_snippets_review_item_type_cf' => [
            'key' => '_rankology_fno_rich_snippets_review_item_type_cf'
        ],
        'rankology_fno_rich_snippets_review_item_type_tax' => [
            'key' => '_rankology_fno_rich_snippets_review_item_type_tax'
        ],
        'rankology_fno_rich_snippets_review_item_type_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_review_item_type_manual_global'
        ],
        'rankology_fno_rich_snippets_review_img' => [
            'key' => '_rankology_fno_rich_snippets_review_img'
        ],
        'rankology_fno_rich_snippets_review_img_manual_img_global' => [
            'key' => '_rankology_fno_rich_snippets_review_img_manual_img_global'
        ],
        'rankology_fno_rich_snippets_review_img_cf' => [
            'key' => '_rankology_fno_rich_snippets_review_img_cf'
        ],
        'rankology_fno_rich_snippets_review_img_tax' => [
            'key' => '_rankology_fno_rich_snippets_review_img_tax'
        ],
        'rankology_fno_rich_snippets_review_img_manual_img_library_global' => [
            'key' => '_rankology_fno_rich_snippets_review_img_manual_img_library_global'
        ],
        'rankology_fno_rich_snippets_review_img_manual_img_library_global_width' => [
            'key' => '_rankology_fno_rich_snippets_review_img_manual_img_library_global_width'
        ],
        'rankology_fno_rich_snippets_review_img_manual_img_library_global_height' => [
            'key' => '_rankology_fno_rich_snippets_review_img_manual_img_library_global_height'
        ],
        'rankology_fno_rich_snippets_review_rating' => [
            'key' => '_rankology_fno_rich_snippets_review_rating'
        ],
        'rankology_fno_rich_snippets_review_rating_cf' => [
            'key' => '_rankology_fno_rich_snippets_review_rating_cf'
        ],
        'rankology_fno_rich_snippets_review_rating_tax' => [
            'key' => '_rankology_fno_rich_snippets_review_rating_tax'
        ],
        'rankology_fno_rich_snippets_review_rating_manual_rating_global' => [
            'key' => '_rankology_fno_rich_snippets_review_rating_manual_rating_global'
        ],
        'rankology_fno_rich_snippets_review_max_rating' => [
            'key' => '_rankology_fno_rich_snippets_review_max_rating'
        ],
        'rankology_fno_rich_snippets_review_max_rating_cf' => [
            'key' => '_rankology_fno_rich_snippets_review_max_rating_cf'
        ],
        'rankology_fno_rich_snippets_review_max_rating_tax' => [
            'key' => '_rankology_fno_rich_snippets_review_max_rating_tax'
        ],
        'rankology_fno_rich_snippets_review_max_rating_manual_rating_global' => [
            'key' => '_rankology_fno_rich_snippets_review_max_rating_manual_rating_global'
        ],
        'rankology_fno_rich_snippets_review_body' => [
            'key' => '_rankology_fno_rich_snippets_review_body'
        ],
        'rankology_fno_rich_snippets_review_body_cf' => [
            'key' => '_rankology_fno_rich_snippets_review_body_cf'
        ],
        'rankology_fno_rich_snippets_review_body_tax' => [
            'key' => '_rankology_fno_rich_snippets_review_body_tax'
        ],
        'rankology_fno_rich_snippets_review_body_manual_global' => [
            'key' => '_rankology_fno_rich_snippets_review_body_manual_global'
        ],
    ];
    rankology_save_inputs_schema_automatic($inputsReview, $post_id);

    //Custom
    if (isset($_POST['rankology_fno_rich_snippets_custom'])) {
        update_post_meta($post_id, '_rankology_fno_rich_snippets_custom', esc_html($_POST['rankology_fno_rich_snippets_custom']));
    }
    if (isset($_POST['rankology_fno_rich_snippets_custom_manual_custom_global'])) {
        update_post_meta(
            $post_id,
            '_rankology_fno_rich_snippets_custom_manual_custom_global',
            $_POST['rankology_fno_rich_snippets_custom_manual_custom_global']
        );
    }
}
