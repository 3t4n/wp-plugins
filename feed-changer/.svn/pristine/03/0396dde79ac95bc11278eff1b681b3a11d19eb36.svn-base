<?php

/**
 * Master theme class
 *
 * @package Bolts
 * @since 1.0
 */
class FeedChanger_Options
{

    private $sections;
    private $checkboxes;
    private $settings;

    /**
     * Construct
     *
     * @since 1.0
     */
    public function __construct()
    {
        add_action('admin_menu', array(&$this, 'add_pages'));

    }

    /**
     * Add options page
     *
     * @since 1.0
     */
    public function add_pages()
    {

        $admin_page = add_options_page(__('Feed Changer', 'FeedChanger'), __('Feed Changer', 'FeedChanger'), 'manage_options', 'FeedChanger-options', array(&$this, 'display_page'));

    }


    /**
     * Display options page
     *
     * @since 1.0
     */
    public function display_page()
    {

        echo '<div class="wrap">';
        echo '<div class="feed-changer">';
        if (isset($_POST['FeedChanger_button-primary'])) {
            $FeedChangervars = array();
            foreach ($_POST as $key => $value) {
                if (strpos($key, 'FeedChanger_') !== false) {
                    $FeedChangervars[$key] = sanitize_text_field($value);
                }
            }
            if (update_option('feedChanger', $FeedChangervars))
                echo feedChanger_wp_kses('<div class="updated"><p>' . __('Settings Updated!', 'FeedChanger') . '</p></div>');
        }
        $feedChanger_opt['settings'] = feedChanger_opts();
        ?>
        <style>
            .new-feed-url , .new-feed-url a {
                color: green;
            }
        </style>
        <form action="" method="post">
            <table class="form-table">
                <tr>
                    <td colspan="2"><strong><?php _e('Main Feed Settings', 'FeedChanger'); ?></strong>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label
                                for="FeedChanger_main_feed_enable"><?php _e('Enable main feed?', 'FeedChanger'); ?></label>
                    </th>
                    <td>
                        <input type="checkbox" id="FeedChanger_main_feed_enable"
                               value="yes" <?php checked('yes', $feedChanger_opt['settings']['FeedChanger_main_feed_enable'], true); ?>
                               name="FeedChanger_main_feed_enable">
                        <p class="description"><?php _e('Enable/Disbale main wordpress feeds', 'FeedChanger'); ?></p>
                    </td>
                </tr>

                <tr>
                    <td colspan="2"><strong><?php _e('Custom Feed Settings', 'FeedChanger'); ?></strong>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label
                                for="FeedChanger_changed_feed_enable"><?php _e('Enable custom feed?', 'FeedChanger'); ?></label>
                    </th>
                    <td>
                        <input type="checkbox" id="FeedChanger_changed_feed_enable"
                               value="yes" <?php checked('yes', $feedChanger_opt['settings']['FeedChanger_changed_feed_enable'], true); ?>
                               name="FeedChanger_changed_feed_enable">
                        <p class="description"><?php _e('enable new custom feed?', 'FeedChanger'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label
                                for="FeedChanger_die_error"><?php _e('Error messages when feed is disabled', 'FeedChanger'); ?></label>
                    </th>
                    <td>
                        <input type="text" id="FeedChanger_die_error"
                               value="<?php echo esc_attr($feedChanger_opt['settings']['FeedChanger_die_error']); ?>"
                               name="FeedChanger_die_error">
                        <p class="description"><?php _e('enable new custom feed?', 'FeedChanger'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label
                                for="FeedChanger_feed_string"><?php _e('Secret Feed String', 'FeedChanger'); ?></label>
                    </th>
                    <td>
                        <input type="text" id="FeedChanger_feed_string" name="FeedChanger_feed_string"
                               value="<?php echo esc_attr($feedChanger_opt['settings']['FeedChanger_feed_string']); ?>">
                        <p class="description">
                            <?php
                            _e('a secret text', 'FeedChanger');
                            if (isset($feedChanger_opt['settings']['FeedChanger_feed_string']) && !empty($feedChanger_opt['settings']['FeedChanger_feed_string']) && $feedChanger_opt['settings']['FeedChanger_changed_feed_enable'] == 'yes') {
                                $site_url = rtrim(site_url(), '/');
                                $secretKey = $feedChanger_opt['settings']['FeedChanger_feed_string'] ?? '';

                                echo ' , ';
                                echo __('your custom feed url is', 'FeedChanger') . ':<br>';
                                echo '<span class="new-feed-url">';
                                $mainFeed = $site_url . '/?feed=rss&feedChanger=' . $secretKey;
                                $CommentsFeed = $site_url . '/?feed=comments-rss&feedChanger=' . $secretKey;

                                echo feedChanger_wp_kses(":<br>");
                                _e('RSS');
                                echo feedChanger_wp_kses(":<br>");

                                echo feedChanger_wp_kses("<a href='" . esc_url($mainFeed) . "' target='_blank'>" . esc_url($mainFeed) . "</a>");
                                echo feedChanger_wp_kses("<br>");
                                echo feedChanger_wp_kses("<a href='" . esc_url($CommentsFeed) . "' target='_blank'>" . esc_url($CommentsFeed) . "</a>");
                                $mainFeed = $site_url . '/?feed=atom&feedChanger=' . $secretKey;
                                $CommentsFeed = $site_url . '/?feed=comments-atom&feedChanger=' . $secretKey;

                                echo feedChanger_wp_kses(":<br>");
                                _e('Atom');
                                echo feedChanger_wp_kses(":<br>");

                                echo feedChanger_wp_kses("<a href='" . esc_url($mainFeed) . "' target='_blank'>" . esc_url($mainFeed) . "</a>");
                                echo feedChanger_wp_kses("<br>");
                                echo feedChanger_wp_kses("<a href='" . esc_url($CommentsFeed) . "' target='_blank'>" . esc_url($CommentsFeed) . "</a>");
                                $mainFeed = $site_url . '/?feed=rdf&feedChanger=' . $secretKey;
                                $CommentsFeed = $site_url . '/?feed=comments-rdf&feedChanger=' . $secretKey;

                                echo feedChanger_wp_kses(":<br>");
                                _e('RDF');
                                echo feedChanger_wp_kses(":<br>");

                                echo feedChanger_wp_kses("<a href='" . esc_url($mainFeed) . "' target='_blank'>" . esc_url($mainFeed) . "</a>");
                                echo feedChanger_wp_kses("<br>");
                                echo feedChanger_wp_kses("<a href='" . esc_url($CommentsFeed) . "' target='_blank'>" . esc_url($CommentsFeed) . "</a>");

                                echo '</span>';
                            }
                            ?>

                        </p>
                    </td>
                </tr>

            </table>
            <input type="submit" class="button-primary" name="FeedChanger_button-primary"
                   value="<?php _e('submit', 'FeedChanger'); ?>">
        </form>
        <?php
        echo '</div>';
        echo '</div>';

    }


}

$theme_options = new FeedChanger_Options();
