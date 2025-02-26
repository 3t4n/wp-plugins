<?php

class ZCForm_Admin_Editor{

    public $content;
    public $field;
    public $d;
    public $count_key_list = 0;
    public $redirect_position = [null, null, null];
    private $fields_list = [];
    private $stop_fields_list = ['mathcaptcha', 'recaptcha', 'button'];
    private $points = [];
    private $selector = [];
    private $zcf_wp_page = [];
    private $day_list = [];

    const ZCF_DATA = [
        "fields" => [],
        "mail" => [
            "0" => [
                "whom" => "",
                "from" => "",
                "reply-to" => "",
                "subject" => "",
                "body_mail" => "",
                "files" => []
            ]
        ],
        "style" => [
            "color_title" => "",
            "color_border" => "#ccc",
            "color_focus" => "#3e97eb",
            "color_button" => "#3e97eb",
            "color_button_hover" => "#0079ea",
            "color_button_text" => "#fff",
            "color_checked" => "#3e97eb",
            "width_value" => "100",
            "width_unit" => "%",
            "height_value" => "34",
            "height_unit" => "px",
            "height_textarea_value" => "150",
            "height_textarea_unit" => "px",
            "width_button_value" => "",
            "width_button_unit" => "initial",
            "height_button_value" => "",
            "height_button_unit" => "initial",
            "border_fields_value" => "4",
            "border_fields_unit" => "px",
            "shadow" => true
        ],
        "message" => [],
        "options" => [
            "analytic" => "",
            "send_mail" => true,
            "save_form" => true,
            "redirection_rules" => ""
        ],
        "paste" => [
            "enable_paste_form_list" => false,
            "list" => [[
                "form_list_type" => "page",
                "form_list_page" => "",
                "form_list_position" => ""
                ]]
        ],
        "rank" => [
            "text" => 0,
            "datetime" => 0,
            "textarea" => 0,
            "select" => 0,
            "checkbox" => 0,
            "radio" => 0,
            "accept" => 0,
            "file" => 0,
            "rating" => 0,
            "button" => 0,
            "mail" => 0,
            "rules" => 0
        ]
    ];
    const ZCF_FIELD_DATA = [
        ["text" => []],
        ["datetime" => ['date_min_limit' => 1, 'date_max_limit' => 1, 'datetime_language' => ZCFORM_PLUGIN_LOCALE]],
        ["textarea" => []],
        ["select" => ['select_default' => 2, "list" => [0]]],
        ["checkbox" => ["list" => [0]]],
        ["radio" => ["list" => [0]]],
        ["accept" => []],
        ["file" => []],
        ["rating" => ["list" => [0]]]
    ];

    public function __construct($content = self::ZCF_DATA){

        if(count($content['fields']) === 0){
            $content['fields'] = [["button" => ['button_title' => esc_attr__('Send', 'contact-form-z'), 'button_rank' => null]]];
        }
        $content['rank'] = array_merge(self::ZCF_DATA['rank'], $content['rank']);
        $this->content = $content;
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_view_editor($form_id, $form_title = '', $type = 'add_form'){

        $args = ['numberposts' => -1, 'post_type' => 'post', 'post_status' => 'any'];
        $this->zcf_wp_post = get_posts($args);
        $args = ['numberposts' => -1, 'post_type' => 'page', 'post_status' => 'any'];
        $this->zcf_wp_page = get_posts($args);

        global $wp_locale;
        $this->day_list = ['' => esc_attr__('From Wordpress settings', 'contact-form-z')];

        for($day_index = 0; $day_index <= 6; $day_index++){
            $this->day_list[$day_index] = $wp_locale->get_weekday($day_index);
        }

        $language = [
            'ar' => esc_attr__('Arabic', 'contact-form-z'),
            'ro_RO' => esc_attr__('Romanian', 'contact-form-z'),
            'id_ID' => esc_attr__('Indonesian', 'contact-form-z'),
            'is_IS' => esc_attr__('Icelandic', 'contact-form-z'),
            'bg_BG' => esc_attr__('Bulgarian', 'contact-form-z'),
            'fa_IR' => esc_attr__('Persian/Farsi', 'contact-form-z'),
            'ru_RU' => esc_attr__('Russian', 'contact-form-z'),
            'uk' => esc_attr__('Ukrainian', 'contact-form-z'),
            'en_US' => esc_attr__('English (United States)', 'contact-form-z'),
            'el' => esc_attr__('Greek', 'contact-form-z'),
            'de_DE' => esc_attr__('German', 'contact-form-z'),
            'nl_NL' => esc_attr__('Dutch', 'contact-form-z'),
            'tr_TR' => esc_attr__('Turkish', 'contact-form-z'),
            'fr_FR' => esc_attr__('French (France)', 'contact-form-z'),
            'es_ES' => esc_attr__('Spanish (Spain)', 'contact-form-z'),
            'th' => esc_attr__('Thai', 'contact-form-z'),
            'pl_PL' => esc_attr__('Polish', 'contact-form-z'),
            'pt_PT' => esc_attr__('Portuguese (Portugal)', 'contact-form-z'),
            'sv_SE' => esc_attr__('Swedish', 'contact-form-z'),
            'km' => esc_attr__('Khmer', 'contact-form-z'),
            'ko_KR' => esc_attr__('Korean', 'contact-form-z'),
            'it_IT' => esc_attr__('Italian', 'contact-form-z'),
            'da_DK' => esc_attr__('Danish', 'contact-form-z'),
            'nn_NO' => esc_attr__('Norwegian (Nynorsk)', 'contact-form-z'),
            'ja' => esc_attr__('Japanese', 'contact-form-z'),
            'vi' => esc_attr__('Vietnamese', 'contact-form-z'),
            'sl_SI' => esc_attr__('Slovenian', 'contact-form-z'),
            'cs_CZ' => esc_attr__('Czech', 'contact-form-z'),
            'hu_HU' => esc_attr__('Hungarian', 'contact-form-z'),
            'az' => esc_attr__('Azerbaijani', 'contact-form-z'),
            'bs_BA' => esc_attr__('Bosnian', 'contact-form-z'),
            'ca' => esc_attr__('Catalan', 'contact-form-z'),
            'en_GB' => esc_attr__('English (UK)', 'contact-form-z'),
            'et' => esc_attr__('Estonian', 'contact-form-z'),
            'eu' => esc_attr__('Basque', 'contact-form-z'),
            'fi' => esc_attr__('Finnish', 'contact-form-z'),
            'gl_ES' => esc_attr__('Galician', 'contact-form-z'),
            'hr' => esc_attr__('Croatian', 'contact-form-z'),
            'lt_LT' => esc_attr__('Lithuanian', 'contact-form-z'),
            'lv' => esc_attr__('Latvian', 'contact-form-z'),
            'mk_MK' => esc_attr__('Macedonian', 'contact-form-z'),
            'mn' => esc_attr__('Mongolian', 'contact-form-z'),
            'pt_BR' => esc_attr__('Portuguese (Brazil)', 'contact-form-z'),
            'sk_SK' => esc_attr__('Slovak', 'contact-form-z'),
            'sq' => esc_attr__('Albanian (Shqip)', 'contact-form-z'),
            'sr_YU' => esc_attr__('Serbian', 'contact-form-z'),
            'sr_RS' => esc_attr__('Serbian (Cyrillic)', 'contact-form-z'),
            'sv_SE' => esc_attr__('Swedish', 'contact-form-z'),
            'zh_TW' => esc_attr__('Chinese (Traditional)', 'contact-form-z'),
            'zh_CN' => esc_attr__('Chinese (Simplified)', 'contact-form-z'),
            'ug_CN' => esc_attr__('Uighur', 'contact-form-z'),
            'he_IL' => esc_attr__('Hebrew', 'contact-form-z'),
            'hy' => esc_attr__('Armenian', 'contact-form-z'),
            'kir' => esc_attr__('Kyrgyz', 'contact-form-z'),
            'roh' => esc_attr__('Romansh', 'contact-form-z'),
            'ka_GE' => esc_attr__('Georgian', 'contact-form-z')
        ];
        array_multisort($language, SORT_ASC, SORT_LOCALE_STRING);

        $this->fields_list = [
            'text' => ['name' => esc_attr__('Single Line Text / Number', 'contact-form-z'), 'icon' => 'fa-text-width'],
            'textarea' => ['name' => esc_attr__('Paragraph Text', 'contact-form-z'), 'icon' => 'fa-paragraph'],
            'select' => ['name' => esc_attr__('Dropdown', 'contact-form-z'), 'icon' => 'fa-caret-square-o-down'],
            'checkbox' => ['name' => esc_attr__('Checkboxes', 'contact-form-z'), 'icon' => 'fa-check-square'],
            'radio' => ['name' => esc_attr__('Radio Button', 'contact-form-z'), 'icon' => 'fa-dot-circle-o'],
            'datetime' => ['name' => esc_attr__('Date / Time', 'contact-form-z'), 'icon' => 'fa-calendar'],
            'accept' => ['name' => esc_attr__('Agreement', 'contact-form-z'), 'icon' => 'fa-thumbs-o-up'],
            'file' => ['name' => esc_attr__('File Upload', 'contact-form-z'), 'icon' => 'fa-upload'],
            'rating' => ['name' => esc_attr__('Rating', 'contact-form-z'), 'icon' => 'fa-star'],
            'button' => ['name' => esc_attr__('Button', 'contact-form-z'), 'icon' => 'fa-paper-plane']
        ];
        
        $this->additional_fields_list = [
            'name' => ['name' => esc_attr__('Name', 'contact-form-z'), 'icon' => 'fa-user'],
            'tel' => ['name' => esc_attr__('Phone', 'contact-form-z'), 'icon' => 'fa-phone'],
            'email' => ['name' => esc_attr__('Email', 'contact-form-z'), 'icon' => 'fa-envelope'],
            'address' => ['name' => esc_attr__('Address', 'contact-form-z'), 'icon' => 'fa-map-marker'],
            'url' => ['name' => esc_attr__('Website / URL', 'contact-form-z'), 'icon' => 'fa-link'],
            'number' => ['name' => esc_attr__('Numbers', 'contact-form-z'), 'icon' => 'fa-hashtag'],
            'date' => ['name' => esc_attr__('Date', 'contact-form-z'), 'icon' => 'fa-calendar'],
            'time' => ['name' => esc_attr__('Time', 'contact-form-z'), 'icon' => 'fa-clock-o'],
            'rating10' => ['name' => esc_attr__('Rating 10 Stars', 'contact-form-z'), 'icon' => 'fa-star']
        ];
        
        define('ZCFORM_BASE_FIELDS_TITLE', [
            'text' => esc_attr__('Single Line Text / Number', 'contact-form-z'),
            'textarea' => esc_attr__('Paragraph Text', 'contact-form-z'),
            'select' => esc_attr__('Dropdown', 'contact-form-z'),
            'checkbox' => esc_attr__('Checkboxes', 'contact-form-z'),
            'radio' => esc_attr__('Radio Button', 'contact-form-z'),
            'datetime' => esc_attr__('Date / Time', 'contact-form-z'),
            'accept' => esc_attr__('Agreement', 'contact-form-z'),
            'file' => esc_attr__('File Upload', 'contact-form-z'),
            'rating' => esc_attr__('Rating', 'contact-form-z'),
            'button' => esc_attr__('Button', 'contact-form-z'),
            
            'name' => esc_attr__('Name', 'contact-form-z'),
            'tel' => esc_attr__('Phone', 'contact-form-z'),
            'email' => esc_attr__('Email', 'contact-form-z'),
            'address' => esc_attr__('Address', 'contact-form-z'),
            'url' => esc_attr__('Website / URL', 'contact-form-z'),
            'number' => esc_attr__('Numbers', 'contact-form-z'),
            'date' => esc_attr__('Date', 'contact-form-z'),
            'time' => esc_attr__('Time', 'contact-form-z'),
            'rating10' => esc_attr__('Rating 10 Stars', 'contact-form-z')
            ]
        );

        $this->points = [
            'mail' => [
                'title' => esc_attr__('Mail', 'contact-form-z'),
                'icon' => 'dashicons-email-alt  '
            ],
            'style' => [
                'title' => esc_attr__('Styles', 'contact-form-z'),
                'icon' => 'dashicons-admin-customizer'
            ],
            'paste' => [
                'title' => esc_attr__('Publication', 'contact-form-z'),
                'icon' => 'dashicons-paperclip'
            ],
            'message' => [
                'title' => esc_attr__('Notifications', 'contact-form-z'),
                'icon' => 'dashicons-admin-comments'
            ],
            'logic' => [
                'title' => esc_attr__('Logic', 'contact-form-z'),
                'icon' => 'dashicons-randomize'
            ],
            'options' => [
                'title' => esc_attr__('Additionally', 'contact-form-z'),
                'icon' => 'dashicons-admin-generic'
            ]
        ];

        if(count($this->content['message']) === 0){
            $this->content['message'] = [
                'msg_send' => esc_attr__('Form data sent. Thank you for your message.', 'contact-form-z'),
                'msg_not_send' => esc_attr__('Failed to submit the form. Try to send later.', 'contact-form-z'),
                'msg_not_completed' => esc_attr__('The form fields are incorrect. Check and resubmit the form', 'contact-form-z'),
                'msg_form_required' => esc_attr__('Not all required fields have been filled.', 'contact-form-z'),
                'msg_min_value' => esc_attr__('The value is less than the minimum.', 'contact-form-z'),
                'msg_max_value' => esc_attr__('Value is greater than the maximum allowed.', 'contact-form-z'),
                'msg_accept' => esc_attr__('You have not read the terms of the agreement.', 'contact-form-z'),
                'msg_field_not_completed' => esc_attr__('The form field is incorrect', 'contact-form-z'),
                'msg_field_required' => esc_attr__('Required field.', 'contact-form-z'),
                'msg_load_file' => esc_attr__('Failed to upload file. Check file settings.', 'contact-form-z')
            ];
        }

        if(!isset($this->content['paste']['list'])){
            $this->content['paste']['list'] = [[
                "form_list_type" => "page",
                "form_list_page" => "",
                "form_list_position" => ""
            ]];
        }

        define('ZCFORM_FIELDS_NAME', isset($this->content['plugin']['fields_name']) ? $this->content['plugin']['fields_name'] : []);
        define('ZCFORM_FIELDS_LIST', isset($this->content['plugin']['fields_list']) ? $this->content['plugin']['fields_list'] : []);

        define('ZCFORM_COLORS_STYLE', [
            'default' => [
                'name' => esc_attr__('Default', 'contact-form-z'),
                'param' => [
                    "color_title" => "",
                    "color_border" => "#ccc",
                    "color_focus" => "#3e97eb",
                    "color_button" => "#3e97eb",
                    "color_button_hover" => "#0079ea",
                    "color_button_text" => "#fff",
                    "color_checked" => "#3e97eb",
                ]
            ],
            'black1' => [
                'name' => esc_attr__('Black', 'contact-form-z').' 1',
                'param' => [
                    "color_title" => "#000",
                    "color_border" => "#000",
                    "color_focus" => "#000",
                    "color_button" => "#000",
                    "color_button_hover" => "#000",
                    "color_button_text" => "#fff",
                    "color_checked" => "#000"
                ]
            ],
            'black2' => [
                'name' => esc_attr__('Black', 'contact-form-z').' 2',
                'param' => [
                    "color_title" => "#000",
                    "color_border" => "#000",
                    "color_focus" => "#b00020",
                    "color_button" => "#000",
                    "color_button_hover" => "#b00020",
                    "color_button_text" => "#fff",
                    "color_checked" => "#b00020"
                ]
            ],
            'blue1' => [
                'name' => esc_attr__('Blue', 'contact-form-z').' 1',
                'param' => [
                    "color_title" => "#0336ff",
                    "color_border" => "#0336ff",
                    "color_focus" => "#0336ff",
                    "color_button" => "#0336ff",
                    "color_button_hover" => "#0336ff",
                    "color_button_text" => "#fff",
                    "color_checked" => "#0336ff"
                ]
            ],
            'blue2' => [
                'name' => esc_attr__('Blue', 'contact-form-z').' 2',
                'param' => [
                    "color_title" => "#0336ff",
                    "color_border" => "#0336ff",
                    "color_focus" => "#fdde03",
                    "color_button" => "#0336ff",
                    "color_button_hover" => "#fdde03",
                    "color_button_text" => "#fff",
                    "color_checked" => "#fdde03"
                ]
            ],
            'deep_gray2' => [
                'name' => esc_attr__('Deep Gray', 'contact-form-z'),
                'param' => [
                    "color_title" => "#78909c",
                    "color_border" => "#78909c",
                    "color_focus" => "#78909c",
                    "color_button" => "#78909c",
                    "color_button_hover" => "#78909c",
                    "color_button_text" => "#fff",
                    "color_checked" => "#78909c"
                ]
            ],
            'deep_orange1' => [
                'name' => esc_attr__('Deep Orange', 'contact-form-z'),
                'param' => [
                    "color_title" => "#ff3d00",
                    "color_border" => "#ff3d00",
                    "color_focus" => "#ff3d00",
                    "color_button" => "#ff3d00",
                    "color_button_hover" => "#ff3d00",
                    "color_button_text" => "#fff",
                    "color_checked" => "#ff3d00"
                ]
            ],
            'pink' => [
                'name' => esc_attr__('Pink', 'contact-form-z'),
                'param' => [
                    "color_title" => "#ff0266",
                    "color_border" => "#ff0266",
                    "color_focus" => "#ff0266",
                    "color_button" => "#ff0266",
                    "color_button_hover" => "#ff0266",
                    "color_button_text" => "#fff",
                    "color_checked" => "#ff0266"
                ]
            ],
            'yellow1' => [
                'name' => esc_attr__('Yellow', 'contact-form-z').' 1',
                'param' => [
                    "color_title" => "#ffde03",
                    "color_border" => "#ffde03",
                    "color_focus" => "#ffde03",
                    "color_button" => "#ffde03",
                    "color_button_hover" => "#ffde03",
                    "color_button_text" => "#000",
                    "color_checked" => "#ffde03"
                ]
            ],
            'yellow2' => [
                'name' => esc_attr__('Yellow', 'contact-form-z').' 2',
                'param' => [
                    "color_title" => "#0336ff",
                    "color_border" => "#ffde03",
                    "color_focus" => "#ff0266",
                    "color_button" => "#0336ff",
                    "color_button_hover" => "#ff0266",
                    "color_button_text" => "#fff",
                    "color_checked" => "#ffde03"
                ]
            ],
            ]
        );
        
        define('ZCFORM_RULES_TITLE', [
            'if' => esc_attr__('IF', 'contact-form-z'),
            'then' => esc_attr__('THEN', 'contact-form-z'),
            'else' => esc_attr__('ELSE', 'contact-form-z'),
            'show' => esc_attr__('Show', 'contact-form-z'),
            'hide' => esc_attr__('Hide', 'contact-form-z'),
            'field' => esc_attr__('field', 'contact-form-z'),
            'field_values' => esc_attr__('field values', 'contact-form-z'),
            'or' => esc_attr__('or', 'contact-form-z'),
            'selected' => esc_attr__('Selected', 'contact-form-z'),
            'not_selected' => esc_attr__('Not selected', 'contact-form-z'),
            'select_field' => esc_attr__('Select a field', 'contact-form-z'),
            'all' => esc_attr__('Choose all', 'contact-form-z'),
            'rule_title' => esc_attr__('Rule', 'contact-form-z')
            ]
        );

        define('ZCFORM_EDITOR_BUTTOM_TITLE', [
            'edit' => esc_attr__('Edit Field', 'contact-form-z'),
            'hide' => esc_attr__('Hide Field', 'contact-form-z'),
            'show' => esc_attr__('Show Field', 'contact-form-z'),
            'copy' => esc_attr__('Copy Field', 'contact-form-z'),
            'up' => esc_attr__('Up Field', 'contact-form-z'),
            'down' => esc_attr__('Down Field', 'contact-form-z'),
            'delete' => esc_attr__('Delete Field', 'contact-form-z')
            ]
        );

        define('ZCFORM_TEMPLATE_FIELDS_NAME', [
            'name' => esc_attr__('Name', 'contact-form-z'),
            'phone' => esc_attr__('Phone', 'contact-form-z'),
            'email' => esc_attr__('Email', 'contact-form-z'),
            'list_title' => esc_attr__('Please tell us the priority level', 'contact-form-z'),
            'low' => esc_attr__('Low', 'contact-form-z'),
            'normal' => esc_attr__('Normal', 'contact-form-z'),
            'high' => esc_attr__('High', 'contact-form-z'),
            'message' => esc_attr__('Message', 'contact-form-z'),
            'file_upload' => esc_attr__('File upload', 'contact-form-z'),
            'copy' => esc_attr__('copy', 'contact-form-z')
            ]
        );

        $condition_list = [
            'text' => ['||' => '='],
            'number' => ['||' => '=', '>' => '>', '<' => '<'],
            'textarea' => ['||' => '='],
            'datetime' => ['||' => '=', '>' => '>', '<' => '<'],
            'select' => ['==' => '=', '||' => ZCFORM_RULES_TITLE['or']],
            'checkbox' => ['==' => '=', '||' => ZCFORM_RULES_TITLE['or']],
            'radio' => ['==' => '=', '||' => ZCFORM_RULES_TITLE['or']],
            'accept' => ['==' => '='],
            'file' => ['==' => '='],
            'rating' => ['==' => '=', '||' => ZCFORM_RULES_TITLE['or']]
        ];

        define('ZCFORM_SELECTOR', [
            "fields" => [
                "text" => [
                    "text_field_type" => [
                        'text' => esc_attr__('Text', 'contact-form-z'),
                        'number' => esc_attr__('Number', 'contact-form-z'),
                        'email' => esc_attr__('Email', 'contact-form-z'),
                        'tel' => esc_attr__('Phone', 'contact-form-z'),
                        'url' => esc_attr__('URL', 'contact-form-z')
                    ],
                    "text_default" => [
                        'text' => esc_attr__('Specify', 'contact-form-z'),
                        'user_login' => __('Username'),
                        'user_email' => __('Email'),
                        'nickname' => __('Nickname'),
                        'first_name' => __('First Name'),
                        'last_name' => __('Last Name'),
                        'display_name' => __('Display name publicly as'),
                        'user_url' => __('Website')
                    ]
                ],
                "datetime" => [
                    "date_formats" => array_unique(apply_filters('date_formats', [__('F j, Y'), 'Y-m-d', 'm/d/Y', 'd/m/Y'])),
                    "time_formats" => array_unique(apply_filters('time_formats', [__('g:i a'), 'g:i A', 'H:i'])),
                    "datetime_field_type" => [
                        'date' => esc_attr__('Date', 'contact-form-z'),
                        'time' => esc_attr__('Time', 'contact-form-z'),
                        'datetime' => esc_attr__('Date and time', 'contact-form-z')
                    ],
                    "datetime_format" => [
                        '1' => esc_attr__('From Wordpress settings', 'contact-form-z'),
                        '2' => esc_attr__('Choose', 'contact-form-z')
                    ],
                    "datetime_list" => [
                        '1' => esc_attr__('Specify', 'contact-form-z'),
                        '2' => esc_attr__('Current date / time', 'contact-form-z'),
                        '3' => esc_attr__('+/- days left to the date or minutes left to the time', 'contact-form-z')
                    ],
                    "datetime_start_day" => $this->day_list,
                    "datetime_language" => $language
                ],
                "select" => [
                    "select_default" => [
                        '2' => esc_attr__('Choose from items', 'contact-form-z'),
                        '1' => esc_attr__('Specify', 'contact-form-z')
                    ]
                ],
                "accept" => [
                    "accept_default" => [
                        '' => esc_attr__('Shot', 'contact-form-z'),
                        'checked' => esc_attr__('Installed', 'contact-form-z')
                    ],
                    "accept_condition" => [
                        true => esc_attr__('Install', 'contact-form-z'),
                        false => esc_attr__('Take off', 'contact-form-z')
                    ],
                    "accept_type" => [
                        '0' => esc_attr__('Disabled', 'contact-form-z'),
                        '1' => esc_attr__('URL', 'contact-form-z'),
                        '2' => esc_attr__('Spoiler', 'contact-form-z')
                    ]
                ],
                "rating" => [
                    "rating_type" => [
                        'stars' => esc_attr__('Stars Rating', 'contact-form-z'),
                        'vertical' => esc_attr__('Vertical Rating', 'contact-form-z'),
                        'movie' => esc_attr__('Movie Rating', 'contact-form-z'),
                        'square' => esc_attr__('Square Rating', 'contact-form-z'),
                        'pill' => esc_attr__('Pill Rating', 'contact-form-z'),
                        'reversed' => esc_attr__('Reversed Rating', 'contact-form-z'),
                        'horizontal' => esc_attr__('Horizontal Rating', 'contact-form-z'),
                    ],
                    "rating_points" => [
                        '1' => '5',
                        '2' => '10',
                        '3' => esc_attr__('Specify', 'contact-form-z')
                    ]
                ],
            ],
            'style' => [
                "width_unit" => [
                    '%' => '%',
                    'px' => 'px',
                    'em' => 'em'
                ],
                "height_unit" => [
                    'px' => 'px',
                    'em' => 'em'
                ],
                "width_button_unit" => [
                    'initial' => 'initial',
                    '%' => '%',
                    'px' => 'px',
                    'em' => 'em'
                ],
                "height_button_unit" => [
                    'initial' => 'initial',
                    'px' => 'px',
                    'em' => 'em'
                ]
            ],
            'options' => [
                "redirection_rules" => [
                    "" => esc_attr__('Disabled', 'contact-form-z'),
                    "one" => esc_attr__('Enabled. One page', 'contact-form-z'),
                    "more" => esc_attr__('Enabled. Few pages', 'contact-form-z'),
                ],
                'condition' => $condition_list
            ],
            'paste' => [
                "form_list_type" => [
                    "page" => esc_attr__('Page', 'contact-form-z'),
                    "post" => esc_attr__('Record', 'contact-form-z')
                ],
                "form_list_position" => [
                    "before" => esc_attr__('Before content', 'contact-form-z'),
                    "after" => esc_attr__('After content', 'contact-form-z')
                ]
            ]
        ]);

        global $wp_styles;
        $form_style = ZCForm_Static::zcform_get_fields_style($this->content["style"]);
        $wp_styles->add(ZCFORM_PLUGIN_NAME.'-generate-style', false, []);
        $wp_styles->add_inline_style(ZCFORM_PLUGIN_NAME.'-generate-style', $form_style);
        $wp_styles->enqueue([ZCFORM_PLUGIN_NAME.'-generate-style']);

        require ZCFORM_PLUGIN_DIR.'/admin/partials/points/'.ZCFORM_PLUGIN_NAME.'-admin-editor.php';

        global $wp_scripts;
        $form_scripts = ZCForm_Static::zcform_get_fields_script($this->content['fields'], false, '', [], '', $type);
        $wp_scripts->add(ZCFORM_PLUGIN_NAME.'-generate-script', false, []);
        $wp_scripts->add_inline_script(ZCFORM_PLUGIN_NAME.'-generate-script', $form_scripts);
        $wp_scripts->print_inline_script(ZCFORM_PLUGIN_NAME.'-generate-script');
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_view_list_preview_field($data_list = self::ZCF_FIELD_DATA, $button = false){

        foreach($data_list as $data){

            $this->field_key = !is_null(key($data)) ? key($data) : '';
            if((in_array($this->field_key, $this->stop_fields_list) && !$button) || (!in_array($this->field_key, $this->stop_fields_list) && $button))
                continue;

            $this->d = is_array($data[$this->field_key]) ? $data[$this->field_key] : [];
            $zcf_rnk = (isset($this->d[$this->field_key.'_rank']) ? $this->d[$this->field_key.'_rank'] : 0);

            require ZCFORM_PLUGIN_DIR."/admin/partials/preview/".ZCFORM_PLUGIN_NAME."-{$this->field_key}-field.php";
        }
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_view_list_field($data_list = self::ZCF_FIELD_DATA, $button = false){

        foreach($data_list as $data){

            $this->field_key = !is_null(key($data)) ? key($data) : '';
            if((in_array($this->field_key, $this->stop_fields_list) && !$button) || (!in_array($this->field_key, $this->stop_fields_list) && $button) || in_array($this->field_key, ['mathcaptcha', 'recaptcha']))
                continue;

            $this->count_key_list = 0;
            $this->d = is_array($data[$this->field_key]) ? $data[$this->field_key] : [];

            require ZCFORM_PLUGIN_DIR.'/admin/partials/fields/'.ZCFORM_PLUGIN_NAME.'-base-field.php';
        }
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_history_list($res){

        switch($res['type']){
            case 'edit_form':

                global $wpdb;
                $history = $wpdb->get_results(
                    $wpdb->prepare(
                        "SELECT id, add_date, version FROM {$wpdb->prefix}zcf_form_list_history WHERE form_list_id = %d ORDER BY id DESC;", $res['id']
                    )
                    , ARRAY_A
                );
                ?>

                <div class="zcf_info_form">
                    <table>
                        <tr>
                            <td>
                                <?php if(isset($res["version"])):?>
                                    <div class="zcf_info_block">
                                        <?=esc_attr__('Version of the form', 'contact-form-z').': v.'.sprintf('%0.1f', $res['version']);?>
                                    </div>
                                <?php endif;?>

                                <?php if(count($history) > 0 && !is_null($history)):?>
                                    <div class="zcf_info_block">
                                        <a class="zcf_history_form"><?php esc_attr_e('Show change history', 'contact-form-z');?></a>
                                    </div>
                                    <div class="zcf_info_block zcf_history_form_list">
                                        <table class="zcf_history_form_table">
                                            <tr>
                                                <th><?php esc_attr_e('Version', 'contact-form-z')?></th>
                                                <th><?php esc_attr_e('Date', 'contact-form-z')?></th>
                                                <th><?php esc_attr_e('Time', 'contact-form-z')?></th>
                                                <th></th>
                                            </tr>
                                            <?php foreach($history as $d):?>
                                                <tr>
                                                    <td>v.<?=sprintf('%0.1f', $d['version'])?></td>
                                                    <td><?=mysql2date(get_option('date_format'), $d['add_date'])?></td>
                                                    <td><?=mysql2date(get_option('time_format'), $d['add_date'])?></td>
                                                    <td><?=sprintf('<a href="?page=%s&form_id=%d">'.(esc_html__('Show', 'contact-form-z')).'</a>', 'zcf-restore-form', $d['id'])?></td>
                                                </tr>
                                            <?php endforeach;?>
                                        </table>
                                    </div>
                                <?php endif;?>

                            </td>
                            <td class="zcf_position">
                                <input type="button" class="button button-default zcf_copy_form" data-value="<?=$res['id']?>" value="<?php esc_html_e('Duplicate', 'contact-form-z')?>">
                            </td>
                        </tr>
                    </table>
                </div>    
                <?php
                break;
            case 'restore_form':
                ?>

                <div id="minor-publishing" class="zcf_info_form">
                    <div class="zcf_info_block">
                        <b class="zcf_restore_form_info">
                            <?=esc_attr__('Attention! Any changes made in the form editing block will not be saved during recovery. You can make all necessary changes after the recovery.', 'contact-form-z');?>
                        </b>
                    </div>
                    <div class="clear"></div>
                </div> 

                <?php
                break;
        }
    }

}
