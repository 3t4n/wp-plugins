<div id="tabs-3">
    <span class="rkseo-section"><?php esc_html_e('Meta robots settings', 'wp-rankology'); ?></span>
    <p class="description">
        <?php $url = admin_url('admin.php?page=rankology-titles#tab=tab_rankology_titles_single');
        /* translators: %s: link to plugin settings page */
        printf(__('You cannot uncheck a parameter? This is normal, and it‘s most likely defined in the <a href="%s">global settings of the plugin.</a>', 'wp-rankology'), $url);
        ?>
    </p>
    <p>
        <label for="rankology_robots_index_meta">
            <?php $rankology_robots_index; ?>
            <input type="checkbox" name="rankology_robots_index"
                   id="rankology_robots_index_meta"
                   value="yes" <?php echo checked($rankology_robots_index, 'yes', false); ?>
                <?php if (isset($disabled['robots_index'])) {
                    echo $disabled['robots_index'];
                } ?>/>
            <?php
            esc_html_e('Exclude this page from search engine results / XML - HTML sitemaps <strong>(noindex)</strong>', 'wp-rankology');
            echo rankology_tooltip(__('"noindex" robots meta tag', 'wp-rankology'), __('By checking this option, you will add a meta robots tag with the value "noindex". <br>Search engines will not index this URL in the search results.', 'wp-rankology'), esc_html('<meta name="robots" content="noindex" />'));
            ?>
        </label>
    </p>
    <p>
        <label for="rankology_robots_follow_meta">
            <input type="checkbox" name="rankology_robots_follow"
                   id="rankology_robots_follow_meta"
                   value="yes" <?php echo checked($rankology_robots_follow, 'yes', false); ?>
                <?php if (isset($disabled['robots_follow'])) {
                    echo $disabled['robots_follow'];
                } ?>/>
            <?php
            esc_html_e('Do not follow links for this page <strong>(nofollow)</strong>', 'wp-rankology');
            echo rankology_tooltip(__('"nofollow" robots meta tag', 'wp-rankology'), __('By checking this option, you will add a meta robots tag with the value "nofollow". <br>Search engines will not follow links from this URL.', 'wp-rankology'), esc_html('<meta name="robots" content="nofollow" />'));
            ?>
        </label>
    </p>
    <p>
        <label for="rankology_robots_imageindex_meta">
            <input type="checkbox" name="rankology_robots_imageindex"
                   id="rankology_robots_imageindex_meta"
                   value="yes" <?php echo checked($rankology_robots_imageindex, 'yes', false); ?>
                <?php if (isset($disabled['imageindex'])) {
                    echo $disabled['imageindex'];
                } ?>/>
            <?php esc_html_e('Do not index images for this page <strong>(noimageindex)</strong>', 'wp-rankology'); ?>
            <?php echo rankology_tooltip(__('"noimageindex" robots meta tag', 'wp-rankology'), __('By checking this option, you will add a meta robots tag with the value "noimageindex". <br> Note that your images can always be indexed if they are linked from other pages.', 'wp-rankology'), esc_html('<meta name="robots" content="noimageindex" />')); ?>
        </label>
    </p>
    <p>
        <label for="rankology_robots_archive_meta">
            <input type="checkbox" name="rankology_robots_archive"
                   id="rankology_robots_archive_meta"
                   value="yes" <?php echo checked($rankology_robots_archive, 'yes', false); ?>
                <?php if (isset($disabled['archive'])) {
                    echo $disabled['archive'];
                } ?>/>
            <?php esc_html_e('Do not display a "Cached" link in the Google search results <strong>(noarchive)</strong>', 'wp-rankology'); ?>
            <?php echo rankology_tooltip(__('"noarchive" robots meta tag', 'wp-rankology'), __('By checking this option, you will add a meta robots tag with the value "noarchive".', 'wp-rankology'), esc_html('<meta name="robots" content="noarchive" />')); ?>
        </label>
    </p>
    <p>
        <label for="rankology_robots_snippet_meta">
            <input type="checkbox" name="rankology_robots_snippet"
                   id="rankology_robots_snippet_meta"
                   value="yes" <?php echo checked($rankology_robots_snippet, 'yes', false); ?>
                <?php if (isset($disabled['snippet'])) {
                    echo $disabled['snippet'];
                } ?>/>
            <?php esc_html_e('Do not display a description in search results for this page <strong>(nosnippet)</strong>', 'wp-rankology'); ?>
            <?php echo rankology_tooltip(__('"nosnippet" robots meta tag', 'wp-rankology'), __('By checking this option, you will add a meta robots tag with the value "nosnippet".', 'wp-rankology'), esc_html('<meta name="robots" content="nosnippet" />')); ?>
        </label>
    </p>
    <p>
        <label for="rankology_robots_canonical_meta">
            <?php
            esc_html_e('Canonical URL', 'wp-rankology');
            echo rankology_tooltip(__('Canonical URL', 'wp-rankology'), __('A canonical URL is the URL of the page that Google thinks is most representative from a set of duplicate pages on your site. <br>For example, if you have URLs for the same page (for example: example.com?dress=1234 and example.com/dresses/1234), Google chooses one as canonical. <br>Note that the pages do not need to be absolutely identical; minor changes in sorting or filtering of list pages do not make the page unique (for example, sorting by price or filtering by item color). The canonical can be in a different domain than a duplicate.', 'wp-rankology'), esc_html('<link rel="canonical" href="https://www.example.com/my-post-url/" />'));
            ?>
        </label>
        <input id="rankology_robots_canonical_meta" type="text"
               name="rankology_robots_canonical"
               class="components-text-control__input"
               placeholder="<?php esc_html_e('Default value: ', 'wp-rankology') . htmlspecialchars(urldecode(get_permalink())); ?>"
               aria-label="<?php esc_html_e('Canonical URL', 'wp-rankology'); ?>"
               value="<?php echo $rankology_robots_canonical; ?>"/>
    </p>

    <?php if (('post' == $typenow || 'product' == $typenow) && ('post.php' == $pagenow || 'post-new.php' == $pagenow)) { ?>
        <p>
            <label for="rankology_robots_primary_cat"><?php esc_html_e('Select a primary category', 'wp-rankology'); ?></label>
            <span class="description"><?php esc_html_e('Set the category that gets used in the %category% permalink and in our breadcrumbs if you have multiple categories.', 'wp-rankology'); ?>
        </p>
        <select id="rankology_robots_primary_cat" name="rankology_robots_primary_cat">

            <?php $cats = get_categories();

            if ('product' == $typenow) {
                $cats = get_the_terms($post, 'product_cat');
            }
            if (!empty($cats)) { ?>
                <option <?php echo selected('none', $rankology_robots_primary_cat, false); ?>
                    value="none"><?php esc_html_e('None (will disable this feature)', 'wp-rankology'); ?>
                </option>
                <?php foreach ($cats as $category) { ?>
                    <option <?php echo selected($category->term_id, $rankology_robots_primary_cat, false); ?>
                        value="<?php echo $category->term_id; ?>"><?php echo $category->name; ?>
                    </option>
                <?php }
            } ?>
        </select>
        </p>
    <?php }
    do_action('rankology_titles_title_tab_after', $pagenow, $data_attr);
    ?>
</div>