<?php
/**
 * Page logs partial of admin order
 *
 * @package WcGetnet
 */

?>

<div class="copy-button-container button-config">
    <span id="copy-message" class="copy-message"></span>
    <span id="download-message" class="copy-message"></span>
    <button id="copy-logs-button" class="copy-button"><?php _e('Copiar Logs'); ?></button>
    <a id="download-logs-button" class="download-link" href="#" download><?php _e('Download'); ?></a>
</div>

<div id='gnt-order-page-logs' class="gnt-order-page-logs">
    <?php if($auth_request_json): ?>
        <strong><?php _e('Authentication:', 'textdomain'); ?></strong>
        <div class="gnt-order-page-logs">
            <strong><?php _e('request:', 'textdomain'); ?></strong>
            <div id="authentication-request-log" class="json-content"><?php echo $auth_request_json; ?></div>

            <strong><?php _e('response:', 'textdomain'); ?></strong>
            <div id="authentication-response-log" class="json-content"><?php echo $auth_response_json; ?></div>
        </div>
    <?php endif; ?>

    <?php if ($headers_json) : ?>
        <strong><?php _e('Headers:', 'textdomain'); ?></strong>
        <div id="headers-log" class="json-content"><?php echo $headers_json; ?></div>
    <?php endif; ?>

    <?php if ($endpoint_json) : ?>
        <strong><?php _e('Endpoint:', 'textdomain'); ?></strong>
        <div id="endpoint-log" class="json-content"><?php echo $endpoint_json; ?></div>
    <?php endif; ?>

    <strong><?php _e('Request:', 'textdomain'); ?></strong>
    <div id="request-log" class="json-content"><?php echo $request_json; ?></div>

    <strong><?php _e('Response:', 'textdomain'); ?></strong>
    <div id="response-log" class="json-content"><?php echo $response_json; ?></div>
</div>