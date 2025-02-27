<?php

/**
 * Title: Blog Slider
 * Slug: walker-core/fundifly-blog-carousel
 * Categories: fundifly-charity-pro
 */
?>
<!-- wp:group {"metadata":{"categories":["fundifly-charity-template"],"patternName":"fundifly-charity/recent-blog","name":"Recent Blog"},"style":{"spacing":{"padding":{"top":"80px","bottom":"80px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="padding-top:80px;padding-right:var(--wp--preset--spacing--40);padding-bottom:80px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"layout":{"type":"constrained","wideSize":"1180px"}} -->
    <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground-alt"}}},"typography":{"textTransform":"uppercase"}},"textColor":"foreground-alt","fontSize":"slightly-small"} -->
            <p class="has-foreground-alt-color has-text-color has-link-color has-slightly-small-font-size" style="text-transform:uppercase"><?php esc_html_e('Blogs', 'walker-core') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"style":{"typography":{"fontSize":"44px"}}} -->
            <h2 class="wp-block-heading" style="font-size:44px"><?php esc_html_e('Recent News and Articles', 'walker-core') ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"fundifly-pro-top-navigation","layout":{"type":"constrained"}} -->
        <div class="wp-block-group fundifly-pro-top-navigation"><!-- wp:walker-core/post-carousel {"clientId":"81022854-525e-4ca3-807c-49d9fad62ea3","pagination":{"enabled":false,"default":{"width":10,"height":10,"borderRadius":10,"color":"#000","colorHover":""},"active":{"width":"","height":"","borderRadius":"","offset":0,"border":{"width":"","style":"","color":""},"color":"#f49805","borderColorHover":"","colorHover":""},"verticalPosition":-26,"gap":4},"navigation":{"enabled":true,"hoverShow":false,"size":16,"boxWidth":35,"boxHeight":35,"borderRadius":4,"border":{"width":"","style":"","color":""},"boxColor":"#03866E","color":"#ffffff","boxColorHover":"#D7C739","borderColorHover":"","colorHover":"#ffffff"},"sliderOptions":{"direction":"horizontal","autoplay":{"enabled":true,"pauseOnMouseEnter":true,"delay":2500},"loop":true,"centeredSlides":true,"slidesPerView":3,"spaceBetween":30,"speed":1500,"effect":"none"}} -->
            <div class="wp-block-walker-core-post-carousel">
                <div class="walker-core-post-block layout-carousel    carousel-direction-horizontal" id="walkerCore_81022854_525e_4ca3_807c_49d9fad62ea3"><!-- wp:query {"queryId":1,"query":{"perPage":"10","postType":"post","offset":"0"},"lock":{"move":false,"remove":true},"className":"walker-core-post__swiper-container"} -->
                    <div class="wp-block-query walker-core-post__swiper-container"><!-- wp:post-template {"lock":{"move":false,"remove":true},"className":"walker-core__grid-wrapper swiper-wrapper","layout":{"type":"default","columnCount":3}} -->
                        <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"10px"}},"fontSize":"slightly-small","layout":{"inherit":false}} -->
                        <div class="wp-block-group has-slightly-small-font-size" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-featured-image {"isLink":true,"width":"","height":"285px","className":"is-style-cover-hover-zoom-in","style":{"border":{"radius":"8px"}}} /-->

                            <!-- wp:group {"style":{"spacing":{"blockGap":"15px"}},"layout":{"type":"constrained"}} -->
                            <div class="wp-block-group"><!-- wp:post-date {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground-alt"}}}},"textColor":"foreground-alt"} /-->

                                <!-- wp:post-title {"isLink":true,"className":"is-style-title-hover-primary","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"textColor":"black","fontSize":"large-medium"} /-->

                                <!-- wp:post-excerpt {"excerptLength":15,"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground"} /-->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:group -->
                        <!-- /wp:post-template -->
                    </div>
                    <!-- /wp:query -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
            <!-- /wp:walker-core/post-carousel -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->