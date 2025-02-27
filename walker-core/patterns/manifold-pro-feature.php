<?php

/**
 * Title: Feature Pro
 * Slug: walker-core/manifold-pro-feature
 * Categories: manifold-pro
 */
$manifold_feature_img = array(
    WALKER_CORE_URL . 'admin/images/manifold/features-img-1.jpg',
    WALKER_CORE_URL . 'admin/images/manifold/features-img-2.jpg',
    WALKER_CORE_URL . 'admin/images/manifold/features-img-3.jpg'
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"100px","bottom":"100px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"60px"}},"layout":{"type":"constrained","wideSize":"1180px"}} -->
    <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary"} -->
            <h4 class="wp-block-heading has-text-align-center has-secondary-color has-text-color has-link-color" style="text-transform:uppercase"><?php esc_html_e('-Features', 'walker-core') ?></h4>
            <!-- /wp:heading -->

            <!-- wp:heading {"textAlign":"center","style":{"typography":{"textTransform":"capitalize"}}} -->
            <h2 class="wp-block-heading has-text-align-center" style="text-transform:capitalize"><?php esc_html_e('Our Features', 'walker-core') ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"layout":{"type":"constrained"}} -->
        <div class="wp-block-group"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"30px","left":"30px"}}}} -->
            <div class="wp-block-columns"><!-- wp:column {"width":"33%"} -->
                <div class="wp-block-column" style="flex-basis:33%"><!-- wp:group {"style":{"border":{"radius":"10px"},"spacing":{"blockGap":"20px"}},"layout":{"type":"constrained","wideSize":"345px"}} -->
                    <div class="wp-block-group" style="border-radius:10px"><!-- wp:cover {"url":"<?php echo esc_url($manifold_feature_img[0]) ?>","id":411,"dimRatio":0,"customOverlayColor":"#e3e9d2","isUserOverlayColor":true,"isDark":false,"style":{"dimensions":{"aspectRatio":"1"},"border":{"radius":"10px"}},"className":"manifold-pro-feature-image","layout":{"type":"constrained"}} -->
                        <div class="wp-block-cover is-light manifold-pro-feature-image" style="border-radius:10px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#e3e9d2"></span><img class="wp-block-cover__image-background wp-image-411" alt="" src="<?php echo esc_url($manifold_feature_img[0]) ?>" data-object-fit="cover" />
                            <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                                <p class="has-text-align-center has-large-font-size"></p>
                                <!-- /wp:paragraph -->
                            </div>
                        </div>
                        <!-- /wp:cover -->

                        <!-- wp:group {"style":{"spacing":{"blockGap":"15px"}},"layout":{"type":"constrained"}} -->
                        <div class="wp-block-group"><!-- wp:heading {"level":4} -->
                            <h4 class="wp-block-heading"><?php esc_html_e('Graphic Design', 'walker-core') ?></h4>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground"} -->
                            <p class="has-foreground-color has-text-color has-link-color"><?php esc_html_e('Logos, merchandise and more. Anyone can create nice graphics. We think it’s better to create memorable ones.', 'walker-core') ?></p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"width":"33%"} -->
                <div class="wp-block-column" style="flex-basis:33%"><!-- wp:group {"style":{"border":{"radius":"10px"},"spacing":{"blockGap":"20px"}},"layout":{"type":"constrained","wideSize":"345px"}} -->
                    <div class="wp-block-group" style="border-radius:10px"><!-- wp:cover {"url":"<?php echo esc_url($manifold_feature_img[1]) ?>","id":423,"dimRatio":0,"customOverlayColor":"#dfccd1","isUserOverlayColor":true,"isDark":false,"style":{"dimensions":{"aspectRatio":"1"},"border":{"radius":"10px"}},"className":"manifold-pro-feature-image","layout":{"type":"constrained"}} -->
                        <div class="wp-block-cover is-light manifold-pro-feature-image" style="border-radius:10px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#dfccd1"></span><img class="wp-block-cover__image-background wp-image-423" alt="" src="<?php echo esc_url($manifold_feature_img[1]) ?>" data-object-fit="cover" />
                            <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                                <p class="has-text-align-center has-large-font-size"></p>
                                <!-- /wp:paragraph -->
                            </div>
                        </div>
                        <!-- /wp:cover -->

                        <!-- wp:group {"style":{"spacing":{"blockGap":"15px"}},"layout":{"type":"constrained"}} -->
                        <div class="wp-block-group"><!-- wp:heading {"level":4} -->
                            <h4 class="wp-block-heading"><?php esc_html_e('Web Developer', 'walker-core') ?></h4>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground"} -->
                            <p class="has-foreground-color has-text-color has-link-color"><?php esc_html_e('Logos, merchandise and more. Anyone can create nice graphics. We think it’s better to create memorable ones.', 'walker-core') ?></p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"width":"33%"} -->
                <div class="wp-block-column" style="flex-basis:33%"><!-- wp:group {"style":{"border":{"radius":"10px"},"spacing":{"blockGap":"20px"}},"layout":{"type":"constrained","wideSize":"345px"}} -->
                    <div class="wp-block-group" style="border-radius:10px"><!-- wp:cover {"url":"<?php echo esc_url($manifold_feature_img[2]) ?>","id":424,"dimRatio":0,"customOverlayColor":"#d0cc8d","isUserOverlayColor":true,"isDark":false,"style":{"dimensions":{"aspectRatio":"1"},"border":{"radius":"10px"}},"className":"manifold-pro-feature-image","layout":{"type":"constrained"}} -->
                        <div class="wp-block-cover is-light manifold-pro-feature-image" style="border-radius:10px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#d0cc8d"></span><img class="wp-block-cover__image-background wp-image-424" alt="" src="<?php echo esc_url($manifold_feature_img[2]) ?>" data-object-fit="cover" />
                            <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                                <p class="has-text-align-center has-large-font-size"></p>
                                <!-- /wp:paragraph -->
                            </div>
                        </div>
                        <!-- /wp:cover -->

                        <!-- wp:group {"style":{"spacing":{"blockGap":"15px"}},"layout":{"type":"constrained"}} -->
                        <div class="wp-block-group"><!-- wp:heading {"level":4} -->
                            <h4 class="wp-block-heading"><?php esc_html_e('Content Creation', 'walker-core') ?></h4>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground"} -->
                            <p class="has-foreground-color has-text-color has-link-color"><?php esc_html_e('Logos, merchandise and more. Anyone can create nice graphics. We think it’s better to create memorable ones.', 'walker-core') ?></p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->