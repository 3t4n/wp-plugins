<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$block_wrapper_attributes_parts = explode("=", get_block_wrapper_attributes());

// attributes
$content_alignment = isset($block->context['wtrb/sloganTextAlignment']) ? $block->context['wtrb/sloganTextAlignment'] : "center";
$blockHeight = isset($block->context['wtrb/contentBoxHeight']) ? $block->context['wtrb/contentBoxHeight'] : 250;
$image_url = isset($attributes['image']['url']) ? $attributes['image']['url'] : "";
$image_alt = isset($attributes['image']['alt']) ? $attributes['image']['alt'] : "";
$image_objectfit = isset($block->context['wtrb/imageObjectFit']) ? $block->context['wtrb/imageObjectFit'] : "cover";
$image_aspectratio = isset($block->context['wtrb/imageAspectRatio']) ? $block->context['wtrb/imageAspectRatio'] : "1 / 1";
$border_radius = isset($block->context['wtrb/blockBorderRadius']) 
	? "border-radius: " . $block->context['wtrb/blockBorderRadius'] . "px" : "0px";

$content_padding = isset($block->context['wtrb/contentBoxPadding']) ? $block->context['wtrb/contentBoxPadding'] : 10;

$block_title = isset($attributes['sloganTitle']) ? $attributes['sloganTitle'] : "";
$block_description = isset($attributes['sloganDescription']) ? $attributes['sloganDescription'] : "";
$linked_post = isset($attributes['linkedPost']) ? $attributes['linkedPost'] : 0;
if (esc_attr($linked_post) > 0) {
	$post_url = get_permalink(esc_attr($linked_post));
}
$link_text = isset($attributes['linkText']) ? $attributes['linkText'] : "Read More";
$border_thickness = isset($attributes['linkBorderThickness']) ? $attributes['linkBorderThickness'] : 1;
$border_color = isset($attributes['linkBorderColor']) ? $attributes['linkBorderColor'] : "#999999";
$link_border_radius = isset($attributes['linkBorderRadius']) ? $attributes['linkBorderRadius'] : 30;
$link_pad_top_bottom = isset($attributes['linkPaddingTopBottom']) ? $attributes['linkPaddingTopBottom'] : 5;
$link_pad_left_right = isset($attributes['linkPaddingLeftRight']) ? $attributes['linkPaddingLeftRight'] : 10;
$link_margin_top = isset($attributes['linkMarginTop']) ? $attributes['linkMarginTop'] : 10;
$link_bg_color = isset($attributes['linkBGColor']) ? $attributes['linkBGColor'] : "#dddddd";
$link_target = isset($attributes['linkTarget']) ? $attributes['linkTarget'] : "_blank";
$title_tag = isset($block->context['wtrb/titleTag']) ? $block->context['wtrb/titleTag'] : "h3";
$description_tag = isset($block->context['wtrb/descriptionTag']) ? $block->context['wtrb/descriptionTag'] : "p";
$title_color = isset($block->context['wtrb/titleColor']) ? $block->context['wtrb/titleColor'] : "#000000";
$description_color = isset($block->context['wtrb/descriptionColor']) ? $block->context['wtrb/descriptionColor'] : "#444444";
?>

<div <?php echo sprintf("%s=\"%s\"",
	esc_attr($block_wrapper_attributes_parts[0]),
	esc_attr(str_replace('"', "", $block_wrapper_attributes_parts[1]))
	); ?>
	 style="<?php echo esc_attr($border_radius); ?>"
>
	<div class="wtrbmr__slogan_container wtrbmr__box_shadow">
		<div class="wtrbmr__slogan_card">
			<?php
			if("imagetop" === esc_attr($attributes['config'])) {
				echo sprintf('<div class="wtrbmr__slogan_photo" style="height: %spx">
				<img src="%s" alt="%s" style="aspect-ratio: %s; object-fit: %s;" />
				</div>',
					esc_attr($blockHeight),
					esc_url($image_url),
					esc_html($image_alt),
					esc_attr($image_aspectratio),
					esc_attr($image_objectfit)
				);
			}
			?>
			<div
				class="wtrbmr__slogan_content"
				style="height: <?php echo esc_attr($blockHeight); ?>px;"
			>
				<div
					class="wtrbmr__slogan_content_box"
					style="text-align: <?php echo esc_attr($content_alignment); ?>; padding: <?php echo esc_attr($content_padding); ?>px;"
				>
					<<?php echo esc_attr($title_tag); ?> class="wtrbmr__slogan_title" <?php echo strlen(esc_attr($title_color)) > 0 ? 'style="color: ' . esc_attr($title_color) . ';"' : ""; ?>
					>
						<?php echo esc_html($block_title); ?>
					</<?php echo esc_attr($title_tag); ?>>

					<<?php echo esc_attr($description_tag); ?> class="wtrbmr__slogan_description" <?php echo strlen(esc_attr($description_color)) > 0 ? 'style="color: ' . esc_attr($description_color) . ';"' : ""; ?>
					>
						<?php echo esc_html($block_description); ?>
					</<?php echo esc_attr($description_tag); ?>>

					<?php if(isset($post_url)): ?>
					<a
						class="wtrbmr__slogan_link"
						href="<?php echo esc_url($post_url); ?>"
						target="<?php echo esc_attr($link_target); ?>"
						style="border: <?php echo esc_attr($border_thickness); ?>px solid <?php echo esc_attr($border_color); ?>; border-radius: <?php echo esc_attr($link_border_radius); ?>px; padding: <?php echo esc_attr($link_pad_top_bottom); ?>px <?php echo esc_attr($link_pad_left_right); ?>px; margin-top: <?php echo esc_attr($link_margin_top); ?>px; background-color: <?php echo esc_attr($link_bg_color); ?>;"
					>
						<?php echo esc_html($link_text); ?>
					</a>
					<?php endif; ?>
				</div>
			</div>

			<?php
			if("imagebottom" === esc_attr($attributes['config'])) {
				echo sprintf('<div class="wtrbmr__slogan_photo" style="height: %spx">
				<img src="%s" alt="%s" style="aspect-ratio: %s; object-fit: %s;" />
				</div>',
					esc_attr($blockHeight),
					esc_url($image_url),
					esc_html($image_alt),
					esc_attr($image_aspectratio),
					esc_attr($image_objectfit)
				);
			}
			?>
		</div>
	</div>
</div>
