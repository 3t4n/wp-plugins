<?php
namespace ProfitBlue\Admin\DataSetting;

use ProfitBlue\Blocks\PaymentCostsBlock;
use ProfitBlue\Models\PaymentCostsModel;
use ProfitBlue\Helpers\Helper;

$payment_cost = new PaymentCostsModel();
$data = $payment_cost->get_payments_cost();

echo '<div class="payment-costs-wrap">';
	echo wp_kses( PaymentCostsBlock::get_payment_costs_block( $data ), Helper::get_allowed_tags() );	
echo '</div>';

