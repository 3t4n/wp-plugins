<?php

/**
 * Title: Call to Action Pro
 * Slug: walker-core/manifold-pro-cta
 * Categories: manifold-pro
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"100px","bottom":"100px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"Light","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-light-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:100px;padding-right:var(--wp--preset--spacing--40);padding-bottom:100px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"padding":{"right":"0px","left":"0px"},"blockGap":"35px"}},"layout":{"type":"constrained","wideSize":"1180px"}} -->
    <div class="wp-block-group" style="padding-right:0px;padding-left:0px"><!-- wp:group {"style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"constrained","wideSize":"673px"}} -->
        <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textTransform":"uppercase"}},"textColor":"secondary"} -->
            <h4 class="wp-block-heading has-text-align-center has-secondary-color has-text-color has-link-color" style="text-transform:uppercase"><?php esc_html_e('-Call To Action', 'walker-core') ?></h4>
            <!-- /wp:heading -->

            <!-- wp:heading {"textAlign":"center"} -->
            <h2 class="wp-block-heading has-text-align-center"><?php esc_html_e("Let's Work Together on Your Next Projects !", 'walker-core') ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground"} -->
            <p class="has-text-align-center has-foreground-color has-text-color has-link-color"><?php esc_html_e("Frustrated by a slow website? We’ll help you tame those speed demons so you can keep visitors coming back for more!", 'walker-core') ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"layout":{"type":"constrained"}} -->
        <div class="wp-block-group"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
            <div class="wp-block-buttons"><!-- wp:button {"className":"is-style-button-hover-primary"} -->
                <div class="wp-block-button is-style-button-hover-primary"><a class="wp-block-button__link wp-element-button"><?php esc_html_e("Let's Meet Up", 'walker-core') ?></a></div>
                <!-- /wp:button -->

                <!-- wp:button {"backgroundColor":"primary","textColor":"Light","style":{"elements":{"link":{"color":{"text":"var:preset|color|Light"}}}},"className":"is-style-button-hover-secondary"} -->
                <div class="wp-block-button is-style-button-hover-secondary"><a class="wp-block-button__link has-light-color has-primary-background-color has-text-color has-background has-link-color wp-element-button"><?php esc_html_e("Buy Theme", 'walker-core') ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->