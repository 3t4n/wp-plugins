<?php

defined( 'ABSPATH') or die( 'Na na na na na...' );
class SMCFrontend
{

	public function __construct() {
		add_action( 'wp_footer', array( $this, 'add_fb_messenger_website_chat' ) );
	}

	public function add_fb_messenger_website_chat() {

		$jk_social_media_chat_options = get_option( 'jk_social_media_chat_option_name' );
		$fb_page_id                                  = $jk_social_media_chat_options['facebook_page_id_0'];
		$hide_on_pages                               = $jk_social_media_chat_options['hide_on_pages_add_ids_with_comma_separated_values_1'];
		$hide_on_posts                               = $jk_social_media_chat_options['hide_on_posts_add_ids_with_comma_separated_values_2'];
		$position = $jk_social_media_chat_options['hide_on_posts_add_ids_with_comma_separated_values_3'];
		$color                               = $jk_social_media_chat_options['hide_on_posts_add_ids_with_comma_separated_values_4'];

		if ( is_page( explode( ',', $hide_on_pages ) ) ) {
			return false;
		} elseif ( is_single( explode( ',', $hide_on_posts ) ) ) {
			return false;
		} else { ?>

			<style>
				.fb_iframe_widget iframe {
				<?php echo $position ?>: 0pt !important;
				}
				.fb_reset>div {
				<?php echo $position ?>: 9pt !important;
				}
			</style>
			<div id="fb-root"></div>
			<script>
                window.fbAsyncInit = function () {
                    FB.init({
                        xfbml: true,
                        version: 'v3.3'
                    });
                };

                (function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>

			<div class="fb-customerchat" attribution=setup_tool page_id="<?php echo $fb_page_id ?>" theme_color="<?php echo $color ?>">
			</div>

		<?php }
	}

}

new SMCFrontend();
