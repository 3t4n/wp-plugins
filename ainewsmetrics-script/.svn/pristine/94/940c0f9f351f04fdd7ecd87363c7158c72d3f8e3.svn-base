<?php

function ainews_metrics_settings_init() {
	register_setting('general', 'ainews_metrics_project_id');

	add_settings_section(
		'ainews_metrics_section',
		'Ainews Metrics',
		'ainews_metrics_add_section',
		'general'
	);

	add_settings_field(
		'ainews_metrics_project_id_field',
		'ID проекта',
		'ainews_metrics_add_field',
		'general',
		'ainews_metrics_section'
	);
}

function ainews_metrics_add_section() {
	echo '<p>Настройки плагина.</p>';
}

function ainews_metrics_add_field() {
	$setting = get_option('ainews_metrics_project_id');

	?>
	<input
        type="text"
        name="ainews_metrics_project_id"
        placeholder="ID проекта AinewsMetrics"
        style="width: 310px"
        value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>"
    >
    <?php
}
