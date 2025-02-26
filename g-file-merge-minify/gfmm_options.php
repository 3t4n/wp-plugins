<?php
	function gfmm_reg_set() {
		add_option('exclude_script', '');
		register_setting('gfmm_group', 'exclude_script', 'gfmm_callback');

		add_option('merge_all_script_files', '');
		register_setting('gfmm_group', 'merge_all_script_files', 'gfmm_callback');

		add_option('minify_script_file', '');
		register_setting('gfmm_group', 'minify_script_file', 'gfmm_callback');

		add_option('script_exclusion_status', '');
		register_setting('gfmm_group', 'script_exclusion_status', 'gfmm_callback');

		add_option('script_files_in_the_site', '');
		register_setting('gfmm_group', 'script_files_in_the_site', 'gfmm_callback');

		add_option('exclude_style', '');
		register_setting('gfmm_group', 'exclude_style', 'gfmm_callback');

		add_option('merge_all_style_files', '');
		register_setting('gfmm_group', 'merge_all_style_files', 'gfmm_callback');

		add_option('minify_style_file', '');
		register_setting('gfmm_group', 'minify_style_file', 'gfmm_callback');

		add_option('style_exclusion_status', '');
		register_setting('gfmm_group', 'style_exclusion_status', 'gfmm_callback');

		add_option('style_files_in_the_site', '');
		register_setting('gfmm_group', 'style_files_in_the_site', 'gfmm_callback');
	}

	add_action('admin_init', 'gfmm_reg_set');

	function gfmm_register_options_page() {
		add_menu_page('G File Merge & Minify', 'G File Merge & Minify', 'manage_options', 'g-file-merge-minify', 'gfmm_options_page', 'dashicons-dashboard');
	}

	add_action('admin_menu', 'gfmm_register_options_page');

	function gfmm_options_page() {
		wp_enqueue_style('gfmm', plugins_url('/css/gfmm.css', __FILE__), false, 1, 'all');
		wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed:300,500,700|Pacifico|Roboto:300,500,700&amp;subset=latin-ext', false, 1, 'all');
		wp_enqueue_style('google-fonts-1', 'https://fonts.googleapis.com/icon?family=Material+Icons', false, 1, 'all');
		wp_enqueue_script('jquery');
		wp_enqueue_script('tabs', plugins_url('/js/tabs.min.js', __FILE__));
		wp_enqueue_script('tab-settings', plugins_url('/js/tab-settings.min.js', __FILE__));
		?>

		<div>
			<form method="post" action="options.php">
				<?php settings_fields('gfmm_group'); ?>
				<div class="tabs">
					<div class="tabs-header">
						<div class="border"></div>
						<ul>
							<li class="active">
								<a href="#tab-1" tab-id="1" ripple="ripple" ripple-color="#ffffff"><?php _e('General', 'g-file-merge-minify'); ?></a>
							</li>
							<li>
								<a href="#tab-2" tab-id="2" ripple="ripple" ripple-color="#ffffff"><?php _e('Script', 'g-file-merge-minify'); ?></a>
							</li>
							<li>
								<a href="#tab-3" tab-id="3" ripple="ripple" ripple-color="#ffffff"><?php _e('Style', 'g-file-merge-minify'); ?></a>
							</li>
						</ul>
						<nav class="tabs-nav">
							<i class="material-icons" id="prev" ripple="ripple" ripple-color="#ffffff">&#xE314;</i>
							<i class="material-icons" id="next" ripple="ripple" ripple-color="#ffffff">&#xE315;</i>
						</nav>
					</div>
					<div class="tabs-content">
						<div class="tab active" tab-id="1">
							<div class="settings">
								<h3><?php _e('General Settings', 'g-file-merge-minify'); ?></h3>
								<span class="input-name"><?php _e('Merge', 'g-file-merge-minify'); ?></span>
								<p><?php _e('You can select the types of files you want to merge from below.', 'g-file-merge-minify'); ?></p>
								<div class="active-passive" style="margin-bottom:13px;">
									<label>
										<p style="width:auto;margin:0;display:inline-block;"><?php _e('Merge All Script Files', 'g-file-merge-minify'); ?></p>
										<input type="checkbox" name="merge_all_script_files" <?php if (get_option('merge_all_script_files') == "on") {echo 'checked';} ?>>
										<i></i>
									</label>
								</div>
								<div class="active-passive">
									<label>
										<p style="width:auto;margin:0;display:inline-block;"><?php _e('Merge All Style Files', 'g-file-merge-minify'); ?></p>
										<input type="checkbox" name="merge_all_style_files" <?php if (get_option('merge_all_style_files') == "on") {echo 'checked';} ?>>
										<i></i>
									</label>
								</div>

								<hr />

								<span class="input-name"><?php _e('Minify', 'g-file-merge-minify'); ?></span>
								<p><?php _e('Use the following options to further reduce the size of your merged files.', 'g-file-merge-minify'); ?></p>
								<div class="active-passive" style="margin-bottom:13px;">
									<label>
										<p style="width:auto;margin:0;display:inline-block;"><?php _e('Minify Script File', 'g-file-merge-minify'); ?></p>
										<input type="checkbox" name="minify_script_file" <?php if (get_option('minify_script_file') == "on") {echo 'checked';} ?>>
										<i></i>
									</label>
								</div>
								<div class="active-passive">
									<label>
										<p style="width:auto;margin:0;display:inline-block;"><?php _e('Minify Style File', 'g-file-merge-minify'); ?></p>
										<input type="checkbox" name="minify_style_file" <?php if (get_option('minify_style_file') == "on") {echo 'checked';} ?>>
										<i></i>
									</label>
								</div>
							</div>
						</div>
						<div class="tab" tab-id="2">
							<div class="settings">
								<h3><?php _e('Settings for "Script" Files', 'g-file-merge-minify'); ?></h3>
								<span class="input-name"><?php _e('"Script" Files to be Excluded', 'g-file-merge-minify'); ?></span>
								<p><?php _e('You can type the file definitions you don\'t want merged here. Also pay attention; enter only one per line and no spaces to the left and right of the definition.', 'g-file-merge-minify'); ?></p>
								<div class="active-passive" style="margin-bottom:13px;">
									<label>
										<p style="width:auto;margin:0;display:inline-block;"><?php _e('File Exclusion Status', 'g-file-merge-minify'); ?></p>
										<input type="checkbox" name="script_exclusion_status" <?php if (get_option('script_exclusion_status') == "on") {echo 'checked';} ?>>
										<i></i>
									</label>
								</div>
								<textarea class="gfmm-admin" name="exclude_script" placeholder="<?php _e('Ex: jquery-core', 'g-file-merge-minify'); ?>" rows="10"><?= get_option('exclude_script') ?></textarea>
								<script type="text/javascript">
									jQuery(function($) {
										var get_script_exclusion_status = '<?= get_option('script_exclusion_status'); ?>';
										var script_exclusion_status = $('input[name="script_exclusion_status"]');
										var exclude_script = $('textarea[name="exclude_script"]');

										if (get_script_exclusion_status == 'on') {
											exclude_script.css({
												'pointer-events': 'all',
												'opacity': '1'
											});
										} else {
											exclude_script.css({
												'pointer-events': 'none',
												'opacity': '0.5'
											});
										}

										script_exclusion_status.change(function (e) {
											if (this.checked) {
												exclude_script.css({
													'pointer-events': 'all',
													'opacity': '1'
												});
											} else {
												exclude_script.css({
													'pointer-events': 'none',
													'opacity': '0.5'
												});
											}
										});
									});
								</script>

								<hr />

								<p><?php _e('When you activate this option, you will see the names of files you can use to exclude at the top of your website. Close this option after you add the excluded file names to the box above.', 'g-file-merge-minify'); ?></p>
								<div class="active-passive">
									<label>
										<p style="width:auto;margin:0;display:inline-block;"><?php _e('Displaying The names of The Files on The Site', 'g-file-merge-minify'); ?></p>
										<input type="checkbox" name="script_files_in_the_site" <?php if (get_option('script_files_in_the_site') == "on") {echo 'checked';} ?>>
										<i></i>
									</label>
								</div>
							</div>
						</div>
						<div class="tab" tab-id="3">
							<div class="settings">
								<h3><?php _e('Settings for "Style" Files', 'g-file-merge-minify'); ?></h3>
								<span class="input-name"><?php _e('"Style" Files to be Excluded', 'g-file-merge-minify'); ?></span>
								<p><?php _e('You can type the file definitions you don\'t want merged here. Also pay attention; enter only one per line and no spaces to the left and right of the definition.', 'g-file-merge-minify'); ?></p>
								<div class="active-passive" style="margin-bottom:13px;">
									<label>
										<p style="width:auto;margin:0;display:inline-block;"><?php _e('File Exclusion Status', 'g-file-merge-minify'); ?></p>
										<input type="checkbox" name="style_exclusion_status" <?php if (get_option('style_exclusion_status') == "on") {echo 'checked';} ?>>
										<i></i>
									</label>
								</div>
								<textarea class="gfmm-admin" name="exclude_style" placeholder="<?php _e('Ex: style', 'g-file-merge-minify'); ?>" rows="10"><?= get_option('exclude_style') ?></textarea>
								<script type="text/javascript">
									jQuery(function($) {
										var get_style_exclusion_status = '<?= get_option('style_exclusion_status'); ?>';
										var style_exclusion_status = $('input[name="style_exclusion_status"]');
										var exclude_style = $('textarea[name="exclude_style"]');

										if (get_style_exclusion_status == 'on') {
											exclude_style.css({
												'pointer-events': 'all',
												'opacity': '1'
											});
										} else {
											exclude_style.css({
												'pointer-events': 'none',
												'opacity': '0.5'
											});
										}

										style_exclusion_status.change(function (e) {
											if (this.checked) {
												exclude_style.css({
													'pointer-events': 'all',
													'opacity': '1'
												});
											} else {
												exclude_style.css({
													'pointer-events': 'none',
													'opacity': '0.5'
												});
											}
										});
									});
								</script>

								<hr />

								<p><?php _e('When you activate this option, you will see the names of files you can use to exclude at the top of your website. Close this option after you add the excluded file names to the box above.', 'g-file-merge-minify'); ?></p>
								<div class="active-passive">
								<label>
									<p style="width:auto;margin:0;display:inline-block;"><?php _e('Displaying The names of The Files on The Site', 'g-file-merge-minify'); ?></p>
									<input type="checkbox" name="style_files_in_the_site" <?php if (get_option('style_files_in_the_site') == "on") {echo 'checked';} ?>>
									<i></i>
								</label>
							</div>
							</div>
						</div>
					</div>
				</div>
				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}

?>