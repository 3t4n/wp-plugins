<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
?>
<div class="d4p-content">
    <div class="d4p-cards-wrapper">
		<?php 
require_once TOPICPOLLS_PATH . 'forms/content-dashboard-info.php';
include TOPICPOLLS_PATH . 'forms/content-dashboard-pro.php';
require_once TOPICPOLLS_PATH . 'forms/content-dashboard-polls.php';
require_once TOPICPOLLS_PATH . 'forms/content-dashboard-votes.php';
?>
    </div>
</div>
