<?php
/**
 * Class AWRPG_Process_Options
 *
 * This class manages the backend processing of gallery options for the Awesome Responsive Photo Gallery plugin.
 * 
 * Key Features:
 * - Handles AJAX requests to process and customize gallery options.
 * - Ensures security with proper user capability checks and nonce verification.
 * - Retrieves and processes gallery-specific settings for front-end rendering.
 * 
 * Security Measures:
 * - Validates user capabilities using `current_user_can`.
 * - Verifies nonces to prevent unauthorized access and CSRF attacks.
 * - Sanitizes all incoming data before processing.
 * 
 * @package Awesome Responsive Photo Gallery - v1.2 - 12 January, 2025
 * @author Realwebcare
 * @link https://www.realwebcare.com/
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'AWRPG_Process_Options' ) ) {
	class AWRPG_Process_Options {
		private $gal_function;

		/**
		 * Constructor to initialize AJAX hooks.
		 */
		public function __construct() {
			// Hook for logged-in users
			add_action( 'wp_ajax_nopriv_awrpg_process_gallery_option', array( $this, 'awrpg_process_gallery_option' ) );
            // Hook for guests (if applicable)
			add_action( 'wp_ajax_awrpg_process_gallery_option', array( $this, 'awrpg_process_gallery_option' ) );
		}

        /**
         * Include and initialize the gallery functions class.
         */
        public function initialize_function_gallery() {
            $this->gal_function = new AWRPG_Gallery_Functions();
        }

		/**
		 * Process gallery options via AJAX.
		 *
		 * This function handles gallery customization options sent via AJAX, ensuring proper
		 * security checks and data sanitization.
		 */
        function awrpg_process_gallery_option() {
			// Check if the user has sufficient permissions
			if ( !current_user_can( 'manage_options' ) ) {
				wp_die( __('Unauthorized Access!', 'awesome-responsive-photo-gallery') );
			}

            // Get and sanitize the nonce from the AJAX request data
            $nonce = isset($_POST['nonce']) ? sanitize_text_field($_POST['nonce']) : '';

            // Verify the nonce to ensure the request's integrity
            if (!wp_verify_nonce($nonce, 'awrpg_ajax_action_nonce')) {
                // Handle nonce verification failure
                wp_send_json_error(array('message' => 'Nonce verification failed'));
                wp_die(__('You do not have sufficient permissions to access this page, or the nonce verification failed.', 'awesome-responsive-photo-gallery'));
            } else {
                // Initialize gallery functions
                $this->initialize_function_gallery();

                // Sanitize incoming data
				$awesome_gallery = isset( $_POST['awsmgallery'] ) ? sanitize_text_field( $_POST['awsmgallery'] ) : '';
				$awesome_gallery_name = ucwords( str_replace( '_', ' ', $awesome_gallery ) );

                // Retrieve and validate gallery options
				$gallery_options = get_option( $awesome_gallery . '_options' );
				$gallery_options = is_array( $gallery_options ) ? $gallery_options : array();

				$gallery_awesome = get_option( $awesome_gallery . '_awesome' );
				$gallery_awesome = is_array( $gallery_awesome ) ? $gallery_awesome : array();

				$gallery_lightcs = get_option( $awesome_gallery . '_lightcs' );
				$gallery_lightcs = is_array( $gallery_lightcs ) ? $gallery_lightcs : array();

				$gallery_jgalery = get_option( $awesome_gallery . '_jgalery' );
				$gallery_jgalery = is_array( $gallery_jgalery ) ? $gallery_jgalery : array();

                // Fetch gallery effects and styles
                $hover_effects = $this->gal_function->awrpg_thumbnail_hover_effect();
                $overlay_effects = $this->gal_function->awrpg_thumbnail_overlay_effect();
                $border_styles = $this->gal_function->awrpg_border_style();
                $transition_effects = $this->gal_function->awrpg_transition_effects();
                $lc_transitions = $this->gal_function->awrpg_lightcase_transitions();
                $thumb_positions = $this->gal_function->awrpg_thumbnails_position();
                $jg_transitions = $this->gal_function->awrpg_jgallery_transitions(); ?>

                <div id="settinggallerydiv">
                    <div id="tabs">
                        <ul>
                            <li><a href="#general"><?php esc_html_e('General Settings', 'awesome-responsive-photo-gallery'); ?></a></li>
                            <li><a href="#awesome"><?php esc_html_e('Awesome Gallery', 'awesome-responsive-photo-gallery'); ?></a></li>
                            <li><a href="#lightcs"><?php esc_html_e('Lightcase Gallery', 'awesome-responsive-photo-gallery'); ?></a></li>
                            <li><a href="#jgalery"><?php esc_html_e('jGallery (Only Photo)', 'awesome-responsive-photo-gallery'); ?></a></li>
                        </ul>

                        <div id="general" class="gallery-input">
                            <div id="gn-accordion" class="awrpg-accordion">
                                <h3><?php esc_html_e('General', 'awesome-responsive-photo-gallery'); ?></h3>
                                <div class="accordion-input">
                                    <h4><?php esc_html_e('Gallery Setup', 'awesome-responsive-photo-gallery'); ?></h4>
                                    <label class="label-title"><?php esc_html_e('Modify Gallery Name', 'awesome-responsive-photo-gallery'); ?></label>
                                    <input type="text" name="gallery_name" class="medium" id="gallery_name" value="<?php echo esc_attr( $awesome_gallery_name ); ?>">

                                    <label class="label-title"><?php esc_html_e('Select Which Gallery to Use', 'awesome-responsive-photo-gallery'); ?></label>
                                    <select name="my_gallery" id="my_gallery" class="gallery-dir">
                                        <?php
                                        $mygal = isset($gallery_options['mygal']) ? $gallery_options['mygal'] : '';
                                        if( $mygal == 'lightcase' ) : ?>
                                            <option value="awesome"><?php esc_html_e('Awesome Gallery', 'awesome-responsive-photo-gallery'); ?></option>
                                            <option value="lightcase" selected><?php esc_html_e('Lightcase Gallery', 'awesome-responsive-photo-gallery'); ?></option>
                                            <option value="jgallery"><?php esc_html_e('J Gallery (Only Photo)', 'awesome-responsive-photo-gallery'); ?></option>
                                        <?php elseif( $mygal == 'jgallery' ) : ?>
                                            <option value="awesome"><?php esc_html_e('Awesome Gallery', 'awesome-responsive-photo-gallery'); ?></option>
                                            <option value="lightcase"><?php esc_html_e('Lightcase Gallery', 'awesome-responsive-photo-gallery'); ?></option>
                                            <option id="jgallery_on" value="jgallery" selected><?php esc_html_e('J Gallery (Only Photo)', 'awesome-responsive-photo-gallery'); ?></option>
                                        <?php else : ?>
                                            <option value="awesome" selected><?php esc_html_e('Awesome Gallery', 'awesome-responsive-photo-gallery'); ?></option>
                                            <option value="lightcase"><?php esc_html_e('Lightcase Gallery', 'awesome-responsive-photo-gallery'); ?></option>
                                            <option value="jgallery"><?php esc_html_e('J Gallery (Only Photo)', 'awesome-responsive-photo-gallery'); ?></option>
                                        <?php endif; ?>
                                    </select>

                                    <h4><?php esc_html_e('Structure', 'awesome-responsive-photo-gallery'); ?></h4>
                                    <label class="label-title"><?php esc_html_e('Gallery Container Width', 'awesome-responsive-photo-gallery'); ?></label>
                                    <input type="number" name="container_width" class="medium" id="container_width" value="<?php echo isset($gallery_options['cwdth']) ? esc_attr($gallery_options['cwdth']) : ''; ?>" min="1" max="100" placeholder="e.g. 100">

                                    <label class="label-title"><?php esc_html_e('Gallery Top Space', 'awesome-responsive-photo-gallery'); ?></label>
                                    <input type="number" name="top_space" class="medium" id="top_space" value="<?php echo isset($gallery_options['tpspc']) ? esc_attr($gallery_options['tpspc']) : ''; ?>" min="0" max="1000" placeholder="e.g. 30">

                                    <label class="label-title"><?php esc_html_e('Gallery Bottom Space', 'awesome-responsive-photo-gallery'); ?></label>
                                    <input type="number" name="bottom_space" class="medium" id="bottom_space" value="<?php echo isset($gallery_options['btspc']) ? esc_attr($gallery_options['btspc']) : ''; ?>" min="0" max="1000" placeholder="e.g. 30">
                                </div>

                                <h3><?php esc_html_e('Thumbnail', 'awesome-responsive-photo-gallery'); ?></h3>
                                <div class="accordion-input">
                                    <h4><?php esc_html_e('Thumbnail Size', 'awesome-responsive-photo-gallery'); ?></h4>
                                    <label class="label-title"><?php esc_html_e('Image Size', 'awesome-responsive-photo-gallery'); ?><a href="#" class="awrpg_tooltip" rel="<?php esc_html_e('Set the image thumbnail size from here depends on how you want to display your gallery thumbnail.', 'awesome-responsive-photo-gallery'); ?>"></a></label>
                                    <select name="image_size" id="image_size" class="gallery-dir">
                                        <?php if($gallery_options['image'] == 'thumbnail') { ?>
                                        <option value="thumbnail" selected><?php esc_html_e('Thumbnail', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="medium"><?php esc_html_e('Medium', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="large"><?php esc_html_e('Large', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="full"><?php esc_html_e('Full Size', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="custom"><?php esc_html_e('Custom', 'awesome-responsive-photo-gallery'); ?></option>
                                        <?php } elseif($gallery_options['image'] == 'medium') { ?>
                                        <option value="thumbnail"><?php esc_html_e('Thumbnail', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="medium" selected><?php esc_html_e('Medium', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="large"><?php esc_html_e('Large', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="full"><?php esc_html_e('Full Size', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="custom"><?php esc_html_e('Custom', 'awesome-responsive-photo-gallery'); ?></option>
                                        <?php } elseif($gallery_options['image'] == 'large') { ?>
                                        <option value="thumbnail"><?php esc_html_e('Thumbnail', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="medium"><?php esc_html_e('Medium', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="large" selected><?php esc_html_e('Large', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="full"><?php esc_html_e('Full Size', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="custom"><?php esc_html_e('Custom', 'awesome-responsive-photo-gallery'); ?></option>
                                        <?php } elseif($gallery_options['image'] == 'full') { ?>
                                        <option value="thumbnail"><?php esc_html_e('Thumbnail', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="medium"><?php esc_html_e('Medium', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="large"><?php esc_html_e('Large', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="full" selected><?php esc_html_e('Full Size', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="custom"><?php esc_html_e('Custom', 'awesome-responsive-photo-gallery'); ?></option>
                                        <?php } else { ?>
                                        <option value="thumbnail"><?php esc_html_e('Thumbnail', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="medium"><?php esc_html_e('Medium', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="large"><?php esc_html_e('Large', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="full"><?php esc_html_e('Full Size', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option id="custom_size" value="custom" selected><?php esc_html_e('Custom', 'awesome-responsive-photo-gallery'); ?></option>
                                        <?php } ?>
                                    </select>

                                    <div id="imageWidthHeight">
                                        <label class="label-title"><?php esc_html_e('Gallery Thumbnail Width (in px)', 'awesome-responsive-photo-gallery'); ?></label>
                                        <input type="number" name="image_width" class="medium" id="image_width" value="<?php echo isset($gallery_options['imgwd']) ? esc_attr($gallery_options['imgwd']) : ''; ?>" min="1" max="10000" placeholder="e.g. 250">
                                        <label class="label-title"><?php esc_html_e('Gallery Thumbnail Height (in px)', 'awesome-responsive-photo-gallery'); ?></label>
                                        <input type="number" name="image_height" class="medium" id="image_height" value="<?php echo isset($gallery_options['imght']) ? esc_attr($gallery_options['imght']) : ''; ?>" min="1" max="10000" placeholder="e.g. 250">
                                    </div>

                                    <label class="label-title"><?php esc_html_e('Space Between Thumbnails (in px)', 'awesome-responsive-photo-gallery'); ?></label>
                                    <input type="number" name="thumb_space" class="medium" id="thumb_space" value="<?php echo isset($gallery_options['mrgin']) ? esc_attr($gallery_options['mrgin']) : ''; ?>" min="0" max="50" placeholder="e.g. 10">
                                    <h4><?php esc_html_e('Thumbnail Effect', 'awesome-responsive-photo-gallery'); ?></h4>
                                    <label class="label-title"><?php esc_html_e('Thumbnail Hover Image Effect', 'awesome-responsive-photo-gallery'); ?><a href="#" class="awrpg_tooltip" rel="<?php esc_html_e('Select a hover effect for gallery thumbnails.', 'awesome-responsive-photo-gallery'); ?>"></a></label>
                                    <select name="hover_effect" id="hover_effect" class="gallery-dir"><?php
                                        foreach($hover_effects as $key => $effect) { ?>
                                            <option value="<?php echo esc_attr($key); ?>"<?php if($gallery_options['hveft'] == $key) { ?> selected<?php } ?>><?php echo esc_html($effect); ?></option><?php
                                        } ?>
                                    </select>

                                    <label class="label-title"><?php esc_html_e('Thumbnail Hover Overlay Effect', 'awesome-responsive-photo-gallery'); ?><a href="#" class="awrpg_tooltip" rel="<?php esc_html_e('Select a hover effect for gallery thumbnails.', 'awesome-responsive-photo-gallery'); ?>"></a></label>
                                    <select name="overlay_effect" id="overlay_effect" class="gallery-dir"><?php
                                        foreach($overlay_effects as $key => $effect) { ?>
                                            <option value="<?php echo esc_attr($key); ?>"<?php echo isset($gallery_options['oveft']) && $gallery_options['oveft'] === $key ? ' selected' : ''; ?>><?php echo esc_html($effect); ?></option><?php
                                        } ?>
                                    </select>

                                    <h4><?php esc_html_e('Thumbnail Info', 'awesome-responsive-photo-gallery'); ?></h4>
                                    <label class="label-title"><?php esc_html_e('Enable Thumbnail Title', 'awesome-responsive-photo-gallery'); ?></label>
                                    <select name="thumb_title" id="thumb_title" class="gallery-dir">
                                        <?php if (isset($gallery_options['thttl']) && $gallery_options['thttl'] === 'true') { ?>
                                            <option id="title_yes" value="true" selected><?php esc_html_e('Enable', 'awesome-responsive-photo-gallery'); ?></option>
                                            <option value="false"><?php esc_html_e('Disable', 'awesome-responsive-photo-gallery'); ?></option>
                                        <?php } else { ?>
                                            <option value="true"><?php esc_html_e('Enable', 'awesome-responsive-photo-gallery'); ?></option>
                                            <option value="false" selected><?php esc_html_e('Disable', 'awesome-responsive-photo-gallery'); ?></option>
                                        <?php } ?>
                                    </select>

                                    <label class="label-title"><?php esc_html_e('Enable Thumbnail Caption', 'awesome-responsive-photo-gallery'); ?></label>
                                    <select name="thumb_caption" id="thumb_caption" class="gallery-dir">
                                        <?php if (isset($gallery_options['thcap']) && $gallery_options['thcap'] === 'true') { ?>
                                            <option id="cap_on" value="true" selected><?php esc_html_e('Enable', 'awesome-responsive-photo-gallery'); ?></option>
                                            <option value="false"><?php esc_html_e('Disable', 'awesome-responsive-photo-gallery'); ?></option>
                                        <?php } else { ?>
                                            <option value="true"><?php esc_html_e('Enable', 'awesome-responsive-photo-gallery'); ?></option>
                                            <option value="false" selected><?php esc_html_e('Disable', 'awesome-responsive-photo-gallery'); ?></option>
                                        <?php } ?>
                                    </select>

                                    <label class="label-title"><?php esc_html_e('Info Background Opacity', 'awesome-responsive-photo-gallery'); ?></label>
                                    <input type="number" name="opacity_caption" class="medium" id="opacity_caption" value="<?php echo isset($gallery_options['opccp']) ? esc_attr($gallery_options['opccp']) : ''; ?>" min="0" max="100" placeholder="<?php esc_attr_e('e.g. 92', 'awesome-responsive-photo-gallery'); ?>">
                                    <h4><?php esc_html_e('Thumbnail Border', 'awesome-responsive-photo-gallery'); ?></h4>
                                    <label class="label-title"><?php esc_html_e('Thumbnail Border Style', 'awesome-responsive-photo-gallery'); ?></label>
                                    <select name="border_style" id="border_style" class="gallery-dir">
                                        <option id="none_on" value="none"><?php esc_html_e('None', 'awesome-responsive-photo-gallery'); ?></option><?php
                                        foreach ($border_styles as $key => $style) { ?>
                                            <option value="<?php echo esc_attr($key); ?>"<?php echo isset($gallery_options['brsle']) && $gallery_options['brsle'] === $key ? ' selected' : ''; ?>><?php echo esc_html($style); ?></option><?php
                                        } ?>
                                    </select>

                                    <div id="thumbBorderWidth">
                                        <label class="label-title"><?php esc_html_e('Thumbnail Border Width', 'awesome-responsive-photo-gallery'); ?></label>
                                        <input type="number" name="border_width" class="medium" id="border_width" value="<?php echo esc_attr(isset($gallery_options['brwdh']) ? $gallery_options['brwdh'] : ''); ?>" min="1" max="50" placeholder="e.g. 10">
                                    </div>
                                    <label class="label-title"><?php esc_html_e('Thumbnail Border Radius (in \'%\')', 'awesome-responsive-photo-gallery'); ?></label>
                                    <input type="number" name="thumb_radius" class="medium" id="thumb_radius" value="<?php echo esc_attr(isset($gallery_options['thrad']) ? intval($gallery_options['thrad']) : ''); ?>" min="0" max="100" placeholder="e.g. 3">
                                    <h4><?php esc_html_e('Thumbnail Shadow', 'awesome-responsive-photo-gallery'); ?></h4>
                                    <label class="label-title"><?php esc_html_e('Enable Thumbnail Shadow', 'awesome-responsive-photo-gallery'); ?></label>
                                    <select name="thumb_shadow" id="thumb_shadow" class="gallery-dir">
                                        <option id="shade_on" value="true" <?php selected($gallery_options['shade'], 'true'); ?>><?php esc_html_e('Enable', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="false" <?php selected($gallery_options['shade'], 'false'); ?>><?php esc_html_e('Disable', 'awesome-responsive-photo-gallery'); ?></option>
                                    </select>

                                    <div id="thumbnailShadow">
                                        <label class="label-title"><?php esc_html_e('Shadow Horizontal &amp; Vertical Length', 'awesome-responsive-photo-gallery'); ?></label>
                                        <input type="number" name="shadow_length" class="medium" id="shadow_length" value="<?php echo esc_attr(isset($gallery_options['shlen']) ? intval($gallery_options['shlen']) : ''); ?>" min="-200" max="200" placeholder="e.g. 2">
                                        <label class="label-title"><?php esc_html_e('Shadow Blur Radius', 'awesome-responsive-photo-gallery'); ?><a href="#" class="awrpg_tooltip" rel="<?php esc_attr_e('If set to 0 the shadow will be sharp, the higher the number, the more blurred it will be, and the further out the shadow will extend. For instance a shadow with 5px of horizontal offset that also has a 5px blur radius will be 10px of total shadow.', 'awesome-responsive-photo-gallery'); ?>"></a></label>
                                        <input type="number" name="blur_radius" class="medium" id="blur_radius" value="<?php echo esc_attr(isset($gallery_options['blrad']) ? intval($gallery_options['blrad']) : ''); ?>" min="0" max="300" placeholder="e.g. 6">
                                        <label class="label-title"><?php esc_html_e('Shadow Spread Radius', 'awesome-responsive-photo-gallery'); ?><a href="#" class="awrpg_tooltip" rel="<?php esc_attr_e('(optional), positive values increase the size of the shadow, negative values decrease the size. Default is 0 (the shadow is same size as blur).', 'awesome-responsive-photo-gallery'); ?>"></a></label>
                                        <input type="number" name="spread_radius" class="medium" id="spread_radius" value="<?php echo esc_attr(isset($gallery_options['sprad']) ? intval($gallery_options['sprad']) : ''); ?>" min="-200" max="200" placeholder="e.g. 1">
                                        <label class="label-title"><?php esc_html_e('Shadow Color Opacity', 'awesome-responsive-photo-gallery'); ?></label>
                                        <input type="number" name="shadow_opacity" class="medium" id="shadow_opacity" value="<?php echo esc_attr(isset($gallery_options['shopc']) ? $gallery_options['shopc'] : ''); ?>" min="1" max="100" placeholder="e.g. 75">
                                    </div>
                                </div>

                                <h3><?php esc_html_e('Color', 'awesome-responsive-photo-gallery'); ?></h3>
                                <div class="accordion-input">
                                    <table>
                                        <!--Gallery Color -->
                                        <tr class="galtab-header">
                                            <td colspan="2"><?php esc_html_e('Gallery Thumbnail Colors', 'awesome-responsive-photo-gallery'); ?></td>
                                        </tr>
                                        <tr class="galtab-input">
                                            <th><label class="label-title"><?php esc_html_e('Thumbnail Overlay Color', 'awesome-responsive-photo-gallery'); ?></label></th>
                                            <td><input type="text" name="overlay_color" class="overlay_color" id="overlay_color" value="<?php echo esc_attr(isset($gallery_options['thlay']) ? sanitize_hex_color($gallery_options['thlay']) : ''); ?>"></td>
                                        </tr>

                                        <tr class="galtab-input">
                                            <th><label class="label-title"><?php esc_html_e('Thumbnail Border Color', 'awesome-responsive-photo-gallery'); ?></label></th>
                                            <td><input type="text" name="border_color" class="border_color" id="border_color" value="<?php echo esc_attr(isset($gallery_options['brclr']) ? sanitize_hex_color($gallery_options['brclr']) : ''); ?>"></td>
                                        </tr>
                                        <tr class="galtab-input">
                                            <th><label class="label-title"><?php esc_html_e('Thumbnail Shadow Color', 'awesome-responsive-photo-gallery'); ?></label></th>
                                            <td><input type="text" name="shadow_color" class="shadow_color" id="shadow_color" value="<?php echo esc_attr(isset($gallery_options['shclr']) ? sanitize_hex_color($gallery_options['shclr']) : ''); ?>"></td>
                                        </tr>
                                        <tr class="galtab-input">
                                            <th><label class="label-title"><?php esc_html_e('Thumbnail Info BG Color', 'awesome-responsive-photo-gallery'); ?></label></th>
                                            <td><input type="text" name="info_bg" class="info_bg" id="info_bg" value="<?php echo esc_attr(isset($gallery_options['infbg']) ? sanitize_hex_color($gallery_options['infbg']) : ''); ?>"></td>
                                        </tr>

                                        <tr class="galtab-input">
                                            <th><label class="label-title"><?php esc_html_e('Thumbnail Info Title Color', 'awesome-responsive-photo-gallery'); ?></label></th>
                                            <td><input type="text" name="info_title" class="info_title" id="info_title" value="<?php echo esc_attr(isset($gallery_options['inftt']) ? sanitize_hex_color($gallery_options['inftt']) : ''); ?>"></td>
                                        </tr>
                                        <tr class="galtab-input">
                                            <th><label class="label-title"><?php esc_html_e('Thumbnail Info Caption Color', 'awesome-responsive-photo-gallery'); ?></label></th>
                                            <td><input type="text" name="info_caption" class="info_caption" id="info_caption" value="<?php echo esc_attr(isset($gallery_options['infcp']) ? sanitize_hex_color($gallery_options['infcp']) : ''); ?>"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div> <!--#general -->

                        <div id="awesome" class="gallery-input">
                            <div id="gl-accordion" class="awrpg-accordion">
                                <h3><?php esc_html_e('General', 'awesome-responsive-photo-gallery'); ?></h3>
                                <div class="accordion-input">
                                    <label class="label-title"><?php esc_html_e('Transition Effect Between Images', 'awesome-responsive-photo-gallery'); ?></label>
                                    <select name="tran_effect" id="tran_effect" class="gallery-dir">
                                        <?php
                                        foreach ($transition_effects as $key => $effect) { ?>
                                            <option value="<?php echo esc_attr($key); ?>"<?php selected($gallery_awesome['treft'], $key); ?>><?php echo esc_html($effect); ?></option>
                                        <?php } ?>
                                    </select>
                                    <label class="label-title">
                                        <?php esc_html_e('Loop back to the Beginning', 'awesome-responsive-photo-gallery'); ?>
                                        <a href="#" class="awrpg_tooltip" rel="<?php esc_attr_e('If false, will disable the ability to loop back to the beginning of the gallery when on the last element.', 'awesome-responsive-photo-gallery'); ?>"></a>
                                    </label>
                                    <select name="loop_back" id="loop_back" class="gallery-dir">
                                        <option value="false" <?php selected($gallery_awesome['loop'], 'false'); ?>><?php esc_html_e('Disable', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="true" <?php selected($gallery_awesome['loop'], 'true'); ?>><?php esc_html_e('Enable', 'awesome-responsive-photo-gallery'); ?></option>
                                    </select>
                                    <label class="label-title"><?php esc_html_e('Transition duration (in ms)', 'awesome-responsive-photo-gallery'); ?></label>
                                    <input type="number" name="tran_duration" class="medium" id="tran_duration" value="<?php echo esc_attr(isset($gallery_awesome['speed']) ? $gallery_awesome['speed'] : ''); ?>" min="100" max="10000" placeholder="e.g. 600">
                                    <label class="label-title">
                                        <?php esc_html_e('Video Maximal Width (in px)', 'awesome-responsive-photo-gallery'); ?>
                                        <a href="#" class="awrpg_tooltip" rel="<?php esc_attr_e('Set limit for video maximal width. Default: 855px.', 'awesome-responsive-photo-gallery'); ?>"></a>
                                    </label>
                                    <input type="number" name="videomax_width" class="medium" id="videomax_width" value="<?php echo esc_attr(isset($gallery_awesome['vmaxw']) ? $gallery_awesome['vmaxw'] : ''); ?>" min="50" max="2000" placeholder="e.g. 855">
                                </div>

                                <h3><?php esc_html_e('Show/Hide', 'awesome-responsive-photo-gallery'); ?></h3>
                                <div class="accordion-input">
                                    <label class="label-title"><?php esc_html_e('Show/Hide Download Button', 'awesome-responsive-photo-gallery'); ?></label>
                                    <select name="downloadimg" id="downloadimg" class="gallery-dir">
                                        <option value="true" <?php selected($gallery_awesome['dload'], 'true'); ?>><?php esc_html_e('Show', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="false" <?php selected($gallery_awesome['dload'], 'false'); ?>><?php esc_html_e('Hide', 'awesome-responsive-photo-gallery'); ?></option>
                                    </select>
                                    <label class="label-title"><?php esc_html_e('Show/Hide Fullscreen Button', 'awesome-responsive-photo-gallery'); ?></label>
                                    <select name="fullscreen" id="fullscreen" class="gallery-dir">
                                        <option value="true" <?php selected($gallery_awesome['fscrn'], 'true'); ?>><?php esc_html_e('Show', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="false" <?php selected($gallery_awesome['fscrn'], 'false'); ?>><?php esc_html_e('Hide', 'awesome-responsive-photo-gallery'); ?></option>
                                    </select>
                                    <label class="label-title">
                                        <?php esc_html_e('Show/Hide Index Number', 'awesome-responsive-photo-gallery'); ?>
                                        <a href="#" class="awrpg_tooltip" rel="<?php esc_attr_e('Whether to show total number of images and index number of currently displayed image.', 'awesome-responsive-photo-gallery'); ?>"></a>
                                    </label>
                                    <select name="index_number" id="index_number" class="gallery-dir">
                                        <option value="false" <?php selected($gallery_awesome['index'], 'false'); ?>><?php esc_html_e('Hide', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="true" <?php selected($gallery_awesome['index'], 'true'); ?>><?php esc_html_e('Show', 'awesome-responsive-photo-gallery'); ?></option>
                                    </select>

                                    <label class="label-title"><?php esc_html_e('Show/Hide Share Button', 'awesome-responsive-photo-gallery'); ?></label>
                                    <select name="shareimg" id="shareimg" class="gallery-dir">
                                        <option id="share_on" value="true" <?php selected($gallery_awesome['share'], 'true'); ?>><?php esc_html_e('Show', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="false" <?php selected($gallery_awesome['share'], 'false'); ?>><?php esc_html_e('Hide', 'awesome-responsive-photo-gallery'); ?></option>
                                    </select>

                                    <?php echo esc_attr(isset($gallery_awesome['vmaxw']) ? $gallery_awesome['vmaxw'] : ''); ?>
                                    <div id="shareSocialMedia">
                                        <label class="label-check"><?php esc_html_e('Show/Hide Different Social Media Share', 'awesome-responsive-photo-gallery'); ?>:</label>
                                        <div class="gallery-onoff-check">
                                            <label for="facebook" class="player_param"><span><?php esc_html_e('Facebook', 'awesome-responsive-photo-gallery'); ?></span><input type="checkbox" name="facebook" value="1"<?php echo isset($gallery_awesome['fbook']) && '1' === sanitize_text_field($gallery_awesome['fbook']) ? 'checked' : ''; ?>></label>
                                            <label for="linkedin" class="player_param"><span><?php esc_html_e('LinkedIn', 'awesome-responsive-photo-gallery'); ?></span><input type="checkbox" name="linkedin" value="1"<?php echo isset($gallery_awesome['lnkin']) && '1' === sanitize_text_field($gallery_awesome['lnkin']) ? 'checked' : ''; ?>></label>
                                            <label for="twitter" class="player_param"><span><?php esc_html_e('Twitter', 'awesome-responsive-photo-gallery'); ?></span><input type="checkbox" name="twitter" value="1"<?php echo isset($gallery_awesome['twter']) && '1' === sanitize_text_field($gallery_awesome['twter']) ? 'checked' : ''; ?>></label>
                                            <label for="pinterest" class="player_param"><span><?php esc_html_e('Pinterest', 'awesome-responsive-photo-gallery'); ?></span><input type="checkbox" name="pinterest" value="1"<?php echo isset($gallery_awesome['pntrs']) && '1' === sanitize_text_field($gallery_awesome['pntrs']) ? 'checked' : ''; ?>></label>
                                        </div>
                                    </div>
                                    <label class="label-title"><?php esc_html_e('Disable Thumbnails for the Gallery', 'awesome-responsive-photo-gallery'); ?></label>
                                    <select name="thumbnails" id="thumbnails" class="gallery-dir">
                                        <option value="false" <?php selected($gallery_awesome['thumb'], 'false'); ?>><?php esc_html_e('Disable', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option id="on_thumb" value="true" <?php selected($gallery_awesome['thumb'], 'true'); ?>><?php esc_html_e('Enable', 'awesome-responsive-photo-gallery'); ?></option>
                                    </select>
                                </div>
                            </div> <!--#accordion -->
                        </div> <!--#awesome -->

                        <div id="lightcs" class="gallery-input">
                            <div id="lc-accordion" class="awrpg-accordion">
                                <h3><?php esc_html_e('General', 'awesome-responsive-photo-gallery'); ?></h3>
                                <div class="accordion-input">
                                    <h4><?php esc_html_e('Effect', 'awesome-responsive-photo-gallery'); ?></h4>
                                    <label class="label-title"><?php esc_html_e('Transition Effect Between Sequences', 'awesome-responsive-photo-gallery'); ?></label>
                                    <select name="lc_effect" id="lc_effect" class="gallery-dir">
                                        <?php
                                        // Ensure $lc_transitions is an array
                                        if (isset($lc_transitions) && is_array($lc_transitions)) {
                                            foreach ($lc_transitions as $key => $effect) {
                                                // Sanitize output and ensure selected state
                                                $key = sanitize_text_field($key);
                                                ?>
                                                <option value="<?php echo esc_attr($key); ?>" <?php selected( isset($gallery_lightcs['lctrn']) ? $gallery_lightcs['lctrn'] : '', $key ); ?>><?php echo esc_html($effect); ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>

                                    <h4><?php esc_html_e('Structure', 'awesome-responsive-photo-gallery'); ?></h4>
                                    <label class="label-title"><?php esc_html_e('Maximum Width for the Media Content', 'awesome-responsive-photo-gallery'); ?></label>
                                    <input type="number" name="lc_maxwidth" class="medium" id="lc_maxwidth" value="<?php echo isset($gallery_lightcs['lmaxw']) ? esc_attr($gallery_lightcs['lmaxw']) : ''; ?>" min="250" max="3000" placeholder="e.g. 800">
                                    <label class="label-title"><?php esc_html_e('Maximum Height for the Media Content', 'awesome-responsive-photo-gallery'); ?></label>
                                    <input type="number" name="lc_maxheight" class="medium" id="lc_maxheight" value="<?php echo isset($gallery_lightcs['lmaxh']) ? esc_attr($gallery_lightcs['lmaxh']) : ''; ?>" min="250" max="3000" placeholder="e.g. 500">
                                </div>

                                <h3><?php esc_html_e('Show/Hide', 'awesome-responsive-photo-gallery'); ?></h3>
                                <div class="accordion-input">
                                    <label class="label-title"><?php esc_html_e('Show/Hide Title', 'awesome-responsive-photo-gallery'); ?></label>
                                    <select name="lc_title" id="lc_title" class="gallery-dir">
                                        <option value="false" <?php selected( isset($gallery_lightcs['lcttl']) ? $gallery_lightcs['lcttl'] : '', 'false' ); ?>><?php esc_html_e('Disable', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="true" <?php selected( isset($gallery_lightcs['lcttl']) ? $gallery_lightcs['lcttl'] : '', 'true' ); ?>><?php esc_html_e('Enable', 'awesome-responsive-photo-gallery'); ?></option>
                                    </select>
 
                                    <label class="label-title"><?php esc_html_e('Show/Hide Caption', 'awesome-responsive-photo-gallery'); ?></label>
                                    <select name="lc_desc" id="lc_desc" class="gallery-dir">
                                        <option value="false" <?php selected( isset($gallery_lightcs['lcdsc']) ? $gallery_lightcs['lcdsc'] : '', 'false' ); ?>><?php esc_html_e('Disable', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="true" <?php selected( isset($gallery_lightcs['lcdsc']) ? $gallery_lightcs['lcdsc'] : '', 'true' ); ?>><?php esc_html_e('Enable', 'awesome-responsive-photo-gallery'); ?></option>
                                    </select>

                                    <label class="label-title"><?php esc_html_e('Show/Hide Sequence Info', 'awesome-responsive-photo-gallery'); ?></label>
                                    <select name="lc_seqinfo" id="lc_seqinfo" class="gallery-dir">
                                        <option value="false" <?php selected( isset($gallery_lightcs['sinfo']) ? $gallery_lightcs['sinfo'] : '', 'false' ); ?>><?php esc_html_e('Disable', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="true" <?php selected( isset($gallery_lightcs['sinfo']) ? $gallery_lightcs['sinfo'] : '', 'true' ); ?>><?php esc_html_e('Enable', 'awesome-responsive-photo-gallery'); ?></option>
                                    </select>
                                </div>

                                <h3><?php esc_html_e('Video', 'awesome-responsive-photo-gallery'); ?></h3>
                                <div class="accordion-input">
                                    <h4><?php esc_html_e('iFrame', 'awesome-responsive-photo-gallery'); ?></h4>
                                    <label class="label-title"><?php esc_html_e('Enable iframe Element', 'awesome-responsive-photo-gallery'); ?></label>
                                    <select name="lc_iframe" id="lc_iframe" class="gallery-dir">
                                        <option id="iframe_on" value="true" <?php selected( isset($gallery_lightcs['lcfrm']) ? $gallery_lightcs['lcfrm'] : '', 'true' ); ?>><?php esc_html_e('Enable', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="false" <?php selected( isset($gallery_lightcs['lcfrm']) ? $gallery_lightcs['lcfrm'] : '', 'false' ); ?>><?php esc_html_e('Disable', 'awesome-responsive-photo-gallery'); ?></option>
                                    </select>
                                    <div id="lcIframeElement">
                                        <label class="label-title"><?php esc_html_e('Video Frame Width', 'awesome-responsive-photo-gallery'); ?></label>
                                        <input type="number" name="frame_width" class="medium" id="frame_width" value="<?php echo isset($gallery_lightcs['fwdth']) ? esc_attr($gallery_lightcs['fwdth']) : ''; ?>" min="50" max="2000" placeholder="e.g. 800">
                                        <label class="label-title"><?php esc_html_e('Video Frame Height', 'awesome-responsive-photo-gallery'); ?></label>
                                        <input type="number" name="frame_height" class="medium" id="frame_height" value="<?php echo isset($gallery_lightcs['fhigh']) ? esc_attr($gallery_lightcs['fhigh']) : ''; ?>" min="50" max="2000" placeholder="e.g. 500">
                                    </div>

                                    <h4><?php esc_html_e('HTML5 Video', 'awesome-responsive-photo-gallery'); ?></h4>
                                    <label class="label-title"><?php esc_html_e('Enable HTML5 Video Options', 'awesome-responsive-photo-gallery'); ?></label>
                                    <select name="lc_voption" id="lc_voption" class="gallery-dir">
                                        <option value="false" <?php selected( isset($gallery_lightcs['lvopt']) ? $gallery_lightcs['lvopt'] : '', 'false' ); ?>><?php esc_html_e('Disable', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option id="video_on" value="true" <?php selected( isset($gallery_lightcs['lvopt']) ? $gallery_lightcs['lvopt'] : '', 'true' ); ?>><?php esc_html_e('Enable', 'awesome-responsive-photo-gallery'); ?></option>
                                    </select>
                                    <div id="lcVideoOption">
                                        <label class="label-title"><?php esc_html_e('Video Width', 'awesome-responsive-photo-gallery'); ?></label>
                                        <input type="number" name="lc_vwidth" class="medium" id="lc_vwidth" value="<?php echo isset($gallery_lightcs['lvwdh']) ? esc_attr($gallery_lightcs['lvwdh']) : ''; ?>" min="100" max="3000" placeholder="e.g. 400">
                                        <label class="label-title"><?php esc_html_e('Video Height', 'awesome-responsive-photo-gallery'); ?></label>
                                        <input type="number" name="lc_vheight" class="medium" id="lc_vheight" value="<?php echo isset($gallery_lightcs['lvhgt']) ? esc_attr($gallery_lightcs['lvhgt']) : ''; ?>" min="100" max="3000" placeholder="e.g. 225">
                                    </div>
                                </div>
                            </div>
                        </div> <!--#lightcase -->

                        <div id="jgalery" class="gallery-input">
                            <div id="jg-accordion" class="awrpg-accordion">
                                <h3><?php esc_html_e('General', 'awesome-responsive-photo-gallery'); ?></h3>
                                <div class="accordion-input">
                                    <label class="label-title"><?php esc_html_e('Transition Effect Between Images', 'awesome-responsive-photo-gallery'); ?></label>
                                    <select name="jg_transition" id="jg_transition" class="gallery-dir">
                                        <?php
                                        // Ensure $jg_transitions is an array
                                        if (isset($jg_transitions) && is_array($jg_transitions)) {
                                            foreach ($jg_transitions as $key => $transition) {
                                                // Sanitize output and ensure selected state
                                                $key = sanitize_text_field($key);
                                                ?>
                                                <option value="<?php echo esc_attr($key); ?>" <?php selected( isset($gallery_jgalery['jgtrn']) ? $gallery_jgalery['jgtrn'] : '', $key ); ?>><?php echo esc_html($transition); ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <label class="label-title"><?php esc_html_e('Duration of Transition Between Photos', 'awesome-responsive-photo-gallery'); ?><a href="#" class="awrpg_tooltip" rel="<?php esc_html_e('Value will be divided by 10. If you give 7 it will be 0.7', 'awesome-responsive-photo-gallery'); ?>"></a></label>
                                    <input type="number" name="tran_interval" class="medium" id="tran_interval" value="<?php echo isset($gallery_jgalery['trivl']) ? esc_attr($gallery_jgalery['trivl']) : ''; ?>" min="1" max="600" placeholder="e.g. 1">
                                    <label class="label-title"><?php esc_html_e('Maximum Mobile Width', 'awesome-responsive-photo-gallery'); ?></label>
                                    <input type="number" name="max_mobile" class="medium" id="max_mobile" value="<?php echo isset($gallery_jgalery['maxmb']) ? esc_attr($gallery_jgalery['maxmb']) : ''; ?>" min="250" max="767" placeholder="e.g. 767">
                                </div>

                                <h3><?php esc_html_e('Show/Hide', 'awesome-responsive-photo-gallery'); ?></h3>
                                <div class="accordion-input">
                                    <h4><?php esc_html_e('Title', 'awesome-responsive-photo-gallery'); ?></h4>
                                    <label class="label-title"><?php esc_html_e('Show/Hide Image Title', 'awesome-responsive-photo-gallery'); ?></label>
                                    <select name="show_title" id="show_title" class="gallery-dir">
                                        <option id="title_on" value="true" <?php selected( isset($gallery_jgalery['imttl']) ? $gallery_jgalery['imttl'] : '', 'true' ); ?>><?php esc_html_e('Show', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="false" <?php selected( isset($gallery_jgalery['imttl']) ? $gallery_jgalery['imttl'] : '', 'false' ); ?>><?php esc_html_e('Hide', 'awesome-responsive-photo-gallery'); ?></option>
                                    </select>

                                    <h4><?php esc_html_e('Icon', 'awesome-responsive-photo-gallery'); ?></h4>
                                    <label class="label-title"><?php esc_html_e('Show/Hide Close Icon', 'awesome-responsive-photo-gallery'); ?></label>
                                    <select name="can_close" id="can_close" class="gallery-dir">
                                        <option value="true" <?php selected( isset($gallery_jgalery['close']) ? $gallery_jgalery['close'] : '', 'true' ); ?>><?php esc_html_e('Show', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="false" <?php selected( isset($gallery_jgalery['close']) ? $gallery_jgalery['close'] : '', 'false' ); ?>><?php esc_html_e('Hide', 'awesome-responsive-photo-gallery'); ?></option>
                                    </select>
                                    <label class="label-title"><?php esc_html_e('Show/Hide Zoom Icon', 'awesome-responsive-photo-gallery'); ?></label>
                                    <select name="can_zoom" id="can_zoom" class="gallery-dir">
                                        <option id="zoom_on" value="true" <?php selected( isset($gallery_jgalery['czoom']) ? $gallery_jgalery['czoom'] : '', 'true' ); ?>><?php esc_html_e('Show', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="false" <?php selected( isset($gallery_jgalery['czoom']) ? $gallery_jgalery['czoom'] : '', 'false' ); ?>><?php esc_html_e('Hide', 'awesome-responsive-photo-gallery'); ?></option>
                                    </select>
                                </div>

                                <h3><?php esc_html_e('Thumbnails', 'awesome-responsive-photo-gallery'); ?></h3>
                                <div class="accordion-input">
                                    <label class="label-title"><?php esc_html_e('Display Thumbnail Toggle', 'awesome-responsive-photo-gallery'); ?></label>
                                    <select name="jg_thumbnail" id="jg_thumbnail" class="gallery-dir">
                                        <option id="thumb_on" value="true" <?php selected( isset($gallery_jgalery['jthum']) ? $gallery_jgalery['jthum'] : '', 'true' ); ?>><?php esc_html_e('Enable', 'awesome-responsive-photo-gallery'); ?></option>
                                        <option value="false" <?php selected( isset($gallery_jgalery['jthum']) ? $gallery_jgalery['jthum'] : '', 'false' ); ?>><?php esc_html_e('Disable', 'awesome-responsive-photo-gallery'); ?></option>
                                    </select>

                                    <div id="jgalleryThumbnails">
                                        <h4><?php esc_html_e('Position', 'awesome-responsive-photo-gallery'); ?></h4>
                                        <label class="label-title"><?php esc_html_e('Thumbnails Position', 'awesome-responsive-photo-gallery'); ?></label>
                                        <select name="thumb_position" id="thumb_position" class="gallery-dir">
                                            <?php
                                            if (isset($thumb_positions) && is_array($thumb_positions)) {
                                                foreach ($thumb_positions as $key => $position) { ?>
                                                    <option value="<?php echo esc_attr($key); ?>" <?php selected( isset($gallery_jgalery['thpos']) ? $gallery_jgalery['thpos'] : '', $key ); ?>><?php echo esc_html($position); ?></option>
                                                <?php }
                                            }
                                            ?>
                                        </select>
                                        <h4><?php esc_html_e('Mobile', 'awesome-responsive-photo-gallery'); ?></h4>
                                        <label class="label-title"><?php esc_html_e('Hide Thumbnail on Mobile', 'awesome-responsive-photo-gallery'); ?><a href="#" class="awrpg_tooltip" rel="<?php esc_html_e('If set as \'true\', thumbnails will be hidden when width of window <= \'maxMobileWidth\' parameter (default value - 767px).', 'awesome-responsive-photo-gallery'); ?>"></a></label>
                                        <select name="mobile_thumb" id="mobile_thumb" class="gallery-dir">
                                            <option value="true" <?php selected( isset($gallery_jgalery['mobth']) ? $gallery_jgalery['mobth'] : '', 'true' ); ?>><?php esc_html_e('Enable', 'awesome-responsive-photo-gallery'); ?></option>
                                            <option value="false" <?php selected( isset($gallery_jgalery['mobth']) ? $gallery_jgalery['mobth'] : '', 'false' ); ?>><?php esc_html_e('Disable', 'awesome-responsive-photo-gallery'); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div> <!--#accordion -->
                        </div> <!--#jgallery -->
                    </div> <!--#tabs -->
                </div> <!--#settinggallerydiv -->

                <div class="awrpg-clear"></div>

                <input type="hidden" id="submitted" name="submitted" value="<?php echo isset($gallery_options['subfm']) && !empty($gallery_options['subfm']) ? esc_attr($gallery_options['subfm']) : 'no'; ?>" />
                <input type="hidden" id="set_gallery" name="set_gallery" value="awrpg_set_gallery_options">
                <input type="hidden" name="nonce" value="<?php echo isset($nonce) ? esc_attr($nonce) : ''; ?>">
                <input type="hidden" name="awesome_gallery" value="<?php echo isset($awesome_gallery) ? esc_attr($awesome_gallery) : ''; ?>">

                <?php if (isset($gallery_options) && !empty($gallery_options)) { ?>
                    <input type="submit" id="awrpg_process" name="awrpg_process" class="button-primary" value="<?php esc_html_e('Update Gallery', 'awesome-responsive-photo-gallery'); ?>" />
                <?php } else { ?>
                    <input type="submit" id="awrpg_process" name="awrpg_process" class="button-primary" value="<?php esc_html_e('Add Gallery', 'awesome-responsive-photo-gallery'); ?>" />
                <?php }
            }
            wp_die();
        }
    }
}

new AWRPG_Process_Options();
