<?php

namespace FIC\Featured_Image_Customizer;

! defined( ABSPATH ) || exit;

if ( ! class_exists( 'FIC_Options' ) ) {

	class FIC_Options extends Featured_Image_Customizer {
		public function __construct() {
			parent::__construct();
		}

		public function add_plugin_options() {
			$types = array_merge(
				array(
					'post' => 'post',
					'page' => 'page',
				),
				get_post_types(
					array(
						'public'   => true,
						'_builtin' => false,
					),
					'names',
					'and'
				)
			);

			add_settings_section(
				'fic_section',
				'',
				function() {
					?>
						<h2 id="featured-image-customizer" class="title">
							Featured Image Customizer
						</h2>
						<p>
							Generate and create custom featured images on the fly with 100+ brand logos.
						</p>
					<?php
				},
				'media'
			);

			register_setting(
				'media',
				'fic_delete_local_files',
				function( $input ) {
					if ( is_array( $input ) ) {
						$input = array_map( 'sanitize_text_field', $input );
					}
					return $input;
				}
			);

			add_settings_field(
				'fic_delete_local_files',
				'Brand Logos',
				function() {
					?>
						<div class="fic">
							<div class="fic-delete-files">
								<p>
									<label for="fic_delete_local_files[selected]">
										<input type="checkbox" id="fic_delete_local_files[selected]" name="fic_delete_local_files[selected]" value="true" />
										<strong class="text-fail">Yes, I want to <em>DELETE</em> all the locally stored logo &amp; icon files.</strong>
									</label>
								</p>
							</div>
						</div>
					<?php
				},
				'media',
				'fic_section'
			);

			register_setting(
				'media',
				'fic_post_types',
				function( $input ) {
					if ( is_array( $input ) ) {
						$input = array_map( 'sanitize_text_field', $input );
					}
					return $input;
				}
			);

			add_settings_field(
				'fic_post_types',
				'Supported Types',
				function( $types ) {
					foreach ( $types as $type ) {
						$options = get_option( 'fic_post_types' );

						switch ( $type ) {
							case 'post':
								$label = 'Posts';
								break;
							case 'page':
								$label = 'Pages';
								break;
							case 'product':
								$label = 'WooCommerce Products';
								break;
							default:
								$label = 'Custom Post Type (<em>' . $type . '</em>)';
								break;
						}
						?>
							<div class="fic">
								<div class="fic-post-types">
									<p>
										<label for="fic_post_types[<?php echo esc_attr( $type ); ?>]">
											<input type="checkbox" id="fic_post_types[<?php echo esc_attr( $type ); ?>]" name="fic_post_types[<?php echo esc_attr( $type ); ?>]" onclick="this.value = !(this.value != 'false');" value="<?php echo ( ! empty( $options[ $type ] ) ) ? esc_attr( $options[ $type ] ) : 'false'; ?>" <?php echo ( ! empty( $options[ $type ] ) && esc_attr( $options[ $type ] ) === 'true' ) ? 'checked' : ''; ?> />
											<?php echo esc_html( $label ); ?>
										</label>
									</p>
								</div>
							</div>
						<?php
					}
				},
				'media',
				'fic_section',
				$types
			);

			add_settings_section(
				'fic_section_footer',
				'',
				function() {
					?>
						<ul>
							<li>&bullet; Select post types where you want to enable and use the featured image customizer functionality.</li>
							<li>&bullet; WooCommerce and Custom Post Types support will be added at some point in the future.</li>
							<li>&bullet; To help you generate your featured images quickly we store all brand logos locally on initial search. <em>(below you have the option to remove these files and free up some of storage)</em>.</li>
						</ul>
						<hr />
						<p>
							For the price of a cup of coffee per month, you can <a href="https://patreon.com/krasenslavov" target="_blank"><strong>help and support me on Patreon</strong></a> in continuing to develop and maintain all of my free WordPress plugins, every little bit helps and is greatly appreciated!
						</p>
						<div class="fic-notice">
							<p>
								<strong>Please rate us</strong>
								<a href="<?php echo esc_url( $this->settings['plugin_wporgrate'] ); ?>" target="_blank"><img src="<?php echo esc_url( $this->settings['plugin_url'] ); ?>assets/dist/img/rate.png" alt="Rate us @ WordPress.org" /></a>
							</p>
							<p>
								<strong>Having issues?</strong>
								<a href="<?php echo esc_url( $this->settings['plugin_wporgurl'] ); ?>" target="_blank">Create a Support Ticket</a>
							</p>
							<p>
								<strong>Developed by</strong>
								<a href="https://krasenslavov.com/" target="_blank">Krasen Slavov @ Developry</a>
							</p>
						</div>
					<?php
				},
				'media'
			);
		}
	}
}
