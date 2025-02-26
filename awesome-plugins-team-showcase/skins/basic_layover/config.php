<?php

return [
    "id"             => "basic_layover",
    "title"          => "Basic layover",
    "grid"           => "grid",
    "card"           => "custom",
    "columns"       => 3,
    "max_columns"   => 6,
    "extrainfo"      => "layover",
    "extrainfo_card" => "none",
    "settings"       => [
        "columns"
    ],
    "fields"        => [
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
