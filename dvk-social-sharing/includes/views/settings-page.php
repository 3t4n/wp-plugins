<?php

defined('DVKSS_VERSION') or exit;

$networks = array(
    'twitter' => 'Twitter',
    'facebook' => 'Facebook',
    'linkedin' => 'LinkedIn',
);

?><div id="dvkss" class="wrap">
    <div class="dvkss-container">
        <div class="dvkss-column dvkss-primary">

            <h1>Social Sharing</h1>

        <form id="dvkss_settings" method="post" action="options.php">
            <?php settings_fields( 'dvk_social_sharing' ); ?>

            <h2><?php esc_html_e('Settings'); ?></h2>

            <table class="form-table">

                <tr valign="top">
                    <th scope="row">
                        <?php esc_html_e('Text before links', 'dvk-social-sharing'); ?>
                    </th>
                    <td>
                        <input type="text" name="dvk_social_sharing[before_text]" id="dvkss_text" class="widefat" value="<?php echo esc_attr($opts['before_text']); ?>">
                        <p class="description"><?php esc_html_e('The text to show before the sharing links.', 'dvk-social-sharing'); ?></p>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">
                        <?php esc_html_e('Add to', 'dvk-social-sharing'); ?>
                    </th>
                    <td>
                        <ul>
                        <?php foreach( $post_types as $post_type_id => $post_type ) { ?>
                            <li>
                                <label>
                                    <input type="checkbox" name="dvk_social_sharing[auto_add_post_types][]" value="<?php echo esc_attr( $post_type_id ); ?>" <?php checked( in_array( $post_type_id, $opts['auto_add_post_types'] ), true ); ?>> <?php echo $post_type->labels->name; ?>
                                </label>
                            </li>
                        <?php } ?>
                        </ul>

                        <p class="description"><?php esc_html_e('Automatically adds the sharing links to the end of the selected post types.', 'dvk-social-sharing'); ?></p>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">
                        <?php esc_html_e('Social networks', 'dvk-social-sharing'); ?>
                    </th>
                    <td>
                        <ul>
                            <?php foreach( $networks as $network_slug => $network_name ) { ?>
                                <li>
                                    <label>
                                        <input type="checkbox" name="dvk_social_sharing[social_options][]" value="<?php echo esc_attr( $network_slug ); ?>" <?php checked( in_array( $network_slug, $opts['social_options'] ), true ); ?>> <?php echo $network_name; ?>
                                    </label>
                                </li>
                            <?php } ?>
                        </ul>

                        <p class="description"><?php esc_html_e('Show these social network options.', 'dvk-social-sharing'); ?></p>
                    </td>
                </tr>

                <tr valign="top" class="row-load-icon-css">
                    <th scope="row">
                        <?php esc_html_e('Load icon stylesheet?', 'dvk-social-sharing'); ?>
                    </th>
                    <td>
                        <label><input type="radio" name="dvk_social_sharing[load_icon_css]" value="1" <?php checked($opts['load_icon_css'], 1); ?> > <?php esc_html_e('Yes'); ?></label> &nbsp;
                        <label><input type="radio" name="dvk_social_sharing[load_icon_css]" value="0" <?php checked($opts['load_icon_css'], 0); ?> > <?php esc_html_e('No'); ?></label>
                        <br>
                        <p class="description"><?php esc_html_e('Adds simple but pretty icons to the sharing links.', 'dvk-social-sharing'); ?></p>
                    </td>
                </tr>

                <tr valign="top" class="row-icon-size">
                    <th scope="row">
                        <label for="dvkss_icon_size"><?php esc_html_e('Icon size', 'dvk-social-sharing'); ?></label>
                    </th>
                    <td>
                        <select name="dvk_social_sharing[icon_size]" id="dvkss_icon_size" class="widefat">
                            <option value="16" <?php selected($opts['icon_size'], 16); ?> ><?php esc_html_e('Small', 'dvk-social-sharing'); ?> - 16x16 <?php esc_html_e( 'pixels', 'dvk-social-sharing' ); ?></option>
                            <option value="32" <?php selected($opts['icon_size'], 32); ?> ><?php esc_html_e('Normal', 'dvk-social-sharing'); ?> - 32x32 <?php esc_html_e( 'pixels', 'dvk-social-sharing' ); ?></option>
                            <option value="48" <?php selected($opts['icon_size'], 48); ?> ><?php esc_html_e('Large', 'dvk-social-sharing'); ?> - 48x48 <?php esc_html_e( 'pixels', 'dvk-social-sharing' ); ?></option>
                        </select>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">
                        <?php esc_html_e('Load pop-up JavaScript?', 'dvk-social-sharing'); ?>
                    </th>
                    <td>
                        <label><input type="radio" name="dvk_social_sharing[load_popup_js]" value="1" <?php checked($opts['load_popup_js'], 1); ?> > <?php esc_html_e('Yes'); ?></label> &nbsp;
                        <label><input type="radio" name="dvk_social_sharing[load_popup_js]" value="0" <?php checked($opts['load_popup_js'], 0); ?> > <?php esc_html_e('No'); ?></label>
                        <br>
                        <p class="description"><?php esc_html_e("A small JavaScript file of just 600 bytes so people won't have to leave your website to share.", 'dvk-social-sharing'); ?></p>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">
                        <label for="dvkss_twitter_username"><?php esc_html_e('Twitter username', 'dvk-social-sharing'); ?></label>
                    </th>
                    <td>
                        <input type="text" name="dvk_social_sharing[twitter_username]" id="dvkss_twitter_username" class="widefat" value="<?php echo esc_attr($opts['twitter_username']); ?>">
                        <p class="description"><?php esc_html_e('Set this if you want to append "via @yourtwitter" to tweets.', 'dvk-social-sharing'); ?></p>
                    </td>
                </tr>
            </table>

            <?php
                submit_button();
            ?>
        </form>
    </div>

    <?php /* start sidebar */ ?>
    <div class="dvkss-column dvkss-secondary">
        <div class="dvkss-box">
            <h3 class="dvkss-title">Enjoying this plugin?</h3>
            <p>If you like this plugin, consider supporting it in one the following ways.</p>

            <ul class="ul-square">
                <li><a href="https://wordpress.org/support/view/plugin-reviews/dvk-social-sharing?rate=5#postform">Write a plugin review on WordPress.org</a></li>
                <li>Write about this plugin on your blog</li>
                <li><a href="https://twitter.com/intent/tweet/?text=<?php echo urlencode('Need social sharing options for your WordPress site? This plugin is great: '); ?>&url=<?php echo urlencode('https://wordpress.org/plugins/dvk-social-sharing/'); ?>">Tweet about this plugin</a></li>
            </ul>

            <p>Or check out the following plugins by the same author.</p>
            <ul class="ul-square">
                <li>
                    <a href="https://wordpress.org/plugins/mailchimp-for-wp/">Mailchimp for WordPress</a><br />
                    The easiest way to connect your WordPress site to Mailchimp.
                </li>
                <li>
                    <a href="https://wordpress.org/plugins/koko-analytics/">Koko Analytics</a><br />
                    Privacy-friendly analytics for your WordPress site.
                </li>
                <li>
                    <a href="https://wordpress.org/plugins/boxzilla/">Boxzilla Pop-Ups</a><br />
                    Allows you to show pop-ups at just the right time.
                </li>
            </ul>
        </div>

        <div class="dvkss-box">
            <h3 class="dvkss-title">Looking for help?</h3>
            <p>If you need help with this plugin, please open a new topic on the <a href="https://wordpress.org/support/plugin/dvk-social-sharing">WordPress.org plugin support forums</a>.</p>
        </div>

        <div class="dvkss-box">
            <h3 class="dvkss-title">About the author</h3>
            <p>My name is Danny van Kooten, a programmer from The Netherlands.</p>
            <p>I've been developing plugins for WordPress since version 3.0, all the way back in 2010. I take pride in making simple but effective plugins, like this one right here.</p>
            <p>You can find more about me on <a href="https://www.dannyvankooten.com/">my personal website</a>.</p>
        </div>
        <?php /* end sidebar */ ?>

        <br style="clear:both; " />
    </div>
</div>

