<?php

defined( 'ABSPATH' ) or die( 'Na na na na na...' );

if ( ! class_exists( 'SMCBackend' ) ) {
	class SMCBackend {

		private static $JKSocialMediaChat;

		public static function register() {
			add_action( 'admin_menu', array( 'SMCBackend', 'jk_social_media_chat_add_plugin_page' ) );
			add_action( 'admin_init', array( 'SMCBackend', 'jk_social_media_chat_page_init' ) );
		}

		public static function jk_social_media_chat_add_plugin_page() {
			add_theme_page(
				'Social Media Chat', // page_title
				'Social Media Chat', // menu_title
				'manage_options', // capability
				'jk-social-media-chat', // menu_slug
				array( 'SMCBackend', 'jk_social_media_chat_create_admin_page' ) // function
			);
		}

		public static function jk_social_media_chat_create_admin_page() {
			SMCBackend::$JKSocialMediaChat = get_option( 'jk_social_media_chat_option_name' ); ?>

            <div class="wrap">
                <h2>Social Media Chat</h2>
                <p>Integrate Social Media Chat on your website easily without touching any code.</p>
				<?php settings_errors(); ?>

                <form method="post" action="options.php">
					<?php
					settings_fields( 'jk_social_media_option_group' );
					do_settings_sections( 'jk-social-media-chat-admin' );
					submit_button();
					?>
                </form>
            </div>
		<?php }

		public static function jk_social_media_chat_page_init() {
			register_setting(
				'jk_social_media_option_group', // option_group
				'jk_social_media_chat_option_name', // option_name
				array( 'SMCBackend', 'facebook_messenger_chat_for_website_sanitize' ) // sanitize_callback
			);

			add_settings_section(
				'jk_social_media_chat_setting_section', // id
				'Settings', // title
				array( 'SMCBackend', 'jk_social_media_chat_section_info' ), // callback
				'jk-social-media-chat-admin' // page
			);

			add_settings_field(
				'facebook_page_id_0', // id
				'Facebook Page ID', // title
				array( 'SMCBackend', 'facebook_page_id_0_callback' ), // callback
				'jk-social-media-chat-admin', // page
				'jk_social_media_chat_setting_section' // section
			);

			add_settings_field(
				'hide_on_pages_add_ids_with_comma_separated_values_1', // id
				'Hide On (Pages) - Add IDs with comma separated values', // title
				array( 'SMCBackend', 'hide_on_pages_add_ids_with_comma_separated_values_1_callback' ), // callback
				'jk-social-media-chat-admin', // page
				'jk_social_media_chat_setting_section' // section
			);

			add_settings_field(
				'hide_on_posts_add_ids_with_comma_separated_values_2', // id
				'Hide On (Posts) - Add IDs with comma separated values', // title
				array( 'SMCBackend', 'hide_on_posts_add_ids_with_comma_separated_values_2_callback' ), // callback
				'jk-social-media-chat-admin', // page
				'jk_social_media_chat_setting_section' // section
			);

			add_settings_field(
				'hide_on_posts_add_ids_with_comma_separated_values_3', // id
				'Position', // title
				array( 'SMCBackend', 'hide_on_posts_add_ids_with_comma_separated_values_3_callback' ), // callback
				'jk-social-media-chat-admin', // page
				'jk_social_media_chat_setting_section' // section
			);

			add_settings_field(
				'hide_on_posts_add_ids_with_comma_separated_values_4', // id
				'Color', // title
				array( 'SMCBackend', 'hide_on_posts_add_ids_with_comma_separated_values_4_callback' ), // callback
				'jk-social-media-chat-admin', // page
				'jk_social_media_chat_setting_section' // section
			);
		}

		public static function facebook_messenger_chat_for_website_sanitize( $input ) {
			$sanitary_values = array();

			if ( isset( $input['facebook_page_id_0'] ) ) {
				$sanitary_values['facebook_page_id_0'] = sanitize_text_field( $input['facebook_page_id_0'] );
			}

			if ( isset( $input['hide_on_pages_add_ids_with_comma_separated_values_1'] ) ) {
				$sanitary_values['hide_on_pages_add_ids_with_comma_separated_values_1'] = esc_textarea( $input['hide_on_pages_add_ids_with_comma_separated_values_1'] );
			}

			if ( isset( $input['hide_on_posts_add_ids_with_comma_separated_values_2'] ) ) {
				$sanitary_values['hide_on_posts_add_ids_with_comma_separated_values_2'] = esc_textarea( $input['hide_on_posts_add_ids_with_comma_separated_values_2'] );
			}

			if ( isset( $input['hide_on_posts_add_ids_with_comma_separated_values_3'] ) ) {
				$sanitary_values['hide_on_posts_add_ids_with_comma_separated_values_3'] = $input['hide_on_posts_add_ids_with_comma_separated_values_3'];
			}

			if ( isset( $input['hide_on_posts_add_ids_with_comma_separated_values_4'] ) ) {
				$sanitary_values['hide_on_posts_add_ids_with_comma_separated_values_4'] = $input['hide_on_posts_add_ids_with_comma_separated_values_4'];
			}

			return $sanitary_values;
		}

		public static function jk_social_media_chat_section_info() {

		}

		public static function facebook_page_id_0_callback() {
			printf(
				'<input class="regular-text" type="text" name="jk_social_media_chat_option_name[facebook_page_id_0]" id="facebook_page_id_0" value="%s">',
				isset( SMCBackend::$JKSocialMediaChat['facebook_page_id_0'] ) ? esc_attr( SMCBackend::$JKSocialMediaChat['facebook_page_id_0'] ) : ''
			);
		}

		public static function hide_on_pages_add_ids_with_comma_separated_values_1_callback() {
			printf(
				'<textarea class="large-text" rows="5" name="jk_social_media_chat_option_name[hide_on_pages_add_ids_with_comma_separated_values_1]" id="hide_on_pages_add_ids_with_comma_separated_values_1">%s</textarea>',
				isset( SMCBackend::$JKSocialMediaChat['hide_on_pages_add_ids_with_comma_separated_values_1'] ) ? esc_attr( SMCBackend::$JKSocialMediaChat['hide_on_pages_add_ids_with_comma_separated_values_1'] ) : ''
			);
		}

		public static function hide_on_posts_add_ids_with_comma_separated_values_2_callback() {
			printf(
				'<textarea class="large-text" rows="5" name="jk_social_media_chat_option_name[hide_on_posts_add_ids_with_comma_separated_values_2]" id="hide_on_posts_add_ids_with_comma_separated_values_2">%s</textarea>',
				isset( SMCBackend::$JKSocialMediaChat['hide_on_posts_add_ids_with_comma_separated_values_2'] ) ? esc_attr( SMCBackend::$JKSocialMediaChat['hide_on_posts_add_ids_with_comma_separated_values_2'] ) : ''
			);
		}

		public static function hide_on_posts_add_ids_with_comma_separated_values_3_callback() {
			?> <select name="jk_social_media_chat_option_name[hide_on_posts_add_ids_with_comma_separated_values_3]"
                       id="hide_on_posts_add_ids_with_comma_separated_values_3">
				<?php $selected = ( isset( SMCBackend::$JKSocialMediaChat['hide_on_posts_add_ids_with_comma_separated_values_3'] ) && SMCBackend::$JKSocialMediaChat['hide_on_posts_add_ids_with_comma_separated_values_3'] === 'left' ) ? 'selected' : ''; ?>
                <option value="left" <?php echo $selected; ?>>Left</option>
				<?php $selected = ( isset( SMCBackend::$JKSocialMediaChat['hide_on_posts_add_ids_with_comma_separated_values_3'] ) && SMCBackend::$JKSocialMediaChat['hide_on_posts_add_ids_with_comma_separated_values_3'] === 'right' ) ? 'selected' : ''; ?>
                <option value="right" <?php echo $selected; ?>>Right</option>
            </select> <?php
		}

		public static function hide_on_posts_add_ids_with_comma_separated_values_4_callback() {
			printf(
				'<input type="text" class="my-color-field" name="jk_social_media_chat_option_name[hide_on_posts_add_ids_with_comma_separated_values_4]" id="hide_on_posts_add_ids_with_comma_separated_values_4" value="%s">',
				isset( SMCBackend::$JKSocialMediaChat['hide_on_posts_add_ids_with_comma_separated_values_4'] ) ? esc_attr( SMCBackend::$JKSocialMediaChat['hide_on_posts_add_ids_with_comma_separated_values_4'] ) : ''
			);
		}

	}
}
