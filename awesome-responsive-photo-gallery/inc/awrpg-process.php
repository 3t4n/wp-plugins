<?php
/**
 * Gallery Management Class
 *
 * Handles the landing page for gallery management in the admin panel.
 * Administrators can view the list of galleries and perform actions like editing and deleting.
 *
 * @package Awesome Responsive Photo Gallery - v1.2 - 12 January, 2025
 * @author Realwebcare
 * @link https://www.realwebcare.com/
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'AWRPG_Gallery_Management' ) ) {
	class AWRPG_Gallery_Management {

		private $gallery_table;

		/**
		 * Constructor to initialize gallery table and add actions
		 */
		public function __construct() {
			// Retrieve gallery table option
			$this->gallery_table = get_option( 'awrpg_galleryTables' );

			// Register form handling actions
			add_action( 'admin_post_awrpg_newgallery', array( $this, 'handle_add_new_form' ) );
			add_action( 'admin_post_awrpg_process_gallery', array( $this, 'handle_process_gallery' ) );
		}

		/**
		 * Handle adding a new gallery
		 */
		public function handle_add_new_form() {	
			// Check user permissions
			if ( !current_user_can( 'manage_options' ) ) {
				wp_die( __('Unauthorized Access!', 'awesome-responsive-photo-gallery') );
			}

			// Verify nonce for security
			if (!isset($_POST['awrpg_nonce']) || !wp_verify_nonce(sanitize_text_field($_POST['awrpg_nonce']), 'awrpg_new_gallery')) {
				wp_die(esc_html__('Invalid Nonce', 'awesome-responsive-photo-gallery'));
			}

			// Check if action is set and valid
			if (isset($_POST['action']) && sanitize_text_field($_POST['action']) === 'awrpg_newgallery') {
				// Initialize gallery storage class and add a new gallery
				$add_gallery = new AWRPG_Store_Gallery();
				$add_gallery->awrpg_add_new_gallery();

				// Redirect to prevent empty response
				wp_redirect(esc_url_raw(admin_url('admin.php?page=awrpg-lists&message=success')));
				exit;
			} else {
				// Invalid action
				wp_die(esc_html__('Something is wrong!', 'awesome-responsive-photo-gallery'));
			}
		}

		/**
		 * Handle processing gallery options
		 */
		public function handle_process_gallery() {
			// Check user permissions
			if (!current_user_can('manage_options')) {
				wp_die(esc_html__('Unauthorized Access!', 'awesome-responsive-photo-gallery'));
			}
	
			// Verify nonce for security
			if (!isset($_POST['awrpg_pnonce']) || !wp_verify_nonce(sanitize_text_field($_POST['awrpg_pnonce']), 'awrpg_process_gallery')) {
				wp_die(esc_html__('Invalid Nonce', 'awesome-responsive-photo-gallery'));
			}
	
			// Check if action is set and valid
			if (isset($_POST['action']) && sanitize_text_field($_POST['action']) === 'awrpg_process_gallery') {
				// Initialize gallery storage class and set gallery options
				$process_gallery = new AWRPG_Store_Gallery();
				$process_gallery->awrpg_set_gallery_options();
	
				// Redirect to prevent empty response
				wp_redirect(esc_url_raw(admin_url('admin.php?page=awrpg-lists&message=success')));
				exit;
			} else {
				// Invalid action
				wp_die(esc_html__('Something is wrong!', 'awesome-responsive-photo-gallery'));
			}
		}

		/**
		 * Render the gallery management page.
		 */
		public function render_gallery_management_page() {
			$empty_class = !$this->gallery_table ? ' empty-awrpg' : ''; // Conditional class for empty state
			$flag = 0; // Placeholder flag, adjust logic as needed
			?>
			<div class="wrap">
				<div id="add_new_gallery" class="postbox-container<?php echo esc_attr($empty_class); ?>">
					<h2 class="gallery-header">
						<?php esc_html_e('Awesome Gallery', 'awesome-responsive-photo-gallery'); ?>
						<a href="#" id="arp_gallery" class="add-new-h2">
							<?php esc_html_e('Add New', 'awesome-responsive-photo-gallery'); ?>
						</a>
						<span id="awrpg-loading-image"></span>
					</h2>
					<?php $this->render_add_gallery_form(); ?>
					<?php 
					if ($this->gallery_table) {
						$this->render_gallery_list(1);
					} else {
						$this->render_empty_gallery_message();
					} 
					?>
				</div>
				<?php 
				$this->render_modal_content();
				$this->render_sidebar(); 
				?>
			</div>
			<?php
		}

		/**
		 * Render the form to add a new gallery.
		 */
		private function render_add_gallery_form() {
			?>
			<form id="awrpg_new" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
				<input type="hidden" name="action" value="awrpg_newgallery">
				<?php wp_nonce_field('awrpg_new_gallery', 'awrpg_nonce'); ?>
				<div id="gallerynamediv">
					<div class="gallerynamewrap">
						<h3><?php esc_html_e('Awesome Gallery Name', 'awesome-responsive-photo-gallery'); ?></h3>
						<input type="text" name="awesome_gallery" size="30" value="" id="awesome_gallery" autocomplete="off" placeholder="<?php esc_attr_e('Enter Gallery Name', 'awesome-responsive-photo-gallery'); ?>" required>
					</div>
					<?php
					submit_button( esc_html__('Add Gallery', 'awesome-responsive-photo-gallery'), 'primary', 'awrpg_add_new', true, array('id' => 'awrpg_add_new') );
					?>
				</div>
			</form>
			<?php
		}

		/**
		 * Render the list of existing galleries.
		 */
		private function render_gallery_list($flag) {
			?>
			<div class="gallery_list">
				<form id="awrpg_edit_form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" enctype="multipart/form-data">
					<input type="hidden" name="action" value="awrpg_process_gallery">
					<?php wp_nonce_field('awrpg_process_gallery', 'awrpg_pnonce'); ?>
					<table id="awrpg_list" class="form-table">
						<?php $this->render_form_message(); ?>
						<thead>
							<tr>
								<th><?php esc_html_e('SN', 'awesome-responsive-photo-gallery'); ?></th>
								<th><?php esc_html_e('Gallery Name', 'awesome-responsive-photo-gallery'); ?></th>
								<th>
									<?php esc_html_e('Gallery ID', 'awesome-responsive-photo-gallery'); ?>
									<!-- Usage of Gallery ID -->
									<span class="awrpg_notice">
										<?php
										printf(
											esc_html__(
												' (See the %1$sHelp%2$s page for %3$sID usage%4$s.)', 
												'awesome-responsive-photo-gallery'
											),
											'<a href="'. esc_url(admin_url("admin.php?page=awrpg-help")) .'">',
											'</a>', '<strong>', '</strong>'
										);
										?>
									</span>
								</th>
							</tr>
						</thead>
						<?php $this->render_gallery_rows(); ?>
					</table>
				</form>
				<?php
				if ($flag === 1) {
					$this->render_gallery_instructions();
				}
				?>
			</div>
			<?php
		}

		/**
		 * Render each row of the gallery list.
		 */
		private function render_gallery_rows() {
			// Ensure $this->gallery_table exists and is not empty
			if (empty($this->gallery_table)) {
				return;
			}

			// Split the gallery table into an array of gallery items
			$gallery_lists = explode(', ', $this->gallery_table);

			foreach ($gallery_lists as $key => $list) {
				// Sanitize and format the gallery list item
				$list_item = ucwords(str_replace('_', ' ', sanitize_text_field($list)));
				$gallery_options = get_option($list . '_options'); // Retrieve gallery options
				$gallery_id = $key + 1; // Calculate gallery ID
				$option_id = $gallery_options ? 'edit_gallery' : 'add_gallery'; // Determine option ID
				$remove_id = $gallery_options ? 'awrpg_edited' : 'awrpg_added'; // Determine remove ID
		
				// Begin rendering the table row
				?>
				<tbody id="awrpg_<?php echo esc_attr($list); ?>">
					<tr <?php echo ($gallery_id % 2 === 0) ? 'class="alt"' : ''; ?>>
						<td><?php echo esc_html($gallery_id); ?></td>
						<td class="gallery_name" id="<?php echo esc_attr($list); ?>">
							<div id="set_gallery">
								<?php echo esc_html($list_item); // Output gallery name ?>
							</div>
		
							<!-- Render Add/Edit Options -->
							<span id="<?php echo esc_attr($option_id); ?>" data-id="<?php echo esc_attr($list); ?>">
								<?php esc_html_e($gallery_options ? 'Edit Options' : 'Add Options', 'awesome-responsive-photo-gallery'); ?>
							</span>

							<!-- Render Delete Option -->
							<span id="<?php echo esc_attr($remove_id); ?>" data-id="<?php echo esc_attr($list); ?>">
								<?php esc_html_e('Delete', 'awesome-responsive-photo-gallery'); ?>
							</span>
						</td>
						<td>
							<?php if ($gallery_options) { ?>
								<!-- Render gallery ID input -->
								<input type="text" name="awrpg_galid" class="awrpg_galid" value="<?php echo esc_attr($gallery_id); ?>">
							<?php } else { ?>
								<!-- Render notice if gallery options are not set -->
								<span class="awrpg_notice">
									<?php
									printf(
										esc_html__(
											'Mouseover on the gallery name and click on Add Options to add gallery settings. After adding gallery options you will get the %1$sSHORTCODE ID%2$s here.', 
											'awesome-responsive-photo-gallery'
										),
										'<strong>', '</strong>'
									);
									?>
								</span>
							<?php } ?>
						</td>
					</tr>
				</tbody>
				<?php
			}
		}

		/**
		 * Render instructions for creating a new gallery.
		 */
		private function render_gallery_instructions() {
			?>
			<div id="awrpg-narration" class="postbox-container">
				<div id="awrpgusage-note" class="awrpgusage-maincontent">
					<div class="awrpg">
						<?php
						printf(
							esc_html__('
								%1$sWatch Our YouTube Tutorial for Easy Gallery Setup!%2$s
								%3$sThere is a %4$s available that explains how the Gallery plugin works. If you have any trouble understanding, feel free to %5$s at any time.%6$s
								%7$sWe greatly value your feedback! Please spare a moment to rate your recent experience with our plugin. Your input is highly appreciated and helps us improve. Thank you for your support!%8$s',
								'awesome-responsive-photo-gallery'
							),
							'<h3>',
							'</h3>',
							'<p>',
							'<a href="'. esc_url(admin_url("admin.php?page=awrpg-help")) .'"> YouTube video</a>',
							'<a href="'. esc_url("https://wordpress.org/support/plugin/awesome-responsive-photo-gallery/") .'" target="_blank">Contact Us</a>',
							'</p>',
							'<p class="likeit">',
							'<a target="_blank" href="'. esc_url("https://wordpress.org/support/plugin/awesome-responsive-photo-gallery/reviews/?filter=5/#new-post") .'">&#9733;&#9733;&#9733;&#9733;&#9733;</a></p>',
						);
						?>
					</div>
				</div>
			</div>
			<?php
		}

		/**
		 * Render the message for an empty gallery.
		 */
		private function render_empty_gallery_message() {
			?>
			<div class="gallery_list">
				<p class="get_started">
					<?php
					printf(
						esc_html__('
							Welcome to our plugin, %1$s! It looks like you haven\'t added any galleries yet. Don\'t worry, we\'ve got you covered! Just click on the %2$s button to get started. %3$sIf you have any questions or need further assistance beyond what\'s covered in the %4$s, please don\'t hesitate to %5$s via the WordPress support thread. We\'re here to provide you with the support you need.',
							'awesome-responsive-photo-gallery'
						),
						'<strong>Awesome Responsive Photo Gallery</strong>',
						'<strong>Add New</strong>',
						'<br /><br />',
						'<a href="' . esc_url(admin_url("admin.php?page=awrpg-help")) . '"><strong>help page</strong></a>',
						'<a href="'. esc_url("https://wordpress.org/support/plugin/awesome-responsive-photo-gallery/") .'" target="_blank"><strong>contact us</strong></a>',
					);
					?>
				</p>
			</div>
			<?php
		}

		/**
		 * Render form message
		 */
		private function render_form_message() {
			?>
			<div id="form-messages">
				<button type="button" class="awrpg_close">
					<span aria-hidden="true">
						<a>
							<i class="dashicons dashicons-dismiss blackcross"></i>
						</a>
					</span>
				</button>
				<i class="start-icon dashicons dashicons-yes-alt"></i>
				<?php
				printf(
					esc_html__('%s The gallery settings have been updated successfully.',
					'awesome-responsive-photo-gallery'
					),
					'<strong>Awesome!</strong>'
				); ?>
			</div>
			<?php
		}

		/**
		 * Render the modal content
		 */
		private function render_modal_content() {
			?>
			<div id="awrpg-confirm-modal" class="awrpg-modal shrink-out" style="display:none;">
				<div class="awrpg-modal-content">
					<p><?php esc_html_e('Are you sure you want this?', 'awesome-responsive-photo-gallery'); ?></p>
					<button id="awrpg-confirm-yes" class="awrpg-btn-confirm"><?php esc_html_e('Yes', 'awesome-responsive-photo-gallery'); ?></button>
					<button id="awrpg-confirm-no" class="awrpg-btn-cancel"><?php esc_html_e('No', 'awesome-responsive-photo-gallery'); ?></button>
				</div>
			</div>
			<div id="awrpg-modal" class="awrpg-modal" style="display:none;">
				<div class="awrpg-modal-content">
					<p><?php esc_html_e('The changes are being updated. Please wait...', 'awesome-responsive-photo-gallery'); ?></p>
					<img src="<?php echo esc_url(AWRPG_PLUGIN_URL . 'assets/images/ajax-loader.gif'); ?>" alt="<?php esc_attr_e('Loading...', 'awesome-responsive-photo-gallery'); ?>" />
				</div>
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
					$sidebar_content = $awrpg_sidebar->awrpg_sidebar(false, false, true, $usage_top);
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
