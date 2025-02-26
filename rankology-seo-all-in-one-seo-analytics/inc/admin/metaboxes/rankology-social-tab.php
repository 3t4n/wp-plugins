<?php 

global $typenow;
global $pagenow;

$data_attr = [];
$disabled = [];
$data_attr['data_tax'] = '';
$data_attr['termId'] = '';

if ('post-new.php' == $pagenow || 'post.php' == $pagenow) {
    $data_attr['current_id'] = get_the_id();
    $data_attr['origin'] = 'post';
    $data_attr['title'] = get_the_title($data_attr['current_id']);
} elseif ('term.php' == $pagenow || 'edit-tags.php' == $pagenow) {
    global $tag;
    $data_attr['current_id'] = $tag->term_id;
    $data_attr['termId'] = $tag->term_id;
    $data_attr['origin'] = 'term';
    $data_attr['data_tax'] = $tag->taxonomy;
    $data_attr['title'] = $tag->name;
   
}

?>
<div id="tabs-2">
    <div class="box-lefteasy">
        <p class="description-alt desc-fb">
            <?php esc_html_e('LinkedIn, Instagram, WhatsApp and Pinterest use the same social metadata as Facebook. Twitter does the same if no Twitter cards tags are defined below.', 'wp-rankology'); ?>
        </p>
        <p class="social-post-settlbl facebook-lble">
            <span class="dashicons dashicons-facebook-alt"></span>
            <span><?php esc_html_e('Facebook', 'wp-rankology'); ?></span>
        </p>
        <p>
            <span class="dashicons dashicons-redo"></span>
            <a href="https://developers.facebook.com/tools/debug/sharing/?q=<?php echo get_permalink(get_the_id()); ?>"
               target="_blank">
                <?php esc_html_e('Ask Facebook to update its cache', 'wp-rankology'); ?>
            </a>
        </p>
        <p>
            <label for="rankology_social_fb_title_meta"><?php esc_html_e('Facebook Title', 'wp-rankology'); ?></label>
            <input id="rankology_social_fb_title_meta" type="text"
                   name="rankology_social_fb_title"
                   class="components-text-control__input"
                   placeholder="<?php esc_html_e('Enter your Facebook title', 'wp-rankology'); ?>"
                   aria-label="<?php esc_html_e('Facebook Title', 'wp-rankology'); ?>"
                   value="<?php echo $rankology_social_fb_title; ?>"/>
        </p>
        <p>
            <label for="rankology_social_fb_desc_meta"><?php esc_html_e('Facebook description', 'wp-rankology'); ?></label>
            <textarea id="rankology_social_fb_desc_meta" name="rankology_social_fb_desc"
                      class="components-text-control__input"
                      placeholder="<?php esc_html_e('Enter your Facebook description', 'wp-rankology'); ?>"
                      aria-label="<?php esc_html_e('Facebook description', 'wp-rankology'); ?>"><?php echo $rankology_social_fb_desc; ?></textarea>
        </p>
        <p>
            <label for="rankology_social_fb_img_meta">
                <?php esc_html_e('Facebook Thumbnail', 'wp-rankology'); ?>
            </label>
            <input id="rankology_social_fb_img_meta" type="text"
                   name="rankology_social_fb_img"
                   class="components-text-control__input rankology_social_fb_img_meta"
                   placeholder="<?php esc_html_e('Select your default thumbnail', 'wp-rankology'); ?>"
                   aria-label="<?php esc_html_e('Facebook Thumbnail', 'wp-rankology'); ?>"
                   value="<?php echo $rankology_social_fb_img; ?>"/>
        </p>
        <p class="description">
            <?php esc_html_e('Minimum size: 200x200px, ideal ratio 1.91:1, 8Mb max. (e.g. 1640x856px or 3280x1712px for retina screens)', 'wp-rankology'); ?>
        </p>
        <p>
            <input type="hidden" name="rankology_social_fb_img_attachment_id"
                   id="rankology_social_fb_img_attachment_id"
                   class="rankology_social_fb_img_attachment_id"
                   value="<?php echo esc_html($rankology_social_fb_img_attachment_id); ?>">
            <input type="hidden" name="rankology_social_fb_img_width"
                   id="rankology_social_fb_img_width" class="rankology_social_fb_img_width"
                   value="<?php echo esc_html($rankology_social_fb_img_width); ?>">
            <input type="hidden" name="rankology_social_fb_img_height"
                   id="rankology_social_fb_img_height"
                   class="rankology_social_fb_img_height"
                   value="<?php echo esc_html($rankology_social_fb_img_height); ?>">

            <input id="rankology_social_fb_img_upload"
                   class="<?php echo rankology_btn_secondary_classes(); ?>"
                   type="button"
                   value="<?php esc_html_e('Upload an Image', 'wp-rankology'); ?>"/>
        </p>
    </div>
    <div class="box-right">
        <div class="facebook-snippet-preview">
            <h3>
                <?php esc_html_e('Facebook Preview', 'wp-rankology'); ?>
            </h3>
            <?php if ('1' == rankology_get_toggle_option('social')) { ?>
                <p>
                    <?php esc_html_e('This is what your post will look like in Facebook. You have to publish your post to get the Facebook Preview.', 'wp-rankology'); ?>
                </p>
            <?php } else { ?>
                <p class="notice notice-error">
                    <?php esc_html_e('The Social Platforms feature is disabled. Still seing informations from the FB Preview? You probably have social tags added by your theme or a plugin.', 'wp-rankology'); ?>
                </p>
            <?php } ?>
            <div class="facebook-snippet-box">
                <div class="snippet-fb-img-alert alert1" style="display:none">
                    <p class="notice notice-error"><?php esc_html_e('File type not supported by Facebook. Please choose another image.', 'wp-rankology'); ?>
                    </p>
                </div>
                <div class="snippet-fb-img-alert alert2" style="display:none">
                    <p class="notice notice-error"><?php esc_html_e('Minimum size for Facebook is <strong>200x200px</strong>. Please choose another image.', 'wp-rankology'); ?>
                    </p>
                </div>
                <div class="snippet-fb-img-alert alert3" style="display:none">
                    <p class="notice notice-error"><?php esc_html_e('File error. Please choose another image.', 'wp-rankology'); ?>
                    </p>
                </div>
                <div class="snippet-fb-img-alert alert4" style="display:none">
                    <p class="notice notice-info"><?php esc_html_e('Your image ratio is: ', 'wp-rankology'); ?>
                        <span></span>.
                        <?php esc_html_e('The closer to 1.91 the better.', 'wp-rankology'); ?>
                    </p>
                </div>
                <div class="snippet-fb-img-alert alert5" style="display:none">
                    <p class="notice notice-error"><?php esc_html_e('File URL is not valid.', 'wp-rankology'); ?>
                    </p>
                </div>
                <div class="snippet-fb-img-alert alert6" style="display:none">
                    <p class="notice notice-warning"><?php esc_html_e('Your filesize is: ', 'wp-rankology'); ?>
                        <span></span>
                        <?php esc_html_e('This is superior to 300KB. WhatsApp will not use your image.', 'wp-rankology'); ?>
                    </p>
                </div>
                <div class="snippet-fb-img">

                    <img src="<?php echo RANKOLOGY_ASSETS_DIR . '/images/placeholder-image.png'; ?>"
                         width="524" height="274" alt=""
                         aria-label=""/>
                    <span class="rankology_social_fb_img_upload"></span>
                </div>
                <div class="snippet-fb-img-custom" style="display:none"><img src=""
                                                                             width="524"
                                                                             height="274"
                                                                             alt=""
                                                                             aria-label=""/><span
                        class="rankology_social_fb_img_upload"></span></div>
                <div class="snippet-fb-img-default" style="display:none"><img src=""
                                                                              width="524"
                                                                              height="274"
                                                                              alt=""
                                                                              aria-label=""/><span
                        class="rankology_social_fb_img_upload"></span></div>
                <div class="facebook-snippet-text">
                    <div class="snippet-meta">
                        <div class="snippet-fb-url"></div>
                        <!--                                                    <div class="fb-sep">|</div>-->
                        <!--                                                    <div class="fb-by">--><?php //esc_html_e('By ', 'wp-rankology'); ?>
                        <!--                                                    </div>-->
                        <div class="snippet-fb-site-name"></div>
                    </div>
                    <div class="title-desc">
                        <div class="snippet-fb-title"></div>
                        <div class="snippet-fb-title-custom"></div>
                        <?php


                        ?>
                        <?php
                        if (get_the_title($data_attr['current_id'])) { ?>
                            <div class="snippet-fb-title-default"
                            ><?php the_title(); ?> -
                                <?php bloginfo('name'); ?>
                            </div>
                        <?php }
                        $tags = get_the_tags($data_attr['current_id']); ?>
                        <div class="snippet-fb-title-default">
                            <?php if ($tags) {
                                foreach ($tags as $tag) {
                                    echo $tag->name . ' - ';
                                }
                            }
                            bloginfo('name'); ?>
                        </div>
                        <?php ?>
                        <div class="snippet-fb-description">...</div>
                        <div class="snippet-fb-description-custom"
                        ></div>
                        <div class="snippet-fb-description-default"
                        ></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="box-lefteasy">
        <p class="social-post-settlbl twiter-lble">
            <span class="dashicons dashicons-twitter"></span>
            <span><?php esc_html_e('Twitter', 'wp-rankology'); ?></span>
        </p>

        <p>
            <span class="dashicons dashicons-redo"></span>
            <a href="https://cards-dev.twitter.com/validator" target="_blank">
                <?php esc_html_e('Preview your Twitter card using the official validator', 'wp-rankology'); ?>
            </a>
        </p>
        <p>
            <label for="rankology_social_twitter_title_meta"><?php esc_html_e('Twitter Title', 'wp-rankology'); ?></label>
            <input id="rankology_social_twitter_title_meta" type="text"
                   class="components-text-control__input"
                   name="rankology_social_twitter_title"
                   placeholder="<?php esc_html_e('Enter your Twitter title', 'wp-rankology'); ?>"
                   aria-label="<?php esc_html_e('Twitter Title', 'wp-rankology'); ?>"
                   value="<?php echo $rankology_social_twitter_title; ?>"/>
        </p>
        <p>
            <label for="rankology_social_twitter_desc_meta"><?php esc_html_e('Twitter description', 'wp-rankology'); ?></label>
            <textarea id="rankology_social_twitter_desc_meta"
                      name="rankology_social_twitter_desc"
                      class="components-text-control__input"
                      placeholder="<?php esc_html_e('Enter your Twitter description', 'wp-rankology'); ?>"
                      aria-label="<?php esc_html_e('Twitter description', 'wp-rankology'); ?>"><?php echo $rankology_social_twitter_desc; ?></textarea>
        </p>
        <p>
            <label for="rankology_social_twitter_img_meta"><?php esc_html_e('Twitter Thumbnail', 'wp-rankology'); ?></label>
            <input id="rankology_social_twitter_img_meta" type="text"
                   class="components-text-control__input rankology_social_twitter_img_meta"
                   name="rankology_social_twitter_img"
                   placeholder="<?php esc_html_e('Select your default thumbnail', 'wp-rankology'); ?>"
                   value="<?php echo $rankology_social_twitter_img; ?>"/>
        </p>
        <p class="description">
            <?php esc_html_e('Minimum size: 144x144px (300x157px with large card enabled), ideal ratio 1:1 (2:1 with large card), 5Mb max.', 'wp-rankology'); ?>
        </p>
        <p>
            <input type="hidden" name="rankology_social_twitter_img_attachment_id"
                   id="rankology_social_twitter_img_attachment_id"
                   class="rankology_social_twitter_img_attachment_id"
                   value="<?php echo esc_html($rankology_social_twitter_img_attachment_id); ?>">
            <input type="hidden" name="rankology_social_twitter_img_width"
                   id="rankology_social_twitter_img_width"
                   class="rankology_social_twitter_img_width"
                   value="<?php echo esc_html($rankology_social_twitter_img_width); ?>">
            <input type="hidden" name="rankology_social_twitter_img_height"
                   id="rankology_social_twitter_img_height"
                   class="rankology_social_twitter_img_height"
                   value="<?php echo esc_html($rankology_social_twitter_img_height); ?>">

            <input id="rankology_social_twitter_img_upload"
                   class="<?php echo rankology_btn_secondary_classes(); ?>"
                   type="button"
                   aria-label="<?php esc_html_e('Twitter Thumbnail', 'wp-rankology'); ?>"
                   value="<?php esc_html_e('Upload an Image', 'wp-rankology'); ?>"/>
        </p>
    </div>
    <div class="box-right">
        <div class="twitter-snippet-preview">
            <h3><?php esc_html_e('Twitter Preview', 'wp-rankology'); ?>
            </h3>
            <?php if ('1' == rankology_get_toggle_option('social')) { ?>
                <p><?php esc_html_e('This is what your post will look like in Twitter. You have to publish your post to get the Twitter Preview.', 'wp-rankology'); ?>
                </p>
            <?php } else { ?>
                <p class="notice notice-error"><?php esc_html_e('The Social Platforms feature is disabled. Still seing informations from the Twitter Preview? You probably have social tags added by your theme or a plugin.', 'wp-rankology'); ?>
                </p>
            <?php } ?>
            <div class="twitter-snippet-box">
                <div class="snippet-twitter-img-alert alert1" style="display:none">
                    <p class="notice notice-error"><?php esc_html_e('File type not supported by Twitter. Please choose another image.', 'wp-rankology'); ?>
                    </p>
                </div>
                <div class="snippet-twitter-img-alert alert2" style="display:none">
                    <p class="notice notice-error"><?php esc_html_e('Minimum size for Twitter is <strong>144x144px</strong>. Please choose another image.', 'wp-rankology'); ?>
                    </p>
                </div>
                <div class="snippet-twitter-img-alert alert3" style="display:none">
                    <p class="notice notice-error"><?php esc_html_e('File error. Please choose another image.', 'wp-rankology'); ?>
                    </p>
                </div>
                <div class="snippet-twitter-img-alert alert4" style="display:none">
                    <p class="notice notice-info"><?php esc_html_e('Your image ratio is: ', 'wp-rankology'); ?>
                        <span></span>.
                        <?php esc_html_e('The closer to 1 the better (with large card, 2 is better).', 'wp-rankology'); ?>
                    </p>
                </div>
                <div class="snippet-twitter-img-alert alert5" style="display:none">
                    <p class="notice notice-error"><?php esc_html_e('File URL is not valid.', 'wp-rankology'); ?>
                    </p>
                </div>
                <div class="snippet-twitter-img"><img
                        src="<?php echo RANKOLOGY_ASSETS_DIR . '/images/placeholder-image.png'; ?>"
                        width="524" height="274" alt=""
                        aria-label=""/><span
                        class="rankology_social_twitter_img_upload"></span></div>
                <div class="snippet-twitter-img-custom" style="display:none"><img src=""
                                                                                  width="600"
                                                                                  height="314"
                                                                                  alt=""
                                                                                  aria-label=""/><span
                        class="rankology_social_twitter_img_upload"></span></div>
                <div class="snippet-twitter-img-default" style="display:none"><img src=""
                                                                                   width="600"
                                                                                   height="314"
                                                                                   alt=""
                                                                                   aria-label=""/><span
                        class="rankology_social_twitter_img_upload"></span></div>

                <div class="twitter-snippet-text">
                    <div class="title-desc">
                        <div class="snippet-twitter-title"></div>
                        <div class="snippet-twitter-title-custom"
                        ></div>
                        <?php


                        ?>
                        <?php
                        if (get_the_title($data_attr['current_id'])) { ?>
                            <div class="snippet-twitter-title-default">
                                <?php the_title(); ?> -
                                <?php bloginfo('name'); ?>
                            </div>
                        <?php }
                        $tags = get_the_tags($data_attr['current_id']); ?>
                        <div class="snippet-twitter-title-default">
                            <?php if ($tags) {
                                foreach ($tags as $tag) {
                                    echo $tag->name . ' - ';
                                }
                            }
                            bloginfo('name'); ?>
                        </div>
                        <?php ?>

                        <div class="snippet-twitter-description">...</div>
                        <div class="snippet-twitter-description-custom"
                             style="display:none"></div>
                        <div class="snippet-twitter-description-default"
                             style="display:none"></div>
                    </div>
                    <div class="snippet-meta">
                        <div class="snippet-twitter-url"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>