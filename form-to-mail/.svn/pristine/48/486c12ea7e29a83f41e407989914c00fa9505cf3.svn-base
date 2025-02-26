<?php
add_action('admin_menu', 'ftm_settings_page');
function ftm_settings_page(){
	add_submenu_page( 'edit.php?post_type=ftm_form', 'Настройка форм', 'Настройка', 'manage_options', 'ftm_settings', 'ftm_settings_wrappage');
}
function ftm_settings_wrappage(){
	$settings_get_tab = sanitize_text_field($_GET['ftm_settings_tab']);
	$settings_get_tab = empty($settings_get_tab)?'ftm_settings_general':$settings_get_tab;
	$settings_tabs = [
		'ftm_settings_general' => 'Основные',
		'ftm_settings_callback' => 'Callback'
	];
?>
	<div class="wrap">
		<h1><?php echo get_admin_page_title() ?></h1>
		<h2 class="nav-tab-wrapper">
			<?php foreach($settings_tabs as $settings_tab => $settings_tab_name){ ?>
			<a href="?post_type=ftm_form&page=ftm_settings&ftm_settings_tab=<?php echo $settings_tab ?>" class="nav-tab <?php echo ($settings_tab == $settings_get_tab)? 'nav-tab-active': ''; ?>"><?php echo $settings_tab_name ?></a>
			<?php } ?>
		</h2>
		<div class="tabs-panel">
			<form action="options.php" method="POST">
				<?php
					if(!empty($settings_get_tab)){
						settings_fields($settings_get_tab);
						do_settings_sections($settings_get_tab); // секции с настройками (опциями).
						submit_button();
					}
				?>
			</form>
		</div>
	</div>
	<?php
}
