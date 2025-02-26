<?php

if ( isset( $_GET['wpzKey'] ) ) {
	delete_transient('wpz_ai_images_pro');
	if ( $_GET['wpzKey'] ) {
		update_option( 'wpz_ai_images_key', sanitize_key( $_GET['wpzKey'] ), true );
	} else {
		delete_option( 'wpz_ai_images_key' );
	}
}


$hasKey = (bool) get_option( 'wpz_ai_images_key' );
$isTermsPage = !empty($_GET['terms']);
$isPro = WpzAiImageLab::isPro();
?>

<h1 class="hidden"></h1>

<div id="wpz-ai-image-lab-settings-container">
    <div id="wpz-ai-image-lab-settings">

        <div id="wpz-ai-image-lab-settings-header">
            <div class="wpz-ai-image-lab-settings-logo">
                <img alt="ai-image-generator-logo"
                     src="<?php echo esc_url( WpzAiImageLab::$pluginUrl . 'assets/img/logo.svg' ); ?>">
                <h1><?php $isPro ? esc_html_e( 'AI Image Lab Pro', 'wpz-ai-image-lab' ) : esc_html_e( 'AI Image Lab', 'wpz-ai-image-lab' ); ?></h1>
            </div>
			<?php if ($hasKey && !$isTermsPage) { ?>
            <div id="wpz-ai-image-lab-settings-header-links">
                <a class="wpz-ai-image-lab-settings-header-link"
                   href="https://www.facebook.com/aiimagelab" target="_blank"><?php esc_html_e( 'Facebook', 'wpz-ai-image-lab' ); ?></a>
                <a class="wpz-ai-image-lab-settings-header-link"
                   href="https://www.instagram.com/aiimagelab" target="_blank"><?php esc_html_e( 'Instagram', 'wpz-ai-image-lab' ); ?></a>
                <a class="wpz-ai-image-lab-settings-header-link"
                   href="https://wordpress.org/support/plugin/ai-image-generator-lab/"
                   target="_blank"><?php esc_html_e( 'Support', 'wpz-ai-image-lab' ); ?></a>
                <a class="wpz-ai-image-lab-settings-header-link"
                   href="https://wpzone.co/docs/plugin/ai-image-lab-generator/"
                   target="_blank"><?php esc_html_e( 'Documentation', 'wpz-ai-image-lab' ); ?></a>
            </div>
			<?php } ?>
        </div>
		
		<?php if ($hasKey && !$isTermsPage) { ?>
        <ul id="wpz-ai-image-lab-settings-tabs">
            <li class="wpz-ai-image-lab-settings-active">
                <a href="#welcome"><?php esc_html_e( 'Get Started', 'wpz-ai-image-lab' ); ?></a>
            </li>
            <li>
                <a href="#settings"><?php esc_html_e( 'Settings', 'wpz-ai-image-lab' ); ?></a>
            </li>
            <li>
                <a href="#terms"><?php esc_html_e( 'Terms Of Use', 'wpz-ai-image-lab' ); ?></a>
            </li>
            <li>
                <a href="#addons"><?php esc_html_e( 'Addons', 'wpz-ai-image-lab' ) ?></a>
            </li>
        </ul>
		<?php } ?>

        <div id="wpz-ai-image-lab-settings-tabs-content">


	        <?php if (!empty($_GET['wpzKey'])) { ?>
                <p class="wpz-ai-image-lab-notification wpz-ai-image-lab-notification-success">
			        <?php esc_html_e( 'AI Image Lab is now connected to your WP Zone account!', 'wpz-ai-image-lab' ) ?>
                </p>
	        <?php } ?>

			<?php if (!$isTermsPage) { ?>
            <div id="wpz-ai-image-lab-settings-welcome"
                 class="wpz-ai-image-lab-settings-active">

				<?php
				if ( $hasKey ) {
					?>
                    <div id="wpz-ai-images-admin-page-getting-started">
					
						<div id="wpz-ai-images-video">
							<div id="wpz-ai-images-video-overlay">
								<a href="#">Play Video</a>
							</div>
							<img src="<?php echo(esc_url(self::$pluginUrl.'assets/img/video-thumbnail.png')); ?>" alt="Generate Images with AI video thumbnail">
							<small><?php esc_html_e('Clicking the play button will load the video player from an external site.', 'wpz-ai-image-lab'); ?></small>
						</div>
                       
                        <h3><?php esc_html_e('How It Works', 'wpz-ai-image-lab'); ?></h3>
						
						<p><?php printf(esc_html__('AI Image Lab generates custom graphics based on text you enter to describe the images you are looking for (known as a "prompt"). You can provide one or more prompt phrases, and %sthese play an important role in the quality and usefulness of the output image%s. You can also specify some additional parameters related to the style and specifications of the image you want to create.', 'wpz-ai-image-lab'), '<strong>', '</strong>'); ?></p>
						
						
						<p><?php printf(esc_html__('AI image generation is still an emerging technology and %1$sit is not perfect%2$s. There are some things it struggles with, such as %1$shuman faces and features%2$s (especially for images with multiple people) and images containing text. AI Image Lab provides six images for each generation process to increase the likelihood that you receive a useful image. You can also use the built-in AI image editor to improve generated images.', 'wpz-ai-image-lab'), '<strong>', '</strong>'); ?></p>
						
						<p><?php printf(esc_html__('Speaking of the AI image editor - it also integrates with your WordPress media library and lets you %sedit existing images%s, including photos you\'ve uploaded! %sThis blog post on our website%s has more details.', 'wpz-ai-image-lab'), '<strong>', '</strong>', '<a href="https://wpzone.co/blog/how-to-improve-your-ai-generated-images-and-edit-photos-with-ai/" target="_blank">', '</a>'); ?></p>
						
						<p><?php esc_html_e('Here are some articles from our website that may be a useful reference as you start using AI Image Lab!', 'wpz-ai-image-lab'); ?>
                            <ul>
                                <li>
                                    <a href="https://wpzone.co/blog/harness-the-power-of-ai-to-generate-custom-images-for-your-divi-and-wordpress-sites/" target="_blank">
                                        <?php esc_html_e('Overview of how to generate images', 'wpz-ai-image-lab'); ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://wpzone.co/blog/how-to-improve-your-ai-generated-images-and-edit-photos-with-ai/" target="_blank">
                                        <?php esc_html_e('How to use the AI image editor', 'wpz-ai-image-lab'); ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://wpzone.co/blog/generate-photos-and-artwork-in-the-divi-builder-with-our-free-ai/" target="_blank">
                                        <?php esc_html_e('Using AI Image Lab with Divi', 'wpz-ai-image-lab'); ?>
                                    </a>
                                </li>
                            </ul>
                        </p>
                        <h3><?php esc_html_e('Get Started', 'wpz-ai-image-lab'); ?></h3>
                        
						<p>
						<?php
	                    printf(
	                    // translators: first %s are link tags, second strong tags
		                    esc_html__('You can take AI Image Lab for a spin right in the WordPress %sMedia Library%s! Simply click the %sGenerate Image with AI%s button near the top of the page to give it a try. You can also load an existing image into the AI image editor by clicking on it and clicking the Edit in AI Image Lab button near the bottom of the window.', 'wpz-ai-image-lab'),
		                    '<a href="'.  esc_url( admin_url( 'upload.php' ) )  . '">',
		                    '</a>',
                            '<strong>',
                            '</strong>'
	                    );
	                    ?>
						</p>
                        
						<p>
                        <?php
                        printf(
                        // translators: first %s are link tags, second strong tags
                            esc_html__('AI Image Lab can also be a seamless integration into your content creation process with many editors and page builders. Select the option to upload an image in the compatible content editor of your choice, such as the WordPress block editor or the %sDivi%s builder, and click the %sGenerate Image with AI%s button in the image upload window.'),
                            '<a href="https://wpzone.co/recommends/divi" target="_blank">',
                            '</a>',
                            '<strong>',
                            '</strong>'
                        );
                        ?>
                        </p>
                    </div>
					<?php
				} else {
				?>
				
				<h2><?php esc_html_e('Welcome to AI Image Lab!', 'wpz-ai-image-lab'); ?></h2>
				<p>
					<?php esc_html_e('Let\'s get you on your way to generating beautiful custom photos and artwork for your site! First, we\'ll need you to connect to your WP Zone account; sign up for free if you don\'t have one yet. You\'ll be redirected to our site for this step.', 'wpz-ai-image-lab'); ?>
				</p>
				
				<p>
					<a href="<?php echo( esc_url( add_query_arg( 'keyUrl', rawurlencode( admin_url( 'admin.php?page=wpz-ai-images' ) ), self::KEY_ISSUE_URL ) ) ); ?>"
					   class="wpz-ai-image-lab-button-primary wpz-ai-image-lab-button-large">Connect</a>
				</p>
				
				<?php } ?>


            </div>
			<?php } ?>
			
			<?php if ($hasKey && !$isTermsPage) { ?>
			<div id="wpz-ai-image-lab-settings-settings">
				<p><?php esc_html_e('You have connected this site to the AI Image Lab service. If at anytime you need to reconnect to your AI Image Lab account, you can do so using the button below. This will redirect you to the WP Zone site.', 'wpz-ai-image-lab'); ?></p>
				<p>
					<a href="<?php echo( esc_url( add_query_arg( 'keyUrl', rawurlencode( admin_url( 'admin.php?page=wpz-ai-images' ) ), self::KEY_ISSUE_URL ) ) ); ?>"
					   class="wpz-ai-image-lab-button-primary wpz-ai-image-lab-button-large">Connect</a>
					<?php
					if ( $hasKey ) {
						?>
						<a href="<?php echo( esc_url( add_query_arg( 'wpzKey', '' ) ) ); ?>"
						   class="wpz-ai-image-lab-button-secondary wpz-ai-image-lab-button-large">Disconnect</a>
						<?php
					}
					?>
				</p>
			</div>
			<?php } ?>
			
			<?php if ($hasKey || $isTermsPage) { ?>
            <div id="wpz-ai-image-lab-settings-terms"<?php if ($isTermsPage) { ?> class="wpz-ai-image-lab-settings-active"<?php } ?>>
                <div id="wpz-ai-images-admin-page-terms">
                    <h2>Terms of Use</h2>

                    <p>These terms of use govern your use of the WP Zone AI Image Lab service. You agree to be bound by
                        these terms if you connect your site to or use the WP Zone AI Image Lab service. You are
                        responsible for ensuring that all users of the service on your site comply with these terms.</p>

                    <h3>Definitions</h3>

                    <p><strong>"WP Zone"</strong> and <strong>"us"</strong> refers to Aspen Grove Studios, LLC, dba WP
                        Zone.<br>
                        The <strong>"Terms"</strong> are the Terms of Use specified herein.<br>
                        The <strong>"Service"</strong> is the WP Zone AI Image Lab service.<br>
                        The <strong>"Model"</strong> is the model used by the Service to generate images when requests
                        are made to the Service.<br>
                        The <strong>"Software"</strong> is the AI Image Lab WordPress plugin published by WP Zone.</p>

                    <h3>Disclaimer</h3>

                    <p>To the extent permitted by applicable law, the Service is provided as-is, without any warranty,
                        express or implied. Without limiting the foregoing, WP Zone makes no guarantees or
                        representations as to the availability of the Service or the suitability of the output generated
                        by the Service.

                    <h3>Our Use of Your Prompts and Images</h3>

                    <p>By using the Service, you give us an irrevocable and perpetual license to use your text prompts,
                        other image generation settings, and the images generated by the Service in connection with your
                        requests, for the purposes of improving the Service and conducting research related to the
                        Service. You acknowlede that you will not include any personally identifying information or
                        other sensitive data in your prompt text.</p>

                    <h3>Use Restrictions</h3>

                    <p>You agree not to use the Service:</p>

                    <p>
                        - In any way that violates applicable law or regulation;<br>
                        - In any way that degrades the Service for other users due to the volume and/or content of
                        requests you make to the Service;<br>
                        - In any way that constitutes an attempt at unauthorized access to any system or server;<br>
                        - In any way that results in an unauthorized use of the Model (see below);<br>
                        - As part of an image generation service other than the Service;<br>
                        - By any means other than the official Software, or such other access methods as may be made
                        available by WP Zone from time to time
                    </p>

                    <p>You agree not to use the Model or Derivatives of the Model:</p>

                    <p>
                        - In any way that violates any applicable national, federal, state, local or international law
                        or regulation;<br>
                        - For the purpose of exploiting, harming or attempting to exploit or harm minors in any way;<br>
                        - To generate or disseminate verifiably false information and/or content with the purpose of
                        harming others;<br>
                        - To generate or disseminate personal identifiable information that can be used to harm an
                        individual;<br>
                        - To defame, disparage or otherwise harass others;<br>
                        - For fully automated decision making that adversely impacts an individual’s legal rights or
                        otherwise creates or modifies a binding, enforceable obligation;<br>
                        - For any use intended to or which has the effect of discriminating against or harming
                        individuals or groups based on online or offline social behavior or known or predicted personal
                        or personality characteristics;<br>
                        - To exploit any of the vulnerabilities of a specific group of persons based on their age,
                        social, physical or mental characteristics, in order to materially distort the behavior of a
                        person pertaining to that group in a manner that causes or is likely to cause that person or
                        another person physical or psychological harm;<br>
                        - For any use intended to or which has the effect of discriminating against individuals or
                        groups based on legally protected characteristics or categories;<br>
                        - To provide medical advice and medical results interpretation;<br>
                        - To generate or disseminate information for the purpose to be used for administration of
                        justice, law enforcement, immigration or asylum processes, such as predicting an individual will
                        commit fraud/crime commitment (e.g. by text profiling, drawing causal relationships between
                        assertions made in documents, indiscriminate and arbitrarily-targeted use).
                    </p>

                    <h3>Modification</h3>

                    <p>WP Zone reserves the right to modify these Terms at any time without notice. WP Zone may publish
                        modified terms on its website and/or in updated versions of the Software. By using the Service,
                        you agree to the most recently published version of the Terms.</p>

                    <h3>Privacy Policy</h3>

                    <p>Read the Privacy Policy for AI Image Lab <a href="https://wpzone.co/ai-image-lab-privacy-policy/" target="blank">here</a> (external link).</p>


                </div>



            </div>
			<?php } ?>
			
			<?php if ($hasKey && !$isTermsPage) { ?>
            <div id="wpz-ai-image-lab-settings-addons">
				<?php
				WPZ_Ai_Image_Lab_Addons::outputList();
				?>
            </div>
			<?php } ?>
        </div>
		
		
		<p id="wpz-ai-images-settings-footnote">
		<small><?php printf(
			esc_html__('By connecting your site to AI Image Lab, or using the AI Image Lab service, you agree to be
			bound by the %sAI Image Lab terms of use%s.', 'wpz-ai-image-lab'),
			'<a href="'.esc_url(add_query_arg('terms', 1)).'" target="_blank">',
			'</a>'
		); ?></small>
		</p>

    </div>
</div>
