<?php

/**
 * Title: Gallery Pro
 * Slug: walker-core/manifold-pro-gallery
 * Categories: manifold-pro
 */
$manifold_gallery_img = array(
    WALKER_CORE_URL . 'admin/images/manifold/gallery-img-1.jpg',
    WALKER_CORE_URL . 'admin/images/manifold/gallery-img-2.jpg',
    WALKER_CORE_URL . 'admin/images/manifold/gallery-img-3.jpg',
    WALKER_CORE_URL . 'admin/images/manifold/gallery-img-4.jpg',
    WALKER_CORE_URL . 'admin/images/manifold/gallery-img-5.jpg'
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"100px","bottom":"100px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"60px"}},"layout":{"type":"constrained","wideSize":"1180px"}} -->
    <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textTransform":"uppercase"}},"textColor":"secondary"} -->
            <h4 class="wp-block-heading has-text-align-center has-secondary-color has-text-color has-link-color" style="text-transform:uppercase"><?php esc_html_e('-Portfolio', 'walker-core') ?></h4>
            <!-- /wp:heading -->

            <!-- wp:heading {"textAlign":"center","style":{"typography":{"textTransform":"capitalize"}}} -->
            <h2 class="wp-block-heading has-text-align-center" style="text-transform:capitalize"><?php esc_html_e('Our Gallery From Works', 'walker-core') ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"layout":{"type":"constrained"}} -->
        <div class="wp-block-group"><!-- wp:columns -->
            <div class="wp-block-columns"><!-- wp:column -->
                <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($manifold_gallery_img[0]) ?>","id":694,"dimRatio":50,"isUserOverlayColor":true,"customGradient":"linear-gradient(0deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)","contentPosition":"bottom left","style":{"border":{"radius":"10px"}},"className":"manifold-pro-gallery-cover","layout":{"type":"constrained"}} -->
                    <div class="wp-block-cover has-custom-content-position is-position-bottom-left manifold-pro-gallery-cover" style="border-radius:10px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(0deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)"></span><img class="wp-block-cover__image-background wp-image-694" alt="" src="<?php echo esc_url($manifold_gallery_img[0]) ?>" data-object-fit="cover" />
                        <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"constrained"}} -->
                            <div class="wp-block-group"><!-- wp:heading {"level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|Light"}}}},"textColor":"Light"} -->
                                <h4 class="wp-block-heading has-light-color has-text-color has-link-color"><?php esc_html_e('UI/UX Design', 'walker-core') ?></h4>
                                <!-- /wp:heading -->

                                <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|Light"}}}},"textColor":"Light","className":"manifold-text-decoration-none"} -->
                                <p class="manifold-text-decoration-none has-light-color has-text-color has-link-color"><a href="#"><?php esc_html_e('Read More', 'walker-core') ?></a></p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                    </div>
                    <!-- /wp:cover -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column -->
                <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($manifold_gallery_img[1]) ?>","id":695,"dimRatio":50,"isUserOverlayColor":true,"customGradient":"linear-gradient(0deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)","contentPosition":"bottom left","style":{"border":{"radius":"10px"}},"className":"manifold-pro-gallery-cover","layout":{"type":"constrained"}} -->
                    <div class="wp-block-cover has-custom-content-position is-position-bottom-left manifold-pro-gallery-cover" style="border-radius:10px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(0deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)"></span><img class="wp-block-cover__image-background wp-image-695" alt="" src="<?php echo esc_url($manifold_gallery_img[1]) ?>" data-object-fit="cover" />
                        <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"constrained"}} -->
                            <div class="wp-block-group"><!-- wp:heading {"level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|Light"}}}},"textColor":"Light"} -->
                                <h4 class="wp-block-heading has-light-color has-text-color has-link-color"><?php esc_html_e('Graphic Design', 'walker-core') ?></h4>
                                <!-- /wp:heading -->

                                <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|Light"}}}},"textColor":"Light","className":"manifold-text-decoration-none"} -->
                                <p class="manifold-text-decoration-none has-light-color has-text-color has-link-color"><a href="#"><?php esc_html_e('Read More', 'walker-core') ?></a></p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                    </div>
                    <!-- /wp:cover -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column -->
                <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($manifold_gallery_img[2]) ?>","id":696,"dimRatio":50,"isUserOverlayColor":true,"customGradient":"linear-gradient(0deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)","contentPosition":"bottom left","style":{"border":{"radius":"10px"}},"className":"manifold-pro-gallery-cover","layout":{"type":"constrained"}} -->
                    <div class="wp-block-cover has-custom-content-position is-position-bottom-left manifold-pro-gallery-cover" style="border-radius:10px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(0deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)"></span><img class="wp-block-cover__image-background wp-image-696" alt="" src="<?php echo esc_url($manifold_gallery_img[2]) ?>" data-object-fit="cover" />
                        <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"constrained"}} -->
                            <div class="wp-block-group"><!-- wp:heading {"level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|Light"}}}},"textColor":"Light"} -->
                                <h4 class="wp-block-heading has-light-color has-text-color has-link-color"><?php esc_html_e('Content Creation', 'walker-core') ?></h4>
                                <!-- /wp:heading -->

                                <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|Light"}}}},"textColor":"Light","className":"manifold-text-decoration-none"} -->
                                <p class="manifold-text-decoration-none has-light-color has-text-color has-link-color"><a href="#"><?php esc_html_e('Read More', 'walker-core') ?></a></p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                    </div>
                    <!-- /wp:cover -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->

            <!-- wp:columns -->
            <div class="wp-block-columns"><!-- wp:column -->
                <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($manifold_gallery_img[3]) ?>","id":706,"dimRatio":50,"isUserOverlayColor":true,"customGradient":"linear-gradient(0deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)","contentPosition":"bottom left","style":{"border":{"radius":"10px"}},"className":"manifold-pro-gallery-cover","layout":{"type":"constrained"}} -->
                    <div class="wp-block-cover has-custom-content-position is-position-bottom-left manifold-pro-gallery-cover" style="border-radius:10px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(0deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)"></span><img class="wp-block-cover__image-background wp-image-706" alt="" src="<?php echo esc_url($manifold_gallery_img[3]) ?>" data-object-fit="cover" />
                        <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"constrained"}} -->
                            <div class="wp-block-group"><!-- wp:heading {"level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|Light"}}}},"textColor":"Light"} -->
                                <h4 class="wp-block-heading has-light-color has-text-color has-link-color"><?php esc_html_e('Problem-solving', 'walker-core') ?></h4>
                                <!-- /wp:heading -->

                                <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|Light"}}}},"textColor":"Light","className":"manifold-text-decoration-none"} -->
                                <p class="manifold-text-decoration-none has-light-color has-text-color has-link-color"><a href="#"><?php esc_html_e('Read More', 'walker-core') ?></a></p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                    </div>
                    <!-- /wp:cover -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column -->
                <div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url($manifold_gallery_img[4]) ?>","id":707,"dimRatio":50,"isUserOverlayColor":true,"customGradient":"linear-gradient(0deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)","contentPosition":"bottom left","style":{"border":{"radius":"10px"}},"className":"manifold-pro-gallery-cover","layout":{"type":"constrained"}} -->
                    <div class="wp-block-cover has-custom-content-position is-position-bottom-left manifold-pro-gallery-cover" style="border-radius:10px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(0deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)"></span><img class="wp-block-cover__image-background wp-image-707" alt="" src="<?php echo esc_url($manifold_gallery_img[4]) ?>" data-object-fit="cover" />
                        <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"constrained"}} -->
                            <div class="wp-block-group"><!-- wp:heading {"level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|Light"}}}},"textColor":"Light"} -->
                                <h4 class="wp-block-heading has-light-color has-text-color has-link-color"><?php esc_html_e('Web Design', 'walker-core') ?></h4>
                                <!-- /wp:heading -->

                                <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|Light"}}}},"textColor":"Light","className":"manifold-text-decoration-none"} -->
                                <p class="manifold-text-decoration-none has-light-color has-text-color has-link-color"><a href="#"><?php esc_html_e('Read More', 'walker-core') ?></a></p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                    </div>
                    <!-- /wp:cover -->
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