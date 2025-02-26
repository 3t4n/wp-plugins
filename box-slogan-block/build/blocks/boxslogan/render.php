<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// attributes
$block_desktop_gap = isset($attributes['gapDBetweenBlocks']) ? $attributes['gapDBetweenBlocks'] . "px" : "0";
$block_tablet_gap = isset($attributes['gapTBetweenBlocks']) ? $attributes['gapTBetweenBlocks'] . "px" : "0";
$block_mobile_gap = isset($attributes['gapMBetweenBlocks']) ? $attributes['gapMBetweenBlocks'] . "px" : "0";
$block_border_radius = isset($attributes['blockBorderRadius']) ? $attributes['blockBorderRadius'] . "px" : "0px";
$deskCol = isset($attributes['deskCols']) ? "wtrbs__dcols_" . $attributes['deskCols'] : "wtrbs__dcols_3";
$tabCols = isset($attributes['tabCols']) ? "wtrbs__tcols_" . $attributes['tabCols'] : "wtrbs__tcols_2";
$mobCols = isset($attributes['mobCols']) ? "wtrbs__mcols_" . $attributes['mobCols'] : "wtrbs__mcols_1";

// Block wrapper attributes
$block_wrapper_attributes_parts = explode("=", get_block_wrapper_attributes());
?>
<div <?php echo sprintf(
	'class="%s %s %s %s" style="border-radius: %s; --d-gap: %s; --t-gap: %s; --m-gap: %s;"',
	esc_attr($deskCol),
	esc_attr($tabCols),
	esc_attr($mobCols),
	esc_attr(str_replace('"', "", $block_wrapper_attributes_parts[1])),
	esc_attr($block_border_radius),
	esc_attr($block_desktop_gap),
	esc_attr($block_tablet_gap),
	esc_attr($block_mobile_gap)
); ?>>
	<?php
	echo wp_kses(
		$content, 
		[
			'div' => ['class' => [], 'style' => []],
			'p' => ['class' => [], 'style' => []],
			'a' => ['class' => [], 'href' => [], 'target' => [], 'style' => []],
			'h1' => ['class' => [], 'style' => []],
			'h2' => ['class' => [], 'style' => []],
			'h3' => ['class' => [], 'style' => []],
			'h4' => ['class' => [], 'style' => []],
			'h5' => ['class' => [], 'style' => []],
			'h6' => ['class' => [], 'style' => []],
			'img' => ['alt' => [], 'src' => []],
		]);
	?>
</div>