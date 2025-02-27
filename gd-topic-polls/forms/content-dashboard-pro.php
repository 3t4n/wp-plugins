<?php

use Dev4Press\v53\Core\Quick\URL;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="d4p-group d4p-dashboard-card d4p-dashboard-card-upsell d4p-card-double d4p-dashboard-card-dev4press d4p-dashboard-card-no-footer">
    <h3>Upgrade to topicPolls Pro for bbPress</h3>
    <div class="d4p-group-header">
        <p>Get more great features with a Pro version, with even more coming with future releases.</p>
    </div>
    <div class="d4p-group-inner">
        <ul>
            <li>
                <i class="d4p-icon d4p-ui-clock d4p-icon-fw"></i> Auto close poll based on date or number of votes
            </li>
            <li>
                <i class="d4p-icon d4p-ui-calendar d4p-icon-fw"></i> Register new bbPress Views to list all topics with polls
            </li>
            <li>
                <i class="d4p-icon d4p-logo-buddypress d4p-icon-fw"></i> BuddyPress Activity Integration to show poll votes notifications
            </li>
            <li>
                <i class="d4p-icon d4p-ui-envelope d4p-icon-fw"></i> Digest and Instant notifications for poll votes
            </li>
            <li>
                <i class="d4p-icon d4p-ui-puzzle d4p-icon-fw"></i> Widget to list all available topics polls
            </li>
            <li>
                <i class="d4p-icon d4p-ui-users d4p-icon-fw"></i> List of voters, additional options and settings and more...
            </li>
        </ul>
    </div>
    <div class="d4p-group-footer">
        <a href="<?php echo esc_url( topicpolls_fs()->get_upgrade_url() ); ?>" class="button-primary">Upgrade to topicPolls Pro for bbPress</a>
        <a href="<?php echo esc_url( URL::add_campaign_tracking( 'https://www.dev4press.com/plugins/gd-topic-polls/', 'topicpolls-upgrade-to-pro' ) ); ?>" target="_blank" class="button-secondary">topicPolls Pro for bbPress Home Page</a>
    </div>
</div>
