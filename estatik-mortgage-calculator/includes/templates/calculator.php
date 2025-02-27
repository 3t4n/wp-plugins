<?php

/**
 * @var $args array
 */

$uid = $args['uid'];

$json_args = esc_attr( htmlspecialchars( wp_json_encode( $args ), ENT_QUOTES | JSON_HEX_QUOT | JSON_HEX_TAG, 'UTF-8' ) ); ?>

<style>
    <?php if ( ! empty( $args['container_width'] ) ) : ?>
    #emc-calculator-<?php echo esc_attr( $uid ); ?> {
        width: <?php echo esc_attr( $args['container_width'] ); ?>
    }
    <?php endif; ?>

    #emc-calculator-<?php echo esc_attr( $uid ); ?> .rangeslider__fill {
        background: <?php echo esc_attr( $args['color'] ); ?>
    }

    #emc-calculator-<?php echo esc_attr( $uid ); ?>:not(.emc-calculator--circle)  .rangeslider__handle {
        _border-color: #000000 #000000 <?php echo esc_attr( $args['color'] ); ?> #000000;
        border-color: transparent transparent <?php echo esc_attr( $args['color'] ); ?> transparent;
    }

    #emc-calculator-<?php echo esc_attr( $uid ); ?>.emc-calculator--circle  .rangeslider__handle {
        background: <?php echo esc_attr( $args['color'] ); ?>
    }

    #emc-calculator-<?php echo esc_attr( $uid ); ?> .emc-btn {
        border: 1px solid <?php echo esc_attr( $args['color'] ); ?>;
        color: <?php echo esc_attr( $args['color'] ); ?>;
    }

    #emc-calculator-<?php echo esc_attr( $uid ); ?> .emc-btn:hover {
        background: <?php echo esc_attr( $args['color'] ); ?>;
        color: #fff;
    }

    #emc-calculator-popup-<?php echo esc_attr( $uid ); ?> .ct-series-d .ct-slice-donut {
        stroke: <?php echo esc_attr( $args['interest_color'] ); ?>
    }

    #emc-calculator-popup-<?php echo esc_attr( $uid ); ?> .ct-series-b .ct-slice-donut {
        stroke: <?php echo esc_attr( $args['home_insurance_color'] ); ?>
    }

    #emc-calculator-popup-<?php echo esc_attr( $uid ); ?> .ct-series-c .ct-slice-donut {
        stroke: <?php echo esc_attr( $args['property_tax_color'] ); ?>
    }

    #emc-calculator-popup-<?php echo esc_attr( $uid ); ?> .ct-series-e .ct-slice-donut {
        stroke: <?php echo esc_attr( $args['pmi_color'] ); ?>
    }

    #emc-calculator-popup-<?php echo esc_attr( $uid ); ?> .emc-popup-graph-wrap .emc-popup-info__field--interest {
        border-left: 3px solid <?php echo esc_attr( $args['interest_color'] ); ?>;
    }

    #emc-calculator-popup-<?php echo esc_attr( $uid ); ?> .emc-popup-graph-wrap .emc-popup-info__field--home_insurance {
        border-left: 3px solid <?php echo esc_attr( $args['home_insurance_color'] ); ?>;
    }

    #emc-calculator-popup-<?php echo esc_attr( $uid ); ?> .emc-popup-graph-wrap .emc-popup-info__field--property_tax {
        border-left: 3px solid <?php echo esc_attr( $args['property_tax_color'] ); ?>;
    }

    #emc-calculator-<?php echo esc_attr( $uid ); ?> .emc-field input {
        color: <?php echo esc_attr( $args['digits_color'] ); ?>;
    }

    #emc-calculator-popup-<?php echo esc_attr( $uid ); ?> .emc-popup-graph-wrap .emc-popup-info__field--pmi {
        border-left: 3px solid <?php echo esc_attr( $args['pmi_color'] ); ?>;
    }

    #emc-calculator-popup-<?php echo esc_attr( $uid ); ?> .emc-popup-text-wrap .emc-result-total {
        color: <?php echo esc_attr( $args['color'] ); ?>;
    }

    #emc-calculator-<?php echo esc_attr( $uid ); ?> .emc-info svg:hover g {
        fill: <?php echo esc_attr( $args['color'] ); ?> !important;
    }
</style>

<div class="emc-calculator emc-calculator--<?php echo esc_attr( $args['template'] ); ?> emc-calculator--<?php echo esc_attr( $args['layout'] ); ?> emc-calculator--<?php echo esc_attr( $args['slider_icon'] ); ?>" id="emc-calculator-<?php echo esc_attr( $uid ); ?>">
    <form method="post" class="js-emc-calculator" data-args='<?php echo esc_attr( $json_args ); ?>'>

		<?php do_action( 'emc_display_calculator_field', array(
			'label' => __( 'Purchase price', 'estatik-mortgage-calculator' ),
			'range_class' => 'js-emc-range-slider js-emc-purchase-price-field js-emc-down-payment-percentage-calc',
			'field_class' => 'js-emc-price',
			'default_value' => $args['default_purchase_price'],
			'max_value' => $args['max_purchase_price'],
			'uid' => $uid,
			'step' => $args['purchase_price_step'],
			'field' => 'purchase_price',
			'info' => __( 'Please enter here the amount you expect to pay for a home.', 'estatik-mortgage-calculator' ),
		) ); ?>

		<?php do_action( 'emc_display_calculator_field', array(
			'label' => __( 'Down payment', 'estatik-mortgage-calculator' ),
			'range_class' => 'js-emc-range-slider js-emc-down-payment-field js-emc-down-payment-percentage-calc',
			'field_class' => 'js-emc-price',
			'default_value' => $args['default_down_payment'],
			'max_value' => $args['max_purchase_price'],
			'uid' => $uid,
			'field' => 'down_payment',
			'step' => $args['down_payment_step'],
			'hide' => empty( $args['down_payment'] ),
			'units' => '<span class="emc-units emc-percentage js-emc-down-payment-percentage"></span>',
			'info' => __( 'Down payment is cash that you pay upfront for your home.', 'estatik-mortgage-calculator' ),
		) ); ?>

		<?php do_action( 'emc_display_calculator_field', array(
			'label' => __( 'Term in years', 'estatik-mortgage-calculator' ),
			'default_value' => $args['default_term'],
			'max_value' => $args['max_term'],
			'field_class' => 'js-emc-field',
			'step' => $args['term_step'],
			'uid' => $uid,
			'field' => 'term_years',
			'units' => '<span class="emc-units">' . __( 'year(s)', 'estatik-mortgage-calculator' ) . '</span>',
			'info' => __( 'Number of years you have to pay.', 'estatik-mortgage-calculator' ),
		) ); ?>

		<?php do_action( 'emc_display_calculator_field', array(
			'label' => __( 'Interest rate (per year)', 'estatik-mortgage-calculator' ),
			'field_class' => 'js-emc-percentage js-emc-field',
			'default_value' => $args['default_interest_rate'],
			'max_value' => $args['max_interest_rate'],
			'uid' => $uid,
			'step' => $args['interest_rate_step'],
			'field' => 'interest_rate',
			'info' => __( 'The percentage of interest that you will pay on your mortgage for a specific term.', 'estatik-mortgage-calculator' ),
		) ); ?>

		<?php do_action( 'emc_display_calculator_field', array(
			'label' => __( 'Property Tax', 'estatik-mortgage-calculator' ),
			'field_class' => 'js-emc-price',
			'default_value' => $args['default_property_tax'],
			'max_value' => $args['max_property_tax'],
			'uid' => $uid,
			'step' => $args['property_tax_step'],
			'field' => 'property_tax',
			'hide' => empty( $args['property_tax'] ),
			'units' => '<span class="emc-units">' . __( 'per year', 'estatik-mortgage-calculator' ) . '</span>',
			'info' => __( 'Enter your property tax here if you know it.', 'estatik-mortgage-calculator' ),
		) ); ?>

		<?php do_action( 'emc_display_calculator_field', array(
			'label' => __( 'Home Insurance', 'estatik-mortgage-calculator' ),
			'field_class' => 'js-emc-price',
			'default_value' => $args['default_home_insurance'],
			'max_value' => $args['max_home_insurance'],
			'uid' => $uid,
			'step' => $args['home_insurance_step'],
			'hide' => empty( $args['home_insurance'] ),
			'field' => 'home_insurance',
			'units' => '<span class="emc-units">' . __( 'per year', 'estatik-mortgage-calculator' ) . '</span>',
			'info' => __( 'Most lenders require home insurance. Enter its price here.', 'estatik-mortgage-calculator' ),
		) ); ?>

		<?php do_action( 'emc_display_calculator_field', array(
			'label' => __( 'PMI', 'estatik-mortgage-calculator' ),
			'field_class' => 'js-emc-price',
			'default_value' => $args['default_pmi'],
			'max_value' => $args['max_pmi'],
			'uid' => $uid,
			'step' => $args['pmi_step'],
			'field' => 'pmi',
			'hide' => empty( $args['pmi'] ),
			'info' => __( 'PMI is Private Mortgage Insurance which is usually required to pay if your Down payment less than 20%.', 'estatik-mortgage-calculator' ),
		) ); ?>

		<?php do_action( 'emc_display_calculator_button', $args ); ?>
    </form>
</div>

<div id="emc-calculator-popup-<?php echo esc_attr( $uid ); ?>" class="emc-calculator-popup mfp-hide emc-popup--<?php echo esc_attr( $args['popup_type'] ); ?>">
	<?php emc_get_popup_content( $args ); ?>
</div>
