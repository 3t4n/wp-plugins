<div class=wrap>
    <div class="icon32" id="icon-edit"><br /></div>
    <h2><?php _e("Anticopy options", 'anticopy') ?></h2>
    <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
        <div class="postbox " id="postexcerpt">
            <h3><?php _e('Prevent from printing ?', 'anticopy') ?></h3>
            <div class="inside">
                <p>
                    <label for="devloungeHeader_yes">
                        <input type="radio" name="antiprint_enabled" value="true" <?php if ($options['antiprint_enabled'] == "true") {  print ' checked="checked"'; } ?> /><?php _e('Yes', 'anticopy') ?>
                    </label>
                    <label for="devloungeHeader_no">
                        <input type="radio" name="antiprint_enabled" value="false" <?php if ($options['antiprint_enabled'] == "false") { print ' checked="checked"';} ?>/><?php _e('No', 'anticopy') ?>
                    </label>
                </p>
            </div>
        </div>
       <div class="postbox " id="postexcerpt">
            <h3><?php _e('Prevent from copying ?', 'anticopy') ?></h3>
            <div class="inside">
                <p>
                    <label for="devloungeHeader_yes">
                        <input type="radio" name="anticopy_enabled" value="true" <?php if ($options['anticopy_enabled'] == "true") {  print ' checked="checked"'; } ?> /><?php _e('Yes', 'anticopy') ?>
                    </label>
                    <label for="devloungeHeader_no">
                        <input type="radio" name="anticopy_enabled" value="false" <?php if ($options['anticopy_enabled'] == "false") { print ' checked="checked"';} ?>/><?php _e('No', 'anticopy') ?>
                    </label>
                </p>
            </div>
        </div>
        <div class="submit">
            <input type="submit" class="button action" name="update_wp_anticopy" value="<?php _e('Update settings', 'anticopy') ?>" />
        </div>
</div>