<?php get_header();
	global $post;

	$author_id = $post->post_author;
	$author_info = get_userdata($author_id);
	$area = get_post_meta($post->ID, 'rem_property_area', true);
	$property_type = get_post_meta($post->ID, 'rem_property_type', true);
	$address = get_post_meta($post->ID, 'rem_property_address', true);
	$latitude = get_post_meta($post->ID, 'rem_property_latitude', true);
	$longitude = get_post_meta($post->ID, 'rem_property_longitude', true);
	$city = get_post_meta($post->ID, 'rem_property_city', true);
	$country = get_post_meta($post->ID, 'rem_property_country', true);
	$purpose = get_post_meta($post->ID, 'rem_property_purpose', true);
	$status = get_post_meta($post->ID, 'rem_property_status', true);
	$property_details_cbs = get_post_meta( $post->ID, 'rem_property_detail_cbs', true );
	$property_images = get_post_meta( $post->ID, 'rem_property_images', true );
	$bedrooms = get_post_meta($post->ID, 'rem_property_bedrooms', true);
	$bathrooms = get_post_meta($post->ID, 'rem_property_bathrooms', true);
	$property_video = get_post_meta($post->ID, 'rem_property_video', true);
    global $rem_ob;
    $price = $rem_ob->get_price($post->ID);	

	$all_details = array();

	if ($area != '') {
		$all_details[__( 'Area', 'landz' )] = $area;
	}

	if ($property_type != '') {
		$all_details[__( 'Type', 'landz' )] = $property_type;
	}

	if ($address != '') {
		$all_details[__( 'Address', 'landz' )] = $address;
	}

	if ($city != '') {
		$all_details[__( 'City', 'landz' )] = $city;
	}

	if ($country != '') {
		$all_details[__( 'Country', 'landz' )] = $country;
	}

	if ($purpose != '') {
		$all_details[__( 'Purpose', 'landz' )] = $purpose;
	}

	if ($status != '') {
		$all_details[__( 'Status', 'landz' )] = $status;
	}

	if ($bedrooms != '') {
		$all_details[__( 'Bedrooms', 'landz' )] = $bedrooms;
	}

	if ($bathrooms != '') {
		$all_details[__( 'Bathrooms', 'landz' )] = $bathrooms;
	}

    if(has_filter('rem_display_single_property_details')) {
        $all_details = apply_filters('rem_display_single_property_details', $all_details);
    }	

?>
		<section id="property-content" class="ich-settings-main-wrap" style="max-width:1170px;margin:0 auto;">

			<div class="">
				<div class="row">

					<div id="post-<?php the_ID(); ?>" <?php post_class('col-sm-8 col-md-9'); ?>>
					<?php if( have_posts() ){ while( have_posts() ){ the_post(); ?>

						<?php if (isset($property_images) && is_array($property_images)) { ?>
							<span class="large-price"><?php echo $price; ?></span>

							<div class="fotorama" data-width="100%" data-fit="cover" data-max-width="100%" data-nav="thumbs" data-transition="flip">
								<?php foreach ($property_images as $id) {
									$image_url = wp_get_attachment_url( $id );
									echo '<img src="'.$image_url.'">';
								} ?>
							</div>
						<?php } ?>


						<!-- /.Secondo Row -->
						<div class="row">
							<div class="col-md-12">

								<!-- 6. Description -->
									<?php
										$hide_title = get_post_meta( get_the_id(), 'rem_post_title', true );
										if ($hide_title != 'hide') { ?>
											<div class="section-title line-style">
												<h3 class="title"><?php the_title(); ?></h3>
											</div>
										<?php }
									?>
								<div class="description">
									<?php the_content(); ?>
								</div>

								<div class="section-title line-style line-style">
									<h3 class="title"><?php _e( 'Details', 'landz' ); ?></h3>
								</div>
								<div class="details">
									<div class="row">
										<?php foreach ($all_details as $label => $value) { ?>
											<div class="col-sm-4 col-xs-6">
												<div class="details no-padding">
												  <div class="detail" style="padding: 6px 15px;">
													<strong><?php echo $label; ?></strong> : <?php echo $value; ?>
												  </div>
												</div>											
											</div>
										<?php } ?>
									</div>
								</div>
								
								<?php if (isset($property_details_cbs) && is_array($property_details_cbs)) { ?>
									<div class="section-title line-style line-style">
										<h3 class="title"><?php _e( 'Features', 'landz' ); ?></h3>
									</div>
									<div class="details">
										<div class="row">
											<?php foreach ($property_details_cbs as $option_name => $value) { ?>
												<div class="col-sm-4 col-xs-6">
													<span class="detail"><i class="fa fa-square"></i>
														<?php echo (str_replace('_', ' ', ucwords($option_name))); ?>
													</span>
												</div>
											<?php } ?>
										</div>
									</div>
								<?php } ?>
								
								<?php if (isset($property_video) && $property_video != '') { ?>
									<div class="section-title line-style line-style">
										<h3 class="title"><?php _e( 'Video', 'landz' ); ?></h3>
									</div>
									<div class="details">
										<div class="row">
											<div class="col-sm-12 video-wrap">
												<?php echo apply_filters( 'the_content', $property_video ); ?>
											</div>
										</div>
									</div>
								<?php } ?>

								<?php if ($latitude != '') { ?>
									<!-- 8. Maps -->
									<div class="section-title line-style">
										<h3 class="title"><?php _e( 'Find this property on map', 'landz' ); ?></h3>
									</div>
									<div class="map-container" id="map-canvas"></div>
									<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBbpbij9IIXGftKhFLMHOuTpAbFoTU_8ZQ"></script>
									<script>
										function initialize() {
											var lat = <?php echo $latitude; ?>;
											var lon = <?php echo $longitude; ?>;
											var zoom = 10;
											var myLatLng = new google.maps.LatLng(lat, lon);
											var mapProp = {
												center:myLatLng,
												zoom:zoom,
												mapTypeId:google.maps.MapTypeId.ROADMAP
											};

											var map=new google.maps.Map(document.getElementById("map-canvas"),mapProp);
											var image = '<?php echo plugins_url( "pin-maps.png", __FILE__ ); ?>';
											var beachMarker = new google.maps.Marker({
												position: myLatLng,
												map: map,
												icon: image
											});											
										}
											google.maps.event.addDomListener(window, 'load', initialize);
									</script>
								
								<?php } ?>

								<div class="section-title line-style">
									<h3 class="title"><?php _e( 'Tags', 'landz' ); ?></h3>
								</div>
								<?php
									$terms = wp_get_post_terms( get_the_id() ,'rem_property_tag' );
									 
									echo '<div id="filter-box">';
									 
									foreach ( $terms as $term ) {
									 
									    // The $term is an object, so we don't need to specify the $taxonomy.
									    $term_link = get_term_link( $term );
									    
									    // If there was an error, continue to the next term.
									    if ( is_wp_error( $term_link ) ) {
									        continue;
									    }
									 
									    // We successfully got a link. Print it out.
									    echo '<a class="filter" href="' . esc_url( $term_link ) . '">' . $term->name . ' <span class="glyphicon glyphicon-tags"></span></a>';
									}
									 
									echo '</div>';
								?>
							</div>
						</div>
					<?php } } ?>
					</div>

					<div class="col-sm-4 col-md-3">
						<?php do_action( 'rem_single_property_agent', $author_id ); ?>
					</div>

				</div>
			</div>
		</section>
<?php get_footer(); ?>