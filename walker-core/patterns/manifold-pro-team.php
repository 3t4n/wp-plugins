<?php

/**
 * Title: Team Pro
 * Slug: walker-core/manifold-pro-team
 * Categories: manifold-pro
 */
$manifold_team_img = array(

    WALKER_CORE_URL . 'admin/images/manifold/testimonial_1.png',
    WALKER_CORE_URL . 'admin/images/manifold/testimonial_2.png',
    WALKER_CORE_URL . 'admin/images/manifold/testimonial_3.png'
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"100px","bottom":"100px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"Light","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-light-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"layout":{"type":"constrained","wideSize":"1180px"}} -->
    <div class="wp-block-group"><!-- wp:group {"layout":{"type":"constrained"}} -->
        <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary"} -->
            <h4 class="wp-block-heading has-text-align-center has-secondary-color has-text-color has-link-color"><?php esc_html_e('-Team', 'walker-core') ?></h4>
            <!-- /wp:heading -->

            <!-- wp:heading {"textAlign":"center"} -->
            <h2 class="wp-block-heading has-text-align-center"><?php esc_html_e('Professional Team', 'walker-core') ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"layout":{"type":"constrained"}} -->
        <div class="wp-block-group"><!-- wp:columns -->
            <div class="wp-block-columns"><!-- wp:column {"width":"33%","className":"is-style-column-hover-border-primary"} -->
                <div class="wp-block-column is-style-column-hover-border-primary" style="flex-basis:33%"><!-- wp:group {"style":{"border":{"radius":"10px"},"spacing":{"padding":{"top":"40px","bottom":"40px","left":"30px","right":"30px"}}},"backgroundColor":"white","className":"manifold-pro-team-card","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group manifold-pro-team-card has-white-background-color has-background" style="border-radius:10px;padding-top:40px;padding-right:30px;padding-bottom:40px;padding-left:30px"><!-- wp:image {"id":610,"width":"170px","height":"170px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center"} -->
                        <figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url($manifold_team_img[0]) ?>" alt="" class="wp-image-610" style="object-fit:cover;width:170px;height:170px" /></figure>
                        <!-- /wp:image -->

                        <!-- wp:heading {"textAlign":"center","level":4} -->
                        <h4 class="wp-block-heading has-text-align-center"><?php esc_html_e('Anjelique', 'walker-core') ?></h4>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground"} -->
                        <p class="has-text-align-center has-foreground-color has-text-color has-link-color"><?php esc_html_e('Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,', 'walker-core') ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:social-links {"iconBackgroundColor":"primary","iconBackgroundColorValue":"#4E18DD","className":"is-style-default","layout":{"type":"flex","justifyContent":"center","flexWrap":"nowrap"}} -->
                        <ul class="wp-block-social-links has-icon-background-color is-style-default"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                            <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                            <!-- wp:social-link {"url":"#","service":"linkedin"} /-->
                        </ul>
                        <!-- /wp:social-links -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"width":"33%","className":"is-style-column-hover-border-primary"} -->
                <div class="wp-block-column is-style-column-hover-border-primary" style="flex-basis:33%"><!-- wp:group {"style":{"border":{"radius":"10px"},"spacing":{"padding":{"top":"40px","bottom":"40px","left":"30px","right":"30px"}}},"backgroundColor":"white","className":"manifold-pro-team-card","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group manifold-pro-team-card has-white-background-color has-background" style="border-radius:10px;padding-top:40px;padding-right:30px;padding-bottom:40px;padding-left:30px"><!-- wp:image {"id":611,"width":"170px","height":"170px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center"} -->
                        <figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url($manifold_team_img[1]) ?>" alt="" class="wp-image-611" style="object-fit:cover;width:170px;height:170px" /></figure>
                        <!-- /wp:image -->

                        <!-- wp:heading {"textAlign":"center","level":4} -->
                        <h4 class="wp-block-heading has-text-align-center"><?php esc_html_e('Benjamin', 'walker-core') ?></h4>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground"} -->
                        <p class="has-text-align-center has-foreground-color has-text-color has-link-color"><?php esc_html_e('Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,', 'walker-core') ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:social-links {"iconBackgroundColor":"primary","iconBackgroundColorValue":"#4E18DD","className":"is-style-default","layout":{"type":"flex","justifyContent":"center","flexWrap":"nowrap"}} -->
                        <ul class="wp-block-social-links has-icon-background-color is-style-default"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                            <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                            <!-- wp:social-link {"url":"#","service":"linkedin"} /-->
                        </ul>
                        <!-- /wp:social-links -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"width":"33%","className":"is-style-column-hover-border-primary"} -->
                <div class="wp-block-column is-style-column-hover-border-primary" style="flex-basis:33%"><!-- wp:group {"style":{"border":{"radius":"10px"},"spacing":{"padding":{"top":"40px","bottom":"40px","left":"30px","right":"30px"}}},"backgroundColor":"white","className":"manifold-pro-team-card","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group manifold-pro-team-card has-white-background-color has-background" style="border-radius:10px;padding-top:40px;padding-right:30px;padding-bottom:40px;padding-left:30px"><!-- wp:image {"id":612,"width":"170px","height":"170px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center"} -->
                        <figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo esc_url($manifold_team_img[2]) ?>" alt="" class="wp-image-612" style="object-fit:cover;width:170px;height:170px" /></figure>
                        <!-- /wp:image -->

                        <!-- wp:heading {"textAlign":"center","level":4} -->
                        <h4 class="wp-block-heading has-text-align-center"><?php esc_html_e('Cristina', 'walker-core') ?></h4>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground"} -->
                        <p class="has-text-align-center has-foreground-color has-text-color has-link-color"><?php esc_html_e('Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,', 'walker-core') ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:social-links {"iconBackgroundColor":"primary","iconBackgroundColorValue":"#4E18DD","className":"is-style-default","layout":{"type":"flex","justifyContent":"center","flexWrap":"nowrap"}} -->
                        <ul class="wp-block-social-links has-icon-background-color is-style-default"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                            <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                            <!-- wp:social-link {"url":"#","service":"linkedin"} /-->
                        </ul>
                        <!-- /wp:social-links -->
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