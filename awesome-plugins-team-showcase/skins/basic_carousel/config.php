<?php

return [
    "id"             => "basic_carousel",
    "title"          => "Basic carousel",
    "documentation"  => "https://awesome-plugins.com/downloads/team-showcase-plugin",
    "grid"           => "carousel",
    "card"           => "custom",
    "columns"        => 3,
    "extrainfo"      => "none",
    "settings"       => [
        "columns", "autoslide", "interval", "indicators", "arrows"        
    ],
    "extrainfo_action" => [
        "No action", 
        "Link to member"
    ],
    "fields"         => [
        [
            "id"    => "position",
            "label" => __("Position", "awesome-team-showcase"),
            "type"  => "text"
        ],
    ]
];
