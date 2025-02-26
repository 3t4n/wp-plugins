<?php

function ainews_click_settings_init(): void {
    register_setting('general', 'ainews_click_project_id');

    add_settings_section(
        'ainews_click_section',
        'Ainews Click',
        'ainews_click_add_section',
        'general'
    );

    add_settings_field(
        'ainews_click_project_id_field',
        'ID проекта',
        'ainews_click_add_field',
        'general',
        'ainews_click_section'
    );
}

function ainews_click_add_section(): void {
    echo '<p>Настройки плагина.</p>';
}

function ainews_click_add_field(): void {
    $setting = get_option('ainews_click_project_id');

    ?>
    <input
        type="text"
        name="ainews_click_project_id"
        placeholder="ID проекта AinewsClick"
        style="width: 310px"
        value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>"
    >
    <?php
}
