<?php
/**
 * Class AWRPG_Help
 *
 * This file contains the help page for the "Awesome Responsive Photo Gallery" plugin
 * in the admin panel. The help page provides documentation, instructions, and
 * assistance to administrators on how to use various features of the plugin.
 *
 * @package Awesome Responsive Photo Gallery - v1.2 - 12 January, 2025
 * @author Realwebcare
 * @link https://www.realwebcare.com/
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'AWRPG_Help' ) ) {
	class AWRPG_Help {

		private $gallery_table;

		/**
		 * Constructor to initialize gallery table and add actions
		 */
		public function __construct() {
			// Retrieve gallery table option
			$this->gallery_table = get_option( 'awrpg_galleryTables' );
		}

		/**
		 * Render the help page.
		 */
		public function render_gallery_help_page() { ?>
			<div class="wrap">
				<div id="add_new_gallery" class="postbox-container">
					<h2 class="gallery-header">
						<?php esc_html_e('Awesome Gallery Guide', 'awesome-responsive-photo-gallery'); ?>
					</h2>
					<?php $this->render_gallery_help_content(); ?>
					<?php $this->render_gallery_instructions(); ?>
				</div>
				<?php $this->render_sidebar(); ?>
			</div>
			<?php
		}

		/**
		 * Render YouTube Video and Documentation
		 */
		public function render_gallery_help_content() {
			?>
			<div class="gallery-info">
				<p class="get-instructed">
					<?php
					printf(
						esc_html__(
						'Watch the Video:',
						'awesome-responsive-photo-gallery'
					));
					?>
				</p>
				<p><?php esc_html_e('Check out the 6-minutes "Getting Started" video for an overview of the gallery plugin. Next, go to the new page to make your first gallery. Then, explore various options to showcase your gallery professionally.', 'awesome-responsive-photo-gallery'); ?></p>
				<div class="getting-started_video">
					<iframe width="620" height="350" src="<?php echo esc_url('https://www.youtube-nocookie.com/embed/BjVt24T7nEs') ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>

			<div class="gallery-info">
				<p class="get-instructed">
					<?php
					printf(
						esc_html__(
						'Documentation:',
						'awesome-responsive-photo-gallery'
					));
					?>
				</p>
				<p>
					<?php
					printf(
						esc_html__('
						To see the pro version documentation, please click on the following link: %s', 'awesome-responsive-photo-gallery'),
						'<strong><a href="'. esc_url("https://www.realwebcare.com/plugin/awesome-gallery/") .'" target="_blank">Documentation</a></strong>.',
					);
					?>
				</p>
			</div>
			<?php
		}
		/**
		 * Render instructions for creating a new gallery.
		 */
		public function render_gallery_instructions() {
			?>
			<div class="gallery-info">
				<h3 class="get-instructed">
					<?php
					printf(
						esc_html__(
							'How to Create Gallery in Classic Editor?',
							'awesome-responsive-photo-gallery'
						));
					?>
				</h3>
				<ol class="gallery-instructions">
					<li>
						<?php 
						printf(
							esc_html__('Navigate to %1$sPages > Add New Page%2$s.', 'awesome-responsive-photo-gallery'), 
							'<strong>', '</strong>'
						); 
						?>
					</li>
					<li>
						<?php 
						printf(
							esc_html__('Click the %1$sAdd Media%2$s button to launch the media uploader.', 'awesome-responsive-photo-gallery'), 
							'<strong>', '</strong>'
						); 
						?>
					</li>
					<li>
						<?php 
						printf(
							esc_html__('Select %1$sCreate Gallery%2$s from the left menu. Use the %3$sMedia Library%4$s tab to choose existing images.', 'awesome-responsive-photo-gallery'), 
							'<strong>', '</strong>', '<strong>', '</strong>'
						); 
						?>
					</li>
					<li>
						<?php 
						printf(
							esc_html__('If you need new images, switch to %1$sUpload Files%2$s and upload your photos.', 'awesome-responsive-photo-gallery'), 
							'<strong>', '</strong>'
						); 
						?>
					</li>
					<li>
						<?php 
						printf(
							esc_html__('Once images are selected or uploaded, click %1$sCreate a New Gallery%2$s.', 'awesome-responsive-photo-gallery'), 
							'<strong>', '</strong>'
						); 
						?>
					</li>
					<li>
						<?php esc_html_e('Add details to individual images on the right-hand side:', 'awesome-responsive-photo-gallery'); ?>
						<p>
							<strong><?php esc_html_e('Title', 'awesome-responsive-photo-gallery'); ?></strong>, 
							<strong><?php esc_html_e('Alt Text', 'awesome-responsive-photo-gallery'); ?></strong>, 
							<strong><?php esc_html_e('Description', 'awesome-responsive-photo-gallery'); ?></strong>, 
							<strong><?php esc_html_e('Video URL (for videos)', 'awesome-responsive-photo-gallery'); ?></strong>
						</p>
					</li>
					<li>
						<?php 
						printf(
							esc_html__('Click %1$sInsert Gallery%2$s.', 'awesome-responsive-photo-gallery'), 
							'<strong>', '</strong>'
						); 
						?>
					</li>
					<li>
						<?php 
						printf(
							esc_html__('To customize your gallery, add a unique %1$sid%2$s in the gallery shortcode via %3$sText Mode%4$s of the %5$sClassic Editor%6$s. Example:', 'awesome-responsive-photo-gallery'), 
							'<strong>', '</strong>', '<strong>', '</strong>', '<strong>', '</strong>'
						); 
						?>
						<code><?php echo esc_html('[gallery id="1" ids="114,115,112,113,110"]'); ?></code>
					</li>
					<li>
						<?php 
						printf(
							esc_html__('For dynamic ID insertion, switch to %1$sVisual Mode%2$s and use the %3$sAdd Gallery ID%4$s button. In the popup, add your Gallery ID and click %5$sOK%6$s. The ID will automatically update in the shortcode.', 'awesome-responsive-photo-gallery'), 
							'<strong>', '</strong>', '<strong>', '</strong>', '<strong>', '</strong>'
						); 
						?>
					</li>
					<li>
						<?php 
						printf(
							esc_html__('Publish your page and click %1$sView Page%2$s to see your responsive photo gallery.', 'awesome-responsive-photo-gallery'), 
							'<strong>', '</strong>'
						); 
						?>
					</li>
					<li>
						<?php esc_html_e('To create additional galleries, ensure each has a unique ID. Examples:', 'awesome-responsive-photo-gallery'); ?>
						<p><code><?php echo esc_html('[gallery id="2" ids="506,505,502,503"]'); ?></code></p>
						<p><code><?php echo esc_html('[gallery id="3" ids="506,505,502,503"]'); ?></code></p>
					</li>
				</ol>
			</div>
			<?php
		}

		/**
		 * Render the sidebar.
		 */
		private function render_sidebar() {
			if (class_exists('AWRPG_Sidebar')) {
				$awrpg_sidebar = new AWRPG_Sidebar();
				if (method_exists($awrpg_sidebar, 'awrpg_sidebar')) {
					// Render sidebar content
					$usage_top = !$this->gallery_table ? '' : 'pro-awrpg';
					$sidebar_content = $awrpg_sidebar->awrpg_sidebar(false, true, true, $usage_top);
					if ($sidebar_content !== null) {
						echo wp_kses_post($sidebar_content);
					} else {
						// Fallback for null content
						echo ''; // or provide alternative content if needed
					}
				}
			}
		}
    }
}