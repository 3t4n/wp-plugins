<?php

/**
 * Title: Blog Layout with Sidebar
 * Slug: walker-core/newsetmag-pro-card-sidebar
 * Categories:newsetmag-pro
 */
$newsetmag_sidebar_img = array(
    WALKER_CORE_URL . 'admin/images/newsetmag/avatar.jpg',
);
?>
<!-- wp:group {"metadata":{"categories":["newsetmag-pro"],"patternName":"walker-core/newsetmag-pro-card-slider","name":"Blog Layout with Sidebar"},"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"20px","bottom":"20px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"0"}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:20px;padding-right:var(--wp--preset--spacing--40);padding-bottom:20px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","wideSize":"1180px"}} -->
    <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:columns {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":{"top":"15px","left":"24px"}}}} -->
        <div class="wp-block-columns" style="margin-top:0;margin-bottom:0"><!-- wp:column {"width":"70%"} -->
            <div class="wp-block-column" style="flex-basis:70%"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","wideSize":"1180px"}} -->
                        <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0","padding":{"right":"10px","left":"10px"}},"border":{"left":{"color":"var:preset|color|primary","width":"4px"}}},"layout":{"type":"constrained"}} -->
                            <div class="wp-block-group" style="border-left-color:var(--wp--preset--color--primary);border-left-width:4px;margin-top:0;margin-bottom:0;padding-right:10px;padding-left:10px"><!-- wp:heading {"style":{"typography":{"fontSize":"20px","textTransform":"uppercase"}}} -->
                                <h2 class="wp-block-heading" style="font-size:20px;text-transform:uppercase"><?php esc_html_e('Popular Posts', 'walker-core') ?></h2>
                                <!-- /wp:heading -->
                            </div>
                            <!-- /wp:group -->

                            <!-- wp:columns -->
                            <div class="wp-block-columns"><!-- wp:column {"width":"50%"} -->
                                <div class="wp-block-column" style="flex-basis:50%"><!-- wp:query {"queryId":32,"query":{"perPage":"4","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
                                    <div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"grid","columnCount":1}} -->
                                        <!-- wp:group {"style":{"border":{"width":"1px"}},"borderColor":"foreground-alt","layout":{"type":"constrained","wideSize":""}} -->
                                        <div class="wp-block-group has-border-color has-foreground-alt-border-color" style="border-width:1px"><!-- wp:columns {"isStackedOnMobile":false,"className":"newsetmag-blog-list-hover","style":{"spacing":{"blockGap":{"top":"0","left":"15px"},"margin":{"top":"0","bottom":"0"},"padding":{"top":"10px","bottom":"10px","left":"10px","right":"10px"}},"border":{"width":"0px","style":"none"}}} -->
                                            <div class="wp-block-columns is-not-stacked-on-mobile newsetmag-blog-list-hover" style="border-style:none;border-width:0px;margin-top:0;margin-bottom:0;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><!-- wp:column {"verticalAlignment":"center","width":"120px","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0"}}} -->
                                                <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:120px"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"1","width":"120px","height":"110px","className":"is-style-cover-hover-zoom-in"} /--></div>
                                                <!-- /wp:column -->

                                                <!-- wp:column {"verticalAlignment":"center","width":"","style":{"spacing":{"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"}}}} -->
                                                <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"10px","padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained","wideSize":"100%","justifyContent":"left"}} -->
                                                    <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-terms {"term":"category","className":"is-style-category-background-three","style":{"typography":{"fontSize":"9px","textTransform":"uppercase"}}} /-->

                                                        <!-- wp:post-title {"isLink":true,"align":"wide","className":"newsetmag-text-decoration-none is-style-title-hover-secondary","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"textColor":"black","fontSize":"normal"} /-->

                                                        <!-- wp:post-date {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground","fontSize":"tiny"} /-->
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
                                <!-- /wp:column -->

                                <!-- wp:column {"width":"50%"} -->
                                <div class="wp-block-column" style="flex-basis:50%"><!-- wp:query {"queryId":32,"query":{"perPage":"4","pages":0,"offset":"4","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
                                    <div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"grid","columnCount":1}} -->
                                        <!-- wp:group {"style":{"border":{"width":"1px"}},"borderColor":"foreground-alt","layout":{"type":"constrained","wideSize":""}} -->
                                        <div class="wp-block-group has-border-color has-foreground-alt-border-color" style="border-width:1px"><!-- wp:columns {"isStackedOnMobile":false,"className":"newsetmag-blog-list-hover","style":{"spacing":{"blockGap":{"top":"0","left":"15px"},"margin":{"top":"0","bottom":"0"},"padding":{"top":"10px","bottom":"10px","left":"10px","right":"10px"}},"border":{"width":"0px","style":"none"}}} -->
                                            <div class="wp-block-columns is-not-stacked-on-mobile newsetmag-blog-list-hover" style="border-style:none;border-width:0px;margin-top:0;margin-bottom:0;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><!-- wp:column {"verticalAlignment":"center","width":"120px","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0"}}} -->
                                                <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:120px"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"1","width":"120px","height":"110px","className":"is-style-cover-hover-zoom-in"} /--></div>
                                                <!-- /wp:column -->

                                                <!-- wp:column {"verticalAlignment":"center","width":"","style":{"spacing":{"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"}}}} -->
                                                <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"10px","padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained","wideSize":"200px","justifyContent":"left"}} -->
                                                    <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-terms {"term":"category","className":"is-style-category-background-three","style":{"typography":{"fontSize":"9px","textTransform":"uppercase"}}} /-->

                                                        <!-- wp:post-title {"isLink":true,"align":"wide","className":"newsetmag-text-decoration-none is-style-title-hover-secondary","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"textColor":"black","fontSize":"normal"} /-->

                                                        <!-- wp:post-date {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground","fontSize":"tiny"} /-->
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
                                <!-- /wp:column -->
                            </div>
                            <!-- /wp:columns -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"20px","bottom":"20px","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group has-white-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:20px;padding-right:0;padding-bottom:20px;padding-left:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"constrained","wideSize":"1180px"}} -->
                        <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:columns -->
                            <div class="wp-block-columns"><!-- wp:column {"width":"","style":{"spacing":{"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"}}}} -->
                                <div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0px"}},"layout":{"type":"constrained"}} -->
                                    <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:group {"style":{"spacing":{"padding":{"right":"10px","left":"10px"},"margin":{"bottom":"20px"}},"border":{"left":{"color":"var:preset|color|primary","width":"4px"}}},"layout":{"type":"constrained"}} -->
                                        <div class="wp-block-group" style="border-left-color:var(--wp--preset--color--primary);border-left-width:4px;margin-bottom:20px;padding-right:10px;padding-left:10px"><!-- wp:heading {"style":{"typography":{"fontSize":"20px","textTransform":"uppercase"}}} -->
                                            <h2 class="wp-block-heading" style="font-size:20px;text-transform:uppercase"><?php esc_html_e('Recent Posts', 'walker-core') ?></h2>
                                            <!-- /wp:heading -->
                                        </div>
                                        <!-- /wp:group -->

                                        <!-- wp:group {"layout":{"type":"constrained"}} -->
                                        <div class="wp-block-group"><!-- wp:query {"queryId":68,"query":{"perPage":"1","pages":0,"offset":"4","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
                                            <div class="wp-block-query"><!-- wp:post-template -->
                                                <!-- wp:group {"style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"constrained"}} -->
                                                <div class="wp-block-group"><!-- wp:cover {"useFeaturedImage":true,"isUserOverlayColor":true,"gradient":"primary-gradient","contentPosition":"bottom left","className":"is-style-cover-hover-zoom-in","style":{"spacing":{"padding":{"top":"20px","bottom":"20px","left":"20px","right":"20px"}}},"layout":{"type":"constrained"}} -->
                                                    <div class="wp-block-cover has-custom-content-position is-position-bottom-left is-style-cover-hover-zoom-in" style="padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-primary-gradient-gradient-background"></span>
                                                        <div class="wp-block-cover__inner-container"><!-- wp:post-terms {"term":"category","className":"is-style-category-background-three","style":{"typography":{"fontSize":"9px"}}} /--></div>
                                                    </div>
                                                    <!-- /wp:cover -->

                                                    <!-- wp:group {"style":{"spacing":{"blockGap":"10px","padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained"}} -->
                                                    <div class="wp-block-group" style="padding-right:0;padding-left:0"><!-- wp:post-title {"isLink":true,"className":"newsetmag-text-decoration-none is-style-title-hover-primary","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"textColor":"black","fontSize":"very-large"} /-->

                                                        <!-- wp:post-excerpt {"showMoreOnNewLine":false,"excerptLength":25,"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground","fontSize":"normal"} /-->

                                                        <!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}},"typography":{"textTransform":"capitalize"}},"textColor":"foreground","fontSize":"tiny","layout":{"type":"flex","flexWrap":"nowrap"}} -->
                                                        <div class="wp-block-group has-foreground-color has-text-color has-link-color has-tiny-font-size" style="text-transform:capitalize"><!-- wp:post-author-name {"isLink":true,"className":"newsetmag-text-decoration-none"} /-->

                                                            <!-- wp:post-date /-->
                                                        </div>
                                                        <!-- /wp:group -->
                                                    </div>
                                                    <!-- /wp:group -->
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
                                <!-- /wp:column -->

                                <!-- wp:column {"width":""} -->
                                <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"margin":{"top":"40px","bottom":"0"}}},"layout":{"type":"constrained"}} -->
                                    <div class="wp-block-group" style="margin-top:40px;margin-bottom:0"><!-- wp:query {"queryId":32,"query":{"perPage":"4","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
                                        <div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"grid","columnCount":1}} -->
                                            <!-- wp:group {"layout":{"type":"constrained","wideSize":""}} -->
                                            <div class="wp-block-group"><!-- wp:columns {"isStackedOnMobile":false,"className":"newsetmag-blog-list-hover","style":{"spacing":{"blockGap":{"top":"0","left":"15px"},"margin":{"top":"0","bottom":"0"},"padding":{"top":"10px","bottom":"10px","left":"10px","right":"10px"}},"border":{"width":"1px"}},"borderColor":"foreground-alt"} -->
                                                <div class="wp-block-columns is-not-stacked-on-mobile newsetmag-blog-list-hover has-border-color has-foreground-alt-border-color" style="border-width:1px;margin-top:0;margin-bottom:0;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><!-- wp:column {"verticalAlignment":"center","width":"120px","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0"}}} -->
                                                    <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:120px"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"1","width":"120px","height":"110px","className":"is-style-cover-hover-zoom-in"} /--></div>
                                                    <!-- /wp:column -->

                                                    <!-- wp:column {"verticalAlignment":"center","width":"","style":{"spacing":{"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"}}}} -->
                                                    <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"10px","padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained","wideSize":"200px","justifyContent":"left"}} -->
                                                        <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-terms {"term":"category","className":"is-style-category-background-secondary","style":{"typography":{"fontSize":"9px","textTransform":"uppercase"}}} /-->

                                                            <!-- wp:post-title {"isLink":true,"align":"wide","className":"newsetmag-text-decoration-none is-style-title-hover-secondary","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"textColor":"black","fontSize":"normal"} /-->

                                                            <!-- wp:post-date {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground","fontSize":"tiny"} /-->
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
                                <!-- /wp:column -->
                            </div>
                            <!-- /wp:columns -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"20px","bottom":"20px","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group has-white-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:20px;padding-right:0;padding-bottom:20px;padding-left:0"><!-- wp:group {"layout":{"type":"constrained","wideSize":"1180px"}} -->
                        <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"padding":{"right":"9px","left":"9px"}},"border":{"left":{"color":"var:preset|color|primary","width":"4px"},"top":[],"right":[],"bottom":[]}},"layout":{"type":"constrained"}} -->
                            <div class="wp-block-group" style="border-left-color:var(--wp--preset--color--primary);border-left-width:4px;padding-right:9px;padding-left:9px"><!-- wp:heading {"style":{"typography":{"fontSize":"20px","textTransform":"uppercase"}}} -->
                                <h2 class="wp-block-heading" style="font-size:20px;text-transform:uppercase"><?php esc_html_e('Blog Posts', 'walker-core') ?></h2>
                                <!-- /wp:heading -->
                            </div>
                            <!-- /wp:group -->

                            <!-- wp:group {"layout":{"type":"constrained"}} -->
                            <div class="wp-block-group"><!-- wp:query {"queryId":1,"query":{"perPage":"1","postType":"post","offset":"4","pages":"0"},"lock":{"move":false,"remove":false}} -->
                                <div class="wp-block-query"><!-- wp:post-template {"lock":{"move":false,"remove":false}} -->
                                    <!-- wp:group {"layout":{"type":"constrained"}} -->
                                    <div class="wp-block-group"><!-- wp:cover {"useFeaturedImage":true,"isUserOverlayColor":true,"minHeight":500,"gradient":"primary-gradient","contentPosition":"bottom left","className":"is-style-cover-hover-zoom-in","style":{"spacing":{"padding":{"top":"20px","bottom":"20px","left":"20px","right":"20px"}}},"layout":{"type":"constrained"}} -->
                                        <div class="wp-block-cover has-custom-content-position is-position-bottom-left is-style-cover-hover-zoom-in" style="padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;min-height:500px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-primary-gradient-gradient-background"></span>
                                            <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"15px"}},"layout":{"type":"constrained"}} -->
                                                <div class="wp-block-group"><!-- wp:post-terms {"term":"category","className":"is-style-category-background-three","style":{"typography":{"fontSize":"9px"}}} /-->

                                                    <!-- wp:post-title {"isLink":true,"className":"newsetmag-text-decoration-none is-style-title-hover-secondary","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white","fontSize":"very-large"} /-->

                                                    <!-- wp:group {"className":"newsetmag-text-decoration-none","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"typography":{"textTransform":"capitalize"}},"textColor":"white","fontSize":"tiny","layout":{"type":"flex","flexWrap":"nowrap"}} -->
                                                    <div class="wp-block-group newsetmag-text-decoration-none has-white-color has-text-color has-link-color has-tiny-font-size" style="text-transform:capitalize"><!-- wp:post-author-name {"isLink":true} /-->

                                                        <!-- wp:post-date /-->
                                                    </div>
                                                    <!-- /wp:group -->
                                                </div>
                                                <!-- /wp:group -->
                                            </div>
                                        </div>
                                        <!-- /wp:cover -->
                                    </div>
                                    <!-- /wp:group -->
                                    <!-- /wp:post-template -->
                                </div>
                                <!-- /wp:query -->
                            </div>
                            <!-- /wp:group -->

                            <!-- wp:group {"layout":{"type":"constrained"}} -->
                            <div class="wp-block-group"><!-- wp:query {"queryId":32,"query":{"perPage":"4","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
                                <div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"grid","columnCount":2}} -->
                                    <!-- wp:group {"layout":{"type":"constrained","wideSize":""}} -->
                                    <div class="wp-block-group"><!-- wp:columns {"isStackedOnMobile":false,"className":"newsetmag-blog-list-hover","style":{"spacing":{"blockGap":{"top":"0","left":"15px"},"margin":{"top":"0","bottom":"0"},"padding":{"top":"10px","bottom":"10px","left":"10px","right":"10px"}},"border":{"width":"1px"}},"borderColor":"foreground-alt"} -->
                                        <div class="wp-block-columns is-not-stacked-on-mobile newsetmag-blog-list-hover has-border-color has-foreground-alt-border-color" style="border-width:1px;margin-top:0;margin-bottom:0;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><!-- wp:column {"verticalAlignment":"center","width":"120px","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0"}}} -->
                                            <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:120px"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"1","width":"120px","height":"110px","className":"is-style-cover-hover-zoom-in"} /--></div>
                                            <!-- /wp:column -->

                                            <!-- wp:column {"verticalAlignment":"center","width":"","style":{"spacing":{"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"}}}} -->
                                            <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"10px","padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained","wideSize":"200px","justifyContent":"left"}} -->
                                                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-terms {"term":"category","className":"is-style-category-background-three","style":{"typography":{"fontSize":"9px","textTransform":"uppercase"}}} /-->

                                                    <!-- wp:post-title {"isLink":true,"align":"wide","className":"newsetmag-text-decoration-none is-style-title-hover-secondary","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"textColor":"black","fontSize":"normal"} /-->

                                                    <!-- wp:post-date {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground","fontSize":"tiny"} /-->
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

                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"20px","bottom":"20px","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group has-white-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:20px;padding-right:0;padding-bottom:20px;padding-left:0"><!-- wp:group {"layout":{"type":"constrained","wideSize":"1180px"}} -->
                        <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"padding":{"right":"10px","left":"10px"}},"border":{"radius":"0px","left":{"color":"#4294F5","width":"4px"},"top":[],"right":[],"bottom":[]}},"layout":{"type":"constrained"}} -->
                            <div class="wp-block-group" style="border-radius:0px;border-left-color:#4294F5;border-left-width:4px;padding-right:10px;padding-left:10px"><!-- wp:heading {"style":{"typography":{"fontSize":"20px","textTransform":"uppercase"}}} -->
                                <h2 class="wp-block-heading" style="font-size:20px;text-transform:uppercase"><?php esc_html_e('Recent articles', 'walker-core') ?></h2>
                                <!-- /wp:heading -->
                            </div>
                            <!-- /wp:group -->

                            <!-- wp:group {"style":{"spacing":{"margin":{"top":"30px","bottom":"30px"}}},"layout":{"type":"constrained"}} -->
                            <div class="wp-block-group" style="margin-top:30px;margin-bottom:30px"><!-- wp:query {"queryId":14,"query":{"perPage":"5","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
                                <div class="wp-block-query"><!-- wp:post-template -->
                                    <!-- wp:columns {"align":"wide","className":"newsetmag-blog-list-hover","style":{"border":{"width":"1px"},"spacing":{"padding":{"top":"20px","bottom":"20px","left":"20px","right":"20px"}}},"borderColor":"border-alt"} -->
                                    <div class="wp-block-columns alignwide newsetmag-blog-list-hover has-border-color has-border-alt-border-color" style="border-width:1px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px"><!-- wp:column {"width":"40%"} -->
                                        <div class="wp-block-column" style="flex-basis:40%"><!-- wp:cover {"useFeaturedImage":true,"isUserOverlayColor":true,"minHeight":250,"gradient":"secondary-gradient","contentPosition":"bottom left","className":"is-style-cover-hover-zoom-in","layout":{"type":"constrained","wideSize":"100%"}} -->
                                            <div class="wp-block-cover has-custom-content-position is-position-bottom-left is-style-cover-hover-zoom-in" style="min-height:250px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-secondary-gradient-gradient-background"></span>
                                                <div class="wp-block-cover__inner-container"><!-- wp:post-terms {"term":"category","className":"newsetmag-text-decoration-none is-style-category-background-three","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"typography":{"fontSize":"9px"}},"textColor":"white"} /--></div>
                                            </div>
                                            <!-- /wp:cover -->
                                        </div>
                                        <!-- /wp:column -->

                                        <!-- wp:column {"verticalAlignment":"center","width":"60%","style":{"spacing":{"blockGap":"0"}}} -->
                                        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%"><!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"constrained"}} -->
                                            <div class="wp-block-group"><!-- wp:post-title {"isLink":true,"className":"newsetmag-text-decoration-none is-style-title-hover-secondary","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"textColor":"black","fontSize":"very-large"} /-->

                                                <!-- wp:post-excerpt {"showMoreOnNewLine":false,"excerptLength":20,"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground","fontSize":"normal"} /-->

                                                <!-- wp:group {"style":{"spacing":{"blockGap":"10px"},"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground","fontSize":"slightly-small","layout":{"type":"flex","flexWrap":"nowrap"}} -->
                                                <div class="wp-block-group has-foreground-color has-text-color has-link-color has-slightly-small-font-size"><!-- wp:post-author-name {"isLink":true,"className":"newsetmag-text-decoration-none","style":{"typography":{"textTransform":"capitalize"}}} /-->

                                                    <!-- wp:post-date /-->
                                                </div>
                                                <!-- /wp:group -->
                                            </div>
                                            <!-- /wp:group -->
                                        </div>
                                        <!-- /wp:column -->
                                    </div>
                                    <!-- /wp:columns -->
                                    <!-- /wp:post-template -->

                                    <!-- wp:query-pagination {"className":"newsetmag-blog-pagination is-style-pagination-primary","style":{"elements":{"link":{"color":{"text":"var:preset|color|dark"}}}},"textColor":"dark"} -->
                                    <!-- wp:query-pagination-previous {"label":"Prev","fontSize":"normal"} /-->

                                    <!-- wp:query-pagination-numbers {"midSize":0,"fontSize":"normal"} /-->

                                    <!-- wp:query-pagination-next {"label":"Next","fontSize":"normal"} /-->
                                    <!-- /wp:query-pagination -->
                                </div>
                                <!-- /wp:query -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"30%"} -->
            <div class="wp-block-column" style="flex-basis:30%"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"blockGap":"0px"}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
                <div class="wp-block-group has-white-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"padding":{"right":"10px","left":"10px"},"margin":{"top":"0px","bottom":"0px"}},"border":{"left":{"color":"var:preset|color|primary","width":"4px"}},"elements":{"link":{"color":{"text":"var:preset|color|dark"}}}},"textColor":"dark","layout":{"type":"constrained"}} -->
                        <div class="wp-block-group has-dark-color has-text-color has-link-color" style="border-left-color:var(--wp--preset--color--primary);border-left-width:4px;margin-top:0px;margin-bottom:0px;padding-right:10px;padding-left:10px"><!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"20px","textTransform":"uppercase"}}} -->
                            <h3 class="wp-block-heading" style="font-size:20px;text-transform:uppercase"><?php esc_html_e('Author Details', 'walker-core') ?></h3>
                            <!-- /wp:heading -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:group {"style":{"border":{"width":"1px"},"spacing":{"blockGap":"0px","margin":{"top":"30px","bottom":"30px"}}},"borderColor":"foreground-alt","layout":{"type":"constrained"}} -->
                        <div class="wp-block-group has-border-color has-foreground-alt-border-color" style="border-width:1px;margin-top:30px;margin-bottom:30px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"40px","bottom":"40px","left":"50px","right":"50px"}}},"layout":{"type":"constrained"}} -->
                            <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:40px;padding-right:50px;padding-bottom:40px;padding-left:50px"><!-- wp:image {"id":2559,"width":"120px","height":"120px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"100px","width":"4px"}},"borderColor":"primary"} -->
                                <figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url($newsetmag_sidebar_img[0]) ?>" alt="" class="has-border-color has-primary-border-color wp-image-2559" style="border-width:4px;border-radius:100px;object-fit:cover;width:120px;height:120px" /></figure>
                                <!-- /wp:image -->

                                <!-- wp:group {"layout":{"type":"constrained","wideSize":"243px"}} -->
                                <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"textColor":"black","fontSize":"large-medium"} -->
                                    <h3 class="wp-block-heading has-text-align-center has-black-color has-text-color has-link-color has-large-medium-font-size"><?php esc_html_e('Anna Riley', 'walker-core') ?></h3>
                                    <!-- /wp:heading -->

                                    <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground","fontSize":"slightly-small"} -->
                                    <p class="has-text-align-center has-foreground-color has-text-color has-link-color has-slightly-small-font-size"><?php esc_html_e('Members of Kanta Dab Dab, a band specialising in fusion of local Nepali and Western music elements, talk about their...', 'walker-core') ?></p>
                                    <!-- /wp:paragraph -->

                                    <!-- wp:social-links {"iconColor":"white","iconColorValue":"#ffffff","size":"has-small-icon-size","style":{"spacing":{"blockGap":{"left":"5px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
                                    <ul class="wp-block-social-links has-small-icon-size has-icon-color"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                                        <!-- wp:social-link {"url":"#","service":"x"} /-->

                                        <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                                        <!-- wp:social-link {"url":"#","service":"youtube"} /-->
                                    </ul>
                                    <!-- /wp:social-links -->
                                </div>
                                <!-- /wp:group -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:query {"queryId":32,"query":{"perPage":"4","pages":0,"offset":"0","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
                    <div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"grid","columnCount":1}} -->
                        <!-- wp:group {"style":{"border":{"width":"1px"}},"borderColor":"foreground-alt","layout":{"type":"constrained","wideSize":""}} -->
                        <div class="wp-block-group has-border-color has-foreground-alt-border-color" style="border-width:1px"><!-- wp:columns {"isStackedOnMobile":false,"className":"newsetmag-blog-list-hover","style":{"spacing":{"blockGap":{"top":"0","left":"15px"},"margin":{"top":"0","bottom":"0"},"padding":{"top":"10px","bottom":"10px","left":"10px","right":"10px"}},"border":{"width":"0px","style":"none"}}} -->
                            <div class="wp-block-columns is-not-stacked-on-mobile newsetmag-blog-list-hover" style="border-style:none;border-width:0px;margin-top:0;margin-bottom:0;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><!-- wp:column {"verticalAlignment":"center","width":"120px","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0"}}} -->
                                <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:120px"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"1","width":"120px","height":"110px","className":"is-style-cover-hover-zoom-in"} /--></div>
                                <!-- /wp:column -->

                                <!-- wp:column {"verticalAlignment":"center","width":"","style":{"spacing":{"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"}}}} -->
                                <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"10px","padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained","wideSize":"200px","justifyContent":"left"}} -->
                                    <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-terms {"term":"category","className":"is-style-category-background-three","style":{"typography":{"fontSize":"9px","textTransform":"uppercase"}}} /-->

                                        <!-- wp:post-title {"isLink":true,"align":"wide","className":"newsetmag-text-decoration-none is-style-title-hover-secondary","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"textColor":"black","fontSize":"normal"} /-->

                                        <!-- wp:post-date {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground","fontSize":"tiny"} /-->
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

                    <!-- wp:group {"style":{"spacing":{"margin":{"top":"30px","bottom":"30px"},"blockGap":"20px"}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group" style="margin-top:30px;margin-bottom:30px"><!-- wp:group {"style":{"spacing":{"padding":{"right":"10px","left":"10px"}},"border":{"left":{"color":"var:preset|color|primary","width":"4px"},"top":[],"right":[],"bottom":[]}},"layout":{"type":"constrained"}} -->
                        <div class="wp-block-group" style="border-left-color:var(--wp--preset--color--primary);border-left-width:4px;padding-right:10px;padding-left:10px"><!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"20px","textTransform":"uppercase"}}} -->
                            <h3 class="wp-block-heading" style="font-size:20px;text-transform:uppercase"><?php esc_html_e('Follow Us', 'walker-core') ?></h3>
                            <!-- /wp:heading -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:social-links {"size":"has-normal-icon-size","className":"is-style-social-links-pointed","style":{"spacing":{"blockGap":{"left":"14px"}}}} -->
                        <ul class="wp-block-social-links has-normal-icon-size is-style-social-links-pointed"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                            <!-- wp:social-link {"url":"#","service":"x"} /-->

                            <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                            <!-- wp:social-link {"url":"#","service":"youtube"} /-->

                            <!-- wp:social-link {"url":"#","service":"linkedin"} /-->

                            <!-- wp:social-link {"url":"#","service":"pinterest"} /-->

                            <!-- wp:social-link {"url":"#","service":"telegram"} /-->
                        </ul>
                        <!-- /wp:social-links -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"style":{"spacing":{"margin":{"top":"30px","bottom":"30px"},"blockGap":"20px"},"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"textColor":"black","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group has-black-color has-text-color has-link-color" style="margin-top:30px;margin-bottom:30px"><!-- wp:group {"style":{"spacing":{"padding":{"right":"10px","left":"10px"}},"border":{"left":{"color":"var:preset|color|primary","width":"4px"},"top":[],"right":[],"bottom":[]}},"layout":{"type":"constrained"}} -->
                        <div class="wp-block-group" style="border-left-color:var(--wp--preset--color--primary);border-left-width:4px;padding-right:10px;padding-left:10px"><!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"20px","textTransform":"uppercase"}}} -->
                            <h3 class="wp-block-heading" style="font-size:20px;text-transform:uppercase"><?php esc_html_e('Popular Tags', 'walker-core') ?></h3>
                            <!-- /wp:heading -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:tag-cloud {"numberOfTags":20,"smallestFontSize":"14px","largestFontSize":"14px","className":"newsetmag-text-decoration-none is-style-tag-background-foreground-alt","style":{"typography":{"letterSpacing":"0px","lineHeight":"2"}}} /-->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"className":"newsetmag-text-decoration-none","style":{"spacing":{"margin":{"top":"30px","bottom":"30px"},"blockGap":"20px"},"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"textColor":"black","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group newsetmag-text-decoration-none has-black-color has-text-color has-link-color" style="margin-top:30px;margin-bottom:30px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"10px","left":"10px"}},"border":{"left":{"color":"var:preset|color|primary","width":"4px"},"top":[],"right":[],"bottom":[]}},"layout":{"type":"constrained"}} -->
                        <div class="wp-block-group" style="border-left-color:var(--wp--preset--color--primary);border-left-width:4px;margin-top:0;margin-bottom:0;padding-right:10px;padding-left:10px"><!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"20px","textTransform":"uppercase"}}} -->
                            <h3 class="wp-block-heading" style="font-size:20px;text-transform:uppercase"><?php esc_html_e('Top Categories', 'walker-core') ?></h3>
                            <!-- /wp:heading -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:categories {"showPostCounts":true,"className":"newsetmag-list-style-none is-style-category-hover-primary","style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"normal","fontFamily":"outfit"} /-->
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