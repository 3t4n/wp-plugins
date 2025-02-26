<?php 
/* 
 * AI Addons Admin Dashboard 
 */
?>

<h1 class="screen-reader-text"><?php esc_html_e( 'AI Addons', 'ai-addons' ); ?></h1>

<div class="aiea-admin-wrap">
	
	<div class="aiea-grid aiea-admin-header">
		<div class="aiea-media-wrap">
			<img src="<?php echo esc_url( AIEA_URL . 'assets/images/logo.png' ); ?>" alt="<?php esc_attr_e( 'AI Addons', 'ai-addons' ); ?>" />
			<div class="aiea-media-content">
				<h2><?php esc_html_e( 'AI Elementor Addons', 'ai-addons' ); ?><span class="aiea-version"><?php echo esc_attr( AIEA_Admin_Settings::get_version() ) ?></span></h2>
				<p><?php esc_html_e( 'Elevate Your Website\'s Functionality with GO Pro by AI Elementor Addons.', 'ai-addons' ); ?></p>
			</div>
		</div>
		<div class="aiea-header-right">
			<a href="https://aiaddons.ai/pricing/" class="aiea-btn aiea-secondary-gradient-btn"><i class="aieaicon-crown
"></i><?php esc_html_e( 'Upgrade to Pro', 'ai-addons' ); ?></a>
			<a href="https://aiaddons.ai/" class="aiea-btn"><i class="aieaicon-star"></i><?php esc_html_e( 'Rate Us', 'ai-addons' ); ?></a>
		</div>
	</div>
	
	<div class="aiea-grid aiea-content">
	
		<div class="aiea-admin-tab-wrap">
			<ul class="aiea-admin-tab">
				<li><a href="#" class="active" data-id="aiea-admin-tab-general"><i class="aieaicon-app"></i></a></li>
				<li><a href="#" data-id="aiea-admin-tab-settings"><i class="aieaicon-settings"></i></a></li>
				<li><a href="#" id="aiea-admin-theme-switcher"><i class="aieaicon-sun"></i></a></li>
			</ul>
		</div>
		
		<div class="aiea-admin-tab-content">
			<div id="aiea-admin-tab-general" class="aiea-admin-tab-pane fade aiea-admin-widgets active show">
				<?php
					$aiea_shortcodes = get_option('aiea_shortcodes');
					if( empty( $aiea_shortcodes ) ) $aiea_shortcodes = aiea_addon_base()->aiea_default_widgets();
				?>
				<form id="ai-widgets-form" method="post" action="" enctype="multipart/form-data">
					
					<input type="hidden" name="action" value="aiea_widgets_save" />			
					<input type="hidden" name="aiea_shortcodes[ai-default]" value="default" />
					
					<div class="aiea-admin-part-head">
						<h4 class="widget-modules-title"><?php esc_html_e( 'General Widgets', 'ai-addons' ); ?></h4>
						<div class="aiea-bulk-active">						
							<span><?php esc_html_e( 'Active/Inactive All Widgets', 'ai-addons' ); ?></span>
							<label class="aiea-switch">
								<input type="checkbox" data-id="widgets" >
								<span class="aiea-switch-slider round"></span>
							</label>
						</div>
					</div>
					
					<div id="aiea-part-widgets" class="aiea-ele-widgets">
					<?php
					
						$icon_classes = aiea_addon_base()->widget_icon_classes();
						
						wp_nonce_field( 'inc-save-widgets)(*^&*&^#', 'aiea_save_widgets' );
						$available_shortcodes = aiea_addon_base()->aiea_shortcodes();				

						$hf_w = [ 'logo', 'menu', 'search', 'copyright', 'page-title', 'post-title', 'archive-title', 'site-title', 'breadcrumbs' ];
						$hf_widgets = [];
						foreach( $hf_w as $hf_widget ) {											
							$hf_widgets[$hf_widget] = $available_shortcodes[$hf_widget];
							unset( $available_shortcodes[$hf_widget] );
						}
						
						$row = 1; $cols = 6;
						foreach( $available_shortcodes as $key => $widget ){
						
							$shortcode_name = str_replace( "-", "_", $key );
							if( !empty( $aiea_shortcodes ) ){
								if( isset( $aiea_shortcodes[$shortcode_name] ) && $aiea_shortcodes[$shortcode_name] == 'on' ){
									$saved_val = 'on';
								}else{
									$saved_val = 'off';
								}
							}
						
							if( $row % $cols == 1 ) echo '<div class="inc-row">';
							
								echo '
								<div class="inc-col-2">
									<div class="aiea-widget-box">';								
										if( $widget['pro'] == true ) {
											echo '<span class="aiea-pro-tag">'. esc_html__( 'PRO', 'ai-addons' ) .'</span>';
										}									
										echo '<span class="aiea-widget-icon"><i class="'. ( isset( $icon_classes[$key] ) ? $icon_classes[$key] : '' ) .'"></i></span>
										<span class="aiea-widget-heading">'. esc_html( str_replace( array( "Elementor", "Widget" ), "", $widget['title'] ) ) .'</span>';														
										echo '<div class="aiea-widget-box-footer">
											<a href="'. esc_url( $widget['url'] ) .'" target="_blank" class="aiea-widget-demo">'. esc_html__( 'View Demo', 'ai-addons' ) .'</a>
											<label class="aiea-switch">';
											if( $widget['pro'] ) {
												echo '<input type="checkbox" disabled="disabled">';
											} else {
												echo '<input type="checkbox" class="aiea-inner-switch" name="aiea_shortcodes['. esc_attr( $shortcode_name ) .']" '. ( $saved_val == 'on' ? 'checked="checked"' : '' ) .'>';
											}
												echo '<span class="aiea-switch-slider round"></span>
											</label>
										</div>';
										
									echo '</div><!-- .inc-widget-box -->
								</div><!-- .col -->';
											
							if( $row % $cols == 0 ) echo '</div><!-- .row -->';
							$row++;
						}
						
						if( $row % $cols != 1 ) echo '</div><!-- .ai-row unexpceted close -->';
					?>
					</div>
					
					<div class="aiea-admin-part-head">
						<h4 class="widget-modules-title"><?php esc_html_e( 'Header & Footer', 'ai-addons' ); ?></h4>
						<div class="aiea-bulk-active">						
							<span><?php esc_html_e( 'Active/Inactive Header & Footer Widgets', 'ai-addons' ); ?></span>
							<label class="aiea-switch">
								<input type="checkbox" data-id="hf" >
								<span class="aiea-switch-slider round"></span>
							</label>
						</div>
					</div>
					
					<div id="aiea-part-hf" class="aiea-ele-hf-widgets">					
					<?php
						$row = 1; $cols = 6;
						foreach( $hf_widgets as $key => $widget ){
						
							$shortcode_name = str_replace( "-", "_", $key );
							if( !empty( $aiea_shortcodes ) ){
								if( isset( $aiea_shortcodes[$shortcode_name] ) && $aiea_shortcodes[$shortcode_name] == 'on' ){
									$saved_val = 'on';
								}else{
									$saved_val = 'off';
								}
							}
						
							if( $row % $cols == 1 ) echo '<div class="inc-row">';
							
								echo '
								<div class="inc-col-2">
									<div class="aiea-widget-box">';								
										if( $widget['pro'] == true ) {
											echo '<span class="aiea-pro-tag">'. esc_html__( 'PRO', 'ai-addons' ) .'</span>';
										}									
										echo '<span class="aiea-widget-icon"><i class="'. ( isset( $icon_classes[$key] ) ? $icon_classes[$key] : '' ) .'"></i></span>
										<span class="aiea-widget-heading">'. esc_html( str_replace( array( "Elementor", "Widget" ), "", $widget['title'] ) ) .'</span>';														
										echo '<div class="aiea-widget-box-footer">
											<a href="'. esc_url( $widget['url'] ) .'" target="_blank" class="aiea-widget-demo">'. esc_html__( 'View Demo', 'ai-addons' ) .'</a>
											<label class="aiea-switch">';
											if( $widget['pro'] ) {
												echo '<input type="checkbox" disabled="disabled">';
											} else {
												echo '<input type="checkbox" class="aiea-inner-switch" name="aiea_shortcodes['. esc_attr( $shortcode_name ) .']" '. ( $saved_val == 'on' ? 'checked="checked"' : '' ) .'>';
											}
												echo '<span class="aiea-switch-slider round"></span>
											</label>
										</div>';
										
									echo '</div><!-- .inc-widget-box -->
								</div><!-- .col -->';
											
							if( $row % $cols == 0 ) echo '</div><!-- .row -->';
							$row++;
						}
						
						if( $row % $cols != 1 ) echo '</div><!-- .ai-row unexpceted close -->';
					?>
					</div>
					
					<div class="aiea-admin-part-head">
						<h4 class="widget-modules-title"><?php esc_html_e( 'Section Modules', 'ai-addons' ); ?></h4>
						<div class="aiea-bulk-active">						
							<span><?php esc_html_e( 'Active/Inactive Section Modules', 'ai-addons' ); ?></span>
							<label class="aiea-switch">
								<input type="checkbox" data-id="section">
								<span class="aiea-switch-slider round"></span>
							</label>
						</div>
					</div>
					
					<div id="aiea-part-section" class="aiea-ele-section-modules">					
					<?php
					
						$saved_modules = get_option( 'aiea_modules' );
						if( empty( $saved_modules ) ) $saved_modules = aiea_addon_base()->aiea_default_modules();
						$available_modules = aiea_addon_base()->aiea_modules();
						
						$row = 1; $cols = 6;
						foreach( $available_modules as $key => $widget ){
						
							$shortcode_name = $key; // str_replace( "-", "_", $key );
							if( !empty( $saved_modules ) ){
								if( isset( $saved_modules[$shortcode_name] ) && $saved_modules[$shortcode_name] == 'on' ){
									$saved_val = 'on';
								}else{
									$saved_val = 'off';
								}
							}
						
							if( $row % $cols == 1 ) echo '<div class="inc-row">';
							
								echo '
								<div class="inc-col-2">
									<div class="aiea-widget-box">';								
										if( $widget['pro'] == true ) {
											echo '<span class="aiea-pro-tag">'. esc_html__( 'PRO', 'ai-addons' ) .'</span>';
										}									
										echo '<span class="aiea-widget-icon"><i class="'. ( isset( $icon_classes[$key] ) ? $icon_classes[$key] : '' ) .'"></i></span>
										<span class="aiea-widget-heading">'. esc_html( str_replace( array( "Elementor", "Widget" ), "", $widget['title'] ) ) .'</span>';														
										echo '<div class="aiea-widget-box-footer">
											<a href="'. esc_url( $widget['url'] ) .'" target="_blank" class="aiea-widget-demo">'. esc_html__( 'View Demo', 'ai-addons' ) .'</a>
											<label class="aiea-switch">';
											if( $widget['pro'] ) {
												echo '<input type="checkbox" disabled="disabled">';
											} else {
												echo '<input type="checkbox" class="aiea-inner-switch" name="aiea_modules['. esc_attr( $shortcode_name ) .']" '. ( $saved_val == 'on' ? 'checked="checked"' : '' ) .'>';
											}
												echo '<span class="aiea-switch-slider round"></span>
											</label>
										</div>';
										
									echo '</div><!-- .inc-widget-box -->
								</div><!-- .col -->';
											
							if( $row % $cols == 0 ) echo '</div><!-- .row -->';
							$row++;
						}
						
						if( $row % $cols != 1 ) echo '</div><!-- .ai-row unexpceted close -->';
					?>
					</div>
				</form>
			</div>
			
			<div id="aiea-admin-tab-settings" class="aiea-admin-tab-pane fade aiea-admin-settings">
				<?php							
					$aiea_options = get_option( 'aiea_options' );
					if( empty( $aiea_options ) ) $aiea_options = aiea_addon_base()->aiea_default_options();
					$open_weather_api = isset( $aiea_options['open-weather-api'] ) && $aiea_options['open-weather-api'] ? $aiea_options['open-weather-api'] : '';
					$google_api = isset( $aiea_options['google-map-api'] ) && $aiea_options['google-map-api'] ? $aiea_options['google-map-api'] : '';
					$openaiea_api = isset( $aiea_options['openai-api'] ) && $aiea_options['openai-api'] ? $aiea_options['openai-api'] : '';
					$openaiea_model = isset( $aiea_options['openai-model'] ) && $aiea_options['openai-model'] ? $aiea_options['openai-model'] : 'text-davinci-003';
				?>
				
				<form id="ai-settings-form" method="post" action="" enctype="multipart/form-data">
					<input type="hidden" name="action" value="aiea_settings_save" />	
					<?php wp_nonce_field( 'inc-save-settings)(*^&*&^#', 'aiea_save_settings' ); ?>
					<div class="inc-tab-content-inner-section pt-50">
						<div class="inc-settings-wrap">
							<div class="inc-settings-header d-flex">										
								<label><?php esc_html_e( 'Open Weather Map API', 'ai-addons' ); ?></label>
							</div>
							<div class="show-password-wrap">
								<input type="password" class="attr-form-control" name="aiea_options[open-weather-api]" placeholder="Open Weather Map API key here.." value="<?php echo esc_attr( $open_weather_api ); ?>" autocomplete="off">
								<span class="icon-show-password"><i class="aieaicon-eye"></i></span>
							</div>
							<div class="inc-settings-description">
								<?php esc_html_e( 'You can find or create your Google API key ', 'ai-addons' ); ?> <a href="https://console.cloud.google.com/google/maps-apis/credentials" target="_blank"><?php esc_html_e( 'here', 'ai-addons' ); ?></a> 
							</div>
						</div>
						<div class="inc-settings-wrap">
							<div class="inc-settings-header d-flex">										
								<label><?php esc_html_e( 'Google Map API', 'ai-addons' ); ?></label>
							</div>
							<div class="show-password-wrap">
								<input type="password" class="attr-form-control" name="aiea_options[google-map-api]" placeholder="Google map api key here.." value="<?php echo esc_attr( $google_api ); ?>" autocomplete="off">
								<span class="icon-show-password"><i class="aieaicon-eye"></i></span>
							</div>
							<div class="inc-settings-description">
								<?php esc_html_e( 'You can find or create your Google API key ', 'ai-addons' ); ?> <a href="https://console.cloud.google.com/google/maps-apis/credentials" target="_blank"><?php esc_html_e( 'here', 'ai-addons' ); ?></a> 
							</div>
						</div>
						<div class="inc-settings-wrap">
							<div class="inc-settings-header d-flex">										
								<label><?php esc_html_e( 'OpenAI API Key', 'ai-addons' ) ?></label>
							</div>
							<div class="show-password-wrap">
								<input type="password" class="attr-form-control" name="aiea_options[openai-api]" placeholder="<?php esc_html_e( 'Paste OpenAI API key here..', 'ai-addons' ) ?>" value="<?php echo esc_attr( $openaiea_api ); ?>" autocomplete="off">
								<span class="icon-show-password"><i class="aieaicon-eye"></i></span>
							</div>
							<div class="inc-settings-description">
								<?php esc_html_e( 'You can find or create your OpenAI API key ', 'ai-addons' ); ?> <a href="https://platform.openai.com/account/api-keys" target="_blank"><?php esc_html_e( 'here', 'ai-addons' ); ?></a> 
							</div>
						</div>
						<div class="inc-settings-wrap">
							<div class="inc-settings-header d-flex">										
								<label><?php esc_html_e( 'OpenAI Model', 'ai-addons' ) ?></label>
							</div>
							<?php							
								$aiea_models = [ 'gpt-3.5-turbo', 'gpt-3.5-turbo-1106', 'gpt-3.5-turbo-0613', 'gpt-3.5-turbo-16k', 'gpt-3.5-turbo-0301', 'gpt-4', 'gpt-4o', 'gpt-4o-mini', 'gpt-4-0314', 'gpt-4-32k', 'gpt-4-32k-0314', 'gpt-4-1106-preview', 'gpt-4-turbo', 'gpt-4-turbo-preview', 'gpt-4-0125-preview' ];
							?>
							<div class="inc-settings-info-wrap">
								<select name="aiea_options[openai-model]">
								<?php
								foreach( $aiea_models as $ai_model ) {
									echo '<option value="'. esc_attr( $ai_model ) .'" '. selected( $openaiea_model, $ai_model ) .'>'. esc_html( $ai_model ) .'</option>';
								}
								?>
								</select>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div> <!-- tab content close -->
		
	</div>
	
	<div class="aiea-submit-wrap">
		<a href="#" id="aiea-admin-general-save" class="aiea-btn aiea-save-btn"><i class="aieaicon-settings"></i><span><?php esc_html_e( 'Save Settings', 'ai-addons' ); ?></span></a>
	</div>
	
</div>