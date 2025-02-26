<?php

/**
 * Class Appswiperslider_App_Swiper_Slider_MetaBox
 */

if (!class_exists('Appswiperslider_App_Swiper_Slider_MetaBox')):
	class Appswiperslider_App_Swiper_Slider_MetaBox
	{


		/**
		 * Move the featured image meta box below the title.
		 */
		public function appswiperslider_change_logo_meta_box_position()
		{
			// Remove the featured image meta box from the sidebar.
			remove_meta_box('postimagediv', 'appswiperslider', 'side');

			// Add it back as a normal meta box below the title.
			add_meta_box(
				'postimagediv',
				__('App Screen', 'app-swiper-slider'), // Custom title for the meta box.
				'post_thumbnail_meta_box', // The callback function for rendering the box.
				'appswiperslider', // Custom post type.
				'normal', // Position (below editor).
				'high' // Priority within the position.
			);
		}
		/**
		 * Add all meta boxes.
		 */
		public function add_meta_boxes_callback()
		{
			add_meta_box(
				'appswiperslider_sectionid',
				__("App URL", 'app-swiper-slider'),
				[$this, 'render_meta_box'],
				'appswiperslider',
				'normal', // Position (below editor).
				'high' // Priority within the position.
			);
		}

		/**
		 * Render the main meta box content.
		 *
		 * @param WP_Post $post The current post object.
		 */
		public function render_meta_box($post)
		{
			// Security nonce for saving data.
			wp_nonce_field('app_swiper_slider_save_meta_box_data', 'app_swiper_slider_meta_box_nonce');

			// Get the current meta value.
			$value = get_post_meta($post->ID, 'client_url', true);

			echo '<label for="app_swiper_slider_url_field">';
			esc_html_e('URL:', 'app-swiper-slider');
			echo '</label> ';
			echo '<input type="url" id="app_swiper_slider_url_field" name="app_swiper_slider_url_field" value="' . esc_attr($value) . '" size="50" />';
		}

		/**
		 * Save the meta box data when saving the post.
		 *
		 * @param int $post_id Post ID.
		 */
		public function save_meta_box_data($post_id)
		{
			// Verify the nonce.
			if (
				!isset($_POST['app_swiper_slider_meta_box_nonce']) ||
				!wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['app_swiper_slider_meta_box_nonce'])), 'app_swiper_slider_save_meta_box_data')
			) {
				return;
			}

			// Prevent saving during autosave or revisions.
			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
				return;
			}

			// Check permissions.
			if (isset($_POST['post_type']) && 'appswiperslider' === $_POST['post_type']) {
				if (!current_user_can('edit_post', $post_id)) {
					return;
				}
			} else {
				return;
			}

			// Sanitize and save the meta value.
			if (isset($_POST['app_swiper_slider_url_field'])) {
				$url = sanitize_text_field(wp_unslash($_POST['app_swiper_slider_url_field'])); // Unslash before sanitization.
				update_post_meta($post_id, 'client_url', $url);
			}
		}

		/**
		 * Add the PRO version advertisement meta box.
		 */
		public function add_pro_meta_box()
		{
			add_meta_box(
				'app_swiper_slider_sectionid_support',
				__('App Swiper Slider - Support', 'app-swiper-slider'),
				[$this, 'render_pro_meta_box'],
				'appswiperslider',
				'normal',
				'low'
			);
		}

		/**
		 * Render the PRO version advertisement meta box content.
		 */
		public function render_pro_meta_box()
		{
?>
			<div class="available" style="overflow: hidden !important;">
				<h3><?php esc_html_e('Available Features in App Swiper Slider PRO', 'app-swiper-slider'); ?></h3>
				<ul class="pro-features">
					<li><?php esc_html_e('Multiple Layout Styles – Choose from grid, carousel, and list layouts to display logos beautifully.', 'app-swiper-slider'); ?>
					</li>
					<li><?php esc_html_e('Advanced Filtering Options – Filter logos by categories or tags for better organization and user experience.', 'app-swiper-slider'); ?>
					</li>
					<li><?php esc_html_e('Dynamic Logo Linking – Add custom links to logos for external or internal navigation.', 'app-swiper-slider'); ?>
					</li>
					<li><?php esc_html_e('Custom Animations & Transitions – Apply smooth hover effects, slide animations, or fade transitions.', 'app-swiper-slider'); ?>
					</li>
					<li><?php esc_html_e('Logo Popups and Tooltips – Show logo details or descriptions with lightbox popups and tooltips.', 'app-swiper-slider'); ?>
					</li>
					<li><?php esc_html_e('Responsive & Retina Ready – Ensure logos display perfectly on all devices, including high-resolution screens.', 'app-swiper-slider'); ?>
					</li>
					<li><?php esc_html_e('Customizable Controls – Add navigation arrows, pagination, autoplay, and infinite loop options.', 'app-swiper-slider'); ?>
					</li>
					<li><?php esc_html_e('Custom Logo Sizes – Set custom height, width, and spacing for perfect logo presentation.', 'app-swiper-slider'); ?>
					</li>
					<li><?php esc_html_e('Dynamic Widget Support – Add logo sliders as Elementor widgets or WordPress shortcodes.', 'app-swiper-slider'); ?>
					</li>
					<li><?php esc_html_e('Custom CSS & Styling Options – Fully customize the slider with additional CSS and styling controls.', 'app-swiper-slider'); ?>
					</li>
					<li><?php esc_html_e('User Role Management – Control which user roles can add or edit logo showcases.', 'app-swiper-slider'); ?>
					</li>
					<li><?php esc_html_e('SEO-Friendly Features – Optimize logo sliders for search engines with alt tags and clean HTML.', 'app-swiper-slider'); ?>
					</li>
				</ul>


				<p>
					<a class="button button-primary" target="_blank" href="mailto:nababurbd@gmail.com">
						<?php esc_html_e('Hire me', 'app-swiper-slider'); ?>
					</a>
					<a class="button button-primary" target="_blank" href="https://profiles.wordpress.org/nababurbd/">
						<?php esc_html_e('Wordpress profile', 'app-swiper-slider'); ?>
					</a>
					<a class="button button-primary" target="_blank" href="https://www.linkedin.com/in/nababur/">
						<?php esc_html_e('Linkedin', 'app-swiper-slider'); ?>
					</a>
					<a class="button button-secondary" target="_blank" href="https://api.whatsapp.com/send?phone=8801717090233">
						<?php esc_html_e('DM Whatsapp', 'app-swiper-slider'); ?>
					</a>
				</p>
			</div>


		<?php
		}

		/**
		 * Add a tutorial meta box.
		 */
		public function add_tutorial_meta_box()
		{
			add_meta_box(
				'nab_learn_wp_sidebar',
				__('Video Tutorials', 'app-swiper-slider'),
				[$this, 'render_tutorial_meta_box'],
				'appswiperslider',
				'side',
				'high'
			);
		}

		/**
		 * Render the tutorial meta box content.
		 */
		public function render_tutorial_meta_box()
		{
		?>
			<p><?php esc_html_e('Watch WordPress tutorials and improve your skills.', 'app-swiper-slider'); ?></p>
			<p>
				<a class="button button-secondary" href="https://www.youtube.com/watch?v=uAeoDyzhRiM" target="_blank">
					<?php esc_html_e('Watch Video Tutorials', 'app-swiper-slider'); ?>
				</a>
			</p>
<?php
		}
	} //end class


endif;
