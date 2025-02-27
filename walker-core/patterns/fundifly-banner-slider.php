<?php

/**
 * Title: Full Width Banner Slider 
 * Slug: walker-core/fundifly-banner-slider
 * Categories: fundifly-charity-pro
 */
$fundifly_banner_img = array(
    WALKER_CORE_URL . 'admin/images/fundifly-charity/banner-1.jpg',
    WALKER_CORE_URL . 'admin/images/fundifly-charity/banner-2.jpg',
    WALKER_CORE_URL . 'admin/images/fundifly-charity/banner-3.jpeg'
);
?>
<!-- wp:group {"metadata":{"categories":["fundifly-charity-pro"],"patternName":"walker-core/fundifly-banner-slider","name":"Full Width Banner Slider"},"style":{"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:walker-core/slider-carousel {"clientId":"310955af-dd6f-4a91-999a-5b237c7d779c","pagination":{"enabled":false,"default":{"width":10,"height":10,"borderRadius":10,"color":"#000","colorHover":""},"active":{"width":"","height":"","borderRadius":"","offset":0,"border":{"width":"","style":"","color":""},"color":"#f49805","borderColorHover":"","colorHover":""},"verticalPosition":-26,"gap":4},"navigation":{"enabled":true,"hoverShow":true,"size":16,"boxWidth":35,"boxHeight":35,"borderRadius":8,"border":{"width":"","style":"","color":""},"boxColor":"#03866E","color":"#fff","boxColorHover":"#D7C739","borderColorHover":"","colorHover":""},"sliderOptions":{"direction":"horizontal","autoplay":{"enabled":true,"pauseOnMouseEnter":true,"delay":2500},"loop":true,"centeredSlides":false,"slidesPerView":1,"spaceBetween":0,"speed":500,"effect":"none"}} -->
    <div class="wp-block-walker-core-slider-carousel">
        <div class="walker-core-carousel-block layout-carousel  walker-core-carousel__swiper-container nav-hover-show carousel-direction-horizontal" id="walkerCore_310955af_dd6f_4a91_999a_5b237c7d779c">
            <div class="swiper-wrapper"><!-- wp:walker-core/carousel -->
                <div class="swiper-slide"><!-- wp:cover {"url":"<?php echo esc_url($fundifly_banner_img[0]) ?>","id":16,"isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","gradient":"primary-gradient","contentPosition":"center center","style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"20px","bottom":"20px"}}},"layout":{"type":"constrained","wideSize":"100%"}} -->
                    <div class="wp-block-cover" style="padding-top:20px;padding-right:var(--wp--preset--spacing--40);padding-bottom:20px;padding-left:var(--wp--preset--spacing--40);min-height:100vh"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-primary-gradient-gradient-background"></span><img class="wp-block-cover__image-background wp-image-16" alt="" src="<?php echo esc_url($fundifly_banner_img[0]) ?>" data-object-fit="cover" />
                        <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"125px","margin":{"bottom":"0"},"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained","wideSize":"1180px"}} -->
                            <div class="wp-block-group" style="margin-bottom:0;padding-right:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"blockGap":"32px"}},"layout":{"type":"constrained","wideSize":"790px","justifyContent":"left"}} -->
                                <div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"fontSize":"60px"}}} -->
                                    <h2 class="wp-block-heading" style="font-size:60px"><?php esc_html_e('Transforming Lives, One Donation at a Time!', 'walker-core') ?></h2>
                                    <!-- /wp:heading -->

                                    <!-- wp:group {"style":{"spacing":{"blockGap":"15px"}},"layout":{"type":"constrained","wideSize":"410px","justifyContent":"left"}} -->
                                    <div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontStyle":"italic","fontWeight":"400"}},"fontFamily":"poppins"} -->
                                        <p class="has-poppins-font-family" style="font-style:italic;font-weight:400;text-transform:uppercase"><?php esc_html_e('"Serving Children is a Bliss"', 'fundifly-charity') ?></p>
                                        <!-- /wp:paragraph -->

                                        <!-- wp:paragraph {"fontSize":"medium"} -->
                                        <p class="has-medium-font-size"><?php esc_html_e('A style for every story, get the latest styles here at an incexpensive price.', 'walker-core') ?></p>
                                        <!-- /wp:paragraph -->
                                    </div>
                                    <!-- /wp:group -->

                                    <!-- wp:buttons {"style":{"spacing":{"blockGap":"25px"}}} -->
                                    <div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"4px"}}} -->
                                        <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" style="border-radius:4px"><?php esc_html_e('Get Started', 'walker-core') ?></a></div>
                                        <!-- /wp:button -->

                                        <!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":"4px"}}} -->
                                        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" style="border-radius:4px"><?php esc_html_e('Watch Story', 'walker-core') ?></a></div>
                                        <!-- /wp:button -->
                                    </div>
                                    <!-- /wp:buttons -->
                                </div>
                                <!-- /wp:group -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                    </div>
                    <!-- /wp:cover -->
                </div>
                <!-- /wp:walker-core/carousel -->

                <!-- wp:walker-core/carousel -->
                <div class="swiper-slide"><!-- wp:cover {"url":"<?php echo esc_url($fundifly_banner_img[1]) ?>","id":1760,"isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","gradient":"primary-gradient","contentPosition":"center center","style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"20px","bottom":"20px"}}},"layout":{"type":"constrained","wideSize":"100%"}} -->
                    <div class="wp-block-cover" style="padding-top:20px;padding-right:var(--wp--preset--spacing--40);padding-bottom:20px;padding-left:var(--wp--preset--spacing--40);min-height:100vh"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-primary-gradient-gradient-background"></span><img class="wp-block-cover__image-background wp-image-1760" alt="" src="<?php echo esc_url($fundifly_banner_img[1]) ?>" data-object-fit="cover" />
                        <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"125px","margin":{"bottom":"0"},"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained","wideSize":"1180px"}} -->
                            <div class="wp-block-group" style="margin-bottom:0;padding-right:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"blockGap":"32px"}},"layout":{"type":"constrained","wideSize":"790px","justifyContent":"left"}} -->
                                <div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"fontSize":"60px"}}} -->
                                    <h2 class="wp-block-heading" style="font-size:60px"><strong><?php esc_html_e('Empowering Futures Through Generosity', 'walker-core') ?></strong></h2>
                                    <!-- /wp:heading -->

                                    <!-- wp:group {"style":{"spacing":{"blockGap":"15px"}},"layout":{"type":"constrained","wideSize":"410px","justifyContent":"left"}} -->
                                    <div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontStyle":"italic","fontWeight":"400"}},"fontFamily":"poppins"} -->
                                        <p class="has-poppins-font-family" style="font-style:italic;font-weight:400;text-transform:uppercase"><?php esc_html_e('"Every Act of Kindness Counts"', 'walker-core') ?></p>
                                        <!-- /wp:paragraph -->

                                        <!-- wp:paragraph {"fontSize":"medium"} -->
                                        <p class="has-medium-font-size"><?php esc_html_e('Discover unique styles and make a positive impact with every purchase.', 'walker-core') ?></p>
                                        <!-- /wp:paragraph -->
                                    </div>
                                    <!-- /wp:group -->

                                    <!-- wp:buttons {"style":{"spacing":{"blockGap":"25px"}}} -->
                                    <div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"4px"}}} -->
                                        <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" style="border-radius:4px"><?php esc_html_e('Get Started', 'walker-core') ?></a></div>
                                        <!-- /wp:button -->

                                        <!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":"4px"}}} -->
                                        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" style="border-radius:4px"><?php esc_html_e('Watch Story', 'walker-core') ?></a></div>
                                        <!-- /wp:button -->
                                    </div>
                                    <!-- /wp:buttons -->
                                </div>
                                <!-- /wp:group -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                    </div>
                    <!-- /wp:cover -->
                </div>
                <!-- /wp:walker-core/carousel -->

                <!-- wp:walker-core/carousel -->
                <div class="swiper-slide"><!-- wp:cover {"url":"<?php echo esc_url($fundifly_banner_img[2]) ?>","id":113,"isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","gradient":"primary-gradient","contentPosition":"center center","style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"20px","bottom":"20px"}}},"layout":{"type":"constrained","wideSize":"100%"}} -->
                    <div class="wp-block-cover" style="padding-top:20px;padding-right:var(--wp--preset--spacing--40);padding-bottom:20px;padding-left:var(--wp--preset--spacing--40);min-height:100vh"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-primary-gradient-gradient-background"></span><img class="wp-block-cover__image-background wp-image-113" alt="" src="<?php echo esc_url($fundifly_banner_img[2]) ?>" data-object-fit="cover" />
                        <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"125px","margin":{"bottom":"0"},"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained","wideSize":"1180px"}} -->
                            <div class="wp-block-group" style="margin-bottom:0;padding-right:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"blockGap":"32px"}},"layout":{"type":"constrained","wideSize":"790px","justifyContent":"left"}} -->
                                <div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"fontSize":"60px"}}} -->
                                    <h2 class="wp-block-heading" style="font-size:60px"><strong><?php esc_html_e('Changing the World, One Child at a Time', 'walker-core') ?></strong></h2>
                                    <!-- /wp:heading -->

                                    <!-- wp:group {"style":{"spacing":{"blockGap":"15px"}},"layout":{"type":"constrained","wideSize":"410px","justifyContent":"left"}} -->
                                    <div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontStyle":"italic","fontWeight":"400"}},"fontFamily":"poppins"} -->
                                        <p class="has-poppins-font-family" style="font-style:italic;font-weight:400;text-transform:uppercase"><?php esc_html_e('"Giving is the Greatest Joy"', 'walker-core') ?></p>
                                        <!-- /wp:paragraph -->

                                        <!-- wp:paragraph {"fontSize":"medium"} -->
                                        <p class="has-medium-font-size"><?php esc_html_e('Find your style and help support those in need.', 'walker-core') ?></p>
                                        <!-- /wp:paragraph -->
                                    </div>
                                    <!-- /wp:group -->

                                    <!-- wp:buttons {"style":{"spacing":{"blockGap":"25px"}}} -->
                                    <div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"4px"}}} -->
                                        <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" style="border-radius:4px"><?php esc_html_e('Get Started', 'walker-core') ?></a></div>
                                        <!-- /wp:button -->

                                        <!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":"4px"}}} -->
                                        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" style="border-radius:4px"><?php esc_html_e('Watch Story', 'walker-core') ?></a></div>
                                        <!-- /wp:button -->
                                    </div>
                                    <!-- /wp:buttons -->
                                </div>
                                <!-- /wp:group -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                    </div>
                    <!-- /wp:cover -->
                </div>
                <!-- /wp:walker-core/carousel -->
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
    <!-- /wp:walker-core/slider-carousel -->
</div>
<!-- /wp:group -->