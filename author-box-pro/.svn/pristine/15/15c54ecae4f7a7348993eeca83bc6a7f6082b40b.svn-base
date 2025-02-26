<!--SOCIAL START-->
<div class="mb-l-social">
    <h2><?php _e('Social', 'author-box-pro'); ?></h2>
    <p><?php _e('Select social profiles you want to show on the author box', 'author-box-pro'); ?>.</p>
    <?php
    /**
     * Detect plugin. For use on Front End only.
     */
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    // check for plugin using plugin name
    if (is_plugin_active('sharing-social-safe/sharing-social-safe.php')) {
        ?>
        <h3><?php _e('Social Networks', 'author-box-pro'); ?></h3>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-4">
                <h4><?php _e('Social', 'author-box-pro'); ?></h4>
            </div>
            <div class="mb-l-form--body mb-st-grid-4">
                <input type="checkbox" name="mb-author-box-pro-get-setting-group[social]" value="on" <?php checked((isset($mbPluginABoptions['social']) ? $mbPluginABoptions['social'] : ''), 'on'); ?>> <?php _e('Display social', 'author-box-pro'); ?><br>
                <small><?php _e('Please fill first your Social Profile', 'author-box-pro'); ?> <a href="profile.php"><?php _e('Contact Info', 'author-box-pro'); ?></a>.</small>
            </div>
            <div class="mb-l-form--foot mb-st-grid-4">
                <?php _e('This setting shows or hides all social networks, but the network you want to display below must also be clicked at the bottom', 'author-box-pro'); ?>
            </div>
        </div>

        <?php
        $mbsocials = array('facebook', 'googleplus', 'twitter', 'flickr', 'pinterest', 'youtube', 'github', 'tumblr', 'soundcloud', 'skype', 'xing', 'instagram', 'whatsapp', 'jsfiddle', 'snapchat', 'linkedin');
        if (!empty($mbsocials)) {
            ?>
            <?php foreach ($mbsocials as $mbsocial) { ?>
                <div class="mb-l-form st-clear-after">
                    <div class="mb-l-form--head mb-st-grid-4">
                        <h4><?php echo ucfirst($mbsocial); ?></h4>
                    </div>
                    <div class="mb-l-form--body mb-st-grid-4">
                        <input type="checkbox" name="mb-author-box-pro-get-setting-group[<?php echo $mbsocial; ?>]" value="<?php echo $mbsocial; ?>" <?php checked((isset($mbPluginABoptions[$mbsocial]) ? $mbPluginABoptions[$mbsocial] : ''), $mbsocial); ?>> <?php _e('Display', 'author-box-pro'); ?>
                    </div>
                    <div class="mb-l-form--foot mb-st-grid-4">
                        <?php
                        if (!get_the_author_meta('ID')) {
                            $userID = get_current_user_id();
                        } else {
                            $userID = get_the_author_meta('ID');
                        }
                        $userSocial = get_the_author_meta($mbsocial, $userID);
                        if (!$userSocial) {
                            echo '<span class="mb-l-form--alert-small-success"></span> ';
                            echo '<small>';
                            _e('Link (URL) in the contactinfo is missing', 'author-box-pro');
                            echo '</small>';
                        } else {
                            echo '<span class="mb-l-form--alert-small-error"></span> ';
                            echo '<small>';
                            _e('Link (URL) in the contactinfo is available', 'author-box-pro');
                            echo '</small>';
                        }
                        ?>
                    </div>
                </div>
            <?php } ?>
            <?php
        }
    } else {
        ?>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-4">
                <h4><?php _e('Social upgrade', 'author-box-pro'); ?></h4>
            </div>
            <div class="mb-l-form--body mb-st-grid-4">
                <?php
                $plugininfo = $MB_AUTHOR_BOX_HELPER->check_plugin('sharing-social-safe/sharing-social-safe.php');
                if ($plugininfo['plugin-installed'] == false) {
                    ?>
                    <small><?php _e('Install Social Plugin', 'author-box-pro'); ?> <a href="plugin-install.php?s=melibu+wp+social+share+safe&tab=search&type=term"><?php _e('click here', 'author-box-pro'); ?></a>, <?php _e('install and use Social', 'author-box-pro'); ?>.</small>
                    <?php
                } else if ($plugininfo['plugin-active'] == false) {
                    ?>
                    <small><?php _e('Activate Social Plugin', 'author-box-pro'); ?> <a href="plugins.php"><?php _e('click here', 'author-box-pro'); ?></a>, <?php _e('activate and use Social', 'author-box-pro'); ?>.</small>
                <?php } ?>
            </div>
            <div class="mb-l-form--foot mb-st-grid-4">
            </div>
        </div>
    <?php } ?>
</div>
<!--SOCIAL END-->