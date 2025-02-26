<?php 

require_once(PDP_PLUGIN_PATH.'admin/framework/framework.php');

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {


    $prefix = 'pdp';

    //
    // Create a metabox
    CSF::createMetabox( $prefix, array(
        'title'     => 'My Post Options',
        'post_type' => 'podcast',
    ) );

    //
    // Create a section
    CSF::createSection( $prefix, array(
        'title'  => '',
        'fields' => array(
            array(
                'id' => 'items',
                'type' => 'group',
                'fields'    => array(
                    array(
                      'id'    => 'title',
                      'type'  => 'text',
                      'title' => 'Title',
                    ),
                    array(
                      'id'    => 'audio',
                      'type'  => 'upload',
                      'title' => 'Podcast',
                    ),
                    array(
                      'id'    => 'image',
                      'type'  => 'upload',
                      'title' => 'Poster',
                    ),
                ),
                'button_title' => 'Add Episode'
            ),
            array(
                'id' => 'skin',
                'type' => 'button_set',
                'title' => 'Screen',
                'options' => array(
                    'default' => 'Default',
                    'wave' => 'Wave',
                ),
                'default' => 'default',
            ),
            // array(
            //     'id' => 'repeat',
            //     'type' => 'button_set',
            //     'title' => 'Repeat',
            //     'options' => array(
            //         'once' => 'Once',
            //         'loop' => 'Loop',
            //     ),
            //     'default' => 'once',
            // ),
            // array(
            //     'id' => 'muted',
            //     'type' => 'switcher',
            //     'title' => 'Muted',
            //     'desc' => 'On if you want the video output should be muted',
            //     'default' => '0',
            // ),
            // array(
            //     'id' => 'autoplay',
            //     'type' => 'switcher',
            //     'title' => 'Auto Play',
            //     'desc' => 'Turn On if you  want video will start playing as soon as it is ready. <a href="https://developers.google.com/web/updates/2017/09/autoplay-policy-changes">autoplay policy</a>',
            //     'default' => '',
            // ),
            array(
                'id' => 'width',
                'type' => 'spinner',
                'title' => 'Width',
                'unit' => 'px',
                'max' => '5000',
                'min' => '200',
                'step' => '50',
                'desc' => 'set the player width. Height will be calculate base on the value. Leave blank for Responsive player',
                'default' => '',
            ),
            array(
                'id' => 'podcastName',
                'type' => 'text',
                'title' => 'Podcast Name',
                'dependency' => ['skin', '==', 'wave']
            ),
            array(
                'id' => 'waveColor',
                'type' => 'color',
                'title' => 'Wave Color',
                'default' => '#777',
                'dependency' => ['skin', '==', 'wave']
            ),
            array(
                'id' => 'progressColor',
                'type' => 'color',
                'title' => 'Wave Progress Color',
                'default' => '#4527A4',
                'dependency' => ['skin', '==', 'wave']
            ),
            array(
                'id' => 'controls',
                'type' => 'button_set',
                'title' => 'Controls',
                'multiple' => true,
                'options' => array(
                  'restart' => 'Restart',
                  'rewind' => 'Rewind',
                  'play' => 'Play',
                  'fast-forward' => 'Fast Forwards',
                  'progress' => 'Progressbar',
                  'duration' => 'Duration',
                  'current-time' => 'Current Time',
                  'mute' => 'Mute Button',
                  'volume' => 'Volume Control',
                  'settings' => 'Setting Button',
                  'download' => 'Download Button',
                ),
                'default' => array( 'play','progress','current-time','mute','volume','settings', 'download' ),
                'dependency' => ['skin', '==', 'default']
            ),
            array(
                'id' => 'theme',
                'type' => 'button_set',
                'title' => 'Theme',
                'options' => array(
                    'light' => 'Light',
                    'dark' => 'Dark'
                ),
                'default' => 'light',
                'dependency' => ['skin', '==', 'default']
            ),
            array(
                'id' => 'featureImage',
                'type' => 'switcher',
                'title' => 'Feature Image',
                'default' => '1',
                'dependency' => ['skin', '==', 'default']
            ),
            array(
                'id' => 'share',
                'type' => 'switcher',
                'title' => 'Share',
                // 'desc' => 'On if you want the video output should be muted',
                'default' => '1',
                'dependency' => ['skin', '==', 'default']
            ),
            array(
                'id' => 'showLabel',
                'type' => 'switcher',
                'title' => 'Show Label',
                // 'desc' => 'On if you want the video output should be muted',
                'default' => '0',
                'dependency' => ['share|skin', '==|==', '1|default']
            ),
            array(
                'id' => 'showCount',
                'type' => 'switcher',
                'title' => 'Show Count',
                // 'desc' => 'On if you want the video output should be muted',
                'default' => '0',
                'dependency' => ['share|skin', '==|==', '1|default']
            ),
            array(
                'id' => 'shares',
                'type' => 'button_set',
                'title' => 'Social Media',
                'multiple' => true,
                'options' => array(
                  'facebook' => 'Facebook',
                  'twitter' => 'Twitter',
                  'linkedin' => 'Linkedin',
                  'pinterest' => 'Pinterest',
                  'stumbleupon' => 'Stumbleupon',
                  'whatsapp' => 'Whatsapp',
                  'email' => 'Email',
                ),
                'default' => array( 'facebook', 'twitter', 'linkedin', 'pinterest', 'stumbleupon', 'whatsapp', 'email' ),
                'dependency' => ['share|skin', '==|==', '1|default']
            )

        )
    ) );

    //
    // Set a unique slug-like ID
    $prefix = 'pdp_option';
  
    //
    // Create options
    CSF::createOptions( $prefix, array(
      'menu_title' => 'Settings',
      'menu_slug'  => 'pdp-settings',
      'framework_title'  => 'Settings',
      'menu_type'   => 'submenu',
      'menu_parent' => 'edit.php?post_type=podcast',
      'theme' => 'light',
      'footer_credit'           => ' ',
    ) );
  
    //
    // Create a section
    CSF::createSection($prefix, [
        'title' => __("Shortcode", "h5vp"),
        'fields' => [
            [
                'id' => 'pdp_gutenberg_enable',
                'title' => 'Enable Gutenberg Shortcode Generator',
                'type' => 'switcher',
                'default' => get_option('nothdddding', true)
            ]
        ]
    ]);

}