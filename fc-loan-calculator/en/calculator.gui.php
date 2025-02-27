<!-- eslint-disable @html-eslint/no-duplicate-id -->

<!--pass website's default currency selection and / or date mask for JavaScript access-->
<?php
// prevent duplicates from being loaded
global $ac_rendered_conventions; // Bring the global variable into scope

// Check if conventions ID has already been rendered
if ($ac_rendered_conventions === false) {
	// then load conventions and set global to true
	$ac_rendered_conventions = true;
?>
	<div id="ac-conventions" class="ac-conventions" style="position:absolute; left:-9999px; top:-9999px">
		<input type="text" id="ac-currency" value="<?php echo $currency ?>">
		<input type="text" id="ac-date_mask" value="<?php echo $date_mask ?>">
	</div>
<?php
}
?>

<?php

// see CSS vars for min-width and max-width for each calculator size.

if ($brand_name != '' && strtolower($add_link) == 'yes') {
	$title = $brand_name . "<br>" . __('Loan Calculator', 'fc-loan-calculator');
} else {
	$title = __('Loan Calculator', 'fc-loan-calculator');
}

// rather than using exclusively a CSS solution for setting size, PHP is used as well
// so that the text displayed can vary as well
if (strtolower($size) == 'tiny') {
?>

	<!-- Copyright 2016-2025 AccurateCalculators.com -->

	<div id="loan-wrap" class="ac-calc-wrap tiny">
		<!--see CSS vars for min-width and max-width for each calculator size.-->

		<!--calculator-->
		<div id="loan-plugin" class="accuratecalculators ac-calculator tiny" itemscope itemtype="https://schema.org/SoftwareApplication https://schema.org/WebApplication" itemid="https://accuratecalculators.com#LOANPLUGIN">
			<meta itemprop="name" content="<?php _e('Loan Calculator Plugin for WordPress', 'fc-loan-calculator'); ?>">
			<meta itemprop="description" content="<?php _e('This loan calculator plugin creates loan payment schedules with dates.', 'fc-loan-calculator'); ?>">
			<meta itemprop="sameAs" content="<?php echo FC_LNCALC_PLUGIN_HOMEPAGE; ?>">
			<meta itemprop="exampleOfWork" content="<?php echo FC_LNCALC_DERIVATIVE_OF; ?>">
			<meta itemprop="downloadUrl" content="<?php echo FC_LNCALC_DOWNLOAD_URL; ?>">
			<meta itemprop="softwareVersion" content="<?php echo FC_LNCALC_VER; ?>">
			<meta itemprop="applicationCategory" content="Financial">
			<meta itemprop="operatingSystem" content="Any">
			<meta itemprop="browserRequirements" content="Requires Javascript and HTML5 support">
			<div itemprop="creator" itemscope itemtype="https://schema.org/Organization" itemid="https://accuratecalculators.com#organization">
				<link itemprop="url" href="https://accuratecalculators.com">
				<meta itemprop="name" content="AccurateCalculators.com">
				<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
					<link itemprop="url" href="https://accuratecalculators.com/wp-content/themes/accurate/imgs/AccurateCalculators.com-logo-large.png">
					<meta itemprop="width" content="255">
					<meta itemprop="height" content="299">
				</div>
			</div>
			<div itemprop="copyrightHolder" itemscope itemtype="https://schema.org/Organization" itemid="https://accuratecalculators.com#organization">
				<link itemprop="url" href="https://accuratecalculators.com">
				<meta itemprop="name" content="AccurateCalculators.com">
			</div>

			<!-- calculator title -->
			<div class="calc-name">
				<?php echo ((strtolower($add_link) == 'yes') ? '<a href="https://AccurateCalculators.com/loan-calculator" target="_blank" data-bs-toggle="tooltip" data-bs-placement="right" title="' . esc_attr__('click for more features', 'fc-loan-calculator') . '">' . $title . '</a>' : $title) ?>
			</div>

			<label class="label" for="edPV-ln"><?php _e('Loan Amount?', 'fc-loan-calculator') ?>:</label>
			<input type="tel" inputmode="decimal" class="calc-control num" id="edPV-ln" maxlength="14" size="16" value="<?php echo $loan_amt ?>">

			<label class="label" for="edNumPmts-ln"><?php _e('Months? (#)', 'fc-loan-calculator') ?>:</label>
			<input type="tel" inputmode="decimal" class="calc-control num" id="edNumPmts-ln" maxlength="3" size="16" value="<?php echo $n_months ?>">

			<label class="label" for="edRate-ln"><?php _e('Rate?', 'fc-loan-calculator') ?>:</label>
			<input type="tel" inputmode="decimal" class="calc-control num" id="edRate-ln" maxlength="8" size="16" value="<?php echo $rate ?>">

			<label class="label<?php echo strtolower($hide_payment_method) == 'yes' ? ' ac-hidden' : ''; ?>" for="selPmtMthd-ln"><?php _e('Payment Method?', 'fc-loan-calculator') ?>:</label>
			<select id="selPmtMthd-ln" class="calc-control<?php echo strtolower($hide_payment_method) == 'yes' ? ' ac-hidden' : ''; ?>">
				<option value="0" selected="selected"><?php _e('End-of-Period', 'fc-loan-calculator') ?></option>
				<option value="1"><?php _e('Start-of-Period', 'fc-loan-calculator') ?></option>
			</select>

			<hr class="bar" />

			<label class="label" for="edPmt-ln"><?php _e('Payment', 'fc-loan-calculator') ?>:</label>
			<input type="tel" inputmode="decimal" class="calc-control num" id="edPmt-ln" maxlength="14" size="16" disabled>

			<label class="label" for="edInterest-ln"><?php _e('Total Interest', 'fc-loan-calculator') ?>:</label>
			<input type="tel" inputmode="decimal" class="calc-control num" id="edInterest-ln" maxlength="14" size="16" disabled>

			<label class="label" for="edTotalPI-ln"><?php _e('Total Principal & Interest', 'fc-loan-calculator') ?>:</label>
			<input type="tel" inputmode="decimal" class="calc-control num" id="edTotalPI-ln" maxlength="14" size="16" disabled>
			<!-- end loan calculator -->

			<!--buttons-->
			<!--buttons small-->
			<div class="btn-group abbreviated">
				<div class="btn-row">
					<button type="button" id="btnCalc-ln" class="btn btn-primary btn-calculator" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php esc_attr_e('Calculate', 'fc-loan-calculator') ?>"><?php _e('C', 'fc-loan-calculator') ?></button>
					<button type="button" id="btnClear-ln" class="btn btn-primary btn-calculator" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php esc_attr_e('Clear', 'fc-loan-calculator') ?>"><?php _e('Cl', 'fc-loan-calculator') ?></button>
					<button type="button" id="btnPrint-ln" class="btn btn-primary btn-calculator" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php esc_attr_e('Print', 'fc-loan-calculator') ?>"><?php _e('P', 'fc-loan-calculator') ?></button>
					<button type="button" id="btnHelp-ln" class="btn btn-primary btn-calculator" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php esc_attr_e('Help', 'fc-loan-calculator') ?>"><?php _e('H', 'fc-loan-calculator') ?></button>
				</div>
				<div class="btn-row">
					<button type="button" id="btnSchedule-ln" class="btn btn-primary btn-calculator" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php esc_attr_e('Schedule', 'fc-loan-calculator') ?>"><?php _e('S', 'fc-loan-calculator') ?></button>
					<button type="button" id="btnCharts-ln" class="btn btn-primary btn-calculator" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php esc_attr_e('Charts', 'fc-loan-calculator') ?>"><?php _e('Ch', 'fc-loan-calculator') ?></button>
				</div>
			</div>

			<div class="calc-footer">
				<span class="cr">
					©<?php echo date("Y"); ?>
					<?php if (strtolower($add_link) == 'yes'): ?>
						<a href="https://AccurateCalculators.com" target="_blank" data-bs-toggle="tooltip" data-bs-placement="right" title="(c) AccurateCalculators.com">
							&nbsp;AccurateCalculators.com
						</a>
					<?php else: ?>
						&nbsp;AccurateCalculators.com
					<?php endif; ?>
				</span>
				<span id="CCY-ln" class="localization<?php echo strtolower($hide_intl_conventions) == 'yes' ? ' ac-hidden' : ''; ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="<?php esc_attr_e('click to change currency or date format', 'fc-loan-calculator') ?>" role="button">$ : mm/dd/yyyy</span>
			</div>

		</div>
		<!--calculator-->

		<?php $class = (strtolower($hide_resize) === "yes") ? 'zoomer ac-hidden' : 'zoomer'; ?>
		<div id="zoomer-ln" class="<?php echo $class; ?>">
			<span id="shrink-ln" class="minus cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="left" title="<?php esc_attr_e('Make me smaller.', 'fc-loan-calculator') ?>" role="button"></span>
			<span id="original-ln" class="cursor-pointer font-medium" role="button"><?php _e('Original Size', 'fc-loan-calculator') ?></span>
			<span id="grow-ln" class="plus cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="right" title="<?php esc_attr_e('Make me larger.', 'fc-loan-calculator') ?>" role="button"></span>
		</div>

	</div>
	<!--ac-calc-wrap-->

	<!--end loan calculator widget-->
	<!--end tiny-->

<?php
} elseif (strtolower($size) == "small") {
?>
	<!-- Copyright 2016-2025 AccurateCalculators.com -->

	<div id="loan-wrap" class="ac-calc-wrap small">

		<!--calculator-->
		<div id="loan-plugin" class="accuratecalculators ac-calculator small" itemscope itemtype="https://schema.org/SoftwareApplication https://schema.org/WebApplication" itemid="https://accuratecalculators.com#LOANPLUGIN">
			<meta itemprop="name" content="<?php _e('Loan Calculator Plugin for WordPress', 'fc-loan-calculator'); ?>">
			<meta itemprop="description" content="<?php _e('This loan calculator plugin creates loan payment schedules with dates.', 'fc-loan-calculator'); ?>">
			<meta itemprop="sameAs" content="<?php echo FC_LNCALC_PLUGIN_HOMEPAGE; ?>">
			<meta itemprop="exampleOfWork" content="<?php echo FC_LNCALC_DERIVATIVE_OF; ?>">
			<meta itemprop="downloadUrl" content="<?php echo FC_LNCALC_DOWNLOAD_URL; ?>">
			<meta itemprop="softwareVersion" content="<?php echo FC_LNCALC_VER; ?>">
			<meta itemprop="applicationCategory" content="Financial">
			<meta itemprop="operatingSystem" content="Any">
			<meta itemprop="browserRequirements" content="Requires Javascript and HTML5 support">
			<div itemprop="creator" itemscope itemtype="https://schema.org/Organization" itemid="https://accuratecalculators.com#organization">
				<link itemprop="url" href="https://accuratecalculators.com">
				<meta itemprop="name" content="AccurateCalculators.com">
				<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
					<link itemprop="url" href="https://accuratecalculators.com/wp-content/themes/accurate/imgs/AccurateCalculators.com-logo-large.png">
					<meta itemprop="width" content="255">
					<meta itemprop="height" content="299">
				</div>
			</div>
			<div itemprop="copyrightHolder" itemscope itemtype="https://schema.org/Organization" itemid="https://accuratecalculators.com#organization">
				<link itemprop="url" href="https://accuratecalculators.com">
				<meta itemprop="name" content="AccurateCalculators.com">
			</div>

			<!-- calculator title -->
			<div class="calc-name">
				<?php echo ((strtolower($add_link) == 'yes') ? '<a href="https://AccurateCalculators.com/loan-calculator" target="_blank" data-bs-toggle="tooltip" data-bs-placement="right" title="' . esc_attr__('click for more features', 'fc-loan-calculator') . '">' . $title . '</a>' : $title) ?>
			</div>

			<label class="label" for="edPV-ln"><?php _e('Loan Amount?', 'fc-loan-calculator') ?>:</label>
			<input type="tel" inputmode="decimal" class="calc-control num" id="edPV-ln" maxlength="14" size="16" value="<?php echo $loan_amt ?>">

			<label class="label" for="edNumPmts-ln"><?php _e('Months? (#)', 'fc-loan-calculator') ?>:</label>
			<input type="tel" inputmode="decimal" class="calc-control num" id="edNumPmts-ln" maxlength="3" size="16" value="<?php echo $n_months ?>">

			<label class="label" for="edRate-ln"><?php _e('Interest Rate?', 'fc-loan-calculator') ?>:</label>
			<input type="tel" inputmode="decimal" class="calc-control num" id="edRate-ln" maxlength="8" size="16" value="<?php echo $rate ?>">

			<label class="label<?php echo strtolower($hide_payment_method) == 'yes' ? ' ac-hidden' : ''; ?>" for="selPmtMthd-ln"><?php _e('Pmt. Method?', 'fc-loan-calculator') ?>:</label>
			<select id="selPmtMthd-ln" class="calc-control<?php echo strtolower($hide_payment_method) == 'yes' ? ' ac-hidden' : ''; ?>">
				<option value="0" selected="selected"><?php _e('End-of-Period', 'fc-loan-calculator') ?></option>
				<option value="1"><?php _e('Start-of-Period', 'fc-loan-calculator') ?></option>
			</select>

			<hr class="bar" />

			<label class="label" for="edPmt-ln"><?php _e('Payment', 'fc-loan-calculator') ?>:</label>
			<input type="tel" inputmode="decimal" class="calc-control num" id="edPmt-ln" maxlength="14" size="16" disabled>

			<label class="label" for="edInterest-ln"><?php _e('Total Interest', 'fc-loan-calculator') ?>:</label>
			<input type="tel" inputmode="decimal" class="calc-control num" id="edInterest-ln" maxlength="14" size="16" disabled>

			<label class="label" for="edTotalPI-ln"><?php _e('Total Principal & Interest', 'fc-loan-calculator') ?>:</label>
			<input type="tel" inputmode="decimal" class="calc-control num" id="edTotalPI-ln" maxlength="14" size="16" disabled>
			<!-- end loan calculator -->

			<!--buttons-->
			<!--buttons small-->
			<div class="btn-group">
				<div class="btn-row">
					<button type="button" id="btnCalc-ln" class="btn btn-primary btn-calculator"><?php _e('Calc', 'fc-loan-calculator') ?></button>
					<button type="button" id="btnClear-ln" class="btn btn-primary btn-calculator"><?php _e('Clear', 'fc-loan-calculator') ?></button>
					<button type="button" id="btnPrint-ln" class="btn btn-primary btn-calculator"><?php _e('Print', 'fc-loan-calculator') ?></button>
					<button type="button" id="btnHelp-ln" class="btn btn-primary btn-calculator"><?php _e('Help', 'fc-loan-calculator') ?></button>
				</div>
				<div class="btn-row">
					<button type="button" id="btnSchedule-ln" class="btn btn-primary btn-calculator"><?php _e('Schedule', 'fc-loan-calculator') ?></button>
					<button type="button" id="btnCharts-ln" class="btn btn-primary btn-calculator"><?php _e('Charts', 'fc-loan-calculator') ?></button>
				</div>
			</div>

			<div class="calc-footer">
				<span class="cr">
					©<?php echo date("Y"); ?>
					<?php if (strtolower($add_link) == 'yes'): ?>
						<a href="https://AccurateCalculators.com" target="_blank" data-bs-toggle="tooltip" data-bs-placement="right" title="(c) AccurateCalculators.com">
							&nbsp;AccurateCalculators.com
						</a>
					<?php else: ?>
						&nbsp;AccurateCalculators.com
					<?php endif; ?>
				</span>
				<span id="CCY-ln" class="localization<?php echo strtolower($hide_intl_conventions) == 'yes' ? ' ac-hidden' : ''; ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="<?php esc_attr_e('click to change currency or date format', 'fc-loan-calculator') ?>" role="button">$ : mm/dd/yyyy</span>
			</div>

		</div>
		<!--calculator-->

		<?php $class = (strtolower($hide_resize) === "yes") ? 'zoomer ac-hidden' : 'zoomer'; ?>
		<div id="zoomer-ln" class="<?php echo $class; ?>">
			<span id="shrink-ln" class="minus cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="left" title="<?php esc_attr_e('Make me smaller.', 'fc-loan-calculator') ?>" role="button"></span>
			<span id="original-ln" class="cursor-pointer font-medium" role="button"><?php _e('Original Size', 'fc-loan-calculator') ?></span>
			<span id="grow-ln" class="plus cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="right" title="<?php esc_attr_e('Make me larger.', 'fc-loan-calculator') ?>" role="button"></span>
		</div>

	</div>
	<!--ac-calc-wrap-->

	<!--end loan calculator widget-->
	<!--end small-->

<?php
} elseif (strtolower($size) == "medium") {
?>
	<!-- Copyright 2016-2025 AccurateCalculators.com -->

	<div id="loan-wrap" class="ac-calc-wrap medium">

		<!--calculator-->
		<div id="loan-plugin" class="accuratecalculators ac-calculator medium grid-3-5" itemscope itemtype="https://schema.org/SoftwareApplication https://schema.org/WebApplication" itemid="https://accuratecalculators.com#LOANPLUGIN">
			<meta itemprop="name" content="<?php _e('Loan Calculator Plugin for WordPress', 'fc-loan-calculator'); ?>">
			<meta itemprop="description" content="<?php _e('This loan calculator plugin creates loan payment schedules with dates.', 'fc-loan-calculator'); ?>">
			<meta itemprop="sameAs" content="<?php echo FC_LNCALC_PLUGIN_HOMEPAGE; ?>">
			<meta itemprop="exampleOfWork" content="<?php echo FC_LNCALC_DERIVATIVE_OF; ?>">
			<meta itemprop="downloadUrl" content="<?php echo FC_LNCALC_DOWNLOAD_URL; ?>">
			<meta itemprop="softwareVersion" content="<?php echo FC_LNCALC_VER; ?>">
			<meta itemprop="applicationCategory" content="Financial">
			<meta itemprop="operatingSystem" content="Any">
			<meta itemprop="browserRequirements" content="Requires Javascript and HTML5 support">
			<div itemprop="creator" itemscope itemtype="https://schema.org/Organization" itemid="https://accuratecalculators.com#organization">
				<link itemprop="url" href="https://accuratecalculators.com">
				<meta itemprop="name" content="AccurateCalculators.com">
				<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
					<link itemprop="url" href="https://accuratecalculators.com/wp-content/themes/accurate/imgs/AccurateCalculators.com-logo-large.png">
					<meta itemprop="width" content="255">
					<meta itemprop="height" content="299">
				</div>
			</div>
			<div itemprop="copyrightHolder" itemscope itemtype="https://schema.org/Organization" itemid="https://accuratecalculators.com#organization">
				<link itemprop="url" href="https://accuratecalculators.com">
				<meta itemprop="name" content="AccurateCalculators.com">
			</div>

			<!-- calculator title -->
			<div class="calc-name">
				<?php echo ((strtolower($add_link) == 'yes') ? '<a href="https://AccurateCalculators.com/loan-calculator" target="_blank" data-bs-toggle="tooltip" data-bs-placement="right" title="' . esc_attr__('click for more features', 'fc-loan-calculator') . '">' . $title . '</a>' : $title) ?>
			</div>

			<label class="label" for="edPV-ln"><?php _e('Loan Amount?', 'fc-loan-calculator') ?>:</label>
			<input type="tel" inputmode="decimal" class="calc-control num" id="edPV-ln" maxlength="14" size="16" value="<?php echo $loan_amt ?>">

			<label class="label" for="edNumPmts-ln"><?php _e('Number of Months?', 'fc-loan-calculator') ?>:</label>
			<input type="tel" inputmode="decimal" class="calc-control num" id="edNumPmts-ln" maxlength="3" size="16" value="<?php echo $n_months ?>">

			<label class="label" for="edRate-ln"><?php _e('Annual Interest Rate?', 'fc-loan-calculator') ?>:</label>
			<input type="tel" inputmode="decimal" class="calc-control num" id="edRate-ln" maxlength="8" size="16" value="<?php echo $rate ?>">

			<label class="label<?php echo strtolower($hide_payment_method) == 'yes' ? ' ac-hidden' : ''; ?>" for="selPmtMthd-ln"><?php _e('Payment Method?', 'fc-loan-calculator') ?>:</label>
			<select id="selPmtMthd-ln" class="calc-control<?php echo strtolower($hide_payment_method) == 'yes' ? ' ac-hidden' : ''; ?>">
				<option value="0" selected="selected"><?php _e('End-of-Period', 'fc-loan-calculator') ?></option>
				<option value="1"><?php _e('Start-of-Period', 'fc-loan-calculator') ?></option>
			</select>

			<hr class="bar" />

			<label class="label" for="edPmt-ln"><?php _e('Monthly Payment', 'fc-loan-calculator') ?>:</label>
			<input type="tel" inputmode="decimal" class="calc-control num" id="edPmt-ln" maxlength="14" size="16" disabled>

			<label class="label" for="edInterest-ln"><?php _e('Total Interest', 'fc-loan-calculator') ?>:</label>
			<input type="tel" inputmode="decimal" class="calc-control num" id="edInterest-ln" maxlength="14" size="16" disabled>

			<label class="label" for="edTotalPI-ln"><?php _e('Total Principal & Interest', 'fc-loan-calculator') ?>:</label>
			<input type="tel" inputmode="decimal" class="calc-control num" id="edTotalPI-ln" maxlength="14" size="16" disabled>
			<!-- end loan calculator -->

			<!--buttons-->
			<div class="btn-group full">
				<div class="btn-row">
					<button type="button" id="btnCalc-ln" class="btn btn-primary btn-calculator"><?php _e('Calc', 'fc-loan-calculator') ?></button>
					<button type="button" id="btnClear-ln" class="btn btn-primary btn-calculator"><?php _e('Clear', 'fc-loan-calculator') ?></button>
					<button type="button" id="btnPrint-ln" class="btn btn-primary btn-calculator"><?php _e('Print', 'fc-loan-calculator') ?></button>
					<button type="button" id="btnHelp-ln" class="btn btn-primary btn-calculator"><?php _e('Help', 'fc-loan-calculator') ?></button>
				</div>
				<div class="btn-row">
					<button type="button" id="btnSchedule-ln" class="btn btn-primary btn-calculator"><?php _e('Schedule', 'fc-loan-calculator') ?></button>
					<button type="button" id="btnCharts-ln" class="btn btn-primary btn-calculator"><?php _e('Charts', 'fc-loan-calculator') ?></button>
				</div>
			</div>

			<div class="calc-footer">
				<span class="cr">
					©<?php echo date("Y"); ?>
					<?php if (strtolower($add_link) == 'yes'): ?>
						<a href="https://AccurateCalculators.com" target="_blank" data-bs-toggle="tooltip" data-bs-placement="right" title="(c) AccurateCalculators.com">
							&nbsp;AccurateCalculators.com
						</a>
					<?php else: ?>
						&nbsp;AccurateCalculators.com
					<?php endif; ?>
				</span>
				<span id="CCY-ln" class="localization<?php echo strtolower($hide_intl_conventions) == 'yes' ? ' ac-hidden' : ''; ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="<?php esc_attr_e('click to change currency or date format', 'fc-loan-calculator') ?>" role="button">$ : mm/dd/yyyy</span>
			</div>

		</div>
		<!--calculator-->

		<?php $class = (strtolower($hide_resize) === "yes") ? 'zoomer ac-hidden' : 'zoomer'; ?>
		<div id="zoomer-ln" class="<?php echo $class; ?>">
			<span id="shrink-ln" class="minus cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="left" title="<?php esc_attr_e('Make me smaller.', 'fc-loan-calculator') ?>" role="button"></span>
			<span id="original-ln" class="cursor-pointer font-medium" role="button"><?php _e('Original Size', 'fc-loan-calculator') ?></span>
			<span id="grow-ln" class="plus cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="right" title="<?php esc_attr_e('Make me larger.', 'fc-loan-calculator') ?>" role="button"></span>
		</div>

	</div>
	<!--ac-calc-wrap-->

	<!--end loan calculator widget-->
	<!--end medium-->

<?php
} else {
?>

	<!-- default size - large -->
	<!-- Copyright 2016-2025 AccurateCalculators.com -->

	<div id="loan-wrap" class="ac-calc-wrap large">

		<!--calculator-->
		<div id="loan-plugin" class="accuratecalculators ac-calculator large grid-3-5" itemscope itemtype="https://schema.org/SoftwareApplication https://schema.org/WebApplication" itemid="https://accuratecalculators.com#LOANPLUGIN">
			<meta itemprop="name" content="<?php _e('Loan Calculator Plugin for WordPress', 'fc-loan-calculator'); ?>">
			<meta itemprop="description" content="<?php _e('This loan calculator plugin creates loan payment schedules with dates.', 'fc-loan-calculator'); ?>">
			<meta itemprop="sameAs" content="<?php echo FC_LNCALC_PLUGIN_HOMEPAGE; ?>">
			<meta itemprop="exampleOfWork" content="<?php echo FC_LNCALC_DERIVATIVE_OF; ?>">
			<meta itemprop="downloadUrl" content="<?php echo FC_LNCALC_DOWNLOAD_URL; ?>">
			<meta itemprop="softwareVersion" content="<?php echo FC_LNCALC_VER; ?>">
			<meta itemprop="applicationCategory" content="Financial">
			<meta itemprop="operatingSystem" content="Any">
			<meta itemprop="browserRequirements" content="Requires Javascript and HTML5 support">
			<div itemprop="creator" itemscope itemtype="https://schema.org/Organization" itemid="https://accuratecalculators.com#organization">
				<link itemprop="url" href="https://accuratecalculators.com">
				<meta itemprop="name" content="AccurateCalculators.com">
				<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
					<link itemprop="url" href="https://accuratecalculators.com/wp-content/themes/accurate/imgs/AccurateCalculators.com-logo-large.png">
					<meta itemprop="width" content="255">
					<meta itemprop="height" content="299">
				</div>
			</div>
			<div itemprop="copyrightHolder" itemscope itemtype="https://schema.org/Organization" itemid="https://accuratecalculators.com#organization">
				<link itemprop="url" href="https://accuratecalculators.com">
				<meta itemprop="name" content="AccurateCalculators.com">
			</div>

			<!-- calculator title -->
			<div class="calc-name">
				<?php echo ((strtolower($add_link) == 'yes') ? '<a href="https://AccurateCalculators.com/loan-calculator" target="_blank" data-bs-toggle="tooltip" data-bs-placement="right" title="' . esc_attr__('click for more features', 'fc-loan-calculator') . '">' . $title . '</a>' : $title) ?>
			</div>

			<label class="label" for="edPV-ln"><?php _e('Loan Amount?', 'fc-loan-calculator') ?>:</label>
			<input type="tel" inputmode="decimal" class="calc-control num" id="edPV-ln" maxlength="14" size="16" value="<?php echo $loan_amt ?>">

			<label class="label" for="edNumPmts-ln"><?php _e('Number of Months? (#)', 'fc-loan-calculator') ?>:</label>
			<input type="tel" inputmode="decimal" class="calc-control num" id="edNumPmts-ln" maxlength="3" size="16" value="<?php echo $n_months ?>">

			<label class="label" for="edRate-ln"><?php _e('Annual Interest Rate?', 'fc-loan-calculator') ?>:</label>
			<input type="tel" inputmode="decimal" class="calc-control num" id="edRate-ln" maxlength="8" size="16" value="<?php echo $rate ?>">

			<label class="label<?php echo strtolower($hide_payment_method) == 'yes' ? ' ac-hidden' : ''; ?>" for="selPmtMthd-ln"><?php _e('Payment Method?', 'fc-loan-calculator') ?>:</label>
			<select id="selPmtMthd-ln" class="calc-control<?php echo strtolower($hide_payment_method) == 'yes' ? ' ac-hidden' : ''; ?>">
				<option value="0" selected="selected"><?php _e('End-of-Period', 'fc-loan-calculator') ?></option>
				<option value="1"><?php _e('Start-of-Period', 'fc-loan-calculator') ?></option>
			</select>

			<hr class="bar" />

			<label class="label" for="edPmt-ln"><?php _e('Monthly Payment', 'fc-loan-calculator') ?>:</label>
			<input type="tel" inputmode="decimal" class="calc-control num" id="edPmt-ln" maxlength="14" size="16" disabled>

			<label class="label" for="edInterest-ln"><?php _e('Total Interest', 'fc-loan-calculator') ?>:</label>
			<input type="tel" inputmode="decimal" class="calc-control num" id="edInterest-ln" maxlength="14" size="16" disabled>

			<label class="label" for="edTotalPI-ln"><?php _e('Total Principal & Interest', 'fc-loan-calculator') ?>:</label>
			<input type="tel" inputmode="decimal" class="calc-control num" id="edTotalPI-ln" maxlength="14" size="16" disabled>
			<!-- end loan calculator -->

			<!--buttons-->
			<div class="btn-group">
				<div class="btn-row">
					<button type="button" id="btnCalc-ln" class="btn btn-primary btn-calculator"><?php _e('Calc', 'fc-loan-calculator') ?></button>
					<button type="button" id="btnClear-ln" class="btn btn-primary btn-calculator"><?php _e('Clear', 'fc-loan-calculator') ?></button>
					<button type="button" id="btnPrint-ln" class="btn btn-primary btn-calculator"><?php _e('Print', 'fc-loan-calculator') ?></button>
					<button type="button" id="btnHelp-ln" class="btn btn-primary btn-calculator"><?php _e('Help', 'fc-loan-calculator') ?></button>
				</div>
				<div class="btn-row">
					<button type="button" id="btnSchedule-ln" class="btn btn-primary btn-calculator"><?php _e('Payment Schedule', 'fc-loan-calculator') ?></button>
					<button type="button" id="btnCharts-ln" class="btn btn-primary btn-calculator"><?php _e('Charts', 'fc-loan-calculator') ?></button>
				</div>
			</div>

			<div class="calc-footer">
				<span class="cr">
					©<?php echo date("Y"); ?>
					<?php if (strtolower($add_link) == 'yes'): ?>
						<a href="https://AccurateCalculators.com" target="_blank" data-bs-toggle="tooltip" data-bs-placement="right" title="(c) AccurateCalculators.com">
							&nbsp;AccurateCalculators.com
						</a>
					<?php else: ?>
						&nbsp;AccurateCalculators.com
					<?php endif; ?>
				</span>
				<span id="CCY-ln" class="localization<?php echo strtolower($hide_intl_conventions) == 'yes' ? ' ac-hidden' : ''; ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="<?php esc_attr_e('click to change currency or date format', 'fc-loan-calculator') ?>" role="button">$ : mm/dd/yyyy</span>
			</div>

		</div>
		<!--calculator-->

		<?php $class = (strtolower($hide_resize) === "yes") ? 'zoomer ac-hidden' : 'zoomer'; ?>
		<div id="zoomer-ln" class="<?php echo $class; ?>">
			<span id="shrink-ln" class="minus cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="left" title="<?php esc_attr_e('Make me smaller.', 'fc-loan-calculator') ?>" role="button"></span>
			<span id="original-ln" class="cursor-pointer font-medium" role="button"><?php _e('Original Size', 'fc-loan-calculator') ?></span>
			<span id="grow-ln" class="plus cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="right" title="<?php esc_attr_e('Make me larger.', 'fc-loan-calculator') ?>" role="button"></span>
		</div>

	</div>
	<!--ac-calc-wrap-->

	<!--end loan calculator widget-->
	<!--end default/large-->

<?php
};  // if
?>




<!-- start dialog code -->
<!-- 5 modals-->
<!-- currency-date (CURRENCYDATE), report (RPT), charts (CHART), help (HLP), and message (MSG) -->

<?php
// prevent duplicate modals from being loaded
global $ac_rendered_modals; // Bring the global variable into scope

// Check if the modal with ID "TITLEPG" has already been rendered
if (!in_array('TITLEPG', $ac_rendered_modals)) {
	// Add "TITLEPG" to the array to prevent future duplicates
	$ac_rendered_modals[] = 'TITLEPG';
?>
	<!-- generic printer title page dialog -->
	<!-- <div class="modal ac-modal-plugin fade" id="TITLEPG" tabindex="-1">

	</div> -->
	<!-- end generic printer title page dialog -->
<?php
}
?>

<?php
// Check if the modal with ID "CURRENCYDATE" has already been rendered
if (!in_array('CURRENCYDATE', $ac_rendered_modals)) {
	// Add "CURRENCYDATE" to the array to prevent future duplicates
	$ac_rendered_modals[] = 'CURRENCYDATE';
?>
	<!-- currency date options -->
	<div class="modal ac-modal-plugin fade" id="CURRENCYDATE" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content ac-modal-content">

				<div class="modal-header">
					<h4 class="modal-title">
						<?php _e('Currency and Date Conventions', 'fc-loan-calculator') ?>
					</h4>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<span class="sym text-3xl" aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php
					if (strtolower($hide_intl_conventions) == 'no') {
					?>
						<div class="modal-group modal-group-narrow">

							<div class="form-theme pb-12">

								<div class="mb-6">
									<select name="ccy-select" id="ccy-select" class="calc-control">
										<option value="59">Albania&nbsp;&nbsp;&nbsp;&nbsp;(Lek)&nbsp;&nbsp;&nbsp;&nbsp;Lek12,345,678.99</option>
										<option value="90">Algeria&nbsp;&nbsp;&nbsp;&nbsp;(Algerian Dinar)&nbsp;&nbsp;&nbsp;&nbsp;DZD12,345,678.99</option>
										<option value="36">Argentina&nbsp;&nbsp;&nbsp;&nbsp;(Argentine Peso)&nbsp;&nbsp;&nbsp;&nbsp;$12.345.678,99</option>
										<option value="88">Armenia&nbsp;&nbsp;&nbsp;&nbsp;(Armenian Dram)&nbsp;&nbsp;&nbsp;&nbsp;AMD12,345,678.99</option>
										<option value="49">Australia&nbsp;&nbsp;&nbsp;&nbsp;(Australian Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99</option>
										<option value="43">Austria&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;€12.345.678,99</option>
										<option value="84">Azerbaijan&nbsp;&nbsp;&nbsp;&nbsp;(Manat)&nbsp;&nbsp;&nbsp;&nbsp;₼12,345,678.99</option>
										<option value="89">Bahrain&nbsp;&nbsp;&nbsp;&nbsp;(Bahraini Dinar)&nbsp;&nbsp;&nbsp;&nbsp;BHD12,345,678.994</option>
										<option value="54">Belarus&nbsp;&nbsp;&nbsp;&nbsp;(Ruble)&nbsp;&nbsp;&nbsp;&nbsp;Br12,345,678.99</option>
										<option value="18">Belgium&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€</option>
										<option value="42">Belgium&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;€12.345.678,99</option>
										<option value="53">Belize&nbsp;&nbsp;&nbsp;&nbsp;(Belize Dollar)&nbsp;&nbsp;&nbsp;&nbsp;BZ$12,345,678.99</option>
										<option value="38">Bolivia&nbsp;&nbsp;&nbsp;&nbsp;(Boliviano)&nbsp;&nbsp;&nbsp;&nbsp;$b12.345.678,99</option>
										<option value="28"> Bosnia/Herzegovina&nbsp;&nbsp;&nbsp;&nbsp;(Mark)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99KM</option>
										<option value="40">Brazil&nbsp;&nbsp;&nbsp;&nbsp;(Brazilian Real)&nbsp;&nbsp;&nbsp;&nbsp;R$12.345.678,99</option>
										<option value="49">Brunei&nbsp;&nbsp;&nbsp;&nbsp;(Brunei Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99</option>
										<option value="27">Bulgaria&nbsp;&nbsp;&nbsp;&nbsp;(Bulgarian Lev)&nbsp;&nbsp;&nbsp;&nbsp;12345678,99лв</option>
										<option value="50">Canada&nbsp;&nbsp;&nbsp;&nbsp;(Canadian Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99</option>
										<option value="13">Canada&nbsp;&nbsp;&nbsp;&nbsp;(Canadian Dollar)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99$</option>
										<option value="35">Chile&nbsp;&nbsp;&nbsp;&nbsp;(Chilean Peso)&nbsp;&nbsp;&nbsp;&nbsp;$12.345.679</option>
										<option value="73">China&nbsp;&nbsp;&nbsp;&nbsp;(Yuan Renminbi)&nbsp;&nbsp;&nbsp;&nbsp;¥12,345,678.99</option>
										<option value="36">Colombia&nbsp;&nbsp;&nbsp;&nbsp;(Colombian Peso)&nbsp;&nbsp;&nbsp;&nbsp;$12.345.678,99</option>
										<option value="26">Costa Rica&nbsp;&nbsp;&nbsp;&nbsp;(Colon)&nbsp;&nbsp;&nbsp;&nbsp;₡12 345 678,99</option>
										<option value="29">Croatia&nbsp;&nbsp;&nbsp;&nbsp;(Kuna)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99kn</option>
										<option value="15">Czechia&nbsp;&nbsp;&nbsp;&nbsp;(Czech Koruna)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99Kč</option>
										<option value="30">Denmark&nbsp;&nbsp;&nbsp;&nbsp;(Danish Krone)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99kr</option>
										<option value="63">Dominican Republic&nbsp;&nbsp;&nbsp;&nbsp;(DR Peso)&nbsp;&nbsp;&nbsp;&nbsp;RD$1,234.99</option>
										<option value="36">Ecuador&nbsp;&nbsp;&nbsp;&nbsp;(US Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12.345.678,99</option>
										<option value="70">Egypt&nbsp;&nbsp;&nbsp;&nbsp;(Egyptian Pound)&nbsp;&nbsp;&nbsp;&nbsp;£12,345,678.99</option>
										<option value="49">El Salvador&nbsp;&nbsp;&nbsp;&nbsp;(El Salvador Colon)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99</option>
										<option value="20">Estonia&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€</option>
										<option value="68">Faroe Islands&nbsp;&nbsp;&nbsp;&nbsp;(Danish Krone)&nbsp;&nbsp;&nbsp;&nbsp;kr12,345,678.99</option>
										<option value="20">Finland&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€</option>
										<option value="18">France&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€</option>
										<option value="91">Georgia&nbsp;&nbsp;&nbsp;&nbsp;(Lari)&nbsp;&nbsp;&nbsp;&nbsp;GEL12,345,678.99</option>
										<option value="34">Germany&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€</option>
										<option value="33">Greece&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€</option>
										<option value="61">Guatemala&nbsp;&nbsp;&nbsp;&nbsp;(Quetzal)&nbsp;&nbsp;&nbsp;&nbsp;Q12,345,678.99</option>
										<option value="58">Honduras&nbsp;&nbsp;&nbsp;&nbsp;(Lempira)&nbsp;&nbsp;&nbsp;&nbsp;L12,345,678.99</option>
										<option value="56">Hong Kong&nbsp;&nbsp;&nbsp;&nbsp;(HK Dollar)&nbsp;&nbsp;&nbsp;&nbsp;HK$12,345,678.99</option>
										<option value="14">Hungary&nbsp;&nbsp;&nbsp;&nbsp;(Forint)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99Ft</option>
										<option value="67">Iceland&nbsp;&nbsp;&nbsp;&nbsp;(Iceland Krona)&nbsp;&nbsp;&nbsp;&nbsp;kr12,345,679</option>
										<option value="83">India&nbsp;&nbsp;&nbsp;&nbsp;(Indian Rupee)&nbsp;&nbsp;&nbsp;&nbsp;₹1,23,45,678.99</option>
										<option value="41">Indonesia&nbsp;&nbsp;&nbsp;&nbsp;(Rupiah)&nbsp;&nbsp;&nbsp;&nbsp;Rp12.345.678,99</option>
										<option value="85">Iran&nbsp;&nbsp;&nbsp;&nbsp;(Iranian Rial)&nbsp;&nbsp;&nbsp;&nbsp;﷼12,345,678.99</option>
										<option value="92">Iraq&nbsp;&nbsp;&nbsp;&nbsp;(Iraqi Dinar)&nbsp;&nbsp;&nbsp;&nbsp;IQD12,345,678.994</option>
										<option value="80">Ireland&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;€12,345,678.99</option>
										<option value="78">Israel&nbsp;&nbsp;&nbsp;&nbsp;(Sheqel)&nbsp;&nbsp;&nbsp;&nbsp;₪12,345,678.99</option>
										<option value="33">Italy&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€</option>
										<option value="57">Jamaica&nbsp;&nbsp;&nbsp;&nbsp;(Jamaican Dollar)&nbsp;&nbsp;&nbsp;&nbsp;J$12,345,678.99</option>
										<option value="72">Japan&nbsp;&nbsp;&nbsp;&nbsp;(Yen)&nbsp;&nbsp;&nbsp;&nbsp;¥12,345,679</option>
										<option value="93">Jordan&nbsp;&nbsp;&nbsp;&nbsp;(Jordanian Dinar)&nbsp;&nbsp;&nbsp;&nbsp;JOD12,345,678.994</option>
										<option value="74">Kazakhstan&nbsp;&nbsp;&nbsp;&nbsp;(Tenge)&nbsp;&nbsp;&nbsp;&nbsp;лв12,345,678.99</option>
										<option value="94">Kenya&nbsp;&nbsp;&nbsp;&nbsp;(Kenyan Shilling)&nbsp;&nbsp;&nbsp;&nbsp;KES12,345,678.99</option>
										<option value="77">Korea (South)&nbsp;&nbsp;&nbsp;&nbsp;(Won)&nbsp;&nbsp;&nbsp;&nbsp;₩12,345,679</option>
										<option value="95">Kuwait&nbsp;&nbsp;&nbsp;&nbsp;(Kuwaiti Dinar)&nbsp;&nbsp;&nbsp;&nbsp;KWD12,345,678.994</option>
										<option value="74">Kyrgyzstan&nbsp;&nbsp;&nbsp;&nbsp;(Som)&nbsp;&nbsp;&nbsp;&nbsp;лв12,345,678.99</option>
										<option value="21">Latvia&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€</option>
										<option value="70">Lebanon&nbsp;&nbsp;&nbsp;&nbsp;(Lebanese Pound)&nbsp;&nbsp;&nbsp;&nbsp;£12,345,678.99</option>
										<option value="96">Libya&nbsp;&nbsp;&nbsp;&nbsp;(Libyan Dinar)&nbsp;&nbsp;&nbsp;&nbsp;LYD12,345,678.994</option>
										<option value="103">Liechtenstein&nbsp;&nbsp;&nbsp;&nbsp;(Swiss Franc)&nbsp;&nbsp;&nbsp;&nbsp;CHF12’345’678.99</option>
										<option value="19">Lithuania&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€</option>
										<option value="34">Luxembourg&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€</option>
										<option value="33">Luxembourg&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€</option>
										<option value="98">Macao&nbsp;&nbsp;&nbsp;&nbsp;(Pataca)&nbsp;&nbsp;&nbsp;&nbsp;MOP12,345,678.99</option>
										<option value="64">Malaysia&nbsp;&nbsp;&nbsp;&nbsp;(Ringgit)&nbsp;&nbsp;&nbsp;&nbsp;RM12,345,678.99</option>
										<option value="99">Maldives&nbsp;&nbsp;&nbsp;&nbsp;(Rufiyaa)&nbsp;&nbsp;&nbsp;&nbsp;MVR12,345,678.99</option>
										<option value="79">Malta&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;€12,345,678.99</option>
										<option value="49">Mexico&nbsp;&nbsp;&nbsp;&nbsp;(Mexican Peso)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99</option>
										<option value="18">Monaco&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€</option>
										<option value="81">Mongolia&nbsp;&nbsp;&nbsp;&nbsp;(Tugrik)&nbsp;&nbsp;&nbsp;&nbsp;₮12,345,678.99</option>
										<option value="97">Morocco&nbsp;&nbsp;&nbsp;&nbsp;(Dirham)&nbsp;&nbsp;&nbsp;&nbsp;MAD12,345,678.99</option>
										<option value="44">Netherlands&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;€12.345.678,99</option>
										<option value="49">New Zealand&nbsp;&nbsp;&nbsp;&nbsp;(NZ Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99</option>
										<option value="55">Nicaragua&nbsp;&nbsp;&nbsp;&nbsp;(Cordoba Oro)&nbsp;&nbsp;&nbsp;&nbsp;C$12,345,678.99</option>
										<!--[KT] 06/05/2020 - ccyNGN ₦ ₦1,234.56 -->
										<option value="104">Nigeria&nbsp;&nbsp;&nbsp;&nbsp;(Naira)&nbsp;&nbsp;&nbsp;&nbsp;₦12,345,678.99</option>
										<option value="25">Norway&nbsp;&nbsp;&nbsp;&nbsp;(Norwegian Krone)&nbsp;&nbsp;&nbsp;&nbsp;kr12 345 678,99</option>
										<option value="68">Norway&nbsp;&nbsp;&nbsp;&nbsp;(Norwegian Krone)&nbsp;&nbsp;&nbsp;&nbsp;kr12,345,678.99</option>
										<option value="86">Oman&nbsp;&nbsp;&nbsp;&nbsp;(Rial Omani)&nbsp;&nbsp;&nbsp;&nbsp;﷼12,345,678.994</option>
										<option value="76">Pakistan&nbsp;&nbsp;&nbsp;&nbsp;(Pakistan Rupee)&nbsp;&nbsp;&nbsp;&nbsp;₨12,345,678.99</option>
										<option value="52">Panama&nbsp;&nbsp;&nbsp;&nbsp;(Balboa)&nbsp;&nbsp;&nbsp;&nbsp;B/.12,345,678.99</option>
										<option value="39">Paraguay&nbsp;&nbsp;&nbsp;&nbsp;(Guarani)&nbsp;&nbsp;&nbsp;&nbsp;Gs12.345.679</option>
										<option value="65">Peru&nbsp;&nbsp;&nbsp;&nbsp;(Sol)&nbsp;&nbsp;&nbsp;&nbsp;S/.12,345,678.99</option>
										<option value="82">Philippines&nbsp;&nbsp;&nbsp;&nbsp;(Philippine Peso)&nbsp;&nbsp;&nbsp;&nbsp;₱12,345,678.99</option>
										<option value="17">Poland&nbsp;&nbsp;&nbsp;&nbsp;(Zloty)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99zł</option>
										<option value="18">Portugal&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€</option>
										<option value="85">Qatar&nbsp;&nbsp;&nbsp;&nbsp;(Qatari Rial)&nbsp;&nbsp;&nbsp;&nbsp;﷼12,345,678.99</option>
										<option value="31">Romania&nbsp;&nbsp;&nbsp;&nbsp;(Romanian Leu)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99lei</option>
										<option value="23">Russian Federation&nbsp;&nbsp;&nbsp;&nbsp;(Ruble)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99₽</option>
										<option value="85">Saudi Arabia&nbsp;&nbsp;&nbsp;&nbsp;(Saudi Riyal)&nbsp;&nbsp;&nbsp;&nbsp;﷼12,345,678.99</option>
										<option value="51">Singapore&nbsp;&nbsp;&nbsp;&nbsp;(Singapore Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99</option>
										<option value="20">Slovakia&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€</option>
										<option value="34">Slovenia&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€</option>
										<option value="62">South Africa&nbsp;&nbsp;&nbsp;&nbsp;(Rand)&nbsp;&nbsp;&nbsp;&nbsp;R12,345,678.99</option>
										<option value="62">South Africa&nbsp;&nbsp;&nbsp;&nbsp;(Rand)&nbsp;&nbsp;&nbsp;&nbsp;R12 345 678,99</option>
										<option value="33">Spain&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€</option>
										<option value="16">Sweden&nbsp;&nbsp;&nbsp;&nbsp;(Swedish Krona)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99kr</option>
										<option value="103">Switzerland&nbsp;&nbsp;&nbsp;&nbsp;(Swiss Franc)&nbsp;&nbsp;&nbsp;&nbsp;CHF12’345’678.99</option>
										<option value="47">Switzerland&nbsp;&nbsp;&nbsp;&nbsp;(Swiss Franc)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678.99CHF</option>
										<option value="102">Switzerland&nbsp;&nbsp;&nbsp;&nbsp;(Swiss Franc)&nbsp;&nbsp;&nbsp;&nbsp;CHF12’345’678.99</option>
										<option value="">Syrian Arab Republic&nbsp;&nbsp;&nbsp;&nbsp;(SYP)&nbsp;&nbsp;&nbsp;&nbsp;SYP 12,345,679</option>
										<option value="60">Taiwan&nbsp;&nbsp;&nbsp;&nbsp;(Taiwan Dollar)&nbsp;&nbsp;&nbsp;&nbsp;NT$12,345,678.99</option>
										<option value="75">Thailand&nbsp;&nbsp;&nbsp;&nbsp;(Baht)&nbsp;&nbsp;&nbsp;&nbsp;฿12,345,678.99</option>
										<option value="66">Trinidad & Tobago&nbsp;&nbsp;&nbsp;&nbsp;(T/T Dollar)&nbsp;&nbsp;&nbsp;&nbsp;TT$1,234.99</option>
										<option value="100">Tunisia&nbsp;&nbsp;&nbsp;&nbsp;(Tunisian Dinar)&nbsp;&nbsp;&nbsp;&nbsp;TND12,345,678.994</option>
										<option value="45">Turkey&nbsp;&nbsp;&nbsp;&nbsp;(Turkish Lira)&nbsp;&nbsp;&nbsp;&nbsp;₺12.345.678,99</option>
										<option value="22">Ukraine&nbsp;&nbsp;&nbsp;&nbsp;(Hryvnia)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99₴</option>
										<option value="87">United Arab Emirates&nbsp;&nbsp;&nbsp;&nbsp;(UAE Dirham)&nbsp;&nbsp;&nbsp;&nbsp;AED12,345,678.99</option>
										<option value="71">United Kingdom&nbsp;&nbsp;&nbsp;&nbsp;(GBP)&nbsp;&nbsp;&nbsp;&nbsp;£12,345,678.99</option>
										<option value="48">United States&nbsp;&nbsp;&nbsp;&nbsp;(US Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99</option>
										<option value="37">Uruguay&nbsp;&nbsp;&nbsp;&nbsp;(Peso Uruguayo)&nbsp;&nbsp;&nbsp;&nbsp;$U12.345.678,99</option>
										<option value="74">Uzbekistan&nbsp;&nbsp;&nbsp;&nbsp;(Uzbekistan Sum)&nbsp;&nbsp;&nbsp;&nbsp;лв12,345,678.99</option>
										<option value="46">Venezuela&nbsp;&nbsp;&nbsp;&nbsp;(Bolívar Soberano)&nbsp;&nbsp;&nbsp;&nbsp;VES12.345.678,99</option>
										<option value="32">Viet Nam&nbsp;&nbsp;&nbsp;&nbsp;(Dong)&nbsp;&nbsp;&nbsp;&nbsp;12.345.679₫</option>
										<option value="85">Yemen&nbsp;&nbsp;&nbsp;&nbsp;(Yemeni Rial)&nbsp;&nbsp;&nbsp;&nbsp;﷼12,345,678.99</option>
										<option value="101">Zimbabwe&nbsp;&nbsp;&nbsp;&nbsp;(ZWL)&nbsp;&nbsp;&nbsp;&nbsp;ZWL12,345,678.99</option>

									</select>
								</div>

								<div class="mb-6">
									<select name="date-select" id="date-select" class="calc-control">
										<option value="0">MM/DD/YYYY</option>
										<option value="1">DD/MM/YYYY</option>
										<option value="4">DD-MM-YYYY</option>
										<option value="3">DD.MM.YYYY</option>
										<option value="2">YYYY-MM-DD</option>
										<option value="5">YYYY.MM.DD</option>
										<option value="6">YYYY/MM/DD</option>
									</select>
								</div>

							</div>
						</div>
						<div class="msg mb-6">
							<?php _e('The calculator will remember your choice. You may also change it at any time.', 'fc-loan-calculator') ?>
						</div>
						<div class="msg">
							<?php _e('Clicking "Save changes" will cause the calculator to reload. Your edits will be lost.', 'fc-loan-calculator') ?>
						</div>
					<?php
					}
					?>
				</div>
				<div class="modal-footer">
					<button id="CURRENCYDATE_cancel" type="button" class="btn btn-default" data-bs-dismiss="modal"><?php _e('Cancel', 'fc-loan-calculator') ?></button>
					<button id="CURRENCYDATE_save" type="button" class="btn btn-primary" data-bs-dismiss="modal"><?php _e('Save changes', 'fc-loan-calculator') ?></button>
				</div>
			</div>
		</div>
	</div>
	<!--CURRENCYDATE modal-->
	<!-- end currency date options -->
<?php
}
?>

<?php
// Check if the modal with ID "RPT" has already been rendered
if (!in_array('RPT', $ac_rendered_modals)) {
	// Add "RPT" to the array to prevent future duplicates
	$ac_rendered_modals[] = 'RPT';
?>
	<!-- report/schedule  -->
	<div class="modal ac-modal-plugin fade" id="RPT" tabindex="-1">
		<!-- should not use .modal-dialog-centered as modal get covered by ad at bottom of browser -->
		<div class="modal-dialog preview">
			<div class="modal-content ac-modal-content">
				<div class="modal-header">
					<h4 id="rpt-title" class="modal-title">
						<?php _e('Cash flow forecast...', 'fc-loan-calculator') ?>
					</h4>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<span class="sym text-3xl" aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body report p-0 m-0">
					<iframe id="rptFrame" name="rptFrame" class="rpt-iframe w-full h-full" src="about:blank" title="rptFrame"></iframe>
				</div>
				<div class="modal-footer">
					<button id="RPT_cancel" type="button" class="btn btn-primary btn-primary-inverse px-8 py-2" data-bs-dismiss="modal">
						<?php _e('Close', 'fc-loan-calculator') ?>
					</button>
				</div>
			</div>
		</div>
	</div>
	<!-- end report/schedule  -->
<?php
}
?>

<?php
// Check if the modal with ID "CHART" has already been rendered
if (!in_array('CHART', $ac_rendered_modals)) {
	// Add "CHART" to the array to prevent future duplicates
	$ac_rendered_modals[] = 'CHART';
?>
	<!-- charts -->
	<div class="modal ac-modal-plugin fade" id="CHART" tabindex="-1">
		<!-- should not use .modal-dialog-centered as modal get covered by ad at bottom of browser -->
		<div class="modal-dialog modal-dialog-scrollable preview">
			<div class="modal-content ac-modal-content">
				<div class="modal-header">
					<h4 id="chart-title" class="modal-title">
						<?php _e('Charts', 'fc-loan-calculator') ?>
					</h4>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<span class="sym text-3xl" aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body charts p-0 m-0">

					<div class="chart-bar">
						<canvas id="canvas1" width="400" height="150" aria-label="Chart 1 - annual totals" role="img"></canvas>
					</div>

					<div class="chart-bar">
						<canvas id="canvas2" width="400" height="150" aria-label="Chart 2 - running totals" role="img"></canvas>
					</div>

					<div class="chart chart-pie">
						<canvas id="canvas3" width="400" height="150" aria-label="Chart 3 - totals" role="img"></canvas>
					</div>

				</div>
				<div class="modal-footer">
					<button id="CHART_close" type="button" class="btn btn-primary btn-primary-inverse px-8 py-2" data-bs-dismiss="modal">
						<?php _e('Close', 'fc-loan-calculator') ?>
					</button>
				</div>
			</div>
		</div>
	</div>
	<!-- end charts -->
<?php
}
?>

<?php
// Check if the modal with ID "HLP" has already been rendered
if (!in_array('HLP', $ac_rendered_modals)) {
	// Add "HLP" to the array to prevent future duplicates
	$ac_rendered_modals[] = 'HLP';
?>
	<!-- user help modal -->
	<div class="modal ac-modal-plugin fade" id="HLP" tabindex="-1">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content ac-modal-content">
				<div class="modal-header">
					<h4 id="hlp-title" class="modal-title">
						<?php _e('Help', 'fc-loan-calculator') ?>
					</h4>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<span class="sym text-3xl" aria-hidden="true">&times;</span>
					</button>
				</div>
				<div id="hlp-content" class="modal-body hlp-content">

				</div>
				<div class="modal-footer">
					<button id="HLP_close" type="button" class="btn btn-primary px-8 py-2" data-bs-dismiss="modal">
						<?php _e('Close', 'fc-loan-calculator') ?>
					</button>
				</div>
			</div>
		</div>
	</div>
	<!--end modals-->
<?php
}
?>

<?php
// Check if the modal with ID "MSG" has already been rendered
if (!in_array('MSG', $ac_rendered_modals)) {
	// Add "MSG" to the array to prevent future duplicates
	$ac_rendered_modals[] = 'MSG';
?>
	<!-- message modal -->
	<div class="modal ac-modal-plugin fade" id="MSG" tabindex="-1">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content ac-modal-content">
				<div class="modal-header">
					<h4 id="msg-title" class="modal-title">
						<?php _e('Message', 'fc-loan-calculator') ?>
					</h4>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<span class="sym text-3xl" aria-hidden="true">&times;</span>
					</button>
				</div>
				<div id="msg-content" class="modal-body">

				</div>
				<div class="modal-footer">
					<button id="MSG_close" type="button" class="btn btn-primary px-8 py-2" data-bs-dismiss="modal">
						<?php _e('Close', 'fc-loan-calculator') ?>
					</button>
				</div>
			</div>
		</div>
	</div>
	<!--end message modal -->
<?php
}
?>

<!-- </div> -->
<!--id="ac-modals"-->

<!-- end dialog code -->

<!--end loan calculator widget-->