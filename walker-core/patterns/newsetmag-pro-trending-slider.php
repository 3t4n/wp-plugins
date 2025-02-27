<?php

/**
 * Title: Trending News Slider
 * Slug: walker-core/newsetmag-pro-trending-slider
 * Categories:newsetmag-pro
 */
$newsetmag_trending_img = array(
    WALKER_CORE_URL . 'admin/images/newsetmag/trending-icon.png',

);
?>
<!-- wp:group {"metadata":{"categories":["newsetmag-pro"],"patternName":"walker-core/newsetmag-pro-trending-slider","name":"Trending News Slider"},"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0","padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"25px","bottom":"25px"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:25px;padding-right:var(--wp--preset--spacing--40);padding-bottom:25px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"constrained","wideSize":"1180px"}} -->
    <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
        <div class="wp-block-columns alignwide"><!-- wp:column {"width":"15%"} -->
            <div class="wp-block-column" style="flex-basis:15%"><!-- wp:group {"style":{"spacing":{"blockGap":"20px","margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:image {"id":2216,"width":"40px","sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($newsetmag_trending_img[0]) ?>" alt="" class="wp-image-2216" style="width:40px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:heading {"fontSize":"slightly-small"} -->
                    <h2 class="wp-block-heading has-slightly-small-font-size"><?php esc_html_e('Trending News :', 'walker-core') ?></h2>
                    <!-- /wp:heading -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","width":"80%","style":{"spacing":{"blockGap":"0","padding":{"right":"20px","left":"20px","top":"0","bottom":"0"}}}} -->
            <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:20px;padding-bottom:0;padding-left:20px;flex-basis:80%"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained","wideSize":"","justifyContent":"left"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:walker-core/post-carousel {"clientId":"9b8c2fc1-60ea-45d4-bbf4-f062df4e59ad","gridOptions":{"masonry":false,"columnCount":2,"gap":30},"pagination":{"enabled":false,"default":{"width":10,"height":10,"borderRadius":10,"color":"#000","colorHover":""},"active":{"width":"","height":"","borderRadius":"","offset":0,"border":{"width":"","style":"","color":""},"color":"#f49805","borderColorHover":"","colorHover":""},"verticalPosition":-26,"gap":4},"navigation":{"enabled":false,"hoverShow":true,"size":16,"boxWidth":35,"boxHeight":35,"borderRadius":50,"border":{"width":"","style":"","color":""},"boxColor":"#5566ca","color":"#fff","boxColorHover":"","borderColorHover":"","colorHover":""},"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"textColor":"foreground"} -->
                    <div class="wp-block-walker-core-post-carousel has-foreground-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                        <div class="walker-core-post-block layout-carousel  nav-hover-show  carousel-direction-horizontal" id="walkerCore_9b8c2fc1_60ea_45d4_bbf4_f062df4e59ad"><!-- wp:query {"queryId":1,"query":{"perPage":10,"postType":"post","inherit":false,"offset":"0","pages":"0"},"lock":{"move":false,"remove":true},"className":"walker-core-post__swiper-container"} -->
                            <div class="wp-block-query walker-core-post__swiper-container"><!-- wp:post-template {"lock":{"move":false,"remove":true},"className":"walker-core__grid-wrapper swiper-wrapper","style":{"spacing":{"blockGap":"0"}}} -->
                                <!-- wp:post-title {"isLink":true,"className":"is-style-title-hover-secondary newsetmag-text-decoration-none","style":{"typography":{"fontSize":"16px"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}}} /-->
                                <!-- /wp:post-template -->
                            </div>
                            <!-- /wp:query -->
                        </div>
                    </div>
                    <!-- /wp:walker-core/post-carousel -->
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