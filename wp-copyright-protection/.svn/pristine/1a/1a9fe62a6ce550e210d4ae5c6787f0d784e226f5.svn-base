<?php
/**
 * Settings.
 *
 * @author dligthart
 * @package wpcp
 * @subpackage view
 * @version 1.0
 */
?>
<div class="wrap">
    <form method="post" action="options.php">
        <?php settings_fields('wpcp-group'); ?>

        <h2><?php _e('WP-Copyright-Protection', 'wpcp'); ?></h2>

        <table class="form-table">
            <tr valign="top">
                <th scope="row"><?php _e('Exclude Pages', 'wpcp'); ?></th>

                <td><input type="text" name="wpcp_exclude_pages"
                           value="<?php echo get_option('wpcp_exclude_pages'); ?>"/>
                    <p><?php _e('Enter page ids: comma-separated. e.g. 1,2,3,4', 'wpcp'); ?></td>

            </tr>
            <tr>
                <th scope="row"><?php _e('Disable for registered users', 'wpcp'); ?></th>
                <td>
                    <input type="checkbox" name="wpcp_disable_for_regusers"
                           value="1" <?php if (get_option('wpcp_disable_for_regusers')) {
                        echo 'checked="checked"';
                    } ?>/>
                    <p><?php _e('Toggle', 'wpcp'); ?></p>
                </td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>

<section class="wpcp-footer">
    <article>
        <header>
            <h2>Thank you for using this plugin!</h2>
            <h3> Are you in need of custom wordpress development?</h3>
        </header>
        <p>
            Send an email to <a href="mailto:dave@lightheart.tech">Dave @ Lightheart Technology</a> 
        </p>
        <ul>
            <li>Bespoke</li>
            <li><strong>Affordable</strong></li>
            <li>Professional</li>
            <li>Highly Experienced</li>
            <li>WordPress Development</li>
            <li>and more</li>
        </ul>
    </article>
</section>