<?php
defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

///////////////////////////////////////////////////////////////////////////////////////////////////
//Register Rankology Redirections Custom Post Type
///////////////////////////////////////////////////////////////////////////////////////////////////
function rankology_404_fn() {
    $labels = [
        'name' => _x('Redirections', 'Post Type General Name', 'wp-rankology'),
        'singular_name' => _x('Redirections', 'Post Type Singular Name', 'wp-rankology'),
        'menu_name' => __('Redirections', 'wp-rankology'),
        'name_admin_bar' => __('Redirections', 'wp-rankology'),
        'archives' => __('Item Archives', 'wp-rankology'),
        'parent_item_colon' => __('Parent Item:', 'wp-rankology'),
        'all_items' => __('All redirections', 'wp-rankology'),
        'add_new_item' => __('Add New redirection', 'wp-rankology'),
        'add_new' => __('Add redirection', 'wp-rankology'),
        'new_item' => __('New redirection', 'wp-rankology'),
        'edit_item' => __('Edit redirection', 'wp-rankology'),
        'update_item' => __('Update redirection', 'wp-rankology'),
        'view_item' => __('View redirection', 'wp-rankology'),
        'search_items' => __('Search redirection', 'wp-rankology'),
        'not_found' => __('Not found', 'wp-rankology'),
        'not_found_in_trash' => __('Not found in Trash', 'wp-rankology'),
        'featured_image' => __('Featured Image', 'wp-rankology'),
        'set_featured_image' => __('Set featured image', 'wp-rankology'),
        'remove_featured_image' => __('Remove featured image', 'wp-rankology'),
        'use_featured_image' => __('Use as featured image', 'wp-rankology'),
        'insert_into_item' => __('Insert into item', 'wp-rankology'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'wp-rankology'),
        'items_list' => __('Redirections list', 'wp-rankology'),
        'items_list_navigation' => __('Redirections list navigation', 'wp-rankology'),
        'filter_items_list' => __('Filter redirections list', 'wp-rankology'),
    ];
    $args = [
        'label' => __('Redirections', 'wp-rankology'),
        'description' => __('Redirections and Monitoring 404', 'wp-rankology'),
        'labels' => $labels,
        'supports' => ['title'],
        'hierarchical' => false,
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => false,
        'menu_icon' => 'dashicons-admin-links',
        'show_in_admin_bar' => false,
        'show_in_nav_menus' => false,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'capability_type' => 'redirection',
        'capabilities' => [
            'edit_post' => 'edit_redirection',
            'edit_posts' => 'edit_redirections',
            'edit_others_posts' => 'edit_others_redirections',
            'publish_posts' => 'publish_redirections',
            'read_post' => 'read_redirection',
            'read_private_posts' => 'read_private_redirections',
            'delete_post' => 'delete_redirection',
            'delete_others_posts' => 'delete_others_redirections',
            'delete_published_posts' => 'delete_published_redirections',
        ],
    ];

    register_post_type('rankology_404', $args);
}

//FIX: Number of items per page
if (current_user_can('manage_options')) {
    add_action('init', 'rankology_404_fn', 10);
} else {
    add_action('admin_init', 'rankology_404_fn', 10);
}

///////////////////////////////////////////////////////////////////////////////////////////////////
//Map Rankology 404 caps
///////////////////////////////////////////////////////////////////////////////////////////////////
add_filter('map_meta_cap', 'rankology_404_map_meta_cap', 10, 4);
function rankology_404_map_meta_cap($caps, $cap, $user_id, $args) {
    /* If editing, deleting, or reading a redirection, get the post and post type object. */
    if ('edit_redirection' === $cap || 'delete_redirection' === $cap || 'read_redirection' === $cap) {
        $post = get_post($args[0]);
        $post_type = get_post_type_object($post->post_type);

        /* Set an empty array for the caps. */
        $caps = [];
    }

    /* If editing a redirection, assign the required capability. */
    if ('edit_redirection' === $cap) {
        if ($user_id == $post->post_author) {
            $caps[] = $post_type->cap->edit_posts;
        } else {
            $caps[] = $post_type->cap->edit_others_posts;
        }
    }

    /* If deleting a redirection, assign the required capability. */
    elseif ('delete_redirection' === $cap) {
        if ($user_id == $post->post_author) {
            $caps[] = $post_type->cap->delete_published_posts;
        } else {
            $caps[] = $post_type->cap->delete_others_posts;
        }
    }

    /* If reading a private redirection, assign the required capability. */
    elseif ('read_redirection' === $cap) {
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
//Register Rankology Custom Taxonomy Categories for Redirections
///////////////////////////////////////////////////////////////////////////////////////////////////
function rankology_404_cat_fn() {
    $labels = [
        'name' => _x('Categories', 'Taxonomy General Name', 'wp-rankology'),
        'singular_name' => _x('Category', 'Taxonomy Singular Name', 'wp-rankology'),
        'menu_name' => __('Categories', 'wp-rankology'),
        'all_items' => __('All Categories', 'wp-rankology'),
        'parent_item' => __('Parent Category', 'wp-rankology'),
        'parent_item_colon' => __('Parent Category:', 'wp-rankology'),
        'new_item_name' => __('New Category Name', 'wp-rankology'),
        'add_new_item' => __('Add New Category', 'wp-rankology'),
        'edit_item' => __('Edit Category', 'wp-rankology'),
        'update_item' => __('Update Category', 'wp-rankology'),
        'view_item' => __('View Category', 'wp-rankology'),
        'separate_items_with_commas' => __('Separate categories with commas', 'wp-rankology'),
        'add_or_remove_items' => __('Add or remove categories', 'wp-rankology'),
        'choose_from_most_used' => __('Choose from the most used', 'wp-rankology'),
        'popular_items' => __('Popular Categories', 'wp-rankology'),
        'search_items' => __('Search Categories', 'wp-rankology'),
        'not_found' => __('Not Found', 'wp-rankology'),
        'no_terms' => __('No items', 'wp-rankology'),
        'items_list' => __('Categories list', 'wp-rankology'),
        'items_list_navigation' => __('Categories list navigation', 'wp-rankology'),
    ];
    $args = [
        'labels' => $labels,
        'hierarchical' => true,
        'public' => false,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => false,
        'show_tagcloud' => false,
        'rewrite' => false,
        'show_in_rest' => false,
    ];
    register_taxonomy('rankology_404_cat', ['rankology_404'], $args);
}
add_action('init', 'rankology_404_cat_fn', 10);

///////////////////////////////////////////////////////////////////////////////////////////////////
//Add custom buttons to Rankology Redirections Custom Post Type
///////////////////////////////////////////////////////////////////////////////////////////////////
function rankology_404_btn_cpt() {
    $screen = get_current_screen();
    if ('rankology_404' === $screen->post_type) {
        ?>
<script>
jQuery(function() {
jQuery("body.post-type-rankology_404 .wrap h1 ~ a").after(
    //'<a href="<?php //echo admin_url('admin.php?page=rankology-import-export#tab=tab_rankology_tool_redirects'); ?>//" id="rankology-import-redirects" class="page-title-action"><?php //esc_html_e('Import / Export redirects', 'wp-rankology'); ?>//</a>'
);

jQuery("body.post-type-rankology_404 .wrap h1 ~ #rankology-import-redirects").after(
    //'<a href="<?php //echo admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_404'); ?>//" id="rankology-redirections-settings" class="page-title-action"><?php //esc_html_e('Settings', 'wp-rankology'); ?>//</a>'
);

jQuery("body.post-type-rankology_404 .wrap h1 ~ #rankology-redirections-settings").after(
    //'<a href="<?php //echo admin_url('admin.php?page=rankology-import-export#tab=tab_rankology_tool_redirects'); ?>//" id="rankology-clean-404" class="page-title-action"><?php //esc_html_e('Clean your 404', 'wp-rankology'); ?>//</a>'
);

jQuery("body.post-type-rankology_404 .wrap h1 ~ #rankology-clean-404").after(
    //'<a href="<?php //echo admin_url('admin.php?page=rankology-import-export#tab=tab_rankology_tool_redirects'); ?>//" id="rankology-clean-redirects" class="page-title-action"><?php //esc_html_e('Clean all entries', 'wp-rankology'); ?>//</a>'
);
});
</script>
<?php
    }
}
add_action('admin_head', 'rankology_404_btn_cpt');

///////////////////////////////////////////////////////////////////////////////////////////////////
//Add buttons to post type list if empty
///////////////////////////////////////////////////////////////////////////////////////////////////
add_action('manage_posts_extra_tablenav', 'rankology_404_maybe_render_blank_state');

function rankology_404_render_blank_state() { ?>
<div class="rankology-BlankState">

<h2 class="rankology-BlankState-message">
<?php esc_html_e('Your redirections and 404 errors will appear here.', 'wp-rankology'); ?>
</h2>

<div class="rankology-BlankState-buttons">

<a class="rankology-BlankState-cta btn btnPrimary"
    href="<?php echo esc_url(admin_url('post-new.php?post_type=rankology_404')); ?>"><?php esc_html_e('Create a redirect', 'wp-rankology'); ?></a>
<!--<a class="rankology-BlankState-cta btn btnTertiary"-->
<!--    href="--><?php //echo esc_url(admin_url('admin.php?page=rankology-import-export#tab=tab_rankology_tool_redirects')); ?><!--">--><?php //esc_html_e('Start Import', 'wp-rankology'); ?><!--</a>-->

</div>

</div>

<?php
}
function rankology_404_maybe_render_blank_state($which) {
    global $post_type;

    if ('rankology_404' === $post_type && 'bottom' === $which) {
        $counts = (array) wp_count_posts($post_type);
        unset($counts['auto-draft']);
        $count = array_sum($counts);

        if (0 < $count) {
            return;
        }

        rankology_404_render_blank_state();

        echo '<style type="text/css">#posts-filter .wp-list-table, #posts-filter .tablenav.top, .tablenav.bottom .actions, .wrap .subsubsub  { display: none; } #posts-filter .tablenav.bottom { height: auto; } </style>';
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////
//Row actions links
///////////////////////////////////////////////////////////////////////////////////////////////////
function rankology_404_row_actions($actions, $post) {
    if ('rankology_404' === get_post_type()) {
        //WPML
        add_filter('wpml_get_home_url', 'rankology_remove_wpml_home_url_filter', 20, 5);

        if ('yes' == get_post_meta(get_the_ID(), '_rankology_redirections_enabled', true)) {
            $parse_url = wp_parse_url(get_home_url());

            $home_url = get_home_url();
            if ( ! empty($parse_url['scheme']) && ! empty($parse_url['host'])) {
                $home_url = $parse_url['scheme'] . '://' . $parse_url['host'];
            }

            $actions['rankology_404_test'] = "<a href='" . $home_url . '/' . get_the_title() . "' target='_blank'>" . __('Test redirection', 'wp-rankology') . '</a>';
        }

        //WPML
        remove_filter('wpml_get_home_url', 'rankology_remove_wpml_home_url_filter', 20);
    }

    return $actions;
}
add_filter('post_row_actions', 'rankology_404_row_actions', 10, 2);

///////////////////////////////////////////////////////////////////////////////////////////////////
//Filters view
///////////////////////////////////////////////////////////////////////////////////////////////////
add_filter('views_edit-rankology_404', 'rankology_404_filter_views_cpt');
function rankology_404_filter_views_cpt($views) {

    $current_view = '';

    if ( isset( $_GET['post_status'] ) ) {
        $current_view = sanitize_text_field( wp_unslash( $_GET['post_status'] ) );
    }

    $views = [
        'redirects' => [
            'href' => admin_url('edit.php?post_type=rankology_404&post_status=redirects'),
            'i18n' => __('Redirects','wp-rankology')
        ],
        '404' => [
            'href' => admin_url('edit.php?post_type=rankology_404&action=-1&m=0&redirect-cat=0&redirection-type=404&redirection-enabled&filter_action=Filter&paged=1&action2=-1&post_status=404'),
            'i18n' => __('404 errors','wp-rankology')
        ],
        'all' => [
            'href' => admin_url('edit.php?post_type=rankology_404&post_status=all'),
            'i18n' => __('All','wp-rankology'),
            'sub_links' => [
                0 => [
                    'href' => admin_url('edit.php?post_status=pending&post_type=rankology_404'),
                    'i18n' => __('Pending','wp-rankology')
                ],
                1 => [
                    'href' => admin_url('edit.php?post_status=draft&post_type=rankology_404'),
                    'i18n' => __('Draft','wp-rankology')
                ],
                2 => [
                    'href' => admin_url('edit.php?post_status=trash&post_type=rankology_404'),
                    'i18n' => __('Trash','wp-rankology')
                ]
            ]
        ],
        'categories' => [
            'href' => admin_url('edit-tags.php?taxonomy=rankology_404_cat&post_type=rankology_404'),
            'i18n' => __('Categories','wp-rankology')
        ],
    ];

    echo "<ul class='subsubsub'>\n";
    $count = count($views);
    $i = 1;
    foreach ( $views as $key => $view ) {
        $class = '';
        $aria = '';
        if ($key == $current_view) {
            $class = 'current';
            $aria = 'aria-current="page"';
        } ?>
        <li class=<?php echo $key; ?>>
            <a class="<?php echo $class; ?>" <?php echo $aria; ?> href="<?php echo $view['href']; ?>">
                <?php echo $view['i18n']; ?>
            </a>
            <?php if (!empty($view['sub_links'])) {
                $count_sub = count($view['sub_links']);
                $i_sub = 1;
                echo '(';
                foreach($view['sub_links'] as $_key => $_value) { ?>
                    <a class="<?php echo $class; ?>" <?php echo $aria; ?> href="<?php echo $_value['href']; ?>">
                        <?php echo $_value['i18n']; ?>
                    </a>
                    <?php if ($count_sub !== $i_sub) {
                        echo ' - ';
                    }
                    $i_sub++;
                }
                echo ')';
            }
            if ($count !== $i) {
                echo ' |';
            } ?>
        </li>
        <?php
        $i++;
    }

    echo '</ul>';
}

add_action('restrict_manage_posts', 'rankology_404_filters_cpt');
function rankology_404_filters_cpt() {
    global $typenow;

    if ('rankology_404' == $typenow) {
        $args = [
            'show_option_all' => __('All categories', 'wp-rankology'),
            'show_option_none' => '',
            'option_none_value' => '-1',
            'orderby' => 'ID',
            'order' => 'ASC',
            'show_count' => 1,
            'hide_empty' => 0,
            'child_of' => 0,
            'exclude' => '',
            'include' => '',
            'echo' => 1,
            'selected' => 0,
            'hierarchical' => 0,
            'name' => 'redirect-cat',
            'id' => '',
            'class' => 'postform',
            'depth' => 0,
            'tab_index' => 0,
            'taxonomy' => 'rankology_404_cat',
            'hide_if_empty' => true,
            'value_field' => 'slug',
        ];
        wp_dropdown_categories($args);

        $redirections_type = ['301', '302', '307', '404', '410', '451'];
        $redirections_enabled = ['yes' => 'Enabled', 'no' => 'Disabled'];

        echo "<select name='redirection-type' id='redirection-type' class='postform'>";
        echo "<option value=''>" . __('Show All', 'wp-rankology') . '</option>';
        foreach ($redirections_type as $type) {
            echo '<option value=' . $type, isset($_GET[$type]) == $type ? ' selected="selected"' : '','>' . $type . '</option>';
        }
        echo '</select>';

        echo "<select name='redirection-enabled' id='redirection-enabled' class='postform'>";
        echo "<option value=''>" . __('All status', 'wp-rankology') . '</option>';
        foreach ($redirections_enabled as $enabled => $value) {
            echo '<option value=' . $enabled, isset($_GET[$enabled]) == $enabled ? ' selected="selected"' : '','>' . $value . '</option>';
        }
        echo '</select>';
    }
}

add_filter('parse_query', 'rankology_404_filters_action');
function rankology_404_filters_action($query) {
    global $pagenow;
    $current_page = isset($_GET['post_type']) ? $_GET['post_type'] : '';

    if (is_admin() && 'rankology_404' == $current_page && 'edit.php' == $pagenow
    && (!isset($_GET['post_status']) && !isset($_GET['s']))) {
        wp_safe_redirect( admin_url( 'edit.php?post_type=rankology_404&post_status=redirects' ), '301' );
        exit();
    }

    if (is_admin() && 'rankology_404' == $current_page && 'edit.php' == $pagenow && (isset($_GET['post_status']) &&
        ('redirects' == $_GET['post_status']))) {
            $query->query_vars['meta_query'] = [
                [
                    'key' => '_rankology_redirections_type',
                    'value' => null,
                    'compare' => '!=',
                ],
            ];
    }

    if (is_admin() && 'rankology_404' == $current_page && 'edit.php' == $pagenow && (isset($_GET['redirect-cat']) &&
        ('0' != $_GET['redirect-cat']))) {
        $redirection_cat = $_GET['redirect-cat'];
        $query->query_vars['tax_query'] = [
            [
                'taxonomy' => 'rankology_404_cat',
                'field' => 'slug',
                'terms' => $redirection_cat,
            ],
        ];
    }

    if (is_admin() && 'rankology_404' == $current_page && 'edit.php' == $pagenow && (isset($_GET['redirect-cat']) &&
        '' != $_GET['redirect-cat'] && isset($_GET['redirection-type']) &&
        '' != $_GET['redirection-type'] && isset($_GET['redirection-enabled']) && '' != $_GET['redirection-enabled'])) {
        $redirection_type = $_GET['redirection-type'];
        $redirection_enabled = $_GET['redirection-enabled'];

        $query->query_vars['meta_relation'] = 'AND';
        if ('no' == $_GET['redirection-enabled']) {
            $compare = 'NOT EXISTS';
        } else {
            $compare = '=';
        }
        $query->query_vars['meta_query'] = [
            'relation' => 'AND',
            [
                'key' => '_rankology_redirections_type',
                'value' => $redirection_type,
                'compare' => '=',
            ],
            [
                'key' => '_rankology_redirections_enabled',
                'value' => $redirection_enabled,
                'compare' => $compare,
            ],
        ];
    }

    if (is_admin() && 'rankology_404' == $current_page && 'edit.php' == $pagenow && isset($_GET['redirection-type']) &&
        '' != $_GET['redirection-type']) {
        $redirection_type = $_GET['redirection-type'];

        $query->query_vars['meta_query'] = [
            'relation' => 'AND',
            [
                'key' => '_rankology_redirections_type',
                'value' => $redirection_type,
                'compare' => '=',
            ],
        ];

        if ('404' == $redirection_type) {
            $query->query_vars['meta_query'] = [
                'relation' => 'AND',
                [
                    'key' => '_rankology_redirections_type',
                    'compare' => 'NOT EXISTS',
                ],
            ];
        }
    }
    if (is_admin() && 'rankology_404' == $current_page && 'edit.php' == $pagenow && isset($_GET['redirection-enabled']) &&
        '' != $_GET['redirection-enabled']) {
        $redirection_enabled = $_GET['redirection-enabled'];
        $query->query_vars['meta_key'] = '_rankology_redirections_enabled';
        $query->query_vars['meta_value'] = $redirection_enabled;
        if ('no' == $redirection_enabled) {
            $query->query_vars['meta_compare'] = 'NOT EXISTS';
        } else {
            $query->query_vars['meta_compare'] = '=';
        }
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////
//Bulk actions
///////////////////////////////////////////////////////////////////////////////////////////////////
//enable 301
add_filter('bulk_actions-edit-rankology_404', 'rankology_bulk_actions_enable');

function rankology_bulk_actions_enable($bulk_actions) {
    $bulk_actions['rankology_enable'] = __('Enable redirection', 'wp-rankology');

    return $bulk_actions;
}

add_filter('handle_bulk_actions-edit-rankology_404', 'rankology_bulk_action_enable_handler', 10, 3);

function rankology_bulk_action_enable_handler($redirect_to, $doaction, $post_ids) {
    if ('rankology_enable' !== $doaction) {
        return $redirect_to;
    }
    foreach ($post_ids as $post_id) {
        // Perform action for each post.
        update_post_meta($post_id, '_rankology_redirections_enabled', 'yes');
    }
    $redirect_to = add_query_arg('bulk_enable_posts', count($post_ids), $redirect_to);

    return $redirect_to;
}

add_action('rankology_admin_notices', 'rankology_bulk_action_enable_admin_notice');

function rankology_bulk_action_enable_admin_notice() {
    if ( ! empty($_REQUEST['bulk_enable_posts'])) {
        $enable_count = intval($_REQUEST['bulk_enable_posts']);
        printf('<div id="message" class="updated fade"><p>' .
                _n(
                    '%s redirection enabled.',
                    '%s redirections enabled.',
                    $enable_count,
                    'wp-rankology'
                ) . '</p></div>', $enable_count);
    }
}

//disable 301
add_filter('bulk_actions-edit-rankology_404', 'rankology_bulk_actions_disable');

function rankology_bulk_actions_disable($bulk_actions) {
    $bulk_actions['rankology_disable'] = __('Disable redirection', 'wp-rankology');

    return $bulk_actions;
}

add_filter('handle_bulk_actions-edit-rankology_404', 'rankology_bulk_action_disable_handler', 10, 3);

function rankology_bulk_action_disable_handler($redirect_to, $doaction, $post_ids) {
    if ('rankology_disable' !== $doaction) {
        return $redirect_to;
    }
    foreach ($post_ids as $post_id) {
        // Perform action for each post.
        update_post_meta($post_id, '_rankology_redirections_enabled', '');
    }
    $redirect_to = add_query_arg('bulk_disable_posts', count($post_ids), $redirect_to);

    return $redirect_to;
}

add_action('rankology_admin_notices', 'rankology_bulk_action_disable_admin_notice');

function rankology_bulk_action_disable_admin_notice() {
    if ( ! empty($_REQUEST['bulk_disable_posts'])) {
        $disable_count = intval($_REQUEST['bulk_disable_posts']);
        printf('<div id="message" class="updated fade"><p>' .
                _n(
                    '%s redirection disabled.',
                    '%s redirections disabled.',
                    $disable_count,
                    'wp-rankology'
                ) . '</p></div>', $disable_count);
    }
}

//enable regex
add_filter('bulk_actions-edit-rankology_404', 'rankology_bulk_actions_enable_regex');

function rankology_bulk_actions_enable_regex($bulk_actions) {
    $bulk_actions['rankology_enable_regex'] = __('Enable regex', 'wp-rankology');

    return $bulk_actions;
}

add_filter('handle_bulk_actions-edit-rankology_404', 'rankology_bulk_action_enable_regex_handler', 10, 3);

function rankology_bulk_action_enable_regex_handler($redirect_to, $doaction, $post_ids) {
    if ('rankology_enable_regex' !== $doaction) {
        return $redirect_to;
    }
    foreach ($post_ids as $post_id) {
        // Perform action for each post.
        update_post_meta($post_id, '_rankology_redirections_enabled_regex', 'yes');
    }
    $redirect_to = add_query_arg('bulk_enable_regex_posts', count($post_ids), $redirect_to);

    return $redirect_to;
}

add_action('rankology_admin_notices', 'rankology_bulk_action_enable_regex_admin_notice');

function rankology_bulk_action_enable_regex_admin_notice() {
    if ( ! empty($_REQUEST['bulk_enable_regex_posts'])) {
        $enable_regex_count = intval($_REQUEST['bulk_enable_regex_posts']);
        printf('<div id="message" class="updated fade"><p>' .
                _n(
                    '%s redirection with regex enabled.',
                    '%s redirections with regex enabled.',
                    $enable_regex_count,
                    'wp-rankology'
                ) . '</p></div>', $enable_regex_count);
    }
}

//disable regex
add_filter('bulk_actions-edit-rankology_404', 'rankology_bulk_actions_disable_regex');

function rankology_bulk_actions_disable_regex($bulk_actions) {
    $bulk_actions['rankology_disable_regex'] = __('Disable regex', 'wp-rankology');

    return $bulk_actions;
}

add_filter('handle_bulk_actions-edit-rankology_404', 'rankology_bulk_action_disable_regex_handler', 10, 3);

function rankology_bulk_action_disable_regex_handler($redirect_to, $doaction, $post_ids) {
    if ('rankology_disable_regex' !== $doaction) {
        return $redirect_to;
    }
    foreach ($post_ids as $post_id) {
        // Perform action for each post.
        update_post_meta($post_id, '_rankology_redirections_enabled_regex', '');
    }
    $redirect_to = add_query_arg('bulk_disable_regex_posts', count($post_ids), $redirect_to);

    return $redirect_to;
}

add_action('rankology_admin_notices', 'rankology_bulk_action_disable_regex_admin_notice');

function rankology_bulk_action_disable_regex_admin_notice() {
    if ( ! empty($_REQUEST['bulk_disable_regex_posts'])) {
        $disable_count = intval($_REQUEST['bulk_disable_regex_posts']);
        printf('<div id="message" class="updated fade"><p>' .
                _n(
                    '%s redirection with regex disabled.',
                    '%s redirections with regex disabled.',
                    $disable_count,
                    'wp-rankology'
                ) . '</p></div>', $disable_count);
    }
}

//Set as 301
add_filter('bulk_actions-edit-rankology_404', 'rankology_bulk_actions_redirect_301');

function rankology_bulk_actions_redirect_301($bulk_actions) {
    $bulk_actions['rankology_redirect_301'] = __('Mark as 301', 'wp-rankology');

    return $bulk_actions;
}
add_filter('handle_bulk_actions-edit-rankology_404', 'rankology_bulk_action_redirect_301_handler', 10, 3);

function rankology_bulk_action_redirect_301_handler($redirect_to, $doaction, $post_ids) {
    if ('rankology_redirect_301' !== $doaction) {
        return $redirect_to;
    }
    foreach ($post_ids as $post_id) {
        // Perform action for each post.
        update_post_meta($post_id, '_rankology_redirections_type', '301');
    }
    $redirect_to = add_query_arg('bulk_301_redirects_posts', count($post_ids), $redirect_to);

    return $redirect_to;
}

add_action('rankology_admin_notices', 'rankology_bulk_action_redirect_301_admin_notice');

function rankology_bulk_action_redirect_301_admin_notice() {
    if ( ! empty($_REQUEST['bulk_301_redirects_posts'])) {
        $count_301 = intval($_REQUEST['bulk_301_redirects_posts']);
        printf('<div id="message" class="updated fade"><p>' .
        _n(
            '%s marked as 301 redirect.',
            '%s marked as 301 redirect.',
            $count_301,
            'wp-rankology'
        ) . '</p></div>', $count_301);
    }
}

//Set as 302
add_filter('bulk_actions-edit-rankology_404', 'rankology_bulk_actions_redirect_302');

function rankology_bulk_actions_redirect_302($bulk_actions) {
    $bulk_actions['rankology_redirect_302'] = __('Mark as 302', 'wp-rankology');

    return $bulk_actions;
}
add_filter('handle_bulk_actions-edit-rankology_404', 'rankology_bulk_action_redirect_302_handler', 10, 3);

function rankology_bulk_action_redirect_302_handler($redirect_to, $doaction, $post_ids) {
    if ('rankology_redirect_302' !== $doaction) {
        return $redirect_to;
    }
    foreach ($post_ids as $post_id) {
        // Perform action for each post.
        update_post_meta($post_id, '_rankology_redirections_type', '302');
    }
    $redirect_to = add_query_arg('bulk_302_redirects_posts', count($post_ids), $redirect_to);

    return $redirect_to;
}

add_action('rankology_admin_notices', 'rankology_bulk_action_redirect_302_admin_notice');

function rankology_bulk_action_redirect_302_admin_notice() {
    if ( ! empty($_REQUEST['bulk_302_redirects_posts'])) {
        $count_302 = intval($_REQUEST['bulk_302_redirects_posts']);
        printf('<div id="message" class="updated fade"><p>' .
        _n(
            '%s marked as 302 redirect.',
            '%s marked as 302 redirect.',
            $count_302,
            'wp-rankology'
        ) . '</p></div>', $count_302);
    }
}

//Set as 307
add_filter('bulk_actions-edit-rankology_404', 'rankology_bulk_actions_redirect_307');

function rankology_bulk_actions_redirect_307($bulk_actions) {
    $bulk_actions['rankology_redirect_307'] = __('Mark as 307', 'wp-rankology');

    return $bulk_actions;
}
add_filter('handle_bulk_actions-edit-rankology_404', 'rankology_bulk_action_redirect_307_handler', 10, 3);

function rankology_bulk_action_redirect_307_handler($redirect_to, $doaction, $post_ids) {
    if ('rankology_redirect_307' !== $doaction) {
        return $redirect_to;
    }
    foreach ($post_ids as $post_id) {
        // Perform action for each post.
        update_post_meta($post_id, '_rankology_redirections_type', '307');
    }
    $redirect_to = add_query_arg('bulk_307_redirects_posts', count($post_ids), $redirect_to);

    return $redirect_to;
}

add_action('rankology_admin_notices', 'rankology_bulk_action_redirect_307_admin_notice');

function rankology_bulk_action_redirect_307_admin_notice() {
    if ( ! empty($_REQUEST['bulk_307_redirects_posts'])) {
        $count_307 = intval($_REQUEST['bulk_307_redirects_posts']);
        printf('<div id="message" class="updated fade"><p>' .
        _n(
            '%s marked as 307 redirect.',
            '%s marked as 307 redirect.',
            $count_307,
            'wp-rankology'
        ) . '</p></div>', $count_307);
    }
}

//Set as 410
add_filter('bulk_actions-edit-rankology_404', 'rankology_bulk_actions_redirect_410');

function rankology_bulk_actions_redirect_410($bulk_actions) {
    $bulk_actions['rankology_redirect_410'] = __('Mark as 410', 'wp-rankology');

    return $bulk_actions;
}
add_filter('handle_bulk_actions-edit-rankology_404', 'rankology_bulk_action_redirect_410_handler', 10, 3);

function rankology_bulk_action_redirect_410_handler($redirect_to, $doaction, $post_ids) {
    if ('rankology_redirect_410' !== $doaction) {
        return $redirect_to;
    }
    foreach ($post_ids as $post_id) {
        // Perform action for each post.
        update_post_meta($post_id, '_rankology_redirections_type', '410');
    }
    $redirect_to = add_query_arg('bulk_410_redirects_posts', count($post_ids), $redirect_to);

    return $redirect_to;
}

add_action('rankology_admin_notices', 'rankology_bulk_action_redirect_410_admin_notice');

function rankology_bulk_action_redirect_410_admin_notice() {
    if ( ! empty($_REQUEST['bulk_410_redirects_posts'])) {
        $count_410 = intval($_REQUEST['bulk_410_redirects_posts']);
        printf('<div id="message" class="updated fade"><p>' .
        _n(
            '%s marked as 410 redirect.',
            '%s marked as 410 redirect.',
            $count_410,
            'wp-rankology'
        ) . '</p></div>', $count_410);
    }
}

//Set as 451
add_filter('bulk_actions-edit-rankology_404', 'rankology_bulk_actions_redirect_451');

function rankology_bulk_actions_redirect_451($bulk_actions) {
    $bulk_actions['rankology_redirect_451'] = __('Mark as 451', 'wp-rankology');

    return $bulk_actions;
}
add_filter('handle_bulk_actions-edit-rankology_404', 'rankology_bulk_action_redirect_451_handler', 10, 3);

function rankology_bulk_action_redirect_451_handler($redirect_to, $doaction, $post_ids) {
    if ('rankology_redirect_451' !== $doaction) {
        return $redirect_to;
    }
    foreach ($post_ids as $post_id) {
        // Perform action for each post.
        update_post_meta($post_id, '_rankology_redirections_type', '451');
    }
    $redirect_to = add_query_arg('bulk_451_redirects_posts', count($post_ids), $redirect_to);

    return $redirect_to;
}

add_action('rankology_admin_notices', 'rankology_bulk_action_redirect_451_admin_notice');

function rankology_bulk_action_redirect_451_admin_notice() {
    if ( ! empty($_REQUEST['bulk_451_redirects_posts'])) {
        $count_451 = intval($_REQUEST['bulk_451_redirects_posts']);
        printf('<div id="message" class="updated fade"><p>' .
        _n(
            '%s marked as 451 redirect.',
            '%s marked as 451 redirect.',
            $count_451,
            'wp-rankology'
        ) . '</p></div>', $count_451);
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////
//Set title placeholder for Redirections Custom Post Type
///////////////////////////////////////////////////////////////////////////////////////////////////
add_filter('enter_title_here', 'rankology_404_cpt_title');
function rankology_404_cpt_title($title) {
    if (function_exists('get_current_screen')) {
        $screen = get_current_screen();
        if ('rankology_404' == $screen->post_type) {
            $title = __('Enter the old URL here without domain name', 'wp-rankology');
        }

        return $title;
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////
//Display help after title
///////////////////////////////////////////////////////////////////////////////////////////////////
add_action('edit_form_after_title', 'rankology_301_after_title');
function rankology_301_after_title() {
    global $typenow;
    if (isset($typenow) && 'rankology_404' == $typenow) {
        echo '<p>' . __('Enter your <strong>relative</strong> URL above. Do not use anchors, they are not sent by your browser.', 'wp-rankology') . '<br>';
        esc_html_e('e.g. <strong>"my-custom-permalink"</strong>. If you have a permalink structure like <strong>/%category%/%postname%/</strong>, make sure to include the categories: <strong>"category/sub-category/my-custom-permalink".</strong>', 'wp-rankology');
        echo '</p>';
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////
//Set messages for Redirections Custom Post Type
///////////////////////////////////////////////////////////////////////////////////////////////////
add_filter('post_updated_messages', 'rankology_404_set_messages');
function rankology_404_set_messages($messages) {
    global $post, $post_ID, $typenow;
    $post_type = 'rankology_404';
    $rankology_404_test = '';

    if ('rankology_404' === $typenow) {
        $obj = get_post_type_object($post_type);
        $singular = $obj->labels->singular_name;

        //WPML
        add_filter('wpml_get_home_url', 'rankology_remove_wpml_home_url_filter', 20, 5);

        if ('yes' == get_post_meta(get_the_ID(), '_rankology_redirections_enabled', true)) {
            $parse_url = wp_parse_url(get_home_url());

            $home_url = get_home_url();
            if ( ! empty($parse_url['scheme']) && ! empty($parse_url['host'])) {
                $home_url = $parse_url['scheme'] . '://' . $parse_url['host'];
            }
            $rankology_404_test = "<a href='" . $home_url . '/' . get_the_title() . "' target='_blank'>" . __('Test redirection', 'wp-rankology') . "</a><span class='dashicons dashicons-redo'></span>";
        }

        $messages[$post_type] = [
            0 => '', // Unused. Messages start at index 1.
            1 => sprintf(__($singular . ' updated. %s'), $rankology_404_test),
            2 => __('Custom field updated.'),
            3 => __('Custom field deleted.'),
            4 => sprintf(__($singular . ' updated. %s'), $rankology_404_test),
            5 => isset($_GET['revision']) ? sprintf(__($singular . ' restored to revision from %s'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
            6 => sprintf(__($singular . ' published. %s'), $rankology_404_test),
            7 => __('Redirection saved.'),
            8 => sprintf(__($singular . ' submitted.'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
            9 => sprintf(__($singular . ' scheduled for: <strong>%1$s</strong>. '), date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
            10 => sprintf(__($singular . ' draft updated.'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
        ];

        return $messages;
    } else {
        return $messages;
    }
}

add_filter('bulk_post_updated_messages', 'rankology_404_set_messages_list', 10, 2);
function rankology_404_set_messages_list($bulk_messages, $bulk_counts) {
    $bulk_messages['rankology_404'] = [
        'updated' => _n('%s redirection updated.', '%s redirections updated.', $bulk_counts['updated']),
        'locked' => _n('%s redirection not updated, somebody is editing it.', '%s redirections not updated, somebody is editing them.', $bulk_counts['locked']),
        'deleted' => _n('%s redirection permanently deleted.', '%s redirections permanently deleted.', $bulk_counts['deleted']),
        'trashed' => _n('%s redirection moved to the Trash.', '%s redirections moved to the Trash.', $bulk_counts['trashed']),
        'untrashed' => _n('%s redirection restored from the Trash.', '%s redirections restored from the Trash.', $bulk_counts['untrashed']),
    ];

    return $bulk_messages;
}
///////////////////////////////////////////////////////////////////////////////////////////////////
//Items per page
///////////////////////////////////////////////////////////////////////////////////////////////////
add_filter('edit_rankology_404_per_page', 'rankology_404_items_per_page' );
function rankology_404_items_per_page($per_page) {
    //Check if user has alread defined the number of items
    $user_id = get_current_user_id();
    if (isset($user_id) && get_user_meta($user_id, 'edit_rankology_404_per_page', true )) {
        return get_user_meta($user_id, 'edit_rankology_404_per_page', true );
    }

    $per_page = 100;
    return $per_page;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
//Columns for Rankology Redirections Custom Post Type
///////////////////////////////////////////////////////////////////////////////////////////////////

add_filter('manage_edit-rankology_404_columns', 'rankology_404_count_columns');
add_action('manage_rankology_404_posts_custom_column', 'rankology_404_count_display_column', 10, 2);

function rankology_404_count_columns($columns) {
    unset($columns['title']);
    unset($columns['date']);
    unset($columns['taxonomy-rankology_404_cat']);

    $columns['rankology_404_redirect_enable'] = __('On?', 'wp-rankology');
    $columns['title'] = __('Origin URL', 'wp-rankology');
    $columns['rankology_404_redirect_value'] = __('Destination URL', 'wp-rankology');
    $columns['rankology_404_redirect_type'] = __('Type', 'wp-rankology');
    $columns['rankology_404'] = __('Traffic', 'wp-rankology');
    $columns['rankology_404_redirect_regex_enable'] = __('Regex?', 'wp-rankology');
    $columns['rankology_404_date'] = __('Date', 'wp-rankology');
    $columns['taxonomy-rankology_404_cat'] = __('Categories', 'wp-rankology');
    $columns['rankology_404_redirect_date_request'] = __('Last time loaded', 'wp-rankology');
    $columns['rankology_404_redirect_ua'] = __('User agent', 'wp-rankology');
    $columns['rankology_404_redirect_referer'] = __('Referer', 'wp-rankology');
    $columns['rankology_404_redirect_ip'] = __('IP address', 'wp-rankology');

    return $columns;
}

function rankology_404_count_display_column($column, $post_id) {
    if ('rankology_404_date' == $column) {
        the_date( '', '', '', true );
    }
    if ('rankology_404' == $column) {
        echo get_post_meta($post_id, 'rankology_404_count', true);
    }
    if ('rankology_404_redirect_enable' == $column) {
        if ('yes' == get_post_meta($post_id, '_rankology_redirections_enabled', true)) {
            echo '<span class="dashicons dashicons-yes-alt"></span>';
        }
    }
    if ('rankology_404_redirect_regex_enable' == $column) {
        if ('yes' == get_post_meta($post_id, '_rankology_redirections_enabled_regex', true)) {
            echo '<span class="dashicons dashicons-yes"></span>';
        }
    }
    if ('rankology_404_redirect_type' == $column) {
        $rankology_redirections_type = get_post_meta($post_id, '_rankology_redirections_type', true);
        switch ($rankology_redirections_type) {

        case '301':
            echo '<span class="rankology_redirection_301 rankology_redirection_status" title="' . __('Moved permanently','wp-rankology') . '">' . $rankology_redirections_type . '</span>';
            break;

        case '302':
            echo '<span class="rankology_redirection_302 rankology_redirection_status" title="' . __('302 Found / Moved Temporarily','wp-rankology') . '">' . $rankology_redirections_type . '</span>';
            break;

        case '307':
            echo '<span class="rankology_redirection_307 rankology_redirection_status" title="' . __('307 Moved Temporarily','wp-rankology') . '">' . $rankology_redirections_type . '</span>';
            break;

        case '410':
            echo '<span class="rankology_redirection_410 rankology_redirection_status" title="' . __('410 Gone','wp-rankology') . '">' . $rankology_redirections_type . '</span>';
            break;

        case '451':
            echo '<span class="rankology_redirection_451 rankology_redirection_status" title="' . __('451 Unavailable For Legal Reasons','wp-rankology') . '">' . $rankology_redirections_type . '</span>';
            break;

        default:
            echo '<span class="rankology_redirection_default rankology_redirection_status" title="' . __('404 not found','wp-rankology') . '">' . __('404', 'wp-rankology') . '</span>';
            break;
        }
    }
    if ('rankology_404_redirect_value' == $column) {
        if (get_post_meta($post_id, '_rankology_redirections_value', true)) {
            echo esc_html(get_post_meta($post_id, '_rankology_redirections_value', true));
        }
    }
    if ('rankology_404_redirect_date_request' == $column) {
        global $wp_version;
        $timestamp = esc_html(get_post_meta($post_id, '_rankology_404_redirect_date_request', true));
        if ('' != $timestamp) {
            echo date(get_option('date_format').' ['.get_option('time_format').']', $timestamp);
        }
    }
    if ('rankology_404_redirect_ua' == $column) {
        echo esc_html(get_post_meta($post_id, 'rankology_redirections_ua', true));
    }
    if ('rankology_404_redirect_referer' == $column) {
        echo '<a target="_blank" href="' . esc_html(get_post_meta($post_id, 'rankology_redirections_referer', true)) . '">' . esc_html(get_post_meta($post_id, 'rankology_redirections_referer', true)) . '</a>';
    }
    if ('rankology_404_redirect_ip' == $column) {
        echo esc_html(get_post_meta($post_id, '_rankology_redirections_ip', true));
    }
}

//Sortable columns
add_filter('manage_edit-rankology_404_sortable_columns', 'rankology_404_sortable_columns');

function rankology_404_sortable_columns($columns) {
    $columns['rankology_404'] = 'rankology_404';
    $columns['rankology_404_redirect_enable'] = 'rankology_404_redirect_enable';
    $columns['rankology_404_redirect_regex_enable'] = 'rankology_404_redirect_regex_enable';
    $columns['rankology_404_redirect_type'] = 'rankology_404_redirect_type';

    return $columns;
}

add_filter('pre_get_posts', 'rankology_404_sort_columns_by');

function rankology_404_sort_columns_by($query) {
    if ( ! is_admin()) {
        return $query;
    }

    global $typenow;
    if ('rankology_404' !== $typenow) {
        return $query;
    }

    if ( isset( $_GET['post_status'] ) ) {
        $current_view = sanitize_text_field( wp_unslash( $_GET['post_status'] ) );
    }

    $orderby = $query->get('orderby');

    //Count
    if ('rankology_404' === $orderby) {
        $query->set('meta_query', [
            'relation' => 'AND',
            [
                'key' => 'rankology_404_count',
                'compare' => 'EXISTS',
                'type' => 'NUMERIC'
            ],
            [
                'key' => '_rankology_redirections_type',
                'compare' => 'NOT EXISTS',
            ],
        ]);
        if ('redirects' === $_GET['post_status'] || 'all' === $_GET['post_status']) {
            $query->set('meta_query', [
                'relation' => 'AND',
                [
                    'key' => 'rankology_404_count',
                    'compare' => 'EXISTS',
                ],
                [
                    'key' => '_rankology_redirections_type',
                    'compare' => 'EXISTS',
                ],
            ]);
        }
        $query->set('orderby', 'meta_value_num');

        if ('404' === $_GET['post_status']) {
            $query->set('orderby', 'rankology_404_count');
        }
    }
    //Enabled?
    if ('rankology_404_redirect_enable' === $orderby) {
        $query->set('meta_query', [
            'relation' => 'OR',
            [
                'key' => '_rankology_redirections_enabled',
                'compare' => 'EXISTS',
            ],
            [
                'key' => '_rankology_redirections_enabled',
                'compare' => 'NOT EXISTS',
            ],
        ]);
        $query->set('orderby', '_rankology_redirections_enabled');
    }
    //Regex?
    if ('rankology_404_redirect_regex_enable' === $orderby) {
        $query->set('meta_query', [
            'relation' => 'OR',
            [
                'key' => '_rankology_redirections_enabled_regex',
                'compare' => 'EXISTS',
            ],
            [
                'key' => '_rankology_redirections_enabled_regex',
                'compare' => 'NOT EXISTS',
            ],
        ]);
        $query->set('orderby', '_rankology_redirections_enabled_regex');
    }
    //Type
    if ('rankology_404_redirect_type' === $orderby) {
        $query->set('orderby', 'meta_value');
        $query->set('meta_query', [
            'relation' => 'OR',
            [
                'key' => '_rankology_redirections_type',
                'compare' => 'EXISTS',
            ],
            [
                'key' => '_rankology_redirections_type',
                'compare' => 'NOT EXISTS',
            ],
        ]);

        if ('redirects' === $_GET['post_status']) {
            $query->set('meta_query', [
                'relation' => 'AND',
                [
                    'key' => '_rankology_redirections_type',
                    'compare' => 'EXISTS',
                ],
            ]);
        }
    }

    return $query;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
//Quick Edit
///////////////////////////////////////////////////////////////////////////////////////////////////
add_action('quick_edit_custom_box', 'rankology_bulk_quick_edit_301_custom_box', 10, 2);
function rankology_bulk_quick_edit_301_custom_box($column_name) {
    static $printNonce = true;
    if ($printNonce) {
        $printNonce = false;
        wp_nonce_field(plugin_basename(__FILE__), 'rankology_301_edit_nonce');
    } ?>
<div class="wp-clearfix"></div>
<fieldset class="inline-edit-col-left">
<div class="inline-edit-col column-<?php echo $column_name; ?>">

<?php
                switch ($column_name) {
                case 'rankology_404_redirect_value':
                ?>
<label class="inline-edit-group">
    <span class="title"><?php esc_html_e('New URL', 'wp-rankology'); ?></span>
    <span class="input-text-wrap">
        <input type="text" name="rankology_redirections_value" />
    </span>
</label>
<?php
                break;
                case 'rankology_404_redirect_type':
                ?>
<label class="alignleft">
    <span class="title"><?php esc_html_e('Redirection type', 'wp-rankology'); ?></span>
    <select name="rankology_redirections_type">
        <option value="301"><?php esc_html_e('301 Moved Permanently', 'wp-rankology'); ?>
        </option>
        <option value="302"><?php esc_html_e('302 Found / Moved Temporarily', 'wp-rankology'); ?>
        </option>
        <option value="307"><?php esc_html_e('307 Moved Temporarily', 'wp-rankology'); ?>
        </option>
        <option value="410"><?php esc_html_e('410 Gone', 'wp-rankology'); ?>
        </option>
        <option value="451"><?php esc_html_e('451 Unavailable For Legal Reasons', 'wp-rankology'); ?>
        </option>
    </select>
</label>
<?php
                break;
                case 'rankology_404_redirect_enable':
                ?>
<h4><?php esc_html_e('Redirection settings', 'wp-rankology'); ?>
</h4>
<label class="alignleft">
    <input type="checkbox" name="rankology_redirections_enabled" value="yes">
    <span class="checkbox-title"><?php esc_html_e('Enable redirection?', 'wp-rankology'); ?></span>
</label>
<?php
                break;
                case 'rankology_404_redirect_regex_enable':
                ?>
<label class="alignleft">
    <input type="checkbox" name="rankology_redirections_enabled_regex" value="yes">
    <span class="checkbox-title"><?php esc_html_e('Regex?', 'wp-rankology'); ?></span>
</label>
<?php
                break;
                default:
                break;
                } ?>
</div>
</fieldset>
<?php
}

add_action('save_post', 'rankology_bulk_quick_edit_301_save_post', 10, 2);
function rankology_bulk_quick_edit_301_save_post($post_id) {
    // don't save if Elementor library
    if (isset($_REQUEST['post_type']) && 'elementor_library' === $_REQUEST['post_type']) {
        return $post_id;
    }

    // don't save for autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // dont save for revisions
    if (isset($_REQUEST['post_type']) && 'revision' === $_REQUEST['post_type']) {
        return $post_id;
    }

    if ( ! current_user_can('edit_redirections', $post_id)) {
        return;
    }

    $_REQUEST += ['rankology_301_edit_nonce' => ''];

    if ( ! wp_verify_nonce($_REQUEST['rankology_301_edit_nonce'], plugin_basename(__FILE__))) {
        return;
    }
    if (isset($_REQUEST['rankology_redirections_value'])) {
        update_post_meta($post_id, '_rankology_redirections_value', esc_html($_REQUEST['rankology_redirections_value']));
    }
    if (isset($_REQUEST['rankology_redirections_type'])) {
        update_post_meta($post_id, '_rankology_redirections_type', esc_html($_REQUEST['rankology_redirections_type']));
    }
    if (isset($_REQUEST['rankology_redirections_enabled'])) {
        update_post_meta($post_id, '_rankology_redirections_enabled', 'yes');
    } else {
        delete_post_meta($post_id, '_rankology_redirections_enabled', '');
    }
    if (isset($_REQUEST['rankology_redirections_enabled_regex'])) {
        update_post_meta($post_id, '_rankology_redirections_enabled_regex', 'yes');
    } else {
        delete_post_meta($post_id, '_rankology_redirections_enabled_regex', '');
    }
}

add_filter('wp_insert_post_data', 'rankology_filter_post_title', '99', 2);
function rankology_filter_post_title($data, $postarr) {
    if (isset($data['post_type']) && 'rankology_404' === $data['post_type'] && isset($postarr['ID'])) {
        if ('' != get_post_meta($postarr['ID'], '_rankology_redirections_type', true)) {
            $title = $data['post_title'];

            if ($title) {
                $url = wp_parse_url($title);

                if (isset($url['path']) && ! empty($url['path'])) {
                    $title = $url['path'];
                    if (isset($url['query']) && ! empty($url['query'])) {
                        $title .= '?' . $url['query'];
                    }
                    $data['post_title'] = ltrim($title, '/');
                }
            }
        }
    }

    return $data;
}
