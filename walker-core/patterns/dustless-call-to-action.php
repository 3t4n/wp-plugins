<?php

/**
 * Title: Call To Action
 * Slug: walker-core/dustless-call-to-action
 * Categories: dustless-pro
 */
?>
<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"padding":{"top":"30px","bottom":"30px"}}},"backgroundColor":"primary","textColor":"white","layout":{"type":"constrained","wideSize":"1440px"},"fontFamily":"sarabun"} -->
<div class="wp-block-group has-white-color has-primary-background-color has-text-color has-background has-link-color has-sarabun-font-family" style="padding-top:30px;padding-bottom:30px"><!-- wp:group {"layout":{"type":"constrained","wideSize":"1180px"}} -->
    <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|60","padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
        <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:heading {"style":{"typography":{"fontSize":"40px"}}} -->
            <h2 class="wp-block-heading" style="font-size:40px"><?php esc_html_e("You Have Any Project Today Let’s Meetup !", 'dustless') ?></h2>
            <!-- /wp:heading -->

            <!-- wp:buttons {"className":"dustless-cta-btn"} -->
            <div class="wp-block-buttons dustless-cta-btn"><!-- wp:button {"backgroundColor":"white","textColor":"secondary","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"className":"is-style-button-hover-secondary"} -->
                <div class="wp-block-button is-style-button-hover-secondary"><a class="wp-block-button__link has-secondary-color has-white-background-color has-text-color has-background has-link-color wp-element-button"><?php esc_html_e("Let's Meet Up", 'dustless') ?></a></div>
                <!-- /wp:button -->

                <!-- wp:button {"className":"is-style-outline"} -->
                <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button"><?php esc_html_e("Let's Meet Up", 'dustless') ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->