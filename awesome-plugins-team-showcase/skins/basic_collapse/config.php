<?php

return [
    "id"            => "basic_collapse",
    "title"         => "Basic collapse",
    "grid"          => "grid",
    "columns"       => 3,
    "max_columns"   => 6,
    "extrainfo"     => "expanded",
    "documentation" => "https://google.es",
    "settings"      => [
        "columns"
    ],
    "fields"        => [
        [
            "id"    => "short_bio",
            "label" => __("Short Bio", "awesome-plugins-team-showcase"),
            "type"  => "textarea"
        ],
        [
            "id"    => "position",
            "label" => __("Position", "awesome-plugins-team-showcase"),
            "type"  => "text"
        ],
        [
            "id"    => "email",
            "label" => __("Email", "awesome-plugins-team-showcase"),
            "type"  => "text"
        ],
        [
            "id"    => "phone",
            "label" => __("Phone", "awesome-plugins-team-showcase"),
            "type"  => "text"
        ],
        [
            "id"    => "facebook",
            "label" => __("Facebook", "awesome-plugins-team-showcase"),
            "type"  => "text"
        ],
        [
            "id"    => "twitter",
            "label" => __("Twitter", "awesome-plugins-team-showcase"),
            "type"  => "text"
        ],
        [
            "id"    => "linkedin",
            "label" => __("Linkedin", "awesome-plugins-team-showcase"),
            "type"  => "text"
        ],
    ]
];
