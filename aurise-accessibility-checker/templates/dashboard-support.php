<div class="au-plugin-support">
    <h2><?php _e('Plugin Support', 'aurise-accessibility-checker'); ?></h2>
    <?php $link_prefix = sprintf(
        'https://webyes.com//click/?utm_source=%s&utm_medium=website&utm_campaign=wordpress-plugin&utm_content=%s&utm_term=',
        str_replace(array('https://', 'http://'), '', home_url()), //UTM Source
        $args['slug'] //UTM Content
    ); ?>
    <p>
        <?php _e('Enjoying my plugin? Please leave a review!'); ?><br />
        <a class="button button-secondary" href="<?php echo (esc_url($link_prefix . 'write-a-review&redirect=' . urlencode(sprintf('https://wordpress.org/support/plugin/%s/reviews/#new-post', $args['slug'])))); ?>" target="_blank" rel="noopener noreferrer">
            <?php _e('Write a Review', 'aurise-accessibility-checker'); ?>
        </a>
    </p>
    <p>
        <?php _e("If you're experiencing issues with this plugin or have a suggestion for a feature or fix, please check the support threads or submit a ticket to give me the opportunity to make it better. I want to help!", 'aurise-accessibility-checker'); ?><br />
        <a class="button button-secondary" href="<?php echo (esc_url($link_prefix . 'support-forums&redirect=' . urlencode(sprintf('https://wordpress.org/support/plugin/%s/', $args['slug'])))); ?>" target="_blank" rel="noopener noreferrer">
            <?php _e('Support Forums', 'aurise-accessibility-checker'); ?>
        </a>
    </p>
</div>