<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
use AffiAffiliate\AffiEnv;
use AffiAffiliate\Frontend\Frontend;
use AffiAffiliate\Inc\Data;
use AffiAffiliate\Inc\QueryDB;

$QueryDB     = QueryDB::instance();
$base_link   = Data::instance()->get_param( 'base_link' );
$prefix_link = Data::instance()->get_param( 'base_prefix' );
$param_link  = Frontend::instance()->get_affiliate_params();
$aff_link    = add_query_arg( $prefix_link, $param_link, $base_link )
?>
<div class="affi-card-body">
    <div class="affi-general-reports-dashboard">
        <div class="affi-dashboard-link-wrap">
            <h2><?php echo esc_html__( 'Generate links', 'affi-affiliate-marketing-for-woo' ); ?></h2>
			<?php
			$home_url                   = get_home_url();
			$wc_get_permalink_structure = wc_get_permalink_structure();
			?>
            <div>
                <input id="affi-dashboard-link-copy" class="affi-dashboard-link-copy" type="text" readonly="readonly" value="<?php echo esc_url( $aff_link ) ?>"/>
            </div>
        </div>
        <div class="affi-dashboard-time-header-wrap">
            <div class="affi-select-time-range ">
				<?php
				$start     = $end = $selected = '';
				$button    = 'button';
				$type_view = 'affiliates';
				villatheme_get_template(
					"range-date-picker.php",
					[
						'start'      => '',
						'end'        => '',
						'selected'   => '',
						'button'     => 'button',
						'type_view ' => 'affiliates',
					],
					'',
					AffiEnv::get( 'templates_dir' ) . 'my-account/'
				);
				?>
            </div>

        </div>
        <div class="affi-my-account-chart-container">
            <div class="affi-data-cards">
				<?php
				$currency_name = get_woocommerce_currency_symbol();
				?>
                <div class="affi-data-card affi-data-visit blueSty">
                    <div class="affi-data-card-label"><?php echo esc_html__( 'Visit', 'affi-affiliate-marketing-for-woo' ); ?></div>
                    <div class="affi-data-card-value">0</div>
                </div>
                <div class="affi-data-card affi-data-order_count graySty">
                    <div class="affi-data-card-label"><?php echo esc_html__( 'Order count', 'affi-affiliate-marketing-for-woo' ); ?></div>
                    <div class="affi-data-card-value">0</div>
                </div>
                <div class="affi-data-card affi-data-order-total greenSty">
                    <div class="affi-data-card-label"><?php echo esc_html__( 'Order total (', 'affi-affiliate-marketing-for-woo' ) . esc_html( $currency_name ) . ')'; ?></div>
                    <div class="affi-data-card-value">0</div>
                </div>
                <div class="affi-data-card affi-data-outstanding_balance yellowSty">
                    <div class="affi-data-card-label"><?php echo esc_html__( 'Outstanding balance (', 'affi-affiliate-marketing-for-woo' ) . esc_html( $currency_name ) . ')'; ?></div>
                    <div class="affi-data-card-value">0</div>
                </div>
                <div class="affi-data-card affi-data-balance redSty">
                    <div class="affi-data-card-label"><?php echo esc_html__( 'Balance (', 'affi-affiliate-marketing-for-woo' ) . esc_html( $currency_name ) . ')'; ?></div>
                    <div class="affi-data-card-value">0</div>
                </div>
            </div>
            <div class="affi-my-account-total-chart"></div>
            <!--            <div class="affi-my-account-count-chart"></div>-->
        </div>
    </div>

</div>