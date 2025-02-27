<?php 
	$id = isset($attributes['anchor']) ? $attributes['anchor'] : uniqid('geounit_map_block');
	
	$classes = 'geounit_map_block '; 
	$classes .= isset($attributes['className']) ? $attributes['className'] : '';
	if(array_key_exists('align', $attributes)) {
		switch ($attributes['align']) {
			case 'wide':
			$classes .= ' alignwide';
			break;
			case 'full':
			$classes .= ' alignfull';
			break;
		}
	}
?>

<div id="<?php echo esc_attr($id) ?>" class="<?php echo esc_attr($classes) ?>" style="height: <?php echo esc_attr($attributes['height']) ?>px"></div>
<script>
	( function(){
		function is_loading() {
			return document.body.classList.contains("loading");
		}
		
		function initialize() {
			var map = L.map("<?php echo esc_attr($id) ?>").setView(["<?php echo esc_attr($attributes['lat']) ?>", "<?php echo esc_attr($attributes['lng']) ?>"], "<?php echo esc_attr($attributes['zoom']) ?>");

			L.tileLayer( "<?php echo str_replace('&amp;', '&', esc_attr($attributes['themeurl'])) ?>&_nonce=<?php echo wp_create_nonce( 'get_tiles') ?>", {
				attribution: '<?php echo wp_kses($attributes['themeattribution'], wp_kses_allowed_html(['a' => ['target' => '_blank', 'href' => []]])) ?>'
			}).addTo(map);

			<?php if($attributes['disablescrollzoom']) { ?>
				map.scrollWheelZoom.disable();
			<?php } ?>
	
			<?php if(!$attributes['disablemarker']) { ?>
				const markerIcon = L.divIcon({
					html: `
						<svg
							width="<?php echo esc_attr($attributes['iconsize'] / 2) ?>"
							height="<?php echo esc_attr($attributes['iconsize']) ?>"
							fill="none"
							xmlns="http://www.w3.org/2000/svg"
							viewBox="0 0 500 820"
						>
							<defs>
							<linearGradient x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="matrix(2.30025e-15,-37.566,37.566,2.30025e-15,416.455,540.999)" id="map-marker-38-f">
								<stop offset="0" stop-color="rgb(18,111,198)"/>
								<stop offset="1" stop-color="rgb(76,156,209)"/>
							</linearGradient>
							<linearGradient x1="0" y1="0" x2="1" y2="0"
								gradientUnits="userSpaceOnUse"
								gradientTransform="matrix(1.16666e-15,-19.053,19.053,1.16666e-15,414.482,522.486)"
								id="map-marker-38-s">
								<stop offset="0" stop-color="rgb(46,108,151)"/>
								<stop offset="1" stop-color="rgb(56,131,183)"/>
							</linearGradient>
							</defs>
							<g transform="matrix(19.5417,0,0,19.5417,-7889.1,-9807.44)">
							<path fill="none" d="M421.2,515.5c0,2.6-2.1,4.7-4.7,4.7c-2.6,0-4.7-2.1-4.7-4.7c0-2.6,2.1-4.7,4.7-4.7 C419.1,510.8,421.2,512.9,421.2,515.5z"/>
							<path d="M416.544,503.612C409.971,503.612 404.5,509.303 404.5,515.478C404.5,518.256 406.064,521.786 407.194,524.224L416.5,542.096L425.762,524.224C426.892,521.786 428.5,518.433 428.5,515.478C428.5,509.303 423.117,503.612 416.544,503.612ZM416.544,510.767C419.128,510.784 421.223,512.889 421.223,515.477C421.223,518.065 419.128,520.14 416.544,520.156C413.96,520.139 411.865,518.066 411.865,515.477C411.865,512.889 413.96,510.784 416.544,510.767Z" stroke-width="1.1px" fill="<?php echo esc_attr($attributes['markercolor']) ?>" stroke="<?php echo esc_attr($attributes['markercolor']) ?>"/>
							</g>
						</svg>`,
					className: "svg-icon",
					iconSize: [<?php echo esc_attr($attributes['iconsize'] / 2) ?>, <?php echo esc_attr($attributes['iconsize']) ?>],
					iconAnchor: [<?php echo esc_attr($attributes['iconsize'] / 4) ?>, <?php echo esc_attr($attributes['iconsize']) ?>]
				});

				marker = L.marker(["<?php echo esc_attr($attributes['lat']) ?>", "<?php echo esc_attr($attributes['lng']) ?>"], {icon: markerIcon}).addTo(map);
			
				<?php if( !empty(esc_attr($attributes['content'])) ) : ?>
					text_content = "<?php echo str_replace(array("\n","\r"),'<br />', esc_attr($attributes["content"]));?>";
					marker.bindTooltip("<p>" + text_content + "</p>");
				<?php endif; ?>
			<?php } ?>

			var timer = 100;
			function checkRender() {
				if( is_loading()) {
					setTimeout(function(){
						checkRender();
					}, timer);
				} else {
					map.invalidateSize(true);
				}
			}

			var container = document.getElementById("<?php echo esc_attr($id) ?>");
			var observer = ResizeObserver && new ResizeObserver(function() {
				map.invalidateSize(true);
			});

			observer && observer.observe(container);
		}

		document.addEventListener("DOMContentLoaded", initialize);
	} )();
</script>