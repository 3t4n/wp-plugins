<div class="ich-settings-main-wrap">
<section id="new-property">
	<form id="create-property" data-ajaxurl="<?php echo admin_url( 'admin-ajax.php' ); ?>">
		<input type="hidden" name="action" value="rem_create_pro_ajax">
		<input type="hidden" name="latitude" value="" class="map-latitude">
		<input type="hidden" name="longitude" value="" class="map-longitude">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<div class="info-block" id="basic">
						<div class="section-title line-style no-margin">
							<h3 class="title"><?php _e( 'Basic Information', 'wcp-rem' ); ?></h3>
						</div>
						<div class="row">
							<div class="col-md-5 space-form">
								<input id="title" class="form-control" type="text" required placeholder="<?php _e( 'Property Title', 'wcp-rem' ); ?>" name="title">
							</div>
							<div class="col-md-7 space-form">
								<input id="address" class="form-control" type="text" required placeholder="<?php _e( 'Address', 'wcp-rem' ); ?>" name="address">
							</div>
							<div class="col-md-12">
								<?php wp_editor( 'Property Description', 'rem-content', array('textarea_name' => 'content', 'editor_height' => 350 ) ); ?>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<div class="info-block" id="summary">
						<div class="section-title line-style">
							<h3 class="title"><?php _e( 'Summary', 'wcp-rem' ); ?></h3>
						</div>

						<div class="row">
							<div class="col-md-4 space-form">
								<input class="form-control" type="text" placeholder="<?php _e( 'Price in', 'wcp-rem' ); ?> <?php echo $price_symbol; ?>" name="price">
							</div>
							<div class="col-md-4 space-form">
								<input class="form-control" type="text" placeholder="<?php _e( 'Property Country', 'wcp-rem' ); ?>" name="country">
							</div>
							<div class="col-md-4 space-form">
								<input  class="form-control" type="text" placeholder="<?php _e( 'Property City', 'wcp-rem' ); ?>" name="city">
							</div>
							<div class="col-md-4 space-form">
								<select class="dropdown" data-settings='{"cutOff": 5}' name="purpose">
									<option value="">-- <?php _e( 'Any Purpose', 'wcp-rem' ); ?> --</option>
									<?php
										foreach ($property_purposes as $val => $title) {
											echo '<option value="'.$val.'">'.$title.'</option>';
										}
									?>
								</select>
							</div>
							<div class="col-md-4 space-form">
								<select class="dropdown" data-settings='{"cutOff": 5}' name="type">
									<option value="">-- <?php _e( 'Any Type', 'wcp-rem' ); ?> --</option>
									<?php
										foreach ($property_types as $val => $title) {
											echo '<option value="'.$val.'">'.$title.'</option>';
										}
									?>                     
								</select>
							</div>
							<div class="col-md-4 space-form">
								<select class="dropdown" name="status" data-settings='{"cutOff": 5}'>
									<option value="">-- <?php _e( 'Any Status', 'wcp-rem' ); ?> --</option>
									<?php
										foreach ($property_status as $val => $title) {
											echo '<option value="'.$val.'">'.$title.'</option>';
										}
									?>
								</select>
							</div>
							<div class="col-md-4 space-form">
								<input class="form-control" type="number" name="bathrooms" placeholder="<?php _e( 'Bathrooms', 'wcp-rem' ); ?>" id="bathroom" data-text="Bathroom" />
							</div>
							<div class="col-md-4 space-form">
								<input class="form-control" type="number" name="bedrooms" placeholder="<?php _e( 'Bedrooms', 'wcp-rem' ); ?>" id="bedroom" data-text="Bedroom" />
							</div>
							<div class="col-md-4 space-form">
								<input class="form-control" type="number" name="area" placeholder="<?php _e( 'Property Area (Square Foot)', 'wcp-rem' ); ?>" id="property-size" data-text="Size Property"/>
							</div>
						</div>
					</div>
					<div class="info-block" id="images">
						<div class="section-title line-style">
							<h3 class="title"><?php _e( 'Images', 'wcp-rem' ); ?></h3>
						</div>
						<p style="text-align: center">
							<button class="btn btn-default upload_image_button">
								<span class="dashicons dashicons-images-alt2"></span>
								<?php _e( 'Click here to Upload Images', 'wcp-rem' ); ?>
							</button>
						</p>
						<br>
						<br>
						<div class="thumbs-prev">

						</div>
						<div style="clear: both; display: block;"></div>						
					</div>

					<div class="info-block" id="features">
						<div class="section-title line-style">
							<h3 class="title"><?php _e( 'Features', 'wcp-rem' ); ?></h3>
						</div>
						<div class="row features-box">
							<?php
								foreach ($property_individual_cbs as $cb) {
								$key = (str_replace(' ', '_', strtolower($cb))); ?>
									<div class="col-xs-6 col-sm-4 col-md-3">
										<input class="labelauty" type="checkbox" name="detail_cbs[<?php echo $key; ?>]" data-labelauty="<?php echo $cb; ?>">
									</div>
							<?php } ?>
						</div>
					</div>

					<div class="info-block" id="tags">
						<div class="section-title line-style">
							<h3 class="title"><?php _e( 'Tags', 'wcp-rem' ); ?></h3>
						</div>
						<div class="row features-box">
							<div class="col-lg-12">
								<p><?php _e( 'Each tag separated by comma', 'wcp-rem' ); ?>  <code>,</code></p>
								<textarea class="form-control" name="tags"></textarea>
							</div>
						</div>
					</div>

					<div class="info-block" id="map">
						<div class="section-title line-style">
							<h3 class="title"><?php _e( 'Place on Map', 'wcp-rem' ); ?></h3>
						</div>
						<div id="map-canvas" style="height: 300px"></div>
							<script src="http://maps.googleapis.com/maps/api/js"></script>
							<script>
								function initialize() {
									var mapProp = {
										scrollwheel: false,
										zoom: 18,
										center: new google.maps.LatLng(-33.890542, 151.274856)
									};

									var map = new google.maps.Map(document.getElementById("map-canvas"),mapProp);
									var myLatLng = new google.maps.LatLng(-33.890542, 151.274856);
									var marker = new google.maps.Marker({
									  position: myLatLng,
									  map: map,
									  icon: '<?php echo plugins_url( "pin-drag.png", __FILE__ ); ?>',
									  draggable: true
									});
									google.maps.event.addListener(marker, 'drag', function(event) {
										jQuery('.map-latitude').val(event.latLng.lat());
										jQuery('.map-longitude').val(event.latLng.lng());
										jQuery('#position').text('Position: ' + event.latLng.lat() + ' , ' + event.latLng.lng() );
									});
									google.maps.event.addListener(marker, 'dragend', function(event) {
										jQuery('.map-latitude').val(event.latLng.lat());
										jQuery('.map-longitude').val(event.latLng.lng());
										jQuery('#position').text('Position: ' + event.latLng.lat() + ' , ' + event.latLng.lng() );
									});									
								}
								google.maps.event.addDomListener(window, 'load', initialize);
							</script>

						<div id="position"><i class="fa fa-map-marker"></i> <?php _e( 'Drag the pin to the location on the map', 'wcp-rem' ); ?></div>
					</div>
					<br>
					<input class="btn btn-default" type="submit" value="<?php _e( 'Create Property', 'wcp-rem' ); ?>">
					<br>
					<br>
					<div class="alert with-icon alert-info creating-prop" style="display:none;" role="alert">
						<i class="icon fa fa-info"></i>
						<span class="msg"><?php _e( 'Please wait! your porperty is being created...', 'wcp-rem' ); ?></span>
					</div>
				</div>
			</div>
	</form>
</section>
</div>