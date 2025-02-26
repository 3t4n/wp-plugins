<?php

	// Get the embed card type.
	$ee_data_type = '';
	if (isset($data['embed_extended_data'])) {
		$ee_data = $data['embed_extended_data'];
		$ee_data_type = isset($ee_data['type']) ? $ee_data['type'] : '';
	}

	// Get custom CSS content.
	$custom_css = trim( get_option('embed_extended_custom_css', '') );
	if ($custom_css) {
		$custom_css = preg_replace('#[\r\n|\r|\n]#', ' ', $custom_css);
		$custom_css = preg_replace('#\s{2,}#', ' ', $custom_css);
		$custom_css = $custom_css . PHP_EOL;
	}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php echo $data['title']; ?></title>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="canonical" href="<?php echo esc_url($data['url']); ?>" />
	<style>
		html, body { margin: 0; padding: 0; box-sizing: border-box; }
		*, *:before, *:after { box-sizing: inherit; }
		<?php if ($custom_css) : ?>/* Custom CSS. */
		<?php echo htmlspecialchars($custom_css); ?>
		<?php endif; ?>
	</style>
	<?php

	// Load required assets here if legacy card is NOT used.
	if (!(defined('EMBED_EXTENDED_LEGACY_CARD') && EMBED_EXTENDED_LEGACY_CARD)) {
		$index_css = Embed_Extended()->get_css('index', Embed_Extended::VERSION);
		echo '<link rel="stylesheet" href="' . $index_css . '" />' . PHP_EOL;

		if ('code' === $ee_data_type) {
			$highlight_css = Embed_Extended()->get_css('highlight.min', Embed_Extended::VERSION);
			$highlight_js = Embed_Extended()->get_js('highlight.min', Embed_Extended::VERSION);
			echo '<link rel="stylesheet" href="' . $highlight_css . '" />' . PHP_EOL;
			echo '<script src="' . $highlight_js . '"></script>' . PHP_EOL;
		}
	}

	// Prints custom CSS.
	if ($custom_css) {
		echo '<style>' . htmlspecialchars($custom_css) . '</style>';
	}

	?>
</head>
<body>
	<?php echo $data['html']; ?>
	<script src="<?php echo Embed_Extended()->get_js('embed-iframe', Embed_Extended::VERSION); ?>"></script>
</body>
</html>
