<?php

namespace Soft_Accordion;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Shortcode
 */
class Shortcode {
    /**
     * Instance of the class.
     *
     * @var self|null
     */
    protected static $instance = null;

    /**
     * Constructor
     */
    public function __construct() {
        add_shortcode( 'soft_accordion', array($this, 'accordion_shortcode') );
        add_action( 'wp_ajax_handle_get_preview_data', array($this, 'handle_get_preview_data') );
        add_action( 'wp_ajax_nopriv_handle_get_preview_data', array($this, 'handle_get_preview_data') );
        add_action( 'wp_ajax_get_accordion_shortcode_data', array($this, 'get_accordion_shortcode_data') );
    }

    /**
     * Get Accordion Data
     *
     * @param int $id The accordion ID.
     * @param int $current_page The current page number.
     * @param int $per_page The number of items per page.
     *
     * @return array The accordion data.
     */
    public function get_accordion_data( $id, $current_page, $per_page ) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'soft_accordion';
        // If an ID is provided in the shortcode attributes.
        if ( !empty( $id ) ) {
            $results = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$table_name} WHERE id = %d", intval( $id ) ), ARRAY_A );
            // Handle database results.
            if ( !empty( $results ) ) {
                $accordion_all_data = $results[0];
                $db_id = (int) $accordion_all_data['id'];
                $db_status = $accordion_all_data['is_active'];
                $db_title = sanitize_text_field( $accordion_all_data['title'] );
                $db_type = sanitize_text_field( $accordion_all_data['type'] );
                $db_custom_data = soft_accordion_sanitize_array( json_decode( $accordion_all_data['custom_data'], true ) );
                $db_post_data = soft_accordion_sanitize_array( json_decode( $accordion_all_data['post_data'], true ) );
                $db_settings = soft_accordion_sanitize_array( json_decode( $accordion_all_data['settings'], true ) );
                // Check if the accordion is active.
                if ( '0' === $db_status ) {
                    return '';
                }
                // Assign variables from database data.
                $id = $db_id;
                $accordion_type = $db_type;
                $accordion_data = $db_custom_data;
                $accordion_post = $db_post_data;
                $setting_data = $db_settings['accordionSetting'] ?? array();
                $selected_theme = $db_settings['theme'] ?? '';
                $display_setting = $db_settings['displaySettings'] ?? array();
                $typography_setting = $db_settings['typography'] ?? array();
            }
        }
        // Return empty string if no accordion data is found.
        if ( empty( $id ) ) {
            return '';
        }
        $limit = absint( $per_page );
        $offset = ($current_page - 1) * $limit;
        $data = array_slice( $accordion_data, $offset, $limit );
        return $this->get_accordion_markup(
            $id,
            null,
            $data,
            $accordion_type,
            $accordion_post,
            $setting_data,
            $selected_theme,
            $display_setting,
            $typography_setting
        );
    }

    /**
     * Accordion Markup
     */
    public function get_accordion_markup(
        $id,
        $accordion_main_title,
        $accordion_data,
        $accordion_type,
        $accordion_post,
        $setting_data,
        $selected_theme,
        $display_setting,
        $typography_setting,
        $is_first = false
    ) {
        ob_start();
        // Accordion settings.
        $layout = ( isset( $setting_data['layout'] ) ? esc_attr( $setting_data['layout'] ) : '' );
        $space_between = ( isset( $setting_data['spaceBetween'] ) ? esc_attr( $setting_data['spaceBetween'] ) : '' );
        $event = ( isset( $setting_data['event'] ) ? esc_attr( $setting_data['event'] ) : '' );
        $mode = ( isset( $setting_data['mode'] ) ? esc_attr( $setting_data['mode'] ) : '' );
        $custom_mode = $setting_data['customMode'] ?? array();
        $custom_post_mode = $setting_data['customPostMode'] ?? array();
        $multiple_open = ( !empty( $setting_data['multipleOpen'] ) ? '1' : '0' );
        $faq_search = ( !empty( $setting_data['faqSearch'] ) ? '1' : '0' );
        $expand_collapse_button = ( !empty( $setting_data['expandCollapseButton'] ) ? '1' : '0' );
        $expend_button_label = $setting_data['expendButtonLabel'] ?? 'Expand All';
        $collapse_button_label = $setting_data['collapseButtonLabel'] ?? 'Collapse All';
        $expand_collapse_button_position = $setting_data['expandCollapseButtonPosition'] ?? 'left';
        $show_expand_collapse_icon = ( !empty( $setting_data['showExpandCollapseIcon'] ) ? '1' : '0' );
        $expand_collapse_button_icon = $setting_data['expandCollapseButtonIcon'] ?? '';
        $scroll_to_active = ( !empty( $setting_data['scrollToActive'] ) ? '1' : '0' );
        $schema_markup = ( !empty( $setting_data['schemaMarkup'] ) ? '1' : '0' );
        $preloader = ( !empty( $setting_data['preloader'] ) ? '1' : '0' );
        // Theme settings.
        $theme_layout = ( sa_fs()->can_use_premium_code__premium_only() ? $selected_theme : 'theme-one' );
        // Display settings.
        $title = ( !empty( $display_setting['sectionTitle'] ) ? '1' : '0' );
        $title_color = ( isset( $display_setting['sectionTitleColor'] ) ? esc_attr( $display_setting['sectionTitleColor'] ) : '' );
        $title_mb = ( isset( $display_setting['sectionTitleMarginBottom'] ) ? esc_attr( $display_setting['sectionTitleMarginBottom'] ) : '' );
        $accordion_border_size = ( isset( $display_setting['accordionBorder']['size'] ) ? absint( $display_setting['accordionBorder']['size'] ) : 0 );
        $accordion_border_type = ( isset( $display_setting['accordionBorder']['type'] ) ? esc_attr( $display_setting['accordionBorder']['type'] ) : '' );
        $accordion_border_color = ( isset( $display_setting['accordionBorder']['color'] ) ? esc_attr( $display_setting['accordionBorder']['color'] ) : '' );
        $accordion_title_tag = ( isset( $display_setting['titleTag'] ) ? $display_setting['titleTag'] : 'h3' );
        $accordion_title_color = ( isset( $display_setting['titleColor'] ) ? esc_attr( $display_setting['titleColor'] ) : '' );
        $title_background_color_type = ( isset( $display_setting['titleBackgroundColorType'] ) ? $display_setting['titleBackgroundColorType'] : '' );
        $title_solid_background_color = ( isset( $display_setting['titleSolidBackgroundColor'] ) ? $display_setting['titleSolidBackgroundColor'] : '' );
        $title_gradient_background_color = ( isset( $display_setting['titleGradientBackgroundColor'] ) ? $display_setting['titleGradientBackgroundColor'] : '' );
        $title_background_color = ( 'solid' === $title_background_color_type ? $title_solid_background_color : $title_gradient_background_color );
        $no_follow_link = ( !empty( $display_setting['noFollowLink'] ) ? '1' : '0' );
        $title_padding_top = $display_setting['titlePadding']['top'] ?? '15px';
        $title_padding_right = $display_setting['titlePadding']['right'] ?? '15px';
        $title_padding_bottom = $display_setting['titlePadding']['bottom'] ?? '15px';
        $title_padding_left = $display_setting['titlePadding']['left'] ?? '15px';
        $title_icon = ( !empty( $display_setting['titleIcon'] ) ? '1' : '0' );
        $title_icon_position = ( !empty( $display_setting['titleIconPosition'] ) ? $display_setting['titleIconPosition'] : 'left' );
        $title_icon_size = $display_setting['iconSize'] ?? '20px';
        $description_color = ( isset( $display_setting['descriptionColor'] ) ? esc_attr( $display_setting['descriptionColor'] ) : '' );
        $description_background_color = ( isset( $display_setting['descriptionBackgroundColor'] ) ? $display_setting['descriptionBackgroundColor'] : '' );
        $description_padding_top = $display_setting['descriptionPadding']['top'] ?? '15px';
        $description_padding_right = $display_setting['descriptionPadding']['right'] ?? '15px';
        $description_padding_bottom = $display_setting['descriptionPadding']['bottom'] ?? '15px';
        $description_padding_left = $display_setting['descriptionPadding']['left'] ?? '15px';
        $fixed_content_height = ( !empty( $display_setting['fixedContentHeight'] ) ? '1' : '0' );
        $content_height = ( isset( $display_setting['contentHeight'] ) ? $display_setting['contentHeight'] : '' );
        $line_break = ( !empty( $display_setting['lineBreak'] ) ? '1' : '0' );
        $expand_collapse_icon = ( !empty( $display_setting['expandCollapseIcon'] ) ? '1' : '0' );
        $expand_collapse_icon_style = ( isset( $display_setting['expandCollapseIconStyle'] ) ? $display_setting['expandCollapseIconStyle'] : '' );
        $expand_collapse_icon_size = ( isset( $display_setting['expandCollapseIconSize'] ) ? $display_setting['expandCollapseIconSize'] : '' );
        $expand_collapse_icon_color = ( isset( $display_setting['expandCollapseIconColor'] ) ? $display_setting['expandCollapseIconColor'] : '' );
        $expand_collapse_icon_position = ( isset( $display_setting['expandCollapseIconPosition'] ) ? $display_setting['expandCollapseIconPosition'] : '' );
        $animation = ( !empty( $display_setting['animation'] ) ? '1' : '0' );
        $animation_style = ( isset( $display_setting['animationStyle'] ) ? $display_setting['animationStyle'] : '' );
        $animation_duration = ( isset( $display_setting['animationDuration'] ) ? $display_setting['animationDuration'] : '' );
        $pagination = ( !empty( $display_setting['pagination'] ) ? '1' : '0' );
        $pagination_style = ( isset( $display_setting['paginationStyle'] ) ? $display_setting['paginationStyle'] : '' );
        $load_more_label = ( isset( $display_setting['loadMoreLabel'] ) ? $display_setting['loadMoreLabel'] : '' );
        $accordion_per_items = ( isset( $display_setting['accordionPerItems'] ) ? $display_setting['accordionPerItems'] : '' );
        $pagination_text_color = ( isset( $display_setting['paginationTextColor'] ) ? $display_setting['paginationTextColor'] : '' );
        $pagination_text_active_color = ( isset( $display_setting['paginationTextActiveColor'] ) ? $display_setting['paginationTextActiveColor'] : '' );
        $pagination_t_border_color = ( isset( $display_setting['paginationTBorderColor'] ) ? $display_setting['paginationTBorderColor'] : '' );
        $pagination_t_active_border = ( isset( $display_setting['paginationTActiveBorderColor'] ) ? $display_setting['paginationTActiveBorderColor'] : '' );
        $pagination_background_color = ( isset( $display_setting['paginationBackgroundColor'] ) ? $display_setting['paginationBackgroundColor'] : '' );
        $pagination_active_background = ( isset( $display_setting['paginationActiveBackgroundColor'] ) ? $display_setting['paginationActiveBackgroundColor'] : '' );
        // Typography settings.
        $title_font_family_value = null;
        $title_font_weight = 400;
        $title_text_align = 'start';
        $title_text_transform = 'none';
        $title_font_size = '20px';
        $title_line_height = '24px';
        $title_letter_spacing = '0px';
        $description_font_family_value = null;
        $description_font_weight = 400;
        $description_text_align = 'start';
        $description_text_transform = 'none';
        $description_font_size = '16px';
        $description_line_height = '20px';
        $description_letter_spacing = '0px';
        if ( '1' === $schema_markup ) {
            echo soft_accordion_generate_faq_schema_markup( $accordion_data );
        }
        switch ( $expand_collapse_icon_style ) {
            case 'one':
                $icon_open = 'fa-solid fa-plus';
                $icon_close = 'fa-solid fa-minus';
                break;
            default:
                $icon_open = 'fa-solid fa-plus';
                $icon_close = 'fa-solid fa-minus';
        }
        // CSS styling.
        $justify_content = ( 'left' === $expand_collapse_icon_position ? 'start' : 'space-between' );
        $set_height = ( $fixed_content_height === '1' ? absint( $content_height ) : 200 );
        $css = '
			.expanded-collapse-wrapper-' . absint( $id ) . '{
				display: flex !important;
				justify-content: ' . esc_attr( $expand_collapse_button_position ) . ' !important;
				align-items: center !important;
			}
			.accordion-title-' . absint( $id ) . '{
				color: ' . esc_attr( $title_color ) . ' !important;
				margin-bottom: ' . esc_attr( $title_mb ) . ' !important;
			}
			.accordion-column{
				gap: ' . absint( $space_between ) . 'px !important;
			}
				.sa-card-' . absint( $id ) . ' {
				gap: ' . absint( $space_between ) . 'px !important;
			}
			.sa-title-' . absint( $id ) . ' {
				font-family: ' . $title_font_family_value . ' !important;
				font-weight: ' . absint( $title_font_weight ) . ' !important;
				text-align: ' . esc_attr( $title_text_align ) . ' !important;
				text-transform: ' . esc_attr( $title_text_transform ) . ' !important;
				font-size: ' . absint( $title_font_size ) . 'px !important;
				line-height: ' . absint( $title_line_height ) . 'px !important;
				letter-spacing: ' . absint( $title_letter_spacing ) . 'px !important;
				justify-content: ' . esc_attr( $justify_content ) . ' !important;
				color: ' . esc_attr( $accordion_title_color ) . ' !important;
				background: ' . esc_attr( $title_background_color ) . ' !important;
				border: ' . absint( $accordion_border_size ) . 'px ' . esc_attr( $accordion_border_type ) . ' ' . esc_attr( $accordion_border_color ) . ' !important;
				padding-top: ' . absint( $title_padding_top ) . 'px !important;
				padding-right: ' . absint( $title_padding_right ) . 'px !important;
				padding-bottom: ' . absint( $title_padding_bottom ) . 'px !important;
				padding-left: ' . absint( $title_padding_left ) . 'px !important;
			}
			.toggle-icon-' . absint( $id ) . '{
				width: ' . absint( $expand_collapse_icon_size ) . 'px !important;
				height: ' . absint( $expand_collapse_icon_size ) . 'px !important;
			}
			.toggle-icon-' . absint( $id ) . ' path {
				fill: ' . esc_attr( $expand_collapse_icon_color ) . ' !important;
			}
			.font-awesome-icon{
				font-size: ' . absint( $title_icon_size ) . 'px !important;
			}
			.sa-description-' . absint( $id ) . ' {
				font-family: ' . $description_font_family_value . ' !important;
				font-weight: ' . absint( $description_font_weight ) . ' !important;
				text-align: ' . esc_attr( $description_text_align ) . ' !important;
				text-transform: ' . esc_attr( $description_text_transform ) . ' !important;
				font-size: ' . absint( $description_font_size ) . 'px !important;
				line-height: ' . absint( $description_line_height ) . 'px !important;
				letter-spacing: ' . absint( $description_letter_spacing ) . 'px !important;
				color: ' . esc_attr( $description_color ) . ' !important;
				background-color: ' . esc_attr( $description_background_color ) . ' !important;
				border-bottom: ' . absint( $accordion_border_size ) . 'px ' . esc_attr( $accordion_border_type ) . ' ' . esc_attr( $accordion_border_color ) . ' !important;
				border-left: ' . absint( $accordion_border_size ) . 'px ' . esc_attr( $accordion_border_type ) . ' ' . esc_attr( $accordion_border_color ) . ' !important;
				border-right: ' . absint( $accordion_border_size ) . 'px ' . esc_attr( $accordion_border_type ) . ' ' . esc_attr( $accordion_border_color ) . ' !important;
			}
			.sa-description-' . absint( $id ) . '.active {
				max-height: ' . absint( $set_height ) . 'px !important;
				padding-top: ' . absint( $description_padding_top ) . 'px !important;
				padding-right: ' . absint( $description_padding_right ) . 'px !important;
				padding-bottom: ' . absint( $description_padding_bottom ) . 'px !important;
				padding-left: ' . absint( $description_padding_left ) . 'px !important;
			}
			.sa-description-' . absint( $id ) . '.active .animate__animated{
				animation-duration: ' . absint( $animation_duration ) . 'ms !important;
			}
			.theme-six,.theme-ten,theme-eleven, .theme-seventeen {
				.sa-title-' . absint( $id ) . ' {
					border-bottom: ' . absint( $accordion_border_size ) . 'px ' . esc_attr( $accordion_border_type ) . ' ' . esc_attr( $accordion_border_color ) . ' !important;                        
					&.active{
						border-bottom: none !important;
					}
				}

				.sa-description-' . absint( $id ) . ' {
					&.active{
						border-bottom: ' . absint( $accordion_border_size ) . 'px ' . esc_attr( $accordion_border_type ) . ' ' . esc_attr( $accordion_border_color ) . ' !important;
					}
				}
			}
			.theme-seventeen{
				.sa-title-' . absint( $id ) . ' {
					&.active{
						color: #3D6EC9 !important;
						.toggle-icon-' . absint( $id ) . ' path {
							fill: #3D6EC9 !important;
						}
					}                        
				}
			}
			.theme-eight{
				.sa-title-' . absint( $id ) . ' {
					border-left: 5px ' . esc_attr( $accordion_border_type ) . ' ' . esc_attr( $accordion_border_color ) . ' !important;
					&.active{
						border-color: #3D6EC9 !important;
						border-left: 5px ' . esc_attr( $accordion_border_type ) . '  #3D6EC9 !important;
						border-bottom: ' . absint( $accordion_border_size ) . 'px ' . esc_attr( $accordion_border_type ) . ' ' . esc_attr( $accordion_border_color ) . ' !important;
					}                        
				}

				.sa-description-' . absint( $id ) . ' {
					border-left: 5px ' . esc_attr( $accordion_border_type ) . ' ' . esc_attr( $accordion_border_color ) . ' !important;
					&.active{
						border-left: 5px ' . esc_attr( $accordion_border_type ) . ' #3D6EC9 !important;
						border-color: #3D6EC9 !important;
					}
				}
			}
			.theme-nine{
				.sa-title-' . absint( $id ) . ' {
					border-bottom: 5px ' . esc_attr( $accordion_border_type ) . ' ' . esc_attr( $accordion_border_color ) . ' !important;
					&.active{
						border-color: #3D6EC9 !important;
						border-bottom: ' . absint( $accordion_border_size ) . 'px ' . esc_attr( $accordion_border_type ) . ' ' . esc_attr( $accordion_border_color ) . ' !important;
					}                        
				}

				.sa-description-' . absint( $id ) . ' {
					border-bottom: 5px ' . esc_attr( $accordion_border_type ) . ' ' . esc_attr( $accordion_border_color ) . ' !important;
					&.active{
						border-bottom: 5px ' . esc_attr( $accordion_border_type ) . ' #3D6EC9 !important;
						border-color: #3D6EC9 !important;
					}
				}
			}
			.theme-sixteen{
				.sa-title-' . absint( $id ) . ' {
					border-top: 5px ' . esc_attr( $accordion_border_type ) . ' ' . esc_attr( $accordion_border_color ) . ' !important;
					&.active{
						border-color: #3D6EC9 !important;
						border-top: 5px ' . esc_attr( $accordion_border_type ) . ' #3D6EC9 !important;
					}                        
				}
				.sa-description-' . absint( $id ) . ' {
					&.active{
						border-color: #3D6EC9 !important;
					}
				}
			}
			.theme-eleven{
				.sa-title-' . absint( $id ) . ' {
					&.active{
						border-left: 5px ' . esc_attr( $accordion_border_type ) . ' #3D6EC9 !important;
						.toggle-icon-' . absint( $id ) . ' path {
							fill: #3D6EC9 !important;
						}
					}                        
				}
				.sa-description-' . absint( $id ) . ' {
					&.active{
						border-left: 5px ' . esc_attr( $accordion_border_type ) . ' #3D6EC9 !important;
					}
				}
			}
			.theme-thirteen{
				.sa-title-' . absint( $id ) . ' {
					&.active{
						.toggle-icon-' . absint( $id ) . ' path {
							fill: #ffffff !important;
						}
					}                        
				}
			}
			.load-more-' . absint( $id ) . ' {
				background: ' . esc_attr( $pagination_background_color ) . '!important;
				color: ' . esc_attr( $pagination_text_color ) . '!important;
				border:1px solid  ' . esc_attr( $pagination_t_border_color ) . '!important;
				
				&.active,
				&:hover{
					background: ' . esc_attr( $pagination_active_background ) . '!important;
					color: ' . esc_attr( $pagination_text_active_color ) . '!important;
					border: 1px solid ' . esc_attr( $pagination_t_active_border ) . '!important;
				}
			}
			.soft-ajax-pagination-' . absint( $id ) . ' a {
				background: ' . esc_attr( $pagination_background_color ) . '!important;
				color: ' . esc_attr( $pagination_text_color ) . '!important;
				border:1px solid  ' . esc_attr( $pagination_t_border_color ) . '!important;
				&.active,
				&:hover{
					background: ' . esc_attr( $pagination_active_background ) . '!important;
					color: ' . esc_attr( $pagination_text_active_color ) . '!important;
					border: 1px solid ' . esc_attr( $pagination_t_active_border ) . '!important;
				}
			}
			.horizontal-container{
				.sa-title-' . absint( $id ) . ' {
					&.active {
						border-bottom: ' . absint( $accordion_border_size ) . 'px ' . esc_attr( $accordion_border_type ) . ' ' . esc_attr( $accordion_border_color ) . ' !important;
					}
				}
				.sa-description-' . absint( $id ) . ' {
					border-top: ' . absint( $accordion_border_size ) . 'px ' . esc_attr( $accordion_border_type ) . ' ' . esc_attr( $accordion_border_color ) . ' !important;
				}
			}';
        if ( $is_first === true ) {
            wp_enqueue_style(
                'soft-accordion-frontend-style',
                SOFT_ACCORDION_URL . '/assets/css/frontend.css',
                array(),
                SOFT_ACCORDION_VERSION
            );
            wp_add_inline_style( 'soft-accordion-frontend-style', $css );
            // Output accordion HTML.
            if ( $title === '1' ) {
                printf( '<h2 class="accordion-title accordion-title-%1$s">%2$s</h2>', absint( $id ), esc_html( $accordion_main_title ) );
            }
            if ( '1' === $faq_search ) {
                printf( '
						<div class="sa_faq_search_bar_container">
							<input type="text" placeholder="search..." 
							class="sa-search-input" 
							id="sa-search-input-%1$s"
							data-search-input="%1$s"
							>
							<span class="dashicons dashicons-search"></span>
						</div>
							', esc_attr( $id ) );
            }
            if ( '1' === $expand_collapse_button ) {
                printf(
                    '
					<div class="expanded-collapse-wrapper expanded-collapse-wrapper-%1$s">
						<button
						id="expand-collapse-%1$s"
						class="expand-collapse-button"
						data-state="expand" 
						data-expand-button-text="%2$s"
						data-collapse-button-text="%3$s">
							<span class="button-text">%2$s</span> %4$s
						</button>
					</div>
					',
                    esc_attr( $id ),
                    esc_html( $expend_button_label ),
                    esc_html( $collapse_button_label ),
                    ( $show_expand_collapse_icon ? "<i class='fa " . esc_attr( $expand_collapse_button_icon ) . "'></i>" : '' )
                );
            }
            if ( '1' === $pagination && 'Custom' === $accordion_type ) {
                $page = 1;
                $limit = absint( $accordion_per_items );
                $total_count = count( $accordion_data );
                $total_page = '';
                if ( $limit > 0 ) {
                    $total_page = ceil( $total_count / $limit );
                }
                $offset = ($page - 1) * $limit;
                $accordion_data = array_slice( $accordion_data, $offset, $limit );
            }
        }
        if ( 'Custom' === $accordion_type ) {
            if ( $accordion_data ) {
                if ( $is_first ) {
                    $horizontal_layout = ( 'horizontal' === $layout && sa_fs()->can_use_premium_code__premium_only() ? 'horizontal-container' : '' );
                    $custom_theme = ( 'horizontal' === $layout ? '' : $theme_layout );
                    printf(
                        '<div class="sa-card-%1$s sa-accordion %8$s %13$s"
								data-accordion-id="%1$s"
								data-accordion-mode="%2$s"
								data-accordion-custom-open="%9$s"
								data-accordion-event="%3$s"
								data-accordion-multiple="%4$s"
								data-scroll-active="%5$s"
								data-accordion-preloader="%6$s"
								data-accordion-style="%7$s"
								data-open-icon="%10$s"
								data-close-icon="%11$s"
								data-animation-style="%12$s"
								data-expand-collapse-icon-position="%14$s">',
                        esc_attr( $id ),
                        esc_attr( $mode ),
                        esc_attr( $event ),
                        esc_attr( $multiple_open ),
                        esc_attr( $scroll_to_active ),
                        esc_attr( $preloader ),
                        esc_attr( json_encode( $css ) ),
                        esc_attr( $horizontal_layout ),
                        esc_attr( json_encode( $custom_mode ) ),
                        esc_attr( $icon_open ),
                        esc_attr( $icon_close ),
                        esc_attr( $animation_style ),
                        esc_attr( $custom_theme ),
                        esc_attr( $expand_collapse_icon_position )
                    );
                }
                if ( 'multiColumn' !== $layout ) {
                    // Default behavior for single-column layout.
                    foreach ( $accordion_data as $key => $value ) {
                        $content = $value['content'];
                        $icon = $value['icon'];
                        if ( '1' === $line_break ) {
                            $content = wpautop( $content );
                        }
                        if ( '1' === $no_follow_link ) {
                            $content = soft_accordion_add_nofollow_to_links( $content );
                        }
                        printf(
                            '<div class="sa-single-accordion-%1$s horizontal-single-accordion" id="%9$s">
									<%6$s class="sa-title-%1$s soft-accordion-title" id="%1$s">
										%2$s
										<span>
											%7$s
											<span>%3$s</span>
											%8$s
										</span>
										%4$s
									</%6$s>
								<div class="sa-description-%1$s soft-accordion-description">
									%10$s
										%5$s
									%11$s
								</div>
							</div>',
                            esc_attr( $id ),
                            ( '1' === $expand_collapse_icon && 'left' === $expand_collapse_icon_position ? "<i class='toggle-class-icon toggle-icon-" . esc_attr( $id ) . ' ' . esc_attr( $icon_open ) . "'></i>" : '' ),
                            esc_html( $value['title'] ),
                            ( '1' === $expand_collapse_icon && 'right' === $expand_collapse_icon_position ? "<i class='toggle-class-icon toggle-icon-" . esc_attr( $id ) . ' ' . esc_attr( $icon_open ) . "'></i>" : '' ),
                            wp_kses_post( $content ),
                            esc_attr( $accordion_title_tag ),
                            ( '1' === $title_icon && 'left' === $title_icon_position && !empty( $icon ) ? '<i class="fa ' . esc_attr( $icon ) . ' font-awesome-icon"></i>' : '' ),
                            ( '1' === $title_icon && 'right' === $title_icon_position && !empty( $icon ) ? '<i class="fa ' . esc_attr( $icon ) . ' font-awesome-icon"></i>' : '' ),
                            esc_html( $value['id'] ),
                            ( '1' === $animation && sa_fs()->can_use_premium_code__premium_only() ? '<div class="animate__animated">' : '' ),
                            ( '1' === $animation && sa_fs()->can_use_premium_code__premium_only() ? '</div>' : '' )
                        );
                    }
                }
                if ( $is_first ) {
                    echo '</div>';
                }
            }
        }
        if ( '1' === $preloader ) {
            echo '<div class="preloader"><svg class="" width="40" height="40" viewBox="0 0 50 50"><circle cx="25" cy="25" r="20" fill="none" stroke="#000" stroke-width="4" stroke-dasharray="90" stroke-linecap="round" stroke-dashoffset="0"><animateTransform attributeType="XML" attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="1s" repeatCount="indefinite"/></circle></svg></div>';
        }
        return ob_get_clean();
    }

    /**
     * Get Pagination Data
     */
    public function handle_get_accordion_pagination_data() {
        // nonce check.
        if ( !check_ajax_referer( 'soft_accordion', 'nonce', false ) ) {
            wp_send_json_error( __( 'Invalid nonce', 'soft-accordion' ) );
        }
        $id = intval( $_POST['accordion_id_no'] ?? 0 );
        $current_page = intval( $_POST['current_page'] ?? 1 );
        $per_page = intval( $_POST['per_page'] ?? 8 );
        $data = '';
        $items = $this->get_accordion_data( $id, $current_page, $per_page );
        if ( !empty( $items ) ) {
            $data = $items;
        }
        wp_send_json_success( $data );
    }

    /**
     * Get Preview Data
     *
     * @return void
     */
    public function handle_get_preview_data() {
        // nonce check.
        if ( !check_ajax_referer( 'soft_accordion', 'nonce', false ) ) {
            wp_send_json_error( __( 'Invalid nonce', 'soft-accordion' ) );
        }
        $id = intval( $_POST['accordion_id'] ?? 0 );
        $accordion_main_title = sanitize_text_field( $_POST['main_title'] ?? '' );
        $accordion_type = sanitize_text_field( $_POST['accordion_type'] ?? '' );
        $accordion_data = json_decode( wp_unslash( $_POST['custom_accordion_data'] ?? '' ), true );
        $accordion_post = json_decode( wp_unslash( $_POST['post_accordion_data'] ?? '' ), true );
        $setting_data = json_decode( wp_unslash( $_POST['pre_accordion_settings'] ?? '' ), true );
        $selected_theme = json_decode( wp_unslash( $_POST['pre_theme_settings'] ?? '' ), true );
        $display_setting = json_decode( wp_unslash( $_POST['pre_display_settings'] ?? '' ), true );
        $typography_setting = json_decode( wp_unslash( $_POST['pre_typography_settings'] ?? '' ), true );
        $data = array(
            $id,
            $accordion_main_title,
            $accordion_type,
            $accordion_data,
            $accordion_post,
            $setting_data,
            $selected_theme,
            $display_setting,
            $typography_setting
        );
        $html = $this->accordion_shortcode( null, $data );
        wp_send_json_success( $html );
    }

    /**
     * Get accordion shortcode
     */
    public function get_accordion_shortcode_data() {
        // nonce check.
        if ( !check_ajax_referer( 'soft_accordion', 'nonce', false ) ) {
            wp_send_json_error( __( 'Invalid nonce', 'soft-accordion' ) );
        }
        $id = intval( $_POST['accordion_id'] ?? 0 );
        $html = $this->accordion_shortcode( array(
            'id' => $id,
        ) );
        wp_send_json_success( $html );
    }

    /**
     * Accordion Shortcode
     */
    public function accordion_shortcode( $atts, $post_data = null, $pagination = null ) {
        global $wpdb;
        $atts = shortcode_atts( array(
            'id' => '',
        ), $atts, 'soft_accordion' );
        $table_name = $wpdb->prefix . 'soft_accordion';
        // Initialize variables.
        $id = $accordion_main_title = $accordion_type = $accordion_data = $accordion_post = null;
        $setting_data = $selected_theme = $display_setting = $typography_setting = null;
        // If an ID is provided in the shortcode attributes.
        if ( !empty( $atts['id'] ) ) {
            $results = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$table_name} WHERE id = %d", intval( $atts['id'] ) ), ARRAY_A );
            // Handle database results.
            if ( !empty( $results ) ) {
                $accordion_all_data = $results[0];
                $db_id = (int) $accordion_all_data['id'];
                $db_status = $accordion_all_data['is_active'];
                $db_title = sanitize_text_field( $accordion_all_data['title'] );
                $db_type = sanitize_text_field( $accordion_all_data['type'] );
                $db_custom_data = soft_accordion_sanitize_array( json_decode( $accordion_all_data['custom_data'], true ) );
                $db_post_data = soft_accordion_sanitize_array( json_decode( $accordion_all_data['post_data'], true ) );
                $db_settings = soft_accordion_sanitize_array( json_decode( $accordion_all_data['settings'], true ) );
                // Check if the accordion is active.
                if ( $db_status === '0' ) {
                    return '';
                }
                // Assign variables from database data.
                $id = $db_id;
                $accordion_main_title = $db_title;
                $accordion_type = $db_type;
                $accordion_data = $db_custom_data;
                $accordion_post = $db_post_data;
                $setting_data = $db_settings['accordionSetting'] ?? array();
                $selected_theme = $db_settings['theme'] ?? '';
                $display_setting = $db_settings['displaySettings'] ?? array();
                $typography_setting = $db_settings['typography'] ?? array();
            }
        }
        if ( $post_data ) {
            list( $id, $accordion_main_title, $accordion_type, $accordion_data, $accordion_post, $setting_data, $selected_theme, $display_setting, $typography_setting ) = $post_data;
        }
        // Return empty string if no accordion data is found.
        if ( empty( $id ) ) {
            return '';
        }
        return $this->get_accordion_markup(
            $id,
            $accordion_main_title,
            $accordion_data,
            $accordion_type,
            $accordion_post,
            $setting_data,
            $selected_theme,
            $display_setting,
            $typography_setting,
            true
        );
    }

    /**
     * Get the instance of Shortcode class.
     *
     * @since 1.0.0
     * @return Shortcode
     */
    public static function instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

}

// Initialize the shortcode class.
Shortcode::instance();