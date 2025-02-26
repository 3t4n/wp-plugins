<?php
namespace ProfitBlue\Admin\DataSetting;

use ProfitBlue\Enums\FixedCostTypes;
use ProfitBlue\Blocks\TooltipBlock;
use ProfitBlue\Blocks\FixedCostsFormLine;
use ProfitBlue\Blocks\VariableCostsFormLine;
use ProfitBlue\Blocks\IncomeCostsFormLine;
use ProfitBlue\Models\CustomCostsAndIncomeModel;
use ProfitBlue\Admin\AdminPage;
use ProfitBlue\Helpers\Helper;

$actual_year = gmdate( 'Y' );
// phpcs:ignore WordPress.Security.NonceVerification.Recommended
if ( !empty( $_GET['cost-years'] ) ) {
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$year = isset( $_GET['cost-years'] ) ? wp_unslash( sanitize_text_field( $_GET['cost-years'] ) ) : '';
} else {
	$year = $actual_year;
}

$first_date = gmdate( 'Y-m-d',  strtotime( 'first day of January ' . $year ) );
$last_date = gmdate( 'Y-m-d',  strtotime( 'last day of December ' . $year ) );


FixedCostsFormLine::get_fixed_data();
$ccai_model = new CustomCostsAndIncomeModel();

echo '<div class="form-section" id="ccai-form" data-year="' . esc_html( $year ) . '" data-first-date="' . esc_html( $first_date ) . '" data-last-date="' . esc_html( $last_date ) . '">';
	
	echo '<h3>' . esc_html__( 'Fixed costs', 'profitblue-financial-reporting-for-woocommerce' ) . '</h3>';
	echo '<p>' . esc_html__( 'Fixed costs refer to those expenses that remain the same over time, regardless of how much you sell. These could include things like your website hosting fees, salaries for your permanent staff, or the monthly rent for your office space if you have one. Whether you sell 10 items or 10,000 items, these costs don\'t change. They are "fixed" because you need to pay them to maintain your business\'s online presence and operations, even if your sales fluctuate.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
	echo '<div class="form-section-inner fixed-form" id="fixed-form">';
		echo '<div class="form-section-line line-3-2-2-3">';
			echo '<div class="fixed-cost-label section-line-label">';
				echo '<span class="tooltip-wrap">' . esc_html__( 'Label', 'profitblue-financial-reporting-for-woocommerce' );
					wp_kses( TooltipBlock::render( esc_html__( 'Select the name of the cost.', 'profitblue-financial-reporting-for-woocommerce' ) ), Helper::get_allowed_tags() );
				echo '</span>';
			echo '</div>';
			echo '<div class="fixed-cost-amount section-line-label">';
				echo '<span class="tooltip-wrap">' . esc_html__( 'Amount', 'profitblue-financial-reporting-for-woocommerce' );
					wp_kses( TooltipBlock::render( esc_html__( 'Select the amount of the costs..', 'profitblue-financial-reporting-for-woocommerce' ) ), Helper::get_allowed_tags() );
				echo '</span>';
			echo '</div>';
			echo '<div class="fixed-cost-date-range section-line-label">';
				echo '<span class="tooltip-wrap">' . esc_html__( 'Date range', 'profitblue-financial-reporting-for-woocommerce' );
					wp_kses( TooltipBlock::render( esc_html__( 'Select the time period in which the amount should be displayed.', 'profitblue-financial-reporting-for-woocommerce' ) ), Helper::get_allowed_tags() );
				echo '</span>';
			echo '</div>';
			echo '<div class="fixed-cost-recalculte section-line-label">';
				echo '<span class="tooltip-wrap">' . esc_html__( 'Manually recalculate', 'profitblue-financial-reporting-for-woocommerce' );
					wp_kses( TooltipBlock::render( esc_html__( 'If you wish to enter the amount by months, check this box.', 'profitblue-financial-reporting-for-woocommerce' ) ), Helper::get_allowed_tags() );
				echo '</span>';
			echo '</div>';
		echo '</div>';		
		wp_kses( FixedCostsFormLine::render(), Helper::get_allowed_tags() );
	echo '</div>';
	$lines = $ccai_model->get_items( 'fixed' );
	$count = 0;
	if ( !empty( $lines ) ) {
		$count = count( $lines );
	}
	if ( $count < 3 ) {
		echo '<div class="ccai-more-line"><a href="#" class="ccai-more-line-button fixed-more">' . esc_html__( 'Add more', 'profitblue-financial-reporting-for-woocommerce' ) . '</a></div>';
	} else {	
		echo '<div class="ccai-more-line"><a href="#" class="ccai-more-line-button fixed-more" style="background:#f0f0f1;">' . esc_html__( 'Add more', 'profitblue-financial-reporting-for-woocommerce' ) . '</a></div>';
	}

	
	echo '<h3>' . esc_html__( 'Variable costs', 'profitblue-financial-reporting-for-woocommerce' ) . '</h3>';
	echo '<p>' . esc_html__( 'Variable costs in the e-commerce business are expenses that change directly with your sales volume. Unlike fixed costs, these costs increase when you sell more and decrease when you sell less. Examples include wrapping materials, commission costs, or handling fees. For example, if you sell more items, you\'ll need to buy more wrapping materials. Conversely, if sales drop, your expenses in these areas will decrease. Variable costs are directly tied to the operational activities of selling products online. Important notice: Shipping costs and payment fees are also variable costs. However, they are more sophisticated, and that is why they have their own tab in Data settings, so we recommend setting them there. ', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
	echo '<div class="form-section-inner variable-form" id="variable-form">';
		echo '<div class="form-section-line line-3-2-2-3">';
			echo '<div class="variable-cost-label section-line-label">';
				echo '<span class="tooltip-wrap">' . esc_html__( 'Label', 'profitblue-financial-reporting-for-woocommerce' );
					wp_kses( TooltipBlock::render( esc_html__( 'Select the name of the cost.', 'profitblue-financial-reporting-for-woocommerce' ) ), Helper::get_allowed_tags() );
				echo '</span>';
			echo '</div>';
			echo '<div class="variable-amount-per-order section-line-label">';
				echo '<span class="tooltip-wrap">' . esc_html__( 'Amount or % per order', 'profitblue-financial-reporting-for-woocommerce' );
					wp_kses( TooltipBlock::render( esc_html__( 'Select if the costs will be displayed in Amount or Percentage.', 'profitblue-financial-reporting-for-woocommerce' ) ), Helper::get_allowed_tags() );
				echo '</span>';
			echo '</div>';
			echo '<div class="variable-cost-amount section-line-label">';
				echo '<span class="tooltip-wrap">' . esc_html__( 'Cost amount', 'profitblue-financial-reporting-for-woocommerce' );
					wp_kses( TooltipBlock::render( esc_html__( 'Select the amount or % of the costs.', 'profitblue-financial-reporting-for-woocommerce' ) ), Helper::get_allowed_tags() );
				echo '</span>';
			echo '</div>';
			echo '<div class="variable-cost-date-range section-line-label">';
				echo '<span class="tooltip-wrap">' . esc_html__( 'Date range', 'profitblue-financial-reporting-for-woocommerce' );
					wp_kses( TooltipBlock::render( esc_html__( 'Select the date range in which the amount or % should be displayed.', 'profitblue-financial-reporting-for-woocommerce' ) ), Helper::get_allowed_tags() );
				echo '</span>';
			echo '</div>';
			
		echo '</div>';
		wp_kses( VariableCostsFormLine::render(), Helper::get_allowed_tags() );
	echo '</div>';
	$lines = $ccai_model->get_items( 'variable' );
	$count = 0;
	if ( !empty( $lines ) ) {
		$count = count( $lines );
	}
	if ( $count < 3 ) {
		echo '<div class="ccai-more-line"><a href="#" class="ccai-more-line-button variable-more">' . esc_html__( 'Add more', 'profitblue-financial-reporting-for-woocommerce' ) . '</a></div>';
	} else {		 
		 echo '<div class="ccai-more-line"><a href="#" class="ccai-more-line-button variable-more" style="background:#f0f0f1;">' . esc_html__( 'Add more', 'profitblue-financial-reporting-for-woocommerce' ) . '</a></div>';
	}
	

	echo '<h3>' . esc_html__( 'Income', 'profitblue-financial-reporting-for-woocommerce' ) . '</h3>';
	echo '<p>' . esc_html__( 'Additional income can come from sources outside your regular sales, such as bonuses from suppliers. This might include cash rebates, discounts, or incentives given to you for meeting certain purchase volumes or for loyalty to a particular supplier. For example, if you order a large quantity of goods, the supplier might offer you a bonus in the form of a discount on your next purchase or even cash back. This type of income is variable and opportunistic; it\'s not guaranteed and depends on specific agreements or sales milestones. ', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
	echo '<div class="form-section-inner income-form" id="income-form">';
		echo '<div class="form-section-line line-3-2-2-3">';
			echo '<div class="income-cost-label section-line-label">';
				echo '<span class="tooltip-wrap">' . esc_html__( 'Label', 'profitblue-financial-reporting-for-woocommerce' );
					wp_kses( TooltipBlock::render( esc_html__( 'Select the name of the income.', 'profitblue-financial-reporting-for-woocommerce' ) ), Helper::get_allowed_tags() );
				echo '</span>';
			echo '</div>';
			echo '<div class="income-cost-amount section-line-label">';
				echo '<span class="tooltip-wrap">' . esc_html__( 'Amount', 'profitblue-financial-reporting-for-woocommerce' );
					wp_kses( TooltipBlock::render( esc_html__( 'Select the amount of the income.', 'profitblue-financial-reporting-for-woocommerce' ) ), Helper::get_allowed_tags() );
				echo '</span>';
			echo '</div>';
			echo '<div class="income-cost-date-range section-line-label">';
				echo '<span class="tooltip-wrap">' . esc_html__( 'Date range', 'profitblue-financial-reporting-for-woocommerce' );
					wp_kses( TooltipBlock::render( esc_html__( 'Select the time period in which the amount should be displayed.', 'profitblue-financial-reporting-for-woocommerce' ) ), Helper::get_allowed_tags() );
				echo '</span>';
			echo '</div>';
			echo '<div class="income-cost-recalculte section-line-label">';
				echo '<span class="tooltip-wrap">' . esc_html__( 'Manually recalculate', 'profitblue-financial-reporting-for-woocommerce' );
					wp_kses( TooltipBlock::render( esc_html__( 'If you wish to enter the amount by months, check this box.', 'profitblue-financial-reporting-for-woocommerce' ) ), Helper::get_allowed_tags() );
				echo '</span>';
			echo '</div>';
		echo '</div>';		
		wp_kses( IncomeCostsFormLine::render(), Helper::get_allowed_tags() );
	echo '</div>';
	$lines = $ccai_model->get_items( 'income' );
	$count = 0;
	if ( !empty( $lines ) ) {
		$count = count( $lines );
	}
	if ( $count < 3 ) {
		echo '<div class="ccai-more-line"><a href="#" class="ccai-more-line-button income-more">' . esc_html__( 'Add more', 'profitblue-financial-reporting-for-woocommerce' ) . '</a></div>';
	} else {
		echo '<div class="ccai-more-line"><a href="#" class="ccai-more-line-button income-more" style="background:#f0f0f1;">' . esc_html__( 'Add more', 'profitblue-financial-reporting-for-woocommerce' ) . '</a></div>';
	}
	

echo '</div>';

$year = gmdate( 'Y' );
// phpcs:ignore WordPress.Security.NonceVerification.Recommended
if ( !empty( $_GET['cost-years'] ) ) {
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$year = isset( $_GET['cost-years'] ) ? wp_unslash( sanitize_text_field( $_GET['cost-years'] ) ) : '';
}

echo '<div class="page-save-button">';
	if ( $year == $actual_year ) {
		echo '<a href="#" class="btn load-last-year" data-year="' . esc_html( $year ) . '">' . esc_html__( 'Load data from last year', 'profitblue-financial-reporting-for-woocommerce' ) . '</a>&nbsp;&nbsp;';
	}
	echo '<a href="#" class="btn save-form" data-year="' . esc_html( $year ) . '">' . esc_html__( 'SAVE', 'profitblue-financial-reporting-for-woocommerce' ) . '</a>';
echo '</div>';