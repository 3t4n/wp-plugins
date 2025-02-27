<div class="eso-count-query-result uk-margin-remove <?php echo esc_attr(implode(' ', $class)); ?>">
	<?php
	if ( !empty($found_posts) ) {
		echo $found_posts;
	} else {
		echo '0';
	}
	?>
</div>
