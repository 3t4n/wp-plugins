<?php
defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

if ('1' !== rankology_get_toggle_option('bot')) {
    return;
}
///////////////////////////////////////////////////////////////////////////////////////////////////
//Register Rankology BOT Custom Post Type
///////////////////////////////////////////////////////////////////////////////////////////////////
function rankology_bot_fn() {
    $labels = [
        'name'                  => _x('Broken links', 'Post Type General Name', 'wp-rankology'),
        'singular_name'         => _x('Broken links', 'Post Type Singular Name', 'wp-rankology'),
        'menu_name'             => __('Broken links', 'wp-rankology'),
        'name_admin_bar'        => __('Broken links', 'wp-rankology'),
        'archives'              => __('Item Links', 'wp-rankology'),
        'parent_item_colon'     => __('Parent Link:', 'wp-rankology'),
        'all_items'             => __('All Broken links', 'wp-rankology'),
        'add_new_item'          => __('Add New Link', 'wp-rankology'),
        'add_new'               => __('Add link', 'wp-rankology'),
        'new_item'              => __('New link', 'wp-rankology'),
        'edit_item'             => __('Edit link', 'wp-rankology'),
        'update_item'           => __('Update Link', 'wp-rankology'),
        'view_item'             => __('View Link', 'wp-rankology'),
        'search_items'          => __('Search Link', 'wp-rankology'),
        'not_found'             => __('Not found', 'wp-rankology'),
        'not_found_in_trash'    => __('Not found in Trash', 'wp-rankology'),
        'featured_image'        => __('Featured Image', 'wp-rankology'),
        'set_featured_image'    => __('Set featured image', 'wp-rankology'),
        'remove_featured_image' => __('Remove featured image', 'wp-rankology'),
        'use_featured_image'    => __('Use as featured image', 'wp-rankology'),
        'insert_into_item'      => __('Insert into item', 'wp-rankology'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'wp-rankology'),
        'items_list'            => __('Redirections list', 'wp-rankology'),
        'items_list_navigation' => __('Redirections list navigation', 'wp-rankology'),
        'filter_items_list'     => __('Filter redirections list', 'wp-rankology'),
    ];
    $args = [
        'label'                 => __('Broken links', 'wp-rankology'),
        'description'           => __('List of broken links', 'wp-rankology'),
        'labels'                => $labels,
        'supports'              => ['title', 'editor', 'custom-fields'],
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => false,
        'menu_icon'             => 'dashicons-admin-links',
        'show_in_admin_bar'     => false,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'capability_type'       => 'post',
        'capabilities'          => [
            'create_posts' => 'false',
        ],
        'map_meta_cap' => true,
    ];
    register_post_type('rankology_bot', $args);
}
add_action('init', 'rankology_bot_fn', 10);

///////////////////////////////////////////////////////////////////////////////////////////////////
//Remove bulk / inline edit for BOT Custom Post Type
///////////////////////////////////////////////////////////////////////////////////////////////////

add_filter('post_row_actions', 'rankology_bot_bulk_inline_actions', 10, 2);
function rankology_bot_bulk_inline_actions($actions, $post) {
    // Check for your post type.
    if ('rankology_bot' == $post->post_type) {
        $edit_link = admin_url('post.php?post=' . get_post_meta($post->ID, 'rankology_bot_source_id', true) . '&action=edit');
        $trash     = $actions['trash'];
        $actions   = [
            'edit' => sprintf('<a href="%1$s">%2$s</a>',
            esc_url($edit_link),
            esc_html(__('Edit source to fix link', 'wp-rankology'))),
        ];

        $actions['trash']=$trash;
    }

    return $actions;
}

add_filter('bulk_actions-edit-rankology_bot', 'rankology_bot_bulk_edit_actions');
function rankology_bot_bulk_edit_actions($actions) {
    unset($actions['edit']);

    return $actions;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
//Filters view
///////////////////////////////////////////////////////////////////////////////////////////////////
function rankology_bot_filters_cpt() {
    global $typenow;

    if ('rankology_bot' == $typenow) {
        $status = ['200', '301', '302', '307', '400', '401', '402', '403', '404', '410', '451', '500'];

        echo "<select name='bot-status' id='bot-status' class='postform'>";
        echo "<option value=''>" . __('Show All', 'wp-rankology') . '</option>';
        foreach ($status as $code) {
            echo '<option value=' . $code, isset($_GET[$code]) == $code ? ' selected="selected"' : '','>' . $code . '</option>';
        }
        echo '</select>';
    }
}
add_action('restrict_manage_posts', 'rankology_bot_filters_cpt');

function rankology_bot_filters_action($query) {
    global $pagenow;
    $current_page = isset($_GET['post_type']) ? $_GET['post_type'] : '';

    if (is_admin() && 'rankology_bot' == $current_page && 'edit.php' == $pagenow && isset($_GET['bot-status']) &&
        '' != $_GET['bot-status']) {
        $code                              = $_GET['bot-status'];
        $query->query_vars['meta_key']     = 'rankology_bot_status';
        $query->query_vars['meta_value']   = $code;
        $query->query_vars['meta_compare'] = '=';
    }
}
add_filter('parse_query', 'rankology_bot_filters_action');

///////////////////////////////////////////////////////////////////////////////////////////////////
//Set messages for BOT Custom Post Type
///////////////////////////////////////////////////////////////////////////////////////////////////

function rankology_bot_set_messages($messages) {
    global $post, $post_ID;
    $post_type = 'rankology_bot';

    $obj      = get_post_type_object($post_type);
    $singular = $obj->labels->singular_name;

    $messages[$post_type] = [
        0  => '', // Unused. Messages start at index 1.
        1  => sprintf(__($singular . ' updated.'), esc_url(get_permalink($post_ID))),
        2  => __('Custom field updated.'),
        3  => __('Custom field deleted.'),
        4  => __($singular . ' updated.'),
        5  => isset($_GET['revision']) ? sprintf(__($singular . ' restored to revision from %s'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
        6  => sprintf(__($singular . ' published.'), esc_url(get_permalink($post_ID))),
        7  => __('Page saved.'),
        8  => sprintf(__($singular . ' submitted.'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
        9  => sprintf(__($singular . ' scheduled for: <strong>%1$s</strong>. '), date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
        10 => sprintf(__($singular . ' draft updated.'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
    ];

    return $messages;
}

add_filter('post_updated_messages', 'rankology_bot_set_messages');

function rankology_bot_set_messages_list($bulk_messages, $bulk_counts) {
    $bulk_messages['rankology_bot'] = [
        'updated'   => _n('%s broken link updated.', '%s broken links updated.', $bulk_counts['updated']),
        'locked'    => _n('%s broken link not updated, somebody is editing it.', '%s broken links not updated, somebody is editing them.', $bulk_counts['locked']),
        'deleted'   => _n('%s broken link permanently deleted.', '%s broken links permanently deleted.', $bulk_counts['deleted']),
        'trashed'   => _n('%s broken link moved to the Trash.', '%s broken links moved to the Trash.', $bulk_counts['trashed']),
        'untrashed' => _n('%s broken link restored from the Trash.', '%s broken links restored from the Trash.', $bulk_counts['untrashed']),
    ];

    return $bulk_messages;
}
add_filter('bulk_post_updated_messages', 'rankology_bot_set_messages_list', 10, 2);

///////////////////////////////////////////////////////////////////////////////////////////////////
//Add custom buttons to Rankology BOT Custom Post Type
///////////////////////////////////////////////////////////////////////////////////////////////////
function rankology_bot_btn() {
    $screen = get_current_screen();
    if ('rankology_bot' == $screen->post_type) {
        ?>
        <script>
        jQuery(function(){
            jQuery("body.post-type-rankology_bot .wrap h1").append('<a href="<?php echo admin_url('admin.php?page=rankology-bot-batch'); ?>" class="page-title-action"><?php esc_attr_e('Scan broken links', 'wp-rankology'); ?></a> <a href="<?php echo admin_url('admin.php?page=rankology-bot-batch'); ?>" class="page-title-action"><?php esc_attr_e('Export to CSV', 'wp-rankology'); ?></a>');
        });
        </script>
    <?php
    }
}
add_action('admin_head', 'rankology_bot_btn');

///////////////////////////////////////////////////////////////////////////////////////////////////
//Columns for BOT Custom Post Type
///////////////////////////////////////////////////////////////////////////////////////////////////

add_filter('manage_edit-rankology_bot_columns', 'rankology_bot_count_columns');
add_action('manage_rankology_bot_posts_custom_column', 'rankology_bot_count_display_column', 10, 2);

function rankology_bot_count_columns($columns) {
    $columns['rankology_bot_broken_link']    = __('Broken link', 'wp-rankology');
    $columns['rankology_bot_count']          = __('Count', 'wp-rankology');
    $columns['rankology_bot_status']         = __('Status', 'wp-rankology');
    $columns['rankology_bot_type']           = __('Type', 'wp-rankology');
    $columns['rankology_bot_anchor']         = __('Anchor text', 'wp-rankology');
    $columns['rankology_bot_source']         = __('Source', 'wp-rankology');
    $columns['rankology_bot_cpt']            = __('Post type', 'wp-rankology');
    unset($columns['date']);
    unset($columns['title']);

    return $columns;
}

function rankology_bot_count_display_column($column, $post_id) {
    if ($post_id) {
        if ('rankology_bot_broken_link' == $column) {
            if (get_post_meta($post_id, 'rankology_bot_source_id', true)) {
                $p_id = get_post_meta($post_id, 'rankology_bot_source_id', true);

                if (isset($p_id)) {
                    $broken_link_edit = get_edit_post_link($p_id);
                    echo '<a href="' . $broken_link_edit . '">';
                    echo get_the_title($post_id);
                    echo ' - <span class="dashicons dashicons-edit"></span>';
                    echo '</a>';
                }
            }
        }
        if ('rankology_bot_count' == $column) {
            echo get_post_meta($post_id, 'rankology_bot_count', true);
        }
        if ('rankology_bot_status' == $column) {
            $rankology_bot_status = get_post_meta($post_id, 'rankology_bot_status', true);
            switch ($rankology_bot_status) {
                case '500':
                    echo '<span class="rankology_bot_500">' . $rankology_bot_status . '</span>';
                    break;

                case '404':
                case '403':
                case '402':
                case '401':
                case '400':
                    echo '<span class="rankology_bot_404">' . $rankology_bot_status . '</span>';
                    break;

                case '307':
                    echo '<span class="rankology_bot_307">' . $rankology_bot_status . '</span>';
                    break;

                case '302':
                    echo '<span class="rankology_bot_302">' . $rankology_bot_status . '</span>';
                    break;

                case '301':
                    echo '<span class="rankology_bot_301">' . $rankology_bot_status . '</span>';
                    break;

                case '200':
                    echo '<span class="rankology_bot_200">' . $rankology_bot_status . '</span>';
                    break;

                default:
                    echo '<span class="rankology_bot_default">' . esc_html($rankology_bot_status) . '</span>';
                    break;
            }
        }
        if ('rankology_bot_type' == $column) {
            echo get_post_meta($post_id, 'rankology_bot_type', true);
        }
        if ('rankology_bot_anchor' == $column) {
            echo get_post_meta($post_id, 'rankology_bot_a_title', true);
        }
        if ('rankology_bot_cpt' == $column) {
            echo get_post_meta($post_id, 'rankology_bot_cpt', true);
        }
        if ('rankology_bot_source' == $column) {
            echo '<a href="' . get_post_meta($post_id, 'rankology_bot_source_url', true) . '">' . get_post_meta($post_id, 'rankology_bot_source_title', true) . '</a>';
        }
    }
}

//Sortable columns
add_filter('manage_edit-rankology_bot_sortable_columns', 'rankology_bot_sortable_columns');

function rankology_bot_sortable_columns($columns) {
    $columns['rankology_bot_status'] = 'rankology_bot_status';

    return $columns;
}

add_filter('pre_get_posts', 'rankology_bot_sort_columns_by');
function rankology_bot_sort_columns_by($query) {
    if ( ! is_admin()) {
        return;
    } else {
        $orderby = $query->get('orderby');
        if ('rankology_bot_status' == $orderby) {
            $query->set('meta_key', 'rankology_bot_status');
            $query->set('orderby', 'meta_value');
        }
    }
}
