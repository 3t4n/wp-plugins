<?php

/**
 * Title: Blog Grid
 * Slug: walker-core/newsetmag-pro-blog-grid
 * Categories:newsetmag-pro
 */
?>
<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"20px","bottom":"20px"},"blockGap":"0"}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:20px;padding-right:var(--wp--preset--spacing--40);padding-bottom:20px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"20px","margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"constrained","wideSize":"1180px"}} -->
    <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"right":"10px","left":"10px"},"margin":{"top":"0","bottom":"0"}},"border":{"left":{"color":"var:preset|color|primary","width":"4px"}}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group" style="border-left-color:var(--wp--preset--color--primary);border-left-width:4px;margin-top:0;margin-bottom:0;padding-right:10px;padding-left:10px"><!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontSize":"20px"}}} -->
            <h3 class="wp-block-heading" style="font-size:20px;text-transform:uppercase"><?php esc_html_e('Grid Post Layout', 'walker-core') ?></h3>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"layout":{"type":"constrained"}} -->
        <div class="wp-block-group"><!-- wp:query {"queryId":65,"query":{"perPage":"6","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
            <div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
                <!-- wp:group {"style":{"spacing":{"blockGap":"15px"}},"layout":{"type":"constrained","wideSize":""}} -->
                <div class="wp-block-group"><!-- wp:cover {"useFeaturedImage":true,"isUserOverlayColor":true,"minHeight":195,"gradient":"secondary-gradient","contentPosition":"bottom left","className":"is-style-cover-hover-zoom-in","layout":{"type":"constrained","wideSize":"275px"}} -->
                    <div class="wp-block-cover has-custom-content-position is-position-bottom-left is-style-cover-hover-zoom-in" style="min-height:195px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-secondary-gradient-gradient-background"></span>
                        <div class="wp-block-cover__inner-container"><!-- wp:post-terms {"term":"category","style":{"typography":{"fontSize":"9px"}},"className":"is-style-category-background-three"} /--></div>
                    </div>
                    <!-- /wp:cover -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group"><!-- wp:post-title {"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|dark"}}},"typography":{"fontSize":"20px"}},"textColor":"dark","className":"newsetmag-text-decoration-none is-style-title-hover-secondary"} /-->

                        <!-- wp:post-excerpt {"excerptLength":20,"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}},"typography":{"fontSize":"11px"}},"textColor":"foreground"} /-->

                        <!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}},"typography":{"textTransform":"capitalize","fontSize":"8px"},"spacing":{"blockGap":"10px"}},"textColor":"foreground","className":"newsetmag-text-decoration-none","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
                        <div class="wp-block-group newsetmag-text-decoration-none has-foreground-color has-text-color has-link-color" style="font-size:8px;text-transform:capitalize"><!-- wp:post-author-name {"isLink":true} /-->

                            <!-- wp:post-date /-->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
                <!-- /wp:post-template -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"20px"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:20px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:query-pagination {"className":"is-style-pagination-primary","layout":{"type":"flex","justifyContent":"center"}} -->
                    <!-- wp:query-pagination-previous {"label":"Prev"} /-->

                    <!-- wp:query-pagination-numbers {"midSize":0} /-->

                    <!-- wp:query-pagination-next {"label":"Next"} /-->
                    <!-- /wp:query-pagination -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:query -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->