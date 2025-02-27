<?php

use MatrixAddons\EasyInvoice\Models\LineItemModel;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

global $ei_invoice;

$line_items = $ei_invoice->get_line_items();

?>
<div class="ei-invoice-items">
	<table>
		<thead>
		<tr class="center-text">
			<th class="quantity center-text"><strong><?php echo esc_html(easy_invoice_get_text('quantity')) ?></strong>
			</th>
			<th class="service"><strong><?php echo esc_html(easy_invoice_get_text('service')) ?></strong></th>
			<th class="rate"><strong><?php echo esc_html(easy_invoice_get_text('rate')) ?></strong></th>
			<?php if (easy_invoice_show_hide_adjust()) { ?>
				<th class="adjust"><strong><?php echo esc_html(easy_invoice_get_text('adjust')) ?></strong></th>
			<?php } ?>
			<th class="total"><strong><?php echo esc_html(easy_invoice_get_text('sub_total')) ?></strong></th>
		</tr>
		</thead>
		<tbody>
		<?php
		/** @var LineItemModel $line_item */
		foreach ($line_items as $line_item) { ?>
			<tr class="">
				<td class="quantity center-text"><?php echo esc_html($line_item->get_quantity()); ?></td>
				<td class="service">
					<span class="service-title"><?php echo esc_html($line_item->get_item_title()); ?></span>
					<br/>
					<span class="service-description"><?php echo esc_html($line_item->get_description()); ?></span>
				</td>
				<td class="rate center-text"><?php echo esc_html(easy_invoice_get_price($line_item->get_rate(), '', $ei_invoice->get_id())); ?></td>
				<?php if (easy_invoice_show_hide_adjust()) { ?>
					<td class="adjust center-text"><?php echo esc_html($line_item->get_adjust()); ?>%</td>
				<?php } ?>
				<td class="total center-text"><?php echo esc_html(easy_invoice_get_price($line_item->get_amount(), '', $ei_invoice->get_id())); ?></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>
