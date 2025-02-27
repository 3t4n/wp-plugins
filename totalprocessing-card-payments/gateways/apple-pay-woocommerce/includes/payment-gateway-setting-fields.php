<?php

$tabsFieldsArray =  [
    'general'           => [
        'title'                       => 'Applepay via Total processing',
        'description'                 => '<b>General Settings</b>',
        'fields'                      => [
            'enabled'              => [
                'title'                   => 'Enable/Disable',
                'label'                   => 'Toggle switch to enable or disable applepay',
                'type'                    => 'checkbox',
                'description'             => '',
                'default'                 => 'no',
                'class'                   => 'wppd-ui-toggle',
            ],
            'onlyadmins'           => [
                'title'                   => 'Button visible to admin logged in users only',
                'label'                   => 'Toggle switch to enable or disable',
                'type'                    => 'checkbox',
                'description'             => 'This allows the merchant to test applepay without having it visible to all users.',
                'default'                 => 'no',
                'class'                   => 'wppd-ui-toggle',
                'desc_tip'                => true
            ],
            'onlyLoggedIn'         => [
                'title'                   => 'Logged in users only?',
                'label'                   => 'Enable logged in restriction to Apple Pay?',
                'type'                    => 'checkbox',
                'description'             => 'Restricts applepay visibility to just logged in users',
                'default'                 => 'no',
                'class'                   => 'wppd-ui-toggle',
                'desc_tip'                => true
            ],
            'inheritcreds'         => [
                'title'                   => 'Inherit credentials from card processing',
                'label'                   => 'Toggle switch to enable or disable',
                'type'                    => 'checkbox',
                'description'             => 'Inherit Gateway credentials from card processing',
                'default'                 => 'no',
                'class'                   => 'wppd-ui-toggle',
                'desc_tip'                => true
            ],
        ]
    ],
    'Gateway Settings'          => [
        'title'                       => 'Gateway Settings',
        'description'                 => 'Set credentials for processing via the Total Processing Gateway. You can obtain these credentials by logging into our reporting platform',
        'fields'                      => [
            'platformBase'         => [
                'title'                   => 'Processing Mode',
                'type'                    => 'select',
                'class'                   => 'wc-enhanced-select-nostd',
                'default'                 => 'live',
                'options'                 => [
                    'live' => 'Live',
                    'test' => 'Test'
                ]
            ],
            'entityId_test'        => [
                'title'                   => 'Entity Id (TEST)',
                'type'                    => 'text',
                'class'                   => '',
                'description'             => 'Enabled channel for Apple Pay.',
                'default'                 => '',
                'desc_tip'                => true,
                'disabled'                => ( $this->inheritcreds == 'yes' && !empty( $this->entityId_test ) ) ?  true : false,
            ],
            'accessToken_test'     => [
                'title'                   => 'Access Token (TEST)',
                'type'                    => 'text',
                'class'                   => '',
                'description'             => 'Provided by Total Processing',
                'default'                 => '',
                'desc_tip'                => true,
                'disabled'                => ( $this->inheritcreds == 'yes' && !empty( $this->accessToken_test ) ) ?  true : false,
            ],
            'entityId'             => [
                'title'                   => 'Entity Id (LIVE)',
                'type'                    => 'text',
                'class'                   => '',
                'description'             => 'Enabled channel for Apple Pay.',
                'default'                 => '',
                'desc_tip'                => true,
                'disabled'                => ( $this->inheritcreds == 'yes' && !empty( $this->entityId ) ) ?  true : false,
            ],
            'accessToken'          => [
                'title'                   => 'Access Token (LIVE)',
                'type'                    => 'text',
                'class'                   => '',
                'description'             => 'Provided by Total Processing',
                'default'                 => '',
                'desc_tip'                => true,
                'disabled'                => ( $this->inheritcreds == 'yes' && !empty( $this->accessToken ) ) ?  true : false,
            ],
            'paymentType'          => [
                'title'                   => 'Authorisation Type',
                'type'                    => 'select',
                'class'                   => 'wc-enhanced-select-nostd',
                'description'             => 'Reccomend using DB as (default) direct capture, some aquirers are not compatible with PA.',
                'default'                 => "DB",
                'desc_tip'                => true,
                'options'                 => [
                    "DB" => "Debit (DB) transaction immediately captures payment",
                ]
            ],
        ]
    ],
    'Checkout configuration'    => [
        'title'                       =>'Checkout configuration',
        'description'                 =>'Set end user checkout behaviour via our applepay solution',
        'fields'                      => [
            'forceNoShipping'         => [
                'title'                   => 'Enforce Shipping to be passed from applepay account',
                'label'                   => 'Toggle switch to enable or disable',
                'type'                    => 'checkbox',
                'description'             => 'Collects Shipping address information from customers applepay account and passes it through with the transaction',
                'default'                 => 'no',
                'class'                   => 'wppd-ui-toggle',
                'desc_tip'                => true,
            ],
            'shippingAddressFields'   => [
                'title'                   => 'Shipping address information to collect',
                'type'                    => 'multiselect',
                'class'                   => 'wc-enhanced-select-nostd shippingAddressFields',
                'default'                 => [
                    'email',
                    'name',
                    'phone',
                    'postalAddress',
                ],
                'options'                 => [
                    'email'           => 'Email Address',
                    'name'            => 'Full Name',
                    'phone'           => 'Phone Number',
                    'postalAddress'   => 'Postal Code',
                    'phoneticName'    => 'Phonetic Name'
                ],
            ],
            'billingAddressFields'   => [
                'title'                   => 'Billing address information to collect',
                'type'                    => 'multiselect',
                'class'                   => 'wc-enhanced-select-nostd',
                'default'                 => [
                    'postalAddress',
                ],
                'options'                 => [
                    'postalAddress'   => 'Postal Code',
                ]
            ],
            'fastCheckoutOnCart'     => [
                'title'                   => "Enable 'Fast Checkout' applepay option",
                'label'                   => 'Toggle switch to enable or disable',
                'type'                    => 'checkbox',
                'description'             => "If true, applepay button will be visible on the the cart page as well as the checkout page. Billing and customer details will be pulled from their applepay account rather than added via woocommerce's checkout form.",
                'default'                 => 'no',
                'class'                   => 'wppd-ui-toggle',
                'desc_tip'                => true,
            ],
            'jsLogging'               => [
                'title'                   => 'Enable console log? <small><em>Default:Off</em></small>',
                'label'                   => 'Toggle switch to enable or disable',
                'type'                    => 'checkbox',
                'description'             => ' If true, checkout events will be added to the console.',
                'default'                 => 'no',
                'desc_tip'                => true,
                'class'                   => 'wppd-ui-toggle',
            ],
            'serversidedebug'         => [
                'title'                   => 'Enable server side log? <small><em>Default:Off</em></small>',
                'label'                   => 'Debug log',
                'type'                    => 'checkbox',
                'class'                   => 'wppd-ui-toggle',
                'description'             => 'Only if requested to be activated by Total Processing and private access is enabled should this be checked.',
                'default'                 => 'no',
                'desc_tip'                => true,
            ],
            'logLevels'                => [
                'title'                   => 'Logging level inclusion',
                'type'                    => 'multiselect',
                'class'                   => 'wc-enhanced-select-nostd',
                'default'                 => [
                    'emergency',
                    'critical',
                    'error',
                    'warning',
                ],
                'options'                 => [
                    'critical'                   => 'Critical',
                    'debug'                      => 'Debugging',
                    'emergency'                  => 'Emergency',
                    'error'                      => 'Error',
                    'info'                       => 'Information',
                    'warning'                    => 'Warning'
                ]
            ],
            'acceptedCards'           => [
                'title'                   => 'Card Acceptance',
                'type'                    => 'multiselect',
                'class'                   => 'wc-enhanced-select-nostd shippingAddressFields',
                'default'                 => [
                    'supports3DS',
                    'supportsCredit',
                    'supportsDebit'
                ],
                'options'                 => [
                    'supports3DS'    => '3D Secure',
                    'supportsCredit' => 'Credit Cards',
                    'supportsDebit'  => 'Debit Cards'
                ],
            ],
            'buttonSource'            => [
                'title'                   => 'Button Source',
                'type'                    => 'select',
                'class'                   => 'wc-enhanced-select-nostd changeButtonStyle',
                'default'                 => 'css',
                'options'                 => [
                    'css' => 'CSS',
                    'js'  => 'js'
                ]
            ],
            'applepaydisplayName'     => [
                'title'                   => 'Display name',
                'type'                    => 'text',
                'class'                   => '',
                'description'             => 'A string of 64 or fewer UTF-8 characters containing the canonical name for your store. The value is displayed in the Touch Bar on supported models of MacBook Pro.',
                'default'                 => get_bloginfo('name'),
                'desc_tip'                => true,
            ],
            /*'customCss'               => [
                'title'                   => 'Custom button css',
                'type'                    => 'textarea',
                'class'                   => 'textarea',
                'default'                 => 'a.applebtn_cart{display: block;margin-bottom: 1rem;height: 2.5rem;}'."\n".'a.applebtn_checkout{display: block;margin-bottom: 1rem;height: 2.5rem;}'."\n".'a.applebtn_mini-cart{}'."\n".'a.applebtn_product{}'."\n",
            ],*/
        ]
    ],
    'status'                          => [
        'title'                           => 'Apple Pay Configuration Status',
        'description'                     => 'Configuration Status' . ( $this->get_option( 'platformBase' ) != 'live' ? ' - <b>Applepay is currently only available via Live credentials</b>' : '' ),
        'body'                            => 'showStatus'
    ]
];
return $tabsFieldsArray;
