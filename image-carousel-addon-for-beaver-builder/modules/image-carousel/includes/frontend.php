<?php

/**
 * This file should be used to render each module instance.
 * You have access to two variables in this file:
 *
 * $module An instance of your module class.
 * $settings The module's settings.
 *
 * Example:
 */

?>

<!--https://stackoverflow.com/questions/34430211/how-to-show-only-4-slides-in-a-row-using-bxslider-->

<div class="fl-image-carousel">
	<?php if ( ! empty( $settings->images ) ) : ?>
        <div class="fl-content-main">
            <div class="fl-content-carousel">
				<?php foreach ( $settings->images as $key => $image ) : ?>
					<?php
					$attachment = wp_get_attachment_image_src( $image->photo, 'full' );

					if ( false !== $attachment ) {
						$img = "<img src='{$attachment[0]}' width='{$attachment[1]}' height='{$attachment[2]}' alt='{$image->label}'>";
						$item = ( '' !== $link ) ? "<a href='{$image->link}' title='{$image->label}' target='{$image->link_target}'>{$img}</a>" : $img;
						echo "<div class='fl-carousel-item'>{$item}</div>";
					}
					?>
				<?php endforeach; ?>
            </div>
        </div>
	<?php endif; ?>
</div>