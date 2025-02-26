<div id="tabs-4">
    <p>
        <label for="rankology_redirections_enabled_meta" id="rankology_redirections_enabled">
            <input type="checkbox" name="rankology_redirections_enabled"
                   id="rankology_redirections_enabled_meta"
                   value="yes" <?php echo checked($rankology_redirections_enabled, 'yes', false); ?>
            />
            <?php esc_html_e('Enable redirection?', 'wp-rankology'); ?>
        </label>
    </p>
    <?php if ('rankology_404' == $typenow) { ?>
        <p>
            <label for="rankology_redirections_enabled_regex_meta"
                   id="rankology_redirections_enabled_regex">
                <input type="checkbox" name="rankology_redirections_enabled_regex"
                       id="rankology_redirections_enabled_regex_meta"
                       value="yes" <?php echo checked($rankology_redirections_enabled_regex, 'yes', false); ?>
                />
                <?php esc_html_e('Regex?', 'wp-rankology'); ?>
            </label>
        </p>
    <?php } ?>
    <p>
        <label for="rankology_redirections_logged_status"><?php esc_html_e('Select a login status: ', 'wp-rankology'); ?></label>

        <select id="rankology_redirections_logged_status"
                name="rankology_redirections_logged_status">
            <option <?php echo selected('both', $rankology_redirections_logged_status); ?>
                value="both"><?php esc_html_e('All', 'wp-rankology'); ?>
            </option>
            <option <?php echo selected('only_logged_in', $rankology_redirections_logged_status); ?>
                value="only_logged_in"><?php esc_html_e('Only Logged In', 'wp-rankology'); ?>
            </option>
            <option <?php echo selected('only_not_logged_in', $rankology_redirections_logged_status); ?>
                value="only_not_logged_in"><?php esc_html_e('Only Not Logged In', 'wp-rankology'); ?>
            </option>
        </select>
    </p>
    <p>

        <label for="rankology_redirections_type"><?php esc_html_e('Select a redirection type: ', 'wp-rankology'); ?></label>

        <select id="rankology_redirections_type" name="rankology_redirections_type">
            <option <?php echo selected('301', $rankology_redirections_type, false); ?>
                value="301"><?php esc_html_e('301 Moved Permanently', 'wp-rankology'); ?>
            </option>
            <option <?php echo selected('302', $rankology_redirections_type, false); ?>
                value="302"><?php esc_html_e('302 Found / Moved Temporarily', 'wp-rankology'); ?>
            </option>
            <option <?php echo selected('307', $rankology_redirections_type, false); ?>
                value="307"><?php esc_html_e('307 Moved Temporarily', 'wp-rankology'); ?>
            </option>
            <?php if ('rankology_404' == $typenow) { ?>
                <option <?php echo selected('410', $rankology_redirections_type, false); ?>
                    value="410"><?php esc_html_e('410 Gone', 'wp-rankology'); ?>
                </option>
                <option <?php echo selected('451', $rankology_redirections_type, false); ?>
                    value="451"><?php esc_html_e('451 Unavailable For Legal Reasons', 'wp-rankology'); ?>
                </option>
            <?php } ?>
        </select>
    </p>
    <p>
        <label for="rankology_redirections_value_meta"><?php esc_html_e('URL redirection', 'wp-rankology'); ?></label>
        <input id="rankology_redirections_value_meta" type="text"
               name="rankology_redirections_value"
               class="components-text-control__input js-rankology_redirections_value_meta"
               placeholder="<?php esc_html_e('Enter your new URL in absolute (e.g. https://www.example.com/)', 'wp-rankology'); ?>"
               aria-label="<?php esc_html_e('URL redirection', 'wp-rankology'); ?>"
               value="<?php echo $rankology_redirections_value; ?>"/>
    </p>
    <p class="description">
        <?php esc_html_e('Enter some keywords to auto-complete this field against your content.', 'wp-rankology'); ?>
    </p>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            var cache = {};
            jQuery(".js-rankology_redirections_value_meta").autocomplete({
                source: async function (request, response) {
                    var term = request.term;
                    if (term in cache) {
                        response(cache[term]);
                        return;
                    }

                    const dataResponse = await
                    fetch("<?php echo rest_url(); ?>rankology/v1/search-url?url=" + term)
                    const data = await
                    dataResponse.json();

                    cache[term] = data.map(item = > {
                        return {
                            label: item.post_title + " (" + item.guid + ")",
                            value: item.guid
                        }
                    }
                )
                    ;
                    response(cache[term]);
                },

                minLength: 3,
            });


        })
    </script>
    <?php if ('rankology_404' == $typenow) { ?>
        <p>
            <label for="rankology_redirections_param_meta"><?php esc_html_e('Query parameters', 'wp-rankology'); ?></label>
            <select name="rankology_redirections_param">
                <option <?php echo selected('exact_match', $rankology_redirections_param, false); ?>
                    value="exact_match"><?php esc_html_e('Exactly match all parameters', 'wp-rankology'); ?>
                </option>
                <option <?php echo selected('without_param', $rankology_redirections_param, false); ?>
                    value="without_param"><?php esc_html_e('Exclude all parameters', 'wp-rankology'); ?>
                </option>
                <option <?php echo selected('with_ignored_param', $rankology_redirections_param, false); ?>
                    value="with_ignored_param"><?php esc_html_e('Exclude all parameters and pass them to the redirection', 'wp-rankology'); ?>
                </option>
            </select>
        </p>
    <?php } ?>
    <p>
        <?php if ('yes' == $rankology_redirections_enabled) {
            $status_code = ['410', '451'];
            if ('' != $rankology_redirections_value || in_array($rankology_redirections_type, $status_code)) {
                if ('post-new.php' == $pagenow || 'post.php' == $pagenow) {
                    if ('rankology_404' == $typenow) {

                        $parse_url = wp_parse_url(get_home_url());

                        $home_url = get_home_url();
                        if (!empty($parse_url['scheme']) && !empty($parse_url['host'])) {
                            $home_url = $parse_url['scheme'] . '://' . $parse_url['host'];
                        }

                        $href = $home_url . '/' . get_the_title();
                    } else {
                        $href = get_the_permalink();
                    }
                } elseif ('term.php' == $pagenow) {
                    $href = get_term_link($term);
                } else {
                    $href = get_the_permalink();
                } ?>
                <a href="<?php echo $href; ?>"
                   id="rankology_redirections_value_default"
                   class="<?php echo rankology_btn_secondary_classes(); ?>"
                   target="_blank">
                    <?php esc_html_e('Test your URL', 'wp-rankology'); ?>
                </a>
                <?php
            }
        }

        if ('rankology_404' === $typenow) {
            ?>

        <?php } ?>
    </p>
</div>