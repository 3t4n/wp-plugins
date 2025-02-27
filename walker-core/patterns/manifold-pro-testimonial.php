<?php

/**
 * Title: Testimonail Pro
 * Slug: walker-core/manifold-pro-testimonial
 * Categories: manifold-pro
 */
$manifold_testimonial_img = array(
    WALKER_CORE_URL . 'admin/images/manifold/testimonial_1.png',
    WALKER_CORE_URL . 'admin/images/manifold/testimonial_2.png',
    WALKER_CORE_URL . 'admin/images/manifold/testimonial_3.png'
);
?>
?>
<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"100px","bottom":"100px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"background-alt","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background-alt-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"layout":{"type":"constrained","wideSize":"1180px"}} -->
    <div class="wp-block-group"><!-- wp:group {"layout":{"type":"constrained","wideSize":"460px"}} -->
        <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"typography":{"fontStyle":"normal","fontWeight":"400"}},"textColor":"white","fontFamily":"inter"} -->
            <h4 class="wp-block-heading has-text-align-center has-white-color has-text-color has-link-color has-inter-font-family" style="font-style:normal;font-weight:400">Client's Testimonials</h4>
            <!-- /wp:heading -->

            <!-- wp:heading {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white"} -->
            <h2 class="wp-block-heading has-text-align-center has-white-color has-text-color has-link-color"><?php esc_html_e("Review's From Our Happy Clients!", 'walker-core') ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"layout":{"type":"constrained"}} -->
        <div class="wp-block-group"><!-- wp:columns -->
            <div class="wp-block-columns"><!-- wp:column {"width":"363px"} -->
                <div class="wp-block-column" style="flex-basis:363px"><!-- wp:group {"style":{"spacing":{"padding":{"right":"20px","left":"20px","top":"30px","bottom":"30px"},"blockGap":"20px"},"border":{"radius":"10px"}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group has-white-background-color has-background" style="border-radius:10px;padding-top:30px;padding-right:20px;padding-bottom:30px;padding-left:20px"><!-- wp:image {"id":751,"width":"75px","height":"75px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center"} -->
                        <figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url($manifold_testimonial_img[0]) ?>" alt="" class="wp-image-751" style="object-fit:cover;width:75px;height:75px" /></figure>
                        <!-- /wp:image -->

                        <!-- wp:group {"style":{"spacing":{"margin":{"top":"10px","bottom":"10px"},"blockGap":"0"}},"layout":{"type":"constrained"}} -->
                        <div class="wp-block-group" style="margin-top:10px;margin-bottom:10px"><!-- wp:heading {"textAlign":"center","level":3} -->
                            <h3 class="wp-block-heading has-text-align-center"><?php esc_html_e('Cristina', 'walker-core') ?></h3>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|background-alt"}}}},"textColor":"background-alt"} -->
                            <p class="has-text-align-center has-background-alt-color has-text-color has-link-color"><?php esc_html_e('Graphic Designer', 'walekr-core') ?></p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground"} -->
                        <p class="has-text-align-center has-foreground-color has-text-color has-link-color"><?php esc_html_e('“Consectetur adipiscing elit nam in urna ut orci cursus bibendum eget quis lorem praesent in laoreet odio nam”.', 'walker-core') ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|background-alt"}}}},"textColor":"background-alt"} -->
                        <p class="has-text-align-center has-background-alt-color has-text-color has-link-color"><?php esc_html_e('★★★★★', 'walker-core') ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"width":"363px"} -->
                <div class="wp-block-column" style="flex-basis:363px"><!-- wp:group {"style":{"spacing":{"padding":{"right":"20px","left":"20px","top":"30px","bottom":"30px"},"blockGap":"20px"},"border":{"radius":"10px"}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group has-white-background-color has-background" style="border-radius:10px;padding-top:30px;padding-right:20px;padding-bottom:30px;padding-left:20px"><!-- wp:image {"id":766,"width":"75px","height":"75px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center"} -->
                        <figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url($manifold_testimonial_img[1]) ?>" alt="" class="wp-image-766" style="object-fit:cover;width:75px;height:75px" /></figure>
                        <!-- /wp:image -->

                        <!-- wp:group {"style":{"spacing":{"margin":{"top":"10px","bottom":"10px"},"blockGap":"0"}},"layout":{"type":"constrained"}} -->
                        <div class="wp-block-group" style="margin-top:10px;margin-bottom:10px"><!-- wp:heading {"textAlign":"center","level":3} -->
                            <h3 class="wp-block-heading has-text-align-center"><?php esc_html_e('Benjamin', 'walker-core') ?></h3>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|background-alt"}}}},"textColor":"background-alt"} -->
                            <p class="has-text-align-center has-background-alt-color has-text-color has-link-color"><?php esc_html_e('Customer Care', 'walker-core') ?></p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground"} -->
                        <p class="has-text-align-center has-foreground-color has-text-color has-link-color"><?php esc_html_e('“Consectetur adipiscing elit nam in urna ut orci cursus bibendum eget quis lorem praesent in laoreet odio nam”.', 'walker-core') ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|background-alt"}}}},"textColor":"background-alt"} -->
                        <p class="has-text-align-center has-background-alt-color has-text-color has-link-color"><?php esc_html_e('★★★★★', 'walker-core') ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"width":"363px"} -->
                <div class="wp-block-column" style="flex-basis:363px"><!-- wp:group {"style":{"spacing":{"padding":{"right":"20px","left":"20px","top":"30px","bottom":"30px"},"blockGap":"20px"},"border":{"radius":"10px"}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group has-white-background-color has-background" style="border-radius:10px;padding-top:30px;padding-right:20px;padding-bottom:30px;padding-left:20px"><!-- wp:image {"id":767,"width":"75px","height":"75px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center"} -->
                        <figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url($manifold_testimonial_img[2]) ?>" alt="" class="wp-image-767" style="object-fit:cover;width:75px;height:75px" /></figure>
                        <!-- /wp:image -->

                        <!-- wp:group {"style":{"spacing":{"margin":{"top":"10px","bottom":"10px"},"blockGap":"0"}},"layout":{"type":"constrained"}} -->
                        <div class="wp-block-group" style="margin-top:10px;margin-bottom:10px"><!-- wp:heading {"textAlign":"center","level":3} -->
                            <h3 class="wp-block-heading has-text-align-center"><?php esc_html_e('Anjelique', 'walker-core') ?></h3>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|background-alt"}}}},"textColor":"background-alt"} -->
                            <p class="has-text-align-center has-background-alt-color has-text-color has-link-color"><?php esc_html_e('Graphic Designer', 'walker-core') ?></p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground"} -->
                        <p class="has-text-align-center has-foreground-color has-text-color has-link-color"><?php esc_html_e('“Consectetur adipiscing elit nam in urna ut orci cursus bibendum eget quis lorem praesent in laoreet odio nam”.', 'walker-core') ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|background-alt"}}}},"textColor":"background-alt"} -->
                        <p class="has-text-align-center has-background-alt-color has-text-color has-link-color"><?php esc_html_e('★★★★★', 'walker-core') ?></p>
                        <!-- /wp:paragraph -->
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
</div>
<!-- /wp:group -->