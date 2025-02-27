<?php

/**
 * Title: Blog Cover and Grid
 * Slug: walker-core/nexum-pro-cover-grid
 * Categories:nexum-pro
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"30px","bottom":"30px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"Light","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-light-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:30px;padding-right:var(--wp--preset--spacing--40);padding-bottom:30px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"layout":{"type":"constrained","wideSize":"1180px"}} -->
    <div class="wp-block-group"><!-- wp:columns -->
        <div class="wp-block-columns"><!-- wp:column {"width":""} -->
            <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"10px","bottom":"10px","left":"10px","right":"10px"}},"border":{"radius":"10px"}},"backgroundColor":"white","className":"nexum-blog-card-shadow nexum-blog-card is-style-group-border-gradient","layout":{"type":"constrained","wideSize":""}} -->
                <div class="wp-block-group nexum-blog-card-shadow nexum-blog-card is-style-group-border-gradient has-white-background-color has-background" style="border-radius:10px;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><!-- wp:query {"queryId":46,"query":{"perPage":"1","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
                    <div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"0px"}}} -->
                        <!-- wp:group {"layout":{"type":"constrained"}} -->
                        <div class="wp-block-group"><!-- wp:post-featured-image {"isLink":true,"style":{"border":{"radius":"10px"}},"className":"nexum-blog-image"} /--></div>
                        <!-- /wp:group -->

                        <!-- wp:group {"style":{"spacing":{"padding":{"right":"10px","left":"10px","top":"15px","bottom":"15px"},"margin":{"top":"0","bottom":"0"},"blockGap":"15px"}},"layout":{"type":"constrained"}} -->
                        <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:15px;padding-right:10px;padding-bottom:15px;padding-left:10px"><!-- wp:post-terms {"term":"category","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"className":"nexum-text-decoration-none nexum-categories-comma is-style-categories-background-triple"} /-->

                            <!-- wp:group {"style":{"spacing":{"blockGap":"10px","margin":{"top":"15px","bottom":"0"},"padding":{"right":"0","left":"0","bottom":"0"}}},"className":"nexum-blog-cover-info","layout":{"type":"constrained"}} -->
                            <div class="wp-block-group nexum-blog-cover-info" style="margin-top:15px;margin-bottom:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-title {"level":4,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"textColor":"black","className":"nexum-text-decoration-none is-style-title-hover-secondary"} /-->

                                <!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading"}}}},"textColor":"heading","layout":{"type":"flex","flexWrap":"nowrap"},"fontSize":"xx-small"} -->
                                <div class="wp-block-group has-heading-color has-text-color has-link-color has-xx-small-font-size"><!-- wp:post-author-name {"isLink":true,"style":{"typography":{"textTransform":"capitalize"},"elements":{"link":{"color":{"text":"var:preset|color|heading"}}}},"textColor":"heading","className":"nexum-text-decoration-none"} /-->

                                    <!-- wp:post-date /-->
                                </div>
                                <!-- /wp:group -->

                                <!-- wp:post-excerpt {"moreText":"Read More","excerptLength":25,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading"}}},"spacing":{"padding":{"right":"0","left":"0","top":"15px","bottom":"15px"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"textColor":"heading","fontSize":"x-small"} /-->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:group -->
                        <!-- /wp:post-template -->
                    </div>
                    <!-- /wp:query -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"layout":{"type":"constrained","wideSize":"100%"}} -->
                <div class="wp-block-group"><!-- wp:query {"queryId":13,"query":{"perPage":"3","pages":"0","offset":"1","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
                    <div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"grid","columnCount":3}} -->
                        <!-- wp:columns {"verticalAlignment":"center"} -->
                        <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"375px"} -->
                            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:375px"><!-- wp:group {"style":{"spacing":{"blockGap":"20px","padding":{"top":"10px","bottom":"10px","left":"10px","right":"10px"}},"border":{"radius":"15px"}},"backgroundColor":"white","className":"nexum-blog-card-shadow nexum-blog-card is-style-group-border-gradient","layout":{"type":"constrained","wideSize":"100%"}} -->
                                <div class="wp-block-group nexum-blog-card-shadow nexum-blog-card is-style-group-border-gradient has-white-background-color has-background" style="border-radius:15px;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":50,"overlayColor":"black","isUserOverlayColor":true,"minHeight":255,"minHeightUnit":"px","contentPosition":"bottom center","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"border":{"radius":"15px"}},"textColor":"white","className":"nexum-blog-cover","layout":{"type":"constrained","wideSize":"375px"}} -->
                                    <div class="wp-block-cover has-custom-content-position is-position-bottom-center nexum-blog-cover has-white-color has-text-color has-link-color" style="border-radius:15px;min-height:255px"><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim"></span>
                                        <div class="wp-block-cover__inner-container"><!-- wp:post-terms {"term":"category","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"typography":{"textTransform":"uppercase"}},"textColor":"white","className":"nexum-text-decoration-none nexum-categories-comma is-style-categories-background-triple","fontSize":"xx-small"} /--></div>
                                    </div>
                                    <!-- /wp:cover -->

                                    <!-- wp:group {"style":{"spacing":{"blockGap":"10px","padding":{"right":"10px","left":"10px"}},"border":{"top":{"style":"none","width":"0px"},"right":[],"bottom":[],"left":[]}},"className":"nexum-blog-cover-info","layout":{"type":"constrained"}} -->
                                    <div class="wp-block-group nexum-blog-cover-info" style="border-top-style:none;border-top-width:0px;padding-right:10px;padding-left:10px"><!-- wp:post-title {"level":5,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"textColor":"black","className":"nexum-text-decoration-none is-style-title-hover-secondary"} /-->

                                        <!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading"}}}},"textColor":"heading","layout":{"type":"flex","flexWrap":"nowrap"},"fontSize":"xx-small"} -->
                                        <div class="wp-block-group has-heading-color has-text-color has-link-color has-xx-small-font-size"><!-- wp:post-author-name {"isLink":true,"style":{"typography":{"textTransform":"capitalize"},"elements":{"link":{"color":{"text":"var:preset|color|heading"}}}},"textColor":"heading","className":"nexum-text-decoration-none"} /-->

                                            <!-- wp:post-date /-->
                                        </div>
                                        <!-- /wp:group -->
                                    </div>
                                    <!-- /wp:group -->
                                </div>
                                <!-- /wp:group -->
                            </div>
                            <!-- /wp:column -->
                        </div>
                        <!-- /wp:columns -->
                        <!-- /wp:post-template -->
                    </div>
                    <!-- /wp:query -->
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