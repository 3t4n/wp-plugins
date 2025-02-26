<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

/* Add Tabs to Content Analysis */
add_action('rankology_ca_before', 'rankology_fno_ca_before');
function rankology_fno_ca_before()
{
    ?>
    <div class="col-right">

        <?php
        if ('post' == get_post_type() || 'product' == get_post_type()) { ?>

            <p>
                <?php global $post; ?>
                <?php $rankology_google_suggest_kw = get_post_meta($post->ID, '_rankology_google_suggest_kw', true); ?>
                <label for="rankology_google_suggest_kw_meta">
                    <?php esc_html_e('Google suggestions', 'wp-rankology'); ?>
                    <?php echo rankology_tooltip(__('Google suggestions', 'wp-rankology'), __('Enter a keyword, or a phrase, to find the top 10 Google suggestions instantly. This is useful if you want to work with the long tail technique.', 'wp-rankology'), esc_html('my super keyword,another keyword,keyword')); ?>
                </label>
                <input id="rankology_google_suggest_kw_meta" type="text" name="rankology_google_suggest_kw"
                       placeholder="<?php esc_html_e('Get suggestions from Google', 'wp-rankology'); ?>"
                       aria-label="Google suggestions" value=" <?php if (isset($rankology_google_suggest_kw)) {
                    echo $rankology_google_suggest_kw;
                } ?>">
                <span class="description"><?php esc_html_e('Click on a suggestion below to add it as a target keyword.', 'wp-rankology'); ?></span>
            </p>
            <button id="rankology_get_suggestions" type="button"
                    class="<?php echo rankology_btn_secondary_classes(); ?>">
                <?php esc_html_e('Get suggestions!', 'wp-rankology'); ?>
            </button>

            <ul id='rankology_suggestions'></ul>
        <?php if ('' != get_locale()) {
            $locale = substr(get_locale(), 0, 2);
            $country_code = substr(get_locale(), -2);
        } else {
            $locale = 'en';
            $country_code = 'US';
        } ?>
            <script>
                jQuery('#rankology_get_suggestions').on('click', function (data) {
                    data.preventDefault();

                    document.getElementById('rankology_suggestions').innerHTML = '';

                    var kws = jQuery('#rankology_google_suggest_kw_meta').val();

                    if (kws) {
                        var script = document.createElement('script');
                        script.src =
                            'https://www.google.com/complete/search?client=firefox&format=rich&hl=<?php echo $locale; ?>&q=' +
                            kws +
                            '&gl=<?php echo $country_code; ?>&callback=rankology_google_suggest';
                        document.body.appendChild(script);
                    }
                });
            </script>
            <?php
        } else {
           // echo 'this is page';
        } ?>
    </div>
    <?php
}