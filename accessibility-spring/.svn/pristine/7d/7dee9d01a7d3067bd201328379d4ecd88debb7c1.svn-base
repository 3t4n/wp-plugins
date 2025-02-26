<?php

function as_set_icon_url($all_options)
{
    $iconNumber = isset($all_options['choose_icon']) ? $all_options['choose_icon'] : 'default';
    switch ($iconNumber) {
        case 'three':
            $iconUrl = 'icon-3.png';
            break;
        case 'two':
            $iconUrl = 'icon-2.png';
            break;
        case 'four':
            $iconUrl = 'icon-4.png';
            break;
        default:
            $iconUrl = 'icon-1.png';
            break;
    }

    return '<img src="' . plugins_url('/images/' . $iconUrl, __FILE__) . '"/>';
}


function as_get_ga_client_id()
{
    if (isset($_COOKIE['_ga'])) {
        $parts =  explode('.', $_COOKIE["_ga"]);
        return $parts[2] . '.' . $parts[3];
    }

    return (string)rand(100, 999999999);
}

function as_send_custom_event_to_google_analytics($settings)
{
    try {

        $prepared_settings = [];
        foreach ($settings as $key => $value) {
            $prepared_settings[str_replace('-', '_', $key)] = $value;
        }

        wp_remote_post(
            'https://www.google-analytics.com/mp/collect?api_secret=LqmxXq0YQwCK4I79EvBEbw&measurement_id=G-YKE2ZSR4YZ',
            [
                'body' => json_encode([
                    'client_id' => as_get_ga_client_id(),
                    'events' => [['name' => 'settings', 'params' => $prepared_settings]]
                ]),
                'headers' => ['Content-Type' => 'application/json'],
            ]
        );
    } catch (Exception $e) {}
}
