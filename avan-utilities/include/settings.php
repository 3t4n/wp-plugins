<?php
// Control core classes for avoid errors
if( class_exists( 'AVAN' ) ) {

  $prefix = 'avanutilities_option';
	
  // Create options
  AVAN::createOptions( $prefix, array(
  'framework_title'         => __('Avan utilities settings <small><a href="https://beautycute.ir" target="_blank" id="avan-settile">by Masoud najjar khodabakhsh</a></small>','avutilang'),
  'framework_class'         => 'avuti-set',
  'menu_icon'=> AVUTI_PLUG_ASSETS . '/admin/avutilities-logo.webp',
    'menu_title' => __('AVUTI Settings', 'avutilang'),
    'menu_slug'  => 'avan-settings',
	'menu_position'	=> '2',
	'show_all_options'        => false,
    'footer_text'             => __( 'All rights are reserved for Masoud Najar Khodabakhsh. Please do not make commercial use of plugin codes. Thank You', 'avutilang' ),
    'footer_credit'           => __( 'Thanks for using avan utilities version ', 'avutilang') . AVUTI_VER ,
  ) );

  /******************* Speed optimize Section *******************/
  AVAN::createSection( $prefix, array(
    'id'    => 'speed_optimize_section',
    'title' => __('SpeedUP', 'avutilang'),
    'icon'   => 'fas fa-rocket',
  ) );
  
  ///// Wordpress optimize
  AVAN::createSection( $prefix, array(
    'parent' => 'speed_optimize_section',
    'title'  => __('Wordpress', 'avutilang'),
    'icon'   => 'dashicons dashicons-wordpress',
    'fields' => array(
    
      array(
        'id'       => 'avuti_wptweaks',
        'type'     => 'switcher',
        'title'    => __('Enable/Disable', 'avutilang') . ' ' . __('WP optimize', 'avutilang'),
        'label' => __( 'Enables or disables the whole module without resetting its settings.', 'avutilang' ),
        'text_on'  => __('Enable', 'avutilang'),
        'text_off' => __('Disable', 'avutilang'),
        'text_width' => 90,
        'default' => true,
     'sanitize' => true,	 
),
      array(
        'id'       => 'avan1',
        'type'     => 'switcher',
        'title'    => __('Remove Emoji', 'avutilang'),
        'label' => __('By activating this option, you can delete all styles and script files related to WordPress emojis', 'avutilang'),
        'dependency' => [ 'avuti_wptweaks', '==', '1', '', 'visible' ],
     'sanitize' => true,	 
),
      array(
        'id'       => 'avan2',
        'type'     => 'switcher',
        'title'    => __('Remove jQuery Migrate', 'avutilang'),
        'label' => __('By activating this option, you can Removes jQuery Migrate JavaScript file (jquery-migrate.min.js). This file may be need for some theme and plugins', 'avutilang'),
        'dependency' => [ 'avuti_wptweaks', '==', '1', '', 'visible' ],
     'sanitize' => true,	 
),
      array(
        'id'       => 'avan3',
        'type'     => 'switcher',
        'title'    => __('Remove Gutenbrg', 'avutilang'),
        'label' =>  __('By activating this option, you can remove the Gutenberg Block Library CSS files', 'avutilang'),
        'dependency' => [ 'avuti_wptweaks', '==', '1', '', 'visible' ],
     'sanitize' => true,	 
),
      array(
        'id'       => 'avan4',
        'type'     => 'switcher',
        'title'    => __('Remove Dashicon', 'avutilang'),
        'label' =>  __('By activating this option, you can remove the Gutenberg Block Library CSS files', 'avutilang'),
        'dependency' => [ 'avuti_wptweaks', '==', '1', '', 'visible' ],
     'sanitize' => true,	 
),
      array(
        'id'       => 'avan5',
        'type'     => 'switcher',
        'title'    => __('Remove Classic Theme styles', 'avutilang'),
        'label' => __('Since wordpress 6.1, wordpress loads classic-themes.min.css ,by activating this option, you can remove this file', 'avutilang'),
        'dependency' => [ 'avuti_wptweaks', '==', '1', '', 'visible' ],
     'sanitize' => true,	 
),
      array(
        'id'       => 'avan6',
        'type'     => 'switcher',
        'title'    => __('Remove Querystrings', 'avutilang'),
        'label' => __('By activating this option, you can remove version number from Scripts & Styles link', 'avutilang'),
        'dependency' => [ 'avuti_wptweaks', '==', '1', '', 'visible' ],
     'sanitize' => true,	 
),
      array(
        'id'       => 'avan7',
        'type'     => 'switcher',
        'title'    => __('Remove Shortlink Tag', 'avutilang'),
        'label' => __('By activating this option, you can remove Shortlink tag from header', 'avutilang'),
        'dependency' => [ 'avuti_wptweaks', '==', '1', '', 'visible' ],
     'sanitize' => true,	 
),
      array(
        'id'       => 'avan8',
        'type'     => 'switcher',
        'title'    => __('Remove Yoast comment', 'avutilang'),
        'label' => __('By activating this option, you can remove Shortlink tag from header', 'avutilang'),
        'dependency' => [ 'avuti_wptweaks', '==', '1', '', 'visible' ],
     'sanitize' => true,	 
),
      array(
        'id'       => 'avan9',
        'type'     => 'switcher',
        'title'    => __('Disable plugins update', 'avutilang'),
        'label' => __('By activating this option, you can completely disable plugins check for update', 'avutilang'),
        'dependency' => [ 'avuti_wptweaks', '==', '1', '', 'visible' ],
     'sanitize' => true,	 
),
      array(
        'id'       => 'avan10',
        'type'     => 'switcher',
        'title'    => __('Disable themes update', 'avutilang'),
        'label' => __('By activating this option, you can completely disable themes check for update', 'avutilang'),
        'dependency' => [ 'avuti_wptweaks', '==', '1', '', 'visible' ],
     'sanitize' => true,	 
),
      array(
        'id'       => 'avan11',
        'type'     => 'switcher',
        'title'    => __('Remove wordpress version', 'avutilang'),
        'label' => __('By activating this option, you can remove wordpress version meta tag', 'avutilang'),
        'dependency' => [ 'avuti_wptweaks', '==', '1', '', 'visible' ],
     'sanitize' => true,	 
),
      array(
        'id'       => 'avan12',
        'type'     => 'switcher',
        'title'    => __('Remove Global styles', 'avutilang'),
        'label' => __('By activating this option, you can remove global inline styles(in some themes need this global style)', 'avutilang'),
        'dependency' => [ 'avuti_wptweaks', '==', '1', '', 'visible' ],
     'sanitize' => true,	 
),
      array(
        'id'       => 'avan13',
        'type'     => 'switcher',
        'title'    => __('Remove wordpress admin bar', 'avutilang'),
        'label' => __('By activating this option, you can remove wordpress admin bar(This can increase speed for logged in user)', 'avutilang'),
        'dependency' => [ 'avuti_wptweaks', '==', '1', '', 'visible' ],
     'sanitize' => true,	 
),
    )
  ) );
  
  ///// Woocommerce optimize
            $woocommerce_fields = [];
			include_once ABSPATH . 'wp-admin/includes/plugin.php';

// check for plugin using plugin name
			if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
                $woocommerce_fields = [
                    [
                        'id'    => 'avanwc1',
                        'type'  => 'submessage',
                        'style' => 'warning',
                        'content' => __( 'WooCommerce is not active right now, but you can still change the settings below. the setting not affect before woocommerce is activated.', 'avutilang' ),
                    ]
                ];
            }

            $woocommerce_fields = array_merge( $woocommerce_fields, [
	            [
		            'title'    => __( 'Enable/Disable', 'avutilang' ) . ' WooCommerce',
		            'id'       => 'avuti_wootweak',
		            'class'    => 'module-woocommerce',
		            'type'     => 'switcher',
		            'label'    => __( 'Enables or disables the whole module without resetting its settings.', 'avutilang' ),
					'text_on'  => __('Enable', 'avutilang'),
					'text_off' => __('Disable', 'avutilang'),
					'text_width' => 90,
		            'default'  => false,
					 'sanitize' => true,
	            ],
	            [
                    'id'       => 'avanwc2',
                    'type'     => 'switcher',
                    'title'    => __('Remove Woocommerce Fragment', 'avutilang'),
                    'label' => __('By activating this option, you can completely disables WooCommerce cart fragmentation script', 'avutilang'),
                    'dependency' => [ 'avuti_wootweak', '==', '1', '', 'visible' ],
					 'sanitize' => true,
	            ],
            ]
		);

			AVAN::createSection(
				$prefix,
				[
                'parent' => 'speed_optimize_section',
					'title'  => __('WooCommerce', 'avutilang'),
					'id'     => 'woocommerce',
					'icon'   => 'fa fa-shopping-cart',
					'fields' => $woocommerce_fields,
				]
			);
			/* END Section: WooCommerce */

  ///// Database optimize
  AVAN::createSection( $prefix, array(
    'parent' => 'speed_optimize_section',
    'title'  => __('Database', 'avutilang'),
    'icon' => 'dashicons dashicons-database',
    'fields' => array(
		array(
        'id'       => 'avuti_dbtweak',
        'type'     => 'switcher',
        'title'    => __('Enable/Disable', 'avutilang') . ' ' . __('Database optimize', 'avutilang'),
        'label' => __( 'Enables or disables the whole module without resetting its settings.', 'avutilang' ),
        'text_on'  => __('Enable', 'avutilang'),
        'text_off' => __('Disable', 'avutilang'),
        'text_width' => 90,
		'default' => false,
     'sanitize' => true,	 
),
	array(
      'id'       => 'avandb1',
      'type'     => 'spinner',
      'title'    => __('Limit post revision', 'avutilang'),
      'subtitle' => __('max:50 | min:1', 'avutilang'),
      'desc' => __('Limits the number of post revisions saved for each post. Keeping 3 or 5 revisions for each post should be enough for most sites. Set it to 0 to disable post revisions completely.
Note: If the WP_POST_REVISIONS constant is set in your wp-config.php file, it will override this setting.', 'avutilang'),
      'max'      => 50,
      'min'      => 0,
      'step'     => 1,
      'unit'     => __('revisions', 'avutilang'),
	   'dependency' => [ 'avuti_dbtweak', '==', '1', '', 'visible' ],
    ),

    )
  ) );
}
