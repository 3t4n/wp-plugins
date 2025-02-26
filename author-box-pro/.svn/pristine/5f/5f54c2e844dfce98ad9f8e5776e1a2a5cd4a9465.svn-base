<!--PERMISSION START-->
<div class="mb-l-permission">
    <h2><?php _e('Permission', 'author-box-pro'); ?></h2>
    <p><?php _e('Manage user permission for author box user fields access', 'author-box-pro'); ?>.</p>
    <h3><?php _e('User Roles', 'author-box-pro'); ?></h3>
    <?php
    $mbroles = array('role-administrator', 'role-editor', 'role-author', 'role-contributer', 'role-subscriber');
    if (!empty($mbroles)) {
        ?>
        <?php foreach ($mbroles as $mbrole) { ?>
            <div class="mb-l-form st-clear-after">
                <div class="mb-l-form--head mb-st-grid-4">
                    <h4><?php echo ucfirst(substr($mbrole,5,strlen($mbrole))); ?></h4>
                </div>
                <div class="mb-l-form--body mb-st-grid-4">
                    <input type="checkbox" name="mb-author-box-pro-get-setting-group[<?php echo $mbrole; ?>]" value="on" <?php checked((isset($mbPluginABoptions[$mbrole])?$mbPluginABoptions[$mbrole]:''), 'on'); ?>> <?php _e('Display', 'author-box-pro'); ?>
                </div>
                <div class="mb-l-form--foot mb-st-grid-4">
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>
<!--PERMISSION END-->