<!--DISPLAY START-->
<div class="mb-l-display">
    <h2><?php _e('Display', 'author-box-pro'); ?></h2>
    <p><?php _e('Select where you want the author box to appear on your posts, pages and custom posts', 'author-box-pro'); ?>.</p>
    <h3><?php _e('Show on', 'author-box-pro'); ?></h3>
    <?php
    global $MB_AUTHOR_BOX_HELPER;
    if (is_array($MB_AUTHOR_BOX_HELPER->post_types())) {
        foreach ($MB_AUTHOR_BOX_HELPER->post_types() as $post_type) {
            ?>
            <div class="mb-l-form st-clear-after">
                <div class="mb-l-form--head mb-st-grid-4">
                    <h4><?php echo ucfirst($post_type . 's'); ?></h4>
                </div>
                <div class="mb-l-form--body mb-st-grid-4">
                    <select name="mb-author-box-pro-get-setting-group[<?php echo $post_type; ?>]"  class="mb-l-form--select">
                        <option value='no' <?php selected((isset($mbPluginABoptions[$post_type])?$mbPluginABoptions[$post_type]:''), 'no'); ?>><?php _e('No', 'author-box-pro'); ?></option>
                        <option value='above' <?php selected((isset($mbPluginABoptions[$post_type])?$mbPluginABoptions[$post_type]:''), 'above'); ?>><?php _e('Above', 'author-box-pro'); ?></option>
                        <option value='below' <?php selected((isset($mbPluginABoptions[$post_type])?$mbPluginABoptions[$post_type]:''), 'below'); ?>><?php _e('Below', 'author-box-pro'); ?></option>
                    </select>
                </div>
                <div class="mb-l-form--foot mb-st-grid-4">
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>
<!--DISPLAY END-->