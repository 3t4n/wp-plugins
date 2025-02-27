<?php

namespace Codemanas\CmBlocks\Enhancement\BlockVisibility;

class MediaQuery {
	private static ?MediaQuery $_instance = null;
	//we're following default bootstrap media queries
	//https://getbootstrap.com/docs/5.0/layout/breakpoints/
	private array $screen_sizes = [
		'XXLarge' => 1400,// >= Extra, Extra Large Screens starting from 1400
		'XLarge'  => 1200,// >= Extra Large Screens starting from 1200
		'large'   => 992,// >= Desktop / Large Screen Sizes
		'medium'  => 768,//>= Tablet / Medium Screen Sizes
		'small'   => 576,//>= Small screen size ( Consider Mobile Landscape ( even though most phones have a larger landscape size nowadays )
	];

	public static function get_instance(): ?MediaQuery {
		return ( self::$_instance == null ) ? self::$_instance = new self() : self::$_instance;
	}

	private function __construct() {
		add_action( 'wp_head', [ $this, 'frontend_styles' ] );
		add_action( 'cmblocks_visibility_render_block_content', [ $this, 'visibility_render' ], 10, 2 );
	}

	private function get_default_screen_classes( $mediaQuery ): array {
		$classes = [];
		// Check and add classes based on the values of mediaQuery keys
		if ( ! empty( $mediaQuery['hideOnDesktop'] ) ) {
			$classes[] = 'cmblocks-visibility--hide-desktop';
		}
		if ( ! empty( $mediaQuery['hideOnTablet'] ) ) {
			$classes[] = 'cmblocks-visibility--hide-tablet';
		}

		//does not account for the addition small and extra option
		if ( ! empty( $mediaQuery['hideOnMobile'] ) ) {
			$classes[] = 'cmblocks-visibility--hide-mobile';
		}

		return $classes;
	}

	private function get_advance_screen_classes( $mediaQuery ): array {
		$classes = [];
		// Check and add classes based on the values of mediaQuery keys
		if ( ! empty( $mediaQuery['hideOnXXLarge'] ) ) {
			$classes[] = 'cmblocks-visibility--hide-xxl';
		}
		if ( ! empty( $mediaQuery['hideOnXLarge'] ) ) {
			$classes[] = 'cmblocks-visibility--hide-xl';
		}

		if ( ! empty( $mediaQuery['hideOnLarge'] ) ) {
			$classes[] = 'cmblocks-visibility--hide-large';
		}

		if ( ! empty( $mediaQuery['hideOnMedium'] ) ) {
			$classes[] = 'cmblocks-visibility--hide-tablet';
		}

		if ( ! empty( $mediaQuery['hideOnSmall'] ) ) {
			$classes[] = 'cmblocks-visibility--hide-small';
		}

		if ( ! empty( $mediaQuery['hideOnXSmall'] ) ) {
			$classes[] = 'cmblocks-visibility--hide-xs';
		}

		return $classes;
	}

	public function visibility_render( $block_content, $cmblocksVisibility ) {
		// Check if 'mediaQuery' key exists and is an array
		if ( isset( $cmblocksVisibility['mediaQuery'] ) && is_array( $cmblocksVisibility['mediaQuery'] ) ) {
			$advancedSettingsEnabled = $cmblocksVisibility['enableAdvancedMediaQuerySetting'] ?? false;
			$mediaQuery              = $cmblocksVisibility['mediaQuery'];
			$classes                 = ! $advancedSettingsEnabled ? $this->get_default_screen_classes( $mediaQuery ) : $this->get_advance_screen_classes( $mediaQuery );

			if ( ! empty( $classes ) ) {
				$class_str = implode( ' ', $classes );
				if ( strpos( $block_content, 'class="' ) !== false ) {
					// If the class attribute already exists.
					$block_content = str_replace( 'class="', 'class="' . esc_attr( $class_str ) . ' ', $block_content );
				} else {
					// If the class attribute does not exist.
					/**
					 * /<[a-zA-Z0-9]+/: Matches the opening of any HTML tag and the tag name (like <p, <div, etc.)
					 * ([^>]*): Matches any existing attributes or content within the tag before the closing >
					 * (>)/: Matches the closing >
					 * $1: Refers to the opening tag and tag name
					 * class="' . esc_attr($class_str) . '": Adds the new class attribute
					 * $2$3: Refers to the remaining attributes and the closing >
					 */
					$block_content = preg_replace(
						'/(<[a-zA-Z0-9]+)([^>]*)(>)/',
						'$1 class="' . esc_attr( $class_str ) . '"$2$3',
						$block_content,
						1
					);
				}
			}
		}

		return $block_content;
	}

	public function frontend_styles() {
		$screen_sizes = $this->screen_sizes;
		echo trim( $this->generate_style( $screen_sizes ) );
	}

	public function generate_style( $screen_sizes ) {
		ob_start();
		?>
        <style id="cmblocks-visibility-styles">
            /*If Enabled hide for extra extra large screen size*/
            @media screen and (min-width: <?php printf('%dpx',esc_attr($screen_sizes['XXLarge'])) ?>) {
                .cmblocks-visibility--hide-xxl {
                    display: none;
                }
            }

            /*If enabled Hide for Extra Large devices upto Extra Extra Large*/
            @media screen and (min-width: <?php printf('%dpx',esc_attr($screen_sizes['XLarge'])) ?>) and (max-width: <?php printf('%.2fpx',esc_attr($screen_sizes['XXLarge'])-0.3) ?>) {
                .cmblocks-visibility--hide-xl {
                    display: none;
                }
            }

            /*Hide for large screen upto XLarge*/
            @media screen and (min-width: <?php printf('%dpx',esc_attr($screen_sizes['large'])) ?>) and (max-width: <?php printf('%.2fpx',esc_attr($screen_sizes['XLarge']-0.3)) ?>) {
                .cmblocks-visibility--hide-large {
                    display: none;
                }
            }

            /*Hide for desktop screen and higher*/
            @media screen and (min-width: <?php printf('%dpx',esc_attr($screen_sizes['large'])) ?>) {
                .cmblocks-visibility--hide-desktop {
                    display: none;
                }
            }

            /*Hide for tablet / medium screen*/
            @media screen and (min-width: <?php printf('%dpx',esc_attr($screen_sizes['medium'])) ?>) and (max-width:<?php printf('%.2fpx',esc_attr($screen_sizes['large'] - 0.3)) ?>) {
                .cmblocks-visibility--hide-tablet {
                    display: none;
                }
            }

            /*Hide for Mobile Devices *this does not account for small and extra small options*/
            @media screen and (max-width: <?php printf('%.2fpx',esc_attr($screen_sizes['medium'] - 0.3)) ?>) {
                .cmblocks-visibility--hide-mobile {
                    display: none;
                }
            }

            /*Hide for Small Devices / Landscape Mobile*/
            @media screen and min-width: (<?php printf('%dpx',esc_attr($screen_sizes['small'])) ?>) and (max-width: <?php printf('%.2fpx',esc_attr($screen_sizes['medium'] - 0.3)) ?>) {
                .cmblocks-visibility--hide-small {
                    display: none;
                }
            }

            /*Hide for Extra Small Devices / Portrait Mobile */
            @media screen and (min-width: <?php printf('%dpx',esc_attr($screen_sizes['small'])) ?>) and (max-width: <?php printf('%.2fpx',esc_attr($screen_sizes['medium'] - 0.3)) ?>) {
                .cmblocks-visibility--hide-small {
                    display: none;
                }
            }

        </style>
		<?php
		return ob_get_clean();
	}

	public function get_screen_sizes(): array {
		$screen_sizes = get_option( 'cm_blocks_visibility_media_sizes', $this->screen_sizes );

		return ! empty( $screen_sizes ) && is_array( $screen_sizes ) ? array_merge( $this->screen_sizes, $screen_sizes ) : $screen_sizes;
	}

	public function update_screen_sizes( array $sizes = [] ): bool {
		if ( ! current_user_can( 'manage_options' ) ) {
			return false;
		}

		foreach ( $sizes as $size ) {

			if ( ! is_numeric( $size ) ) {
				return false;
			}
		}

        //update option does not write to datbase if the value is the same
		update_option( 'cm_blocks_visibility_media_sizes', $sizes );
        return true;
	}
}