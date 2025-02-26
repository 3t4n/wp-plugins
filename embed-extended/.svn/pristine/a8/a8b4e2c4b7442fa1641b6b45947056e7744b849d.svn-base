<?php

	// Get the embed card type.
	$ee_data_type = '';
	if (isset($data['embed_extended_data'])) {
		$ee_data = $data['embed_extended_data'];
		$ee_data_type = isset($ee_data['type']) ? $ee_data['type'] : '';
	}

	$is_legacy_card = defined('EMBED_EXTENDED_LEGACY_CARD') && EMBED_EXTENDED_LEGACY_CARD;

	// Load required assets here if legacy card is used.
	if ($is_legacy_card) {
		$index_css = Embed_Extended()->get_css('index', Embed_Extended::VERSION);
		echo '<link rel="stylesheet" href="' . $index_css . '" />' . PHP_EOL;

		if ('code' === $ee_data_type) {
			$highlight_css = Embed_Extended()->get_css('highlight.min', Embed_Extended::VERSION);
			$highlight_js = Embed_Extended()->get_js('highlight.min', Embed_Extended::VERSION);
			echo '<link rel="stylesheet" href="' . $highlight_css . '" />' . PHP_EOL;
			echo '<script src="' . $highlight_js . '"></script>' . PHP_EOL;
		}
	}

	// Render embed code card.
	if ('code' === $ee_data_type) {
		$url = esc_url($ee_data['url']);
		$title = $data['title'];
		$code = htmlspecialchars($ee_data['content']);

?>
<div class="ee-code">
	<div class="ee-code__info">
		<div class="ee-code__meta">
			<a href="<?php echo $url; ?>" target="_blank" rel="nofollow noopener noreferrer"><?php echo $title; ?></a>
		</div>
	</div>
	<pre><code id="file-content"><?php echo $code; ?></code></pre>
</div>
<script>
	window.addEventListener('DOMContentLoaded', function() {
		hljs.highlightBlock(document.getElementById('file-content'));
	});
</script>
<?php

	// Render default (embed html) card.
	} else {
		$url = esc_url($data['url']);
		$title = $data['title'];
		$thumbnail = $data['thumbnail_url'] ? esc_attr($data['thumbnail_url']) : null;
		$description = $data['description'] ? $data['description'] : null;
		$info = [];

		// Get the provider info.
		if ($data['provider_name']) {
			$info[] = $data['provider_url'] ?
				[$data['provider_name'], $data['provider_url']] :
				[$data['provider_name']];
		}

		// Get the author info.
		if ($data['author_name']) {
			$info[] = $data['author_url'] ?
				[$data['author_name'], $data['author_url']] :
				[$data['author_name']];
		}

?>
<div class="ee-card">
	<?php

		if ($thumbnail) {
			$thumbnail_position = get_option('embed_extended_thumbnail_position', 'top');
			if (!in_array($thumbnail_position, ['top', 'left', 'hide'])) {
				$thumbnail_position = 'top';
			}

			if ('hide' !== $thumbnail_position) {

	?>
	<div class="ee-card__thumb ee-card__thumb--<?php echo $thumbnail_position; ?>">
		<a href="<?php echo $url; ?>" target="_blank" rel="nofollow noopener noreferrer"
			style="background-image:url('<?php echo $thumbnail; ?>');"></a>
	</div>
	<?php

			}
		}

	?>
	<div class="ee-card__info">
		<div class="ee-card__title">
			<a href="<?php echo $url; ?>" target="_blank" rel="nofollow noopener noreferrer"><?php echo $title; ?></a>
		</div>
		<?php if ($description) : ?>
		<div class="ee-card__description"><?php echo $description; ?></div>
		<?php endif; ?>
		<?php if (count($info)) : ?>
		<div class="ee-card__meta">
			<?php

				foreach ($info as $index => $item) {
					echo $index > 0 ? ' | ' : '';
					echo isset($item[1]) ? '<a href="' . $item[1] . '" target="_blank" rel="nofollow noopener noreferrer">' : '<span>';
					echo $item[0];
					echo isset($item[1]) ? '</a>' : '</span>';
				}

			?>
		</div>
		<?php endif; ?>
	</div>
</div>
<?php

	}
