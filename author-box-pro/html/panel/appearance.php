<!--APPEARANCE START-->
<div class="mb-l-appearance">
    <h2><?php _e('Appearance', 'author-box-pro'); ?></h2>
    <p><?php _e('Change author box color to match your theme', 'author-box-pro'); ?>.</p>

    <h3><?php _e('Box', 'author-box-pro'); ?></h3>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Shadow', 'author-box-pro'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="checkbox" name="mb-author-box-pro-get-setting-group[box-shadow]" value="on" <?php checked(isset($mbPluginABoptions['box-shadow']) ? $mbPluginABoptions['box-shadow'] : '', 'on'); ?>> <?php _e('Display', 'author-box-pro'); ?>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>
    <?php
    $avatarStyles = array('no', 'border-radius-small', 'border-radius-middle', 'border-radius-large');
    if (!empty($avatarStyles)) {
        ?>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-3">
                <h4><?php _e('Border Radius', 'author-box-pro'); ?></h4>
            </div>
            <div class="mb-l-form--body mb-st-grid-3">
                <select name="mb-author-box-pro-get-setting-group[box-radius]" class="mb-l-form--select">
                    <?php foreach ($avatarStyles as $avatarStyle) { ?>
                        <option value="<?php echo strtolower($avatarStyle); ?>" <?php selected(isset($mbPluginABoptions['box-radius']) ? $mbPluginABoptions['box-radius'] : '', $avatarStyle); ?>><?php echo ucfirst($avatarStyle); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-l-form--foot mb-st-grid-3">
            </div>
        </div>
    <?php } ?>

    <h3><?php _e('Avatar', 'author-box-pro'); ?></h3>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Profile Picture', 'author-box-pro'); ?></h4>
            <small>(Avatar)</small>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <a href="profile.php#mb-author-box-pro-settings"><?php _e('Upload your Profile Picture', 'author-box-pro'); ?></a><br />
            <small><?php _e('With Gravatar or without Gravatar', 'author-box-pro'); ?>.</small>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Avatar', 'author-box-pro'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="checkbox" name="mb-author-box-pro-get-setting-group[avatar]" value="on" <?php checked(isset($mbPluginABoptions['avatar']) ? $mbPluginABoptions['avatar'] : '', 'on'); ?>> <?php _e('Display', 'author-box-pro'); ?>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>
    <?php
    $avatarStyles = array('circle', 'square');
    if (!empty($avatarStyles)) {
        ?>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-3">
                <h4><?php _e('Style', 'author-box-pro'); ?></h4>
            </div>
            <div class="mb-l-form--body mb-st-grid-3">
                <select name="mb-author-box-pro-get-setting-group[avatar-style]" class="mb-l-form--select">
                    <?php foreach ($avatarStyles as $avatarStyle) { ?>
                        <option value="<?php echo strtolower($avatarStyle); ?>" <?php selected(isset($mbPluginABoptions['avatar-style']) ? $mbPluginABoptions['avatar-style'] : '', $avatarStyle); ?>><?php echo ucfirst($avatarStyle); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-l-form--foot mb-st-grid-3">
            </div>
        </div>
    <?php } ?>
    <?php
    $avatarStyles = array('no', 'border-small', 'border-middle', 'border-big');
    if (!empty($avatarStyles)) {
        ?>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-3">
                <h4><?php _e('Border', 'author-box-pro'); ?></h4>
            </div>
            <div class="mb-l-form--body mb-st-grid-3">
                <select name="mb-author-box-pro-get-setting-group[avatar-border]" class="mb-l-form--select">
                    <?php foreach ($avatarStyles as $avatarStyle) { ?>
                        <option value="<?php echo strtolower($avatarStyle); ?>" <?php selected(isset($mbPluginABoptions['avatar-border']) ? $mbPluginABoptions['avatar-border'] : '', $avatarStyle); ?>><?php echo ucfirst($avatarStyle); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-l-form--foot mb-st-grid-3">
            </div>
        </div>
    <?php } ?>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Shadow', 'author-box-pro'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="checkbox" name="mb-author-box-pro-get-setting-group[avatar-shadow]" value="shadow" <?php checked(isset($mbPluginABoptions['avatar-shadow']) ? $mbPluginABoptions['avatar-shadow'] : '', 'shadow'); ?>> <?php _e('Display', 'author-box-pro'); ?>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>

    <h3><?php _e('Contact', 'author-box-pro'); ?></h3>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('E-Mail-Address', 'author-box-pro'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="checkbox" name="mb-author-box-pro-get-setting-group[mail]" value="on" <?php checked(isset($mbPluginABoptions['mail']) ? $mbPluginABoptions['mail'] : '', 'on'); ?>> <?php _e('Display', 'author-box-pro'); ?>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <input type="checkbox" name="mb-author-box-pro-get-setting-group[mail-to]" value="on" <?php checked(isset($mbPluginABoptions['mail-to']) ? $mbPluginABoptions['mail-to'] : '', 'on'); ?>> <?php _e('Activate as mailto', 'author-box-pro'); ?>
            <input type="text" name="mb-author-box-pro-get-setting-group[mail-subject]" placeholder="Subject" value="<?php echo (isset($mbPluginABoptions['mail-subject']) ? $mbPluginABoptions['mail-subject'] : ''); ?>" class="mb-l-form--input">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <?php
            if (!get_the_author_meta('ID')) {
                $userID = get_current_user_id();
            } else {
                $userID = get_the_author_meta('ID');
            }
            $userMail = get_the_author_meta('user_email', $userID);
            if (!$userMail) {
                echo '<span class="mb-l-form--alert-small-success"></span> ';
                echo '<small>';
                _e('E-Mail-Address in the contactinfo is missing', 'author-box-pro');
                echo '</small>';
            } else {
                echo '<span class="mb-l-form--alert-small-error"></span> ';
                echo '<small>';
                _e('E-Mail-Address in the contactinfo is available', 'author-box-pro');
                echo '</small>';
            }
            ?>
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Website', 'author-box-pro'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="checkbox" name="mb-author-box-pro-get-setting-group[website]" value="on" <?php checked(isset($mbPluginABoptions['website']) ? $mbPluginABoptions['website'] : '', 'on'); ?>> <?php _e('Display', 'author-box-pro'); ?>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <input type="checkbox" name="mb-author-box-pro-get-setting-group[website-link]" value="on" <?php checked(isset($mbPluginABoptions['website-link']) ? $mbPluginABoptions['website-link'] : '', 'on'); ?>> <?php _e('Activate as link', 'author-box-pro'); ?> <br>
            <input type="checkbox" name="mb-author-box-pro-get-setting-group[website-blank]" value="on" <?php checked(isset($mbPluginABoptions['website-blank']) ? $mbPluginABoptions['website-blank'] : '', 'on'); ?>> <?php _e('Open in new window', 'author-box-pro'); ?>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <?php
            if (!get_the_author_meta('ID')) {
                $userID = get_current_user_id();
            } else {
                $userID = get_the_author_meta('ID');
            }
            $userMail = get_the_author_meta('user_url', $userID);
            if (!$userMail) {
                echo '<span class="mb-l-form--alert-small-success"></span> ';
                echo '<small>';
                _e('Website URL in the contactinfo is missing', 'author-box-pro');
                echo '</small>';
            } else {
                echo '<span class="mb-l-form--alert-small-error"></span> ';
                echo '<small>';
                _e('Website URL in the contactinfo is available', 'author-box-pro');
                echo '</small>';
            }
            ?>
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Phonenumber', 'author-box-pro'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="checkbox" name="mb-author-box-pro-get-setting-group[phonenumber]" value="on" <?php checked(isset($mbPluginABoptions['phonenumber']) ? $mbPluginABoptions['phonenumber'] : '', 'on'); ?>> <?php _e('Display', 'author-box-pro'); ?>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <input type="checkbox" name="mb-author-box-pro-get-setting-group[phonenumber-call]" value="on" <?php checked(isset($mbPluginABoptions['phonenumber-call']) ? $mbPluginABoptions['phonenumber-call'] : '', 'on'); ?>> <?php _e('Activate as callto', 'author-box-pro'); ?>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <?php
            if (!get_the_author_meta('ID')) {
                $userID = get_current_user_id();
            } else {
                $userID = get_the_author_meta('ID');
            }
            $userMail = get_the_author_meta('phonenumber', $userID);
            if (!$userMail) {
                echo '<span class="mb-l-form--alert-small-success"></span> ';
                echo '<small>';
                _e('Phonenumber in the contactinfo is missing', 'author-box-pro');
                echo '</small>';
            } else {
                echo '<span class="mb-l-form--alert-small-error"></span> ';
                echo '<small>';
                _e('Phonenumber in the contactinfo is available', 'author-box-pro');
                echo '</small>';
            }
            ?>
        </div>
    </div>

    <h3><?php _e('Theme', 'author-box-pro'); ?></h3>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Admin Color Sheme', 'author-box-pro'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="checkbox" name="mb-author-box-pro-get-setting-group[color]" value="on" <?php checked(isset($mbPluginABoptions['color']) ? $mbPluginABoptions['color'] : '', 'on'); ?>> <?php _e('Display', 'author-box-pro'); ?>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <a href="profile.php"><?php _e('Choose your Color Sheme', 'author-box-pro'); ?></a><br />
            <?php
            /**
             * Detect plugin. For use in Admin area only.
             */
            if (is_plugin_active('admin-color-schemer/admin-color-schemer.php')) {
                // plugin is activated
                ?><small><?php _e('For more Color Shemes', 'author-box-pro'); ?> <a href="tools.php?page=admin-color-schemer"><?php _e('click here', 'author-box-pro'); ?></a>, <?php _e('and create your own custom color sheme with the WordPress Core Team plugin', 'author-box-pro'); ?>.</small><?php
            } else {
                ?><small><?php _e('For more Color Shemes', 'author-box-pro'); ?> <a href="plugin-install.php?s=Admin+Color+Schemer&tab=search&type=term"><?php _e('click here', 'author-box-pro'); ?></a>, <?php _e('install and create your own custom color sheme with the WordPress Core Team plugin', 'author-box-pro'); ?>.</small><?php
            }
            ?>
        </div>
    </div>
    <?php
    $boxThemes = array('no', 'yello', 'melibu');
    if (!empty($boxThemes)) {
        ?>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-3">
                <h4><?php _e('Layout', 'author-box-pro'); ?></h4>
            </div>
            <div class="mb-l-form--body mb-st-grid-3">
                <select name="mb-author-box-pro-get-setting-group[box-theme]" class="mb-l-form--select">
                    <?php foreach ($boxThemes as $boxTheme) { ?>
                        <option value="<?php echo strtolower($boxTheme); ?>" <?php selected(isset($mbPluginABoptions['box-theme']) ? $mbPluginABoptions['box-theme'] : '', $boxTheme); ?>><?php echo ucfirst($boxTheme); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-l-form--foot mb-st-grid-3">
            </div>
        </div>
    <?php } ?>

</div>
<!--APPEARANCE END-->