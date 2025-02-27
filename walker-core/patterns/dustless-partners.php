<?php

/**
 * Title: Partners
 * Slug: walker-core/dustless-partners
 * Categories: walkercore-pro
 */
$dustless_partners_img = array(
    WALKER_CORE_URL . 'admin/images/dustless/logosmple.png',
    WALKER_CORE_URL . 'admin/images/dustless/logoipsum.png',
    WALKER_CORE_URL . 'admin/images/dustless/astraone.png',
    WALKER_CORE_URL . 'admin/images/dustless/digital-light.png',
    WALKER_CORE_URL . 'admin/images/dustless/samsung.png'
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"80px","bottom":"80px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:80px;padding-bottom:80px"><!-- wp:group {"tagName":"main","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"50px"}},"className":"dustless-partner-img","layout":{"type":"constrained","contentSize":"1180px"}} -->
    <main class="wp-block-group dustless-partner-img" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"30px"}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"textColor":"primary","fontFamily":"public-sans"} -->
            <h2 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-link-color has-public-sans-font-family" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php esc_html_e('Our Partners', 'dustless') ?></h2>
            <!-- /wp:heading -->

            <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"40px"}},"fontFamily":"sarabun"} -->
            <h2 class="wp-block-heading has-text-align-center has-sarabun-font-family" style="font-size:40px"><?php esc_html_e('Our Supportive Clients', 'dustless') ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|grey"}}},"typography":{"fontSize":"16px"}},"textColor":"grey"} -->
            <p class="has-text-align-center has-grey-color has-text-color has-link-color" style="font-size:16px"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', 'dustless') ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:columns {"verticalAlignment":"center"} -->
        <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"20%"} -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:20%"><!-- wp:image {"id":3006,"sizeSlug":"full","linkDestination":"none","align":"center"} -->
                <figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url($dustless_partners_img[0]) ?>" alt="" class="wp-image-3006" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","width":"20%"} -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:20%"><!-- wp:image {"id":3008,"sizeSlug":"full","linkDestination":"none","align":"center"} -->
                <figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url($dustless_partners_img[1]) ?>" alt="" class="wp-image-3008" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","width":"20%"} -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:20%"><!-- wp:image {"id":3009,"sizeSlug":"full","linkDestination":"none","align":"center"} -->
                <figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url($dustless_partners_img[2]) ?>" alt="" class="wp-image-3009" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","width":"20%"} -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:20%"><!-- wp:image {"id":3005,"sizeSlug":"full","linkDestination":"none","align":"center"} -->
                <figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url($dustless_partners_img[3]) ?>" alt="" class="wp-image-3005" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","width":"20%"} -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:20%"><!-- wp:image {"id":3007,"sizeSlug":"full","linkDestination":"none","align":"center"} -->
                <figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url($dustless_partners_img[4]) ?>" alt="" class="wp-image-3007" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </main>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->