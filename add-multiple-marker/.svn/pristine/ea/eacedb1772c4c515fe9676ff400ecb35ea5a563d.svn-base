<div class="amm-admin-main-wrap">
	<div class="amm-map-create">
		<form class="amm-get-location" method="post" action="">
			<?php wp_nonce_field(); ?>
			<div class="amm-map-content full">
				<!-- header start -->
				<div class="amm-map-header full">
					<div class="amm-container clearfix">
						<div class="amm-logo">
							<img src="<?php echo ADDMULTIPLEMARKER_PLUGIN_URL ?>admin/images/amm-logo.png" alt="logo">
						</div>
						<div class="sidebar-action">
							<img src="<?php echo ADDMULTIPLEMARKER_PLUGIN_URL ?>admin/images/svg/menu.svg" alt="menu" class="imgsvg">
						</div>
						<div class="amm-search-action">
							<a href="javascript:;"><?php _e( 'Search Location', 'addmultiplemarker' ); ?></a>
						</div>
						<!-- search bar start -->
						<div class="amm-map-search-bar">
							<div class="wraps">
								<span class="amm-icon amm-search">
									<img src="<?php echo ADDMULTIPLEMARKER_PLUGIN_URL ?>admin/images/svg/search.svg" alt="search" class="imgsvg">
								</span>
								<input type="search" id="amm_search_area" name="amm_search_area" placeholder="Search your location area" class="amm-map-search-input">
								<div class="search-close">
									<span class="amm-icon">
										<img src="<?php echo ADDMULTIPLEMARKER_PLUGIN_URL ?>admin/images/svg/close.svg" alt="close" class="imgsvg">
									</span>
								</div>
							</div>
						</div>
						<!-- search bar close -->
					</div>
				</div>
				<!-- header close -->
				<!-- body start -->
				<div class="amm-map-body">
					<!-- Map start -->
					<div class="amm-map">
						<div id="amm-map"></div>
					</div>
					<!-- Map close -->
				</div>
				<!-- body close -->
			</div>
			<!-- sidebar start -->
			<div class="amm-map-sidebar off">
				<div class="wraps">
					<h2><?php _e( 'Customise the map with below steps.', 'addmultiplemarker' ); ?></h2>
					<div class="amm-map-panel">
						<div class="amm-panel-header">
							<h3>
								<span class="number"><?php _e( '1.', 'addmultiplemarker' ); ?></span>
								<span class="text"><?php _e( 'Select marker pin.', 'addmultiplemarker' ); ?></span>
							</h3>
						</div>
						<div class="amm-panel-body">
							<div id="amm-marker-imgs"></div>
						</div>
					</div>
					<div class="amm-map-panel">
						<div class="amm-panel-header">
							<h3>
								<span class="number"><?php _e( '2.', 'addmultiplemarker' ); ?></span>
								<span class="text"><?php _e( 'Select shape tool color to define service area.', 'addmultiplemarker' ); ?></span>
							</h3>
						</div>
						<div class="amm-panel-body">
							<!-- Map custom color start -->
							<div id="amm-color-square"></div>
							<input id="color-field" class="color-field" type="text" name="amm_map_color" value="<?php echo ( isset( $color ) ? $color : '#fffff' ); ?>" placeholder="<?php _e( 'color code', 'addmultiplemarker' ); ?>" onChange="createColorTags(this.value)"/>
							<!-- Map custom color close -->
						</div>
					</div>
					<div class="amm-map-panel">
						<div class="amm-panel-header">
							<h3>
								<span class="number"><?php _e( '3.', 'addmultiplemarker' ); ?></span>
								<span class="text"><?php _e( 'Now you can drop marker using drawing tools inside the map or use circle/polygon tool to define service region you cover and then save the map.', 'addmultiplemarker' ); ?></span>
							</h3>
						</div>
						<div class="amm-panel-body">
							<img src="<?php echo ADDMULTIPLEMARKER_PLUGIN_URL ?>admin/images/tools.jpg" alt="tools">
						</div>
					</div>
					<div class="amm-map-panel">
						<div class="amm-panel-body">
							<div class="amm-short-code">
								<p><?php _e( 'After making all changes, save the map and copy below shortcode to apply in different page of website.', 'addmultiplemarker' ); ?></p>
								<div class="input-group">
									<input type="text" name="shortcode" readonly class="form-control" value="[addmultiplemarker]" disabled="disabled">
									<!-- <span class="input-group-addon">
										<input type="submit" name="copy" value="copy" class="submit amm-maps-submit">
									</span> -->
								</div>
							</div>
							<span class="reset-maps" id="map-resets"><?php _e( 'Reset Map', 'addmultiplemarker' ); ?></span>
						</div>
					</div>
				</div>
				<div class="amm-map-apply">
					<div class="amm-map-delete amm-sidebar-close">
						<span class="amm-icon">
							<img src="<?php echo ADDMULTIPLEMARKER_PLUGIN_URL ?>admin/images/svg/amm-cancel.svg" alt="trash" class="imgsvg">
						</span>
					</div>
					<div class="amm-map-delete">
						<span id="delete-shape">
							<span class="amm-icon">
								<img src="<?php echo ADDMULTIPLEMARKER_PLUGIN_URL ?>admin/images/svg/trash.svg" alt="trash" class="imgsvg">
							</span>
						</span>
					</div>
					<div class="amm-map-save">
						<input type="submit" name="submit" class="submit amm-maps-submit" id="amm-maps-submit" value="Save this Map" disabled>
					</div>
					<span class="amm-maps-message"></span>
				</div>
			</div>
			<!-- sidebar close -->
			<!-- hidden area start -->
			<textarea class="amm_marker_type" id="amm_marker_type" name="amm_marker_type"></textarea>
			<textarea class="amm_marker_positions" id="amm_marker_positions" name="amm_marker_positions"></textarea>
			<textarea name="amm_map_control" class="amm_marker_control" id="amm_map_control"></textarea>
			<?php $retrieve_map_settings = get_option( 'amm_map_setting' ); ?>
			<input class="amm_map_api_key" type="text" name="amm_api_key" value="<?php echo ( $retrieve_map_settings ? $retrieve_map_settings['api'] : '');  ?>" placeholder="">
			<!-- hidden area close -->
		</form>
	</div>
</div>
