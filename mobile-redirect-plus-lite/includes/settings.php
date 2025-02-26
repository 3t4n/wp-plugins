<?php
add_action( 'admin_menu', 'mobi_redirect_menu_lite' );
function mobi_redirect_menu_lite(){
	add_options_page( 'WP Mobile Redirect', 'WP Mobile Redirect', 'manage_options', 
						'mobile-redirect-plus-lite', 'redirect_options_page_lite' );
	function redirect_options_page_lite(){
		?>
		<div class="wrap">
			<h2><?php _e('WP Mobile Redirect Options','mobiplus-lite');?></h2>
			<form action="options.php" method="POST" class="mprl-form">
				<?php settings_fields( 'mobi-setting-group-lite' ); ?>
				<?php do_settings_sections( 'mobi-redirect-plus-lite' ); ?>
				<?php submit_button( ); ?>
			</form>
			<div class="mprl-premium">
				<a href="https://goo.gl/mCo9LJ"><?php echo '<img class="mprl-premium-1" src="' . plugins_url( 'images/banner.jpg', __FILE__ ) . '" > '; ?></a>
				<a href="https://goo.gl/mCo9LJ"><?php echo '<img class="mprl-premium-2" src="' . plugins_url( 'images/banner2.jpg', __FILE__ ) . '" > '; ?></a>
			</div>
			<br/><br/>
		</div>
		<?php
	}
}
add_action( 'admin_init', 'mobi_redirect_init_lite' );
function mobi_redirect_init_lite(){
	register_setting( 'mobi-setting-group-lite', 'mobi-setting-lite' );
	add_settings_section( 'section-main-lite', __('Main Settings','mobiplus-lite'), 'main_setting_callback_lite', 'mobi-redirect-plus-lite' );
	add_settings_field( 'mobi-plus-lite', __('Redirect To Mobile','mobiplus-lite'), 'redirect_mobile_callback_lite', 'mobi-redirect-plus-lite', 'section-main-lite' );
	add_settings_field( 'mobi-specific-page-lite', __('Redirect page','mobiplus-lite'), 'redirect_specific_page_lite', 'mobi-redirect-plus-lite', 'section-main-lite' );
	add_settings_field( 'mobi-link-lite', __('Mobile Website Link','mobiplus-lite'), 'mobile_link_callback_lite', 'mobi-redirect-plus-lite', 'section-main-lite' );
	add_settings_field( 'mobi-tablet-lite', __('Exclude Tablets Redirect','mobiplus-lite'), 'redirect_tablet_callback_lite', 'mobi-redirect-plus-lite', 'section-main-lite' );
	add_settings_field( 'mobi-back-main-lite', __('Back to full version website','mobiplus-lite'), 'redirect_back_main_lite', 'mobi-redirect-plus-lite', 'section-main-lite' );
	

	function main_setting_callback_lite(){
		_e('Active Radio button to enable/disable mobile redirection. Then enter your mobile site URL in the field below','mobiplus-lite');
	}

	function redirect_mobile_callback_lite(){
		$setting = (array)get_option('mobi-setting-lite');?>
		<input type="radio" name="mobi-setting-lite[redirect]" value="yes" <?php checked('yes', $setting['redirect']); ?> /><?php _e('Active','mobiplus-lite');?>
  		<input type="radio" name="mobi-setting-lite[redirect]" value="no" <?php checked('no', $setting['redirect']); ?> /><?php _e('Inactive','mobiplus-lite');?>
  		<?php
	}
	function mobile_link_callback_lite(){
		$setting = (array)get_option('mobi-setting-lite');
		$link = esc_attr( $setting['link'] );
		echo "<input type='text' class='regular-text' name='mobi-setting-lite[link]' value='$link' />";
		echo '<p class="description">'._('Enter mobile site URL like &nbsp; http://m.google.com','mobiplus-lite').'</p>';
	}

	function redirect_tablet_callback_lite(){
		$setting = (array)get_option('mobi-setting-lite');?>
		<input type="radio" name="mobi-setting-lite[redirect_tab]" value="yes" <?php checked('yes', $setting['redirect_tab']); ?> /><?php _e('Yes','mobiplus-lite');?>
  		<input type="radio" name="mobi-setting-lite[redirect_tab]" value="no" <?php checked('no', $setting['redirect_tab']); ?> /><?php _e('No','mobiplus-lite');?>
  		<?php
  		echo '<p class="description">'._('If you want to stop redirection for Tablet then check yes (default is no)','mobiplus-lite').'</p>';
	}
	
	//Redirect Page Option	
	function redirect_specific_page_lite(){
		$setting = (array)get_option('mobi-setting-lite');
		@$relink = esc_attr( $setting['redirect_page'] );
		if($relink === 'no'){
			$specific_class = 'mprl-specific-page';
		}else{
			$specific_class = '';
		}
		?>
		<input type="radio" onclick="javascript:yesnoCheck();" id="yesCheck" name="mobi-setting-lite[redirect_page]" value="yes" <?php checked('yes', @$setting['redirect_page']); ?> /><?php _e('Full Website','mobiplus-lite');?>
  		<input type="radio" onclick="javascript:yesnoCheck();" id="noCheck" name="mobi-setting-lite[redirect_page]" value="no" <?php checked('no', @$setting['redirect_page']); ?> /><?php _e('Specific Page','mobiplus-lite');?>
  		<input type='text' class='regular-text mprl-none <?php echo $specific_class;?>' id="spacific-page" name='mobi-setting-lite[specific_page]' value='<?php echo @$setting['specific_page'];?>' />
  		<?php
  		echo '<p class="description spefic-desc">'.__('Option for redirecting your Full website or A specific page. If you choose specific page, please add the page URL in the field','mobiplus-lite').'</p>';
	}

	//full version website
	function redirect_back_main_lite(){
		echo "<div class='mprl-site-back'>";
		echo get_site_url();
		echo "/?main=true</div>";
		echo '<p class="description">'.__('Place this link in mobile website for Redirect back mobile visitor to main website','mobiplus-lite').'</p>';
	}

}