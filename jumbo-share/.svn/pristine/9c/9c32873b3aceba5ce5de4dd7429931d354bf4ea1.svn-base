<?php
/**
 * WordPress Settings Framework
 *
 * @author Gilbert Pellegrom, James Kemp
 * @link https://github.com/gilbitron/WordPress-Settings-Framework
 * @license MIT
 */

/**
 * Define your settings
 *
 * The first parameter of this filter should be wpsf_register_settings_[options_group],
 * in this case "my_example_settings".
 *
 * Your "options_group" is the second param you use when running new WordPressSettingsFramework()
 * from your init function. It's importnant as it differentiates your options from others.
 *
 * To use the tabbed example, simply change the second param in the filter below to 'wpsf_tabbed_settings'
 * and check out the tabbed settings function on line 156.
 */

add_filter('wpsf_register_settings_jumboshare', 'jumboshare_settings');

function jumboshare_settings($wpsf_settings)
{

    // General Settings section

    $wpsf_settings[] = array(
        'section_id' => 'settings',
        'section_title' => 'Settings',
        'section_description' => '',
        'section_order' => 5,
        'fields' => array(
            array(
                'id' => 'networks',
                'title' => 'Select Networks',
                'desc' => 'Please select social networks.',
                'type' => 'checkboxes',
                'std' => array(
                    'facebook',
                    'twitter',
                    'google',
                    'linkedin',
                    'reddit',
                    /*'tumblr'*/
                ),
                'choices' => array(
                    'facebook' => 'Facebook',
                    'twitter' => 'Twitter',
                    'google' => 'GooglePlus',
                    'linkedin' => 'LinkedIn',
                    'reddit' => 'Reddit',
                    /*'tumblr' => 'Tumblr',
                    'stumbleupon' => 'StumbleUpon'*/
                )
            ),

            array(
                'id' => 'position',
                'title' => 'Select Position',
                'desc' => 'You can place shortcode <span style="color:red; font-weight: bold">[jumbo-share]</span> wherever you want to display the share buttons',
                'type' => 'checkboxes',
                'std' => array(
                    'after'
                ),
                'choices' => array(
                    'before' => 'Before Content',
                    'after' => 'After Content',
                )
            ),

            /* array(
                 'id' => 'effects',
                 'title' => 'Effects',
                 'desc' => '',
                 'type' => 'checkboxes',
                 'std' => array(),
                 'choices' => array(
                     'slidein' => 'Use Slide-In',
                     //'after' => 'After Content',
                 )
             ),*/

            array(
                'id' => 'show_on',
                'title' => 'Show On',
                'desc' => 'Please chose where to show the share buttons',
                'type' => 'checkboxes',
                'std' => array(
                    'posts'
                ),
                'choices' => array(
                    'home' => 'Home Page',
                    'pages' => 'Pages',
                    'posts' => 'Posts',
                    'archives' => 'Archives',
                )
            ),
            array(
                'id' => 'checkbox',
                'title' => 'Show Counter',
                'desc' => 'Show counter',
                'type' => 'checkbox',
                'std' => 1
            ),
            array(
                'id' => 'counter_color',
                'title' => 'Counter Color',
                'desc' => 'Default color: #7fc04c',
                'type' => 'color',
                'std' => '#7fc04c'
            ),

            array(
                'id' => 'cache_time',
                'title' => 'Cache Time',
                'desc' => 'Please specify cache time here.',
                'type' => 'select',
                'std' => '60',
                'choices' => array(
                    '5' => '5  minutes',
                    '10' => '10 minutes',
                    '30' => '30 minutes',
                    '60' => '1 hour',
                    '360' => '6 hours',
                    '720' => '12 hours',
                    '1440' => '24 hours'
                )
            ),
            array(
                'id' => 'cache_purge',
                'title' => 'Purge Cache',
                'desc' => 'This will delete cache',
                'type' => 'custom',
                'std' => '<a class="button-primary" id="jumbo_share_purge_cache">Purge Cache</a><br><div id="jumbo_share_purge_info" style="height: 20px; margin-top: 5px"></div>',
            ),
            /*array(
                'id' => 'cache',
                'title' => 'Use Cache',
                'desc' => 'Cache social counter results?',
                'type' => 'checkbox',
                'std' => 1
            ),
            array(
                'id' => 'cache_time',
                'title' => 'Cache Time (in seconds)',
                'desc' => 'Enter cache time in seconds. e.g. 3600 means one Hour',
                'placeholder' => '3600',
                'type' => 'text',
                'std' => '3600'
            ),*/
        )
    );

    return $wpsf_settings;
}
