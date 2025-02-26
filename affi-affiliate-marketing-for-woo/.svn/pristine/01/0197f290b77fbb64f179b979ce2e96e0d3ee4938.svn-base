<?php

namespace AffiAffiliate\Admin;

defined( 'ABSPATH' ) || exit;

use AffiAffiliate\Inc\ClassRank;
use AffiAffiliate\AffiEnv;
use AffiAffiliate\Inc\Data;
use AffiAffiliate\Inc\AFFunctions;
use AffiAffiliate\Inc\QueryDB;

class AFRanks {
	protected static $instance = null;

	private $data = array();


	protected $settings;
	protected $functions;
	protected $query;
	protected $ranks_data;

	/**
	 * Initialize class
	 */
	public static function instance() {
		return self::$instance == null ? self::$instance = new self() : self::$instance;
	}

	public function __construct( $id = 0 ) {
		$this->settings  = Data::instance();
		$this->query     = QueryDB::instance();
		$this->functions = AFFunctions::instance();

//		add_action( 'affi_cron_job', array( $this, 'update_affiliates_rank' ) );
	}

	public function get_data( $var_name = '' ) {
		if ( ! $var_name ) {
			return $this->data;
		} elseif ( isset( $this->data[ $var_name ] ) ) {
			return apply_filters( 'affi-ranks-data-' . $var_name, $this->data[ $var_name ] );
		} else {
			return false;
		}

	}

	public static function get_ranks( $args = array() ) {
		global $wpdb;
		$args = wp_parse_args( $args, array(
			'fields'  => '*',
			'where'   => '',
			'limit'   => 99,
			'offset'  => 0,
			'orderby' => 'data_created',
			'order'   => 'DESC',
		) );
		if ( isset( $args['fields'] ) && is_array( $args['fields'] ) ) {
			$args['fields'] = implode( ', ', $args['fields'] );
		}
		$query = "SELECT * FROM {$wpdb->prefix}affi_ranks WHERE 1 LIMIT %d OFFSET %d ";

		return $wpdb->get_results( $wpdb->prepare( $query, $args['limit'], $args['offset'] ), ARRAY_A );// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	}

	public static function get_rank_by_id( $id ) {
		global $wpdb;

		$query = "SELECT * FROM {$wpdb->prefix}affi_ranks WHERE id=%d LIMIT 1";

		return $wpdb->get_results( $wpdb->prepare( $query, $id ), ARRAY_A );// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	}

	/**
	 * Save changes made
	 *
	 * @return boolean
	 */
	public function save() {
		global $wpdb;
		$data = $this->data;


		$success = true;

		if ( ! isset( $data['id'] ) ) {

			$tic = self::insert( $data );
			if ( $tic ) {
				$this->data = $tic->data;
				$success    = true;
			} else {
				$success = false;
			}
		} else {

			unset( $data['id'] );
			$success = $wpdb->update($wpdb->prefix . 'affi_ranks', $data, array( 'id' => $this->data['id'] ) );// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
		}

		return (bool) $success;
	}

	public static function insert( $data ) {

		global $wpdb;

		// Insert ticket to DB.
		$success = $wpdb->insert($wpdb->prefix . 'affi_ranks', $data );// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery

		if ( ! $success ) {
			return false;
		}

		return $wpdb->insert_id;
	}

	public static function update( $id, $data ) {
		global $wpdb;

		// Insert ticket to DB.
		$success = $wpdb->update($wpdb->prefix . 'affi_ranks', $data, array( 'id' => $id ) );// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching

		if ( ! $success ) {
			return false;
		}

		return true;
	}

	public static function delete( $rank ) {

		global $wpdb;

		// Finally delete rank.
		$success = $wpdb->delete($wpdb->prefix . 'affi_ranks', array( 'id' => $rank->id ) );// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
		if ( ! $success ) {
			return false;
		}

		return true;
	}

	public static function delete_rank( $id ) {
		global $wpdb;

		$success = $wpdb->delete($wpdb->prefix . 'affi_ranks', array( 'id' => $id ) );// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
		if ( ! $success ) {
			return false;
		}

		return true;
	}

	public function set_data( $data ) {

		foreach ( $data as $var_name => $val ) {
			$this->data[ $var_name ] = $val !== null ? $val : '';
		}
	}

	public function render_setting_page() {
		$action = isset( $_REQUEST['action'] ) ? wc_clean( wp_unslash( $_REQUEST['action'] ) ) : false;// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		if ( $action && 'remove' === $action ) {
			$rank_id = isset( $_REQUEST['id'] ) ? wc_clean( wp_unslash( $_REQUEST['id'] ) ) : '';// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
			if ( $rank_id ) {
				self::delete_rank( $rank_id );
			}
			wp_safe_redirect( 'admin.php?page=affi-rank-setting' );
		}
		if ( $action && isset( $_POST['affi_save_rank_settings'] ) ) {// phpcs:ignore WordPress.Security.NonceVerification.Missing
			$data_rank = [
				'name'         => isset( $_POST['affi_rank_name'] ) ? wc_clean( wp_unslash( $_POST['affi_rank_name'] ) ) : '',// phpcs:ignore WordPress.Security.NonceVerification.Missing, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
				'order'        => isset( $_POST['affi_rank_order'] ) ? wc_clean( wp_unslash( $_POST['affi_rank_order'] ) ) : '',// phpcs:ignore WordPress.Security.NonceVerification.Missing, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
				'rate_type'    => isset( $_POST['affi_rank_amount_type'] ) ? wc_clean( wp_unslash( $_POST['affi_rank_amount_type'] ) ) : '',// phpcs:ignore WordPress.Security.NonceVerification.Missing, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
				'rate'         => isset( $_POST['affi_rank_amount_rate'] ) ? wc_clean( wp_unslash( $_POST['affi_rank_amount_rate'] ) ) : '',// phpcs:ignore WordPress.Security.NonceVerification.Missing, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
				'achievement'  => isset( $_POST['affi_rank_achievement'] ) ? wc_clean( wp_unslash( $_POST['affi_rank_achievement'] ) ) : '',// phpcs:ignore WordPress.Security.NonceVerification.Missing, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
				'badge'        => isset( $_POST['affi_rank_badge'] ) ? wc_clean( wp_unslash( $_POST['affi_rank_badge'] ) ) : '',// phpcs:ignore WordPress.Security.NonceVerification.Missing, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
				'description'  => isset( $_POST['affi_rank_description'] ) ? wc_clean( wp_unslash( $_POST['affi_rank_description'] ) ) : '',// phpcs:ignore WordPress.Security.NonceVerification.Missing, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
				'date_created' => current_time( 'U' )
			];
			if ( empty( $data_rank['name'] ) ) {
				$notice = esc_html__( 'Please input require fields', 'affi-affiliate-marketing-for-woo' );
				self::load_edit_rank( '', 'new', $notice );
			} else {
				$rank_id = isset( $_REQUEST['id'] ) ? wc_clean( wp_unslash( $_REQUEST['id'] ) ) : '';// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
				if ( $rank_id ) {
					$rank_edit = self::update( $rank_id, $data_rank );
					self::load_edit_rank( $rank_id, $action );
				} else {
					$rank_id = self::insert( $data_rank );
					$notice  = esc_html__( 'Rank created', 'affi-affiliate-marketing-for-woo' );
					wp_safe_redirect( 'admin.php?page=affi-rank-setting' );
//				wp_safe_redirect('admin.php?page=affi-rank-setting&amp;action=edit&amp;id=$rank_id');
//				self::load_edit_rank( $rank_id, 'edit', $notice );
				}
			}
		} elseif ( $action && ( 'edit' === $action || 'new' === $action ) ) {
			$rank_id = isset( $_REQUEST['id'] ) ? wc_clean( wp_unslash( $_REQUEST['id'] ) ) : '';// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
			self::load_edit_rank( $rank_id, $action );
		} else {
			printf( '<div class="wrap"><h1 class="wp-heading-inline">%s</h1>
            <a href="admin.php?page=affi-rank-setting&amp;action=new" class="page-title-action affi-page-title-action">%s</a><hr class="wp-header-end">
            <form method="post" class="affi-rank-tabblenav-form">',
				esc_html__( "Affiliate Ranks", 'affi-affiliate-marketing-for-woo' ),
				esc_html__( "Add Rank", 'affi-affiliate-marketing-for-woo' ) );
			$rank_class = ClassRank::get_instance();
			$rank_class->prepare_items();
			$rank_class->display();
			printf( '</form></div>' );
		}
	}

	function load_edit_rank( $rank_id, $action, $notice = '' ) {
		if ( ! $rank_id && $action == 'edit' ) {
			printf( '<div class="wrap"><h1 class="wp-heading-inline">%s</h1>
                <a href="admin.php?page=affi-rank-setting&amp;action=edit" class="page-title-action affi-page-title-action">%s</a><hr class="wp-header-end"></div>',
				esc_html__( "Not available rank", 'affi-affiliate-marketing-for-woo' ),
				esc_html__( "New rank", 'affi-affiliate-marketing-for-woo' ) );

			return;
		}
		if ( $notice ) {
			printf( '<div class="notice notice-error"><p>%s</p></div>',
				esc_html( $notice ) );
		}
		if ( $action == 'new' ) {
			$st_title  = esc_html__( "New Affiliate Ranks", 'affi-affiliate-marketing-for-woo' );
			$sv_title  = esc_html__( "Add Rank", 'affi-affiliate-marketing-for-woo' );
			$rank_data = [
				'id'               => '',
				'name'             => '',
				'status'           => '',
				'slug'             => '',
				'rate'             => '',
				'rate_type'        => '',
				'parent_rate'      => '',
				'parent_rate_type' => '',
				'description'      => '',
				'achievement'      => '',
				'badge'            => '',
				'order'            => '',
				'date_created'     => ''
			];
		} else {
			$rank_data = self::get_rank_by_id( $rank_id );
			$st_title  = esc_html__( "Edit Affiliate Rank", 'affi-affiliate-marketing-for-woo' );
			$sv_title  = esc_html__( "Save Rank", 'affi-affiliate-marketing-for-woo' );
			if ( empty( $rank_data ) || ! is_array( $rank_data ) || ! isset( $rank_data[0] ) || empty( $rank_data[0] ) ) {
				printf( '</form></div>' );

				return;
			}
			$rank_data = $rank_data[0];
		}
		printf( '<div class="wrap"><h1 class="wp-heading-inline">%s</h1><form method="post" class="vi-ui form affi-affiliate-rank-edit">', $st_title );// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		$fixed_block   = esc_html__( 'Fixed', 'affi-affiliate-marketing-for-woo' ) . ' (' . get_woocommerce_currency_symbol() . ')';
		$percent_block = esc_html__( 'Percentage', 'affi-affiliate-marketing-for-woo' );
		$logo_src      = $rank_data['badge'] ? wp_get_attachment_image_url( $rank_data['badge'], 'woocommerce_thumbnail', true ) : wc_placeholder_img_src();
		$badge_block   = sprintf( '<div class="affi-upload-badge-wrap">
                                        <input type="hidden" name="affi_rank_badge" class="affi-rank-badge" value="%s"/>
                                        <span class="affi-upload-badge-preview"><img alt="Badge" src="%s" data-src_placeholder="%s"/></span>' .// phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
                                        '<i class="affi-upload-badge-remove times circle outline icon%s"></i>
                                        <span class="affi-upload-badge-add-new">%s</span>
                                    </div>',
			esc_attr( $rank_data['badge'] ), esc_url( $logo_src ), esc_url( wc_placeholder_img_src() ),
			esc_attr( $rank_data['badge'] ? '' : ' affi-hidden' ),
			esc_html__( 'Upload / Add image', 'affi-affiliate-marketing-for-woo' ) );

		$rank_options = [
			[
				'type' => 'section_start',
			],
			[
				'id'    => 'order',
				'type'  => 'number',
				'name'  => 'affi_rank_order',
				'title' => esc_html__( 'Order/Position', 'affi-affiliate-marketing-for-woo' ),
//				'desc'  => esc_html__( '', 'affi-affiliate-marketing-for-woo' ),
			],
			[
				'id'      => 'rate_type',
				'type'    => 'select',
				'name'    => 'affi_rank_amount_type',
				'title'   => esc_html__( 'Rank type', 'affi-affiliate-marketing-for-woo' ),
//				'desc'    => esc_html__( '', 'affi-affiliate-marketing-for-woo' ),
				'options' => [ 'fixed' => $fixed_block, 'percent' => $percent_block ],
				'class'   => 'vi-ui dropdown fluid affi-dropdown',
			],
			[
				'id'    => 'rate',
				'type'  => 'number',
				'name'  => 'affi_rank_amount_rate',
				'title' => esc_html__( 'Rank Amount', 'affi-affiliate-marketing-for-woo' ),
//				'desc'  => esc_html__( '', 'affi-affiliate-marketing-for-woo' ),
			],
			[
				'id'    => 'achievement',
				'type'  => 'number',
				'name'  => 'affi_rank_achievement',
				'title' => esc_html__( 'Amount to reach', 'affi-affiliate-marketing-for-woo' ) . ' (' . get_woocommerce_currency_symbol() . ')',
//				'desc'  => esc_html__( '', 'affi-affiliate-marketing-for-woo' ),
			],
			[
				'id'    => 'badge',
				'type'  => 'media',
				'name'  => 'affi_rank_badge',
				'title' => esc_html__( 'Badge', 'affi-affiliate-marketing-for-woo' ),
				'html'  => $badge_block,
				'desc'  => esc_html__( 'Choose an badge', 'affi-affiliate-marketing-for-woo' ),
			],
			[
				'id'    => 'description',
				'type'  => 'textarea',
				'name'  => 'affi_rank_description',
				'title' => esc_html__( 'Description', 'affi-affiliate-marketing-for-woo' ),
			],
			[ 'type' => 'section_end' ],
		];
		wp_nonce_field( 'affi_security', '_affi_security' ); ?>
        <div class="affi-edit-container-wrap">
            <div class="affi-rank-name-wrap">
                <div class="affi-rank-name">
                    <input type="text" name="affi_rank_name" class="affi-rank-name-input" required
                           value="<?php echo esc_attr( isset( $rank_data['name'] ) ? $rank_data['name'] : '' ) ?>"
                           placeholder="<?php esc_html_e( 'Rank name', 'affi-affiliate-marketing-for-woo' ) ?>"/>
                </div>
            </div>
            <div class="vi-ui attached segment affi-rank-detail-wrap">
				<?php
				AFSettings_Helper::output_fields( $rank_options, $rank_data );
				?>
                <p class="affi-save-settings-container">
                    <button type="submit" class="vi-ui button primary affi-save-rank-settings"
                            name="affi_save_rank_settings" value="affi_save_rank_settings">
						<?php echo esc_html( $sv_title ); ?>
                    </button>
                </p>
            </div>
        </div>
		<?php
		printf( '</form></div>' );
	}
}

