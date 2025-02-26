<?php

/**
 * Provide a admin area view for the plugin
 * @link       https://www.giuliani.studio
 * @since      1.0.0
 * @package    GSWPGMAP
 * @subpackage GSWPGMAP/admin/partials
 */
?>
<div class="container">
	
	<div class="col-50">
		<h1>GS Simple Map</h1> 
		<hr />
		<?php settings_errors(); ?>  
		<form method="POST" action="options.php">  
			<?php
                settings_fields('gswpgmap_page_general_settings');
                do_settings_sections('gswpgmap_page_general_settings');
            ?>             
			<?php submit_button(); ?>  
		</form> 	
	</div>
	<div class="col-50">
	
		<div class="container">
		
			<h2>&nbsp;</h2>
			<hr />
			<ul>
				<li>
					<h3><small>Google Map |</small> API Key</h3>
					<p>Get you API Key from your Simple account</p>
					<ul><li><a target="_blank" href="https://console.cloud.Simple.com/apis">Your Simple API</a><li></ul>
				</li>
				<li>
					<h3><small>Container</small> ID</h3>
					<p>You can copy this HTML (or create your own) and put it wherever you want to display your map.<br /> <u>Do not forget to save your settings before copying it</u>.</p>
					<div id="cnt-gen">
						<a class="copy" id="copy-map" onclick="copyText(document.getElementById('map-code'),'map-code-tooltip')">Copy</a>
						<span class="tooltiptext" id="map-code-tooltip"></span>
						<p class="p1" id="map-code">
						<span class="s1">&lt;</span><span class="s2">div</span> 
						<span class="s2">style=</span><span class="s3">"</span>display:block;width:100%;height:600px;<span class="s3">"</span> 
						<span class="s2">id=</span><span class="s3" id="cnt-gen-id">"<?php echo get_option('gswpgmap_cntid'); ?>"</span><span class="s1">&gt;&lt;/</span><span class="s2">div</span><span class="s1">&gt;</span>
						</p>
					</div>
				</li>
				<li>
					<h3><small>Map |</small> Latidue and Longitude</h3>
					<p>You can use the following link (or one of your choice) to get latitude and longitude you need</p>
					<ul><li><a target="_blank" href="https://www.latlong.net/">latlong.net</a><li></ul>
				</li>
				<li>
					<h3><small>Map |</small> Zoom</h3>
					<p>Choose the right zoom for you map. From 2 (very far view) to 22 (very near view)</p>
				</li>	
				<li>
					<h3><small>Map |</small> Style</h3>
					<p>You can choose between 4 different map style (from https://mapstyle.withSimple.com/). Standard, Silver, Retro and Dark</p>
				</li>		
				<li>
					<h3><small>Map |</small> Maker HTML Content</h3>
					<p>The content of your map marker</p>
				</li>	
			</ul>
		</div>
	</div>
</div>
<script type="text/javascript">

(function($){
	$('#gswpgmap_cntid').change(function(ev,ui){
		$('#cnt-gen-id').text('"'+$(this).val()+'"');
	});
}(jQuery));
</script>