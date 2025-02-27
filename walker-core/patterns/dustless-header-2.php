<?php

/**
 * Title: Header 2
 * Slug: walker-core/dustless-header-2
 * Categories: dustless-pro
 */
$dustless_header_img = array(
    WALKER_CORE_URL . 'admin/images/dustless/dustless-header-mail.png',
    WALKER_CORE_URL . 'admin/images/dustless/dustless-header-location-2.png',
    WALKER_CORE_URL . 'admin/images/dustless/dustless-header-phone.png',
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"white","layout":{"type":"constrained"},"fontFamily":"public-sans"} -->
<div class="wp-block-group has-public-sans-font-family has-white-background-color has-background" style="padding-top:0;padding-right:var(--wp--preset--spacing--40);padding-bottom:0;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"border":{"width":"1px"}},"borderColor":"terniary","layout":{"type":"constrained"}} -->
    <div class="wp-block-group has-border-color has-terniary-border-color" style="border-width:1px"><!-- wp:group {"style":{"border":{"width":"0px","style":"none"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained","wideSize":"1180px"}} -->
        <div class="wp-block-group" style="border-style:none;border-width:0px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
            <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
                <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                    <div class="wp-block-group"><!-- wp:image {"id":2761,"width":"30px","height":"30px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
                        <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($dustless_header_img[0]) ?>" alt="" class="wp-image-2761" style="object-fit:contain;width:30px;height:30px" /></figure>
                        <!-- /wp:image -->

                        <!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}}} -->
                        <p style="font-size:14px"><?php esc_html_e('sample08@email.com', 'dustless') ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                    <div class="wp-block-group"><!-- wp:image {"id":2763,"width":"30px","height":"30px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
                        <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($dustless_header_img[1]) ?>" alt="" class="wp-image-2763" style="object-fit:contain;width:30px;height:30px" /></figure>
                        <!-- /wp:image -->

                        <!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}}} -->
                        <p style="font-size:14px"><?php esc_html_e('przykładowy obszar działania', 'dustless') ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"layout":{"type":"constrained"}} -->
                <div class="wp-block-group"><!-- wp:social-links {"iconColor":"primary","iconColorValue":"#EE940E","className":"is-style-logos-only","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
                    <ul class="wp-block-social-links has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                        <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                        <!-- wp:social-link {"url":"#","service":"twitter"} /-->

                        <!-- wp:social-link {"url":"#","service":"telegram"} /-->
                    </ul>
                    <!-- /wp:social-links -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained","wideSize":"1180px"}} -->
    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
        <div class="wp-block-group"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-group"><!-- wp:site-logo {"width":60} /-->

                <!-- wp:site-title {"className":"dustless-text-decoration-none","fontFamily":"sarabun"} /-->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40","padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
            <div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:navigation {"ref":4} --> <!-- wp:page-list /-->
                <!-- /wp:navigation -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"10px","padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:image {"id":2774,"width":"40px","height":"40px","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($dustless_header_img[2]) ?>" alt="" class="wp-image-2774" style="object-fit:cover;width:40px;height:40px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group"><!-- wp:paragraph -->
                        <p><?php esc_html_e('Fee Consultation', 'dustless') ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph -->
                        <p><?php esc_html_e('005-450-8905', 'dustless') ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->