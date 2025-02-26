<?php defined('ABSPATH') || exit; ?>

<div class="wp-block-wpz-aiil-image-mi">

    <div class="wp-block-wpz-aiil-image-mi-wrapper">
        <div class="wp-block-wpz-aiil-image-mi-use-plugin">
            <h4><?php esc_html_e('How To Use AI Image Block', 'wpz-ai-images') ?></h4>
            <ul>
                <li>
	                <?php esc_html_e( 'Use the arrows in the toolbar to navigate between alternate images, then click the checkmark to select an image. ', 'wpz-ai-image-lab' ); ?>
                </li>
                <li>
	                <?php esc_html_e( 'After selecting an image, you can optionally transform this block into a different block (such as the Image block) for more formatting and other options. To transfrom an AI Image block into a different block type, click the AI Image Lab logo at the far left of the toolbar above the block, and select the desired block type from the dropdown. Most block type transformations are only available after an image is selected.', 'wpz-ai-image-lab' ); ?>
                </li>
	            <?php if (!WpzAiImageLab::isPro()){?>
                    <li>
                    <?php esc_html_e( 'Visible watermarks in the preview image will be removed after selecting an image.', 'wpz-ai-image-lab' ); ?>
                    </li>
                <?php  } ?>
            </ul>
        </div>
    </div>
    <div class="wp-block-wpz-aiil-image-mi-wrapper">
        <div class="wp-block-wpz-aiil-image-mi-use-plugin">
            <h4><?php esc_html_e('Important Notes', 'wpz-ai-images') ?></h4>
			<ul>
				<li><?php esc_html_e('Some types of images are better suited for AI Image Lab than others. Particularly, AI Image Lab is currently not good at creating images with multiple faces or images containing text.', 'wpz-ai-image-lab'); ?></li>
				<li><?php /* translators: %s = link tag */ printf(esc_html__('For more image generation options, try generating images in the WordPress media dialog or %sMedia Library%s.', 'wpz-ai-image-lab'), '<a href="'.esc_url(admin_url('upload.php')).'" target="_blank">', '</a>'); ?></li>
				<li><?php /* translators: %s = link tags */ printf(esc_html__('Use of the AI Image Lab service and output is subject to the AI Image Lab %sTerms of Use%s and %sPrivacy Policy%s (external links.', 'wpz-ai-image-lab'), '<a href="https://wpzone.co/ai-image-lab-terms-of-use/" target="_blank">', '</a>', '<a href="https://wpzone.co/ai-image-lab-privacy-policy/" target="_blank">', '</a>'); ?></li>
			</ul>
		</div>
	</div>
    <div class="wp-block-wpz-aiil-image-mi-wrapper">
        <div class="wp-block-wpz-aiil-image-mi-links">
            <h4><?php esc_html_e('Important Links', 'wpz-ai-images') ?></h4>
            <ul>
                <li>
                    <a href="admin.php?page=wpz-ai-images/#welcome" target="_blank"><?php esc_html_e( 'Get Started', 'wpz-ai-image-lab' ); ?></a>
                </li>
                <li>
                    <a href="admin.php?page=wpz-ai-images/#settings" target="_blank"><?php esc_html_e( 'Settings', 'wpz-ai-image-lab' ); ?></a>
                </li>
                <li>
                    <a href="https://wpzone.co/product/" target="_blank"><?php esc_html_e( 'View Our Products', 'wpz-ai-image-lab' ) ?></a>
                </li>
                <li>
                    <a class=""  href="https://www.facebook.com/aiimagelab" target="_blank"><?php esc_html_e( 'AI Image Lab Facebook', 'wpz-ai-image-lab' ); ?></a>
                </li>
                <li>
                    <a class=""  href="https://www.instagram.com/aiimagelab" target="_blank"><?php esc_html_e( 'AI Image Lab Instagram', 'wpz-ai-image-lab' ); ?></a>
                </li>
                <li>
                    <a class=""  href="https://wordpress.org/support/plugin/ai-image-generator-lab/" target="_blank"><?php esc_html_e( 'Support', 'wpz-ai-image-lab' ); ?></a>
                </li>
                <li>
                    <a class=""  href="https://wpzone.co/docs/plugin/ai-image-lab-generator/" target="_blank"><?php esc_html_e( 'Documentation', 'wpz-ai-image-lab' ); ?></a>
                </li>
                <li>
                    <a href="admin.php?page=wpz-ai-images/#terms" target="_blank"><?php esc_html_e( 'Terms Of Use', 'wpz-ai-image-lab' ); ?></a>
                </li>
            </ul>
        </div>
    </div>
    <?php if (!WpzAiImageLab::isPro()){ ?>
        <div id="aiil-banner-upgrade">
            <img src=" <?php echo( esc_url( plugins_url( '../../assets/img/ai-image-lab-images.png', __FILE__ ) ) ) ?> " alt="AI Image Lab Images" >
            <h3><?php esc_html_e('Upgrade', 'wpz-ai-image-lab') ?></h3>
            <p>
	            <?php
	            printf(
	            // translators: %s are link tags
		            esc_html__('Gain access to more features with %sAI Image Lab Pro%s', 'wpz-ai-image-lab'),
		            '<a href="https://wpzone.co/product/ai-image-generator-lab/" target="_blank"><strong>',
		            '</strong></a>'
	            );
	            ?>
            </p>
            <p>
                <ul>
                    <li><?php esc_html_e('Granular control over prompt weighting and other image settings', 'wpz-ai-image-lab') ?></li>
                    <li><?php esc_html_e('Compatible with Gutenberg &amp; popular page builders', 'wpz-ai-image-lab') ?></li>
                    <li><?php esc_html_e('Unlimited AI image previews per day', 'wpz-ai-image-lab') ?></li>
                    <li><?php esc_html_e('10 preview images per generation request', 'wpz-ai-image-lab') ?></li>
                    <li><?php esc_html_e('Unlimited image downloads per day', 'wpz-ai-image-lab') ?></li>
                    <li><?php esc_html_e('2048px maximum image resolution', 'wpz-ai-image-lab') ?></li>
                    <li><?php esc_html_e('Non-watermarked image previews', 'wpz-ai-image-lab') ?></li>
                    <li><?php esc_html_e('Premium technical support', 'wpz-ai-image-lab') ?></li>
                </ul>
            </p>
            <a class="wpz-ai-image-lab-button-primary wpz-ai-image-lab-button-medium" href="https://wpzone.co/product/ai-image-generator-lab/" target="_blank"><?php esc_html_e('Upgrade Now', 'wpz-ai-image-lab') ?></a>
        </div>
    <?php } ?>

</div>