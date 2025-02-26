<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

/* Add Generate meta with AI button to Titles settings tab */
add_filter('rankology_titles_title_tab_before', 'rankology_fno_titles_title_tab_before',  10);
function rankology_fno_titles_title_tab_before($pagenow) {
    if ('1' == rankology_get_toggle_option('ai')) {

        if ('post-new.php' == $pagenow || 'post.php' == $pagenow) { ?>
        <div>
            <button id="rankology_ai_generate_seo_meta" class="<?php echo rankology_btn_secondary_classes(); ?>" data-lang="<?php if (function_exists('rankology_get_current_lang')) { echo rankology_get_current_lang(); }; ?>" type="button"><?php esc_html_e('Generate meta with AI','wp-rankology'); ?></button>
            <div class="spinner"></div>
        </div>
        <div id="rankology_ai_generate_seo_meta_log" style="display:none"></div>
    <?php }
    }
}

/* Add Google News / Video Sitemap tabs to our SEO metabox */
add_filter('rankology_metabox_seo_tabs', 'rankology_fno_metabox_seo_tabs', 10, 3);
function rankology_fno_metabox_seo_tabs($seo_tabs, $typenow ='', $pagenow ='') {
    if (function_exists('rankology_get_toggle_option') && '1' == rankology_get_toggle_option('news')) {
        if ('post-new.php' == $pagenow || 'post.php' == $pagenow) {
            if ('rankology_404' != $typenow) {
                $seo_tabs['news-tab'] = '<li><a href="#tabs-5">' . __('Google News', 'wp-rankology') . '</a></li>';
            }
        }
    }
    if (function_exists('rankology_get_toggle_option') && '1' == rankology_get_toggle_option('xml-sitemap') && '1' === rankology_fno_get_service('SitemapOptionPro')->getSitemapVideoEnable()) {
        if ('post-new.php' == $pagenow || 'post.php' == $pagenow) {
            if ('rankology_404' != $typenow) {
                $seo_tabs['video-tab'] = '<li><a href="#tabs-6">' . __('Video Sitemap', 'wp-rankology') . '</a></li>';
            }
        }
    }
    return $seo_tabs;
}

/* Add Google News / Video Sitemap content tabs to our SEO metabox */
add_action('rankology_seo_metabox_after_content', 'rankology_fno_seo_metabox_after_content', 10, 4);
function rankology_fno_seo_metabox_after_content($typenow, $pagenow, $data_attr, $seo_tabs) {
    $data_attr['current_id'] = get_the_ID();
    $rankology_news_disabled                 = get_post_meta($data_attr['current_id'], '_rankology_news_disabled', true);
    $rankology_video_disabled                = get_post_meta($data_attr['current_id'], '_rankology_video_disabled', true);
    $rankology_video                         = get_post_meta($data_attr['current_id'], '_rankology_video');

    if (function_exists('rankology_get_toggle_option') && '1' == rankology_get_toggle_option('news')) {
        if ('post-new.php' == $pagenow || 'post.php' == $pagenow) {
            if ('rankology_404' != $typenow) {
                if (array_key_exists('news-tab', $seo_tabs)) { ?>
            <div id="tabs-5">
                <p>
                    <label for="rankology_news_disabled_meta" id="rankology_news_disabled">
                        <input type="checkbox" name="rankology_news_disabled" id="rankology_news_disabled_meta"
                            value="yes" <?php echo checked($rankology_news_disabled, 'yes', false); ?>
                        />
                        <?php esc_html_e('Exclude this post from Google News Sitemap?', 'wp-rankology'); ?>
                    </label>
                </p>
            </div>
            <?php }
            }
        }
    }
    if (function_exists('rankology_get_toggle_option') && '1' == rankology_get_toggle_option('xml-sitemap') && '1' === rankology_fno_get_service('SitemapOptionPro')->getSitemapVideoEnable()) {
        if ('post-new.php' == $pagenow || 'post.php' == $pagenow) {
            if ('rankology_404' != $typenow) {
                //Init $rankology_video array if empty
                if (empty($rankology_video)) {
                    $rankology_video = ['0' => ['']];
                }

                $count = $rankology_video[0];

                $total = '';
                if (is_array($count)) {
                    end($count);
                    $total = key($count);
                }

                if (array_key_exists('video-tab', $seo_tabs)) { ?>
            <div id="tabs-6">
                <p>
                    <?php esc_html_e('YouTube videos are automatically added when you create / save a post, page or post type.','wp-rankology'); ?>
                </p>
                <p>
                    <label for="rankology_video_disabled_meta" id="rankology_video_disabled">
                        <input type="checkbox" name="rankology_video_disabled" id="rankology_video_disabled_meta"
                            value="yes" <?php echo checked($rankology_video_disabled, 'yes', false); ?>
                        />
                        <?php esc_html_e('Exclude this post from Video Sitemap?', 'wp-rankology'); ?>
                    </label>
                    <span class="description"><?php esc_html_e('If your post is set to noindex, it will be automatically excluded from the sitemap.', 'wp-rankology'); ?></span>
                </p>
                <div id="wrap-videos"
                    data-count="<?php echo $total; ?>">
                    <?php foreach ($rankology_video[0] as $key => $value) {
                    $check_url             = isset($rankology_video[0][$key]['url']) ? esc_attr($rankology_video[0][$key]['url']) : null;
                    $check_internal_video  = isset($rankology_video[0][$key]['internal_video']) ? esc_attr($rankology_video[0][$key]['internal_video']) : null;
                    $check_title           = isset($rankology_video[0][$key]['title']) ? esc_attr($rankology_video[0][$key]['title']) : null;
                    $check_desc            = isset($rankology_video[0][$key]['desc']) ? esc_attr($rankology_video[0][$key]['desc']) : null;
                    $check_thumbnail       = isset($rankology_video[0][$key]['thumbnail']) ? esc_attr($rankology_video[0][$key]['thumbnail']) : null;
                    $check_duration        = isset($rankology_video[0][$key]['duration']) ? esc_attr($rankology_video[0][$key]['duration']) : null;
                    $check_rating          = isset($rankology_video[0][$key]['rating']) ? esc_attr($rankology_video[0][$key]['rating']) : null;
                    $check_view_count      = isset($rankology_video[0][$key]['view_count']) ? esc_attr($rankology_video[0][$key]['view_count']) : null;
                    $check_view_count      = isset($rankology_video[0][$key]['view_count']) ? esc_attr($rankology_video[0][$key]['view_count']) : null;
                    $check_tag             = isset($rankology_video[0][$key]['tag']) ? esc_attr($rankology_video[0][$key]['tag']) : null;
                    $check_family_friendly = isset($rankology_video[0][$key]['family_friendly']) ? esc_attr($rankology_video[0][$key]['family_friendly']) : null; ?>

                    <div class="video">
                        <h3 class="accordion-section-title" tabindex="0"><?php esc_html_e('Video ', 'wp-rankology'); ?><?php echo $check_title; ?>
                        </h3>
                        <div class="accordion-section-content">
                            <p>
                                <label
                                    for="rankology_video[<?php echo $key; ?>][url_meta]"><?php esc_html_e('Video URL (required)', 'wp-rankology'); ?></label>
                                <input
                                    id="rankology_video[<?php echo $key; ?>][url_meta]"
                                    type="text" class="components-text-control__input"
                                    name="rankology_video[<?php echo $key; ?>][url]"
                                    placeholder="<?php esc_html_e('Enter your video URL', 'wp-rankology'); ?>"
                                    aria-label="<?php esc_html_e('Video URL', 'wp-rankology'); ?>"
                                    value="<?php echo $check_url; ?>" />
                            </p>
                            <p class="internal_video">
                                <label
                                    for="rankology_video[<?php echo $key; ?>][internal_video_meta]"
                                    id="rankology_video[<?php echo $key; ?>][internal_video]">
                                    <input type="checkbox"
                                        name="rankology_video[<?php echo $key; ?>][internal_video]"
                                        id="rankology_video[<?php echo $key; ?>][internal_video_meta]"
                                        value="yes" <?php echo checked($check_internal_video, 'yes', false); ?>
                                    />
                                    <?php esc_html_e('NOT an external video (e.g. video hosting on YouTube, Vimeo, Wistia...)? Check this if your video is hosting on this server.', 'wp-rankology'); ?>
                                </label>
                            </p>
                            <p>
                                <label
                                    for="rankology_video[<?php echo $key; ?>][title_meta]"><?php esc_html_e('Video Title (required)', 'wp-rankology'); ?></label>
                                <input
                                    id="rankology_video[<?php echo $key; ?>][title_meta]"
                                    type="text" class="components-text-control__input"
                                    name="rankology_video[<?php echo $key; ?>][title]"
                                    placeholder="<?php esc_html_e('Enter your video title', 'wp-rankology'); ?>"
                                    aria-label="<?php esc_html_e('Video title', 'wp-rankology'); ?>"
                                    value="<?php echo $check_title; ?>" />
                                <span class="description"><?php esc_html_e('Default: title tag, if not available, post title.', 'wp-rankology'); ?></span>
                            </p>
                            <p>
                                <label
                                    for="rankology_video[<?php echo $key; ?>][desc_meta]"><?php esc_html_e('Video Description (required)', 'wp-rankology'); ?></label>
                                <textarea
                                    id="rankology_video[<?php echo $key; ?>][desc_meta]"
                                    name="rankology_video[<?php echo $key; ?>][desc]"
                                    class="components-text-control__input"
                                    placeholder="<?php esc_html_e('Enter your video description', 'wp-rankology'); ?>"
                                    aria-label="<?php esc_html_e('Video description', 'wp-rankology'); ?>"><?php echo $check_desc; ?></textarea>
                                <span class="description"><?php esc_html_e('2048 characters max.; default: meta description. If not available, use the beginning of the post content.', 'wp-rankology'); ?></span>
                            </p>
                            <p>
                                <label
                                    for="rankology_video[<?php echo $key; ?>][thumbnail_meta]"><?php esc_html_e('Video Thumbnail (required)', 'wp-rankology'); ?></label>

                                <input
                                    id="rankology_video[<?php echo $key; ?>][thumbnail_meta]"
                                    class="rankology_video_thumbnail_meta components-text-control__input"
                                    type="text"
                                    name="rankology_video[<?php echo $key; ?>][thumbnail]"
                                    placeholder="<?php esc_html_e('Select your video thumbnail', 'wp-rankology'); ?>"
                                    value="<?php echo $check_thumbnail; ?>" />


                                <input
                                    class="<?php echo rankology_btn_secondary_classes(); ?> rankology_video_thumbnail_upload rankology_media_upload"
                                    type="button"
                                    aria-label="<?php esc_html_e('Video Thumbnail', 'wp-rankology'); ?>"
                                    value="<?php esc_html_e('Upload an Image', 'wp-rankology'); ?>" />
                                <span class="description">
                                    <?php esc_html_e('Minimum size: 160x90px (1920x1080 max), JPG, PNG or GIF formats. Default: your post featured image.', 'wp-rankology'); ?>
                                </span>
                            </p>
                            <p>
                                <label
                                    for="rankology_video[<?php echo $key; ?>][duration_meta]"><?php esc_html_e('Video Duration (recommended)', 'wp-rankology'); ?></label>
                                <input
                                    id="rankology_video[<?php echo $key; ?>][duration_meta]"
                                    type="number" step="1" min="0" max="28800"
                                    name="rankology_video[<?php echo $key; ?>][duration]"
                                    placeholder="<?php esc_html_e('Duration in seconds', 'wp-rankology'); ?>"
                                    aria-label="<?php esc_html_e('Video duration', 'wp-rankology'); ?>"
                                    value="<?php echo $check_duration; ?>" />
                                <span class="description"><?php esc_html_e('The duration of the video in seconds. Value must be between 0 and 28800 (8 hours).', 'wp-rankology'); ?></span>
                            </p>
                            <p>
                                <label
                                    for="rankology_video[<?php echo $key; ?>][rating_meta]"><?php esc_html_e('Video Rating', 'wp-rankology'); ?></label>
                                <input
                                    id="rankology_video[<?php echo $key; ?>][rating_meta]"
                                    type="number" step="0.1" min="0" max="5"
                                    name="rankology_video[<?php echo $key; ?>][rating]"
                                    placeholder="<?php esc_html_e('Video rating', 'wp-rankology'); ?>"
                                    aria-label="<?php esc_html_e('Video rating', 'wp-rankology'); ?>"
                                    value="<?php echo $check_rating; ?>" />
                                <span class="description"><?php esc_html_e('Allowed values are float numbers in the range 0.0 to 5.0.', 'wp-rankology'); ?></span>
                            </p>
                            <p>
                                <label
                                    for="rankology_video[<?php echo $key; ?>][view_count_meta]"><?php esc_html_e('View count', 'wp-rankology'); ?></label>
                                <input
                                    id="rankology_video[<?php echo $key; ?>][view_count_meta]"
                                    type="number"
                                    name="rankology_video[<?php echo $key; ?>][view_count]"
                                    placeholder="<?php esc_html_e('Number of views', 'wp-rankology'); ?>"
                                    aria-label="<?php esc_html_e('View count', 'wp-rankology'); ?>"
                                    value="<?php echo $check_view_count; ?>" />
                            </p>
                            <p>
                                <label
                                    for="rankology_video[<?php echo $key; ?>][tag_meta]"><?php esc_html_e('Video tags', 'wp-rankology'); ?></label>
                                <input
                                    id="rankology_video[<?php echo $key; ?>][tag_meta]"
                                    type="text" class="components-text-control__input"
                                    name="rankology_video[<?php echo $key; ?>][tag]"
                                    placeholder="<?php esc_html_e('Enter your video tags', 'wp-rankology'); ?>"
                                    aria-label="<?php esc_html_e('Video tags', 'wp-rankology'); ?>"
                                    value="<?php echo $check_tag; ?>" />
                                <span class="description"><?php esc_html_e('32 tags max., separate tags with commas. Default: target keywords + post tags if available.', 'wp-rankology'); ?></span>
                            </p>
                            <p class="family-friendly">
                                <label
                                    for="rankology_video[<?php echo $key; ?>][family_friendly_meta]"
                                    id="rankology_video[<?php echo $key; ?>][family_friendly]">
                                    <input type="checkbox"
                                        name="rankology_video[<?php echo $key; ?>][family_friendly]"
                                        id="rankology_video[<?php echo $key; ?>][family_friendly_meta]"
                                        value="yes" <?php echo checked($check_family_friendly, 'yes', false); ?>
                                    />
                                    <?php esc_html_e('NOT family friendly?', 'wp-rankology'); ?>
                                </label>
                                <span class="description"><?php esc_html_e('The video will be available only to users with SafeSearch turned off.', 'wp-rankology'); ?></span>
                            </p>
                            <p><a href="#"
                                    class="remove-video components-button editor-post-trash is-tertiary is-destructive"><?php esc_html_e('Remove video', 'wp-rankology'); ?></a>
                            </p>
                        </div>
                    </div>
                    <?php
                } ?>
                </div>
                <p>
                    <a href="#" id="add-video"
                        class="add-video <?php echo rankology_btn_secondary_classes(); ?>">
                        <?php esc_html_e('Add video', 'wp-rankology'); ?>
                    </a>
                </p>
            </div>
            <?php }
            }
        }
    }
}

/* Save our Custom Breadcrumbs / Google News / Video sitemap meta */
add_action('rankology_seo_metabox_save', 'rankology_fno_seo_metabox_save', 10, 2);
function rankology_fno_seo_metabox_save($post_id, $seo_tabs) {
    if (!empty($_POST['rankology_robots_breadcrumbs'])) {
        update_post_meta($post_id, '_rankology_robots_breadcrumbs', esc_html($_POST['rankology_robots_breadcrumbs']));
    } else {
        delete_post_meta($post_id, '_rankology_robots_breadcrumbs');
    }

    if (did_action('elementor/loaded')) {
        $elementor = get_post_meta($post_id, '_elementor_page_settings', true);

        if (! empty($elementor)) {
            if (isset($_POST['rankology_robots_breadcrumbs'])) {
                $elementor['_rankology_robots_breadcrumbs'] = esc_html($_POST['rankology_robots_breadcrumbs']);
            }
        }
    }

    if (in_array('news-tab', $seo_tabs)) {
        if (isset($_POST['rankology_news_disabled'])) {
            update_post_meta($post_id, '_rankology_news_disabled', 'yes');
        } else {
            delete_post_meta($post_id, '_rankology_news_disabled', '');
        }
    }
    if (in_array('video-tab', $seo_tabs)) {
        if (isset($_POST['rankology_video_disabled'])) {
            update_post_meta($post_id, '_rankology_video_disabled', 'yes');
        } else {
            delete_post_meta($post_id, '_rankology_video_disabled', '');
        }
        if (!empty($_POST['rankology_video'])) {
            update_post_meta($post_id, '_rankology_video', $_POST['rankology_video']);
        } else {
            delete_post_meta($post_id, '_rankology_video');
        }
    }
}

/* Save our Custom Breadcrumbs term meta */
add_action('rankology_seo_metabox_term_save', 'rankology_fno_seo_metabox_term_save', 10, 2);
function rankology_fno_seo_metabox_term_save($term_id, $term) {
    if (!empty($term['rankology_robots_breadcrumbs'])) {
        update_term_meta($term_id, '_rankology_robots_breadcrumbs', esc_html($term['rankology_robots_breadcrumbs']));
    } else {
        delete_term_meta($term_id, '_rankology_robots_breadcrumbs');
    }
}

/* Add Custom Breadcrumbs to Robots tab, SEO metabox */
add_action('rankology_titles_title_tab_after', 'rankology_fno_titles_title_tab_after', 10, 2);
function rankology_fno_titles_title_tab_after($pagenow, $data_attr) {
    $data_attr['current_id'] = get_the_ID();
    if(isset($_GET['tag_ID'])){
        $data_attr['termId'] = intval($_GET['tag_ID']);
    }

        if ('term.php' == $pagenow || 'edit-tags.php' == $pagenow) {
            $rankology_robots_breadcrumbs   = get_term_meta($data_attr['termId'], '_rankology_robots_breadcrumbs', true);

            //echo $rankology_robots_breadcrumbs;
        } else {
            $rankology_robots_breadcrumbs   = get_post_meta($data_attr['current_id'], '_rankology_robots_breadcrumbs', true);
        }
    ?>
    <p>
        <label for="rankology_robots_breadcrumbs_meta"><?php esc_html_e('Custom breadcrumbs', 'wp-rankology'); ?></label>
        <span class="description"><?php esc_html_e('Enter a custom value, useful if your title is too long', 'wp-rankology'); ?></span>
    </p>
    <p>
        <?php 

        if(isset($_GET['tag_ID'])){
            $term_id = intval($_GET['tag_ID']); // Sanitize the input for security

            // Get the term object
            $term = get_term($term_id);
            
            // Check if the term exists and is valid
            if (!is_wp_error($term) && $term) {
                // Display the term name
                $data_attr['title'] =$term->name;
            }
        }
       
        ?>
        <input id="rankology_robots_breadcrumbs_meta" type="text" name="rankology_robots_breadcrumbs"
            class="components-text-control__input"
            placeholder="<?php esc_html_e(sprintf(__('Current breadcrumbs: %s', 'wp-rankology'), $data_attr['title'])); ?>"
            aria-label="<?php esc_html_e('Custom breadcrumbs', 'wp-rankology'); ?>"
            value="<?php if(isset($rankology_robots_breadcrumbs)) { echo $rankology_robots_breadcrumbs; } ?>" />
    </p>
    <?php
}
