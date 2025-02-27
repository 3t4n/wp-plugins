<?php

namespace Dev4Press\Plugin\TopicPolls\Admin\Panel;

use Dev4Press\v53\Core\Quick\BP;
use Dev4Press\v53\Core\UI\Admin\PanelSettings;
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
class Settings extends PanelSettings {
    public $settings_class = '\\Dev4Press\\Plugin\\TopicPolls\\Admin\\Settings';

    public function __construct( $admin ) {
        parent::__construct( $admin );
        if ( !is_null( gdpol()->l() ) && gdpol()->l()->is_freemius() === false ) {
            $this->subpanels = $this->subpanels + array(
                'license' => array(
                    'title'      => __( 'License', 'gd-topic-polls' ),
                    'icon'       => 'ui-ribbon',
                    'break'      => __( 'Dev4Press', 'gd-topic-polls' ),
                    'break-icon' => 'logo-dev4press',
                    'info'       => __( 'Activate your plugin license on this website by entering the license code.', 'gd-topic-polls' ),
                    'kb'         => array(
                        'url' => 'https://www.dev4press.com/kb/article/gd-topic-polls-setup-license-code/',
                    ),
                ),
            );
        }
        $is_pro = false;
        $this->subpanels = $this->subpanels + array(
            'basic'       => array(
                'title'      => __( 'Basics', 'gd-topic-polls' ),
                'icon'       => 'ui-tasks',
                'break'      => __( 'Standard', 'gd-topic-polls' ),
                'break-icon' => 'ui-chart-bar',
                'info'       => __( 'Control who can create polls and which forums are available for polls.', 'gd-topic-polls' ),
            ),
            'fields'      => array(
                'title' => __( 'Poll Fields', 'gd-topic-polls' ),
                'icon'  => 'ui-sliders-base-hor',
                'info'  => __( 'Control over the fields available when creating a poll and poll defaults.', 'gd-topic-polls' ),
            ),
            'display'     => array(
                'title' => __( 'Poll Display', 'gd-topic-polls' ),
                'icon'  => 'ui-paint-brush',
                'info'  => __( 'Control over the display of poll results, poll users and calculations.', 'gd-topic-polls' ),
            ),
            'labels'      => array(
                'title' => __( 'Objects Labels', 'gd-topic-polls' ),
                'icon'  => 'ui-book-spells',
                'info'  => __( 'These settings control labels used by objects added by the plugin.', 'gd-topic-polls' ),
            ),
            'integration' => array(
                'title'      => __( 'Integration', 'gd-topic-polls' ),
                'icon'       => 'ui-code',
                'break'      => __( 'bbPress', 'gd-topic-polls' ),
                'break-icon' => 'logo-bbpress',
                'info'       => __( 'Control how the plugin is integrated in bbPress topics and forums.', 'gd-topic-polls' ),
            ),
            'views'       => array(
                'title' => __( 'Topic Views', 'gd-topic-polls' ),
                'icon'  => 'ui-clipboard-list',
                'info'  => __( 'Add new bbPress Topic Views for listing only topics with included polls.', 'gd-topic-polls' ),
                'modd'  => ( $is_pro ? 'regular' : 'premium' ),
            ),
            'notify'      => array(
                'title' => __( 'Email Notifications', 'gd-topic-polls' ),
                'icon'  => 'ui-envelope',
                'info'  => __( 'Control over the instant and daily digest notification for poll votes.', 'gd-topic-polls' ),
                'modd'  => ( $is_pro ? 'regular' : 'premium' ),
            ),
        );
        if ( BP::is_active() ) {
            $this->subpanels['buddypress'] = array(
                'title'      => __( 'BuddyPress', 'gd-topic-polls' ),
                'icon'       => 'logo-buddypress',
                'break'      => __( 'Extras', 'gd-topic-polls' ),
                'break-icon' => 'ui-cabinet',
                'info'       => __( 'These settings control integration with BuddyPress.', 'gd-topic-polls' ),
                'modd'       => ( $is_pro ? 'regular' : 'premium' ),
            );
        }
    }

}
