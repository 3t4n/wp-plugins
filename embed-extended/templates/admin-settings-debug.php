<h2 class="title"><?php _e('OEmbed Settings', 'embed-extended'); ?></h2>
<table class="wp-list-table widefat fixed striped comments">
	<thead>
		<tr>
			<th scope="col">
				<strong><?php _e('Setting Name', 'embed-extended'); ?></strong>
			</th>
			<th scope="col">
				<strong><?php _e('Setting Value', 'embed-extended'); ?></strong>
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>embed_oembed_discover</td>
			<td><?php var_export( apply_filters('embed_oembed_discover', true) ); ?></td>
		</tr>
		<tr>
			<td>oembed_ttl</td>
			<td><?php var_export( apply_filters('oembed_ttl', DAY_IN_SECONDS) ); ?></td>
		</tr>
		<tr>
			<td>rest_oembed_ttl</td>
			<td><?php var_export( apply_filters('rest_oembed_ttl', DAY_IN_SECONDS) ); ?></td>
		</tr>
	</tbody>
</table>

<?php $oembed = _wp_oembed_get_object(); ?>
<h2 class="title">
	<?php echo sprintf(
	/* translators: %s: Available oEmbed providers count. */
	__('OEmbed Providers (%d)', 'embed-extended'), count($oembed->providers) ); ?>
</h2>
<table class="wp-list-table widefat fixed striped comments">
	<thead>
		<tr>
			<th scope="col">
				<strong><?php _e('Pattern', 'embed-extended'); ?></strong>
			</th>
			<th scope="col">
				<strong><?php _e('Endpoint', 'embed-extended'); ?></strong>
			</th>
			<th scope="col">
				<strong><?php _e('Regex', 'embed-extended'); ?></strong>
			</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($oembed->providers as $pattern => $endpoint) : ?>
		<tr>
			<td><?php echo $pattern; ?></td>
			<td><?php echo $endpoint[0]; ?></td>
			<td><?php var_export( $endpoint[1] ); ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<h2 class="title"><?php _e('Legacy Embed Handlers', 'embed-extended'); ?></h2>
<table class="wp-list-table widefat fixed striped comments">
	<thead>
		<tr>
			<th scope="col">
				<strong><?php _e('Pattern', 'embed-extended'); ?></strong>
			</th>
			<th scope="col">
				<strong><?php _e('Handler', 'embed-extended'); ?></strong>
			</th>
			<th scope="col">
				<strong><?php _e('Priority', 'embed-extended'); ?></strong>
			</th>
		</tr>
	</thead>
	<tbody>
		<?php

		global $wp_embed;
		foreach ($wp_embed->handlers as $priority => $handlers) : foreach ($handlers as $handler) : ?>
		<tr>
			<td><?php echo $handler['regex']; ?></td>
			<td><?php echo $handler['callback']; ?></td>
			<td><?php echo $priority; ?></td>
		</tr>
		<?php endforeach; endforeach; ?>
	</tbody>
</table>

<br /><br />
<?php if ( isset($_GET['clear_cache']) ) Embed_Extended_Debug()->clear_cache(); ?>
<script type="text/javascript">
	function ee_clear_embed_cache() {
		var url = window.location.href;
		url = url.replace('&clear_cache=1', '') + '&clear_cache=1';
		window.location = url;
	}
</script>
<button class="button button-primary" onclick="ee_clear_embed_cache();">
	<?php _e('Clear Embed Cache and Transients', 'embed-extended'); ?>
</button>
