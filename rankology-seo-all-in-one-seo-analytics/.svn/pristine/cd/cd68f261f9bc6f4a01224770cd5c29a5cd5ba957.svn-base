<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

$this->options = get_option('rankology_social_option_name');
if (function_exists('rankology_admin_header')) {
    echo rankology_admin_header();
} ?>

<form method="post" action="<?php echo admin_url('options.php'); ?>" class="rankology-option rankology-form-heading">
    <?php
    echo $this->rankology_feature_title('social');
    settings_fields('rankology_social_option_group'); ?>
			<div class="rankology-sub-tabs">
                <?php
            $current_tab = '';
            $plugin_settings_tabs    = [
                'tab_rankology_social_accounts'  => __('Social URLs', 'wp-rankology'),
                'tab_rankology_social_knowledge' => __('Google Graph', 'wp-rankology'),
                'tab_rankology_social_facebook'  => __('Facebook Graph', 'wp-rankology'),
                'tab_rankology_social_twitter'   => __('Twitter card', 'wp-rankology'),
            ]; ?>

				<!-- Sub-Tabs Navigation -->
				<ul>
					<?php
					$activeState = 1;
					foreach ($plugin_settings_tabs as $tab_key => $tab_caption) {
						?>
						<li class="rankology-sub-tab <?php if ($activeState == 1) {
							echo ' active ';
						} ?> " data-sub-tab="<?php echo $tab_key ?>"><?php echo $tab_caption ?></li>
						<?php $activeState++;
					} ?>
				</ul>
			</div>

			<!-- Sub-Tabs Content -->
			<div class="sub-tab-content">
				

					<div id="rankology-tabs" class="wrap">
						<div class="rankology-tab" style="display:block;">
							<div class="nav-tab-wrapper">

								<?php
								$activeState = 1;
								foreach ($plugin_settings_tabs as $tab_key => $tab_caption) {
									?>
									<div id="<?php echo $tab_key ?>" class="rankology-sub-content <?php if ($activeState == 1) {
										   echo ' active ';
									   } ?> ">
										<?php
										// Display settings sections based on the active sub-tab
										if ($activeState == 1) {
                                            do_settings_sections('rankology-settings-admin-social-knowledge');
											rkseo_submit_button(__('Save changes', 'wp-rankology'));
										}
										if ($activeState == 2) {
                                            do_settings_sections('rankology-settings-admin-social-accounts');
											rkseo_submit_button(__('Save changes', 'wp-rankology'));
										}
										if ($activeState == 3) {
                                            do_settings_sections('rankology-settings-admin-social-facebook');
											rkseo_submit_button(__('Save changes', 'wp-rankology'));
										}
										if ($activeState == 4) {
                                            do_settings_sections('rankology-settings-admin-social-twitter');
											rkseo_submit_button(__('Save changes', 'wp-rankology'));
										}

										?>
									</div>
									<?php $activeState++;
								} ?>
							</div>
						</div>
					</div>
				
			</div>
            </form>