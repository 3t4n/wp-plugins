<?php

namespace BEN\Block_Editor_Navigator;

! defined( ABSPATH ) || exit;

if ( ! class_exists( 'BEN_Options' ) ) {

	class BEN_Options extends Block_Editor_Navigator {
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
				'ben_section',
				'',
				function() {
					?>
						<h2 class="title">
							Block Editor Navigator
						</h2>
						<p>
							Navigate your posts with ease inside the Block and Classis editors without going back to the main page.
						</p>
					<?php
				},
				'writing'
			);

			register_setting(
				'writing',
				'ben_editor_support',
				function( $input ) {
					if ( is_array( $input ) ) {
						$input = array_map( 'sanitize_text_field', $input );
					}
					return $input;
				}
			);

			add_settings_field(
				'ben_editor_support',
				'Supported Editors',
				function() {
					$options = get_option( 'ben_editor_support' );
					?>
						<div class="ben">
							<div class="ben-editors">
								<p>
									<label for="ben_editor_support[block_editor]">
										<input type="checkbox" id="ben_editor_support[block_editor]" name="ben_editor_support[block_editor]" onclick="this.value = !(this.value != 'false');" value="<?php echo ( ! empty( $options['block_editor'] ) ) ? esc_attr( $options['block_editor'] ) : 'false'; ?>" <?php echo ( ! empty( $options['block_editor'] ) && esc_attr( $options['block_editor'] ) === 'true' ) ? 'checked' : ''; ?> />
										Block Editor
									</label>
								</p>
								<p>
									<label for="ben_editor_support[classic]">
										<input type="checkbox" id="ben_editor_support[classic]" name="ben_editor_support[classic]" onclick="this.value = !(this.value != 'false');" value="<?php echo ( ! empty( $options['classic'] ) ) ? esc_attr( $options['classic'] ) : 'false'; ?>" <?php echo ( ! empty( $options['classic'] ) && esc_attr( $options['classic'] ) === 'true' ) ? 'checked' : ''; ?> />
										Classic Editor
									</label>
								</p>
							</div>
						</div>
					<?php
				},
				'writing',
				'ben_section'
			);

			register_setting(
				'writing',
				'ben_post_types',
				function( $input ) {
					if ( is_array( $input ) ) {
						$input = array_map( 'sanitize_text_field', $input );
					}
					return $input;
				}
			);

			add_settings_field(
				'ben_post_types',
				'Supported Types',
				function( $types ) {
					foreach ( $types as $type ) {
						$options = get_option( 'ben_post_types' );

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
								$label = 'Custom Post Type (' . $type . ')';
								break;
						}
						?>
							<div class="ben">
								<div class="ben-post-types">
									<p>
										<label for="ben_post_types[<?php echo esc_attr( $type ); ?>]">
											<input type="checkbox" id="ben_post_types[<?php echo esc_attr( $type ); ?>]" name="ben_post_types[<?php echo esc_attr( $type ); ?>]" onclick="this.value = !(this.value != 'false');" value="<?php echo ( ! empty( $options[ $type ] ) ) ? esc_attr( $options[ $type ] ) : 'false'; ?>" <?php echo ( ! empty( $options[ $type ] ) && esc_attr( $options[ $type ] ) === 'true' ) ? 'checked' : ''; ?> />
											<?php echo esc_html( $label ); ?>
										</label>
									</p>
								</div>
							</div>
						<?php
					}
				},
				'writing',
				'ben_section',
				$types
			);

			add_settings_section(
				'ben_section_footer',
				'',
				function() {
					?>
						<ul>
							<li>&bullet; Limit and display the navigator bar controls witin the Block and Classic editors.</li>
							<li>&bullet; Select post types where you want to enable and use the navigator controls.</li>
							<li>&bullet; WooCommerce products and Custom Post Types are fully supported.</li>
							<li>&bullet; All available CPTs and WooCommerce products will show as options and need to be checked.</li>
						</ul>
						<hr />
						<p>
							For the price of a cup of coffee per month, you can <a href="https://patreon.com/krasenslavov" target="_blank"><strong>help and support me on Patreon</strong></a> in continuing to develop and maintain all of my free WordPress plugins, every little bit helps and is greatly appreciated!
						</p>
						<div class="ben-notice">
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
				'writing'
			);
		}
	}
}
