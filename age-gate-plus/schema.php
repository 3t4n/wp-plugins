<?php

if (!defined('ABSPATH')) {
    exit;
}

return [
    "age_gator_templates" => [
        "label" => "Starter Templates",
        "fields" => [
            "age_gator_template" => [
                "label" => "Template",
                "default" => "basic",
                "type" => "select",
                "options" => array_reduce(AGE_GATOR_TEMPLATES, function ($acc, $template) {
                    $acc[$template] = ucwords($template);
                    return $acc;
                }, [ 'basic' => 'Basic' ]),
                "description" => "Select a starter template with preset options. Careful, changing this will overwrite any existing settings."
            ],
        ]
    ],
    "age_gator_settings" => [
        "label" => "Settings",
        "fields" => [
            "age_gator_type" => [
                "label" => "Check age with",
                "default" => "birthday",
                "type" => "select",
                "options" => [
                    "button" => "Yes/No Button",
                    "age" => "Age Entry",
                    "birthday" => "Birthday Entry",
                    "checkbox" => "Confirmation Checkbox",
                ],
                "description" => "The input type that the user must submit to pass the age gate",
            ],
            "age_gator_age" => [
                "label" => "Minimum Age",
                "default" => 21,
                "type" => "number",
                "min" => 0,
                "max" => 150,
            ],
            "age_gator_auto_submit" => [
                "label" => "Auto Submit",
                "default" => true,
                "type" => "checkbox",
                "description" => "Should the form automatically submit itself once a passing age is recognized?",
                "master" => [
                    "name" => "age_gator_type",
                    "values" => ["birthday"],
                ],
            ],
            "age_gator_precheck_checkbox" => [
                "label" => "Pre-check Checkbox",
                "default" => false,
                "type" => "checkbox",
                "description" => "Whether or not the checkbox should be pre-checked when the user first sees the age gate",
                "master" => [
                    "name" => "age_gator_type",
                    "values" => ["checkbox"],
                ],
            ],
            "age_gator_remember_user" => [
                "label" => "Remember User",
                "default" => false,
                "type" => "checkbox",
                "description" => "Should the user be remembered after successfully passing the age gate? Turning this off will require the age gate to be passed for every page visited (Disabling this feature can useful for testing).",
            ],
            "age_gator_remember_user_time" => [
                "label" => "Remember User Expiration Time",
                "default" => 30,
                "type" => "number",
                "min" => 0,
                "max" => 9999,
                "units" => "days",
                "description" => "The length of time that a user will be remembered after they pass the age gate",
                "master" => [
                    "name" => "age_gator_remember_user",
                    "values" => [true],
                ],
            ],
            "age_gator_limit_attempts" => [
                "label" => "Limit Attempts",
                "default" => false,
                "type" => "checkbox",
                "description" => "Should the user be blocked after a certain number of attempts? Note that savy users can bypass this limit by deleting cookies or modifying HTML/CSS.",
            ],
            "age_gator_max_attempts" => [
                "label" => "Max Attempts",
                "default" => 1,
                "min" => 1,
                "max" => 9999,
                "type" => "number",
                "description" => "The number of attempts allowed before a user is blocked",
                "master" => [
                    "name" => "age_gator_limit_attempts",
                    "values" => [true],
                ],
            ],
            "age_gator_lock_time" => [
                "label" => "Block User Expiration Time",
                "default" => 30,
                "type" => "number",
                "min" => 0,
                "max" => 9999,
                "units" => "days",
                "description" => "The length of time that a user will be blocked after they fail the age gate",
                "master" => [
                    "name" => "age_gator_limit_attempts",
                    "values" => [true],
                ],
            ],
            "age_gator_bypass_logged_in_users" => [
                "label" => "Ignore Logged In Users",
                "default" => false,
                "type" => "checkbox",
                "description" => "Allow logged in users to bypass the age gate",
            ],
            "age_gator_retry_button" => [
                "label" => "Show Retry Button",
                "default" => false,
                "type" => "checkbox",
                "description" => "If the user fails the age gate, should a retry button appear that allows them to retry?",
            ],
            "age_gator_redirect_on_fail" => [
                "label" => "Redirect User on Fail",
                "default" => false,
                "type" => "checkbox",
                "description" => "If the user fails the age gate, should they be redirected to another URL?",
            ],
            "age_gator_redirect" => [
                "label" => "Fail Redirect URL",
                "default" => '',
                "type" => "url",
                "description" => "The URL that the user wil be redirected to if they fail the age gate",
                "master" => [
                    "name" => "age_gator_redirect_on_fail",
                    "values" => [true],
                ],
            ],
        ],
    ],
    "age_gator_heading" => [
        "label" => "Heading",
        "fields" => [
            "age_gator_heading_color" => [
                "label" => "Color",
                "default" => "",
                "type" => "color",
            ],
            "age_gator_heading" => [
                "label" => "Text",
                "default" => "We have to ask...",
                "type" => "textarea",
                "description" => "The heading that appears at the top of the age gate",
            ],
            "age_gator_heading_manual_fontsize" => [
                "label" => "Set Font Size manually",
                "default" => false,
                "type" => "checkbox",
            ],
            "age_gator_heading_fontsize_desktop" => [
                "label" => "Font Size on Desktop",
                "default" => 30,
                "type" => "number",
                "min" => 0,
                "max" => 9999,
                "units" => "px",
                "master" => [
                    "name" => "age_gator_heading_manual_fontsize",
                    "values" => [true],
                ],
            ],
            "age_gator_heading_fontsize_mobile" => [
                "label" => "Font Size on Mobile",
                "default" => 24,
                "type" => "number",
                "min" => 0,
                "max" => 9999,
                "units" => "px",
                "master" => [
                    "name" => "age_gator_heading_manual_fontsize",
                    "values" => [true],
                ],
            ],
            "age_gator_heading_manual_fontfamily" => [
                "label" => "Set Font Family manually",
                "default" => false,
                "type" => "checkbox",
            ],
            "age_gator_heading_fontfamily" => [
                "label" => "Font Family",
                "default" => "serif",
                "type" => "text",
                "master" => [
                    "name" => "age_gator_heading_manual_fontfamily",
                    "values" => [true],
                ],
            ],
        ],
    ],
    "age_gator_message" => [
        "label" => "Message",
        "fields" => [
            "age_gator_message_color" => [
                "label" => "Message Color",
                "default" => "",
                "type" => "color",
            ],
            "age_gator_prompt" => [
                "label" => "Prompt Message",
                "default" => "Are you above the age of [AGE]? Please provide your date of birth below:",
                "type" => "textarea",
                "description" => "The text that a user sees when first encountering the age gate. You can use <code>[AGE]</code> to reference the current age limit.",
            ],
            "age_gator_success" => [
                "label" => "Success Message",
                "default" => "Welcome to the site!",
                "type" => "textarea",
                "description" => "The text that a user sees after passing the age gate",
            ],
            "age_gator_fail" => [
                "label" => "Failure Message",
                "default" => "Whoops! You cannot enter the site!",
                "type" => "textarea",
                "description" => "The text that a user sees after failing the age gate",
            ],
            "age_gator_disclaimer" => [
                "label" => "Disclaimer Message",
                "default" => "By entering this site you are agreeing to the Terms of Use and Privacy Policy.",
                "type" => "textarea",
                "description" => "Disclaimer text that appears at the bottom of the modal"
            ],
        ],
    ],
    "agp_buttons" => [
        "label" => "Buttons",
        "fields" => [
            "age_gator_primary_button_text_color" => [
                "label" => "Primary Button Text Color",
                "default" => "",
                "type" => "color",
                "description" => "Submit, reset, and pass buttons are considered primary buttons."
            ],
            "age_gator_primary_button_background_color" => [
                "label" => "Primary Button Background Color",
                "default" => "",
                "type" => "color"
            ],
            "age_gator_button_text_color" => [
                "label" => "Secondary Button Text Color",
                "default" => "",
                "type" => "color",
                "description" => "The fail button is considered a secondary button."
            ],
            "age_gator_secondary_button_background_color" => [
                "label" => "Secondary Button Background Color",
                "default" => "",
                "type" => "color"
            ],
            "age_gator_submit_button_text" => [
                "label" => "Submit Button Text",
                "default" => "Submit",
                "type" => "text",
                "description" => "The text appearing on the submit button",
                "master" => [
                    "name" => "age_gator_type",
                    "values" => ["age", "birthday", "checkbox"],
                ],
            ],
            "age_gator_pass_button_text" => [
                "label" => "Pass Button Text",
                "default" => "Yes",
                "type" => "text",
                "description" => "The text appearing on the button that passes the age gate",
                "master" => [
                    "name" => "age_gator_type",
                    "values" => ["button"],
                ],
            ],
            "age_gator_fail_button_text" => [
                "label" => "Fail Button Text",
                "default" => "No",
                "type" => "text",
                "description" => "The text appearing on the button that fails the age gate",
                "master" => [
                    "name" => "age_gator_type",
                    "values" => ["button"],
                ],
            ],
            "age_gator_checkbox_text" => [
                "label" => "Checkbox Text",
                "default" => "I confirm that I am [AGE] years old or older",
                "type" => "text",
                "description" => "The text that appears beside the checkbox",
                "master" => [
                    "name" => "age_gator_type",
                    "values" => ["checkbox"],
                ],
            ],
            "age_gator_retry_button_text" => [
                "label" => "Retry Button Text",
                "default" => "Retry",
                "type" => "text",
                "description" => "The text appearing on the submit button",
                "master" => [
                    "name" => "age_gator_retry_button",
                    "values" => [true],
                ],
            ],
        ],
    ],
    "age_gator_background" => [
        "label" => "Background",
        "fields" => [
            "age_gator_background_image" => [
                "label" => "Background Image",
                "default" => "",
                "type" => "image",
                "size" => "full",
                "description" => "Optionally add a background image behind the modal",
            ],
            "age_gator_background_color" => [
                "label" => "Background Color",
                "default" => "#000000",
                "type" => "color",
                "description" => "The color of the background behind the modal",
            ],
            "age_gator_background_opacity" => [
                "label" => "Background Opacity",
                "default" => "50",
                "type" => "number",
                "min" => 0,
                "max" => 100,
                "units" => "%",
                "description" => "The opacity/transparency of the background. Set this to 100 for a fully opaque (not transparent) background, or set this to 0 for a fully transparent one.",
            ],
        ],
    ],
    "age_gator_modal" => [
        "label" => "Modal",
        "fields" => [
            "age_gator_modal_image" => [
                "label" => "Modal Icon",
                "default" => "",
                "type" => "image",
                "size" => "medium",
                "description" => "The icon that appears above the headline",
            ],
            "age_gator_modal_image2" => [
                "label" => "Modal Image",
                "default" => "",
                "type" => "image",
                "size" => "medium",
                "description" => "The image appearing on the modal.",
            ],
            "age_gator_modal_image_width" => [
                "label" => "Modal Image Width",
                "default" => 150,
                "type" => "number",
                "min" => 0,
                "max" => 9999,
                "units" => "px",
                "description" => "The width (in pixels) of the image or icon that appears on the modal",
                "master" => [
                    "name" => "age_gator_modal_image",
                    "values" => [null, false, ""],
                    "not" => true,
                ],
            ],
            "age_gator_modal_color" => [
                "label" => "Modal Background Color",
                "default" => "#f3f3f3",
                "type" => "color",
                "description" => "The color of the modal panel",
            ],
            "age_gator_modal_text_color" => [
                "label" => "Modal Text Color",
                "default" => "",
                "type" => "color",
                "description" => "The color of the modal's text. Can be overwritten for the heading and message individually."
            ],
            "age_gator_max_width" => [
                "label" => "Modal Max Width",
                "default" => 600,
                "type" => "number",
                "min" => 100,
                "max" => 1600,
                "units" => "px",
            ],
            "age_gator_modal_padding_units" => [
                "label" => "Modal Padding Units",
                "default" => "pixels",
                "type" => "select",
                "options" => [
                    "percentage" => "Percentage",
                    "pixels" => "Pixels",
                ],
                "description" => "The units used to set the modal padding (outer spacing). Percentage grows with screen size, but Pixels remain constant",
            ],
            "age_gator_modal_padding_percent" => [
                "label" => "Modal Padding",
                "default" => 10,
                "type" => "number",
                "min" => 0,
                "max" => 100,
                "units" => "%",
                "description" => "The padding (outer spacing) inside the modal",
                "master" => [
                    "name" => "age_gator_modal_padding_units",
                    "values" => ["percentage"],
                ],
            ],
            "age_gator_modal_padding_px" => [
                "label" => "Modal Padding",
                "default" => 40,
                "type" => "number",
                "min" => 0,
                "max" => 9999,
                "units" => "px",
                "description" => "The padding (outer spacing) inside the modal",
                "master" => [
                    "name" => "age_gator_modal_padding_units",
                    "values" => ["pixels"],
                ],
            ],
        ],
    ],
    "age_gator_timing" => [
        "label" => "Timing",
        "fields" => [
            "age_gator_prompt_delay_length" => [
                "label" => "Prompt Delay Length",
                "default" => 600,
                "min" => 0,
                "max" => 9999,
                "type" => "number",
                "units" => "ms",
                "description" => "The amount of time (in milliseconds, 1000ms = 1s) that the prompt message will remain for after submission.",
            ],
            "age_gator_success_delay_length" => [
                "label" => "Success Delay Length",
                "default" => 600,
                "min" => 0,
                "max" => 9999,
                "type" => "number",
                "units" => "ms",
                "description" => "The amount of time (in milliseconds, 1000ms = 1s) that the success message will remain for after passing the age gate. Setting this to zero will bypass the success message entirely.",
            ],
        ],
    ],
    "age_gator_pages" => [
        "label" => "Pages",
        "fields" => [
            "age_gator_guarding" => [
                "label" => "Show Age Gate on",
                "default" => "all",
                "type" => "select",
                "options" => [
                    "all" => "All Pages",
                    "blacklist" => "All Pages Except Those Specified (Blacklist)",
                    "whitelist" => "Only Specified Pages (Whitelist)",
                ],
                "description" => "Select whether the age gate should appear on all pages, all pages except those specified, or only on pages specified",
            ],
            "age_gator_blacklist" => [
                "label" => "Page Blacklist",
                "type" => "textarea",
                "default" => "",
                "description" => "Ensure that all listed pages end in a slash. For example, \"/sample-page/\"",
                "master" => [
                    "name" => "age_gator_guarding",
                    "values" => ["blacklist"],
                ],
            ],
            "age_gator_whitelist" => [
                "label" => "Page Whitelist",
                "type" => "textarea",
                "default" => "",
                "description" => "Ensure that all listed pages end in a slash. For example, \"/sample-page/\"",
                "master" => [
                    "name" => "age_gator_guarding",
                    "values" => ["whitelist"],
                ],
            ],
        ],
    ]
];
