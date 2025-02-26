<div id="tabs-1">

    <?php if (is_plugin_active('woocommerce/woocommerce.php') && function_exists('wc_get_page_id')) {
        $shop_page_id = wc_get_page_id('shop');
        if ('post-new.php' == $pagenow || 'post.php' == $pagenow) {

            if ($post && absint($shop_page_id) === absint($post->ID)) { ?>
                <p class="notice notice-info">
                    <?php printf(__('This is your <strong>Shop page</strong>. Go to <a href="%s"><strong>SEO > Header Metas > Archives > Products</strong></a> to edit your title and meta description.', 'wp-rankology'), admin_url('admin.php?page=rankology-titles')); ?>
                </p>
            <?php }
        }
    }
    $toggle_preview = 1;
    $toggle_preview = apply_filters('rankology_toggle_mobile_preview', $toggle_preview);
    ?>

    <div class="box-leftsnip">
        <div class="google-snippet-preview mobile-preview">
            <h3>
                <?php
                esc_html_e('Search Engine Preview', 'wp-rankology');
                echo rankology_tooltip(__('Snippet Preview', 'wp-rankology'), __('The Google preview is a simulation. <br>There is no reliable preview because it depends on the screen resolution, the device used, the expression sought, and Google. <br>There is not one snippet for one URL but several. <br>All the data in this overview comes directly from your source code. <br>This is what the crawlers will see.', 'wp-rankology'), null);
                ?>
            </h3>
            <p><?php esc_html_e('This is a preview of how your page will appear in Google search results. To see the Google Preview, you must publish your post. Please keep in mind that Google may choose to include an image from your article if available.', 'wp-rankology'); ?>
            </p>
            <div class="wrap-toggle-preview">
                <p>
                    <span class="dashicons dashicons-smartphone"></span>
                    <?php esc_html_e('Mobile Preview', 'wp-rankology'); ?>
                    <input type="checkbox" name="toggle-preview" id="toggle-preview"
                           class="toggle"
                           data-toggle="<?php echo $toggle_preview; ?>">
                    <label for="toggle-preview"></label>
                </p>
            </div>
            <?php
            global $tag;

            $gp_title = '';
            $gp_permalink = '';
            $alt_site_title = !empty(rankology_get_service('TitleOption')->getHomeSiteTitleAlt()) ? rankology_get_service('TitleOption')->getHomeSiteTitleAlt() : get_bloginfo('name');

            if (get_the_title()) {
                $gp_title = '<div class="snippet-title-default" style="display:none">' . get_the_title() . ' - ' . get_bloginfo('name') . '</div>';
                $gp_permalink = '<div class="snippet-permalink"><span class="snippet-sitename">' . $alt_site_title . '</span>' . htmlspecialchars(urldecode(get_permalink())) . '</div>';
            } elseif ($tag) {
                if (false === is_wp_error(get_term_link($tag))) {
                    $gp_title = '<div class="snippet-title-default" style="display:none">' . $tag->name . ' - ' . get_bloginfo('name') . '</div>';
                    $gp_permalink = '<div class="snippet-permalink"><span class="snippet-sitename">' . $alt_site_title . '</span>' . htmlspecialchars(urldecode(get_term_link($tag))) . '</div>';
                }
            }

            $siteicon = '<div class="snippet-favicon"><img aria-hidden="true" height="18" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABs0lEQVR4AWL4//8/RRjO8Iucx+noO0MWUDo16FYABMGP6ZfUcRnWtm27jVPbtm3bttuH2t3eFPcY9pLz7NxiLjCyVd87pKnHyqXyxtCs8APd0rnyxiu4qSeA3QEDrAwBDrT1s1Rc/OrjLZwqVmOSu6+Lamcpp2KKMA9PH1BYXMe1mUP5qotvXTywsOEEYHXxrY+3cqk6TMkYpNr2FeoY3KIr0RPtn9wQ2unlA+GMkRw6+9TFw4YTwDUzx/JVvARj9KaedXRO8P5B1Du2S32smzqUrcKGEyA+uAgQjKX7zf0boWHGfn71jIKj2689gxp7OAGShNcBUmLMPVjZuiKcA2vuWHHDCQxMCz629kXAIU4ApY15QwggAFbfOP9DhgBJ+nWVJ1AZAfICAj1pAlY6hCADZnveQf7bQIwzVONGJonhLIlS9gr5mFg44Xd+4S3XHoGNPdJl1INIwKyEgHckEhgTe1bGiFY9GSFBYUwLh1IkiJUbY407E7syBSFxKTszEoiE/YdrgCEayDmtaJwCI9uu8TKMuZSVfSa4BpGgzvomBR/INhLGzrqDotp01ZR8pn/1L0JN9d9XNyx0AAAAAElFTkSuQmCC" width="18" alt="favicon"></div>';
            if (get_site_icon_url(32)) {
                $siteicon = '<div class="snippet-favicon"><img aria-hidden="true" height="18" src="' . get_site_icon_url(32) . '" width="18" alt="favicon"/></div>';
            } ?>

            <div class="wrap-snippet">
                <div class="wrap-m-icon-permalink"><?php echo $siteicon . $gp_permalink; ?></div>
                <div class="snippet-title"></div>
                <div class="snippet-title-custom" style="display:none"></div>

                <div class="wrap-snippet-mobile">
                    <div class="wrap-meta-desc">
                        <?php
                        //echo $gp_title;

                        if ('post-new.php' == $pagenow || 'post.php' == $pagenow) {
                            echo rankology_display_date_snippet();
                        } ?>

                        <div class="snippet-description"></div>
                        <div class="snippet-description-custom" style="display:none"></div>
                        <div class="snippet-description-default" style="display:none"></div>
                    </div>
                    <div class="wrap-post-thumb"><?php the_post_thumbnail('full', ['class' => 'snippet-post-thumb']); ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="box-right">
        <div id="rkns-postmeta-seoscore"></div>
        <?php do_action('rankology_titles_title_tab_before', $pagenow); ?>
        <div class="rkseo-metadesc-con">
            <div class="label-scoreperc-con">
                <label for="rankology_titles_title_meta">
                    <?php
                    esc_html_e('Title', 'wp-rankology');
                    echo rankology_tooltip(__('Meta title', 'wp-rankology'), __('Titles are critical to give users a quick insight into the content of a result and why it’s relevant to their query. It\'s often the primary piece of information used to decide which result to click on, so it\'s important to use high-quality titles on your web pages.', 'wp-rankology'), esc_html('<title>My super title</title>'));
                    ?>
                </label>
                <div class="rankology-snippet-counters">
                    <!-- <div id="rankology_titles_title_counters_progress" class="rkseo-percentage-num"
                    aria-valuenow="1" aria-valuemin="0" aria-valuemax="100">1%</div> -->
                    <div>
                        <!-- <div id="rankology_titles_title_pixel">0</div>
                                            <strong><?php esc_html_e(' / 568 pixels - ', 'wp-rankology'); ?></strong> -->
                        <div id="rankology_titles_title_counters">0</div>
                        <?php esc_html_e(' (max. recommended limit)', 'wp-rankology'); ?>
                    </div>
                </div>
            </div>

            <input id="rankology_titles_title_meta" type="text"
                   name="rankology_titles_title"
                   class="components-text-control__input"
                   placeholder="<?php esc_html_e('Enter your title', 'wp-rankology'); ?>"
                   aria-label="<?php esc_html_e('Title', 'wp-rankology'); ?>"
                   value="<?php echo $rankology_titles_title; ?>"/>
        </div>

        <div class="wrap-tags">
            <?php if ('term.php' == $pagenow || 'edit-tags.php' == $pagenow) { ?>
                <button type="button"
                        class="<?php echo rankology_btn_secondary_classes(); ?> tag-title"
                        id="rankology-tag-single-title" data-tag="%%term_title%%"><span
                        class="dashicons dashicons-tag"></span><?php esc_html_e('Term Title', 'wp-rankology'); ?>
                </button>
            <?php } else { ?>
                <button type="button"
                        class="<?php echo rankology_btn_secondary_classes(); ?> tag-title"
                        id="rankology-tag-single-title" data-tag="%%post_title%%"><span
                        class="dashicons dashicons-tag"></span><?php esc_html_e('Post Title', 'wp-rankology'); ?>
                </button>
            <?php } ?>
            <button type="button"
                    class="<?php echo rankology_btn_secondary_classes(); ?> tag-title"
                    id="rankology-tag-single-site-title" data-tag="%%sitetitle%%">
                <span class="dashicons dashicons-tag"></span><?php esc_html_e('Site Title', 'wp-rankology'); ?>
            </button>
            <button type="button"
                    class="<?php echo rankology_btn_secondary_classes(); ?> tag-title"
                    id="rankology-tag-single-sep" data-tag="%%sep%%"><span
                    class="dashicons dashicons-tag"></span><?php esc_html_e('Separator', 'wp-rankology'); ?>
            </button>

            <?php echo rankology_render_dyn_variables('tag-title'); ?>
        </div>
        <div class="rkseo-metadesc-con">
            <div class="label-scoreperc-con">

                <label for="rankology_titles_desc_meta">
                    <?php
                    esc_html_e('Meta description', 'wp-rankology');
                    echo rankology_tooltip(__('Meta description', 'wp-rankology'), __('A meta description tag should generally inform and interest users with a short, relevant summary of what a particular page is about. <br>They are like a pitch that convince the user that the page is exactly what they\'re looking for. <br>There\'s no limit on how long a meta description can be, but the search result snippets are truncated as needed, typically to fit the device width.', 'wp-rankology'), esc_html('<meta name="description" content="my super meta description" />'));
                    ?>
                </label>
                <div class="rankology-snippet-counters">
                    <!-- <div id="rankology_titles_desc_counters_progress" class="rkseo-percentage-num"
                    aria-valuenow="1" aria-valuemin="0" aria-valuemax="100">1%</div> -->
                    <div>
                        <!-- <div id="rankology_titles_desc_pixel">0</div>
                                            <strong><?php esc_html_e(' / 940 pixels - ', 'wp-rankology'); ?></strong> -->
                        <div id="rankology_titles_desc_counters">0</div>
                        <?php esc_html_e(' (max. recommended limit)', 'wp-rankology'); ?>
                    </div>
                </div>
            </div>

            <textarea id="rankology_titles_desc_meta" rows="4" name="rankology_titles_desc"
                      class="components-text-control__input"
                      placeholder="<?php esc_html_e('Enter your meta description', 'wp-rankology'); ?>"
                      aria-label="<?php esc_html_e('Meta description', 'wp-rankology'); ?>"><?php echo esc_attr($rankology_titles_desc); ?></textarea>
        </div>


        <div class="wrap-tags">
            <?php if ('term.php' == $pagenow || 'edit-tags.php' == $pagenow) { ?>
                <button type="button"
                        class="<?php echo rankology_btn_secondary_classes(); ?> tag-title"
                        id="rankology-tag-single-excerpt"
                        data-tag="%%_category_description%%">
                    <span class="dashicons dashicons-tag"></span><?php esc_html_e('Category / term description', 'wp-rankology'); ?>
                </button>
            <?php } else { ?>
                <button type="button"
                        class="<?php echo rankology_btn_secondary_classes(); ?> tag-title"
                        id="rankology-tag-single-excerpt" data-tag="%%post_excerpt%%">
                    <span class="dashicons dashicons-tag"></span><?php esc_html_e('Post Excerpt', 'wp-rankology'); ?>
                </button>

            <?php }
            echo rankology_render_dyn_variables('tag-description');
            ?>
            <!--  Enter keywords for analysis and you can also use google suggestions to write optimized content. -->
            <!--  Different color tabs included in the below file       -->
            <?php
            require_once dirname(__FILE__) . '/overview-tab.php';
            require_once dirname(__FILE__) . '/rankology_google_suggest.php';

            ?>

        </div>
    </div>
</div>