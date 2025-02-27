<?php

/**
 * Title: Blog Grid
 * Slug: walker-core/nexum-pro-blog-grid
 * Categories: nexum-pro
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"30px","bottom":"30px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"Light","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-light-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:30px;padding-right:var(--wp--preset--spacing--40);padding-bottom:30px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"layout":{"type":"constrained","wideSize":"1180px"}} -->
    <div class="wp-block-group"><!-- wp:group {"layout":{"type":"constrained"}} -->
        <div class="wp-block-group"><!-- wp:heading {"level":6,"style":{"typography":{"textTransform":"uppercase"}}} -->
            <h6 class="wp-block-heading" style="text-transform:uppercase"><?php esc_html_e('Grid Layout', 'walker-core') ?></h6>
            <!-- /wp:heading -->

            <!-- wp:separator {"gradient":"primary-gradient","className":"is-style-wide"} -->
            <hr class="wp-block-separator has-alpha-channel-opacity has-primary-gradient-gradient-background has-background is-style-wide" />
            <!-- /wp:separator -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"layout":{"type":"constrained"}} -->
        <div class="wp-block-group"><!-- wp:query {"queryId":154,"query":{"perPage":"6","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
            <div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":2}} -->
                <!-- wp:group {"style":{"border":{"radius":"15px"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"className":"is-style-group-border-gradient nexum-blog-card nexum-blog-card-shadow","layout":{"type":"constrained"}} -->
                <div class="wp-block-group is-style-group-border-gradient nexum-blog-card nexum-blog-card-shadow" style="border-radius:15px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"top":"0","left":"10px"},"padding":{"top":"10px","bottom":"10px","left":"10px","right":"10px"}},"border":{"radius":"15px"}},"backgroundColor":"white"} -->
                    <div class="wp-block-columns is-not-stacked-on-mobile has-white-background-color has-background" style="border-radius:15px;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><!-- wp:column {"verticalAlignment":"center","width":""} -->
                        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3","width":"100%","height":"","style":{"border":{"radius":"15px"}}} /--></div>
                        <!-- /wp:column -->

                        <!-- wp:column {"verticalAlignment":"center","width":""} -->
                        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"className":"nexum-blog-cover-info","layout":{"type":"constrained","justifyContent":"left"}} -->
                            <div class="wp-block-group nexum-blog-cover-info"><!-- wp:post-title {"level":6,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"textColor":"black","className":"nexum-text-decoration-none is-style-title-hover-secondary"} /-->

                                <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"},"fontSize":"xx-small"} -->
                                <div class="wp-block-group has-xx-small-font-size"><!-- wp:post-date {"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading"}}}},"textColor":"heading"} /-->

                                    <!-- wp:read-more {"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading"}}}},"textColor":"heading"} /-->
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
                <!-- /wp:post-template -->
            </div>
            <!-- /wp:query -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->