<?php

$attendance = Attendance::get_vars();
$activation_description = '';

if (!$attendance['paid']) {
    $activation_description = '<div class="upsell">
        <p>
            <strong>This (free) version of Attendance is limited to 25 people, 1 location, and 1 staff member.</strong>
        </p>

        <p>
            <a href="' . Attendance::UPGRADE_URL . '" class="button" target="_blank">
                Upgrade to Unlimited for $99 USD annually! &nbsp; &raquo;
            </a>
        </p>
    </div>';
}

$settings = array(
    array(
        'key' => 'slug',
        'title' => 'Where should Attendance be mounted?',
        'description' => 'Currently @ <a href="' . home_url() . $attendance['slug']. '" target="_blank">' . home_url() . $attendance['slug']. '</a>.',
        'placeholder' => '/attendance',
        // <br>If blank, you can display it on any page with the [attendance] shortcode.
        'type' => 'input'
    ),
    array(
        'key' => 'secret_key',
        'title' => 'Activation Code',
        'placeholder' => 'xxxxxxxxxxxxx',
        'description' => $activation_description,
        'type' => 'input'
    ),
    array(
        'key' => 'title',
        'title' => 'App Title',
        'placeholder' => 'Attendance',
        'description' => 'This appears at the top of the window when you\'re in the app.',
        'type' => 'input'
    ),
    array(
        'key' => 'notify',
        'title' => 'Monday Morning Summary',
        'placeholder' => 'you@example.com',
        'description' => 'Where should we send a summary of the week\'s Attendance records?<br>Multiple email addresses should be separated by a comma.',
        'type' => 'input'
    ),
    array(
        'key' => 'help',
        'title' => 'Need Help?',
        'description' => 'Email <a href="mailto:dallas@excitecreative.ca">dallas@excitecreative.ca</a> for a quick response, typically within 24 hours.',
        // <br>If blank, you can display it on any page with the [attendance] shortcode.
        'type' => 'description'
    )
);

$section = 'attendance_general';
$page = 'attendance';

add_settings_section(
    $section,
    false,
    false,
    $page
);

foreach ($settings as $setting) {
    $key = 'attendance_' . $setting['key'];

    add_settings_field(
        $key,
        $setting['title'],
        array(
            'Attendance',
            'setting'
        ),
        $page,
        $section,
        $setting
    );

    register_setting(
        $section,
        $key
    );
}

?>
