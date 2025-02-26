<?php

/**
 * @package  Arplay
 */

?>

<div class="wrap">

	<h1 style="margin-bottom: 20px">AR Play Shortcodes</h1>

	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab-1">Usage</a></li>
		<li><a href="#tab-2">Generate</a></li>
	</ul>

	<div class="tab-content">

		<div id="tab-1" class="tab-pane active">

			<h2>How to use AR Play Shortcode</h2>

			<p>Generate QR code with deep link on any page in your Wordpress application by adding AR Play Shortcode:</p>

			<p><code>[arplay class="your-custom-class"]path-to-model[/arplay]</code></p>

			<h3>Example with custom class: </h3>

			<p><code>[arplay class="qr-bordered"]path/to/model.zip[/arplay]</code></p>

			<p>Usage of class attribute is NOT mandatory.</p>

			<h3>Example without custom class: </h3>

			<p><code>[arplay]path/to/model.zip[/arplay]</code></p>

		</div>


		<div id="tab-2" class="tab-pane">

			<h2>Generate AR Play Shortcode</h2>

			<label for="path">Path to model</label>
			<br />
			<input type="text" id="path" placeholder="path/to/model.zip">
			<br /><br />
			<label for="path">Custom css class</label>
			<br />
			<input type="text" id="custom_class" placeholder="your-custom-class">
			<br /><br />
			<button type="button" id="generate" class="button button-primary">Generate</button>
			<br /><br />
			<div id="code"></div>
			<div id="img" style="margin-top: 20px"></div>
			<div id="btn" style="margin-top: 20px"></div>

		</div>

	</div>
</div>

<script>

	<?php

		$option = get_option('arplay_woocommerce');

		echo "var qr_text = '" . $option['button_text'] . "';"

	?>

	jQuery(function($) {

		$('#generate').on('click', function () {

			<?php
			$settings = get_option('arplay_plugin');
			$uuid = (isset($settings)) ? $settings['uuid'] : '';
			echo "var uuid='".$uuid."';"
			?>

			var path = $('#path').val();
			var custom_class = $('#custom_class').val();

			var shortcode = '<code>[arplay class="'+custom_class+'"]'+path+'[/arplay]</code>';
			$('#code').html(shortcode);

			var qr_src = '<?php echo get_option('arplay_api_url') ?>/generate-qr' + '?userId=' + uuid + '&modelName=' + path;
			var img_src = '<img src="'+qr_src+'" class="arplay-qr '+custom_class+'">';
			$('#img').html(img_src);

			var btn_url = '<?php echo get_option('arplay_app_url') ?>/' + uuid + '/' + path;
			var btn = '<a href="'+btn_url+'" class="arplay-btn ">'+qr_text+'</a>';
			$('#btn').html(btn);

		});

	});

</script>