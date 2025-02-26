<!--TABS START-->
<div class="mb-l-tabs">
    <h2><?php _e('Tabs', 'author-box-pro'); ?></h2>
    <p><?php _e('Globally set which tab you want to display on the author box', 'author-box-pro'); ?>.</p>

    <h3><?php _e('Tabs', 'author-box-pro'); ?></h3>
    <?php
    $tabStyles = array('left-slide', 'right-slide', 'top-slide', 'bottom-slide');
    if (!empty($tabStyles)) {
        ?>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-3">
                <h4><?php _e('Tabs change', 'author-box-pro'); ?></h4>
            </div>
            <div class="mb-l-form--body mb-st-grid-3">
                <select name="mb-author-box-pro-get-setting-group[tab-change]" class="mb-l-form--select">
                    <?php foreach ($tabStyles as $tabStyle) { ?>
                        <option value="<?php echo strtolower($tabStyle); ?>" <?php selected(isset($mbPluginABoptions['tab-change']) ? $mbPluginABoptions['tab-change'] : '', $tabStyle); ?>><?php echo ucfirst($tabStyle); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-l-form--foot mb-st-grid-3">
            </div>
        </div>
    <?php } ?>

    <h3><?php _e('About Tab', 'author-box-pro'); ?></h3>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('About', 'author-box-pro'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="checkbox" name="mb-author-box-pro-get-setting-group[about]" value="on" <?php checked((isset($mbPluginABoptions['about']) ? $mbPluginABoptions['about'] : ''), 'on'); ?>> <?php _e('Display', 'author-box-pro'); ?>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('About Label', 'author-box-pro'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="text" name="mb-author-box-pro-get-setting-group[about-label]" value="<?php echo isset($mbPluginABoptions['about-label']) ? $mbPluginABoptions['about-label'] : ''; ?>" class="mb-l-form--input">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('About Title', 'author-box-pro'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="text" name="mb-author-box-pro-get-setting-group[about-title]" value="<?php echo isset($mbPluginABoptions['about-title']) ? $mbPluginABoptions['about-title'] : ''; ?>" class="mb-l-form--input">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>

    <h3><?php _e('Contact Tab', 'author-box-pro'); ?></h3>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Contact', 'author-box-pro'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="checkbox" name="mb-author-box-pro-get-setting-group[contact]" value="on" <?php checked(isset($mbPluginABoptions['contact']) ? $mbPluginABoptions['contact'] : '', 'on'); ?>> <?php _e('Display', 'author-box-pro'); ?>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Contact Label', 'author-box-pro'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="text" name="mb-author-box-pro-get-setting-group[contact-label]" value="<?php echo isset($mbPluginABoptions['contact-label']) ? $mbPluginABoptions['contact-label'] : ''; ?>" class="mb-l-form--input">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Contact Title', 'author-box-pro'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="text" name="mb-author-box-pro-get-setting-group[contact-title]" value="<?php echo isset($mbPluginABoptions['contact-title']) ? $mbPluginABoptions['contact-title'] : ''; ?>" class="mb-l-form--input">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>

    <h3><?php _e('Latest Posts Tab', 'author-box-pro'); ?></h3>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Latest Posts', 'author-box-pro'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="checkbox" name="mb-author-box-pro-get-setting-group[latestposts]" value="on" <?php checked((isset($mbPluginABoptions['latestposts']) ? $mbPluginABoptions['latestposts'] : ''), 'on'); ?>> <?php _e('Display', 'author-box-pro'); ?>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Latest Posts Label', 'author-box-pro'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="text" name="mb-author-box-pro-get-setting-group[latestposts-label]" value="<?php echo isset($mbPluginABoptions['latestposts-label']) ? $mbPluginABoptions['latestposts-label'] : ''; ?>" class="mb-l-form--input">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Latest Posts Title', 'author-box-pro'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="text" name="mb-author-box-pro-get-setting-group[latestposts-title]" value="<?php echo isset($mbPluginABoptions['latestposts-title']) ? $mbPluginABoptions['latestposts-title'] : ''; ?>" class="mb-l-form--input">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Number of Latest Posts', 'author-box-pro'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="number" min="1" step="1" name="mb-author-box-pro-get-setting-group[latestposts-number]" placeholder="0" value="<?php echo isset($mbPluginABoptions['latestposts-number']) ? $mbPluginABoptions['latestposts-number'] : ''; ?>" class="mb-l-form--input">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Latest Posts Date', 'author-box-pro'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="checkbox" name="mb-author-box-pro-get-setting-group[latestposts-date]" value="on" <?php checked((isset($mbPluginABoptions['latestposts-date']) ? $mbPluginABoptions['latestposts-date'] : ''), 'on'); ?>> <?php _e('Display', 'author-box-pro'); ?>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Latest Posts Time', 'author-box-pro'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="checkbox" name="mb-author-box-pro-get-setting-group[latestposts-time]" value="on" <?php checked((isset($mbPluginABoptions['latestposts-time']) ? $mbPluginABoptions['latestposts-time'] : ''), 'on'); ?>> <?php _e('Display', 'author-box-pro'); ?>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Latest Posts Comments', 'author-box-pro'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="checkbox" name="mb-author-box-pro-get-setting-group[latestposts-comments]" value="on" <?php checked((isset($mbPluginABoptions['latestposts-comments']) ? $mbPluginABoptions['latestposts-comments'] : ''), 'on'); ?>> <?php _e('Display', 'author-box-pro'); ?>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>

    <h3><?php _e('Other Tab', 'author-box-pro'); ?></h3>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Other', 'author-box-pro'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="checkbox" name="mb-author-box-pro-get-setting-group[other]" value="on" <?php checked(isset($mbPluginABoptions['other']) ? $mbPluginABoptions['other'] : '', 'on'); ?>> <?php _e('Display', 'author-box-pro'); ?>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Other Label', 'author-box-pro'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="text" name="mb-author-box-pro-get-setting-group[other-label]" value="<?php echo isset($mbPluginABoptions['other-label']) ? $mbPluginABoptions['other-label'] : ''; ?>" class="mb-l-form--input">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Other Title', 'author-box-pro'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="text" name="mb-author-box-pro-get-setting-group[other-title]" value="<?php echo isset($mbPluginABoptions['other-title']) ? $mbPluginABoptions['other-title'] : ''; ?>" class="mb-l-form--input">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Description', 'author-box-pro'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-9">
            <?php
            $content = '';
            if (isset($mbPluginABoptions['other-text']) && !empty($mbPluginABoptions['other-text'])) {
                $content = $mbPluginABoptions['other-text'];
            }
            $args = array(
                'textarea_name' => 'mb-author-box-pro-get-setting-group[other-text]'
            );
            wp_editor(html_entity_decode($content, ENT_QUOTES, 'UTF-8'), 'mb-author-box-pro-get-setting-group', $args);
            ?>
        </div>
    </div>

</div>
<!--TABS END-->