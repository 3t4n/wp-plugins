<?php

/**
 * Title: Team Slider
 * Slug: walker-core/fundifly-team-slider
 * Categories: fundifly-charity-pro
 */
$fundifly_team_img = array(
    WALKER_CORE_URL . 'admin/images/fundifly-charity/team-1.jpg',
    WALKER_CORE_URL . 'admin/images/fundifly-charity/team-2.jpg',
    WALKER_CORE_URL . 'admin/images/fundifly-charity/team-3.jpg'
)

?>
<!-- wp:group {"metadata":{"categories":["fundifly-charity-pro"],"patternName":"walker-core/fundifly-team-slider","name":"Team"},"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"120px","bottom":"120px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:120px;padding-right:var(--wp--preset--spacing--40);padding-bottom:120px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"70px","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","wideSize":"1180px"}} -->
    <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:group {"style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"constrained","wideSize":"330px"}} -->
        <div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|foreground-alt"}}}},"textColor":"foreground-alt"} -->
            <p class="has-text-align-center has-foreground-alt-color has-text-color has-link-color" style="text-transform:uppercase"><?php esc_html_e('Team Section', 'walker-core') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"44px"}}} -->
            <h2 class="wp-block-heading has-text-align-center" style="font-size:44px"><?php esc_html_e('Meet the team', 'walker-core') ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:walker-core/slider-carousel {"clientId":"87eeae20-2c2b-4378-b315-2c8c731fadec","pagination":{"enabled":true,"default":{"width":10,"height":10,"borderRadius":10,"color":"#03866E","colorHover":"#D7C739"},"active":{"width":18,"height":10,"borderRadius":"","offset":1,"border":{"color":"#03866e","style":"solid","width":"2px"},"color":"#ffffff","borderColorHover":"","colorHover":"#D7C739"},"verticalPosition":-26,"gap":4},"navigation":{"enabled":true,"hoverShow":true,"size":16,"boxWidth":35,"boxHeight":35,"borderRadius":4,"border":{"width":"","style":"","color":""},"boxColor":"#03866E","color":"#fff","boxColorHover":"#D7C739","borderColorHover":"","colorHover":""},"sliderOptions":{"direction":"horizontal","autoplay":{"enabled":true,"pauseOnMouseEnter":true,"delay":2500},"loop":true,"centeredSlides":false,"slidesPerView":3,"spaceBetween":25,"speed":500,"effect":"none"}} -->
        <div class="wp-block-walker-core-slider-carousel">
            <div class="walker-core-carousel-block layout-carousel  walker-core-carousel__swiper-container nav-hover-show carousel-direction-horizontal" id="walkerCore_87eeae20_2c2b_4378_b315_2c8c731fadec">
                <div class="swiper-wrapper"><!-- wp:walker-core/carousel -->
                    <div class="swiper-slide"><!-- wp:group {"style":{"spacing":{"blockGap":"15px"}},"layout":{"type":"constrained"}} -->
                        <div class="wp-block-group"><!-- wp:cover {"url":"<?php echo esc_url($fundifly_team_img[2]) ?>","id":1780,"dimRatio":0,"overlayColor":"foreground","isUserOverlayColor":true,"contentPosition":"bottom right","className":"fundifly-team-cover is-style-cover-hover-zoom-in","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":"8px"},"dimensions":{"aspectRatio":"1"}},"layout":{"type":"constrained"}} -->
                            <div class="wp-block-cover has-custom-content-position is-position-bottom-right fundifly-team-cover is-style-cover-hover-zoom-in" style="border-radius:8px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-1780" alt="" src="<?php echo esc_url($fundifly_team_img[2]) ?>" data-object-fit="cover" />
                                <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"top":"15px","bottom":"15px","left":"15px","right":"15px"}},"border":{"radius":{"topLeft":"8px","topRight":"0px","bottomRight":"0px","bottomLeft":"0px"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
                                    <div class="wp-block-group has-white-background-color has-background" style="border-top-left-radius:8px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px;padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px"><!-- wp:social-links {"iconColor":"foreground-alt","iconColorValue":"#8A8A8A","size":"has-small-icon-size","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"15px"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                                        <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                                            <!-- wp:social-link {"url":"#","service":"x"} /-->

                                            <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                                            <!-- wp:social-link {"url":"#","service":"linkedin"} /-->
                                        </ul>
                                        <!-- /wp:social-links -->
                                    </div>
                                    <!-- /wp:group -->
                                </div>
                            </div>
                            <!-- /wp:cover -->

                            <!-- wp:group {"style":{"spacing":{"blockGap":"5px"}},"layout":{"type":"constrained"}} -->
                            <div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"fontSize":"20px"}}} -->
                                <h2 class="wp-block-heading" style="font-size:20px"><?php esc_html_e('Robert Kennedy', 'walker-core') ?></h2>
                                <!-- /wp:heading -->

                                <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground-alt"}}}},"textColor":"foreground-alt"} -->
                                <p class="has-foreground-alt-color has-text-color has-link-color"><?php esc_html_e('Operations Manager', 'walker-core') ?></p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:walker-core/carousel -->

                    <!-- wp:walker-core/carousel -->
                    <div class="swiper-slide"><!-- wp:group {"layout":{"type":"constrained"}} -->
                        <div class="wp-block-group"><!-- wp:cover {"url":"<?php echo esc_url($fundifly_team_img[0]) ?>","id":1783,"dimRatio":0,"customOverlayColor":"#949397","isUserOverlayColor":true,"focalPoint":{"x":0.5,"y":0},"contentPosition":"bottom right","isDark":false,"className":"fundifly-team-cover is-style-cover-hover-zoom-in","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":"8px"},"dimensions":{"aspectRatio":"1"}},"layout":{"type":"constrained"}} -->
                            <div class="wp-block-cover is-light has-custom-content-position is-position-bottom-right fundifly-team-cover is-style-cover-hover-zoom-in" style="border-radius:8px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#949397"></span><img class="wp-block-cover__image-background wp-image-1783" alt="" src="<?php echo esc_url($fundifly_team_img[0]) ?>" style="object-position:50% 0%" data-object-fit="cover" data-object-position="50% 0%" />
                                <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"top":"15px","bottom":"15px","left":"15px","right":"15px"}},"border":{"radius":{"topLeft":"8px","topRight":"0px","bottomRight":"0px","bottomLeft":"0px"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
                                    <div class="wp-block-group has-white-background-color has-background" style="border-top-left-radius:8px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px;padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px"><!-- wp:social-links {"iconColor":"foreground-alt","iconColorValue":"#8A8A8A","size":"has-small-icon-size","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"15px"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                                        <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                                            <!-- wp:social-link {"url":"#","service":"x"} /-->

                                            <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                                            <!-- wp:social-link {"url":"#","service":"linkedin"} /-->
                                        </ul>
                                        <!-- /wp:social-links -->
                                    </div>
                                    <!-- /wp:group -->
                                </div>
                            </div>
                            <!-- /wp:cover -->

                            <!-- wp:group {"style":{"spacing":{"blockGap":"5px"}},"layout":{"type":"constrained"}} -->
                            <div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"fontSize":"20px"}}} -->
                                <h2 class="wp-block-heading" style="font-size:20px"><?php esc_html_e('Patty Robinson', 'walker-core') ?></h2>
                                <!-- /wp:heading -->

                                <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground-alt"}}}},"textColor":"foreground-alt"} -->
                                <p class="has-foreground-alt-color has-text-color has-link-color"><?php esc_html_e('Finance Head', 'walker-core') ?></p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:walker-core/carousel -->

                    <!-- wp:walker-core/carousel -->
                    <div class="swiper-slide"><!-- wp:group {"layout":{"type":"constrained"}} -->
                        <div class="wp-block-group"><!-- wp:cover {"url":"<?php echo esc_url($fundifly_team_img[1]) ?>","id":1784,"dimRatio":0,"customOverlayColor":"#9c8e8a","isUserOverlayColor":true,"focalPoint":{"x":0.5,"y":0},"contentPosition":"bottom right","isDark":false,"className":"fundifly-team-cover is-style-cover-hover-zoom-in","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"dimensions":{"aspectRatio":"1"},"border":{"radius":"8px"}},"layout":{"type":"constrained"}} -->
                            <div class="wp-block-cover is-light has-custom-content-position is-position-bottom-right fundifly-team-cover is-style-cover-hover-zoom-in" style="border-radius:8px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#9c8e8a"></span><img class="wp-block-cover__image-background wp-image-1784" alt="" src="<?php echo esc_url($fundifly_team_img[1]) ?>" style="object-position:50% 0%" data-object-fit="cover" data-object-position="50% 0%" />
                                <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"top":"15px","bottom":"15px","left":"15px","right":"15px"}},"border":{"radius":{"topLeft":"8px","topRight":"0px","bottomRight":"0px","bottomLeft":"0px"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
                                    <div class="wp-block-group has-white-background-color has-background" style="border-top-left-radius:8px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px;padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px"><!-- wp:social-links {"iconColor":"foreground-alt","iconColorValue":"#8A8A8A","size":"has-small-icon-size","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"15px"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                                        <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                                            <!-- wp:social-link {"url":"#","service":"x"} /-->

                                            <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                                            <!-- wp:social-link {"url":"#","service":"linkedin"} /-->
                                        </ul>
                                        <!-- /wp:social-links -->
                                    </div>
                                    <!-- /wp:group -->
                                </div>
                            </div>
                            <!-- /wp:cover -->

                            <!-- wp:group {"style":{"spacing":{"blockGap":"5px"}},"layout":{"type":"constrained"}} -->
                            <div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"fontSize":"20px"}}} -->
                                <h2 class="wp-block-heading" style="font-size:20px"><?php esc_html_e('Kristina Joseph', 'walker-core') ?></h2>
                                <!-- /wp:heading -->

                                <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground-alt"}}}},"textColor":"foreground-alt"} -->
                                <p class="has-foreground-alt-color has-text-color has-link-color"><?php esc_html_e('Foreign and Domestic Relations', 'walker-core') ?></p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:walker-core/carousel -->

                    <!-- wp:walker-core/carousel -->
                    <div class="swiper-slide"><!-- wp:group {"style":{"spacing":{"blockGap":"15px"}},"layout":{"type":"constrained"}} -->
                        <div class="wp-block-group"><!-- wp:cover {"url":"<?php echo esc_url($fundifly_team_img[2]) ?>","id":1780,"dimRatio":0,"overlayColor":"foreground","isUserOverlayColor":true,"contentPosition":"bottom right","className":"fundifly-team-cover is-style-cover-hover-zoom-in","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":"8px"},"dimensions":{"aspectRatio":"1"}},"layout":{"type":"constrained"}} -->
                            <div class="wp-block-cover has-custom-content-position is-position-bottom-right fundifly-team-cover is-style-cover-hover-zoom-in" style="border-radius:8px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-1780" alt="" src="<?php echo esc_url($fundifly_team_img[2]) ?>" data-object-fit="cover" />
                                <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"top":"15px","bottom":"15px","left":"15px","right":"15px"}},"border":{"radius":{"topLeft":"8px","topRight":"0px","bottomRight":"0px","bottomLeft":"0px"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
                                    <div class="wp-block-group has-white-background-color has-background" style="border-top-left-radius:8px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px;padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px"><!-- wp:social-links {"iconColor":"foreground-alt","iconColorValue":"#8A8A8A","size":"has-small-icon-size","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"15px"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                                        <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                                            <!-- wp:social-link {"url":"#","service":"x"} /-->

                                            <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                                            <!-- wp:social-link {"url":"#","service":"linkedin"} /-->
                                        </ul>
                                        <!-- /wp:social-links -->
                                    </div>
                                    <!-- /wp:group -->
                                </div>
                            </div>
                            <!-- /wp:cover -->

                            <!-- wp:group {"style":{"spacing":{"blockGap":"5px"}},"layout":{"type":"constrained"}} -->
                            <div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"fontSize":"20px"}}} -->
                                <h2 class="wp-block-heading" style="font-size:20px"><?php esc_html_e('Robert Kennedy', 'walker-core') ?></h2>
                                <!-- /wp:heading -->

                                <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground-alt"}}}},"textColor":"foreground-alt"} -->
                                <p class="has-foreground-alt-color has-text-color has-link-color"><?php esc_html_e('Operations Manager', 'walker-core') ?></p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:walker-core/carousel -->

                    <!-- wp:walker-core/carousel -->
                    <div class="swiper-slide"><!-- wp:group {"layout":{"type":"constrained"}} -->
                        <div class="wp-block-group"><!-- wp:cover {"url":"<?php echo esc_url($fundifly_team_img[0]) ?>","id":1783,"dimRatio":0,"customOverlayColor":"#949397","isUserOverlayColor":true,"focalPoint":{"x":0.5,"y":0},"contentPosition":"bottom right","isDark":false,"className":"fundifly-team-cover is-style-cover-hover-zoom-in","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":"8px"},"dimensions":{"aspectRatio":"1"}},"layout":{"type":"constrained"}} -->
                            <div class="wp-block-cover is-light has-custom-content-position is-position-bottom-right fundifly-team-cover is-style-cover-hover-zoom-in" style="border-radius:8px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#949397"></span><img class="wp-block-cover__image-background wp-image-1783" alt="" src="<?php echo esc_url($fundifly_team_img[0]) ?>" style="object-position:50% 0%" data-object-fit="cover" data-object-position="50% 0%" />
                                <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"top":"15px","bottom":"15px","left":"15px","right":"15px"}},"border":{"radius":{"topLeft":"8px","topRight":"0px","bottomRight":"0px","bottomLeft":"0px"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
                                    <div class="wp-block-group has-white-background-color has-background" style="border-top-left-radius:8px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px;padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px"><!-- wp:social-links {"iconColor":"foreground-alt","iconColorValue":"#8A8A8A","size":"has-small-icon-size","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"15px"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                                        <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                                            <!-- wp:social-link {"url":"#","service":"x"} /-->

                                            <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                                            <!-- wp:social-link {"url":"#","service":"linkedin"} /-->
                                        </ul>
                                        <!-- /wp:social-links -->
                                    </div>
                                    <!-- /wp:group -->
                                </div>
                            </div>
                            <!-- /wp:cover -->

                            <!-- wp:group {"style":{"spacing":{"blockGap":"5px"}},"layout":{"type":"constrained"}} -->
                            <div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"fontSize":"20px"}}} -->
                                <h2 class="wp-block-heading" style="font-size:20px"><?php esc_html_e('Peter Robinson', 'walker-core') ?></h2>
                                <!-- /wp:heading -->

                                <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground-alt"}}}},"textColor":"foreground-alt"} -->
                                <p class="has-foreground-alt-color has-text-color has-link-color"><?php esc_html_e('Finance Head', 'walker-core') ?></p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:walker-core/carousel -->

                    <!-- wp:walker-core/carousel -->
                    <div class="swiper-slide"><!-- wp:group {"layout":{"type":"constrained"}} -->
                        <div class="wp-block-group"><!-- wp:cover {"url":"<?php echo esc_url($fundifly_team_img[1]) ?>","id":1784,"dimRatio":0,"customOverlayColor":"#9c8e8a","isUserOverlayColor":true,"focalPoint":{"x":0.5,"y":0},"contentPosition":"bottom right","isDark":false,"className":"fundifly-team-cover is-style-cover-hover-zoom-in","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"dimensions":{"aspectRatio":"1"},"border":{"radius":"8px"}},"layout":{"type":"constrained"}} -->
                            <div class="wp-block-cover is-light has-custom-content-position is-position-bottom-right fundifly-team-cover is-style-cover-hover-zoom-in" style="border-radius:8px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#9c8e8a"></span><img class="wp-block-cover__image-background wp-image-1784" alt="" src="<?php echo esc_url($fundifly_team_img[1]) ?>" style="object-position:50% 0%" data-object-fit="cover" data-object-position="50% 0%" />
                                <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"top":"15px","bottom":"15px","left":"15px","right":"15px"}},"border":{"radius":{"topLeft":"8px","topRight":"0px","bottomRight":"0px","bottomLeft":"0px"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
                                    <div class="wp-block-group has-white-background-color has-background" style="border-top-left-radius:8px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px;padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px"><!-- wp:social-links {"iconColor":"foreground-alt","iconColorValue":"#8A8A8A","size":"has-small-icon-size","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"15px"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                                        <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                                            <!-- wp:social-link {"url":"#","service":"x"} /-->

                                            <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                                            <!-- wp:social-link {"url":"#","service":"linkedin"} /-->
                                        </ul>
                                        <!-- /wp:social-links -->
                                    </div>
                                    <!-- /wp:group -->
                                </div>
                            </div>
                            <!-- /wp:cover -->

                            <!-- wp:group {"style":{"spacing":{"blockGap":"5px"}},"layout":{"type":"constrained"}} -->
                            <div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"fontSize":"20px"}}} -->
                                <h2 class="wp-block-heading" style="font-size:20px"><?php esc_html_e('Kristina Joseph', 'walker-core') ?></h2>
                                <!-- /wp:heading -->

                                <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground-alt"}}}},"textColor":"foreground-alt"} -->
                                <p class="has-foreground-alt-color has-text-color has-link-color"><?php esc_html_e('Foreign and Domestic Relations', 'walker-core') ?></p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:walker-core/carousel -->
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <!-- /wp:walker-core/slider-carousel -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->