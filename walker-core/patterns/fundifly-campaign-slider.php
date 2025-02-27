<?php

/**
 * Title: Campaign Pattern with Slider
 * Slug: walker-core/fundifly-campaign-slider
 * Categories: fundifly-charity-pro
 */
$fundifly_campaigns_img = array(
    WALKER_CORE_URL . 'admin/images/fundifly-charity/campaign-1.jpg',
    WALKER_CORE_URL . 'admin/images/fundifly-charity/campaign-2.jpg',
    WALKER_CORE_URL . 'admin/images/fundifly-charity/campaign-3.jpg'
);
?>
<!-- wp:group {"metadata":{"categories":["fundifly-charity-pro"],"patternName":"walker-core/fundifly-campaign-slider","name":"Campaign"},"style":{"spacing":{"blockGap":"0px","margin":{"top":"0","bottom":"0"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"160px","bottom":"160px"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:160px;padding-right:var(--wp--preset--spacing--40);padding-bottom:160px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"className":"fundifly-pro-top-navigation","style":{"spacing":{"blockGap":"60px"}},"layout":{"type":"constrained","wideSize":"1180px"}} -->
    <div class="wp-block-group fundifly-pro-top-navigation"><!-- wp:group {"layout":{"type":"constrained"}} -->
        <div class="wp-block-group"><!-- wp:columns -->
            <div class="wp-block-columns"><!-- wp:column {"width":"50%"} -->
                <div class="wp-block-column" style="flex-basis:50%"><!-- wp:group {"style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground-alt"}}},"typography":{"textTransform":"uppercase"}},"textColor":"foreground-alt"} -->
                        <p class="has-foreground-alt-color has-text-color has-link-color" style="text-transform:uppercase"><?php esc_html_e('Campaigns', 'walker-core') ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:heading {"style":{"typography":{"textTransform":"capitalize","fontSize":"44px"}}} -->
                        <h2 class="wp-block-heading" style="font-size:44px;text-transform:capitalize"><?php esc_html_e('Our Recent Campaigns', 'walker-core') ?></h2>
                        <!-- /wp:heading -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column -->
                <div class="wp-block-column"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground-alt"}}}},"textColor":"foreground-alt","fontSize":"slightly-large"} -->
                    <p class="has-foreground-alt-color has-text-color has-link-color has-slightly-large-font-size"><?php esc_html_e('Cras tincidunt tellus at mi tristique rhoncus. Etiam dapibus rutrum leo consectetur accumsan. Vivamus viverra ante turpis, dignissim', 'walker-core') ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons -->
                    <div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"5px"}}} -->
                        <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" style="border-radius:5px"><?php esc_html_e('View Details', 'walker-core') ?></a></div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
        <!-- /wp:group -->

        <!-- wp:walker-core/slider-carousel {"clientId":"b6ce95d6-8f44-4049-b680-b030b4b46a4c","pagination":{"enabled":false,"default":{"width":10,"height":10,"borderRadius":10,"color":"#000","colorHover":""},"active":{"width":"","height":"","borderRadius":"","offset":0,"border":{"width":"","style":"","color":""},"color":"#f49805","borderColorHover":"","colorHover":""},"verticalPosition":-26,"gap":4},"navigation":{"enabled":true,"hoverShow":false,"size":16,"boxWidth":35,"boxHeight":35,"borderRadius":4,"border":{"width":"","style":"","color":""},"boxColor":"#03866E","color":"#fff","boxColorHover":"#D7C739","borderColorHover":"","colorHover":""},"sliderOptions":{"direction":"horizontal","autoplay":{"enabled":true,"pauseOnMouseEnter":true,"delay":2500},"loop":true,"centeredSlides":false,"slidesPerView":3,"spaceBetween":10,"speed":1500,"effect":"none"}} -->
        <div class="wp-block-walker-core-slider-carousel">
            <div class="walker-core-carousel-block layout-carousel  walker-core-carousel__swiper-container  carousel-direction-horizontal" id="walkerCore_b6ce95d6_8f44_4049_b680_b030b4b46a4c">
                <div class="swiper-wrapper"><!-- wp:walker-core/carousel -->
                    <div class="swiper-slide"><!-- wp:group {"className":"fundifly-campaign-cards","layout":{"type":"constrained"}} -->
                        <div class="wp-block-group fundifly-campaign-cards"><!-- wp:cover {"url":"<?php echo esc_url($fundifly_campaigns_img[0]) ?>","id":1894,"isUserOverlayColor":true,"minHeight":335,"gradient":"foreground-gradient","contentPosition":"bottom left","className":"is-style-cover-hover-zoom-in","style":{"spacing":{"padding":{"top":"20px","bottom":"20px","left":"20px","right":"20px"}},"border":{"radius":"10px"}},"layout":{"type":"constrained","wideSize":"355px"}} -->
                            <div class="wp-block-cover has-custom-content-position is-position-bottom-left is-style-cover-hover-zoom-in" style="border-radius:10px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;min-height:335px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-foreground-gradient-gradient-background"></span><img class="wp-block-cover__image-background wp-image-1894" alt="" src="<?php echo esc_url($fundifly_campaigns_img[0]) ?>" data-object-fit="cover" />
                                <div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained"}} -->
                                    <div class="wp-block-group"><!-- wp:heading {"fontSize":"large-medium"} -->
                                        <h2 class="wp-block-heading has-large-medium-font-size"><?php esc_html_e('Project Aura', 'walker-core') ?></h2>
                                        <!-- /wp:heading -->

                                        <!-- wp:group {"className":"fundifly-cover-hover","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"blockGap":"15px"}},"textColor":"white","layout":{"type":"constrained","justifyContent":"left","wideSize":"350%"}} -->
                                        <div class="wp-block-group fundifly-cover-hover has-white-color has-text-color has-link-color"><!-- wp:separator {"className":"is-style-wide"} -->
                                            <hr class="wp-block-separator has-alpha-channel-opacity is-style-wide" />
                                            <!-- /wp:separator -->

                                            <!-- wp:paragraph {"fontSize":"slightly-large"} -->
                                            <p class="has-slightly-large-font-size"><?php esc_html_e('Cras tincidunt tellus at mi tristique rhoncus. Etiam dapibus rutrum leo consectetur accumsan.', 'walker-core') ?></p>
                                            <!-- /wp:paragraph -->

                                            <!-- wp:buttons -->
                                            <div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline","style":{"border":{"width":"0px","style":"none"},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}}}} -->
                                                <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" style="border-style:none;border-width:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">Read More</a></div>
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
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:walker-core/carousel -->

                    <!-- wp:walker-core/carousel -->
                    <div class="swiper-slide"><!-- wp:group {"className":"fundifly-campaign-cards","layout":{"type":"constrained"}} -->
                        <div class="wp-block-group fundifly-campaign-cards"><!-- wp:cover {"url":"<?php echo esc_url($fundifly_campaigns_img[1]) ?>","id":1897,"isUserOverlayColor":true,"minHeight":335,"gradient":"foreground-gradient","contentPosition":"bottom left","className":"is-style-cover-hover-zoom-in","style":{"spacing":{"padding":{"top":"20px","bottom":"20px","left":"20px","right":"20px"}},"border":{"radius":"10px"}},"layout":{"type":"constrained","wideSize":"355px"}} -->
                            <div class="wp-block-cover has-custom-content-position is-position-bottom-left is-style-cover-hover-zoom-in" style="border-radius:10px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;min-height:335px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-foreground-gradient-gradient-background"></span><img class="wp-block-cover__image-background wp-image-1897" alt="" src="<?php echo esc_url($fundifly_campaigns_img[1]) ?>" data-object-fit="cover" />
                                <div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained"}} -->
                                    <div class="wp-block-group"><!-- wp:heading {"fontSize":"large-medium"} -->
                                        <h2 class="wp-block-heading has-large-medium-font-size"><?php esc_html_e('Operation Blessing', 'walker-core') ?></h2>
                                        <!-- /wp:heading -->

                                        <!-- wp:group {"className":"fundifly-cover-hover","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"blockGap":"15px"}},"textColor":"white","layout":{"type":"constrained","justifyContent":"left"}} -->
                                        <div class="wp-block-group fundifly-cover-hover has-white-color has-text-color has-link-color"><!-- wp:separator {"className":"is-style-wide"} -->
                                            <hr class="wp-block-separator has-alpha-channel-opacity is-style-wide" />
                                            <!-- /wp:separator -->

                                            <!-- wp:paragraph {"fontSize":"slightly-large"} -->
                                            <p class="has-slightly-large-font-size"><?php esc_html_e('Cras tincidunt tellus at mi tristique rhoncus. Etiam dapibus rutrum leo consectetur accumsan.', 'walker-core') ?></p>
                                            <!-- /wp:paragraph -->

                                            <!-- wp:buttons -->
                                            <div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline","style":{"border":{"width":"0px","style":"none"},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}}}} -->
                                                <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" style="border-style:none;border-width:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php esc_html_e('Read More', 'walker-core') ?></a></div>
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
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:walker-core/carousel -->

                    <!-- wp:walker-core/carousel -->
                    <div class="swiper-slide"><!-- wp:group {"className":"fundifly-campaign-cards","layout":{"type":"constrained"}} -->
                        <div class="wp-block-group fundifly-campaign-cards"><!-- wp:cover {"url":"<?php echo esc_url($fundifly_campaigns_img[2]) ?>","id":1898,"isUserOverlayColor":true,"minHeight":335,"gradient":"foreground-gradient","contentPosition":"bottom left","className":"is-style-cover-hover-zoom-in","style":{"spacing":{"padding":{"top":"20px","bottom":"20px","left":"20px","right":"20px"}},"border":{"radius":"10px"}},"layout":{"type":"constrained","wideSize":"355px"}} -->
                            <div class="wp-block-cover has-custom-content-position is-position-bottom-left is-style-cover-hover-zoom-in" style="border-radius:10px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;min-height:335px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-foreground-gradient-gradient-background"></span><img class="wp-block-cover__image-background wp-image-1898" alt="" src="<?php echo esc_url($fundifly_campaigns_img[2]) ?>" data-object-fit="cover" />
                                <div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained"}} -->
                                    <div class="wp-block-group"><!-- wp:heading {"fontSize":"large-medium"} -->
                                        <h2 class="wp-block-heading has-large-medium-font-size"><?php esc_html_e('Earthquake Relief', 'walker-core') ?></h2>
                                        <!-- /wp:heading -->

                                        <!-- wp:group {"className":"fundifly-cover-hover","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"blockGap":"15px"}},"textColor":"white","layout":{"type":"constrained","justifyContent":"left"}} -->
                                        <div class="wp-block-group fundifly-cover-hover has-white-color has-text-color has-link-color"><!-- wp:separator {"className":"is-style-wide"} -->
                                            <hr class="wp-block-separator has-alpha-channel-opacity is-style-wide" />
                                            <!-- /wp:separator -->

                                            <!-- wp:paragraph {"fontSize":"slightly-large"} -->
                                            <p class="has-slightly-large-font-size"><?php esc_html_e('Cras tincidunt tellus at mi tristique rhoncus. Etiam dapibus rutrum leo consectetur accumsan.', 'walker-core') ?></p>
                                            <!-- /wp:paragraph -->

                                            <!-- wp:buttons -->
                                            <div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline","style":{"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"border":{"width":"0px","style":"none"}}} -->
                                                <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" style="border-style:none;border-width:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php esc_html_e('Read More', 'walker-core') ?></a></div>
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
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:walker-core/carousel -->

                    <!-- wp:walker-core/carousel -->
                    <div class="swiper-slide"><!-- wp:group {"className":"fundifly-campaign-cards","layout":{"type":"constrained"}} -->
                        <div class="wp-block-group fundifly-campaign-cards"><!-- wp:cover {"url":"<?php echo esc_url($fundifly_campaigns_img[0]) ?>","id":1894,"isUserOverlayColor":true,"minHeight":335,"gradient":"foreground-gradient","contentPosition":"bottom left","className":"is-style-cover-hover-zoom-in","style":{"spacing":{"padding":{"top":"20px","bottom":"20px","left":"20px","right":"20px"}},"border":{"radius":"10px"}},"layout":{"type":"constrained","wideSize":"355px"}} -->
                            <div class="wp-block-cover has-custom-content-position is-position-bottom-left is-style-cover-hover-zoom-in" style="border-radius:10px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;min-height:335px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-foreground-gradient-gradient-background"></span><img class="wp-block-cover__image-background wp-image-1894" alt="" src="<?php echo esc_url_raw($fundifly_campaigns_img[0]) ?>" data-object-fit="cover" />
                                <div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained"}} -->
                                    <div class="wp-block-group"><!-- wp:heading {"fontSize":"large-medium"} -->
                                        <h2 class="wp-block-heading has-large-medium-font-size"><?php esc_html_e('Project Aura', 'walker-core') ?></h2>
                                        <!-- /wp:heading -->

                                        <!-- wp:group {"className":"fundifly-cover-hover","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"blockGap":"15px"}},"textColor":"white","layout":{"type":"constrained","justifyContent":"left","wideSize":"350%"}} -->
                                        <div class="wp-block-group fundifly-cover-hover has-white-color has-text-color has-link-color"><!-- wp:separator {"className":"is-style-wide"} -->
                                            <hr class="wp-block-separator has-alpha-channel-opacity is-style-wide" />
                                            <!-- /wp:separator -->

                                            <!-- wp:paragraph {"fontSize":"slightly-large"} -->
                                            <p class="has-slightly-large-font-size"><?php esc_html_e('Cras tincidunt tellus at mi tristique rhoncus. Etiam dapibus rutrum leo consectetur accumsan.', 'walker-core') ?></p>
                                            <!-- /wp:paragraph -->

                                            <!-- wp:buttons -->
                                            <div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline","style":{"border":{"width":"0px","style":"none"},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}}}} -->
                                                <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" style="border-style:none;border-width:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php esc_html_e('Read More', 'walker-core') ?></a></div>
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
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:walker-core/carousel -->

                    <!-- wp:walker-core/carousel -->
                    <div class="swiper-slide"><!-- wp:group {"className":"fundifly-campaign-cards","layout":{"type":"constrained"}} -->
                        <div class="wp-block-group fundifly-campaign-cards"><!-- wp:cover {"url":"<?php echo esc_url($fundifly_campaigns_img[1]) ?>","id":1897,"isUserOverlayColor":true,"minHeight":335,"gradient":"foreground-gradient","contentPosition":"bottom left","className":"is-style-cover-hover-zoom-in","style":{"spacing":{"padding":{"top":"20px","bottom":"20px","left":"20px","right":"20px"}},"border":{"radius":"10px"}},"layout":{"type":"constrained","wideSize":"355px"}} -->
                            <div class="wp-block-cover has-custom-content-position is-position-bottom-left is-style-cover-hover-zoom-in" style="border-radius:10px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;min-height:335px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-foreground-gradient-gradient-background"></span><img class="wp-block-cover__image-background wp-image-1897" alt="" src="<?php echo esc_url($fundifly_campaigns_img[1]) ?>" data-object-fit="cover" />
                                <div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained"}} -->
                                    <div class="wp-block-group"><!-- wp:heading {"fontSize":"large-medium"} -->
                                        <h2 class="wp-block-heading has-large-medium-font-size"><?php esc_html_e('Operation Blessing', 'walker-core') ?></h2>
                                        <!-- /wp:heading -->

                                        <!-- wp:group {"className":"fundifly-cover-hover","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"blockGap":"15px"}},"textColor":"white","layout":{"type":"constrained","justifyContent":"left"}} -->
                                        <div class="wp-block-group fundifly-cover-hover has-white-color has-text-color has-link-color"><!-- wp:separator {"className":"is-style-wide"} -->
                                            <hr class="wp-block-separator has-alpha-channel-opacity is-style-wide" />
                                            <!-- /wp:separator -->

                                            <!-- wp:paragraph {"fontSize":"slightly-large"} -->
                                            <p class="has-slightly-large-font-size"><?php esc_html_e('Cras tincidunt tellus at mi tristique rhoncus. Etiam dapibus rutrum leo consectetur accumsan.', 'walker-core') ?></p>
                                            <!-- /wp:paragraph -->

                                            <!-- wp:buttons -->
                                            <div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline","style":{"border":{"width":"0px","style":"none"},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}}}} -->
                                                <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" style="border-style:none;border-width:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php esc_html_e('Read More', 'walker-core') ?></a></div>
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
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:walker-core/carousel -->

                    <!-- wp:walker-core/carousel -->
                    <div class="swiper-slide"><!-- wp:group {"className":"fundifly-campaign-cards","layout":{"type":"constrained"}} -->
                        <div class="wp-block-group fundifly-campaign-cards"><!-- wp:cover {"url":"<?php echo esc_url($fundifly_campaigns_img[2]) ?>","id":1898,"isUserOverlayColor":true,"minHeight":335,"gradient":"foreground-gradient","contentPosition":"bottom left","className":"is-style-cover-hover-zoom-in","style":{"spacing":{"padding":{"top":"20px","bottom":"20px","left":"20px","right":"20px"}},"border":{"radius":"10px"}},"layout":{"type":"constrained","wideSize":"355px"}} -->
                            <div class="wp-block-cover has-custom-content-position is-position-bottom-left is-style-cover-hover-zoom-in" style="border-radius:10px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;min-height:335px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-foreground-gradient-gradient-background"></span><img class="wp-block-cover__image-background wp-image-1898" alt="" src="<?php echo esc_url($fundifly_campaigns_img[2]) ?>" data-object-fit="cover" />
                                <div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained"}} -->
                                    <div class="wp-block-group"><!-- wp:heading {"fontSize":"large-medium"} -->
                                        <h2 class="wp-block-heading has-large-medium-font-size"><?php esc_html_e('Earthquake Relief', 'walker-core') ?></h2>
                                        <!-- /wp:heading -->

                                        <!-- wp:group {"className":"fundifly-cover-hover","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"blockGap":"15px"}},"textColor":"white","layout":{"type":"constrained","justifyContent":"left"}} -->
                                        <div class="wp-block-group fundifly-cover-hover has-white-color has-text-color has-link-color"><!-- wp:separator {"className":"is-style-wide"} -->
                                            <hr class="wp-block-separator has-alpha-channel-opacity is-style-wide" />
                                            <!-- /wp:separator -->

                                            <!-- wp:paragraph {"fontSize":"slightly-large"} -->
                                            <p class="has-slightly-large-font-size"><?php esc_html_e('Cras tincidunt tellus at mi tristique rhoncus. Etiam dapibus rutrum leo consectetur accumsan.', 'walker-core') ?></p>
                                            <!-- /wp:paragraph -->

                                            <!-- wp:buttons -->
                                            <div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline","style":{"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"border":{"width":"0px","style":"none"}}} -->
                                                <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" style="border-style:none;border-width:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php esc_html_e('Read More', 'walker-core') ?></a></div>
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
                        <!-- /wp:group -->
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
</div>
<!-- /wp:group -->