<?php if ($stock_quantity) : ?>
<?php
$total_quantity = $sale_stock_quantity + $stock_quantity;

// Calculate sale percentage and round to the nearest whole number
$sale_percentage = round(($sale_stock_quantity / $total_quantity) * 100);

// Define levels from settings or set default values
$first_level = $settings['level_one'] ?? 33;  // Default to 33 if not set
$second_level = $settings['level_two'] ?? 66; // Default to 66 if not set
$third_level = $settings['level_three'] ?? 100; // Default to 100 if not set

// Set bar class based on the percentage compared to levels
if ($sale_percentage < $first_level) {
    $bar_class = 'border-green'; // Less than Level One
} elseif ($sale_percentage >= $first_level && $sale_percentage < $second_level) {
    $bar_class = 'border-yellow'; // Between Level One and Level Two
} elseif ($sale_percentage >= $second_level && $sale_percentage < $third_level) {
    $bar_class = 'border-red'; // Between Level Two and Level Three
} else { // Greater than or equal to Level Three
    $bar_class = 'border-red'; // Level Three and above
}
?>




    <?php if (isset($settings['show_product_progress']) && $settings['show_product_progress']) : ?>
        <?php if (!get_post_meta(get_the_ID(), 'meta_show_progress', true)) : ?>
            <div class="wps_order order-<?php echo esc_attr($settings['position_order_four']); ?>">
                <div class="mr_product_progress">
                    <div class="product-single-item-bar">
                     
						<span class="<?php echo esc_attr($bar_class); ?>" style="max-width: 100%!important; width: <?php echo esc_attr($sale_percentage); ?>%;"></span>
                    </div>

					
                    <div class="product-single-item-sold">
                        <p><?php echo esc_html($settings['sold_text']); ?>
							
							
<?php
// Fetch the selected option from Elementor settings for percentage digit format
$selected_digit_option = $settings['product_percenatge_digot'];

// Fetch the percentage value (this is assumed to be pre-calculated)
$percentage_value = 100 - $sale_percentage; // Adjust logic to calculate percentage if necessary

// Format percentage based on the selected option
if ($selected_digit_option === 'digit_all') {
    // Full number (up to 6 decimal places)
    $formatted_percentage = round($percentage_value); // Up to 6 decimal places
} elseif ($selected_digit_option === 'digit_two') {
    // Show two digits after the decimal
    $formatted_percentage = number_format($percentage_value, 2); // Two digits after the decimal
}else {
    // Default fallback (full number with 6 decimal places)
    $formatted_percentage = round($percentage_value);
}

// Display the formatted percentage with a % sign
echo '<span>' . esc_attr($formatted_percentage) . '<span class="wps_progress_percentage">%</span></span>';
?>

							
						</p>
                    </div>
					
					
					
		
					
					 

					
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>

