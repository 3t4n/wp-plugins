<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class VI_WP_LUCKY_WHEEL_Admin_Settings {
	protected $settings;
	protected $updated_sucessfully, $error;

	public function __construct() {
		$this->settings      = VI_WP_LUCKY_WHEEL_DATA::get_instance();
		add_action( 'admin_init', array( $this, 'export_emails' ) );
		add_action( 'admin_init', array( $this, 'save_settings' ) );
		add_action( 'admin_menu', array( $this, 'add_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
		add_action( 'media_buttons', array( $this, 'preview_emails_button' ) );
		add_action( 'admin_footer', array( $this, 'preview_emails_html' ) );
		add_action( 'wp_ajax_wplwl_preview_emails', array( $this, 'preview_emails_ajax' ) );
	}
	public function preview_emails_ajax() {
		check_ajax_referer( 'wplwl_admin_nonce', 'wplwl_admin_nonce' );
		$date_format   = get_option( 'date_format', 'F d, Y' );
		$date          = new DateTime();
		$now           = $date->format( $date_format );
		$content       = isset( $_GET['content'] ) ? wp_kses_post( stripslashes( $_GET['content'] ) ) : '';
		$email_heading = isset( $_GET['heading'] ) ? sanitize_text_field( stripslashes( $_GET['heading'] ) ) : '';
		$bg            = isset( $_GET['email_background_color'] ) ? sanitize_hex_color( $_GET['email_background_color'] ) : '';
		$body          = isset( $_GET['email_body_background_color'] ) ? sanitize_hex_color( $_GET['email_body_background_color'] ) : '';
		$base          = isset( $_GET['email_base_color'] ) ? sanitize_hex_color( $_GET['email_base_color'] ) : '';
		$text          = isset( $_GET['email_body_text_color'] ) ? sanitize_hex_color( $_GET['email_body_text_color'] ) : '';
		$img           = isset( $_GET['header_image'] ) ? sanitize_url( $_GET['header_image'] ) : '';
		$footer_text   = isset( $_GET['footer_text'] ) ? wpautop( wp_kses_post( wptexturize( $_GET['footer_text'] ) ) ) : '';

		$label           = 'HAPPY NEW YEAR 2019';
		$value           = 'happy_abc_xyz_123';
		$customer_name   = 'John';
		$customer_mobile = '0123456789';
		$content         = str_replace( '{prize_label}', $label, $content );
		$content         = str_replace( '{customer_name}', $customer_name, $content );
		$content         = str_replace( '{customer_mobile}', $customer_mobile, $content );
		$content         = str_replace( '{prize_value}', $value, $content );
		$content         = str_replace( '{today}', $now, $content );

		ob_start();
		?>
        <!DOCTYPE html>
        <html <?php language_attributes(); ?>>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>"/>
            <title><?php echo esc_html( get_bloginfo( 'name', 'display' ) ); ?></title>
        </head>
        <body <?php echo esc_attr( is_rtl() ? 'rightmargin' : 'leftmargin' ); ?>="0" marginwidth="0" topmargin="0"
        marginheight="0" offset="0">
        <div id="wrapper" dir="<?php echo esc_attr( is_rtl() ? 'rtl' : 'ltr' ); ?>"
             style="background-color: <?php echo esc_attr( $bg ); ?>;
                     margin: 0;
                     padding: 70px 0 70px 0;
                     -webkit-text-size-adjust: none !important;
                     width: 100%;">
            <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
                <tr>
                    <td align="center" valign="top">
                        <div id="template_header_image">
							<?php
							if ( $img ) {
								echo '<p style="margin-top:0;"><img src="' . esc_url( $img ) . '" alt="' . esc_html( get_bloginfo( 'name', 'display' ) ) . '" ></p>';
							}
							?>
                        </div>
                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="template_container"
                               style="box-shadow: 0 1px 4px rgba(0,0,0,0.1) !important;
                                       background-color: <?php echo esc_attr( $body ); ?>;
                                       border-radius: 3px !important;">
                            <tr>
                                <td align="center" valign="top">
                                    <!-- Header -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="600"
                                           id="template_header"
                                           style="background-color: <?php echo esc_attr( $base ); ?>;
                                                   border-radius: 3px 3px 0 0 !important;
                                                   border-bottom: 0;
                                                   font-weight: bold;
                                                   line-height: 100%;
                                                   vertical-align: middle;
                                                   font-family: Helvetica, Roboto, Arial, sans-serif;">
                                        <tr>
                                            <td id="header_wrapper" style="padding: 36px 48px;display: block;">
                                                <h1><?php echo wp_kses_post( $email_heading ); ?></h1>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Header -->
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top">
                                    <!-- Body -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="600"
                                           id="template_body">
                                        <tr>
                                            <td valign="top" id="body_content"
                                                style="background-color: <?php echo esc_attr( $body ); ?>;">
                                                <!-- Content -->
                                                <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td valign="top" style="padding: 48px;">
                                                            <div id="body_content_inner" style="
                                                                    font-family: Helvetica, Roboto, Arial, sans-serif;
                                                                    font-size: 14px;
                                                                    line-height: 150%;
                                                                    text-align: <?php echo esc_attr( is_rtl() ? 'right' : 'left' ); ?>;">
                                                                <div class="text"
                                                                     style="color: <?php echo esc_attr( $text ); ?>;
                                                                             font-family: Helvetica, Roboto, Arial, sans-serif;">
																	<?php
																	echo wp_kses_post( $content );
																	?>

                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- End Content -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Body -->
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top">
                                    <!-- Footer -->
                                    <table border="0" cellpadding="10" cellspacing="0" width="600"
                                           id="template_footer">
                                        <tr>
                                            <td valign="top">
                                                <table border="0" cellpadding="10" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td colspan="2" valign="middle" id="credit" style="border:0;
                                                                font-family: Arial;
                                                                font-size:12px;
                                                                line-height:125%;
                                                                text-align:center;
                                                                padding: 0 48px 48px 48px;">
															<?php echo wp_kses_post( $footer_text ); ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Footer -->
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        </body>
        </html>

		<?php
		$message = ob_get_clean();
		// print the preview email
		wp_send_json(
			array(
				'html' => $message,
			)
		);
	}
	public function preview_emails_html() {
		if ( isset( $_REQUEST['page'] ) && $_REQUEST['page'] == 'wp-lucky-wheel' ) {// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			?>
            <div class="preview-emails-html-container preview-html-hidden">
                <div class="preview-emails-html-overlay"></div>
                <div class="preview-emails-html"></div>
            </div>
			<?php
		}
	}
	public function preview_emails_button( $editor_id ) {
		if (isset( $_REQUEST['page'] ) && $_REQUEST['page'] == 'wp-lucky-wheel' ) {// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$editor_ids = apply_filters('wplwl_preview_emails_button_ids',array( 'content' ));
			if ( in_array( $editor_id, $editor_ids ) ) {
				ob_start();
				?>
                <span class="button wplwl-preview-emails-button"
                      data-wplwl_language="<?php echo esc_attr( str_replace( 'content', '', $editor_id ) ) ?>"><?php esc_html_e( 'Preview emails', 'wp-lucky-wheel' ) ?></span>
				<?php
				echo wp_kses(ob_get_clean(), $this->settings::filter_allowed_html());
			}
		}
	}


	public function add_menu() {
		add_menu_page(
			esc_html__( 'WordPress Lucky Wheel', 'wp-lucky-wheel' ),
			esc_html__( 'WP Lucky Wheel', 'wp-lucky-wheel' ),
			'manage_options',
			'wp-lucky-wheel',
			array( $this, 'settings_page' ),
			'dashicons-wheel',
			2
		);
		add_submenu_page( 'wp-lucky-wheel', esc_html__( 'Emails', 'wp-lucky-wheel' ), esc_html__( 'Emails', 'wp-lucky-wheel' ), 'manage_options', 'edit.php?post_type=wplwl_email' );
		add_submenu_page(
			'wp-lucky-wheel', esc_html__( 'Report', 'wp-lucky-wheel' ), esc_html__( 'Report', 'wp-lucky-wheel' ), 'manage_options', 'wplwl-report', array(
				$this,
				'report_callback'
			)
		);
//		add_submenu_page(
//			'wp-lucky-wheel', esc_html__( 'System Status', 'wp-lucky-wheel' ), esc_html__( 'System Status', 'wp-lucky-wheel' ), 'manage_options', 'wplwl-system-status', array(
//				$this,
//				'system_status'
//			)
//		);
	}

	public function export_emails() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		if ( isset( $_POST['submit'] ) && isset( $_POST['wplwl_export_nonce_field'] ) && wp_verify_nonce( $_POST['wplwl_export_nonce_field'], 'wplwl_export_nonce_field_action' ) ) {
			$start    = isset( $_POST['wplwl_export_start'] ) ? sanitize_text_field( $_POST['wplwl_export_start'] ) : '';
			$end      = isset( $_POST['wplwl_export_end'] ) ? sanitize_text_field( $_POST['wplwl_export_end'] ) : '';
			$filename = "wp_lucky_wheel_email_";
			if ( ! $start && ! $end ) {
				$args1    = array(
					'post_type'      => 'wplwl_email',
					'posts_per_page' => - 1,
					'post_status'    => 'publish',
				);
				$filename .= date( 'Y-m-d_h-i-s', time() ) . ".csv";// phpcs:ignore WordPress.DateTime.RestrictedFunctions.date_date
			} elseif ( ! $start ) {
				$args1    = array(
					'post_type'      => 'wplwl_email',
					'posts_per_page' => - 1,
					'post_status'    => 'publish',
					'date_query'     => array(
						array(
							'before'    => $end,
							'inclusive' => true

						)
					),
				);
				$filename .= 'before_' . $end . ".csv";
			} elseif ( ! $end ) {
				$args1    = array(
					'post_type'      => 'wplwl_email',
					'posts_per_page' => - 1,
					'post_status'    => 'publish',
					'date_query'     => array(
						array(
							'after'     => $start,
							'inclusive' => true
						)
					),

				);
				$filename .= 'from' . $start . 'to' . date( 'Y-m-d' ) . ".csv";// phpcs:ignore WordPress.DateTime.RestrictedFunctions.date_date
			} else {
				if ( strtotime( $start ) > strtotime( $end ) ) {
					wp_die( 'Incorrect input date' );
				}
				$args1    = array(
					'post_type'      => 'wplwl_email',
					'posts_per_page' => - 1,
					'post_status'    => 'publish',
					'date_query'     => array(
						array(
							'before'    => $end,
							'after'     => $start,
							'inclusive' => true

						)
					),
				);
				$filename .= 'from' . $start . 'to' . $end . ".csv";
			}
			$the_query        = new WP_Query( $args1 );
			$csv_source_array = array();
			$names            = array();
			$mobiles          = array();
			$coupons_labels   = array();
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					$id                 = get_the_ID();
					$csv_source_array[] = get_the_title();
					$names[]            = get_the_content();
					$mobiles[]          = get_post_meta( $id, 'wplwl_email_mobile', true );
					$label              = get_post_meta( $id, 'wplwl_email_labels', true );
					if ( is_array( $label ) && count( $label ) ) {
						$coupons_labels[] = implode( ", ", $label );
					}
				}
				wp_reset_postdata();
				$data_rows  = array();
				$header_row = array(
					'Order',
					'Email',
					'Name',
					'Mobile',
					'Prize',
				);
				$i          = 1;
				foreach ( $csv_source_array as $key => $result ) {
					$row         = array( $i, $result, $names[ $key ], $mobiles[ $key ], $coupons_labels[ $key ] );
					$data_rows[] = $row;
					$i ++;
				}
				header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
				header( 'Content-type: text/csv' );
				header( 'Content-Description: File Transfer' );
				header( 'Content-Disposition: attachment; filename=' . $filename );
				header( 'Expires: 0' );
				header( 'Pragma: public' );
				$fh = fopen( 'php://output', 'w' );
				fprintf( $fh, chr( 0xEF ) . chr( 0xBB ) . chr( 0xBF ) );
				fputcsv( $fh, $header_row );
				foreach ( $data_rows as $data_row ) {
					fputcsv( $fh, $data_row );
				}
				fclose( $fh );// phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_operations_fclose
				die;
			}
		}
	}
	public function report_callback() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$total_spin = $email_subscribe = $coupon_given = 0;

		$args      = array(
			'post_type'      => 'wplwl_email',
			'posts_per_page' => - 1,
			'post_status'    => 'publish',
		);
		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) {
			$email_subscribe = $the_query->post_count;
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				$id = get_the_ID();
				if ( get_post_meta( $id, 'wplwl_spin_times', true ) ) {
					$total_spin += get_post_meta( $id, 'wplwl_spin_times', true )['spin_num'];
				}
				if ( get_post_meta( $id, 'wplwl_email_coupons', true ) ) {
					$coupon       = get_post_meta( $id, 'wplwl_email_coupons', true );
					$coupon_given += sizeof( $coupon );
				}
			}
			wp_reset_postdata();
		}

		?>
        <div class="wrap">
            <form action="" method="post">
				<?php wp_nonce_field( 'wplwl_export_nonce_field_action', 'wplwl_export_nonce_field' ); ?>
                <h2><?php esc_html_e( 'Lucky Wheel Report', 'wp-lucky-wheel' ) ?></h2>
                <table cellspacing="0" id="status" class="widefat">
                    <tbody>
                    <tr>
                        <th><?php esc_html_e( 'Total Spins', 'wp-lucky-wheel' ) ?></th>
                        <th><?php esc_html_e( 'Emails Subcribed', 'wp-lucky-wheel' ) ?></th>
                        <th><?php esc_html_e( 'Coupon Given', 'wp-lucky-wheel' ) ?></th>
                    </tr>
                    <tr>
                        <td><?php echo esc_html( $total_spin ); ?></td>
                        <td><?php echo esc_html( $email_subscribe ); ?></td>
                        <td><?php echo esc_html( $coupon_given ); ?></td>
                    </tr>
                    </tbody>

                </table>
                <label for="wplwl_export_start"><?php esc_html_e( 'From', 'wp-lucky-wheel' ); ?></label><input
                        type="date" name="wplwl_export_start" id="wplwl_export_start" class="wplwl_export_date">
                <label for="wplwl_export_end"><?php esc_html_e( 'To', 'wp-lucky-wheel' ); ?></label><input
                        type="date" name="wplwl_export_end" id="wplwl_export_end" class="wplwl_export_date">

                <input id="submit"
                       type="submit"
                       class="button-primary"
                       name="submit"
                       value="<?php esc_html_e( 'Export Emails', 'wp-lucky-wheel' ); ?>"/>
            </form>
        </div>
		<?php
	}
	public function system_status() {
		?>
        <div class="wrap">
            <h2><?php esc_html_e( 'System Status', 'wp-lucky-wheel' ) ?></h2>
            <table cellspacing="0" id="status" class="widefat">
                <tbody>
                <tr>
                    <td data-export-label="file_get_contents"><?php esc_html_e( 'file_get_contents', 'wp-lucky-wheel' ) ?></td>
                    <td>
						<?php
						if ( function_exists( 'file_get_contents' ) ) {
							echo '<span class="wplwl-status-ok">&#10004;</span> ';
						} else {
							echo '<span class="wplwl-status-error">&#10005; </span>';
						}
						?>
                    </td>
                </tr>
                <tr>
                    <td data-export-label="<?php esc_html_e( 'Allow URL Open', 'wp-lucky-wheel' ) ?>"><?php esc_html_e( 'Allow URL Open', 'wp-lucky-wheel' ) ?></td>
                    <td>
						<?php
						if ( ini_get( 'allow_url_fopen' ) == 'On' ) {
							echo '<span class="wplwl-status-ok">&#10004;</span> ';
						} else {
							echo '<span class="wplwl-status-error">&#10005;</span>';
						}
						?>
                </tr>
                </tbody>
            </table>
        </div>
		<?php
	}

	public function save_settings() {
		global $wp_lucky_wheel_settings;
		if ( empty( $_POST['wplwl_nonce_field'] ) || ! wp_verify_nonce( $_POST['wplwl_nonce_field'], 'wplwl_settings_page_save' ) ) {
			return;
		}
		if ( !isset( $_REQUEST['page'] ) || sanitize_text_field(wp_unslash( $_REQUEST['page'])) !== 'wp-lucky-wheel' ) {
            return;
		}
		if ( !isset( $_POST['submit'] )  ) {
            return;
		}
		if ( ! empty( $_POST['probability'] ) ) {
			if ( count( $_POST['probability'] ) < 3 ) {
				$this->error = esc_html__('There must be at least 3 rows!', 'wp-lucky-wheel' );
				return;
			}
			if ( array_sum( $_POST['probability'] ) < 1 ) {
				$this->error = esc_html__('The total probability must greater than 0!', 'wp-lucky-wheel' );
				return;
			}
		} else {
			$this->error = esc_html__('There must be at least 3 rows!', 'wp-lucky-wheel' );
            return;
		}
		if ( isset( $_POST['custom_type_label'] ) && is_array( $_POST['custom_type_label'] ) ) {
			foreach ( $_POST['custom_type_label'] as $key => $val ) {
				if ( $val === '' ) {
					$this->error = esc_html__('Label cannot be empty.', 'wp-lucky-wheel' );
					return;
				}
				if ( isset($_POST['prize_type'][ $key ], $_POST['custom_type_value'][ $key ]) &&
                     $_POST['prize_type'][ $key ] == 'custom' && $_POST['custom_type_value'][ $key ] == '' ) {
					$this->error = esc_html__('Please enter value for custom type.', 'wp-lucky-wheel' );
					return;
				}
			}
		}
		$args = array(
			'general'    => array(
				'enable'     => isset( $_POST['wplwl_enable'] ) ? sanitize_text_field( $_POST['wplwl_enable'] ) : 'off',
				'mobile'     => isset( $_POST['wplwl_enable_mobile'] ) ? sanitize_text_field( $_POST['wplwl_enable_mobile'] ) : 'off',
				'spin_num'   => isset( $_POST['wplwl_spin_num'] ) ? sanitize_text_field( $_POST['wplwl_spin_num'] ) : 0,
				'delay'      => isset( $_POST['wplwl_delay'] ) ? sanitize_text_field( $_POST['wplwl_delay'] ) : 0,
				'delay_unit' => isset( $_POST['wplwl_delay_unit'] ) ? sanitize_text_field( $_POST['wplwl_delay_unit'] ) : 's',
			),
			'notify'     => array(
				'position'                 => isset( $_POST['notify_position'] ) ? sanitize_text_field( $_POST['notify_position'] ) : '',
				'size'                     => isset( $_POST['notify_size'] ) ? sanitize_text_field( $_POST['notify_size'] ) : 0,
				'color'                    => isset( $_POST['notify_color'] ) ? sanitize_text_field( $_POST['notify_color'] ) : '',
				'popup_icon'               => '',
				'popup_icon_color'         => '#000000',
				'popup_icon_bg_color'      => '',
				'popup_icon_border_radius' => 5,
				'intent'                   => isset( $_POST['notify_intent'] ) ? sanitize_text_field( $_POST['notify_intent'] ) : '',
				'show_again'               => isset( $_POST['notify_show_again'] ) ? sanitize_text_field( $_POST['notify_show_again'] ) : 0,
				'hide_popup'               => isset( $_POST['notify_hide_popup'] ) ? sanitize_text_field( $_POST['notify_hide_popup'] ) : 'off',
				'show_wheel'               => isset( $_POST['show_wheel'] ) ? sanitize_text_field( $_POST['show_wheel'] ) : '',
				'scroll_amount'            => 50,
				'show_again_unit'          => isset( $_POST['notify_show_again_unit'] ) ? sanitize_text_field( $_POST['notify_show_again_unit'] ) : 0,
				'show_only_front'          => isset( $_POST['notify_frontpage_only'] ) ? sanitize_text_field( $_POST['notify_frontpage_only'] ) : 'off',
				'show_only_blog'           => isset( $_POST['notify_blogpage_only'] ) ? sanitize_text_field( $_POST['notify_blogpage_only'] ) : 'off',
				'show_only_shop'           => isset( $_POST['notify_shop_only'] ) ? sanitize_text_field( $_POST['notify_shop_only'] ) : 'off',
				'conditional_tags'         => isset( $_POST['notify_conditional_tags'] ) ? stripslashes( sanitize_text_field( $_POST['notify_conditional_tags'] ) ) : '',
				'time_on_close'            => isset( $_POST['notify_time_on_close'] ) ? stripslashes( sanitize_text_field( $_POST['notify_time_on_close'] ) ) : '',
				'time_on_close_unit'       => isset( $_POST['notify_time_on_close_unit'] ) ? stripslashes( sanitize_text_field( $_POST['notify_time_on_close_unit'] ) ) : '',
			),
			'wheel_wrap' => array(
				'description'            => isset( $_POST['wheel_wrap_description'] ) ? wp_kses_post( stripslashes( $_POST['wheel_wrap_description'] ) ) : '',
				'bg_image'               => isset( $_POST['wheel_wrap_bg_image'] ) ? sanitize_text_field( $_POST['wheel_wrap_bg_image'] ) : '',
				'bg_color'               => isset( $_POST['wheel_wrap_bg_color'] ) ? sanitize_text_field( $_POST['wheel_wrap_bg_color'] ) : '',
				'text_color'             => isset( $_POST['wheel_wrap_text_color'] ) ? sanitize_text_field( $_POST['wheel_wrap_text_color'] ) : '',
				'spin_button'            => isset( $_POST['wheel_wrap_spin_button'] ) ? sanitize_text_field( stripslashes( $_POST['wheel_wrap_spin_button'] ) ) : 'Try Your Lucky',
				'spin_button_color'      => isset( $_POST['wheel_wrap_spin_button_color'] ) ? sanitize_text_field( $_POST['wheel_wrap_spin_button_color'] ) : '',
				'spin_button_bg_color'   => isset( $_POST['wheel_wrap_spin_button_bg_color'] ) ? sanitize_text_field( $_POST['wheel_wrap_spin_button_bg_color'] ) : '',
				'pointer_position'       => isset( $_POST['pointer_position'] ) ? sanitize_text_field( $_POST['pointer_position'] ) : 'center',
				'pointer_color'          => isset( $_POST['pointer_color'] ) ? sanitize_text_field( $_POST['pointer_color'] ) : '',
				'wheel_center_image'     =>  '',
				'wheel_center_color'     => isset( $_POST['wheel_center_color'] ) ? sanitize_text_field( $_POST['wheel_center_color'] ) : '',
				'wheel_border_color'     => '#ffffff',
				'wheel_dot_color'        => '#000000',
				'close_option'           => isset( $_POST['wheel_wrap_close_option'] ) ? sanitize_text_field( $_POST['wheel_wrap_close_option'] ) : '',
				'font'                   => isset( $_POST['wplwl_google_font_select'] ) ? sanitize_text_field( $_POST['wplwl_google_font_select'] ) : '',
				'gdpr'                   => isset( $_POST['gdpr_policy'] ) ? sanitize_textarea_field( $_POST['gdpr_policy'] ) : "off",
				'gdpr_message'           => isset( $_POST['gdpr_message'] ) ? wp_kses_post( stripslashes( $_POST['gdpr_message'] ) ) : "",
				'congratulations_effect' => '',
				'background_effect'      => 'firework',
				'custom_css'             => isset( $_POST['custom_css'] ) ? wp_kses_post( stripslashes( $_POST['custom_css'] ) ) : "",
			),
			'wheel'      => array(
				'wheel_speed'       => 5,
				'spinning_time'     => 8,
				'prize_type'        => isset( $_POST['prize_type'] ) ? stripslashes_deep( array_map( 'sanitize_text_field', $_POST['prize_type'] ) ) : array(),
				'prize_quantity'    => isset( $_POST['prize_quantity'] ) ? stripslashes_deep( array_map( 'sanitize_text_field', $_POST['prize_quantity'] ) ) : array(),
				'custom_value'      => isset( $_POST['custom_type_value'] ) ? array_map( 'wplwl_sanitize_text_field', $_POST['custom_type_value'] ) : array(),
				'custom_label'      => isset( $_POST['custom_type_label'] ) ? array_map( 'wplwl_sanitize_text_field', $_POST['custom_type_label'] ) : array(),
				'probability'       => isset( $_POST['probability'] ) ? array_map( 'sanitize_text_field', $_POST['probability'] ) : array(),
				'bg_color'          => isset( $_POST['bg_color'] ) ? array_map( 'sanitize_text_field', $_POST['bg_color'] ) : array(),
				'slices_text_color' => isset( $_POST['slices_text_color'] ) ? array_map( 'sanitize_text_field', $_POST['slices_text_color'] ) : array(),
				'slice_text_color'  => isset( $_POST['slice_text_color'] ) ? wp_kses_post( stripslashes( $_POST['slice_text_color'] ) ) : "",
				'show_full_wheel'   => isset( $_POST['show_full_wheel'] ) ? sanitize_text_field( $_POST['show_full_wheel'] ) : "",
				'font_size'         => 100,
				'wheel_size'        => 100,
				'random_color'      => isset( $_POST['random_color'] ) ? sanitize_text_field( $_POST['random_color'] ) : "",
			),

			'result'                            => array(
				'auto_close'   => isset( $_POST['result-auto_close'] ) ? sanitize_text_field( $_POST['result-auto_close'] ) : 0,
				'email'        => array(
					'from_name'             => isset( $_POST['from_name'] ) ? stripslashes( sanitize_text_field( $_POST['from_name'] ) ) : "",
					'from_address'          => isset( $_POST['from_address'] ) ? stripslashes( sanitize_text_field( $_POST['from_address'] ) ) : "",
					'subject'               => isset( $_POST['subject'] ) ? stripslashes( sanitize_text_field( $_POST['subject'] ) ) : "",
					'heading'               => isset( $_POST['heading'] ) ? stripslashes( sanitize_text_field( $_POST['heading'] ) ) : "",
					'content'               => isset( $_POST['content'] ) ? wp_kses_post( $_POST['content'] ) : "",
					'header_image'          => '',
					'footer_text'           => isset( $_POST['footer_text'] ) ? stripslashes( sanitize_text_field( $_POST['footer_text'] ) ) : "",
					'base_color'            => isset( $_POST['email_base_color'] ) ? sanitize_text_field( $_POST['email_base_color'] ) : '',
					'background_color'      => isset( $_POST['email_background_color'] ) ? sanitize_text_field( $_POST['email_background_color'] ) : '',
					'body_background_color' => isset( $_POST['email_body_background_color'] ) ? sanitize_text_field( $_POST['email_body_background_color'] ) : '',
					'body_text_color'       => isset( $_POST['email_body_text_color'] ) ? sanitize_text_field( $_POST['email_body_text_color'] ) : '',
				),
				'notification' => array(
					'win'  => isset( $_POST['result_win'] ) ? wp_kses_post( stripslashes( $_POST['result_win'] ) ) : "",
					'lost' => isset( $_POST['result_lost'] ) ? wp_kses_post( stripslashes( $_POST['result_lost'] ) ) : "",
				),
				'admin_email'  => array(
					'enable'  => "off"
				)
			),
			'ajax_endpoint'                     => isset( $_POST['ajax_endpoint'] ) ? sanitize_text_field( $_POST['ajax_endpoint'] ) : 'ajax',
			'custom_field_name_enable'          => isset( $_POST['custom_field_name_enable'] ) ? sanitize_text_field( $_POST['custom_field_name_enable'] ) : '',
			'custom_field_name_enable_mobile'   => isset( $_POST['custom_field_name_enable_mobile'] ) ? sanitize_text_field( $_POST['custom_field_name_enable_mobile'] ) : '',
			'custom_field_name_required'        => isset( $_POST['custom_field_name_required'] ) ? sanitize_text_field( $_POST['custom_field_name_required'] ) : '',
		);
		$this->updated_sucessfully = 1;
		$args = apply_filters( 'wplwl_update_settings_args', wp_parse_args( $args, get_option( '_wplwl_settings', $wp_lucky_wheel_settings ) ) );
		update_option( '_wplwl_settings', $args );
		$wp_lucky_wheel_settings = $args;
		$this->settings          = VI_WP_LUCKY_WHEEL_DATA::get_instance( true );
	}

	public function settings_page() {
		$tabs       = array(
			'general'   => esc_html__( 'General', 'wp-lucky-wheel' ),
			'popup'     => esc_html__( 'Pop-up', 'wp-lucky-wheel' ),
			'wheel'     => esc_html__( 'Wheel Settings', 'wp-lucky-wheel' ),
			'email'     => esc_html__( 'Email', 'wp-lucky-wheel' ),
			'email_api' => esc_html__( 'Email API', 'wp-lucky-wheel' ),
		);
		$tab_active = array_key_first( $tabs );
		?>
        <div class="wrap">
            <h2><?php esc_html_e( 'WordPress Lucky Wheel Settings', 'wp-lucky-wheel' ); ?></h2>
			<?php
			if ( $this->error  ) {
				printf( '<div id="message" class="error"><p><strong>%s</strong></p></div>', esc_html(  $this->error ) );
			}
			if ( $this->updated_sucessfully  ) {
				printf( '<div id="message" class="updated"><p><strong>%s</strong></p></div>', esc_html__( 'Your settings have been saved!', 'wp-lucky-wheel' ) );
			}
			?>
            <form method="POST" class="vi-ui small form">
				<?php wp_nonce_field( 'wplwl_settings_page_save', 'wplwl_nonce_field' ); ?>
                <div class="vi-ui top attached tabular menu">
					<?php
					foreach ( $tabs as $slug => $text ) {
						$active = $tab_active === $slug ? 'active' : '';
						printf( ' <div class="item %s" data-tab="%s">%s</div>', esc_attr( $active ), esc_attr( $slug ), esc_html( $text ) );
					}
					?>
                </div>
				<?php
				foreach ( $tabs as $slug => $text ) {
					$active = $tab_active === $slug ? ' active' : '';
					$method = str_replace( '-', '_', $slug ) . '_options';
					$fields = [];
					printf( '<div class="vi-ui bottom attached%s tab segment" data-tab="%s">', esc_attr( $active ), esc_attr( $slug ) );
					if ( method_exists( $this, $method ) ) {
						$fields = $this->$method();
					}
					$this->settings::villatheme_render_table_field( apply_filters( "wplwl_settings_fields", $fields, $slug ) );
					do_action( 'wplwl_settings_tab', $slug );
					printf( '</div>' );
				}
				?>
                <p class="wplwl-button-save-settings-container">
                    <button type="submit" class="vi-ui primary button labeled icon" name="submit"><i
                                class="icon save"></i><?php esc_html_e( 'Save', 'wp-lucky-wheel' ); ?></button>
                </p>
            </form>
        </div>
        <div class="wp-lucky-wheel-preview preview-html-hidden">
            <div class="wp-lucky-wheel-preview-overlay"></div>
            <div class="wp-lucky-wheel-preview-html">
                <canvas id="wplwl_canvas"></canvas>
                <canvas id="wplwl_canvas1"></canvas>
                <canvas id="wplwl_canvas2"></canvas>
            </div>
        </div>
		<?php
		do_action( 'villatheme_support_wp-lucky-wheel' );
	}

	public function general_options() {
		$args       = [
			'wplwl_enable'        => [
				'type'  => 'checkbox',
				'html'  => sprintf( '<div class="vi-ui toggle checkbox">
                                    <input type="checkbox" name="wplwl_enable" id="wplwl_enable" value="on" %s >
                                    <label></label>
                                </div>', $this->settings->get_params( 'general', 'enable' ) == 'on' ? ' checked' : '' ),
				'title' => esc_html__( 'Enable', 'wp-lucky-wheel' ),
			],
			'wplwl_enable_mobile' => [
				'type'  => 'checkbox',
				'html'  => sprintf( '<div class="vi-ui toggle checkbox">
                                    <input type="checkbox" name="wplwl_enable_mobile" id="wplwl_enable_mobile" %s>
                                    <label></label>
                                </div>', $this->settings->get_params( 'general', 'mobile' ) == 'on' ? ' checked' : '' ),
				'desc'  => esc_html__( 'Allow to display wheel for screen less than 760px', 'wp-lucky-wheel' ),
				'title' => esc_html__( 'Small screen', 'wp-lucky-wheel' ),
			],
			'ajax_endpoint'       => [
				'type'    => 'select',
				'value'   => $this->settings->get_params( 'ajax_endpoint' ),
				'options' => [
					'ajax'     => esc_html__( 'Ajax', 'wp-lucky-wheel' ),
					'rest_api' => esc_html__( 'Ajax endpoint', 'wp-lucky-wheel' ),
				],
				'title'   => esc_html__( 'Ajax endpoint', 'wp-lucky-wheel' ),
			],
			'wplwl_spin_num'      => [
				'type'  => 'input',
				'html'  => sprintf( '<input type="number" id="wplwl_spin_num" name="wplwl_spin_num" min="1"
                                       value="%s">', esc_attr( $this->settings->get_params( 'general', 'spin_num' ) ) ),
				'title' => esc_html__( 'The number of spins per email', 'wp-lucky-wheel' ),
			],
			'wplwl_delay'         => [
				'type'  => 'input',
				'title' => esc_html__( 'Gap between 2 spins', 'wp-lucky-wheel' ),
			],
			'choose_using_white_list'         => [
				'type'  => 'premium_option',
				'title' => esc_html__( 'Choose using white/black list', 'wp-lucky-wheel' ),
			],
			'reset_spins_interval'         => [
				'type'  => 'premium_option',
				'title' => esc_html__( 'Auto reset spins', 'wp-lucky-wheel' ),
				'desc' => esc_html__( 'Reset the total spins of every email to zero at a specific time', 'wp-lucky-wheel' ),
			],
		];
		$delay_unit = $this->settings->get_params( 'general', 'delay_unit' );
		ob_start();
		?>
        <div class="vi-ui right labeled fluid input">
            <input type="number" id="wplwl_delay" name="wplwl_delay"
                   min="0"
                   value="<?php echo esc_attr( $this->settings->get_params( 'general', 'delay' ) ); ?>">
            <select name="wplwl_delay_unit" class="vi-ui dropdown label">
                <option value="s" <?php selected( $delay_unit, 's' ) ?>>
					<?php esc_html_e( 'Seconds', 'wp-lucky-wheel' ); ?>
                </option>
                <option value="m" <?php selected( $delay_unit, 'm' ) ?>><?php esc_html_e( 'Minutes', 'wp-lucky-wheel' ); ?></option>
                <option value="h" <?php selected( $delay_unit, 'h' ) ?>><?php esc_html_e( 'Hours', 'wp-lucky-wheel' ); ?></option>
                <option value="d" <?php selected( $delay_unit, 'd' ) ?>><?php esc_html_e( 'Days', 'wp-lucky-wheel' ); ?></option>
            </select>
        </div>
        <p class="description"><?php esc_html_e( 'Gap time between 2 consecutive spins of an email', 'wp-lucky-wheel' ) ?></p>
		<?php
		$args['wplwl_delay']['html']   = ob_get_clean();
		$fields = [
			'section_start' => [],
			'section_end'   => [],
			'fields'        => $args,
		];
		$this->settings::villatheme_render_table_field( $fields );
		return '';
	}

	public function popup_options() {
		$notify_intent = $this->settings->get_params( 'notify', 'intent' );
		ob_start();
		?>
        <select name="notify_intent" class="vi-ui fluid dropdown">
            <option value="popup_icon" <?php selected( $notify_intent, 'popup_icon' ) ?>><?php esc_html_e( 'Popup icon', 'wp-lucky-wheel' ); ?></option>
            <option value="show_wheel" <?php selected( $notify_intent, 'show_wheel' ) ?>><?php esc_html_e( 'Automatically show wheel after initial time', 'wp-lucky-wheel' ); ?></option>
            <option value="on_scroll" disabled><?php esc_html_e( 'Show wheel after users scroll down a specific value - Premium version only', 'wp-lucky-wheel' ); ?></option>
            <option value="on_exit" disabled><?php esc_html_e( 'Show wheel when users move mouse over the top to close browser - Premium version only', 'wp-lucky-wheel' ); ?></option>
            <option value="random" disabled><?php esc_html_e( 'Random one of these above - Premium version only', 'wp-lucky-wheel' ); ?></option>
        </select>
		<?php
		$notify_intent_html = ob_get_clean();
		$time_on_close_unit = $this->settings->get_params( 'notify', 'time_on_close_unit' );
		ob_start();
		?>
        <div class="vi-ui right labeled fluid input">
            <input type="number" id="notify_time_on_close" name="notify_time_on_close"
                   min="0"
                   value="<?php echo esc_attr( $this->settings->get_params( 'notify', 'time_on_close' ) ); ?>">
            <select name="notify_time_on_close_unit" class="vi-ui label dropdown">
                <option value="m" <?php selected( $time_on_close_unit, 'm' ) ?>><?php esc_html_e( 'Minutes', 'wp-lucky-wheel' ); ?></option>
                <option value="h" <?php selected( $time_on_close_unit, 'h' ) ?>><?php esc_html_e( 'Hours', 'wp-lucky-wheel' ); ?></option>
                <option value="d" <?php selected( $time_on_close_unit, 'd' ) ?>><?php esc_html_e( 'Days', 'wp-lucky-wheel' ); ?></option>
            </select>
        </div>
		<?php
		$notify_time_on_close_html = ob_get_clean();
		$show_again_unit           = $this->settings->get_params( 'notify', 'show_again_unit' );
		ob_start();
		?>
        <div class="vi-ui right labeled fluid input">
            <input type="number" id="notify_show_again" name="notify_show_again"
                   min="0"
                   value="<?php echo esc_attr( $this->settings->get_params( 'notify', 'show_again' ) ); ?>">
            <select name="notify_show_again_unit" class="vi-ui label dropdown">
                <option value="s" <?php selected( $show_again_unit, 's' ) ?>><?php esc_html_e( 'Seconds', 'wp-lucky-wheel' ); ?></option>
                <option value="m" <?php selected( $show_again_unit, 'm' ) ?>><?php esc_html_e( 'Minutes', 'wp-lucky-wheel' ); ?></option>
                <option value="h" <?php selected( $show_again_unit, 'h' ) ?>><?php esc_html_e( 'Hours', 'wp-lucky-wheel' ); ?></option>
                <option value="d" <?php selected( $show_again_unit, 'd' ) ?>><?php esc_html_e( 'Days', 'wp-lucky-wheel' ); ?></option>
            </select>
        </div>
		<?php
		$notify_show_again_html = ob_get_clean();
		$args                   = [
			'notify_intent'        => [
				'title' => esc_html__( 'Action required to open the popup', 'wp-lucky-wheel' ),
				'html'  => $notify_intent_html,
			],
			'show_wheel'           => [
				'title' => esc_html__( 'Initial time', 'wp-lucky-wheel' ),
				'desc'  => esc_html__( 'Gap time before the popup icon appears after the action to trigger is done. This gap time is selected randomly within the range you add. Enter min,max time (seconds). For example: 1,2', 'wp-lucky-wheel' ),
				'html'  => sprintf( '<div class="vi-ui right labeled input">
                                    <input type="text" id="show_wheel" name="show_wheel"
                                           value="%s">
                                    <label class="vi-ui label">%s</label>
                                </div>', esc_attr( $this->settings->get_params( 'notify', 'show_wheel' ) ),
					esc_html__( 'Seconds', 'wp-lucky-wheel' ) ),
			],
			'notify_time_on_close' => [
				'title' => esc_html__( 'If the wheel is closed without a spin, show the popup again after', 'wp-lucky-wheel' ),
				'html'  => $notify_time_on_close_html,
			],
			'notify_show_again'    => [
				'title' => esc_html__( 'After one spin, show the popup again after', 'wp-lucky-wheel' ),
				'html'  => $notify_show_again_html,
			],
		];
		$fields                 = [
			'section_start' => [
				'accordion' => 1,
				'active'    => 1,
				'class'     => 'wplwl-popup-general-accordion',
				'title'     => esc_html__( 'Popup General', 'wp-lucky-wheel' ),
			],
			'section_end'   => [ 'accordion' => 1 ],
			'fields'        => $args,
		];
		$this->settings::villatheme_render_table_field( $fields );
		$notify_position = $this->settings->get_params( 'notify', 'position' );
		ob_start();
		?>
        <select name="notify_position" id="notify_position" class="vi-ui fluid dropdown">
            <option value="top-left" <?php selected( $notify_position, 'top-left' ) ?>><?php esc_html_e( 'Top Left', 'wp-lucky-wheel' ); ?></option>
            <option value="top-right" <?php selected( $notify_position, 'top-right' ) ?>><?php esc_html_e( 'Top Right', 'wp-lucky-wheel' ); ?></option>
            <option value="middle-left" <?php selected( $notify_position, 'middle-left' ) ?>><?php esc_html_e( 'Middle Left', 'wp-lucky-wheel' ); ?></option>
            <option value="middle-right" <?php selected( $notify_position, 'middle-right' ) ?>><?php esc_html_e( 'Middle Right', 'wp-lucky-wheel' ); ?></option>
            <option value="bottom-left" <?php selected( $notify_position, 'bottom-left' ) ?>><?php esc_html_e( 'Bottom Left', 'wp-lucky-wheel' ); ?></option>
            <option value="bottom-right" <?php selected( $notify_position, 'bottom-right' ) ?>><?php esc_html_e( 'Bottom Right', 'wp-lucky-wheel' ); ?></option>
        </select>
		<?php
		$notify_position_html = ob_get_clean();
		ob_start();
		?>
        <div class="vi-ui toggle checkbox">
            <input type="checkbox" name="notify_hide_popup"
                   id="notify_hide_popup" <?php checked( $this->settings->get_params( 'notify', 'hide_popup' ), 'on' ) ?>>
            <label for="notify_hide_popup"></label>
        </div>
		<?php
		$popup_icon_hide_html = ob_get_clean();
		$args                 = [
			'notify_position'   => [
				'title' => esc_html__( 'Popup icon position', 'wp-lucky-wheel' ),
				'desc'  => esc_html__( 'Position of the popup on screen', 'wp-lucky-wheel' ),
				'html'  => $notify_position_html,
			],
			'popup_icon'        => [
				'type'  => 'premium_option',
				'title' => esc_html__( 'Custom popup icon', 'wp-lucky-wheel' ),
			],
			'wheel_popup_icon_color'      => [
				'type'  => 'premium_option',
				'title' => esc_html__( 'Custom popup icon color', 'wp-lucky-wheel' ),
			],
			'wheel_popup_icon_bg_color'      => [
				'type'  => 'premium_option',
				'title' => esc_html__( 'Custom popup icon background color', 'wp-lucky-wheel' ),
			],
			'notify_hide_popup' => [
				'title' => esc_html__( 'Hide popup icon', 'wp-lucky-wheel' ),
				'desc'  => esc_html__( 'Enable to hide the popup icon after the user closes the wheel.', 'wp-lucky-wheel' ),
				'html'  => $popup_icon_hide_html,
			],
		];
		$fields               = [
			'section_start' => [
				'accordion' => 1,
				'class'     => 'wplwl-popup-icon-accordion',
				'title'     => esc_html__( 'Popup Icon', 'wp-lucky-wheel' ),
			],
			'section_end'   => [ 'accordion' => 1 ],
			'fields'        => $args,
		];
		$this->settings::villatheme_render_table_field( $fields );
		ob_start();
		?>
        <input type="text" name="notify_conditional_tags"
               placeholder="<?php esc_html_e( 'Ex: !is_page(array(123,41,20))', 'wp-lucky-wheel' ) ?>"
               id="notify_conditional_tags"
               value="<?php if ( $this->settings->get_params( 'notify', 'conditional_tags' ) ) {
			       echo esc_attr( htmlentities( $this->settings->get_params( 'notify', 'conditional_tags' ) ) );
		       } ?>">
        <p class="description"><?php esc_html_e( 'Let you control on which pages WordPress Lucky wheel icon appears using ', 'wp-lucky-wheel' ) ?>
            <a href="https://codex.wordpress.org/Conditional_Tags"><?php esc_html_e( 'WP\'s conditional tags', 'wp-lucky-wheel' ) ?></a>
        </p>
        <p class="description">
            <strong>*</strong><?php esc_html_e( '"Home page", "Blog page" options above must be disabled to run these conditional tags.', 'wp-lucky-wheel' ) ?>
        </p>
        <p class="description">
            <strong>***</strong><?php esc_html_e( 'Use exclamation mark(!) before a conditional to hide wheel if the conditional matched. e.g use ', 'wp-lucky-wheel' ); ?>
            <strong>!is_home()</strong><?php esc_html_e( ' to hide wheel on homepage', 'wp-lucky-wheel' ) ?>
        </p>
		<?php
		$notify_conditional_tags_html = ob_get_clean();
		$args                         = [
			'notify_frontpage_only'   => [
				'title' => esc_html__( 'Show only on Homepage', 'wp-lucky-wheel' ),
				'html'  => sprintf( '<div class="vi-ui toggle checkbox">
                                    <input type="checkbox" name="notify_frontpage_only"
                                           id="notify_frontpage_only" %s>
                                    <label></label>
                                </div>', $this->settings->get_params( 'notify', 'show_only_front' ) == 'on' ? ' checked' : '' ),
			],
			'notify_blogpage_only'    => [
				'title' => esc_html__( 'Show only on Blog page', 'wp-lucky-wheel' ),
				'html'  => sprintf( '<div class="vi-ui toggle checkbox">
                                    <input type="checkbox" name="notify_blogpage_only"
                                           id="notify_blogpage_only" %s>
                                    <label></label>
                                </div>', $this->settings->get_params( 'notify', 'show_only_blog' ) == 'on' ? ' checked' : '' ),
			],
			'notify_conditional_tags' => [
				'title' => esc_html__( 'Conditional tags', 'wp-lucky-wheel' ),
				'html'  => $notify_conditional_tags_html,
			],
		];
		$fields                       = [
			'section_start' => [
				'accordion' => 1,
				'class'     => 'wplwl-popup-assign-accordion',
				'title'     => esc_html__( 'Popup Assign', 'wp-lucky-wheel' ),
			],
			'section_end'   => [ 'accordion' => 1 ],
			'fields'        => $args,
		];
		$this->settings::villatheme_render_table_field( $fields );

		return '';
	}

	public function wheel_options() {
		$custom_fields = [
			'email'  => [
				'label'  => esc_html__( 'Email', 'wp-lucky-wheel' ),
				'enable' => 'premium_option',
			],
			'name'   => [
				'label'    => esc_html__( 'Name', 'wp-lucky-wheel' ),
				'enable'   => $this->settings->get_params( 'custom_field_name_enable' ),
				'mobile'   => $this->settings->get_params( 'custom_field_name_enable_mobile' ),
				'required' => $this->settings->get_params( 'custom_field_name_required' ),
			],
			'mobile' => [
				'label'    => esc_html__( 'Phone number', 'wp-lucky-wheel' ),
				'enable'   => 'premium_option',
				'mobile'   => 'premium_option',
				'required' => 'premium_option',
			],
		];
		ob_start();
		?>
        <table class="form-table">
            <tr>
                <th><?php esc_html_e( 'Field', 'wp-lucky-wheel' ); ?></th>
                <th><?php esc_html_e( 'Enable', 'wp-lucky-wheel' ); ?></th>
                <th><?php esc_html_e( 'On mobile', 'wp-lucky-wheel' ); ?></th>
                <th><?php esc_html_e( 'Required', 'wp-lucky-wheel' ); ?></th>
                <th><?php esc_html_e( 'Country code', 'wp-lucky-wheel' ); ?></th>
            </tr>
			<?php
			foreach ( $custom_fields as $field => $field_data ) {
				$field_name = "custom_field_{$field}_";
				?>
                <tr>
                    <th>
                        <label for="<?php echo esc_attr( $field_name . 'enable' ) ?>"><?php echo esc_html( $field_data['label'] ?? $field ) ?></label>
                    </th>
                    <?php
                    switch ($field){
                        case 'email':
	                        ?>
                            <td>
                                <?php
                                printf('<a class="vi-ui button" href="%s" target="_blank">%s</a>', 'https://1.envato.market/xDRb1',esc_html__( 'Unlock This Feature', 'wp-lucky-wheel' ));
                                ?>
                            </td>
                            <td>
                                <div class="vi-ui toggle checkbox">
                                    <input class="<?php echo esc_attr( $field_name . 'enable_mobile' ) ?>" type="checkbox"
                                           id="<?php echo esc_attr( $field_name . 'enable_mobile' ) ?>" name="<?php echo esc_attr( $field_name . 'enable_mobile' ) ?>"
                                           value="on" <?php if ( isset( $field_data['mobile'] ) ) {
				                        checked( $field_data['mobile'], 'on' );
			                        } else {
				                        echo esc_attr( 'disabled checked' );
			                        } ?>>
                                    <label></label>
                                </div>
                            </td>
                            <td>
                                <div class="vi-ui toggle checkbox">
                                    <input class="<?php echo esc_attr( $field_name . 'required' ) ?>" type="checkbox"
                                           id="<?php echo esc_attr( $field_name . 'required' ) ?>" name="<?php echo esc_attr( $field_name . 'required' ) ?>"
                                           value="on" <?php if ( isset( $field_data['required'] ) ) {
				                        checked( $field_data['required'], 'on' );
			                        } else {
				                        echo esc_attr( 'disabled checked' );
			                        } ?>>
                                    <label></label>
                                </div>
                            </td>
                            <td></td>
                        <?php
                            break;
                        case 'mobile':
	                        ?>
                            <td>
		                        <?php
		                        printf('<a class="vi-ui button" href="%s" target="_blank">%s</a>', 'https://1.envato.market/xDRb1',esc_html__( 'Unlock This Feature', 'wp-lucky-wheel' ));
		                        ?>
                            </td>
                            <td>
		                        <?php
		                        printf('<a class="vi-ui button" href="%s" target="_blank">%s</a>', 'https://1.envato.market/xDRb1',esc_html__( 'Unlock This Feature', 'wp-lucky-wheel' ));
		                        ?>
                            </td>
                            <td>
		                        <?php
		                        printf('<a class="vi-ui button" href="%s" target="_blank">%s</a>', 'https://1.envato.market/xDRb1',esc_html__( 'Unlock This Feature', 'wp-lucky-wheel' ));
		                        ?>
                            </td>
                            <td>
		                        <?php
		                        printf('<a class="vi-ui button" href="%s" target="_blank">%s</a>', 'https://1.envato.market/xDRb1',esc_html__( 'Unlock This Feature', 'wp-lucky-wheel' ));
		                        ?>
                            </td>
	                        <?php
                            break;
                        case 'name':
                            ?>
                            <td>
                                <div class="vi-ui toggle checkbox">
                                    <input class="<?php echo esc_attr( $field_name . 'enable' ) ?>" type="checkbox"
                                           id="<?php echo esc_attr( $field_name . 'enable' ) ?>" name="<?php echo esc_attr( $field_name . 'enable' ) ?>"
                                           value="on" <?php checked( $field_data['enable'] ?? '', 'on' ); ?>>
                                    <label></label>
                                </div>
                            </td>
                            <td>
                                <div class="vi-ui toggle checkbox">
                                    <input class="<?php echo esc_attr( $field_name . 'enable_mobile' ) ?>" type="checkbox"
                                           id="<?php echo esc_attr( $field_name . 'enable_mobile' ) ?>" name="<?php echo esc_attr( $field_name . 'enable_mobile' ) ?>"
                                           value="on" <?php if ( isset( $field_data['mobile'] ) ) {
				                        checked( $field_data['mobile'], 'on' );
			                        } else {
				                        echo esc_attr( 'disabled checked' );
			                        } ?>>
                                    <label></label>
                                </div>
                            </td>
                            <td>
                                <div class="vi-ui toggle checkbox">
                                    <input class="<?php echo esc_attr( $field_name . 'required' ) ?>" type="checkbox"
                                           id="<?php echo esc_attr( $field_name . 'required' ) ?>" name="<?php echo esc_attr( $field_name . 'required' ) ?>"
                                           value="on" <?php if ( isset( $field_data['required'] ) ) {
				                        checked( $field_data['required'], 'on' );
			                        } else {
				                        echo esc_attr( 'disabled checked' );
			                        } ?>>
                                    <label></label>
                                </div>
                            </td>
                            <td></td>
                            <?php
                            break;
                    }
                    ?>
                </tr>
				<?php
			}
			?>
        </table>
		<?php
		$wheel_fields_html = ob_get_clean();
		$fields            = [
			'section_start' => [
				'accordion' => 1,
				'class'     => 'wplwl-wheel-fields-accordion',
				'title'     => esc_html__( 'Wheel fields', 'wp-lucky-wheel' ),
			],
			'section_end'   => [ 'accordion' => 1 ],
			'fields_html'   => $wheel_fields_html,
		];
		$this->settings::villatheme_render_table_field( $fields );
		ob_start();
		?>
        <span class="vi-ui positive button preview-lucky-wheel"><?php esc_html_e( 'Preview Wheel', 'wp-lucky-wheel' ); ?></span>
        <div class="vi-ui message positive tiny">
            <ul class="list">
                <li>
                    <?php
                    echo wp_kses_post(__('You can use <a href="https://1.envato.market/kj3VaN" target="_blank">9MAIL – WordPress Email Templates Designer</a> to create and customize your own email template for each prize. If no email template is selected, the default setting at <a href="#email">the \'Email\' tab</a> will be used.','wp-lucky-wheel'));
                    ?>
                </li>
				<?php
				if ( VI_WP_LUCKY_WHEEL_PLUGINS_9mail::$is_active ) {
					?>
                    <li>
                        <a href="edit.php?post_type=emtmpl"
                           target="_blank"><?php esc_html_e( 'View all Email templates', 'wp-lucky-wheel' ) ?></a>
						<?php esc_html_e( 'or', 'wp-lucky-wheel' ) ?>
                        <a href="post-new.php?post_type=emtmpl&sample=wplwl_coupon_email&style=basic"
                           target="_blank"><?php esc_html_e( 'Create a new email template', 'wp-lucky-wheel' ) ?></a>
                    </li>
                    <li>
						<?php printf( esc_html( 'Important note: The custom email template must be assigned to each index (wheel segment). Otherwise, notification for that segment will use the default generic email instead. For more info, please see this %s.' ), '<a href="https://docs.villatheme.com/woocommerce-email-template-customizer/#configuration_child_menu_4818">documentation</a>' ); ?>
                    </li>
					<?php
				}
				?>
            </ul>
        </div>
        <?php
		$fields     = [
			'section_start' => [],
			'section_end'   => [],
			'fields'   => [
                   'quantity_label' =>[
                           'title' => esc_html__( '{quantity_label}', 'wp-lucky-wheel' ),
                           'desc' => esc_html__( '{prize_quantity} - The quantity of respective prize', 'wp-lucky-wheel' ),
                           'html' => sprintf('<input type="text" class="quantity_label" id="quantity_label" name="quantity_label"
                           value="%s">',esc_attr( $this->settings->get_params( 'wheel', 'quantity_label' ) )),
                   ]
            ],
		];
		$this->settings::villatheme_render_table_field( $fields );
        ?>
        <div class="wheel-settings-container">
            <table class="vi-ui celled table wheel-settings" style="margin-top: 0;">
                <thead>
                <tr class="wheel-slices">
                    <th width="1%" class="wheel-index-th"><?php esc_html_e( 'Index', 'wp-lucky-wheel' ) ?></th>
                    <th><?php esc_html_e( 'Prize Type', 'wp-lucky-wheel' ) ?></th>
                    <th><?php esc_html_e( 'Label', 'wp-lucky-wheel' ) ?></th>
                    <th><?php esc_html_e( 'Value', 'wp-lucky-wheel' ) ?></th>
                    <th><?php esc_html_e( 'Probability(%s)', 'wp-lucky-wheel' ) ?></th>
                    <th><?php esc_html_e( 'Color', 'wp-lucky-wheel' ) ?></th>
                    <th><?php esc_html_e( 'Text Color', 'wp-lucky-wheel' ) ?></th>
                    <?php do_action('wplwl_wheel_settings_slices_column'); ?>
                </tr>
                </thead>
                <tbody class="ui-sortable">
				<?php
				$coupon_type         = $this->settings->get_params( 'wheel', 'prize_type' );
				$probability         = $this->settings->get_params( 'wheel', 'probability' );
				$custom_value        = $this->settings->get_params( 'wheel', 'custom_value' );
				$custom_label        = $this->settings->get_params( 'wheel', 'custom_label' );
				$slices_text_color   = $this->settings->get_params( 'wheel', 'slices_text_color' );
				$bg_color            = $this->settings->get_params( 'wheel', 'bg_color' );
                if (!is_array($coupon_type)){
                    $coupon_type = [];
                }
				$coupon_count        = count( $coupon_type );
				for ( $count = 0; $count < $coupon_count; $count ++ ) {
					?>
                    <tr class="wheel_col <?php echo esc_attr( "wheel_col-{$coupon_type[ $count ]}" ); ?>">
                        <td class="wheel_col_index" width="1%">
                            <span class="wheel-col-index"><?php echo esc_attr( $count + 1 ); ?></span>
                        </td>
                        <td class="wheel_col_coupons">
                            <select name="prize_type[]" class="coupons_select vi-ui fluid dropdown">
                                <option value="non" <?php selected( $coupon_type[ $count ], 'non' ); ?>><?php esc_html_e( 'Non', 'wp-lucky-wheel' ) ?></option>
                                <option value="custom" <?php selected( $coupon_type[ $count ], 'custom' ); ?>><?php esc_html_e( 'Custom', 'wp-lucky-wheel' ) ?></option>
                            </select>
                        </td>
                        <td class="wheel_col_coupons_label">
                            <?php
                            $fields     = [
	                            'fields'   => [
		                            'custom_type_label' =>[
			                            'not_wrap_html' => 1,
			                            'wheel_slide_index' => $count,
			                            'html' => sprintf('<input type="text" name="custom_type_label[]" class="custom_type_label" value="%s" placeholder="Label">',
                                            esc_attr( $custom_label[ $count ] )),
		                            ]
	                            ],
                            ];
                            $this->settings::villatheme_render_table_field( $fields );
                            ?>
                        </td>
                        <td class="wheel_col_coupons_value">
                            <input type="text" name="custom_type_value[]" class="custom_type_value"
                                   value="<?php echo esc_attr( isset( $custom_value[ $count ] ) ? $custom_value[ $count ] : '' ); ?>"
                                   placeholder="Value/Code">
                        </td>
                        <td class="wheel_col_probability">
                            <input type="number" name="probability[]"
                                   class="probability probability_<?php echo esc_attr( $count ); ?>" min="0"
                                   placeholder="Probability"
                                   value="<?php echo esc_attr( absint( $probability[ $count ] ?? 0 ) ); ?>">
                        </td>
                        <td>
                            <input type="text" name="bg_color[]" class="color-picker"
                                   value=" <?php echo esc_attr( trim( $bg_color[ $count ]??'' ) ); ?>"
                                   style="background: <?php echo esc_attr( trim( $bg_color[ $count ] ) ); ?>">
                        </td>
                        <td class="remove_field_wrap">
                            <input type="text" name="slices_text_color[]"
                                   class="color-picker"
                                   value="<?php echo esc_attr( isset( $slices_text_color[ $count ] ) ? trim( $slices_text_color[ $count ] ) : '' ); ?>"
                                   style="background:<?php echo esc_attr( isset( $slices_text_color[ $count ] ) ? trim( $slices_text_color[ $count ] ) : '' ); ?>">
                            <span class="remove_field negative vi-ui button"><?php esc_html_e( 'Remove', 'wp-lucky-wheel' ); ?></span>
                            <span class="clone_piece positive vi-ui button"><?php esc_html_e( 'Clone', 'wp-lucky-wheel' ); ?></span>
                        </td>
                        <?php do_action('wplwl_wheel_settings_slices_column_content',$count); ?>
                    </tr>
					<?php
				}
				?>
                </tbody>
                <tfoot>
                <tr>
                    <th class="col_add_new" colspan="4">
                        <i><?php esc_html_e( 'You can drag and drop slices to rearrange them.', 'wp-lucky-wheel' ); ?></i>
                    </th>
                    <th class="col_add_new col_total_probability">
                        <i><?php esc_html_e( '*The total Probability: ', 'wp-lucky-wheel' ); ?>
                            <strong class="total_probability" data-total_probability=""> 100 </strong> (
                            % )</i>
                    </th>
                    <th class="col_add_new" colspan="2">
						<?php
						self::auto_color();
						?>
                        <p>
                            <span class="auto_color positive vi-ui button tiny"><?php esc_html_e( 'Auto Color', 'wp-lucky-wheel' ) ?></span>
                        </p>
                        <div class="vi-ui toggle checkbox">
                            <input class="random_color" type="checkbox" id="random_color"
                                   name="random_color"
                                   value="on" <?php checked( $this->settings->get_params( 'wheel', 'random_color' ), 'on' ) ?>>
                            <label><?php esc_html_e( 'Random color', 'wp-lucky-wheel' ) ?></label>
                        </div>
                        <p class="description"><?php esc_html_e( 'Color is set randomly from predefined sets for each visitor', 'wp-lucky-wheel' ) ?></p>
                    </th>
                </tr>
                </tfoot>
            </table>
        </div>
		<?php
		$wheel_html = ob_get_clean();
		$fields     = [
			'section_start' => [
				'accordion' => 1,
				'active'    => 1,
				'class'     => 'wplwl-wheel-slide-accordion',
				'title'     => esc_html__( 'Wheel Slides', 'wp-lucky-wheel' ),
			],
			'section_end'   => [ 'accordion' => 1 ],
			'fields_html'   => $wheel_html,
		];
		$this->settings::villatheme_render_table_field( $fields );
        $congratulations_effect = $this->settings->get_params( 'wheel_wrap', 'congratulations_effect' );
        ob_start();
        ?>
        <table class="form-table">
            <tbody>
            <tr>
                <th>
                    <label for="result_win"><?php esc_html_e( 'Automatically hide wheel after', 'wp-lucky-wheel' ) ?></label>
                </th>
                <td>
                    <div class="vi-ui right labeled input">
                        <input type="number" name="result-auto_close" min="0"
                               id="result-auto_close"
                               value="<?php echo intval( $this->settings->get_params( 'result', 'auto_close' ) ) ?>">
                        <label class="vi-ui label"><?php esc_html_e( 'Seconds', 'wp-lucky-wheel' ) ?></label>
                    </div>
                    <p class="description"><?php esc_html_e( 'Left 0 to disable this feature', 'wp-lucky-wheel' ); ?></p>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="congratulations_effect"><?php esc_html_e( 'Winning effect', 'wp-lucky-wheel' ); ?></label>
                </th>
                <td>
                    <a class="vi-ui button" target="_blank"
                       href="https://1.envato.market/xDRb1"><?php esc_html_e( 'Upgrade This Feature', 'wp-lucky-wheel' ) ?></a>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="result_win"><?php esc_html_e( 'Message if win', 'wp-lucky-wheel' ) ?></label>
                </th>
                <td>
					<?php
					$win_option = array( 'editor_height' => 300, 'media_buttons' => true );
					ob_start();
					wp_editor( stripslashes( $this->settings->get_params( 'result', 'notification' )['win']??'' ), 'result_win', $win_option );
					$result_win_html = ob_get_clean();
					$fields     = [
						'fields'   => [
							'result_win' =>[
								'not_wrap_html' => 1,
								'result_win_option' => $win_option,
								'html' => $result_win_html,
							]
						],
					];
					$this->settings::villatheme_render_table_field( $fields );
					?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <ul>
                        <li>{prize_label}
                            - <?php esc_html_e( 'Label of prize that customers win', 'wp-lucky-wheel' ) ?></li>
                        <li>{customer_name}
                            - <?php esc_html_e( 'Customers\'name if they enter', 'wp-lucky-wheel' ) ?></li>
                        <li>{customer_email}
                            - <?php esc_html_e( 'Email that customers enter to spin', 'wp-lucky-wheel' ) ?></li>
                        <li>{prize_value}
                            - <?php esc_html_e( 'Prize value will be sent to customer.', 'wp-lucky-wheel' ) ?></li>
                        <li>{today}
                            - <?php esc_html_e( 'Current date', 'wp-lucky-wheel' ) ?></li>
                    </ul>
                </td>
            </tr>

            <tr>
                <th>
                    <label for="result_lost"><?php esc_html_e( 'Frontend message if lost', 'wp-lucky-wheel' ) ?></label>
                </th>
                <td>
					<?php
					$lost_option = array( 'editor_height' => 300, 'media_buttons' => true );
					ob_start();
					wp_editor( stripslashes( $this->settings->get_params( 'result', 'notification' )['lost'] ??''), 'result_lost', $lost_option );
					$result_win_html = ob_get_clean();
					$fields     = [
						'fields'   => [
							'result_lost' =>[
								'not_wrap_html' => 1,
								'result_lost_option' => $lost_option,
								'html' => $result_win_html,
							]
						],
					];
					$this->settings::villatheme_render_table_field( $fields );
					?>
                </td>
            </tr>
            </tbody>
        </table>
        <?php
		$wheel_html = ob_get_clean();
		$fields     = [
			'section_start' => [
				'accordion' => 1,
				'class'     => 'wplwl-wheel-after-finishing-spinning-accordion',
				'title'     => esc_html__( 'After Finishing Spinning', 'wp-lucky-wheel' ),
			],
			'section_end'   => [ 'accordion' => 1 ],
			'fields_html'   => $wheel_html,
		];
		$this->settings::villatheme_render_table_field( $fields );
		ob_start();
        ?>
        <table class="form-table wheel-settings">
            <tbody class="content">
            <tr>
                <th>
                    <label for="show_full_wheel"><?php esc_html_e( 'Show full wheel', 'wp-lucky-wheel' ) ?></label>
                </th>
                <td>
                    <div class="vi-ui toggle checkbox">
                        <input class="show_full_wheel" type="checkbox" id="show_full_wheel"
                               name="show_full_wheel"
                               value="on" <?php checked( $this->settings->get_params( 'wheel', 'show_full_wheel' ), 'on' ) ?>>
                        <label></label>
                    </div>
                    <p class="description"><?php esc_html_e( 'Make all wheel segments visible on desktop. By default, the wheel on desktop shows partially. Enable this option to to make it show fully.', 'wp-lucky-wheel' ) ?></p>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="wheel_speed"><?php esc_html_e( 'Wheel spin', 'wp-lucky-wheel' ); ?></label>
                </th>
                <td>
                    <div class="equal width fields">
                        <div class="field">
                            <div class="vi-ui right labeled input">
                                <select name="wheel_speed" id="wheel_speed" class="vi-ui fluid dropdown">
						            <?php
						            for ( $i = 1; $i <= 10; $i ++ ) {
                                        $tmp_name = $i;
                                        if ($i !== 5){
                                            $selected = 'disabled';
                                            $tmp_name = $i . esc_html__(' - Premium version only', 'wp-lucky-wheel');
                                        }else{
                                            $selected= 'selected';
                                        }
							            ?>
                                        <option value="<?php echo esc_attr( $i ) ?>" <?php echo esc_attr($selected); ?>>
								            <?php echo esc_html( $tmp_name ); ?>
                                        </option>
							            <?php
						            }
						            ?>
                                </select>
                            </div>
                            <p class="description"><?php esc_html_e( 'The number of spins per one second. For example, if you select 10, it means the wheel spins 10 rolls in one second', 'wp-lucky-wheel' ) ?></p>
                        </div>
                        <div class="field">
                            <a class="vi-ui button" target="_blank"
                               href="https://1.envato.market/xDRb1"><?php esc_html_e( 'Upgrade This Feature', 'wp-lucky-wheel' ) ?></a>
                            <p class="description"><?php esc_html_e( 'How long the wheel will spin. Valid duration from 3 to 15 seconds', 'wp-lucky-wheel' ); ?></p>
                        </div>
                    </div></td>
            </tr>
            <tr>
                <th>
                    <label for="font_size"><?php esc_html_e( 'Adjust size', 'wp-lucky-wheel' ) ?></label>
                </th>
                <td>
                    <div class="equal width fields">
                        <div class="field">
                            <a class="vi-ui button" target="_blank"
                               href="https://1.envato.market/xDRb1"><?php esc_html_e( 'Upgrade This Feature', 'wp-lucky-wheel' ) ?></a>
                            <p class="description"><?php esc_html_e( 'Adjust font size of text on the wheel by(%)', 'wp-lucky-wheel' ) ?></p>
                        </div>
                        <div class="field">
                            <a class="vi-ui button" target="_blank"
                               href="https://1.envato.market/xDRb1"><?php esc_html_e( 'Upgrade This Feature', 'wp-lucky-wheel' ) ?></a>
                            <p class="description"><?php esc_html_e( 'Adjust the size of the wheel by(%)', 'wp-lucky-wheel' ) ?></p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="pointer_position"><?php esc_html_e( 'Wheel pointer', 'wp-lucky-wheel' ); ?></label>
                </th>
                <td>
                    <div class="equal width fields">
                        <div class="field">
                            <select name="pointer_position" id="pointer_position" class="vi-ui fluid dropdown">
                                <option value="center" selected><?php esc_html_e( 'Center', 'wp-lucky-wheel' ); ?></option>
                                <option value="top" disabled><?php esc_html_e( 'Top - Premium version only', 'wp-lucky-wheel' ); ?></option>
                                <option value="right" disabled><?php esc_html_e( 'Right - Premium version only', 'wp-lucky-wheel' ); ?></option>
                                <option value="bottom" disabled><?php esc_html_e( 'Bottom - Premium version only', 'wp-lucky-wheel' ); ?></option>
                                <option value="random" disabled><?php esc_html_e( 'Random - Premium version only', 'wp-lucky-wheel' ); ?></option>
                            </select>
                            <p class="description"><?php esc_html_e( 'Wheel pointer position', 'wp-lucky-wheel' ); ?></p>
                        </div>
                        <div class="field">
                            <input name="pointer_color" id="pointer_color" type="text"
                                   class="color-picker"
                                   value="<?php if ( $this->settings->get_params( 'wheel_wrap', 'pointer_color' ) ) {
		                               echo esc_attr( $this->settings->get_params( 'wheel_wrap', 'pointer_color' ) );
	                               } ?>"
                                   style="background-color: <?php if ( $this->settings->get_params( 'wheel_wrap', 'pointer_color' ) ) {
		                               echo esc_attr( $this->settings->get_params( 'wheel_wrap', 'pointer_color' ) );
	                               } ?>;">
                            <p class="description"><?php esc_html_e( 'Wheel pointer color', 'wp-lucky-wheel' ); ?></p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="wplwl-center-image1"><?php esc_html_e( 'Wheel center background image', 'wp-lucky-wheel' ); ?></label>
                </th>
                <td id="wplwl-bg-image1">
                    <a class="vi-ui button" target="_blank"
                       href="https://1.envato.market/xDRb1"><?php esc_html_e( 'Upgrade This Feature', 'wp-lucky-wheel' ) ?></a>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="wheel_border_color"><?php esc_html_e( 'Color', 'wp-lucky-wheel' ); ?></label>
                </th>
                <td>
                    <div class="equal width fields">
                        <div class="field">
                            <input name="wheel_center_color" id="wheel_center_color" type="text"
                                   class="color-picker"
                                   value="<?php if ( $this->settings->get_params( 'wheel_wrap', 'wheel_center_color' ) ) {
		                               echo esc_attr( $this->settings->get_params( 'wheel_wrap', 'wheel_center_color' ) );
	                               } ?>"
                                   style="background-color: <?php if ( $this->settings->get_params( 'wheel_wrap', 'wheel_center_color' ) ) {
		                               echo esc_attr( $this->settings->get_params( 'wheel_wrap', 'wheel_center_color' ) );
	                               } ?>;">
                            <p class="description"><?php esc_html_e( 'Wheel center color', 'wp-lucky-wheel' ); ?></p>
                        </div>
                        <div class="field">
                            <a class="vi-ui button" target="_blank"
                               href="https://1.envato.market/xDRb1"><?php esc_html_e( 'Upgrade This Feature', 'wp-lucky-wheel' ) ?></a>
                            <p class="description"><?php esc_html_e( 'Wheel border color', 'wp-lucky-wheel' ); ?></p>
                        </div>
                        <div class="field">
                            <a class="vi-ui button" target="_blank"
                               href="https://1.envato.market/xDRb1"><?php esc_html_e( 'Upgrade This Feature', 'wp-lucky-wheel' ) ?></a>
                            <p class="description"><?php esc_html_e( 'Wheel border dot color', 'wp-lucky-wheel' ); ?></p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="wheel_wrap_bg_image"><?php esc_html_e( 'Background image', 'wp-lucky-wheel' ); ?></label>
                </th>
                <td id="wplwl-bg-image">
		            <?php
		            $bg_image = $this->settings->get_params( 'wheel_wrap', 'bg_image' );
		            $bg_image_url = $bg_image && intval( $bg_image ) ? wp_get_attachment_url( $bg_image ) : $bg_image;
		            $use_bg_image_default = $bg_image_url === VI_WP_LUCKY_WHEEL_IMAGES . '2020.png';
                    ?>
                    <select name="wheel_wrap_bg_image_type" class="vi-ui fluid dropdown wheel_wrap_bg_image_type">
                        <option value="0" <?php selected($use_bg_image_default) ?>><?php esc_html_e('Default','wp-lucky-wheel') ?></option>
                        <option value="1" <?php selected($use_bg_image_default,false) ?>><?php esc_html_e('Custom image','wp-lucky-wheel') ?></option>
                    </select>
                    <div class="wheel_wrap_bg_image_custom">
                        <div class="wplwl-image-container">
                            <input class="wheel_wrap_bg_image" name="wheel_wrap_bg_image"
                                   type="hidden"
                                   value="<?php echo esc_attr( $bg_image ); ?>">
                            <img style="border: 1px solid;width: 300px;" class="review-images"
                                 src="<?php echo esc_url( $bg_image_url ); ?>">
                            <span class="wplwl-remove-image negative vi-ui button"><?php esc_html_e( 'Remove', 'wp-lucky-wheel' ); ?></span>
                        </div>
                        <span class="positive vi-ui button wplwl-upload-custom-img"><?php esc_html_e( 'Add Image', 'wp-lucky-wheel' ); ?></span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="wheel_wrap_bg_color"><?php esc_html_e( 'Background color', 'wp-lucky-wheel' ); ?></label>
                </th>
                <td>
                    <input name="wheel_wrap_bg_color" id="wheel_wrap_bg_color" type="text"
                           class="color-picker"
                           value="<?php if ( $this->settings->get_params( 'wheel_wrap', 'bg_color' ) ) {
			                   echo esc_attr( $this->settings->get_params( 'wheel_wrap', 'bg_color' ) );
		                   } ?>"
                           style="background: <?php if ( $this->settings->get_params( 'wheel_wrap', 'bg_color' ) ) {
			                   echo esc_attr( $this->settings->get_params( 'wheel_wrap', 'bg_color' ) );
		                   } ?>;">
                </td>
            </tr>
            <tr>
                <th>
                    <label for="wheel_wrap_text_color"><?php esc_html_e( 'Text color', 'wp-lucky-wheel' ); ?></label>
                </th>
                <td>
                    <input name="wheel_wrap_text_color" id="wheel_wrap_text_color" type="text"
                           class="color-picker"
                           value="<?php if ( $this->settings->get_params( 'wheel_wrap', 'text_color' ) ) {
			                   echo esc_attr( $this->settings->get_params( 'wheel_wrap', 'text_color' ) );
		                   } ?>"
                           style="background: <?php if ( $this->settings->get_params( 'wheel_wrap', 'text_color' ) ) {
			                   echo esc_attr( $this->settings->get_params( 'wheel_wrap', 'text_color' ) );
		                   } ?>;">
                </td>
            </tr>
            <tr>
                <th>
                    <label for="wheel_wrap_description"><?php esc_html_e( 'Wheel description', 'wp-lucky-wheel' ); ?>
                    </label>
                </th>
                <td>
	                <?php
	                $desc_option = array( 'editor_height' => 300, 'media_buttons' => true );
                    ob_start();
	                wp_editor( stripslashes( $this->settings->get_params( 'wheel_wrap', 'description' ) ), 'wheel_wrap_description', $desc_option );
                    $wheel_wrap_description_html = ob_get_clean();
	                $fields     = [
		                'fields'   => [
			                'wheel_wrap_description' =>[
				                'not_wrap_html' => 1,
				                'wheel_desc_option' => $desc_option,
				                'html' => $wheel_wrap_description_html,
			                ]
		                ],
	                ];
	                $this->settings::villatheme_render_table_field( $fields );
	                ?>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="wheel_wrap_spin_button"><?php esc_html_e( 'Spin Wheel button', 'wp-lucky-wheel' ); ?></label>
                </th>
                <td>
	                <?php
	                ob_start();
	                ?>
                    <input type="text" name="wheel_wrap_spin_button" id="wheel_wrap_spin_button"
                           value="<?php if ( $this->settings->get_params( 'wheel_wrap', 'spin_button' ) ) {
		                       echo esc_attr( $this->settings->get_params( 'wheel_wrap', 'spin_button' ) );
	                       } ?>">
	                <?php
                    $wheel_wrap_spin_button_html = ob_get_clean();
	                $fields     = [
		                'fields'   => [
			                'wheel_wrap_spin_button' =>[
				                'not_wrap_html' => 1,
				                'html' => $wheel_wrap_spin_button_html,
			                ]
		                ],
	                ];
	                $this->settings::villatheme_render_table_field( $fields );
	                ?>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="wheel_wrap_spin_button_color"><?php esc_html_e( 'Spin Wheel button color', 'wp-lucky-wheel' ); ?></label>
                </th>
                <td>
                    <input type="text" class="color-picker" name="wheel_wrap_spin_button_color"
                           id="wheel_wrap_spin_button_color"
                           value="<?php if ( $this->settings->get_params( 'wheel_wrap', 'spin_button_color' ) ) {
			                   echo esc_attr( $this->settings->get_params( 'wheel_wrap', 'spin_button_color' ) );
		                   } ?>"
                           style="background-color:<?php if ( $this->settings->get_params( 'wheel_wrap', 'spin_button_color' ) ) {
			                   echo esc_attr( $this->settings->get_params( 'wheel_wrap', 'spin_button_color' ) );
		                   } ?>;">
                </td>
            </tr>
            <tr>
                <th>
                    <label for="wheel_wrap_spin_button_bg_color"><?php esc_html_e( 'Spin Wheel button background color', 'wp-lucky-wheel' ); ?></label>
                </th>
                <td>
                    <input type="text" class="color-picker" name="wheel_wrap_spin_button_bg_color"
                           id="wheel_wrap_spin_button_bg_color"
                           value="<?php if ( $this->settings->get_params( 'wheel_wrap', 'spin_button_bg_color' ) ) {
			                   echo esc_attr( $this->settings->get_params( 'wheel_wrap', 'spin_button_bg_color' ) );
		                   } ?>"
                           style="background-color:<?php if ( $this->settings->get_params( 'wheel_wrap', 'spin_button_bg_color' ) ) {
			                   echo esc_attr( $this->settings->get_params( 'wheel_wrap', 'spin_button_bg_color' ) );
		                   } ?>;">
                </td>
            </tr>
            <tr>
                <th>
                    <label for="gdpr_policy"><?php esc_html_e( 'GDPR checkbox', 'wp-lucky-wheel' ) ?></label>
                </th>
                <td>
                    <div class="vi-ui toggle checkbox">
                        <input class="gdpr_policy" type="checkbox" id="gdpr_policy"
                               name="gdpr_policy"
                               value="on" <?php checked( $this->settings->get_params( 'wheel_wrap', 'gdpr' ), 'on' ) ?>>
                        <label></label>
                    </div>
                </td>
            </tr>
            <tr class="wplwl-gdpr_policy-class">
                <th>
                    <label for="gdpr_message"><?php esc_html_e( 'GDPR message', 'wp-lucky-wheel' ) ?></label>
                </th>
                <td>
		            <?php
		            $desc_option = array( 'editor_height' => 200, 'media_buttons' => false );
		            ob_start();
		            wp_editor( stripslashes( $this->settings->get_params( 'wheel_wrap', 'gdpr_message' ) ), 'gdpr_message', $desc_option );
		            $wheel_wrap_description_html = ob_get_clean();
		            $fields     = [
			            'fields'   => [
				            'gdpr_message' =>[
					            'not_wrap_html' => 1,
					            'gdpr_message_option' => $desc_option,
					            'html' => $wheel_wrap_description_html,
				            ]
			            ],
		            ];
		            $this->settings::villatheme_render_table_field( $fields );
		            ?>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="vi-ui message positive tiny">
            <p><?php esc_html_e('The options below will be specifically reserved for the popup.','wp-lucky-wheel' ); ?></p>
        </div>
        <table class="form-table">
            <tbody>
            <tr>
                <th>
                    <label for="background_effect"><?php esc_html_e( 'Background effect', 'wp-lucky-wheel' ); ?></label>
                </th>
                <td>
                    <a class="vi-ui button" target="_blank"
                       href="https://1.envato.market/xDRb1"><?php esc_html_e( 'Upgrade This Feature', 'wp-lucky-wheel' ) ?></a>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="wheel_wrap_close_option"><?php esc_html_e( 'Not display wheel again', 'wp-lucky-wheel' ); ?></label>
                </th>
                <td>
                    <div class="vi-ui toggle checkbox">
                        <input type="checkbox" name="wheel_wrap_close_option"
                               id="wheel_wrap_close_option" <?php checked( $this->settings->get_params( 'wheel_wrap', 'close_option' ), 'on' ) ?>>
                        <label></label>
                    </div>
                    <p class="description"><?php esc_html_e( 'Show text option to not display wheel again', 'wp-lucky-wheel' ) ?></p>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="wplwl-google-font-select"><?php esc_html_e( 'Select font', 'wp-lucky-wheel' ); ?></label>
                </th>
                <td>

                    <input type="text" name="wplwl_google_font_select"
                           id="wplwl-google-font-select"
                           value="<?php echo esc_attr( $this->settings->get_params( 'wheel_wrap', 'font' ) ) ?>"><span
                            class="wplwl-google-font-select-remove wplwl-cancel"
                            style="<?php if ( ! $this->settings->get_params( 'wheel_wrap', 'font' ) ) {
					            echo 'display:none';
				            } ?>"></span>

                </td>
            </tr>
            <tr>
                <th>
                    <label for="custom_css"><?php esc_html_e( 'Custom css', 'wp-lucky-wheel' ) ?></label>
                </th>
                <td>
                    <textarea name="custom_css"><?php echo wp_kses_post( $this->settings->get_params( 'wheel_wrap', 'custom_css' ) ) ?></textarea>
                </td>
            </tr>
            </tbody>
        </table>
        <?php
		$wheel_html = ob_get_clean();
		$fields = [
			'section_start' => [
				'accordion' => 1,
				'class'     => 'wplwl-wheel-design-accordion',
				'title'     => esc_html__( 'Wheel Design', 'wp-lucky-wheel' ),
			],
			'section_end'   => [ 'accordion' => 1 ],
			'fields_html'   => $wheel_html,
		];
		$this->settings::villatheme_render_table_field( $fields );
        ob_start();
        ?>
        <table class="form-table">
            <tbody>
            <tr>
                <th>
                    <label for=""><?php esc_html_e( 'Enable', 'wp-lucky-wheel' ) ?></label>
                </th>
                <td>
                    <a class="vi-ui button" target="_blank"
                       href="https://1.envato.market/xDRb1"><?php esc_html_e( 'Upgrade This Feature', 'wp-lucky-wheel' ) ?></a>
                    <p class="description"><?php esc_html_e( 'Turn on to use Google ReCaptcha', 'wp-lucky-wheel' ) ?></p>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="wplwl_recaptcha_version"><?php esc_html_e( 'Version', 'wp-lucky-wheel' ) ?></label>
                </th>
                <td>
                    <a class="vi-ui button" target="_blank"
                       href="https://1.envato.market/xDRb1"><?php esc_html_e( 'Upgrade This Feature', 'wp-lucky-wheel' ) ?></a>
                </td>
            </tr>
            <tr>
                <th>
                    <label for=""><?php esc_html_e( 'Guide', 'wp-lucky-wheel' ) ?></label>
                </th>
                <td>
                    <div>
                        <strong class="wplwl-recaptcha-v2-wrap"
                                style="<?php echo esc_attr( $this->settings->get_params( 'wplwl_recaptcha_version' ) == 2 ? '' : 'display:none;' ); ?>">
							<?php esc_html_e( 'Get Google reCAPTCHA V2 Site and Secret key', 'wp-lucky-wheel' ) ?>
                        </strong>
                        <strong class="wplwl-recaptcha-v3-wrap"
                                style="<?php echo esc_attr( $this->settings->get_params( 'wplwl_recaptcha_version' ) == 3 ? '' : 'display:none;' ); ?>">
							<?php esc_html_e( 'Get Google reCAPTCHA V3 Site and Secret key', 'wp-lucky-wheel' ) ?>
                        </strong>
                        <ul>
                            <li><?php echo wp_kses_post( __('1, Visit <a target="_blank" href="https://www.google.com/recaptcha/admin">page</a> to sign up for an API key pair with your Gmail account', 'wp-lucky-wheel' )) ?></li>

                            <li class="wplwl-recaptcha-v2-wrap"
                                style="<?php echo esc_attr( $this->settings->get_params( 'wplwl_recaptcha_version' ) == 2 ? '' : 'display:none;' ); ?>">
								<?php esc_html_e( '2, Choose reCAPTCHA v2 checkbox ', 'wp-lucky-wheel' ) ?>
                            </li>
                            <li class="wplwl-recaptcha-v3-wrap"
                                style="<?php echo esc_attr( $this->settings->get_params( 'wplwl_recaptcha_version' ) == 3 ? '' : 'display:none;' ); ?>">
								<?php esc_html_e( '2, Choose reCAPTCHA v3', 'wp-lucky-wheel' ) ?>
                            </li>
                            <li><?php esc_html_e( '3, Fill in authorized domains', 'wp-lucky-wheel' ) ?></li>
                            <li><?php esc_html_e( '4, Accept terms of service and click Register button', 'wp-lucky-wheel' ) ?></li>
                            <li><?php esc_html_e( '5, Copy and paste the site and secret key into the above field', 'wp-lucky-wheel' ) ?></li>
                        </ul>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <?php
		$wheel_html = ob_get_clean();
		$fields = [
			'section_start' => [
				'accordion' => 1,
				'class'     => 'wplwl-wheel-grecaptcha-accordion',
				'title'     => esc_html__( 'Google reCAPTCHA', 'wp-lucky-wheel' ),
			],
			'section_end'   => [ 'accordion' => 1 ],
			'fields_html'   => $wheel_html,
		];
		$this->settings::villatheme_render_table_field( $fields );

		return '';
	}

	public function email_options() {
        ob_start();
        ?>
        <table class="form-table">
            <tbody>
            <tr>
                <th>
                    <label for="from_name"><?php esc_html_e( '"From" name', 'wp-lucky-wheel' ) ?></label>
                </th>
                <td>
                    <input id="from_name" type="text" name="from_name"
                           value="<?php echo esc_attr( isset( $this->settings->get_params( 'result', 'email' )['from_name'] ) ? htmlentities( $this->settings->get_params( 'result', 'email' )['from_name'] ) : '' ); ?>">
                </td>
            </tr>
            <tr>
                <th>
                    <label for="from_address"><?php esc_html_e( '"From" address', 'wp-lucky-wheel' ) ?></label>
                </th>
                <td>
                    <input id="from_address" type="text" name="from_address"
                           value="<?php echo esc_attr( isset( $this->settings->get_params( 'result', 'email' )['from_address'] ) ? htmlentities( $this->settings->get_params( 'result', 'email' )['from_address'] ) : '' ); ?>">
                </td>
            </tr>
            <tr>
                <th>
                    <label for="subject"><?php esc_html_e( 'Email subject', 'wp-lucky-wheel' ) ?></label>
                </th>
                <td>
					<?php
					ob_start();
					?>
                    <input id="subject" type="text" name="subject"
                           value="<?php echo esc_attr( htmlentities( $this->settings->get_params( 'result', 'email' )['subject'] ??'') ); ?>">
                    <p class="description"><?php esc_html_e( 'The subject of emails sending to customers when they win.', 'wp-lucky-wheel' ) ?></p>
	                <?php
					$subject_html = ob_get_clean();
					$fields     = [
						'fields'   => [
							'subject' =>[
								'not_wrap_html' => 1,
								'html' => $subject_html,
							]
						],
					];
					$this->settings::villatheme_render_table_field( $fields );
					?>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="heading"><?php esc_html_e( 'Email heading', 'wp-lucky-wheel' ) ?></label>
                </th>
                <td>
					<?php
					ob_start();
					?>
                    <input id="heading" type="text" name="heading"
                           value="<?php echo esc_attr( htmlentities( $this->settings->get_params( 'result', 'email' )['heading'] ??'') ); ?>">
                    <p class="description"><?php esc_html_e( 'The heading of emails sending to customers when they win.', 'wp-lucky-wheel' ) ?></p>
	                <?php
	                $tmp_html = ob_get_clean();
	                $fields     = [
		                'fields'   => [
			                'heading' =>[
				                'not_wrap_html' => 1,
				                'html' => $tmp_html,
			                ]
		                ],
	                ];
	                $this->settings::villatheme_render_table_field( $fields );
					?>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="content"><?php esc_html_e( 'Email content', 'wp-lucky-wheel' ) ?></label>
                    <p><?php esc_html_e( 'The content of email sending to customers to inform them the prize they win.', 'wp-lucky-wheel' ) ?></p>
                </th>
                <td>
	                <?php
	                $option = array( 'editor_height' => 300, 'media_buttons' => true );
	                ob_start();
	                wp_editor( stripslashes( $this->settings->get_params( 'result', 'email' )['content']??'' ), 'content', $option );
	                $tmp_html = ob_get_clean();
	                $fields     = [
		                'fields'   => [
			                'content' =>[
				                'not_wrap_html' => 1,
				                'editor_option' => $option,
				                'html' => $tmp_html,
			                ]
		                ],
	                ];
	                $this->settings::villatheme_render_table_field( $fields );
					?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <ul>
                        <li>{customer_name}
                            - <?php esc_html_e( 'Customer\'s name.', 'wp-lucky-wheel' ) ?></li>
                        <li>{customer_mobile}
                            - <?php esc_html_e( 'Customer\'s mobile if any.', 'wp-lucky-wheel' ) ?></li>
                        <li>{prize_value}
                            - <?php esc_html_e( 'Value of prize that will be sent to customer.', 'wp-lucky-wheel' ) ?></li>
                        <li>{prize_label}
                            - <?php esc_html_e( 'Label of prize that customers win', 'wp-lucky-wheel' ) ?></li>
                        <li>{today}
                            - <?php esc_html_e( 'Current date', 'wp-lucky-wheel' ) ?></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="footer_text"><?php esc_html_e( 'Footer text', 'wp-lucky-wheel' ); ?></label>
                </th>
                <td>
					<?php
					ob_start();
					?>
                    <input name="footer_text" id="footer_text" type="text"
                           value="<?php if ( isset( $this->settings->get_params( 'result', 'email' )['footer_text'] ) ) {
		                       echo esc_attr( $this->settings->get_params( 'result', 'email' )['footer_text'] );
	                       } ?>">
	                <?php
	                $tmp_html = ob_get_clean();
	                $fields     = [
		                'fields'   => [
			                'footer_text' =>[
				                'not_wrap_html' => 1,
				                'html' => $tmp_html,
			                ]
		                ],
	                ];
	                $this->settings::villatheme_render_table_field( $fields );
					?>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="email_base_color"><?php esc_html_e( 'Base color', 'wp-lucky-wheel' ); ?></label>
                </th>
                <td>
                    <input name="email_base_color" id="email_base_color" type="text"
                           class="color-picker"
                           value="<?php if ( isset( $this->settings->get_params( 'result', 'email' )['base_color'] ) ) {
						       echo esc_attr( $this->settings->get_params( 'result', 'email' )['base_color'] );
					       } ?>"
                           style="background: <?php if ( isset( $this->settings->get_params( 'result', 'email' )['base_color'] ) ) {
						       echo esc_attr( $this->settings->get_params( 'result', 'email' )['base_color'] );
					       } ?>;">
                </td>
            </tr>
            <tr>
                <th>
                    <label for="email_background_color"><?php esc_html_e( 'Background color', 'wp-lucky-wheel' ); ?></label>
                </th>
                <td>
                    <input name="email_background_color" id="email_background_color" type="text"
                           class="color-picker"
                           value="<?php if ( isset( $this->settings->get_params( 'result', 'email' )['background_color'] ) ) {
						       echo esc_attr( $this->settings->get_params( 'result', 'email' )['background_color'] );
					       } ?>"
                           style="background: <?php if ( isset( $this->settings->get_params( 'result', 'email' )['background_color'] ) ) {
						       echo esc_attr( $this->settings->get_params( 'result', 'email' )['background_color'] );
					       } ?>;">
                </td>
            </tr>
            <tr>
                <th>
                    <label for="email_body_background_color"><?php esc_html_e( 'Body background color', 'wp-lucky-wheel' ); ?></label>
                </th>
                <td>
                    <input name="email_body_background_color" id="email_body_background_color"
                           type="text"
                           class="color-picker"
                           value="<?php if ( isset( $this->settings->get_params( 'result', 'email' )['body_background_color'] ) ) {
						       echo esc_attr( $this->settings->get_params( 'result', 'email' )['body_background_color'] );
					       } ?>"
                           style="background: <?php if ( isset( $this->settings->get_params( 'result', 'email' )['body_background_color'] ) ) {
						       echo esc_attr( $this->settings->get_params( 'result', 'email' )['body_background_color'] );
					       } ?>;">
                </td>
            </tr>
            <tr>
                <th>
                    <label for="email_body_text_color"><?php esc_html_e( 'Body text color', 'wp-lucky-wheel' ); ?></label>
                </th>
                <td>
                    <input name="email_body_text_color" id="email_body_text_color" type="text"
                           class="color-picker"
                           value="<?php if ( isset( $this->settings->get_params( 'result', 'email' )['body_text_color'] ) ) {
						       echo esc_attr( $this->settings->get_params( 'result', 'email' )['body_text_color'] );
					       } ?>"
                           style="background: <?php if ( isset( $this->settings->get_params( 'result', 'email' )['body_text_color'] ) ) {
						       echo esc_attr( $this->settings->get_params( 'result', 'email' )['body_text_color'] );
					       } ?>;">
                </td>
            </tr>
            </tbody>
        </table>
        <?php
		$wheel_html = ob_get_clean();
		$fields     = [
			'section_start' => [
				'accordion' => 1,
				'class'     => 'wplwl-wheel-after-finishing-spinning-accordion',
				'title'     => esc_html__( 'Customer Notification', 'wp-lucky-wheel' ),
			],
			'section_end'   => [ 'accordion' => 1 ],
			'fields_html'   => $wheel_html,
		];
		$this->settings::villatheme_render_table_field( $fields );
        ob_start();
		$fields     = [
			'section_start' => [],
			'section_end'   => [],
			'fields'   => [
				'admin_email_enable'          => [
					'type'  => 'premium_option',
					'title'  => esc_html__( 'Enable admin notification', 'wp-lucky-wheel'),
				],
				'admin_email_to'          => [
					'type'  => 'premium_option',
					'title'  => esc_html__( 'Send notification to', 'wp-lucky-wheel'),
				],
				'admin_email_subject'          => [
					'type'  => 'premium_option',
					'title'  => esc_html__( 'Notification Email subject', 'wp-lucky-wheel'),
				],
				'admin_email_heading'          => [
					'type'  => 'premium_option',
					'title'  => esc_html__( 'Notification Email heading', 'wp-lucky-wheel'),
					'desc'  => esc_html__( 'The heading of emails sending to admin.', 'wp-lucky-wheel'),
				],
				'admin_email_content'          => [
					'type'  => 'premium_option',
					'title'  => esc_html__( 'Notification Email content', 'wp-lucky-wheel'),
					'desc'  => esc_html__( 'The content of emails sending to admin.', 'wp-lucky-wheel'),
				],
			],
		];
		$this->settings::villatheme_render_table_field( $fields );
		$wheel_html = ob_get_clean();
		$fields     = [
			'section_start' => [
				'accordion' => 1,
				'class'     => 'wplwl-wheel-after-finishing-spinning-accordion',
				'title'     => esc_html__( 'Admin Notification', 'wp-lucky-wheel' ),
			],
			'section_end'   => [ 'accordion' => 1 ],
			'fields_html'   => $wheel_html,
		];
		$this->settings::villatheme_render_table_field( $fields );
		return '';
	}
	public function email_api_options() {
		$fields     = [
			'section_start' => [],
			'section_end'   => [],
			'fields'   => [
				'mailchimp_enable'          => [
					'type'  => 'premium_option',
					'title'  => esc_html__( 'Enable Mailchimp', 'wp-lucky-wheel'),
				],
				'wplwl_enable_active_campaign'          => [
					'type'  => 'premium_option',
					'title'  => esc_html__( 'Active Campaign', 'wp-lucky-wheel'),
				],
				'wplwl_sendgrid_enable'          => [
					'type'  => 'premium_option',
					'title'  => esc_html__( 'SendGrid', 'wp-lucky-wheel'),
				],
				'metrilo_enable'          => [
					'type'  => 'premium_option',
					'title'  => esc_html__( 'Metrilo', 'wp-lucky-wheel'),
				],
				'enable_hubspot'          => [
					'type'  => 'premium_option',
					'title'  => esc_html__( 'Hubspot', 'wp-lucky-wheel'),
				],
				'enable_klaviyo'          => [
					'type'  => 'premium_option',
					'title'  => esc_html__( 'Klaviyo', 'wp-lucky-wheel'),
				],
				'enable_sendinblue'          => [
					'type'  => 'premium_option',
					'title'  => esc_html__( 'Brevo (Sendinblue)', 'wp-lucky-wheel'),
				],
				'enable_sendy'          => [
					'type'  => 'premium_option',
					'title'  => esc_html__( 'Sendy', 'wp-lucky-wheel'),
				],
            ],
		];
		$this->settings::villatheme_render_table_field( $fields );
		return '';
	}

	public function admin_enqueue_scripts() {
		$page = isset( $_REQUEST['page'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['page'] ) ) : '';// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$this->settings::enqueue_style(
			array( 'wordpress-lucky-wheel-admin-icon-style' ),
			array( 'admin-icon-style' ),
			array( 0 )
		);
		if ( !in_array($page ,['wp-lucky-wheel']) ) {
			return;
		}
		$this->settings::remove_other_script();
		wp_enqueue_editor();
		$this->settings::enqueue_style(
			array(
				'semantic-ui-accordion',
				'semantic-ui-button',
				'semantic-ui-checkbox',
				'semantic-ui-dropdown',
				'semantic-ui-segment',
				'semantic-ui-form',
				'semantic-ui-label',
				'semantic-ui-input',
				'semantic-ui-icon',
				'semantic-ui-table',
				'semantic-ui-message',
				'semantic-ui-menu',
				'semantic-ui-tab',
				'transition',
				'select2',
			),
			array(
				'accordion',
				'button',
				'checkbox',
				'dropdown',
				'segment',
				'form',
				'label',
				'input',
				'icon',
				'table',
				'message',
				'menu',
				'tab',
				'transition',
				'select2',
			),
			array( 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1 )
		);
		$this->settings::enqueue_style(
			array(
				'wp-lucky-wheel-admin-settings',
				'wordpress-lucky-wheel-gift-icons-style',
				'wordpress-lucky-wheel-fontselect',
			),
			array( 'admin-style', 'giftbox', 'fontselect-default' ),
			array()
		);
		$inline_css          = '';
		$popup_icon_color    = $this->settings->get_params( 'notify', 'popup_icon_color' );
		$popup_icon_bg_color = $this->settings->get_params( 'notify', 'popup_icon_bg_color' );
		if ( $popup_icon_color ) {
			$inline_css .= ".vi-ui.button.wheel-popup-icon.wheel-popup-icon-selected{color:{$popup_icon_color};}";
		}
		if ( $popup_icon_bg_color ) {
			$inline_css .= ".vi-ui.button.wheel-popup-icon.wheel-popup-icon-selected{background-color:{$popup_icon_bg_color};}";
		}
		wp_add_inline_style( 'wordpress-lucky-wheel-admin-style', $inline_css );
		wp_enqueue_script( 'jquery-ui-sortable' );
		/*Color picker*/
		wp_enqueue_script(
			'iris', admin_url( 'js/iris.min.js' ), array(
			'jquery-ui-draggable',
			'jquery-ui-slider',
			'jquery-touch-punch'
		), VI_WP_LUCKY_WHEEL_VERSION, true );
		wp_enqueue_script( 'media-upload' );
		if ( ! did_action( 'wp_enqueue_media' ) ) {
			wp_enqueue_media();
		}
		$this->settings::enqueue_script(
			array(
				'wordpress-lucky-wheel-fontselect',
				'wordpress-lucky-wheel-address',
				'semantic-ui-checkbox',
				'semantic-ui-dropdown',
				'semantic-ui-accordion',
				'semantic-ui-tab',
				'transition',
				'select2'
			),
			array(
				'jquery.fontselect',
				'address',
				'checkbox',
				'dropdown',
				'accordion',
				'tab',
				'transition',
				'select2'
			),
			array( 1, 1, 1, 1, 1, 1, 1, 1 )
		);
		$this->settings::enqueue_script(
			array( 'wordpress-lucky-wheel-admin' ),
			array( 'admin-javascript' ),
			array( 0 ),
		);
		wp_localize_script( 'wordpress-lucky-wheel-admin', 'wp_lucky_wheel_params_admin', array(
			'url'   => admin_url( 'admin-ajax.php' ),
			'bg_img_default'   => VI_WP_LUCKY_WHEEL_IMAGES . '2020.png',
			'nonce' => wp_create_nonce( 'wplw_nonce' )
		) );
	}

	public static function auto_color() {
        $color_arr = VI_WP_LUCKY_WHEEL_DATA::auto_color_arr();
		$palette     = json_decode( $color_arr ,true);
        ?>
        <div class="color_palette" data-color_arr="<?php echo esc_attr($color_arr);?>">
            <?php
            foreach ($palette as $k => $v){
                if (empty($v['color']) || !is_array($v['color'])){
                    return;
                }
                ?>
                <div>
                    <div class="wplwl_color_palette" data-color_code="<?php echo esc_attr($k)?>"
                         style="background:<?php echo esc_attr(!empty($v['palette'])? $v['palette'] : end($v['color']))?>;"></div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="auto_color_ok_cancel"><div class="vi-ui buttons"><span class="auto_color_ok positive vi-ui button"><?php esc_html_e( 'OK', 'wp-lucky-wheel' ) ?></span>
        <div class="or"></div>
        <span class="auto_color_cancel vi-ui button">
           <?php esc_html_e( 'Cancel', 'wp-lucky-wheel' ) ?>
        </span></div></div>
        <?php
	}
}