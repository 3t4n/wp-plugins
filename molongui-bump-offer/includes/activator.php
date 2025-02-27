<?php

namespace Molongui\BumpOffer\Includes;
\defined( 'ABSPATH' ) or exit;
class Activator
{
	public static function activate( $network_wide )
	{
        if ( \function_exists('is_multisite') and \is_multisite() and $network_wide )
        {
            if ( !\is_super_admin() ) return;
            foreach ( \molongui_get_sites() as $site_id )
            {
                \switch_to_blog( $site_id );
                self::activate_single_blog();
                \restore_current_blog();
            }
        }
        else
        {
            if ( !\current_user_can( 'activate_plugins' ) ) return;

            self::activate_single_blog();
        }
        \set_transient( MOLONGUI_BUMP_OFFER_NAME.'-activated', 1 );
    }
	private static function activate_single_blog()
	{
        \flush_rewrite_rules();
        \wp_cache_flush();
        $update_db = new \Molongui\BumpOffer\Includes\Libraries\Common\DB_Update( MOLONGUI_BUMP_OFFER_DB, MOLONGUI_BUMP_OFFER_DB_VERSION, MOLONGUI_BUMP_OFFER_NAMESPACE );
        if ( $update_db->db_update_needed() ) $update_db->run_update();
        self::save_installation_data();
        self::add_default_options();
		self::add_default_bump();
	}
	public static function activate_on_new_blog( $blog_id, $user_id, $domain, $path, $site_id, $meta )
	{
        if ( \is_plugin_active_for_network( MOLONGUI_BUMP_OFFER_BASENAME ) )
        {
            \switch_to_blog( $blog_id );
            self::activate_single_blog();
            \restore_current_blog();
        }
	}
    public static function save_installation_data()
    {
        if ( \get_option( MOLONGUI_BUMP_OFFER_INSTALLATION ) ) return;
        $installation = array
        (
            'install_date'    => \time(),
            'install_version' => MOLONGUI_BUMP_OFFER_VERSION,
        );
        \add_option( MOLONGUI_BUMP_OFFER_INSTALLATION, $installation, null, false );
    }
	public static function add_default_options()
	{
        require_once MOLONGUI_BUMP_OFFER_DIR . 'includes/hooks/options/defaults.php';
        require_once MOLONGUI_BUMP_OFFER_DIR . 'includes/helpers/common/options/options.php';

        \mbo_add_defaults();
	}
	public static function add_default_bump()
	{
        require_once MOLONGUI_BUMP_OFFER_DIR . 'includes/helpers/woocommerce.php';
		$bumps = \get_posts( array( 'post_type' => 'molongui_bump', 'post_status' => 'any', 'posts_per_page' => -1 ) );
		if ( !empty( $bumps ) ) return;
        $product_id = \mbo_get_random_product_id();
		$bump = array
		(
			'post_type'      => 'molongui_bump',
			'post_status'    => 'draft',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'post_author'    => \get_current_user_id(),
            'post_title'     => __( "Default Deal -- EDIT ME!", 'molongui-bump-offer' ),
            'post_content'   => '',
			'meta_input'     => array
			(
				'_molongui_deal_type'                  => 'custom',
				'_molongui_bump_product'               => $product_id,
				'_molongui_deal_price_criteria'        => 'custom',
				'_molongui_bump_price'                 => 1,
				'_molongui_deal_quantity'              => 1,
				'_molongui_bump_start_date'            => '',
				'_molongui_bump_end_date'              => '',
				'_molongui_bump_autoadd'               => 0,
				'_molongui_bump_lead_text'             => __( "Yes! I want it", 'molongui-bump-offer' ),
				'_molongui_bump_intro_text'            => __( "ONE TIME OFFER! Only $1.", 'molongui-bump-offer' ),
				'_molongui_bump_body_text'             => __( 'Want the "amazing product on offer" for just $1? Yes, just $1! You can have access to this exclusive offer by ticking the box above. Click and add it to your order now for just $1. This offer is not available at any other time or place.', 'molongui-bump-offer' ),
                '_molongui_bump_media_type'            => 'none',
                '_molongui_bump_image_id'              => '',
                '_molongui_bump_image_url'             => '',
                '_molongui_bump_image_edit_url'        => '',
				'_molongui_bump_page'                  => 'checkout',
				'_molongui_bump_checkout_position'     => 'woocommerce_review_order_before_submit',
				'_molongui_bump_box_border_style'      => 'dashed',
				'_molongui_bump_box_border_width'      => 3,
				'_molongui_bump_box_border_color'      => '#ff1900',
				'_molongui_bump_box_border_color_2'    => '',
				'_molongui_bump_box_border_color_3'    => '',
				'_molongui_bump_box_border_color_4'    => '',
                '_molongui_bump_box_border_animation'  => 'none',
				'_molongui_bump_box_border_radius'     => 0,
				'_molongui_bump_box_bg_color'          => '#fbf8eb',
				'_molongui_bump_box_bg_transparent'    => '',
				'_molongui_bump_box_shadow_size'       => 0,
				'_molongui_bump_box_shadow_color'      => '#000000',
				'_molongui_bump_box_align'             => 'center',
				'_molongui_bump_box_width'             => 100,
				'_molongui_bump_box_vertical_margin'   => 20,
				'_molongui_bump_box_horizontal_margin' => 20,
				'_molongui_bump_box_inner_padding'     => 14,
				'_molongui_bump_lead_bg_color'         => '#f6d857',
				'_molongui_bump_lead_bg_transparent'   => '',
				'_molongui_bump_lead_arrow_icon'       => 'arrow-1',
				'_molongui_bump_cb_shadow'             => 1,
				'_molongui_bump_lead_font_size'        => 17,
				'_molongui_bump_lead_font_weight'      => 'bold',
				'_molongui_bump_lead_text_transform'   => 'none',
				'_molongui_bump_lead_text_color'       => 'black',
				'_molongui_bump_intro_font_size'       => 15,
				'_molongui_bump_intro_font_weight'     => 'normal',
				'_molongui_bump_intro_text_transform'  => 'none',
				'_molongui_bump_intro_text_align'      => 'left',
				'_molongui_bump_intro_text_color'      => '#ef4836',
				'_molongui_bump_intro_padding_top'     => 0,
				'_molongui_bump_intro_padding_bottom'  => 0,
				'_molongui_bump_intro_padding_left'    => 0,
				'_molongui_bump_intro_padding_right'   => 0,
				'_molongui_bump_body_font_size'        => 14,
				'_molongui_bump_body_font_weight'      => 'normal',
				'_molongui_bump_body_text_transform'   => 'none',
				'_molongui_bump_body_text_align'       => 'left',
				'_molongui_bump_body_text_color'       => 'black',
				'_molongui_bump_body_padding_top'      => 0,
				'_molongui_bump_body_padding_bottom'   => 0,
				'_molongui_bump_body_padding_left'     => 0,
				'_molongui_bump_body_padding_right'    => 0,
                '_molongui_bump_image_position'        => 'below',
                '_molongui_bump_image_size'            => 100,
                '_molongui_bump_image_align'           => 'center',
                '_molongui_bump_image_color'           => 'none',
                '_molongui_bump_image_responsive'      => true,
			),
		);
		@\wp_insert_post( $bump, false, false );
	}

} // class