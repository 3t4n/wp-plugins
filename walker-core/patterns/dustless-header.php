<?php

/**
 * Title: Header
 * Slug: walker-core/dustless-header
 * Categories: dustless-pro
 */
$dustless_header_img = array(
    WALKER_CORE_URL . 'admin/images/dustless/dustless-header-call.png',
    WALKER_CORE_URL . 'admin/images/dustless/dustless-header-location.png',
)
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained"},"fontFamily":"public-sans"} -->
<div class="wp-block-group has-public-sans-font-family" style="padding-right:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"backgroundColor":"terniary","layout":{"type":"constrained"}} -->
    <div class="wp-block-group has-terniary-background-color has-background" style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"layout":{"type":"constrained","wideSize":"1180px"}} -->
        <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"backgroundColor":"terniary","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
            <div class="wp-block-group has-terniary-background-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
                <div class="wp-block-group"><!-- wp:site-logo {"width":60} /-->

                    <!-- wp:site-title {"className":"dustless-text-decoration-none","fontFamily":"sarabun"} /-->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left"}} -->
                <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
                    <div class="wp-block-group"><!-- wp:image {"id":2754,"width":"60px","aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
                        <figure class="wp-block-image size-full is-resized"><img src='<?php echo esc_url($dustless_header_img[0]) ?>' )?&gt;" alt="" class="wp-image-2754" style="aspect-ratio:1;object-fit:cover;width:60px" /></figure>
                        <!-- /wp:image -->

                        <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                        <div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|grey"}}}},"textColor":"grey"} -->
                            <p class="has-grey-color has-text-color has-link-color"><?php esc_html_e('Call Us', 'dustless') ?></p>
                            <!-- /wp:paragraph -->

                            <!-- wp:paragraph -->
                            <p><?php esc_html_e('005-450-8905', 'dustless') ?></p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
                    <div class="wp-block-group"><!-- wp:image {"id":2755,"width":"60px","aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
                        <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($dustless_header_img[1]) ?>" alt="" class="wp-image-2755" style="aspect-ratio:1;object-fit:cover;width:60px" /></figure>
                        <!-- /wp:image -->

                        <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                        <div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|grey"}}}},"textColor":"grey"} -->
                            <p class="has-grey-color has-text-color has-link-color"><?php esc_html_e('Loaction', 'dustless') ?></p>
                            <!-- /wp:paragraph -->

                            <!-- wp:paragraph -->
                            <p><?php esc_html_e('New York, NY 10011, USA.', 'dustless') ?></p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
                        <div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"primary","textColor":"white","style":{"border":{"radius":"0px"},"elements":{"link":{"color":{"text":"var:preset|color|white"}}}}} -->
                            <div class="wp-block-button"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:0px"><?php esc_html_e('Request Quote', 'dustless') ?></a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
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

    <!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"0","bottom":"0"}}},"backgroundColor":"white","layout":{"type":"constrained","wideSize":"1180px"}} -->
    <div class="wp-block-group has-white-background-color has-background" style="padding-top:0;padding-right:var(--wp--preset--spacing--40);padding-bottom:0;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
        <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:navigation --> <!-- wp:page-list /-->
            <!-- /wp:navigation -->
            <!-- wp:search {"label":"","showLabel":false,"buttonText":"","buttonPosition":"button-only","buttonUseIcon":true,"isSearchFieldHidden":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}},"layout":{"selfStretch":"fit","flexSize":null}},"backgroundColor":"white","textColor":"black","fontSize":"small"} /-->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->