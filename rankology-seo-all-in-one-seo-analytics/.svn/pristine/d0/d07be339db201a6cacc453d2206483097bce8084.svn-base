<?php
defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

if ('1' === rankology_fno_get_service('OptionPro')->get404DisableAutomaticRedirects()) {
    add_filter('rankology_post_automatic_redirect', '__return_false');
}

function rankology_get_option_post_need_redirects() {
    return get_option('rankology_can_post_redirect');
}

if ('1' == rankology_get_toggle_option('404') && apply_filters('rankology_post_automatic_redirect', true)) {
    function rankology_get_permalink_for_updated_post($post) {
        $url = wp_parse_url(get_permalink($post));
        if (is_array($url) && isset($url['path'])) {
            return $url['path'];
        }

        return '';
    }

    /**
     * Update of the option to propose a redirection.
     *
     * @return void
     *
     * 
     *
     * @param mixed $message
     */
    function rankology_create_notifaction_for_redirect($message) {
        $messages = rankology_get_option_post_need_redirects();
        if ( ! $messages) {
            $messages = [];
        }

        $messages[] = $message;

        update_option('rankology_can_post_redirect', $messages, false);
    }

    /**
     * Delete the option to propose a redirection.
     *
     * @return void
     *
     * 
     *
     * @param mixed $id
     */
    function rankology_remove_notification_for_redirect($id) {
        $messages = rankology_get_option_post_need_redirects();
        if ( ! $messages) {
            return;
        }

        foreach ($messages as $key => $message) {
            if ($id === $message['id']) {
                unset($messages[$key]);
            }
        }

        if (empty($messages)) {
            delete_option('rankology_can_post_redirect');

            return;
        }

        update_option('rankology_can_post_redirect', $messages, false);
    }

    /**
     * Checks if a post needs to be repeated.
     *
     * @param int $post_id
     *
     * @return bool
     */
    function rankology_can_post_autoredirect($post_id) {
        $post_type = get_post_type_object(get_post_type($post_id));

        if ( ! $post_type) {
            return false;
        }

        $post_types = rankology_get_service('WordPressData')->getPostTypes();
        $post_types = apply_filters('rankology_automatic_redirect_cpt', $post_types);

        $post_type_authorized = [];
        foreach ($post_types as $key => $type) {
            $post_type_authorized[] = $type->name;
        }

        return in_array($post_type->name, $post_type_authorized, true);
    }

    add_action('admin_notices', 'rankology_notice_need_to_redirect');

    /**
     * Notice proposing to create a redirection.
     *
     * @return void
     *
     * 
     */
    function rankology_notice_need_to_redirect() {
        $notices = rankology_get_option_post_need_redirects();
        if ( ! $notices) {
            return;
        }

        if ( ! current_user_can(rankology_capability('edit_redirections', 'notice'))) {
            return;
        }

        if (count($notices) > 1) {
            $remove_all_notices_url = wp_nonce_url(
                add_query_arg(
                    [
                        'action' => 'rankology_dismiss_all_notice_need_to_redirect',
                    ],
                    admin_url('admin-post.php')
                ),
                'rankology_dismiss_all_notice_need_to_redirect'
            );
            $info = __('We have %s redirections that needs your attention', 'wp-rankology');
            $view_all = __('View all notices (%s)', 'wp-rankology'); ?>
<div class="notice notice-warning">
    <p>
        <?php
                    printf($info, count($notices)); ?>
    </p>
    <p>
        <a href="#" id="js-view-all-notices" class="button button-secondary">
            <?php printf($view_all, count($notices)); ?>
        </a>
        <a href="<?php echo $remove_all_notices_url; ?>"
            class="button button-link">
            <?php esc_html_e('Remove all notices', 'wp-rankology'); ?>
        </a>
    </p>
</div>


<?php
        }

        $notices = array_reverse($notices);
        foreach ($notices as $key => $notice) {
            $before_url = trim($notice['before_url'], '\/');

            $href_button = admin_url(sprintf('post-new.php?post_type=rankology_404&post_title=%s&prepare_redirect=1&key=%s', $before_url, $key));

            if ('update' === $notice['type']) {
                $href_button = add_query_arg(
                    [
                        'redirect_to' => trim($notice['new_url'], '\/'),
                    ],
                    $href_button
                );
            } ?>

<div class="notice notice-warning <?php if ($key > 0) { ?>notice-redirect-hide<?php } ?>"
    style="position:relative; <?php if ($key > 0) { ?>display:none;<?php } ?>">
    <?php
                printf('<a href="%s" class="notice-dismiss" style="text-decoration:none;"><span class="screen-reader-text">' . __('Dismiss this notice', 'wp-rankology') . '</span></a>', wp_nonce_url(
                add_query_arg(
                    [
                        'action' => 'rankology_dismiss_notice_need_to_redirect',
                        'id' => $notice['id'],
                    ],
                    admin_url('admin-post.php')
                ),
                'rankology_dismiss_notice_need_to_redirect'
            )); ?>
    <?php echo $notice['message']; ?>
    <p>
        <a href="<?php echo esc_url($href_button); ?>"
            class="button button-secondary">
            <?php esc_html_e('Create a redirection', 'wp-rankology'); ?>
        </a>
    </p>
</div>
<?php
        }

        if (count($notices) > 1) {
            ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const $ = jQuery
        $("#js-view-all-notices").on("click", function(e) {
            e.preventDefault()
            $(".notice-redirect-hide").each(function(key, item) {
                $(item).slideToggle()
            })
        })
    })
</script>
<?php
        }
    }

    add_action('admin_post_rankology_dismiss_notice_need_to_redirect', 'rankology_dismiss_notice_need_to_redirect');

    /**
     * Deleting need to redirect notice.
     *
     * @return void
     *
     * 
     */
    function rankology_dismiss_notice_need_to_redirect() {
        if ( ! wp_verify_nonce($_GET['_wpnonce'], 'rankology_dismiss_notice_need_to_redirect')) {
            wp_redirect(admin_url('admin.php?page=rankology-option'));
            exit;
        }

        if ( ! current_user_can(rankology_capability('edit_redirections', 'notice'))) {
            wp_redirect(admin_url('admin.php?page=rankology-option'));
            exit;
        }

        if ( ! isset($_GET['id'])) {
            wp_redirect(admin_url('admin.php?page=rankology-option'));
            exit;
        }

        rankology_remove_notification_for_redirect($_GET['id']);

        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : admin_url('admin.php?page=rankology-option');

        wp_redirect($redirect);
    }

    add_action('admin_post_rankology_dismiss_all_notice_need_to_redirect', 'rankology_dismiss_all_notice_need_to_redirect');

    /**
     * Deleting all notices need to redirect.
     *
     * @return void
     *
     * 
     */
    function rankology_dismiss_all_notice_need_to_redirect() {
        if ( ! wp_verify_nonce($_GET['_wpnonce'], 'rankology_dismiss_all_notice_need_to_redirect')) {
            wp_redirect(admin_url('admin.php?page=rankology-option'));
            exit;
        }

        if ( ! current_user_can(rankology_capability('edit_redirections', 'notice'))) {
            wp_redirect(admin_url('admin.php?page=rankology-option'));
            exit;
        }

        delete_option('rankology_can_post_redirect');

        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : admin_url('admin.php?page=rankology-option');
        wp_redirect($redirect);
    }

    add_action('admin_init', 'rankology_pre_filling_data_need_to_redirect');

    /**
     * Pre-populate the redirect if we try to create one through the watcher.
     *
     * @return void
     *
     * 
     */
    function rankology_pre_filling_data_need_to_redirect() {
        if ( ! is_rankology_page()) {
            return;
        }

        if ( ! isset($_GET['post_type']) || 'rankology_404' !== $_GET['post_type']) {
            return;
        }

        global $pagenow;
        if ( ! in_array($pagenow, ['post-new.php']) || ! isset($_GET['prepare_redirect'])) {
            return;
        }

        add_filter('get_post_metadata', function ($metadata, $object_id, $meta_key, $single) {
            $can_filters = [
                '_rankology_redirections_value',
                '_rankology_redirections_enabled',
            ];

            if ( ! in_array($meta_key, $can_filters, true)) {
                return $metadata;
            }

            if ('_rankology_redirections_enabled' === $meta_key) {
                return 'yes';
            }
            if ('_rankology_redirections_value' === $meta_key && isset($_GET['redirect_to'])) {
                $url_redirect = user_trailingslashit(sprintf('%s/%s', home_url(), $_GET['redirect_to']));

                return esc_url($url_redirect);
            }

            return $metadata;
        }, 1, 4);
    }



    require_once __DIR__ . '/post-watcher.php';
    require_once __DIR__ . '/term-watcher.php';
}
