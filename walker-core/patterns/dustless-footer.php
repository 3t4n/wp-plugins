<?php

/**
 * Title: Footer Pro
 * Slug: walker-core/dustless-footer
 * Categories: dustless-pro
 */
?>
<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"padding":{"top":"30px","bottom":"30px","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"secondary","textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-color has-secondary-background-color has-text-color has-background has-link-color" style="padding-top:30px;padding-right:var(--wp--preset--spacing--40);padding-bottom:30px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"border":{"bottom":{"width":"0px","style":"none"},"top":[],"right":[],"left":[]},"spacing":{"padding":{"top":"50px","bottom":"50px"}}},"layout":{"type":"constrained","wideSize":"1180px"},"fontFamily":"public-sans"} -->
    <div class="wp-block-group has-public-sans-font-family" style="border-bottom-style:none;border-bottom-width:0px;padding-top:50px;padding-bottom:50px"><!-- wp:columns {"style":{"border":{"bottom":{"width":"0px","style":"none"},"top":[],"right":[],"left":[]},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}}} -->
        <div class="wp-block-columns" style="border-bottom-style:none;border-bottom-width:0px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:column {"verticalAlignment":"top","width":"25%","style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
            <div class="wp-block-column is-vertically-aligned-top" style="flex-basis:25%"><!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white","fontFamily":"sarabun"} -->
                <h2 class="wp-block-heading has-white-color has-text-color has-link-color has-sarabun-font-family"><?php esc_html_e('Dustless', 'dustless') ?></h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p><?php esc_html_e('Leo elementum iaculis quam massa vitae odio sed. Moebi tincidunt senectus.', 'dustless') ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:social-links {"iconColor":"white","iconColorValue":"#ffffff","iconBackgroundColor":"primary","iconBackgroundColorValue":"#EE940E","className":"is-style-default","layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <ul class="wp-block-social-links has-icon-color has-icon-background-color is-style-default"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                    <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                    <!-- wp:social-link {"url":"#","service":"twitter"} /-->

                    <!-- wp:social-link {"url":"#","service":"tiktok"} /-->
                </ul>
                <!-- /wp:social-links -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"25%","style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
            <div class="wp-block-column" style="flex-basis:25%"><!-- wp:heading {"fontFamily":"sarabun"} -->
                <h2 class="wp-block-heading has-sarabun-font-family"><?php esc_html_e('Company', 'dustless') ?></h2>
                <!-- /wp:heading -->

                <!-- wp:navigation {"layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
                <!-- wp:page-list /-->
                <!-- /wp:navigation -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"top","style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
            <div class="wp-block-column is-vertically-aligned-top"><!-- wp:heading {"fontFamily":"sarabun"} -->
                <h2 class="wp-block-heading has-sarabun-font-family"><?php esc_html_e('Services', 'dustless') ?></h2>
                <!-- /wp:heading -->

                <!-- wp:categories {"showPostCounts":true,"className":"dustless-list-style-none dustless-footer-categories"} /-->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"25%","style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
            <div class="wp-block-column" style="flex-basis:25%"><!-- wp:heading {"style":{"typography":{"fontSize":"25px"}},"fontFamily":"sarabun"} -->
                <h2 class="wp-block-heading has-sarabun-font-family" style="font-size:25px"><?php esc_html_e('Subscribe to Newsletter', 'dustless') ?></h2>
                <!-- /wp:heading -->

                <!-- wp:contact-form-7/contact-form-selector {"id":50,"hash":"754b4b8","title":"Newsletter Mail Subscription","className":"dustless-footer-input"} -->
                <div class="wp-block-contact-form-7-contact-form-selector dustless-footer-input">[contact-form-7 id="754b4b8" title="Newsletter Mail Subscription"]</div>
                <!-- /wp:contact-form-7/contact-form-selector -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"layout":{"type":"constrained","contentSize":"1180px"},"fontFamily":"public-sans"} -->
    <div class="wp-block-group has-public-sans-font-family"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
        <div class="wp-block-group"><!-- wp:paragraph -->
            <p><?php esc_html_e('Proudly powered by WordPress | Theme: MasterHome by WalkerWP', 'dustless') ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph -->
            <p><a href="#"><?php esc_html_e('Terms & Conditions', 'dustless') ?></a></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->