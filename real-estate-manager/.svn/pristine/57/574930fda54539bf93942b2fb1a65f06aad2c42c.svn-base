<?php
	global $rem_ob;
	$fields_to_show = (isset($attrs['fields_to_show'])) ? $attrs['fields_to_show'] : 'search,type,country,purpose' ;
	$fields_arr =  explode(',', $fields_to_show );
	$property_purposes = $rem_ob->get_all_property_purpose();
	$property_types = $rem_ob->get_all_property_types();
	$property_status = $rem_ob->get_all_property_status();
	$property_individual_cbs = $rem_ob->get_all_property_features();
	$columns = (isset($attrs['columns'])) ? $attrs['columns'] : 6 ;
?>
<div class="ich-settings-main-wrap">
<section id="rem-search-box" class="no-margin search-property-page">
	<form action="" id="search-property" data-ajaxurl="<?php echo admin_url( 'admin-ajax.php' ); ?>">
		<input type="hidden" name="action" value="rem_search_property">
		<div class="search-container fixed-map">
			<div class="search-options sample-page">
				<div class="searcher">
					<div class="row margin-div">
						
						<?php if (in_array('search', $fields_arr)) { ?>
							<div class="col-sm-6 col-md-<?php echo $columns ?> margin-bottom">
								<input class="form-control" type="text" name="keywords" id="keywords" placeholder="Keywords" />
							</div>
						<?php } ?>
						
						<?php if (in_array('purpose', $fields_arr)) { ?>
							<div class="col-sm-6 col-md-<?php echo $columns ?> margin-bottom">
								<select class="dropdown" data-settings='{"cutOff": 5}' name="purpose">
									<option value="">-- <?php _e( 'Any Purpose', 'wcp-rem' ); ?> --</option>
									<?php
										foreach ($property_purposes as $val => $title) {
											echo '<option value="'.$val.'">'.$title.'</option>';
										}
									?>
								</select>
							</div>
						<?php } ?>
						
						<?php if (in_array('status', $fields_arr)) { ?>
							<div class="col-sm-6 col-md-<?php echo $columns ?> margin-bottom">
								<select class="dropdown" name="status" data-settings='{"cutOff": 5}'>
									<option value="">-- <?php _e( 'Any Status', 'wcp-rem' ); ?> --</option>
									<?php
										foreach ($property_status as $val => $title) {
											echo '<option value="'.$val.'">'.$title.'</option>';
										}
									?>
								</select>
							</div>
						<?php } ?>
						
						<?php if (in_array('type', $fields_arr)) { ?>
							<div class="col-sm-6 col-md-<?php echo $columns ?> margin-bottom">
								<select class="dropdown" data-settings='{"cutOff": 5}' name="type">
									<option value="">-- <?php _e( 'Any Type', 'wcp-rem' ); ?> --</option>
									<?php
										foreach ($property_types as $val => $title) {
											echo '<option value="'.$val.'">'.$title.'</option>';
										}
									?>                     
								</select>
							</div>
						<?php } ?>
						
						<?php if (in_array('area', $fields_arr)) { ?>
							<div class="col-sm-6 col-md-<?php echo $columns ?> margin-bottom">
								<span id="label-property-size" data-text="Size"></span>
								<input class="form-control" type="text" name="area" placeholder="Area (in Square Foot)" id="property-size" value="" />
							</div>
						<?php } ?>
						
						<?php if (in_array('city', $fields_arr)) { ?>
							<div class="col-sm-6 col-md-<?php echo $columns ?> margin-bottom">
								<span id="label-property-city" data-text="City"></span>
								<input class="form-control" name="city" placeholder="City" type="text" id="property-city" value="" />
							</div>
						<?php } ?>
						
						<?php if (in_array('country', $fields_arr)) { ?>
							<div class="col-sm-6 col-md-<?php echo $columns ?> margin-bottom">
								<span id="label-property-country" data-text="Country"></span>
								<input class="form-control" placeholder="Country" name="country" type="text" id="property-country" value="" />
							</div>
						<?php } ?>
						
						<?php if (in_array('bedrooms', $fields_arr)) { ?>
							<div class="col-sm-6 col-md-<?php echo $columns ?> margin-bottom">
								<span id="label-property-bedrooms" data-text="bedrooms"></span>
								<input class="form-control" type="number" name="bedrooms" id="property-bedrooms" value="" placeholder="Bedrooms" />
							</div>
						<?php } ?>
						
						<?php if (in_array('bathrooms', $fields_arr)) { ?>
							<div class="col-sm-6 col-md-<?php echo $columns ?> margin-bottom">
								<span id="label-property-bathrooms" data-text="bathrooms"></span>
								<input class="form-control" type="number" name="bathrooms" id="property-bathrooms" value="" placeholder="Bathrooms" />
							</div>
						<?php } ?>
						
						<?php if (in_array('price', $fields_arr)) { ?>
							<div class="col-sm-6 col-md-<?php echo $columns ?> margin-bottom">
								<div class="slider" id="price-range">
								</div>
								<div class="price-slider price">
									<span id="price-value-min"></span> 
									<span class="separator">$</span>
									<span id="price-value-max"></span>
								</div>
								<input type="hidden" name="price_min" id="min-value">
								<input type="hidden" name="price_max" id="max-value">
							</div>
						<?php } ?>
					</div>
					<div class="row filter hide-filter hidden-xs hidden-sm">
						<?php
							foreach ($property_individual_cbs as $cb) { ?>
								<div class="col-xs-6 col-sm-4 col-md-3">
									<input class="labelauty" type="checkbox" name="detail_cbs[<?php echo $cb; ?>]" data-labelauty="<?php echo $cb; ?>">
								</div>
						<?php } ?>
					</div><!-- ./filter -->
					<div class="margin-div footer">
						<button type="button" class="btn btn-default more-button hidden-xs hidden-sm">
							<?php _e( 'More filters', 'wcp-rem' ); ?>
						</button>
						<button type="submit" class="btn btn-default search-button">
							<?php _e( 'Search', 'wcp-rem' ); ?>
						</button>
					</div><!-- ./footer -->
				</div><!-- ./searcher -->
			</div><!-- search-options -->
		</div><!-- search-container fixed-map -->
	</form>
</section>


<section id="grid-content" class="search-results">
	<div class="loader text-center margin-bottom" style="display:none;margin-top:20px;">
		<img src="<?php echo plugins_url( '/ajax-loader.gif' , __FILE__ ); ?>" alt="<?php _e( 'Loading...', 'wcp-rem' ); ?>">
	</div>
	<div class="searched-proerpties">
		
	</div>
</section>
</div>