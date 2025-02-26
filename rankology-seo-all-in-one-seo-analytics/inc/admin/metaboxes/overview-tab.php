<?php
/*
 * overview tabs
 */

?>
<div id="rankology_content_analysis" class="rankology-tab-width">

    <div id="rankology-ca-tabs-2">
        <p>
            <?php esc_html_e('Enter keywords for analysis and you can also use google suggestions to write optimized content.', 'wp-rankology'); ?>
        </p>
        <?php
        if ('post' == get_post_type() || 'product' == get_post_type()) { ?>

            <div class="col-left">

               

                <p>
                    <label for="rankology_analysis_target_kw_meta"><?php esc_html_e('Target keywords', 'wp-rankology'); ?>
                        <?php echo rankology_tooltip(__('Target keywords', 'wp-rankology'), __('Separate target keywords with commas. Do not use spaces after the commas, unless you want to include them', 'wp-rankology'), esc_html('my super keyword,another keyword,keyword')); ?>
                    </label>
                    <input id="rankology_analysis_target_kw_meta" type="text" name="rankology_analysis_target_kw"
                        placeholder="<?php esc_html_e('Enter your target keywords', 'wp-rankology'); ?>"
                        aria-label="<?php esc_html_e('Target keywords', 'wp-rankology'); ?>" value="<?php if (isset($rankology_analysis_target_kw)) {
                               echo $rankology_analysis_target_kw;
                           } ?>" />
                </p>

                <button id="rankology_launch_analysis" type="button"
                    class="<?php echo rankology_btn_secondary_classes(); ?>" data_id="<?php echo get_the_ID(); ?>"
                    data_post_type="<?php echo get_current_screen()->post_type; ?>"><?php esc_html_e('Refresh analysis', 'wp-rankology'); ?></button>

                <?php do_action('rankology_ca_after_resfresh_analysis'); ?>

                <p><span
                        class="description"><?php esc_html_e('To get the most accurate analysis, save your post first. We analyze all of your source code as a search engine would.', 'wp-rankology'); ?></span>
                </p>
            </div>


        <?php } else { ?>

            <div class="col-left">

                <?php
                $meta_key = '_rankology_analysis_target_kw';
                $rankology_analysis_target_kw = get_term_meta($term_id, $meta_key, true);
               

                if (is_array($rankology_analysis_target_kw)) {
                    // Combine array values into a single string
                    $values = implode(', ', $rankology_analysis_target_kw);
                  
                } 
                ?>

                <p>
                    <label for="rankology_analysis_target_kw_meta"><?php esc_html_e('Target keywords', 'wp-rankology'); ?>
                        <?php echo rankology_tooltip(__('Target keywords', 'wp-rankology'), __('Separate target keywords with commas. Do not use spaces after the commas, unless you want to include them', 'wp-rankology'), esc_html('my super keyword,another keyword,keyword')); ?>
                    </label>
                    <input id="rankology_analysis_target_kw_meta" type="text" name="rankology_analysis_target_kw"
                        placeholder="<?php esc_html_e('Enter your target keywords', 'wp-rankology'); ?>"
                        aria-label="<?php esc_html_e('Target keywords', 'wp-rankology'); ?>" value="<?php if (isset($values)) {
                               echo $values;
                           } ?>" />
                </p>

                <button id="rankology_launch_analysis" type="button"
                    class="<?php echo rankology_btn_secondary_classes(); ?>" data_id="<?php echo get_the_ID(); ?>"
                    data_post_type="<?php echo get_current_screen()->post_type; ?>"><?php esc_html_e('Refresh analysis', 'wp-rankology'); ?></button>

                <?php do_action('rankology_ca_after_resfresh_analysis'); ?>

                <p><span
                        class="description"><?php esc_html_e('To get the most accurate analysis, save your post first. We analyze all of your source code as a search engine would.', 'wp-rankology'); ?></span>
                </p>
            </div>

        <?php } ?>


        <?php
        require_once dirname(__FILE__) . '/rankology_google_suggest.php';

        ?>
        <?php do_action('rankology_ca_before'); ?>

        <div id="rankology-wrap-notice-target-kw" style="clear:both">
            <?php
            $html = '';
            $i = 0;
            $rankology_analysis_data = '';
            if (!empty($rankology_analysis_data['target_kws_count'])) {
                foreach ($rankology_analysis_data['target_kws_count'] as $kw => $item) {
                    if (!is_array($item)) {
                        continue;
                    }

                    if (count($item['rows']) === 0) {
                        continue;
                    }
                    $html .= '<li>
                                    <span class="dashicons dashicons-minus"></span>
                                    <strong>' . $item['key'] . '</strong>
                                    ' . sprintf(_n('is already used %d time', 'is already used %d times', count($item['rows']), 'wp-rankology'), count($item['rows'])) . '
                                </li>';
                    $i++;
                }
            }
            ?>

            <?php if (!empty($html)) { ?>
                <div id="rankology-notice-target-kw" class="rankology-notice is-warning">
                    <p><?php printf(_n('The keyword:', 'These keywords:', $i, 'wp-rankology'), number_format_i18n($i)); ?>
                    </p>
                    <ul>
                        <?php echo $html; ?>
                    </ul>
                    <p><?php esc_html_e('You should avoid using multiple times the same keyword for different pages. Try to consolidate your content into one single page.', 'wp-rankology'); ?>
                    </p>
                </div>
            <?php } ?>
        </div>
        <?php
        //  post & page different tabs with colors in overview tab
        if (function_exists('rankology_get_service')) {
            $analyzes = rankology_get_service('GetContentAnalysis')->getAnalyzes($post);
            rankology_get_service('RenderContentAnalysis')->render($analyzes, $rankology_analysis_data);
        } ?>
    </div>
</div>